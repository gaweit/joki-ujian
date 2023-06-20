<!-- Row -->
<div class="row">


<div class="col-md-4" style="margin-bottom: 10px">
    <a href="<?php echo base_url('admin/karyawan/create') ?>" class="btn btn-primary">
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
        <th>NIK</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>No Hp</th>
		<th>Bidang/Bagian</th>
		<th>Foto</th>
		<th>Action</th>
            </tr>

        </thead>
        <tbody>
        <?php
            foreach ($karyawan_data as $karyawan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $karyawan->NIK ?></td>
			<td><?php echo $karyawan->nama ?></td>
			<td><?php echo $karyawan->jenis_kelamin ?></td>
			<td><?php echo $karyawan->alamat ?></td>
			<td><?php echo $karyawan->no_hp ?></td>
			<td><?php echo $karyawan->bagian_karyawan ?></td>
			<td>
            <?php if($karyawan->foto != "") { ?>
            <img src="<?php echo base_url('gambar/thumb/'.$karyawan->foto) ?>" class="img img-thumbnail" width="60">
            <?php }else{echo 'Tidak ada';} ?>          
            </td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(base_url('admin/karyawan/read/'.$karyawan->id_karyawan),'<i class="btn btn-primary btn-s fa fa-eye" title="read"> </i>'); 
				echo '  '; 
				echo anchor(base_url('admin/karyawan/update/'.$karyawan->id_karyawan),'<i class="btn btn-warning btn-s fa fa-edit" title="Edit"> </i>'); 
				echo '  '; 
				echo anchor(base_url('admin/karyawan/delete/'.$karyawan->id_karyawan),'<i class="btn btn-danger btn-s fa fa-trash" title="Delete"> </i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end col-12 -->
</div>
<!-- end row -->