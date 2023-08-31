<?php 

	$id= $_GET['id'];

	$sql = $koneksi->query("delete from tb_customer2 where id_customer='$id'");

	
if ($sql) {

            ?>
              <script>
                  alert("Data Berhasil dihapus  ");
                  window.location.href="?page=pelanggan";
              </script>

            <?php
          }


 ?>