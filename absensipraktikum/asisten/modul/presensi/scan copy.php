<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_imas";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah ada data QR code yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["qrcode"])) {
    // Mendapatkan data QR code dari form
    $qrcode = $_POST["qrcode"];

    // Mencari data absensi berdasarkan NIM
    $sql = "SELECT nama, hadir FROM tb_presensi WHERE nim = '$qrcode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Data absensi ditemukan
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $hadir = $row['hadir'];

        // Memeriksa logika kehadiran
        if ($hadir == 0) {
            // Mengupdate status kehadiran
            $hadir = 1;
            $sqlUpdate = "UPDATE absensi SET hadir = $hadir WHERE nim = '$qrcode'";
            if ($conn->query($sqlUpdate) === TRUE) {
                echo "Absensi berhasil diperbarui. Nama: " . $nama . ", Hadir";
            } else {
                echo "Error: " . $sqlUpdate . "<br>" . $conn->error;
            }
        } else {
            echo "Anda sudah hadir sebelumnya.";
        }
    } else {
        // Data absensi tidak ditemukan
        echo "QR code tidak valid.";
    }
}

// Menutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.1.2/html5-qrcode.min.js"></script>
    <script src></script>
</head>

<body>
    <div class="container-fluid mt-1 mb-3">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-6">
                    <p style="color:red;font-weight:bold;margin-top:10px"><i class="fas fa-camera"></i> Camera
                    </p>
                    <div id="reader" style="width: 500px; height: 500px;"></div>

                    <script type="text/javascript">
                        // Membuat instance HTML5 QR code scanner
                        var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
                            fps: 10,
                            qrbox: 250
                        });
                        // Menangani hasil pemindaian QR code
                        function onScanSuccess(qrcode) {
                            // Mengirim data QR code ke server melalui metode POST
                            $.post(window.location.href, {
                                nim: qrcode
                            }, function(data) {
                                // Pisahkan nilai QR code menjadi nim dan waktu
                                var qrCodeParts = qrcode.split("_");
                                var nim = qrCodeParts[0];
                                var waktu = qrCodeParts[1];

                                // Mencetak nim ke dalam elemen h2 dengan id "nimElement"
                                var nimElement = document.getElementById("nimElement");
                                nimElement.innerText = nim;

                                // Mencetak waktu ke dalam elemen h2 dengan id "waktuElement"
                                var waktuElement = document.getElementById("waktuElement");
                                waktuElement.innerText = waktu;


                                // Menampilkan pesan alert dengan nilai QR code
                                // alert(qrcode);
                            });
                        }

                        // Menangani kesalahan pemindaian QR code
                        function onScanError(error) {
                            console.error(error);
                        }

                        // Memulai pemindaian QR code
                        html5QrcodeScanner.render(onScanSuccess, onScanError);
                    </script>
                </div>

            </div>
            <br>

        </div>
        <?php
        $sql = mysqli_query($con, "SELECT * FROM tb_asisten
                INNER JOIN tb_praktikum ON tb_asisten.id_praktikum=tb_praktikum.id_praktikum
                WHERE id_asisten = '$id_login'") or die(mysqli_error($con));

        $data = mysqli_fetch_array($sql);
        ?>

        <!-- datatables Sudah Presensi -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Praktikan Sudah Presensi</h1>
                    <h2></h2>
                    <div class="card-body">

                        <!-- datatables -->
                        <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
                        <script type="text/javascript" src="../datatables/datatables.js"></script>

                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Praktikan</th>
                                    <th>Waktu</th>
                                    <th>Opsi</th>
                                    <h2 id="nimElement"></h2>
                                    <h2 id="waktuElement"></h2>
                                </tr>
                            </thead>
                            <tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $praktikan = mysqli_query($con, "SELECT * FROM tb_presensi");
                                    foreach ($praktikan as $a) { ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= $a['nim']; ?></td>
                                            <td><?= $a['nama_praktikan']; ?></td>
                                            <td><img src="../assets/img/user/<?= $a['foto'] ?>" width="45" height="45"></td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="?page=input&id=<?= $a['id_praktikan'] ?>"><i class="far fa-edit"></i></a>
                                                <a class="btn btn-warning btn-sm" href="?page=nilai"><i class="fas fa-newspaper"></i></a>
                                                <a class="btn btn-info btn-sm" href="?page=absen"><i class="far fa-calendar"></i></a>


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#example').DataTable();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!--datatables Belum Presensi-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Praktikan Belum Presensi</h1>
                    <div class="card-body">

                        <!-- datatables -->
                        <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
                        <script type="text/javascript" src="../datatables/datatables.js"></script>

                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Praktikan</th>
                                    <th>Waktu</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $praktikan = mysqli_query($con, "SELECT * FROM tb_presensi");
                                    foreach ($praktikan as $a) { ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= $a['nim']; ?></td>
                                            <td><?= $a['nama_praktikan']; ?></td>
                                            <td><img src="../assets/img/user/<?= $a['foto'] ?>" width="45" height="45"></td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="?page=input&id=<?= $a['id_praktikan'] ?>"><i class="far fa-edit"></i></a>
                                                <a class="btn btn-warning btn-sm" href="?page=nilai"><i class="fas fa-newspaper"></i></a>
                                                <a class="btn btn-info btn-sm" href="?page=absen"><i class="far fa-calendar"></i></a>


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#example').DataTable();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div>

</body>

</html>