


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Order Detail</h1>
          <div class="col-4">
            <?= $this->session->flashdata('message');  ?>
          </div>

          <div class="row-lg-6">
            <div class="col-lg-11">
              <a href="<?=base_url('admin/order')  ?>"><h5><?= $customerData['name']." : ".$customerData['orderId']?></h5></a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Design</th>
                    <th scope="col">Type</th>
                    <th scope="col">Size</th>
                    <th scope="col">Position</th>
                    <th scope="col">Color</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orderDetail as $detail):?>
                  <tr>
                    <th>1</th>
                    <th><?= $detail['orderId']  ?></th>
                    <th><img class="img-cart-table" src="<?= base_url('assets/img/user_design/') . $detail['design'];  ?>" /></th>
                    <th><?= $detail['type']  ?></th>
                    <th><?= $detail['size']  ?></th>
                    <th><?= $detail['position']?></th>
                    <th><?= $detail['color']  ?></th>
                    <th><?= $detail['qty']  ?></th>
                    <th><?= $detail['price']  ?></th>
                </tr>
                  <?php endforeach; ?>
                </tbody>
                </table>
            </div>
          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
