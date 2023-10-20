<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Menu Seblak NDA</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Tiket</li>
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
						<i class="fas fa-tag"></i> Tambah Data Menu
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Menu</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Gambar</th>
										<th class="text-center">Nama Menu</th>
										<th class="text-center">Deskripsi</th>
										<th class="text-center">Harga Menu</th>
										<th class="text-center">Stok Menu</th>

										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($menu as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"></td>
											<td class="text-center"><?= $value->nama_menu ?></td>
											<td class="text-center"><?= $value->deskripsi ?></td>
											<td class="text-center">Rp. <?= number_format($value->harga_menu)  ?></td>
											<td class="text-center"><?= $value->stok_menu ?></td>

											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cMenu/delete/' . $value->id_menu) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_menu ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
										<th class="text-center">Deskripsi</th>
										<th class="text-center">Harga Menu</th>
										<th class="text-center">Stok Menu</th>
										<th class="text-center">Gambar</th>
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
		<?php echo form_open_multipart('admin/cMenu/create'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Menu</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label for="exampleInputEmail1">Nama Menu</label>
					<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Menu" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Deskripsi</label>
					<input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Deskripsi" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Harga</label>
					<input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Stok Menu</label>
					<input type="number" name="stok" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Stok" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Gambar</label>
					<input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga" required>
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
foreach ($menu as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_menu ?>">
		<div class="modal-dialog">
			<?php echo form_open_multipart('admin/cMenu/update/' . $value->id_menu); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Data Menu</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="exampleInputEmail1">Nama Menu</label>
						<input type="text" name="nama" value="<?= $value->nama_menu ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Menu" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Deskripsi</label>
						<input type="text" name="deskripsi" value="<?= $value->deskripsi ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Deskripsi" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Harga</label>
						<input type="number" name="harga" class="form-control" value="<?= $value->harga_menu ?>" id="exampleInputEmail1" placeholder="Masukkan Harga" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Stok Menu</label>
						<input type="number" name="stok" class="form-control" value="<?= $value->stok_menu ?>" id="exampleInputEmail1" placeholder="Masukkan Stok" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Gambar</label><br>
						<img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>">
						<input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga">
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