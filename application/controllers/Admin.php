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
}
