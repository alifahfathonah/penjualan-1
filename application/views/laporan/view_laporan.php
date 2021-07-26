<div class="page-header">
	<h4 class="page-title">Laporan</h4>
	<ul class="breadcrumbs">
		<li class="nav-home">
			<a href="#">
				<i class="flaticon-database"></i>
			</a>
		</li>
	</ul>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-body">
      <form action="<?php echo site_url('/laporan') ?>" method="POST" target="_blank">
        <div class="row row-demo-grid">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body">
                <label for="selectFloatingLabel2" class="placeholder">Jenis Laporan</label>
                <select name="laporan" id="laporan" onchange="myFunction()" class="form-control input-solid" id="selectFloatingLabel2" required>
                  <option value="">-- Pilih Laporan --</option>
                  <option value="Kategori">Kategori</option>
                  <option value="Supplier">Supplier</option>
                  <option value="Obat">Obat</option>
                  <option value="Dokter">Dokter</option>
                  <option value="Customer">Customer</option>
                  <option value="Pegawai">Pegawai</option>
                  <option value="Pembelian">Pembelian</option>
                  <option value="Penjualan">Penjualan</option>
                  <option value="Gaji">Pengajian</option>
                </select>
              </div>
            </div>
          </div>
        </div>
				<div id="myDIV" style="display:none;">
					<div class="row row-demo-grid">
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body">
                    <label for="inputFloatingLabel2" class="placeholder">Transaksi Dari Tanggal</label>
                    <input required style="font-size:13px;" name="dari" id="dari" autocomplete="off" id="inputFloatingLabel2" type="date" class="form-control input-solid" size="20">
                </div>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body">
                    <label for="inputFloatingLabel2" class="placeholder">Transaksi Sampai Tanggal</label>
                    <input required style="font-size:13px;" name="sampai" id="sampai" autocomplete="off" id="inputFloatingLabel2" type="date" class="form-control input-solid" size="20">
                </div>
              </div>
            </div>
          </div>
        </div>
				<div id="myGaji" style="display:none;">
					<div class="row row-demo-grid">
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body">
                    <label for="inputFloatingLabel2" class="placeholder">Bulan</label>
                    <select name="bulan" class="form-control input-solid" id="bulan" required>
                      <option value="">&nbsp;</option>
                      <?php
                      $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
                      for($bulan=1; $bulan<=12; $bulan++){
                        echo "<option value='$bln[$bulan]'>$bln[$bulan]</option>";
                      }
                      ?>
                    </select>
                </div>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body">
                    <label for="inputFloatingLabel2" class="placeholder">Tahun</label>
                    <select name="tahun" class="form-control input-solid" id="tahun" required>
                      <option value="">&nbsp;</option>
                      <?php
                      $thn=date('Y');
                      echo $thn_min=date('Y', strtotime('-1 year', strtotime( $thn ))); 
                      echo $thn_plus=date('Y', strtotime('+1 year', strtotime( $thn ))); 
                      for($x=$thn_min; $x<=$thn_plus; $x++){
                      ?>
                        <option value='<?php echo $x; ?>' <?php if($x == $thn){ echo 'selected';} ?>><?php echo $x?></option>
                      <?php 
                      }
                      ?>
                    </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
		</div>
	</div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("laporan").value;
  console.log(x);
  if (x === "Pembelian" || x === "Penjualan" ) {
    document.getElementById("myDIV").style.display = "block";
    document.getElementById("dari").required=true;
    document.getElementById("sampai").required=true;
    
    document.getElementById("myGaji").style.display = "none";
    document.getElementById("tahun").required=false;
    document.getElementById("bulan").required=false;
  }else  if (x === "Gaji") {
    document.getElementById("myDIV").style.display = "none";
    document.getElementById("dari").required=false;
    document.getElementById("sampai").required=false;

    document.getElementById("myGaji").style.display = "block";
    document.getElementById("tahun").required=true;
    document.getElementById("bulan").required=true;
  } else {
    document.getElementById("myDIV").style.display = "none";
    document.getElementById("dari").required=false;
    document.getElementById("sampai").required=false;
    
    document.getElementById("myGaji").style.display = "none";
    document.getElementById("tahun").required=false;
    document.getElementById("bulan").required=false;
  }
}
</script>
<script src="<?=base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>