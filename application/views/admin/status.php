


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Order Status</h1>
          <div class="col-4">
            <?= $this->session->flashdata('message');  ?>
          </div>

          <div class="row-lg-6">
            <div class="col-lg-6">
              <a href="<?=base_url('admin/order')  ?>"><h5><?= $customerData['name']." : ".$customerData['orderId']?></h5></a>


                <div class="card">
                  <div class="card-body">
                    <?php if ($customerData['status'] == 1): ?>
                      <h5 class="card-title">Current Status : Wating for payment verification</h5>
                    <?php elseif ($customerData['status'] == 2): ?>
                      <h5 class="card-title">Order are in Progress</h5>
                    <?php elseif ($customerData['status'] == 3): ?>
                      <h5 class="card-title">Order are being Wrapped</h5>
                    <?php elseif ($customerData['status'] == 4): ?>
                      <h5 class="card-title">Package are on the Way</h5>
                    <?php endif; ?>


                    <form class="" action="<?=base_url('admin/changeOrderStatus')  ?>" method="post">
                      <input type="hidden" name="orderId" value="<?= $customerData['orderId']; ?>">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="status" name="status" value="">
                          <option value="1">Waiting for Payment Verification</option>
                          <option value="2">Order are in Progress</option>
                          <option value="3">Order are being Wrapped</option>
                          <option value="4">Package are on the Way</option>
                        </select>
                      </div>

                      <button type="submit" name="button">Edit</button>
                    </form>
                  </div>
                </div>


            </div>
          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
