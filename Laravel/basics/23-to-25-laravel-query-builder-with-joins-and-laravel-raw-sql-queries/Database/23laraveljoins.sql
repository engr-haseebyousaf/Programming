-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 09:23 AM
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
-- Database: `23laraveljoins`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityId` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityId`, `city`) VALUES
(1, 'Aldenbury'),
(2, 'Hintzfort'),
(3, 'Volkmanstad'),
(4, 'South Shakira'),
(5, 'New Mattie'),
(6, 'South Katlynshire'),
(7, 'New Lance'),
(8, 'Gaylordland'),
(9, 'West Simonestad'),
(10, 'Murraymouth'),
(11, 'West Holden'),
(12, 'New Alvertaberg'),
(13, 'Reingerbury'),
(14, 'East Timmytown'),
(15, 'South Bellmouth'),
(16, 'North Carrollton'),
(17, 'South Careystad'),
(18, 'Chanelfort'),
(19, 'South Deltaburgh'),
(20, 'West Francesca'),
(21, 'South Nasir'),
(22, 'Marvinview'),
(23, 'East Gracielahaven'),
(24, 'Adrianamouth'),
(25, 'East Selina'),
(26, 'South Jannie'),
(27, 'Vanceside'),
(28, 'East Amie'),
(29, 'Milfordstad'),
(30, 'Glovermouth'),
(31, 'West Leoramouth'),
(32, 'Lake Isaiville'),
(33, 'Elliottborough'),
(34, 'Lucieside'),
(35, 'Lilymouth'),
(36, 'Strosinton'),
(37, 'Kyleighville'),
(38, 'New Enoch'),
(39, 'Earnestineton'),
(40, 'Heathcotefurt'),
(41, 'Traceton'),
(42, 'Lake Robbport'),
(43, 'Lake Hosea'),
(44, 'Harberberg'),
(45, 'New Verlastad'),
(46, 'New Diegochester'),
(47, 'Morarton'),
(48, 'South Amaya'),
(49, 'Kellifurt'),
(50, 'Isadoreville');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `lecturerId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lecturerCityId` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lecturerId`, `name`, `email`, `lecturerCityId`) VALUES
(1, 'Prof. Camren Gutkowski', 'qgreenholt@gmail.com', 31),
(2, 'Nicholaus Franecki', 'lemke.anais@hotmail.com', 31),
(3, 'Miss Golda Turner Jr.', 'nkeeling@gmail.com', 31),
(4, 'Linda Weimann', 'sarai73@gerhold.com', 31),
(5, 'Prof. Orion Howe', 'sdaugherty@hotmail.com', 31),
(6, 'Miss Betsy Crist Sr.', 'kenneth41@gmail.com', 32),
(7, 'Daniella Dare', 'haley.eleanora@kirlin.com', 32),
(8, 'Damien Schuster', 'frami.emmet@mueller.com', 32),
(9, 'Tracey Steuber', 'veronica.treutel@quitzon.com', 32),
(10, 'Prof. Dino Dach', 'dewitt94@gmail.com', 32),
(11, 'Jeramie Yost', 'willard35@yahoo.com', 33),
(12, 'Moises Howe', 'vkutch@hotmail.com', 33),
(13, 'Christine Koch I', 'oswaldo.watsica@hotmail.com', 33),
(14, 'Diana Breitenberg Jr.', 'clesch@bashirian.net', 33),
(15, 'Dayna Hayes', 'langosh.orie@yahoo.com', 33),
(16, 'Miss Birdie Wiegand Jr.', 'veronica.jacobs@gmail.com', 34),
(17, 'Adella Prohaska Sr.', 'tara.bosco@koepp.com', 34),
(18, 'Mr. Jarred Ferry', 'macejkovic.joannie@yahoo.com', 34),
(19, 'Joel Collier', 'isatterfield@gmail.com', 34),
(20, 'Ari Mosciski', 'monahan.carlos@rath.biz', 34),
(21, 'Dr. Hank Hahn Jr.', 'alec.hessel@nolan.org', 35),
(22, 'Dejon Turner', 'dominic.collier@gmail.com', 35),
(23, 'Gerhard Morar', 'alex.schuppe@mclaughlin.com', 35),
(24, 'Prof. Geovany Farrell', 'cathy44@flatley.biz', 35),
(25, 'Dr. Skylar Thiel', 'lehner.michael@pfeffer.com', 35),
(26, 'Mr. Grayson Howell DDS', 'deshawn.kling@yahoo.com', 36),
(27, 'Robbie Medhurst', 'alfred.quigley@leffler.biz', 36),
(28, 'Cecelia Ritchie', 'bo.quigley@schmeler.biz', 36),
(29, 'Joe Dicki', 'damien.steuber@yahoo.com', 36),
(30, 'Calista Harvey', 'smitham.celestine@hotmail.com', 36),
(31, 'Jerald Skiles V', 'lindgren.karina@wiegand.com', 37),
(32, 'Corine Hackett', 'waldo90@gmail.com', 37),
(33, 'Mr. Selmer Beatty', 'dina.eichmann@dietrich.com', 37),
(34, 'Arlie Hills', 'keeley20@ernser.net', 37),
(35, 'Miss Daniella Mitchell', 'randi.roob@herzog.com', 37),
(36, 'Dr. Ryley Abernathy', 'pvandervort@gmail.com', 38),
(37, 'Reanna Greenfelder', 'clakin@gmail.com', 38),
(38, 'Mr. Dayton Padberg', 'korbin38@boehm.com', 38),
(39, 'Liana Jast', 'penelope.romaguera@yahoo.com', 38),
(40, 'Eveline Krajcik', 'wilfrid.schmidt@goldner.com', 38),
(41, 'Veda O\'Kon V', 'devyn97@okuneva.biz', 39),
(42, 'Tianna Satterfield', 'cruickshank.aurelie@hotmail.com', 39),
(43, 'Sean Hermiston', 'farrell.jayne@yahoo.com', 39),
(44, 'Alicia Jaskolski', 'karley.koss@ruecker.biz', 39),
(45, 'Miles Raynor', 'carter.steve@bernhard.com', 39),
(46, 'Frederique Friesen', 'pgulgowski@hotmail.com', 40),
(47, 'Judd Schinner', 'alysson.klocko@gmail.com', 40),
(48, 'Genesis Hintz', 'waelchi.muriel@yahoo.com', 40),
(49, 'Charlotte Osinski MD', 'colin65@hotmail.com', 40),
(50, 'Eddie Block I', 'melba.goodwin@hotmail.com', 40),
(51, 'Prof. Guillermo Leuschke Jr.', 'ledner.murray@johnston.info', 41),
(52, 'Mrs. Mary Jenkins', 'yzemlak@yahoo.com', 41),
(53, 'Mr. Kenton Feeney DDS', 'owalker@hotmail.com', 41),
(54, 'Dexter Kuhn', 'reta.zboncak@schinner.com', 41),
(55, 'Zoe Balistreri', 'kdouglas@windler.com', 41),
(56, 'Mr. Zakary Hartmann', 'eoberbrunner@mann.org', 42),
(57, 'Janiya O\'Reilly', 'cartwright.keshaun@hotmail.com', 42),
(58, 'Reid Schumm', 'gerry.hermiston@gmail.com', 42),
(59, 'Ms. Maryjane King', 'sonny.wilkinson@okuneva.org', 42),
(60, 'Vladimir Dickens', 'ryundt@hagenes.com', 42),
(61, 'Domenico Gusikowski MD', 'tiffany82@hirthe.com', 43),
(62, 'Mrs. Julianne Baumbach', 'roel.koss@nicolas.com', 43),
(63, 'Anais Baumbach Jr.', 'michael55@hansen.com', 43),
(64, 'Brenna Thiel', 'wiegand.alvah@hotmail.com', 43),
(65, 'Abigayle Schulist', 'gertrude.leuschke@bechtelar.biz', 43),
(66, 'Aditya Romaguera', 'rasheed53@ziemann.com', 44),
(67, 'Mabelle Lesch', 'volkman.florine@feest.net', 44),
(68, 'Mrs. Bernadette Cassin MD', 'mitchel14@yahoo.com', 44),
(69, 'Jeffry Upton DVM', 'raynor.reyna@yahoo.com', 44),
(70, 'Lacy Gottlieb', 'frances.frami@jenkins.com', 44),
(71, 'Mr. Wilfred Kuhn V', 'schmitt.jamil@strosin.com', 45),
(72, 'Ernie Bosco', 'irving07@hettinger.com', 45),
(73, 'Dr. Norbert Ryan', 'corwin.cassandra@kuhic.com', 45),
(74, 'Antonetta Kassulke MD', 'loraine.koss@hotmail.com', 45),
(75, 'Orie Hill', 'carmelo26@yahoo.com', 45),
(76, 'Kyler Kunze', 'qswaniawski@boyle.com', 46),
(77, 'Leonor O\'Connell', 'rowland.feeney@hotmail.com', 46),
(78, 'Georgette Douglas', 'abshire.lauretta@zboncak.net', 46),
(79, 'Gideon Cartwright', 'katherine.towne@yahoo.com', 46),
(80, 'Lexi Tromp Jr.', 'melba.lakin@armstrong.net', 46),
(81, 'Roberto Johns', 'enoch55@hotmail.com', 47),
(82, 'Winifred Legros', 'pgislason@gmail.com', 47),
(83, 'Kaleigh Bartell PhD', 'ethelyn80@yahoo.com', 47),
(84, 'Justyn Grimes DDS', 'rcollier@hotmail.com', 47),
(85, 'Devyn Predovic', 'rosalinda.von@hotmail.com', 47),
(86, 'Zoe Quigley', 'oral13@streich.com', 48),
(87, 'Holden Kerluke', 'ywelch@hotmail.com', 48),
(88, 'Donald Vandervort', 'lupe04@yahoo.com', 48),
(89, 'Bradford Bailey', 'lakin.reginald@yahoo.com', 48),
(90, 'Magnus Bednar', 'gottlieb.isac@kub.org', 48),
(91, 'Irwin Kris', 'evalyn93@hotmail.com', 49),
(92, 'Ms. Meaghan Pacocha DVM', 'britney.lockman@beier.com', 49),
(93, 'Edyth Lakin', 'jennifer11@yahoo.com', 49),
(94, 'Rashawn Kris', 'gulgowski.kamille@auer.com', 49),
(95, 'Mr. Dewitt Lueilwitz DVM', 'lewis60@carter.info', 49),
(96, 'Mr. Westley Erdman', 'brekke.vella@yahoo.com', 50),
(97, 'Lukas Mante DDS', 'labadie.jade@hotmail.com', 50),
(98, 'Leonora Kirlin', 'jonathan.boyer@bayer.com', 50),
(99, 'Sydney Borer', 'gfeeney@yahoo.com', 50),
(100, 'Humberto Oberbrunner', 'mellie48@yahoo.com', 50);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_16_172624_create_cities_table', 1),
(5, '2025_01_16_173601_create_students_table', 1),
(6, '2025_01_17_141733_create_lecturer_table', 2),
(7, '2025_01_17_141733_create_lecturers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kqgPOxlmVTdozxD3k7eiEC5nD8clflfkpW0qaeYY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjVUUEFTTWV3VENzUzlQRzU0N0ZGTW5DNVRiNUpTUnVQM3NwN0VQYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737101358),
('N8ilygDv2ufpoIj7ht15jqU4rOldzhGncxwRkWl8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1U0WmRqbzVvS2s0bVo4ckp0Njk3eFlLSVlqQml0QVNCTUU2YXJZUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jaHVuayI7fX0=', 1737133777),
('rMqJTNKbnArl5tycXOfcECo0wwLrmgtPEiMG6DGy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHBNbE1xMmQ4cTBIS2ZZZ0lGV1RjWEM2d2RDVHhTWUJVVEk0OWJZaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yYXdzcWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1737223875);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `studentCity` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `name`, `email`, `studentCity`) VALUES
(1, 'Marilie Orn', 'cberge@gmail.com', 1),
(2, 'Jessy Trantow', 'haseeb@gmail.com', 1),
(4, 'Geo Gusikowski', 'vince69@yahoo.com', 1),
(5, 'Astrid Mills', 'lionel.frami@hessel.com', 1),
(6, 'Prof. Reggie Hagenes Jr.', 'mclaughlin.letha@ziemann.net', 2),
(7, 'Nestor Block', 'hbalistreri@conroy.com', 2),
(8, 'Deonte Adams', 'cassin.bobbie@hotmail.com', 2),
(9, 'Maximillia Smith', 'daugherty.quincy@yahoo.com', 2),
(10, 'Kurtis Cartwright', 'johnston.roman@hotmail.com', 2),
(11, 'Ms. Lily Morar V', 'haven.hodkiewicz@gmail.com', 3),
(12, 'Vincenza Weimann', 'brekke.roger@schiller.net', 3),
(14, 'Raina Marquardt', 'blaise.bartoletti@hotmail.com', 3),
(15, 'Joshuah Klocko', 'narciso.balistreri@bauch.info', 3),
(16, 'Mrs. Annamarie Marks', 'conn.omari@romaguera.com', 4),
(17, 'Alexandrea Mueller PhD', 'larry.heaney@yahoo.com', 4),
(18, 'Napoleon Hettinger', 'tabitha.jenkins@weimann.com', 4),
(19, 'Mrs. Myrtice Zieme', 'alice.murazik@yahoo.com', 4),
(20, 'Hilma Douglas MD', 'kaya.kilback@gmail.com', 4),
(21, 'Mr. Rudy Ondricka', 'cconsidine@yahoo.com', 5),
(24, 'Maurice Reilly', 'ucollier@hotmail.com', 5),
(25, 'Tracy Spencer', 'alize85@gmail.com', 5),
(26, 'Josefa Aufderhar', 'laisha.jenkins@oreilly.com', 6),
(27, 'Dr. Conor Trantow', 'yvonrueden@gmail.com', 6),
(28, 'Ruby Mertz', 'sbashirian@bayer.com', 6),
(29, 'Mrs. Alycia Kling I', 'skiles.delores@yahoo.com', 6),
(30, 'Dr. Chesley Frami', 'adrianna.gleichner@mcdermott.net', 6),
(31, 'Ethelyn Mayert', 'jhansen@hotmail.com', 7),
(32, 'Deborah Von', 'deangelo66@yahoo.com', 7),
(33, 'Aaron O\'Hara', 'elna.veum@collier.com', 7),
(34, 'Prof. Garry Prosacco DVM', 'korbin10@gmail.com', 7),
(35, 'Stacy Grant', 'ldavis@wiegand.com', 7),
(36, 'Prof. Dashawn Casper', 'brennan75@hotmail.com', 8),
(37, 'Obie Marvin', 'patience.bergstrom@brakus.com', 8),
(38, 'Alden Cremin Jr.', 'estella.kub@gmail.com', 8),
(39, 'Ryleigh Metz', 'gilberto.johnson@yahoo.com', 8),
(40, 'Prof. Annie Kling', 'aondricka@hotmail.com', 8),
(41, 'Gordon Adams', 'kirlin.abbie@hessel.org', 9),
(42, 'Mr. Torrey Bins DVM', 'alessandra70@deckow.biz', 9),
(43, 'Mrs. Ila Ratke', 'ayana36@lebsack.com', 9),
(44, 'Alfred Raynor', 'calista14@tromp.info', 9),
(45, 'Helen Green', 'adams.emmanuel@bode.com', 9),
(46, 'Allan Wyman', 'sjenkins@hotmail.com', 10),
(47, 'Cali Ullrich MD', 'cbecker@herman.org', 10),
(48, 'Ms. Audie Schowalter', 'johns.pat@yahoo.com', 10),
(49, 'Prof. Maye Haag II', 'odessa45@bosco.net', 10),
(50, 'Lessie Jacobson', 'gaylord.rowan@hotmail.com', 10),
(51, 'Casey Stokes', 'lchristiansen@cruickshank.com', 11),
(52, 'Miss Aubree Kulas', 'alvina.leffler@hotmail.com', 11),
(53, 'Beth Collins', 'vanderson@gmail.com', 11),
(54, 'Louie McGlynn', 'clyde.kerluke@oberbrunner.com', 11),
(55, 'Lavina Spencer', 'ucronin@wolff.com', 11),
(56, 'Kole Lehner', 'aiyana.quigley@hotmail.com', 12),
(57, 'Mr. Taylor Bechtelar', 'horacio.lebsack@erdman.org', 12),
(58, 'Ruben Thiel', 'wiegand.erling@thompson.com', 12),
(59, 'Gudrun Pollich', 'heather.gusikowski@pollich.org', 12),
(60, 'Mr. Amani Larson', 'sjones@kiehn.com', 12),
(61, 'Ms. Audrey Dickinson DVM', 'schinner.otis@sanford.com', 13),
(62, 'Evalyn Bruen', 'wunsch.kaley@bednar.com', 13),
(63, 'Geraldine Stracke', 'wisoky.julie@tromp.com', 13),
(64, 'Lynn Rolfson', 'sibyl.runolfsson@heaney.com', 13),
(65, 'Rowena Padberg', 'wilbert.becker@hotmail.com', 13),
(66, 'Dr. Zane Maggio', 'koss.breanna@rempel.com', 14),
(67, 'Jazmyn Wyman MD', 'madisen40@gmail.com', 14),
(68, 'Jamaal Wunsch', 'heaven65@bernhard.com', 14),
(69, 'Alf O\'Connell DDS', 'nyah.watsica@yahoo.com', 14),
(70, 'Brooklyn Balistreri', 'deborah64@keebler.info', 14),
(71, 'Telly Murazik DVM', 'morissette.eve@dubuque.info', 15),
(72, 'Dr. Ernie Grant', 'little.clifton@yahoo.com', 15),
(73, 'Rosalyn Sanford', 'hkonopelski@denesik.com', 15),
(74, 'Mr. Conner D\'Amore', 'elton49@dickinson.info', 15),
(75, 'Madge Price', 'farrell.shaun@pollich.com', 15),
(76, 'Hassie Schulist', 'erling08@gmail.com', 16),
(77, 'Dr. Reed Mertz', 'dschuster@yahoo.com', 16),
(78, 'Manuel Hand', 'kareem90@connelly.info', 16),
(79, 'Imogene Hegmann', 'vada.schowalter@reilly.info', 16),
(80, 'Elza Kreiger DDS', 'blanda.leone@hotmail.com', 16),
(81, 'Khalil Tillman', 'fanny41@fay.com', 17),
(82, 'Prof. Antoinette Hill V', 'agibson@berge.com', 17),
(83, 'Ellie Barrows', 'leffler.evert@yahoo.com', 17),
(84, 'Christelle Schneider', 'jamir.wintheiser@rath.biz', 17),
(85, 'Mrs. Letha Pollich', 'ally47@schiller.info', 17),
(86, 'Zita Emard', 'easton.harvey@jacobi.com', 18),
(87, 'Mylene Heaney', 'judson.tillman@hotmail.com', 18),
(88, 'Sallie Boyle', 'smitham.adrienne@yahoo.com', 18),
(89, 'Dr. Mervin Simonis', 'wharris@gmail.com', 18),
(90, 'Dorthy Durgan', 'mclaughlin.hayden@wyman.com', 18),
(91, 'Rylan Halvorson', 'wolff.jermaine@gmail.com', 19),
(92, 'Mrs. Sydni Emmerich Sr.', 'roob.joshua@mccullough.com', 19),
(93, 'Prof. Antone Weimann', 'bernard.mcdermott@gmail.com', 19),
(94, 'Lonie Baumbach', 'pfeffer.florencio@koss.com', 19),
(95, 'Alize Stanton', 'maud.beier@kohler.org', 19),
(96, 'Vada Jones IV', 'erwin95@gmail.com', 20),
(97, 'Prof. Vicente Streich Jr.', 'mdouglas@yahoo.com', 20),
(98, 'Mrs. Annabell Ruecker', 'dterry@gmail.com', 20),
(99, 'Jadon Schinner', 'montana89@hotmail.com', 20),
(100, 'Shyann Stoltenberg V', 'bins.sven@gibson.org', 20),
(101, 'Clyde Willms PhD', 'vhuel@hotmail.com', 21),
(102, 'Mr. Enoch Rempel DVM', 'dborer@swift.com', 21),
(103, 'Al Schultz PhD', 'ernest82@gmail.com', 21),
(104, 'Mrs. Mabel Kreiger', 'ojohnson@gmail.com', 21),
(105, 'Dr. Damaris Klocko', 'isauer@schmitt.com', 21),
(106, 'Kurt Buckridge', 'preston.hermann@hettinger.com', 22),
(107, 'Andrew Bayer', 'gerardo.leuschke@gmail.com', 22),
(108, 'Liliana Cormier I', 'beier.nathan@yahoo.com', 22),
(109, 'Rodger Gulgowski', 'jazlyn.miller@yahoo.com', 22),
(110, 'Ms. Vilma Abernathy', 'jdooley@hyatt.com', 22),
(111, 'Prof. Pete Langworth IV', 'crunte@larkin.info', 23),
(112, 'Duane Hyatt', 'alphonso73@lang.info', 23),
(113, 'Judge Reichert II', 'rosie10@mccullough.com', 23),
(114, 'Nayeli Spencer DDS', 'austin.kemmer@yahoo.com', 23),
(115, 'Claude Schuppe', 'bartoletti.raoul@gmail.com', 23),
(116, 'Jasen Renner', 'hane.emely@schmitt.org', 24),
(117, 'Mr. Ken Harris', 'serenity02@muller.org', 24),
(118, 'Nikolas Larkin', 'tnitzsche@bednar.org', 24),
(119, 'Maria Bradtke', 'francesco.christiansen@gmail.com', 24),
(120, 'Miss Kaela Schinner Jr.', 'doyle.aimee@roob.org', 24),
(121, 'Bonnie Crist', 'mbaumbach@hagenes.org', 25),
(122, 'Dr. Kennedi O\'Keefe', 'ojacobs@yahoo.com', 25),
(123, 'Jena Schowalter III', 'makenna20@okuneva.biz', 25),
(124, 'Dr. Giovani Boyle IV', 'collins.tyra@gmail.com', 25),
(125, 'Abigayle Bogisich', 'kelton21@gmail.com', 25),
(126, 'Mr. Kip Gerhold', 'gislason.jailyn@abbott.com', 26),
(127, 'Mr. Muhammad Fadel V', 'alysha.prosacco@sanford.net', 26),
(128, 'Dr. Coleman Johns', 'kale14@hotmail.com', 26),
(129, 'Art Jones', 'jayme.boyle@hotmail.com', 26),
(130, 'Isaiah Deckow', 'swift.name@yahoo.com', 26),
(131, 'Letitia Ryan II', 'amos.shanahan@rath.com', 27),
(132, 'Ms. Annette Beier', 'amcglynn@hotmail.com', 27),
(133, 'Mr. Diego Graham II', 'prosacco.paolo@yahoo.com', 27),
(134, 'Urban Cronin', 'hilma.barrows@gmail.com', 27),
(135, 'Eliane O\'Connell', 'jabari34@yahoo.com', 27),
(136, 'Mr. Orion O\'Keefe', 'patricia.wintheiser@mohr.com', 28),
(137, 'Helene Langworth', 'ojohnston@satterfield.com', 28),
(138, 'Dr. Quinten Nolan V', 'lupton@lubowitz.biz', 28),
(139, 'Emil Grant', 'friedrich37@white.net', 28),
(140, 'Kali Hartmann', 'mcglynn.toney@kub.info', 28),
(141, 'Myrna Satterfield', 'morissette.alfredo@hotmail.com', 29),
(142, 'Meggie Bergnaum', 'dubuque.corine@yahoo.com', 29),
(143, 'Garth Parisian III', 'brekke.hugh@mitchell.com', 29),
(144, 'Ms. Emmanuelle Daniel PhD', 'brice56@quigley.com', 29),
(145, 'Keven Jast', 'verona21@tillman.com', 29),
(146, 'Mrs. Laila Dietrich II', 'rdickens@adams.info', 30),
(147, 'Domingo Streich', 'samantha.sipes@pollich.com', 30),
(148, 'Mathias Graham PhD', 'jbuckridge@grimes.net', 30),
(149, 'Noemy Stiedemann', 'santina.nicolas@gmail.com', 30),
(150, 'Icie Blick II', 'jaquelin.wyman@casper.com', 30),
(151, 'Micheal Kohler', 'btremblay@gmail.com', 31),
(152, 'Nicola Treutel MD', 'tia.smith@mayer.biz', 31),
(153, 'Miss Loren Kerluke DVM', 'era19@hoppe.biz', 31),
(154, 'Turner Ernser PhD', 'briana.kessler@hotmail.com', 31),
(155, 'Grace West', 'ara98@yahoo.com', 31),
(156, 'Dr. Kenya Konopelski IV', 'brian.padberg@hotmail.com', 32),
(157, 'Adriel Smitham', 'dennis96@hotmail.com', 32),
(158, 'Odell Cole III', 'kpacocha@gmail.com', 32),
(159, 'Dr. Salvador Bahringer', 'lueilwitz.lucinda@hotmail.com', 32),
(160, 'Prof. Emile Anderson', 'clotilde29@batz.com', 32),
(161, 'Miss Retta Feest IV', 'vmarvin@okeefe.com', 33),
(162, 'Sadie Torp PhD', 'hwisoky@yahoo.com', 33),
(163, 'Prof. Eriberto Nader', 'audra.steuber@hotmail.com', 33),
(164, 'Arlo Walter', 'efritsch@barton.com', 33),
(165, 'Prof. Adrien Rippin Jr.', 'soledad.ferry@yahoo.com', 33),
(166, 'Luz Larkin IV', 'franecki.asa@orn.com', 34),
(167, 'Cassidy Wintheiser', 'kian.mueller@yahoo.com', 34),
(168, 'Werner Barton', 'ada.okon@gmail.com', 34),
(169, 'Iva Wilkinson', 'etha36@conroy.com', 34),
(170, 'Demond Kuhn I', 'fisher.delores@yahoo.com', 34),
(171, 'Keith Torphy', 'lueilwitz.kyle@gmail.com', 35),
(172, 'Prof. Noah Herman', 'davis.elbert@yahoo.com', 35),
(173, 'Shana Heller', 'ross.hauck@hotmail.com', 35),
(174, 'Dr. Johathan Cruickshank', 'kris.clementina@jenkins.com', 35),
(175, 'Nova Harvey V', 'bashirian.nelda@roberts.org', 35),
(176, 'Elody Friesen IV', 'mitchell.sandy@kuhlman.info', 36),
(177, 'Natasha Lowe', 'plittle@muller.com', 36),
(178, 'Mr. Jamar Rutherford', 'theo.roob@ullrich.com', 36),
(179, 'Georgiana Schinner II', 'maggie.hills@veum.com', 36),
(180, 'Jessica Gusikowski', 'mohr.hailie@yahoo.com', 36),
(181, 'Kendall Jakubowski', 'frank15@yahoo.com', 37),
(182, 'Adaline Upton', 'verdie46@christiansen.org', 37),
(183, 'Emile Shields', 'iwhite@ferry.info', 37),
(184, 'Demario Little', 'kelly57@conroy.com', 37),
(185, 'Sylvan Breitenberg', 'liliane.lakin@orn.biz', 37),
(186, 'Miss Ernestina Windler', 'fhegmann@pollich.com', 38),
(187, 'Prof. Lewis Bartell Sr.', 'bcorkery@weimann.com', 38),
(188, 'Prof. Elvera Huel PhD', 'uhodkiewicz@gmail.com', 38),
(189, 'Cletus Ziemann', 'alberta.boehm@yahoo.com', 38),
(190, 'Dr. Maxime Little', 'mmacejkovic@gmail.com', 38),
(191, 'Jammie Funk', 'shayne92@bernier.com', 39),
(192, 'Retta Leffler III', 'harber.reta@yahoo.com', 39),
(193, 'Dr. Ariel Rolfson III', 'bergstrom.jameson@gmail.com', 39),
(194, 'Dr. Marques Cummings', 'fahey.abdiel@hotmail.com', 39),
(195, 'Camylle Crona', 'glen54@hotmail.com', 39),
(196, 'Prof. Watson Barrows Sr.', 'spencer.pete@parker.info', 40),
(197, 'Brady Lehner', 'kayli24@gmail.com', 40),
(198, 'Milan Dietrich II', 'ruby65@yahoo.com', 40),
(199, 'Leland Zulauf', 'giovanna74@green.info', 40),
(200, 'Gussie Fahey', 'ernser.fredrick@predovic.com', 40),
(201, 'Amalia Mueller PhD', 'emmalee25@gmail.com', 41),
(202, 'Micaela Wehner V', 'gislason.christian@purdy.net', 41),
(203, 'Layne Murazik', 'watson.wisoky@gmail.com', 41),
(204, 'Jude Kris', 'rau.kelli@gmail.com', 41),
(205, 'Ms. Layla Hansen V', 'fahey.marilou@hotmail.com', 41),
(206, 'Camilla Gulgowski', 'qbogisich@hotmail.com', 42),
(207, 'Mr. Myles Roberts Jr.', 'murray.lura@mante.net', 42),
(208, 'Miss Maude Williamson', 'uriel.sporer@auer.net', 42),
(209, 'Miss Blanca Prosacco', 'alanis16@yahoo.com', 42),
(210, 'Lexie Renner III', 'noemy49@gmail.com', 42),
(211, 'Hilma Gaylord', 'wschulist@hotmail.com', 43),
(212, 'Lazaro Bednar MD', 'fahey.laverne@heaney.com', 43),
(213, 'Diamond Wisozk', 'bessie48@gmail.com', 43),
(214, 'Haylie Beier', 'bailey.crona@gmail.com', 43),
(215, 'Bradly Dach PhD', 'ireichel@hotmail.com', 43),
(216, 'Kiana Shields V', 'asha.jacobi@stiedemann.org', 44),
(217, 'Patrick Price', 'bins.ulises@simonis.info', 44),
(218, 'Prof. Viola Hodkiewicz I', 'catherine99@doyle.com', 44),
(219, 'Aleen Steuber', 'mathew.hettinger@gmail.com', 44),
(220, 'Dustin Christiansen', 'satterfield.annette@yahoo.com', 44),
(221, 'Miss Roxanne Hessel MD', 'cerdman@yahoo.com', 45),
(222, 'Alexandre Kunde', 'scottie49@gmail.com', 45),
(223, 'Prof. Schuyler Bruen', 'emcglynn@daniel.com', 45),
(224, 'Edward Durgan', 'reuben.kerluke@ruecker.com', 45),
(225, 'Prof. Arvilla Spinka', 'abarton@hotmail.com', 45),
(226, 'Dr. Kyla Smitham Jr.', 'nikolaus.randall@rogahn.com', 46),
(227, 'Raleigh Pfeffer', 'gladys.kemmer@yahoo.com', 46),
(228, 'Izaiah Simonis', 'fkassulke@schmidt.com', 46),
(229, 'Alejandrin West', 'zack.walsh@labadie.net', 46),
(230, 'Mrs. Jayda Bergnaum', 'johnnie.bradtke@mertz.org', 46),
(231, 'Rosalyn Blanda', 'beth.bernier@yahoo.com', 47),
(232, 'Ms. Candace Jast', 'benjamin13@shanahan.org', 47),
(233, 'Reilly Upton Sr.', 'vbechtelar@becker.net', 47),
(234, 'Keven Rosenbaum PhD', 'prosacco.june@williamson.info', 47),
(235, 'Brody Metz', 'maggio.hollie@rau.com', 47),
(236, 'Christian Oberbrunner', 'dkrajcik@gmail.com', 48),
(237, 'Era Legros', 'quitzon.maximillian@klocko.com', 48),
(238, 'Prof. Carolanne Hoppe DVM', 'huel.diana@hegmann.biz', 48),
(239, 'Abelardo Murphy', 'oswald.gusikowski@littel.com', 48),
(240, 'Linnie Jaskolski MD', 'ischuppe@gmail.com', 48),
(241, 'Rigoberto Kunde', 'oscar98@hotmail.com', 49),
(242, 'Marvin Legros PhD', 'wunsch.harrison@yahoo.com', 49),
(243, 'Ralph Haag', 'powlowski.randall@heidenreich.com', 49),
(244, 'Wilford Hahn', 'marvin.suzanne@rogahn.biz', 49),
(245, 'Margarita Lubowitz DVM', 'lambert02@nienow.com', 49),
(246, 'Dianna Goyette', 'volkman.jasper@adams.net', 50),
(247, 'Dr. Korey Hermiston Sr.', 'kaelyn97@marvin.com', 50),
(248, 'Laurie Collins', 'skuhlman@yahoo.com', 50),
(249, 'Paula Harvey', 'mathias.franecki@barrows.com', 50),
(250, 'Javonte Rosenbaum I', 'kenyatta57@gmail.com', 50),
(251, 'Haseeb Yousaf', 'haseebyousaf@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`lecturerId`),
  ADD UNIQUE KEY `lecturers_email_unique` (`email`),
  ADD KEY `lecturers_lecturercityid_foreign` (`lecturerCityId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_studentcity_foreign` (`studentCity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `lecturerId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_lecturercityid_foreign` FOREIGN KEY (`lecturerCityId`) REFERENCES `cities` (`cityId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_studentcity_foreign` FOREIGN KEY (`studentCity`) REFERENCES `cities` (`cityId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
