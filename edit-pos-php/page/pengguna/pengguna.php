<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pengguna
                            </h2>

                        </div>
                        <div class="body">

                             <a href="?page=pengguna&aksi=tambah" class= "btn btn-primary waves-effect"><i class="material-icons">add_circle </i> Tambah</a>

                             

                             <a href="" onclick="self.history.back() " class= "btn btn-success waves-effect"><i class="material-icons">settings_backup_restore </i> Kembali</a>     <br><br>


                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                     
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Email </th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                 <tbody>
                                 <?php
                                 	$no=1;
                                 	$sql = $koneksi->query("select * from tb_user");
                                 	while ($tampil=$sql->fetch_assoc()) {


                                  ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                         <td><?php echo $tampil['user_id'] ?> </td>
                                        <td><?php echo $tampil['nama'] ?> </td>
                                        <td><?php echo $tampil['email'] ?> </td>
                                        <td><?php echo $tampil['level'] ?> </td>
                                        <td>    

                                            <?php 

                                                $status = $tampil['status'];

                                                if ($status=="Blokir") {
                                                    
                                                    echo "<b><font color='red'> $status</b> ";
                                                } else{
                                                     echo "<b><font color='green'> $status</>";
                                                }

                                                
                                            ?> 
                                        </td>
                                        <td><img src="images/<?php echo $tampil['foto'] ?>" width="60" height="60" style="border-radius: 50%;" >  </td>
                                        <td>
                                        <?php $idp = $tampil['id']; ?>
                                          <a onclick="return confirm('Yakin Akan Menghapus Data ini...???') "  href="?page=pengguna&aksi=hapus&id=<?php echo $tampil['id'];?>" class= "btn btn-danger waves-effect"><i class="material-icons">delete </i> Hapus</a>
                                          
                                          <a href="?page=pengguna&aksi=ubah&id=<?php echo $tampil['id'];?>" class= "btn btn-info waves-effect"><i class="material-icons">mode_edit </i> Edit</a>

                                          <?php if ($tampil['status']=="Aktif" ) {

                                            
                                            
                                            echo "<a href='?page=pengguna&aksi=blokir&id=$idp' class=' btn btn-danger'>  Blokir</a>";

                                          } else{

                                             echo "<a href='?page=pengguna&aksi=aktif&id=$idp' class=' btn btn-primary'>  Aktifkan</a>";

                                          }
                                          ?>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                             </table>

                             <a href="?page=pengguna&aksi=tambah" class= "btn btn-primary waves-effect"><i class="material-icons">add_circle </i> Tambah</a>

                             

                             <a href="" onclick="self.history.back() " class= "btn btn-success waves-effect"><i class="material-icons">settings_backup_restore </i> Kembali</a>                             
