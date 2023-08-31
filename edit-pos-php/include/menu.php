<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="index.php">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <?php if ($_SESSION['admin'] ) {?>

        <li>

            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">view_module</i>
                <span>Data Master</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="?page=barang">Barang</a>
                </li>
                <li>
                    <a href="?page=pelanggan">Pelanggan</a>
                </li>
                
                
                
                
            </ul>
        </li>

        

        <li>
            <a href="?page=pengguna">
               <i class="material-icons">person</i>
                <span>pengguna</span>
            </a>
        </li>

        <?php } ?>

        

        <li>


            <a href="?page=penjualan&invoice=<?php echo "$finalcode";?>">
                <i class="material-icons">shopping_cart</i>
                <span>Penjualan</span>
            </a>
        </li>

        <li>
            <a href="?page=pembelian&invoice=<?php echo "$finalcodep";?>">
                <i class="material-icons">shopping_cart</i>
                <span>Pembelian</span>
            </a>
        </li>
		
		 <li>
            <a href="?page=retur&invoice=<?php echo "$finalcoder";?>">
                <i class="material-icons">shopping_cart</i>
                <span>Retur</span>
            </a>
        </li>


         <li>
            <a href="?page=data_pj">
                <i class="material-icons">view_module</i>
                <span>Data Penjualan</span>
            </a>
        </li>

         <?php if ($_SESSION['admin'] ) {?>

        <li>

            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">print</i>
                <span>Laporan</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="?page=laporan_jual">Penjualan</a>
                </li>
                <li>
                    <a href="?page=laporan_beli">Pembelian</a>
                </li>
				
				 <li>
                    <a href="?page=lap_retur">Retur</a>
                </li>
                
                
            </ul>
        </li>

        <?php } ?>




        <li class="active">


        </li>






    </ul>
</div>
