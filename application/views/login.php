
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Login Penjualan</title>
				<link rel="shortcut icon" href="<?=base_url()?>assets/img/icon.jpeg">
        <!-- Custom CSS -->
        <link href="<?=base_url()?>assets/css/styles.css" rel="stylesheet">
				<!-- Custom Color Option -->
				<link href="<?=base_url()?>assets/css/colors.css" rel="stylesheet">
    </head>
    <body style="height:100%">
			<div id="" style="background-image: url('<?=base_url()?>assets/img/background.jpg');height: 635px;">
				<!-- ========================== SignUp Elements ============================= -->
					<div class="container" style="padding-top:10%">
						<div class="row">
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								<form action="<?php echo site_url('/auth/login') ?>" method="POST">
								<div class="card">
									<div class="card-header">
										<?php if($data == '0'){?>
											<button class="col-md-12 btn btn-danger" disabled="disabled">Login Gagal</button>
										<?php } ?>
										<div class="card-title">Sign In
									</div>
									<div class="card-body pb-0">
										<div class="d-flex">
											<div class="col-md-12">
												<div class="form-group">
													<label>Username</label>
													<input autocomplete="off" type="text" name="username" class="form-control" placeholder="Username" required>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<div class="col-md-12">
												<div class="form-group">
													<label>Password</label>
													<input autocomplete="off" type="password" name="password" class="form-control" placeholder="Password" required>
												</div>
											</div>
										</div>
										<div class="separator-dashed"></div>
										<div class="d-flex">
											<div class="col-md-12">
												<div class="form-group">
													<button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								</form>
							</div>
							<div class="col-md-3">
							</div>
						</div>
					</div>
				<!-- ========================== Login Elements ============================= -->
			</div>
			<!-- CSS Files -->
			<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="<?=base_url()?>assets/css/atlantis.min.css">
			<script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
			<!-- Datatables -->
			<script src="<?=base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>
	</body>
</html>