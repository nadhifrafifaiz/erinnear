<?php

class User_model extends CI_model{


  public function getDataUser(){
    //mengembalikan hasil query database
    return $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
  }

  public function getUserTransaction(){
    //mengambil banyaknya transaksi user yang berhasil
    return $this->db->get_where('order_customer', ['email'=>$this->session->userdata('email')])->num_rows();

  }

  //mengecek referal
  public function referalCek($email,$referal){
    return($this->db->get_where('referal',['email'=>$email,'email_referal'=>$referal])->num_rows());
  }

  public function referalEmailCek($email,$referal){
    return $this->db->get_where('user', ['email'=>$referal])->num_rows();
  }

  public function referalPoin($email,$referal){
    $point = 100;

    $user = $this->db->get_where('user', ['email'=>$email])->row_array();
    $userPoint = $user['point'] + $point;
    $this->db->set('point', $userPoint);
    $this->db->where('email', $email);
    $this->db->update('user');

    $userReferal = $this->db->get_where('user', ['email'=>$referal])->row_array();
    $userPoint = $userReferal['point'] + $point;
    $this->db->set('point', $point);
    $this->db->where('email', $referal);
    $this->db->update('user');

    $data=[
      'email'=>$email,
      'email_referal' =>$referal
    ];

    $this->db->insert('referal', $data);
  }

  public function referalPlus(){
    $this->db->set('point', $this->session->userdata('pointTemp'));
    $this->db->where('email', $this->session->userdata('email'));
    $this->db->update('user');
  }

  public function referalMinus(){
    $point = 100;
    $user = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
    $userPoint = $user['point'] - $point;
    $this->db->set('point', $userPoint);
    $this->db->where('email', $this->session->userdata('email'));
    $this->db->update('user');
  }

}
