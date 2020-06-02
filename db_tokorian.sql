-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 02 Jun 2020 pada 15.29
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_tokorian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(2, 'admin', 'admin', 'rian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE IF NOT EXISTS `ongkir` (
  `id_ongkir` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_ongkir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Kendal', 10000),
(2, 'Semarang', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(11, 'edi_kurni97@gmail.com', 'edi', 'edi', '0895700614820', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(5, 4, 'Riko', 'Mandiri', 110000, '2018-12-09', '20181209042334Japit Hijau.jpg'),
(6, 4, 'Riko', 'Mandiri', 111, '2018-12-09', '20181209042616Japit Hijau.jpg'),
(7, 5, 'Riko', 'Mandiri', 45000, '2018-12-09', '20181209071550Japit Hijau.jpg'),
(8, 8, 'AA', 'S', 1, '2020-05-22', '20200522004136BROSUR.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` varchar(100) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(4, 5, 1, '2018-12-09', 110000, 'Kendal', 10000, 'GONDANG', 'barang dikirim', '33333333'),
(5, 6, 2, '2018-12-09', 45000, 'Semarang', 20000, 'aaaa', 'sudah kirim pembayaran', ''),
(6, 8, 1, '2018-12-09', 35000, 'Kendal', 10000, 'aaa', 'pending', ''),
(7, 10, 1, '2020-05-22', 10010, 'Kendal', 10000, '', 'pending', ''),
(8, 10, 1, '2020-05-22', 10000, 'Kendal', 10000, '', 'sudah kirim pembayaran', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE IF NOT EXISTS `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `nama`, `harga`, `berat`, `subberat`, `subharga`, `jumlah`) VALUES
(6, 4, 10, 'Sendal Japit Swallow Biru', 25000, 500, 1500, 75000, 3),
(7, 4, 11, 'Sendal Japit Swallow Hijau', 25000, 500, 500, 25000, 1),
(8, 5, 11, 'Sendal Japit Swallow Hijau', 25000, 500, 500, 25000, 1),
(9, 6, 10, 'Sendal Japit Swallow Biru', 25000, 500, 500, 25000, 1),
(10, 7, 19, 'aa', 10, 10, 10, 10, 1),
(11, 8, 20, '', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(21, 'Kaos Casual Naruto Shippuden', 80000, 300, 'kaos naruto.jpeg', 'Kaos Casual Motif Naruto Shippuden\r\nBahan Katun Combed\r\nSablon Rubber   ', 10),
(23, 'Kaos Kombinasi Batik', 100, 300, 'kombinasi avenger.jpeg', 'Kaos Motif Kombinasi Batik Polos\r\nBahan Adem', 5),
(24, 'Kaos Casual St Danill', 150000, 300, 'kaos gelas tumpah.jpeg', 'Kaos Casual Motif Gambar St Danill\r\nBahan Adem\r\nTidak Panas', 5),
(25, 'Kaos Casual Panjang St. Danillo', 150000, 350, 'kaos lengan panjang hitam.jpeg', 'Kaos Casual Lengan Panjang Motif St. Danillo\r\nLengan Panjang\r\nSablon Plastisol', 3),
(26, 'Baju New Dakota Lengan Panjang', 100, 300, 'koas lengan panjang motif kombinasi.jpeg', 'Baju New Dakota Lengan Panjang Kombinasi 3 warna', 15),
(27, 'Kaos Printing Hand Paint Stains', 75000, 300, 'kaos printing.jpeg', 'Kaos Casual Printing Motif Hand Paint Stains\r\nBahan Adem', 10),
(28, 'Kemeja Pendek Revenge Collar', 100, 300, 'kemeja.jpeg', 'Kemeja Lengan Pendek Revere Big Strip', 5),
(29, 'Kaos Casual Santai Kombinasi 3 Warna', 160000, 300, 'kombinasi 2.jpeg', 'Kaos Casual Santai Kombinasi 3 Warna\r\nBahan Adem\r\nKombinasi 3 Warna', 10),
(30, 'Kaos Korea Genji Kombinaisi 2 Warna', 150000, 300, 'korea style.jpeg', 'Kaos Korea Genji Kombinaisi 2 Warna', 10),
(31, 'Kaos Casual Kyubi Naruto Shippuden', 80000, 300, 'naruto putih.jpeg', ' Kaos Casual Kyubi Naruto Shippuden ', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
