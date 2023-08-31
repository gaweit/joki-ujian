<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
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
	<a style="text-decoration: none; font-size:16px; color: black; margin-left:325px; "> PT. Nankei Anugerah Abadi </a><br>
    <a style="text-decoration: none; color:  black; font-size:16px; margin-left:325px; text-align:center;">Laporan Data Barang</a><br><br><br>
   
    
    <table border="1px" class="tabel" align="center">
    	
    		<tr>
    			<th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan </th>
                <th>Stok </th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Profit</th>
               
    		</tr>';

    		

    			

    		
        		$no = 1;
        		$sql = $koneksi->query("select * from tb_barang2 ");
        		while ($data=$sql->fetch_assoc()) {
        			
    	
    		$content .='

    		<tr>
    			<td>'.$no++.' </td>
		    			
		    			<td> '.$data['kode_barang'].' </td>
		    			<td> '.$data['nama_barang'].' </td>
                        <td> '.$data['satuan'].' </td>
                        <td> '.$data['stok'].' </td>
		    			
		    			<td align="right"> '.number_format( $data['harga_beli']).",-".' </td>
		    			<td align="right"> '.number_format( $data['harga_jual']).",-".' </td>
		    			<td align="right"> '.number_format( $data['profit']).",-".' </td>
		    			
    		</tr>

    		';	
    		
            
    		
    		}
    		


$content .=' 	
    </table>
    
    
</page>';

    require_once('../../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('lapbarang.pdf');
?>
