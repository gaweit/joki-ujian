<?php $kd_pjl= $_GET['invoice']; ?>

 <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
    <form  method="POST" >
    
 
        <div class="row clearfix">
            <div class="col-sm-2">
                
                <input type="text" name="invoice" readonly="" class="form-control" style="background-color: #e7e3e9;" value="<?php echo $_GET['invoice']; ?>" />
            </div>


             <div class="col-sm-1">

            
             <a data-toggle="modal" data-target="#modal-default" class= "btn btn-info waves-effect"> <i class="material-icons">search</i>  Cari</a>

        </div>

           


            <div class="col-sm-4">
                <div class="form-group">
                  <div class="form-line">
                      <div class="form-line">
                      <input type="text" name="kode"  class="form-control" placeholder="Kode Barang/Barcode"  required="" id="kode"  autofocus="on"  autocomplete="off">
                  </div>
                  </div>

              </div>

            </div>

             




             <div class="col-sm-2">
                <div class="form-group">
                  <div class="form-line">
                      <div class="form-line">
                      <input type="number" name="jumlah" placeholder="Jumlah Barang"  class="form-control" required="">
                  </div>
                  </div>

              </div>

            </div>




            

            <div class="col-sm-2">
                
                 

                   <input type="submit" name="simpan" value="Tambahkan"  class="btn btn-primary">

              </div>

            </div>

            

                <div>
                   
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
         
         

         $sql_barang2 = $koneksi->query("select * from tb_barang2 where kode_barang = '$barcode'");
         $data_barang2=$sql_barang2->fetch_assoc();

         $harga_jual       = $data_barang2['harga_jual'];




        $jumlah = $_POST['jumlah'];
        $kode_pj = $_POST['invoice'];

        
        $total = $jumlah * $harga_jual;

        $sql_barang = $koneksi->query("select * from tb_barang2 where kode_barang = '$barcode'");
        while ($data_barang = $sql_barang->fetch_assoc()) {
            $sisa = $data_barang['stok'];

            if ($sisa == 0) {
                ?>
                    <script type="text/javascript">
                        alert("Stok Barang Habis, Transaksi Tidak Dapat Dilakukan, Silakan Tambah Stok Barang Terlebih Dahulu ");
                        window.location.href="?page=penjualan&invoice=<?php echo $_GET['invoice']; ?>";
                    </script>
                <?php
            }else{


                 if ($jumlah > $sisa) {
                ?>
                    <script type="text/javascript">
                        alert("Jumlah Melebihi Stok, Silakan Input Ulang");
                        window.location.href="?page=penjualan&invoice=<?php echo $_GET['invoice']; ?>";
                    </script>
                <?php
            }else{
        
         $sql_pj = $koneksi->query("select * from tb_penjualan2 where kode_penjualan = '$kode_pj' and kode_barang='$barcode'");
         while ($data_pj = $sql_pj->fetch_assoc()) {
         $kode_br = $data_pj['kode_barang'];
         $jumlah_br = $data_pj['jumlah'];
        $total_br = $data_pj['total'];
        $stok_br = $data_pj['stok'];
        $id_br = $data_pj['id'];

         }

         if ($kode_br == $barcode) {
            $sql = $koneksi->query("update tb_penjualan2 set jumlah=$jumlah_br+$jumlah where id='$id_br'");
            $sql = $koneksi->query("update tb_penjualan2 set total=$total_br+$total where id='$id_br'");
            $sql2 = $koneksi->query("update tb_barang2 set stok=(stok - $jumlah) where kode_barang='$barcode'");


         }else{


        $sql = $koneksi->query("insert into tb_penjualan2 (kode_penjualan,  kode_barang, jumlah, total, tanggal_penjualan) values('$kode_pj', '$barcode', '$jumlah', '$total', '$tgl_jual')");


       }

       }

    }
    }

    }

 ?>
         
     <form  method="POST">
         <div class="col-sm-2">

              
               
             </div>        


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Data Belanjaan
                               
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">

                        
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th></th>
                                        <th>Jumlah</th>
                                        <th style="text-align: right;">Total </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                    $no = 1;
                                    $sql = $koneksi->query("select * from tb_penjualan2, tb_barang2 where tb_penjualan2.kode_barang=tb_barang2.kode_barang and kode_penjualan='$kd_pjl'");
                                    while ($data=$sql->fetch_assoc()) {
                                      $jml_data=$sql->num_rows; 
                                        
                                   

                                 ?>

                                    <tr>
                                        <th><?php echo $no++; ?></th>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['harga_jual']; ?></td>
                                        <td>X</td>
                                        <td><?php echo $data['jumlah']; ?></td>
                                        <td align="right"><?php echo "Rp." .number_format( $data['total']); ?>,-</td>
                                        <td>

                                            <?php 

                                                $jumlah = $data['jumlah']; 
                                                $id = $data['id'];
                                                $kode_penjualan = $data['kode_penjualan'];
                                                $harga_jual = $data['harga_jual'];
                                                $kode_barang =  $data['kode_barang'];
                                                $stok = $data['stok'];

                                             ?>

                                             
                                            <a id="edit_masuk"  class= "btn btn-success waves-effect" data-toggle="modal" data-target="#smallModal" data-jumlah="<?php echo $data['jumlah']; ?>" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode_penjualan']; ?>" data-harga_jual="<?php echo $data['harga_jual']; ?>" data-kode_barang="<?php echo $data['kode_barang']; ?>" data-nama_barang="<?php echo $data['nama_barang']; ?>" ><i class="material-icons">edit </i> Ubah Jumlah</a> 

                                           
                                                

                                            <a onclick="return confirm('Yakin Akan Membatalkan Pembelian ini.?') "  href="?page=penjualan&aksi=hapus&id=<?php echo $data['id'];?>&kd_pj=<?php echo $data['kode_penjualan']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&jumlah=<?php echo $data['jumlah']; ?>" class= "btn btn-danger waves-effect"><i class="material-icons">clear </i> Cancel</a>


                                        </td>
                                    </tr>

                                 <?php  

                                    $total_bayar = $total_bayar+$data['total'];
                                    } 


                                 ?>  

                                 <?php 


                                     if($_SESSION['admin']){
                                                    $user_l=$_SESSION['admin'];
                                               
                                               }else if($_SESSION['kasir']){
                                                    $user_l=$_SESSION['kasir'];
                                               }
                                               
                                               
                                               $sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
                                               $data_u = $sql_u->fetch_assoc();

                                               $kasir= $data_u['nama'];

                                  ?> 
                                    
                                </tbody>

                                    <tr>
                                        <th style="text-align: right; font-size: 15px;" colspan="">Pelanggan : </th>
                                         <td style="text-align: right;"><b>  

                                                                    <select name="pelanggan" class="form-control show-tick" required="">
                                              <option value="">-Pilih Pelanggan</option>}
                                             
                                              
                                             
                                                  <?php

                                                     $query = $koneksi->query("SELECT * FROM tb_customer2 ORDER by id_customer");
                                                      
                                                      while ($pelanggan=$query->fetch_assoc()) {
                                                          echo "<option value='$pelanggan[id_customer]'>$pelanggan[nama]</option>";
                                                      }
                           
                                                  ?>


                                          </select> </b></td>
                                        <th style="text-align: right; font-size: 17px;" colspan="3">Total</th>
                                        <td style="text-align: right;"><b> <input type="text" name="total_bayar" id="total_bayar"  onkeyup="sum();" style="font-size: 14px; text-align: right; background-color: #e7e3e9;" value="<?php echo $total_bayar ?>" readonly="" > </b></td>
                                    </tr>

                                    <tr>
                                        <th style="text-align: right; font-size: 17px;" colspan="5"> Tunai</th>
                                        <td style="text-align: right;"><b> <input type="number" name="bayar"  id="bayar" autocomplete="off" onkeyup="sum();" required=""  style="font-size: 14px; text-align: right;"> </b></td>
                                    </tr>

                                     <tr>
                                        <th style="text-align: right; font-size: 17px;" colspan="5"> Kembali</th>
                                        <td style="text-align: right; "><b> <input type="number" name="kembali" id="kembali" required="" readonly="" autocomplete="off"  style="font-size: 14px; text-align: right;  background-color: #e7e3e9;"> </b></td>

                                          <?php 


                                              if ($jml_data >=1 ) {
                                                echo '


                                                         <td>

                                                          <input type="submit" name="simpan2" value="Cetak Struk"   class="btn btn-primary waves-effect m-r-20" >
                                                          
                                                         
                                                      </td>


                                                ' ;
                                              }

                                           ?>


                                      
                                    </tr>

                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
