<?php
	error_reporting(0);
	include"../../koneksi/koneksi.php";

	$filename = "barang_exel-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vdn.ms-exel");



?>

<h2>Laporan Data Barang</h2>

<table border="1">
	<tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Satuan </th>
        <th>Stok</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Profit</th>
        
        
    </tr>

    <?php
     	$no=1;
     	$sql = $koneksi->query("select * from tb_barang2");
     	while ($tampil=$sql->fetch_assoc()) {


      ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $tampil['kode_barang'] ?> </td>
            <td><?php echo $tampil['nama_barang'] ?> </td>
            <td><?php echo $tampil['satuan'] ?> </td>
            <td>

                

                <?php 

                    $stok = $tampil['stok'];

                    if ($stok<=5) {
                        
                        echo "<b><font color='red'> $stok</b> ";
                    } else{
                         echo "<b><font color='green'> $stok</>";
                    }

                ?> 

                                            
            </td>
            <td><?php echo $tampil['harga_beli'] ?> </td>
            <td><?php echo $tampil['harga_jual'] ?> </td>
            <td><?php echo $tampil['profit'] ?> </td>
            



    <?php  } ?>

</table>
