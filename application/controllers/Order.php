<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Order extends CI_Controller {
  private $api_key = '1420e2eac2351a0f35211cd2d2bd6c7b';

  public function __construct(){

    parent::__construct();

    $this->load->model('Order_model');

  }

  public function index(){
    $data['title'] = 'Erinnear | Order';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
    $this->load->view('templates/home_header',$data);
    $this->load->view('order/index.php',$data);
    $this->load->view('templates/home_footer',$data);
  }

  //fungsi add to cart
  public function addToCart(){
    $data['title'] = 'Erinnear | Order';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();


    //rules form_validation
    $this->form_validation->set_rules('type', 'Type', 'trim|required');
    $this->form_validation->set_rules('size', 'Size', 'trim|required');
    $this->form_validation->set_rules('color', 'Color', 'trim|required');
    $this->form_validation->set_rules('position', 'Position', 'trim|required');
    $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
    //validasi form order
    if($this->form_validation->run() == false ){
      $this->load->view('templates/home_header',$data);
      $this->load->view('order/index.php',$data);
      $this->load->view('templates/home_footer',$data);
    } else {
      $type = $this->input->post('type');
      $size = $this->input->post('size');
      $color = $this->input->post('color');
      $position = $this->input->post('position');
      $quantity = $this->input->post('quantity');

      //ngambil data image yang di upload
      $upload_image = $_FILES['image']['name'];

      //mengecek syarat upload gambar
      if($upload_image){
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = '20480';
        $config['upload_path']   = './assets/img/user_design/';

        //upload gambar ke folder user_design
        $this->load->library('upload', $config);

        //upload gambar ke folder user_design
        if($this->upload->do_upload('image')){
          //langgung ke $id bawah
        }else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
          redirect('order/index');
        }
      }



      $id = uniqid();
      $data = array(
        'id' => $id,
        'qty'=>$quantity,
        'price' => 65000,
        'name' => $upload_image,
        'size' => $size,
        'color' => $color,
        'position' => $position,
        'type' => $type
      );


      $this->cart->insert($data);
        redirect('order/cart');




    }
  }





  public function cart(){
    $data['title'] = 'Erinnear | Cart';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

    $this->load->view('templates/home_header',$data);
    $this->load->view('order/cart.php',$data);
    $this->load->view('templates/home_footer');
  }





  public function removeCart($id){

    //hapus gambar yang di remove
    $selected_item = $this->cart->get_item($id);

    unlink(FCPATH . 'assets/img/user_design/' . $selected_item['name']); //hapus gambar dari folder

    $data = array(
        'rowid'    => $id,
        'qty'   => 0
        );
    $this->cart->update($data);

    redirect('order/cart');

  }




  //Check Shipping using rajaongkir API
  public function checkShipping(){
    $this->form_validation->set_rules('destination','City Destination', 'required');//aturan untuk field nama
    if( $this->form_validation->run() == FALSE){
      $this->cart();
    }else {
      $destination = $this->input->post('destination');

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=115&destination=".$destination."&weight=1700&courier="."jne",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded",
          "key: $this->api_key"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        // return json_decode($response);
        $test = json_decode($response,true);

        $this->session->set_userdata('destination', $test['rajaongkir']['destination_details']['city_name']);
        $this->session->set_userdata('service', $test['rajaongkir']['results'][0]['costs'][1]);
        $this->session->set_userdata('shippingCost', $test['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value']);




        redirect('order/cart');

        }
      }
  }





  public function checkout(){

    if(!$this->session->userdata('shippingCost')){
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  Please check shipping cost
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('order/cart');
    }
    $data['title'] = 'Erinnear | Checkout';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();


    $this->load->view('templates/home_header',$data);
    $this->load->view('order/checkout.php',$data);
    $this->load->view('templates/home_footer');

  }

  public function placeOrder(){

    //rules form_validation
    $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
    $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric');
    $this->form_validation->set_rules('address', 'Address', 'trim|required');
    $this->form_validation->set_rules('town', 'Town/City', 'trim|required');
    $this->form_validation->set_rules('province', 'Province', 'trim|required');
    $this->form_validation->set_rules('zip', 'ZIP', 'trim|required|numeric');
    //validasi form checkout
    if($this->form_validation->run() == false ){
      $this->checkout();

    } else {
      $this->Order_model->placeOrder();
      $this->cart->destroy();

      if($this->session->userdata('email')){
        $this->Order_model->insertTempCart();
      }

      $this->session->unset_userdata('destination');
      $this->session->unset_userdata('service');
      $this->session->unset_userdata('shippingCost');
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  Your order is waiting for payment, Please Verified.....
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('home');
//ini ke status langsung
    }



  }
}
