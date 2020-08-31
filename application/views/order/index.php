
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

                <h3 class="section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-6">
                  <div class="team-member">
                      <img class="mx-auto rounded-circle" src="<?=base_url('/assets/img/team/3.jpg')?>" alt="" />
                      <h4 class="">Select T-Shirt Color and Size</h4>
                      <p class="text-muted"># Langkah 1</p>

                  </div>
              </div>


              <div class="col-lg-3 col-md-6">
                  <div class="team-member">
                      <img class="mx-auto rounded-circle" src="<?=base_url('/assets/img/team/2.jpg')?>" alt="" />
                      <h4 class="">Upload Your Own Design</h4>
                      <p class="text-muted"># Langkah 2</p>

                  </div>
              </div>


              <div class="col-lg-3 col-md-6">
                  <div class="team-member">
                      <img class="mx-auto rounded-circle" src="<?=base_url('/assets/img/team/1.jpg')?>" alt="" />
                      <h4 class=""><?=$user['name'];  ?></h4>
                      <p class="text-muted"># Langkah 3</p>

                  </div>
              </div>

              <div class="col-lg-3 col-md-6">
                  <div class="team-member">
                      <img class="mx-auto rounded-circle" src="<?=base_url('/assets/img/team/3.jpg')?>" alt="" />
                      <h4 class=""><?=$user['name'];  ?></h4>
                      <p class="text-muted"># Langkah 4</p>

                  </div>
              </div>
            </div>



    </section>


    <!-- Order Form-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">PESAN SEKARANG</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
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
                    <button class="btn btn-social mx-auto" id="change-black" type="button" name="button" style="background-color: #2b2b2b;"></button>
                    <button class="btn btn-dark btn-social mx-auto"id="change-white" type="button" name="button" style="background-color: white;"></button>
                    <button class="btn btn-social mx-auto"id="change-green" type="button" name="button" style="background-color: #043927 ;"></button>
                    <button class="btn btn-social mx-auto"id="change-gray" type="button" name="button" style="background-color: gray;"></button>
                    <button class="btn btn-social mx-auto"id="change-red" type="button" name="button" style="background-color: #8B0000;"></button>
                    <button class="btn btn-social mx-auto"id="change-navy" type="button" name="button" style="background-color: #000080;"></button>
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
                        <option value="White">Hijau</option>
                      </select>
                    </div>
                    <?= form_error('color', '<small class="text-danger pl-3">','</small>');  ?>
                  </div>

                  <div class="form-group row">
                    <label for="color" class="col-sm-2 col-form-label">Posisi Desain</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="position" name="position" >
                        <option value="">Pilih Posisi Desain</option>
                        <option value="Front">Depan</option>
                        <option value="Back">Belakang</option>
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


            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
            </div>
        </div>
    </section>
