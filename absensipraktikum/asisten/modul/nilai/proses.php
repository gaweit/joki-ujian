<?php

if (isset($_POST['simpannilai'])) {
	echo $_POST['nim'];
	echo $_POST['TP'];
	echo $_POST['TA'];
	$save = mysqli_query($con, "INSERT INTO tb_nilai VALUES(NULL,'$_POST[nim]','$_POST[id_prak]','$_POST[modul]','$_POST[TP]','$_POST[TA]','$_POST[D1]','$_POST[D2]','$_POST[D3]','$_POST[D4]','$_POST[i1]','$_POST[i2]') ");
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
				window.location.replace('?page=nilai&act=data');
				} ,3000);   
				</script>";
	}
}
