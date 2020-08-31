


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Riwayat Pesanan</h1>
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
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orderHistory as $data):?>

                    <?php if($data['status'] !== 5): ?>
                    <?php endif; ?>
                  <tr>
                    <td><?= ++$start?></td>
                    <td><a href="<?= base_url("admin/orderDetail/".$data['orderId'])?>" ><?= $data['orderId']  ?></a></td>
                    <td><?= $data['email']  ?></td>
                    <td><?= $data['name']  ?></td>
                    <td><?= $data['phone']  ?></td>
                    <td><?= $data['address']  ?></td>
                    <td><?= date('d F Y', $data['date_created']);  ?></td>

                </tr>
                  <?php endforeach; ?>
                </tbody>
                </table>
            </div>
          </div>

          <!-- Pagination -->
          <?=$this->pagination->create_links();  ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
