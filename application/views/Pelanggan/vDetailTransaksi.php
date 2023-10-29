<!-- Contact Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="p-5 bg-light rounded contact-form">
			<div class="row g-4">
				<div class="col-12">
					<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Pelanggan</small>
					<h1 class="display-5 mb-0">Detail Pesanan Saya</h1>
				</div>

				<div class="col-md-12 col-lg-12">
					<div>
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
								foreach ($detail_transaksi['detail'] as $key => $value) {
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
						<?php
						if ($detail_transaksi['transaksi']->status_pembayaran == '0') {
						?>
							<?php echo form_open_multipart('Pelanggan/cPesananSaya/bayar/' . $detail_transaksi['transaksi']->id_pemesanan); ?>
							<table class="table table-striped">
								<tr>
									<td>Pembayaran : <br> <small class="text-danger">Pembayaran dilakukan melalui transfer via: <br>
											Bank BCA - 098890-102131 Atas Nama Seblak NDA <br>
											Gopay - 08982231321 <br>
											Shopee Pay - 08982231321
										</small></td>
								</tr>
								<tr>
									<td><input class="form-control" name="gambar" type="file"></td>
									<td><button class="btn btn-primary" type="submit">Kirim</button></td>
								</tr>
							</table>
							</form>
						<?php
						} else if ($detail_transaksi['transaksi']->status_pesan == '3') {
						?>
							<a href="<?= base_url('Pelanggan/cPesananSaya/pesanan_diterima/' . $detail_transaksi['transaksi']->id_pemesanan) ?>" class="btn btn-primary">Pesanan Diterima</a>
						<?php
						}
						?>

						<?php
						if ($detail_transaksi['kritik_saran']->id_kritik_saran == NULL && $detail_transaksi['transaksi']->status_pesan == '4') {
						?>

							<div class="col-lg-6">
								<form action="<?= base_url('Pelanggan/cPesananSaya/kritik_saran/' .  $detail_transaksi['transaksi']->id_pemesanan) ?>" method="POST">
									<label>Kritik dan Saran</label>
									<textarea class="form-control" name="kritik_saran" rows="5"></textarea>
									<button type="submit" class="btn btn-primary mt-3">Kirim</button>
								</form>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Contact End -->