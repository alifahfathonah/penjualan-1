<form action="<?php echo site_url('/pembelian/item/'.$data[0]->id_pembelian) ?>" method="POST">
	<div class="modal-body">
    <input type="hidden" name="id_pembelian" value="<?php echo $data[0]->id_pembelian;?>">
		<input type="hidden" name="id_detail_masuk" value="<?php echo $data[0]->id_detail_masuk;?>">
		<input type="hidden" name="harga" value="<?php echo $data[0]->harga;?>">
		<div class="row">
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="id_obat" class="form-control input-solid" id="selectFloatingLabel2" required>
              <?php 
                $this->db->select('*');
                $this->db->from('obat');                            
                $this->db->where('obat.id_obat',$data[0]->id_obat);
                $query = $this->db->get();            
                foreach ($query->result() as $row)
                {
              ?>
                <option value="<?php echo $row->id_obat;?>" <?php if($row->id_obat == $data[0]->id_obat){ echo 'selected'; }?>><?php echo $row->nama_obat;?></option>
              <?php	} ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Obat</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input value="<?php echo $data[0]->qty;?>" name="qty" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" size="20" required>
            <label for="inputFloatingLabel2" class="placeholder">Qty</label>
          </div>
      </div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>