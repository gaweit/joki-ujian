<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("select * from tb_user where id='$id'");	

	$data=$sql->fetch_assoc();

 ?>	

 <style type="text/css" media="screen">
 	.style2 {
    color: black;
    font-weight: bold;
    margin-left:20px ;
    font-family: "comic sans ms", cursive; 
}
 </style>

				 <div class="col-md-7 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Perusahaan 
                        </div>
                        <div class="panel-body">
                            
                            	<table>
                            		<tr>
                            			
                            			<td rowspan="7"><img src="images/<?php echo $data['foto']; ?>" style="border-radius: 50%" width="150" height="175"> </td>
                            		</tr>
                            		
						             <tr>
                            			<td><span class="style2"> Username </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['user_id']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Nama </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['nama']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Email </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['email']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Password </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['pass']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Level </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['level']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Status </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['status']; ?></span></td>
                            		</tr>
                            </table>		


                         </div>
                        <div class="panel-footer">
                           <div class="panel-footer">

                           <a onclick="self.history.back()" class="btn btn-info">Kembali</a>
                           
                           <a href="?page=profile&aksi=ubah&id=<?php echo $id; ?>" class="btn btn-info" >Ubah Password</a>
                        </div>
                        </div>
                    </div>
                </div>