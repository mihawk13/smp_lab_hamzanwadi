<?php
session_start();
if ($_SESSION) {
  if ($_SESSION['level'] == 'admin') {
    header("Location: admin/index.php");
  }
  if ($_SESSION['level'] == 'guru') {
    header("Location: guru/index.php");
  }
  if ($_SESSION['level'] == 'siswa') {
    header("Location: siswa/index.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/green.css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/login.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

<div class="container" style="border-radius: 15px; margin-top: 150px">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <h1 class="text-center" style="color: #ffffff;">Halaman Login</h1>
      <div class="account-wall">
        <img class="profile-img" src="dist/img/img.png" sizes="120" alt="">
        <form class="form-signin" method="post" action="plogin.php">
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
            Login</button>
        </form>
        <div class="col-sm-6 col-md-12 col-lg-12"><label class="control-label"><small>Copyright <?= date('Y') ?> SMP Laboratorium Hamzanwadi Pancor</small></label></div>
      </div>
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="dist/js/scripts.js"></script>
<script src="bower_components/jquery//dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="dist/js/scripts.js"></script>
<script src="dist/js/jquery.backstretch.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>

</html>