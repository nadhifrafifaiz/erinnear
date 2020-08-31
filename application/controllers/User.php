<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  public function __construct(){

    parent::__construct();

    //mencegah user belom login mau masuk lewat url
    if(!$this->session->userdata('role_id')){
      redirect('home');
    }

    //pemanggilan model Auth_model untuk query database
    $this->load->model('User_model');
    $this->load->model('Order_model');

  }

  //fungsi user profile
  public function index(){
    $data['title'] = 'Erinnear | User Profile';
    $data['user'] = $this->User_model->getDataUser();
    $data['transaction'] = $this->User_model->getUserTransaction();
    $data['orderUser'] = $this->Order_model->getOrderByUser();


    $role_id = $data['user']['role_id'];


    //cek role dari user yang loginn
    if($role_id == 1){
      redirect('admin');
    }else{
      $this->load->view('templates/home_header',$data);
      $this->load->view('user/index.php',$data);
      $this->load->view('templates/home_footer',$data);
    }


  }

  //fungsi edit profile
  public function edit(){
    $data['title'] = 'Erinnear | Edit Profile';
    $data['user'] = $this->User_model->getDataUser();


    //rules form_validation
    $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
    //validasi edit Profile
    if($this->form_validation->run() == false ){
      $this->load->view('templates/home_header',$data);
      $this->load->view('user/edit',$data);
      $this->load->view('templates/home_footer',$data);
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
          redirect('user/edit');
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
      redirect('user');

    }
  }

  public function referal(){
    $data['user'] = $this->User_model->getDataUser();
    $data['email'] = $data['user']['email'];

  //ambil data Email referal
    if ($this->input->post('submit')) {
      $data['referal'] =  $this->input->post('referal');
      $cek = $this->User_model->referalCek($data['email'], $data['referal']);

      //kalo email sudah ada
      if ($cek) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Referal Email Sudah Digunakan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        redirect('user');
      } else {
        $cekEmailReferal = $this->User_model->referalEmailCek($data['email'], $data['referal']);
        //kalo berhasil
        if ($cekEmailReferal) {
          $this->User_model->referalPoin($data['email'], $data['referal']);
          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda Mendapat 100 Poin
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('user');

        }else{
          //kalo email tidak terdaftar
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Referal Email Tidak Dikenal
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('user');
        }
      }
    }
  }

}
