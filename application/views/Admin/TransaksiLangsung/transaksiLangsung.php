<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Transaksi Langsung</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Transaksi</li>
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
							<h3 class="card-title">Transaksi Atas Nama</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>No </th>
										<th>Nama Produk</th>
										<th>Harga Produk</th>
										<th>Quantity</th>
										<th>Subtotal</th>
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody class="table-border-bottom-0">
									<?php
									$no = 1;
									foreach ($this->cart->contents() as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value['name'] ?></td>
											<td>Rp. <?= number_format($value['price'])  ?></td>
											<td><?= $value['qty'] ?></td>
											<td>Rp. <?= number_format($value['qty'] * $value['price'])  ?></td>
											<td class="text-center"><a href="<?= base_url('Admin/cTransaksiLangsung/delete/' . $value['rowid']) ?>">Hapus </a></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>

							<br>
							<button type="button" class="btn btn-warning mb-3" class="btn btn-default mb-3" data-toggle="modal" data-target="#tambah">
								Order Atas Nama
							</button>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<div class="row">
				<!-- Basic -->
				<div class="col-md-12">
					<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
						<?php
						foreach ($menu as $key => $value) {
						?>
							<form action="<?= base_url('Admin/cTransaksiLangsung/add_to_cart') ?>" method="POST">
								<input type="hidden" name="id" value="<?= $value->id_menu ?>">
								<input type="hidden" name="name" value="<?= $value->nama_menu ?>">
								<input type="hidden" name="price" value="<?= $value->harga_menu ?>">
								<input type="hidden" name="stok" value="<?= $value->stok_menu ?>">
								<input type="hidden" name="picture" value="<?= $value->gambar ?>">
								<input type="hidden" name="qty" value="1">
								<div class="col">
									<div class="card h-100">
										<img style="height: 350px;" class="card-img-top" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="Card image cap" />
										<div class="card-body">
											<h5 class="card-title"><?= $value->nama_menu ?></h5>
											<p class="card-text">
												Rp. <?= number_format($value->harga_menu) ?>

											</p>
											<button type="submit" class="btn btn-success mt-3">Add To Cart</button>
										</div>
									</div>
								</div>
							</form>
						<?php
						}
						?>


					</div>
				</div>

			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>


<div class="modal modal-top fade" id="tambah" tabindex="-1">
	<div class="modal-dialog">
		<form action="<?= base_url('Admin/cTransaksiLangsung/pesan_langsung') ?>" method="POST" class="modal-content">


			<div class="modal-header">
				<h5 class="modal-title" id="modalTopTitle">Data Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col mb-3">
						<?php
						$data = $this->db->query("SELECT * FROM `pelanggan`")->result();
						?>
						<label for="nameSlideTop" class="form-label">Nama Pelanggan</label>
						<select name="pelanggan" class="form-control">
							<option>---Pilih Nama Pelanggan---</option>
							<?php
							foreach ($pelanggan as $key => $value) {
							?>
								<option value="<?= $value->id_pelanggan ?>"><?= $value->nama_pelanggan ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Order</button>
			</div>
		</form>
	</div>
</div>