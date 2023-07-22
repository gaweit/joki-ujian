<?php

if (isset($_POST['savePraktikan'])) {

	$pass = sha1($_POST['nim']);
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = '../assets/img/user/';
	$nama_gambar = @$_FILES['foto']['name'];

	$save = mysqli_query($con, "INSERT INTO tb_asisten VALUES(NULL,'$_POST[nim]','$_POST[nama]','$pass','default.jpg','Y','$_POST[praktikum]') ");
	if ($save) {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=asisten');
				} ,3000);   
				</script>";
	}
} elseif (isset($_POST['editAsisten'])) {

	$pass = sha1($_POST['nim']);

	$editAsisten = mysqli_query($con, "UPDATE tb_asisten SET id_praktikum='$_POST[praktikum]' WHERE id_asisten='$_POST[id]' ");

	if ($editAsisten) {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}	
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=asisten');
				} ,3000);   
				</script>";
	}
}
