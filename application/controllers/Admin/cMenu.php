<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cMenu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mMenu');
	}
	public function index()
	{
		$data = array(
			'menu' => $this->mMenu->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Menu/vMenu', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$config['upload_path']          = './asset/foto-produk';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'menu' => $this->mMenu->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Menu/vMenu', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'nama_menu' => $this->input->post('nama'),
				'harga_menu' => $this->input->post('harga'),
				'stok_menu' => $this->input->post('stok'),
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' => $upload_data['file_name']
			);
			$this->mMenu->insert($data);
			$this->session->set_flashdata('success', 'Data Menu Berhasil Ditambahkan!');
			redirect('Admin/cMenu');
		}
	}
	public function update($id)
	{
		$config['upload_path']          = './asset/foto-produk';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'menu' => $this->mMenu->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Menu/vMenu', $data);
			$this->load->view('Admin/Layout/footer');
		} else {

			$upload_data =  $this->upload->data();
			$data = array(
				'nama_menu' => $this->input->post('nama'),
				'harga_menu' => $this->input->post('harga'),
				'stok_menu' => $this->input->post('stok'),
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar' => $upload_data['file_name']
			);
			$this->mMenu->update($id, $data);
			$this->session->set_flashdata('success', 'Data Menu Berhasil Diperbaharui !!!');
			redirect('Admin/cMenu');
		} //tanpa ganti gambar
		$data = array(
			'nama_menu' => $this->input->post('nama'),
			'harga_menu' => $this->input->post('harga'),
			'stok_menu' => $this->input->post('stok'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$this->mMenu->update($id, $data);
		$this->session->set_flashdata('success', 'Data Menu Berhasil Diperbaharui !!!');
		redirect('Admin/cMenu');
	}
	public function delete($id)
	{
		$this->mMenu->delete($id);
		$this->session->set_flashdata('success', 'Data Menu Berhasil Dihapus !!!');
		redirect('Admin/cMenu');
	}
}

/* End of file cMenu.php */
