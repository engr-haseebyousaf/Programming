-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 07:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_email`, `admin_phone`, `admin_address`, `admin_username`, `admin_password`) VALUES
(1, 'John Doe', 'admin@gmail.com', '7410258963', 'New York', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin', 'admin@gmail.com', '00000000000', 'asdf jkl; asdf jkl;', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`site_id`, `site_name`, `site_logo`, `currency`) VALUES
(1, 'Vehicle Parking', '1723796054six.jpg', '$');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `parking_number` int(11) NOT NULL,
  `vehicle_cat` int(11) NOT NULL,
  `vehicle_company` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_contact` varchar(255) NOT NULL,
  `vehicle_intime` datetime NOT NULL,
  `vehicle_outtime` datetime DEFAULT NULL,
  `parking_charges` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `vehicle_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `parking_number`, `vehicle_cat`, `vehicle_company`, `reg_number`, `owner_name`, `owner_contact`, `vehicle_intime`, `vehicle_outtime`, `parking_charges`, `remark`, `vehicle_status`) VALUES
(14, 687169798, 6, 'honda', '125360', 'Haseeb Yousaf', '03137316334', '2024-08-16 08:00:00', '2024-08-16 11:00:00', 0, NULL, 1),
(15, 758623450, 5, 'yamaha', '1254893', 'Sami', '03137316334', '2024-08-19 13:17:15', '2024-08-19 15:17:15', NULL, NULL, 0),
(16, 126297055, 6, 'Road Prince', '12545842', 'Haseeb', '313731664646', '2024-08-24 13:26:33', '2024-08-24 17:26:33', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_category`
--

CREATE TABLE `vehicle_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parking_charge` int(11) NOT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_category`
--

INSERT INTO `vehicle_category` (`id`, `category_name`, `parking_charge`, `category_status`) VALUES
(3, 'trucks', 200, 1),
(4, 'cars', 150, 1),
(5, 'motorcycles', 100, 1),
(6, 'bikes', 120, 1),
(7, 'heavy motors', 500, 1),
(8, 'cycles', 50, 1),
(9, 'old cars', 100, 1),
(10, 'old trucks', 150, 1),
(11, 'old cycles', 20, 1),
(12, 'electric cars', 250, 0),
(13, 'electric trucks', 500, 1),
(14, 'space ships', 100000, 1),
(15, 'tesla cars', 200, 1),
(16, 'hybrid cars', 350, 1),
(17, 'hybrid trucks', 600, 1),
(18, 'super sports cars', 10000, 1),
(19, 'super sports hybrid cars', 12000, 1),
(20, 'millitary cars', 10, 1),
(21, 'cyber trucks', 1230, 1),
(22, 'luxury cars', 5000, 1),
(23, 'food truck', 400, 1),
(24, '70 bike', 25, 1),
(25, 'yamaha bike', 30, 1),
(26, 'rolls royas', 60000, 1),
(27, 'chingchi rickshaw', 5, 1),
(28, 'auto rickshaw', 8, 1),
(29, 'jeep', 500, 1),
(30, 'gold plated car', 20000, 1),
(31, 'diamond plated car', 30000, 1),
(32, 'two seater normal car', 400, 1),
(33, 'ISSR', 2147483647, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_cat` (`vehicle_cat`);

--
-- Indexes for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`vehicle_cat`) REFERENCES `vehicle_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
