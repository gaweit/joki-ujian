<?php
// Query untuk mendapatkan data dari tabel nilai
$query = "SELECT * FROM tb_nilai
          INNER JOIN tb_praktikan ON tb_nilai.nim = tb_praktikan.nim
          INNER JOIN tb_praktikum ON tb_nilai.id_praktikum = tb_praktikum.id_praktikum
          INNER JOIN tb_modul ON tb_nilai.id_modul = tb_modul.id_modul
          WHERE id_praktikan = '$id_login'";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Praktikum dan Nilai</title>
    <style>
        .card {
            /* border: 1px solid black; */
            padding: 10px;
            margin-bottom: 10px;
        }

        .card-header {
            font-weight: bolder;
        }

        .card-content {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Praktikum Saya</h4>
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
                    <a href="?page=mypraktikum">Praktikum Saya</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
            </ul>
        </div>

        <?php
        $currentStudent = '';
        $currentPraktikum = '';
        ?>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <?php if ($row['nama_praktikan'] !== $currentStudent || $row['id_praktikum'] !== $currentPraktikum) : ?>
                <!-- Menutup card sebelumnya jika bukan card pertama -->
                <?php if ($currentStudent !== '') {
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } ?>

                <!-- Membuat card baru untuk setiap praktikan dan praktikum baru -->
                <div class="card">
                    <div class="card-header">
                        <h2 style="font-weight: bolder;"><?= $row['nama_praktikum']; ?> </h2>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                        <?php endif ?>


                        <p style="font-weight:bold">Modul: <?= $row['nama_modul']; ?> </p>
                        <p>Nilai: <?= $row['d1']; ?>, <?= $row['d2']; ?>, <?= $row['d3']; ?>, <?= $row['d4']; ?>, <?= $row['tp']; ?>, <?= $row['ta']; ?>, <?= $row['i1']; ?>, <?= $row['i2']; ?> </p>

                        <!-- Menyimpan siswa dan praktikum saat ini untuk membandingkan dengan entri berikutnya -->
                        <?php
                        $currentStudent = $row['nama_praktikan'];
                        $currentPraktikum = $row['id_praktikum'];
                        ?>
                    <?php endwhile ?>

                    <!-- Menutup card terakhir -->

                        </div>
                    </div>
                </div>
</body>

</html>