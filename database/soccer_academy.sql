-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 03:09 AM
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

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `name`, `description`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Teagan Schultz', 'Esse nostrum et sol', '../server/uploads/achievement/v-bts-735oty.jpg', '2021-07-04 06:56:40', '2021-07-04 06:56:40');

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

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Blair Warren', '../server/uploads/gallery/logo_ssb.png', '2021-07-04 03:44:20', '2021-07-04 03:44:20'),
(2, 'Linus Hensley', '../server/uploads/gallery/v-bts-735oty.jpg', '2021-07-04 06:18:45', '2021-07-04 06:18:45');

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
  `extras` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `name`, `date`, `location`, `image_path`, `status`, `extras`, `created_at`, `updated_at`) VALUES
(1, 'Beck Harper', '1997-06-10', 'Cumque et harum quis', '', 'Buka', '{\"round_one\":\"Unggulan\",\"teams\":[\"2\",\"3\",\"4\",\"5\",\"6\"],\"third_place_winner\":\"Ya\"}', '2021-07-03 16:12:07', '2021-07-04 16:36:54');

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
(1, 'Jarrod Clements', 'test/file.img', '+1 (786) 429-5966', '2021-07-03 16:10:59', '2021-07-03 16:10:59'),
(2, 'Jenna Irwin', 'test/file.img', '+1 (823) 209-9171', '2021-07-03 16:12:14', '2021-07-03 16:12:14'),
(3, 'Lance Torres', 'test/file.img', '+1 (793) 555-1153', '2021-07-04 10:04:40', '2021-07-04 10:04:40'),
(4, 'Shea Salas', 'test/file.img', '+1 (844) 111-3637', '2021-07-04 11:32:43', '2021-07-04 11:32:43'),
(5, 'Sophia Hancock', 'test/file.img', '+1 (331) 169-2543', '2021-07-04 11:32:48', '2021-07-04 11:32:48'),
(6, 'Jael Stewart', 'test/file.img', '+1 (416) 344-4637', '2021-07-04 11:32:52', '2021-07-04 11:32:52'),
(7, 'Ciara Stanley', 'test/file.img', '+1 (486) 289-4135', '2021-07-04 11:32:55', '2021-07-04 11:32:55'),
(8, 'Prescott Morgan', 'test/file.img', '+1 (886) 529-6392', '2021-07-04 11:33:00', '2021-07-04 11:33:00'),
(9, 'Allen Dale', 'test/file.img', '+1 (151) 649-8091', '2021-07-04 11:33:03', '2021-07-04 11:33:03'),
(10, 'Kato Salas', 'test/file.img', '+1 (153) 906-7789', '2021-07-04 11:48:04', '2021-07-04 11:48:04'),
(11, 'Herman Chapman', 'test/file.img', '+1 (124) 674-5893', '2021-07-04 11:48:09', '2021-07-04 11:48:09'),
(12, 'Nathan Santana', 'test/file.img', '+1 (807) 883-5792', '2021-07-04 11:48:19', '2021-07-04 11:48:19'),
(13, 'Aspen Blake', 'test/file.img', '+1 (238) 502-8313', '2021-07-04 11:48:28', '2021-07-04 11:48:28'),
(14, 'Hermione Gates', 'test/file.img', '+1 (135) 266-9947', '2021-07-04 11:48:32', '2021-07-04 11:48:32'),
(15, 'Ivana Washington', 'test/file.img', '+1 (511) 114-6272', '2021-07-04 11:48:36', '2021-07-04 11:48:36'),
(16, 'Leslie Frederick', 'test/file.img', '+1 (941) 462-1189', '2021-07-04 11:48:40', '2021-07-04 11:48:40'),
(17, 'Keelie Mccray', 'test/file.img', '+1 (646) 108-4701', '2021-07-04 11:48:43', '2021-07-04 11:48:43'),
(18, 'Breanna Dickson', 'test/file.img', '+1 (612) 287-7137', '2021-07-04 14:19:22', '2021-07-04 14:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `participant` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `league_id` int(11) NOT NULL,
  `extras` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `participant`, `date`, `time`, `league_id`, `extras`, `created_at`, `updated_at`) VALUES
(64, '2, 5', NULL, NULL, 1, NULL, '2021-07-04 16:36:51', '2021-07-04 16:36:51'),
(65, '3, 4', NULL, NULL, 1, NULL, '2021-07-04 16:36:51', '2021-07-04 16:36:51');

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
(1, 'Carol Valencia', 32, '2013-12-10', 'Tempore proident h', 'U16-U18', 2, 'Buddha', 'Consectetur accusant', '69', '8', '646', '../server/uploads/member/AFIF.JPG', 'Similique id irure e', 'Earum obcaecati at s', 'Recusandae Quasi di', 'draft', '2021-07-04 07:21:00', '2021-07-04 07:21:00');

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
(1, 'Adipisicing consecte', 'Ipsum excepturi eos', '2003-06-01', '../server/uploads/news/rugged_coastline_black_and_white-wallpaper-1920x1080.jpg', '2021-07-04 04:01:00', '2021-07-04 04:01:00'),
(2, 'Laborum eu libero pr', 'Lorem Ipsum is simply dummy text of the print', '1972-09-03', '../server/uploads/news/water_flower_3-wallpaper-1920x1080.jpg', '2021-07-04 04:21:04', '2021-07-04 04:21:04');

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

