<!DOCTYPE html>
<html>

<head>
    <title>Cetak QR Code dan Data Mahasiswa</title>
</head>

<style>
    @media print {
        @page {
            size: A8;
            /* Ubah ukuran halaman sesuai kebutuhan (contoh: A4) */
            margin: 1cm 2cm 2cm 7cm;
            /* Atur margin halaman (opsional) */
        }
    }
</style>

<body>
    <!-- Form untuk tombol cetak -->
    <div class="page-inner mt--15">
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
        <?php



        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db_imas";

        require('assets/phpqrcode/qrlib.php');
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";


        $sql = "SELECT * FROM tb_praktikan WHERE id_praktikan = '$id_login'";
        $result = mysqli_query($conn, $sql);
        // Mengatur zona waktu ke Jakarta
        date_default_timezone_set('Asia/Jakarta');
        // $date = time();

        // $datasaya = "<table><tr><th>ID</th><th>Nama</th><th>Nomor</th><th>QRCode</th></tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nim = $row["nim"];
                $nama = $row['nama_praktikan'];
                $foto = $row['foto'];
                // $nama = $row["nama_praktikan"];
                $timestamp = date('j-m-Y, \P\u\k\u\l\ : H:i A', time());

                // Menghasilkan teks yang akan dijadikan nilai QR code
                $qr_value = $nim . "_" . date('j-m-Y, H:i A', time());

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
        $tampilqr = "<img id='qr-code' src='$qr_filepath' width='200px'>";
        ?>
        <script>
            function cetakBagian() {
                var bagian = document.getElementById('bagian-cetak');
                var dokumenAsli = document.body.innerHTML;
                var isiBagian = bagian.innerHTML;
                var tombolCetak = document.querySelector('.btn-danger');
                tombolCetak.style.display = 'none';


                document.body.innerHTML = isiBagian;
                window.print();

                // Kembalikan dokumen ke keadaan semula setelah mencetak
                document.body.innerHTML = dokumenAsli;
                tombolCetak.style.display = 'block';
            }
        </script>

        <div class="row mt--2" id="bagian-cetak">
            <div class="col-md-6">
                <div class="card full-height">
                    <h2 class="card-header fw-bold">Detail Data</h2>
                    <div class="card-body">
                        <h4 style="font-weight: bolder;">Nama Lengkap</h4>
                        <h5><?= $nama; ?></h5><br>
                        <h4 style="font-weight: bolder;">NIM</h4>
                        <h5><?= $nim ?></h5><br>
                        <h4 style="font-weight: bolder;">Foto</h4>
                        <div class="avatar-lg">
                            <img src="../assets/img/user/<?= $foto ?>" alt="image profile" class="avatar-img rounded">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height text-center">
                    <h2 class="card-header fw-bold">QR Saya</h2>
                    <center>
                        <?= $tampilqr; ?>
                    </center>
                    <b>
                        Dicetak pada : <span id="timestamp"><?= $timestamp ?></span>
                    </b>
                </div>
            </div>
        </div>
        <button class="btn btn-danger" onclick="cetakBagian()">Cetak</button>
    </div>


    <!-- 
    // FPDF library
    require('assets/fpdf/fpdf.php');

    // Class untuk membuat PDF dengan header khusus
    class PDF extends FPDF
    {
        function Header()
        {
            // Header PDF disesuaikan dengan kebutuhan
            // Misalnya:
            // $this->SetFont('Arial', 'B', 14);
            // $this->Cell(0, 10, 'Judul Header', 0, 1, 'C');
        }
        function addQRCode($qr_filepath)
        {
            // Menambahkan gambar QR code ke halaman PDF

            $this->Image($qr_filepath);
        }
    }

    // Fungsi untuk menghasilkan QR code


    // Mendapatkan data mahasiswa berdasarkan akun yang login
    // function getMahasiswaData($id_login)
    // {
    //     global $conn;
    //     // Query untuk mendapatkan data mahasiswa berdasarkan username
    //     $id_login = @$_SESSION['praktikan'];
    //     $sql = " SELECT * FROM tb_praktikan WHERE id_praktikan='$id_login'";
    //     $result = $conn->query($sql);
    //     if ($result->num_rows > 0) {
    //         return $result->fetch_assoc();
    //     } else {
    //         return null;
    //     }
    // }

    // Aksi saat tombol cetak diklik
    if (isset($_POST['cetak'])) {
        ob_start();
        // Mendapatkan data mahasiswa berdasarkan akun yang login
        // $id_login = $_SESSION['praktikan']; // Ganti dengan session yang sesuai
        // $mahasiswaData = getMahasiswaData($id_login);
        // $foto =    " <img src='../assets/img/user/'" . $data['foto'] . ">";


                            // Membuat PDF baru
                            $pdf = new PDF();
                            $pdf->AddPage();

                            $pdf->SetFont('Arial', 'B', 12);
                            $pdf->Cell(0, 10, 'Data Mahasiswa', 0, 1, 'C');
                            $pdf->Cell(0, 0, '', 0, 1);
                            $pdf->SetFont('Arial', '', 12);
                            $pdf->Cell(40, 10, 'Nama:', 0);
                            $pdf->Cell(0, 10, $nama, 0, 1);
                            $pdf->Cell(40, 10, 'NIM:', 0);
                            $pdf->Cell(0, 10, $nim, 0, 1);
                            // Mengatur posisi dan ukuran gambar QR code
                            // $pdf->Cell(0, 10, '', 'L', 0);
                            $pdf->addQRCode($qr_filepath);
                            // $pdf->Cell(40, 10, '', 'R', 1);
                            $pdf->SetFont('Arial', '', 8);
                            $pdf->Cell(0, 10, 'Dicetak pada : ' . $timestamp, 0, 1);
                            // Output PDF ke browser

                            ob_end_clean();
                            $pdf->Output();
                            exit;
                            }; -->




</body>

</html>