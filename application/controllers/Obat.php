<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('obat_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "submit"){
			$this->obat_m->insert();
			redirect('/obat');
		}

		if($this->input->post('submit') == "edit"){
			$this->obat_m->edit_data();
			redirect('/obat');
		}
		
		$data['data'] = $this->obat_m->list()->result();
		$this->template->load('template','obat/obat_data',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->obat_m->update($id)->result();
		$this->load->view('obat/get_obat',$data);
	}

	public function delete($id)
	{
		$this->obat_m->delete($id);
		redirect('/obat');
	}
}
