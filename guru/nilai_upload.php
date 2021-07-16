<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

include '../conn/koneksi.php';
require_once '../vendor/simplexlsx/SimpleXLSX.php';

// $id_jadwal      = $_POST['id_jadwal'];
// $id_guru        = $_POST['id_guru'];
// $semester       = $_POST['semester'];
// $kode_kelas     = $_POST['kode_kelas'];
// $kode_pelajaran = $_POST['kode_pelajaran'];

// echo $_POST['file'];

// $target_dir = "uploads/";
$file = basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

// Allow certain file formats
if ($imageFileType != "xls" && $imageFileType != "xlsx") {
    echo "<script>alert('Type file tidak didukung!'); window.location = 'index.php?page=viewNilai';</script>";
}

$hasil = mysqli_query($koneksi, "SELECT max(id_nilai) as maxKode FROM dtnilai");
$data = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];
$noUrut = (int) substr($kode, 2, 3);

if ($xlsx = SimpleXLSX::parse($_FILES["file"]["tmp_name"])) {
    // print_r( $xlsx->rows() );
    foreach ($xlsx->rows() as $key => $value) {
        if ($key >= 2 && !empty($value[0])) {
            // print_r($value[1]);
            // print_r($key);

            $noUrut++;
            $id_nilai = "NL" . sprintf("%03s", $noUrut);

            $id_jadwal  = $_POST['id_jadwal'];
            $semester   = $_POST['semester'];

            $nis        = $value[2];

            // Pengetahuan
            $uh1            = $value[4];
            $uh2            = $value[5];
            $uh3            = $value[6];
            $uh4            = $value[7];
            $pr1            = $value[9];
            $pr2            = $value[10];
            $pr3            = $value[11];
            $pr4            = $value[12];
            $rata_uh_pr     = $value[13];
            $uts            = $value[14];
            $uas            = $value[15];
            $total_peng     = $value[16];
            $rata_peng      = $value[17];
            $konversi_peng  = $value[18];
            $ket_peng       = $value[19];

            // Keterampilan
            $uk1                = $value[20];
            $uk2                = $value[21];
            $uk3                = $value[22];
            $uk4                = $value[23];
            $ratauk             = $value[24];
            $pro1               = $value[25];
            $pro2               = $value[26];
            $pro3               = $value[27];
            $pro4               = $value[28];
            $ratapro            = $value[29];
            $port1              = $value[30];
            $port2              = $value[31];
            $port3              = $value[32];
            $port4              = $value[33];
            $rataport           = $value[34];
            $total_terampil     = $value[35];
            $rata_terampil      = $value[36];
            $konversi_terampil  = $value[37];
            $ket_terampil       = $value[38];

            if ($id_nilai == "" or $nis == "" or $id_jadwal == "" or $semester == "") {
                echo "<script>alert('Input nilai gagal!');window.location = 'index.php?page=inputNilai';</script>";
            } else {
                $query = "INSERT INTO dtnilai VALUES('$id_nilai','$nis','$id_jadwal','$semester',
        '$uh1','$uh2','$uh3','$uh4','$pr1','$pr2','$pr3','$pr4','$rata_uh_pr','$uts','$uas','$total_peng','$rata_peng','$konversi_peng','$ket_peng',
        '$uk1','$uk2','$uk3','$uk4','$ratauk','$pro1','$pro2','$pro3','$pro4','$ratapro','$port1','$port2','$port3','$port4','$rataport',
        '$total_terampil','$rata_terampil','$konversi_terampil','$ket_terampil')";
                $res = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            }
        }
    }
} else {
    echo SimpleXLSX::parseError();
}
echo "<script>alert('Nilai Berhasil Disimpan');window.location = 'index.php?page=viewNilai';</script>";
