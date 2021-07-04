<form action="<?php echo site_url('/gaji/') ?>" method="POST">
	<div class="modal-body">
		<input type="hidden" name="id_gaji" value="<?php echo $data[0]->id_gaji;?>">
		<input type="hidden" name="id_pegawai_old" value="<?php echo $data[0]->id_pegawai;?>">
		<input type="hidden" name="bulan_old" value="<?php echo $data[0]->bulan;?>">
		<input type="hidden" name="tahun_old" value="<?php echo $data[0]->tahun;?>">
		<div class="row">
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="id_pegawai" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <?php 
                $this->db->select('*');
                $this->db->from('pegawai');                            
                $query = $this->db->get();            
                foreach ($query->result() as $row)
                {
              ?>
                <option value="<?php echo $row->id_pegawai;?>" <?php if($row->id_pegawai == $data[0]->id_pegawai){ echo 'selected'; }?>><?php echo $row->nama_pegawai;?></option>
              <?php	} ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Pegawai</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="bulan" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <?php
              $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
              for($bulan=1; $bulan<=12; $bulan++){
              ?>
                <option value='<?php echo $bln[$bulan]?>' <?php if(strtoupper($bln[$bulan]) == strtoupper($data[0]->bulan)){ echo 'selected'; }?>><?php echo $bln[$bulan]; ?></option>";
              <?php } ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Bulan</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="tahun" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <?php
              $thn=date('Y');
              echo $thn_min=date('Y', strtotime('-1 year', strtotime( $thn ))); 
              echo $thn_plus=date('Y', strtotime('+1 year', strtotime( $thn ))); 
              for($x=$thn_min; $x<=$thn_plus; $x++){
              ?>
                <option value='<?php echo $x; ?>' <?php if($x == $data[0]->tahun){ echo 'selected';} ?>><?php echo $x?></option>
              <?php 
              }
              ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Tahun</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="gaji_pokok" value="<?php echo $data[0]->gaji_pokok;?>" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">Gaji Pokok</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="gaji_lembur" value="<?php echo $data[0]->gaji_lembur;?>" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" >
            <label for="inputFloatingLabel2" class="placeholder">Gaji Lembur</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="lembur_perjam" class="form-control input-solid" id="selectFloatingLabel2" >
              <option value="">&nbsp;</option>
              <?php
              for($x='1'; $x<=8; $x++){
              ?>
                <option value='<?php echo $x; ?>' <?php if($x == $data[0]->lembur_perjam){ echo 'selected';} ?>><?php echo $x?></option>
              <?php 
              }
              ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Lembur Perjam</label>
          </div>
      </div>
    </div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>