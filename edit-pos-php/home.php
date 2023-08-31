<?php 

	$tgl_jual = date("Y-m-d");

	$sql = $koneksi->query("select * from tb_penjualan2, tb_barang2 where tb_penjualan2.kode_barang=tb_barang2.kode_barang and tanggal_penjualan='$tgl_jual'");

	while($tampil=$sql->fetch_assoc()){

	$profit = $tampil['profit'] * $tampil['jumlah'];

	$total_pj = $total_pj+$tampil['total']; 
    $total_profit = $total_profit+$profit;

	}

	 $sql2 = $koneksi->query("select * from tb_barang2");
    while($data2=$sql2->fetch_assoc()){
       $jml_barang=$sql2->num_rows; 

}

 ?>

<marquee>Selamat Datang Di PT. NANKEI ANUGERAH ABADI</marquee><br><br>
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">view_module</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Barang</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $jml_barang .'&nbsp'."Barang" ; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Penjualan Hari ini</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo "Rp." .number_format( $total_pj); ?>,-</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Profit Hari ini</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?php echo "Rp." .number_format( $total_profit); ?>,-</div>
                        </div>
                    </div>
                </div>
                
           