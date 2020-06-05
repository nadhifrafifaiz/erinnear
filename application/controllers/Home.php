<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  public function __construct(){
    parent::__construct();

    $this->load->model('Order_model');

  }

  public function index(){
    $data['title'] = 'Erinnear | Home';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

    $this->Order_model->getTempCart();



    $this->load->view('templates/home_header',$data);
    $this->load->view('home/index.php',$data);
    $this->load->view('templates/home_footer',$data);
  }
}
