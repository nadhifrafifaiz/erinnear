
    <!-- How To Order-->
    <section class="page-section bg-white" id="services">
        <div class="container ">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">PORTOFOLIO | ERINNEAR</h2>
                <h3 class="section-subheading">@erinnear</h3>
            </div>

            <div class="row  mx-auto text-center mb-5">
            <?php foreach ($photos as $photo): ?>
              <div class="ig-thumbnail col-lg-4 col-md-6 mb-5 ">
                  <div class="portofolio-item">
                      <a href="<?= $photo;  ?>"><img src="<?= $photo  ?>" alt=""></a>
                  </div>
              </div>
            <?php endforeach; ?>
            </div>




          </div>
    </section>

    </section>
