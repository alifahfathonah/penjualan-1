<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_m extends CI_Model
{
	public function list(){
		$this->db->select('obat.*, nama_supplier')
              ->from('obat')
              ->join('supplier', 'supplier.id_supplier = obat.id_supplier');
		return $this->db->get();
	}
	public function insert(){
    // NOTE : buat id_obat primary
    $this->db->select_max('id_obat');
    $query = $this->db->get('obat');
    $val=$query->result();
    $datadb = substr($val[0]->id_obat,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_obat,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_obat = $tgl. sprintf("%04s",$q3);

		$this->db->set('id_obat', $id_obat);
		$this->db->set('nama_obat', $this->input->post('nama_obat'));
		$this->db->set('jenis_obat', $this->input->post('jenis_obat'));
		$this->db->set('satuan', $this->input->post('satuan'));
		$this->db->set('kategori', $this->input->post('kategori'));
		$this->db->set('expired', $this->input->post('expired'));
		$this->db->set('harga_beli', $this->input->post('harga_beli'));
		$this->db->set('harga_jual', $this->input->post('harga_jual'));
		$this->db->set('stok', $this->input->post('stok'));
		$this->db->set('id_supplier', $this->input->post('id_supplier'));
		$this->db->insert('obat');
	}
	public function update ($id){
		$this->db->select('obat.*, nama_supplier')
              ->join('supplier', 'supplier.id_supplier = obat.id_supplier')
              ->where('id_obat',$id);
		return $this->db->get('obat');
	}
	public function edit_data()
	{
		$this->db->set('nama_obat', $this->input->post('nama_obat'));
		$this->db->set('jenis_obat', $this->input->post('jenis_obat'));
		$this->db->set('satuan', $this->input->post('satuan'));
		$this->db->set('kategori', $this->input->post('kategori'));
		$this->db->set('expired', $this->input->post('expired'));
		$this->db->set('harga_beli', $this->input->post('harga_beli'));
		$this->db->set('harga_jual', $this->input->post('harga_jual'));
		$this->db->set('stok', $this->input->post('stok'));
		$this->db->set('id_supplier', $this->input->post('id_supplier'));
		$this->db->where('id_obat', $this->input->post('id_obat'));
		$this->db->update('obat');
	}
	public function delete($id){
		$this->db->where('id_obat', $id);
		$this->db->delete('obat');
	}
	public function obat_dash(){
		$q = $this->db->get('obat'); 
		return $q->num_rows();
	}
}
?>