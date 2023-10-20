<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDiskon extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('diskon');
		$this->db->join('menu', 'diskon.id_menu = menu.id_menu', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('diskon', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_diskon', $id);
		$this->db->update('diskon', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_diskon', $id);
		$this->db->delete('diskon');
	}
}

/* End of file mDiskon.php */
