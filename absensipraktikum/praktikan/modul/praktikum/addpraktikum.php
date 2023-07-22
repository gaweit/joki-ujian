<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
$sql = mysqli_query($con, "SELECT * FROM tb_praktikan WHERE id_praktikan = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
?>


<body>
    <div class="page-inner">
        <div class="page-header">
            <div class="container mt-3">

                <div class="card">
                    <div class="card-header">
                        <h5 style="font-weight: bolder;">Pilih Praktikum</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="sel1" class="form-label">
                                <p>Nama Praktikum</p>
                            </label>
                            <select class="form-select form-select-sm" name="praktikum" id="sel1">
                                <option>-Pilih Praktikum-</option>
                                <?php

                                $query = "SELECT id_praktikum, nama_praktikum FROM tb_praktikum";
                                $result = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id_praktikum'] . '">' . $row['nama_praktikum'] . '</option>';
                                }
                                ?>
                            </select>
                            <button type="submit" name="simpan" class="btn btn-danger" style="margin-top: 15px;">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['simpan'])) {
        // Ambil nilai dari form
        $nim = $data['nim']; // Ganti dengan nilai nim yang diperoleh dari akun praktikan yang sedang login
        $id_praktikum = $_POST['praktikum'];

        // Query untuk menyimpan data ke dalam tabel tb_nilai
        $save = "INSERT INTO tb_nilai (id_nilai,nim, id_praktikum,id_modul,d1,d2,d3,d4,tp,ta,i1,i2) VALUES (NULL,'$nim', '$id_praktikum',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
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
</body>

</html>