<?php 

    if (isset($_POST['simpan2'])) {
        
       $tunai = $_POST['bayar'];
       $kembali = $_POST['kembali'];

       $pelanggan = $_POST['pelanggan']; 

        $sql = $koneksi->query ("insert into tb_penjualan_tmp2 (kode_penjualan, bayar, kembali)values('$kd_pjl', '$tunai', '$kembali')");

        $sql = $koneksi->query ("update tb_penjualan2 set id_customer='$pelanggan', kasir='$kasir' where kode_penjualan='$_GET[invoice]'");


         if ($sql) {

            ?>
              <script>
                 window.open('page/penjualan/cetak.php?invoice=<?php echo $kode_penjualan; ?>','mywindow','width=600px, height=600px, left=300px;');
              </script>

            <?php
          }



           if ($sql) {

            ?>
              <script>
                
                  window.location.href="?page=penjualan&invoice=<?php echo "$finalcode";?>";
              </script>

            <?php
          }






    }

 ?>

 
        
        
        
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
                            <h4 class="modal-title" id="defaultModalLabel">Struk Belanjaan</h4>
                        </div>


                        <div class="modal-body">

                        <table>
                            <tr>
                                <td>Toko Jajan RIa</td>
                            </tr>

                            <tr>
                                <td> jalan perniagaan 57</td>
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

                                                             
                                        $sql = $koneksi->query("select * from tb_customer2 ,tb_penjualan2  where  
                                                 tb_customer2.id_customer=tb_penjualan2.id_customer 
                                                 and kode_penjualan='$kd_pjl'");
                                        $tampil2=$sql->fetch_assoc();

                                     ?>

                                     <tr>
                                        <td>No Penjualan &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp<?php echo $tampil2['kode_penjualan']; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Pelanggan &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp<?php echo $tampil2['nama']; ?></td>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <td>Tanggal &nbsp &nbsp</td>
                                        <td>: &nbsp &nbsp <?php echo $tampil2['tanggal_penjualan']; ?></td>
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

                                        $sql = $koneksi->query("select * from tb_penjualan2, tb_penjualan_tmp2, tb_barang2
                                                             where tb_penjualan2.kode_penjualan=tb_penjualan_tmp2.kode_penjualan
                                                             and tb_penjualan2.kode_barang=tb_barang2.kode_barang
                                                              and tb_penjualan2.kode_penjualan='$kd_pjl'");
                                        
                                        while ($tampil=$sql->fetch_assoc()) {
                                               

                                     ?>

                                     

                                    <tr>
                                    
                                        
                                        <td><?php echo $tampil['nama_barang']; ?></td>
                                        <td><?php echo "Rp." .number_format($tampil['harga_jual']).',-'.'&nbsp'.'&nbsp'.'X'.'&nbsp'.'&nbsp'.$tampil['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'; ?></td>

                                        
                                        
                                        <td><?php echo "Rp." .number_format($tampil['total']); ?>,-</td>
                                    </tr>

                                   <?php

                                        $bayar = $tampil['bayar']; 
                                        $kembali_byr = $tampil['kembali']; 

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
                                        <th  font-size: 17px;" colspan="2">Tunai</th>
                                        <td style="text-align: right;"><b> <?php echo "Rp." .number_format($bayar);?>,- </b></td>
                                    </tr>

                                     <tr>
                                        <td><hr></td>
                                    </tr>

                                    <tr>
                                        <th  font-size: 17px;" colspan="2">Kembali</th>
                                        <td style="text-align: right;"><b> <?php echo "Rp." .number_format($kembali_byr);?>,- </b></td>
                                    </tr>

                                     <tr>
                                        <td><hr></td>
                                    </tr>

                                    
                               
                            </table>

                            <table>
                                <tr>
                                    <td>Barang yang sudah dibeli tidak dapat dikembalikan</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <a href="page/penjualan/cetak.php?invoice=<?php echo $kd_pjl; ?>&kasir=<?php echo $data_u['nama']; ?>" target="blank" class="btn btn-link waves-effect"><i class="material-icons">print </i>Cetak</a>

                            <a href="?page=penjualan&invoice=<?php echo "$finalcode";?>"  class="btn btn-info waves-effect">Selesai</a>
                            
                        </div>
                    </div>
                </div>
            </div>



                           

                             


<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Ubah Jumlah</h4>
                        </div>


                        <div class="modal-body" id="modal_edit">

                         <form role="form" method="POST"  >


                            <label for="nama">Nama Barang</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text"  id="nama_barang"  class="form-control"  readonly="">
                                  </div>
                              </div>

                            <label for="nama">Jumlah</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="number" name="jumlah_baru"  id="jumlah"  class="form-control"  required="">
                                  </div>
                              </div>


                                       <input type="hidden" name="jumlah_baru2"  id="jumlah"  class="form-control"  required="">

                            
                              
                                      <input type="hidden" name="id"  id="id"  class="form-control"  required="">
                                  

                             
                              
                                      <input type="hidden" name="kode"  id="kode"  class="form-control"  required="">
                                 


                               
                             
                                      <input type="hidden" name="harga_jual"  id="harga_jual"  class="form-control"  required="">
                              
                                      <input type="hidden" name="kode_barang"  id="kode_barang"  class="form-control"  required="">
                                  

                              
                                    
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="simpan3" value="Simpan"  class="btn btn-primary waves-effect m-r-20">

                          
                                            
                           
                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>


             <script src="assets/js/jquery-1.10.2.js"></script>

                    <script type="text/javascript">
                        
                        $(document).on("click", "#edit_masuk", function(){
                            var jumlah = $(this).data('jumlah');
                            var id = $(this).data('id');
                            var kode = $(this).data('kode');
                            var harga_jual = $(this).data('harga_jual');
                            var kode_barang = $(this).data('kode_barang');
                            var nama_barang = $(this).data('nama_barang');



                             $("#modal_edit #jumlah").val(jumlah);


                            $("#modal_edit #id").val(id);
                            $("#modal_edit #kode").val(kode);
                            $("#modal_edit #harga_jual").val(harga_jual);
                            $("#modal_edit #kode_barang").val(kode_barang);
                            $("#modal_edit #nama_barang").val(nama_barang);
                          

                           
                            
                        })

                        

                    </script>


        <?php 

                if (isset($_POST['simpan3'])) {

                  $jumlah_baru2 = $_POST['jumlah_baru2'] ; 
                 $jumlah_baru = $_POST['jumlah_baru'] ;
                 $kode_barang_baru = $_POST['kode_barang'] ;

                  $sql2 = $koneksi->query("update tb_barang2 set stok=(stok+$jumlah_baru2) where kode_barang='$kode_barang_baru'");


                 $sql_barang = $koneksi->query("select * from tb_barang2 where kode_barang = '$kode_barang_baru'");
        while ($data_barang = $sql_barang->fetch_assoc()) {
            $sisa2 = $data_barang['stok'];
        }



                   if ($jumlah_baru > $sisa2) {

                    $sql2 = $koneksi->query("update tb_barang2 set stok=(stok-$jumlah_baru2) where kode_barang='$kode_barang_baru'"); 
                ?>
                    <script type="text/javascript">
                        alert("Jumlah Melebihi Stok, Silakan Input Ulang");
                        window.location.href="?page=penjualan&invoice=<?php echo $_GET['invoice']; ?>";
                    </script>
                <?php
            }else{

                  
                   $id_baru = $_POST['id'] ;
                   $kode_baru = $_POST['kode'] ;
                   $harga_jual_baru = $_POST['harga_jual'] ;
                  

                   $total_baru = $harga_jual_baru*$jumlah_baru;

                  
                   $sql2 = $koneksi->query("update tb_penjualan2 set jumlah='$jumlah_baru' where id='$id_baru'");

                   
                   $sql2 = $koneksi->query("update tb_penjualan2 set total='$total_baru' where id='$id_baru'");

                  
                   $sql2 = $koneksi->query("update tb_barang2 set stok=(stok-$jumlah_baru) where kode_barang='$kode_barang_baru'");


                   if ($sql2) {

                    ?>
                      <script>
                          
                          window.location.href="?page=penjualan&invoice=<?php echo $kode_baru; ?>";
                      </script>

                    <?php
                  }

              }
    
                }

         ?>





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



                            