

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900">Ubah Password</h1>
                    <h5 class="mb-4"><?= $this->session->userdata('reset_email');  ?></h5>
                  </div>
                  <?=$this->session->flashdata('message')  ?>

                  <form class="user" action="<?= base_url('auth/changepassword')  ?>" method="post">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan Password Baru">
                      <?= form_error('password1', '<small class="text-danger pl-3">','</small>');  ?>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                      <?= form_error('password2', '<small class="text-danger pl-3">','</small>');  ?>
                    </div>

                    <button type="submit" class="btn btn-warning btn-user btn-block">
                      Reset Password
                    </button>
                    <hr>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
