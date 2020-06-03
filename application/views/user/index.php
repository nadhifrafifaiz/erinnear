
    <!-- Services-->
    <section class="page-section bg-white" id="services">
        <div class="container mt-5 ">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">PROFILE</h2>

                <div class="row">
                  <div class="col">
                    <?=  $this->session->flashdata('message');?>
                  </div>
                </div>

                <h3 class="section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>

            <div class="row">
                <div class="col">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="<?=base_url('/assets/img/profile/'). $user['image']?>" alt="" />
                        <h4 class=""><?=$user['name'];  ?></h4>
                        <p class="text-muted"><?=$user['email'];  ?></p>

                    </div>
                </div>

            </div>

            <div class="row justify-content-center">
              <a class="btn btn-primary btn-lg text-uppercase js-scroll-trigger" href="<?= base_url('user/edit')  ?>">Edit Profile</a>
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
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                  </table>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
            </div>
        </div>
    </section>
