<?php
include '../conn/koneksi.php';

$kode_mp = $_POST['kode_mp'];
$nama_mp = $_POST['nama_mp'];
$kkm = $_POST['kkm'];
$simpan = $_POST['simpan'];
if($simpan){
	if($kode_mp=="" or $nama_mp=="" or $kkm==""){
		?><script type="text/javascript">alert("Data Mapel tidak diisi dengan benar!");
					window.location = "index.php?page=addMapel";</script><?php
	}else{
	    $query="INSERT INTO dtmapel VALUES('$kode_mp','$nama_mp','$kkm')";
	    $res1 = mysqli_query($koneksi,$query) or die(mysqli_error());
	    // header('location: index.php?page=viewTA');
	    ?>
	    <script type="text/javascript">alert("Data Mapel berhasil ditambah");
			window.location = "index.php?page=viewMapel";</script><?php
	}
}

?>