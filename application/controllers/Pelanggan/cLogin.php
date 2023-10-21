<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAuth');
	}

	public function index()
	{
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vLogin');
		$this->load->view('Pelanggan/Layout/footer');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->mAuth->pelanggan_login($username, $password);

		if ($data) {
			$nama = $data->nama_pelanggan;
			$id_pelanggan = $data->id_pelanggan;
			$level = $data->level_member;


			$array = array(
				'nama' => $nama,
				'id_pelanggan' => $id_pelanggan,
				'member' => $level,
			);

			$this->session->set_userdata($array);
			redirect('Pelanggan/cHome');
		} else {
			$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
			redirect('Pelanggan/cLogin');
		}
	}
	public function registrasi()
	{
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vRegistrasi');
		$this->load->view('Pelanggan/Layout/footer');
	}
	public function registrasi_here()
	{
		$data = array(
			'nama_pelanggan' => $this->input->post('nama'),
			'jk_pelanggan' => $this->input->post('jk'),
			'no_hp_pelanggan' => $this->input->post('no_hp'),
			'username_pelanggan' => $this->input->post('username'),
			'password_pelanggan' => $this->input->post('password'),
			'point' => '0',
			'level_member' => '3'
		);
		$this->mAuth->register($data);
		$this->session->set_flashdata('success', 'Registrasi Pelanggan berhasil! Silahkan Login!');
		redirect('Pelanggan/cLogin');
	}
	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id_pelanggan');
		$this->session->unset_userdata('member');
		$this->session->set_flashdata('success', 'Anda berhasil logout!');
		redirect('Pelanggan/cLogin');
	}
}

/* End of file cLogin.php */
