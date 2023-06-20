<!-- Row -->
<div class="row">


<div class="col-md-4" style="margin-bottom: 10px">
    <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-primary">
    <i class="fa fa-plus"> </i> Tambah </a> 
</div>

<!-- Cetak Notifikasi -->
<div class="col-md-12">
<?php 
//Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo $this->session->flashdata('sukses');
	echo '</div>';

}

?>


</div>
  <!-- Buka java Tabel -->
            <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title"><?php echo $title ?></h4>
                        </div>
                        <div class="panel-body">

        <table id="data-table" class="table table-striped table-bordered">
        <thead>
         <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Username - level</th>
        <th>Keterangan</th>
        <th>status</th>
        <th width="15%">Action</th>
    </tr>
</thead>
<tbody>
<?php $i = 1; foreach($user as $user) { ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $user->nama ?></td>
        <td><?php echo $user->email ?></td>
        <td><?php echo $user->username ?> - <?php echo $user->akses_level ?></td>
        <td><?php echo $user->keterangan ?></td>
        <td>
            <?php
                if($user->aktif == "1"){ ?>
                    <?php echo '<span class="label label-success">online</span>' ?>
               <?php  }else{echo '<span class="label label-default">off line</span>';}  
               ?>
        </td>
        <td>
        <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>	
         
        <?php include('delete.php'); ?>
        </td>
</tr>
<?php $i++;} ?>
</tbody>
</table>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
    </div>
    <!-- end row -->

    <!-- #modal-dialog -->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Form Data Barang</h4>
                </div>
                <div class="modal-body">
                     <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-3">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Form Data Barang</h4>
                        </div>
                        <div class="panel-body">
                            <form action="https://seantheme.com/" method="POST">
                                <fieldset>
                                    <div class="form-group col-md-6">

                                         <label for="exampleInputEmail1">KodeBarang </label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">

                                        <label for="exampleInputEmail1"><b>Nama Barang</b></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">

                                         <label for="exampleInputEmail1"><b>Kelompok Barang</b></label>
                                        <select class="form-control" id="exampleInputPassword1" placeholder="">
                                            <option class="form-control" id="exampleInputPassword1" placeholder="">-->Pilih Kelompom Barang--></option>
                                        </select>
                                    </div>

                                     <div class="form-group col-md-6">

                                       <label for="exampleInputEmail1">Harga Satuan</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">


                                       <label for="exampleInputEmail1">Harga Lama</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                                    </div>
                <div class="modal-footer">
                     <a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
               <a href="javascript:;" class="btn btn-sm btn-success" data-dismiss="modal">Save</a>
                </div>

                    </div>
                    <!-- end panel -->

                </div>
                <!-- end col-6 -->   
            
            </div>
        </div>