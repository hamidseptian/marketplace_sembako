-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2020 pada 15.02
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace_sembako`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, 'Hamid Septian', 'admin', 'admin', 'Admin Master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(3) NOT NULL,
  `id_toko` varchar(10) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `satuan_barang` varchar(15) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `stok` int(3) NOT NULL,
  `tukar_poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_toko`, `id_kategori`, `nama_barang`, `harga_jual`, `satuan_barang`, `gambar`, `stok`, `tukar_poin`) VALUES
(1, '1', '1', 'Beras ', 12000, 'Kg ', 'beras.png', -2, 100),
(2, '1', '1', 'medium(anak daro)', 14000, 'Kg ', 'beras.png', 7, 20),
(3, '1', '1', 'super(sokan)', 14500, 'Kg ', 'beras.png', 1, 90),
(4, '1', '2', 'Gula ', 13000, 'Kg ', 'gula.jpeg', 17, 100),
(6, '1', '3', 'Cabai', 40000, 'Kg ', 'cabe.jpg', 16, 100),
(7, '1', '3', 'Tomat', 5000, 'Kg ', 'tomat.jpg', 10, 100),
(8, '1', '3', 'Bawang merah', 15000, 'Kg ', 'bawangmerah.jpeg', 16, 100),
(9, '1', '3', 'Bawang putih', 30000, 'Kg ', 'bawangputih.jpg', 10, 100),
(10, '1', '3', 'Kantang', 12000, 'Kg ', 'kentang.jpg', 10, 100),
(11, '1', '3', 'Manga', 13000, 'Buah', 'mangga.jpg', -2, 100),
(12, '1', '3', 'Jeruk', 15000, 'Kg ', 'jeruk.jpg', 10, 100),
(13, '1', '3', 'Naga', 25000, 'Kg ', 'naga.jpg', 10, 100),
(14, '1', '4', 'Daging sapi', 120000, 'Kg ', 'sapi.jpg', 10, 100),
(15, '1', '4', 'Daging ayam', 50000, 'ekor', 'ayam.jpg', 10, 100),
(16, '1', '4', 'Ikan ', 25000, 'Kg ', 'ikan.jpg', 10, 100),
(17, '1', '5', 'Minyak goreng', 12000, 'Kg ', 'minyakgoreng.jpg', 10, 100),
(18, '1', '6', 'Susu', 10000, 'Kaleng ', 'telur.jpg', 10, 100),
(19, '1', '7', 'Telur', 2000, 'Butir  ', 'susu.jpg', 10, 100),
(20, '1', '8', 'Minyak tanah', 9000, 'Liter ', 'minyaktanah.jpg', 10, 100),
(21, '1', '8', 'Elpiji', 135000, '12 kg ', 'gas.jpg', 9, 100),
(22, '1', '9', 'Garam', 2000, 'Bungkus ', 'garam.webp', 10, 100),
(24, '2', '1', 'Beras ', 12000, 'Kg ', 'beras.png', 0, 100),
(25, '2', '1', 'medium(anak daro)', 14000, 'Kg ', 'beras.png', 0, 100),
(26, '2', '1', 'super(sokan)', 14500, 'Kg ', 'beras.png', 0, 100),
(27, '2', '2', 'Gula ', 13000, 'Kg ', 'gula.jpeg', 0, 100),
(29, '2', '3', 'Cabai', 40000, 'Kg ', 'cabe.jpg', 0, 100),
(30, '2', '3', 'Tomat', 5000, 'Kg ', 'tomat.jpg', 0, 100),
(31, '2', '3', 'Bawang merah', 15000, 'Kg ', 'bawangmerah.jpeg', 0, 100),
(32, '2', '3', 'Bawang putih', 30000, 'Kg ', 'bawangputih.jpg', 0, 100),
(33, '2', '3', 'Kantang', 12000, 'Kg ', 'kentang.jpg', 0, 100),
(34, '2', '3', 'Manga', 13000, 'Kg ', 'mangga.jpg', 0, 100),
(35, '2', '3', 'Jeruk', 18000, 'Kg ', 'jeruk.jpg', 0, 100),
(36, '2', '3', 'Naga', 25000, 'Kg ', 'naga.jpg', 0, 100),
(37, '2', '4', 'Daging sapi', 120000, 'Kg ', 'sapi.jpg', 0, 100),
(38, '2', '4', 'Daging ayam', 50000, 'ekor', 'ayam.jpg', 0, 100),
(39, '2', '4', 'Ikan ', 25000, 'Kg ', 'ikan.jpg', 0, 100),
(40, '2', '5', 'Minyak goreng', 12500, 'Kg ', 'minyakgoreng.jpg', 0, 100),
(41, '2', '6', 'Susu', 10000, 'Kaleng ', 'telur.jpg', 0, 100),
(42, '2', '7', 'Telur', 2500, 'Butir  ', 'susu.jpg', 0, 100),
(43, '2', '8', 'Minyak tanah', 10000, 'Liter ', 'minyaktanah.jpg', 0, 100),
(44, '2', '8', 'Elpiji', 25000, '12 kg ', 'gas.jpg', 0, 100),
(45, '2', '9', 'Garam', 2000, 'Bungkus ', 'garam.webp', 0, 100),
(47, '3', '1', 'Beras ', 12000, 'Kg ', 'beras.png', 0, 100),
(48, '3', '1', 'medium(anak daro)', 13500, 'Kg ', 'beras.png', 0, 100),
(49, '3', '1', 'super(sokan)', 14000, 'Kg ', 'beras.png', 0, 100),
(50, '3', '2', 'Gula ', 13500, 'Kg ', 'gula.jpeg', 0, 100),
(52, '3', '3', 'Cabai', 40000, 'Kg ', 'cabe.jpg', 0, 100),
(53, '3', '3', 'Tomat', 5000, 'Kg ', 'tomat.jpg', 0, 100),
(54, '3', '3', 'Bawang merah', 15000, 'Kg ', 'bawangmerah.jpeg', 0, 100),
(55, '3', '3', 'Bawang putih', 30000, 'Kg ', 'bawangputih.jpg', 0, 100),
(56, '3', '3', 'Kantang', 13000, 'Kg ', 'kentang.jpg', 0, 100),
(57, '3', '3', 'Manga', 13000, 'Kg ', 'mangga.jpg', 0, 100),
(58, '3', '3', 'Jeruk', 16000, 'Kg ', 'jeruk.jpg', 0, 100),
(59, '3', '3', 'Naga', 25000, 'Kg ', 'naga.jpg', 0, 100),
(60, '3', '4', 'Daging sapi', 120000, 'Kg ', 'sapi.jpg', 0, 100),
(61, '3', '4', 'Daging ayam', 50000, 'ekor', 'ayam.jpg', 0, 100),
(62, '3', '4', 'Ikan ', 25000, 'Kg ', 'ikan.jpg', 0, 100),
(63, '3', '5', 'Minyak goreng', 13000, 'Kg ', 'minyakgoreng.jpg', 0, 100),
(64, '3', '6', 'Susu', 11500, 'Kaleng ', 'telur.jpg', 0, 100),
(65, '3', '7', 'Telur', 2000, 'Butir  ', 'susu.jpg', 0, 100),
(66, '3', '8', 'Minyak tanah', 10000, 'Liter ', 'minyaktanah.jpg', 0, 100),
(67, '3', '8', 'Elpiji', 27000, '12 kg ', 'gas.jpg', 0, 100),
(68, '3', '9', 'Garam', 2000, 'Bungkus ', 'garam.webp', 0, 100),
(69, '1', '2', 'Susu Berung', 16000, 'Buah', '200420042655.png', 20, 100),
(70, '1', '1', 'we0hewub', 99000, 'Buah', '200724035023.jpg', 3, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `jenis_distribusi_barang` varchar(250) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `nohp`, `jenis_distribusi_barang`, `username`, `password`) VALUES
(1, 'Pusat Barang Sembako', 'unkown', '081212121212', 'All Sembako', 'aaa', 'aa'),
(3, 'Shopee Indonseia', 'unknown address', '0812121212121', 'apa saja', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(3) NOT NULL,
  `id_toko` varchar(10) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `alamat_karyawan` varchar(200) NOT NULL,
  `nohp_karyawan` varchar(13) NOT NULL,
  `jabatan_karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_toko`, `nama_karyawan`, `alamat_karyawan`, `nohp_karyawan`, `jabatan_karyawan`) VALUES
(1, '1', 'Udin', '', '', 'Kurir'),
(4, '4', 'Udin penyok', 'maransi city', '1234567890', 'marketing ex'),
(5, '4', 'asdas', 'asdas', 'asdas', 'asdas'),
(6, '2', 'asdas', 'asdas', 'asdas', 'asdas'),
(7, '4', 'giga', 'solok', '123565867345', 'mhs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Beras , Sagu dan Jagung'),
(2, 'Gula'),
(3, 'Sayur-sayuran dan Buah-bu'),
(4, 'Daging Sapi, Ayam, dan Ik'),
(5, 'Minyak goreng dan Margarin'),
(6, 'Susu'),
(7, 'Telur'),
(8, 'Minyak Tanah atau gas ELPIJI'),
(9, 'Garam berIodium dan berNatrium');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(2) NOT NULL,
  `nama_kecamatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Lubuk Sikarah'),
