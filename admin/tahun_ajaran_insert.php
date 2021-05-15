<?php
	include '../conn/koneksi.php';

	$kode_ta 		= $_POST['kode_ta'];
	$tahun_ajaran   = $_POST['tahun_ajaran'];
	$tahun_ajaran   = $tahun_ajaran . "/" . intval($tahun_ajaran+1);

    $query="SELECT * FROM tahun_ajaran WHERE tahun_ajaran = '$tahun_ajaran'";
    $res = mysqli_query($koneksi,$query) or die (mysqli_error());
	
	if (mysqli_num_rows($res)>0) {
		echo "<script>alert('Maaf, tahun ajaran tersebut sudah dibuat!'); window.location = 'index.php?page=addTA'</script>";
	}else {
		$query2 = "INSERT INTO tahun_ajaran VALUES ('$kode_ta', '$tahun_ajaran', 'Non Aktif')";
		$res2 = mysqli_query($koneksi,$query2) or die (mysqli_error());
		if ($res2){
			echo "<script>alert('Tahun Ajaran Berhasil Ditambah!'); window.location = 'index.php?page=viewTA'</script>";
		} else {
			echo "<script>alert('Tahun Ajaran Gagal Ditambah!'); window.location = 'index.php?page=addTA'</script>";
		}
	}
	
    // if ($res){
    //     $query2="UPDATE tahun_ajaran SET status ='Aktif' WHERE id='$id'";
    //     $res2 = mysqli_query($koneksi,$query2) or die (mysqli_error());
    //     if ($res2){
    //         echo "<script>alert('Tahun Ajaran Berhasil Disimpan!'); window.location = 'index.php?page=viewTA'</script>";
    //     }
    // } else {
    //     echo "<script>alert('Tahun Ajaran Gagal Disimpan!'); window.location = 'index.php?page=addTA'</script>";
    // }
?>