
    <!-- Services-->
    <section class="page-section bg-white" id="services">
        <div class="container ">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">PROFILE</h2>
                <div class="row">
                  <div class="col">
                    <?=  $this->session->flashdata('message');?>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="<?=base_url('/assets/img/profile/'). $user['image']?>" alt="" />
                        <h4 class=""><?=$user['name'];  ?></h4>
                        <p class="text-muted"><?=$user['email'];  ?></p>
                        <div class="row justify-content-center">
                          <a class="btn btn-primary btn-lg text-uppercase js-scroll-trigger" href="<?= base_url('user/edit')  ?>">Edit Profile</a>
                        </div>


                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="team-member">
                        <h4 class="text-muted">Points</h4>
                        <h1 class=""><?=$user['point'];  ?></h1>
                        <h4 class="text-muted">Banyak Pesanan</h4>
                        <h1 class=""><?= $transaction?></h1>
                        <h4 class="text-muted">Member Sejak</h4>
                        <h2 class="mb-4"><?= date('d F Y', $user['date_created']);  ?></h2>

                        <div class="row justify-content-center">
                          <div class="col-lg-6">
                              <form class="" action="<?= base_url('User/referal')  ?>" method="post">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Email Teman Anda" name="referal">
                                <div class="input-group-append">
                                  <input class="btn btn-primary" type="submit" name="submit"></input>
                                </div>
                              </div>
                              </form>
                          </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>

    </section>


    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Order History</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $num = 1; ?>
                      <?php foreach ($orderUser as $data):?>
                      <tr>
                        <th><?= $num?></th>
                        <?php $num++; ?>
                        <th><?= $data['orderId']  ?></th>
                        <th><?= $data['email']  ?></th>
                        <th><?= $data['name']  ?></th>
                        <th><?= $data['phone']  ?></th>

                        <?php if ($data['status'] == 1): ?>
                          <th>Wating for payment verification</th>
                        <?php elseif ($data['status'] == 2): ?>
                          <th>Order are in Progress</th>
                        <?php elseif ($data['status'] == 3): ?>
                          <th>Order are being Wrapped</th>
                        <?php elseif ($data['status'] == 4): ?>
                          <th>Package are on the Way</th>
                        <?php elseif ($data['status'] == 5): ?>
                          <th>Selesai</th>
                        <?php endif; ?>
                    </tr>
                      <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
            </div>
        </div>
    </section>
