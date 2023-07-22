<?php
$id_praktikum = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM tb_praktikum WHERE id_praktikum = '$id_praktikum'") or die(mysqli_error($con));
$data3 = mysqli_fetch_array($sql);
?>

<div class="page-inner">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2>Ubah Jadwal</h2>
            </div>
            <div class="card-body">

                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <h6 style="font-weight: bold;">Pilih Hari</h6>
                            <input type="radio" name="hari" value="Senin" <?php if (isset($data2['hari']) && $data2['hari'] == 'Senin') echo 'checked'; ?>> Senin <br>
                            <input type="radio" name="hari" value="Selasa" <?php if (isset($data2['hari']) && $data2['hari'] == 'Selasa') echo 'checked'; ?>> Selasa <br>
                            <input type="radio" name="hari" value="Rabu" <?php if (isset($data2['hari']) && $data2['hari'] == 'Rabu') echo 'checked'; ?>> Rabu <br>
                            <input type="radio" name="hari" value="Kamis" <?php if (isset($data2['hari']) && $data2['hari'] == 'Kamis') echo 'checked'; ?>> Kamis <br>
                            <input type="radio" name="hari" value="Jumat" <?php if (isset($data2['hari']) && $data2['hari'] == 'Jumat') echo 'checked'; ?>> Jumat <br>
                        </div>
                        <div class="col">
                            <h6 style="font-weight: bold;">Pilih Shift</h6>
                            <input type="radio" name="shift" value="1" <?php if (isset($data2['shift']) && $data2['shift'] == '1') echo 'checked'; ?>> 1 <br>
                            <input type="radio" name="shift" value="2" <?php if (isset($data2['shift']) && $data2['shift'] == '2') echo 'checked'; ?>> 2 <br>
                            <input type="radio" name="shift" value="3" <?php if (isset($data2['shift']) && $data2['shift'] == '3') echo 'checked'; ?>> 3 <br>
                            <input type="radio" name="shift" value="4" <?php if (isset($data2['shift']) && $data2['shift'] == '4') echo 'checked'; ?>> 4 <br>
                        </div>
                    </div>
                    <button type="submit" name="ubah" class="btn btn-danger" style="margin-top: 15px;">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_POST['ubah'])) {
    $hari = $_POST['hari'];
    $shift = $_POST['shift'];

    $save = "UPDATE tb_jadwal SET hari='$hari',shift='$shift' WHERE id_jadwal = '$id_jadwal'";
    $result = mysqli_query($con, $save);
    if ($result) {
        echo "<script>
                        alert('Sukses ! Data berhasil diperbarui');
                        window.location='index.php?page=praktikan&act=data';
                        </script>";
    } else {
        echo "<script>
                        alert('Gagal menyimpan !');
                        window.location='index.php';
                        </script>";
    }
} ?>