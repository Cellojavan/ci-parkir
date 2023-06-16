
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <a href="<?= base_url('')?>login/logout" class="btn btn-danger  float-right ">Logout</a>
              </li>
            </ul>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-12">
          


          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Data User</h5>
              </div>
              <div class="card-body">
                <?php if($this->session->flashdata('flash')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Data berhasil <strong><?= $this->session->flashdata('flash');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('login')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('login');?>&nbsp<strong><?= $this->session->userdata('hak_akses');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
              <a href="<?= base_url('')?>user/tambah" class="btn btn-primary mb-3 ">Tambah User</a>

              <div class="row">
                  <div class="col-md-5">
                    <form action="" method="post">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Search" autocomplete="off">
                        <div class="input-group-append">
                          <input type="submit" class="btn btn-primary"  name="submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Email</th>
                        <th scope="col">NoHp</th>
                        <th scope="col">HakAkses</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php foreach($user as $us) : ?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $us['nama_user'] ?></td>
                        <td><?= $us['username'] ?></td>
                        <td><?= $us['password'] ?></td>
                        <td><?= $us['email'] ?></td>
                        <td><?= $us['no_wa'] ?></td>
                        <td><?= $us['hak_akses'] ?></td>
                        <td>
                            <a href="<?= base_url()?>user/edit/<?= $us['id_user']?>" class="btn btn-warning">Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $us['id_user']?>">
                              Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus<?= $us['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah anda ingin menghapus data <?= $us['nama_user']?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= base_url()?>user/hapus/<?= $us['id_user']?>" class="btn btn-danger">Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

               
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
