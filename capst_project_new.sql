-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 02:26 AM
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
-- Database: `capst_project_new`
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
(26, '0928983758545', 'MDRRMO', 2, 'Rapmon', '2024-02-01 06:19:02', '2024-02-01 06:19:02'),
(29, '639289888655', 'PNP', 2, 'Rapmon', '2024-02-01 06:20:15', '2024-02-10 00:48:54'),
(30, '639289866655', 'BFP', 2, 'Rapmon', '2024-02-01 06:30:07', '2024-02-10 00:48:33'),
(34, '639289866559', 'MDRRMO', 2, 'Rapmon', '2024-02-09 19:21:49', '2024-02-09 19:21:49'),
(35, '639338189875', 'BFP', 2, 'Mian Dimatulac', '2024-02-09 23:30:18', '2024-02-09 23:30:18'),
(36, '63708055656', 'PNP', 2, 'Mian Dimatulac', '2024-02-09 23:30:48', '2024-02-09 23:30:48'),
(37, '639226598', 'BFP', 2, 'Mian Dimatulac', '2024-02-09 23:33:20', '2024-02-09 23:33:20'),
(39, '639289837585', 'BALASING', 2, 'Mian Dimatulac', '2024-02-09 23:35:38', '2024-02-09 23:35:38'),
(40, '63922665655265', 'PNP', 2, 'Mian Dimatulac', '2024-02-10 00:13:01', '2024-02-10 00:13:01'),
(41, '639289837585', 'BFP', 2, 'Mian Dimatulac', '2024-02-10 00:20:30', '2024-02-10 00:20:30'),
(43, '639289837585', 'PNP', 2, 'Mian Dimatulac', '2024-02-10 00:27:18', '2024-02-10 00:27:18'),
(44, '639289866698', 'PNP', 2, 'Mian Dimatulac', '2024-02-10 00:39:00', '2024-02-10 00:39:00'),
(45, '639289866559', 'BFP', 2, 'Mian Dimatulac', '2024-02-10 00:47:57', '2024-02-10 00:48:10'),
(46, '639665555988', 'BFP', 2, 'Mian Dimatulac', '2024-02-10 06:03:05', '2024-02-10 06:03:05'),
(47, '632222222222', 'MDRRMO', 2, 'Mian Christopher Dimatulac', '2024-02-11 07:18:10', '2024-02-11 07:18:10'),
(48, '639708055841', 'MDRRMO', 2, 'Mian Christopher Dimatulac', '2024-02-11 07:18:16', '2024-02-11 07:19:35'),
(50, '632999888655', 'LALAKHAN', 2, 'Mian Christopher Dimatulac', '2024-02-24 20:59:52', '2024-02-24 20:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `guidelines_id` bigint(20) UNSIGNED NOT NULL,
  `guidelines_name` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `disaster_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`guidelines_id`, `guidelines_name`, `thumbnail`, `disaster_type`, `created_at`, `updated_at`) VALUES
(11, 'Earthquake Guidelines', 'file-storage/thumbnail_65b5ea170ac55.png', 'Natural Disaster', '2024-01-27 18:26:36', '2024-01-27 21:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines_after`
--

CREATE TABLE `guidelines_after` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guidelines_id` bigint(20) UNSIGNED NOT NULL,
  `headings` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidelines_after`
--

INSERT INTO `guidelines_after` (`id`, `guidelines_id`, `headings`, `image`, `description`, `created_at`, `updated_at`) VALUES
(11, 11, 'After Earthquake', 'file-storage/after_file_65b5e84992959.png', 'asdasdasdasdsdsds\r\nsdsdsd\r\nsdsd\r\nsdsd\r\nsd\r\nsd', '2024-01-27 18:26:36', '2024-01-27 21:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines_before`
--

CREATE TABLE `guidelines_before` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guidelines_id` bigint(20) UNSIGNED NOT NULL,
  `headings` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidelines_before`
--

INSERT INTO `guidelines_before` (`id`, `guidelines_id`, `headings`, `image`, `description`, `created_at`, `updated_at`) VALUES
(11, 11, 'All things to before Earthquake', 'file-storage/before_file_65ca137fc4406.mp4', 'Preparing for an earthquake involves taking various precautions to ensure your safety and the safety of those around you. Here are some general guidelines to follow before an earthquake:\r\n\r\n1. **Create an Emergency Plan:**\r\n   - Develop a family emergency plan that includes communication and evacuation strategies.\r\n   - Designate meeting points both inside and outside your home.\r\n   - Ensure everyone in your household knows how to turn off gas, water, and electricity.\r\n\r\n2. **Emergency Supplies:**\r\n   - Build an emergency kit with essentials such as water, non-perishable food, medications, first aid supplies, flashlight, batteries, and important documents.\r\n   - Consider the needs of all family members, including pets, when assembling your emergency kit.\r\n\r\n3. **Home Safety Assessment:**\r\n   - Identify and secure heavy furniture and appliances to prevent them from toppling during shaking.\r\n   - Install earthquake straps on water heaters and secure other household items.\r\n   - Conduct a home safety inspection to identify potential hazards and make necessary changes.\r\n\r\n4. **Educate Yourself:**\r\n   - Learn about earthquake risks in your region and understand the building codes and regulations in your area.\r\n   - Familiarize yourself with safe spots in each room, such as under sturdy tables or desks.\r\n\r\n5. **Practice Drills:**\r\n   - Regularly practice earthquake drills with your family or household members.\r\n   - Know the \"Drop, Cover, and Hold On\" technique during an earthquake.\r\n\r\n6. **Communication Plan:**\r\n   - Establish an out-of-town contact person who can act as a central point of communication for family members.\r\n   - Make sure everyone knows how to send text messages, as they may be more reliable than phone calls during and after an earthquake.\r\n\r\n7. **Stay Informed:**\r\n   - Keep a battery-powered or hand-cranked radio to stay informed about emergency information.\r\n   - Monitor local news, weather updates, and emergency alerts.\r\n\r\n8. **Secure Hazardous Materials:**\r\n   - Store hazardous materials securely in a safe place.\r\n   - Be aware of potential dangers in your home, such as chemicals and flammable materials.\r\n\r\n9. **Community Resources:**\r\n   - Know the location of nearby emergency shelters, evacuation routes, and community resources.\r\n   - Stay involved in community preparedness initiatives.\r\n\r\n10. **Emergency Contacts:**\r\n    - Ensure everyone in your household has a list of emergency contacts, including neighbors, friends, and family members.\r\n\r\nRemember that being prepared is crucial for minimizing the impact of earthquakes. Regular practice and ongoing awareness are key components of earthquake preparedness.', '2024-01-27 18:26:36', '2024-02-12 04:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines_during`
--

CREATE TABLE `guidelines_during` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guidelines_id` bigint(20) UNSIGNED NOT NULL,
  `headings` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidelines_during`
--

INSERT INTO `guidelines_during` (`id`, `guidelines_id`, `headings`, `image`, `description`, `created_at`, `updated_at`) VALUES
(11, 11, 'During Earthquake', 'file-storage/during_file_65b5e84990fe4.png', 'Dock \r\nCover \r\nHold', '2024-01-27 18:26:36', '2024-01-27 21:38:17');

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
(7, '2024_01_06_031350_create_table_emergency_hotlines', 1),
(8, '2024_01_21_150307_create_guidelines_table', 2),
(9, '2024_01_21_150343_create_guidelines_after_table', 2),
(10, '2024_01_21_150356_create_guidelines_before_table', 2),
(11, '2024_01_21_150405_create_guidelines_during_table', 2),
(12, '2024_01_26_041654_create_settings_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `dateandTime` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `uid` varchar(100) NOT NULL,
  `emergency_type` varchar(55) NOT NULL,
  `resident_name` varchar(55) NOT NULL,
  `locationName` varchar(55) NOT NULL,
  `locationLink` varchar(100) NOT NULL DEFAULT ' ',
  `phoneNumber` varchar(55) NOT NULL,
  `message` varchar(255) NOT NULL,
  `imageEvidence` varchar(55) NOT NULL DEFAULT ' ',
  `status` varchar(255) NOT NULL,
  `responder_name` varchar(55) NOT NULL DEFAULT ' ',
  `userfrom` varchar(255) NOT NULL DEFAULT ' ',
  `SectorName` varchar(255) NOT NULL,
  `residentProfile` varchar(255) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `dateandTime`, `uid`, `emergency_type`, `resident_name`, `locationName`, `locationLink`, `phoneNumber`, `message`, `imageEvidence`, `status`, `responder_name`, `userfrom`, `SectorName`, `residentProfile`) VALUES
(121, '2023-10-21 00:00:00.000000', '15', 'Accident', 'Hulda Block DDS', '91142 Botsford Landing\nLake Colby, VT 21919', 'http://www.mcglynn.info/', '443-251-9308', 'Non non repudiandae magni quidem amet omnis sit. Officia esse officiis illum occaecati velit. Corrupti ex maiores consequatur dicta qui. Debitis molestiae quia ea ducimus.', 'https://via.placeholder.com/0x480.png/00bb77?text=eum', '3', 'Mian Christopher Dimatulac', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/00aa99?text=omnis'),
(124, '2023-12-25 00:00:00.000000', '89', 'Crime', 'Barton McDermott', '35234 Murphy Mills\nDejaview, CO 49981', 'https://www.reichel.com/omnis-dolorem-repudiandae-qui-est-fugit-nostrum', '+14402917757', 'Velit est ut molestias hic quod. Delectus perspiciatis laboriosam voluptates. Eos at porro voluptate inventore consequatur rerum sint. Ratione quisquam commodi aperiam earum excepturi adipisci ut.', 'https://via.placeholder.com/0x480.png/000088?text=qui', '4', 'Brooke Rolfson', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/0055dd?text=deleniti'),
(125, '2023-10-16 00:00:00.000000', '97', 'Medical', 'Ms. Amara Ondricka', '5690 Nolan Creek Suite 858\nLake Laishaside, NC 05588', 'http://franecki.com/facilis-corrupti-nihil-voluptate-unde-delectus-et', '1-717-764-4695', 'Omnis provident necessitatibus nihil minima enim non similique. Pariatur non optio perspiciatis quos est sint commodi iure. Magni corporis facilis unde dicta dolorem eligendi.', 'https://via.placeholder.com/0x480.png/008811?text=nisi', '1', 'Mian Christopher Dimatulac', 'GUYONG', '', 'https://via.placeholder.com/0x480.png/00ff88?text=mollitia'),
(126, '2023-10-24 00:00:00.000000', '27', 'Fire', 'Ms. Mabel Lockman', '2404 Magnus Circle\nArmstrongberg, MS 66659-0063', 'http://sauer.net/', '+17162673979', 'In ut accusantium pariatur dolorem. Ut qui numquam culpa quis dignissimos totam eveniet maiores. Dignissimos minima voluptatibus quam voluptatem.', 'https://via.placeholder.com/0x480.png/004455?text=quis', '1', 'Molly O\'Hara', 'BFP', '', 'https://via.placeholder.com/0x480.png/009944?text=sed'),
(128, '2023-12-19 00:00:00.000000', '7', 'Medical', 'Dr. Halle Davis', '571 Janessa Centers Apt. 723\nSouth Erich, OR 09472-0203', 'http://schiller.com/praesentium-culpa-repellendus-accusantium-nostrum', '928-440-5600', 'Consequuntur ipsa aut cumque omnis fugiat. Qui in reprehenderit alias odit iusto. Deleniti qui aliquid maxime nam voluptas enim. Facere aperiam soluta ab laboriosam aspernatur consequatur alias.', 'https://via.placeholder.com/0x480.png/0044ee?text=et', '1', 'Rapmon', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/00ff77?text=quos'),
(129, '2023-12-02 00:00:00.000000', '61', 'Crime', 'Miss Rebekah Zemlak V', '600 Ziemann Station\nNew Aurelioton, MS 72943', 'http://www.sporer.org/dicta-itaque-esse-est-unde-dignissimos-sapiente-in', '+1 (786) 842-0225', 'Praesentium nisi voluptas voluptas. Aut optio cumque qui aut. Ipsa odit consequatur nostrum incidunt quaerat fugit dignissimos.', 'https://via.placeholder.com/0x480.png/00dd77?text=aut', '1', 'Rapmon', 'PNP', '', 'https://via.placeholder.com/0x480.png/003311?text=ab'),
(130, '2023-11-26 00:00:00.000000', '89', 'Crime', 'Madeline Strosin MD', '71470 William Glen\nTrentberg, WY 09301', 'https://www.schuppe.com/debitis-delectus-in-voluptatem-laborum-et-culpa-nisi-vel', '(660) 612-1581', 'Illo maxime inventore voluptatum laudantium doloribus exercitationem consectetur quisquam. Consequatur illo quia consequatur iste. Illum neque aut qui pariatur dolores. Qui et iure vitae. Assumenda qui similique quo et libero.', 'https://via.placeholder.com/0x480.png/0033bb?text=nobis', '1', 'Rapmon', 'BFP', '', 'https://via.placeholder.com/0x480.png/0055aa?text=corporis'),
(131, '2023-12-14 00:00:00.000000', '10', 'Medical', 'Francesco Hills', '4699 Langosh Shores Apt. 880\nRobelburgh, GA 98510-8868', 'http://www.collins.com/', '(559) 907-2558', 'Quo quasi tempore facere iste perspiciatis. Incidunt quia enim sit ut illum aut iste. Provident itaque quos distinctio aliquam molestiae et.', 'https://via.placeholder.com/0x480.png/0055bb?text=ut', '1', 'Dr. Katharina Shields MD', 'PNP', '', 'https://via.placeholder.com/0x480.png/006633?text=in'),
(132, '2023-12-11 00:00:00.000000', '45', 'Fire', 'Prof. Kelton Tremblay', '233 Grant Well\nLeuschkeport, ND 20974-5901', 'http://www.mcclure.com/magnam-et-dolorum-vel-ad-rem', '337.645.4345', 'Esse omnis nihil ut blanditiis repellendus sint. Provident illum quod culpa saepe. Numquam alias dolore vero rem.', 'https://via.placeholder.com/0x480.png/00eeee?text=et', '1', 'Makenna Jacobi', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/00dd88?text=voluptate'),
(133, '2023-12-15 00:00:00.000000', '32', 'Crime', 'Norma Braun', '189 Bernhard Plaza Suite 509\nLake Leoside, LA 27980', 'http://barrows.com/et-eum-sit-dolorem-id-maxime.html', '347-293-6953', 'Voluptatibus qui voluptatem eius reprehenderit id. Molestiae harum non reiciendis et libero consequuntur. Consectetur rerum nobis ut.', 'https://via.placeholder.com/0x480.png/004422?text=est', '1', 'Lynn Bashirian I', 'PNP', '', 'https://via.placeholder.com/0x480.png/008866?text=eius'),
(134, '2023-11-25 00:00:00.000000', '47', 'Fire', 'Prof. Cristal Huels', '528 Mable Viaduct\nMathewborough, SC 74901', 'https://www.west.com/nulla-sequi-accusantium-quam-in-deserunt-consequuntur-mollitia', '(720) 201-1818', 'Facere ex id quis cum veritatis ratione. Qui excepturi qui delectus. Voluptatibus esse doloribus et officia voluptatem. Est assumenda sequi quo sed sed voluptate ut.', 'https://via.placeholder.com/0x480.png/00bb33?text=quia', '1', 'Rapmon', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/00bb44?text=voluptas'),
(135, '2024-01-06 00:00:00.000000', '100', 'Fire', 'Cydney Brown', '852 Yvonne Union\nSouth Duane, WV 47025-9063', 'http://robel.com/cumque-vero-est-placeat-asperiores.html', '+1-806-513-7377', 'Ad quisquam id dolor minima modi sequi. Accusantium fuga ipsum aut suscipit. Ut et dolor asperiores porro praesentium.', 'https://via.placeholder.com/0x480.png/0000aa?text=est', '1', 'Rapmon', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/003333?text=magnam'),
(136, '2023-11-20 00:00:00.000000', '49', 'Crime', 'Prof. John Hintz', '2367 Lillian Green\nKingshire, AZ 48364', 'http://herzog.com/fugit-modi-quisquam-voluptatem-quibusdam', '+1-458-337-4737', 'Adipisci aut cum et nemo animi. Non voluptatibus ad deleniti at. Architecto quibusdam debitis suscipit eum distinctio ab. Delectus ab eum nulla et explicabo. Sapiente voluptas labore modi sunt enim aspernatur voluptate magni.', 'https://via.placeholder.com/0x480.png/00ccdd?text=eum', '1', 'Rapmon', 'PNP', '', 'https://via.placeholder.com/0x480.png/002200?text=et'),
(137, '2023-11-14 00:00:00.000000', '70', 'Accident', 'Abdullah Walter', '8642 Chyna Wells\nWest Carey, KS 02602-8868', 'http://www.ankunding.com/quae-consequatur-aut-dicta-accusamus-itaque-sunt-rerum', '+19018261765', 'Laborum error nulla delectus explicabo. Aut voluptas et commodi qui autem illo temporibus. Ducimus odit consequatur enim soluta. Quis eligendi totam earum assumenda voluptas ipsa quia dolores.', 'https://via.placeholder.com/0x480.png/0000aa?text=vel', '1', 'Rapmon', 'PNP', '', 'https://via.placeholder.com/0x480.png/000011?text=ipsam'),
(138, '2023-11-13 00:00:00.000000', '86', 'Medical', 'Marian Thiel DVM', '400 Nora Ranch Suite 657\nDooleybury, VA 69169', 'http://www.toy.info/aut-aliquid-qui-ut-sit-explicabo-eveniet.html', '+1.781.539.3174', 'Iste tempore sequi occaecati quis molestiae delectus quis. Sunt numquam ipsum velit et et ipsa. Dicta est dolores amet blanditiis fugiat fugiat.', 'https://via.placeholder.com/0x480.png/00dd66?text=sunt', '1', 'Garnett Muller', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/005533?text=cupiditate'),
(139, '2023-12-28 00:00:00.000000', '96', 'Crime', 'Onie Schmeler', '750 Collin Harbors Apt. 053\nRoweburgh, UT 24459', 'http://www.hartmann.com/', '669-691-5193', 'Velit dolor doloremque blanditiis accusamus optio enim. Quisquam velit voluptas enim corporis. Tenetur sit soluta exercitationem at. Aliquid nulla error totam quo officiis dolore perspiciatis.', 'https://via.placeholder.com/0x480.png/00cc00?text=alias', '1', 'Tremaine Bauch', 'BFP', '', 'https://via.placeholder.com/0x480.png/0011ff?text=rem'),
(140, '2023-10-24 00:00:00.000000', '71', 'Fire', 'Ms. Kiarra Stiedemann', '407 Bergnaum Crossing Apt. 010\nSouth Tate, CO 77265', 'https://www.feest.info/explicabo-est-sapiente-quia-vitae-aut', '209.355.5451', 'Voluptatem nisi qui assumenda excepturi voluptatem est cumque ut. Rerum consectetur unde autem neque qui rem esse. Voluptate dolorem aliquam ad explicabo est fuga. Omnis nemo quam et beatae rerum.', 'https://via.placeholder.com/0x480.png/00dd99?text=sit', '1', 'Eryn Herzog', 'PNP', '', 'https://via.placeholder.com/0x480.png/00dd77?text=nihil'),
(141, '2023-11-12 00:00:00.000000', '28', 'Crime', 'Elda Cartwright', '41607 Dudley Valley\nAbigailport, NV 29636', 'https://heller.biz/vel-inventore-est-qui-est-enim-rerum-ut.html', '+1.352.939.2508', 'Nisi et qui quaerat voluptate excepturi. Eos dolores qui numquam corporis ratione. Saepe rerum et illum. Qui quia impedit quia blanditiis in non dolorum.', 'https://via.placeholder.com/0x480.png/0099aa?text=ut', '1', 'Maxime Walker', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/0011ee?text=omnis'),
(142, '2023-12-21 00:00:00.000000', '21', 'Fire', 'Mr. Marcelino Prosacco MD', '186 Yundt Garden\nWizaville, WY 55196', 'http://www.reichel.com/ratione-dolor-quidem-necessitatibus-sint', '+1 (947) 334-8369', 'Fugiat et et rerum. Aut eum et consequuntur omnis sit.', 'https://via.placeholder.com/0x480.png/001122?text=non', '1', 'Rapmon', 'PNP', '', 'https://via.placeholder.com/0x480.png/00ffbb?text=debitis'),
(143, '2023-11-17 00:00:00.000000', '64', 'Crime', 'Abigayle Herzog', '37896 Marcus Shores\nNew Elinore, LA 78596', 'http://www.corkery.com/omnis-corporis-alias-maiores-aperiam-ut-quo-ea.html', '(540) 239-1446', 'Sed cupiditate omnis repudiandae et eveniet quia eos explicabo. Distinctio vitae at autem alias sint error. Qui veniam totam libero dolores sed voluptates qui. Enim eaque rerum sit alias. Voluptatibus explicabo nisi rerum vel ea facere.', 'https://via.placeholder.com/0x480.png/002211?text=rerum', '1', 'Shaylee Kuvalis', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/0066ff?text=labore'),
(144, '2023-12-28 00:00:00.000000', '86', 'Accident', 'Jacques Bartoletti IV', '410 Hagenes Roads Apt. 356\nNew Garnet, VA 66894', 'http://tromp.com/', '(231) 759-8579', 'Voluptate et repudiandae veniam voluptas quia a eaque. Eum fugiat quia aspernatur aut consequuntur ut deleniti. Dolores et exercitationem repellat ut.', 'https://via.placeholder.com/0x480.png/00cc66?text=qui', '1', 'Miss Maximillia Bashirian IV', 'PNP', '', 'https://via.placeholder.com/0x480.png/001133?text=quod'),
(145, '2023-12-28 00:00:00.000000', '19', 'Crime', 'Mr. Gerald Lesch', '619 Maximus Station Suite 909\nMekhiville, PA 71474-5752', 'http://www.collins.com/quae-quas-omnis-dolores-quod-dicta-molestiae-corrupti-sed', '641.417.0404', 'Ut et nisi aut molestiae. Temporibus sed ullam tenetur eos. Deserunt nam perspiciatis in iste quo ea aliquid voluptas.', 'https://via.placeholder.com/0x480.png/00ffbb?text=magni', '1', 'Matilda Harvey', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/00bbee?text=labore'),
(146, '2024-01-06 00:00:00.000000', '89', 'Accident', 'Ms. Leda Huels', '85129 VonRueden Drive\nConcepcionberg, VA 49346-5602', 'http://www.kessler.com/', '+1 (475) 763-3977', 'Placeat et debitis dolorem est. Quidem autem odit tenetur rerum ad aut. Tenetur libero eum voluptatibus dignissimos provident temporibus dolor ut.', 'https://via.placeholder.com/0x480.png/0077dd?text=aut', '1', 'Antoinette Kilback', 'BFP', '', 'https://via.placeholder.com/0x480.png/009944?text=esse'),
(147, '2023-10-15 00:00:00.000000', '51', 'Medical', 'Ms. Casandra Gulgowski', '117 Mittie Divide\nLake Isom, FL 15422-9416', 'http://www.mills.com/', '443-368-5214', 'Et ut quae ut quia ipsam sint. Eveniet consectetur quasi quia eos. Excepturi aut quia sequi aliquid dolorem ut laborum. Quasi accusamus autem voluptatem dolore.', 'https://via.placeholder.com/0x480.png/00ffaa?text=rerum', '1', 'Richard  Gomez', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/00cc99?text=sequi'),
(148, '2023-11-16 00:00:00.000000', '24', 'Medical', 'Mrs. Effie Kuhn', '3506 Grace Dale Apt. 327\nLubowitzville, OR 62936', 'http://www.quitzon.net/repellendus-totam-iste-nihil.html', '1-731-610-5218', 'Nesciunt veritatis nostrum enim in vel deleniti dolore. Quibusdam dolor commodi enim similique consequatur sunt dolores.', 'https://via.placeholder.com/0x480.png/005599?text=ut', '1', 'Richard  Gomez', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/00dd33?text=consequatur'),
(149, '2023-12-29 00:00:00.000000', '88', 'Crime', 'Percival Wolf', '1805 Wilton Meadow\nLake Sarah, PA 04237', 'http://www.marvin.info/impedit-est-nihil-natus-laborum', '+1.863.336.9966', 'Expedita laborum veritatis rerum fugiat. Nam quis deserunt vero soluta temporibus quo. Animi qui cumque accusamus tenetur pariatur non.', 'https://via.placeholder.com/0x480.png/0022ff?text=saepe', '1', 'Rapmon', 'PNP', '', 'https://via.placeholder.com/0x480.png/00ddaa?text=tenetur'),
(151, '2023-11-13 00:00:00.000000', '35', 'Fire', 'Ricardo Weissnat', '6527 Veum Ville\nPort Nasir, UT 13991-1864', 'http://mohr.net/in-quibusdam-qui-tempore', '719.784.6968', 'Impedit eum sapiente possimus dolor. Molestias tempore ut et dignissimos laudantium. Tenetur ullam cupiditate recusandae ea consequatur. Accusamus minima dolorem quaerat nihil et.', 'https://via.placeholder.com/0x480.png/00aaee?text=ab', '1', 'Rapmon', 'PNP', '', 'https://via.placeholder.com/0x480.png/00aa77?text=provident'),
(154, '2023-12-23 00:00:00.000000', '62', 'Crime', 'Jermey Pouros', '1846 Jammie Street Apt. 134\nManteville, AL 92610', 'http://www.sawayn.net/delectus-non-recusandae-earum-quia-iure-quibusdam-porro', '+1 (440) 450-7809', 'Optio placeat nihil assumenda architecto eos. Cupiditate labore qui eius expedita. Aspernatur repellat quis aut quaerat. Libero eos porro autem tempore.', 'https://via.placeholder.com/0x480.png/007755?text=quo', '1', 'Edd Schuster', 'PNP', '', 'https://via.placeholder.com/0x480.png/00dd33?text=et'),
(156, '2023-12-28 00:00:00.000000', '4', 'Accident', 'Ernestina Bode', '371 Nitzsche Corner\nNorth Deborah, KS 95667', 'http://www.stanton.com/non-et-officia-debitis', '+1-617-373-3902', 'Nemo ratione et sit maiores explicabo soluta repudiandae. Ut natus voluptatem eum dolorum consequuntur id rerum a. Qui harum qui sit. Commodi culpa veniam est sit itaque sequi. Quibusdam assumenda saepe eos omnis quis quam repellat.', 'https://via.placeholder.com/0x480.png/00cc77?text=et', '1', 'Missouri Stoltenberg', 'BFP', '', 'https://via.placeholder.com/0x480.png/000099?text=aut'),
(158, '2023-11-24 00:00:00.000000', '38', 'Medical', 'Mackenzie Cummings MD', '621 Schuster Fords\nNew Janemouth, OK 98054', 'http://www.schiller.com/reiciendis-quos-odit-et-nostrum', '430.405.2324', 'Vel et cum vitae officiis exercitationem ut asperiores. Delectus eum neque velit nam soluta repellat rerum dicta. Quia asperiores maiores illo animi maiores.', 'https://via.placeholder.com/0x480.png/00cc99?text=ipsa', '1', 'Rapmon', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/004444?text=minus'),
(159, '2023-11-26 00:00:00.000000', '3', 'Accident', 'Adele Gibson', '1010 Nader Mill\nWest Casimir, ME 02172-0503', 'http://www.kling.com/quis-quaerat-esse-non-et-magni-optio-omnis-nostrum.html', '+1 (816) 744-1214', 'Minima est pariatur enim et sunt maiores et. Quis quos ut provident fugit magni qui quis. Itaque ratione sint sed incidunt.', 'https://via.placeholder.com/0x480.png/002299?text=non', '1', 'Melody D\'Amore', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/004499?text=nulla'),
(160, '2023-12-08 00:00:00.000000', '16', 'Accident', 'Alexandre Wuckert', '219 Homenick Spur Suite 874\nEast Roberto, AR 58769', 'http://www.schulist.net/quia-enim-fugiat-nemo-sit', '+1 (703) 796-9322', 'Sed quidem fugiat neque dolores. Nobis a quis tenetur eos. Pariatur quos porro sed ullam fuga.', 'https://via.placeholder.com/0x480.png/0055aa?text=aut', '1', 'Rapmon', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/00cc11?text=fugiat'),
(161, '2023-11-28 00:00:00.000000', '37', 'Fire', 'Ronaldo Rodriguez', '15822 Nestor Corner Suite 900\nSouth Thad, NM 06753', 'http://rath.org/suscipit-vero-minima-sunt-debitis-tempora-libero', '(330) 927-0179', 'Vitae doloremque nesciunt est voluptates iusto quibusdam facilis. Est hic ad excepturi et soluta. Magni quisquam libero non necessitatibus dolores. Aut minima est non quibusdam nemo blanditiis qui eum.', 'https://via.placeholder.com/0x480.png/00bb33?text=omnis', '1', 'Sienna Nader', 'PNP', '', 'https://via.placeholder.com/0x480.png/000011?text=illum'),
(162, '2023-12-07 00:00:00.000000', '36', 'Accident', 'Jaleel Sanford', '2468 Okuneva Center Suite 397\nJoycefort, NV 99089-2880', 'https://www.murray.com/fugit-suscipit-et-architecto-repellendus-sunt-et-assumenda', '+1.402.225.7665', 'Debitis aperiam et dicta minima fugiat consequatur ducimus nulla. Enim totam a perferendis qui minima. Molestiae ducimus voluptas dolores eos ducimus ducimus. Et error officia voluptatum.', 'https://via.placeholder.com/0x480.png/00dddd?text=vel', '1', 'Rapmon', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/00ccff?text=animi'),
(163, '2023-10-26 00:00:00.000000', '75', 'Fire', 'Lola Thiel', '35303 Estevan Mountains Suite 939\nWest Ruby, VA 56898', 'http://mraz.info/', '989-807-6551', 'Sunt voluptatem aspernatur nam magnam voluptatem vel. Quia dolorem in magnam eos aut aut officia.', 'https://via.placeholder.com/0x480.png/00ffaa?text=et', '1', 'Veronica Gleichner', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/0077bb?text=velit'),
(164, '2023-12-21 00:00:00.000000', '79', 'Crime', 'Margarita Von', '1219 King Crossroad\nEast Anika, AR 85584', 'https://keebler.net/in-aliquid-ut-et-aut.html', '(816) 773-3439', 'Vel modi molestiae soluta et consequatur. Odio magni et odit quo veniam ut tenetur. Modi nobis mollitia deleniti laudantium. Quia non deleniti corrupti commodi atque.', 'https://via.placeholder.com/0x480.png/000066?text=ipsa', '1', 'Nona Jacobson', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/0066dd?text=nostrum'),
(165, '2023-11-24 00:00:00.000000', '70', 'Fire', 'Osborne Berge', '3174 Russel Manors Suite 964\nNorth Nikko, TX 56569', 'http://www.lubowitz.org/', '562.993.6283', 'Ea eos atque cumque eius deserunt neque unde consequuntur. Facere at sequi ut tenetur est aut qui rerum. Laudantium reprehenderit dolores dolorem tempora accusamus enim. Omnis eveniet veniam odio voluptatem.', 'https://via.placeholder.com/0x480.png/00ccbb?text=unde', '1', 'Vidal Hackett I', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/0011dd?text=dolores'),
(166, '2023-11-24 00:00:00.000000', '25', 'Medical', 'Anastacio Hermiston', '202 Dach Lock Suite 985\nNew Mireya, AR 75853', 'http://www.mraz.com/et-magnam-tempore-recusandae', '+15395287157', 'Id tenetur voluptatem nam consequatur reprehenderit minima non. Quam et rem saepe deserunt dicta sit. Libero temporibus at facilis et neque. Maxime nobis ipsum dolor nostrum. Blanditiis sit iste amet corporis nulla sit velit.', 'https://via.placeholder.com/0x480.png/00dd66?text=illum', '1', 'Dale Mills', 'BFP', '', 'https://via.placeholder.com/0x480.png/0066cc?text=est'),
(168, '2023-12-17 00:00:00.000000', '37', 'Accident', 'Ms. Alverta Kling V', '380 Kunde Fields\nSpencerville, VA 87159-8299', 'https://cummerata.com/autem-vero-quae-recusandae.html', '657-944-2885', 'Temporibus fugit aspernatur id labore aspernatur quo saepe quis. Doloribus a veniam nemo porro. Illum necessitatibus et expedita iste voluptate occaecati. Rerum perspiciatis amet illum.', 'https://via.placeholder.com/0x480.png/003344?text=enim', '1', 'Mian Dimatulac', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/008899?text=nihil'),
(169, '2024-01-09 00:00:00.000000', '27', 'Medical', 'Weldon Lehner PhD', '47503 Ankunding Spur\nGradyland, IA 26148-3316', 'http://abbott.com/', '+1-430-774-6378', 'Quisquam et ratione tenetur aut minima. Ut occaecati rerum necessitatibus ea sit. Totam sint id totam distinctio est earum.', 'https://via.placeholder.com/0x480.png/001199?text=vel', '1', 'Sienna Frami', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/001133?text=harum'),
(170, '2023-10-13 00:00:00.000000', '58', 'Fire', 'Calista Stehr', '3193 Ola Prairie Suite 629\nDooleyport, MO 85055', 'http://www.klein.com/facere-vel-eligendi-molestiae-sint-repellat', '724-375-6619', 'Dolorem hic sequi ea soluta voluptatem ex. Est fugiat rerum est voluptas odit quia non. Ipsum sed omnis omnis itaque sed maxime.', 'https://via.placeholder.com/0x480.png/00ccbb?text=omnis', '1', 'Mr. Aidan Runolfsdottir', 'BFP', '', 'https://via.placeholder.com/0x480.png/0055bb?text=nobis'),
(171, '2023-10-16 00:00:00.000000', '94', 'Fire', 'Meagan Jerde', '78717 Weissnat Shoals\nAlfordmouth, MI 94475', 'http://schmeler.biz/dolorum-beatae-eum-dolore-illo-nesciunt', '(269) 236-3871', 'Quia dolor cumque quasi. Aut dolor sit aut ipsum nulla in sit. Et ad quaerat commodi dignissimos minus nihil. Aut incidunt quis in necessitatibus nobis consectetur placeat.', 'https://via.placeholder.com/0x480.png/00ffaa?text=nulla', '1', 'Sam Streich III', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/00ff11?text=quod'),
(172, '2023-12-15 00:00:00.000000', '67', 'Medical', 'Jedidiah Koelpin', '1433 Frami Glen Suite 387\nBeiermouth, TX 83758', 'https://www.hammes.org/ut-earum-quia-corrupti-autem', '+12409653736', 'Quo eligendi aut rerum autem quas et. Magni unde saepe maiores fugit. Harum eligendi quia culpa et. Recusandae voluptatum incidunt et nobis exercitationem nihil rerum.', 'https://via.placeholder.com/0x480.png/00aaff?text=a', '1', 'Kristy Marks', 'BFP', '', 'https://via.placeholder.com/0x480.png/0077cc?text=harum'),
(173, '2023-12-03 00:00:00.000000', '81', 'Crime', 'Modesta Boehm', '3105 Homenick Mission\nNew Shyanne, OK 17218', 'http://krajcik.com/', '947.694.8692', 'Est quis debitis ut numquam sed illo similique. Recusandae quod quis et debitis quasi aperiam. Sit cum est ipsam sit aut dolorum facilis atque.', 'https://via.placeholder.com/0x480.png/008888?text=omnis', '1', 'Murray Kuhn', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/0055aa?text=corporis'),
(174, '2023-10-11 00:00:00.000000', '98', 'Crime', 'Helene Schaden', '928 Janis Point Apt. 026\nJanyhaven, IL 43411-3575', 'https://wilderman.com/amet-animi-enim-minima-quas.html', '423.499.2876', 'Culpa ab beatae dicta aliquam maxime doloremque. Qui qui fuga autem quasi nisi earum. Qui quasi adipisci repellat repudiandae. Iusto iure aliquid labore sed.', 'https://via.placeholder.com/0x480.png/001155?text=at', '1', 'Felicita Kunde', 'BFP', '', 'https://via.placeholder.com/0x480.png/00aa00?text=est'),
(175, '2024-01-07 00:00:00.000000', '49', 'Medical', 'Dixie Pfeffer Jr.', '15810 Kessler Views Apt. 860\nDaytonstad, LA 59015-4841', 'http://langworth.com/', '+1-208-583-2821', 'Provident molestiae deserunt quas pariatur necessitatibus illo odit autem. Accusamus aperiam rerum fuga. Magni distinctio quo maiores adipisci ab similique.', 'https://via.placeholder.com/0x480.png/00ee44?text=sed', '1', 'Madalyn Gleason', 'BFP', '', 'https://via.placeholder.com/0x480.png/00eebb?text=consequatur'),
(176, '2023-10-28 00:00:00.000000', '100', 'Crime', 'Mrs. Sincere D\'Amore', '7515 Leopold Greens\nLibbiechester, MA 73072-7962', 'http://www.kuphal.info/', '+19209709112', 'Vero sequi ratione qui. Architecto doloremque doloribus voluptas. Nulla illum laboriosam omnis atque necessitatibus magni aut eveniet. Ea tenetur rerum in quis eum.', 'https://via.placeholder.com/0x480.png/004499?text=et', '1', 'Mian Christopher Dimatulac', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/007722?text=amet'),
(177, '2023-11-11 00:00:00.000000', '19', 'Crime', 'Dr. Eldred Dietrich I', '702 McClure Lock Suite 801\nWindlerbury, ME 54005-1819', 'http://marvin.org/harum-pariatur-expedita-omnis-qui', '(815) 321-6333', 'Cumque ea rerum facere. Eum nihil ut fugit aut. Deserunt dolor perferendis aut exercitationem facere voluptas. Amet laudantium provident quidem earum vero fuga.', 'https://via.placeholder.com/0x480.png/00ffaa?text=velit', '1', 'Mian Christopher Dimatulac', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/0022ff?text=laudantium'),
(180, '2023-11-26 00:00:00.000000', '80', 'Medical', 'Darius Kirlin', '501 Sawayn Islands\nSouth Tiffanyview, HI 88668', 'http://mosciski.org/quidem-id-non-velit-reprehenderit-consectetur-laborum-dolor-dignissimos.html', '+1-985-390-8317', 'Et quaerat sapiente labore quo. Numquam eius voluptatem impedit ut est repellat. Sit laboriosam rem totam alias molestias eius cum ea. Facere maxime aut dolorem et voluptas.', 'https://via.placeholder.com/0x480.png/00ddaa?text=in', '1', 'Mian Christopher Dimatulac', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/004499?text=voluptas'),
(181, '2023-11-11 00:00:00.000000', '25', 'Accident', 'Miss Aracely Tremblay I', '845 Connelly Court Suite 724\nBodeborough, ID 53106-7268', 'http://donnelly.net/beatae-odio-minima-aspernatur-in', '+1.283.939.3998', 'Harum fugit voluptatem explicabo quos laudantium. Asperiores maiores ducimus velit dignissimos eaque ipsum eos eos. Quis molestiae voluptates natus rerum ut.', 'https://via.placeholder.com/0x480.png/0099dd?text=autem', '1', 'Mr. Arnulfo Kertzmann IV', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/000099?text=quo'),
(182, '2023-12-24 00:00:00.000000', '99', 'Fire', 'Mrs. Bulah Wilkinson', '36124 Laura Key\nSincerechester, UT 04178-2209', 'http://heller.com/odit-porro-natus-vero', '667.921.3896', 'Voluptatibus accusantium velit nisi ut voluptatem. Ut voluptates eligendi soluta aut corrupti nostrum et. Et ut dolore qui optio. Dolores voluptatem aperiam distinctio consequatur non maiores.', 'https://via.placeholder.com/0x480.png/00eedd?text=ut', '1', 'Mian Christopher Dimatulac', 'MDRRMO', '', 'https://via.placeholder.com/0x480.png/002255?text=natus'),
(183, '2023-10-26 00:00:00.000000', '29', 'Medical', 'Kiera Schuster', '90886 Kovacek Via\nPort Briafurt, OR 05606-7917', 'http://www.ritchie.com/consequatur-similique-soluta-asperiores-modi.html', '+1 (309) 525-2788', 'Omnis sint facilis facere repellendus magnam soluta. Odio qui sit consequuntur quis. Recusandae qui recusandae assumenda.', 'https://via.placeholder.com/0x480.png/009988?text=quis', '1', 'Julia Watsica', 'CAY POMBO', '', 'https://via.placeholder.com/0x480.png/00aa44?text=eos'),
(195, '2024-02-25 00:15:26.330208', '2', 'Fire', 'asdasd', 'asdasdasd', ' ', '45645643456546546', 'asdasdasd', ' ', '1', 'Mian Christopher Dimatulac', 'GUYONG', '', 'file-storage/user_default.jpg'),
(196, '2024-02-25 00:39:55.508118', '2', 'Medical', 'asdasdasd', 'asdasdasd', ' ', '455555555565656', 'asasdasd', ' ', '1', 'Mian Christopher Dimatulac', 'GUYONG', '', 'file-storage/user_default.jpg'),
(197, '2024-02-25 00:56:05.258983', '2', 'Crime', 'sadasd', 'asdasdasd', ' ', '45645643456546546', 'asdasdasd', ' ', '0', 'Mian Christopher Dimatulac', 'MDRRMO', '', 'file-storage/user_default.jpg'),
(198, '2024-02-25 14:13:53.267705', '2', 'Medical', 'Mike Dy', 'M.Sapa', ' ', '+639289837585', 'Help may nagsaksakan Dito', ' ', '0', '', '', '', 'file-storage/user_default.jpg'),
(199, '2024-02-25 14:25:59.508615', '2', 'Fire', 'Kenneth Kabinet', 'Belbmont, Cay Pombo', ' ', '+6392222222232323', 'Nagliliyab na ang bahay namen', ' ', '1', 'Mian Christopher Dimatulac', 'MDRRMO', 'MDRRMO', 'file-storage/user_default.jpg'),
(200, '2024-02-25 15:37:11.785286', '2', 'Medical', 'Jennalyn Dy', 'Las Palmas, Cay Pombo', ' ', '+3999889855655', 'asdasdasasdasds', ' ', '1', 'Mian Christopher Dimatulac', 'MDRRMO', 'MDRRMO', 'file-storage/user_default.jpg'),
(201, '2024-02-25 18:26:14.360145', '2', 'Medical', 'Mac Dimatulac', 'dito lang sa tabi tabi', ' ', '+92265559889889', 'asdasdasdasdsad', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg'),
(202, '2024-02-25 18:28:12.997759', '2', 'Crime', 'Mac Dimson', 'Las Palmas', ' ', '98999999999999999889', 'hahajajajajajj', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg'),
(203, '2024-02-25 18:30:36.644230', '2', 'Crime', 'asdasdsad', 'asdasdasd', ' ', '5555555555554545', 'aasdasdasdasdasdasd', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg'),
(204, '2024-02-25 18:32:31.419149', '2', 'Medical', 'asdasdasd', 'asdasdasd', ' ', '545454545656565', 'sdsdfsdfsdf', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg'),
(205, '2024-02-25 18:35:22.903855', '2', 'Crime', 'Mian', 'asdasdasd', ' ', '+6655598888898989', 'asdasdasdasdsd', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg'),
(206, '2024-02-25 18:38:31.907173', '2', 'Medical', 'Miek', 'Cay Pombo', ' ', '+66559885556559', 'asdasdasdasd', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg'),
(207, '2024-02-25 18:40:08.156731', '2', 'Crime', 'asdasd', 'asdasd', ' ', '123123123123123', 'asdasd', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg'),
(208, '2024-02-25 18:57:56.804035', '2', 'Medical', 'Kelly', 'Tibagan', ' ', '0928988655598', 'Help help', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg'),
(209, '2024-02-25 23:19:20.275690', '2', 'Medical', 'Ellton', 'bayabas street', ' ', '+635565559888989', 'asdasdsd', ' ', '0', 'Mian Christopher Dimatulac', ' ', 'MDRRMO', 'file-storage/user_default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resident_credentials`
--

CREATE TABLE `resident_credentials` (
  `uid` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident_credentials`
--

INSERT INTO `resident_credentials` (`uid`, `email`) VALUES
('dPHSTyCXMlcN16KPethTpxtKyrm1', 'raphaeldacara62@gmail.com'),
('qP8i7htsUMOVGHxYMQYUJWdJi1h1', 'makimasarap69@gmail.com'),
('zryBJzIfUnUmrvBxdyINfxn5PRy1', 'awitsayo423@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `resident_profile`
--

CREATE TABLE `resident_profile` (
  `uid` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident_profile`
--

INSERT INTO `resident_profile` (`uid`, `name`, `address`, `phoneNumber`, `image`) VALUES
('dPHSTyCXMlcN16KPethTpxtKyrm1', 'Raphael Dacara', 'Hulo SMB 123', '639424069633', '../e-ligtas-sector/upload/image_1705635645.jpg'),
('qP8i7htsUMOVGHxYMQYUJWdJi1h1', 'Michael Dacara', 'Sa aming Bahay', '639458621574', '../e-ligtas-sector/upload/image_1702802011.jpg'),
('zryBJzIfUnUmrvBxdyINfxn5PRy1', 'Mian Dimatulac', 'Caypombo SMB', '639993161581', '../e-ligtas-sector/upload/image_1704440810.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` bigint(20) UNSIGNED NOT NULL,
  `settings_name` varchar(255) NOT NULL,
  `settings_description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_name`, `settings_description`, `created_at`, `updated_at`) VALUES
(1, 'about us', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more r, froh the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33\r\n\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more r, froh the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33', NULL, '2024-02-13 05:26:24'),
(2, 'Legal Polocies', 'Certainly! It\'s important to note that I am not a lawyer, and you should consult with legal professionals to ensure that any legal terms meet the specific requirements of your emergency application. Below is a general template that you might consider as a starting point:\r\n\r\n---\r\n\r\n**[Your Company/Organization Name] Emergency Application - Terms of Use**\r\n\r\n**1. Acceptance of Terms**\r\n\r\nBy using the [Your Company/Organization Name] Emergency Application (\"the Application\"), you agree to comply with and be bound by these Terms of Use. If you do not agree to these terms, please do not use the Application.\r\n\r\n**2. Emergency Services Disclaimer**\r\n\r\nThe Application is intended to provide information and assistance during emergencies. However, it is not a substitute for professional emergency services. In case of a life-threatening situation, always dial your local emergency number.\r\n\r\n**3. User Responsibilities**\r\n\r\n(a) You are responsible for the accuracy of the information you provide through the Application.\r\n\r\n(b) You agree not to use the Application for any illegal or unauthorized purpose.\r\n\r\n(c) You must promptly notify [Your Company/Organization Name] of any security breaches or unauthorized use of your account.\r\n\r\n**4. Limitation of Liability**\r\n\r\nTo the fullest extent permitted by law, [Your Company/Organization Name] shall not be liable for any direct, indirect, incidental, special, consequential, or exemplary damages, including but not limited to, damages for loss of profits, goodwill, use, data, or other intangible losses.\r\n\r\n**5. Privacy**\r\n\r\nYour privacy is important to us. Please refer to our Privacy Policy [link to privacy policy] for information on how we collect, use, and disclose your personal information.\r\n\r\n**6. Changes to Terms**\r\n\r\n[Your Company/Organization Name] reserves the right to modify, suspend, or terminate the Application or these Terms of Use at any time without notice. Your continued use of the Application after any changes indicates your acceptance of the updated terms.\r\n\r\n**7. Governing Law**\r\n\r\nThese Terms of Use are governed by and construed in accordance with the laws of [Your Jurisdiction]. Any disputes arising under or in connection with these terms shall be subject to the exclusive jurisdiction of the courts in [Your Jurisdiction].\r\n\r\n**8. Contact Information**\r\n\r\nIf you have any questions or concerns regarding these Terms of Use, please contact us at [Your Contact Information].\r\n\r\n---\r\n\r\nPlease ensure that you seek legal advice to customize these terms according to your specific needs and the applicable laws in your jurisdiction.', NULL, '2024-02-09 19:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `spot_report`
--

CREATE TABLE `spot_report` (
  `spotID` int(255) UNSIGNED NOT NULL,
  `reportId` bigint(20) UNSIGNED NOT NULL,
  `imageEvidence` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `responder_name` varchar(255) NOT NULL,
  `userfrom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Sector',
  `email` varchar(255) NOT NULL,
  `verified` enum('pending','active') NOT NULL DEFAULT 'pending',
  `token` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `responder_name`, `userfrom`, `username`, `role`, `email`, `verified`, `token`, `created_by`, `password`) VALUES
(2, 'Mian Christopher Dimatulac', 'MDRRMO', 'Samson', 'Admin', 'macdimatulac234@gmail.com', 'active', ' ', '', '$2y$12$BqjN9mXC32AzkZjuNDP4tOAQaGHXAQpU75nM93vLYZVI5nln9ikqO'),
(8, 'Richard  Gomez', 'GUYONG', 'Burnekols', 'Rescuer', 'miandimatulac23@gmail.com', 'active', ' ', NULL, '$2y$12$w4fJPvkTixgkUjsFbshRh.X87si6yDoTinfEucbNkK.kRJIKYSAJC'),
(13, 'mac dimatulac', 'CAY POMBO', 'mac', 'Admin', 'mac@sample.com', 'active', ' ', 'Mian Christopher Dimatulac', '$2y$12$GLFNYWK6cNExZxmXgQ0swOiucXCYYSCSMpj2ICSAsHIIbmF6nuBse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency_hotlines`
--
ALTER TABLE `emergency_hotlines`
  ADD PRIMARY KEY (`hotlines_id`);

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`guidelines_id`);

--
-- Indexes for table `guidelines_after`
--
ALTER TABLE `guidelines_after`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guidelines_after_guidelines_id_foreign` (`guidelines_id`);

--
-- Indexes for table `guidelines_before`
--
ALTER TABLE `guidelines_before`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guidelines_before_guidelines_id_foreign` (`guidelines_id`);

--
-- Indexes for table `guidelines_during`
--
ALTER TABLE `guidelines_during`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guidelines_during_guidelines_id_foreign` (`guidelines_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `resident_credentials`
--
ALTER TABLE `resident_credentials`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `resident_profile`
--
ALTER TABLE `resident_profile`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `phone_number` (`phoneNumber`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `spot_report`
--
ALTER TABLE `spot_report`
  ADD PRIMARY KEY (`spotID`),
  ADD KEY `reportId` (`reportId`);

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
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `guidelines_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guidelines_after`
--
ALTER TABLE `guidelines_after`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guidelines_before`
--
ALTER TABLE `guidelines_before`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guidelines_during`
--
ALTER TABLE `guidelines_during`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spot_report`
--
ALTER TABLE `spot_report`
  MODIFY `spotID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guidelines_after`
--
ALTER TABLE `guidelines_after`
  ADD CONSTRAINT `guidelines_after_guidelines_id_foreign` FOREIGN KEY (`guidelines_id`) REFERENCES `guidelines` (`guidelines_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guidelines_before`
--
ALTER TABLE `guidelines_before`
  ADD CONSTRAINT `guidelines_before_guidelines_id_foreign` FOREIGN KEY (`guidelines_id`) REFERENCES `guidelines` (`guidelines_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guidelines_during`
--
ALTER TABLE `guidelines_during`
  ADD CONSTRAINT `guidelines_during_guidelines_id_foreign` FOREIGN KEY (`guidelines_id`) REFERENCES `guidelines` (`guidelines_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resident_profile`
--
ALTER TABLE `resident_profile`
  ADD CONSTRAINT `resident_profile_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `resident_credentials` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spot_report`
--
ALTER TABLE `spot_report`
  ADD CONSTRAINT `spot_report_ibfk_1` FOREIGN KEY (`reportId`) REFERENCES `reports` (`report_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
