<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
	public function katalog()
	{
		$this->db->select('*');
		$this->db->from('menu');
		return $this->db->get()->result();
	}
}

/* End of file mHome.php */
