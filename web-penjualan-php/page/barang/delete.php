<?php
	$kode_barcode2 = $_GET['id'];
	$sql = $koneksi->query("delete  from tb_barang where kode_barcode='$kode_barcode2'");
?>

<script type="text/javascript">
					alert("Data Berhasil di Hapus");
					window.location.href="?page=barang";
</script> 