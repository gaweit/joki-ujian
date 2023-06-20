<?php 
//Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//Opern Form
echo form_open(base_url('admin/user/tambah'));
?>

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                        data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                        data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                        data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                        data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"><?php echo $title ?></h4>
            </div>
            <br>
            <div class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6">

                        <label for="int">Karyawan</label>
                        <select name="id_karyawan" class="form-control js-example-basic-multiple"
                            onChange="get_data(this.value)">
                            <option>--Pilih--</option>
                            <?php foreach ($karyawan as $karyawan) { ?>

                            <option value="<?php echo $karyawan->id_karyawan ?>"
                                <?php if($karyawan->id_karyawan==$karyawan->id_karyawan){echo "selected"; } ?>>
                                <?php echo $karyawan->nama ?> <b>(<?php echo $karyawan->bagian_karyawan ?>)</b>
                            </option>
                            <?php } ?>
                        </select>

                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama"
                            value="<?php echo set_value('nama') ?>" required readonly>

                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="<?php echo set_value('email') ?>" required>

                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username"
                            value="<?php echo set_value('username') ?>" required>

                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            value="<?php echo set_value('password') ?>" required>
                    </div>


                    <div class="form-group col-md-6">

                        <label>Level Hak Akses</label>
                        <select name="akses_level" class="form-control" readonly>
                            <option value="Admin">Admin</option>
                        </select>

                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"
                            placeholder="Keterangan"><?php echo set_value('keterangan') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan Data">
                        <input type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">
                    </div>


                </form><br>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->
<?php 
//Form Close
echo form_close();
?>

<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<script type="text/javascript">
function get_data(id_karyawan) {
    $.ajax({
        url: "<?php echo base_url(); ?>admin/user/get_info/",
        data: {
            id_karyawan: id_karyawan
        },
        success: function(data) {
            var dt = JSON.parse(data);
            $("input[name=nama]").val(dt.nama);
            $("input[id=total_harga]").val(dt.total_harga);
            $("input[name=vol]").val(dt.vol);

        }
    });
}
</script>