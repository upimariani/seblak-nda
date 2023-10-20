<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mUser');
	}
	public function index()
	{
		$data = array(
			'user' => $this->mUser->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/User/vUser', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'nama_user' => $this->input->post('nama'),
			'alamat_user' => $this->input->post('alamat'),
			'jk_user' => $this->input->post('jk'),
			'username_user' => $this->input->post('username'),
			'pass_user' => $this->input->post('password'),
			'level_user' => $this->input->post('level')
		);
		$this->mUser->insert($data);
		$this->session->set_flashdata('success', 'Data User Berhasil Ditambahkan!');
		redirect('Admin/cUser');
	}
	public function update($id)
	{
		$data = array(
			'nama_user' => $this->input->post('nama'),
			'alamat_user' => $this->input->post('alamat'),
			'jk_user' => $this->input->post('jk'),
			'username_user' => $this->input->post('username'),
			'pass_user' => $this->input->post('password'),
			'level_user' => $this->input->post('level')
		);
		$this->mUser->update($id, $data);
		$this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
		redirect('Admin/cUser');
	}
	public function delete($id)
	{
		$this->mUser->delete($id);
		$this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
		redirect('Admin/cUser');
	}
}

/* End of file cUser.php */
