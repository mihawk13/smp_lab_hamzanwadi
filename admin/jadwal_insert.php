<?php
include '../conn/koneksi.php';

$id_jadwal  = $_POST['id_jadwal'];
$kode_mp    = $_POST['kode_mp'];
$id_guru    = $_POST['id_guru'];
$kode_kelas = $_POST['kode_kelas'];
$id_thn     = $_POST['id_thn'];
$simpan		= $_POST['simpan'];
if($simpan){
	if($id_jadwal=="" or $kode_mp=="" or $id_guru=="" or $kode_kelas=="" or $id_thn==""){
		?><script type="text/javascript">alert("Data jadwal tidak diisi dengan benar!");
			window.location = "index.php?page=addJadwal";</script><?php
	}else{
		$query="INSERT INTO dtjadwal VALUES('$id_jadwal','$kode_mp','$id_guru','$kode_kelas','$id_thn')";
    	$res1 = mysqli_query($koneksi,$query);
    	?>
	    <script type="text/javascript">alert("Data jadwal berhasil ditambah");
			window.location = "index.php?page=viewJadwal";</script><?php
	}
}
?>