-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2021 pada 11.50
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `a_dosen`
--

CREATE TABLE `a_dosen` (
  `id_a_dosen` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `a_dosen`
--

INSERT INTO `a_dosen` (`id_a_dosen`, `nip`, `jam_masuk`, `jam_keluar`) VALUES
(1, 222, '08:01:00', '17:19:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `a_pegawai`
--

CREATE TABLE `a_pegawai` (
  `id_a_pegawai` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `a_pegawai`
--

INSERT INTO `a_pegawai` (`id_a_pegawai`, `nip`, `jam_masuk`, `jam_keluar`) VALUES
(1, 123, '07:34:00', '17:34:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(19) NOT NULL,
  `nik` varchar(19) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `foto_dosen` varchar(255) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `gol_darah` enum('o','a','b','ab') NOT NULL,
  `status_pernikahan` enum('kawin','lajang') NOT NULL,
  `status_kepegawaian` enum('pns','honor') NOT NULL,
  `status_user` enum('aktif','nonaktif') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `struktural` varchar(50) NOT NULL,
  `tahun_pensiun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nik`, `nama_dosen`, `foto_dosen`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `agama`, `email`, `alamat`, `gol_darah`, `status_pernikahan`, `status_kepegawaian`, `status_user`, `jabatan`, `struktural`, `tahun_pensiun`) VALUES
('2000101', '2010101', 'Muhidin', '61245c0f63d0c.jpg', 'Bogor', '2021-08-24', 'laki-laki', '082210488121', 'Islam', 'analis@GMAIL.COM', 'Pln ehave raya, Depok', 'a', 'kawin', 'honor', 'aktif', 'P', 'S', 2020),
('222', '222', 'ccc', '6120c696f3f79.jpg', 'ccc', '2021-08-21', 'laki-laki', '082210488121', 'cccc', 'analis@GMAIL.COM', 'Pln ehave raya, Depok', 'a', 'kawin', 'pns', 'nonaktif', 'ccc', 'ccc', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nip` varchar(19) DEFAULT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `eselon` varchar(50) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `sampai_tgl` date DEFAULT NULL,
  `status_jabatan` enum('aktif','nonaktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nip`, `nama_jabatan`, `eselon`, `tmt`, `sampai_tgl`, `status_jabatan`) VALUES
(2, '123', 'Jendral', 'Eslon III', '2021-08-21', '2021-08-21', 'aktif'),
(3, '123', 'ee', 'ee', '2021-08-24', '2021-08-24', 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `nik` varchar(19) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `nama_keluarga` varchar(50) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `hubungan` enum('suami','istri','anak','ibu','ayah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_dosen`
--

CREATE TABLE `k_dosen` (
  `id_k_dosen` int(11) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_dosen`
--

INSERT INTO `k_dosen` (`id_k_dosen`, `nip`, `tahun`, `semester`, `nilai`) VALUES
(5, '222', 'Test', '2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_pegawai`
--

CREATE TABLE `k_pegawai` (
  `id_k_pegawai` int(11) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_pegawai`
--

INSERT INTO `k_pegawai` (`id_k_pegawai`, `nip`, `tahun`, `semester`, `nilai`) VALUES
(1, '123', '1', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `nama_pangkat` varchar(50) NOT NULL,
  `jenis_pangkat` varchar(50) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `sah_sk` date NOT NULL,
  `nama_pengesah_sk` varchar(50) NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `status_pangkat` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(19) NOT NULL,
  `nik` varchar(19) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `foto_pegawai` varchar(255) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `gol_darah` enum('o','a','b','ab') NOT NULL,
  `status_pernikahan` enum('kawin','lajang') NOT NULL,
  `status_kepegawaian` enum('pns','honor') NOT NULL,
  `status_user` enum('aktif','nonaktif') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `struktural` varchar(50) NOT NULL,
  `tahun_pensiun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nik`, `nama_pegawai`, `foto_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `agama`, `email`, `alamat`, `gol_darah`, `status_pernikahan`, `status_kepegawaian`, `status_user`, `jabatan`, `struktural`, `tahun_pensiun`) VALUES
('123', '123', 'andreas S P', '6120c747117e1.png', 'aa', '2021-08-21', 'perempuan', '082210488121', 'aaa', 'analis@GMAIL.COM', 'Pln ehave raya, Depok', 'b', 'lajang', 'pns', 'aktif', 'BOSS', 'SS', 2029),
('2112', '1212', 'avca', '61246dba3c4d0.png', 'aa', '2021-08-24', 'laki-laki', '082210488121', 'a', 'analis@GMAIL.COM', 'Pln ehave raya, Depok', 'a', 'lajang', 'pns', 'aktif', 'a', 'a', 2010);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nip` varchar(19) DEFAULT NULL,
  `tingkat` varchar(50) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tgl_ijazah` date NOT NULL,
  `no_ijazah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$OHk2a6CP3zV00xwWv6r9QOhMcdCoLOJP7nbeB2rWXlGpzSfmskR7G'),
(2, 'user', '$2y$10$OHk2a6CP3zV00xwWv6r9QOhMcdCoLOJP7nbeB2rWXlGpzSfmskR7G');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `a_dosen`
--
ALTER TABLE `a_dosen`
  ADD PRIMARY KEY (`id_a_dosen`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `a_pegawai`
--
ALTER TABLE `a_pegawai`
  ADD PRIMARY KEY (`id_a_pegawai`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `k_dosen`
--
ALTER TABLE `k_dosen`
  ADD PRIMARY KEY (`id_k_dosen`),
  ADD KEY `nip` (`nip`) USING BTREE;

--
-- Indeks untuk tabel `k_pegawai`
--
ALTER TABLE `k_pegawai`
  ADD PRIMARY KEY (`id_k_pegawai`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `nip2` (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `a_dosen`
--
ALTER TABLE `a_dosen`
  MODIFY `id_a_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `a_pegawai`
--
ALTER TABLE `a_pegawai`
  MODIFY `id_a_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `k_dosen`
--
ALTER TABLE `k_dosen`
  MODIFY `id_k_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `k_pegawai`
--
ALTER TABLE `k_pegawai`
  MODIFY `id_k_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `nip` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD CONSTRAINT `pangkat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `nip2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
