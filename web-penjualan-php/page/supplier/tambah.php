
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Supplier
                                
                            </h2>
					</div>
					<div class="body">
              <form method="POST">

         					<label for="">Nama Supplier</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama_supplier" class="form-control" />
                                </div>
                            </div>

                            <label for="">TLP</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="tlp" maxlength="12" class="form-control" />
                                </div>
                            </div>


                            <label for="">Alamat</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="alamat"  class="form-control" />
                                </div>
                            </div>




                           <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                        </form>

           <?php 

           	if (isset($_POST['simpan'])) {
           		$nama_supplier = $_POST['nama_supplier'];
           		$tlp = $_POST['tlp'];
           		$alamat = $_POST['alamat'];
           	

           	$sql = $koneksi->query("insert into tb_supplier (nama_supplier,tlp,alamat) values('$nama_supplier','$tlp','$alamat')");

           	if ($sql) {
           		?>

           		<script type="text/javascript">
           			alert("Data Berhasil di Simpan");
           			window.location.href="?page=supplier";
           		</script>


           		<?php
           	}
		}
     ?>