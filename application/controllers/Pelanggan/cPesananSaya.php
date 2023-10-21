<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPesananSaya extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->select_pelanggan()
		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vPesananSaya', $data);
		$this->load->view('Pelanggan/Layout/footer');
	}
	public function detail_pesanan($id)
	{
		$data = array(
			'detail_transaksi' => $this->mTransaksi->detail_pesanan($id),
		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vDetailTransaksi', $data);
		$this->load->view('Pelanggan/Layout/footer');
	}
	public function bayar($id)
	{
		$config['upload_path']          = './asset/pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {

			$data = array(
				'detail_transaksi' => $this->mTransaksi->detail_pesanan($id)
			);
			$this->load->view('Pelanggan/Layout/head');
			$this->load->view('Pelanggan/vDetailTransaksi', $data);
			$this->load->view('Pelanggan/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'status_pembayaran' => '1',
				'status_pesan' => '1',
				'bukti_pembayaran' => $upload_data['file_name']
			);
			$this->mTransaksi->update_status($id, $data);
			$this->session->set_flashdata('success', 'Anda berhasil melakukan pembayaran!!!');
			redirect('Pelanggan/cPesananSaya/detail_pesanan/' . $id, 'refresh');
		}
	}
	public function pesanan_diterima($id)
	{
		//cek point sebelumnya
		$data_pelanggan = $this->db->query("SELECT * FROM `pemesanan` JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan WHERE pemesanan.id_pemesanan='" . $id . "'")->row();
		$point_sebelumnya = $data_pelanggan->point;
		$point_persen = (0.4 / 100) * $data_pelanggan->total_pesan;
		$point_update = $point_sebelumnya + $point_persen;

		if ($point_update <= 1000) {
			$level = '3';
		} else if ($point_update > 1000 && $point_update <= 10000) {
			$level = '2';
		} else {
			$level = '1';
		}
		$data_level = array(
			'level_member' => $level,
			'point' => $point_update
		);
		$this->db->where('id_pelanggan', $data_pelanggan->id_pelanggan);
		$this->db->update('pelanggan', $data_level);


		$data = array(
			'status_pesan' => '4'
		);
		$this->mTransaksi->update_status($id, $data);
		$this->session->set_flashdata('success', 'Data Transaksi Berhasil Dikirim!');
		redirect('Pelanggan/cPesananSaya/detail_pesanan/' . $id);
	}
	public function kritik_saran($id)
	{
		$data = array(
			'id_pemesanan' => $id,
			'kritik_saran' => $this->input->post('kritik_saran')
		);
		$this->mTransaksi->kritik_saran($data);
		$this->session->set_flashdata('success', 'Kritik dan Saran Berhasil Disimpan!');
		redirect('Pelanggan/cPesananSaya');
	}
}

/* End of file cPesananSaya.php */
