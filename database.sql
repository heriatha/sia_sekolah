-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2012 at 06:52 AM
-- Server version: 5.1.33
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_raporsiswa_v01`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKadministra228622` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--


-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'asdsa'),
(3, ''),
(4, ''),
(5, 'sa');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE IF NOT EXISTS `ekstrakurikuler` (
  `id` int(10) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstrakurikuler`
--


-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `instansi_pendidikan_terakhir` varchar(20) DEFAULT NULL,
  `jurusan_pendidikan_terakhir` varchar(20) DEFAULT NULL,
  `is_pegawai_tetap` tinyint(1) DEFAULT NULL,
  `tahunLulus` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_agama` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip_guru` (`nip`),
  KEY `FKguru643777` (`id_user`),
  KEY `FKguru3226` (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `guru`
--


-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(10) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--


-- --------------------------------------------------------

--
-- Table structure for table `kategori_mapel`
--

CREATE TABLE IF NOT EXISTS `kategori_mapel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) DEFAULT NULL,
  `id_kurikulum` int(10) DEFAULT NULL,
  `id_kategori_parent` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK6BF736BD4EAE4B98` (`id_kategori_parent`),
  KEY `FK6BF736BD19BB081F` (`id_kurikulum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kategori_mapel`
--


-- --------------------------------------------------------

--
-- Table structure for table `kategori_mapel_ref`
--

CREATE TABLE IF NOT EXISTS `kategori_mapel_ref` (
  `id_kategori` int(10) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  PRIMARY KEY (`id_kategori`,`id_mapel`),
  UNIQUE KEY `kategori_id` (`id_kategori`,`id_mapel`),
  KEY `FK28DD703E969C045F` (`id_kategori`),
  KEY `FK28DD703E88DB2322` (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_mapel_ref`
--


