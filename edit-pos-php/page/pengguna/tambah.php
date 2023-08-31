

          <!-- Vertical Layout -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              Tambah Pengguna
                          </h2>

                      </div>
                      <div class="body">
                          <form method="post" enctype="multipart/form-data">

                            <label for="kode">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" id="kode" class="form-control" placeholder="Masukan Username" required="">
                                </div>
                            </div>

                              <label for="nama">Nama</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama " required="">
                                  </div>
                              </div>

                               <label for="email">Email</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email " required="">
                                  </div>
                              </div>

                              <label for="alamat">Password</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="password" name="password" id="alamat" class="form-control"  required="">
                                  </div>
                              </div>

                               <label for="alamat">Level</label>
                              <div class="form-group">
                                <div class="form-line">
                                    <select name="level" class="form-control show-tick">
                                        <option value="">-- Pilih Level --</option>
                                        <option value="admin">Admin</option>
                                        <option value="Purchasing">Purchasing</option>
                                        <option value="Finance">finance</option>
                                    </select>
                                </div>
                              <br>

                              <label for="foto">Foto</label>
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
          $password = $_POST['password'];
          $level = $_POST['level'];

          $foto = $_FILES['foto']['name'];
          $lokasi = $_FILES['foto']['tmp_name'];
          $upload =move_uploaded_file($lokasi, "images/".$foto);
          
          if ($upload) {
            

          $sql = $koneksi->query("insert into tb_user(user_id, nama, email, pass, level, status, foto) values('$username', '$nama', '$email', '$password', '$level', 'Aktif', '$foto')");

          if ($sql) {

            ?>
              <script>
                  alert("Data Berhasil disimpan  ");
                  window.location.href="?page=pengguna";
              </script>

            <?php
          }

        }

      }

 ?>
