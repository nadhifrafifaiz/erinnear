<?php

class Auth_model extends CI_model{

  public function insertNewUser(){

    $data=[
      'name' => htmlspecialchars($this->input->post('name', true)),
      'email'=> htmlspecialchars($this->input->post('email',true)),
      'image'=> 'default.jpg',
      'password'=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'role_id'=>2,
      'is_active'=>0,
      'date_created'=>time(),
      'point' =>0
    ];

    

    $this->db->insert('user', $data);
  }

  public function getDataUser(){
    //mengambil email dan password dari login page
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    //mengembalikan hasil query database
    return $this->db->get_where('user', ['email'=>$email])->row_array();
  }

}
