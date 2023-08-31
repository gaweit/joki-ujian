<?php
error_reporting(0);
include"../../koneksi/koneksi.php";
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
</style>


';

	

				

    $content .= '
<page><br>
	<div style="text-decoration: none; font-size:16px; color: black; text-align: center; "> PT. NANKEI ANUGERAH ABADI</div>
    <div style="text-decoration: none; color:  black; font-size:16px; text-align:center;">Laporan Retur</div><br><br>
   
    
    <table border="1px" class="tabel" align="center">
    	
    		<tr>
    			<th>No</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga </th>
                <th>Jumlah</th>
                <th>Total</th>
               
    		</tr>';

    		

    			

    		
        		$no = 1;
        		$sql = $koneksi->query("select * from tb_retur, tb_barang2 where tb_retur.kode_barang=tb_barang2.kode_barang ");
        		while ($data=$sql->fetch_assoc()) {
        			$profit = $data['profit'] * $data['jumlah'];
    	
    		$content .='

    		<tr>
    			<td>'.$no++.' </td>
		    			<td> '.date('d F Y', strtotime( $data['tgl_retur'])).' </td>
		    			<td> '.$data['kode_barang'].' </td>
		    			<td> '.$data['nama_barang'].' </td>
		    			
		    			<td align="right"> '.number_format( $data['harga']).",-".' </td>
		    			<td align="center"> '. $data['jumlah'].' </td>
		    			<td align="right"> '.number_format( $data['total']).",-".' </td>
		    			
    		</tr>

    		';	
    		$total_pj = $total_pj+$data['total']; 
            
    		
    		}
    		$content .='

    			<tr>
                    <th style="text-align: center; font-size: 17px;" colspan="6">Total Pembelian</th>
                    <td style="font-size: 17px;"><b>Rp.'.number_format($total_pj).',-</b></td>
                   
                </tr>

    		';	


$content .=' 	
    </table>
    
    
</page>';

    require_once('../../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('retur.pdf');
?>
