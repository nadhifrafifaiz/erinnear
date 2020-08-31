<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends CI_Controller{




  public function index(){
    $url = 'https://graph.instagram.com/me/media?access_token=IGQVJVbzZAZARUtfWjVVcGFiTnRoeU5TN2E5Ukwtc0h2U3NtZAFp2WHF0LWUwaG5EZAXN0Q2tvNjBiak1fUWowOXp3anlfUGo2RGJMYWsyRWhxOEtkOXIzbnRJc3ROYW1HdUt3UzhSNVkzcWRETS1VYzNZAXwZDZD&fields=id,media_type,media_url,username,timestamp';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, true);

    //ambil media url
    $photos =[];
    foreach ($result['data'] as $photo) {
      $photos[] = $photo['media_url'];
    }


    $data['title'] = 'Erinnear | Portofolio';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
    $data['photos'] = $photos;
    $this->load->view('templates/home_header',$data);
    $this->load->view('portofolio/index.php',$data);
    $this->load->view('templates/home_footer',$data);
  }
}

 ?>
