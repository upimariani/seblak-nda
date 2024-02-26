<!-- Contact Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="p-5 bg-light rounded contact-form">
			<div class="row g-4">
				<div class="col-12">
					<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Pelanggan</small>
					<h1 class="display-5 mb-0">Registrasi Pelanggan</h1>
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
					<form action="<?= base_url('Pelanggan/cLogin/registrasi_here') ?>" method="POST">
						<input type="text" name="nama" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Masukkan Nama Pelanggan" required>
						<select name="jk" class="w-100 form-control p-3 mb-4 border-primary bg-light" required>
							<option value="">---Pilih Jenis Kelamin---</option>
							<option value="Perempuan">Perempuan</option>
							<option value="Laki - Laki">Laki - Laki</option>
						</select>
						<input type="number" name="no_hp" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Masukkan No Telepon" required>
						<div class="row">
							<div class="col-lg-6"><input type="text" name="username" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Masukkan Username" required></div>
							<div class="col-lg-6"><input type="text" name="password" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Masukkan Password" required></div>
						</div>
						<p>Anda Sudah memiliki akun? <a href="<?= base_url('Pelanggan/cLogin') ?>">Masuk</a></p>
						<button type="submit" class="w-100 btn btn-primary form-control p-3 border-primary bg-primary rounded-pill" type="submit">Daftar</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- Contact End -->