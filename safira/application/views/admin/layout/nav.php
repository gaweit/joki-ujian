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
            <li class="nav-header">Navigation</li>
            <li class="has-sub active">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?php echo base_url('admin/dasbor') ?>">Dashboard</a></li>
                </ul>
            </li>


            <?php if ($this->session->userdata('akses_level') != "Admin") {  ?>

            <?php } else { ?>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-database bg-gradient-red"></i>
                    <span>Data Master</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url('admin/bidang') ?>">Data Gejala</a></li>
                </ul>
            </li>
            <?php } ?>




            <?php if ($this->session->userdata('akses_level') != "Admin") {  ?>

            <?php } else { ?>
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-user bg-blue"></i>
                    <span>User/Admin</span></a></li>
            <?php } ?>

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