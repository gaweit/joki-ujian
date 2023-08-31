<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA SUPPLIER
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Supplier</th>
                                            <th>TLP</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php
                                    		$no = 1;

                                    		$sql = $koneksi->query("select * from tb_supplier");

                                    		while ($data = $sql->fetch_assoc()) {
                                    			
                                    		
                                    	?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama_supplier']?></td>
                                            <td><?php echo $data['tlp']?></td>
                                            <td><?php echo $data['alamat']?></td>
                                            <td>
                                            	
                                            	<a href="?page=supplier&aksi=edit&id=<?php echo $data['id']?>" class="btn btn-success" >Edit</a>
                                            	<a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="?page=supplier&aksi=delete&id=<?php echo $data['id']?>" class="btn btn-danger" >Delete</a>
                                            </td>
                                        </tr>
                                    	<?php } ?>
                                    </tbody>
                                </table>
                                <a href="?page=supplier&aksi=tambah" class="btn btn-primary">Tambah Data Barang</a>
                            </div>