<!-- Checkout Form-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Checkout</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>


          <div class="row">
              <div class="col-lg-6 col-md-12 ">

                <h4 class="mb-4">Billing & Shipping</h4>

                  <form class="" action="<?=base_url('order/placeOrder')  ?>" method="post">

                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?= set_value('fullname')  ?>">
                        <?= form_error('fullname', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                    <?php if($this->session->userdata('email')):?>
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="email" name="email" value="<?= $this->session->userdata('email')  ?>" readonly>
                          <?= form_error('fullname', '<small class="text-danger pl-3">','</small>');  ?>
                        </div>
                      </div>
                    <?php else : ?>
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email')  ?>">
                          <?= form_error('fullname', '<small class="text-danger pl-3">','</small>');  ?>
                        </div>
                      </div>
                    <?php endif; ?>


                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Phone Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone')  ?>">
                        <?= form_error('phone', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address')?>"/>
                        <?= form_error('address', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Town/City</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="town" name="town" value="<?= set_value('town')  ?>"/>
                        <?= form_error('town', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Province</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="province" name="province" value="<?= set_value('province')  ?>"/>
                        <?= form_error('province', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Postcode / ZIP</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="zip" name="zip" value="<?= set_value('zip')  ?>"/>
                        <?= form_error('zip', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 ">
                    <h4 class="mb-4">Additional Information (Optional)</h4>
                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Order Notes</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="note" name="note"/>

                      </div>
                    </div>
                </div>
            </div>
    </div>
</section>

<!-- Your Order-->
<section class="page-section bg-white" id="team">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row mt-3">
            <div class="col">
              <h4 class="mb-4">Your Order</h4>
              <table class="table">
                <tr>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Desain</th>
                  <th>Total</th>
                </tr>

                  <?php foreach ($this->cart->contents() as $items): ?>
                <tr>
                  <td><?= strtoupper($items['type'])?></td>
                  <td><?= $items['qty']?></td>
                  <td>
                    <img class="img-cart-table" src="<?= base_url('assets/img/user_design/') . $items['name'];  ?>" />
                  </td>
                  <td><?= "Rp. " . number_format($items['qty'] * $items['price']) ?></td>
                <?php endforeach; ?>
                </tr>

                <tr>
                  <th>Subtotal</th>
                  <th></th>
                  <th></th>
                  <th><?="Rp. " . number_format($this->cart->total())?></th>
                </tr>
                <tr>
                  <th>Shipping</th>
                  <th></th>
                  <th></th>
                  <th><?="Rp. " . number_format($this->session->userdata('shippingCost'))?></th>
                </tr>
                <tr>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th><strong><?="Rp. " . number_format($this->session->userdata('shippingCost') + $this->cart->total())  ?></strong></th>
                </tr>
              </table>
            </div>

          </div>

        </div>
      </div>

      <div class="card mt-5">
        <div class="card-body">
          <div class="row">
              <div class="col-lg-8 "><p class="large text-muted">Direct Bank Transfer</p></div>
          </div>
          <div class="card">
            <div class="card-body bg-light">
              <div class="row">
                  <div class="col-lg-8 "><p class="large text-muted">silahkan melakukan pembayaran ke rekening BANK BCA atas nama FIRMANSYAH PATRIAMAN 517 079 5000</p></div>
              </div>
            </div>
          </div>

          <button class="btn btn-primary mt-3" type="submit" name="tambah">Place Order</button>
          </form>
        </div>
      </div>




  </div>


  <div class="row">
      <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
  </div>

    </div>
</section>
