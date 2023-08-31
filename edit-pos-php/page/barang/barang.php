<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Barang
                            </h2>

                        </div>
                        <div class="body">

                              <a href="?page=barang&aksi=tambah" class= "btn btn-primary waves-effect"><i class="material-icons">add_circle </i> Tambah</a>

                             <a href="./laporan/barang/lap_barang_pdf.php" class= "btn btn-primary waves-effect" target="blank"><i class="material-icons">print </i> Cetak Pdf</a>

                             <a href="./laporan/barang/lap_barang_exel.php" class= "btn btn-primary waves-effect" ><i class="material-icons">print </i> Cetak Exel</a>

                             <a href="" onclick="self.history.back() " class= "btn btn-success waves-effect"><i class="material-icons">settings_backup_restore </i> Kembali</a>      <br><br>

                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>Kode Barang</th>
                                        
                                        <th>Nama Barang</th>
                                        <th>Satuan </th>
                                        <th>Stok</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Profit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                 <tbody>
                                 <?php
                                 	$no=1;
                                 	$sql = $koneksi->query("select * from tb_barang2");
                                 	while ($tampil=$sql->fetch_assoc()) {


                                  ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $tampil['kode_barang'] ?> </td>
                                         
                                        <td><?php echo $tampil['nama_barang'] ?> </td>
                                        <td><?php echo $tampil['satuan'] ?> </td>
                                        <td>

                                            

                                            <?php 

                                                $stok = $tampil['stok'];

                                                if ($stok<=5) {
                                                    
                                                    echo "<b><font color='red'> $stok</b> ";
                                                } else{
                                                     echo "<b><font color='green'> $stok</>";
                                                }
   
                                            ?> 

                                            
                                         </td>
                                        <td align="right"><?php echo "Rp." .number_format ($tampil['harga_beli']); ?> -</td>
                                        <td align="right"><?php echo "Rp." .number_format ($tampil['harga_jual']); ?> -</td>
                                        <td align="right"><?php echo "Rp." .number_format ($tampil['profit']); ?> -</td>
                                        <td>
                                    
                                       
                                      
                                        <td>

                                          <a onclick="return confirm('Yakin Akan Menghapus Data ini...???') "  href="?page=barang&aksi=hapus&id=<?php echo $tampil['kode_barang'];?>" class= "btn btn-danger waves-effect"><i class="material-icons">delete </i> Hapus</a>
                                          
                                          <a href="?page=barang&aksi=ubah&id=<?php echo $tampil['kode_barang'];?>" class= "btn btn-info waves-effect"><i class="material-icons">mode_edit </i> Edit</a>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                             </table>

                           
