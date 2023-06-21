
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
          <div class="col-sm-4">

            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Data Petugas</h5>
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
                <?php if($this->session->flashdata('error')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong><?= $this->session->flashdata('error');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
              <a href="<?= base_url('')?>petugas/tambah" class="btn btn-primary mb-3 ">Tambah Petugas</a>

              <div class="row">
                  <div class="col-md-5">
                    <form action="" method="post">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keywoard" placeholder="Search" autocomplete="off">
                        <div class="input-group-append">
                          <input type="submit" class="btn btn-primary"  name="submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>


                <nav aria-label="...">
                <ul class="pagination">
                <?php if($this->input->post('submit') !== null) : ?>
                  <?php redirect(base_url('petugas?halaman=1'))?>
                <?php endif?>
                  
                  
                 
                  <?php if($this->session->userdata('jumlahhalamanpetugas') !== null) :?>
                    <?php $halamansesi = $this->session->userdata('jumlahhalamanpetugas')?>
                    
                    <?php if($halamansesi == 1) : ?>

                    <?php else : ?>
                      <?php if($halamanAktif1 > 1) : ?>
                        <li class="page-item">
                          <a class="page-link" href="?halaman=<?=$halamanAktif1 - 1;?>">&laquo <span class="sr-only">(current)</span></a>
                        </li>
                      <?php endif?>
                    <?php ?>
                      <?php for( $i = 1; $i <= $halamansesi; $i++ ) :?>
                      <?php if($i == $halamanAktif1 ) :?>
                        <li class="page-item active">
                          <a class="page-link" href="?halaman=<?=$i;?>"><?=$i;?> <span class="sr-only">(current)</span></a>
                        </li>
                      <?php else :?>
                        <li class="page-item">
                          <a class="page-link" href="?halaman=<?=$i;?>"><?=$i;?> <span class="sr-only">(current)</span></a>
                        </li>
                      <?php endif ;?>
                      <?php endfor?>
                      <?php if($halamanAktif1 < $halamansesi) : ?>
                        <li class="page-item">
                          <a class="page-link" href="?halaman=<?=$halamanAktif1 + 1 ;?>">&raquo <span class="sr-only">(current)</span></a>
                        </li>
                      <?php endif?>
                    <?php endif ?>
                    


                  <?php else :?>

                    <?php if($jumlahHalaman1 == 1) : ?>

                    <?php else : ?>
                      <?php if($halamanAktif1 > 1) : ?>
                      <li class="page-item">
                        <a class="page-link" href="?halaman=<?=$halamanAktif1 - 1;?>">&laquo <span class="sr-only">(current)</span></a>
                      </li>
                    <?php endif?>
                  <?php ?>
                    <?php for( $i = 1; $i <= $jumlahHalaman1; $i++ ) :?>
                    <?php if($i == $halamanAktif1 ) :?>
                      <li class="page-item active">
                        <a class="page-link" href="?halaman=<?=$i;?>"><?=$i;?> <span class="sr-only">(current)</span></a>
                      </li>
                    <?php else :?>
                      <li class="page-item">
                        <a class="page-link" href="?halaman=<?=$i;?>"><?=$i;?> <span class="sr-only">(current)</span></a>
                      </li>
                    <?php endif ;?>
                    <?php endfor?>
                    <?php if($halamanAktif1 < $jumlahHalaman1) : ?>
                      <li class="page-item">
                        <a class="page-link" href="?halaman=<?=$halamanAktif1 + 1 ;?>">&raquo <span class="sr-only">(current)</span></a>
                      </li>
                    <?php endif?>
                    <?php endif ?>
                

                    
                  <?php endif?>
               
                </ul>
                </nav>
                </nav>
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col"> Lokasi</th>
                        <th scope="col">Name Petugas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php $id = ($jumlahDataPerhalaman * $halamanAktif1) - 3; ?>

                <tbody>
                <?php if(empty($petugas)): ?>
                      
                      <div class="alert alert-danger" role="alert">
                          Data not found!
                      </div>
                    
                <?php endif ;?>
                    <?php foreach($petugas as $ptg) : ?>
                    <tr>
                        <td><?= $id++;?></td>
                        <td><?= $ptg['nama_lokasi'] ?></td>
                        <td><?= $ptg['nama_petugas'] ?></td>
                          
                        <td>
                            <a href="<?= base_url()?>petugas/edit/<?= $ptg['id_petugas']?>" class="btn btn-warning">Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $ptg['id_petugas']?>">
                              Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus<?= $ptg['id_petugas']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah anda ingin menghapus data <?= $ptg['nama_petugas']?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= base_url()?>petugas/delete/<?= $ptg['id_petugas']?>" class="btn btn-danger">Hapus</a>
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
