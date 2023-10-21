<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
	}

	public function cetak_tahunan()
	{
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);

		$pdf->Cell(250, 40, 'LAPORAN TRANSAKSI PER TAHUN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Atas Nama', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Quantity', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Subtotal', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Total Transaksi', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;
		$tahun = $this->input->post('tahun');

		$data = $this->mLaporan->lap_tahunan_transaksi($tahun);

		foreach ($data as $key => $value) {
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->nama_pelanggan, 1, 0);
			$pdf->Cell(50, 6, $value->nama_menu, 1, 0);
			$pdf->Cell(20, 6, $value->qty_pesan, 1, 0);
			$pdf->Cell(50, 6, 'Rp.' . number_format($value->harga_menu * $value->qty_pesan), 1, 0);
			$pdf->Cell(50, 6, $value->tgl_pesan, 1, 0);
			$pdf->Cell(40, 6, 'Rp.' . number_format($value->total_pesan), 1, 1);
		}
		$pdf->Output();
	}
	public function cetak_bulanan()
	{
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);

		$pdf->Cell(250, 40, 'LAPORAN TRANSAKSI PER BULAN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Atas Nama', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Quantity', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Subtotal', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Total Transaksi', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data =  $this->mLaporan->lap_bulanan_transaksi($bulan, $tahun);

		foreach ($data as $key => $value) {
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->nama_pelanggan, 1, 0);
			$pdf->Cell(50, 6, $value->nama_menu, 1, 0);
			$pdf->Cell(20, 6, $value->qty_pesan, 1, 0);
			$pdf->Cell(50, 6, 'Rp.' . number_format($value->harga_menu * $value->qty_pesan), 1, 0);
			$pdf->Cell(50, 6, $value->tgl_pesan, 1, 0);
			$pdf->Cell(40, 6, 'Rp.' . number_format($value->total_pesan), 1, 1);
		}
		$pdf->Output();
	}
	public function cetak_harian()
	{
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);

		$pdf->Cell(250, 40, 'LAPORAN TRANSAKSI PER HARI', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Atas Nama', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Quantity', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Subtotal', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Total Transaksi', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data =  $this->mLaporan->lap_harian_transaksi($tanggal, $bulan, $tahun);

		foreach ($data as $key => $value) {
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->nama_pelanggan, 1, 0);
			$pdf->Cell(50, 6, $value->nama_menu, 1, 0);
			$pdf->Cell(20, 6, $value->qty_pesan, 1, 0);
			$pdf->Cell(50, 6, 'Rp.' . number_format($value->harga_menu * $value->qty_pesan), 1, 0);
			$pdf->Cell(50, 6, $value->tgl_pesan, 1, 0);
			$pdf->Cell(40, 6, 'Rp.' . number_format($value->total_pesan), 1, 1);
		}
		$pdf->Output();
	}
}

/* End of file cLaporan.php */
