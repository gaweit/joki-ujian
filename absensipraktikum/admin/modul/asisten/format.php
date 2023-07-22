<?php
// Mengimpor autoload dari PhpSpreadsheet
require 'assets/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat objek spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Memberi judul pada kolom
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Nim');

// Memasukkan data
$sheet->setCellValue('A2', '1');
$sheet->setCellValue('B2', 'Muhammad Althaf Dhiaulhaq');
$sheet->setCellValue('C2', '1103194046');

// Memberi format pada sel-sel tertentu
$sheet->getStyle('A1:C1')->getFont()->setBold(true);
$sheet->getStyle('A1:C2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

// Menyimpan spreadsheet ke dalam file Excel
$writer = new Xlsx($spreadsheet);
$filename = 'Contoh Data Asisten.xlsx';
$writer->save($filename);

// Menyajikan file Excel ke browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
