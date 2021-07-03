<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "submit"){
			$this->dokter_m->insert();
			redirect('/dokter');
		}

		if($this->input->post('submit') == "edit"){
			$this->dokter_m->edit_data();
			redirect('/dokter');
		}
		
		$data['data'] = $this->dokter_m->list()->result();
		$this->template->load('template','dokter/dokter_data',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->dokter_m->update($id)->result();
		$this->load->view('dokter/get_dokter',$data);
	}

	public function delete($id)
	{
		$this->dokter_m->delete($id);
		redirect('/dokter');
	}
}
