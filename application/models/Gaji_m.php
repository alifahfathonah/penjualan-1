<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_m extends CI_Model
{
	public function list(){
		$this->db->select('*')
              ->from('pengajian')
              ->join('pegawai', 'pegawai.id_pegawai=pengajian.id_pegawai');
		return $this->db->get();
	}
	public function insert(){
		$this->db->set('id_pegawai', $this->input->post('id_pegawai'));
		$this->db->set('bulan', strtoupper($this->input->post('bulan')));
		$this->db->set('tahun', $this->input->post('tahun'));
		$this->db->set('gaji_pokok', $this->input->post('gaji_pokok'));
		$this->db->set('gaji_lembur', $this->input->post('gaji_lembur'));
		$this->db->set('lembur_perjam', $this->input->post('lembur_perjam'));
		$this->db->insert('pengajian');
	}
	public function update ($id){
		$this->db->select('*')
              ->where('id_gaji',$id);
		return $this->db->get('pengajian');
	}
	public function edit_data()
	{
		$this->db->set('id_pegawai', $this->input->post('id_pegawai'));
		$this->db->set('bulan', strtoupper($this->input->post('bulan')));
		$this->db->set('tahun', $this->input->post('tahun'));
		$this->db->set('gaji_pokok', $this->input->post('gaji_pokok'));
		$this->db->set('gaji_lembur', $this->input->post('gaji_lembur'));
		$this->db->set('lembur_perjam', $this->input->post('lembur_perjam'));
		$this->db->where('id_gaji', $this->input->post('id_gaji'));
		$this->db->update('pengajian');
	}
	public function delete($id){
		$this->db->where('id_gaji', $id);
		$this->db->delete('pengajian');
	}
}
?>