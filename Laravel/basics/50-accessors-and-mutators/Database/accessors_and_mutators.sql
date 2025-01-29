-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 06:45 PM
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
-- Database: `accessors_and_mutators`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_01_29_164407_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `age`, `city`) VALUES
(1, 'Myriam Keebler', 'moises.kuphal@gmail.com', 86, 'Oberbrunnertown'),
(2, 'Shirley Pouros', 'muller.makenzie@hotmail.com', 56, 'Murraybury'),
(3, 'Kennith Brekke', 'alan76@gmail.com', 100, 'West Bruce'),
(4, 'Reuben Dibbert', 'bogisich.jaime@sipes.org', 78, 'Port Hirammouth'),
(5, 'Prof. Nigel Miller DDS', 'mitchell.bernita@nienow.com', 57, 'South Boshire'),
(6, 'Mary Willms', 'corwin.maddison@prosacco.com', 37, 'Blickchester'),
(7, 'Jason Wintheiser', 'gleichner.kevon@yahoo.com', 92, 'Cameronstad'),
(8, 'Adrianna Kuhn', 'gertrude17@yahoo.com', 67, 'Kassulkechester'),
(9, 'Nat Kassulke', 'jkuphal@gmail.com', 68, 'McClurefort'),
(10, 'Dr. Torrey Borer II', 'lura21@wolff.biz', 94, 'Bernhardfort'),
(11, 'HASEEB YOUSAF', 'HASEEB@GMAIL.COM', 23, 'FAISALABAD'),
(12, 'One Two', 'one@gmail.com', 23, 'FAISALABAD'),
(13, 'tworen tajj;', 'klj@gmail.com', 81, 'ga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
