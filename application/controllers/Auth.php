<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();
    //pemanggilan model Auth_model untuk query database
    $this->load->model('Auth_model');
    $this->load->model('Order_model');
    //pemanggilan library foem validasi biar semua method bisa menggunakannya
    $this->load->library('form_validation');

  }

  public function index(){ //controller login

    //cek sudah login atau belum
    if($this->session->userdata('email')){
      redirect('home');
    }

    //rules untuk memvalidasi isi form loginn
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    //jika gagal load llagi login
    if($this->form_validation->run()==false){
      $data['title']='Erinnear | Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    }else{//kalau validasi berhasil
      $this->_login();
    }
  }

  private function _login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->Auth_model->getDataUser();
    //jika user ada
    if($user){
      //jika user aktif
      if($user['is_active'] == 1){
        //cek password
        if(password_verify($password, $user['password'])){
          $data = [
            'email' => $user['email'],
            'role_id'=>$user['role_id']
          ];
          $this->session->set_userdata($data);

          //cek role dari user yang loginn
          if($user['role_id'] ==1){

            redirect('admin');
          }else{
            redirect('home');
          }

        }else{
          //password ssalah
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Password Anda Salah
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>');
          redirect('auth');
        }
      }else {
        //user belum aktif
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Email Belum di Aktivasi
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>');
        redirect('auth');
      }
    }else{
      //gagalkan login
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  Email Anda Belum Terdaftar
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('auth');
    }
  }

  public function registration(){
    //cek sudah login atau belum
    if($this->session->userdata('email')){
      redirect('home');
    }

    //rules untuk memvalidasi isi form registration
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
      'is_unique'=>'Email ini sudah dipakai'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
      'matches'=>'Password tidak cocok',
      'min_length'=>'Password terlalu pendek'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    //jika isi dari form validasi registrasi salah maka load lagi halaman regist
    if($this->form_validation->run()==false){
      $data['title']='Erinnear | User Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    }else {//kalau bener maka lakukan...
      $this->Auth_model->insertNewUser();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  Selamat! Akun anda berhasil dibuat, silahkan login
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('auth');
    }
  }

  public function logout(){

    $this->Order_model->insertTempCart();
    //mengosongkan cart
    $this->cart->destroy();
    $this->session->unset_userdata('destination');
    $this->session->unset_userdata('service');
    $this->session->unset_userdata('shippingCost');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    redirect('home');
  }


}
