<?php
//dapatkan id_user yang di daftarkan saat login
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);

?>
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile" style="margin-top: 23px;">
                <div class="info">
                    Admin
                    <small style="color: white;"><i class="fa fa-circle text-success"></i>
                        <?php echo $user_aktif->nama ?> <i>(<?php echo $user_aktif->akses_level ?>)</i></small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav" style="padding-top: 20px">
            <li><a href="<?php echo base_url('admin/dasbor') ?>">
                    <i class="fa fa-dashboard bg-blue "></i>Dashboard</a>
            </li>
            <!-- menu admin -->
            <?php if ($this->session->userdata('akses_level') != "Admin") {  ?>
            <?php } else { ?>

            <li class="nav-header">Manajemen Konten</li>
            <li>
                <a href="<?php echo base_url('admin/materi') ?>">
                    <i class="fa fa-snowflake-o bg-yellow "></i>
                    <span>Data Materi</span>
                </a>
            </li>

            <!-- ==== -->
            <li class="nav-header">Manajemen Akun</li>
            <!-- ==== -->
            <li>
                <a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-user bg-gray"></i>
                    <span>Akun Admin</span>
                </a>
            </li>
            <?php } ?>
            <!-- menu admin -->

            <!-- Menu Peserta -->
            <?php if ($this->session->userdata('akses_level') != "Peserta") {  ?>
            <?php } else { ?>

            <!-- isi menu untuk akses selain admin  -->

            <?php } ?>
            <!-- Menu Peserta -->

            <li><a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-power-off bg-pink"></i> <span>Log
                        Out</span></a></li>


            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                        class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active"><?php echo $title ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo $title ?><small></small></h1>
    <!-- end page-header -->