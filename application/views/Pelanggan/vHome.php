<!-- Hero Start -->
<div class="container-fluid bg-light py-6 my-6 mt-0">
	<div class="container">
		<?php if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible mt-3">
				<h5><i class="icon fas fa-check"></i> Alert!</h5>
				<?= $this->session->userdata('success') ?>
			</div>
		<?php
		} ?>
		<div class="row g-5 align-items-center">
			<div class="col-lg-7 col-md-12">
				<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Selamat Datang di Website Kerupuk Seblak NDA</small>
				<h1 class="display-1 mb-4 animated bounceInDown">Kerupuk Seblak <span class="text-primary">NDA</span></h1>
			</div>
			<div class="col-lg-5 col-md-12">
				<img src="<?= base_url('asset/') ?>picture.png" class="img-fluid rounded animated zoomIn" alt="">
			</div>
		</div>
	</div>
</div>
<!-- Hero End -->



<!-- Menu Start -->
<div class="container-fluid menu py-6">
	<div class="container">
		<div class="text-center wow bounceInUp" data-wow-delay="0.1s">
			<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Produk</small>
			<h1 class="display-5 mb-5">Produk Kerupuk Seblak NDA</h1>
		</div>
		<div class="tab-class text-center">
			<ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">


			</ul>
			<div class="tab-content">

				<div class="row g-4">
					<?php
					$sekon = 1;
					foreach ($katalog as $key => $value) {
						if ($value->diskon != NULL) {
							if ($value->member == $this->session->userdata('member')) {

					?>
								<div class="col-lg-6 wow bounceInUp" data-wow-delay="0.<?= $sekon++ ?>s">
									<form action="<?= base_url('Pelanggan/cCart') ?>" method="POST">
										<input type="hidden" name="id" value="<?= $value->id_menu ?>">
										<input type="hidden" name="name" value="<?= $value->nama_menu ?>">

										<input type="hidden" name="stok" value="<?= $value->stok_menu ?>">
										<input type="hidden" name="gambar" value="<?= $value->gambar ?>">
										<div class="menu-item d-flex align-items-center">
											<img class="flex-shrink-0 img-fluid rounded-circle" style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="">

											<div class="w-100 d-flex flex-column text-start ps-4">
												<div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
													<h5><?= $value->nama_menu ?></h5>
													<input type="hidden" name="price" value="<?= $value->harga_menu - ($value->diskon / 100 * $value->harga_menu) ?>">
													<h5 class="text-primary">Rp. <?= number_format($value->harga_menu - ($value->diskon / 100 * $value->harga_menu)) ?></h5>
												</div>
												<p class="mb-0"><?= $value->deskripsi ?> </p>
												<div class="row">
													<div class="col-lg-6"><button type="submit" class="btn btn-primary mt-3">Tambah Keranjang</button></div>
													<div class="col-lg-6"></div>
												</div>

											</div>
										</div>
									</form>
								</div>

							<?php
							}
						} else {
							?>
							<div class="col-lg-6 wow bounceInUp" data-wow-delay="0.<?= $sekon++ ?>s">
								<form action="<?= base_url('Pelanggan/cCart') ?>" method="POST">
									<input type="hidden" name="id" value="<?= $value->id_menu ?>">
									<input type="hidden" name="name" value="<?= $value->nama_menu ?>">

									<input type="hidden" name="stok" value="<?= $value->stok_menu ?>">
									<input type="hidden" name="gambar" value="<?= $value->gambar ?>">
									<div class="menu-item d-flex align-items-center">
										<img class="flex-shrink-0 img-fluid rounded-circle" style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="">

										<div class="w-100 d-flex flex-column text-start ps-4">
											<div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
												<h5><?= $value->nama_menu ?></h5>

												<input type="hidden" name="price" value="<?= $value->harga_menu ?>">
												<h5 class="text-primary">Rp. <?= number_format($value->harga_menu) ?></h5>
											</div>
											<p class="mb-0"><?= $value->deskripsi ?> </p>
											<div class="row">
												<?php
												if ($this->session->userdata('id_pelanggan') != '') {
												?>
													<div class="col-lg-6"><button type="submit" class="btn btn-primary mt-3">Tambah Keranjang</button></div>
													<div class="col-lg-6"></div>
												<?php
												}
												?>

											</div>

										</div>
									</div>
								</form>
							</div>
					<?php
						}
					}
					?>
				</div>



			</div>
		</div>
	</div>
