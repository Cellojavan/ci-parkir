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
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= $this->session->flashdata('success');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
      <form action="<?=base_url()?>login/login" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
         
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" id="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <a href="#" class="text-dark" id="icon-click">
                <i class="fas fa-eye" id="icon"></i>
              </a>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class->
            <button type="submit" class="btn btn-primary btn-block mt-2">Sign In</button>
          </div>
          <!-- /.col -->
          <p class="mb-1 text-center mt-2" >
          <a href="<?=base_url("login/forgot")?>">I forgot my password</a>
          </p>
        </div>
      </form>

      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


