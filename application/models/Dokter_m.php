<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_m extends CI_Model
{
	public function list(){
		$this->db->select('*')
              ->from('dokter');
		return $this->db->get();
	}
	public function insert(){
		$this->db->set('nama_dokter', $this->input->post('nama_dokter'));
		$this->db->set('spesialis', $this->input->post('spesialis'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('kota', $this->input->post('kota'));
		$this->db->set('no_tlp', $this->input->post('no_tlp'));
		$this->db->insert('dokter');
	}
	public function update ($id){
		$this->db->select('*')
              ->where('id_dokter',$id);
		return $this->db->get('dokter');
	}
	public function edit_data()
	{
		$this->db->set('nama_dokter', $this->input->post('nama_dokter'));
		$this->db->set('spesialis', $this->input->post('spesialis'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('kota', $this->input->post('kota'));
		$this->db->set('no_tlp', $this->input->post('no_tlp'));
		$this->db->where('id_dokter', $this->input->post('id_dokter'));
		$this->db->update('dokter');
	}
	public function delete($id){
		$this->db->where('id_dokter', $id);
		$this->db->delete('dokter');
	}
}
?>