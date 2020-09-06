<!-- How To Order-->
<section class="page-section bg-white" id="services">
    <div class="container ">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Lacak pesanan</h2>
            <p class="section-heading mb-5">Lacak pesanan</p>

        </div>

        <!-- Input Pencarian -->
        <div class="row justify-content-center">
          <div class="col-lg-4 md-4">
            <form class="" action="<?= base_url('home/track')  ?>" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Cari" autocomplete="off">
                <div class="input-group-append">
                  <input class="btn btn-warning" type="submit" name="cari"></input>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Table -->
        <div class="row-lg-6">
          <div class="col-lg-12">
            <!-- <h5>Hasil Pencarian : <?= $total_rows; ?></h5> -->
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
                  <th scope="col">Date</th>
                  <th scope="col">Note</th>
                </tr>
              </thead>
              <tbody>
                <?php if(empty($orderData)): ?>
                  <tr>
                    <td colspan="12" style="text-align: center;">
                      <p>Data Tidak Ditemukan</p>
                    </td>
                  </tr>
                <?php endif;  ?>
                <?php foreach ($orderData as $data):?>

                  <?php if($data['status'] !== 5): ?>
                  <?php endif; ?>
                <tr>
                  <td><?= ++$start?></td>

                  <td><?= $data['orderId']  ?></td>
                  <td><?= $data['email']  ?></td>
                  <td><?= $data['name']  ?></td>
                  <td><?= $data['phone']  ?></td>
                  <td><?= $data['address']  ?></td>

                  <?php if ($data['status'] == 1): ?>
                    <th>Menunggu Pembayaran</th>
                  <?php elseif ($data['status'] == 2): ?>
                    <th>Pesanan Sedang Di Proses</th>
                  <?php elseif ($data['status'] == 3): ?>
                    <th>Pesanan Sedang di Kemas</th>
                  <?php elseif ($data['status'] == 4): ?>
                    <th>Pesanan Sudah Bersama Kurir</th>
                  <?php elseif ($data['status'] == 5): ?>
                    <th>Pesanan Sudah Selesai</th>
                  <?php endif; ?>

                  <th><?= date('d F Y', $data['date_created']);  ?></th>
                  <th><?= $data['note']  ?></th>
              </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
          </div>
        </div>

        <!-- Pagination -->
        <?=$this->pagination->create_links();  ?>





      </div>
</section>
