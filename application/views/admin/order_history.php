


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Riwayat Pesanan</h1>
          <div class="col-4">
            <?= $this->session->flashdata('message');  ?>
          </div>

          <!-- Input Pencarian -->
          <div class="row">
            <div class="col-lg-4 md-4">
              <form class="" action="<?= base_url('Admin/orderHistory')  ?>" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="keyword" placeholder="Cari" autocomplete="off">
                  <div class="input-group-append">
                    <input class="btn btn-warning" type="submit" name="cari"></input>
                  </div>
                </div>
              </form>
            </div>
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
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($orderHistory)): ?>
                    <tr>
                      <td colspan="12" style="text-align: center;">
                        <p>Data Tidak Ditemukan</p>
                      </td>
                    </tr>
                  <?php endif;  ?>
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
                    <td>
                    <a href="" class="badge badge-danger ml-3 " data-toggle="modal" data-target="#deleteModal">Delete</a>
                    </td>

                    <!-- Delete Modals -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pesanan Secara Permanen</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">Pesanan dengan ID <?= $data['orderId']?>, Atas Nama <?= $data['name']  ?></div>
                      <div class="modal-footer">
                        <button class="btn btn-warning" type="button" data-dismiss="modal">Batalkan</button>
                        <a class="btn btn-danger" href="<?= base_url("admin/orderDelete/".$data['orderId'])?>">Hapus</a>
                      </div>
                    </div>
                    </div>
                    </div>

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
