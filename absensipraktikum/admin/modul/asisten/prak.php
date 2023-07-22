<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Asisten</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="dashboard.php">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="?page=asisten">Data Asisten</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="?page=asisten">Daftar Asisten</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <!-- datatables -->
                        <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
                        <script type="text/javascript" src="../datatables/datatables.js"></script>

                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama Asisten</th>
                                    <th>Status</th>
                                    <th>Foto</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $asisten = mysqli_query($con, "SELECT * FROM tb_asisten WHERE id_praktikum='$_GET[id]' ");
                                    foreach ($asisten as $a) { ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>

                                            <td><?= $a['nim']; ?></td>
                                            <td><?= $a['nama_asisten']; ?></td>
                                            <td><?php if ($a['status'] == 'Y') {
                                                    echo "<span class='badge badge-success'>Aktif</span>";
                                                } else {
                                                    echo "<span class='badge badge-danger'>Off</span>";
                                                } ?></td>
                                            <td><img src="../assets/img/user/<?= $a['foto'] ?>" width="45" height="45"></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="?page=asisten&act=edit&id=<?= $a['id_asisten'] ?>"><i class="far fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#example').DataTable();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>