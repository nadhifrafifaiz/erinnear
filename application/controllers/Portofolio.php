<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends CI_Controller{




  public function index(){
    $url = 'https://graph.instagram.com/me/media?access_token=IGQVJXVjVmcUlLWnNFazd6SUM1U3VDNTZAXUHZAXaFB2Um9iS1ZAEU3I1UHZAFb2xtSGdsd2xHRlJYaGliY2RzZA08yVElRclA3aFFWUS1iRXRXSnBWeFZAua0RWZAFBZAMHlNSm5Ba1c1N3VBRlY2Yzhmczc0MQZDZD&fields=id,media_type,media_url,username,timestamp';
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
