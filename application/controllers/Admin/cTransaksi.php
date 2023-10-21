<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Transaksi/vTransaksi', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function detail_transaksi($id)
	{
		$data = array(
			'detail_transaksi' => $this->mTransaksi->detail_pesanan($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Transaksi/vDetailTransaksi', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function pesanan_dikonfirmasi($id)
	{
		$data = array(
			'status_pesan' => '2'
		);
		$this->mTransaksi->update_status($id, $data);
		$this->session->set_flashdata('success', 'Data Transaksi Berhasil Dikonfirmasi!');
		redirect('Admin/cTransaksi/detail_transaksi/' . $id);
	}
	public function pesanan_dikirim($id)
	{
		$data = array(
			'status_pesan' => '3'
		);
		$this->mTransaksi->update_status($id, $data);
		$this->session->set_flashdata('success', 'Data Transaksi Berhasil Dikirim!');
		redirect('Admin/cTransaksi/detail_transaksi/' . $id);
	}
}

/* End of file cTransaksi.php */
