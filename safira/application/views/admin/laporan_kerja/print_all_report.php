<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CV ESOTECHNO');
$pdf->SetTitle('Report Laoran Kerja');
$pdf->SetSubject('Data Laoran Kerja');
$pdf->SetKeywords('Laoran Kerja, Data, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$title = <<<EOD
<br>
<h3>DATA LAPORAN KERJA KARYAWAN </h3>
<br>
<h3>KOTA BANJARBARU</h3>
EOD;
$pdf->WriteHTMLCell(0, 0, '', '' ,$title, 0, 1, 0, true, 'C', true);
$table ='<table style="border:1px solid #000; padding:6px;">';
$table .='<tr style="background-color:#ccc;">
		 <th width="5%" align="center" style="border:1px solid #000;">No</th>
		 <th width="15%" align="center" style="border:1px solid #000;">NIK</th>
		 <th width="15%" align="center" style="border:1px solid #000;">Nama Karyawan</th>
		 <th width="10%" align="center" style="border:1px solid #000;">Tanggal Lapor</th>		 
		 <th width="20%" align="center" style="border:1px solid #000;">File Laporan</th>
		 <th width="25%" align="center" style="border:1px solid #000;">Klik URL Tugas</th>
		 <th width="15%" align="center" style="border:1px solid #000;">Status Laporan</th>
		 </tr>';
$i=1; 

foreach ($laporan_kerja as $laporan_kerja) {
	$table .='<tr >
		 <td width="5%" align="center" style="border:1px solid #000;">'.$i++.'</td>
		 <td width="15%" align="center" style="border:1px solid #000;">'.$laporan_kerja->NIK.'</td>
		 <td width="15%" align="center" style="border:1px solid #000;">'.$laporan_kerja->nama.' - '.$laporan_kerja->bagian_karyawan.'</td>
		 <td width="10%" align="center" style="border:1px solid #000;">'.$laporan_kerja->tanggal_lapor.'</td>
		 <td width="20%" align="center" style="border:1px solid #000;">'.$laporan_kerja->file_laporan.'</td>
		 <td width="25%" align="center" style="border:1px solid #000;">'.$laporan_kerja->url.'</td>
		 <td width="15%" align="center" style="border:1px solid #000;">'.$laporan_kerja->status_laporan.'</td>
		 
	</tr>';
}
$table .='</table>';
$footer ='<span>'.date('l d M Y').'</span><br /><br /><span>	Mengetahui Pimpinan</span><br /><br /><br /><br /><span><u>_____________________</u></span>
';
$pdf->WriteHTMLCell(0, 0, '', '', $table,  0, 1, 0, true, 	'C', true);





$pdf->writeHTMLCell(0, 0, '', '', $footer, 0, 0, 0,  true, 	'R', true);
//70,50 panjang text
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('calonsiswa.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
