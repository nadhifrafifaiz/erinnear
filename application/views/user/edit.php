
    <!-- Edit Profile-->
    <section class="page-section bg-light two" id="team" >
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Edit profile</h2>
                <?=  $this->session->flashdata('message');?>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <!-- Form edit Profile -->
            <div class="row">
                <div class="col lg-6">
                  <?= form_open_multipart('user/edit');  ?>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?=$user['email']  ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?=$user['name']  ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">','</small>');  ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2">Picture</div>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <img src="<?=base_url('assets/img/profile/'). $user['image']  ?>" alt="" class="img-thumbnail">
                          </div>
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
                        <button type="submit" class="btn btn-primary">Edit Profile</button>
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
