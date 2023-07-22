<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Praktikum <?= $_POST['nama_praktikum']; ?></h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="index.php">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
            </ul>
            <!-- <div style="padding-left: 670px;">
                <button class="btn btn-dark" style="border-radius:10px;" onclick="tes()">Rekap Absen</button>
            </div> -->
        </div>
        <div class="card" style="width: 500px;">
            <div class="card-header">
                <h2 style="font-weight: bolder;">Ubah Jadwal</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="nama_praktikum" value="<?= $_POST['nama_praktikum']; ?>">
                    <div class="row">
                        <div class="col">
                            <h6 style="font-weight: bold;">Pilih Hari</h6>
                            <input type="radio" name="hari" value="Senin" <?php if (isset($_POST['hari']) && $_POST['hari'] == 'Senin') echo 'checked'; ?>> Senin <br>
                            <input type="radio" name="hari" value="Selasa" <?php if (isset($_POST['hari']) && $_POST['hari'] == 'Selasa') echo 'checked'; ?>> Selasa <br>
                            <input type="radio" name="hari" value="Rabu" <?php if (isset($_POST['hari']) && $_POST['hari'] == 'Rabu') echo 'checked'; ?>> Rabu <br>
                            <input type="radio" name="hari" value="Kamis" <?php if (isset($_POST['hari']) && $_POST['hari'] == 'Kamis') echo 'checked'; ?>> Kamis <br>
                            <input type="radio" name="hari" value="Jumat" <?php if (isset($_POST['hari']) && $_POST['hari'] == 'Jumat') echo 'checked'; ?>> Jumat <br>
                        </div>
                        <div class="col">
                            <h6 style="font-weight: bold;">Pilih Shift</h6>
                            <input type="radio" name="shift" value="1" <?php if (isset($_POST['shift']) && $_POST['shift'] == '1') echo 'checked'; ?>> 1 <br>
                            <input type="radio" name="shift" value="2" <?php if (isset($_POST['shift']) && $_POST['shift'] == '2') echo 'checked'; ?>> 2 <br>
                            <input type="radio" name="shift" value="3" <?php if (isset($_POST['shift']) && $_POST['shift'] == '3') echo 'checked'; ?>> 3 <br>
                            <input type="radio" name="shift" value="4" <?php if (isset($_POST['shift']) && $_POST['shift'] == '4') echo 'checked'; ?>> 4 <br>
                        </div>
                    </div>
                    <button type="submit" name="ubah" class="btn btn-danger" style="margin-top: 15px;">Ubah</button>
                </form>
            </div>
        </div>
        <button class="btn btn-dark" onclick="history.back()">Kembali</button>
    </div>

    <?php if (isset($_POST['ubah'])) {
        $sql = mysqli_query($con, "SELECT * FROM tb_praktikan WHERE id_praktikan = '$id_login'") or die(mysqli_error($con));
        $data = mysqli_fetch_array($sql);

        $nim = $data['nim'];
        $hari = $_POST['hari'];
        $shift = $_POST['shift'];
        $namapraktikum = $_POST['nama_praktikum'];

        $save = "UPDATE tb_jadwal SET hari='$hari',shift='$shift' WHERE nama_praktikum = '$namapraktikum'";
        $result = mysqli_query($con, $save);
        if ($result) {
            echo "<script>
                        alert('Sukses ! Data berhasil diperbarui');
                        window.location='index.php';
                        </script>";
        } else {
            echo "<script>
                        alert('Gagal menyimpan !');
                        window.location='index.php';
                        </script>";
        }
    } ?>
</body>

</html>