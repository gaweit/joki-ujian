<?php 

$kd_pjl= $_GET['invoice']; 

?>

<div class="body">
    <form  method="POST" >
    
 
        <div class="row clearfix">

            <div class="col-sm-2">
                <div class="form-group">
                  <div class="form-line">
                      <input type="text" name="invoice" readonly="" class="form-control" style="background-color: #e7e3e9;" value="<?php echo $_GET['invoice']; ?>" />
                  </div>


               
              </div>
           </div>   

           <div class="col-sm-1">

            
             <a data-toggle="modal" data-target="#modal-default" class= "btn btn-info waves-effect"> <i class="material-icons">search</i>  Cari</a>

        </div>

            <div class="col-sm-4">
                
                 <input type="text" name="kode"  class="form-control" required="" id="kode"  autocomplete="off" placeholder="Kode Barang/Barcode">

                <br> <br> 
                
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                  <div class="form-line">
                      <input type="number" name="jumlah" placeholder="Jumlah Barang" class="form-control" required="">
                  </div>


                <div>
                    <input type="submit" name="simpan" value="Tambahkan"  class="btn btn-primary m-t-15 waves-effect">
                </div>
              </div>

            </div>

           
            </div> 
        </div>
    </form> 
</div>

<?php 

    if (isset($_POST['simpan'])) {

        $tgl_jual = date("Y-m-d");
        $barcode = $_POST['kode'];
        $jumlah = $_POST['jumlah'];
        $kode_pj = $_POST['invoice'];

         $sql_barang2 = $koneksi->query("select * from tb_barang2 where kode_barang = '$barcode'");
         $data_barang2=$sql_barang2->fetch_assoc();

        $harga_beli       = $data_barang2['harga_beli'];
        $total = $jumlah * $harga_beli;


        $sql_barang = $koneksi->query("select * from tb_barang2 where kode_barang = '$barcode'");
        while ($data_barang = $sql_barang->fetch_assoc()) {
            $sisa = $data_barang['stok'];

            if ($sisa == 0) {
                ?>
                    <script type="text/javascript">
                        alert("Stok Barang Habis, Transaksi Tidak Dapat Dilakukan, Silakan Tambah Stok Barang Terlebih Dahulu ");
                        window.location.href="?page=retur&invoice=<?php echo $_GET['invoice']; ?>";
                    </script>
                <?php
            }else{


                 if ($jumlah > $sisa) {
                ?>
                    <script type="text/javascript">
                        alert("Jumlah Melebihi Stok, Silakan Input Ulang");
                        window.location.href="?page=retur&invoice=<?php echo $_GET['invoice']; ?>";
                    </script>
                <?php
            }else{
        



        $sql = $koneksi->query("insert into tb_retur (kode_retur, kode_barang, jumlah,  harga,  total, tgl_retur) values('$kode_pj', '$barcode', '$jumlah', '$harga_beli', '$total',  '$tgl_jual')");

  }

  }

  }

    }

 ?>
                   
           

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Data Retur
                               
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">

                        <form method="POST">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th style="text-align: right;">Total </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                    $no = 1;
                                    $sql = $koneksi->query("select * from tb_retur, tb_barang2 where tb_retur.kode_barang=tb_barang2.kode_barang and kode_retur='$kd_pjl'");
                                    while ($data=$sql->fetch_assoc()) {
                                        
                                   

                                 ?>

                                    <tr>
                                        <th><?php echo $no++; ?></th>
                                       
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['harga']; ?></td>
                                        <td><?php echo $data['jumlah']; ?></td>
                                        <td align="right"><?php echo "Rp." .number_format( $data['total']); ?>,-</td>
                                        <td>
                                            <a onclick="return confirm('Yakin Akan Membatalkan Belanjaan ini...???') "  href="?page=retur&aksi=hapus&id=<?php echo $data['id'];?>&kd_pb=<?php echo $data['kode_retur']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&jumlah=<?php echo $data['jumlah']; ?>" class= "btn btn-danger waves-effect"><i class="material-icons">clear </i> Cancel</a>
                                        </td>
                                    </tr>

                                 <?php  

                                    $total_bayar = $total_bayar+$data['total'];
                                    } 


                                 ?>   
                                    
                                </tbody>

                                    <tr>
                                        <th style="text-align: right; font-size: 17px;" colspan="5">Total</th>
                                        <td style="text-align: right;"><b> <input type="text" name="total_bayar" id="total_bayar"  onkeyup="sum();" style="font-size: 14px; text-align: right; background-color: #e7e3e9;" value="<?php echo $total_bayar ?>" readonly="" > </b></td>
                                        <td><a href="" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal" target="blank">Cetak Struk</a></td>
                                    </tr>

                                   <tr>

                                         <td>

                                            
                                            
                                            
                                        </td>
                                    </tr>

                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        

        
        
        
