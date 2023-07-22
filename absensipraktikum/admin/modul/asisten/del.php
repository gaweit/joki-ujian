<?php
$del = mysqli_query($con, "DELETE FROM tb_asisten WHERE id_asisten=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=asisten';
		</script>";
}
