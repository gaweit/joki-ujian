<?php

    $page = $_GET['page'];
    $aksi = $_GET['aksi'];

    if ($page == "barang") {
        if ($aksi == "") {
          include "page/barang/barang.php";
        }

         if ($aksi == "tambah") {
          include "page/barang/tambah.php";
        }

        if ($aksi == "ubah") {
          include "page/barang/ubah.php";
        }

         if ($aksi == "hapus") {
          include "page/barang/hapus.php";
        }

    } if ($page == "pelanggan") {
        if ($aksi == "") {
          include "page/pelanggan/pelanggan.php";
        }

         if ($aksi == "tambah") {
          include "page/pelanggan/tambah.php";
        }

        if ($aksi == "ubah") {
          include "page/pelanggan/ubah.php";
        }

         if ($aksi == "hapus") {
          include "page/pelanggan/hapus.php";
        }

    }


    if ($page == "data_pj") {
        if ($aksi == "") {
          include "page/data_pj/data_pj.php";
        }

         if ($aksi == "tambah") {
          include "page/data_pj/tambah.php";
        }

        if ($aksi == "ubah") {
          include "page/data_pj/ubah.php";
        }

         if ($aksi == "hapus") {
          include "page/data_pj/hapus.php";
        }

    }



    if ($page == "pengguna") {
        if ($aksi == "") {
            include "page/pengguna/pengguna.php";
          }

        if ($aksi == "tambah") {
            include "page/pengguna/tambah.php";
          }

        if ($aksi == "ubah") {
          include "page/pengguna/edit.php";
        }

        if ($aksi == "hapus") {
          include "page/pengguna/hapus.php";
        }

        if ($aksi == "blokir") {
          include "page/pengguna/blokir.php";
        }

        if ($aksi == "aktif") {
          include "page/pengguna/aktif.php";
        }

    }if ($page == "penjualan") {
        if ($aksi == "") {
            include "page/penjualan/penjualan.php";
          }

         if ($aksi == "hapus") {
            include "page/penjualan/hapus.php";
          } 

           if ($aksi == "tambah") {
            include "page/penjualan/tambah.php";
          } 

          if ($aksi == "kurang") {
            include "page/penjualan/kurang.php";
          } 

          if ($aksi == "cetak") {
            include "page/penjualan/cetak.php";
          }  
    }if ($page == "pembelian") {
        if ($aksi == "") {
            include "page/pembelian/pembelian.php";
          }

         if ($aksi == "hapus") {
            include "page/pembelian/hapus.php";
          } 

          if ($aksi == "cetak") {
            include "page/pembelian/cetak.php";
          }  
    }
	if ($page == "retur") {
        if ($aksi == "") {
            include "page/retur/retur.php";
          }

         if ($aksi == "hapus") {
            include "page/retur/hapus.php";
          } 

          if ($aksi == "cetak") {
            include "page/retur/cetak.php";
          }  
    } 


	if ($page == "profile") {
            if ($aksi == "") {
            include "profile.php";
          }if ($aksi == "ubah") {
            include "ubah_password.php";
          }

    }if ($page == "laporan_jual") {
            if ($aksi == "") {
            include "page/laporan/laporan_jual.php";
          }

    }
	
	if ($page == "lap_retur") {
            if ($aksi == "") {
            include "page/laporan/retur.php";
          }

    }
	
	if ($page == "laporan_beli") {
            if ($aksi == "") {
            include "page/laporan/laporan_beli.php";
          }

          } else if ($page == "") {
              include "home.php";
          }            
         


 ?>
