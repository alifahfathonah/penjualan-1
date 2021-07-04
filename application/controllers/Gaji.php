<?php defined('BASEPATH') OR exit('No direct script access allowed');

class gaji extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('gaji_m');
	}

	public function index($ket=false)
	{
		if($this->input->post('submit') == "submit"){
      $this->db->select('id_pegawai');
      $this->db->from('pengajian');
      $this->db->where('id_pegawai',$this->input->post('id_pegawai'));
      $this->db->where('bulan',$this->input->post('bulan'));
      $this->db->where('tahun',$this->input->post('tahun'));
      $query = $this->db->get();
      $val=$query->num_rows();
      if($val == 0){
        $this->gaji_m->insert();
        redirect('/gaji');
      }else{
				echo "<script>alert('Data Sudah Ada, Silahkan cek kembali.'); window.location='".site_url('gaji')."';</script>";
      }
		}

		if($this->input->post('submit') == "edit"){
      if( 
        ($this->input->post('id_pegawai') == $this->input->post('id_pegawai_old')) AND
        (strtoupper($this->input->post('bulan')) == $this->input->post('bulan_old')) AND
        ($this->input->post('tahun') == $this->input->post('tahun_old'))
      ){
        $this->gaji_m->edit_data();
        redirect('/gaji');
      }else{
        $this->db->select('id_pegawai');
        $this->db->from('pengajian');
        $this->db->where('id_pegawai',$this->input->post('id_pegawai'));
        $this->db->where('bulan',$this->input->post('bulan'));
        $this->db->where('tahun',$this->input->post('tahun'));
        $query = $this->db->get();
        $val=$query->num_rows();
        if($val == 0){
          $this->gaji_m->edit_data();
          redirect('/gaji');
        }else{
          echo "<script>alert('Data Sudah Ada, Silahkan cek kembali.'); window.location='".site_url('gaji')."';</script>";
        }
      }
		}
		
		$data['data'] = $this->gaji_m->list()->result();
		$this->template->load('template','gaji/gaji_data',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->gaji_m->update($id)->result();
		$this->load->view('gaji/get_gaji',$data);
	}

	public function delete($id)
	{
		$this->gaji_m->delete($id);
		redirect('/gaji');
	}
}
