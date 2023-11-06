<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPelanggan extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		return $this->db->get()->result();
	}
}

/* End of file mPelanggan.php */
