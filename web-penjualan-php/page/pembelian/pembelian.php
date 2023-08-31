<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PEMBELIAN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Faktur</th>
                                            <th>Tanggal</th>
                                            <th>Supplier</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php
                                    		 $no = 1;

                                    		 $sql = $koneksi->query("SELECT *, p.id AS idsup, p.stok AS stokk from tb_pembelian p LEFT JOIN tb_supplier s on p.nama_supplier=s.nama_supplier left join tb_barang b on b.kode_barcode=p.kode_barcode  ");

                                    		while ($data = $sql->fetch_assoc()) {
                                    			
                                    		
                                    	?>
                                         <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nofaktur']?></td>
                                            <td><?php echo $data['tanggal']?></td>
                                            <td><?php echo $data['nama_supplier']?></td>
                                            <td><?php echo $data['nama_barang']?></td>
                                            <td><?php echo $data['stokk']?></td>
                                            <td>
                                                
                                                <a href="?page=pembelian&aksi=edit&id=<?php echo $data['idsup']?>" class="btn btn-success" >Edit</a>
                                                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')" href="?page=pembelian&aksi=delete&id=<?php echo $data['id']?>" class="btn btn-danger" >Delete</a>
                                            </td>
                                        </tr>
                                    	<?php } ?>
                                    </tbody>
                                </table>
                                <a href="?page=pembelian&aksi=tambah" class="btn btn-primary">Tambah Data Pembelian</a>
                            </div>