<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCheckout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mOngkir');
	}

	public function index()
	{
		$data = array(
			// 'kecamatan' => $this->mOngkir->select()
		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vCheckout', $data);
		// $this->load->view('Pelanggan/Layout/footer');
	}
	public function pesan()
	{

		//menyimpan di data pemesanan
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'tgl_pesan' => date('Y-m-d'),
			'total_pesan' => $this->cart->total(),
			'status_pesan' => '0',
			'status_pembayaran' => '0',
			'bukti_pembayaran' => '0',
			'prov' => $this->input->post('provinsi'),
			'kota' => $this->input->post('kota'),
			'expedisi' => $this->input->post('expedisi'),
			'estimasi' => $this->input->post('estimasi'),
			'ongkir' => $this->input->post('ongkir'),
			'alamat_detail' => $this->input->post('alamat')
		);
		$this->db->insert('pemesanan', $data);


		$cek_id_transaksi = $this->db->query("SELECT MAX(id_pemesanan) as id FROM `pemesanan`")->row();
		//menyimpan pesanan ke detail transaksi
		foreach ($this->cart->contents() as $item) {
			$data_rinci = array(
				'id_pemesanan' => $cek_id_transaksi->id,
				'id_menu' => $item['id'],
				'qty_pesan' => $item['qty']
			);
			$this->db->insert('detail_pemesanan', $data_rinci);
		}

		//update stok produk
		foreach ($this->cart->contents() as $key => $item) {
			$update_stok = $item['stok'] - $item['qty'];
			$stok = array(
				'stok_menu' => $update_stok
			);
			$this->db->where('id_menu', $item['id']);
			$this->db->update('menu', $stok);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Pesanan Anda Berhasil Dikirim!');
		redirect('Pelanggan/cHome');
	}
}

/* End of file cCheckout.php */
