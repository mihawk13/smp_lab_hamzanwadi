<?php
include '../conn/koneksi.php';

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
?><script type="text/javascript">
            alert("Data Guru harus diisi dengan benar!");
            window.location = "index.php?page=addGuru";
        </script><?php
                } else {
                    $queryUser = "INSERT INTO users VALUES('$id_pengguna','$username','$password','guru')";
                    mysqli_query($koneksi, $queryUser);

                    $queryGuru = "INSERT INTO dtguru VALUES('$id_guru','$id_pengguna','$nip','$nama','$alamat','$tglLahir','$jk','$agama','$telpon','Aktif')";
                    $res = mysqli_query($koneksi, $queryGuru) or die();
                    ?><script type="text/javascript">
            alert("Data Guru berhasil disimpan");
            window.location = "index.php?page=viewGuru";
        </script><?php
                }
            }
                    ?>