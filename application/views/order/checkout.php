<!-- Checkout Form-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Checkout</h2>
            <?= $this->session->flashdata('message');  ?>
            <h3 class="section-subheading text-muted"></h3>
        </div>


          <div class="row">
              <div class="col-lg-6 col-md-12 ">

                <h4 class="mb-4">Pembayaran dan Pengiriman</h4>

                  <form class="" action="<?=base_url('order/placeOrder')  ?>" method="post">

                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Nama</label>
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
                      <label for="name" class="col-sm-3 col-form-label">Nomor Telepon</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone')  ?>">
                        <?= form_error('phone', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address')?>"/>
                        <?= form_error('address', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="province" class="col-sm-3 col-form-label">Provinsi</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="province" name="province">
                          <option value =" ">Pilih Provinsi</option>
                          <?php foreach ($province as $p):?>
                          <option value ="<?=$p->province_id?>"><?=$p->province_name?></option>
                         <?php endforeach ?>
                        </select>
                        <?= form_error('province', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="city"  class="col-sm-3 col-form-label">Kota</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="destination" name="destination">
                          <option value =" ">Pilih Kota</option>
                        </select>
                        <?= form_error('destination', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>





                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Kode Pos</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="zip" name="zip" value="<?= set_value('zip')  ?>"/>
                        <?= form_error('zip', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 ">
                    <h4 class="mb-4">Informasi Tambahan</h4>
                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Notes</label>
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
              <h4 class="mb-4">Pesanan Anda</h4>
              <table class="table">
                <tr>
                  <th>Produk</th>
                  <th>Jumlah</th>
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
                  <th>Ongkir</th>
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

          <div class="row text-right mt-3 mr-4 justify-content-right">
            <div class="col">
              <h5>Anda Memiliki
                <?php if (!$this->session->userdata('email')):?>
                <?= "0"; ?>
              <?php else: ?>
                <?=$user['point']?>
              <?php endif; ?>
                Points</h5>
              <p>Gunakan 100 poin untuk gratis ongkos kirim</p>
              <a href="<?=base_url('order/usepoint')  ?>" class="btn btn-primary">Gunakan Poin</a>
              <a href="<?=base_url('order/unusepoint')  ?>" class="btn btn-danger">Batalkan</a>
            </div>
          </div>

        </div>
      </div>

      <div class="card mt-5">
        <div class="card-body">
          <div class="row">
              <div class="col-lg-8 "><h4 class="mb-4">Pembayaran -  Transfer Bank</h4></div>
          </div>
          <div class="card">
            <div class="card-body bg-light">
              <div class="row">
                  <div class="col-lg-12 ">
                    <div class="form-check">
                      <h6>Silahkan melakukan pembayaran ke rekening BANK BCA A/N Fadlan Hidayatulloh 517 079 5000</h6>
                    </div>
                  </div>
              </div>
            </div>
          </div>

          <button class="btn btn-primary mt-3" type="submit" name="tambah">Pesan</button>
          </form>
        </div>
      </div>




  </div>

    </div>
</section>
