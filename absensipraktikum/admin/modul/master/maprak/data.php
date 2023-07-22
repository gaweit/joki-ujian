<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Mata Praktikum</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="dashboard.php">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="?page=master&act=data">Data Umum</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="?page=master&act=data">Daftar Mata Praktikum</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <!-- datatables -->
            <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
            <script type="text/javascript" src="../datatables/datatables.js"></script>
            <table id="example" style="width:100%" class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>No. </th>
                  <th>Nama Praktikum</th>
                  <th>Minggu</th>
                  <th>Semester</th>
                  <th>Tingkat</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $maprak = mysqli_query($con, "SELECT * FROM tb_praktikum
                INNER JOIN tb_semester ON tb_praktikum.id_semester=tb_semester.id_semester
                ");
                foreach ($maprak as $k) { ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $k['nama_praktikum']; ?></td>
                    <td><?= $k['minggu']; ?></td>
                    <td><?= $k['semester']; ?></td>
                    <td><?= $k['tingkat']; ?></td>
                    <td>

                      <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?= $k['id_praktikum'] ?>"><i class="far fa-edit"></i> Edit</a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=del&id=<?= $k['id_praktikum'] ?>"><i class="fas fa-trash"></i> Del</a>

                      <!-- Modal -->
                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?= $k['id_praktikum'] ?>" class="modal fade" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Praktikum</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <form action="?page=master&act=data" method="post">
                                <div class="row">
                                  <div class="col-md-10">

                                    <div class="form-group">
                                      <label>Nama Praktikum</label>
                                      <input name="id" type="hidden" value="<?= $k['id_praktikum'] ?>">
                                      <input name="maprak" type="text" value="<?= $k['nama_praktikum'] ?>" class="form-control">

                                      <label>Minggu</label>
                                      <select name="minggu" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <option value='1'>Minggu 1</option>
                                        <option value='2'>Minggu 2</option>
                                      </select>

                                      <label>Semester</label>
                                      <select name="semester" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <option value='1'>Ganjil</option>
                                        <option value='2'>Genap</option>
                                      </select>

                                      <label>Tingkat</label>
                                      <select name="tingkat" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <option value='1'>Tingkat 1</option>
                                        <option value='2'>Tingkat 2</option>
                                        <option value='3'>Tingkat 3</option>
                                        <option value='4'>Tingkat 4</option>
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <button name="edit" class="btn btn-primary" type="submit">Edit</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <?php
                              if (isset($_POST['edit'])) {
                                $save = mysqli_query($con, "UPDATE tb_praktikum SET nama_praktikum='$_POST[maprak]', minggu='$_POST[minggu]', id_semester='$_POST[semester]', tingkat='$_POST[tingkat]'   WHERE id_praktikum='$_POST[id]' ");
                                if ($save) {
                                  echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=data';
                        </script>";
                                }
                              }

                              ?>


                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->



                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <script>
              $(document).ready(function() {
                $('#example').DataTable();
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Tambah Praktikum</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form action="?page=master&act=data" method="post" class="form-horizontal">
          <div class="form-group">
            <label>Nama Praktikum</label>
            <input name="praktikum" type="text" placeholder="" class="form-control">
          </div>

          <div class="form-group">
            <label>Minggu</label>
            <select name="minggu" class="form-control">
              <option value="">- Pilih -</option>
              <option value='1'>Minggu Pertama</option>;
              <option value='2'>Minggu Ke-dua</option>;
            </select>
          </div>

          <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
              <option value="">- Pilih -</option>
              <option value='1'>Ganjil</option>;
              <option value='2'>Genap</option>;
            </select>
          </div>

          <div class="form-group">
            <label>Tingkat</label>
            <select name="tingkat" class="form-control">
              <option value="">- Pilih -</option>
              <option value='1'>1</option>;
              <option value='2'>2</option>;
              <option value='3'>3</option>;
              <option value='4'>4</option>;
            </select>
          </div>

          <div class="form-group">
            <button name="save" class="btn btn-primary" type="submit">Save</button>
          </div>
        </form>

        <?php
        if (isset($_POST['save'])) {
          $save = mysqli_query($con, "INSERT INTO tb_praktikum VALUES(NULL,'$_POST[praktikum]','$_POST[minggu]','$_POST[semester]','$_POST[tingkat]') ");
          if ($save) {
            echo "<script>
              alert('Data tersimpan !');
              window.location='?page=master&act=data';
              </script>";
          }
        }

        ?>


      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->