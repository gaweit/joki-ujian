<?php

session_start();
include '../config/db.php';

if (!isset($_SESSION['praktikan'])) {
?> <script>
		alert('Maaf ! Anda Belum Login !!');
		window.location = '../user.php';
	</script>
<?php
}
?>


<?php
$id_login = @$_SESSION['praktikan'];
$query = "SELECT * FROM tb_praktikan
WHERE id_praktikan = '$id_login'";
$result = mysqli_query($con, $query);
?>
<?php if ($result) : ?>

	<?php $data = mysqli_fetch_array($result); ?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Praktikan | Absensi Praktikum</title>
		<link rel="icon" type="image/png" href="../assets/img/LOGO1.png" />
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

		<!-- Fonts and icons -->
		<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Lato:300,400,700,900"]
				},
				custom: {
					"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
					urls: ['../assets/css/fonts.min.css']
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!-- CSS Files -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/atlantis.min.css">
		<!-- fontawesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link rel="stylesheet" href="../assets/css/demo.css">

		<style>
			.nama {
				overflow-wrap: break-word;
				word-wrap: break-word;
				word-break: break-word;
				white-space: normal;
			}
		</style>
	</head>

	<body>
		<div class="wrapper">
			<div class="main-header">
				<!-- Logo Header -->
				<div class="logo-header" data-background-color="dark2">

					<a href="index.php" class="logo">
						<!-- <img src="../assets/img/Logo1.png" alt="navbar brand" class="navbar-brand" width="40"> -->
						<b class="text-white">Presensi Praktikum</b>
					</a>
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="icon-menu"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
					<div class="nav-toggle">
						<button class="btn btn-toggle toggle-sidebar">
							<i class="icon-menu"></i>
						</button>
					</div>
				</div>
				<!-- End Logo Header -->

				<!-- Navbar Header -->
				<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">

					<div class="container-fluid">
						<!-- 	<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> -->
						<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
							<!-- <li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> -->



							<li class="nav-item dropdown hidden-caret">
								<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
									</div>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="dropdown-user-scroll scrollbar-outer">
										<li>
											<div class="user-box">
												<div class="avatar-lg"><img src="../assets/img/user/<?= $data['foto'] ?>" alt="image profile" class="avatar-img rounded"></div>
												<div class="u-text">
													<h4><?= $data['nama_praktikan'] ?></h4>
													<p class=""><?= $data['nim'] ?></p>
													<!-- <a href="?page=jadwal" class="btn btn-xs btn-secondary btn-sm">Jadwal Mengajar</a> -->
												</div>
											</div>
										</li>
										<li>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="" data-toggle="modal" data-target="#pengaturanAkun" class="collapse">Akun Saya</a>
											<a class="dropdown-item" href="" data-toggle="modal" data-target="#gantiPassword" class="collapse">Ganti Password</a>
											<div class="dropdown-divider"></div>
											<p class="text-danger">
												<a class="dropdown-item" href="logout.php">Logout</a>
											</p>
										</li>
									</div>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- End Navbar -->
			</div>

			<!-- Sidebar -->
			<div class="sidebar sidebar-style-2">
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar-sm float-left mr-2">
								<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										<span class="nama" style="width: fit-content;padding: 0px; font-weight:bolder"><?php $nama = $data['nama_praktikan'];
																														$nama_kecil = strtolower($nama);
																														$nama_kapital = ucwords($nama_kecil);
																														echo $nama_kapital ?></span>
										<span class="user-level"><?= $data['nim'] ?></span>
										<!-- <span class="caret"></span> -->
									</span>
								</a>
								<!-- <div class="clearfix"></div> -->

								<div class="collapse in" id="collapseExample">
									<ul class="nav">
										<li>
											<a href="" data-toggle="modal" data-target="#pengaturanAkun" class="collapsed">
												<span class=" link-collapse">Akun Saya</span>
											</a>
										</li>
										<li>
											<a href="#" data-toggle="modal" data-target="#gantiPassword" class="collapsed">
												<span class="link-collapse">Ganti Password</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<ul class="nav nav-dark">
							<li class="nav-item active">
								<a href="index.php" class="collapsed">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>
								</a>
							</li>
							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Menu Utama</h4>
							</li>
							<li class="nav-item">
								<a href="?page=praktikum">
									<i class="fas fa-clipboard-check"></i>
									<p>Praktikum saya</p>
								</a>

							</li>
							<li class="nav-item">
								<a href="?page=myqr">
									<i class="fas fa-qrcode"></i>
									<p>QR</p>
								</a>
							</li>



							<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-list-alt"></i>
								<p>Nilai</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<a href="?page=nilai">
										<span class="link-collapse">Lihat Nilai</span>
									</a>
								</ul>
							</div>
						</li> -->



							<hr>

							<li class="nav-item active mt-3"">
						<a href=" ?page=contact">
								<i class="fa-solid fa-headset"></i>
								<p>Contact Us</p>
								</a>
							</li>
							<br><br><br><br><br>
							<li class="nav-item active mt-3">
								<a href="logout.php" class="collapsed">
									<i class="fas fa-arrow-alt-circle-left"></i>
									<p>Logout</p>
								</a>
							</li>
							<!-- 
						<li class="mx-4 mt-2">
							<a href="logout.php" class="btn btn-primary btn-block"><span class="btn-label"> <i class="fas fa-arrow-alt-circle-left"></i> </span> Logout</a> 
						</li> -->
						</ul>
					</div>
				</div>
			</div>
			<!-- End Sidebar -->

			<!-- Modal pengaturan akun-->
			<div class="modal fade" id="pengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="akunAtur">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="akunAtur"><i class="fas fa-user-cog"></i> Pengaturan Akun</h3>
						</div>
						<form action="" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="text" name="nama" class="form-control" value="<?= $data['nama_praktikan'] ?>">
									<input type="hidden" name="id" value="<?= $data['id_praktikan'] ?>">
								</div>
								<div class="form-group">
									<label>NIM</label>
									<input type="text" name="username" class="form-control-plaintext" readonly value="<?= $data['nim'] ?>">
								</div>
								<div class="form-group">
									<label>Foto Profile</label>
									<p>
										<img src="../assets/img/user/<?= $data['foto'] ?>" class="img-thumbnail" style="height: 50px;width: 50px;">
									</p>
									<input type="file" name="foto">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button name="updateProfile" type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
						<?php
						if (isset($_POST['updateProfile'])) {

							$gambar = @$_FILES['foto']['name'];
							if (!empty($gambar)) {
								move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
								$ganti = mysqli_query($con, "UPDATE tb_praktikan SET foto='$gambar' WHERE id_praktikan='$_POST[id]' ");
							}

							$sqlEdit = mysqli_query($con, "UPDATE tb_praktikan SET nama_praktikan='$_POST[nama]',nim='$_POST[username]' WHERE id_praktikan='$_POST[id]' ") or die(mysqli_error($konek));

							if ($sqlEdit) {
								echo "<script>
                        alert('Sukses ! Data berhasil diperbarui');
                        window.location='index.php';
                        </script>";
							}
						}
						?>
					</div>
				</div>
			</div>
			<!-- end modal pengaturan akun -->

			<div class="modal fade bs-example-modal-sm" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="gantiPass">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="gantiPass">Ganti Password</h4>
						</div>
						<form action="" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label">Password Lama</label>
									<input name="pass" type="text" class="form-control" placeholder="Password Lama">
								</div>
								<div class="form-group">
									<label class="control-label">Password Baru</label>
									<input name="pass1" type="text" class="form-control" placeholder="Password Baru">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button name="changePassword" type="submit" class="btn btn-danger">Ganti Password</button>
							</div>
						</form>
						<?php
						if (isset($_POST['changePassword'])) {
							$passLama = $data['password'];
							$pass = sha1($_POST['pass']);
							$newPass = sha1($_POST['pass1']);

							if ($passLama == $pass) {
								$set = mysqli_query($con, "UPDATE tb_praktikan SET password ='$newPass' WHERE id_praktikan='$data[id_praktikan]' ");
								echo "<script type='text/javascript'>
				alert('Password Telah berubah')
				window.location.replace('index.php'); 
				</script>";
							} else {
								echo "<script type='text/javascript'>
				alert('Password Lama Tidak cocok')
				window.location.replace('index.php'); 
				</script>";
							}
						}
						?>

					</div>
				</div>
			</div>

			<!--unset($data)-->


			<div class="main-panel">
				<div class="content">

					<!-- Halaman dinamis -->
					<?php
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
						switch ($page) {
							case 'myqr':
								include 'modul/praktikum/qr.php';
								break;
							case 'praktikum':
								include 'modul/praktikum/praktikum.php';
								break;
							case 'akun':
								include 'akun/akun.php';
								break;
							case 'addpraktikum':
								include 'modul/praktikum/addpraktikum.php';
								break;
							case 'jadwal':
								include 'modul/praktikum/addjadwal.php';
								break;
							case 'contact':
								include 'modul/praktikum/contact.php';
								break;

							default:
								echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
								break;
						}
					} else {
						include 'modul/home.php';
						mysqli_free_result($result);
					}

					?>

				</div>
			</div>


		</div>
		</div>


		</div>
		<!--   Core JS Files   -->
		<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="../assets/js/core/popper.min.js"></script>
		<script src="../assets/js/core/bootstrap.min.js"></script>

		<!-- jQuery UI -->
		<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

		<!-- jQuery Scrollbar -->
		<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


		<!-- Datatables -->
		<script src="../assets/js/plugin/datatables/datatables.min.js"></script>



		<!-- Sweet Alert -->
		<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

		<!-- Atlantis JS -->
		<script src="../assets/js/atlantis.min.js"></script>

		<!-- Atlantis DEMO methods, don't include it in your project! -->
		<script src="../assets/js/setting-demo.js"></script>



	</body>

	</html>

<?php endif ?>