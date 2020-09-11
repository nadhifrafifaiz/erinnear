  <div class="container">


    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
              </div>
              <form class="user" action="<?= base_url('auth/registration')  ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama" value="<?= set_value('name'); ?>">
                  <!-- untuk memprint error dari form validation di controller auth/registration -->
                  <?= form_error('name', '<small class="text-danger pl-3">','</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                  <!-- untuk memprint error dari form validation di controller auth/registration -->
                  <?= form_error('email', '<small class="text-danger pl-3">','</small>');  ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <!-- untuk memprint error dari form validation di controller auth/registration -->
                    <?= form_error('password1', '<small class="text-danger pl-3">','</small>');  ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-warning btn-user btn-block">
                  Registrasi Akun
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?=base_url('auth/forgotpassword')  ?>">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=base_url('auth/');?>">Sudah memiliki  akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
