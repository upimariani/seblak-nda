<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Transaksi Pelanggan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Transaksi</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
		<?php
		if ($this->session->userdata('success')) {
		?>
			<div class="callout callout-success">
				<h5>Sukses!</h5>
				<p><?= $this->session->userdata('success') ?></p>
			</div>
		<?php
		}
		?>

	</section>


	<!-- Main content -->
	<sec class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="card card-warning card-tabs">
						<div class="card-header p-0 pt-1">
							<?php
							$belum_bayar = $this->db->query("SELECT COUNT(id_pemesanan) as jml FROM `pemesanan` WHERE status_pesan='0'")->row();
							$konfirmasi = $this->db->query("SELECT COUNT(id_pemesanan) as jml FROM `pemesanan` WHERE status_pesan='1'")->row();
							$proses = $this->db->query("SELECT COUNT(id_pemesanan) as jml FROM `pemesanan` WHERE status_pesan='2'")->row();
							$kirim = $this->db->query("SELECT COUNT(id_pemesanan) as jml FROM `pemesanan` WHERE status_pesan='3'")->row();
							?>
							<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Belum Bayar <span class="badge badge-success"><?= $belum_bayar->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Menunggu Konfirmasi <span class="badge badge-success"><?= $konfirmasi->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Pesanan Diproses <span class="badge badge-success"><?= $proses->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Pesanan Dikirim <span class="badge badge-success"><?= $kirim->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-one-selesai-tab" data-toggle="pill" href="#custom-tabs-one-selesai" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Pesanan Selesai </a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-one-tabContent">
								<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Informasi Transaksi Belum Bayar</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_pesan == '0') {

													?>
															<tr>
																<td><?= $no++ ?></td>
																<td><?= $value->nama_pelanggan ?></td>
																<td><?= $value->tgl_pesan ?></td>
																<td>Rp. <?= number_format($value->total_pesan)  ?></td>
																<td><?php
																	if ($value->status_pesan == '0') {
																	?>
																		<span class="badge badge-danger">Belum Bayar</span>
																	<?php
																	} else if ($value->status_pesan == '1') {
																	?>
																		<span class="badge badge-warning">Menunggu Konfirmasi</span>
																	<?php
																	} else if ($value->status_pesan == '2') {
																	?>
																		<span class="badge badge-info">Pesanan Diproses</span>
																	<?php
																	} else if ($value->status_pesan == '3') {
																	?>
																		<span class="badge badge-primary">Pesanan Dikirim</span>
																	<?php
																	} else if ($value->status_pesan == '4') {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																	}
																	?>
																</td>

																<td class="text-center"> <a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_pemesanan) ?>" class="btn btn-app">
																		<i class="fas fa-info"></i> Detail Transaksi
																	</a> </td>
															</tr>
													<?php
														}
													}
													?>
												</tbody>
												<tfoot>

													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Informasi Transaksi Menunggu Konfirmasi</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_pesan == '1') {

													?>
															<tr>
																<td><?= $no++ ?></td>
																<td><?= $value->nama_pelanggan ?></td>
																<td><?= $value->tgl_pesan ?></td>
																<td>Rp. <?= number_format($value->total_pesan)  ?></td>
																<td><?php
																	if ($value->status_pesan == '0') {
																	?>
																		<span class="badge badge-danger">Belum Bayar</span>
																	<?php
																	} else if ($value->status_pesan == '1') {
																	?>
																		<span class="badge badge-warning">Menunggu Konfirmasi</span>
																	<?php
																	} else if ($value->status_pesan == '2') {
																	?>
																		<span class="badge badge-info">Pesanan Diproses</span>
																	<?php
																	} else if ($value->status_pesan == '3') {
																	?>
																		<span class="badge badge-primary">Pesanan Dikirim</span>
																	<?php
																	} else if ($value->status_pesan == '4') {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																	}
																	?>
																</td>

																<td class="text-center"> <a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_pemesanan) ?>" class="btn btn-app">
																		<i class="fas fa-info"></i> Detail Transaksi
																	</a> </td>
															</tr>
													<?php
														}
													}
													?>
												</tbody>
												<tfoot>

													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Informasi Transaksi Sedang Diproses</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_pesan == '2') {

													?>
															<tr>
																<td><?= $no++ ?></td>
																<td><?= $value->nama_pelanggan ?></td>
																<td><?= $value->tgl_pesan ?></td>
																<td>Rp. <?= number_format($value->total_pesan)  ?></td>
																<td><?php
																	if ($value->status_pesan == '0') {
																	?>
																		<span class="badge badge-danger">Belum Bayar</span>
																	<?php
																	} else if ($value->status_pesan == '1') {
																	?>
																		<span class="badge badge-warning">Menunggu Konfirmasi</span>
																	<?php
																	} else if ($value->status_pesan == '2') {
																	?>
																		<span class="badge badge-info">Pesanan Diproses</span>
																	<?php
																	} else if ($value->status_pesan == '3') {
																	?>
																		<span class="badge badge-primary">Pesanan Dikirim</span>
																	<?php
																	} else if ($value->status_pesan == '4') {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																	}
																	?>
																</td>

																<td class="text-center"> <a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_pemesanan) ?>" class="btn btn-app">
																		<i class="fas fa-info"></i> Detail Transaksi
																	</a> </td>
															</tr>
													<?php
														}
													}
													?>
												</tbody>
												<tfoot>

													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
									<div class="card">
										<div class="card-header">
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_pesan == '3') {

													?>
															<tr>
																<td><?= $no++ ?></td>
																<td><?= $value->nama_pelanggan ?></td>
																<td><?= $value->tgl_pesan ?></td>
																<td>Rp. <?= number_format($value->total_pesan)  ?></td>
																<td><?php
																	if ($value->status_pesan == '0') {
																	?>
																		<span class="badge badge-danger">Belum Bayar</span>
																	<?php
																	} else if ($value->status_pesan == '1') {
																	?>
																		<span class="badge badge-warning">Menunggu Konfirmasi</span>
																	<?php
																	} else if ($value->status_pesan == '2') {
																	?>
																		<span class="badge badge-info">Pesanan Diproses</span>
																	<?php
																	} else if ($value->status_pesan == '3') {
																	?>
																		<span class="badge badge-primary">Pesanan Dikirim</span>
																	<?php
																	} else if ($value->status_pesan == '4') {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																	}
																	?>
																</td>

																<td class="text-center"> <a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_pemesanan) ?>" class="btn btn-app">
																		<i class="fas fa-info"></i> Detail Transaksi
																	</a> </td>
															</tr>
													<?php
														}
													}
													?>
												</tbody>
												<tfoot>

													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-one-selesai" role="tabpanel" aria-labelledby="custom-tabs-one-selesai-tab">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Informasi Transaksi Selesai</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_pesan == '4') {

													?>
															<tr>
																<td><?= $no++ ?></td>
																<td><?= $value->nama_pelanggan ?></td>
																<td><?= $value->tgl_pesan ?></td>
																<td>Rp. <?= number_format($value->total_pesan)  ?></td>
																<td><?php
																	if ($value->status_pesan == '0') {
																	?>
																		<span class="badge badge-danger">Belum Bayar</span>
																	<?php
																	} else if ($value->status_pesan == '1') {
																	?>
																		<span class="badge badge-warning">Menunggu Konfirmasi</span>
																	<?php
																	} else if ($value->status_pesan == '2') {
																	?>
																		<span class="badge badge-info">Pesanan Diproses</span>
																	<?php
																	} else if ($value->status_pesan == '3') {
																	?>
																		<span class="badge badge-primary">Pesanan Dikirim</span>
																	<?php
																	} else if ($value->status_pesan == '4') {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																	}
																	?>
																</td>

																<td class="text-center"> <a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_pemesanan) ?>" class="btn btn-app">
																		<i class="fas fa-info"></i> Detail Transaksi
																	</a> </td>
															</tr>
													<?php
														}
													}
													?>
												</tbody>
												<tfoot>

													<tr>
														<th>No</th>
														<th>Nama Pelanggan</th>
														<th>Tanggal Transaksi</th>
														<th>Total Bayar</th>
														<th>Status Pesanan</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>

				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</sec tion>
	<!-- /.content -->
</div>
