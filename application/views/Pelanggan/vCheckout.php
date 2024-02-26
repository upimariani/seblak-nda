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
						<h1 class="display-5 mb-5">Pengiriman</h1>
					</div>
					<form action="<?= base_url('Pelanggan/cCheckout/pesan') ?>" method="POST">
						<div class="row g-4 form">
							<div class="col-lg-8 col-md-6 mt-3">
								<div class="row">
									<div class="col-lg-12 mt-3">
										<h2>Provinsi</h2>
										<select name="provinsi" class="form-select border-primary p-2" aria-label="Default select example" required>

										</select>
									</div>
									<div class="col-lg-12 mt-3">
										<h2>Kota/Kabupaten</h2>
										<select name="kota" class="form-select border-primary p-2" aria-label="Default select example" required>

										</select>
									</div>
									<div class="col-lg-12 mt-3">
										<h2>Ekspedisi</h2>
										<select name="expedisi" class="form-select border-primary p-2" aria-label="Default select example" required>

										</select>
									</div>
									<div class="col-lg-12 mt-3">
										<h2>Paket</h2>
										<select name="paket" class="form-select border-primary p-2" aria-label="Default select example" required>

										</select>
									</div>
									<div class="col-lg-12 mt-3">
										<h2>Alamat Detail</h2>
										<textarea class="form-control" name="alamat" required></textarea>
									</div>
								</div>
							</div>
							<input type="hidden" name="estimasi">
							<input type="hidden" name="ongkir">
							<input type="hidden" name="total_bayar">
							<input type="hidden" name="subtotal" value="<?= $this->cart->total() ?>">
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
											<td><span id="ongkir"></span></td>
										</tr>
										<tr>
											<th>Total Pembayaran :</th>
											<td><span id="total_bayar"></span></td>
										</tr>
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

<!-- Copyright Start -->
<div class="container-fluid copyright bg-dark py-4">
	<div class="container">
		<div class="row">

			<div class="col-md-6 my-auto text-center text-md-end text-white">
				<!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
				<!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
				<!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
				SEBLAK - NDA
			</div>
		</div>
	</div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/pelanggan/') ?>lib/wow/wow.min.js"></script>
<script src="<?= base_url('asset/pelanggan/') ?>lib/easing/easing.min.js"></script>
<script src="<?= base_url('asset/pelanggan/') ?>lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url('asset/pelanggan/') ?>lib/counterup/counterup.min.js"></script>
<script src="<?= base_url('asset/pelanggan/') ?>lib/lightbox/js/lightbox.min.js"></script>
<script src="<?= base_url('asset/pelanggan/') ?>lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url('asset/pelanggan/') ?>js/main.js"></script>
<script>
	$(document).ready(function() {
		$.ajax({
			type: "POST",
			url: "http://localhost/seblak-nda/pelanggan/ongkir/provinsi",
			success: function(hasil_provinsi) {
				console.log(hasil_provinsi);
				$("select[name=provinsi]").html(hasil_provinsi);
			}
		});

		$("select[name=provinsi]").on("change", function() {
			var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
			$.ajax({
				type: "POST",
				url: "http://localhost/seblak-nda/pelanggan/ongkir/kota",
				data: 'id_provinsi=' + id_provinsi_terpilih,
				success: function(hasil_kota) {
					$("select[name=kota]").html(hasil_kota);
				}
			});
		});

		$("select[name=kota]").on("change", function() {
			$.ajax({
				type: "POST",
				url: "http://localhost/seblak-nda/pelanggan/ongkir/expedisi",
				success: function(hasil_expedisi) {
					$("select[name=expedisi]").html(hasil_expedisi);
				}
			});
		});


		$("select[name=expedisi]").on("change", function() {
			//mendapatkan expedisi terpilih
			var expedisi_terpilih = $("select[name=expedisi]").val()

			//mendapatkan id kota tujuan terpilih
			var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');

			//alert(total_berat);
			$.ajax({
				type: "POST",
				url: "http://localhost/seblak-nda/pelanggan/ongkir/paket",
				data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=1000',
				success: function(hasil_paket) {
					$("select[name=paket]").html(hasil_paket);
				}
			});
		});


		$("select[name=paket]").on("change", function() {
			//menampilkan ongkir
			var dataongkir = $("option:selected", this).attr('ongkir');
			var reverse = dataongkir.toString().split('').reverse().join(''),
				ribuan_ongkir = reverse.match(/\d{1,3}/g);
			ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
			//alert(dataongkir);
			$("#ongkir").html("Rp. " + ribuan_ongkir)
			//menghitung total bayar
			var ongkir = $("option:selected", this).attr('ongkir');
			var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);

			var reverse2 = total_bayar.toString().split('').reverse().join(''),
				ribuan_total = reverse2.match(/\d{1,3}/g);
			ribuan_total = ribuan_total.join(',').split('').reverse().join('');
			$("#total_bayar").html("Rp. " + ribuan_total);

			//estimasi dan ongkir
			var estimasi = $("option:selected", this).attr('estimasi');
			$("input[name=estimasi]").val(estimasi);
			$("input[name=ongkir]").val(dataongkir);
			$("input[name=total_bayar]").val(total_bayar);
		});
	});
</script>
</body>

</html>