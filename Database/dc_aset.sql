-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2023 pada 16.14
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dc_aset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asets`
--

CREATE TABLE `asets` (
  `id_aset` varchar(128) NOT NULL,
  `kode_aset` varchar(128) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `kondisi` varchar(128) DEFAULT 'Baik',
  `status_aset` varchar(50) DEFAULT NULL,
  `umur_ekonomis` int(11) DEFAULT NULL,
  `cara_perolehan` varchar(128) DEFAULT NULL,
  `jenis_aset` varchar(128) DEFAULT 'Berwujud',
  `qr_code` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asets`
--

INSERT INTO `asets` (`id_aset`, `kode_aset`, `id_barang`, `id_lokasi`, `volume`, `satuan`, `harga`, `total_harga`, `kondisi`, `status_aset`, `umur_ekonomis`, `cara_perolehan`, `jenis_aset`, `qr_code`) VALUES
('026c072e8a1c40e2816730c84ab34108', '0001/GDG/2020', 3, 3, 1, 'Buah', 150000000, 150000000, 'Renovasi', 'Aktif', 20, 'Pemerintah', 'Berwujud', 'e9b1e9b2984045898130f1a1a4d99b36.png'),
('0ce0995696174904947b1f747e7b89c6', '0001/KOM/2020', 9, 1, 2, 'Unit', 2000000, 4000000, 'Baik', 'Aktif', 5, 'Pribadi', 'Berwujud', 'baceba21c4924239b76da086a7dd246b.png'),
('3950c450aec441c08c18e32be66c9268', '0002/GDG/2021', 2, 2, 1, 'Unit', 200000000, 200000000, 'Baik', 'Aktif', 5, 'Yayasan', 'Berwujud', '90a28457eb9a4eef8d6241899185520b.png'),
('44855e0b53554358a7cb65512cb94719', '0003/FUR/2020', 1, 1, 20, 'Unit', 90000000, 1800000000, 'Baik', 'Aktif', 10, 'Pribadi', 'Berwujud', '764ac8d6ffa54f2a9fe093f6e96d80ff.png'),
('4eb4f53d68dc475c980376d4f8da4a99', '0002/FUR/2020', 5, 1, 20, 'Unit', 80000000, 1600000000, 'Baik', 'Aktif', 10, 'Pribadi', 'Berwujud', '8973dfdc58dd4649951e8c96a7879a29.png'),
('5a60376b26504c21af7098b72f3b222a', '0001/ELE/2020', 12, 4, 1, 'Unit', 5000000, 5000000, 'Baik', 'Aktif', 5, 'Pribadi', 'Berwujud', '1ca18e5d52c24a108cdfafb4f1d6d435.png'),
('b644eaa500124fba98fe1db666cf6454', '0001/FUR/2020', 6, 1, 10, 'Unit', 60000000, 600000000, 'Baik', 'Aktif', 10, 'Pribadi', 'Berwujud', 'f87c557a7d6142d58adf556e6cc595d0.png'),
('d23fe7f6ae924f5e834ceac40417319e', '0003/GDG/2020', 2, 2, 1, 'Lokal', 300000000, 300000000, 'Baik', 'Aktif', 5, 'Yayasan', 'Berwujud', '63b0ce01ae0542bfbe832db01d6a3bca.png'),
('d4e57484a2af4123a1d3967150c79fed', '0003/KOM/2020', 7, 2, 2, 'Unit', 16000000, 32000000, 'Baik', 'Aktif', 5, 'Pribadi', 'Berwujud', 'c8a619df9e694174aaaabe63c17df3c0.png'),
('d656e1d8a61f40daa10ec697403a6e81', '0003/ELE/2020', 10, 1, 3, 'Unit', 1500000, 4500000, 'Baik', 'Aktif', 5, 'Pribadi', 'Berwujud', '67279b01b7d54a60800c0abec596cee4.png'),
('e30a1be2639c443fa9012af62a72ad78', '0002/KOM/2020', 8, 1, 10, 'Unit', 50000000, 500000000, 'Baik', 'Aktif', 5, 'Pribadi', 'Berwujud', 'c507e9b658b84d5c8fa1124bbb5e91de.png'),
('fa47c767f6c9461b8fb518876d4114bf', '0002/ELE/2019', 11, 1, 2, 'Unit', 10000000, 20000000, 'Baik', 'Aktif', 5, 'Pribadi', 'Berwujud', '6775efb116224cbeb5fdfa5c8845866a.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merek` varchar(128) NOT NULL,
  `tahun_perolehan` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `merek`, `tahun_perolehan`) VALUES
