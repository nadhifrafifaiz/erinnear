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
      //siapkan token
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $this->input->post('email',true),
        'token' => $token,
        'date_created' => time()
      ];
      $this->Auth_model->insertNewUser();
      $this->db->insert('user_token', $user_token);

      //kirim Email
      $this->_sendEmail($token, 'verify');


      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  Selamat! Akun anda berhasil dibuat, silahkan aktifasi akun anda
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type){
    $config = [
      'protocol' => 'smtp',
      'smtp_host' =>'ssl://smtp.googlemail.com',
      'smtp_user' =>'erinnear.id@gmail.com',
      'smtp_pass' =>'fadlan1234',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('erinnear.id@gmail.com', 'Erinnear Indonesia');
    $this->email->to($this->input->post('email'));

    if($type=='verify'){
      $this->email->subject('Verifikasi Akun');
      $this->email->message('Klik link untuk verifikasi akun anda :
        <a href=" '.base_url(). 'auth/verify?email='. $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifasi</a>');
    }elseif($type=='forgot'){
      $this->email->subject('Reset Password');
      $this->email->message('Klik link untuk reset password anda :
      <a href=" '.base_url(). 'auth/resetpassword?email='. $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }


    if($this->email->send()) {
      return true;
    }else {
      echo $this->email->print_debugger();
      die;
    }
  }

//lakukan verif dari email
  public function verify(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' =>$email])->row_array();

    if($user){
      $user_token = $this->db->get_where('user_token',['token' => $token] )->row_array();

      if($user_token){

        if(time() - $user_token['date_created'] < (60*60*24)){
          //berhasil
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);
          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      Silahkan Login
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>');
          redirect('auth');
        }else {
          // waktu sehari abis
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Waktu verifikasi sudah habis
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>');
          redirect('auth');
        }

      }else{
        //salah token
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Aktifasi Akun Gagal! Token Salah
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>');
        redirect('auth');
      }

    } else{
      //salah email
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  Aktifasi Akun Gagal! Email Salah
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('auth');
    }
  }

  public function forgotPassword(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if($this->form_validation->run() == false){
      $data['title']='Erinnear | Lupa Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/forgot-password');
      $this->load->view('templates/auth_footer');
    }else{
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email'=>$email, 'is_active' =>1])->row_array();

      if($user){
        //kalo berhasil buat token
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $this->input->post('email',true),
          'token' => $token,
          'date_created' => time()
        ];
        $this->db->insert('user_token', $user_token);
        $this-> _sendEmail($token, 'forgot');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Cek email untuk mereset password
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>');
        redirect('auth/forgotpassword');

      }else{
        //user tidak ada di database
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Email tidak terdaftar atau diaktifasi
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>');
        redirect('auth/forgotpassword');
      }

    }

  }

  public function resetPassword(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('user', ['email' =>$email])->row_array();

    //cek dulu email user
    if($user){
      //cek token
      $user_token = $this->db->get_where('user_token',['token' => $token] )->row_array();

      if($user_token){
        //kalo semua benar
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();

      }else {
        //kkalo gaada Token
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Reset password gagal! Token salah
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>');
        redirect('auth');
      }
    }else{
      //kalo gak ada
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  Reset password gagal! Email salah
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>');
      redirect('auth');
    }
  }

  public function changePassword(){
    if(!$this->session->userdata('reset_email')){
      redirect('auth');
    }
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
    //validasi form
    if ($this->form_validation->run() == false) {
      $data['title']='Erinnear | Ubah Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/change-password');
      $this->load->view('templates/auth_footer');
    }else {
      // kalo berhasil
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->unset_userdata('reset_email');
      $this->db->delete('user_token', ['email' => $email]);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  Password berhasil diubah
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