<script>
    function sum() {
          var total_bayar = document.getElementById('total_bayar').value;
          var bayar = document.getElementById('bayar').value;
          var result =parseInt(bayar) - parseInt(total_bayar);
          if (!isNaN(result)) {
             document.getElementById('kembali').value = result;
          }
    }
</script>


<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Struk Retur</h4>
                        </div>


                        <div class="modal-body">

                        <table>
                            <tr>
                                <td>Toko JaJan Ria</td>
                            </tr>

                            <tr>
                                <td>Jalan Raya Perniagaan No 57 </td>
                            </tr> 

                        </table>

                            <table>
                                
                                    
                                    <br> 
                                    <?php 


                                               if($_SESSION['admin']){
                                                    $user_l=$_SESSION['admin'];
                                               
                                               }else if($_SESSION['kasir']){
                                                    $user_l=$_SESSION['kasir'];
                                               }
                                               
                                               
                                               $sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
                                               $data_u = $sql_u->fetch_assoc();
                                            

                                        $sql = $koneksi->query("select * from tb_retur where kode_retur='$kd_pjl'");
                                        $tampil2=$sql->fetch_assoc();

                                     ?>

                                     <tr>
                                        <td>No Retur &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp<?php echo $tampil2['kode_retur']; ?></td>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <td>Tanggal &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp <?php echo $tampil2['tgl_retur']; ?></td>
                                        <td></td>
                                    </tr>

                                     <tr>
                                        <td>Kasir &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp <?php echo $data_u['nama']; ?></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td><hr width="100%" color="red"></td>
                                    </tr>


                                    <?php 

                                        $sql = $koneksi->query("select * from tb_retur, tb_barang2 where tb_retur.kode_barang=tb_barang2.kode_barang and kode_retur='$kd_pjl'");
                                        
                                        while ($tampil=$sql->fetch_assoc()) {
                                               

                                     ?>

                                     

                                    <tr>
                                    
                                        
                                        <td><?php echo $tampil['nama_barang']; ?></td>
                                        <td><?php echo "Rp." .number_format($tampil['harga']).',-'.'&nbsp'.'&nbsp'.'X'.'&nbsp'.'&nbsp'.$tampil['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'; ?></td>

                                        
                                        
                                        <td><?php echo "Rp." .number_format($tampil['total']); ?>,-</td>
                                    </tr>

                                   <?php

                                       

                                        $total_bayar2 = $total_bayar2+$tampil['total'];

                                        } 

                                    ?> 

                                    <tr>
                                        <td><hr></td>
                                    </tr>

                                    <tr>
                                        <th  font-size: 17px;" colspan="2">Total</th>
                                        <td style="text-align: right;"><b> <?php echo "Rp." .number_format($total_bayar2); ?>,- </b></td>
                                    </tr>


                                   

                                     <tr>
                                        <td><hr></td>
                                    </tr>

                                    
                               
                            </table>

                           
                        </div>
                        <div class="modal-footer">
                            <a href="page/retur/cetak.php?invoice=<?php echo $kd_pjl; ?>&kasir=<?php echo $data_u['nama']; ?>" target="blank" class="btn btn-link waves-effect"><i class="material-icons">print </i>Cetak</a>

                              <a href="?page=pembelian&invoice=<?php echo "$finalcoder";?>"  class="btn btn-info waves-effect">Selesai</a>

                            
                        </div>
                    </div>
                </div>
            </div>


                           <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                 <center><h4 class="modal-title" id="myModalLabel">Pilih Barang</h4></center>
              </div>
              <div class="modal-body">
                <table class="table table-striped table-bordered table-hover" id="example1">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Harga Jual</th>
                                            
                                            
                                            
                                          
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            

                                            $sql = $koneksi->query("select * from tb_barang2");

                                            while ($r= $sql->fetch_assoc()) {





                                       echo"
                                            <tr style='cursor:pointer' class='pilih' data-kode='$r[kode_barang]'>
                                                
                                               
                                                <td>$r[kode_barang]</td>
                                                <td>$r[nama_barang]</td>
                                                <td>$r[stok]</td>
                                                <td>$r[harga_jual]</td>
                                               
                                            </tr> 
                     
                                            ";
                                        }
                                        ?>

                                    </table>     

              </div>
              
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
        


         <script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                
                
                document.getElementById("kode").value = $(this).attr('data-kode');
               
        
                $('#modal-default').modal('hide');
            });
            

//            tabel lookup mahasiswa
            $(function () {
                $("#lookup").dataTable();
            });
        </script> 
