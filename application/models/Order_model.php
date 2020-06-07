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
    $town = $this->input->post('town');
    $province = $this->input->post('province');
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


  public function getOrder(){
    $orderData = $this->db->get('order_customer')->result_array();
    return($orderData);

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



}
