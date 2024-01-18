-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 09:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capst_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergency_hotlines`
--

CREATE TABLE `emergency_hotlines` (
  `hotlines_id` bigint(20) UNSIGNED NOT NULL,
  `hotlines_number` varchar(255) NOT NULL,
  `userfrom` varchar(255) NOT NULL,
  `responder_id` bigint(20) UNSIGNED NOT NULL,
  `responder_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergency_hotlines`
--

INSERT INTO `emergency_hotlines` (`hotlines_id`, `hotlines_number`, `userfrom`, `responder_id`, `responder_name`, `created_at`, `updated_at`) VALUES
(50, '092265988665', 'MDRRMO', 1, 'Kelly Dimatulac', '2024-01-12 15:42:17', '2024-01-12 15:42:17');

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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_16_195233_create_files_table', 1),
(6, '2023_12_16_080440_create_reports_table', 1),
(7, '2024_01_06_031350_create_table_emergency_hotlines', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `dateandTime` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `emergency_type` varchar(255) NOT NULL,
  `resident_name` varchar(255) NOT NULL,
  `locationName` varchar(255) NOT NULL,
  `locationLink` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `imageEvidence` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `responder_name` varchar(255) NOT NULL,
  `residentProfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `dateandTime`, `uid`, `emergency_type`, `resident_name`, `locationName`, `locationLink`, `phoneNumber`, `message`, `imageEvidence`, `status`, `responder_name`, `residentProfile`) VALUES