-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) DEFAULT NULL,
  `id_jurusan` int(10) DEFAULT NULL,
  `id_kurikulum` int(10) DEFAULT NULL,
  `id_semester` int(10) DEFAULT NULL,
  `id_tingkat_kelas` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kurikulum` (`id_kurikulum`,`id_semester`,`id_jurusan`,`id_tingkat_kelas`),
  KEY `FK4506DE4F69C796E` (`id_jurusan`),
  KEY `FK4506DE4EA545C40` (`id_kurikulum`),
  KEY `FK4506DE430F77624` (`id_semester`),
  KEY `FK4506DE4A53E543A` (`id_tingkat_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kelas`
--


-- --------------------------------------------------------

--
-- Table structure for table `kelasaktif`
--

CREATE TABLE IF NOT EXISTS `kelasaktif` (
  `id` int(11) NOT NULL,
  `kuota` int(10) NOT NULL,
  `keterangan` varchar(32) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_tahun_ajaran` int(10) NOT NULL,
  `id_guru_walikelas` int(10) NOT NULL,
  `id_kelas_paralel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelas_ta_const` (`id_kelas`,`id_tahun_ajaran`,`id_guru_walikelas`,`id_kelas_paralel`),
  UNIQUE KEY `tahunAjaran` (`id_tahun_ajaran`,`id_guru_walikelas`),
  KEY `FKB6C2FCA362A78BC4` (`id_guru_walikelas`),
  KEY `FKB6C2FCA34447A820` (`id_kelas`),
  KEY `FKB6C2FCA37E63A462` (`id_tahun_ajaran`),
  KEY `FKkelasaktif652984` (`id_kelas_paralel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelasaktif`
--


-- --------------------------------------------------------

--
-- Table structure for table `kelas_paralel`
--

CREATE TABLE IF NOT EXISTS `kelas_paralel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kelas_paralel`
--


-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE IF NOT EXISTS `kurikulum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `diskripsi` varchar(50) DEFAULT NULL,
  `tahun` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kurikulum`
--


-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `id` int(11) NOT NULL,
  `kd_mapel` varchar(10) DEFAULT NULL,
  `diskripsi` varchar(50) DEFAULT NULL,
  `kkm` int(10) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `id_kategori` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_mapel` (`kd_mapel`),
  KEY `FK859F5D9DA544D445` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--


-- --------------------------------------------------------

--
-- Table structure for table `mapel_kelas_aktif`
--

CREATE TABLE IF NOT EXISTS `mapel_kelas_aktif` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_guru_pengampu` int(10) DEFAULT NULL,
  `id_kelas_aktif` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_kelas_aktif` (`id_kelas_aktif`),
  UNIQUE KEY `id_mapel` (`id_mapel`),
  KEY `FK66D3BA00FDF94991` (`id_guru_pengampu`),
  KEY `FK66D3BA00119267DA` (`id_kelas_aktif`),
  KEY `FK66D3BA0041B77D91` (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mapel_kelas_aktif`
--


-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran_kelas_ref`
--

CREATE TABLE IF NOT EXISTS `matapelajaran_kelas_ref` (
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`,`id_mapel`),
  UNIQUE KEY `kelas_id` (`id_kelas`,`id_mapel`),
  KEY `FK8F1E83D6A775C2C8` (`id_kelas`),
  KEY `FK8F1E83D67CAA0E28` (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran_kelas_ref`
--


-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekstrakurikuler`
--

CREATE TABLE IF NOT EXISTS `nilai_ekstrakurikuler` (
  `predikat` varchar(15) DEFAULT NULL,
  `id_rapor` int(10) NOT NULL DEFAULT '0',
  `id_ekstrakurikuler` int(10) NOT NULL,
  PRIMARY KEY (`id_rapor`,`id_ekstrakurikuler`),
  KEY `FKFDF42E0C2E42CC3A` (`id_ekstrakurikuler`),
  KEY `FKFDF42E0C5852C04B` (`id_rapor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_ekstrakurikuler`
--


-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE IF NOT EXISTS `nilai_siswa` (
  `deskripsi_kemajuan_belajar` varchar(32) DEFAULT NULL,
  `nilai` int(10) NOT NULL,
  `terbilang` varchar(32) DEFAULT NULL,
  `id_rapor` int(10) NOT NULL DEFAULT '0',
  `id_matapelajaran_kelas_aktif` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rapor`,`id_matapelajaran_kelas_aktif`),
  KEY `FKD49D520EF6AB260C` (`id_matapelajaran_kelas_aktif`),
  KEY `FKD49D520E5852C04B` (`id_rapor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--


-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_terakhir`
--

CREATE TABLE IF NOT EXISTS `pendidikan_terakhir` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pendidikan_terakhir`
--


-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE IF NOT EXISTS `rapor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catatan_orang_tua` varchar(255) DEFAULT NULL,
  `kelakuan` varchar(15) DEFAULT NULL,
  `kerajinan` varchar(15) DEFAULT NULL,
  `kerapian` varchar(15) DEFAULT NULL,
  `pernyataan` varchar(255) DEFAULT NULL,
  `rangking` int(10) NOT NULL,
  `status` varchar(5) DEFAULT NULL,
  `alpha` int(10) NOT NULL,
  `ijin` int(10) NOT NULL,
  `sakit` int(10) NOT NULL,
  `id_kelas_aktif` int(11) DEFAULT NULL,
  `id_siswa` int(10) DEFAULT NULL,
  `id_tahun_ajaran` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siswa` (`id_siswa`,`id_tahun_ajaran`),
  KEY `FK4B151A4119267DA` (`id_kelas_aktif`),
  KEY `FK4B151A49FC9130E` (`id_siswa`),
  KEY `FK4B151A47E63A462` (`id_tahun_ajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rapor`
--


-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE IF NOT EXISTS `sekolah` (
  `id` varchar(7) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(20) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `nss` varchar(32) DEFAULT NULL,
  `provinsi` varchar(20) DEFAULT NULL,
  `id_guru_kepsek` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKD916967DFAB6A0A4` (`id_guru_kepsek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--


-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `semester` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 'I'),
(2, 'II');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(10) NOT NULL,
  `nis` varchar(13) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(32) DEFAULT NULL,
  `alamat_siswa` varchar(50) DEFAULT NULL,
  `danem` int(10) NOT NULL,
  `no_ijazah` varchar(25) DEFAULT NULL,
  `sekolah_asal` varchar(32) DEFAULT NULL,
  `alamat_sekolah_asal` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `tahun_ijazah` varchar(14) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `id_tingkat_kelas_diterima` int(10) DEFAULT NULL,
  `jurusan_idJurusan` int(10) DEFAULT NULL,
  `id_tahun_ajaran_diterima` int(10) DEFAULT NULL,
  `nama_ayah` int(11) DEFAULT NULL,
  `alamat_ayah` int(11) DEFAULT NULL,
  `pendidikan_ayah` int(11) DEFAULT NULL,
  `pekerjaan_ayah` int(11) DEFAULT NULL,
  `penghasilan_ayah` int(11) DEFAULT NULL,
  `nama_ibu` int(11) DEFAULT NULL,
  `alamat_ibu` int(11) DEFAULT NULL,
  `pendidikan_ibu` int(11) DEFAULT NULL,
  `pekerjaan_ibu` int(11) DEFAULT NULL,
  `penghasilan_ibu` int(11) DEFAULT NULL,
  `nama_wali` int(11) DEFAULT NULL,
  `hubungan_dengan_wali` int(11) DEFAULT NULL,
  `alamat_wali` int(11) DEFAULT NULL,
  `pendidikan_wali` int(11) DEFAULT NULL,
  `pekerjaan_wali` int(11) DEFAULT NULL,
  `penghasilan_wali` int(11) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nis_siswa` (`nis`),
  UNIQUE KEY `nis` (`nis`),
  KEY `FK4C31847C767B046` (`jurusan_idJurusan`),
  KEY `FK4C31847C29C5F64` (`id_tahun_ajaran_diterima`),
  KEY `FK4C31847DE756BAE` (`id_tingkat_kelas_diterima`),
  KEY `FKsiswa740409` (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--


-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_semester` int(10) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `is_aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK5071203B30F77624` (`id_semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `id_semester`, `tahun_ajaran`, `is_aktif`) VALUES
(7, 1, 'jkn', 0),
(8, 2, '2012/2013', 0),
(11, 2, '2012/2014', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_kelas`
--

CREATE TABLE IF NOT EXISTS `tingkat_kelas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tingkat_kelas`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `FKadministra228622` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `FKguru3226` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`),
  ADD CONSTRAINT `FKguru643777` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `kategori_mapel`
--
ALTER TABLE `kategori_mapel`
  ADD CONSTRAINT `FK6BF736BD19BB081F` FOREIGN KEY (`id_kurikulum`) REFERENCES `kurikulum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK6BF736BD4EAE4B98` FOREIGN KEY (`id_kategori_parent`) REFERENCES `kategori_mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kategori_mapel_ref`
--
ALTER TABLE `kategori_mapel_ref`
  ADD CONSTRAINT `FK28DD703E88DB2322` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK28DD703E969C045F` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK4506DE430F77624` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4506DE4A53E543A` FOREIGN KEY (`id_tingkat_kelas`) REFERENCES `tingkat_kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4506DE4EA545C40` FOREIGN KEY (`id_kurikulum`) REFERENCES `kurikulum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4506DE4F69C796E` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kelasaktif`
--
ALTER TABLE `kelasaktif`
  ADD CONSTRAINT `FKB6C2FCA34447A820` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKB6C2FCA362A78BC4` FOREIGN KEY (`id_guru_walikelas`) REFERENCES `guru` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKB6C2FCA37E63A462` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKkelasaktif652984` FOREIGN KEY (`id_kelas_paralel`) REFERENCES `kelas_paralel` (`id`);

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `FK859F5D9DA544D445` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mapel_kelas_aktif`
--
ALTER TABLE `mapel_kelas_aktif`
  ADD CONSTRAINT `FK66D3BA00119267DA` FOREIGN KEY (`id_kelas_aktif`) REFERENCES `kelasaktif` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK66D3BA0041B77D91` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK66D3BA00FDF94991` FOREIGN KEY (`id_guru_pengampu`) REFERENCES `guru` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `matapelajaran_kelas_ref`
--
ALTER TABLE `matapelajaran_kelas_ref`
  ADD CONSTRAINT `FK8F1E83D67CAA0E28` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK8F1E83D6A775C2C8` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nilai_ekstrakurikuler`
--
ALTER TABLE `nilai_ekstrakurikuler`
  ADD CONSTRAINT `FKFDF42E0C2E42CC3A` FOREIGN KEY (`id_ekstrakurikuler`) REFERENCES `ekstrakurikuler` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKFDF42E0C5852C04B` FOREIGN KEY (`id_rapor`) REFERENCES `rapor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `FKD49D520E5852C04B` FOREIGN KEY (`id_rapor`) REFERENCES `rapor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKD49D520EF6AB260C` FOREIGN KEY (`id_matapelajaran_kelas_aktif`) REFERENCES `mapel_kelas_aktif` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rapor`
--
ALTER TABLE `rapor`
  ADD CONSTRAINT `FK4B151A4119267DA` FOREIGN KEY (`id_kelas_aktif`) REFERENCES `kelasaktif` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4B151A47E63A462` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4B151A49FC9130E` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `FKD916967DFAB6A0A4` FOREIGN KEY (`id_guru_kepsek`) REFERENCES `guru` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK4C31847C29C5F64` FOREIGN KEY (`id_tahun_ajaran_diterima`) REFERENCES `tahun_ajaran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4C31847C767B046` FOREIGN KEY (`jurusan_idJurusan`) REFERENCES `jurusan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4C31847DE756BAE` FOREIGN KEY (`id_tingkat_kelas_diterima`) REFERENCES `tingkat_kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKsiswa740409` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`);

--
-- Constraints for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD CONSTRAINT `FK5071203B30F77624` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
