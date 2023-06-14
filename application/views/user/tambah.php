
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
                <h5 class="m-0">Tambah User</h5>
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
                <?php if($this->session->flashdata('cek')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Username sudah <strong><?= $this->session->flashdata('cek');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <form action="" method="post">
       <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('name'); ?></small>
        </div>
       <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username"  name="username" placeholder="Enter Username" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('username'); ?></small>
        </div>
       <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password"  name="password" placeholder="Enter Password" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('password'); ?></small>
        </div>
       <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email"  name="email" placeholder="Enter Email" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('email'); ?></small>
        </div>
       <div class="form-group">
            <label for="nohp">NoHp</label>
            <input type="text" class="form-control" id="nohp"  name="nohp" placeholder="Enter NoHp" autocomplete="off">
            <small class="form-text text-danger"><?= form_error('nohp'); ?></small>
        </div>
        <div class="form-group">
            <label for="hakakses">HakAkses</label>
            <select class="form-control" id="hakakses" name="hakakses">
            <option></option>
            <option>admin</option>
            <option>manager</option>
            <option>petugas</option>
            </select>
            <small class="form-text text-danger"><?= form_error('hakakses'); ?></small>
        </div>
        <button class="btn btn-primary" type="submit">TAMBAH</button>
        <button class="btn btn-warning" type="reset">RESET</button>
        <a href="<?= base_url() ?>" class="btn btn-danger">BACK</a>   
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
