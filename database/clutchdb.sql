-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2016 at 10:27 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clutchdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(10) UNSIGNED NOT NULL,
  `name_admin` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address_admin` text CHARACTER SET utf8 NOT NULL,
  `email_admin` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone_admin` varchar(12) CHARACTER SET utf8 NOT NULL,
  `username_admin` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password_admin` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `address_admin`, `email_admin`, `phone_admin`, `username_admin`, `password_admin`) VALUES
(7, 'Administrator', 'depok', 'admin@admin.com', '089678720078', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(5) NOT NULL,
  `id_user` int(5) UNSIGNED NOT NULL,
  `id_produk` int(5) UNSIGNED NOT NULL,
  `id_header` int(5) UNSIGNED NOT NULL,
  `initial_name` varchar(3) NOT NULL,
  `qty` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `status_pemesan` enum('buy','checkout') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_produk`, `id_header`, `initial_name`, `qty`, `date`, `status_pemesan`) VALUES
(2, 11, 1, 2, 'asd', 1, '2016-06-26 13:03:00', 'checkout'),
(3, 11, 1, 4, 'asd', 1, '2016-06-26 13:35:02', 'checkout'),
(4, 11, 1, 6, 'asd', 1, '2016-06-26 13:42:43', 'checkout'),
(5, 11, 1, 8, 'uko', 1, '2016-06-26 13:52:07', 'checkout'),
(6, 11, 1, 9, 'ghg', 1, '2016-06-26 13:55:31', 'checkout'),
(7, 11, 1, 1, 'asd', 1, '2016-06-30 08:46:54', 'buy'),
(8, 11, 1, 2, '', 1, '2016-11-24 14:58:26', 'checkout'),
(9, 11, 2, 3, 'aaw', 1, '2016-11-24 16:35:43', 'checkout'),
(10, 11, 2, 4, '', 1, '2012-11-26 00:56:08', 'checkout'),
(11, 11, 2, 4, 'AAW', 1, '2012-11-26 00:56:08', 'checkout'),
(12, 11, 2, 5, 'aaw', 1, '2016-11-29 22:51:28', 'checkout');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` bigint(10) UNSIGNED NOT NULL,
  `name_category` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status_category` enum('public','draft') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `status_category`) VALUES
(1, 'Tas', 'public'),
(2, 'Sepatu Futsal', 'public'),
(3, 'Barbel', 'public'),
(4, 'Sandal', 'public'),
(5, 'Logo', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header` int(5) UNSIGNED NOT NULL,
  `status` enum('checkout','konfirmasi','diterima','ditolak','proses','komplain','retur','kembalikan_dana','selesai') COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` int(5) UNSIGNED NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header`, `status`, `id_user`, `date`) VALUES
(1, 'checkout', 11, '2016-06-30 01:46:54'),
(2, 'checkout', 11, '2016-11-24 07:58:26'),
(3, 'checkout', 11, '2016-11-24 09:35:43'),
(4, 'checkout', 11, '2012-11-25 17:56:08'),
(5, 'checkout', 11, '2016-11-29 15:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('checkout','konfirmasi','diterima','ditolak','proses','komplain','retur','kembalikan_dana','selesai') COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_tagihan` decimal(19,0) DEFAULT '0',
  `id_header` int(5) UNSIGNED NOT NULL,
  `ongkos_kirim` decimal(19,0) NOT NULL,
  `id_user` int(5) UNSIGNED NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `status`, `total_tagihan`, `id_header`, `ongkos_kirim`, `id_user`, `date`) VALUES
