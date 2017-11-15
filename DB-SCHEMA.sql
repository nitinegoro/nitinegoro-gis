-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 07:26 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas-gis`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Hotel'),
(2, 'Losmen'),
(3, 'Penginapan');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `ID` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `address` text,
  `photo` varchar(250) DEFAULT NULL,
  `amenities` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`ID`, `name`, `price`, `latitude`, `longitude`, `address`, `photo`, `amenities`, `description`) VALUES
(1, 'Soll Marina Hotel & Conference Center Bangka', 430000, '-2.1796665', '106.132781', NULL, 'sollmarina.jpg', NULL, NULL),
(2, 'Menumbing Heritage Hotel', 550000, '-2.1278268', '106.117332', NULL, 'menumbing.jpg', NULL, NULL),
(3, 'Hotel Santika Bangka', 453000, '-2.1543595', '106.1286965', NULL, 'santika.jpg', NULL, NULL),
(4, 'Hotel Aksi Naturan Sport', 350000, '-2.1364852', '106.083353', NULL, NULL, NULL, NULL),
(5, 'Hotel Mitra Garden', 300000, '-2.134374', '106.1035178', NULL, NULL, NULL, NULL),
(6, 'Hotel Grand Vella', 320000, '-2.1538948', '106.128336', NULL, NULL, NULL, NULL),
(7, 'Melati Penginapan, Masjid Jamik', 230000, '-2.130061', '106.1125314', NULL, NULL, NULL, NULL),
(8, 'Penginapan Sejati', 130000, '-2.1294822', '106.1126002', NULL, NULL, NULL, NULL),
(9, 'Penginapan Bukit Sofa', 90000, '-2.1295835', '106.1129214', NULL, NULL, NULL, NULL),
(10, 'Penginapan Srikandi', 120000, '-2.1293823', '106.1129155', NULL, NULL, NULL, NULL),
(11, 'Hotel Golden Vella', 330000, '-2.1279079', '106.1139019', NULL, NULL, NULL, NULL),
(12, 'Puncak Hotel', 420000, '-2.1272516', '106.1139013', NULL, NULL, NULL, NULL),
(13, 'Hotel Al Huriah', 120000, '-2.1271427', '106.1134458', NULL, NULL, NULL, NULL),
(14, 'Hotel Xinlu', 230000, '-2.1273535', '106.1072252', NULL, NULL, NULL, NULL),
(15, 'Bangka City Hotel', 540000, '-2.1385651', '106.1462492', NULL, NULL, NULL, NULL),
(16, 'Puri 56 Hotel', 330000, '-2.1214106', '106.1092814', NULL, NULL, NULL, NULL),
(17, 'Hotel Grand Sabrina', 230000, '-2.1217752', '106.1122648', NULL, NULL, NULL, NULL),
(18, 'Jati Wisata Hotel', 200000, '-2.1188741', '106.1115325', NULL, NULL, NULL, NULL),
(19, 'Hotel Bumi Asih', 340000, '-2.1177697', '106.1122911', NULL, NULL, NULL, NULL),
(20, 'Swasta Hotel', 220000, '-2.1411328', '106.1166418', NULL, NULL, NULL, NULL),
(21, 'Hotel Wongso', 88000, '-2.1331138', '106.1153496', NULL, NULL, NULL, NULL),
(22, 'Grand Mutiara Bangka', 549000, '-2.1321271', '106.1159634', 'Jl. Kp. Bintang, Bintang, Rangkui, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33684', 'grand-Mutiara.jpg', 'Wifi, AC, TV kabel, Smooking Area', '-'),
(23, 'Brilliant Inn Wisma', 130000, '-2.1319686', '106.1176881', NULL, NULL, NULL, NULL),
(24, 'Sun Hotel Pangkalpinang', 340000, '-2.1310076', '106.1150567', NULL, NULL, NULL, NULL),
(25, 'Ren\'z Hotel', 450000, '-2.1354581', '106.1182604', NULL, NULL, NULL, NULL),
(26, 'Penginapan Kaisar', 240000, '-2.1302559', '106.1093685', NULL, NULL, NULL, NULL),
(27, 'Damai Inn Bangka', 340000, '-2.1090396', '106.1124883', NULL, NULL, NULL, NULL),
(28, 'Hotel Rapos', 378000, '-2.1036752', '106.1166497', NULL, NULL, NULL, NULL),
(29, 'Airy Pangkal Pinang Aleksander 1 Bangka', 327000, '-2.1387189', '106.1462424', NULL, NULL, NULL, NULL),
(30, 'Grand PUNCAK Lestari Hotel', 230000, '-2.0931313', '106.1106234', NULL, NULL, NULL, NULL),
(31, 'Hotel Sola Gracia', 378000, '-2.1247063', '106.1233929', 'JL Teluk Bayur, No. 223 RT 08, RW 03, Pasir Putih, Pangkalpinang, Bangka, 33139', 'hotel-solagracia-448x330.jpg', 'AC, TV kabel, Smooking Area', '-'),
(32, 'Swiss Bell Hotel', 400000, '-2.1261142', '106.1143528', NULL, NULL, NULL, NULL),
(33, 'Hotel Galaxy Inn', 90000, '-2.1278169', '106.1133739', NULL, NULL, NULL, NULL),
(34, 'HOTEL SAHID BANGKA', 378000, '-2.1437636', '106.1233795', 'Jl. Soekarno Hatta No.5, Bukit besar, Kec. Girimaya, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33145', NULL, 'Wifi, AC, TV kabel, Telepon, Smooking Area', 'HOTEL SAHID BANGKA merupakan mahakarya dari PT Sahid Bangka Asri yang merupakan bagian dari SAHID GROUP sebagai perusahaan yang sudah berpengalaman dalam bidang pembangunan perhotelan dan sekaligus sebagai operator / pengelola Hotel.\r\nHOTEL SAHID BANGKA merupakan Condotel Pertama di Bangka dengan Konsep Lifestyle in The City.'),
(35, 'Novotel Bangka Hotel and Convention Centre', 567000, '-2.156476565499724', '106.13088730352763', 'Jl. Soekarno Hatta KM. 5, Dul, Pangkalan Baru, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33172', '', 'Wifi, AC, TV kabel, Telepon, Shower Panas & Dingin, Smooking Area', 'Novotel Bangka Hotel and Convention Center terletak di Pangkal Pinang, kota terbesar di pulau Bangka. Hotel ini menawarkan keanggunan Indonesia dan dapat menyelenggarakan semua acara Anda mulai dari pesta pernikahan sampai pertemuan dan pameran. Sebuah kolam renang outdoor juga menanti Anda. Pilihlah dari kamar bergaya, suite atau lounge eksekutif VIP untuk masa menginap yang santai di Novotel.'),
(36, 'Hotel Griya Tirta', 22000, '-2.1357864', '106.1298755', 'Jl. Semabung Lama No. 272, Semabung Lama, Bukit Intan, Semabung Lama, Bukit Intan, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33684', 'griya_tirta_hotel.jpg', 'AC, TV kabel, Smooking Area', 'efwef');

-- --------------------------------------------------------

--
-- Table structure for table `hotelcategories`
--

CREATE TABLE `hotelcategories` (
  `hotelcategories_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotelcategories`
--

INSERT INTO `hotelcategories` (`hotelcategories_id`, `hotel_id`, `category_id`) VALUES
(1, 35, 1),
(2, 35, 1),
(3, 35, 1),
(4, 35, 1),
(5, 34, 1),
(6, 34, 3),
(7, 22, 1),
(8, 22, 3),
(9, 31, 1),
(10, 31, 3),
(11, 35, 1),
(12, 36, 1),
(13, 36, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'Muhammad Vicky Saputra', 'admin', 'mail@vicky.work', '$2y$10$o88Y8KTfkAHgTX5HRstdReV1nBnrBENmxp5FUV6oyAL3tmdSsqviK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hotelcategories`
--
ALTER TABLE `hotelcategories`
  ADD PRIMARY KEY (`hotelcategories_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `hotelcategories`
--
ALTER TABLE `hotelcategories`
  MODIFY `hotelcategories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
