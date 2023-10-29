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
	console.log = function() {}
	$("#ongkir").on('change', function() {

		$(".ongkir").html($(this).find(':selected').attr('data-ongkir'));
		$(".ongkir").val($(this).find(':selected').attr('data-ongkir'));

		$(".total").html($(this).find(':selected').attr('data-total'));
		$(".total").val($(this).find(':selected').attr('data-total'));

	});
</script>
</body>

</html>