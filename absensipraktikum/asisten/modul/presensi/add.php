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
                <a href="#">Tambah Praktikum</a>
            </li>
        </ul>
    </div>
    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex align-items-center ">
                    <h3 class="h4">Form Entry Praktikum</h3>
                </div>
                <div class="card-body">
                    <form action="?page=presensi&act=proses" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Praktikum</label>
                                <input type="text" name="praktikum" class="form-control-plaintext" readonly value="<?= $data['nama_praktikum'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Pilih Modul</label>
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
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Shift</label>
                                <select name="shift" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <option value='1'>Shift 1</option>
                                    <option value='2'>Shift 2</option>
                                    <option value='3'>Shift 3</option>
                                    <option value='4'>Shift 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hari</label>
                                <select name="hari" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <?php
                                    $hari = mysqli_query($con, "SELECT * FROM tb_hari ORDER BY id_hari ASC");
                                    foreach ($hari as $h) {
                                        echo "<option value='$h[id_hari]'>$h[nama_hari]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Shift Mulai:</label>
                            <input type="datetime-local" class="form-control" name="waktu_mulai">
                        </div>
                        <div class="form-group">
                            <label>Shift Berakhir:</label>
                            <input type="datetime-local" class="form-control" name="waktu_berakhir">
                        </div> -->

                        <div class="form-group">
                            <button name="savePraktikum" type="submit" class="btn btn-primary">Simpan</button>
                            <a href="javascript:history.back()" class="btn btn-warning"></i> Batal</a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>