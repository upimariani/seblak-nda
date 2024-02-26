<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-4">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Level Member Gold</span>
							<span class="info-box-number">

							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-4">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Level Member Silver</span>
							<span class="info-box-number"> </span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-4">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-barcode"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Level Member Clasic</span>
							<span class="info-box-number"> </span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- <div class="row">
				<div class="col-6 table-responsive">
					<canvas id="grafik_member" height="150"></canvas>


				</div>
				<div class="col-6 table-responsive">
					<canvas id="grafik_transaksi" height="150"></canvas>


				</div>
		</div> -->

			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<div class="col-md-12">
					<!-- MAP & BOX PANE -->


					<!-- TABLE: LATEST ORDERS -->
					<div class="card">
						<div class="card-header border-transparent">
							<h3 class="card-title">Informasi Status Menunggu Konfirmasi Transaksi</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="table-responsive">
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
							<!-- /.table-responsive -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<a href="<?= base_url('Admin/cTransaksi') ?>" class="btn btn-sm btn-info float-left">Lihat Transaksi</a>
						</div>
						<!-- /.card-footer -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-6">
					<!-- MAP & BOX PANE -->


				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->