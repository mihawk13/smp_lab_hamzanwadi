<?php
session_start();
if (!empty($_SESSION['level'])) {
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

include "conn/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'") or die();
if (mysqli_num_rows($query) == 0) {
  echo "<script>alert('Username dan Password Tidak Sesuai!'); window.location = 'index.php'</script>";
} else {
  $row = mysqli_fetch_assoc($query);
  $_SESSION['username'] = $row['username'];
  $_SESSION['akun_id'] = $row['id_pengguna'];
  // $_SESSION['akun_nama'] = $row['nama'];
  // $_SESSION['akun_alamat'] = $row['alamat'];
  $querys = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE status='Aktif'") or die();
  $rows = mysqli_fetch_assoc($querys);
  $_SESSION['tahun_ajaran'] = $rows['tahun_ajaran'];
  $_SESSION['idta'] = $rows['id'];

  if ($row['level'] == "admin") {
    $_SESSION['level'] = 'admin';
    header("Location: admin/index.php");
  } else if ($row['level'] == "guru") {
    $query = mysqli_query($koneksi, "SELECT * FROM dtguru WHERE id_pengguna='$row[id_pengguna]'");
    $gr = mysqli_fetch_assoc($query);
    if ($gr['status'] != 'Aktif') {
      session_destroy();
      echo "<script>alert('Maaf Username dan Password Sudah Tidak Aktif!'); window.location = 'index.php'</script>";
    } else {
      $_SESSION['level'] = 'guru';
      header("Location: guru/index.php");
    }
  } else if ($row['level'] == "siswa") {
    $query = mysqli_query($koneksi, "SELECT * FROM dtsiswa WHERE id_pengguna='$row[id_pengguna]'");
    $sw = mysqli_fetch_assoc($query);
    if ($sw['status'] != 'Aktif') {
      session_destroy();
      echo "<script>alert('Maaf Username dan Password Sudah Tidak Aktif!'); window.location = 'index.php'</script>";
    } else {
      $_SESSION['level'] = 'siswa';
      $_SESSION['nis'] = $sw['nis'];
      header("Location: siswa/index.php");
    }
  } else {
    echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
  }
}
