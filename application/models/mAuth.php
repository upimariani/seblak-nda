<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAuth extends CI_Model
{
	public function user_login($username_user, $pass_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username_user' => $username_user, 'pass_user' => $pass_user));
		return $this->db->get()->row();
	}
	public function pelanggan_login($username_pelanggan, $password_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array('username_pelanggan' => $username_pelanggan, 'password_pelanggan' => $password_pelanggan));
		return $this->db->get()->row();
	}
	public function register($data)
	{
		$this->db->insert('pelanggan', $data);
	}
}

/* End of file mAuth.php */
