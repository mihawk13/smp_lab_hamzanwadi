<?php
    include '../conn/koneksi.php';

    $editSiswa="UPDATE dtsiswa SET nama_siswa = '$_POST[nama]', alamat = '$_POST[alamat]', tgl_lahir = '$_POST[tgl_lahir]', jk = '$_POST[jk]', agama = '$_POST[agama]' WHERE nis = '$_POST[nis]'";
    $editUser="UPDATE users SET username = '$_POST[username]', password = '$_POST[password]' WHERE id_pengguna = '$_POST[id_pengguna]'";
    mysqli_query($koneksi,$editSiswa);
    mysqli_query($koneksi,$editUser);
    header('location: index.php?page=viewData');
?>