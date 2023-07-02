<div class="row">
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box" style="background-color: #D7A86E;">
            <div class="inner">
                <h3><?= $tot_suratmasuk ?></h3>
                <h4>Surat Masuk</h4>
            </div>
            <div class="icon">
                <i class="fa fa-envelope"></i>
            </div>
            <a href="<?= base_url('suratmasuk') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box" style="background-color: #D7A86E;">
                <div class="inner">
                    <h3><?= $tot_suratkeluar ?></h3>
                    <h4>Surat Keluar</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-envelope-o"></i>
                </div>
                <a href="<?= base_url('suratkeluar') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <!-- small box -->
                <div class="small-box" style="background-color: #D7A86E;">
                    <div class="inner">
                        <h3><?= $tot_kategori ?></h3>
                        <h4>Kategori</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="<?= base_url('kategori') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <?php if (session()->get('level') == 1) { ?>
                <div class="row">
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #D7A86E;">
                            <div class="inner">
                                <h3><?= $tot_user ?></h3>
                                <h4>User</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?= base_url('user') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php } ?>