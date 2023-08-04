<?php
    include"class/paging.php";
    include"lib/fungsi_indotgl.php";
    include"lib/all_function.php";
    
    if(isset($_GET['mod']))
    {
        $mod = $_GET['mod']; //modul yang akan ditampilkan
        if ($mod == "home") {
            include"dashboard.php";
        }
        elseif($mod == "user")
        {
            include"mod/user/user.php";
        }
        elseif($mod == "menu")
        {
            include"mod/menu/menu.php";
        }
        elseif($mod == "modul")
        {
            include"mod/modul/modul.php";
        }

        elseif($mod == "kategori")
        {
            include"mod/kategori/kategori.php";
        }
        elseif($mod == "barang")
        {
            include"mod/barang/barang.php";
        }
        elseif($mod == "pelanggan")
        {
            include"mod/pelanggan/pelanggan.php";
        }
        elseif($mod == "supplier")
        {
            include"mod/supplier/supplier.php";
        }
        elseif($mod == "penjualan")
        {
            include"mod/penjualan/penjualan.php";
        }
        elseif($mod == "pembelian")
        {
            include"mod/pembelian/pembelian.php";
        }
        elseif($mod == "returpenjualan")
        {
            include"mod/retur/retur_penjualan.php";
        }
        elseif($mod == "returpembelian")
        {
            include"mod/retur/retur_pembelian.php";
        }
        elseif($mod == "laporan")
        {
            include"mod/laporan/laporan.php";
        }
        

    }
    else
    {
        header("location:index.php");
    }
?>