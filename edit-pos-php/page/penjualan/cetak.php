
<?php include "../../koneksi/koneksi.php"; ?>

<?php 
	error_reporting(0);
    
    $kd_pjl= $_GET['invoice']; 
?>





<!DOCTYPE html>
<html>
<head>
    <title></title>

    <style type="text/css" media="screen">
        body{
            font-size: 13px;
        }
    </style>


<script type="text/javascript">
    window.print();
    window.onfocus=function(){ window.close();}
</script>    
</head>
<body onLoad="window.print()">


<div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Invoice Pembelian</h4>
                        </div>


                        <div class="modal-body">

                        <table>
                            <tr>
                                <td>PT. NANKEI ANUGERAH ABADI</td>
                            </tr>

                            <tr>
                                <td>Pergudangan Keroncong No.04 Jatiuwung Tangerang</td>
                            </tr> 

                        </table>

                            <table>
                                
                                    
                                    <br> 
                                    <?php 



                                        $sql = $koneksi->query("select * from tb_customer2 ,tb_penjualan2  where  
                                                 tb_customer2.id_customer=tb_penjualan2.id_customer 
                                                 and kode_penjualan='$kd_pjl'");
                                        $tampil2=$sql->fetch_assoc();

                                     ?>

                                     <tr>
                                        <td>No Penjualan &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp<?php echo $tampil2['kode_penjualan']; ?></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>Pelanggan &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp<?php echo $tampil2['nama']; ?></td>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <td>Tanggal &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp <?php echo date('d F Y', strtotime($tampil2['tanggal_penjualan'])); ?></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>Kasir &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp <?php echo $tampil2['kasir'];  ?></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td><hr width="100%" color="red"></td>
                                    </tr>


                                    <?php 

                                        $sql = $koneksi->query("select * from tb_penjualan2, tb_penjualan_tmp2, tb_barang2
                                                             where tb_penjualan2.kode_penjualan=tb_penjualan_tmp2.kode_penjualan
                                                             and tb_penjualan2.kode_barang=tb_barang2.kode_barang
                                                              and tb_penjualan2.kode_penjualan='$kd_pjl'");
                                        
                                        while ($tampil=$sql->fetch_assoc()) {
                                               

                                     ?>

                                     

                                    <tr>
                                    
                                        
                                        <td><?php echo $tampil['nama_barang']; ?></td>
                                        <td><?php echo "Rp." .number_format($tampil['harga_jual']).',-'.'&nbsp'.'&nbsp'.'X'.'&nbsp'.'&nbsp'.$tampil['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'; ?></td>

                                        
                                        
                                        <td><?php echo "Rp." .number_format($tampil['total']); ?>,-</td>
                                    </tr>

                                   <?php

                                        $bayar = $tampil['bayar']; 
                                        $kembali_byr = $tampil['kembali']; 

                                        $total_bayar2 = $total_bayar2+$tampil['total'];

                                        } 

                                    ?> 

                                    <tr>
                                        <td><hr></td>
                                    </tr>

                                    <tr>
                                        <th  font-size: 17px;" colspan="2">Total</th>
                                        <td style="text-align: right;"><b> <?php echo "Rp." .number_format($total_bayar2); ?>,- </b></td>
                                    </tr>


                                    <tr>
                                        <th  font-size: 17px;" colspan="2">Tunai</th>
                                        <td style="text-align: right;"><b> <?php echo "Rp." .number_format($bayar);?>,- </b></td>
                                    </tr>

                                     <tr>
                                        <td><hr></td>
                                    </tr>

                                    <tr>
                                        <th  font-size: 17px;" colspan="2">Kembali</th>
                                        <td style="text-align: right;"><b> <?php echo "Rp." .number_format($kembali_byr);?>,- </b></td>
                                    </tr>

                                     <tr>
                                        <td><hr></td>
                                    </tr>

                                    
                               
                            </table>

                            <table>
                                <tr>
                                    <td>Barang yang sudah dibeli tidak dapat dikembalikan </td>
                                </tr>
                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>


        </body>
</html>    