</div>
<!-- Menu End -->



<!-- Testimonial Start -->
<div class="container-fluid py-6">
	<div class="container">
		<div class="text-center wow bounceInUp" data-wow-delay="0.1s">
			<small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Testimonial</small>
			<h1 class="display-5 mb-5">Kritik dan Saran Pelanggan!</h1>
		</div>
		<div class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4 wow bounceInUp" data-wow-delay="0.1s">
			<?php
			foreach ($kritik_saran as $key => $value) {
				if ($value->id_pemesanan != '') {

			?>
					<div class="testimonial-item rounded bg-light">
						<div class="d-flex mb-3">
							<div class="position-absolute" style="top: 15px; right: 20px;">
								<i class="fa fa-quote-right fa-2x"></i>
							</div>
							<div class="ps-3 my-auto">
								<h4 class="mb-0"><?= $value->nama_pelanggan ?></h4>
								<p class="m-0"><?php if ($value->level_member == '3') {
													echo 'Clasic';
												} else if ($value->level_member == '2') {
													echo 'Silver';
												} else {
													echo 'Gold';
												} ?> <?= $value->time_kritik_saran ?></p>
							</div>
						</div>
						<div class="testimonial-content">

							<p class="fs-5 m-0 pt-3"><?= $value->kritik_saran ?></p>
						</div>
					</div>

				<?php
				} else {
				?>
					<div class="testimonial-item rounded bg-light">
						<div class="d-flex mb-3">
							<div class="position-absolute" style="top: 15px; right: 20px;">
								<i class="fa fa-quote-right fa-2x"></i>
							</div>
							<div class="ps-3 my-auto">
								<h4 class="mb-0">Pelanggan</h4>
								<p><?= $value->time_kritik_saran ?></p>
							</div>
						</div>
						<div class="testimonial-content">

							<p class="fs-5 m-0 pt-3"><?= $value->kritik_saran ?></p>
						</div>
					</div>
			<?php
				}
			}
			?>


		</div>
		<div class="owl-carousel testimonial-carousel testimonial-carousel-2 wow bounceInUp" data-wow-delay="0.3s">
			<?php
			foreach ($kritik_saran as $key => $value) {
				if ($value->id_pemesanan != '') {
			?>
					<div class="testimonial-item rounded bg-light">
						<div class="d-flex mb-3">
							<div class="position-absolute" style="top: 15px; right: 20px;">
								<i class="fa fa-quote-right fa-2x"></i>
							</div>
							<div class="ps-3 my-auto">
								<h4 class="mb-0"><?= $value->nama_pelanggan ?></h4>
								<p class="m-0"><?php if ($value->level_member == '3') {
													echo 'Clasic';
												} else if ($value->level_member == '2') {
													echo 'Silver';
												} else {
													echo 'Gold';
												} ?></p>
							</div>
						</div>
						<div class="testimonial-content">

							<p class="fs-5 m-0 pt-3"><?= $value->kritik_saran ?></p>
						</div>
					</div>

				<?php
				} else {
				?>
					<div class="testimonial-item rounded bg-light">
						<div class="d-flex mb-3">
							<div class="position-absolute" style="top: 15px; right: 20px;">
								<i class="fa fa-quote-right fa-2x"></i>
							</div>
							<div class="ps-3 my-auto">
								<h4 class="mb-0">Pelanggan</h4>
								<p><?= $value->time_kritik_saran ?></p>
							</div>
						</div>
						<div class="testimonial-content">
							<p class="fs-5 m-0 pt-3"><?= $value->kritik_saran ?></p>
						</div>
					</div>
			<?php
				}
			}
			?>


		</div>
	</div>
</div>
<!-- Testimonial End -->
