<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
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
		if($this->input->post('submit') == "submit"){
      if($this->input->post('laporan') == 'Pegawai'){
			  redirect('/laporan/print_pegawai');
      }elseif($this->input->post('laporan') == 'Supplier'){
			  redirect('/laporan/print_supplier');
      }elseif($this->input->post('laporan') == 'Obat'){
			  redirect('/laporan/print_obat');
      }elseif($this->input->post('laporan') == 'Customer'){
			  redirect('/laporan/print_customer');
      }elseif($this->input->post('laporan') == 'Pembelian'){
			  redirect('/laporan/print_pembelian/'.$this->input->post('dari').'/'.$this->input->post('sampai'));
      }elseif($this->input->post('laporan') == 'Penjualan'){
			  redirect('/laporan/print_penjualan/'.$this->input->post('dari').'/'.$this->input->post('sampai'));
      }
      var_dump($this->input->post('laporan'));exit;
		}
		$this->template->load('template','laporan/view_laporan');
	}

  public function print_penjualan($dari,$sampai)
  {
		$data['data'] = $this->penjualan_m->list_lap()->result();
		$this->load->view('laporan/print_penjualan',$data);
  }

  public function print_pembelian($dari,$sampai)
  {
		$data['data'] = $this->pembelian_m->list_lap()->result();
		$this->load->view('laporan/print_pembelian',$data);
  }

  public function print_pegawai()
  {
		$data['data'] = $this->pegawai_m->list()->result();
		$this->load->view('laporan/print_pegawai',$data);
  }

  public function print_supplier()
  {
		$data['data'] = $this->supplier_m->list()->result();
		$this->load->view('laporan/print_supplier',$data);
  }

  public function print_obat()
  {
		$data['data'] = $this->obat_m->list()->result();
		$this->load->view('laporan/print_obat',$data);
  }

  public function print_customer()
  {
		$data['data'] = $this->customer_m->list()->result();
		$this->load->view('laporan/print_customer',$data);
  }
}
