-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2021 at 06:30 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog_data`
--

CREATE TABLE `catalog_data` (
  `cd_id` int(11) NOT NULL,
  `cd_ud_id` int(11) DEFAULT NULL,
  `cd_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cd_price` double DEFAULT NULL,
  `cd_desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cd_img` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cd_log` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog_data`
--

INSERT INTO `catalog_data` (`cd_id`, `cd_ud_id`, `cd_name`, `cd_price`, `cd_desc`, `cd_img`, `cd_log`) VALUES
(1, 2, 'mee goreng', 12.9, 'mee goreng dari timur tengah', NULL, '2020/12/26 22:30pm'),
(3, 2, 'nasi goreng ayam', 14.9, 'nasi goreng dari jawa tengah', NULL, '2020/12/26 22:32pm'),
(4, 2, 'nasi goreng pattaya', 12.9, 'nasi goreng dari jawa tengah', NULL, '2020/12/26 22:31pm'),
(6, 4, 'kuey tiew basah kungfu', 8.5, 'kuey tiew tiau kungfu hustle dari japang', NULL, '2020/12/26 22:46pm');

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

CREATE TABLE `order_data` (
  `od_id` int(11) NOT NULL,
  `od_ud_id` int(11) DEFAULT NULL,
  `od_cd_id` int(11) DEFAULT NULL,
  `od_quantity` int(11) DEFAULT NULL,
  `od_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `od_log` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`od_id`, `od_ud_id`, `od_cd_id`, `od_quantity`, `od_status`, `od_log`) VALUES
