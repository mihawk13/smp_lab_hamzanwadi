<?php
include_once("../conn/koneksi.php");

//buat query untuk menampilkan berita
$query = mysqli_query($koneksi,"SELECT * FROM dtsiswa ORDER BY nama_siswa");

?>
<style>
 table{
  border:silver 1px solid;
 }
 table td{
  border-bottom:silver 1px solid;
  border-right:silver 1px solid;
  padding:0 0 0 5px;
 }
</style>
<table cellpadding="0" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif">
  <!--DWLayoutTable-->
  <tr>
    <td height="25" colspan="7" align="center"><strong>DAFTAR SISWA</strong></td>
  </tr>
  <tr>
    <td width="100" align="center" style="background-color:#CCC"><strong>NIS</strong></td>
    <td width="250" align="center" style="background-color:#CCC"><strong>NAMA</strong></td>
    <td width="150" align="center" style="background-color:#CCC"><strong>ALAMAT</strong></td>
    <td width="150" align="center" style="background-color:#CCC"><strong>TGL LAHIR</strong></td>
    <td width="150" align="center" style="background-color:#CCC"><strong>JENIS KELAMIN</strong></td>
     <td width="100" align="center" style="background-color:#CCC"><strong>STATUS</strong></td>
  </tr>
<?php
while($data = mysqli_fetch_array($query)){
$kode = $data['nis']; // ambil nis siswa (unik)
?>
  <tr>
    <td valign="middle"><?php echo $data['nis']; ?></td>
    <td valign="middle"><?php echo $data['nama_siswa']; ?></td>
    <td valign="middle"><?php echo $data['alamat']; ?></td>
    <td valign="middle"><?php echo $data['tgl_lahir']; ?></td>
    <td valign="middle"><?php echo $data['jk']; ?></td>
    <td valign="middle"><?php echo $data['status']; ?></td>
    <td valign="middle">
 <!-- BUAT LINK POP UP KE HALAMAN PDF KONVERTER SEPERTI PADA CONTOH BERIKUT -->
 <a href="javascript:void(0);"
    onclick="window.open('report.php?kode=<?php echo $kode; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">PDF</a>
 </td>
   </tr>
<?php
}
?>
</table>