<?php
require 'function.php';

session_start();
$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">PT Harmoni Citra Jaya</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->            
            <ul class="navbar-nav ml-auto ml-md-0">
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="index.php" aria-expanded="false">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Go Home
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Another Menu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="bukti_bayar.php"><i class="fas fa-list-alt" style="margin-right: 10px;"></i>Bukti Pembayaran</a>
                                    <a class="nav-link" href="belum_bayar.php"><i class="fas fa-list-alt" style="margin-right: 10px;"></i>Belum Melakukan Pembayaran</a>
                                    <a class="nav-link" href="jatuh_tempo.php"><i class="fas fa-list-alt" style="margin-right: 10px;"></i>Jatuh Tempo Pembayaran</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="logout.php" aria-expanded="false">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>
                        </div>
                    </div>
                    <?php
                         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                         if(mysqli_num_rows($select) > 0){
                            $fetch = mysqli_fetch_assoc($select);
                         }else{
                            echo '<img src="uploaded_img/'.$fetch['image'].'">';
                         }
                    ?>

                    <div class="sb-sidenav-footer">
                        <div class="medium">Logged in as:</div>
                        <h3 class="medium"><?php echo $fetch['name']; ?></h3>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Barang Masuk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Input Barang Masuk</li>
                        </ol>
                    <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Barang
                            </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>No Supplier</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Total Pembayaran</th>
                                                <th>Tanggal Jatuh Tempo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2023/08/17</td>
                                                <td>01</td>
                                                <td>Smartphone</td>
                                                <td>800.000</td>
                                                <td>2</td>
                                                <td>1.600.000</td>
                                                <td>2023/09/20</td>
                                            </tr>
                                            <tr>
                                                <td>2023/08/30</td>
                                                <td>02</td>
                                                <td>Tablet</td>
                                                <td>1.200.000</td>
                                                <td>2</td>
                                                <td>2.400.000</td>
                                                <td>2023/09/15</td>
                                            </tr>
                                            <tr>
                                                <td>2023/11/20</td>
                                                <td>03</td>
                                                <td>Laptop</td>
                                                <td>2.000.000</td>
                                                <td>3</td>
                                                <td>6.000.000</td>
                                                <td>2023/12/20</td>
                                            </tr>
                                            <tr>
                                                <td>2023/12/12</td>
                                                <td>04</td>
                                                <td>CPU PC</td>
                                                <td>400.000</td>
                                                <td>1</td>
                                                <td>400.000</td>
                                                <td>2023/12/30</td>
                                            </tr>
                                            <tr>
                                                <td>2024/01/10</td>
                                                <td>05</td>
                                                <td>Monitor</td>
                                                <td>2.000.000</td>
                                                <td>2</td>
                                                <td>4.000.000</td>
                                                <td>2024/02/15</td>
                                            </tr>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PT Harmoni Citra Jaya 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Barang</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
            <input type="date" name="tanggal" placeholder="Tanggal" class="form-control">
            <br>
            <input type="number" name="no_supp" placeholder="No Supplier" class="form-control">
            <br>
            <input type="text" name="no_telp" placeholder="No Telepon" class="form-control">
            <br>
            <input type="text" name="harga_brg" placeholder="Harga Barang" class="form-control">
            <br>
            <input type="text" name="jml_brg" placeholder="Jumlah Barang" class="form-control">
            <br>
            <input type="text" name="tot_harga" placeholder="Total Pembayaran" class="form-control">
            <br>
            <input type="text" name="tgl_jatuhtempo" placeholder="Tanggal Jatuh Tempo" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
            </div>
            </form>
            
        </div>
        </div>
    </div>

</html>
