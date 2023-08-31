<?php 
    
    $kd_pb = $_GET['kd_pb'];
	$id = $_GET['id'];
    $kode_barang = $_GET['kode_barang'];
    $jumlah = $_GET['jumlah'];

		$sql = $koneksi->query("delete from tb_pembelian where id='$id'");

    $sql2 = $koneksi->query("update tb_barang2 set stok=(stok - $jumlah) where kode_barang='$kode_barang'");

		if ($sql) {

            ?>
              <script>
                  alert("Data Berhasil dihapus  <?php echo $kode; ?>");
                  window.location.href="?page=pembelian&invoice=<?php echo $kd_pb; ?>";
              </script>

            <?php
          }

 ?>