--
-- Dumping data for table `structures`
--

INSERT INTO `structures` (`id`, `name`, `position`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Lareina Alston', 'Pariatur Velit eiu', '../server/uploads/structure/AFIF.JPG', '2021-07-04 06:23:59', '2021-07-04 06:23:59');

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
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `address`, `manager_id`, `licenses`, `email`, `telp`, `photo`, `registration_number`, `status`, `created_at`, `updated_at`) VALUES
(2, '1. ainu', 'In aliqua Ex minima', '2', 'Ducimus ad pariatur', 'ryhoc@mailinator.com', '680', '', 'a6272', 'draft', '2021-07-03 23:12:14', '2021-07-03 23:12:14'),
(3, '2', 'Veniam qui adipisci', '3', 'Blanditiis necessita', 'lyzofuno@mailinator.com', '209', '', 'a5757', 'draft', '2021-07-04 17:04:41', '2021-07-04 17:04:41'),
(4, '3', 'Amet labore qui des', '4', 'Quia non animi exer', 'dinemoj@mailinator.com', '462', '', 'a169f', 'draft', '2021-07-04 18:32:43', '2021-07-04 18:32:43'),
(5, '4', 'Sit esse mollitia a', '5', 'Rerum repellendus L', 'gope@mailinator.com', '652', '', '1d49d', 'draft', '2021-07-04 18:32:48', '2021-07-04 18:32:48'),
(6, '5', 'Dolor ipsam voluptas', '6', 'Sed enim aut saepe d', 'wizydywym@mailinator.com', '362', '', '48299', 'draft', '2021-07-04 18:32:52', '2021-07-04 18:32:52'),
(7, '6', 'Eius dicta ullam rer', '7', 'Nisi dolore qui mini', 'sopapogi@mailinator.com', '466', '', 'b1010', 'draft', '2021-07-04 18:32:55', '2021-07-04 18:32:55'),
(8, '7', 'Consequuntur quos pe', '8', 'Nisi temporibus odit', 'tyhe@mailinator.com', '241', '', '28e5b', 'draft', '2021-07-04 18:33:00', '2021-07-04 18:33:00'),
(9, '8', 'In quia possimus es', '9', 'Ea molestias qui sit', 'janu@mailinator.com', '781', '', '95945', 'draft', '2021-07-04 18:33:03', '2021-07-04 18:33:03'),
(18, '9', 'Deserunt minim sed i', '10', 'Est beatae consequat', 'cuhodyb@mailinator.com', '523', '', '1eef0', 'draft', '2021-07-04 18:48:04', '2021-07-04 18:48:04'),
(19, '10', 'Culpa veniam dolor ', '11', 'Consequatur eos cup', 'wowe@mailinator.com', '176', '', 'c7f52', 'draft', '2021-07-04 18:48:09', '2021-07-04 18:48:09'),
(20, '11', 'Sunt qui porro minim', '12', 'Qui animi aperiam l', 'sili@mailinator.com', '951', '', '0886c', 'draft', '2021-07-04 18:48:19', '2021-07-04 18:48:19'),
(21, '12', 'Voluptatem dolores q', '13', 'Obcaecati ex aut ali', 'sopytosy@mailinator.com', '400', '', '9c5ac', 'draft', '2021-07-04 18:48:28', '2021-07-04 18:48:28'),
(22, '13', 'Aliquam ducimus qui', '14', 'Exercitation nihil v', 'nuhola@mailinator.com', '487', '', '6f3c3', 'draft', '2021-07-04 18:48:32', '2021-07-04 18:48:32'),
(23, '14', 'Voluptas aut ad exer', '15', 'Quia assumenda vitae', 'rymajymuw@mailinator.com', '422', '', '8da49', 'draft', '2021-07-04 18:48:36', '2021-07-04 18:48:36'),
(24, '15', 'Laudantium error of', '16', 'Quo magnam autem par', 'ducygowoci@mailinator.com', '583', '', 'd6ccc', 'draft', '2021-07-04 18:48:40', '2021-07-04 18:48:40'),
(25, '16', 'Porro sint nihil qu', '17', 'Reiciendis architect', 'tynoco@mailinator.com', '213', '', 'f15b5', 'draft', '2021-07-04 18:48:43', '2021-07-04 18:48:43'),
(26, 'Lars Nguyen', 'Minus nihil dicta ei', '18', 'Earum velit molestia', 'qybaquq@mailinator.com', '383', '', '39a0b', 'draft', '2021-07-04 21:19:22', '2021-07-04 21:19:22');

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1);

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
  ADD PRIMARY KEY (`team_id`,`league_id`),
  ADD KEY `fk_teams_has_leagues_leagues1_idx` (`league_id`),
  ADD KEY `fk_teams_has_leagues_teams1_idx` (`team_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `structures`
--
ALTER TABLE `structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  ADD CONSTRAINT `fk_teams_has_leagues_leagues1` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teams_has_leagues_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
