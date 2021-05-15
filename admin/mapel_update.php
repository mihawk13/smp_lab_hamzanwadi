<?php
include '../conn/koneksi.php';

$kode_mp       = $_POST['kode_mp'];
$nama_mp       = $_POST['nama_mp'];
$kkm         = $_POST['kkm'];

    $query="UPDATE dtmapel SET nama_mp = '$nama_mp', kkm ='$kkm' WHERE kode_mp ='$kode_mp'";
    $res = mysqli_query($koneksi,$query);
 	// header('location: index.php?page=viewMapel');
 	?><script type="text/javascript">alert("Data Mapel berhasil diperbaharui");
		window.location = "index.php?page=viewMapel";</script>
?>