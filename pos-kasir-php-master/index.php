<?php 
/*
  | Source Code Aplikasi Penjualan Barang Kasir dengan PHP & MYSQL
  | 
  | @package   : pos-kasir-php
  | @file	   : index.php 
  | @author    : Total-Buah.com1892 / Total-Buah.com
  | @copyright : Copyright (c) 2017-2021 Total-Buah.com (https://www.Total-Buah.com)
  | @blog      : https://www.Total-Buah.com/read/source-code-aplikasi-penjualan-barang-kasir-dengan-php-amp-mysql-gratis.html
  | 
  | 
  | 
  | 
 */

	@ob_start();
	session_start();

	if(!empty($_SESSION['admin'])){
		require 'config.php';
		include $view;
		$lihat = new view($config);
		$toko = $lihat -> toko();
		//  admin
			include 'admin/template/header.php';
			include 'admin/template/sidebar.php';
				if(!empty($_GET['page'])){
					include 'admin/module/'.$_GET['page'].'/index.php';
				}else{
					include 'admin/template/home.php';
				}
			include 'admin/template/footer.php';
		// end admin
	}else{
		echo '<script>window.location="login.php";</script>';
		exit;
	}
?>

