<div class="page-inner">

    <div class="page-header">
        <h4 class="page-title">Presensi</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="index.php">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Presensi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data Kegiatan</a>
            </li>
        </ul>
    </div>

    <!-- <a href="javascript:history.back()" class="btn btn-danger wrap-login100" style=" margin-bottom: 10px">
        <i class="fas fa-arrow-circle-left"></i> Kembali</a><br> -->

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <!-- <a href="?page=presensi&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a> -->
                        <a href="#" data-toggle="modal" data-target="#tambahKegiatan" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Kegiatan</a>
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
                                        <th>Praktikum</th>
                                        <th>Modul</th>
                                        <th>Hari</th>
                                        <th>Shift</th>
                                        <th>Opsi</th>

                                        <!-- <th>Opsi </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $praktikum = mysqli_query($con, "SELECT * FROM tb_kegiatan
                           		 				 INNER JOIN tb_praktikum ON tb_kegiatan.id_praktikum=tb_praktikum.id_praktikum
                           		 				 INNER JOIN tb_modul ON tb_kegiatan.id_modul=tb_modul.id_modul
												 INNER JOIN tb_hari ON tb_kegiatan.id_hari=tb_hari.id_hari
                            					 INNER JOIN tb_shift ON tb_kegiatan.id_shift=tb_shift.id_shift
												 WHERE tb_kegiatan.id_praktikum = '$id_login'
                              		 			  ");
                                    foreach ($praktikum as $d) {
                                    ?>

                                        <tr>
                                            <th scope="row"><b><?= $no++; ?>.</b></th>
                                            <td><?= $d['nama_praktikum'] ?></td>
                                            <td><?= $d['id_modul'] ?></td>
                                            <td><?= $d['nama_hari'] ?></td>
                                            <td><?= $d['shift'] ?></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="?page=presensi&act=scan&id=<?= $d['id_modul'] ?>"><i class="fas fa-camera"></i></a>
                                                </a>

                                            </td>
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

    <!-- modal tambah kegiatan -->
    <div class="modal fade bs-example-modal-sm" id="tambahKegiatan" tabindex="-1" role="dialog" aria-labelledby="tambahKeg">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="tambahKeg">Tambah Kegiatan</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="praktikum" class="form-control-plaintext" readonly value="<?= $data['id_praktikum'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Modul</label>
                            <select name="modul" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value='1'>Modul 1</option>
                                <option value='2'>Modul 2</option>
                                <option value='3'>Modul 3</option>
                                <option value='4'>Modul 4</option>
                                <option value='5'>Modul 5</option>
                                <option value='6'>Modul 6</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Hari</label>
                            <select name="hari" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value='1'>Senin</option>
                                <option value='2'>Selasa</option>
                                <option value='3'>Rabu</option>
                                <option value='4'>Kamis</option>
                                <option value='5'>Jum'at</option>
                                <option value='6'>Sabtu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Shift</label>
                            <select name="shift" class="form-control">
                                <option value="">- Pilih -</option>

                                <option value='1'>Shift 1</option>;
                                <option value='2'>Shift 2</option>;
                                <option value='3'>Shift 3</option>;
                                <option value='4'>Shift 4</option>;

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="savepraktikum" type="submit" class="btn btn-primary">Tambah Kegiatan</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['savepraktikum'])) {
                    $save = mysqli_query($con, "INSERT INTO tb_kegiatan VALUES(NULL,'$_POST[praktikum]','$_POST[modul]','$_POST[hari]','$_POST[shift]')");
                    if ($save) {
                        echo "
                        <script type='text/javascript'>
                        setTimeout(function () { 

                        swal('($_POST[praktikum]) ', 'Berhasil disimpan', {
                        icon : 'success',
                        buttons: {        			
                        confirm: {
                        className : 'btn btn-success'
                        }
                        },
                        });    
                        },10);  
                        window.setTimeout(function(){ 
                        window.location.replace('?page=presensi&act=data');
                        } ,3000);   
                        </script>";
                    }
                }
                ?>


            </div>
        </div>
    </div>
    <!--end modal tambah kegiatan -->
</div>