<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pelanggan
                            </h2>

                        </div>
                        <div class="body">
                            <a href="?page=pelanggan&aksi=tambah" class= "btn btn-primary waves-effect"><i class="material-icons">add_circle </i> Tambah</a>

                             

                                    <a href="" onclick="self.history.back() " class= "btn btn-success waves-effect"><i class="material-icons">settings_backup_restore </i> Kembali</a>  <br><br>
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                     
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>Kode Pelanggan</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telpon</th>
                                        <th>Email </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                 <tbody>
                                 <?php
                                 	$no=1;
                                 	$sql = $koneksi->query("select * from tb_customer2");
                                 	while ($tampil=$sql->fetch_assoc()) {


                                  ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                         <td><?php echo $tampil['id_customer'] ?> </td>
                                        <td><?php echo $tampil['nama'] ?> </td>
                                        <td><?php echo $tampil['alamat'] ?> </td>
                                        <td><?php echo $tampil['telpon'] ?> </td>
                                        <td><?php echo $tampil['email'] ?> </td>
                                        
                                        <td>
                                        
                                        
                                          <a onclick="return confirm('Yakin Akan Menghapus Data ini...???') "  href="?page=pelanggan&aksi=hapus&id=<?php echo $tampil['id_customer'];?>" class= "btn btn-danger waves-effect"><i class="material-icons">delete </i> Hapus</a>
                                          
                                          <a href="?page=pelanggan&aksi=ubah&id=<?php echo $tampil['id_customer'];?>" class= "btn btn-info waves-effect"><i class="material-icons">mode_edit </i> Edit</a>

                                          

                                        </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                             </table>

                                                   
