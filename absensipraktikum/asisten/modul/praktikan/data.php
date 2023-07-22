<?php
// Query untuk mendapatkan data dari tabel nilai
$query = "SELECT * FROM tb_nilai 
          INNER JOIN tb_praktikan ON tb_nilai.nim = tb_praktikan.nim
          INNER JOIN tb_praktikum ON tb_nilai.id_praktikum = tb_praktikum.id_praktikum
          INNER JOIN tb_modul ON tb_nilai.id_modul = tb_modul.id_modul
          WHERE id_praktikan = '$_GET[id]' ORDER BY tb_nilai.id_praktikum, tb_modul.id_modul ASC";

$result = mysqli_query($con, $query);

$nama_praktikum
    = mysqli_query($con, "SELECT * FROM tb_asisten
 WHERE id_asisten = '$id_login'") or die(mysqli_error($con));
$prak = mysqli_fetch_array($nama_praktikum);

?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Praktikan</h4>
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
                <a href="#">Daftar Praktikan</a>
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

                        <table id="example" class="display table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama Praktikan</th>
                                    <th>Nama Praktikum</th>
                                    <th>Hari</th>
                                    <th>Shift</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;

                                    $praktikum = mysqli_query($con, "SELECT * FROM tb_jadwal
                                                 INNER JOIN tb_praktikan ON tb_jadwal.nim = tb_praktikan.nim
                                                WHERE tb_jadwal.id_praktikum = $id_login
                                                AND tb_jadwal.id_modul=1
                                                 
                              		 			  ");
                                    foreach ($praktikum as $d) {
                                    ?>

                                        <tr>
                                            <th scope="row"><b><?= $no++; ?>.</b></th>
                                            <td><?= $d['nim'] ?></td>
                                            <td><?= $d['nama_praktikan'] ?></td>
                                            <td><?= $d['nama_praktikum'] ?></td>
                                            <td><?= $d['hari'] ?></td>
                                            <td><?= $d['shift'] ?></td>
                                            <td>
                                                <!-- <a class="btn btn-success btn-sm" href="?page=praktikan&act=praktikum&id=<?= $d['id_praktikan'] ?>"><i class="fas fa-calendar"></i></a> -->
                                                <a class="btn btn-info btn-sm" href="?page=jadwal&act=praktikan&id=<?= $d['id_jadwal'] ?>"><i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i></i></a>
                                                <a class="btn btn-warning btn-sm" href="?page=nilai&act=data&id=<?= $d['id_praktikan'] ?>"><i class="fas fa-newspaper"></i></a>

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
    <!-- modal Input Nilai -->
    <div class="modal fade bs-example-modal-sm" id="inputnilai" tabindex="-1" role="dialog" aria-labelledby="innilai">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="innilai">Masukkan Nilai</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">NIM Praktikan</label>
                            <input type="text" name="nim" class="form-control-plaintext" readonly value="<?= $a['id_praktikan'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Praktikan</label>
                            <input type="text" name="namapraktikan" class="form-control-plaintext" readonly value="<?= $a['nama_praktikan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Praktikum</label>
                            <input type="text" name="praktikum" class="form-control-plaintext" readonly value="<?= $data['nama_praktikum'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Modul</label>
                            <select name="modul" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php
                                $modul = mysqli_query($con, "SELECT * FROM tb_modul ORDER BY id_modul ASC");
                                foreach ($modul as $m) {
                                    echo "<option value='$m[id_modul]'>$m[nama_modul]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">TP</label>
                                    <br>
                                    <input type="number" id="nilai" name="TP" min="0" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">TA</label>
                                    <br>
                                    <input type="number" id="nilai" name="TA" min="0" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">D1</label>
                                    <br>
                                    <input type="number" id="nilai" name="D1" min="0" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">D2</label>
                                    <br>
                                    <input type="number" id="nilai" name="D2" min="0" max="100" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">D3</label>
                                    <br>
                                    <input type="number" id="nilai" name="D3" min="0" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">D4</label>
                                    <br>
                                    <input type="number" id="nilai" name="D4" min="0" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">i1</label>
                                    <br>
                                    <input type="number" id="nilai" name="i1" min="0" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">i2</label>
                                    <br>
                                    <input type="number" id="nilai" name="i2" min="0" max="100" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="simpannilai" type="submit" class="btn btn-primary">Tambah Kegiatan</button>
                    </div>

                </form>

                <?php
                if (isset($_POST['simpannilai'])) {
                    $save = mysqli_query($con, "INSERT INTO tb_nilai VALUES(NULL,'$_POST[nim]','$_POST[namapraktikan]','$_POST[modul]','$_POST[TP]','$_POST[TA]','$_POST[D1]','$_POST[D2]','$_POST[D3]','$_POST[D4]','$_POST[i1]','$_POST[i2]')ORDER BY id_nilai ASC");
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
    <!--end modal Input Nilai -->
</div>