(1, 3, 'Meja Komputer', 'Olympic', 2020),
(2, 1, 'Ruang Training', '-', 2021),
(3, 1, 'Ruang Meeting', '-', 2020),
(4, 1, 'Ruang Teleconference', '-', 2020),
(5, 3, 'Kursi Kantor', 'Olympic', 2020),
(6, 3, 'Lemari Arsip', 'Olympic', 2020),
(7, 4, 'Laptop Manager', 'Lenovo Ideapad 330', 2020),
(8, 4, 'Komputer Admin', 'HP Compaq Pro 6200', 2020),
(9, 4, 'Printer Admin', 'Canon IP 2770', 2020),
(10, 2, 'Dispenser Head Office', 'Miyako', 2019),
(11, 2, 'AC Ruang Meeting', 'Daikin', 2019),
(12, 2, 'LCD Proyektor', 'Canon', 2020),
(13, 2, 'iPad', 'iPad', 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_aset`
--

CREATE TABLE `data_aset` (
  `id_aset` int(11) NOT NULL,
  `nama_aset` varchar(128) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_aset`
--

INSERT INTO `data_aset` (`id_aset`, `nama_aset`, `harga`) VALUES
(1, 'Full Set Komputer Core i5 Lcd 19inc Acer', 3499000),
(2, 'Full Set Komputer Core i5 Lcd 19inc Asus', 4000000),
(3, 'Full Set Komputer Core i5 Lcd 19inc Lenovo', 3000000),
(4, 'Full Set Komputer Core i5 Lcd 19inc Acer', 2925000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(128) DEFAULT NULL,
  `nama_kategori` varchar(128) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `kode_kategori`, `nama_kategori`, `updated_at`) VALUES
(1, 'GDG', 'GEDUNG', '2020-09-24 22:48:11'),
(2, 'ELK', 'ELEKTRONIK', '2020-09-24 22:48:34'),
(3, 'FNT', 'FURNITURE', '2020-09-24 22:48:44'),
(4, 'KOM', 'KOMPUTER', '2021-11-04 13:07:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keputusan_pengadaan`
--

CREATE TABLE `keputusan_pengadaan` (
  `id_nilai` int(11) NOT NULL,
  `id_aset` int(11) DEFAULT NULL,
  `id_spesifikasi` int(11) DEFAULT NULL,
  `id_kualitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keputusan_pengadaan`
--

INSERT INTO `keputusan_pengadaan` (`id_nilai`, `id_aset`, `id_spesifikasi`, `id_kualitas`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 1),
(3, 3, 2, 2),
(4, 4, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_kualitas`
--

CREATE TABLE `kriteria_kualitas` (
  `id_kualitas` int(11) NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria_kualitas`
--

INSERT INTO `kriteria_kualitas` (`id_kualitas`, `keterangan`, `nilai`) VALUES
(1, 'Sangat Baik', 0.5),
(2, 'Baik', 0.4),
(3, 'Cukup', 0.3),
(4, 'Jelek', 0.2),
(5, 'Sangat Jelek', 0.1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_spesifikasi`
--

CREATE TABLE `kriteria_spesifikasi` (
  `id_spesifikasi` int(11) NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria_spesifikasi`
--

INSERT INTO `kriteria_spesifikasi` (`id_spesifikasi`, `keterangan`, `nilai`) VALUES
(1, 'Sangat Baik', 0.5),
(2, 'Baik', 0.4),
(3, 'Cukup', 0.3),
(4, 'Jelek', 0.2),
(5, 'Sangat Jelek', 0.1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_aset`
--

CREATE TABLE `lokasi_aset` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(128) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi_aset`
--

INSERT INTO `lokasi_aset` (`id_lokasi`, `nama_lokasi`, `updated_at`) VALUES
(1, 'Head Office', '2021-11-04 13:08:25'),
(2, 'Produksi', '2021-11-04 13:08:40'),
(3, 'Gudang', '2021-11-04 13:08:49'),
(4, 'Laboratorium', '2021-11-04 13:09:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring_aset`
--

CREATE TABLE `monitoring_aset` (
  `id_monitoring` int(11) NOT NULL,
  `id_aset` varchar(128) DEFAULT NULL,
  `kerusakan` text DEFAULT NULL,
  `akibat` text DEFAULT NULL,
  `faktor` text DEFAULT NULL,
  `monitoring` text DEFAULT NULL,
  `pemeliharaan` text DEFAULT NULL,
  `jml_rusak` varchar(128) DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `monitoring_aset`
--

INSERT INTO `monitoring_aset` (`id_monitoring`, `id_aset`, `kerusakan`, `akibat`, `faktor`, `monitoring`, `pemeliharaan`, `jml_rusak`, `foto`, `updated_at`) VALUES
(1, '026c072e8a1c40e2816730c84ab34108', '<p>Jendela pecah</p>', '<p>Mengurangi estetika dan kenyamanan</p>', '<p>Perilaku pengguna<br></p>', '<p>Mengganti kaca dengan yang baru</p>', '<p>Jika kotor bersihkan kaca dengan detergen dan pergunakan sikat karet untuk membersihkan</p>', '3', 'c4b6e4bd4e5251835465925cdc9ce1ae.jpg', '2020-09-24 23:07:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_aset` varchar(128) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(128) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `tahun_pengadaan` varchar(4) DEFAULT NULL,
  `nama_dokumen` varchar(150) NOT NULL,
  `status` enum('0','1','2') DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `id_lokasi`, `id_user`, `nama_aset`, `volume`, `satuan`, `harga_satuan`, `tahun_pengadaan`, `nama_dokumen`, `status`, `created_at`) VALUES
(3, 1, 8, 'Full Set Komputer Core i5 Lcd 19inc Lenovo', 2, 'Unit', 5000000, '2020', '', '1', '2021-11-04 14:20:50'),
(4, 2, 1, 'ddd', 1212, 'Buah', 121, '2098', 'Program-Kerja-Divisi-Layanan-TIK-Tahun-2014-new_25.pdf', '1', '2023-10-19 22:53:11'),
(12, 1, 1, 'asas', 1213323, 'Buah', 2323, '2312', 'doc-1697890560.pdf', '1', '2023-10-21 19:16:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghapusan`
--

CREATE TABLE `penghapusan` (
  `id_penghapusan` int(11) NOT NULL,
  `id_aset` varchar(128) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `faktor` text DEFAULT NULL,
  `tgl_penghapusan` date DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(6) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `role` enum('1','2','3') DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `jabatan`, `role`, `foto`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '1', '7074233c5a12ef37b916a4cacdfd178d.jpg'),
(8, 'Natalia Sukmalina', 'staff', '25d55ad283aa400af464c76d713c07ad', 'Staf General Affair', '3', '3a635aedf846db95f937cb65e73a3e3e.jpg'),
(9, 'Binanga Sinaga', 'manager', '25d55ad283aa400af464c76d713c07ad', 'Manager General Affair', '2', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asets`
--
ALTER TABLE `asets`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_kategori`);

--
-- Indeks untuk tabel `data_aset`
--
ALTER TABLE `data_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keputusan_pengadaan`
--
ALTER TABLE `keputusan_pengadaan`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_spesifikasi` (`id_spesifikasi`),
  ADD KEY `id_kualitas` (`id_kualitas`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indeks untuk tabel `kriteria_kualitas`
--
ALTER TABLE `kriteria_kualitas`
  ADD PRIMARY KEY (`id_kualitas`);

--
-- Indeks untuk tabel `kriteria_spesifikasi`
--
ALTER TABLE `kriteria_spesifikasi`
  ADD PRIMARY KEY (`id_spesifikasi`);

--
-- Indeks untuk tabel `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `monitoring_aset`
--
ALTER TABLE `monitoring_aset`
  ADD PRIMARY KEY (`id_monitoring`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`id_penghapusan`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `data_aset`
--
ALTER TABLE `data_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keputusan_pengadaan`
--
ALTER TABLE `keputusan_pengadaan`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteria_kualitas`
--
ALTER TABLE `kriteria_kualitas`
  MODIFY `id_kualitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kriteria_spesifikasi`
--
ALTER TABLE `kriteria_spesifikasi`
  MODIFY `id_spesifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `monitoring_aset`
--
ALTER TABLE `monitoring_aset`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id_penghapusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `asets`
--
ALTER TABLE `asets`
  ADD CONSTRAINT `asets_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asets_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_aset` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keputusan_pengadaan`
--
ALTER TABLE `keputusan_pengadaan`
  ADD CONSTRAINT `keputusan_pengadaan_ibfk_1` FOREIGN KEY (`id_spesifikasi`) REFERENCES `kriteria_spesifikasi` (`id_spesifikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keputusan_pengadaan_ibfk_2` FOREIGN KEY (`id_kualitas`) REFERENCES `kriteria_kualitas` (`id_kualitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keputusan_pengadaan_ibfk_3` FOREIGN KEY (`id_aset`) REFERENCES `data_aset` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `monitoring_aset`
--
ALTER TABLE `monitoring_aset`
  ADD CONSTRAINT `monitoring_aset_ibfk_1` FOREIGN KEY (`id_aset`) REFERENCES `asets` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_aset` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengadaan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD CONSTRAINT `penghapusan_ibfk_1` FOREIGN KEY (`id_aset`) REFERENCES `asets` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
