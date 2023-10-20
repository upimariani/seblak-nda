<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>PELANGGAN | SEBLAK NDA</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="<?= base_url('asset/pelanggan/') ?>lib/animate/animate.min.css" rel="stylesheet">
	<link href="<?= base_url('asset/pelanggan/') ?>lib/lightbox/css/lightbox.min.css" rel="stylesheet">
	<link href="<?= base_url('asset/pelanggan/') ?>lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="<?= base_url('asset/pelanggan/') ?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Template Stylesheet -->
	<link href="<?= base_url('asset/pelanggan/') ?>css/style.css" rel="stylesheet">
</head>

<body>

	<!-- Spinner Start -->
	<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
		<div class="spinner-grow text-primary" role="status"></div>
	</div>
	<!-- Spinner End -->


	<!-- Navbar start -->
	<div class="container-fluid nav-bar">
		<div class="container">
			<nav class="navbar navbar-light navbar-expand-lg py-4">
				<a href="index.html" class="navbar-brand">
					<h1 class="text-primary fw-bold mb-0">Seblak<span class="text-dark">NDA</span> </h1>
				</a>
				<button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
					<span class="fa fa-bars text-primary"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav mx-auto">
						<a href="index.html" class="nav-item nav-link active">Home</a>
						<a href="about.html" class="nav-item nav-link">Pesanan Saya</a>
						<a href="about.html" class="nav-item nav-link">Login</a>
						<a href="about.html" class="nav-item nav-link"></i>Selamat Datang,</a>

						<?php
						$jml = 0;
						foreach ($this->cart->contents() as $key => $value) {
							$jml += $value['qty'];
						}
						?>
						<a href="<?= base_url('Pelanggan/cCart/view') ?>" class="nav-item nav-link"><i class="bi bi-cart"></i><span class="badge bg-success"><?= $jml ?></span></a>

					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Navbar End -->