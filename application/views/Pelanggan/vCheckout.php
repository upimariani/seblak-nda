<!-- Book Us Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="row g-0">
			<div class="col-1">
				<img src="<?= base_url('asset/pelanggan/') ?>img/background-site.jpg" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="">
			</div>
			<div class="col-10">
				<div class="border-bottom border-top border-primary bg-light py-5 px-4">
					<div class="text-center">
						<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Book Us</small>
						<h1 class="display-5 mb-5">Checkout</h1>
					</div>
					<form action="<?= base_url('Pelanggan/cCheckout/pesan') ?>" method="POST">
						<div class="row g-4 form">
							<div class="col-lg-8 col-md-6">
								<h2>Pengiriman</h2>
								<select name="kecamatan" class="form-select border-primary p-2" id="ongkir" aria-label="Default select example">
									<option value="">--Pilih Kecamatan--</option>
									<?php foreach ($kecamatan as $key => $value) { ?>
										<option value="<?= $value->id_pengiriman ?>" data-ongkir=<?= number_format($value->ongkir)  ?> data-total=<?= $this->cart->total() +  $value->ongkir ?>><?= $value->nama_kecamatan ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-lg-4">
								<div class="order_box">
									<h2>Pembayaran</h2>
									<table>
										<tr>
											<th>Total Pembelian :</th>
											<td>Rp. <?php echo $this->cart->format_number($this->cart->total(), 0) ?></td>
										</tr>
										<tr>
											<th>Ongkir :</th>
											<td>Rp. <span class="ongkir"></span></td>
										</tr>
										<tr>
											<th>Total Pembayaran :</th>
											<td>Rp. <span class="total"></span></td>
										</tr>

										<input type="hidden" name="total" class="total">
										<tr>
											<td><button type="submit" class="btn btn-primary">Order</button></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-1">
				<img src="<?= base_url('asset/pelanggan/') ?>img/background-site.jpg" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="">
			</div>
		</div>
	</div>
</div>
<!-- Book Us End -->