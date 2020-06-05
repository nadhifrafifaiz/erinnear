
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
                      <th scope="col">Color</th>
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
                      <td><?= $items['color'];  ?></td>
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


            <div class="row">
              <div class="col-lg-8">
              </div>
              <div class="col-lg-4">
                <table class="table">
                  <tr>
                    <th>Subtotal</th>
                    <td><?="Rp. " . number_format($this->cart->total())  ?></td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-lg-8">
              </div>
              <div class="col-lg-4">
                <a href="<?=base_url('order')  ?>" class="btn btn-secondary btn-follow-div">Order Again</a>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-8">
              </div>
              <div class="col-lg-4">
                <button type="submit" name="button" class="btn btn-primary btn-follow-div">Check Out</button>
              </div>
            </div>






        </div>
    </section>
