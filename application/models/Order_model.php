<?php

class Order_model extends CI_model{

  public function insertTempCart(){


      $cartContentString = serialize($this->cart->contents());
      $check = $this->db->get_where('cart', ['email'=>$this->session->userdata('email')])->row_array();

      if($check == null){
        $data=[
        'email' =>$this->session->userdata('email'),
        'string' => $cartContentString
        ];


        $this->db->insert('cart', $data);

      }else var_dump("ada");

      $email = $this->session->userdata('email');
      $data=['string'=>$cartContentString];
      $this->db->where('email', $email);
      $this->db->update('cart', $data);



  }



  public function getTempCart(){
    $tempCart = $this->db->get_where('cart', ['email'=>$this->session->userdata('email')])->row_array();

    $cartContentString = unserialize($tempCart['string']);
    $this->cart->insert($cartContentString);
  }



}
