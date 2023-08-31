<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="header">
   <h2>
      Tambah Pembelian
   </h2>
</div>
<div class="body">
<form method="POST">
   <label for="">No Faktur</label>
   <div class="form-group">
      <div class="form-line">
         <input type="text" name="nofaktur" class="form-control" />
      </div>
   </div>
   <label for="">Tanggal</label>
   <div class="form-group">
      <div class="form-line">
         <input type="date" name="tanggal" class="form-control" />
      </div>
   </div>
   <label for="">Supplier</label>
   <div class="form-group">
      <div class="form-line">
         <select name="nama_supplier" id="nama_supplier" class="form-control" required="" >
            <option value="">-- Pilih Supplier --</option>
            <?php 
               $sql = $koneksi->query("select * from tb_supplier");
               
               while ($data = $sql->fetch_assoc()) {
                 echo '<option value="'.$data['nama_supplier'].'">'
                               .$data['nama_supplier'].'</option>';
               
               } ?>                                 
         </select>
      </div>
   </div>
   <label for="">Kode Barcode</label>
   <div class="form-group">
      <div class="form-line">
         <select name="kode_barcode" id="kode_barcode" class="form-control" required="" >
            <option value="">-- Pilih  --</option>
            <?php 
               $sql = $koneksi->query("select * from tb_barang");
               
               while ($data = $sql->fetch_assoc()) {
                 echo '<option value="'.$data['kode_barcode'].'">'
                               .$data['kode_barcode'].'</option>';
               
               } ?>                                 
         </select>
      </div>
   </div>
   <label for="">Jumlah Beli</label> 
   <div class="form-group">
      <div class="form-line">
         <input type="number" name="stok" class="form-control" />
      </div>
   </div>
   <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
</form>
<?php 
   if (isset($_POST['simpan'])) {
    $nofaktur = $_POST['nofaktur'];
    $tanggal = $_POST['tanggal'];
    $nama_supplier = $_POST['nama_supplier'];
    $kode_barcode = $_POST['kode_barcode'];
     $stok = $_POST['stok'];
   
   
   $sql = $koneksi->query("insert into tb_pembelian (nofaktur,tanggal,nama_supplier,kode_barcode,stok) values('$nofaktur','$tanggal','$nama_supplier','$kode_barcode','$stok')");
   
   
   $id = mysqli_insert_id($koneksi);
   $barang =  $koneksi->query("select * from tb_pembelian where id='$id'");
   
   
   while ($data_barang = $barang->fetch_assoc()) {
   
     $koneksi->query("UPDATE tb_barang SET stok=stok +'$data_barang[stok]' WHERE kode_barcode='$data_barang[kode_barcode]'");
   
   }
   
   if ($sql) {
    ?>
<script type="text/javascript">
   alert("Data Berhasil di Simpan");
   window.location.href="?page=pembelian";
</script>
<?php
   }
   }
   ?>