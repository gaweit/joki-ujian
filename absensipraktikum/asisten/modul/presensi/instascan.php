<!DOCTYPE html>
<html>

<head>
    <title>Event QR Code Scanner</title>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
    <h1>Event QR Code Scanner</h1>
    <div id="qrcode"></div>
    <div class="container-fluid mt-1 mb-3">
        <div class="col-md-12">
            <div class="card">


            </div>
            <p style="color:red;font-weight:bold;margin-top:10px"><i class="fas fa-camera"></i> Camera
            </p>
            <video id="preview"></video>
        </div>
    </div>


    <script>
        // Generate QR code for participants
        var participantQRCode = new QRCode(document.getElementById("qrcode"), {
            width: 200,
            height: 200
        });

        // Example student ID
        var studentID = "1103190028";

        // Access the video element and create a new Instascan scanner
        let video = document.getElementById('preview');
        let scanner = new Instascan.Scanner({
            video: video
        });

        // Add an event listener to listen for successful scans
        scanner.addListener('scan', function(content) {
            // Perform action based on the scanned content
            if (content === studentID) {
                alert('Student with ID ' + content + ' is present!');
                // You can perform additional actions here, such as updating attendance status in the database
            } else {
                alert('Invalid QR code!');
                // Handle invalid QR codes here
            }
        });

        // Start the scanner
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        });
    </script>
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