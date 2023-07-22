<?php

// Retrieve the combinedBinaryArray sent from the JavaScript
$binaryArray = $_POST['combinedBinaryArray'];
// $binaryArray = [1, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 1];

for ($i = 0; $i < count($binaryArray); $i++) {
    if ($binaryArray[$i] == 1) {
        // Perform specific actions based on the index value
        switch ($i) {
            case 0:
                $hari = 'Senin';
                $shift = 1;
                break;
            case 1:
                $hari = 'Senin';
                $shift = 2;
                break;
            case 2:
                $hari = 'Senin';
                $shift = 3;
                break;
            case 3:
                $hari = 'Senin';
                $shift = 4;
                break;
            case 4:
                $hari = 'Selasa';
                $shift = 1;
                break;
            case 5:
                $hari = 'Selasa';
                $shift = 2;
                break;
            case 6:
                $hari = 'Selasa';
                $shift = 3;
                break;
            case 7:
                $hari = 'Selasa';
                $shift = 4;
                break;
            case 8:
                $hari = 'rabu';
                $shift = 1;
                break;
            case 9:
                $hari = 'rabu';
                $shift = 2;
                break;
            case 10:
                $hari = 'rabu';
                $shift = 3;
                break;
            case 11:
                $hari = 'rabu';
                $shift = 4;
                break;
            case 12:
                $hari = 'kamis';
                $shift = 1;
                break;
            case 13:
                $hari = 'kamis';
                $shift = 2;
                break;
            case 14:
                $hari = 'kamis';
                $shift = 3;
                break;
            case 15:
                $hari = 'kamis';
                $shift = 4;
                break;
            case 16:
                $hari = 'jumat';
                $shift = 1;
                break;
            case 17:
                $hari = 'jumat';
                $shift = 2;
                break;
            case 18:
                $hari = 'jumat';
                $shift = 3;
                break;
            case 19:
                $hari = 'jumat';
                $shift = 4;
                break;
            case 20:
                $hari = 'sabtu';
                $shift = 1;
                break;
            case 21:
                $hari = 'sabtu';
                $shift = 2;
                break;
            case 22:
                $hari = 'sabtu';
                $shift = 3;
                break;
            case 23:
                $hari = 'sabtu';
                $shift = 4;
                break;
            default:
                $hari = ''; // Provide the default hari value
                $shift = ''; // Provide the default shift value
                break;
        }
    }
}
$praktikum = $value;

// // Prepare the SQL statement
$sql = "INSERT INTO tb_mengajar (nim, name, hari, shift, id_praktikum) 
                SELECT '$nim', '$name', '$hari', $shift, p.id_praktikum
                FROM praktikum p
                WHERE p.nama_prak = '$praktikum'";

//Reduce kuota value from database
$sql = "UPDATE kuota_prak
            SET kuota = kuota - 1
            WHERE nama_prak = '$praktikum' AND hari = '$hari' AND shift=$shift";
