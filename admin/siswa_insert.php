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
$simpan			= $_POST['simpan'];
if($simpan){
	if($tglLahir=="" or $nis=="" or $id_pengguna=="" or $nama=="" or $alamat=="" or $jk=="" or $agama=="" or $username=="" or $password==""){
		?><script type="text/javascript">alert("Data siswa tidak diisi dengan benar!!");
			window.location = "index.php?page=addSiswa";</script><?php
	}else{
		$queryUser="INSERT INTO users VALUES('$id_pengguna','$username','$password','siswa')";
	    $res1 = mysqli_query($koneksi,$queryUser) or die (mysql_error());

	    $querySiswa="INSERT INTO dtsiswa VALUES('$nis','$nama','$tglLahir','$jk','$agama','$alamat','Aktif','$id_pengguna')";
	    $res2 = mysqli_query($koneksi,$querySiswa) or die (mysql_error());
	 	?><script type="text/javascript">alert("Data siswa berhasil disimpan");
			window.location = "index.php?page=viewSiswa";</script><?php
	}
}
?>