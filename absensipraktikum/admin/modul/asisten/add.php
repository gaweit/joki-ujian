<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Import Data Asisten</h4>
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
        <a href="?page=asisten&act=add">Tambah Asisten</a>
      </li>
    </ul>
  </div>
  <div class="row">

    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex align-items-center ">
          <h3 class="h4">Import Data Asisten</h3>
        </div>
        <div class="card-body">
          <h1>Contoh Format Data</h1>
          <a href="modul/asisten/format.php" target="_blank">Unduh File Excel</a>
        </div>


        <div class=" card-body">
          <form action="?page=asisten&act=upload" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>File</label>
              <input type="file" name="data_asisten" id="file" class=form-control required>
            </div>

            <div class="form-group">
              <label>Mata Praktikum</label>
              <select name="praktikum" class="form-control">
                <option value="">- Pilih Praktikum-</option>
                <?php

                $query = "SELECT id_praktikum, nama_praktikum FROM tb_praktikum";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id_praktikum'] . '">' . $row['nama_praktikum'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <button name="upload" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Import</button>
              <a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
            </div>


          </form>

          <?php
          if (isset($_GET['upload'])) {
            if ($_GET['upload'] == "success") {
              echo "<h3>Data berhasil diupload!</h3>";
            } else {
              echo "<h3>Data gagal diupload!</h3>";
            }
          }
          ?>

        </div>
      </div>
    </div>
  </div>
</div>