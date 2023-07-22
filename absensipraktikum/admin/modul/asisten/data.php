<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Asisten</h4>
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
        <a href="?page=asisten">Data Asisten</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="?page=asisten">Daftar Asisten</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="?page=asisten&act=add" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-import"></i> Import Data</a>
            <a href="?page=asisten&act=adds" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Input Data</a>
          </div>
          <div class="card-body">
            <!-- datatables -->
            <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
            <script type="text/javascript" src="../datatables/datatables.js"></script>

            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama Asisten</th>
                  <th>Praktikum diambil</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tfoot>
                <tbody>
                  <?php
                  $no = 1;
                  $asisten = mysqli_query($con, "SELECT * FROM tb_asisten
                  INNER JOIN tb_praktikum ON tb_asisten.id_praktikum=tb_praktikum.id_praktikum");
                  foreach ($asisten as $a) { ?>
                    <tr>
                      <td><?= $no++; ?>.</td>

                      <td><?= $a['nim']; ?></td>
                      <td><?= $a['nama_asisten']; ?></td>
                      <td><?= $a['nama_praktikum']; ?></td>
                      <td><?php if ($a['status'] == 'Y') {
                            echo "<span class='badge badge-success'>Aktif</span>";
                          } else {
                            echo "<span class='badge badge-danger'>Off</span>";
                          } ?>

                      </td>



                      <td><img src="../assets/img/user/<?= $a['foto'] ?>" width="45" height="45"></td>
                      <td>
                        <a class="btn btn-info btn-sm" href="?page=asisten&act=edit&id=<?= $a['id_asisten'] ?>"><i class="far fa-edit"></i></a>
                        <?php
                        if ($a['status'] == 'N') {
                        ?>
                          <a onclick="return confirm('Yakin Aktifkan Asisten  ??')" href="?page=asisten&act=set_asisten&id=<?= $a['id_asisten'] ?>&status=Y" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i></a>
                        <?php

                        } else {
                        ?>
                          <a onclick="return confirm('Yakin NonAktifkan Asisten  ??')" href="?page=asisten&act=set_asisten&id=<?= $a['id_asisten'] ?>&status=N" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i></a>
                        <?php
                        } ?>
                        <a class="btn btn-secondary btn-sm" href="?page=asisten&act=del&id=<?= $a['id_asisten'] ?>" onclick="return konfirmasiHapus()"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <script>
              $(document).ready(function() {
                $('#example').DataTable();
              });

              function konfirmasiHapus() {
                return confirm("Apakah Anda yakin ingin menghapus data ini?");
              }
            </script>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>