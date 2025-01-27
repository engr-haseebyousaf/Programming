-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 08:14 PM
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
-- Database: `json_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `json_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `json_data`, `created_at`, `updated_at`) VALUES
(1, '{\"name\":\"Haseeb Yousaf\",\"email\":\"haseebyousaf@gmail.com\",\"contact\":\"0313-73164589\"}', '2025-01-27 13:38:47', '2025-01-27 13:38:47'),
(2, '{\"name\":\"Sakhi Server\",\"email\":\"sakhi@gmail.com\",\"contact\":\"0231-3698521\"}', '2025-01-27 13:45:06', '2025-01-27 14:10:42'),
(3, '{\"name\":\"Mohsin Yousaf\",\"email\":\"mohsinyousaf@gmail.com\",\"contact\":\"0300-000000000\"}', '2025-01-27 13:46:29', '2025-01-27 13:46:29'),
(4, '{\"name\":\"Asad Yousaf\",\"email\":\"asadyousaf@gmail.com\",\"contact\":\"0300-000000000\",\"address\":{\"street\":\"hljaj\",\"mohala\":\"abc\"}}', '2025-01-27 13:48:29', '2025-01-27 13:48:29'),
(5, '{\"name\":\"Asad Yousaf\",\"email\":\"asadyousaf@gmail.com\",\"contact\":\"0300-000000000\",\"address\":{\"street\":\"hljaj\",\"mohala\":\"abc\"}}', '2025-01-27 13:50:37', '2025-01-27 13:50:37'),
(6, '{\"name\":\"Asad Yousaf\",\"email\":\"asadyousaf@gmail.com\",\"contact\":\"0300-000000000\",\"address\":{\"street\":\"hljaj\",\"mohala\":\"abc\"}}', '2025-01-27 13:51:15', '2025-01-27 13:51:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
