-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 03:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdnsungaimiai5bjm`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `idAbsenSiswa` varchar(20) NOT NULL,
  `kodeJadwal` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kehadiran` varchar(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `akuntan`
--

CREATE TABLE `akuntan` (
  `idAkuntan` int(11) NOT NULL,
  `idTahunAjaran` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kredit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `jenisDana` int(11) NOT NULL,
  `fk` varchar(20) NOT NULL,
  `idGuru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akuntan`
--

INSERT INTO `akuntan` (`idAkuntan`, `idTahunAjaran`, `keterangan`, `kredit`, `debit`, `jenisDana`, `fk`, `idGuru`) VALUES
(101, 2, 'Dana Bos Masuk', 100000000, 0, 2, '', ''),
(102, 2, 'Honor Pengajar', 0, 3000000, 2, '62ce4ae65a44a', '62acc4f5ee194'),
(103, 2, 'Dana Bos Nasional dari Pemerintah', 0, 5000000, 2, '62ce4cb6cbeb3', '62acc60b61bbb'),
(104, 2, 'Honor TU', 0, 5000000, 2, '62ce4ccddfb34', '62acd172653c6');

-- --------------------------------------------------------

--
-- Table structure for table `danamasuk`
--

CREATE TABLE `danamasuk` (
  `idDanaMasuk` varchar(20) NOT NULL,
  `idTahunAjaran` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danamasuk`
--

INSERT INTO `danamasuk` (`idDanaMasuk`, `idTahunAjaran`, `jenis`, `jumlah`, `keterangan`) VALUES
('62ce4ac2ee453', 2, 2, 50000000, 'Dana Bos Nasional dari Pemerintah');

--
-- Triggers `danamasuk`
--
DELIMITER $$
CREATE TRIGGER `add_dn` AFTER INSERT ON `danamasuk` FOR EACH ROW BEGIN 
INSERT 
INTO neraca SET
idTamu = NEW.idDanaMasuk,
keterangan=new.keterangan,
kredit = NEW.jumlah;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_dn` AFTER UPDATE ON `danamasuk` FOR EACH ROW BEGIN 
UPDATE neraca SET 
idTamu = NEW.idDanaMasuk,
kredit = kredit-OLD.jumlah,
kredit = kredit+NEW.jumlah
WHERE
idTamu = NEW.idDanaMasuk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_dn` AFTER DELETE ON `danamasuk` FOR EACH ROW BEGIN 
DELETE FROM neraca
WHERE
idTamu = old.idDanaMasuk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idGuru` varchar(20) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `nik` varchar(16) NOT NULL,
  `namaGuru` varchar(128) NOT NULL,
  `jk` enum('L','P','','') NOT NULL,
  `tempatLahir` varchar(128) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `agama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tugasTambahan` varchar(128) NOT NULL,
  `idJenisPtk` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `statusGuru` enum('0','1','','') NOT NULL,
  `dateCreated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idGuru`, `nip`, `password`, `nik`, `namaGuru`, `jk`, `tempatLahir`, `tanggalLahir`, `agama`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `noTelp`, `email`, `tugasTambahan`, `idJenisPtk`, `foto`, `statusGuru`, `dateCreated`) VALUES
('62acc4f5ee194', '19630301 198503 2 012', '$2y$10$9SH4yLGrJUA4nM2q7QU7iOBojiODDemS.3w5n8fQUDf0WWFgJzEAS', '6309020407097002', 'Hj. Rusmalina, S.Pd., MM', 'P', 'Longawang', '1963-12-24', 'Islam', 'Jl. Handil Bakti Raya Pesona Indah', '08', '01', 'Barito', 'Barito Kuala', 'Barito Kuala', '081251898990', 'rusmalina@gmail.com', '-', 1, '279860932_407170168081950_6545682480426208850_n.jpg', '1', 1655489815),
('62acc60b61bbb', '19810930 200701 2 013', '$2y$10$5Jor2wWtg7GF5S5Po1zG9ODN.T2R5/fmJYREjLaMs9CBYNjrhsCja', '6309020407097002', 'Sanawati, S.Pd.,SD', 'P', 'Laiyolo', '1981-09-30', 'Islam', 'Jl. Jahri Saleh, Komp. Kenanga Indah ', '08', '01', 'Jahri Saleh', 'Banjarmasin Tengah', 'Banjarmasin', '081251898990', 'sanawati@gmail.com', '', 2, '286407642_3097630967168101_5867907648036932842_n.jpg', '1', 1655490059),
('62acd172653c6', '19860822 200903 2 009', '$2y$10$VgpKRuu1t4PDtkUAIFKNt.VXkqNdhdugBKPIYwTlsTBZlrxnyHbRq', '6309020407097003', 'Lisdawati, S.Pd', 'P', 'Banjarmasin', '1986-08-22', 'Islam', 'Jl. Bakti Utama No 1', '08', '01', 'Jahri Saleh', 'Banjarmasin Tengah', 'Banjarmasin', '081251898991', 'lisdawati@gmail.com', '-', 3, '279860932_407170168081950_6545682480426208850_n1.jpg', '1', 1655492978),
('62ada1a48e88b', '19631224 198503 1 012', '$2y$10$G3mVY2wlVEITMLKyf8/P9.2rMc8AEahoW4q5gpZ7MIPbG743bS5lG', '6309020407097006', 'Said Ismail, S.Pd', 'L', 'Banjarmasin', '1963-12-24', 'Islam', 'Jl. Cemara Raya Komp. Tanjung', '09', '04', 'Cemara raya', 'Banjarmasin Tengah', 'Banjarmasin', '082150508989', 'saidismail@gmail.com', '', 17, '63224e95fb803683776e251afdad97bf.jpg', '1', 1655546276);

-- --------------------------------------------------------

--
-- Table structure for table `honorarium`
--

CREATE TABLE `honorarium` (
  `idHonorarium` varchar(20) NOT NULL,
  `idTahunAjaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenisHonorarium` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `honorarium`
--

INSERT INTO `honorarium` (`idHonorarium`, `idTahunAjaran`, `tanggal`, `jenisHonorarium`, `keterangan`) VALUES
('62ce4ae65a44a', 2, '2022-07-01', 'hpengajar', 'Honor Pengajar'),
('62ce4cb6cbeb3', 2, '2022-07-01', 'hwalikelas', 'Dana Bos Nasional dari Pemerintah'),
('62ce4ccddfb34', 2, '2022-07-13', 'htatausaha', 'Honor TU');

-- --------------------------------------------------------

--
-- Table structure for table `h_pengajar`
--

CREATE TABLE `h_pengajar` (
  `idPengajar` int(11) NOT NULL,
  `idHonorarium` varchar(20) NOT NULL,
  `idGuru` varchar(20) NOT NULL,
  `honor` int(11) NOT NULL,
  `jenisDana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h_pengajar`
--

INSERT INTO `h_pengajar` (`idPengajar`, `idHonorarium`, `idGuru`, `honor`, `jenisDana`) VALUES
(26, '62ce4ae65a44a', '62acc4f5ee194', 3000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `h_tatausaha`
--

CREATE TABLE `h_tatausaha` (
  `idTataUsaha` int(11) NOT NULL,
  `idHonorarium` varchar(20) NOT NULL,
  `idGuru` varchar(20) NOT NULL,
  `honor` int(11) NOT NULL,
  `jenisDana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h_tatausaha`
--

INSERT INTO `h_tatausaha` (`idTataUsaha`, `idHonorarium`, `idGuru`, `honor`, `jenisDana`) VALUES
(11, '62ce4ccddfb34', '62acd172653c6', 5000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `h_walikelas`
--

CREATE TABLE `h_walikelas` (
  `idWaliKelas` int(11) NOT NULL,
  `idHonorarium` varchar(20) NOT NULL,
  `idGuru` varchar(20) NOT NULL,
  `honor` int(11) NOT NULL,
  `jenisDana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h_walikelas`
--

INSERT INTO `h_walikelas` (`idWaliKelas`, `idHonorarium`, `idGuru`, `honor`, `jenisDana`) VALUES
(14, '62ce4cb6cbeb3', '62acc60b61bbb', 5000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `kodeJadwal` varchar(20) NOT NULL,
  `kodeTahun` varchar(20) NOT NULL,
  `kodeKelas` varchar(10) NOT NULL,
  `kodeMapel` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `jamMulai` time NOT NULL,
  `jamSelesai` time NOT NULL,
  `namaHari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`kodeJadwal`, `kodeTahun`, `kodeKelas`, `kodeMapel`, `nip`, `jamMulai`, `jamSelesai`, `namaHari`) VALUES
('62baf166b0fab', '10', 'I.A', 'MP01', '', '08:00:00', '10:00:00', 'Senin'),
('62baf52278972', '10', 'I.A', 'MP02', '', '08:00:00', '10:00:00', 'Selasa'),
('62cea34d9adbe', '1', 'I.B', 'MP01', '', '08:00:00', '12:00:00', 'Senin'),
('62cea3a8541c6', '10', 'I.B', 'MP01', '', '08:00:00', '12:00:00', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ptk`
--

CREATE TABLE `jenis_ptk` (
  `idJenisPtk` int(11) NOT NULL,
  `jenisPtk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_ptk`
--

INSERT INTO `jenis_ptk` (`idJenisPtk`, `jenisPtk`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Guru Umum'),
(3, 'Bendahara'),
(17, 'Guru Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idKelas` varchar(20) NOT NULL,
  `kodeKelas` varchar(50) NOT NULL,
  `namaKelas` varchar(128) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `isActive` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `kodeKelas`, `namaKelas`, `nip`, `isActive`) VALUES
('62adb3142db26', 'I.A', 'Kelas Satu A', '19810930 200701 2 013', '1'),
('62adb3260a92e', 'I.B', 'Kelas Satu B', '19860822 200903 2 009', '1'),
('62adb3426a224', 'II.A', 'Kelas Dua A', '19631224 198503 1 012', '1'),
('62adb35915762', 'II.B', 'Kelas Dua B', '19630301 198503 2 012', '1'),
('62ae8ea07e981', 'III.A', 'Kelas Tiga A', '19631224 198503 1 012', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_mapel`
--

CREATE TABLE `kelompok_mapel` (
  `idKelompokMapel` int(11) NOT NULL,
  `jenisKelompokMapel` varchar(50) NOT NULL,
  `namaKelompokMapel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok_mapel`
--

INSERT INTO `kelompok_mapel` (`idKelompokMapel`, `jenisKelompokMapel`, `namaKelompokMapel`) VALUES
(1, 'A', 'Kelompok A (Umum)'),
(2, 'B', 'Kelompok B (Umum)');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kodeMapel` varchar(20) NOT NULL,
  `idKelompokMapel` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `namaMapel` varchar(128) NOT NULL,
  `jumlahJam` varchar(20) NOT NULL,
  `isActive` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kodeMapel`, `idKelompokMapel`, `nip`, `namaMapel`, `jumlahJam`, `isActive`) VALUES
('MP01', 1, '19810930 200701 2 013', 'Matematika', '2', '1'),
('MP02', 1, '19860822 200903 2 009', 'Bahasa Indonesia', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `neraca`
--

CREATE TABLE `neraca` (
  `idNeraca` int(11) NOT NULL,
  `idTamu` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `neraca`
--

INSERT INTO `neraca` (`idNeraca`, `idTamu`, `tanggal`, `keterangan`, `debit`, `kredit`) VALUES
(20, '62ce4ac2ee453', '0000-00-00', 'Dana Bos Nasional dari Pemerintah', 0, 50000000);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_keterampilan`
--

CREATE TABLE `nilai_keterampilan` (
  `idNilaiKeterampilan` varchar(20) NOT NULL,
  `kodeTahun` varchar(20) NOT NULL,
  `kodeJadwal` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nilaiuh` float NOT NULL,
  `nilaiuts` float NOT NULL,
  `nilaiuas` float NOT NULL,
  `rerata` float NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pengetahuan`
--

CREATE TABLE `nilai_pengetahuan` (
  `idNilaiPengetahuan` varchar(20) NOT NULL,
  `kodeTahun` varchar(20) NOT NULL,
  `kodeJadwal` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nilaiuh` float NOT NULL,
  `nilaiuts` float NOT NULL,
  `nilaiuas` float NOT NULL,
  `rerata` float NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `namaSiswa` varchar(128) NOT NULL,
  `jk` enum('L','P','','') NOT NULL,
  `tempatLahir` varchar(100) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `statusKeluarga` varchar(128) NOT NULL,
  `anakKe` varchar(20) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `asalTk` varchar(128) NOT NULL,
  `namaAyah` varchar(128) NOT NULL,
  `pekerjaanAyah` varchar(128) NOT NULL,
  `alamatAyah` text NOT NULL,
  `noHpAyah` varchar(15) NOT NULL,
  `namaIbu` varchar(128) NOT NULL,
  `pekerjaanIbu` varchar(128) NOT NULL,
  `alamatIbu` text NOT NULL,
  `noHpIbu` varchar(15) NOT NULL,
  `namaWali` varchar(128) NOT NULL,
  `alamatWali` text NOT NULL,
  `noHpWali` varchar(15) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `kodeKelas` varchar(50) NOT NULL,
  `roleId` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `dateCreated` int(11) NOT NULL,
  `validate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `nisn`, `nis`, `password`, `namaSiswa`, `jk`, `tempatLahir`, `tanggalLahir`, `statusKeluarga`, `anakKe`, `agama`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `noTelp`, `foto`, `asalTk`, `namaAyah`, `pekerjaanAyah`, `alamatAyah`, `noHpAyah`, `namaIbu`, `pekerjaanIbu`, `alamatIbu`, `noHpIbu`, `namaWali`, `alamatWali`, `noHpWali`, `angkatan`, `kodeKelas`, `roleId`, `isActive`, `dateCreated`, `validate`) VALUES
('62ce5c7ee4a0d', '12345', '12345', '$2y$10$ioZ/YjBH6PgP3EkzU.glr.roeVCSP77lT9Hlru2QOVUGbDI2N0VKa', 'Uchiha Yamato', 'L', 'Banjarmasin', '1998-07-20', 'Anak Kandung', '1', 'Islam', 'Jl. in aja dulu, siapa tau betah', '08', '01', 'Melati', 'Barito Kuala', 'Banjarmasin Timur', '081251898990', '279860932_407170168081950_6545682480426208850_n.jpg', 'Tadika Mesra', 'Abah', 'Pegawai Swasta', 'Jl Bakti Utama No 10', '085156362232', 'Mama', 'Ibu Rumah Tangga', 'Jl Bakti Utama No 10', '081237412632', 'Abah', 'Jl Bakti Utama No 10', '085156362232', '2021', 'I.B', 3, 1, 1657691263, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `idTahunAjaran` int(11) NOT NULL,
  `tahunAjaran` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`idTahunAjaran`, `tahunAjaran`, `status`) VALUES
(1, '2019/2020', 0),
(2, '2020/2021', 1),
(10, '2021/2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `roleId` int(11) NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noWa` varchar(20) NOT NULL,
  `isActive` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `username`, `password`, `roleId`, `namaLengkap`, `email`, `noWa`, `isActive`, `foto`) VALUES
('5f269419c1055', 'admin', '$2y$10$yGds8D96c7Ce/arpaA02SOz9Emj1zJoSEOPPHiO85KQhu3dLIZruq', 1, 'Shinta Permatasari', 'shintapermatasari@gmail.com', '081223231212', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`idAbsenSiswa`);

--
-- Indexes for table `akuntan`
--
ALTER TABLE `akuntan`
  ADD PRIMARY KEY (`idAkuntan`);

--
-- Indexes for table `danamasuk`
--
ALTER TABLE `danamasuk`
  ADD PRIMARY KEY (`idDanaMasuk`),
  ADD KEY `idTahunAjaran` (`idTahunAjaran`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idGuru`);

--
-- Indexes for table `honorarium`
--
ALTER TABLE `honorarium`
  ADD PRIMARY KEY (`idHonorarium`),
  ADD KEY `idTahunAjaran` (`idTahunAjaran`);

--
-- Indexes for table `h_pengajar`
--
ALTER TABLE `h_pengajar`
  ADD PRIMARY KEY (`idPengajar`),
  ADD UNIQUE KEY `idGuru` (`idGuru`),
  ADD KEY `idHonorarium` (`idHonorarium`),
  ADD KEY `idPegawai` (`idGuru`);

--
-- Indexes for table `h_tatausaha`
--
ALTER TABLE `h_tatausaha`
  ADD PRIMARY KEY (`idTataUsaha`),
  ADD KEY `idHonorarium` (`idHonorarium`),
  ADD KEY `idPegawai` (`idGuru`);

--
-- Indexes for table `h_walikelas`
--
ALTER TABLE `h_walikelas`
  ADD PRIMARY KEY (`idWaliKelas`),
  ADD KEY `idHonorarium` (`idHonorarium`),
  ADD KEY `idPegawai` (`idGuru`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`kodeJadwal`);

--
-- Indexes for table `jenis_ptk`
--
ALTER TABLE `jenis_ptk`
  ADD PRIMARY KEY (`idJenisPtk`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idKelas`);

--
-- Indexes for table `kelompok_mapel`
--
ALTER TABLE `kelompok_mapel`
  ADD PRIMARY KEY (`idKelompokMapel`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kodeMapel`);

--
-- Indexes for table `neraca`
--
ALTER TABLE `neraca`
  ADD PRIMARY KEY (`idNeraca`);

--
-- Indexes for table `nilai_keterampilan`
--
ALTER TABLE `nilai_keterampilan`
  ADD PRIMARY KEY (`idNilaiKeterampilan`);

--
-- Indexes for table `nilai_pengetahuan`
--
ALTER TABLE `nilai_pengetahuan`
  ADD PRIMARY KEY (`idNilaiPengetahuan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`idTahunAjaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akuntan`
--
ALTER TABLE `akuntan`
  MODIFY `idAkuntan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `h_pengajar`
--
ALTER TABLE `h_pengajar`
  MODIFY `idPengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `h_tatausaha`
--
ALTER TABLE `h_tatausaha`
  MODIFY `idTataUsaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `h_walikelas`
--
ALTER TABLE `h_walikelas`
  MODIFY `idWaliKelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jenis_ptk`
--
ALTER TABLE `jenis_ptk`
  MODIFY `idJenisPtk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelompok_mapel`
--
ALTER TABLE `kelompok_mapel`
  MODIFY `idKelompokMapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `neraca`
--
ALTER TABLE `neraca`
  MODIFY `idNeraca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `idTahunAjaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danamasuk`
--
ALTER TABLE `danamasuk`
  ADD CONSTRAINT `danamasuk_ibfk_1` FOREIGN KEY (`idTahunAjaran`) REFERENCES `tahunajaran` (`idTahunAjaran`) ON UPDATE CASCADE;

--
-- Constraints for table `honorarium`
--
ALTER TABLE `honorarium`
  ADD CONSTRAINT `honorarium_ibfk_1` FOREIGN KEY (`idTahunAjaran`) REFERENCES `tahunajaran` (`idTahunAjaran`);

--
-- Constraints for table `h_pengajar`
--
ALTER TABLE `h_pengajar`
  ADD CONSTRAINT `h_pengajar_ibfk_1` FOREIGN KEY (`idHonorarium`) REFERENCES `honorarium` (`idHonorarium`);

--
-- Constraints for table `h_tatausaha`
--
ALTER TABLE `h_tatausaha`
  ADD CONSTRAINT `h_tatausaha_ibfk_1` FOREIGN KEY (`idHonorarium`) REFERENCES `honorarium` (`idHonorarium`);

--
-- Constraints for table `h_walikelas`
--
ALTER TABLE `h_walikelas`
  ADD CONSTRAINT `h_walikelas_ibfk_1` FOREIGN KEY (`idHonorarium`) REFERENCES `honorarium` (`idHonorarium`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
