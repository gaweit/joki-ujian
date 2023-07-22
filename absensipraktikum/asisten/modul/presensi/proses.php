<?php

if (isset($_POST['savePraktikum'])) {
	$save = mysqli_query($con, "INSERT INTO tb_kegiatan VALUES(NULL,'$_POST[praktikum]','$_POST[modul]','$_POST[hari]','$_POST[shift]')");
	if ($save) {
		echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[praktikum]) ', 'Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=presensi&act=data');
				} ,3000);   
				</script>";
	}
} elseif (isset($_POST['editAsisten'])) {

	$pass = ($_POST['nim']);
	$gambar = @$_FILES['foto']['name'];
	if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
		$ganti = mysqli_query($con, "UPDATE tb_asisten SET foto='$gambar' WHERE id_asisten='$_POST[id]' ");
	}
	$editAsisten = mysqli_query($con, "UPDATE tb_asisten SET nama_asisten='$_POST[nama]' WHERE id_asisten='$_POST[id]' ");

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
} elseif ($del) {
	echo " <script>
                alert('Data telah dihapus !');
                window.location='?page=presensi&act=data';
                </script>";
}
