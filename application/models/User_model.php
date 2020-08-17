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


}
