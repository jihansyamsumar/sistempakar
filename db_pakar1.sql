-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2024 pada 10.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pakar1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `idaturan` int(15) NOT NULL,
  `idpenyakit` int(15) NOT NULL,
  `kdpenyakit` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `basis_aturan`
--

INSERT INTO `basis_aturan` (`idaturan`, `idpenyakit`, `kdpenyakit`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 3, ''),
(4, 4, ''),
(19, 7, 'P7'),
(20, 5, 'P5'),
(21, 6, 'P6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `idaturan` int(15) NOT NULL,
  `idgejala` int(15) NOT NULL,
  `kdgejala` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`idaturan`, `idgejala`, `kdgejala`) VALUES
(1, 16, ''),
(1, 2, ''),
(1, 17, ''),
(1, 18, ''),
(1, 19, ''),
(1, 15, ''),
(1, 14, ''),
(1, 6, ''),
(1, 5, ''),
(2, 20, ''),
(2, 11, ''),
(2, 2, ''),
(2, 3, ''),
(2, 4, ''),
(2, 6, ''),
(2, 7, ''),
(2, 10, ''),
(3, 1, ''),
(3, 2, ''),
(3, 9, ''),
(3, 3, ''),
(3, 4, ''),
(3, 6, ''),
(3, 7, ''),
(3, 5, ''),
(3, 8, ''),
(4, 1, ''),
(4, 2, ''),
(4, 9, ''),
(4, 12, ''),
(4, 13, ''),
(4, 5, ''),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(0, 0, 'kdgejala'),
(19, 1, ''),
(19, 15, ''),
(19, 14, ''),
(20, 7, ''),
(20, 10, ''),
(20, 5, ''),
(21, 9, ''),
(21, 18, ''),
(21, 19, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `idkonsultasi` int(15) NOT NULL,
  `idgejala` int(15) NOT NULL,
  `kdgejala` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`idkonsultasi`, `idgejala`, `kdgejala`) VALUES
(1, 1, ''),
(1, 3, ''),
(2, 1, ''),
(2, 3, ''),
(3, 11, ''),
(3, 2, ''),
(3, 15, ''),
(3, 3, ''),
(3, 12, ''),
(3, 13, ''),
(3, 10, ''),
(17, 1, ''),
(17, 15, ''),
(17, 14, ''),
(18, 1, ''),
(18, 15, ''),
(18, 14, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `idkonsultasi` int(15) NOT NULL,
  `kdpenyakit` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idpenyakit` int(15) NOT NULL,
  `persentase` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_penyakit`
--

INSERT INTO `detail_penyakit` (`idkonsultasi`, `kdpenyakit`, `idpenyakit`, `persentase`) VALUES
(1, '', 2, 13),
(1, '', 3, 22),
(1, '', 4, 17),
(2, '', 2, 13),
(2, '', 3, 22),
(2, '', 4, 17),
(3, '', 1, 22),
(3, '', 2, 50),
(3, '', 3, 22),
(3, '', 4, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int(15) NOT NULL,
  `kdgejala` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nmgejala` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgejala`, `kdgejala`, `nmgejala`) VALUES
(1, 'G1', 'Batuk berdahak'),
(2, 'G5', 'Demam tinggi'),
(3, 'G12', 'Meriang'),
(4, 'G14', 'Mudah lelah'),
(5, 'G19', 'Sesak napas'),
(6, 'G16', 'Nyeri dada'),
(7, 'G17', 'Nyeri kepala atau nyeri otot'),
(8, 'G20', 'Tekanan darah rendah'),
(9, 'G7', 'Kesadaran menurun'),
(10, 'G18', 'Radang tenggorokan'),
(11, 'G4', 'Bersin'),
(12, 'G13', 'Mual'),
(13, 'G15', 'Muntah'),
(14, 'G11', 'Mengi'),
(15, 'G10', 'Lemas'),
(16, 'G3', 'Bau napas tidak sedap'),
(17, 'G6', 'Keringat berlebih'),
(18, 'G8', 'Kesulitan menelan'),
(19, 'G9', 'Kulit membiru'),
(20, 'G2', 'Batuk berkepanjangan'),
(21, 'G22', 'Testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `idkonsultasi` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`idkonsultasi`, `tanggal`, `nama`, `usia`) VALUES
(1, '2024-05-19', 'Rana', 0),
(2, '2024-05-19', 'Rana', 0),
(3, '2024-05-19', 'Kenzy', 0),
(4, '2024-06-01', 'rani', 12),
(5, '2024-06-01', 'Rana', 10),
(9, '2024-06-12', 'Rana', 15),
(10, '2024-06-12', 'Rana', 17),
(11, '2024-06-12', 'Rana', 18),
(15, '2024-06-19', 'Asep', 15),
(16, '2024-06-19', 'Asep', 15),
(17, '2024-06-19', 'Asep', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `idpenyakit` int(15) NOT NULL,
  `kdpenyakit` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nmpenyakit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `solusi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`idpenyakit`, `kdpenyakit`, `nmpenyakit`, `keterangan`, `solusi`) VALUES
(1, 'P1', 'Pneumonia Aspirasi', 'Peradangan pada paru-paru (pneumonia) yang disebabkan oleh masuknya benda asing ke dalam paru-paru, misalnya minuman, makanan, air liur, muntahan, atau benda asing berukuran kecil.', 'Pemberian antibiotik sebagai pengobatan utama, pengobatan tambahan seperti terapi oksigen atau, dalam kasus yang serius, menggunakan ventilator untuk membantu bernapas.'),
(2, 'P2', 'Pneumonia Atipikal', 'Pneumonia yang disebabkan oleh mikroorganisme yang tidak dapat diidentifikasi dengan teknik diagnostik standar pneumonia pada umumnya dan tidak menunjukkan respon terhadap antibiotik b-laktam.', 'Meresepkan obat antiinflamasi nonsteroid (OAINS) untuk meredakan demam dan obat antibiotik jika pneumonia atipikal disebabkan oleh bakteri.'),
(3, 'P3', 'Pneumonia Bakterial', 'Penyakit pada paru-paru yang disebabkan oleh infeksi bakteri. Jenis bakteri yang paling umum adalah Streptococcus pneumoniae.', 'Meresepkan obat antibiotik untuk mengobati pneumonia yang terjadi akibat infeksi bakteri.'),
(4, 'P4', 'Pneumonia Viral', 'Jenis pneumonia pada anak yang disebabkan oleh infeksi virus, seperti adenovirus, respiratory syncytial virus (RSV), virus parainfluenza, serta virus influenza.', 'Minum obat pereda rasa sakit, dan jangan mengonsumsi obat batuk.'),
(5, 'P5', 'testing5', 'testing5', 'testing5'),
(6, 'P6', 'test6', 'test6', 'test6'),
(7, 'P7', 'test7', 'test7', 'test7'),
(8, 'P8', 'test8', 'test8', 'test8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idusers`, `username`, `pass`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'dokter', 'd22af4180eee4bd95072eb90f94930e5', 'Dokter'),
(3, 'Rana', 'a93930b46b7788f8288e71b7944063f9', 'Pasien'),
(4, 'Rani', 'b9f81618db3b0d7a8be8fd904cca8b6a', 'Pasien'),
(18, 'Asep', '081e127fe622361157d47abcf49ffce5', 'Pasien'),
(19, 'Wawan', '79c2b0dd4079d316545375bfe3789078', 'Pasien');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`idaturan`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`idkonsultasi`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`idpenyakit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `idaturan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `idkonsultasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `idpenyakit` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
