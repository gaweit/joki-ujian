<?php

require 'assets/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['upload'])) {

    $err      = "";
    $ekstensi = "";
    $success  = "";

    $file_name = $_FILES['data_asisten']['name'];
    $file_data = $_FILES['data_asisten']['tmp_name'];

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
        for ($i = 1; $i < count($sheetData); $i++) {
            $nim            = $sheetData[$i]['2'];
            $nama_asisten   = $sheetData[$i]['1'];
            $password       = $nim;
            $foto           = 'default.jpg';
            $status         = 'Y';
            $id_praktikum   = $_POST['praktikum'];

            $pass = sha1($password);

            $save = mysqli_query($con, "INSERT INTO tb_asisten VALUES(NULL,'$nim','$nama_asisten','$pass','$foto','Y','$id_praktikum') ");

            $jumlahData++;
        }
        if ($save) {
            echo "<script>alert('Sukses');
            window.location='?page=asisten&act='</script>";
        }
    }
}
