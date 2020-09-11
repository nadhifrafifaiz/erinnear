
    <!-- Cart-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Cart</h2>
            </div>
            <div class="row">
                <div class="col">
                  <table class="table">
                    <?php if ($this->cart->contents()  == null): ?>
                      <p class="text-center ">Anda Tidak Memiliki Barang di Keranjang Belanja</p>

                    <?php else: ?>
                  <thead>
                    <tr>

                      <th scope="col">Aksi</th>
                      <th scope="col">Desain</th>
                      <th scope="col">Tipe</th>
                      <th scope="col">Warna</th>
                      <th scope="col">Posisi</th>
                      <th scope="col">Ukuran</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Total Harga</th>
                    </tr>
                  </thead>



                  <tbody>
                    <?php foreach($this->cart->contents() as $items):  ?>
                    <tr>
                      <td>
                        <a class="btn btn-danger" href="<?=base_url('order/removeCart/'). $items['rowid'] ?>"> Hapus</a>
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
                    <h5 class="card-title">Kesimpulan</h5>
                    <table class="table">
                      <tr>
                        <td>Subtotal</td>
                        <td><?="Rp. " . number_format($this->cart->total())  ?></td>
                      </tr>

                      <tr>
                        <td>Ongkir</td>
                        <?= $this->session->flashdata('message');  ?>
                        <td>
                          <form class="" action="<?=base_url('order/checkShipping');  ?>" method="post">
                            <div class="form-group">
                               <label for="exampleFormControlSelect1">Provinsi Tempat Anda Tinggal</label>
                               <select class="form-control" id="province" name="province">
                                 <option value =" ">Pilih Provinsi</option>
                                 <?php foreach ($province as $p):?>
                                 <option value ="<?=$p->province_id?>"><?=$p->province_name?></option>
                                <?php endforeach ?>
                               </select>
                               <label for="exampleFormControlSelect1">Kota Tempat Anda Tinggal</label>
                               <select class="form-control" id="destination" name="destination">
                                 <option value =" ">Pilih Kota</option>
                               </select>
                               <small class="form-text text-danger"><?= form_error('destination');  ?></small>
                             </div>


                            <button type="submit" class="btn btn-primary" id="refresh">Cek Ongkir</button>
                          </form>

                          <?php if($this->session->userdata('shippingCost')) : ?>
                          <div class="card mt-4">

                            <div class="card-body">
                              <hr>

                              <p class="card-text">JNE - <?=  $this->session->userdata('service')['service'];  ?>
                                                  - <?= $this->session->userdata('service')['description'];  ?>
                                                  : Rp. <?= $this->session->userdata('shippingCost');  ?></></p>
                              <p class="card-text">Kota Tujuan <?= $this->session->userdata('destination');  ?></p>

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
                <a href="<?=base_url('order')  ?>" class="btn btn-secondary follow-div">Pesan Lagi</a>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-6">
              </div>
              <div class="col-lg-6">
                <a href="<?=base_url('order/checkout')  ?>" class="btn btn-primary follow-div">Checkout</a>

              </div>
            </div>
            <?php endif; ?>





        </div>
    </section>
