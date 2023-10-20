<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Diskon Menu</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Diskon</li>
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
					<button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-percent"></i> Tambah Data Diskon
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Diskon Menu</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Menu</th>
										<th class="text-center">Nama Diskon</th>
										<th class="text-center">Besar Diskon</th>
										<th class="text-center">Tanggal Selesai</th>
										<th class="text-center">Level Member</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($diskon as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_menu ?></td>
											<td class="text-center"><?= $value->nama_diskon ?></td>
											<td class="text-center"><?= $value->diskon ?>%</td>
											<td class="text-center"><?= $value->tgl_selesai ?></td>
											<td class="text-center"><?php if ($value->member == '1') {
																		echo '<span class="badge badge-success">Gold</span>';
																	} else  if ($value->member == '2') {
																		echo '<span class="badge badge-warning">Silver</span>';
																	} else {
																		echo '<span class="badge badge-danger">Clasic</span>';
																	} ?></td>
											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cDiskon/delete/' . $value->id_diskon) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_diskon ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
												</div>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>

								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Menu</th>
										<th class="text-center">Nama Diskon</th>
										<th class="text-center">Besar Diskon</th>
										<th class="text-center">Tanggal Selesai</th>
										<th class="text-center">Level Member</th>
										<th class="text-center">Action</th>
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

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<form action="<?= base_url('admin/cDiskon/create') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Diskon</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Menu</label>
						<select class="form-control" name="menu" required>
							<option value="">---Pilih Menu---</option>
							<?php
							foreach ($menu as $key => $value) {
							?>
								<option value="<?= $value->id_menu ?>"><?= $value->nama_menu ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Diskon</label>
						<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Diskon" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Besar Diskon</label>
						<input type="text" name="besar" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Besar Diskon" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Tanggal Selesai</label>
						<input type="date" name="tgl" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Level Member </label>
						<select class="form-control" name="level" required>
							<option value="">---Pilih Level Member---</option>
							<option value="1">Gold</option>
							<option value="2">Silver</option>
							<option value="3">Clasic</option>
						</select>
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
foreach ($diskon as $key => $data) {
?>
	<div class="modal fade" id="edit<?= $data->id_diskon ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('admin/cdiskon/update/' . $data->id_diskon) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Data Diskon Menu</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Menu</label>
							<select class="form-control" name="menu" required>
								<option value="">---Pilih Menu---</option>
								<?php
								foreach ($menu as $key => $value) {
								?>
									<option value="<?= $value->id_menu ?>" <?php if ($data->id_menu == $value->id_menu) {
																				echo 'selected';
																			} ?>><?= $value->nama_menu ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Diskon</label>
							<input type="text" name="nama" value="<?= $data->nama_diskon ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Diskon" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Besar Diskon</label>
							<input type="text" name="besar" value="<?= $data->diskon ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Besar Diskon" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Tanggal Selesai</label>
							<input type="date" name="tgl" value="<?= $data->tgl_selesai ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Level Member </label>
							<select class="form-control" name="level" required>
								<option value="">---Pilih Level Member---</option>
								<option value="1" <?php if ($data->member == '1') {
														echo 'selected';
													} ?>>Gold</option>
								<option value="2" <?php if ($data->member == '2') {
														echo 'selected';
													} ?>>Silver</option>
								<option value="3" <?php if ($data->member == '3') {
														echo 'selected';
													} ?>>Clasic</option>
							</select>
						</div>

					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php
}
?>