('INV2012112604', 'checkout', '400000', 4, '8000', 11, '2012-11-25 17:56:08'),
('INV2016063001', 'selesai', '8000', 1, '8000', 11, '2016-06-30 01:46:54'),
('INV2016112402', 'checkout', '8000', 2, '8000', 11, '2016-11-24 07:58:26'),
('INV2016112403', 'checkout', '200000', 3, '8000', 11, '2016-11-24 09:35:43'),
('INV2016112904', 'checkout', '200000', 5, '8000', 11, '2016-11-29 15:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(10) UNSIGNED NOT NULL,
  `id_invoice` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `total_tagihan` decimal(19,0) NOT NULL,
  `nama_bank` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `no_rekening` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `atas_nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rekening_tujuan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_bayar` decimal(19,0) NOT NULL,
  `bukti` text COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(5) UNSIGNED NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_invoice`, `total_tagihan`, `nama_bank`, `no_rekening`, `atas_nama`, `rekening_tujuan`, `jumlah_bayar`, `bukti`, `keterangan`, `id_user`, `date`) VALUES
(1, 'INV2016063001', '16000', 'BCA', '12121212', 'mohamad sholihin', 'bca', '800000', 'background sea.jpg', 'halo', 11, '2016-06-29 20:47:37'),
(2, 'INV2016112402', '16000', 'Mandiri', '12309190238091823', 'Aris', 'mandiri', '49203902', 'banner-wibonowebid.png', 'as', 11, '2016-11-24 01:59:01'),
(3, 'INV2012112604', '408000', 'Mandiri', '123123123', 'Ilham Fauzi', 'mandiri', '408000', 'Windows_logo_-_2002â€“2012_(Black).png', 'mjjkb', 11, '2012-11-25 11:56:46'),
(4, 'INV2016112904', '208000', 'Mandiri', '123123', 'asdjaksd', 'mandiri', '123123', 'Screen Shot 2016-11-27 at 2.07.24 PM.png', 'asd', 11, '2016-11-29 09:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` bigint(10) UNSIGNED NOT NULL,
  `code_product` varchar(30) CHARACTER SET utf32 NOT NULL,
  `name_product` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `description_product` text CHARACTER SET utf8 NOT NULL,
  `price_product` decimal(19,0) NOT NULL,
  `size_product` varchar(100) CHARACTER SET utf8 NOT NULL,
  `berat` bigint(10) NOT NULL,
  `status_product` enum('public','draft') NOT NULL,
  `date_product` datetime NOT NULL,
  `stock_product` int(10) NOT NULL,
  `picture_product` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `code_product`, `name_product`, `id_category`, `description_product`, `price_product`, `size_product`, `berat`, `status_product`, `date_product`, `stock_product`, `picture_product`) VALUES
(2, 'CLTH01', 'Sandal', 4, 'Sandal yang bagus untuk kaki yang mahal.', '200000', '32', 1, 'public', '2016-11-24 15:35:22', 26, 'sandal.jpeg'),
(3, 'CLTH02', 'StMorita', 5, 'Bau', '123', '12', 12, 'public', '2012-11-26 00:54:51', 1, 'stmorita-logo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(10) UNSIGNED NOT NULL,
  `komentar` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `id_product` int(5) UNSIGNED NOT NULL,
  `id_user` int(5) UNSIGNED NOT NULL,
  `status` enum('aktif','blok') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `komentar`, `date`, `id_product`, `id_user`, `status`) VALUES
(1, 'barang jelek', '2016-06-30 08:50:21', 1, 11, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id_shipping` int(11) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `tarif` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id_shipping`, `lokasi`, `tarif`) VALUES
(1, 'Bandung', '8000'),
(2, 'Jakarta', '8000'),
(3, 'Bali', '32000'),
(4, 'Bekasi', '8000'),
(6, 'Depok', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` varchar(20) CHARACTER SET utf8 NOT NULL,
  `country` varchar(20) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `poscode` varchar(10) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('aktif','blokir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `password`, `city`, `country`, `address`, `poscode`, `email`, `phone`, `date`, `status`) VALUES
(11, 'Aris Agung Wibono', 'ab1a0e91c2d6d52da8fd719099539298', 'DKI Jakarta', 'Indonesia', 'Jl. Langgar Rt.014/003 No.31 Kebagusan, Pasar Minggu, Jakarta Selatan', '12520', 'aris@sipitung.com', '08571134324', '2016-06-04 23:58:11', 'aktif'),
(12, 'Ilham Fauzi', 'ab1a0e91c2d6d52da8fd719099539298', 'alksjdklasjdkla', 'alskjdklasjd', 'jlasjdklajsdklja ', '1231', 'ilham@sipitung.com', '0203901923', '2012-11-26 00:53:18', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
