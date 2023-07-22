<?php
$del = mysqli_query($con, "DELETE FROM tb_praktikan WHERE id_praktikan=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=praktikan';
		</script>";
}
