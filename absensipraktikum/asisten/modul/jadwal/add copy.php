<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add event listeners to toggle
    window.addEventListener('DOMContentLoaded', function() {
        const toggles = document.querySelectorAll('.toggle');
        toggles.forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });
    });
</script>
<style type="text/css">
    .toggle {
        width: 100%;
        height: 100%;
        justify-content: center;
        cursor: pointer;
    }

    .toggle.active {
        background-color: greenyellow;
    }
</style>
<?php
$sql = mysqli_query($con, "SELECT * FROM tb_asisten
        INNER JOIN tb_praktikum ON tb_asisten.id_praktikum=tb_praktikum.id_praktikum
        WHERE id_asisten = '$id_login'") or die(mysqli_error($con));

$data = mysqli_fetch_array($sql);
?>
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
                <a href="#">Jadwal Mengajar</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Jadwal</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <form action="" method="post">
            <div class="col">
                <!-- card nama dan praktikum -->
                <div class="card">
                    <div class="form-group">
                        <label>Nama Asisten</label>
                        <input type="text" name="asisten" class="form-control-plaintext" readonly value="<?= $data['nama_asisten'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Praktikum</label>
                        <input type="text" name="praktikum" class="form-control-plaintext" readonly value="<?= $data['nama_praktikum'] ?>">
                    </div>
                </div>
                <!-- end card nama dan praktikum -->
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pilih Jadwal Mengajar</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="id_praktikum" value="<?= $_POST['id_praktikum']; ?>">
                            <label for="">Pilih Hari</label>
                            <select name="hari" id="">
                                <option value="">Hari</option>
                                <option value="1">Senin</option>
                                <option value="2">Selasa</option>
                                <option value="3">Rabu</option>
                                <option value="4">Kamis</option>
                                <option value="5">Jumat</option>
                            </select>
                            <label for="">Shift</label>
                            <select name="shift" id="">
                                <option value="">Shift</option>
                                <option value="1">Shift 1</option>
                                <option value="2">Shift 2</option>
                                <option value="3">Shift 3</option>
                                <option value="4">Shift 4</option>
                            </select>
                            <button type="submit" name="simpan">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $sql = mysqli_query($con, "SELECT * FROM tb_mengajar WHERE id_asisten = '$id_login'") or die(mysqli_error($con));
            $data2 = mysqli_fetch_array($sql);

            $hari = $_POST['hari'];
            $shift = $_POST['shift'];
            $idpraktikum = $_POST['id_praktikum'];
            $idasisten = $id_login;

            $save = "INSERT INTO tb_mengajar (id_mengajar,hari,id_shift,id_asisten,id_praktikum,id_hari) VALUES (NULL,'Senin','$shift', '$idasisten','$idpraktikum','$hari')";
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
        }
        ?>