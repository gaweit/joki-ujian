<?php 

    $id = $_GET['id'];

    $sql = $koneksi->query("select * from tb_user where id='$id'");

    $data = $sql->fetch_assoc();

 ?>
         

          <!-- Vertical Layout -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              Ubah Pengguna
                          </h2>

                      </div>
                      <div class="body">
                          <form method="post" enctype="multipart/form-data">

                            <label for="kode">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" id="kode" value="<?php echo $data['user_id'] ?>" class="form-control" placeholder="Masukan Username" required="">
                                </div>
                            </div>

                              <label for="nama">Nama</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="nama" id="nama" value="<?php echo $data['nama'] ?>" class="form-control" placeholder="Masukan Nama " required="">
                                  </div>
                              </div>

                               <label for="email">Email</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="email" id="email" value="<?php echo $data['email'] ?>" class="form-control" placeholder="Masukan Email " required="">
                                  </div>
                              </div>

                              
                               <label for="alamat">Level</label>
                              <div class="form-group">
                                <div class="form-line">
                                    <select name="level" class="form-control show-tick">
                                        
                                        <option value="admin" <?php if ($data=='admin') {echo "selected";} ?>>Admin</option>
                                        <option value="kasir" <?php if ($data=='admin') {echo "selected";} ?>>Kasir</option>
                                        
                                    </select>
                                </div>
                              <br>

                              <div class="form-group">
                                  <label>Foto :</label>
                                  <img style="border-radius: 50%" src="images/<?php echo $data['foto'] ?>" width="75" height="75">
                              </div>

                              <label for="foto">Ganti Foto</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="file" name="foto" id="foto" class="form-control"  >
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
          $username = $_POST['username'];
          $nama = $_POST['nama'];
          $email = $_POST['email'];
          
          $level = $_POST['level'];

          $foto = $_FILES['foto']['name'];
          $lokasi = $_FILES['foto']['tmp_name'];

          if(!empty($lokasi)) {
          $upload =move_uploaded_file($lokasi, "images/".$foto);
          

          $sql = $koneksi->query("update tb_user set user_id='$username', nama='$nama', email='$email',  level='$level',  foto='$foto' where id='$id'");

          if ($sql) {

            ?>
              <script>
                  alert("Data Berhasil diubah  ");
                  window.location.href="?page=pengguna";
              </script>

            <?php
          }

          

        }else{


            $sql = $koneksi->query("update tb_user set user_id='$username', nama='$nama', email='$email',  level='$level' where id='$id'");

          if ($sql) {

            ?>
              <script>
                  alert("Data Berhasil diubah  ");
                  window.location.href="?page=pengguna";
              </script>

            <?php
          }

        }

      }

 ?>
