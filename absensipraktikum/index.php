<?php
session_start();
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

</html>
<html>
<style>
	#bgimage {
		background-image: url("assets/img/backg.jpg");
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		height: 100vh;
		margin: 0;
		padding: 0;
	}

	#card {
		padding: 20px;
		border-radius: 10px;
	}
</style>

</html>


<head>
	<title>Login | Absensi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../assets/img/logo1.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/_login/css/main.css">
	<!--===============================================================================================-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>

	<!-- <div class="limiter"> -->
	<div class="container-login100" id="bgimage">
		<div class="wrap-login100">
			<form method="post" action="" class="login100-form validate-form">
				<span class="login100-form-title p-b-48">
					<!-- <i class="zmdi zmdi-font"></i> -->
					<img src="assets/img/LOGO1.png" width="100">
				</span>
				<span class="login100-form-title p-b-26">
					Praktikum Teknik Komputer Fakultas Teknik Elektro
				</span>
				<div class="card-category">
				</div>
				</br>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="username">
					<span class="focus-input100" data-placeholder="NIM"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="password">
					<span class="btn-show-pass">
						<i class="zmdi zmdi-eye"></i>
					</span>
					<input class="input100" type="password" name="password">
					<span class="focus-input100" data-placeholder="Password"></span>
				</div>
				<div class="form-group mb-3">
					<!-- <input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span> -->
					<select class="form-control" name="level">
						<option>Status</option>
						<option value="1">Asisten</option>
						<option value="2">Praktikan</option>
						<!-- <option value="3">Laboran</option-->
					</select>
				</div>
				<br>
				<div class="container-login100-form-btn">
					<div class="btn btn-danger">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</div>


			</form>

			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$level = $_POST['level'];
				$pass = sha1($_POST['password']);
				if ($level == 1) {
					// asisten
					$sqlCek = mysqli_query($con, "SELECT * FROM tb_asisten WHERE nim='$_POST[username]' AND password='$pass' AND status='Y'");
					$jml = mysqli_num_rows($sqlCek);
					$d = mysqli_fetch_array($sqlCek);

					if ($jml > 0) {

						$_SESSION['asisten'] = $d['id_asisten'];

						echo "
                        <script type='text/javascript'>
                        setTimeout(function () { 
                        
                        swal('($d[nama_asisten]) ', 'Login berhasil', {
                        icon : 'success',
                        buttons: {        			
                        confirm: {
                        className : 'btn btn-success'
                        }
                        },
                        });    
                        },10);  
                        window.setTimeout(function(){ 
                        window.location.replace('./asisten/');
                        } ,3000);   
                        </script>";
					} else {
						echo "
                    <script type='text/javascript'>
                    setTimeout(function () { 
                    
                    swal('Login Gagal', 'Username atau password salah', {
                    icon : 'error',
                    buttons: {        			
                    confirm: {
                    className : 'btn btn-danger'
                    }
                    },
                    });    
                    },10);  
                    </script>";
					}
				} elseif ($level == 2) {
					// praktikan
					$sqlCek = mysqli_query($con, "SELECT * FROM tb_praktikan WHERE nim='$_POST[username]' AND password='$pass' AND status=1");
					$jml = mysqli_num_rows($sqlCek);
					$d = mysqli_fetch_array($sqlCek);

					if ($jml > 0) {
						$_SESSION['praktikan'] = $d['id_praktikan'];


						echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('($d[nama_praktikan]) ', 'Login berhasil', {
								icon : 'success',
								buttons: {        			
								confirm: {
								className : 'btn btn-success'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./praktikan/');
								} ,3000);   
								</script>";
					} else {
						echo "
								<script type='text/javascript'>
								setTimeout(function () { 
								
								swal('Sorry!', 'Username / Password Salah', {
								icon : 'error',
								buttons: {        			
								confirm: {
								className : 'btn btn-danger'
								}
								},
								});    
								},10);  
								window.setTimeout(function(){ 
								window.location.replace('./');
								} ,3000);   
								</script>";
					}
				}
			}

			?>
		</div>
	</div>
	<!-- </div> -->


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="assets/_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/_login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets/_login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="assets/_login/js/main.js"></script>
	<!--Instascan -->
	<script src="../assets/instascan/instascan.min.js"></script>
	<script type="text/javascript" src="instascan.min.js"></script>
	<!-- Webcam -->
	<script type="text/javascript" src="../assets/webcamjs/webcam.min.js"></script>



</body>

</html>