<?php
include '../conn/koneksi.php';

    $id_nilai   = $_POST['id_nilai'];
    $nis        = $_POST['kode_siswa'];
    $id_jadwal  = $_POST['id_jadwal'];
    $semester   = $_POST['semester'];

    // Pengetahuan
    $uh1            = $_POST['uh1'];
    $uh2            = $_POST['uh2'];
    $uh3            = $_POST['uh3'];
    $uh4            = $_POST['uh4'];
    $pr1            = $_POST['pr1'];
    $pr2            = $_POST['pr2'];
    $pr3            = $_POST['pr3'];
    $pr4            = $_POST['pr4'];
    $rata_uh_pr     = $_POST['rataP'];
    $uts            = $_POST['uts'];
    $uas            = $_POST['uas'];
    $total_peng     = $_POST['totalNilaiP'];
    $rata_peng      = $_POST['rataNilaiP'];
    $konversi_peng  = $_POST['konversiNilaiP'];
    $ket_peng       = $_POST['ketNilaiP'];

    // Keterampilan
    $uk1                = $_POST['uk1'];
    $uk2                = $_POST['uk2'];
    $uk3                = $_POST['uk3'];
    $uk4                = $_POST['uk4'];
    $ratauk             = $_POST['ukrata'];
    $pro1               = $_POST['projek1'];
    $pro2               = $_POST['projek2'];
    $pro3               = $_POST['projek3'];
    $pro4               = $_POST['projek4'];
    $ratapro            = $_POST['projekrata'];
    $port1              = $_POST['port1'];
    $port2              = $_POST['port2'];
    $port3              = $_POST['port3'];
    $port4              = $_POST['port4'];
    $rataport           = $_POST['portrata'];
    $total_terampil     = $_POST['totalNilai'];
    $rata_terampil      = $_POST['rataNilai'];
    $konversi_terampil  = $_POST['konversiNilai'];
    $ket_terampil       = $_POST['ketNilai'];

    if($id_nilai == "" or $nis == "" or $id_jadwal == "" or $semester == ""){
        echo "<script>alert('Input nilai gagal!');window.location = 'index.php?page=inputNilai';</script>";
    }else{
        $query="INSERT INTO dtnilai VALUES('$id_nilai','$nis','$id_jadwal','$semester',
        '$uh1','$uh2','$uh3','$uh4','$pr1','$pr2','$pr3','$pr4','$rata_uh_pr','$uts','$uas','$total_peng','$rata_peng','$konversi_peng','$ket_peng',
        '$uk1','$uk2','$uk3','$uk4','$ratauk','$pro1','$pro2','$pro3','$pro4','$ratapro','$port1','$port2','$port3','$port4','$rataport',
        '$total_terampil','$rata_terampil','$konversi_terampil','$ket_terampil')";
        $res=mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
        echo "<script>alert('Nilai Berhasil Disimpan');window.location = 'index.php?page=viewNilai';</script>";
    }
