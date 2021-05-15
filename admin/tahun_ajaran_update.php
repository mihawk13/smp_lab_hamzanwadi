<?php
include '../conn/koneksi.php';

    $id       = $_GET['id'];

    $query="UPDATE tahun_ajaran SET status ='Non Aktif'";
    $res = mysqli_query($koneksi,$query) or die (mysqli_error());
    
    if ($res){
        $query2="UPDATE tahun_ajaran SET status ='Aktif' WHERE id='$id'";
        $res2 = mysqli_query($koneksi,$query2) or die (mysqli_error());
        if ($res2){
            echo "<script>alert('Tahun Ajaran Berhasil Di Aktifkan!'); window.location = 'index.php?page=viewTA'</script>";
        }
    } else {
        echo "<script>alert('Tahun Ajaran Gagal Di Aktifkan!'); window.location = 'index.php?page=viewTA'</script>";
    }
?>