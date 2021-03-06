<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Penjualan Obat</title>
	<link rel="shortcut icon" href="<?=base_url()?>assets/img/icon.jpeg">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=base_url()?>assets/img/icon.ico" type="image/x-icon"/>
	<!-- Fonts and icons -->
	<script src="<?=base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=base_url()?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/atlantis.min.css">
</head>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>
<body>
<div class="content">
  <div class="row">
    <div class="col-md-3" style="text-align:right">
      <img src="<?=base_url()?>assets/img/icon.jpeg" width="100px">
    </div>
    <div class="col-md-6">
      <H1 style="text-align:center">APOTEK SUMBER SEHAT</H1>
      <H2 style="text-align:center">Jl. Aes Nasution No. 11 RT. 13</H2>
      <H2 style="text-align:center">Tlp (0511) 3253675</H2>
    </div>
    <div class="col-md-3">
    </div>
  </div>
  <div class="dropdown-divider"></div>
  <div class="dropdown-divider"></div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="table table-bordered-bd-*states" boder='1'>
            <thead>
              <tr>
                <th>No</th>
                <th>ID Customer</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>No Tlp</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php $grand_total=0; ?>
              <?php foreach($data as $u){ ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $u->id_customer ?></td>
                <td><?php echo $u->nama_customer ?></td>
                <td><?php echo $u->alamat ?></td>
                <td><?php echo $u->kota ?></td>
                <td><?php echo $u->no_telp ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4" style="text-align:center">Banjarmasin, <?php echo date('d F Y');?></div>
        </div>
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4" style="text-align:center">Penanggung Jawab</div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4" style="text-align:center"><?php echo $this->session->userdata("nama_pegawai"); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
<!-- Datatables -->
<script src="<?=base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>
</body>
</html>