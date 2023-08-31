<?php 
require("../../koneksi.php");
$kode = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_penjualan WHERE id='$_GET[id]'"));

$kode_pj = $kode['kode_penjualan'];
$bayar = $kode['bayar'];
$kembali = $kode['kembali'];
?>

<body onload="javascript:print()">
<h4>Struk Belanjaan</h4>
<table>
	<tr>
		<td>Toko Serba Ada </td>
	</tr>
	<tr>
		<td>Jalan Raya Patimura, no 144, Padang</td>
	</tr>
</table>

<table>
    <tr>
      <td>Kode Penjualan &nbsp&nbsp</td>
      <td>: &nbsp&nbsp <?php echo $kode_pj ?></td>
  </tr>
</table>

<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Jumlah Beli</th>
    <th>Diskon</th>
    <th>Sub Total</th>
  </tr>
	<?php
		$sql=$koneksi->query("SELECT * from tb_penjualan, tb_penjualan_detail, tb_barang
                      where tb_penjualan.kode_penjualan = tb_penjualan_detail.kode_penjualan
                      and tb_penjualan_detail.kode_barcode=tb_barang.kode_barcode
                      and tb_penjualan.kode_penjualan='$kode_pj'");
    $total_keseluruhan = 0;
		while($tampil = mysqli_fetch_assoc($sql)){ 
      $total_keseluruhan += $tampil['harga_jual'] * $tampil['jumlah'];
      $total = $tampil['harga_jual'] * $tampil['jumlah'];
      $diskon = $total * $tampil['diskon']/100;

      $subtot = $total - $diskon;  
	?>
	<tr>
		<td><?php echo $tampil['nama_barang'];?></td>
		<td><?php echo "Rp. ".number_format($tampil['harga_jual'])?></td>
    <td><?php echo $tampil['jumlah'];?></td>
    <td><?php echo $diskon;?></td>
    <td><?php echo $subtot;?></td>
	</tr>
  <?php } ?>
</table>
<table align="left" style="border: none;">
  <tr>
      <td>Total &nbsp&nbsp</td>
      <td>: &nbsp&nbsp <?php echo $total_keseluruhan ?></td><br>
    </tr>
<tr>
      <td>Bayar &nbsp&nbsp</td>
      <td>: &nbsp&nbsp <?php echo $bayar ?></td><br>
    </tr>
    <tr>
      <td>Kembali &nbsp&nbsp</td>
      <td>: &nbsp&nbsp <?php echo $kembali ?></td>
  </tr>
</table>
</body>