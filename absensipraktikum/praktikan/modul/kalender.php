<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        .highlight {
            background-color: lightgrey;
            border-radius: 100%;
        }

        .sunday {
            color: red;
        }

        .sunday-date {
            color: red;

        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Mendapatkan bulan dan tahun saat ini
        $bulan = date('m');
        $tahun = date('Y');
        date_default_timezone_set('Asia/Jakarta');
        // Mendapatkan jumlah hari dalam bulan ini
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        // Mendapatkan informasi hari pertama dalam bulan ini
        $hariPertama = date('N', strtotime($tahun . '-' . $bulan . '-01'));

        // Membuat array untuk nama-nama hari
        $namaHari = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min');

        // Menampilkan kalender
        echo "<h2 style='font-weight:bolder;'> " . date('F Y') . "</h2>";
        echo "<table>";
        echo "<tr>";
        foreach ($namaHari as $hari) {
            $sundayClass = ($hari == 'Min') ? 'sunday' : ''; // Menambahkan kelas sunday pada nama hari Minggu
            echo "<th class='$sundayClass'>$hari</th>";
        }
        echo "</tr>";

        // Menampilkan tanggal dalam bentuk tabel
        $nomorHari = 1;
        $akhirBaris = false;
        for ($i = 1; $i <= 6; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 7; $j++) {
                if (($i == 1 && $j < $hariPertama) || ($nomorHari > $jumlahHari)) {
                    echo "<td>&nbsp;</td>";
                } else {
                    $highlightClass = ($nomorHari == date('d')) ? 'highlight' : ''; // Menambahkan kelas highlight jika tanggal saat ini
                    $dayOfWeek = date('N', strtotime($tahun . '-' . $bulan . '-' . $nomorHari));
                    $sundayClass = ($dayOfWeek == 7) ? 'sunday-date' : ''; // Menambahkan kelas sunday-date jika hari Minggu
                    echo "<td class='$highlightClass'><span class='$sundayClass'>$nomorHari</span></td>";
                    $nomorHari++;
                }
                if ($nomorHari > $jumlahHari) {
                    $akhirBaris = true;
                    break;
                }
            }
            echo "</tr>";
            if ($akhirBaris) {
                break;
            }
        }
        echo "</table>";
        ?>
    </div>
</body>

</html>