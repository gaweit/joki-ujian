<?php

require 'assets/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['upload'])) {

    $err      = "";
    $ekstensi = "";
    $success  = "";

    $file_name = $_FILES['data_praktikan']['name'];
    $file_data = $_FILES['data_praktikan']['tmp_name'];

    if (empty($file_name)) {
        $err .= "<li>Silahkan masukkan file yang kamu inginkan.</li>";
    } else {
        $ekstensi = pathinfo($file_name)['extension'];
    }


    $ekstensi_allowed = array("xls", "xlsx");

    if (!in_array($ekstensi, $ekstensi_allowed)) {
        $err .= "<li>Silahkan Masukkan File xls atau xlsx. File yang kamu masukkan <b>$file_name</b> punya tipe <b>$ekstensi</b></li>";
    }


    if (empty($err)) {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile("$file_data");
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = 0;
        $nimExists = array();
        for ($i = 1; $i < count($sheetData); $i++) {
            $nama_praktikan  = $sheetData[$i]['1'];
            $nim             = $sheetData[$i]['2'];
            $password        = $nim;
            $status          = 1;

            $pass = sha1($password);

            // Periksa apakah $nim sudah ada di database
            $query = "SELECT COUNT(*) as count FROM tb_praktikan WHERE nim = '$nim'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];

            if ($count > 0) {
                $nimExists[] = $nim;
            } else {
                $save = mysqli_query($con, "INSERT INTO tb_praktikan VALUES(NULL,'$nama_praktikan','$nim','$pass',1,'default.png',0) ");
                $jumlahData++;
            }
        }

        if ($jumlahData > 0) {
            echo "<script>alert('Sukses');
            window.location='?page=praktikan'</script>";
        }

        if (!empty($nimExists)) {
            $nimExistsList = implode(', ', $nimExists);
            echo "<script>alert('Data dengan NIM berikut sudah ada di database: $nimExistsList');
            window.location='?page=praktikan&act=add'</script>";
        }
    }
}
