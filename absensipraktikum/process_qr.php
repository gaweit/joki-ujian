<?php
// Koneksi ke database
$host = 'localhost';
$db = 'db_imas';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

// Mendapatkan data NIM dari POST request
$nim = $_POST['nim'];

// Proses data NIM, misalnya memeriksa keberadaan NIM dalam database
$query = $pdo->prepare("SELECT * FROM tb_mahasiswa WHERE nim = :nim");
$query->execute(['nim' => $nim]);

if ($query->rowCount() > 0) {
    // NIM ditemukan, lakukan tindakan absensi atau operasi lainnya

    // Contoh: Menyimpan data absensi ke dalam tabel absensi
    $absenQuery = $pdo->prepare("INSERT INTO tb_absensi (nim, waktu) VALUES (:nim, NOW())");
    $absenQuery->execute(['nim' => $nim]);

    echo 'Absensi berhasil!';
} else {
    echo 'NIM tidak ditemukan.';
}
