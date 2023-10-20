<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mMenu extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('menu');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('menu', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_menu', $id);
		$this->db->update('menu', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_menu', $id);
		$this->db->delete('menu');
	}
}

/* End of file mMenu.php */
