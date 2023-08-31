<?php 

		$sql = $koneksi->query("select id_customer from tb_customer2 order by id_customer desc");

		$data = $sql->fetch_assoc();

		$id_customer = $data['id_customer'];

		$urut = substr($id_customer, 1, 3);
		$tambah = (int) $urut+1;
		

		if(strlen($tambah) == 1){
			$format="P"."00".$tambah;
		}else if(strlen($tambah) == 2){
			$format="P"."0".$tambah;
		}else{
			$format="P".$tambah;
		}


 ?>

 <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              Tambah Pelanggan
                          </h2>

                      </div>
                      <div class="body">
                          <form method="post">

                            <label for="kode">Kode Pelanggan</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="kode" id="kode"  value="<?php echo $format ?>" class="form-control"  >
                                </div>
                            </div>


                             <label for="kode">Nama</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama" id="kode"   class="form-control"  >
                                </div>
                            </div>


                             <label for="kode">Alamat</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="alamat" id="kode"   class="form-control"  >
                                </div>
                            </div>


                             <label for="kode">Telpon</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="telpon" id="kode"  class="form-control"  >
                                </div>
                            </div>


                             <label for="kode">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="email" id="kode" class="form-control"  >
                                </div>
                            </div>



                             <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>



<?php 

	if (isset($_POST['simpan'])) {
		
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telpon = $_POST['telpon'];
		$email = $_POST['email'];
		


		$simpan = $koneksi->query("insert into tb_customer2 (id_customer, nama, alamat, telpon, email)
									values('$kode', '$nama', '$alamat', '$telpon', '$email')");


		if ($simpan) {
			 ?>
              <script>
                  alert("Data Barang Berhasil disimpan  <?php echo $kode; ?>");
                  window.location.href="?page=pelanggan";
              </script>

            <?php
		}

	}

 ?>

