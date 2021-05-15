/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - smp_lab_hamzanwadi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smp_lab_hamzanwadi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `smp_lab_hamzanwadi`;

/*Table structure for table `dtguru` */

DROP TABLE IF EXISTS `dtguru`;

CREATE TABLE `dtguru` (
  `id_guru` varchar(15) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `alamat` text,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `no_telpon` varchar(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id_guru`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `FK_User` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dtguru` */

insert  into `dtguru`(`id_guru`,`id_pengguna`,`nip`,`nama_guru`,`alamat`,`tgl_lahir`,`jk`,`agama`,`no_telpon`,`status`) values 
('G001','U001','470313379','Laswi Maheswara','Dk. Wora Wari No. 933, Denpasar 34624, JaBar','1987-10-19','Perempuan','Islam','0878 6452 6980','Aktif'),
('G002','U002','177740857','Fathonah Nabila Usada S.H.','Psr. Jend. A. Yani No. 780, Sabang 95203, KalUt','1970-05-14','Perempuan','Islam','(+62) 549 9011 895','Aktif'),
('G003','U003','941585227','Ade Astuti','Dk. Gedebage Selatan No. 678, Sungai Penuh 45181, Jambi','1970-06-05','Laki-Laki','Islam','0800 8791 169','Aktif'),
('G004','U004','993698465','Tari Anggraini','Jln. Baiduri No. 84, Tomohon 84740, KalBar','1975-07-14','Perempuan','Islam','(+62) 948 7355 209','Aktif'),
('G005','U005','152579950','Luluh Rajata','Psr. Bagis Utama No. 792, Tanjung Pinang 19974, Maluku','1980-05-04','Perempuan','Islam','(+62) 361 0237 228','Aktif'),
('G006','U006','641620420','Rika Lintang Laksmiwati','Kpg. Lembong No. 496, Padang 76146, DKI','1995-03-05','Laki-Laki','Islam','021 5340 044','Aktif'),
('G007','U007','383732378','Irma Laksmiwati','Ds. Supomo No. 595, Banda Aceh 22352, KepR','1997-02-08','Laki-Laki','Islam','(+62) 539 9006 4436','Aktif'),
('G008','U008','979357098','Fitriani Farida','Jr. Padang No. 98, Sibolga 56723, MalUt','1998-11-03','Laki-Laki','Islam','(+62) 288 4129 8820','Aktif'),
('G009','U009','112481377','Sadina Anastasia Wulandari S.IP','Jr. Lumban Tobing No. 161, Tangerang Selatan 34756, SulTra','1996-02-02','Perempuan','Islam','0332 4274 0616','Aktif'),
('G010','U010','294203261','Sadina Nasyiah','Psr. Peta No. 408, Tebing Tinggi 69150, Lampung','1991-05-31','Laki-Laki','Islam','0309 2642 2860','Aktif'),
('G011','U011','264981451','Kamila Farida','Gg. Kalimalang No. 642, Bitung 57097, SulTeng','1972-08-26','Laki-Laki','Islam','(+62) 264 7716 3394','Aktif'),
('G012','U012','540277969','Septi Hassanah','Jln. Bass No. 864, Medan 27161, Maluku','1980-04-02','Laki-Laki','Islam','0930 8854 774','Aktif'),
('G013','U013','318098256','Muhammad Januar','Dk. Jayawijaya No. 655, Blitar 50631, Papua','1982-08-03','Laki-Laki','Islam','(+62) 864 6738 8960','Aktif'),
('G014','U014','188268475','Hardi Habibi','Jln. Baya Kali Bungur No. 550, Surakarta 86154, SulSel','1983-06-10','Laki-Laki','Islam','0823 641 428','Aktif'),
('G015','U015','944460876','Ade Hastuti','Gg. Adisumarmo No. 602, Tarakan 82764, Papua','1993-02-04','Laki-Laki','Islam','(+62) 25 5940 0676','Aktif');

/*Table structure for table `dtjadwal` */

DROP TABLE IF EXISTS `dtjadwal`;

CREATE TABLE `dtjadwal` (
  `id_jadwal` varchar(15) NOT NULL,
  `kode_mp` varchar(15) NOT NULL,
  `id_guru` varchar(15) NOT NULL,
  `kode_kelas` varchar(15) DEFAULT NULL,
  `id_thn_ajaran` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `FK_Kode_Kelas` (`kode_kelas`),
  KEY `FK_Kode_Mapel` (`kode_mp`),
  KEY `FK_ID_Guru` (`id_guru`),
  KEY `FK_Tahun_Ajaran` (`id_thn_ajaran`),
  CONSTRAINT `FK_ID_Guru` FOREIGN KEY (`id_guru`) REFERENCES `dtguru` (`id_guru`),
  CONSTRAINT `FK_Kode_Kelas` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  CONSTRAINT `FK_Kode_Mapel` FOREIGN KEY (`kode_mp`) REFERENCES `dtmapel` (`kode_mp`),
  CONSTRAINT `FK_Tahun_Ajaran` FOREIGN KEY (`id_thn_ajaran`) REFERENCES `tahun_ajaran` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dtjadwal` */

insert  into `dtjadwal`(`id_jadwal`,`kode_mp`,`id_guru`,`kode_kelas`,`id_thn_ajaran`) values 
('JW001','KD01','G001','K001','TA001'),
('JW002','KD02','G001','K001','TA001');

/*Table structure for table `dtmapel` */

DROP TABLE IF EXISTS `dtmapel`;

CREATE TABLE `dtmapel` (
  `kode_mp` varchar(15) NOT NULL,
  `nama_mp` varchar(50) NOT NULL,
  `kkm` double NOT NULL,
  PRIMARY KEY (`kode_mp`),
  KEY `id_guru` (`kkm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dtmapel` */

insert  into `dtmapel`(`kode_mp`,`nama_mp`,`kkm`) values 
('KD01','Al Qur\'an Hadits',2.67),
('KD02','Aqidah Akhlak',2.67),
('KD03','Fikih',2.67),
('KD04','Sejarah Kebudayaan Islam',2.67),
('KD05','PPKn',2.67),
('KD06','Bahasa Indonesia',2.67),
('KD07','Bahasa Arab',2.67),
('KD08','Matematika',2.67),
('KD09','Ilmu Pengetahuan Alam',2.67),
('KD10','Ilmu Pengetahuan Sosial',2.67),
('KD11','Seni Budaya Prakarya',2.67),
('KD12','Pend Jasmani Olahraga',2.67),
('KD13','Bahasa Bali',2.67),
('KD14','Bahasa Inggris',2.67);

/*Table structure for table `dtnilai` */

DROP TABLE IF EXISTS `dtnilai`;

CREATE TABLE `dtnilai` (
  `id_nilai` varchar(15) NOT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `id_jadwal` varchar(15) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `uh1` double DEFAULT NULL,
  `uh2` double DEFAULT NULL,
  `uh3` double DEFAULT NULL,
  `uh4` double DEFAULT NULL,
  `pr1` double DEFAULT NULL,
  `pr2` double DEFAULT NULL,
  `pr3` double DEFAULT NULL,
  `pr4` double DEFAULT NULL,
  `rata_uh_pr` decimal(10,0) DEFAULT NULL,
  `uts` double DEFAULT NULL,
  `uas` double DEFAULT NULL,
  `total_peng` decimal(10,0) DEFAULT NULL,
  `rata_peng` decimal(10,0) DEFAULT NULL,
  `konversi_peng` char(2) DEFAULT NULL,
  `ket_peng` varchar(15) DEFAULT NULL,
  `uk1` double DEFAULT NULL,
  `uk2` double DEFAULT NULL,
  `uk3` double DEFAULT NULL,
  `uk4` double DEFAULT NULL,
  `rata_uk` decimal(10,0) DEFAULT NULL,
  `pro1` double DEFAULT NULL,
  `pro2` double DEFAULT NULL,
  `pro3` double DEFAULT NULL,
  `pro4` double DEFAULT NULL,
  `rata_pro` decimal(10,0) DEFAULT NULL,
  `port1` double DEFAULT NULL,
  `port2` double DEFAULT NULL,
  `port3` double DEFAULT NULL,
  `port4` double DEFAULT NULL,
  `rata_port` decimal(10,0) DEFAULT NULL,
  `total_terampil` decimal(10,0) DEFAULT NULL,
  `rata_terampil` decimal(10,0) DEFAULT NULL,
  `konversi_terampil` char(2) DEFAULT NULL,
  `ket_terampil` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `FK_NIS_Nilai` (`nis`),
  KEY `FK_Jadwal_Nilai` (`id_jadwal`),
  CONSTRAINT `FK_Jadwal_Nilai` FOREIGN KEY (`id_jadwal`) REFERENCES `dtjadwal` (`id_jadwal`),
  CONSTRAINT `FK_NIS_Nilai` FOREIGN KEY (`nis`) REFERENCES `dtsiswa` (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dtnilai` */

insert  into `dtnilai`(`id_nilai`,`nis`,`id_jadwal`,`semester`,`uh1`,`uh2`,`uh3`,`uh4`,`pr1`,`pr2`,`pr3`,`pr4`,`rata_uh_pr`,`uts`,`uas`,`total_peng`,`rata_peng`,`konversi_peng`,`ket_peng`,`uk1`,`uk2`,`uk3`,`uk4`,`rata_uk`,`pro1`,`pro2`,`pro3`,`pro4`,`rata_pro`,`port1`,`port2`,`port3`,`port4`,`rata_port`,`total_terampil`,`rata_terampil`,`konversi_terampil`,`ket_terampil`) values 
('NL001','110494528','JW001','Ganjil',80,80,75,75,75,75,75,75,76,79,80,78,3,'B+','Tuntas',75,76,78,72,75,70,80,85,79,79,75,75,75,75,75,76,3,'B+','Tuntas'),
('NL002','133561675','JW001','Genap',80,80,75,75,75,75,75,75,76,79,80,78,3,'B+','Tuntas',75,76,78,72,75,70,80,85,79,79,75,75,75,75,75,76,3,'B+','Tuntas');

/*Table structure for table `dtsiswa` */

DROP TABLE IF EXISTS `dtsiswa`;

CREATE TABLE `dtsiswa` (
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(15) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `status` char(10) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  PRIMARY KEY (`nis`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `FK_ID_Pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dtsiswa` */

insert  into `dtsiswa`(`nis`,`nama_siswa`,`tgl_lahir`,`jk`,`agama`,`alamat`,`status`,`id_pengguna`) values 
('107113747','Nalar Ardianto','2012-07-01','Perempuan','Islam','Psr. Nangka No. 775, Depok 46524, DKI','Aktif','U025'),
('110494528','Gara Prasetya Dongoran','1982-10-19','Perempuan','Islam','Ds. Abdul Muis No. 684, Bau-Bau 39224, MalUt','Aktif','U026'),
('133561675','Jessica Nuraini','2013-01-06','Laki-Laki','Islam','Jr. Bacang No. 86, Blitar 56629, Papua','Aktif','U055'),
('136461629','Jayeng Daliono Situmorang','1991-11-12','Perempuan','Islam','Kpg. Ki Hajar Dewantara No. 475, Gorontalo 79312, KalTim','Aktif','U016'),
('153183270','Almira Farida','1979-02-04','Perempuan','Islam','Kpg. Sadang Serang No. 355, Langsa 99034, KalUt','Aktif','U074'),
('156294200','Cawisadi Balidin Budiman','2008-10-04','Laki-Laki','Islam','Kpg. Raya Setiabudhi No. 548, Palembang 96004, Papua','Aktif','U091'),
('170163531','Adhiarja Iswahyudi','1970-12-14','Laki-Laki','Islam','Jr. Sutan Syahrir No. 154, Sibolga 48976, Maluku','Aktif','U047'),
('183934855','Darmana Maryanto Wibisono','1973-05-27','Laki-Laki','Islam','Dk. Suharso No. 881, Pekanbaru 67471, SulBar','Aktif','U057'),
('188732767','Vicky Uyainah','1980-05-01','Laki-Laki','Islam','Psr. Sentot Alibasa No. 703, Banda Aceh 24133, JaTim','Aktif','U059'),
('192258175','Rini Ira Astuti','2019-02-20','Laki-Laki','Islam','Jr. Tubagus Ismail No. 272, Samarinda 24278, SumSel','Aktif','U062'),
('216722731','Mursinin Prayoga','1985-12-14','Laki-Laki','Islam','Gg. Moch. Yamin No. 220, Palangka Raya 70326, Aceh','Aktif','U017'),
('220434579','Raina Astuti','1998-01-03','Perempuan','Islam','Jr. Teuku Umar No. 946, Madiun 67184, KalTim','Aktif','U041'),
('248941871','Titin Chelsea Wijayanti','2006-04-14','Laki-Laki','Islam','Jr. Bara Tambar No. 798, Ternate 88789, JaTeng','Aktif','U076'),
('257413383','Jindra Akarsana Hidayanto','1992-04-11','Laki-Laki','Islam','Ki. Nangka No. 155, Ternate 13600, Riau','Aktif','U092'),
('268150160','Yance Aryani','2020-09-12','Laki-Laki','Islam','Jr. Baja No. 472, Sorong 60358, KepR','Aktif','U071'),
('268468115','Cornelia Rina Palastri','2009-11-15','Laki-Laki','Islam','Gg. Nakula No. 840, Ambon 56983, JaBar','Aktif','U066'),
('282521641','Eka Pertiwi','2005-06-27','Perempuan','Islam','Kpg. Salatiga No. 849, Langsa 89056, SulTeng','Aktif','U090'),
('296863297','Ophelia Intan Halimah','1974-05-13','Perempuan','Islam','Jln. Muwardi No. 566, Probolinggo 46112, DKI','Aktif','U035'),
('322897270','Wulan Farida','1998-05-03','Laki-Laki','Islam','Ds. Cokroaminoto No. 124, Bekasi 35434, MalUt','Aktif','U065'),
('325297706','Balangga Kunthara Setiawan','1987-02-21','Laki-Laki','Islam','Kpg. Raya Setiabudhi No. 379, Tasikmalaya 33082, SumBar','Aktif','U097'),
('341039126','Ratih Agustina','1990-02-26','Perempuan','Islam','Kpg. Sutan Syahrir No. 57, Banda Aceh 98643, KalSel','Aktif','U086'),
('347578623','Ganep Galih Tampubolon','2013-05-25','Laki-Laki','Islam','Kpg. Lada No. 193, Bekasi 76816, SulBar','Aktif','U067'),
('366724269','Faizah Pertiwi','2005-03-29','Perempuan','Islam','Jr. Arifin No. 679, Blitar 21957, NTB','Aktif','U019'),
('371811401','Irma Ina Maryati','1978-02-03','Perempuan','Islam','Jr. Jend. Sudirman No. 152, Pagar Alam 43952, SulBar','Aktif','U038'),
('409531756','Zamira Jane Melani','2010-10-12','Perempuan','Islam','Psr. Jambu No. 857, Cimahi 15953, DKI','Aktif','U088'),
('420711423','Garda Hidayanto','1987-05-04','Perempuan','Islam','Ki. Nakula No. 187, Serang 74774, SumBar','Aktif','U089'),
('446915158','Suci Anggraini','2011-02-03','Perempuan','Islam','Jln. Cokroaminoto No. 427, Prabumulih 27272, KalUt','Aktif','U070'),
('450637990','Keisha Hastuti','1997-10-16','Perempuan','Islam','Ds. Lada No. 751, Pariaman 56658, JaTim','Aktif','U030'),
('457797877','Aisyah Pertiwi','2020-05-01','Laki-Laki','Islam','Psr. Pasir Koja No. 465, Sawahlunto 45472, DIY','Aktif','U085'),
('469464913','Dirja Endra Damanik','1986-02-16','Laki-Laki','Islam','Ki. K.H. Wahid Hasyim (Kopo) No. 446, Padangpanjang 32125, Bali','Aktif','U069'),
('474639802','Nadine Lalita Melani','2008-07-11','Perempuan','Islam','Jr. HOS. Cjokroaminoto (Pasirkaliki) No. 19, Cirebon 32770, SulBar','Aktif','U095'),
('477897917','Puspa Melinda Puspita','2011-03-03','Laki-Laki','Islam','Kpg. Siliwangi No. 196, Tasikmalaya 73636, SulUt','Aktif','U027'),
('478346673','Nalar Rajasa','1989-05-02','Laki-Laki','Islam','Ki. Moch. Ramdan No. 576, Bontang 46648, Bali','Aktif','U039'),
('506751121','Melinda Novitasari','1976-10-12','Perempuan','Islam','Dk. Casablanca No. 26, Lubuklinggau 84667, KepR','Aktif','U058'),
('527666023','Rahayu Lestari','2002-12-11','Laki-Laki','Islam','Jr. Bambu No. 682, Bukittinggi 16409, KalUt','Aktif','U042'),
('536528612','Jaiman Irawan','1978-03-05','Laki-Laki','Islam','Dk. Ki Hajar Dewantara No. 362, Metro 28836, SulUt','Aktif','U079'),
('540436656','Vanesa Uyainah','1985-11-26','Laki-Laki','Islam','Jln. Pelajar Pejuang 45 No. 258, Bontang 60099, KalUt','Aktif','U044'),
('558684524','Ade Anggraini','2010-08-10','Perempuan','Islam','Psr. Asia Afrika No. 23, Palu 59834, SulBar','Aktif','U087'),
('567729797','Maida Astuti','1993-07-15','Laki-Laki','Islam','Dk. Sentot Alibasa No. 658, Medan 27129, Banten','Aktif','U075'),
('591256537','Karsana Jabal Nugroho','2013-04-24','Perempuan','Islam','Ds. HOS. Cjokroaminoto (Pasirkaliki) No. 638, Administrasi Jakarta Barat 51847, MalUt','Aktif','U080'),
('597686110','Umaya Anggriawan','2006-06-18','Laki-Laki','Islam','Ki. Casablanca No. 505, Tasikmalaya 79039, SulSel','Aktif','U022'),
('605610584','Natalia Laksita','1997-06-18','Perempuan','Islam','Ds. Tambak No. 758, Administrasi Jakarta Timur 36217, KalTeng','Aktif','U050'),
('612672023','Anastasia Riyanti','2006-08-17','Laki-Laki','Islam','Dk. Basuki Rahmat  No. 345, Palu 56872, BaBel','Aktif','U054'),
('631483401','Gamani Sitorus','1984-08-16','Perempuan','Islam','Kpg. Kartini No. 492, Sukabumi 52781, Banten','Aktif','U082'),
('636178371','Jamalia Suartini','1994-11-16','Perempuan','Islam','Ki. Karel S. Tubun No. 975, Ternate 59228, SulBar','Aktif','U045'),
('651433427','Novi Janet Purwanti','1990-04-05','Laki-Laki','Islam','Jln. Siliwangi No. 988, Langsa 69480, Riau','Aktif','U033'),
('661094003','Prima Hutapea','1986-10-25','Laki-Laki','Islam','Psr. Moch. Toha No. 520, Madiun 82796, MalUt','Aktif','U018'),
('661109132','Mulyanto Adriansyah','2015-02-25','Laki-Laki','Islam','Gg. Siliwangi No. 530, Subulussalam 79144, JaBar','Aktif','U063'),
('666464445','Wawan Wacana','1987-05-24','Laki-Laki','Islam','Psr. R.M. Said No. 901, Tarakan 40370, NTB','Aktif','U068'),
('670824985','Samiah Paris Andriani','2013-09-08','Laki-Laki','Islam','Jln. Gotong Royong No. 759, Banjar 77413, Bali','Aktif','U024'),
('685090392','Farhunnisa Rahimah','1997-08-28','Laki-Laki','Islam','Jr. Baung No. 261, Kupang 64178, BaBel','Aktif','U029'),
('700258213','Bancar Candrakanta Tarihoran','1973-12-30','Perempuan','Islam','Jr. Suniaraja No. 554, Ternate 21564, SulBar','Aktif','U064'),
('714087540','Galak Galang Salahudin','2013-08-28','Perempuan','Islam','Ki. Orang No. 346, Prabumulih 14333, SumUt','Aktif','U077'),
('733031815','Mulyanto Mumpuni Wibowo','2018-01-09','Perempuan','Islam','Gg. Uluwatu No. 801, Batam 89930, Riau','Aktif','U048'),
('755909311','Erik Santoso','1989-07-31','Perempuan','Islam','Jln. Asia Afrika No. 656, Padangpanjang 38696, KalSel','Aktif','U061'),
('764572394','Iriana Hariyah','2007-03-06','Perempuan','Islam','Gg. Warga No. 779, Sukabumi 37882, Gorontalo','Aktif','U078'),
('771668934','Uli Mandasari','1985-08-17','Laki-Laki','Islam','Ki. Jagakarsa No. 561, Palopo 10105, KalSel','Aktif','U028'),
('773872777','Vivi Aryani','2019-10-24','Perempuan','Islam','Dk. Aceh No. 480, Bengkulu 62675, Lampung','Aktif','U037'),
('791053950','Bakijan Anom Tampubolon','2004-01-28','Perempuan','Islam','Dk. Ekonomi No. 470, Bitung 73149, KalTeng','Aktif','U051'),
('793284076','Widya Anggraini','1991-07-28','Perempuan','Islam','Jln. Krakatau No. 816, Langsa 91835, DKI','Aktif','U021'),
('798667657','Vicky Citra Puspasari','2011-02-04','Perempuan','Islam','Jln. Industri No. 699, Samarinda 57643, KalSel','Aktif','U073'),
('811389739','Ratna Maria Mulyani','2013-06-16','Perempuan','Islam','Ds. Jambu No. 286, Sabang 13305, NTB','Aktif','U056'),
('818197347','Bella Fujiati','1996-09-04','Laki-Laki','Islam','Ki. Kali No. 726, Lhokseumawe 72658, JaTeng','Aktif','U034'),
('823928189','Laila Hastuti','1971-01-29','Perempuan','Islam','Psr. Nangka No. 465, Gorontalo 10125, KalTeng','Aktif','U031'),
('841090178','Kamaria Laila Prastuti','1985-10-01','Laki-Laki','Islam','Jr. Kalimantan No. 420, Pariaman 50607, SumSel','Aktif','U053'),
('845545645','Leo Purwadi Jailani','1987-08-05','Laki-Laki','Islam','Kpg. M.T. Haryono No. 286, Jambi 11939, Papua','Aktif','U084'),
('846262188','Gangsa Megantara M.Ak','2004-06-11','Perempuan','Islam','Gg. Wahidin No. 222, Pariaman 18591, SulUt','Aktif','U043'),
('865011979','Nadine Jessica Yuliarti','2011-09-12','Perempuan','Islam','Psr. Bakhita No. 973, Padangsidempuan 83699, PapBar','Aktif','U023'),
('881553814','Elvin Saputra','2004-05-12','Laki-Laki','Islam','Jln. PHH. Mustofa No. 539, Makassar 54389, JaBar','Aktif','U046'),
('884536578','Raihan Karna Siregar','2004-12-16','Perempuan','Islam','Jln. Thamrin No. 879, Banjarmasin 15879, PapBar','Aktif','U081'),
('886016349','Luwar Widodo','1998-09-03','Laki-Laki','Islam','Gg. Abdul Muis No. 831, Batam 30602, KepR','Aktif','U049'),
('889967294','Irma Andriani','2019-02-18','Perempuan','Islam','Psr. Banal No. 130, Pekalongan 62661, Bali','Aktif','U098'),
('917287999','Jayeng Koko Mansur','2012-05-18','Laki-Laki','Islam','Gg. Bara No. 790, Depok 94972, DIY','Aktif','U100'),
('918333656','Kairav Wacana','1971-03-10','Laki-Laki','Islam','Ki. Bambon No. 176, Sawahlunto 14446, Aceh','Aktif','U099'),
('925828001','Mala Novitasari','2008-06-02','Laki-Laki','Islam','Jr. Rajawali Barat No. 507, Banda Aceh 37706, SumBar','Aktif','U036'),
('929286990','Rendy Hidayat','2010-06-12','Laki-Laki','Islam','Dk. Tubagus Ismail No. 457, Administrasi Jakarta Timur 35234, Jambi','Aktif','U072'),
('933107589','Balangga Sihombing','2020-01-09','Perempuan','Islam','Psr. Sutarto No. 988, Surabaya 39377, SumUt','Aktif','U094'),
('939198992','Elvin Anggriawan','1972-08-08','Laki-Laki','Islam','Jr. Dipatiukur No. 412, Pagar Alam 82545, Banten','Aktif','U093'),
('939661563','Ulya Novitasari','2011-03-03','Perempuan','Islam','Jr. Madiun No. 685, Sukabumi 40349, SulUt','Aktif','U060'),
('940533826','Heru Simanjuntak','1979-03-21','Laki-Laki','Islam','Ds. Orang No. 800, Mataram 21893, Papua','Aktif','U096'),
('962163000','Sarah Hasanah','1972-09-19','Perempuan','Islam','Kpg. Gardujati No. 725, Bengkulu 61810, DKI','Aktif','U040'),
('967352095','Mala Hasanah','1983-09-04','Perempuan','Islam','Kpg. Bak Mandi No. 263, Cimahi 87618, KalTim','Aktif','U020'),
('973034294','Perkasa Sihotang','2011-05-23','Laki-Laki','Islam','Jln. Baladewa No. 885, Palangka Raya 69606, SulUt','Aktif','U052'),
('974713243','Sadina Clara Usada','2018-04-17','Laki-Laki','Islam','Ki. Bagonwoto  No. 73, Tanjung Pinang 83000, SumUt','Aktif','U083'),
('999397301','Dwi Pangestu','1986-03-18','Laki-Laki','Islam','Jr. Yohanes No. 407, Kotamobagu 80232, SulTeng','Aktif','U032');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `kode_kelas` varchar(15) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`kode_kelas`,`nama_kelas`) values 
('K001','7 A'),
('K002','7 B'),
('K003','8 A'),
('K004','8 B'),
('K005','9 A'),
('K006','9 B');

/*Table structure for table `kelas_siswa` */

DROP TABLE IF EXISTS `kelas_siswa`;

CREATE TABLE `kelas_siswa` (
  `kode_kelas_siswa` varchar(15) NOT NULL,
  `kode_kelas` varchar(15) NOT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `thn_ajaran` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_kelas_siswa`),
  KEY `kode_kelas` (`kode_kelas`),
  KEY `FK_NIS` (`nis`),
  CONSTRAINT `FK_Kelas_Siswa` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  CONSTRAINT `FK_NIS` FOREIGN KEY (`nis`) REFERENCES `dtsiswa` (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas_siswa` */

insert  into `kelas_siswa`(`kode_kelas_siswa`,`kode_kelas`,`nis`,`thn_ajaran`) values 
('KS001','K001','107113747','2019/2020'),
('KS002','K001','110494528','2019/2020'),
('KS003','K001','133561675','2019/2020');

/*Table structure for table `tahun_ajaran` */

DROP TABLE IF EXISTS `tahun_ajaran`;

CREATE TABLE `tahun_ajaran` (
  `id` char(5) NOT NULL,
  `tahun_ajaran` char(10) DEFAULT NULL,
  `status` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tahun_ajaran` */

insert  into `tahun_ajaran`(`id`,`tahun_ajaran`,`status`) values 
('TA001','2019/2020','Aktif'),
('TA002','2020/2021','Non Aktif');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_pengguna` varchar(15) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_pengguna`,`username`,`password`,`level`) values 
('U001','gr1','gr1','guru'),
('U002','admin','admin','admin'),
('U003','gr3','gr3','guru'),
('U004','gr4','gr4','guru'),
('U005','gr5','gr5','guru'),
('U006','gr6','gr6','guru'),
('U007','gr7','gr7','guru'),
('U008','gr8','gr8','guru'),
('U009','gr9','gr9','guru'),
('U010','gr10','gr10','guru'),
('U011','gr11','gr11','guru'),
('U012','gr12','gr12','guru'),
('U013','gr13','gr13','guru'),
('U014','gr14','gr14','guru'),
('U015','gr15','gr15','guru'),
('U016','sw1','sw1','siswa'),
('U017','sw2','sw2','siswa'),
('U018','sw3','sw3','siswa'),
('U019','sw4','sw4','siswa'),
('U020','sw5','sw5','siswa'),
('U021','sw6','sw6','siswa'),
('U022','sw7','sw7','siswa'),
('U023','sw8','sw8','siswa'),
('U024','sw9','sw9','siswa'),
('U025','sw10','sw10','siswa'),
('U026','sw11','sw11','siswa'),
('U027','sw12','sw12','siswa'),
('U028','sw13','sw13','siswa'),
('U029','sw14','sw14','siswa'),
('U030','sw15','sw15','siswa'),
('U031','sw16','sw16','siswa'),
('U032','sw17','sw17','siswa'),
('U033','sw18','sw18','siswa'),
('U034','sw19','sw19','siswa'),
('U035','sw20','sw20','siswa'),
('U036','sw21','sw21','siswa'),
('U037','sw22','sw22','siswa'),
('U038','sw23','sw23','siswa'),
('U039','sw24','sw24','siswa'),
('U040','sw25','sw25','siswa'),
('U041','sw26','sw26','siswa'),
('U042','sw27','sw27','siswa'),
('U043','sw28','sw28','siswa'),
('U044','sw29','sw29','siswa'),
('U045','sw30','sw30','siswa'),
('U046','sw31','sw31','siswa'),
('U047','sw32','sw32','siswa'),
('U048','sw33','sw33','siswa'),
('U049','sw34','sw34','siswa'),
('U050','sw35','sw35','siswa'),
('U051','sw36','sw36','siswa'),
('U052','sw37','sw37','siswa'),
('U053','sw38','sw38','siswa'),
('U054','sw39','sw39','siswa'),
('U055','sw40','sw40','siswa'),
('U056','sw41','sw41','siswa'),
('U057','sw42','sw42','siswa'),
('U058','sw43','sw43','siswa'),
('U059','sw44','sw44','siswa'),
('U060','sw45','sw45','siswa'),
('U061','sw46','sw46','siswa'),
('U062','sw47','sw47','siswa'),
('U063','sw48','sw48','siswa'),
('U064','sw49','sw49','siswa'),
('U065','sw50','sw50','siswa'),
('U066','sw51','sw51','siswa'),
('U067','sw52','sw52','siswa'),
('U068','sw53','sw53','siswa'),
('U069','sw54','sw54','siswa'),
('U070','sw55','sw55','siswa'),
('U071','sw56','sw56','siswa'),
('U072','sw57','sw57','siswa'),
('U073','sw58','sw58','siswa'),
('U074','sw59','sw59','siswa'),
('U075','sw60','sw60','siswa'),
('U076','sw61','sw61','siswa'),
('U077','sw62','sw62','siswa'),
('U078','sw63','sw63','siswa'),
('U079','sw64','sw64','siswa'),
('U080','sw65','sw65','siswa'),
('U081','sw66','sw66','siswa'),
('U082','sw67','sw67','siswa'),
('U083','sw68','sw68','siswa'),
('U084','sw69','sw69','siswa'),
('U085','sw70','sw70','siswa'),
('U086','sw71','sw71','siswa'),
('U087','sw72','sw72','siswa'),
('U088','sw73','sw73','siswa'),
('U089','sw74','sw74','siswa'),
('U090','sw75','sw75','siswa'),
('U091','sw76','sw76','siswa'),
('U092','sw77','sw77','siswa'),
('U093','sw78','sw78','siswa'),
('U094','sw79','sw79','siswa'),
('U095','sw80','sw80','siswa'),
('U096','sw81','sw81','siswa'),
('U097','sw82','sw82','siswa'),
('U098','sw83','sw83','siswa'),
('U099','sw84','sw84','siswa'),
('U100','sw85','sw85','siswa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
