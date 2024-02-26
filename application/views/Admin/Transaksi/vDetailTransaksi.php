<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Detail Transaksi Supplier</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Detail Transaksi Supplier</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8">
					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<i class="fas fa-globe"></i> Invoice Transaksi Pelanggan
									<small class="float-right">Date: <?= date('Y-m-d') ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								From
								<address>
									<strong> <?= $detail_transaksi['transaksi']->nama_pelanggan ?></strong><br>
									Provinsi <?= $detail_transaksi['transaksi']->prov ?><br>
									Kota/Kabupaten <?= $detail_transaksi['transaksi']->kota ?><br>
									Alamat Detail <?= $detail_transaksi['transaksi']->alamat_detail ?><br>
									<hr>
									Expedisi: <?= $detail_transaksi['transaksi']->expedisi ?> | <?= $detail_transaksi['transaksi']->estimasi ?><br>

								</address>
							</div>
							<!-- /.col -->

							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Quantity</th>
										<th>Subtotal</th>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$total = 0;
										foreach ($detail_transaksi['detail'] as $key => $value) {
											$total += ($value->harga_menu * $value->qty_pesan);
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nama_menu ?></td>
												<td>Rp. <?= number_format($value->harga_menu, 0)  ?></td>
												<td>x <?= $value->qty_pesan ?></td>
												<td>Rp. <?= number_format($value->harga_menu * $value->qty_pesan, 0)  ?></td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- accepted payments column -->
							<div class="col-6">

								<?php
								if ($detail_transaksi['transaksi']->status_pembayaran == '1') {
								?>
									<table class="table table-striped">
										<tr>
											<td>Pembayaran : <br>
												<img style="width: 150px;" src="<?= base_url('asset/pembayaran/' . $detail_transaksi['transaksi']->bukti_pembayaran) ?>">
											</td>
										</tr>
									</table>
								<?php
								}
								?>
							</div>
							<!-- /.col -->
							<div class="col-6">
								<p class="lead">Amount Due <?= date('Y-m-d') ?></p>

								<div class="table-responsive">
									<table class="table">
										<tr>
											<th>Total:</th>
											<td>Rp. <?= number_format($detail_transaksi['transaksi']->total_pesan)  ?></td>
										</tr>
										<tr>
											<th>Ongkir:</th>
											<td>Rp. <?= number_format($detail_transaksi['transaksi']->ongkir)  ?></td>
										</tr>
										<tr>
											<th>Diskon:</th>
											<td>Rp. <?= number_format($total - $detail_transaksi['transaksi']->total_pesan)  ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="row no-print">
							<div class="col-12">
								<button type="button" onclick="window.print()" class="btn btn-default mt-5"><i class="fas fa-print"></i> Print</button>

								<?php
								if ($detail_transaksi['transaksi']->status_pesan == '1') {
								?>
									<a href="<?= base_url('Admin/cTransaksi/pesanan_dikonfirmasi/' . $detail_transaksi['transaksi']->id_pemesanan) ?>" class="mt-5 btn btn-warning"><i class="fas fa-pen-alt"></i> Konfirmasi Pesanan</a>
								<?php
								}
								?>
								<?php
								if ($detail_transaksi['transaksi']->status_pesan == '2') {
								?>
									<a href="<?= base_url('Admin/cTransaksi/pesanan_dikirim/' . $detail_transaksi['transaksi']->id_pemesanan) ?>" class="mt-5 btn btn-success"><i class="fas fa-car"></i> Pesanan Dikirim</a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>