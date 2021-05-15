<?php
include "../conn/Koneksi.php";

    $query = "SELECT jd.id_jadwal FROM dtjadwal AS jd
    INNER JOIN kelas AS kl ON jd.kode_kelas = kl.kode_kelas
    WHERE jd.kode_kelas = '$_POST[kdkl]' AND jd.id_guru = '$_POST[idgr]' AND jd.kode_mp = '$_POST[kdpl]' AND jd.id_thn_ajaran IN (SELECT id FROM tahun_ajaran WHERE status='Aktif')";
    $tampil=mysqli_query($koneksi,$query);
    while($data =mysqli_fetch_array($tampil)){
        $idJadwal =  $data['id_jadwal'];
    }


    $query2  = "SELECT ks.nis,sw.nama_siswa FROM kelas_siswa AS ks
    INNER JOIN dtsiswa AS sw ON ks.nis = sw.nis
    WHERE ks.kode_kelas = '$_POST[kdkl]' 
    AND ks.thn_ajaran IN (SELECT tahun_ajaran FROM tahun_ajaran WHERE STATUS='Aktif')
    AND sw.nis NOT IN(SELECT nis FROM dtnilai WHERE id_jadwal = '$idJadwal' AND semester = '$_POST[smt]') ORDER BY nama_siswa ASC";
    $tampil2 = mysqli_query($koneksi,$query2);
    $jml    = mysqli_num_rows($tampil2);
    
    if($jml > 0){
        echo "<option selected>---- Pilih Siswa ----</option>";
        while($r=mysqli_fetch_array($tampil2)){
            echo "<option value=$r[nis]>$r[nama_siswa]</option>";
        }
    }else{
        echo "
        <option selected>---- Pilih Siswa ----</option>";
    }

?>