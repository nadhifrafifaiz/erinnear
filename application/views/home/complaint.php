
<!-- Team-->
<section class="page-section bg-white" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Kritik dan Saran</h2>
            <h3 class="section-subheading text-muted">Silahkan berikan kritik dan saran anda kepada kami</h3>
            <?= $this->session->flashdata('message');  ?>
        </div>

        <div class="row ">
          <div class="col-lg-6 mx-auto">
            <form action="<?=base_url('home/addComplaint')  ?>" method="post">
              <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" readonly="true">

              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="email" class="form-control" name="name" id="name" value="<?= $user['name'] ?>" readonly="true">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Kritik dan Saran</label>
                <?= form_error('complaint', '<small class="text-danger pl-3">','</small>');  ?>
                <textarea class="form-control" name="complaint" id="complaint" rows="3" maxlength="200"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>


    </div>
</section>
