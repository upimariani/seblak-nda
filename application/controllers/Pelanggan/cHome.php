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
			'katalog' => $this->mHome->katalog()
		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vHome', $data);
		$this->load->view('Pelanggan/Layout/footer');
	}
}

/* End of file cHome.php */
