-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 06:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `team_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image_path` varchar(45) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `results` text DEFAULT NULL,
  `extras` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `name`, `date`, `location`, `image_path`, `status`, `results`, `extras`, `created_at`, `updated_at`) VALUES
(3, 'Yetta Church', '1992-01-29', 'Consequat Omnis ex ', '', 'Buka', NULL, '{\"teams\":[\"19\",\"20\",\"21\",\"22\"]}', '2021-07-14 13:56:33', '2021-07-14 16:28:39'),
(4, 'Gil Romero', '1980-05-09', 'Vero delectus natus', '', 'Tutup', NULL, NULL, '2021-07-14 13:56:47', '2021-07-14 13:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `image_path`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Illana Tillman', 'test/file.img', '+1 (409) 283-2068', '2021-07-07 01:04:31', '2021-07-07 01:04:31'),
(2, 'Christine Cooper', 'test/file.img', '+1 (219) 373-5871', '2021-07-07 01:04:53', '2021-07-07 01:04:53'),
(3, 'Sasha Fernandez', 'test/file.img', '+1 (396) 343-8618', '2021-07-07 01:05:04', '2021-07-07 01:05:04'),
(4, 'Kellie Johns', 'test/file.img', '+1 (515) 815-7714', '2021-07-07 01:05:10', '2021-07-07 01:05:10'),
(5, 'Chava Stephenson', 'test/file.img', '+1 (572) 693-6915', '2021-07-07 01:05:17', '2021-07-07 01:05:17'),
(6, 'Quintessa Hendricks', 'test/file.img', '+1 (652) 862-2744', '2021-07-07 01:05:34', '2021-07-07 01:05:34'),
(7, 'Hannah Klein', 'test/file.img', '+1 (618) 924-5305', '2021-07-07 01:05:44', '2021-07-07 01:05:44'),
(8, 'Robert Adams', 'test/file.img', '+1 (169) 664-1032', '2021-07-07 01:06:00', '2021-07-07 01:06:00'),
(9, 'Jameson Knowles', 'test/file.img', '+1 (734) 145-5166', '2021-07-09 13:24:55', '2021-07-09 13:24:55'),
(10, 'Henry David', 'test/file.img', '+1 (799) 966-7196', '2021-07-09 13:26:44', '2021-07-09 13:26:44'),
(11, 'Richard Hawkins', 'test/file.img', '+1 (132) 727-5335', '2021-07-09 13:31:20', '2021-07-09 13:31:20'),
(12, 'Lila Roth', 'test/file.img', '+1 (181) 506-4679', '2021-07-13 15:18:58', '2021-07-13 15:18:58'),
(13, 'Octavia Dotson', 'test/file.img', '+1 (321) 189-6716', '2021-07-13 15:19:50', '2021-07-13 15:19:50'),
(14, 'Nadine Lowery', 'test/file.img', '+1 (975) 303-4145', '2021-07-13 15:19:55', '2021-07-13 15:19:55'),
(15, 'Jared Mcknight', 'test/file.img', '+1 (327) 403-8119', '2021-07-13 15:26:05', '2021-07-13 15:26:05'),
(16, 'Wayne Kirkland', 'test/file.img', '+1 (144) 604-6141', '2021-07-13 15:26:11', '2021-07-13 15:26:11'),
(17, 'Macey Lamb', 'test/file.img', '+1 (445) 256-7224', '2021-07-13 15:34:41', '2021-07-13 15:34:41'),
(18, 'Lani Lucas', 'test/file.img', '+1 (206) 489-9088', '2021-07-14 14:17:36', '2021-07-14 14:17:36'),
(19, 'Melodie Simon', 'test/file.img', '+1 (194) 509-5347', '2021-07-14 14:22:27', '2021-07-14 14:22:27'),
(20, 'Jamalia Perez', 'test/file.img', '+1 (546) 691-9135', '2021-07-14 14:24:15', '2021-07-14 14:24:15'),
(21, 'MacKenzie Fleming', 'test/file.img', '+1 (481) 877-5135', '2021-07-14 14:27:07', '2021-07-14 14:27:07'),
(22, 'Evan Hamilton', 'test/file.img', '+1 (712) 324-9323', '2021-07-14 14:27:15', '2021-07-14 14:27:15'),
(23, 'Len Stephens', 'test/file.img', '+1 (576) 167-4539', '2021-07-14 14:31:43', '2021-07-14 14:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `participant` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `tournament_id` int(11) NOT NULL,
  `extras` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `participant`, `date`, `time`, `tournament_id`, `extras`, `created_at`, `updated_at`) VALUES
