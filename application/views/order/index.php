
    <!-- How To Order-->
    <section class="page-section bg-white" id="services">
        <div class="container ">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">CARA MEMESAN</h2>

                <div class="row">
                  <div class="col-lg-4">
                    <?=  $this->session->flashdata('message');?>
                  </div>
                </div>

                <h3 class="section-subheading"></h3>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="pesanan">
                    <div class="portofolio-item">
                        <a href="" data-toggle="modal" data-target="#ukuranModal"><img class="mx-auto" src="<?=base_url('/assets/img/pesanan/pesanan1.png')?>" alt="" /></a>
                    </div>
                </div>
                <div class="text-center">
                  <p class="text-muted"># Langkah 1</p>
                  <h4 class="">Pilih Ukuran dan Warna Kaos</h4>
                  <a href="" data-toggle="modal" data-target="#ukuranModal"><p>Klik Untuk Melihat Tabel Ukuran</p></a>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="pesanan">
                  <div class="portofolio-item">
                    <a href="" data-toggle="modal" data-target="#posisiModal"><img class="mx-auto" src="<?=base_url('/assets/img/pesanan/pesanan3.png')?>" alt="" /></a>

                  </div>
                </div>
                <div class="text-center">
                  <p class="text-muted"># Langkah 2</p>
                  <h4 class="">Pilih Letak Desain Sablon</h4>
                  <a href="" data-toggle="modal" data-target="#posisiModal"><p>Klik Untuk Melihat Posisi</p></a>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="pesanan">
                    <div class="portofolio-item">
                        <img class="mx-auto" src="<?=base_url('/assets/img/pesanan/pesanan2.png')?>" alt="" />
                    </div>
                </div>
                <div class="text-center">
                  <p class="text-muted"># Langkah 3</p>
                  <h4 class="">Unggah Desain Anda</h4>

                </div>
              </div>


              <div class="col-lg-3 col-md-6">
                <div class="pesanan">
                    <div class="portofolio-item">
                        <img class="mx-auto" src="<?=base_url('/assets/img/pesanan/pesanan4.png')?>" alt="" />
                    </div>
                </div>
                <div class="text-center">
                  <p class="text-muted"># Langkah 4</p>
                  <h4 class="">Verifikasi Pembayaran</h4>
                </div>
              </div>

            </div>

            <!-- Posisi Modals -->
            <div class="modal fade" id="posisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Posisi Sablon</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body ">
                <div class="pesanan mx-auto">
                    <div class="portofolio-item">
                        <img class="mx-auto" src="<?=base_url('/assets/img/pesanan/posisi-depan.png')?>" alt="" />
                    </div>
                </div>
                <div class="pesanan">
                    <div class="portofolio-item">
                        <img class="mx-auto" src="<?=base_url('/assets/img/pesanan/posisi-belakang.png')?>" alt="" />
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-warning" type="button" data-dismiss="modal">Tutup</button>
              </div>
            </div>
            </div>
            </div>

            <!-- Ukuran Modals -->
            <div class="modal fade" id="ukuranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tabel Ukuran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body ">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Size</th>
                      <th scope="col">Lebar</th>
                      <th scope="col">Tinggi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">S</th>
                      <td>47 cm</td>
                      <td>66 cm</td>
                    </tr>
                    <tr>
                      <th scope="row">M</th>
                      <td>50 cm</td>
                      <td>69 cm</td>
                    </tr>
                    <tr>
                      <th scope="row">L</th>
                      <td>53 cm</td>
                      <td>72 cm</td>
                    </tr>
                    <tr>
                      <th scope="row">XL</th>
                      <td>56 cm</td>
                      <td>74 cm</td>
                    </tr>
                    <tr>
                      <th scope="row">XXL</th>
                      <td>59 cm</td>
                      <td>76 cm</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button class="btn btn-warning" type="button" data-dismiss="modal">Tutup</button>
              </div>
            </div>
            </div>
            </div>


    </section>


    <!-- Order Form-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">PESAN SEKARANG</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>

            <!-- Color Example -->
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="row justify-content-center">
                    <h6 class="section-heading text-uppercase">Contoh Warna</h6>
                </div>
                <div class="row justify-content-center">
                  <div class="t-shirt-order">
                    <img id="gambar" class="mx-auto " src="http://localhost/erinnear/assets/img/shirt_color/1.png" alt="" />
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-8 mx-auto text-center mb-5">
                    <button class="btn btn-dark btn-social mx-auto"id="change-white" type="button" name="button" style="background-color: white;"></button>
                    <button class="btn btn-social mx-auto" id="change-black" type="button" name="button" style="background-color: #2b2b2b;"></button>
                    <button class="btn btn-social mx-auto"id="change-green" type="button" name="button" style="background-color: #54C177 ;"></button>
                    <button class="btn btn-social mx-auto"id="change-gray" type="button" name="button" style="background-color: gray;"></button>
                    <button class="btn btn-social mx-auto"id="change-red" type="button" name="button" style="background-color: #FF6255;"></button>
                    <button class="btn btn-social mx-auto"id="change-navy" type="button" name="button" style="background-color: #0071DF;"></button>
                  </div>
                </div>

              </div>

                <div class="col-lg-6 col-md-12 ">
                  <?= form_open_multipart('order/addToCart');  ?>

                  <div class="form-group row">
                    <label for="size" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="type" name="type" >
                        <option value="">Pilih Jenis</option>
                        <option value="T-Shirt Short Sleeve">T-Shirt Lengan Pendek</option>
                        <option value="T-Shirt Long Sleeve">T-Shirt Lengan Panjang</option>
                      </select>
                    </div>
                    <?= form_error('type', '<small class="text-danger pl-3">','</small>');  ?>
                  </div>

                  <div class="form-group row">
                    <label for="size" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="size" name="size" >
                        <option value="">Pilih Ukuran</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                      </select>
                    </div>
                    <?= form_error('size', '<small class="text-danger pl-3">','</small>');  ?>
                  </div>

                  <div class="form-group row">
                    <label for="color" class="col-sm-2 col-form-label">Warna</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="color" name="color">
                        <option value="">Pilih Warna</option>
                        <option value="Black">Hitam</option>
                        <option value="White">Putih</option>
                        <option value="Green">Hijau</option>
                        <option value="Gray">Abu - Abu</option>
                        <option value="Maroon">Maroon</option>
                        <option value="Navy Blue">Biru Navy</option>
                      </select>
                    </div>
                    <?= form_error('color', '<small class="text-danger pl-3">','</small>');  ?>
                  </div>

                  <div class="form-group row">
                    <label for="color" class="col-sm-2 col-form-label">Posisi Desain</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="position" name="position" >
                        <option value="">Pilih Posisi Desain</option>
                        <option value="Logo">Logo</option>
                        <option value="Depan">Desain Depan</option>
                        <option value="Belakang">Belakang</option>
                        <option value="Utama">Desain Utama</option>
                      </select>
                    </div>
                    <?= form_error('position', '<small class="text-danger pl-3">','</small>');  ?>
                  </div>


                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Jumlah</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity')?>">
                        <?= form_error('quantity', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-2">Desain</div>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="form-group row justify-content-end mt-3">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Masukkan Ke Keranjang</button>
                      </div>
                    </div>
                  </form>


                </div>
            </div>
        </div>
    </section>
