
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Parkir</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="margin-bottom: 120px">
    <div class="card-body login-card-body">
                <?php if($this->session->flashdata('flash')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $this->session->flashdata('flash');?></strong> 
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
                <?php if($this->session->flashdata('success')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $this->session->flashdata('success');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
      <form action="<?=base_url()?>login/forgot" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" placeholder="Email" autocomplete="off" id="Email">
          <small class="form-text text-danger"><?= form_error('email'); ?></small>
          <div class="input-group-append">
            <div class="input-group-text">
              <a href="#" class="text-dark" >
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class->
            <button type="submit" class="btn btn-primary btn-block mt-2">Send Reset Link</button>
          </div>
          <!-- /.col -->
         
        </div>
      </form>

      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


