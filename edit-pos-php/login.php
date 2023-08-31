<?php
	error_reporting(0);
    ob_start();
    session_start();
    include "koneksi/koneksi.php";
    
    if($_SESSION['admin'] || $_SESSION['Purchasing'] ){
        header("location:index.php");
    }else{
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Halaman Login PT. NANKEI ANUGERAH ABADI</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"> Login</a>
            <small style="font-size: 15px">PT. Nankei Anugerah Abadi</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Masukan Username dan Password  </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                           
                            <label for="rememberme"></label>
                        </div>
                        <div class="col-xs-4">
                            <input  type="submit" name="login" class="btn btn-block bg-pink waves-effect" value="Login"/>
                        </div>
                    </div>
                    
                </form>

                <?php
                            
                            
                            
                            $username = $_POST['username'];
                            $pass = $_POST['password'];
                            
                            $login = $_POST['login'];
                            
                            if($login){
                                
                                $sql = $koneksi->query("select * from tb_user where user_id='$username' and pass='$pass' and status='Aktif' ");
                                $ketemu = $sql->num_rows;
                                $data = $sql->fetch_assoc();
                                
                                
                                if($ketemu >=1){
                                    
                                    session_start();
                                    
                                    $_SESSION['username'] = $data ['user_id'];
                                    $_SESSION[pass] = $data [pass];
                                    $_SESSION[level] = $data [level];
                                    
                                    
                                    if($data['level'] == "admin"){
                                        $_SESSION['admin'] = $data[id];
                                        header("location:index.php");


                                     
                                    }else if($data['level']== "Purchasing"){
                                        $_SESSION['Purchasing'] = $data[id];
                                        header("location:index.php");
                                        
                                    }
                                } else{
                                            ?>
                                                <script type="text/javascript">
                                                    alert("Login Gagal Username dan Password Salah atau akun anda sudah di blokir.. Silahkan Hubungi Admin");
                                                </script>
                                            <?php
                                        }
                                
                            }
                            
                        ?>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>

<?php
    }
?>