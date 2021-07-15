<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>


<div class="container-fluid">
  <!-- Example DataTables Card-->
  <div class="card mb-3" style="margin-top: 20px;">
    <div class="card-header">
      <i class="fa fa-table"></i> Data Saya
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <tbody>
            <?php

            $tampil = "SELECT * FROM dtguru 
                INNER JOIN users ON dtguru.`id_pengguna` = users.`id_pengguna`
                WHERE dtguru.id_pengguna = '$_SESSION[akun_id]'";
            //perintah menampilkan data dikerjakan
            $sql = mysqli_query($koneksi, $tampil);

            //tampilkan seluruh data yang ada pada tabel user
            if ($data = mysqli_fetch_array($sql)) {
            ?>
              <tr>
                <th width="25%">NIP</th>
                <td><?php echo "$data[nip]" ?></td>
              </tr>
              <tr>
                <th width="25%">Nama</th>
                <td><?php echo $data['nama_guru'] ?></td>
              </tr>
              <tr>
                <th width="25%">Alamat</th>
                <td><?php echo $data['alamat'] ?></td>
              </tr>
              <tr>
                <th width="25%">Telepon</th>
                <td><?php echo $data['no_telpon'] ?></td>
              </tr>
              <tr>
                <th width="25%">Tanggal Lahir</th>
                <td><?php echo $data['tgl_lahir'] ?></td>
              </tr>
              <tr>
                <th width="25%">Status</th>
                <td style="color: green;"><?php echo $data['status'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">
      <?php $tgl = mktime(date("m"), date("d"), date("Y"));
      echo date("d-M-Y", $tgl);
      ?></div>
  </div>

  <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="card-header">
      <i class="fa fa-table"></i> Mata Pelajaran Saya
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th >Kelas</th>
              <th >Jumlah Siswa</th>
              <th >Mata Pelajaran</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT c.nama_kelas,b.nama_mp,c.kode_kelas FROM dtjadwal a
            INNER JOIN dtmapel b ON a.kode_mp=b.kode_mp
            INNER JOIN kelas c ON a.kode_kelas=c.kode_kelas
            INNER JOIN tahun_ajaran d ON a.id_thn_ajaran=d.id
            INNER JOIN dtguru e ON a.id_guru=e.id_guru
            WHERE d.status= 'Aktif' AND e.id_pengguna= '$_SESSION[akun_id]'";
            //perintah menampilkan data dikerjakan
            $tampil = mysqli_query($koneksi, $query);
            if (!$tampil) {
              printf("Error: %s\n", mysqli_error($koneksi));
              exit();
            }
            //tampilkan seluruh data yang ada pada tabel user
            while ($data = mysqli_fetch_array($tampil)) {
              $tampils = mysqli_query($koneksi, "SELECT COUNT(nis) jml FROM kelas_siswa WHERE kode_kelas = '$data[kode_kelas]'");
              while ($dtkl = mysqli_fetch_array($tampils)) {
            ?>
              <tr>
                <td><?= $data['nama_kelas'] ?></td>
                <td><?= $dtkl['jml'] ?></td>
                <td><?= $data['nama_mp'] ?></td>
              </tr>
            <?php
            }
          }
            ?>
          </tbody>
        </table>
    </div>
  </div>
</div>