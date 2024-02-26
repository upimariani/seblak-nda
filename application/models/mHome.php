<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
	public function katalog()
	{
		$this->db->select('menu.id_menu, nama_menu, harga_menu, stok_menu, gambar, deskripsi, nama_diskon, diskon, member, tgl_selesai');
		$this->db->from('menu');
		$this->db->join('diskon', 'menu.id_menu = diskon.id_menu', 'left');
		return $this->db->get()->result();
	}
	public function kritik_saran()
	{
		$this->db->select('*');
		$this->db->from('kritik_saran');
		$this->db->join('pemesanan', 'kritik_saran.id_pemesanan = pemesanan.id_pemesanan', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan', 'left');
		// $this->db->where('kritik_saran.id_pemesanan != 0');

		return $this->db->get()->result();
	}
}

/* End of file mHome.php */
