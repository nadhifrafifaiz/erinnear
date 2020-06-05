<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
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
        'position' => $position
      );


      $this->cart->insert($data);
        redirect('order/cart');




    }
  }





  public function cart(){
    $data['title'] = 'Erinnear | Order';
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
}