(2, 'Tanjung Harapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(2) NOT NULL,
  `id_kecamatan` varchar(10) NOT NULL,
  `nama_kelurahan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`) VALUES
(1, '2', 'Kampung Jawa '),
(2, '2', 'Koto Panjang '),
(4, '2', 'Pasar Pandan Air Mati '),
(5, '2', 'Tanjung Paku'),
(6, '2', 'Laing'),
(7, '2', ' Nan Balimo'),
(8, '1', ' VI Suku '),
(9, '1', 'IX Korong '),
(10, '1', 'Aro IV Korong '),
(11, '1', 'Kampai Tabu Karambia '),
(12, '1', 'Simpang Rumbio '),
(13, '1', 'Sinapa Piliang '),
(14, '1', 'Tanah Garam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(3) NOT NULL,
  `id_kelurahan` varchar(10) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `id_toko` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `id_kelurahan`, `ongkir`, `id_toko`) VALUES
(1, '1', 10000, '4'),
(2, '2', 20000, '4'),
(3, '4', 20000, '4'),
(4, '5', 15000, '4'),
(5, '6', 20000, '4'),
(6, '7', 30000, '4'),
(7, '8', 40000, '4'),
(8, '9', 30000, '4'),
(9, '10', 20000, '4'),
(10, '11', 10000, '4'),
(11, '12', 9000, '4'),
(12, '13', 3000, '4'),
(13, '14', 4000, '4'),
(14, '1', 8000, '1'),
(15, '2', 9000, '1'),
(16, '4', 8000, '1'),
(17, '5', 7000, '1'),
(18, '6', 5000, '1'),
(19, '7', 4000, '1'),
(20, '8', 3000, '1'),
(21, '9', 2000, '1'),
(22, '10', 4000, '1'),
(23, '11', 5000, '1'),
(24, '12', 6000, '1'),
(25, '13', 7000, '1'),
(26, '14', 7000, '1'),
(27, '1', 9000, '5'),
(28, '2', 8000, '5'),
(29, '4', 3000, '5'),
(30, '5', 4000, '5'),
(31, '6', 5000, '5'),
(32, '7', 1000, '5'),
(33, '8', 15000, '5'),
(34, '9', 8000, '5'),
(35, '10', 9000, '5'),
(36, '11', 0, '5'),
(37, '12', 9000, '5'),
(38, '13', 7000, '5'),
(39, '14', 8000, '5'),
(40, '1', 9000, '7'),
(41, '2', 8000, '7'),
(42, '4', 0, '7'),
(43, '5', 0, '7'),
(44, '6', 0, '7'),
(45, '7', 0, '7'),
(46, '8', 0, '7'),
(47, '9', 0, '7'),
(48, '10', 0, '7'),
(49, '11', 0, '7'),
(50, '12', 0, '7'),
(51, '13', 0, '7'),
(52, '14', 0, '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(3) NOT NULL,
  `id_kelurahan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `nohp_pelanggan` varchar(12) NOT NULL,
  `email_pelanggan` varchar(25) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_kelurahan`, `nama_pelanggan`, `alamat_pelanggan`, `nohp_pelanggan`, `email_pelanggan`, `password`) VALUES
