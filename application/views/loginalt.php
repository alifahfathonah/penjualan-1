<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PENJUALAN</title>

	<link rel="icon" type="image/png" href="<?=site_url()?>assets/img/icon.jpeg"/>
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=site_url()?>/assets/login/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=site_url()?>/assets/login/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=site_url()?>/assets/login/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color: #48abf7;">
<div class="login-box">
  <div class="login-logo">
    <a><b>PENJUALAN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg"><b>Silahkan Login Terlebih Dahulu</b></p>
      
      <?php if($data == '0'){?>
					<div class="wrap-input100 validate-input btn btn-danger">
					</div>
				<?php } ?>
      <form action="<?=site_url('/auth/login')?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=site_url()?>/assets/login/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=site_url()?>/assets/login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=site_url()?>/assets/login/dist/js/adminlte.min.js"></script>
</body>
</html>
