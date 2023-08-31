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
                            <div class="sb-sidenav-menu-heading">Masuk sebagai Admin</div>
                            <img src="uploaded_img/employee 2.png" width="75" height="80"style="display: block; margin: 0 auto;">
                            <div class="sb-sidenav-menu-heading" style="margin-right: 5px;">Ralita</div>
                            
                            <a class="nav-link" href="profil.php" aria-expanded="false">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                My Profile
                            </a>
                            <a class="nav-link" href="logout.php" aria-expanded="false">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <div class="small">Ralita</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Pembelian Bahan Baku</h1>
                        <style>
                            .breadcrumb-item.active {
                            display: flex;
                            align-items: center;
                            }
  
                                .breadcrumb-item.active i {
                                margin-right: 30px; 
                                }
                        </style>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                            <i class="fas fa-home"></i>
                            Home
                            </li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Barang Masuk</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="barang_masuk.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Bukti Pembayaran</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bukti_bayar.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Belum Pembayaran</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="belum_bayar.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jatuh Tempo Pembayaran</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="jatuh_tempo.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-archive"></i>
                                Data Supplier
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Supplier</th>
                                                <th>No Telepon</th>
                                                <th>Alamat Supplier</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>CV Abadi Sentosa</td>
                                                <td>081208828388</td>
                                                <td>Jl. Pekan 5 Pasarbaru km 2</td>
                                                <td><a href="index.php?m=supplier&s=hapus&id_sup=<?php echo $row['id_sup'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a> | <a href="index.php?m=supplier&s=ubah&id_sup=<?php echo $row['id_sup'];?>" ><button class="btn btn-primary">Ubah</button></a></td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td>CV Rembulan</td>
                                                <td>08120883476</td>
                                                <td>Jl Bima Sakti</td>
                                                <td><a href="index.php?m=supplier&s=hapus&id_sup=<?php echo $row['id_sup'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a> | <a href="index.php?m=supplier&s=ubah&id_sup=<?php echo $row['id_sup'];?>" ><button class="btn btn-primary">Ubah</button></a></td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>CV Mars</td>
                                                <td>08936883657</td>
                                                <td>Jl Galaxy</td>
                                                <td><a href="index.php?m=supplier&s=hapus&id_sup=<?php echo $row['id_sup'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a> | <a href="index.php?m=supplier&s=ubah&id_sup=<?php echo $row['id_sup'];?>" ><button class="btn btn-primary">Ubah</button></a></td>
                                            </tr>
                                            <tr>
                                                <td>04</td>
                                                <td>CV Saturnus</td>
                                                <td>0833684523</td>
                                                <td>Jl Purnama</td>
                                                <td><a href="index.php?m=supplier&s=hapus&id_sup=<?php echo $row['id_sup'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a> | <a href="index.php?m=supplier&s=ubah&id_sup=<?php echo $row['id_sup'];?>" ><button class="btn btn-primary">Ubah</button></a></td>
                                            </tr>
                                            <tr>
                                                <td>05</td>
                                                <td>CV Merkurius</td>
                                                <td>0818484555</td>
                                                <td>Jl Milky Way</td>
                                                <td><a href="index.php?m=supplier&s=hapus&id_sup=<?php echo $row['id_sup'];?>" onclick="return confirm('Yakin Akan dihapus?')"><button class="btn btn-danger">Hapus</button></a> | <a href="index.php?m=supplier&s=ubah&id_sup=<?php echo $row['id_sup'];?>" ><button class="btn btn-primary">Ubah</button></a></td>
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
</html>
