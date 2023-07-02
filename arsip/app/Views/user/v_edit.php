<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-primary box-solid" style="border-color: #A64B2A;">
            <div class="box-header with-border" style="background: #A64B2A;">
                <h3 class="box-title">Edit User</h3>


                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <h4>Ada Kesalahan</h4>
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php echo form_open_multipart('user/update/' . $user['id_user']); ?>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" value="<?= $user['nama'] ?>" class="form-control" placeholder="Nama">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Username">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?= $user['password'] ?>" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control" placeholder="level">
                        <option value="<?= $user['level'] ?>"><?php if ($user['level'] == 1) {
                                                                    echo 'admin';
                                                                } else {
                                                                    echo 'user';
                                                                } ?></option>
                        <option value="1">admin</option>
                        <option value="2">user</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Foto User</label>
                        <img src="<?= base_url('foto/' . $user['foto']) ?>" width="100px">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Ganti Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('user') ?>" class="btn btn-success">Back</a>
                </div>

                <?php echo form_close() ?>


            </div>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-3">
    </div>
</div>