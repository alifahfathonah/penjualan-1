<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model
{

	public function list(){
		return $this->db->get('customer');
	}
	public function insert(){
    // NOTE : buat id_customer primary
    $this->db->select_max('id_customer');
    $query = $this->db->get('customer');
    $val=$query->result();
    $datadb = substr($val[0]->id_customer,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_customer,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_customer = $tgl. sprintf("%04s",$q3);

		$this->db->set('id_customer', $id_customer);
		$this->db->set('nama_customer', $this->input->post('nama_customer'));
		$this->db->set('no_telp', $this->input->post('no_telp'));
		$this->db->set('kota', $this->input->post('kota'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->insert('customer');
	}
	public function update ($id){
		$this->db->where('id_customer', $id);
		return $this->db->get('customer');
	}
	public function edit_data()
	{
		$this->db->set('nama_customer', $this->input->post('nama_customer'));
		$this->db->set('no_telp', $this->input->post('no_telp'));
		$this->db->set('kota', $this->input->post('kota'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->where('id_customer', $this->input->post('id_customer'));
		$this->db->update('customer');
	}
	public function delete($id){
		$this->db->where('id_customer', $id);
		$this->db->delete('customer');
	}
	public function customer_dash(){
		$q = $this->db->get('customer'); 
		return $q->num_rows();
	}
}
?>