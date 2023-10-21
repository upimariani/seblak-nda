<!-- Contact Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="p-5 bg-light rounded contact-form">
			<div class="row g-4">
				<div class="col-12">
					<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Pelanggan</small>
					<h1 class="display-5 mb-0">Login Pelanggan</h1>
					<?php if ($this->session->userdata('success')) {
					?>
						<div class="alert alert-success alert-dismissible mt-3">
							<h5><i class="icon fas fa-check"></i> Alert!</h5>
							<?= $this->session->userdata('success') ?>
						</div>
					<?php
					} ?>
					<?php if ($this->session->userdata('error')) {
					?>
						<div class="alert alert-danger alert-dismissible mt-3">
							<h5><i class="icon fas fa-check"></i> Alert!</h5>
							<?= $this->session->userdata('error') ?>
						</div>
					<?php
					} ?>
				</div>
				<div class="col-md-12 col-lg-12">
					<form action="<?= base_url('Pelanggan/cLogin/login') ?>" method="POST">
						<input type="text" name="username" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Masukkan Username" required>
						<input type="password" name="password" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Masukkan Password" required>
						<p>Anda Belum memiliki akun? <a href="<?= base_url('Pelanggan/cLogin/registrasi') ?>">Registrasi Here</a></p>
						<button type="submit" class="w-100 btn btn-primary form-control p-3 border-primary bg-primary rounded-pill" type="submit">Login</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- Contact End -->