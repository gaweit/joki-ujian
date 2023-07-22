<?php
@session_start();
include '../config/db.php';

if (!isset($_SESSION['asisten'])) {
?> <script>
		alert('Maaf ! Anda Belum Login !!');
		window.location = '../user.php';
	</script>
<?php
}
?>


<?php

$id_login = @$_SESSION['asisten'];
$sql = mysqli_query($con, "SELECT * FROM tb_asisten
 WHERE id_asisten = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);

// tampilkan data mengajar
// $mengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 

// INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
// INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

// INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
// INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
// WHERE tb_mengajar.id_asisten='$data[id_asisten]' AND tb_thajaran.status=1 ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Asisten | Absensi Praktikum</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/LOGO1.png" type="image/png" />

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

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
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
												<h4><?= $data['nama_asisten'] ?></h4>
												<p class="text-muted"><?= $data['email'] ?></p>
												<a href="?page=jadwal&act=data" class="btn btn-xs btn-secondary btn-sm">Jadwal Mengajar</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="" data-toggle="modal" data-target="#pengaturanAkun" class="collapse">Akun Saya</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="" data-toggle="modal" data-target="#gantiPassword" class="collapse">Ganti Password</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout.php">Logout</a>
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
						<div class="avatar-sm float-left">
							<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $data['nama_asisten'] ?>
									<span class="user-level"><?= $data['nim'] ?></span>
									<!-- <span class="caret"></span> -->
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a class="dropdown-item" href="" data-toggle="modal" data-target="#pengaturanAkun" class="collapse">Akun Saya</a>
									</li>
									<li>
										<a class="dropdown-item" href="" data-toggle="modal" data-target="#gantiPassword" class="collapse">Ganti Password</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-dark2">
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
							<h4 class="text-section">Main Utama</h4>
						</li>
						<li class="nav-item">
							<a href="?page=jadwal&act=data">
								<i class="fa-solid fa-calendar-week"></i>
								<p>Jadwal</p>
							</a>

						</li>
						<li class="nav-item">
							<a href="?page=praktikan&act=data">
								<i class="fas fa-users"></i>
								<p>Praktikan</p>
							</a>

						</li>
						<li class="nav-item">
							<a href="?page=presensi&act=data">
								<i class="fas fa-qrcode"></i>
								<p>Presensi</p>
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
						<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#rekapAbsen">
								<i class="fas fa-list-alt"></i>
								<p>Absen</p>
								<span class="caret"></span>
							</a> -->
						<div class="collapse" id="rekapAbsen">
							<ul class="nav nav-collapse">
								<a href="?page=absen&act=absen_kelas">
									<span class="link-collapse">Lihat Absen</span>
								</a>
								<?php


								foreach ($mengajar as $dm) { ?>
									<li>
										<a href="?page=rekap&pelajaran=<?= $dm['id_mengajar'] ?> ">
											<span class="sub-item"><!-- <?= strtoupper($dm['mapel']); ?> -->KELAS (<?= strtoupper($dm['nama_kelas']); ?>)</span>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
						</li>
						<li class="nav-item active mt-3">
							<a href="logout.php" class="collapsed">
								<i class="fas fa-arrow-alt-circle-left"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

				<!-- Halaman dinamis -->
				<?php
				error_reporting();
				$page = @$_GET['page'];
				$act = @$_GET['act'];

				if ($page == 'presensi') {
					if ($act == 'data') {
						include 'modul/presensi/data.php';
					} elseif ($act == 'add') {
						include 'modul/presensi/add.php';
					} elseif ($act == 'scan') {
						include 'modul/presensi/scan.php';
					} elseif ($act == 'proses') {
						include 'modul/presensi/proses.php';
					} elseif ($act == 'rekap') {
						include 'modul/presensi/rekap.php';
					}
				} elseif ($page == 'praktikan') {
					if ($act == 'data') {
						include 'modul/praktikan/data.php';
					} elseif ($act == 'praktikum') {
						include 'modul/praktikan/praktikum.php';
					} elseif ($act == '') {
						include '';
					} elseif ($act == '') {
						include '';
					} elseif ($act == '') {
						include '';
					}
				} elseif ($page == 'nilai') {
					if ($act == 'data') {
						include 'modul/nilai/data.php';
					} elseif ($act == 'add') {
						include 'modul/nilai/add.php';
					} elseif ($act == '') {
						include '';
					} elseif ($act == '') {
						include '';
					} elseif ($act == '') {
						include '';
					}
				} elseif ($page == 'jadwal') {
					if ($act == 'data') {
						include 'modul/jadwal/data.php';
					} elseif ($act == 'add') {
						include 'modul/jadwal/add.php';
					} elseif ($act == 'praktikan') {
						include 'modul/jadwal/praktikan.php';
					}
				}
				// if ($page == 'absen') {
				// 	if ($act == '') {
				// 		include 'modul/absen/absen.php';
				// 	}
				// 	} elseif ($act == 'surat_view') {
				// 		include 'modul/absen/view_surat_izin.php';
				// 	} elseif ($act == 'konfirmasi') {
				// 		include 'modul/absen/konfirmasi_izin.php';
				// 	} elseif ($act == 'update') {
				// 		include 'modul/absen/absen_kelas_update.php';
				// 	}
				if ($page == 'presensi') {
					if ($act == '') {
						include 'modul/absen/absen_kelas.php';
					} elseif ($act == 'surat_view') {
						include 'modul/absen/view_surat_izin.php';
					} elseif ($act == 'konfirmasi') {
						include 'modul/absen/konfirmasi_izin.php';
					} elseif ($act == 'update') {
						include 'modul/absen/absen_kelas_update.php';
					}
				} elseif ($page == 'praktikan') {
					if ($act == '') {
						include 'modul/asisten/data.php';
					} elseif ($act == 'add') {
						include 'modul/asisten/add.php';
					} elseif ($act == 'edit') {
						include 'modul/asisten/edit.php';
					} elseif ($act == 'del') {
						include 'modul/asisten/del.php';
					} elseif ($act == 'proses') {
						include 'modul/asisten/proses.php';
					}
				} elseif ($page == 'rekap') {
					if ($act == '') {
						include 'modul/rekap/rekap_absen.php';
					}
				} elseif ($page == 'praktikan') {
					if ($act == '') {
						include 'modul/praktikan/listpraktikan.php';
					}
				} elseif ($page == 'akun') {
					include 'modul/akun/akun.php';
				} elseif ($page == '') {
					include 'modul/home.php';
				} elseif ($page == 'nilai') {
					include 'modul/nilai/nilai.php';
				} elseif ($page == 'input') {
					include 'modul/nilai/inputnilai.php';
				} elseif ($page == 'scan') {
					include 'modul/presensi/scanqr.php';
				} elseif ($page == 'add') {
					include 'modul/presensi/add.php';
				} elseif ($page == 'webcam') {
					include 'modul/presensi/webcamqr.php';
				}


				?>


				<!-- end -->



			</div>
		</div>
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
								<input type="text" name="nama" class="form-control" value="<?= $data['nama_asisten'] ?>">
								<input type="hidden" name="id" value="<?= $data['id_asisten'] ?>">
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
							$ganti = mysqli_query($con, "UPDATE tb_asisten SET foto='$gambar' WHERE id_asisten='$_POST[id]' ");
						}

						$sqlEdit = mysqli_query($con, "UPDATE tb_asisten SET nama_asisten='$_POST[nama]',nim='$_POST[username]' WHERE id_asisten='$_POST[id]' ") or die(mysqli_error($konek));

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
		<!-- modal ganti password -->
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
							<button name="changePassword" type="submit" class="btn btn-primary">Ganti Password</button>
						</div>
					</form>
					<?php
					if (isset($_POST['changePassword'])) {
						$passLama = $data['password'];
						$pass = sha1($_POST['pass']);
						$newPass = sha1($_POST['pass1']);

						if ($passLama == $pass) {
							$set = mysqli_query($con, "UPDATE tb_asisten SET password='$newPass' WHERE id_asisten='$data[id_asisten]' ");
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

		<!--end modal ganti password -->

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
	<!--Instascan -->
	<script src="assets/instascan/instascan.min.js"></script>
	<script type="text/javascript" src="instascan.min.js"></script>
	<!-- Webcam -->
	<script type="text/javascript" src="assets/webcamjs/webcam.min.js"></script>
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />




	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>


</body>

</html>