<?php
include '../conn/koneksi.php';

// $tglLahir       = $_POST['tgl_lahir'];
$tglLahir = str_replace('/', '-', $_POST['tgl_lahir']);
$tglLahir = date('Y-m-d', strtotime($tglLahir));

$id_guru        = $_POST['id_guru'];
$id_pengguna    = $_POST['id_pengguna'];
$nip            = $_POST['nip'];
$nama           = $_POST['nama'];
$alamat         = $_POST['alamat'];

$jk             = $_POST['jk'];
$agama          = $_POST['agama'];
$telpon         = $_POST['telpon'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$status         = $_POST['status'];

    $queryUser="UPDATE users SET username= '$username', password = '$password' WHERE id_pengguna = '$id_pengguna'";
    mysqli_query($koneksi,$queryUser);

    $queryGuru="UPDATE dtguru SET id_pengguna = '$id_pengguna', nip='$nip',nama_guru='$nama',alamat='$alamat',tgl_lahir='$tglLahir', jk = '$jk',agama='$agama',no_telpon='$telpon',status = '$status' WHERE id_guru = '$id_guru'";
    $res=mysqli_query($koneksi,$queryGuru) or die (mysql_error());
 ?><script type="text/javascript">alert("Data Guru berhasil diperbaharui");
	window.location = "index.php?page=viewGuru";</script><?php
?>