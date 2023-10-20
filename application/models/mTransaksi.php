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
}

/* End of file mTransaksi.php */
