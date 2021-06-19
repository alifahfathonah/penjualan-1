<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('supplier_m');
		$this->load->model('obat_m');
		$this->load->model('pegawai_m');
		$this->load->model('customer_m');
		$this->load->model('pembelian_m');
		$this->load->model('penjualan_m');
	}
	
	public function index()
	{
		$data['supplier'] = $this->supplier_m->supplier_dash();
		$data['obat'] = $this->obat_m->obat_dash();
		$data['pegawai'] = $this->pegawai_m->pegawai_dash();
		$data['customer'] = $this->customer_m->customer_dash();
		$data['pembelian'] = $this->pembelian_m->pembelian_dash();
		$data['penjualan'] = $this->penjualan_m->penjualan_dash();
		$this->template->load('template','dashboard/dashboard',$data);
	}
}
