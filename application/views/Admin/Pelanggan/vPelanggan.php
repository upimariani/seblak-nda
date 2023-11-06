<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pelanggan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pelanggan</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<?php if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible mt-3">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Alert!</h5>
				<?= $this->session->userdata('success') ?>
			</div>
		<?php
		} ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12  ">

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Pelanggan</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Pelanggan</th>
										<th class="text-center">Jenis Kelamin</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Point</th>
										<th class="text-center">Level Member</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pelanggan as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_pelanggan ?></td>
											<td class="text-center"><?= $value->jk_pelanggan ?></td>
											<td class="text-center"><?= $value->no_hp_pelanggan ?></td>
											<td class="text-center"><?= $value->point ?></td>
											<td class="text-center"><?php if ($value->level_member == '1') {
																		echo '<span class="badge badge-success">Gold</span>';
																	} else  if ($value->level_member == '1') {
																		echo '<span class="badge badge-warning">Silver</span>';
																	} else {
																		echo '<span class="badge badge-danger">Clasic</span>';
																	} ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Pelanggan</th>
										<th class="text-center">Jenis Kelamin</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Point</th>
										<th class="text-center">Level Member</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>