(1, '2', 'Hamid Septian', 'maransi city', '123', '123', '123'),
(2, '2', 'Hamid Septian', 'maransi city', '123', 'hamidseptian@gmail.com', '123'),
(3, '2', 'Hamid Septian', 'maransi city', '123', 'hamidseptian@gmail.comj', '123'),
(4, '2', 'Hamid Septian', 'maransi city', '123', 'hamidseptian@gmail.coml', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `jenis_pembayaran` varchar(15) NOT NULL,
  `id_rekening` varchar(5) NOT NULL,
  `id_pelanggan` varchar(5) NOT NULL,
  `id_toko` varchar(5) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tanggal_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(4) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `id_toko` varchar(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `tanggal_pesan` varchar(20) NOT NULL,
  `waktu_pesan` varchar(10) NOT NULL,
  `status_pesanan` varchar(20) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `bersihkan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_barang`, `id_toko`, `qty`, `tanggal_pesan`, `waktu_pesan`, `status_pesanan`, `id_karyawan`, `bersihkan`) VALUES
(51, '1', '1', '1', 22, '2020-04-20', '06:05', 'Selesai', '', 'Ya'),
(52, '1', '35', '2', 6, '2020-04-20', '06:05', 'Selesai', '', 'Ya'),
(53, '2', '1', '1', 22, '2020-04-20', '06:39', 'Selesai', '1', ''),
(56, '1', '11', '1', 12, '2020-04-20', '06:39', 'Selesai', '1', ''),
(57, '1', '3', '1', 7, '2020-04-20', '06:39', 'Selesai', '1', ''),
(58, '1', '6', '1', 8, '2020-04-20', '06:39', 'Selesai', '1', ''),
(59, '1', '3', '1', 1, '2020-04-20', '06:45', 'Dibatalkan Toko', '', ''),
(60, '1', '4', '1', 2, '2020-04-20', '06:45', 'Dibatalkan Toko', '', ''),
(61, '1', '2', '1', 3, '2020-04-20', '06:49', 'Dibatalkan Pelanggan', '1', ''),
(62, '1', '6', '1', 3, '2020-04-20', '06:49', 'Dibatalkan Pelanggan', '1', ''),
(63, '1', '21', '1', 1, '2020-04-20', '06:49', 'Dibatalkan Pelanggan', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_distributor`
--

CREATE TABLE `pesanan_distributor` (
  `id_pesanan` int(11) NOT NULL,
  `id_distributor` varchar(15) NOT NULL,
  `waktu_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pesanan` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `id_toko` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_distributor`
--

INSERT INTO `pesanan_distributor` (`id_pesanan`, `id_distributor`, `waktu_pesan`, `pesanan`, `status`, `id_toko`) VALUES
(5, '2', '2020-07-12 13:00:26', 'A sdv', 'Dibatalkan Distributor', '1'),
(6, '1', '2020-07-21 16:00:01', 'pesan ikan 2 kilo', 'Diproses', '1'),
(8, '1', '2020-07-21 15:53:06', 'sac sdcz vx', 'Dibatalkan Distributor', '4'),
(9, '1', '2020-07-21 15:56:55', 'a DVXZVXC', 'Menyiapkan Barang', '4'),
(10, '1', '2020-07-21 16:04:34', ' sczczxc zxc', 'Selesai', '4'),
(11, '1', '2020-07-21 16:27:12', 'sdivs nxknv lkxnv', 'Dibatalkan Distributor', '1'),
(12, '1', '2020-07-21 16:28:49', 'nzsdv zsvdksj', 'Selesai', '1'),
(13, '1', '2020-07-21 16:27:16', 'sdcs djcnsljCNS', 'Selesai', '1'),
(14, '1', '2020-07-20 23:30:30', 'cv dfbsf', 'Order', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `id_poin` int(11) NOT NULL,
  `id_toko` varchar(5) NOT NULL,
  `syarat` int(11) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poin`
--

INSERT INTO `poin` (`id_poin`, `id_toko`, `syarat`, `poin`) VALUES
(2, '1', 100000000, 110),
(3, '1', 100000000, 99),
(4, '2', 0, 55),
(5, '2', 0, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin_pelanggan`
--

CREATE TABLE `poin_pelanggan` (
  `id_poin_plg` int(11) NOT NULL,
  `id_poin` varchar(5) NOT NULL,
  `id_toko` varchar(5) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `id_pelanggan` varchar(5) NOT NULL,
  `jenis` enum('+','-') NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `jumlah_transaksi` int(12) NOT NULL,
  `status_penukaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poin_pelanggan`
--

INSERT INTO `poin_pelanggan` (`id_poin_plg`, `id_poin`, `id_toko`, `id_barang`, `id_pelanggan`, `jenis`, `tanggal`, `jumlah_transaksi`, `status_penukaran`) VALUES
(1, '2', '1', '', '1', '+', '2020-09-09', 15000, ''),
(2, '3', '1', '2', '1', '-', '2020-09-09', 15000, 'Penukaran Selesai'),
(3, '5', '2', '27', '1', '-', '2020-09-09', 20000, 'Menunggu Persetujuan Toko'),
(4, '4', '2', '8', '1', '+', '2020-09-09', 15000, ''),
(10, '', '1', '2', '1', '-', '2020-07-26 08:52:23', 0, 'Barang Diterima Pelanggan'),
(12, '', '1', '2', '1', '-', '2020-07-26 08:53:50', 0, 'Penukaran Selesai'),
(13, '', '1', '2', '1', '-', '2020-07-26 08:54:19', 0, 'Penukaran Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `id_toko` varchar(5) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `nama_rekening` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(3) NOT NULL,
  `nama_toko` varchar(25) NOT NULL,
  `pemilik_toko` varchar(25) NOT NULL,
  `desc_toko` text NOT NULL,
  `id_kelurahan` varchar(10) NOT NULL,
  `alamat_toko` text NOT NULL,
  `nohp_toko` varchar(15) NOT NULL,
  `email_toko` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status_toko` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `pemilik_toko`, `desc_toko`, `id_kelurahan`, `alamat_toko`, `nohp_toko`, `email_toko`, `password`, `status_toko`) VALUES
(1, 'Toko Kurnia Maju\r\n', 'aaa', '', '5', 'lll', '000', '1@1', '111', 'Mitra'),
(2, 'Toko AA\r\n', 'Tek Yes', '', '5', 'Air pacah', '9835', 'kinaar@mail.com', '123', 'Mitra'),
(3, 'Toko Yugo\r\n', 'Tek Nar', '', '4', 'Maransi', '59242', 'teknar@mail.com', '123', 'Mitra'),
(4, 'Kedai ini', 'Dia', 'menjual ini <br />\r\ndan itu<br />\r\ndan barang lannya', '1', 'solsel', '081213', 'dia@123', '123', 'Mitra');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `pesanan_distributor`
--
ALTER TABLE `pesanan_distributor`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id_poin`);

--
-- Indeks untuk tabel `poin_pelanggan`
--
ALTER TABLE `poin_pelanggan`
  ADD PRIMARY KEY (`id_poin_plg`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `pesanan_distributor`
--
ALTER TABLE `pesanan_distributor`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `poin`
--
ALTER TABLE `poin`
  MODIFY `id_poin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `poin_pelanggan`
--
ALTER TABLE `poin_pelanggan`
  MODIFY `id_poin_plg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
