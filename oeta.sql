-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 10:30 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$6SMpXRJTrAf4plyderGkdeFR5gFjfnMo7I5MEWi1yNaO.4czlLug6', 0, NULL, '2020-10-17 00:01:07', '2020-10-17 00:01:07'),
(2, 'admin1', 'admin1@gmail.com', '$2y$10$dcMMsc3URnyypPJjM8x/KusXG6bIvdS4XKfb4B0np5L9iI.tdVqKi', 0, NULL, '2020-10-17 11:34:16', '2020-10-17 11:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `exam_ques_set`
--

CREATE TABLE `exam_ques_set` (
  `id` int(11) NOT NULL,
  `title_id` int(2) NOT NULL,
  `semester_id` int(2) NOT NULL,
  `set_id` int(2) NOT NULL,
  `subject_id` int(2) NOT NULL,
  `ques_ids` varchar(255) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `created_by` int(2) NOT NULL,
  `updated_by` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_ques_set`
--

INSERT INTO `exam_ques_set` (`id`, `title_id`, `semester_id`, `set_id`, `subject_id`, `ques_ids`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 4, '4,6,7,8,9,10,11,12,13,14', 1, 1, 1, '2020-10-19 10:20:50', '2020-10-19 13:37:26'),
(2, 2, 1, 2, 4, '4,6,8,9,10,11,12,13,14,15', 2, 1, 1, '2020-10-19 10:22:08', '2020-10-19 18:25:21'),
(3, 2, 1, 4, 4, '4,6,7,8,10,11,12,13,14,15', 2, 1, 1, '2020-10-19 10:23:27', '2020-10-19 15:44:49'),
(4, 2, 1, 5, 4, '4,6,7,8,9,10,12,13,14,15', 2, 1, 1, '2020-10-19 10:23:59', '2020-10-19 15:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_10_17_044927_create_admins_table', 1),
(4, '2020_10_17_045121_create_students_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `notice_desc` longtext NOT NULL,
  `status` int(2) NOT NULL,
  `created_by` int(2) NOT NULL,
  `updated_by` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_desc`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'New notice, announce .', 1, 1, 1, '2020-10-19 03:12:27', '2020-10-19 03:12:27'),
(2, 'New notice, announce  11.', 1, 1, 1, '2020-10-19 03:15:29', '2020-10-19 03:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `subject_id` int(3) NOT NULL,
  `ques_name` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `option1` varchar(225) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `option5` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_by` int(2) NOT NULL,
  `updated_by` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `ques_name`, `status`, `option1`, `option2`, `option3`, `option4`, `option5`, `answer`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 2, 'english q ?', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn3', 1, 1, '2020-10-19 02:34:15', '2020-10-19 02:34:15'),
(4, 4, 'Ban q 1 ?', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn4', 1, 1, '2020-10-19 02:51:18', '2020-10-19 02:51:18'),
(6, 4, 'Ban q 1', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn4', 1, 1, '2020-10-19 06:39:30', '2020-10-19 06:39:30'),
(7, 4, 'Ban q 3', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn5', 1, 1, '2020-10-19 06:40:11', '2020-10-19 06:40:11'),
(8, 4, 'Ban q 4', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn4', 1, 1, '2020-10-19 06:40:26', '2020-10-19 06:40:26'),
(9, 4, 'Ban q 5', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn4', 1, 1, '2020-10-19 06:40:42', '2020-10-19 06:40:42'),
(10, 4, 'Ban q 6', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn1', 1, 1, '2020-10-19 06:41:02', '2020-10-19 06:41:02'),
(11, 4, 'Ban q 7', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn2', 1, 1, '2020-10-19 06:41:26', '2020-10-19 06:41:26'),
(12, 4, 'Ban q 8', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn3', 1, 1, '2020-10-19 06:41:40', '2020-10-19 06:41:40'),
(13, 4, 'Ban q 9', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn4', 1, 1, '2020-10-19 06:41:57', '2020-10-19 06:41:57'),
(14, 4, 'Ban q 10', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn1', 1, 1, '2020-10-19 06:42:17', '2020-10-19 06:42:17'),
(15, 4, 'Ban q 11', 1, 'optn1', 'optn2', 'optn3', 'optn4', 'optn5', 'optn1', 1, 1, '2020-10-19 09:42:51', '2020-10-19 09:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `ques_set`
--

CREATE TABLE `ques_set` (
  `id` int(11) NOT NULL,
  `set_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `updated_by` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ques_set`
--

INSERT INTO `ques_set` (`id`, `set_name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'A', 1, '2020-10-19 01:06:02', '2020-10-19 01:16:29', 1, 1),
(2, 'B', 1, '2020-10-19 01:06:10', '2020-10-19 01:06:10', 1, 1),
(4, 'C', 1, '2020-10-19 10:22:42', '2020-10-19 10:22:42', 1, 1),
(5, 'D', 1, '2020-10-19 10:22:50', '2020-10-19 10:22:50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'touhid', 'touhid@gmail.com', '$2y$10$K1xUuwmbccPdo1KljeKZd.eCg23WyUucYiSnRZ0y/j./HDNdfzuWq', NULL, '2020-10-16 23:55:27', '2020-10-16 23:55:27'),
(2, 'student', 'student@gmail.com', '$2y$10$PT4eFrCwJrFSJXXLFDSEEOC8mI2oielBpfl/zTF1cvL8UWvn.KjXK', NULL, '2020-10-17 11:33:26', '2020-10-17 11:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `created_by` int(2) NOT NULL,
  `updated_by` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'English', 1, 1, 1, '2020-10-18 22:47:11', '2020-10-18 22:47:11'),
(3, 'General Knowledge', 1, 1, 1, '2020-10-18 22:48:35', '2020-10-18 22:48:35'),
(4, 'Bangla', 1, 1, 1, '2020-10-18 23:18:47', '2020-10-18 23:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `title_desc` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `updated_by` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title_desc`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'This is the first title', 1, '2020-10-18 02:58:27', '2020-10-18 02:58:27', 1, 1),
(3, 'This is the first title123', 1, '2020-10-18 03:06:58', '2020-10-18 10:12:26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `exam_ques_set`
--
ALTER TABLE `exam_ques_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ques_set`
--
ALTER TABLE `ques_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_ques_set`
--
ALTER TABLE `exam_ques_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ques_set`
--
ALTER TABLE `ques_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
