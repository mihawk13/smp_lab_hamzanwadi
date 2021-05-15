<?php
include '../conn/koneksi.php';

$kode_kelas = $_POST['kode_kelas'];
$nama       = $_POST['nama'];
$simpan		= $_POST['simpan'];
if($simpan){
	if($kode_kelas=="" or $nama==""){
		?><script type="text/javascript">alert("Data kelas belum diisi dengan benar!!");
		window.location = "index.php?page=addKelas";</script><?php
	}
}
    $query="INSERT INTO kelas VALUES('$kode_kelas','$nama')";
    $res1 = mysqli_query($koneksi,$query) or die (mysqli_error());
    ?><script type="text/javascript">alert("Data kelas berhasil disimpan!");
		window.location = "index.php?page=viewKelas";</script><?php
?>