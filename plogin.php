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
  // $_SESSION['akun_nip'] = $row['nip'];
  // $_SESSION['akun_nama'] = $row['nama'];
  // $_SESSION['akun_alamat'] = $row['alamat'];

  if ($row['level'] == "admin") {
    $_SESSION['level'] = 'admin';
    header("Location: admin/index.php");
  } else if ($row['level'] == "guru") {
    $_SESSION['level'] = 'guru';
    header("Location: guru/index.php");
  } else if ($row['level'] == "siswa") {
    $_SESSION['level'] = 'siswa';
    $query = mysqli_query($koneksi, "SELECT * FROM dtsiswa WHERE id_pengguna='$row[id_pengguna]'");
    $sw = mysqli_fetch_assoc($query);
    $_SESSION['nis'] = $sw['nis'];
    header("Location: siswa/index.php");
  } else {
    echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
  }
}
