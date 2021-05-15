<?php
include '../conn/koneksi.php';

$kode_kelas_siswa   = $_POST['kode_kelas_siswa'];
$kode_kelas         = $_POST['kode_kelas'];
$nis                = $_POST['nis'];
$thn_ajaran         = $_POST['thn_ajaran'];

		$query="INSERT INTO kelas_siswa VALUES('$kode_kelas_siswa','$kode_kelas','$nis','$thn_ajaran')";
    	$res1 = mysqli_query($koneksi,$query) or die (mysqli_error());
    	?><script type="text/javascript">alert("Data kelas siswa berhasil disimpan!");
		window.location = "index.php?page=viewKelasSiswa";</script><?php
?>