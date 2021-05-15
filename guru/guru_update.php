<?php
    include '../conn/koneksi.php';

    $editGuru="UPDATE dtguru SET nip = '$_POST[nip]', nama_guru = '$_POST[nama]', alamat = '$_POST[alamat]', tgl_lahir = '$_POST[tgl_lahir]', jk = '$_POST[jk]', agama = '$_POST[agama]', no_telpon = '$_POST[telpon]' WHERE id_guru = '$_POST[id_guru]'";
    $editUser="UPDATE users SET username = '$_POST[username]', password = '$_POST[password]' WHERE id_pengguna = '$_POST[id_pengguna]'";
    mysqli_query($koneksi,$editGuru);
    mysqli_query($koneksi,$editUser);
    header('location: index.php?page=viewData');
?>