(9, 1, 1, 2, 'Completed', NULL),
(10, 1, 6, 1, 'Completed', NULL),
(20, 1, 1, 1, 'Preparing', '21:07:11 2021-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `payment_data`
--

CREATE TABLE `payment_data` (
  `pd_id` int(11) NOT NULL,
  `pd_od_id` int(11) DEFAULT NULL,
  `pd_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pd_amount` double DEFAULT NULL,
  `pd_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pd_log` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_data`
--

CREATE TABLE `table_data` (
  `td_id` int(11) NOT NULL,
  `td_ud_id` int(11) DEFAULT NULL,
  `td_name` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `td_time` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `td_status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `td_log` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_data`
--

INSERT INTO `table_data` (`td_id`, `td_ud_id`, `td_name`, `td_time`, `td_status`, `td_log`) VALUES
(1, NULL, 'Table 1', '2', NULL, NULL),
(2, NULL, 'Table 1', '3', NULL, NULL),
(3, 1, 'Table 1', '4', 'Booked', '06:29:15 2021-08-03'),
(4, NULL, 'Table 1', '5', NULL, NULL),
(5, 1, 'Table 1', '6', 'Booked', NULL),
(6, NULL, 'Table 1', '7', NULL, NULL),
(7, NULL, 'Table 2', '2', NULL, NULL),
(8, 2, 'Table 2', '3', 'Booked', NULL),
(9, NULL, 'Table 2', '4', NULL, NULL),
(10, NULL, 'Table 2', '5', NULL, NULL),
(11, NULL, 'Table 2', '6', NULL, NULL),
(12, NULL, 'Table 2', '7', NULL, NULL),
(13, NULL, 'Table 3', '2', NULL, NULL),
(14, NULL, 'Table 3', '3', NULL, NULL),
(15, NULL, 'Table 3', '4', NULL, NULL),
(16, NULL, 'Table 3', '5', NULL, NULL),
(17, NULL, 'Table 3', '6', NULL, NULL),
(18, NULL, 'Table 3', '7', NULL, NULL),
(19, NULL, 'Table 4', '2', NULL, NULL),
(20, NULL, 'Table 4', '3', NULL, NULL),
(21, NULL, 'Table 4', '4', NULL, NULL),
(22, NULL, 'Table 4', '5', NULL, NULL),
(23, NULL, 'Table 4', '6', NULL, NULL),
(24, NULL, 'Table 4', '7', NULL, NULL),
(25, NULL, 'Table 5', '2', NULL, NULL),
(26, NULL, 'Table 5', '3', NULL, NULL),
(27, NULL, 'Table 5', '4', NULL, NULL),
(28, NULL, 'Table 5', '5', NULL, NULL),
(29, NULL, 'Table 5', '6', NULL, NULL),
(30, NULL, 'Table 5', '7', NULL, NULL),
(31, NULL, 'Table 6', '2', NULL, NULL),
(32, NULL, 'Table 6', '3', NULL, NULL),
(33, NULL, 'Table 6', '4', NULL, NULL),
(34, NULL, 'Table 6', '5', NULL, NULL),
(35, NULL, 'Table 6', '6', NULL, NULL),
(36, NULL, 'Table 6', '7', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `ud_id` int(11) NOT NULL,
  `ud_full_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ud_contact` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ud_username` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ud_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ud_role` int(11) DEFAULT NULL,
  `ud_log` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`ud_id`, `ud_full_name`, `ud_contact`, `ud_username`, `ud_password`, `ud_role`, `ud_log`) VALUES
(1, 'adam mikaila', '01088842812', 'adam', '1d7c2923c1684726dc23d2901c4d8157', 0, '2021-08-03 06:29:13'),
(2, 'makcik kiah', '0197896765', 'kiah', '0b79eec866e9be97a8fc9fe9955853fd', 1, '2021-07-18 03:22:27'),
(4, 'damm', NULL, 'damm', '0cb0241e3244dd88a346f9d853d8836a', 1, '2021-07-10 02:28:19'),
(15, 'admin', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, '2020/12/26 22:33pm'),
(16, 'adam aiman', '0108884287', 'adamny', 'c05771e61ad36d14eeb66cb6d00c2ebc', 0, '2021-07-18 03:20:09'),
(17, 'adaman', '123', 'adaman', 'c05771e61ad36d14eeb66cb6d00c2ebc', 0, '2021-07-18 03:18:48'),
(18, 'mazliana', '0142183198', 'mazliana', '8aef2e33be625f1603f1658061866516', 1, '2021-07-18 03:20:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog_data`
--
ALTER TABLE `catalog_data`
  ADD PRIMARY KEY (`cd_id`),
  ADD KEY `ctlog_usrdt_id` (`cd_ud_id`);

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `ordr_usrdt_id` (`od_ud_id`),
  ADD KEY `ordr_ctlog_id` (`od_cd_id`);

--
-- Indexes for table `payment_data`
--
ALTER TABLE `payment_data`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `inv_ordr_id` (`pd_od_id`);

--
-- Indexes for table `table_data`
--
ALTER TABLE `table_data`
  ADD PRIMARY KEY (`td_id`),
  ADD KEY `td_ud_id` (`td_ud_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog_data`
--
ALTER TABLE `catalog_data`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment_data`
--
ALTER TABLE `payment_data`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_data`
--
ALTER TABLE `table_data`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalog_data`
--
ALTER TABLE `catalog_data`
  ADD CONSTRAINT `catalog_data_ibfk_1` FOREIGN KEY (`cd_ud_id`) REFERENCES `user_data` (`ud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_data`
--
ALTER TABLE `order_data`
  ADD CONSTRAINT `order_data_ibfk_1` FOREIGN KEY (`od_cd_id`) REFERENCES `catalog_data` (`cd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_data_ibfk_2` FOREIGN KEY (`od_ud_id`) REFERENCES `user_data` (`ud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_data`
--
ALTER TABLE `payment_data`
  ADD CONSTRAINT `payment_data_ibfk_1` FOREIGN KEY (`pd_od_id`) REFERENCES `order_data` (`od_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_data`
--
ALTER TABLE `table_data`
  ADD CONSTRAINT `table_data_ibfk_1` FOREIGN KEY (`td_ud_id`) REFERENCES `user_data` (`ud_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
