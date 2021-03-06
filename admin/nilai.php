      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Nilai Siswa</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th colspan="5"></th>
                <th class="p" colspan="3">Aspek Pengetahuan</th>
                <th class="k" colspan="3">Aspek Keterampilan</th>
              </tr>

                  <tr>
                  <th width=7%>NIS</th>
                  <th width=15%>Nama</th>
                  <th width=5%>Kelas</th>
                  <th width=5%>Semester</th>
                  <th width=10%>Mata Pelajaran</th>
                  <th class="p" width=7%>Total</th>                  
                  <th class="p" width=7%>Rata-Rata</th>
                  <th class="p" width=7%>Huruf</th>
                  <th class="k" width=7%>Total</th>                  
                  <th class="k" width=7%>Rata-Rata</th>
                  <th class="k" width=7%>Huruf</th></tr>
              </thead>
              <tbody>
                <?php
                include('../conn/koneksi.php');
                $kelas= $_GET['nama_kelas'];
                $query = "SELECT nl.nis,sw.nama_siswa,jd.nama_kelas,nl.semester,jd.nama_mp,nl.total_peng,nl.rata_peng,nl.konversi_peng,nl.total_terampil,nl.rata_terampil,nl.konversi_terampil  FROM dtnilai AS nl
                INNER JOIN dtsiswa AS sw ON nl.nis = sw.nis
                INNER JOIN (SELECT dtjadwal.id_jadwal,dtmapel.nama_mp,kelas.nama_kelas FROM dtjadwal
                INNER JOIN dtmapel ON dtjadwal.kode_mp = dtmapel.kode_mp
                INNER JOIN kelas ON dtjadwal.kode_kelas = kelas.kode_kelas) AS jd ON nl.id_jadwal = jd.id_jadwal WHERE nama_kelas = '$kelas'";
                //@$tampil = "SELECT * FROM dtnilai";
                //perintah menampilkan data dikerjakan
                $tampil=mysqli_query($koneksi,$query);
                if (!$tampil) {
                  printf("Error: %s\n", mysqli_error($koneksi));
                  exit();
              }
                //tampilkan seluruh data yang ada pada tabel user
                while($data=mysqli_fetch_array($tampil)){
                 ?>
                 <tr>
                 <td><?php echo $data['nis']?></td>
                 <td><?php echo $data['nama_siswa']?></td>
                 <td><?php echo $data['nama_kelas']?></td>
                 <td><?php echo $data['semester']?></td>
                 <td><?php echo $data['nama_mp']?></td>
                 <td><?php echo $data['total_peng']?></td>
                 <td><?php echo $data['rata_peng']?></td>
                 <td><?php echo $data['konversi_peng']?></td>
                 <td><?php echo $data['total_terampil']?></td>
                 <td><?php echo $data['rata_terampil']?></td>
                 <td><?php echo $data['konversi_terampil']?></td>
                 </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>