<?php 

    $id = $_GET['id'];

    $sql = $koneksi->query("update tb_user set status='Aktif' where id='$id'");

    if ($sql) {

            ?>
              <script>
                  alert("Pengguna Berhasil Diaktifkan  ");
                  window.location.href="?page=pengguna";
              </script>

            <?php
          }

 ?>