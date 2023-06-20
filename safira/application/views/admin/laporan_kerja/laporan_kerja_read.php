<div class="row">
<!-- begin col-6 -->
    <div class="col-md-12">
<!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-4">
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
    <div class="table-responsive">
        <table class="table table-hover">
	    <tr><td>Tanggal Lapor</td><td><?php echo $tanggal_lapor; ?></td></tr>
	   
	    <tr><td>Url</td><td><a href="<?php echo $url; ?>"><?php echo $url; ?></a></td></tr>
	    <tr><td>Status Laporan</td><td><?php echo $status_laporan; ?></td></tr>
         <tr><td>File Laporan Kerja</td><td><iframe src="<?php echo base_url('file/laporan/'.$file_laporan) ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen style="width:100%; border:5px solid #eee; height:400px"></iframe></td></tr>
	    <tr><td></td><td><a href="<?php echo base_url('admin/laporan_kerja') ?>" class="btn btn-danger">Cancel</a></td></tr>
    </table>
            </div>
            </div>
            </div>
   </div>

</div>