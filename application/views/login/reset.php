<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous">
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#icon-click").click(function(){
      $("#icon").toggleClass("fa-eye-slash");

      var input = $("#pass");
      if(input.attr("type")==="password"){
        input.attr("type","text");
      }
      else{
        input.attr("type","password");
      }

    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#cicon-click").click(function(){
      $("#cicon").toggleClass("fa-eye-slash");

      var input = $("#cpass");
      if(input.attr("type")==="password"){
        input.attr("type","text");
      }
      else{
        input.attr("type","password");
      }

    });
  });
</script>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="margin-bottom: 120px">
    <div class="card-body login-card-body">
        <p class="login-box-msg">New Password</p>
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
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= $this->session->flashdata('success');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
      <form method="post" action="<?=base_url("forgot/password/?hash=".$hash)?>">
        <label for="pass">New Password</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" id="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <a href="#" class="text-dark" id="icon-click">
                <i class="fas fa-eye" id="icon"></i>
              </a>
            </div>
          </div>
          <small class="form-text text-danger"><?= form_error('password'); ?></small>
        </div>

        <label for="cpass">Confrim Password</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="cpassword" placeholder="Password" autocomplete="off" id="cpass">
          <div class="input-group-append">
            <div class="input-group-text">
              <a href="#" class="text-dark" id="cicon-click">
                <i class="fas fa-eye" id="cicon"></i>
              </a>
            </div>
          </div>
          <small class="form-text text-danger"><?= form_error('cpassword'); ?></small>
        </div>
          <!-- /.col -->
          <div class->
            <button type="submit" class="btn btn-primary btn-block mt-2">Reset</button>
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


