<?php

class User_model extends CI_model{


  public function getDataUser(){
    //mengembalikan hasil query database
    return $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
  }



}
