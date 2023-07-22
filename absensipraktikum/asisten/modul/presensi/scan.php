<!DOCTYPE html>
<html>


<head>
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.1.2/html5-qrcode.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src></script>
</head>

<body>
    <div class="container-fluid mt-1 mb-3">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-6">
                    <p style="color:red;font-weight:bold;margin-top:10px;"><i class="fas fa-camera"></i> Camera</p>
                    <div id="reader" style="width: 500px; height: 500px;"></div>

                    <script type="text/javascript">
                        // Membuat instance HTML5 QR code scanner
                        var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
                            fps: 10,
                            qrbox: 250
                        });
                        // Menangani hasil pemindaian QR code
                        function onScanSuccess(qrcode) {
                            // Memisahkan nilai QR code menjadi nim dan waktu
                            var qrCodeParts = qrcode.split("_");
                            var nim = qrCodeParts[0];
                            var waktu = qrCodeParts[1];

                            // Mengirim data QR code ke server melalui metode POST
                            $.post(window.location.href, {
                                nim: nim,
                                waktu: waktu
                            }, function(data) {
                                // Mengubah kolom kehadiran pada tabel database
                                $.post('scan.php', {
                                    nim: nim
                                }, function(response) {
                                    if (response.success) {
                                        alert('Kehadiran berhasil diubah');
                                        setTimeout(function() {
                                            location.reload();
                                        }, 3000);
                                    } else {
                                        alert('Gagal mengubah kehadiran');
                                    }
                                });
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
        <?php
        // Koneksi ke database
        $dsn = 'mysql:host=localhost;dbname=db_imas';
        $username = 'root';
        $password = '';
        $pdo = new PDO($dsn, $username, $password);

        // Mendapatkan nim dari permintaan POST
        $nim = $_POST['nim'];
        $modul = $_GET['id'];

        // Mengubah nilai kolom kehadiran pada tabel menjadi 1
        $query = 'UPDATE tb_jadwal SET kehadiran = 1 WHERE nim = :nim AND id_modul = :modul';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':modul', $modul);
        $result = $stmt->execute();

        // Mengecek keberhasilan operasi dan memberikan respons
        $response = [];
        if ($result) {
            $response['success'] = true;
            // echo "
            // 					<script type='text/javascript'>
            // 					setTimeout(function () { 

            // 					swal('Sukses', 'Jadwal ditambahkan', {
            // 					icon : 'success',
            // 					buttons: {        			
            // 					confirm: {
            // 					className : 'btn btn-success'
            // 					}
            // 					},
            // 					});    
            // 					},10);  
            // 					window.setTimeout(function(){ 
            // 					window.location.replace('?page=presensi&act=scan');
            // 					} ,3000);   
            // 					</script>";
        } else {
            $response['success'] = false;
            // echo " <script>
            //                     alert('Data telah dihapus !');
            //                     window.location='scan.php';
            //                     </script>";
        }

        // header('Content-Type: application/json');
        // echo json_encode($response);

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
                                    <th>Nim</th>
                                    <th>Nama Praktikan</th>
                                    <th>Kehadiran</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    $praktikan = mysqli_query($con, "SELECT * FROM tb_jadwal
                                    INNER JOIN tb_praktikan ON tb_jadwal.nim=tb_praktikan.nim
                                    INNER JOIN tb_modul ON tb_jadwal.id_modul=tb_modul.id_modul
                                    WHERE tb_jadwal.id_praktikum = $id_login 
                                    AND tb_jadwal.kehadiran = 1
                                    AND tb_jadwal.id_modul = '$_GET[id]'
                                    ");
                                    foreach ($praktikan as $a) { ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= $a['nim']; ?></td>
                                            <td><?= $a['nama_praktikan']; ?></td>
                                            <td><?php if ($a['kehadiran'] == '1') {
                                                    echo "<span class='badge badge-success'>Hadir</span>";
                                                } else {
                                                    echo "<span class='badge badge-danger'>Tidak Hadir</span>";
                                                } ?>

                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="?page=nilai&act=add&id=<?= $a['id_praktikan'] ?>"><i class="far fa-edit"></i></a>
                                                <!-- <a class="btn btn-warning btn-sm" href="?page=nilai"><i class="fas fa-newspaper"></i></a>
                                                <a class="btn btn-info btn-sm" href="?page=absen"><i class="far fa-calendar"></i></a> -->


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

                        <table id="tab" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Nama Praktikan</th>
                                    <th>Kehadiran</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tbody>
                                    <?php
                                    $praktikan = mysqli_query($con, "SELECT * FROM tb_jadwal
                                    INNER JOIN tb_praktikan ON tb_jadwal.nim=tb_praktikan.nim
                                    INNER JOIN tb_modul ON tb_jadwal.id_modul=tb_modul.id_modul
                                    WHERE tb_jadwal.id_praktikum = $id_login 
                                    AND tb_jadwal.kehadiran = 0
                                    AND tb_jadwal.id_modul = '$_GET[id]'
                                    ");
                                    foreach ($praktikan as $a) { ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= $a['nim']; ?></td>
                                            <td><?= $a['nama_praktikan']; ?></td>
                                            <td><?php if ($a['kehadiran'] == '0') {
                                                    echo "<span class='badge badge-success'>Hadir</span>";
                                                } else {
                                                    echo "<span class='badge badge-danger'>Tidak Hadir</span>";
                                                } ?>

                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="?page=nilai&act=add&id=<?= $a['id_praktikan'] ?>"><i class="far fa-edit"></i></a>
                                                <!-- <a class="btn btn-warning btn-sm" href="?page=nilai"><i class="fas fa-newspaper"></i></a>
                                                <a class="btn btn-info btn-sm" href="?page=absen"><i class="far fa-calendar"></i></a> -->


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#tab').DataTable();
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