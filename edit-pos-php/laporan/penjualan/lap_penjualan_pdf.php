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

	

				$tgl1 = $_POST['tgl1'];
				$tgl2 = $_POST['tgl2'];

    $content .= '
<page><br>
	<a style="text-decoration: none; font-size:16px; color: black; margin-left:325px; "> PT. Nankei Anugerah Abadi </a><br>
    <a style="text-decoration: none; color:  black; font-size:16px; margin-left:325px; text-align:center;">Laporan Penjualan</a><br><br><br>
    <a style="text-decoration: none; color:  black; font-size:16px; margin-left:275px; text-align:center;">Periode : '.date('d F Y', strtotime($tgl1)).' -  '.date('d F Y', strtotime($tgl2)).'</a><br><br><br>
    
    <table border="1px" class="tabel" align="center">
    	
    		<tr>
    			<th>No</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga </th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Profit</th>
    		</tr>';

    		

    			$tgl4 = date("d-m-Y");

    			if (isset($_POST['cetak'])) {

				
				$tgl1 = $_POST['tgl1'];
				$tgl2 = $_POST['tgl2'];

				$no = 1;
				

				$sql = $koneksi->query("select * from tb_penjualan2, tb_barang2 where tb_penjualan2.kode_barang=tb_barang2.kode_barang and tanggal_penjualan between '$tgl1' and '$tgl2'");
				while ($data=$sql->fetch_assoc()) {
					$profit = $data['profit'] * $data['jumlah'];
					$content .='
					<tr>
		    			<td>'.$no++.' </td>
		    			<td> '.date('d F Y', strtotime( $data['tanggal_penjualan'])).' </td>
		    			<td> '.$data['kode_barang'].' </td>
		    			<td> '.$data['nama_barang'].' </td>
		    			
		    			<td align="right"> '.number_format( $data['harga']).",-".' </td>
		    			<td align="center"> '.$data['jumlah'].' </td>
		    			<td align="right"> '.number_format( $data['total']).",-".' </td>
		    			<td align="right"> '.number_format( $profit).",-".' </td>
		    		</tr>
		    		';
		    		$total_pj = $total_pj+$data['total']; 
                    $total_profit = $total_profit+$profit;

				}

						
				}else{	
    			

    		
        		$no = 1;
        		$sql = $koneksi->query("select * from tb_penjualan2, tb_barang2 where tb_penjualan2.kode_barang=tb_barang2.kode_barang ");
        		while ($data=$sql->fetch_assoc()) {
        			$profit = $data['profit'] * $data['jumlah'];
    	
    		$content .='

    		<tr>
    			<td>'.$no++.' </td>
		    			<td> '.date('d F Y', strtotime( $data['tanggal_penjualan'])).' </td>
		    			<td> '.$data['kode_barang'].' </td>
		    			<td> '.$data['nama_barang'].' </td>
		    			
		    			<td align="right"> '.number_format( $data['harga']).",-".' </td>
		    			<td align="center"> '. $data['jumlah'].' </td>
		    			<td align="right"> '.number_format( $data['total']).",-".' </td>
		    			<td align="right"> '.number_format( $profit).",-".' </td>
    		</tr>

    		';	
    		$total_pj = $total_pj+$data['total']; 
            $total_profit = $total_profit+$profit;
    		}
    		}
    		$content .='

    			<tr>
                    <th style="text-align: center; font-size: 17px;" colspan="6">Total Penjualan dan Profit </th>
                    <td style="font-size: 17px;"><b>Rp.'.number_format($total_pj).',-</b></td>
                    <td style="font-size: 17px;"><b>Rp.'.number_format($total_profit).',-</b></td>
                </tr>

    		';	

#cetak stuck semua periode #
$content .=' 	
    </table>
    
    

</page>';

    require_once('../../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('jual.pdf');
?>
