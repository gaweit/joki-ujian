<?php

//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","web-penjualan");

//menambah data barang
if(isset($_POST['addnewbarang'])){
    $tanggal = $_POST['tanggal'];
    $no_supp = $_POST['no_supp'];
    $no_telp = $_POST['no_telp'];
    $harga_brg = $_POST['harga_brg'];
    $jml_brg = $_POST['jml_brg'];
    $tot_harga = $_POST['tot_harga'];
    $tgl_jatuhtempo = $_POST['tgl_jatuhtempo'];
    $bukti_bayar = $_POST['bukti_bayar'];

        $sql = "INSERT INTO `web-penjualan`.'data_barang' (tanggal, no_supp, no_telp, harga_brg, jml_brg, tot_harga, tgl_jatuh_tempo, bukti_bayar) VALUES ('$tanggal', $no_supp, '$no_telp', '$harga_brg', '$jml_brg', '$tot_harga', '$tgl_jatuhtempo', '$bukti_bayar')";
            if($sql){
            echo '<script>window.history.back()</script>';
                //echo "berhasil";
            }else{
                var_dump($sql);
                echo "gagal";
            }
}


?>