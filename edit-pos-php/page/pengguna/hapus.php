<?php 

		$id = $_GET['id'];

		$sql = $koneksi->query("delete from tb_user where id='$id'");

		if ($sql) {

            ?>
              <script>
                  alert("Data Berhasil dihapus  ");
                  window.location.href="?page=pengguna";
              </script>

            <?php
          }

 ?>