<!-- Contact Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="p-5 bg-light rounded contact-form">
			<div class="row g-4">
				<div class="col-12">
					<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Pelanggan</small>
					<h1 class="display-5 mb-0">Pesanan Saya</h1>
				</div>

				<div class="col-md-12 col-lg-12">
					<div>
						<?php echo form_open('pelanggan/cCart/update_cart'); ?>
						<table class="table table-striped">
							<thead>
								<th>No</th>
								<th>Tanggal Transaksi</th>
								<th>Total Transaksi</th>
								<th>Status Pesanan</th>
								<th>Pembayaran</th>
								<th>Time</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($transaksi as $key => $value) {
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value->tgl_pesan ?></td>
										<td>Rp. <?= number_format($value->total_pesan, 0)  ?></td>
										<td><?php
											if ($value->status_pesan  == '0') {
												echo '<span class="badge bg-danger">Belum Bayar</span>';
											} else if ($value->status_pesan  == '1') {
												echo '<span class="badge bg-warning">Menunggu Konfirmasi</span>';
											} else if ($value->status_pesan  == '2') {
												echo '<span class="badge bg-info">Pesanan Diproses</span>';
											} else if ($value->status_pesan  == '3') {
												echo '<span class="badge bg-primary">Pesanan Dikirim</span>';
											} else if ($value->status_pesan  == '4') {
												echo '<span class="badge bg-success">Selesai</span>';
											}
											?></td>
										<td><?php
											if ($value->status_pembayaran  == '0') {
												echo '<span class="badge bg-danger">Belum Bayar</span>';
											} else if ($value->status_pembayaran  == '1') {
												echo '<span class="badge bg-success">Pembayaran Selesai</span>';
											}
											?></td>
										<td><?= $value->time_pesan ?></td>
										<td><a class="btn btn-primary" href="<?= base_url('Pelanggan/cPesananSaya/detail_pesanan/' . $value->id_pemesanan) ?>">Detail Transaksi</a></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Contact End -->