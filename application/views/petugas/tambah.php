
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
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
          <div class="col-lg-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Tambah Petugas</h5>
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
                <form action="" method="post">
                <div class="form-group">
                        <label for="lokasiid">Lokasi</label>
                        <select class="form-control" name="lokasiid" id="lokasiid">
                          <option>--Pilih Lokasi--</option>
                          <?php foreach($lokasi as $lks) : ?>
                            <option value="<?= $lks['id_lokasi']?>"><?=$lks['nama_lokasi']?></option>
                          <?php endforeach ?>  
                        </select>
                        <small class="form-text text-danger"><?= form_error('lokasiid'); ?></small>
                    </div>
                <div class="form-group">
                        <label for="name">Petugas</label>
                        <select class="form-control" name="namapetugas" id="name">
                          <option>--Pilih Petugas--</option>
                          <?php foreach($petugas as $ptgs) : ?>
                            <option><?=$ptgs['nama_user']?></option>
                          <?php endforeach ?>  
                        </select>
                        <small class="form-text text-danger"><?= form_error('namepetugas'); ?></small>
                    </div>
                    <button class="btn btn-primary" type="submit">TAMBAH</button>
                    <button class="btn btn-warning" type="reset">RESET</button>
                    <a href="<?= base_url() ?>petugas" class="btn btn-danger">BACK</a>   
                </form>
               
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
