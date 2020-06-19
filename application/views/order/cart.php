
    <!-- Cart-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Cart</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col">
                  <table class="table">
                  <thead>
                    <tr>

                      <th scope="col"> Action</th>
                      <th scope="col">Design</th>
                      <th scope="col">Type</th>
                      <th scope="col">Color</th>
                      <th scope="col">Position</th>
                      <th scope="col">Size</th>
                      <th scope="col">Price</th>
                      <th scope="col">Qty</th>
                      <th scope="col"> Total Price</th>

                    </tr>
                  </thead>



                  <tbody>
                    <?php foreach($this->cart->contents() as $items):  ?>
                    <tr>
                      <td>
                        <a class="btn btn-danger" href="<?=base_url('order/removeCart/'). $items['rowid'] ?>"> Remove</a>
                      </td>
                      <td>
                          <img class="img-cart-table" src="<?= base_url('assets/img/user_design/') . $items['name'];  ?>" />
                      </td>
                      <td><?= $items['type'];  ?></td>
                      <td><?= $items['color'];  ?></td>
                      <td><?= $items['position'];  ?></td>
                      <td><?= $items['size'];  ?></td>
                      <td><?= "Rp. " . number_format($items['price'])  ?></td>
                      <td><?= $items['qty'];  ?></td>
                      <td><?= "Rp. " . number_format($items['qty'] * $items['price']) ?></td>

                    </tr>
                  <?php endforeach; ?>
                  </tbody>

                  </table>
                </div>
            </div>


            <div class="row" id="randomdiv">
              <div class="col-lg-6">
              </div>
              <div class="col-lg-6">
                <div class="card follow-div bg-light">
                  <div class="card-body">
                    <h5 class="card-title">Summary</h5>
                    <table class="table">
                      <tr>
                        <td>Subtotal</td>
                        <td><?="Rp. " . number_format($this->cart->total())  ?></td>
                      </tr>

                      <tr>
                        <td>Shipping</td>
                        <?= $this->session->flashdata('message');  ?>
                        <td>
                          <form class="" action="<?=base_url('order/checkShipping');  ?>" method="post">
                            <div class="form-group">
                               <label for="exampleFormControlSelect1">Provinsi Tempat Anda Tinggal</label>
                               <select class="form-control" id="province" name="province">
                                 <option value =" ">Select Province</option>
                                 <?php foreach ($province as $p):?>
                                 <option value ="<?=$p->province_id?>"><?=$p->province_name?></option>
                                <?php endforeach ?>
                               </select>
                               <label for="exampleFormControlSelect1">Kota Tempat Anda Tinggal</label>
                               <select class="form-control" id="destination" name="destination">
                                 <option value =" ">Select City</option>
                               </select>
                               <small class="form-text text-danger"><?= form_error('destination');  ?></small>
                             </div>


                            <button type="submit" class="btn btn-primary" id="refresh">Check Shipping</button>
                          </form>

                          <?php if($this->session->userdata('shippingCost')) : ?>
                          <div class="card mt-4">

                            <div class="card-body">
                              <hr>

                              <p class="card-text">JNE - <?=  $this->session->userdata('service')['service'];  ?>
                                                  - <?= $this->session->userdata('service')['description'];  ?>
                                                  : Rp. <?= $this->session->userdata('shippingCost');  ?></></p>
                              <p class="card-text">Estimated for <?= $this->session->userdata('destination');  ?></p>

                              <hr>


                            </div>
                          </div>
                        <?php endif;  ?>

                        </td>
                      </tr>

                      <tr>
                        <td>Total</td>
                        <td><strong><?="Rp. " . number_format($this->session->userdata('shippingCost') + $this->cart->total())  ?></strong></td>
                      </tr>

                    </table>



                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-lg-6">
              </div>
              <div class="col-lg-6">
                <a href="<?=base_url('order')  ?>" class="btn btn-secondary follow-div">Order Again</a>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-6">
              </div>
              <div class="col-lg-6">
                <a href="<?=base_url('order/checkout')  ?>" class="btn btn-primary follow-div">Checkout</a>

              </div>
            </div>






        </div>
    </section>
