


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">User Management</h1>
          <div class="col-4">
            <?= $this->session->flashdata('message');  ?>
          </div>

          <!-- Input Pencarian -->
          <div class="row">
            <div class="col-lg-4 md-4">
              <form class="" action="<?= base_url('Admin/complaintManagement')  ?>" method="post">
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
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Komplain</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($userComplaint)): ?>
                    <tr>
                      <td colspan="12" style="text-align: center;">
                        <p>Data Tidak Ditemukan</p>
                      </td>
                    </tr>
                  <?php endif;  ?>
                  <?php foreach ($userComplaint as $data):?>
                  <tr>
                    <td><?= ++$start?></td>

                    <td><?= $data['name']  ?></td>
                    <td><?= $data['email']  ?></td>
                    <td><?= $data['complaint']  ?></td>
                    <th><?= date('d F Y', $data['date_created']);  ?></th>
                    <th>
                      <a href="" class="badge badge-danger ml-3 " data-toggle="modal" data-target="#deleteModal"> Delete </a>

                      <!-- Delete Modals -->
                      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus Komplain Secara Permanen</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Komplain dari <?= $data['name']?></div>
                        <div class="modal-footer">
                          <button class="btn btn-warning" type="button" data-dismiss="modal">Tidak</button>
                          <a class="btn btn-danger" href="<?= base_url("admin/userComplaintDelete/".$data['id'])?>">Hapus</a>
                        </div>
                      </div>
                      </div>
                      </div>
                    </th>

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
