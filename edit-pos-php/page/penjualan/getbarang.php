<?php

 $koneksi = new mysqli("localhost","root","","pos_latihan");
$barcode= $_POST['barcode'];
$query = $koneksi->query("SELECT * FROM tb_barang2 WHERE kode_barang='$barcode'");
$data = $query->fetch_assoc();

echo json_encode($data);
?>