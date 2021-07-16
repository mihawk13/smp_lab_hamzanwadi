<?php
session_start();
include '../conn/koneksi.php';
if ($_SESSION['level'] != "guru") {
  header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Guru | SMP Lab Hamzanwadi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!--   <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
  <!--  <link href="../vendor/datatables/dataTables.bootstrap4.css"> -->
  <link href="../vendor/datatables/jquery.dataTables.min.css">
  <link href="../vendor/datatables/buttons.dataTables.min.css">

  <link href="../dist/css/styles.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <p>Guru</p>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Guru</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->
            <?php
            $sql = "SELECT dtguru.id_guru, dtguru.nip, dtguru.nama_guru, dtguru.alamat, dtguru.status , users.username FROM dtguru INNER JOIN users ON dtguru.id_pengguna = '" . $_SESSION['akun_id'] . "'";
            $query = mysqli_query($koneksi, $sql);
            if ($data = mysqli_fetch_array($query)) {
            ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">Selamat Datang &nbsp;<small><?php echo "$data[nama_guru]"; ?></small></span>
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>Anda berhasil login sebagai <?php echo "$_SESSION[level]"; ?> </p>
                    <p>
                    <?php
                    $_SESSION['id_guru'] = $data['id_guru'];
                    echo "NIP  : $data[nip] <br>";
                    echo "Nama : $data[nama_guru] <br>";
                    echo "Alamat :$data[alamat] <br>";
                  }
                    ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
          </ul>
        </div>
      </nav>
    </header>
    <?php
    include('sidebar.html');
    ?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

    <!--   <div class="control-sidebar-bg"></div> -->

    <!-- ./wrapper -->
    <div class="content-wrapper" style="background-image: url(../dist/img/images1.jpg); background-size: 100%; background-repeat: repeat fixed;">
      <!-- Content Header (Page header) -->
      <?php

      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = "";
      }
      if ($page == "") {
        include('dashboard.php');
      } else if ($page == "viewData") {
        include('guru_tampil.html');
      } else if ($page == "editData") {
        include('guru_edit.html');
      } else if ($page == "viewNilai") {
        include('nilai_tampil.html');
      } else if ($page == "inputNilai") {
        include('nilai_input.html');
      } else if ($page == "nilai") {
        include('nilai.html');
      } else {
        echo "Page Not Found!!";
      }

      ?>
    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; <?= date('Y') ?> <a href="">SMP Laboratorium Hamzanwadi Pancor</a>.</strong> All rights
      reserved.
    </footer>
  </div>
  <!-- Content Wrapper. Contains page content -->
  <!-- /.content-wrapper -->


  <!-- jQuery 3 -->
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../bower_components/raphael/raphael.min.js"></script>
  <script src="../bower_components/morris.js/morris.min.js"></script>
  <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="../bower_components/moment/min/moment.min.js"></script>
  <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../bower_components/fastclick/lib/fastclick.js"></script>
  <script src="../dist/js/adminlte.min.js"></script>
  <script src="../dist/js/pages/dashboard.js"></script>
  <script src="../dist/js/demo.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="../dist/js/sb-admin-datatables.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.min.js "></script>
  <script src="../vendor/datatables/jquery-3.3.1.js"></script>
  <script src="../vendor/datatables/buttons.html5.min.js"></script>
  <script src="../vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="../vendor/datatables/buttons.flash.min.js"></script>
  <script src="../vendor/datatables/pdfmake.min.js"></script>
  <script src="../vendor/datatables/jszip.min.js"></script>
  <script src="../vendor/datatables/vfs_fonts.min.js"></script>
  <!-- CustomJS -->
  <script type="text/javascript" src="data_nilai.js"></script>
  <script type="text/javascript" src="rata_rata.js"></script>
  <script type="text/javascript" src="nilai.js"></script>
  <script type="text/javascript" src="../vendor/datatables/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/buttons.html5.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/buttons.flash.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/pdfmake.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/jszip.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/vfs_fonts.js"></script>
</body>

</html>