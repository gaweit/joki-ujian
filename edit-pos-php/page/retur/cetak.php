
<?php include "../../koneksi/koneksi.php"; ?>

<?php 
	error_reporting(0);
    $kasir= $_GET['kasir'];
    $kd_pjl= $_GET['invoice']; 
?>
<div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Ratur Barang</h4>
                        </div>


                        <div class="modal-body">

                        <table>
                            <tr>
                                <td>PT. NANKEI ANUGERAH ABADI</td>
                            </tr>

                            <tr>
                                <td>Pergudangan keroncing NO.04 Jatiuwung Tangerang/td>
                            </tr> 

                        </table>

                            <table>
                                
                                    
                                    <br> 
                                    <?php 



                                        $sql = $koneksi->query("select * from tb_retur where kode_retur='$kd_pjl'");
                                        $tampil2=$sql->fetch_assoc(); 

                                     ?>

                                     <tr>
                                        <td>No Retur &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp<?php echo $tampil2['kode_retur']; ?></td>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <td>Tanggal &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp <?php echo $tampil2['tgl_retur']; ?></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>Kasir &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp <?php echo $kasir; ?></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td><hr width="100%" color="red"></td>
                                    </tr>


                                    <?php 

                                        $sql = $koneksi->query("select * from tb_retur, tb_barang2 where tb_retur.kode_barang=tb_barang2.kode_barang and kode_retur='$kd_pjl'");
                                        
                                        while ($tampil=$sql->fetch_assoc()) {
                                               

                                     ?>

                                     

                                    <tr>
                                    
                                        
                                        <td><?php echo $tampil['nama_barang']; ?></td>
                                        <td><?php echo "Rp." .number_format($tampil['harga']).',-'.'&nbsp'.'&nbsp'.'X'.'&nbsp'.'&nbsp'.$tampil['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'; ?></td>

                                        
                                        
                                        <td><?php echo "Rp." .number_format($tampil['total']); ?>,-</td>
                                    </tr>

                                   <?php

                                       

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
                                        <td><hr></td>
                                    </tr>

                                    
                               
                            </table>

                           
                        </div>
                        <br>
                        <div class="modal-footer">
                            <input type="button"  name="nip" value="Print" onclick="window.print()" />
                            
                        </div>
                    </div>
                </div>
            </div>