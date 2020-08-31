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


  public function placeOrder(){
    $orderId = uniqid('order-');

    if ($this->session->userdata('email')) {
      $email = $this->session->userdata('email');
    }
    $email = $this->input->post('email');

    $name = $this->input->post('fullname');
    $phone = $this->input->post('phone');
    $address = $this->input->post('address');
    // Ngubah kode kota menjadi nama kota
    $town_data = $this->db->get_where('city',['city_id' =>$this->input->post('destination')])->row_array();
    $town = $town_data["city_name"];

    // Ngubah kode provinsi menjadi nama provinsi
    $province_data = $this->db->get_where('province',['province_id' =>$this->input->post('province')])->row_array();
    $province = $province_data["province_name"];

    $zip = $this->input->post('zip');
    $note = $this->input->post('note');
    $status = 1;

    $data=[
      'orderId'=> htmlspecialchars($orderId),
      'email'=> htmlspecialchars($email),
      'name'=> htmlspecialchars($name),
      'phone'=>htmlspecialchars($phone),
      'address'=>htmlspecialchars($address),
      'town'=>htmlspecialchars($town),
      'province'=>htmlspecialchars($province),
      'zip'=>htmlspecialchars($zip),
      'note'=>htmlspecialchars($note),
      'date_created'=>time(),
      'status'=>$status
    ];

    $this->db->insert('order_customer', $data);



    foreach ($this->cart->contents() as $items) {
      $design = $items['name'];
      $type = $items['type'];
      $size = $items['size'];
      $position = $items['position'];
      $color = $items['color'];
      $qty = $items['qty'];
      $priceBefore = $items['qty'] * $items['price'];
      $price = $priceBefore + $this->session->userdata('shippingCost');

      $data=[
        'orderId'=> htmlspecialchars($orderId),
        'design'=> htmlspecialchars($design),
        'type'=> htmlspecialchars($type),
        'size'=>htmlspecialchars($size),
        'position'=>htmlspecialchars($position),
        'color'=>htmlspecialchars($color),
        'qty'=>htmlspecialchars($qty),
        'price'=>htmlspecialchars($price)
      ];

      $this->db->insert('order_item', $data);
    }

  }

  //ambil seluruh data order
  public function getOrder(){
    $this->db->select('*');
    $this->db->from('order_customer');
    $this->db->where('status !=' , 5);
    $orderData = $this->db->get()->result_array();

    // $orderData = $this->db->get_where('order_customer', ['status'=>5])->result_array();
    // $orderData = $this->db->get('order_customer')->result_array();
    return($orderData);

  }

  public function getDataOrder($limit, $start, $keyword = null){
    //kalo user searching
    if($keyword){
      $this->db->like('name', $keyword);
      $this->db->or_like('orderId', $keyword);
    }
    $this->db->order_by('date_created', 'DESC');
    return $orderData = $this->db->get_where('order_customer', ['status!='=>5],$limit, $start)->result_array();

    // return $this->db->get_where('order_customer', ['status'=>5], $limit, $start)->result_array();
    // return $this->db->get('order_customer', $limit, $start)->result_array();
  }


  public function getSuccessOrder($limit, $start){
    $orderData = $this->db->get_where('order_customer', ['status'=>5],$limit, $start)->result_array();
    // $orderData = $this->db->get('order_customer')->result_array();
    return($orderData);

  }

  //dipakai di User
  public function getOrderByUser(){
    return $this->db->get_where('order_customer', ['email'=>$this->session->userdata('email')])->result_array();
  }

  public function getOrderDetail($orderId){
    $orderDetail = $this->db->get_where('order_item', ['orderId'=>$orderId])->result_array();
    return($orderDetail);
  }

  public function getCustomerData($orderId){
    $customerData = $this->db->get_where('order_customer', ['orderId'=>$orderId])->row_array();
    return($customerData);
  }

  public function deleteOrder($orderId){
    $this->db->where('orderId', $orderId);
    $this->db->delete('order_customer');

    $this->db->where('orderId', $orderId);
    $this->db->delete('order_item');
  }

  public function changeOrderStatus(){

    $this->db->set('status', $this->input->post('status'));
    $this->db->where('orderId', $this->input->post('orderId'));
    $this->db->update('order_customer');
  }

  public function doneOrder($orderId){
    $this->db->set('status', 5);
    $this->db->where('orderId', $orderId);
    $this->db->update('order_customer');
  }

  public function countAllOrder(){
    return $this->db->get('order_customer')->num_rows();
  }

  public function countSuccessOrder(){
    return $this->db->get_where('order_customer', ['status'=>5])->num_rows();
  }



}
