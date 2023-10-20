<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDiskon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDiskon');
		$this->load->model('mMenu');
	}

	public function index()
	{
		$data = array(
			'diskon' => $this->mDiskon->select(),
			'menu' => $this->mMenu->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Diskon/vDiskon', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'id_user' => '1',
			'id_menu' => $this->input->post('menu'),
			'nama_diskon' => $this->input->post('nama'),
			'diskon' => $this->input->post('besar'),
			'tgl_selesai' => $this->input->post('tgl'),
			'member' => $this->input->post('level')
		);
		$this->mDiskon->insert($data);
		$this->session->set_flashdata('success', 'Data Diskon Menu Berhasil Ditambahkan!');
		redirect('Admin/cDiskon');
	}
	public function update($id)
	{
		$data = array(
			'id_user' => '1',
			'id_menu' => $this->input->post('menu'),
			'nama_diskon' => $this->input->post('nama'),
			'diskon' => $this->input->post('besar'),
			'tgl_selesai' => $this->input->post('tgl'),
			'member' => $this->input->post('level')
		);
		$this->mDiskon->update($id, $data);
		$this->session->set_flashdata('success', 'Data Diskon Menu Berhasil Diperbaharui!');
		redirect('Admin/cDiskon');
	}
	public function delete($id)
	{
		$this->mDiskon->delete($id);
		$this->session->set_flashdata('success', 'Data Diskon Menu Berhasil Dihapus!');
		redirect('Admin/cDiskon');
	}
}

/* End of file cDiskon.php */
