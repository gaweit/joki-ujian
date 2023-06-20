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
$pdf->SetAuthor('PDAM');
$pdf->SetTitle('Cetak Surat Telaah');
$pdf->SetSubject('Cetak Surat Telaah');
$pdf->SetKeywords('Laporan Kerja, Data, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . '', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
	require_once(dirname(__FILE__) . '/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('Helvetica', '', 10);

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
<u><b>TELAAH STAF</b></u>
<br> 
EOD;
$pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
$table = '<table>';
$table .= '<tr>
		 <td style="width:100px;">Kepada YTH</td>
		 <td style="width:20px;">:</td>
		 <td style="width:500px;">' . $kepada . '</td> 
		 </tr>
          
         <tr>
		 <td style="width:100px;">Dari</td>
		 <td style="width:20px;">:</td>
		 <td style="width:500px;">' . $dari . '</td> 
		 </tr>
         
         <tr>
		 <td style="width:100px;">Hari / Tanggal</td>
		 <td style="width:20px;">:</td>
		 <td>' . date('d-m-Y', strtotime($surat->tgl_surat))  . '</td> 
		 </tr>
         
         <tr>
		 <td style="width:100px;">Lampiran</td>
		 <td style="width:20px;">:</td>
		 <td style="width:500px;">' . $lampiran . '</td> 
		 </tr>
         
         <tr>
		 <td style="width:100px;">Perihal</td>
		 <td style="width:20px;">:</td>
		 <td style="width:500px;">' . $perihal . '</td> 
		 </tr> 

         <tr>
		 <td style="width:100%;"></td> 
		 </tr>
         
         ';
$table .= '</table>';
$latar_belakang = '<span> <b>I. Latar Belakang</b></span> <br> <span> ' . $latar_belakang . '</span>';
$maksud_tujuan = '<span><b>II. Maksud dan Tujuan</b></span> <br>  <span>' . $maksud_tujuan . '</span>';
$permasalahan = '<span><b>III. Permasalahan</b></span> <br> <span>' . $permasalahan . '</span>';
$usulan = '<span><b>IV. Usulan</b></span> <br> <span>' . $usulan . '</span>';
$penutup = '<span> <br>' . $penutup . '</span>';

// $footer = '<span>Dibuat Oleh :</span><br /><br /><span>' . $diketahui_oleh . '</span><br /><br /><br /><br /><span><p>_____________________</p></span>';
$footer = '<table>';
$footer .= '<tr> 
		 <td><br><br><br>Diketahui Oleh</td>
		 <td><br><br><br>Dibuat Oleh</td>
		 </tr> 

		 <tr>
		 <td>' . $diketahui_oleh . '</td>
		 <td>' . $dari . '</td>
		 </tr> 

		 <tr>
		 <td></td> 
		 <td></td> 
		 </tr>  

		 <tr>
		 <td></td> 
		 <td></td> 
		 </tr> 

		 <tr>
		 <td></td> 
		 <td></td> 
		 </tr> 

		 <tr>
		 <td></td> 
		 <td></td> 
		 </tr> 

		 <tr>
		 <td><b><u>' . $nama_diketahui . '</u></b></td> 
		 <td><b><u>' . $nama_dibuat . '</u></b></td> 
		 </tr> 

		 <tr>
		 <td>' . $nipp_diketahui . '</td> 
		 <td>' . $nipp_dibuat . '</td> 
		 </tr> 
         ';
$footer .= '</table>';

$pdf->WriteHTMLCell(0, 0, '', '', $table,  0, 1, 0, true,     'J', true);
$pdf->WriteHTMLCell(0, 0, '', '', $latar_belakang,  0, 1, 0, true,     'J', true);
$pdf->WriteHTMLCell(0, 0, '', '', $maksud_tujuan,  0, 1, 0, true,     'J', true);
$pdf->WriteHTMLCell(0, 0, '', '', $permasalahan,  0, 1, 0, true,     'J', true);
$pdf->WriteHTMLCell(0, 0, '', '', $usulan,  0, 1, 0, true,     'J', true);
$pdf->WriteHTMLCell(0, 0, '', '', $penutup,  0, 1, 0, true,     'J', true);

$pdf->writeHTMLCell(0, 0, '', '', $footer, 0, 0, 0,  true,     'C', true);
//70,50 panjang text
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Surat Telaah Staf.pdf', 'I');


