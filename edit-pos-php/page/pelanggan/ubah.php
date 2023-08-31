<?php 

	$id= $_GET['id'];

	$sql = $koneksi->query("select * from tb_customer2 where id_customer='$id'");

	$data= $sql->fetch_assoc();


 ?>

 <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              Ubah Pelanggan
                          </h2>

                      </div>
                      <div class="body">
                          <form method="post">

                            <label for="kode">Kode Pelanggan</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="kode" id="kode" readonly="" value="<?php echo $data['id_customer'] ?>" class="form-control"  >
                                </div>
                            </div>


                             <label for="kode">Nama</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama" id="kode" value="<?php echo $data['nama']; ?>"  class="form-control"  >
                                </div>
                            </div>


                             <label for="kode">Alamat</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="alamat" id="kode" value="<?php echo $data['alamat']; ?>"   class="form-control"  >
                                </div>
                            </div>


                             <label for="kode">Telpon</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="telpon" id="kode" value="<?php echo $data['telpon']; ?>"   class="form-control"  >
                                </div>
                            </div>


                             <label for="kode">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="email" id="kode" value="<?php echo $data['email']; ?>" class="form-control"  >
                                </div>
                            </div>



                             <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>



<?php 

	if (isset($_POST['simpan'])) {
		
		
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telpon = $_POST['telpon'];
		$email = $_POST['email'];
		


		$simpan = $koneksi->query("update  tb_customer2 set  nama='$nama', alamat='$alamat', telpon='$telpon', email='$email' where id_customer= '$id' ");


		if ($simpan) {
			 ?>
              <script>
                  alert("Data Barang Berhasil diubah ");
                  window.location.href="?page=pelanggan";
              </script>

            <?php
		}

	}

 ?>

