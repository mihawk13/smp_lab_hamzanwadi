<?php
session_start();
include('../conn/koneksi.php');
if ($_SESSION['level'] != "admin") {
  header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | SMP Lab Hamzanwadi</title>
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
  <!-- Custom styles for this template-->

  <link rel="stylesheet" type="text/css" href="../vendor/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../vendor/datatables/buttons.dataTables.min.css">

  <link href="../vendor/datatables/dataTables.bootstrap4.css">
  <link href="../dist/css/styles.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../dist/img/img.png" class="img-circle" width="20"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin </b></span>
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
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">Selamat Datang &nbsp;<small><?php echo $_SESSION['username']; ?></small></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <p>Anda berhasil login dengan detail sebagai berikut:</p>
                  <p>Username: <?php echo $_SESSION['username']; ?><br>
                    Level: <?php echo $_SESSION['level']; ?><br>
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

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = "";
      }
      if ($page == "") {
        include('dashboard.php');
      } else if ($page == "viewSiswa") {
        include('siswa_tampil.html');
      } else if ($page == "detailSiswa") {
        include('siswa_detail.html');
      } else if ($page == "addSiswa") {
        include('siswa_tambah.html');
      } else if ($page == "editSiswa") {
        include('siswa_edit.html');
      } else if ($page == "viewGuru") {
        include('guru_tampil.html');
      } else if ($page == "addGuru") {
        include('guru_tambah.html');
      } else if ($page == "editGuru") {
        include('guru_edit.html');
      } else if ($page == "viewKelas") {
        include('kelas_tampil.html');
      } else if ($page == "addKelas") {
        include('kelas_tambah.html');
      } else if ($page == "editKelas") {
        include('kelas_edit.html');
      } else if ($page == "viewKelasSiswa") {
        include('kelas_siswa_tampil.html');
      } else if ($page == "addKelasSiswa") {
        include('kelas_siswa_tambah.html');
      } else if ($page == "viewJadwal") {
        include('jadwal_tampil.html');
      } else if ($page == "inputJadwal") {
        include('jadwal_input.html');
        // }else if($page =="viewlaporan"){
        //   include('include/datanilai.html');
      } else if ($page == "viewTA") {
        include('tahun_ajaran_tampil.html');
      } else if ($page == "addTA") {
        include('tahun_ajaran_tambah.html');
      } else if ($page == "editTA") {
        include('tahun_ajaran_update.php');
      } else if ($page == "viewMapel") {
        include('mapel_tampil.html');
      } else if ($page == "addMapel") {
        include('mapel_tambah.html');
      } else if ($page == "editMapel") {
        include('mapel_edit.html');
      } else if ($page == "viewlaporan") {
        include('nilai_tampil.html');
      } else if ($page = "nilai") {
        include('nilai.php');
      } else {
        echo "Page Not Found!!";
      }
      // }
      ?>
    </div>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; <?= date('Y') ?> <a href="">SMP Laboratorium Hamzanwadi Pancor</a>.</strong> All rights
      reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

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
  <!-- Morris.js charts -->
  <!-- <script src="../bower_components/raphael/raphael.min.js"></script>
  <script src="../bower_components/morris.js/morris.min.js"></script> -->
  <!-- Sparkline -->
  <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <!-- <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
  <!-- jQuery Knob Chart -->
  <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../bower_components/moment/min/moment.min.js"></script>
  <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="../dist/js/pages/dashboard.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="../dist/js/demo.js"></script> -->

  <!-- Page level plugin JavaScript-->
  <script type="text/javascript" src="../vendor/datatables/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/buttons.html5.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/buttons.flash.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/pdfmake.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/jszip.min.js"></script>
  <script type="text/javascript" src="../vendor/datatables/vfs_fonts.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
          // {
          //     extend: 'pdfHtml5',
          //     orientation: 'landscape',
          //     pageSize: 'LEGAL'
          // }
        ]
      });
    });
  </script>
  <script>
    var kelas;
    $(document).ready(function() {
      $('#kelas').change(function() { // Jika Select Box kode_kelas dipilih
        kelas = $('#kelas').val();
        // console.log(kelas);
      });
    })

    function openNilai() {
      let url = "?page=nilai&nama_kelas=kelasNama"
      url = url.replace('kelasNama', kelas)
      // console.log();
      window.location.href = url
    }
  </script>
</body>

</html>