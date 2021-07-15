<?php
session_start();
include '../conn/koneksi.php';
include "../kode_otomatis.php";

// $tglLahir       = $_POST['tgl_lahir'];
$tglLahir = str_replace('/', '-', $_POST['tgl_lahir']);
$tglLahir = date('Y-m-d', strtotime($tglLahir));

$id_guru        = $_POST['id_guru'];
$id_pengguna    = $_POST['id_pengguna'];
$nip            = $_POST['nip'];
$nama           = $_POST['nama'];
$alamat         = $_POST['alamat'];

$jk             = $_POST['jk'];
$agama          = $_POST['agama'];
$telpon         = $_POST['telpon'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$simpan         = $_POST['simpan'];

if ($simpan) {
    if ($tglLahir == "" or $id_guru == "" or $id_pengguna == "" or $nip == "" or $nama == "" or $alamat == "" or $jk == "" or $agama == "" or $telpon == "" or $username == "" or $password == "") {
        echo "<script>alert('Data Guru harus diisi dengan benar!');window.location = 'index.php?page=addGuru';</script>";
    } else {
        $queryUser = "INSERT INTO users VALUES('$id_pengguna','$username','$password','guru')";
        mysqli_query($koneksi, $queryUser);

        $queryGuru = "INSERT INTO dtguru VALUES('$id_guru','$id_pengguna','$nip','$nama','$alamat','$tglLahir','$jk','$agama','$telpon','Aktif')";
        $res = mysqli_query($koneksi, $queryGuru) or die();

        $hasil = mysqli_query($koneksi, "SELECT max(id_jadwal) as maxKode FROM dtjadwal");
        $data = mysqli_fetch_array($hasil);
        $kode = $data['maxKode'];
        $noUrut = (int) substr($kode, 2, 3);

        // $id_guru = 'G001';
        foreach ($_POST['mapel'] as $key => $value) {
            $noUrut++;
            $kodejdwl = "JW" . sprintf("%03s", $noUrut);

            $kdkl = substr($value, 0, 4);
            $kdmp = substr($value, 5, 4);
            // echo $kodejdwl . ' - ' . $kdmp . ' - ' . $id_guru . ' - ' . $kdkl . ' - ' . $_SESSION['idta'] . '<br>';
            $query = "INSERT INTO dtjadwal VALUES('$kodejdwl','$kdmp','$id_guru','$kdkl','$_SESSION[idta]')";
            $res = mysqli_query($koneksi, $query);
        }
        echo '<script>alert("Data Guru berhasil disimpan");window.location = "index.php?page=viewGuru";</script>';
    }
}
