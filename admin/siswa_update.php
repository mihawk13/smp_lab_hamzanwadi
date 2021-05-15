<?php
include '../conn/koneksi.php';

// $tglLahir       = $_POST['tgl_lahir'];
$tglLahir = str_replace('/', '-', $_POST['tgl_lahir']);
$tglLahir = date('Y-m-d', strtotime($tglLahir));

$nis            = $_POST['nis'];
$id_pengguna    = $_POST['id_pengguna'];
$nama           = $_POST['nama'];
$alamat         = $_POST['alamat'];

$jk             = $_POST['jk'];
$agama          = $_POST['agama'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$status         = $_POST['status'];

    $queryUser="UPDATE users SET username= '$username', password = '$password' WHERE id_pengguna = '$id_pengguna'";
    $res2 = mysqli_query($koneksi,$queryUser) or die (mysql_error());

    $querySiswa="UPDATE dtsiswa SET nama_siswa = '$nama', tgl_lahir='$tglLahir',jk='$jk',agama='$agama',alamat='$alamat',status='$status' WHERE nis='$nis'";
    $res2 = mysqli_query($koneksi,$querySiswa) or die (mysql_error());
 	?><script type="text/javascript">alert("Data siswa berhasil diperbaharui!");
		window.location = "index.php?page=viewSiswa";</script><?php
?>