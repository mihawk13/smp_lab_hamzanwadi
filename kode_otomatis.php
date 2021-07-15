<?php

	function Kode_Auto($char,$query)
	    {
	        include "conn/koneksi.php";
			// mencari kode barang dengan nilai paling besar
			// $query = "SELECT max(kode_siswa) as maxKode FROM siswa";
			$hasil = mysqli_query($koneksi,$query);

			if (!$hasil) { // add this check.
			    die('Invalid query: ' . mysqli_error());
			}

			$data = mysqli_fetch_array($hasil);
			$kode = $data['maxKode'];
			 // mengambil angka atau bilangan dalam kode anggota terbesar,
			// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
			// misal 'S001', akan diambil '001'
			// setelah substring bilangan diambil lantas dicasting menjadi integer
			$noUrut = (int) substr($kode, strlen($char), 3);
			 // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
			$noUrut++;
			 // membentuk kode anggota baru
			// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
			// misal sprintf("%03s", 12); maka akan dihasilkan '012'
			// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
			$kode = $char . sprintf("%03s", $noUrut);
			echo $kode;
			// echo ;
	    }

?>