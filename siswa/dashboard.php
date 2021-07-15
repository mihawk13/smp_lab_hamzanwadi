<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<!DOCTYPE html>
<html>

<head>
  <style>
    th {
      text-align: center;
    }

    th.p {
      background-color: rgba(12, 46, 238, 0.473);
    }

    th.k {
      background-color: rgba(200, 209, 75, 0.342);
    }
  </style>
</head>


<div class="container-fluid" style="margin-top: 10px;">
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <!-- <i class="fa fa-table"></i> Data Nilai -->
      <form id="pilih" action="" method="post">
        <div class="col-xs-6 form-group">
          <label><small>Tahun Ajaran - Semester</small></label>
          <select name="semester" id="semester" class="form-control" required />
          <option value="" selected disabled> ---- Pilih Semester ---- </option>
          <?php

          $querys = "SELECT DISTINCT(c.tahun_ajaran),a.semester,c.id FROM dtnilai a
          INNER JOIN dtjadwal b ON a.id_jadwal=b.id_jadwal
          INNER JOIN tahun_ajaran c ON c.id=b.id_thn_ajaran
          WHERE a.nis = '$_SESSION[nis]' ORDER BY tahun_ajaran DESC";
          //perintah menampilkan data dikerjakan
          $tampils = mysqli_query($koneksi, $querys);
          while ($datas = mysqli_fetch_array($tampils)) { ?>
            <option <?php if(!empty($_POST['ta'])){
              echo $_POST['ta'] == $datas['id'] && $_POST['smt'] == $datas['semester'] ? 'selected' : '';
            }  ?> value="<?= $datas['id'] . '-' . $datas['semester'] ?>"><?= $datas['tahun_ajaran'] . ' - ' . $datas['semester'] ?></option>
          <?php } ?>
          </select>
        </div>
        <input type="hidden" id="smt" name="smt" value="0">
        <input type="hidden" id="ta" name="ta" value="0">
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th colspan="3"></th>
              <th class="p" colspan="3">Aspek Pengetahuan</th>
              <th class="k" colspan="3">Aspek Keterampilan</th>
            </tr>

            <tr>
              <th width=5%>Kelas</th>
              <th width=5%>Semester</th>
              <th width=10%>Mata Pelajaran</th>
              <th class="p" width=7%>Total</th>
              <th class="p" width=7%>Rata-Rata</th>
              <th class="p" width=7%>Huruf</th>
              <th class="k" width=7%>Total</th>
              <th class="k" width=7%>Rata-Rata</th>
              <th class="k" width=7%>Huruf</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!empty($_POST['ta'])) {
              $query = "SELECT nl.nis,sw.nama_siswa,jd.nama_kelas,nl.semester,jd.nama_mp,nl.total_peng,nl.rata_peng,nl.konversi_peng,nl.total_terampil,nl.rata_terampil,nl.konversi_terampil  FROM dtnilai AS nl
                INNER JOIN dtsiswa AS sw ON nl.nis = sw.nis
                INNER JOIN (SELECT dtjadwal.id_jadwal,dtmapel.nama_mp,kelas.nama_kelas,dtjadwal.id_thn_ajaran FROM dtjadwal
                INNER JOIN dtmapel ON dtjadwal.kode_mp = dtmapel.kode_mp
                INNER JOIN kelas ON dtjadwal.kode_kelas = kelas.kode_kelas) AS jd ON nl.id_jadwal = jd.id_jadwal
                WHERE nl.nis = '$_SESSION[nis]' AND jd.id_thn_ajaran = '$_POST[ta]' AND nl.semester = '$_POST[smt]'";
              //perintah menampilkan data dikerjakan
              $tampil = mysqli_query($koneksi, $query);
              if (!$tampil) {
                printf("Error: %s\n", mysqli_error($koneksi));
                exit();
              }
              //tampilkan seluruh data yang ada pada tabel user
              while ($data = mysqli_fetch_array($tampil)) {
            ?>
                <tr>
                  <td><?= $data['nama_kelas'] ?></td>
                  <td><?= $data['semester'] ?></td>
                  <td><?= $data['nama_mp'] ?></td>
                  <td><?= $data['total_peng'] ?></td>
                  <td><?= $data['rata_peng'] ?></td>
                  <td><?= $data['konversi_peng'] ?></td>
                  <td><?= $data['total_terampil'] ?></td>
                  <td><?= $data['rata_terampil'] ?></td>
                  <td><?= $data['konversi_terampil'] ?></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
  </div>
</div>