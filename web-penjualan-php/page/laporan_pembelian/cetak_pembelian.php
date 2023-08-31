<?php
//session_start();
//ob_start();
include_once("../../koneksi.php"); 
?>
<html>
<head>
  <title>LAPORAN PENJUALAN PEMBELIAN</title>
</head>
<body>
 
  <center>
 
    <h2>LAPORAN PENJUALAN PEMBELIAN</h2>
    
  </center>
 <?php
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
            echo '<b>Data Transaksi Bulan '.$nama_bulan[$_POST['bulan']].' </b><br /><br />';

            ?>
 
 
  <table border="1" style="width: 100%">
    <tr>
      <th width="1%">No</th>
      <th>No. Faktur</th>
      <th>Tanggal</th>
      <th>Supplier</th>
      <th>Nama Barang</th>
      <th>Stok</th>
    </tr>
      <?php
       $no = 1;

       $sql = $koneksi->query("SELECT *, p.id AS idsup, p.stok AS stokk from tb_pembelian p LEFT JOIN tb_supplier s on p.nama_supplier=s.nama_supplier left join tb_barang b on b.kode_barcode=p.kode_barcode WHERE MONTH(tanggal)='$_POST[bulan]' ");

      while ($data = $sql->fetch_assoc()) {
        
      
    ?>
       <tr>
          <td><?php echo $no++;?></td>
          <td align="center"><?php echo $data['nofaktur']?></td>
          <td align="center"><?php echo $data['tanggal']?></td>
          <td><?php echo $data['nama_supplier']?></td>
          <td><?php echo $data['nama_barang']?></td>
          <td align="center"><?php echo $data['stokk']?></td>


	</tr>
    <?php 
   
    } 
    ?>

    
  </table>
 <p><br>
  <div align="right" >Pimpinan </div><p></br>
  <div align="right">Ferry</div>
  <script>
    window.print();
  </script>
 
</body>
</html>


