<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse" style="background-color: #A64B2A;">
    <ul class="nav navbar-nav">
        <li class="active"></li>

        <?php if (session()->get('level') == 1) { ?>
            <li><a href="<?= base_url('home') ?>">Home</a></li>
            <li><a href="<?= base_url('kategori') ?>">Kategori</a></li>
            <li><a href="<?= base_url('suratmasuk') ?>">Surat Masuk</a></li>
            <li><a href="<?= base_url('suratkeluar') ?>">Surat Keluar</a></li>
            <li><a href="<?= base_url('user') ?>">User</a></li>
        <?php } ?>

        <?php if (session()->get('level') == 2) { ?>
            <li><a href="<?= base_url('home') ?>">Home</a></li>
            <li><a href="<?= base_url('kategori') ?>">Kategori</a></li>
            <li><a href="<?= base_url('suratmasuk') ?>">Surat Masuk</a></li>
            <li><a href="<?= base_url('suratkeluar') ?>">Surat Keluar</a></li>
        <?php } ?>
    </ul>
</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= session()->get('nama') ?></span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header" style="background-color: #A64B2A;">
                    <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">

                    <p>
                        <?= session()->get('nama') ?> - <?php if (session()->get('level') == 1) {
                                                            echo 'admin';
                                                        } else {
                                                            echo 'user';
                                                        } ?>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer" style="background-color: #8E3200;">
                    <div class="text-center">
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>E-Arsip</a> Desa Pineleng Dua Indah</li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">