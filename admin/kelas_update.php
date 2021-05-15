<?php
include '../conn/koneksi.php';

    $kode_kelas = $_POST['kode_kelas'];
    $nama       = $_POST['nama'];

    $query="UPDATE kelas SET nama_kelas='$nama' WHERE kode_kelas='$kode_kelas'";
    $res1 = mysqli_query($koneksi,$query) or die (mysqli_error());
    ?><script type="text/javascript">alert("Data kelas berhasil diperbaharui!");
		window.location = "index.php?page=viewKelas";</script><?php
?>