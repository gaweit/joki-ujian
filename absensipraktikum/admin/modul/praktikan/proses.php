<?php

if (isset($_POST['savePraktikan'])) {

	$pass = sha1($_POST['nim']);
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = '../assets/img/user/';
	$nama_gambar = @$_FILES['foto']['name'];
	$save = mysqli_query($con, "INSERT INTO tb_praktikan VALUES(NULL,'$_POST[nama]','$_POST[nim]','$pass',1,'default.png',0) ");
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
				window.location.replace('?page=praktikan');
				} ,3000);   
				</script>";
	}
} elseif (isset($_POST['editPraktikan'])) {
	// if ($_POST['status'] == 0) {
	// 	$password = '';
	// } else {
	// 	$enc_password = sha1($_POST['nim'], PASSWORD_DEFAULT);
	// 	$password = "'$enc_password'";
	// }
	$password = sha1($_POST['nim']);

	$editPraktikan = mysqli_query($con, "UPDATE tb_praktikan SET status='$_POST[status]', password='$password' WHERE id_praktikan='$_POST[id]' ");

	if ($editPraktikan) {
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
            }, 10);  
            window.setTimeout(function(){ 
                window.location.replace('?page=praktikan');
            }, 3000);   
            </script>";
	}
}
