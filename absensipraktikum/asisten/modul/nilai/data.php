<?php
// Query untuk mendapatkan data dari tabel nilai
$query = "SELECT * FROM tb_nilai 
          INNER JOIN tb_praktikan ON tb_nilai.nim = tb_praktikan.nim
          INNER JOIN tb_praktikum ON tb_nilai.id_praktikum = tb_praktikum.id_praktikum
          INNER JOIN tb_modul ON tb_nilai.id_modul = tb_modul.id_modul
          WHERE id_praktikan = '$_GET[id]' ORDER BY tb_nilai.id_praktikum, tb_modul.id_modul ASC";

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

        .country_name-cell {
            width: 100px;
        }

        table {
            border-collapse: collapse;
        }

        table td {
            font-size: 15px;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            width: 50px;
            text-align: center;
        }

        .btn:active {
            box-shadow: 0 5px #666;
            transform: translateY(4px);
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
            <!-- <div style="padding-left: 670px;">
                <button class="btn btn-dark" style="border-radius:10px;" onclick="tes()">Rekap Absen</button>
            </div> -->
        </div>
        <script>
            function tes() {
                alert('YEAH')
            }
        </script>
        <?php
        $currentStudent = '';
        $currentPraktikum = '';
        ?>


        <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <?php if ($row['nama_praktikan'] !== $currentStudent || $row['id_praktikum'] !== $currentPraktikum) : ?>
                    <!-- Menutup card sebelumnya jika bukan card pertama -->
                    <?php if ($currentStudent !== '') {
                        echo '</table>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } ?>

                    <!-- Membuat card baru untuk setiap praktikan dan praktikum baru -->
                    <div class=" card">
                        <div class="card-header">
                            <h2 style="font-weight: bolder;"><?= $row['nama_praktikum']; ?> </h2>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <table class="table-hover">
                                    <thead>
                                        <tr>
                                            <td class="country_name-cell"></td>
                                            <td style="font-weight: bold;">D1</td>
                                            <td style="font-weight: bold;">D2</td>
                                            <td style="font-weight: bold;">D3</td>
                                            <td style="font-weight: bold;">D4</td>
                                            <td style="font-weight: bold;">TP</td>
                                            <td style="font-weight: bold;">TA</td>
                                            <td style="font-weight: bold;">I1</td>
                                            <td style="font-weight: bold">I2</td>

                                        </tr>
                                    </thead>

                                <?php endif ?>

                                <!-- Menyimpan siswa dan praktikum saat ini untuk membandingkan dengan entri berikutnya -->
                                <?php
                                $currentStudent = $row['nama_praktikan'];
                                $currentPraktikum = $row['id_praktikum'];
                                ?>
                                <tr>
                                    <td style="font-weight: bold;">Modul <?= $row['nama_modul']; ?></td>
                                    <td><?= $row['d1']; ?></td>
                                    <td><?= $row['d2']; ?></td>
                                    <td><?= $row['d3']; ?></td>
                                    <td><?= $row['d4']; ?></td>
                                    <td><?= $row['tp']; ?></td>
                                    <td><?= $row['ta']; ?></td>
                                    <td><?= $row['i1']; ?></td>
                                    <td><?= $row['i2']; ?></td>

                                </tr>

                            <?php endwhile ?>
                        <?php else : ?>
                            <div class="alert alert-warning">
                                <strong>Belum ada nilai praktikum</strong>
                            </div>
                        <?php endif ?>
                        <!-- Menutup card terakhir -->

                            </div>
                        </div>
                    </div>

</body>

</html>