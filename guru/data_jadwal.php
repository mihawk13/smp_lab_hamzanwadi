<?php
include "../conn/Koneksi.php";
    $query  = "SELECT jd.id_jadwal FROM dtjadwal AS jd
    INNER JOIN kelas AS kl ON jd.kode_kelas = kl.kode_kelas
    WHERE jd.kode_kelas = '$_POST[kdkl]' AND jd.id_guru = '$_POST[idgr]' AND jd.kode_mp = '$_POST[kdpl]' AND jd.id_thn_ajaran IN (SELECT id FROM tahun_ajaran WHERE status='Aktif')";
    $tampil=mysqli_query($koneksi,$query);
    $jml=mysqli_num_rows($tampil);
    
    if($jml > 0){
        while($r=mysqli_fetch_array($tampil)){
            echo "$r[id_jadwal]";
        }
    }else{
        echo "";
    }
?>