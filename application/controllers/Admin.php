<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct(){

    parent::__construct();

    //mencegah user belom login mau masuk lewat url
    if(!$this->session->userdata('role_id')){
      redirect('home');
    } elseif($this->session->userdata('role_id') != 1) {
      redirect('home');
    }

    $this->load->model('User_model');
    $this->load->model('Order_model');

  }

  public function index(){
    $data['title'] = 'Erinnear | Administrator';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();


    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/admin_sidebar', $data);
    $this->load->view('templates/admin_topbar', $data);
    $this->load->view('admin/index.php',$data);
    $this->load->view('templates/admin_footer');

  }


  //fungsi edit profile
  public function edit(){
    $data['title'] = 'Erinnear | Edit Profile';
    $data['user'] = $this->User_model->getDataUser();


    //rules form_validation
    $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
    //validasi edit Profile
    if($this->form_validation->run() == false ){
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/admin_sidebar', $data);
      $this->load->view('templates/admin_topbar', $data);
      $this->load->view('admin/edit.php',$data);
      $this->load->view('templates/admin_footer');
    } else {

      $name = $this->input->post('name');
      $email = $this->input->post('email');

      //ngambil data image yang di upload
      $upload_image = $_FILES['image']['name'];

      //mengecek syarat upload gambar
      if($upload_image){
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/profile/';

        //upload gambar ke folder
        $this->load->library('upload', $config);

        //untuk isi field image di database
        if($this->upload->do_upload('image')){
          $old_image = $data['user']['image'];//data gambar lama
          if($old_image != 'default.jpg'){
            unlink(FCPATH . 'assets/img/profile/' . $old_image); //hapus gambar dari folder
          }


          //masukkan field image baru
          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        }else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
          redirect('admin/edit');
        }
      }


      $this->db->set('name', $name);
      $this->db->where('email', $email);
      $this->db->update('user');


      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Your profile has been updated!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('admin');

    }
  }


  public function order(){
    $data['title'] = 'Erinnear | Order Management';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

    $data['orderData'] = $this->Order_model->getOrder();




    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/admin_sidebar', $data);
    $this->load->view('templates/admin_topbar', $data);
    $this->load->view('admin/order.php',$data);
    $this->load->view('templates/admin_footer');
  }

  public function orderDetail($orderId){

      $data['title'] = 'Erinnear | Order Detail';
      $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

      $data['orderDetail'] = $this->Order_model->getOrderDetail($orderId);
      $data['customerData'] = $this->Order_model->getCustomerData($orderId);



      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/admin_sidebar', $data);
      $this->load->view('templates/admin_topbar', $data);
      $this->load->view('admin/detail.php',$data);
      $this->load->view('templates/admin_footer');



  }

  public function orderDelete($orderId){
    $selectedData = $this->Order_model->getOrderDetail($orderId);
    $num = $this->db->affected_rows();

    foreach ($selectedData as $data) {
        unlink(FCPATH . 'assets/img/user_design/' . $data['design']); //hapus gambar dari folder
      }

    $this->Order_model->deleteOrder($orderId);

    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Order deleted!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('admin/order');
  }

  public function orderStatus($orderId){
    $data['title'] = 'Erinnear | Order Status';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

    $data['orderDetail'] = $this->Order_model->getOrderDetail($orderId);
    $data['customerData'] = $this->Order_model->getCustomerData($orderId);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/admin_sidebar', $data);
    $this->load->view('templates/admin_topbar', $data);
    $this->load->view('admin/status.php',$data);
    $this->load->view('templates/admin_footer');
  }

  public function changeOrderStatus(){
    $this->Order_model->changeOrderStatus();

    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Status Changed
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('admin/order');


  }

}
