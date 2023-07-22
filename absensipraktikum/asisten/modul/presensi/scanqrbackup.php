<div class="page-inner">

    <div class="page-header">
        <h4 class="page-title">QR</h4>
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
                <a href="#">Scan QR</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
        </ul>
    </div>

    <a href="javascript:history.back()" class="btn btn-danger wrap-login100" style=" margin-bottom: 10px">
        <i class="fas fa-arrow-circle-left"></i> Kembali</a><br>

    <br>
    <form action="/action_page.php">
        <div class="col-md-6">
            <div class="form-group">
                <select name="praktikum" class="form-control">
                    <option value="">- Pilih Praktikum -</option>
                    <?php
                    $mapel = mysqli_query($con, "SELECT * FROM tb_praktikum ORDER BY id_praktikum ASC");
                    foreach ($mapel as $g) {
                        echo "<option value='$g[id_praktikum]'>[ $g[kode_praktikum] ] $g[nama_praktikum]</option>";
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <select name="praktikum" class="form-control">
                    <option value="">- Pilih Modul -</option>
                    <?php
                    $mapel = mysqli_query($con, "SELECT * FROM tb_modul ORDER BY id_modul ASC");
                    foreach ($mapel as $g) {
                        echo "<option value='$g[id_modul]'> $g[nama_modul]</option>";
                    }
                    ?>

                </select>
                <br>
                <a href="#" class="btn btn-danger wrap-login100" style=" margin-bottom: 10px">
                    <i class="fas fa-qrcode"></i>QR</a>


            </div>
        </div>
    </form>
</div>