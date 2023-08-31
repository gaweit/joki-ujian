<?php 
     
    $kode_barang = $_GET['kode_barang'];
    

    $kd_pj = $_GET['kd_pj'];
	$id = $_GET['id'];
	$harga_jual= $_GET['harga_jual'];

  $stok= $_GET['stok'];

  if ($stok == 0) {


    ?>
        <script type="text/javascript">
            alert("Jumlah Melebihi Stok, Silakan Input Ulang");
            window.location.href="?page=penjualan&invoice=<?php echo $kd_pj; ?>";
        </script>
    <?php
    
  }else{
   

		

    $sql2 = $koneksi->query("update tb_penjualan2 set jumlah=(jumlah + 1) where id='$id'");
    $sql = $koneksi->query("update tb_penjualan2 set total=(total + $harga_jual) where id='$id'");
    $sql2 = $koneksi->query("update tb_barang2 set stok=(stok - 1) where kode_barang='$kode_barang'");

		if ($sql2) {

            ?>
              <script>
                  
                  window.location.href="?page=penjualan&invoice=<?php echo $kd_pj; ?>";
              </script>

            <?php
          }


    }      

 ?>