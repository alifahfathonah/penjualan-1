<form action="<?php echo site_url('/obat/') ?>" method="POST">
	<div class="modal-body">
		<input type="text" name="id_obat" value="<?php echo $data[0]->id_obat;?>">
		<div class="row">
    <div class="col-sm-12">
      <div class="form-group form-floating-label">
            <input name="nama_obat" value="<?php echo $data[0]->nama_obat;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">Obat</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="jenis_obat" value="<?php echo $data[0]->jenis_obat;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">Jenis Obat</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="satuan" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <option value="Box" <?php if($data[0]->satuan == 'Box'){ echo 'selected'; }?>>Box</option>
              <option value="Pcs" <?php if($data[0]->satuan == 'Pcs'){ echo 'selected'; }?>>Pcs</option>
              <option value="Pack" <?php if($data[0]->satuan == 'Pack'){ echo 'selected'; }?>>Pack</option>
              <option value="Carton" <?php if($data[0]->satuan == 'Carton'){ echo 'selected'; }?>>Carton</option>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Satuan</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="kategori" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <option value="Fast Moving" <?php if($data[0]->kategori == 'Fast Moving'){ echo 'selected'; }?>>Fast Moving</option>
              <option value="Slow Moving" <?php if($data[0]->kategori == 'Slow Moving'){ echo 'selected'; }?>>Slow Moving</option>
              <option value="Dead Stock" <?php if($data[0]->kategori == 'Dead Stock'){ echo 'selected'; }?>>Dead Stock</option>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Kategori</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="expired" value="<?php echo $data[0]->expired;?>" autocomplete="off" id="inputFloatingLabel2" type="date" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder" style="position:absolut; font-size: 85%!important;transform: translate3d(0,-10px,0);top: 0;opacity: 1;padding: .375rem 0 .75rem;font-weight: 600;">Expired</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="harga_beli" value="<?php echo $data[0]->harga_beli;?>" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" required>
            <label for="inputFloatingLabel2" class="placeholder">Harga Beli</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="harga_jual" value="<?php echo $data[0]->harga_jual;?>" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" required>
            <label for="inputFloatingLabel2" class="placeholder">Harga Jual</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="id_supplier" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <?php 
                $query = $this->db->get('supplier');
                foreach ($query->result() as $row)
                {
              ?>
                <option value="<?php echo $row->id_supplier;?>" <?php if($data[0]->id_supplier == $row->id_supplier){ echo 'selected'; }?>><?php echo $row->nama_supplier;?></option>
              <?php	} ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Supplier</label>
          </div>
      </div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>