<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
	public function list(){
		$this->db->select('*')
              ->from('kategori');
		return $this->db->get();
	}
	public function insert(){
		$this->db->set('nama_kategori', $this->input->post('kategori'));
		$this->db->insert('kategori');
	}
	public function update ($id){
		$this->db->select('*')
              ->where('id_kategori',$id);
		return $this->db->get('kategori');
	}
	public function edit_data()
	{
		$this->db->set('nama_kategori', $this->input->post('nama_kategori'));
		$this->db->where('id_kategori', $this->input->post('id_kategori'));
		$this->db->update('kategori');
	}
	public function delete($id){
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}
}
?>