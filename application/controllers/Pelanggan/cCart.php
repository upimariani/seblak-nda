<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCart extends CI_Controller
{

	public function index()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => '1',
			'picture' => $this->input->post('gambar'),
			'stok' => $this->input->post('stok'),
		);
		$this->cart->insert($data);
		redirect('pelanggan/chome');
	}
	public function view()
	{
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vCart');
		$this->load->view('Pelanggan/Layout/footer');
	}
	public function update_cart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'  => $items['rowid'],
				'qty'    => $this->input->post($i . '[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('pelanggan/ccart/view');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('pelanggan/ccart/view');
	}
}

/* End of file cCart.php */
