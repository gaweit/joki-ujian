<?php 
    $kode_barang = $_GET['kode_barang'];
    $kd_pj = $_GET['kd_pj'];
	$id = $_GET['id'];
	$harga_jual= $_GET['harga_jual'];
   

		

    $sql2 = $koneksi->query("update tb_penjualan2 set jumlah=(jumlah - 1) where id='$id'");
    $sql = $koneksi->query("update tb_penjualan2 set total=(total - $harga_jual) where id='$id'");
     $sql3 = $koneksi->query("update tb_barang2 set stok=(stok + 1) where kode_barang='$kode_barang'");

		if ($sql2) {

            ?>
              <script>
                  
                  window.location.href="?page=penjualan&invoice=<?php echo $kd_pj; ?>";
              </script>

            <?php
          }

 ?>