(133, '14, 13', NULL, NULL, 1, NULL, '2021-07-13 15:26:21', '2021-07-13 15:26:21'),
(134, '15, 16', NULL, NULL, 1, NULL, '2021-07-13 15:26:21', '2021-07-13 15:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nisn` int(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `class_type` varchar(255) DEFAULT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `reason` varchar(45) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `nisn`, `birth_date`, `birth_place`, `class_type`, `gender_id`, `religion`, `address`, `height`, `weight`, `phone_number`, `image_path`, `position`, `reason`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hector Owen', 744, '2021-03-09', 'Excepturi expedita e', 'U6-U8', 2, 'Hindu', 'Sit in autem eos at', '94', '42', '219', '../server/uploads/member/AFIF.JPG', 'Officia praesentium ', 'Maxime maxime quia s', 'Magni quo ipsa temp', 'draft', '2021-07-13 16:37:56', '2021-07-13 16:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `date`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Nulla officiis venia', 'Perferendis exceptur', '2016-03-16', '../server/uploads/news/098524200_1624618294-aAP21173762261657.jpg', '2021-07-13 16:43:29', '2021-07-13 16:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `identity_number` varchar(20) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `back_number` varchar(45) DEFAULT NULL,
  `back_name` varchar(45) DEFAULT NULL,
  `image_path` varchar(45) DEFAULT NULL,
  `files` varchar(45) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='	';

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) NOT NULL,
  `team_id1` int(10) DEFAULT NULL,
  `score_team_id1` int(10) DEFAULT NULL,
  `score_team_id2` int(10) DEFAULT NULL,
  `team_id2` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `league_id` int(10) DEFAULT NULL,
  `extras` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `team_id1`, `score_team_id1`, `score_team_id2`, `team_id2`, `date`, `location`, `league_id`, `extras`, `created_at`, `updated_at`) VALUES
