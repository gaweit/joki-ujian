<?php
$sql = $koneksi->query("select * from tb_barang");
while ($tampil = $sql->fetch_assoc()) {
    $jumlah_barang = $sql->num_rows;
}
?>
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <a href="?page=barang">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="content">
                        <div class="text">Data Barang</div>
                        <a class="small text-white stretched-link text" href="barang_masuk.php">View Details</a>
                    </div>
                </div>
            </div>
        </a>
        <a href="?page=pembelian">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="content">
                        <div class="text">Pembelian Barang</div>
                        <a class="small text-white stretched-link text" href="barang_masuk.php">View Details</a>
                    </div>
                </div>
            </div>
        </a>