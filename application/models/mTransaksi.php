<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		return $this->db->get()->result();
	}


	//pelanggan
	public function select_pelanggan()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('pelanggan.id_pelanggan', $this->session->userdata('id_pelanggan'));
		return $this->db->get()->result();
	}
	public function detail_pesanan($id)
	{
		$data['detail'] = $this->db->query("SELECT * FROM `pemesanan` JOIN detail_pemesanan ON pemesanan.id_pemesanan=detail_pemesanan.id_pemesanan JOIN menu ON menu.id_menu=detail_pemesanan.id_menu WHERE pemesanan.id_pemesanan='" . $id . "'")->result();
		$data['transaksi'] = $this->db->query("SELECT * FROM `pemesanan` JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan WHERE id_pemesanan='" . $id . "'")->row();
		$data['kritik_saran'] = $this->db->query("SELECT * FROM `pemesanan` LEFT JOIN kritik_saran ON kritik_saran.id_pemesanan=pemesanan.id_pemesanan WHERE pemesanan.id_pemesanan='" . $id . "' GROUP BY pemesanan.id_pemesanan")->row();
		return $data;
	}
	public function update_status($id, $data)
	{
		$this->db->where('id_pemesanan', $id);
		$this->db->update('pemesanan', $data);
	}
	public function kritik_saran($data)
	{
		$this->db->insert('kritik_saran', $data);
	}
}

/* End of file mTransaksi.php */
