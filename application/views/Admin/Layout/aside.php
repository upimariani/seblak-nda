<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-warning elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Seblak NDA</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Selamat Datang, Admin</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('Admin/cDashboard') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDashboard') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cUser') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cUser') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-users-cog"></i>
						<p>
							Data User
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cMenu') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cMenu') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-tag"></i>
						<p>
							Data Menu
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cDiskon') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDiskon') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-percent"></i>
						<p>
							Data Diskon
						</p>
					</a>
				</li>
				<!-- <li class="nav-item">
					<a href="<?= base_url('Admin/cOngkir') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cOngkir') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-car-side"></i>
						<p>
							Data Ongkir
						</p>
					</a>
				</li> -->

				<li class="nav-item">
					<a href="<?= base_url('Admin/cTransaksi') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksi') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-shopping-cart"></i>
						<p>
							Transaksi
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('cAuth/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>SignOut</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>