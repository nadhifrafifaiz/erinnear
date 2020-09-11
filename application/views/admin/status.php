


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="col-4">
            <?= $this->session->flashdata('message');  ?>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary mb-2">Order Status</h6>
              <a href="<?=base_url('admin/order')  ?>"><h4><?= $customerData['name']." : ".$customerData['orderId']?></h4></a>
            </div>
            <div class="card-body ">
              <?php if ($customerData['status'] == 1): ?>
                <h1 class="card-title text-warning">Menunggu Pembayaran</h1>
              <?php elseif ($customerData['status'] == 2): ?>
                <h1 class="card-title text-info">Pesanan Sedang di Proses</h1>
              <?php elseif ($customerData['status'] == 3): ?>
                <h1 class="card-title text-info">Pesanan Sedang di Kemas</h1>
              <?php elseif ($customerData['status'] == 4): ?>
                <h1 class="card-title text-primary">Pesanan Sudah Bersama Kurir</h1>
              <?php endif; ?>


              <form class="" action="<?=base_url('admin/changeOrderStatus')  ?>" method="post">
                <input type="hidden" name="orderId" value="<?= $customerData['orderId']; ?>">
                <input type="hidden" name="email" value="<?= $customerData['email']; ?>">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Ubah Status Pesanan</label>
                  <select class="form-control" id="status" name="status" value="">
                    <option value="1">Menunggu Pembayaran</option>
                    <option value="2">Pesanan Sedang di Proses</option>
                    <option value="3">Pesanan Sedang di Kemas</option>
                    <option value="4">Pesanan Sudah Bersama Kurir</option>
                  </select>
                </div>

                <button class="btn btn-primary" type="submit" name="button">Ubah</button>
              </form>
            </div>
          </div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
