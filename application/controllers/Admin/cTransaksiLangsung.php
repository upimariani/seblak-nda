<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiLangsung extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mMenu');
		$this->load->model('mPelanggan');
	}
	public function index()
	{
		$data = array(
			'menu' => $this->mMenu->select(),
			'pelanggan' => $this->mPelanggan->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/TransaksiLangsung/transaksilangsung', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function add_to_cart()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty'),
			'picture' => $this->input->post('picture'),
			'stok' => $this->input->post('stok'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan Dikeranjang!');
		redirect('admin/cTransaksiLangsung');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('admin/cTransaksiLangsung');
	}
	public function pesan_langsung()
	{
		$data = array(
			'id_pelanggan' => $this->input->post('pelanggan'),
			'tgl_pesan' => date('Y-m-d'),
			'total_pesan' => $this->cart->total(),
			'status_pesan' => '4',
			'status_pembayaran' => '0',
			'bukti_pembayaran' => '0',
			'prov' => '0',
			'kota' => '0',
			'expedisi' => '0',
			'estimasi' => '0',
			'ongkir' => '0',
			'alamat_detail' => '0',
		);
		// var_dump($data);
		$this->db->insert('pemesanan', $data);



		//menyimpan pesanan ke detail transaksi
		$cek_id_transaksi = $this->db->query("SELECT MAX(id_pemesanan) as id FROM `pemesanan`")->row();
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data_rinci = array(
				'id_pemesanan' => $cek_id_transaksi->id,
				'id_menu' => $item['id'],
				'qty_pesan' => $item['qty']
			);
			$this->db->insert('detail_pemesanan', $data_rinci);

			// var_dump($data_rinci);
		}

		//mengurangi jumlah stok
		$kstok = 0;
		foreach ($this->cart->contents() as $key => $value) {
			$id = $value['id'];
			$kstok = $value['stok'] - $value['qty'];
			$data = array(
				'stok_menu' => $kstok
			);
			$this->db->where('id_menu', $value['id']);
			$this->db->update('menu', $data);
		}

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

		$this->cart->destroy();
		redirect('admin/cTransaksiLangsung');
	}
}

/* End of file cTransaksiLangsung.php */
