<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Jadwal</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Jadwal Praktikan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Daftar Jadwal Praktikan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>

                <!-- datatables -->
                <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
                <script type="text/javascript" src="../datatables/datatables.js"></script>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Praktikan</th>
                                    <th>Praktikum</th>
                                    <th>Hari</th>
                                    <th>Shift</th>
                                    <!-- <th>Opsi </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $praktikum = mysqli_query($con, "SELECT * FROM tb_jadwal 
                            INNER JOIN tb_praktikan ON tb_jadwal.nim = tb_praktikan.nim
                            WHERE tb_jadwal.id_modul=1
                               ");
                                foreach ($praktikum as $d) {
                                ?>

                                    <tr>
                                        <th scope="row"><b><?= $no++; ?>.</b></th>
                                        <td><?= $d['nama_praktikan'] ?></td>
                                        <td><?= $d['nama_praktikum'] ?></td>
                                        <td><?= $d['hari'] ?></td>
                                        <td><?= $d['shift'] ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
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