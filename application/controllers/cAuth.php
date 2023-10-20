<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAuth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAuth');
	}
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('vLogin');
		} else {
			$username_user = $this->input->post('username');
			$pass_user = $this->input->post('password');
			$data = $this->mAuth->user_login($username_user, $pass_user);
			if ($data) {
				$level_user = $data->level_user;
				$nama = $data->nama_user;


				$array = array(
					'level' => $level_user,
					'nama' => $nama
				);

				$this->session->set_userdata($array);


				if ($data->level_user == 1) {
					redirect('Admin/cDashboard');
				} elseif ($data->level_user == 2) {
					redirect('Pemilik/cDashboard');
				}
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Salah!!');
				$this->load->view('vLogin');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('success', 'Anda Berhasil LogOut!');
		redirect('cAuth');
	}
}

/* End of file cAuth.php */
