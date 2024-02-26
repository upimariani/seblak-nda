<!-- Contact Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="p-5 bg-light rounded contact-form">
			<div class="row g-4">
				<div class="col-12">
					<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Keranjang</small>
					<h1 class="display-5 mb-0">Keranjang Pelanggan</h1>
				</div>

				<div class="col-md-12 col-lg-12">
					<div>
						<?php echo form_open('pelanggan/cCart/update_cart'); ?>
						<table class="table table-striped">
							<thead>
								<th>No</th>
								<th>Gambar</th>
								<th>Nama Produk</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Subtotal</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$i = 1;
								foreach ($this->cart->contents() as $key => $value) {
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><img style="width: 150px;" class="rounded-circle" src="<?= base_url('asset/foto-produk/' . $value['picture']) ?>"></td>
										<td><?= $value['name'] ?></td>
										<td>
											<input name="<?= $i . '[qty]' ?>" min="1" type="number" value="<?= $value['qty'] ?>">
											<button type="submit" class="btn btn-success">Update Qty</button>
										</td>
										<td>Rp. <?= number_format($value['price'], 0)  ?></td>
										<td>Rp. <?= number_format($value['price'] * $value["qty"])  ?></td>
										<td><a href="<?= base_url('pelanggan/ccart/delete/' . $value['rowid']) ?>">Hapus</a></td>
									</tr>
								<?php
									$i++;
								}
								?>
							</tbody>
						</table>
						<?php echo form_close(); ?>
						<table class="table table-striped">
							<tr>
								<th>Keranjang</th>
								<th>&nbsp;</th>
							</tr>
							<tr>
								<td>Total</td>
								<td>
									<h5>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h5>
								</td>
							</tr>

						</table>
						<a href="<?= base_url('pelanggan/cCheckout') ?>" class="btn btn-primary">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Contact End -->