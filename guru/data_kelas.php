<?php
include "../conn/Koneksi.php";

    // $kdpl   = $_POST['kdpl'];
    // echo "<script>alert('Data Berhasil Disimpan!'); window.location = 'index.php'</script>";
    $query  = "SELECT jd.kode_kelas,kl.nama_kelas FROM dtjadwal AS jd
    INNER JOIN kelas AS kl ON jd.kode_kelas = kl.kode_kelas
    WHERE jd.kode_mp = '$_POST[kdpl]' AND jd.id_guru = '$_POST[idgr]' AND jd.id_thn_ajaran IN (SELECT id FROM tahun_ajaran WHERE STATUS='Aktif')
    ORDER BY nama_kelas ASC";
    $tampil=mysqli_query($koneksi,$query);
    $jml=mysqli_num_rows($tampil);
    
    if($jml > 0){
        echo "<option value='0' selected>---- Pilih Kelas ----</option>";
        while($r=mysqli_fetch_array($tampil)){
            echo "<option value=$r[kode_kelas]>$r[nama_kelas]</option>";
        }
    }else{
        echo "
        <option selected>---- Pilih Kelas ----</option>";
    }

?>