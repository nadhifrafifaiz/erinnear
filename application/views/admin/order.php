


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Order Management</h1>
          <div class="col-4">
            <?= $this->session->flashdata('message');  ?>
          </div>

          <div class="row-lg-6">
            <div class="col-lg-11">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Note</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orderData as $data):?>
                  <tr>
                    <th>1</th>
                    <th><?= $data['orderId']  ?></th>
                    <th><?= $data['email']  ?></th>
                    <th><?= $data['name']  ?></th>
                    <th><?= $data['phone']  ?></th>
                    <th><?= $data['address']  ?></th>
                    <?php if ($data['status'] = 1): ?>
                      <th>Wating for payment verification</th>
                    <?php endif; ?>
                    <th>
                      <a href="<?= base_url("admin/orderDetail/".$data['orderId'])?>">View</a>
                      <a href="<?= base_url("admin/orderDelete/".$data['orderId'])?>">Delete</a>
                    </th>
                    <th><?= $data['note']  ?></th>
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