(1, '2023-12-15 00:00:00', 70, 'Accident', 'Dr. Lavonne Zieme', '44371 Yolanda Ville Apt. 983\nAddisonbury, KS 72302', 'http://www.pagac.com/eum-sit-ipsum-quos-eum-ad-velit-aut', '732-841-4971', 'Fuga deserunt ab ut ut id est. Ut ullam adipisci possimus nobis. Iste laborum at veritatis qui fugiat.', 'https://via.placeholder.com/0x480.png/00ddff?text=et', '1', 'Jason Murray Sr.', '0'),
(2, '2023-12-10 00:00:00', 66, 'Crime', 'Peyton Heathcote', '5513 Watson Valley\nWest Abigailchester, AK 92821', 'http://www.jacobson.com/', '580.905.6106', 'Consequatur nesciunt voluptatem ea earum ea sunt sed. Est magni facere aut cumque accusamus eum quibusdam. In officia tempore nesciunt ut vitae explicabo amet et.', 'https://via.placeholder.com/0x480.png/00aa55?text=exercitationem', '0', 'Newell Moen', '0'),
(3, '2023-12-17 00:00:00', 5, 'Accident', 'Norberto Sanford Sr.', '8681 Isobel Lake Apt. 217\nLake Pat, TN 88910-1417', 'http://www.ortiz.info/', '678-900-5426', 'Sed sit voluptatem necessitatibus aut qui laudantium nam voluptatum. Reprehenderit non dolore iure debitis eligendi voluptatem modi blanditiis. Et libero quam magni itaque minus maxime dolor. Ut exercitationem odio ut blanditiis et doloribus a.', 'https://via.placeholder.com/0x480.png/0011ee?text=sit', '1', 'Prof. Soledad Hirthe II', 'C:\\Users\\Mian\\AppData\\Local\\Temp\\44f78461837b0c825aa637d49d6776fe.png'),
(4, '2023-12-13 00:00:00', 64, 'Fire', 'Eleonore Koch', '994 Celia Port Apt. 059\nNorth Coy, CA 09631-9977', 'http://gottlieb.com/iure-blanditiis-dignissimos-aperiam-voluptas-cupiditate.html', '(234) 790-9453', 'Neque veniam omnis vitae quos id qui tempore. Quia aut quos et provident corrupti vel perspiciatis. Voluptates nihil quia omnis consequatur. Asperiores reprehenderit ullam repellendus quibusdam amet nobis.', 'https://via.placeholder.com/0x480.png/000011?text=aut', '0', 'Ewell Rempel', '0'),
(5, '2023-12-15 00:00:00', 59, 'Fire', 'Garrett Okuneva', '4780 Felicita Common\nPort Sadiehaven, MN 26391-8348', 'https://www.ferry.biz/repellendus-alias-quasi-est-magnam-est-sunt-molestiae', '740-214-1768', 'Officiis voluptatibus occaecati fugiat officiis iste et omnis. Quo molestias et et. Necessitatibus natus dolores distinctio et illo nobis quia quidem.', 'https://via.placeholder.com/0x480.png/000044?text=et', '0', 'Mr. Silas Okuneva MD', '0'),
(6, '2023-11-17 00:00:00', 56, 'Crime', 'Alverta Ortiz Jr.', '187 Bartoletti Cape Suite 765\nMadelinehaven, WI 35901', 'https://www.sporer.com/vero-distinctio-qui-voluptas-eos-cupiditate-veniam-est', '1-479-423-4350', 'Quo aliquam sit est voluptate. Iste sit eos similique eaque aut amet. Recusandae illum tenetur repellat eos ducimus harum. Magni neque eum delectus in illo.', 'https://via.placeholder.com/0x480.png/00dd33?text=expedita', '0', 'Damien Jacobson III', 'C:\\Users\\Mian\\AppData\\Local\\Temp\\64b8ae7ba6356b06c7ce7fe5e57940ac.png'),
(7, '2023-11-24 00:00:00', 96, 'Crime', 'Jena Monahan', '5796 Larkin Drive\nSouth Eleonore, SC 12730-4901', 'http://www.homenick.com/', '+1-629-643-9931', 'Quia voluptatem optio nesciunt optio nemo. Mollitia quia recusandae numquam commodi vero doloremque. Quos minima aliquam sed esse illo ipsam quia deserunt. Blanditiis facere quo distinctio voluptatem ea voluptates similique.', 'https://via.placeholder.com/0x480.png/003399?text=dolor', '1', 'Santino Schamberger V', 'C:\\Users\\Mian\\AppData\\Local\\Temp\\79e39022be11d739b1214fc907c6b765.png'),
(8, '2024-01-09 00:00:00', 74, 'Fire', 'Sigurd Grady', '5338 Glennie Fields\nWest Amparostad, GA 94479', 'http://www.schmeler.com/', '(774) 283-7403', 'Odit et numquam inventore voluptate ea autem. Eaque cupiditate consequuntur dolores doloremque minima. Nulla qui enim distinctio reiciendis consequuntur.', 'https://via.placeholder.com/0x480.png/0022ee?text=quia', '0', 'Jaden Osinski', 'C:\\Users\\Mian\\AppData\\Local\\Temp\\7fd5285d7952f6a0d82eec7e3a8fa701.png'),
(9, '2023-10-25 00:00:00', 8, 'Accident', 'Dr. Athena Towne Sr.', '4455 Keebler Trail\nNorth Herminiaton, CA 62309', 'http://lubowitz.com/', '+1 (984) 887-9366', 'Hic ut ducimus nihil quia ut nam. Sint libero quis praesentium aut. Esse aspernatur fuga non.', 'https://via.placeholder.com/0x480.png/0022bb?text=rerum', '1', 'Marjory Klein', 'C:\\Users\\Mian\\AppData\\Local\\Temp\\7427eb6a80fe3f10548f41c0f1f4d454.png'),
(10, '2023-10-20 00:00:00', 8, 'Fire', 'Koby Satterfield DVM', '75334 Johnny Mills Suite 054\nCasperville, OR 97819', 'http://stracke.com/asperiores-eum-tenetur-est-ea-blanditiis-eveniet-alias.html', '503-562-8742', 'Explicabo ea voluptas nulla. Et ut tempore dolorem voluptatibus.', 'https://via.placeholder.com/0x480.png/00dd77?text=vitae', '0', 'Mr. Lester Beer V', 'C:\\Users\\Mian\\AppData\\Local\\Temp\\2f586324ac0691a93664e4d65680b0fb.png');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `resident_id` int(10) NOT NULL,
  `resident_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `responder_name` varchar(255) NOT NULL,
  `userfrom` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Sector',
  `email` varchar(255) NOT NULL,
  `status` enum('pending','active') NOT NULL DEFAULT 'pending',
  `token` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `responder_name`, `userfrom`, `role`, `email`, `status`, `token`, `username`, `password`) VALUES
(1, 'Kelly Dimatulac', 'MDRRMO', 'Super Admin', 'macdimatulac234@gmail.com', 'active', ' ', 'mac', '$2y$12$iA7izLoJiHAJzGxD2mv1ruOglHXdLBI1ov3/tiRo2dnP2U.FkE9VO'),
(2, 'Mian Dimatulac', 'CAY POMBO', 'Admin', 'miandimatulac23@gmail.com', 'active', ' ', 'cay', '$2y$12$Ma55XmyemjB6UFI9C8zCLeGqm88ZR4GDSdF4FdwD5capGpaz1vd22'),
(5, 'Ping', 'CAY POMBO', 'Super Admin', 'pingambatali@yahoo.com', 'active', ' ', 'ping', '$2y$12$UsqQwqsm2MwpVgTjSGJ9c.Q2o6YDJxB50G/xPlEUetxukr9M61LzW'),
(6, 'Ralph Lauren', 'BFP', 'Super Admin', 'ambatalilauren@gmail.com', 'active', ' ', 'ambatalilauren', '$2y$12$7rigXIv6eTJFIlsFduJQtuiiFFa/EKibqRb8EUMPFmd4mj4TVSjJO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency_hotlines`
--
ALTER TABLE `emergency_hotlines`
  ADD PRIMARY KEY (`hotlines_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency_hotlines`
--
ALTER TABLE `emergency_hotlines`
  MODIFY `hotlines_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
