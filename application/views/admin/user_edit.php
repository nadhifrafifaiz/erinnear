


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="col-4">
            <?= $this->session->flashdata('message');  ?>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary mb-2">User</h6>
            </div>
            <div class="card-body ">


              <form action="<?=base_url('admin/changeCustomer')  ?>" method="post">
                <input type="hidden" name="id" value="<?= $customerData['id']; ?>">
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?=$customerData['email']  ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?=$customerData['name']  ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">','</small>');  ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Poin</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="point" name="point" value="<?=$customerData['point']  ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">','</small>');  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Ubah Status Customer</label>
                  <select class="form-control" id="role" name="role" value="<?=$customerData['role_id']  ?>">
                    <option value="2">User</option>
                    <option value="1">Admin</option>

                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

            </div>
          </div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
