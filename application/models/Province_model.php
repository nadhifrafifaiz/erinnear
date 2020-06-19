<?php

class Province_model extends CI_model{


  public function fetch_province(){
    //mengembalikan data provinsi dari database
    $this->db->order_by('province_name', 'ASC');
    $query = $this->db->get('province');
    return $query->result();
  }

  public function fetch_city($province_id){
    $this->db->where('province_id', $province_id);
    $this->db->order_by('city_name', 'ASC');
    $query = $this->db->get('city');
    $output =
    '<option value="">Select City</option>';
    foreach ($query->result() as $row) {
      $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
    }
    return $output;
  }



}
