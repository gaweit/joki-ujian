<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA LAPORAN PEMBELIAN
                            </h2>
                            
                        </div>
                         <div class="body">
                        <form method="post" action="page/laporan_pembelian/cetak_pembelian.php" target="_blank" >
                            <table>
                                    <div ><br>
                                        <label>Bulan :</label>
                                        <select name="bulan" class="number_format">
                                            <option value="">Pilih</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                            <input type="submit" name="cetak" value="cetak" class="btn btn-primary" >        
                                   </div>
                                </table>

                        </form>
                    </div>

                        <div class="body">
                             
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Supplier</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                    	   <?php
                                             $no = 1;

                                             $nofaktur = $_GET['nofaktur'];
                                             $sql = $koneksi->query("SELECT *, p.id AS idsup, p.stok AS stokk from tb_pembelian p LEFT JOIN tb_supplier s on p.nama_supplier=s.nama_supplier left join tb_barang b on b.kode_barcode=p.kode_barcode where  p.nofaktur='$nofaktur'");

                                            while ($data = $sql->fetch_assoc()) {
                                                
                                            
                                        ?>
                                         <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama_supplier']?></td>
                                            <td><?php echo $data['nama_barang']?></td>
                                            <td><?php echo $data['stokk']?></td>

                                            
                                        </tr>
                                    	<?php 
                                       
                                    } ?>
                                    </tbody>
                                   
                                </table>
                               
                            </div>