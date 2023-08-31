<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Penjualan
                            </h2>

                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Penjualan</th>
                                        <th>Tanggal</th>
                                        
                                        <th>Nama Pelanggan</th>
                                        <th>Kasir</th>

                                         <th>Total</th>
                                         <th>Aksi</th>
                                       
                                        
                                        
                                    </tr>
                                </thead>


                                 <tbody>
                                 <?php
                                    $no=1;
                                    $sql = $koneksi->query("SELECT tb_penjualan_tmp2.kode_penjualan, tb_penjualan2.tanggal_penjualan, tb_penjualan2.kasir, tb_customer2.nama, sum(tb_penjualan2.total) as total2 from tb_penjualan_tmp2 LEFT JOIN tb_penjualan2 on tb_penjualan_tmp2.kode_penjualan=tb_penjualan2.kode_penjualan left JOIN tb_customer2 on tb_customer2.id_customer=tb_penjualan2.id_customer GROUP by tb_penjualan_tmp2.kode_penjualan");
                                    while ($tampil=$sql->fetch_assoc()) {

                                    $profit = $tampil['profit'] * $tampil['jumlah'];

                                  ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $tampil['kode_penjualan'] ?> </td>
                                        <td><?php echo date('d F Y', strtotime( $tampil['tanggal_penjualan'])); ?> </td>
                                        <td><?php echo $tampil['nama'] ?> </td>
                                        <td><?php echo $tampil['kasir'] ?> </td>
                                     
                                     
                                        <td align="right"><?php echo "Rp." .number_format( $tampil['total2']); ?>,- </td>

                                         <td><a onclick="window.open('page/penjualan/cetak.php?invoice=<?php echo $tampil['kode_penjualan']; ?>','mywindow','width=600px, height=600px, left=300px;')" class= "btn btn-primary waves-effect"><i class="material-icons">print </i> Catak Struk</a></td> 
                                    
                                        
                                        
                                    </tr>

                                    <?php } ?>
                                   
                                 </tbody>
                                
                             </table>

                            