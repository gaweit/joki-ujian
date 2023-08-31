<script>
function sum() {
      var harga_beli = document.getElementById('harga_beli').value;
      var harga_jual = document.getElementById('harga_jual').value;
      var result =parseInt(harga_jual) - parseInt(harga_beli);
      if (!isNaN(result)) {
         document.getElementById('profit').value = result;
      }
}
</script>


<?php 

		$id = $_GET ['id'];

		$sql2 = $koneksi->query("select * from tb_barang2 where kode_barang = '$id'");

		$data = $sql2->fetch_assoc();

		


 ?>


          <!-- Vertical Layout -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              Ubah Data Barang
                          </h2>

                      </div>
                      <div class="body">
                          <form method="post">

                            <label for="kode">Kode Barang</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="kode" id="kode"  value=" <?php echo $data ['kode_barang']; ?>" class="form-control"  >
                                </div>
                            </div>

                            

                              <label for="nama">Nama Barang</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="nama" id="nama" class="form-control" value=" <?php echo $data ['nama_barang']; ?>" >
                                  </div>
                              </div>


                               <label for="alamat">Satuan</label>
                              <div class="form-group">
                                <div class="form-line">
                                    <select name="satuan" class="form-control show-tick">
                                        <option value="Lusin" <?php if ($data=='Lusin') {echo "selected";} ?>>Lusin</option>
                                        <option value="PCS" <?php if ($data=='PCS') {echo "selected";} ?>>PCS</option>
                                        <option value="Pack" <?php if ($data=='Pack') {echo "selected";} ?>>Pack</option>
                                    </select>
                                </div>
                              <br>
                              

                              <label for="stok">Stok</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="stok" value="<?php echo $data['stok']; ?>" class="form-control" >
                                  </div>
                              </div>

                              <label for="beli">Harga Beli</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="beli" id="harga_beli" onkeyup="sum();"  class="form-control" value="<?php echo $data['harga_beli']; ?>" required="">
                                  </div>
                              </div>

                              <label for="jual">Harga Jual</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="jual" id="harga_jual" onkeyup="sum();" class="form-control" value="<?php echo $data['harga_jual']; ?>" required="">
                                  </div>
                              </div>

                              <label for="profit">Profit</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="profit"  readonly="" id="profit" class="form-control" value="<?php echo $data['profit']; ?>" required="">
                                  </div>
                              </div>

                              <div>
                                 <input type="submit" name="simpan" value="Simpan" class="btn btn-primary m-t-15 waves-effect">

                                 
                              </div>


                          </form>
                      </div>
                  </div>
              </div>
          </div>


<?php


      if (isset($_POST['simpan'])) {
          $barcode = $_POST['kode'];
          $nama = $_POST['nama'];
          $satuan = $_POST['satuan'];
          $stok = $_POST['stok'];
          $beli = $_POST['beli'];
          $jual = $_POST['jual'];
          $profit = $_POST['profit'];

          $sql = $koneksi->query("update  tb_barang2 set kode_barang='$barcode', nama_barang='$nama', satuan='$satuan', stok='$stok', harga_beli='$beli', harga_jual='$jual', profit='$profit' where kode_barang='$id'");

          if ($sql) {

            ?>
              <script>
                  alert("Data Barang Berhasil diubah  <?php echo $kode; ?>");
                  window.location.href="?page=barang";
              </script>

            <?php
          }

      }

 ?>
