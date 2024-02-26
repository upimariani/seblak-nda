<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHome');
	}

	public function index()
	{
		$data = array(
			'katalog' => $this->mHome->katalog(),
			'kritik_saran' => $this->mHome->kritik_saran()
		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vHome', $data);
		$this->load->view('Pelanggan/Layout/footer');
	}
	public function complain()
	{
		$data = array(
			'id_pemesanan' => '0',
			'kritik_saran' => $this->input->post('complain')
		);
		$this->db->insert('kritik_saran', $data);
		$this->session->set_flashdata('success', 'Complain Anda Berhasil Dikirim...');
		redirect('Pelanggan/cHome');
	}
}

/* End of file cHome.php */
