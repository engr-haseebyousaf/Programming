-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 04:51 PM
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
-- Database: `many_poly`
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
(1, '2025_01_27_065725_create_posts_table', 1),
(2, '2025_01_27_065815_create_videos_table', 1),
(3, '2025_01_27_065844_create_taggable_table', 1),
(4, '2025_01_27_095031_create_tags_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet.', 'lorem ipsum dolor sit amet. lorem ipsum dolor sit amet.', '2025-01-27 09:00:43', '2025-01-27 09:00:43'),
(2, 'Lorem ipsum dolor sit amet.', 'lorem ipsum dolor sit amet. lorem ipsum dolor sit amet.', '2025-01-27 09:01:08', '2025-01-27 09:01:08'),
(3, 'Lorem ipsum dolor sit amet.', 'lorem ipsum dolor sit amet. lorem ipsum dolor sit amet.', '2025-01-27 09:01:11', '2025-01-27 09:01:11'),
(4, 'Lorem ipsum dolor sit amet.', 'lorem ipsum dolor sit amet. lorem ipsum dolor sit amet.', '2025-01-27 09:01:13', '2025-01-27 09:01:13'),
(5, 'Lorem ipsum dolor sit amet.', 'lorem ipsum dolor sit amet. lorem ipsum dolor sit amet.', '2025-01-27 09:01:15', '2025-01-27 09:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `taggable`
--

CREATE TABLE `taggable` (
  `tag_id` int(11) NOT NULL,
  `taggable_type` varchar(255) NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggable`
--

INSERT INTO `taggable` (`tag_id`, `taggable_type`, `taggable_id`) VALUES
(1, 'App\\Models\\Post', 1),
(2, 'App\\Models\\Post', 2),
(3, 'App\\Models\\Post', 3),
(4, 'App\\Models\\Post', 4),
(5, 'App\\Models\\Post', 5),
(6, 'App\\Models\\Video', 10),
(7, 'App\\Models\\Video', 11),
(8, 'App\\Models\\Video', 12),
(3, 'App\\Models\\Video', 1),
(2, 'App\\Models\\Video', 1),
(2, 'App\\Models\\Post', 1),
(3, 'App\\Models\\Post', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `body`, `created_at`, `updated_at`) VALUES
(1, 'This is the hashtag of third post', '2025-01-27 09:00:43', '2025-01-27 09:00:43'),
(2, 'This is the hashtag of third post', '2025-01-27 09:01:08', '2025-01-27 09:01:08'),
(3, 'This is the hashtag of third post', '2025-01-27 09:01:11', '2025-01-27 09:01:11'),
(4, 'This is the hashtag of third post', '2025-01-27 09:01:13', '2025-01-27 09:01:13'),
(5, 'This is the hashtag of third post', '2025-01-27 09:01:15', '2025-01-27 09:01:15'),
(6, 'This is the hashtag', '2025-01-27 09:07:16', '2025-01-27 09:07:16'),
(7, 'This is the hashtag', '2025-01-27 09:07:28', '2025-01-27 09:07:28'),
(8, 'This is the hashtag', '2025-01-27 09:07:30', '2025-01-27 09:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `url`, `created_at`, `updated_at`) VALUES
(1, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:01:40', '2025-01-27 09:01:40'),
(2, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:02:15', '2025-01-27 09:02:15'),
(3, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:03:23', '2025-01-27 09:03:23'),
(4, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:03:27', '2025-01-27 09:03:27'),
(5, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:03:28', '2025-01-27 09:03:28'),
(6, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:03:55', '2025-01-27 09:03:55'),
(7, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:05:30', '2025-01-27 09:05:30'),
(8, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:05:59', '2025-01-27 09:05:59'),
(9, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:06:36', '2025-01-27 09:06:36'),
(10, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:07:15', '2025-01-27 09:07:15'),
(11, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:07:28', '2025-01-27 09:07:28'),
(12, 'video one', 'images/courses/course_two.mp4', '2025-01-27 09:07:30', '2025-01-27 09:07:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggable`
--
ALTER TABLE `taggable`
  ADD KEY `taggable_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