(49, 19, 0, 0, 20, '0000-00-00', '', 3, NULL, '2021-07-14 16:28:39', '2021-07-14 16:28:39'),
(50, 19, 0, 0, 21, '0000-00-00', '', 3, NULL, '2021-07-14 16:28:39', '2021-07-14 16:28:39'),
(51, 19, 0, 0, 22, '0000-00-00', '', 3, NULL, '2021-07-14 16:28:39', '2021-07-14 16:28:39'),
(52, 20, 0, 0, 21, '0000-00-00', '', 3, NULL, '2021-07-14 16:28:39', '2021-07-14 16:28:39'),
(53, 20, 0, 0, 22, '0000-00-00', '', 3, NULL, '2021-07-14 16:28:39', '2021-07-14 16:28:39'),
(54, 21, 0, 0, 22, '0000-00-00', '', 3, NULL, '2021-07-14 16:28:39', '2021-07-14 16:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `matches_id` int(10) UNSIGNED NOT NULL,
  `teams_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `structures`
--

CREATE TABLE `structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `manager_id` varchar(45) DEFAULT NULL,
  `licenses` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'draft',
  `type` varchar(255) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `address`, `manager_id`, `licenses`, `email`, `telp`, `photo`, `registration_number`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Davis Wiggins', 'Voluptates mollitia ', '1', 'Facilis consectetur', 'mubahiwu@mailinator.com', '226', '', '97c37', 'draft', NULL, '2021-07-07 08:04:31', '2021-07-07 08:04:31'),
(2, 'Perry Newman', 'Duis consequatur Il', '2', 'Perspiciatis doloru', 'qokykoma@mailinator.com', '726', '', '7ee72', 'draft', NULL, '2021-07-07 08:04:53', '2021-07-07 08:04:53'),
(3, 'Orli Small', 'Ad velit maxime assu', '3', 'Voluptas voluptatem', 'munudakuqo@mailinator.com', '472', '', '0b37d', 'draft', NULL, '2021-07-07 08:05:04', '2021-07-07 08:05:04'),
(4, 'Charissa Dominguez', 'Nostrud quaerat nesc', '4', 'Reiciendis commodi v', 'hucyw@mailinator.com', '310', '', '34872', 'draft', NULL, '2021-07-07 08:05:10', '2021-07-07 08:05:10'),
(5, 'Austin Jacobson', 'Modi dolores officia', '5', 'Sunt ut dolor conseq', 'leqygyn@mailinator.com', '468', '', 'a9484', 'draft', NULL, '2021-07-07 08:05:17', '2021-07-07 08:05:17'),
(6, 'Deborah Noble', 'Commodo aliquip poss', '6', 'Praesentium hic volu', 'qapi@mailinator.com', '886', '', '01fed', 'draft', NULL, '2021-07-07 08:05:34', '2021-07-07 08:05:34'),
(7, 'Lenore Lawrence', 'Sit officiis modi ve', '7', 'Est qui consequat D', 'ravi@mailinator.com', '251', '', '3b828', 'draft', NULL, '2021-07-07 08:05:44', '2021-07-07 08:05:44'),
(8, 'Nell Wiggins', 'Sint et est qui vol', '8', 'Sed minima reprehend', 'wicu@mailinator.com', '924', '', '5f8d2', 'draft', NULL, '2021-07-07 08:06:00', '2021-07-07 08:06:00'),
(9, 'Yardley Lara', 'Nisi sint omnis sunt', '9', 'Voluptas dolores lor', 'nymyd@mailinator.com', '474', '', '4dc63', 'draft', '', '2021-07-09 20:24:55', '2021-07-09 20:24:55'),
(10, 'Graham Whitehead', 'Numquam eum id accu', '10', 'Enim eum quo deserun', 'xafugujew@mailinator.com', '167', '', '493e3', 'draft', 'turnamen', '2021-07-09 20:26:44', '2021-07-09 20:26:44'),
(11, 'Erin Moses', 'Obcaecati quo fugiat', '11', 'Quia pariatur Adipi', 'miliryno@mailinator.com', '282', '', '6be1e', 'draft', 'liga', '2021-07-09 20:31:20', '2021-07-09 20:31:20'),
(12, 'Linda Rocha', 'Fugit nihil laborum', '12', 'Voluptas laudantium', 'soriq@mailinator.com', '839', '', 'a806c', 'draft', 'turnamen', '2021-07-13 22:18:58', '2021-07-13 22:18:58'),
(13, 'Gay Lawson', 'Est nulla debitis q', '13', 'Libero sed laudantiu', 'pypugivogi@mailinator.com', '222', '', '9b4f1', 'draft', 'turnamen', '2021-07-13 22:19:50', '2021-07-13 22:19:50'),
(14, 'Yasir Glover', 'Duis mollit beatae c', '14', 'Velit unde ducimus ', 'xawaver@mailinator.com', '710', '', 'a7e2b', 'draft', 'turnamen', '2021-07-13 22:19:55', '2021-07-13 22:19:55'),
(15, 'Lucy Avila', 'Sequi est id molest', '15', 'Voluptatem Nemo qui', 'fuwon@mailinator.com', '670', '', 'a2b98', 'draft', 'turnamen', '2021-07-13 22:26:05', '2021-07-13 22:26:05'),
(16, 'Amena Castaneda', 'Sequi sed cupidatat ', '16', 'Dolore ipsam omnis a', 'cafywebera@mailinator.com', '148', '', '3031f', 'draft', 'turnamen', '2021-07-13 22:26:11', '2021-07-13 22:26:11'),
(17, 'Gregory Sanford', 'Voluptas minus at eo', '17', 'Est consectetur har', 'deny@mailinator.com', '535', '', '61982', 'draft', 'liga', '2021-07-13 22:34:41', '2021-07-13 22:34:41'),
(18, 'Rebekah Parrish', 'Officia ut magni qua', '18', 'Aut amet incidunt ', 'jawymifus@mailinator.com', '58', '', '9836b', 'draft', 'liga', '2021-07-14 21:17:36', '2021-07-14 21:17:36'),
(19, 'Barclay Russell', 'Eum et quas et aut e', '19', 'Adipisicing hic aute', 'tapypoduh@mailinator.com', '76', '', '7a342', 'draft', 'liga', '2021-07-14 21:22:27', '2021-07-14 21:22:27'),
(20, 'Mary Kent', 'Cupiditate sit dolo', '20', 'Rem quia sunt minus ', 'qepuxofiw@mailinator.com', '76', '', '50588', 'draft', 'liga', '2021-07-14 21:24:15', '2021-07-14 21:24:15'),
(21, 'Gavin Daugherty', 'Perferendis qui obca', '21', 'Atque perferendis co', 'zopyqy@mailinator.com', '342', '', '8d200', 'draft', 'liga', '2021-07-14 21:27:07', '2021-07-14 21:27:07'),
(22, 'Brian King', 'Ex qui in cillum deb', '22', 'Alias est voluptatem', 'fukotymysy@mailinator.com', '863', '', '58440', 'draft', 'liga', '2021-07-14 21:27:15', '2021-07-14 21:27:15'),
(23, 'Kameko Johnson', 'Officia illo volupta', '23', 'Excepteur neque nemo', 'dygysuh@mailinator.com', '61', '', '815c4', 'draft', 'liga', '2021-07-14 21:31:43', '2021-07-14 21:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `team_has_leagues`
--

CREATE TABLE `team_has_leagues` (
  `team_id` int(10) UNSIGNED NOT NULL,
  `league_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_has_leagues`
--

INSERT INTO `team_has_leagues` (`team_id`, `league_id`) VALUES
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 4);

-- --------------------------------------------------------

--
-- Table structure for table `team_has_tournaments`
--

CREATE TABLE `team_has_tournaments` (
  `team_id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_has_tournaments`
--

INSERT INTO `team_has_tournaments` (`team_id`, `tournament_id`) VALUES
(13, 1),
(14, 1),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image_path` varchar(45) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `results` text DEFAULT NULL,
  `extras` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `date`, `location`, `image_path`, `status`, `results`, `extras`, `created_at`, `updated_at`) VALUES
(1, 'Wilma Brock', '2010-06-14', 'Incididunt anim rati', '', 'Buka', '[[[[1,2],[3,4]],[[2,5]]]]', '{\"round_one\":\"Acak\",\"teams\":[\"13\",\"14\",\"15\",\"16\"],\"third_place_winner\":\"Tidak\"}', '2021-07-07 01:03:35', '2021-07-13 15:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coaches_teams1_idx` (`team_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_gender_id_idx` (`gender_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_players_teams1_idx` (`team_id`),
  ADD KEY `fk_players_gender1_idx` (`gender_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_scores_matches1_idx` (`matches_id`),
  ADD KEY `fk_scores_teams1_idx` (`teams_id`);

--
-- Indexes for table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `team_has_leagues`
--
ALTER TABLE `team_has_leagues`
  ADD KEY `fk_team_has_leagues_team_id` (`team_id`),
  ADD KEY `fk_team_has_leagues_league_id` (`league_id`);

--
-- Indexes for table `team_has_tournaments`
--
ALTER TABLE `team_has_tournaments`
  ADD PRIMARY KEY (`team_id`,`tournament_id`),
  ADD KEY `fk_teams_has_leagues_leagues1_idx` (`tournament_id`),
  ADD KEY `fk_teams_has_leagues_teams1_idx` (`team_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `structures`
--
ALTER TABLE `structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `fk_coaches_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_member_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `fk_players_gender1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_players_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `fk_scores_matches1` FOREIGN KEY (`matches_id`) REFERENCES `matches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_scores_teams1` FOREIGN KEY (`teams_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `team_has_leagues`
--
ALTER TABLE `team_has_leagues`
  ADD CONSTRAINT `fk_team_has_leagues_league_id` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_team_has_leagues_team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `team_has_tournaments`
--
ALTER TABLE `team_has_tournaments`
  ADD CONSTRAINT `fk_teams_has_tournaments_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teams_has_tournaments_tournament1` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
