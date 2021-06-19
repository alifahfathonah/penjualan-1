<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model
{

	public function list(){
		// NOTE : menampilkan data list keseluruhan penjualan dan di join dengan customer
		$this->db->select('*')
              ->from('penjualan')
              ->join('customer', 'customer.id_customer=penjualan.id_customer','left');
		return $this->db->get();
	}
	public function insert(){
    // NOTE : buat id_penjualan primary
    $this->db->select_max('id_penjualan');
    $query = $this->db->get('penjualan');
    $val=$query->result();
    $datadb = substr($val[0]->id_penjualan,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_penjualan,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_penjualan = $tgl. sprintf("%04s",$q3);

		$this->db->set('id_penjualan', $id_penjualan);
		$this->db->set('status', 'Proses');
		$this->db->insert('penjualan');
	}
	public function penjualan($id){
		// NOTE : menampilkan data pembelian untuk header form detail transaksi_pembelian
		$this->db->select('*,penjualan.id_penjualan as id_penjualan')
              ->from('penjualan')
              ->join('customer', 'customer.id_customer=penjualan.id_customer','left')
              ->join('resep', 'resep.id_penjualan=penjualan.id_penjualan','left')
							->where('penjualan.id_penjualan',$id);
		return $this->db->get();
	}
	public function list_item($id){
		// NOTE : menampilkan detail penjualan di join dengan customer, detail transaksi_penjualan, obat
		$this->db->select('*')
              ->from('penjualan')
              ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan=penjualan.id_penjualan')
              ->join('obat', 'obat.id_obat=transaksi_penjualan.id_obat')
							->where('penjualan.id_penjualan',$id);
		return $this->db->get();
	}
	public function edit_data()
	{
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_penjualan')
							->where('id_penjualan', $this->input->post('id_penjualan'));
		$query = $this->db->get();
    $val=$query->result();
		if(isset($val[0]->total)){
			$tot=$val[0]->total;
		}else{
			$tot=0;
		}

		// NOTE : edit data transaksi penjualan
		$this->db->set('id_customer', $this->input->post('id_customer'));
		if($this->input->post('tanggal_penjualan') != '' AND $this->input->post('tanggal_penjualan') != '0000-00-00'){
			$this->db->set('tanggal_penjualan', $this->input->post('tanggal_penjualan'));
		}
		if($this->input->post('jam_penjualan') != '' AND $this->input->post('jam_penjualan') != '00:00:00'){
			$this->db->set('jam_penjualan', $this->input->post('jam_penjualan'));
		}
		$this->db->set('status', $this->input->post('status'));
		$this->db->set('grand_total', $tot);
		$this->db->where('id_penjualan', $this->input->post('id_penjualan'));
		$this->db->update('penjualan');

		// NOTE : cek jika status penjualan nya dipilih "DONE" akan update ke stok di tabel obat
		if($this->input->post('status') == 'Done'){
			$this->db->select('*')
								->from('transaksi_penjualan')
								->where('id_penjualan',$this->input->post('id_penjualan'));
			$query = $this->db->get();
			foreach ($query->result() as $row)
			{
				// NOTE : cek stok di tabel obat sebelumnya berapa
				$this->db->select('stok');
				$this->db->from('obat');                            
				$this->db->where('id_obat',$row->id_obat);
				$queryobat = $this->db->get();  
				$valobat=$queryobat->result();

				// NOTE : update stok ke tabel obat
				$this->db->set('stok', $valobat[0]->stok - $row->qty);
				$this->db->where('id_obat', $row->id_obat);
				$this->db->update('obat');
			}
		}
		
		// NOTE : insert tabel resep jika no resep tidak kosong / di isi
		if($this->input->post('no_resep') != null AND $this->input->post('no_resep') != ''){
			// NOTE : cek id penjualan sudah ada di tabel resep belum
			$jml_resep = 0;
			$this->db->select('id_resep')
								->from('resep')
								->where('id_penjualan', $this->input->post('id_penjualan'));
			$jml_resep = $this->db->get()->num_rows();

			// NOTE : cek jml id penjualan di resep
			if($jml_resep == 0){
				// NOTE : buat id_pembelian resep
				$this->db->select_max('id_resep');
				$query = $this->db->get('resep');
				$val=$query->result();
				$datadb = substr($val[0]->id_resep,0,6);
				$tgl    = date('ymd');
				if($datadb == $tgl){
					$q3     = (int) substr($val[0]->id_resep,6,4);
					$q3++;
				}else{
					$q3 = '1';
				}
				$id_resep = $tgl. sprintf("%04s",$q3);
				
				$this->db->set('id_resep', $id_resep);
				$this->db->set('id_penjualan', $this->input->post('id_penjualan'));
				$this->db->set('no_resep', $this->input->post('no_resep'));
				if($this->input->post('tanggal_resep') != '' AND $this->input->post('tanggal_resep') != '0000-00-00'){
					$this->db->set('tanggal_resep', $this->input->post('tanggal_resep'));
				}
				$this->db->set('dokter', $this->input->post('dokter'));
				$this->db->set('keterangan', $this->input->post('keterangan'));
				$this->db->insert('resep');
			}else{
				$this->db->set('no_resep', $this->input->post('no_resep'));
				if($this->input->post('tanggal_resep') != '' AND $this->input->post('tanggal_resep') != '0000-00-00'){
					$this->db->set('tanggal_resep', $this->input->post('tanggal_resep'));
				}
				$this->db->set('dokter', $this->input->post('dokter'));
				$this->db->set('keterangan', $this->input->post('keterangan'));
				$this->db->where('id_penjualan', $this->input->post('id_penjualan'));
				$this->db->update('resep');
			}
		}
	}
	public function insert_item(){
		// NOTE : cek id obat di tabel detail pembelian sudah ada tau belum jika ada update, kosong insert
    // NOTE : buat id_pembelian primary
    $this->db->select_max('id_detail_penjualan');
    $query = $this->db->get('transaksi_penjualan');
    $val=$query->result();
    $datadb = substr($val[0]->id_detail_penjualan,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_detail_penjualan,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_detail_penjualan = $tgl. sprintf("%04s",$q3);

		// NOTE : cek harga ke tabel obat
		$this->db->select('harga_jual');
		$this->db->from('obat');                            
		$this->db->where('id_obat',$this->input->post('id_obat'));
		$queryobat = $this->db->get();  
    $valobat=$queryobat->result();
    $total = $valobat[0]->harga_jual * $this->input->post('qty');

		// NOTE : simpan ke tabel detail pembelian
		$this->db->set('id_detail_penjualan', $id_detail_penjualan);
		$this->db->set('id_obat', $this->input->post('id_obat'));
		$this->db->set('harga', $valobat[0]->harga_jual);
		$this->db->set('qty', $this->input->post('qty'));
		$this->db->set('total', $total);
		$this->db->set('id_penjualan', $this->input->post('id_penjualan'));
		$this->db->insert('transaksi_penjualan');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_penjualan')
							->where('id_penjualan',$this->input->post('id_penjualan'));
		$query = $this->db->get();
    $val=$query->result();
		if(isset($val[0]->total)){
			$tot=$val[0]->total;
		}else{
			$tot=0;
		}
		// NOTE : update grand total ke tabel pembelian
		$this->db->set('grand_total', $tot);
		$this->db->where('id_penjualan', $this->input->post('id_penjualan'));
		$this->db->update('penjualan');
	}
	public function delete_item($id,$id_penjualan){
		// NOTE : delete item detail transaksi pembelian
		$this->db->where('id_detail_penjualan', $id);
		$this->db->delete('transaksi_penjualan');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_penjualan')
							->where('id_penjualan',$id_penjualan);
		$query = $this->db->get();
    $val=$query->result();
		if(isset($val[0]->total)){
			$tot=$val[0]->total;
		}else{
			$tot=0;
		}

		// NOTE : update ke tabel pembelian
		$this->db->set('grand_total', $tot);
		$this->db->where('id_penjualan', $id_penjualan);
		$this->db->update('penjualan');
	}
	public function update ($id){
		// NOTE : menampilkan data get date edit item di modal 
		$this->db->where('id_detail_penjualan', $id);
		return $this->db->get('transaksi_penjualan');
	}
	public function edit_item (){
		// NOTE : update data transaksi pembelian
    $total = $this->input->post('harga') * $this->input->post('qty');
		$this->db->set('qty', $this->input->post('qty'));
		$this->db->set('total', $total);
		$this->db->where('id_detail_penjualan', $this->input->post('id_detail_penjualan'));
		$this->db->update('transaksi_penjualan');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_penjualan')
							->where('id_penjualan',$this->input->post('id_penjualan'));
		$query = $this->db->get();
    $val=$query->result();
		if(isset($val[0]->total)){
			$tot=$val[0]->total;
		}else{
			$tot=0;
		}

		// NOTE : update ke tabel pembelian
		$this->db->set('grand_total', $tot);
		$this->db->where('id_penjualan', $this->input->post('id_penjualan'));
		$this->db->update('penjualan');
	}
	public function delete($id){
		// NOTE : delete di tabel penjualan
		$this->db->where('id_penjualan', $id);
		$this->db->delete('penjualan');

		// NOTE : delete di tabel detail penjualan
		$this->db->where('id_penjualan', $id);
		$this->db->delete('transaksi_penjualan');
	}
	public function penjualan_dash(){
		$q = $this->db->get('penjualan'); 
		return $q->num_rows();
	}
	public function list_lap(){
		// NOTE : menampilkan data laporan
		
		$this->db->select(" transaksi_penjualan.id_penjualan, tanggal_penjualan, nama_customer, 
												grand_total, GROUP_CONCAT(CONCAT_WS('=', nama_obat, qty)SEPARATOR '; ') as item ")
              ->from('penjualan')
              ->join('customer', 'customer.id_customer=penjualan.id_customer','left')
              ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan=penjualan.id_penjualan')
              ->join('obat', 'obat.id_obat=transaksi_penjualan.id_obat')
							->where('status', 'Done')
							->group_by('transaksi_penjualan.id_penjualan');
		return $this->db->get();
	}
}
?>