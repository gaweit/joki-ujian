<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Praktikan</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="#">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Data Praktikan</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Daftar Praktikan</a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="?page=praktikan&act=add" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-file-import"></i> Tambah Data</a>
            <a href="?page=praktikan&act=adds" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Input Data</a>
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
                  <th>Nama Praktikan</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tfoot>
                <tbody>
                  <?php
                  $no = 1;
                  $praktikan = mysqli_query($con, "SELECT * FROM tb_praktikan");
                  foreach ($praktikan as $a) { ?>
                    <tr>
                      <td><?= $no++; ?>.</td>

                      <td><?= $a['nim']; ?></td>
                      <td><?= $a['nama_praktikan']; ?></td>
                      <td><?php if ($a['status'] == 1) {
                            echo "<span class='badge badge-success'>Aktif</span>";
                          } else {
                            echo "<span class='badge badge-danger'>Off</span>";
                          } ?></td>
                      <td><img src="../assets/img/user/<?= $a['foto'] ?>" width="45" height="45"></td>
                      <td>
                        <a class="btn btn-info btn-sm" href="?page=praktikan&act=edit&id=<?= $a['id_praktikan'] ?>"><i class="far fa-edit"></i></a>
                        <a class="btn btn-secondary btn-sm" href="?page=praktikan&act=del&id=<?= $a['id_praktikan'] ?>" onclick="return konfirmasiHapus()"><i class="fa-solid fa-trash"></i></a>
                        </a>
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