<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">QR Saya</h4>
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
                    <a href="?page=myqr">QR Saya</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
            </ul>
        </div>
        <style>

        </style>
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db_imas";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";


        require('assets/phpqrcode/qrlib.php');


        $sql = "SELECT nim,nama_praktikan FROM tb_praktikan WHERE id_praktikan = '$id_login'";
        $result = mysqli_query($conn, $sql);
        // Mengatur zona waktu ke Jakarta
        date_default_timezone_set('Asia/Jakarta');
        $date = time();

        // $datasaya = "<table><tr><th>ID</th><th>Nama</th><th>Nomor</th><th>QRCode</th></tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nim = $row["nim"];
                $nama = $row['nama_praktikan'];
                // $nama = $row["nama_praktikan"];
                $timestamp = date('j-m-Y, \P\u\k\u\l \: H:i', $date);

                // Menghasilkan teks yang akan dijadikan nilai QR code
                $qr_value = $nim . "_" . date('j-m-Y, H:i', time());

                // Nama file QR code yang akan dihasilkan
                $qr_filename = $nim . "_" . $nama . ".png";

                // Path tempat menyimpan QR code
                $qr_filepath = "temp/" . $qr_filename;

                // Menghasilkan QR code menggunakan PHP QR Code library
                QRcode::png($qr_value, $qr_filepath);
            }
        } else {
            echo "Tidak ada data yang ditemukan.";
        }
        $tampilqr .= "<img src='$qr_filepath' width='200px'>";


        ?>

        <div class="container-md--5">
            <div class="row">
                <div class="col">
                    <div class="card full-height">
                        <h2 class="card-header fw-bold">Detail Data</h2>
                        <div class="card-body">
                            <h4 style="font-weight: bolder;">Nama Lengkap</h4>
                            <h5><?= $nama; ?></h5><br>
                            <h4 style="font-weight: bolder;">NIM</h4>
                            <h5><?= $nim ?></h5><br>
                            <h4 style="font-weight: bolder;">Foto</h4>
                            <div class="avatar-lg"><img src="../assets/img/user/<?= $data['foto'] ?>" alt="image profile" class="avatar-img rounded"></div>
                            <!-- <h4 style="font-weight: bolder;">QR Saya</h4> -->
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card full-height text-center">
                        <h2 class="card-header fw-bold">QR Saya</h2>
                        <center>
                            <?= $tampilqr; ?>
                        </center>
                        <b>
                            Dicetak pada : <?= $timestamp ?><br>
                        </b>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>