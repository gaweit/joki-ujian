<div class="panel-header bg-dark-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administrator</h2>
				<h5 class="text-white op-7 mb-2">Selamat Datang, <b class="text-white"><?= $data['nama_lengkap']; ?></b></h5>
			</div>
			<!-- <div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
							</div> -->
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-6">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">
						<center>
							<img src="../assets/img/logo1.png" width="100">
							<br>
							<b>Telkom University</b>
						</center>
					</div>
					<div class="card-category">
						<center>
							Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Telkom University, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257
							<br>Telp. 0227564108
						</center>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<!-- 	<div class="card-header">
									<h4 class="card-title">Nav Pills With Icon (Horizontal Tabs)</h4>
								</div> -->
				<div class="card-body">

					<div class="row">

						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-users"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Total Praktikan</p>
												<h4 class="card-title"><?php echo $jumlahPraktikan; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-default card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-user-tie"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Total Asisten</p>
												<h4 class="card-title"><?php echo $jumlahAsisten; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>

		<!-- <div class="col">
			<div class="card">
				<div class="card-header">
					<h2>Menu Utama</h2>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<th>Menu</th>
								<th>Opsi</th>
							</thead>
							<tbody>
								<tr>
									<td>Mata Praktikum</td>
									<td>
										<a href="?page=master&act=data">
											<button type="button" class="btn btn-dark">Lihat</button>
										</a>
									</td>
								</tr>
								<tr>
									<td>Data Asisten</td>
									<td>
										<a href="?page=asisten&act=add">
											<button type="button" class="btn btn-dark">Tambah Asisten</button>
										</a>
										<a href="?page=asisten">
											<button type="button" class="btn btn-dark" href="">Lihat Data</button>
										</a>
									</td>
								</tr>
								<tr>
									<td>Data Praktikan</td>
									<td>
										<a href="?page=praktikan&act=add">
											<button type="button" class="btn btn-dark">Tambah Praktikan</button>
										</a>
										<a href="?page=praktikan">
											<button type="button" class="btn btn-dark" href="">Lihat Data</button>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>

				<div class="card-body">

				</div>

			</div>
		</div> -->


	</div>
</div>

<div class="row">



</div>

</div>