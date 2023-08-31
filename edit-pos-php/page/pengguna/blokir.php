<?php 

    $id = $_GET['id'];

    $sql = $koneksi->query("update tb_user set status='Blokir' where id='$id'");

    if ($sql) {

            ?>
              <script>
                  alert("Pengguna Berhasil diblokir  ");
                  window.location.href="?page=pengguna";
              </script>

            <?php
          }

 ?>