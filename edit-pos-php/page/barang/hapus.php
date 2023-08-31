<?php 

		$id = $_GET['id'];

		$sql = $koneksi->query("delete from tb_barang2 where kode_barang='$id'");

		if ($sql) {

            ?>
              <script>
                  alert("Data Berhasil dihapus  <?php echo $kode; ?>");
                  window.location.href="?page=barang";
              </script>

            <?php
          }

 ?>