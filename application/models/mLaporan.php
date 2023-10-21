<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{

	public function lap_harian_transaksi($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('menu', 'menu.id_menu = detail_pemesanan.id_menu', 'left');

		$this->db->where('pemesanan.status_pesan=4');
		$this->db->where('DAY(pemesanan.tgl_pesan)', $tanggal);
		$this->db->where('MONTH(pemesanan.tgl_pesan)', $bulan);
		$this->db->where('YEAR(pemesanan.tgl_pesan)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_bulanan_transaksi($bulan, $tahun)
	{

		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('menu', 'menu.id_menu = detail_pemesanan.id_menu', 'left');

		$this->db->where('pemesanan.status_pesan=4');
		$this->db->where('MONTH(pemesanan.tgl_pesan)', $bulan);
		$this->db->where('YEAR(pemesanan.tgl_pesan)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_tahunan_transaksi($tahun)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->join('detail_pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan', 'left');
		$this->db->join('menu', 'menu.id_menu = detail_pemesanan.id_menu', 'left');
		$this->db->where('pemesanan.status_pesan=4');
		$this->db->where('YEAR(pemesanan.tgl_pesan)', $tahun);
		return $this->db->get()->result();
	}
}

/* End of file mlaporan.php */
