
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v3.0/admin/apple/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Apr 2018 09:10:04 GMT -->
<head>
  <meta charset="utf-8" />
  <title><?php echo $title ?></title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  
      <link href="<?php echo base_url() ?>assets/img/logo.png" rel="icon">
  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="<?php echo base_url()?>assets/css/jquery-ui.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/color-admin-v3.0/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/color-admin-v3.0/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/animate.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/style.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/style-responsive.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/default.css" rel="stylesheet" id="theme" />

      <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" />
      <link href="<?php echo base_url()?>assets/css/demo.css" rel="stylesheet" />


  <!-- ================== END BASE CSS STYLE ================== -->
  
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="<?php echo base_url()?>assets/js/pace.min.js"></script>
  <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">


  <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
      <!-- begin container-fluid -->
      <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
<!--         <div class="navbar-header">
          <img src="assets/img/PDAM.png">
        </div> -->
        <!-- end mobile sidebar expand / collapse button -->
        
        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
          <li>
            <form class="navbar-form right-content">
                <h3 style="color: green"><marquee><b>APLIKASI PERMINTAAN BARANG</b></marquee></h3>
            </form>
          </li>
    
        </ul>
        <!-- end header navigation right -->
      </div>
      <!-- end container-fluid -->
    </div>
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade in"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="fade">
      <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
            <div class="col-md-12">
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                    
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                          <div class="item active">
                            <img src="<?php echo base_url('assets/img/gedung2.jpg') ?>" alt="Los Angeles" style="width:100%; height: 500px;">
                          </div>
                    
                          <div class="item">
                            <img src="<?php echo base_url('assets/img/gedung.jpg') ?>" alt="Chicago" style="width:100%; height: 500px;">
                          </div>
                        
                          <div class="item">
                            <img src="<?php echo base_url('assets/img/gedung2.jpg') ?>" alt="New york" style="width:100%; height: 500px;">
                          </div>
                        </div>
                    
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                      <br>
                    <div >
                                            


                    </div>
                </div>


            </div>

            

            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand" style="padding-top: 20px">
                      <a href="<?php echo base_url('admin/dasbor') ?>" class="brand"><span class="brand-logo"><img src="<?php echo base_url() ?>/assets/img/logo1.png"></span></a>
                    </div>

                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                  <?php 
                    //Notifikasi kalau ada input error
                    echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

                    //Notifikasi
                    if($this->session->flashdata('sukses')) {
                      echo '<div class="alert alert-success"> <i class="fa fa-check"> </i>';
                      echo $this->session->flashdata('sukses');
                      echo '</div>';
                    }

                    ?>
                    <form action="<?php echo base_url('login') ?>" role="form" method="post" class="margin-bottom-0">
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" placeholder="Username" name="username" />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control input-lg"  placeholder="Password" name="password" />
                        </div>
<!--                         <div class="checkbox m-b-30">
                            <label>
                                <input type="checkbox" /> Remember Me
                            </label>
                        </div> -->
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Masuk</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            <!-- Not a member yet? Click <a href="register_v3.html">here</a> to register. -->
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy; PDAM 2018
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="ion-ios-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-blue" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-green" data-theme="green" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="ion-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
  </div>
  <!-- end page container -->
  
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="<?php echo base_url()?>assets/js/jquery-1.9.1.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-migrate-1.1.0.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
    <script src="assets/crossbrowserjs/html5shiv.js"></script>
    <script src="assets/crossbrowserjs/respond.min.js"></script>
    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
  <![endif]-->
  <script src="<?php echo base_url()?>assets/js/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.cookie.js"></script>
  <!-- ================== END BASE JS ================== -->
  
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="<?php echo base_url()?>assets/js/apps.min.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

  <script>
    $(document).ready(function() {
      App.init();
    });
  </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53034621-1', 'auto');
  ga('send', 'pageview');

</script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v3.0/admin/apple/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Apr 2018 09:10:04 GMT -->
</html>
