<?php defined('BASEPATH') OR exit ('No script direct access allowed');

class Customer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('customer_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "submit"){
			$this->customer_m->insert();
			redirect('/customer');
		}

		if($this->input->post('submit') == "edit"){
			$this->customer_m->edit_data();
			redirect('/customer');
		}
		
		$data['data'] = $this->customer_m->list()->result();
		$this->template->load('template','customer/customer_data',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->customer_m->update($id)->result();
		$this->load->view('customer/get_customer',$data);
	}
	
	public function delete($id)
	{
		$this->customer_m->delete($id);
		redirect('/customer');
	}
}