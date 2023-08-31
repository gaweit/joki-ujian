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




          <!-- Vertical Layout -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              Tambah Barang
                          </h2>

                      </div>
                      <div class="body">
                          <form method="post">

                            <label for="kode">Kode Barang</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="kode" id="kode"  class="form-control"  >
                                </div>
                            </div>

                          


                              <label for="nama">Nama Barang</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Barang" required="">
                                  </div>
                              </div>


                               <label for="alamat">Satuan</label>
                              <div class="form-group">
                                <div class="form-line">
                                    <select name="satuan" class="form-control show-tick">
                                        <option value="">-- Pilih Satuan --</option>
                                        <option value="Lusin">Lusin</option>
                                        <option value="PCS">PCS</option>
                                        <option value="Pack">Pack</option>
                                    </select>
                                </div>
                              <br>
                              

                              <label for="stok">Stok</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="stok" id="stok" class="form-control" required="">
                                  </div>
                              </div>

                              <label for="beli">Harga Beli</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="beli" id="harga_beli" onkeyup="sum();" class="form-control" required="">
                                  </div>
                              </div>

                              <label for="jual">Harga Jual</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="jual" id="harga_jual" onkeyup="sum();" class="form-control" required="">
                                  </div>
                              </div>

                              <label for="profit">Profit</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="profit" value="0" readonly="" id="profit" style="background-color: #e7e3e9;" class="form-control" required="">
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
          $kode = $_POST['kode'];
          
          $nama = $_POST['nama'];
          $satuan = $_POST['satuan'];
          $stok = $_POST['stok'];
          $beli = $_POST['beli'];
          $jual = $_POST['jual'];
          $profit = $_POST['profit'];

          $sql = $koneksi->query("insert into tb_barang2 values('$kode', '$nama','$satuan','$beli', '$stok', '$jual', '$profit')");

          if ($sql) {

            ?>
              <script>
                  alert("Data Barang Berhasil disimpan  <?php echo $kode; ?>");
                  window.location.href="?page=barang";
              </script>

            <?php
          }

      }

 ?>
