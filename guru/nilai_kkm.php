<?php
include "../conn/Koneksi.php";

    $query  = "SELECT kkm FROM dtmapel WHERE kode_mp = '$_POST[kdpl]'";
    $tampil=mysqli_query($koneksi,$query);
    $jml=mysqli_num_rows($tampil);
    
    if($jml > 0){
        while($r=mysqli_fetch_array($tampil)){
            echo "$r[kkm]";
        }
    }else{
        echo "KKM";
    }

?>