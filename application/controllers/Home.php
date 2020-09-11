<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  public function __construct(){
    parent::__construct();

    $this->load->model('Order_model');
    $this->load->model('User_model');

  }

  public function index(){
    $data['title'] = 'Erinnear | Home';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

    $this->Order_model->getTempCart();



    $this->load->view('templates/home_header',$data);
    $this->load->view('home/index.php',$data);
    $this->load->view('templates/home_footer',$data);
  }


  public function track(){
    $data['title'] = 'Erinnear | Lacak';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

    //laod library
    $this->load->library('pagination');

    //ambil data keyword
    if($this->input->post('cari')){
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    //config
    $config['base_url'] = 'http://localhost/erinnear/Home/track';
    // $config['total_rows'] = $this->Order_model->countAllOrder();
    $this->db->like('name', $data['keyword']);
    $this->db->or_like('orderId', $data['keyword']);
    $this->db->from('order_customer');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 3;

    //initialize
    $this->pagination->initialize($config);

    //ngasih tahu start dari mana
    $data['start'] = $this->uri->segment(3);
    $data['orderData'] = $this->Order_model->getOrder($config['per_page'],$data['start'], $data['keyword']);


    $this->load->view('templates/home_header',$data);
    $this->load->view('home/track.php',$data);
    $this->load->view('templates/home_footer',$data);
  }

  //halaman tenbtang
  public function about(){
    $data['title'] = 'Erinnear | Tentang';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

    $this->load->view('templates/home_header',$data);
    $this->load->view('home/about.php',$data);
    $this->load->view('templates/home_footer',$data);
  }

  //halaman komplain
  public function complaint(){
    $data['title'] = 'Erinnear | Komplain';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

    if(!$this->session->userdata('email')){
      $this->load->view('templates/home_header',$data);
      $this->load->view('home/complaint-empty.php',$data);
      $this->load->view('templates/home_footer',$data);
    }else {
      $this->load->view('templates/home_header',$data);
      $this->load->view('home/complaint.php',$data);
      $this->load->view('templates/home_footer',$data);
    }

  }

  public function addComplaint(){
    //rules form_validation
    $this->form_validation->set_rules('complaint', 'Copmplaint', 'trim|required|max_length[200]');

    if($this->form_validation->run() == false ){
      $this->complaint();
    }else {
      $userComplaint = $this->db->get_where('complaint', ['email'=>$this->session->userdata('email')])->row_array();
      $date = $userComplaint['date_created'];

      if(time()-$date < (60*60*24)){
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Tunggu 24 jam untuk memberikan kritik dan saran lagi
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>');
        redirect('home/complaint');
      }else {
        // berhasil
        $this->User_model->addComplaint();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Masukkan anda telah kami terima, Terima Kasih!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>');
        redirect('home/complaint');
      }


    }

  }
}
