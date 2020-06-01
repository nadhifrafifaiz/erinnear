<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();
    //pemanggilan model Auth_model untuk query database
    $this->load->model('Auth_model');
    //pemanggilan library foem validasi biar semua method bisa menggunakannya
    $this->load->library('form_validation');
  }

  public function index(){ //controller login
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
          redirect('home');

        }else{
          //password ssalah
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Password is incorrect
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>');
          redirect('auth');
        }
      }else {
        //user belum aktif
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Email has not been activated
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>');
        redirect('auth');
      }
    }else{
      //gagalkan login
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  Email is not registered
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('auth');
    }
  }

  public function registration(){
    //rules untuk memvalidasi isi form registration
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
      'is_unique'=>'This email is already registered'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
      'matches'=>'Password dont match!',
      'min_length'=>'Password too short!'
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
                                                  Congratulation! your account has been created. Please login
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('auth');
    }
  }

  public function logout(){
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    redirect('home');
  }


}
