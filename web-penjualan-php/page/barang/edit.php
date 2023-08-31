<script type ="text/javascript">
	function sum(){
		var harga_beli = document.getElementById('harga_beli').value;
		var harga_jual = document.getElementById('harga_jual').value;
		var result = parseInt(harga_jual) - parseInt(harga_beli);
		if (!isNaN(result)) {
			document.getElementById('profit').value = result;
		}

	}   
  //link dari dari file yang kita (harus sesuai dg nam file yang kita buat)
			 
</script>
<?php 
	$kode_barcode2 = $_GET['id'];
	$sql = $koneksi->query("select * from tb_barang where kode_barcode='$kode_barcode2'");
	$tampil = $sql->fetch_assoc();
	$satuan = $tampil['satuan'];
 
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Barang
                                
                            </h2>
					</div>
					<div class="body">
                        <form method="POST">

         					<label for="">Kode Barcode</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="kode_barcode" value="<?php echo $tampil['kode_barcode'];?>" class="form-control" />
                                </div>
                            </div>

                            <label for="">Nama Barang</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama_barang" value="<?php echo $tampil['nama_barang'];?>" class="form-control" />
                                </div>
                            </div>


                           <label for="">Satuan</label>
                              <div class="form-group">
                                  <div class="form-line">
                        
                            		<select name="satuan" class="form-control show-tick">
                                        <option value="" >- Pilih Keterangan -</option>
                                        <option value="LUSIN" <?php if ($satuan =='LUSIN'){echo "selected";}?>>LUSIN</option>
                                        <option value="PACK" <?php if ($satuan =='PACK'){echo "selected";}?>>PACK</option>
                                        <option value="PCS" <?php if ($satuan =='PCS'){echo "selected";}?>>PCS</option> 
                                        </select>		
                                </div>

			

                            <label for="">Stok</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="stok" value="<?php echo $tampil['stok'];?>" class="form-control" />
                                </div>
                            </div>
                         

                            <label for="">Harga Beli</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="harga_beli" name="harga_beli" onkeyup="sum()" value="<?php echo $tampil['harga_beli'];?>" class="form-control" />
                                </div>
                            </div>


                            <label for="">Harga Jual</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="harga_jual" name="harga_jual" onkeyup="sum()" value="<?php echo $tampil['harga_jual'];?>" class="form-control" />
                                </div>
                            </div>

                            <label for="">Profit</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="profit" id="profit" readonly="" style="background-color:#e7e3e9;" value="<?php echo $tampil['profit'];?>" class="form-control" />
                                </div>
                            </div>


                           <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                        </form>

           <?php 
           
           	if (isset($_POST['simpan'])) {
           		$kode_barcode = $_POST['kode_barcode'];
           		$nama_barang = $_POST['nama_barang'];
           		$satuan = $_POST['satuan'];
           		$stok = $_POST['stok'];
           		$harga_beli = $_POST['harga_beli'];
           		$harga_jual = $_POST['harga_jual'];
           		$profit = $_POST['profit'];
           	

           	$sql2 = $koneksi->query("update tb_barang set kode_barcode='$kode_barcode',nama_barang='$nama_barang',satuan='$satuan',stok='$stok',harga_beli='$harga_beli',harga_jual='$harga_jual',profit='$profit' where kode_barcode='$kode_barcode2'");

           	if ($sql2) {
           		?>

           		<script type="text/javascript">
           			alert("Data Berhasil di Edit");
           			window.location.href="?page=barang";
           		</script>


           		<?php
           	}
		}
     ?>

