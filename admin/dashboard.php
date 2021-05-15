<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<!-- Main content -->
<div class="container">
  <h3><center><strong>Selamat Datang di Sistem Informasi Pengolahan Nilai Siswa</strong></center></h3>
  <center><img class="rounded mx-auto d-block" src="../dist/img/img.png" height="250"
            width="250" alt=""></center>
  <h3><center><strong>SMP Laboratorium Hamzanwadi Pancor</strong></center></h3>
</div>


<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner">
      <?php
      include "../conn/koneksi.php";
      $sql = "SELECT * FROM dtsiswa";
      $query = mysqli_query($koneksi, $sql);
      $count = mysqli_num_rows($query);
      ?>
      <h3><?php echo "$count"; ?></h3>

      <p>Jumlah Siswa</p>
    </div>
    <div class="icon">
      <i class="fa fa-user"></i>
    </div>
    <a href="?page=viewSiswa" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle-right"></i></a>
    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="inner">
      <?php
      $sql = "SELECT * FROM dtguru";
      $query = mysqli_query($koneksi, $sql);
      $count = mysqli_num_rows($query);
      ?>
      <h3><?php echo "$count"; ?></h3>

      <p>Jumlah Guru</p>
    </div>
    <div class="icon">
      <i class="fa fa-users"></i>
    </div>
    <a href="?page=viewGuru" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <?php
      $sql = "SELECT * FROM dtmapel";
      $query = mysqli_query($koneksi, $sql);
      $count = mysqli_num_rows($query);
      ?>
      <h3><?php echo "$count"; ?></h3>

      <p>Mata Pelajaran</p>
    </div>
    <div class="icon">
      <i class="fa fa-book"></i>
    </div>
    <a href="?page=viewMapel" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-red">
    <div class="inner">
      <?php
      include "../conn/koneksi.php";
      $sql = "SELECT * FROM kelas";
      $query = mysqli_query($koneksi, $sql);
      $count = mysqli_num_rows($query);
      ?>
      <h3><?php echo "$count"; ?></h3>

      <p>Jumlah Kelas</p>
    </div>
    <div class="icon">
      <i class="fa fa-home"></i>
    </div>
    <a href="?page=viewKelas" class="small-box-footer">lihat detail <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->