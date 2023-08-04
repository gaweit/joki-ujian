<?php
// Koneksi ke database
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'qr_test';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
// Mendapatkan data dari permintaan POST
$data = json_decode(file_get_contents('php://input'), true);
$user_name = $data['user_name'];

// Simpan data kehadiran ke dalam database
$sql = "INSERT INTO attendance (user_name) VALUES ('$user_name')";

if (mysqli_query($conn, $sql)) {
    echo "Data kehadiran berhasil tersimpan!";
} else {
    echo "Terjadi kesalahan saat menyimpan data kehadiran: " . mysqli_error($conn);
}

// ... (kode PHP selanjutnya)

// Kirimkan response sebagai JSON
header('Content-Type: application/json');
echo json_encode($response);