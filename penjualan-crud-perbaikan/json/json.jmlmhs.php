<?php
	date_default_timezone_set('Asia/Jakarta');
	session_start();

	if(!isset($_SESSION['login_user'])){
		header('location: ../login.php'); // Mengarahkan ke Home Page
	}

	include"../lib/conn.php";

	$mhs_aktif = 0;
	$mhs_non_aktif = 0;
	$mhs_lulus = 0;
	$mhs_drop_out = 0;
	$mhs_keluar = 0;

	//$data_points = array();

	$sql_mhs = mysql_query("SELECT * FROM mahasiswa");
	while($m = mysql_fetch_assoc($sql_mhs))
	{
		if($m['sts_kul'] == "Aktif")
		{
			$mhs_aktif += 1;
		}
		elseif($m['sts_kul'] == "Tidak Aktif")
		{
			$mhs_non_aktif += 1;
		}
		elseif($m['sts_kul'] == "Lulus")
		{
			$mhs_lulus += 1;
		}
		elseif($m['sts_kul'] == "Drop Out")
		{
			$mhs_drop_out += 1;
		}
		elseif($m['sts_kul'] == "Keluar")
		{
			$mhs_keluar += 1;
		}

	}
	$point = array(array("legendText" => "Aktif" , "y" => $mhs_aktif, "indexLabel" => "Aktif (".$mhs_aktif." Orang)"),
				array("legendText" => "Tidak Aktif" , "y" => $mhs_non_aktif, "indexLabel" => "Tidak Aktif (".$mhs_non_aktif." Orang)"),
				array("legendText" => "Lulus" , "y" => $mhs_lulus, "exploded" => true, "indexLabel" => "Lulus (".$mhs_lulus." Orang)"),
				array("legendText" => "Drop Out" , "y" => $mhs_drop_out, "indexLabel" => "Drop Out (".$mhs_drop_out." Orang)"),
				array("legendText" => "Keluar" , "y" => $mhs_keluar, "exploded" => true, "indexLabel" => "Keluar (".$mhs_keluar." Orang)"));
	//array_push($data_points, $point);

	echo json_encode($point, JSON_NUMERIC_CHECK);
?>