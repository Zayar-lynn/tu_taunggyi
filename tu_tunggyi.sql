-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 11:47 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tu_tunggyi`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about`, `photo`, `vision`, `mission`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, '<div style=\"text-align: justify;\"><span style=\"color: rgb(45, 45, 45); font-family: Lora, serif; font-size: 17px; text-align: start;\">This is official page for Technological University (Taunggyi).</span><br></div>', '5d6364ba71c1d_1566305499_tu taunggyi.jpg', '<div style=\"text-align: center;\"><span style=\"color: rgb(45, 45, 45); font-family: Lora, serif; font-size: 17px; text-align: start;\">Our vision is “to produce all-round outstanding engineers and innovative researchers, capable of socio-economic development for state and region as well as to become an internationally accredited engineering and research-oriented university”.</span><span style=\"font-family: Roboto;\">﻿</span><br></div>', '<div style=\"text-align: center;\"><span style=\"color: rgb(45, 45, 45); font-family: Lora, serif; font-size: 17px; text-align: start;\">The missions of our University are *to implement the principles and statutes of National Education Law and Higher Education Laws, *to bring up students as qualified engineers who have technical competence, wisdom good spirit and discipline, *to carry out applied research for the regional development, *to collaborate and cooperate mutually with local and international universities, other organizations and industries.</span><span style=\"font-family: Roboto;\">﻿</span><br></div>', '09684032700', 'tu.taunggyi@gmail.com', 'Aye Thayar Myo Thit, Taunggyi , Shan State, Myanmar', NULL, '2019-08-25 22:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `photo`, `description`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 'Blog 1', '5d63668ad6245_1566305499_tu taunggyi.jpg', '<p style=\"text-align: center; \"><span style=\"font-family: &quot;Times New Roman&quot;;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, aliquam reiciendis beatae saepe perspiciatis provident iusto aperiam, consectetur iste, maiores tempore atque. Quis minima, quasi error molestias facere quaerat perspiciatis!</span><br></p>', 1, '2019-08-25 22:26:42', '2019-08-25 22:26:42'),
(2, 'Tu Taunggyi', '5d6ebdcba2b05_68724030_701426756944995_4432897988867653632_n.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime modi atque saepe soluta quidem natus, quam ducimus id ipsa incidunt dolores corrupti a non possimus, sequi quod cupiditate quos sit!<br></p>', 1, '2019-09-03 12:53:55', '2019-09-03 12:53:55'),
(3, 'Research', '5d70447f26a99_resources-img_02.jpg', '<p style=\"text-align: center; \">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta iusto mollitia voluptate laborum perspiciatis unde nam itaque obcaecati sed minima est consectetur exercitationem repellat, odit, nisi perferendis ex neque. Modi.<br></p>', 2, '2019-09-04 16:40:55', '2019-09-16 08:04:32'),
(4, 'civil welcome', '5d7f3a352e745_69024050_709268499494154_1814537839048654848_n.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, quaerat commodi ullam officia dolores, voluptates omnis inventore, facilis voluptas quidem minus! Quo iure in id quos aliquam nostrum pariatur minus.<br></p>', 3, '2019-09-16 01:01:01', '2019-09-16 01:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'bobo', 'koko@gmail.com', '8325872465', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime modi atque saepe soluta quidem natus, quam ducimus id ipsa incidunt dolores corrupti a non possimus, sequi quod cupiditate quos sit!', '2019-09-03 13:05:08', '2019-09-03 13:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` int(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_detail`, `course_photo`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 'Course 1', '<p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, aliquam reiciendis beatae saepe perspiciatis provident iusto aperiam, consectetur iste, maiores tempore atque. Quis minima, quasi error molestias facere quaerat perspiciatis!</span><br></p>', '5d63666f56844_1566305499_tu taunggyi.jpg', 1, '2019-08-25 22:26:15', '2019-08-25 22:26:15'),
(2, 'Japan Language', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime modi atque saepe soluta quidem natus, quam ducimus id ipsa incidunt dolores corrupti a non possimus, sequi quod cupiditate quos sit!<br></p>', '5d6ebf03f2b8d_69051181_709260452828292_1608213889391001600_n.jpg', 1, '2019-09-03 12:59:08', '2019-09-03 12:59:08'),
(3, 'Javascript', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta iusto mollitia voluptate laborum perspiciatis unde nam itaque obcaecati sed minima est consectetur exercitationem repellat, odit, nisi perferendis ex neque. Modi.<br></p>', '5d7044e5adc73_resources-img_01.jpg', 2, '2019-09-04 16:42:37', '2019-09-04 16:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `currant_students`
--

CREATE TABLE `currant_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `major` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currant_students`
--

INSERT INTO `currant_students` (`id`, `male`, `female`, `major`, `year`, `created_at`, `updated_at`) VALUES
(1, 30, 60, 'IT', 'First Year', '2019-08-22 09:18:57', '2019-09-04 18:40:47'),
(2, 40, 50, 'IT', 'Second Year', '2019-08-22 09:20:05', '2019-09-04 18:41:00'),
(3, 35, 50, 'IT', 'Third Year', '2019-08-22 09:20:16', '2019-09-04 18:41:12'),
(4, 30, 50, 'IT', 'Fourth Year', '2019-08-22 09:20:34', '2019-09-04 18:41:24'),
(5, 30, 50, 'IT', 'Fifth Year', '2019-08-22 09:20:43', '2019-09-04 18:41:40'),
(6, 25, 50, 'IT', 'Sixth Year', '2019-08-22 09:20:52', '2019-09-04 18:41:53'),
(7, 50, 50, 'Civil', 'First Year', '2019-08-22 09:21:09', '2019-08-22 09:21:09'),
(8, 50, 50, 'Civil', 'Second Year', '2019-08-22 09:21:17', '2019-08-22 09:21:17'),
(9, 50, 50, 'Civil', 'Third Year', '2019-08-22 09:21:25', '2019-08-22 09:21:25'),
(10, 50, 50, 'Civil', 'Fourth Year', '2019-08-22 09:21:41', '2019-08-22 09:21:41'),
(11, 50, 50, 'Civil', 'Fifth Year', '2019-08-22 09:21:49', '2019-08-22 09:21:49'),
(12, 50, 50, 'Civil', 'Sixth Year', '2019-08-22 09:21:56', '2019-08-22 09:21:56'),
(13, 50, 50, 'Electrical', 'First Year', '2019-08-22 09:22:21', '2019-08-22 09:22:21'),
(14, 50, 50, 'Electrical', 'Second Year', '2019-08-22 09:22:29', '2019-08-22 09:22:29'),
(15, 50, 50, 'Electrical', 'Third Year', '2019-08-22 09:22:38', '2019-08-22 09:22:38'),
(16, 50, 50, 'Electrical', 'Fourth Year', '2019-08-22 09:22:54', '2019-08-22 09:22:54'),
(17, 50, 50, 'Electrical', 'Fifth Year', '2019-08-22 09:23:08', '2019-08-22 09:23:08'),
(18, 50, 50, 'Electrical', 'Sixth Year', '2019-08-22 09:23:17', '2019-08-22 09:23:17'),
(19, 50, 50, 'Electrical Power', 'First Year', '2019-08-22 09:23:39', '2019-08-22 09:23:39'),
(20, 50, 50, 'Electrical Power', 'Second Year', '2019-08-22 09:23:47', '2019-08-22 09:23:47'),
(21, 50, 50, 'Electrical Power', 'Third Year', '2019-08-22 09:23:55', '2019-08-22 09:23:55'),
(22, 50, 50, 'Electrical Power', 'Fourth Year', '2019-08-22 09:24:05', '2019-08-22 09:24:05'),
(23, 50, 50, 'Electrical Power', 'Fifth Year', '2019-08-22 09:24:19', '2019-08-22 09:24:19'),
(24, 50, 50, 'Electrical Power', 'Sixth Year', '2019-08-22 09:24:26', '2019-08-22 09:24:26'),
(25, 50, 50, 'Mechanical Power', 'First Year', '2019-08-22 09:24:35', '2019-08-22 09:24:35'),
(26, 50, 50, 'Mechanical Power', 'Second Year', '2019-08-22 09:24:43', '2019-08-22 09:24:43'),
(27, 50, 50, 'Mechanical Power', 'Third Year', '2019-08-22 09:24:51', '2019-08-22 09:24:51'),
(28, 50, 50, 'Mechanical Power', 'Fourth Year', '2019-08-22 09:24:58', '2019-08-22 09:24:58'),
(29, 50, 50, 'Mechanical Power', 'Fifth Year', '2019-08-22 09:25:22', '2019-08-22 09:25:22'),
(30, 50, 50, 'Mechanical Power', 'Sixth Year', '2019-08-22 09:25:29', '2019-08-22 09:25:29'),
(31, 50, 50, 'Mining', 'First Year', '2019-08-22 09:25:46', '2019-08-22 09:25:46'),
(32, 50, 50, 'Mining', 'Second Year', '2019-08-22 09:25:53', '2019-08-22 09:25:53'),
(33, 50, 50, 'Mining', 'Third Year', '2019-08-22 09:26:00', '2019-08-22 09:26:00'),
(34, 50, 50, 'Mining', 'Fourth Year', '2019-08-22 09:26:07', '2019-08-22 09:26:07'),
(35, 50, 50, 'Mining', 'Fifth Year', '2019-08-22 09:26:16', '2019-08-22 09:26:16'),
(36, 50, 50, 'Mining', 'Sixth Year', '2019-08-22 09:26:23', '2019-08-22 09:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_of_department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `head_of_department`, `phone`, `email`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Department of Information Technology', 'Dr. Aye Zarchi Minn', '09978699298', 'it@gmail.com', 'Our department is one of programs in Technological University (Taunggyi) located in Aye Tha Yar Myo Thit. It is sex years program. It emphasizes to teachlatest IT technologies.', '1566795158_1566305499_tu taunggyi.jpg', '2019-06-27 21:53:14', '2019-08-25 22:22:38'),
(2, 'Department of Civil Engineering', 'Dr. Win Zaw', '09978699298', 'civil@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides subjects for civil engineering.', '1566795133_1566305499_tu taunggyi.jpg', '2019-06-27 22:02:12', '2019-08-25 22:22:13'),
(3, 'Department of Electrical Engineering', 'Dr. Aye Aye Nwe', '09965191644', 'electrical@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides subjects for electrical engineering.', '1566795122_1566305499_tu taunggyi.jpg', '2019-06-27 22:04:14', '2019-08-25 22:22:02'),
(4, 'Department of Electrical Power Engineering', 'Dr. Yin Yin Pyone', '09965191644', 'electricalpower@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides subjects for electrical power engineering.', '1566795110_1566305499_tu taunggyi.jpg', '2019-06-27 22:05:10', '2019-08-25 22:21:50'),
(5, 'Department of Mechanical Engineering', 'Dr. Nang Wo Swam', '09978699298', 'mechanicalpower@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides subjects for mechanical engineering.', '1566795057_1566305499_tu taunggyi.jpg', '2019-06-27 22:06:31', '2019-08-25 22:20:57'),
(6, 'Department of Mining', 'Dr. Win Min Latt', '09978699298', 'mining@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides subjects for mining engineering.', '1566795048_1566305499_tu taunggyi.jpg', '2019-06-27 22:07:23', '2019-08-25 22:20:48'),
(7, 'Department of Myanmar', 'Dr. Tin Tin Htwe', '09978699298', 'myanmar@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides Myanmar Subject for all engineering majors.', '1566795039_1566305499_tu taunggyi.jpg', '2019-06-27 22:08:58', '2019-08-25 22:20:39'),
(8, 'Department of English', 'Daw Toe Toe', '09771672511', 'english@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides engineering english for all engineering majors.', '1566795004_1566305499_tu taunggyi.jpg', '2019-06-27 22:10:21', '2019-08-25 22:20:04'),
(9, 'Department of Mathematics', 'Dr. Thida', '09978699298', 'methematics@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides engineering mathematics subjects for all engineering programs.', '1566795029_1566305499_tu taunggyi.jpg', '2019-06-27 22:11:32', '2019-08-25 22:20:29'),
(10, 'Department of Chemistry', 'Daw Thet Thet Htay', '09771672511', 'chemistry@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides engineering chemistry for all engineering majors.', '1566795017_1566305499_tu taunggyi.jpg', '2019-06-27 22:12:19', '2019-08-25 22:20:17'),
(11, 'Department of Physic', 'Dr. San San Mon', '09965191644', 'physic@gmail.com', 'Our department is one of departments in Technological University (Taunggyi). It provides engineering physics subject for all engineering programs.', '1566794990_1566305499_tu taunggyi.jpg', '2019-06-27 22:13:15', '2019-09-02 08:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `department_posts`
--

CREATE TABLE `department_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_posts`
--

INSERT INTO `department_posts` (`id`, `title`, `photo`, `department_name`, `description`, `created_at`, `updated_at`) VALUES
(1, '* * * မိုးရာသီ အားကစားၿပိဳင္ပြဲ မ်ား စတင္ * * *', '5d63671877a8d_5d5ff1776182a_68621486_119916159350273_4320305455562752000_n.jpg', 'Department of Information Technology', '<p><span style=\"color: rgb(41, 43, 44); font-family: Lora, serif; font-size: 17px;\">ေက်ာင္းအားကစားပြဲ ၾကက္ ေတာင္ၿပိဳင္ ပြဲ က်ား ပထမ ဆု ေမာင္ေအာင္ေက်ာ္ၿဖိဳး 4 IT ႏွင့္ ဒုတိယ ဆု စိုင္းေခးခမ္း 4 IT အႏိုင္ရ ရွိပါတယ္ Congratulations ပါ 👌👌👌👌👌👌👌👌👌👌👌👌👌👌👌</span><br></p>', '2019-08-25 22:29:04', '2019-08-25 22:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `department_videos`
--

CREATE TABLE `department_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_videos`
--

INSERT INTO `department_videos` (`id`, `user_id`, `department_name`, `department_video`, `created_at`, `updated_at`) VALUES
(1, 2, 'Department of Information Technology', '5d5a95058e5cb_fallstar.mp4', NULL, '2019-08-19 05:54:37'),
(2, 3, 'Department of Civil Engineering', '5d5a95353a0d3_fallstar.mp4', NULL, '2019-08-19 05:55:25'),
(3, 4, 'Department of Electrical Engineering', 'two2.mp4', NULL, NULL),
(4, 5, 'Department of Electrical Power Engineering', 'two3.mp4', NULL, NULL),
(5, 6, 'Department of Mechanical Engineering', 'two4.mp4', NULL, NULL),
(6, 7, 'Department of Mining', 'two5.mp4', NULL, NULL),
(7, 8, 'Department of Myanmar', 'two6.mp4', NULL, NULL),
(8, 9, 'Department of English', 'two6.mp4', NULL, NULL),
(9, 10, 'Department of Mathematics', 'two7.mp4', NULL, NULL),
(10, 11, 'Department of Chemistry', 'two8.mp4', NULL, NULL),
(11, 12, 'Department of Physic', 'two9.mp4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `photo`, `description`, `date`, `timing`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 'Multi photo 1', 'a:3:{i:0;s:29:\"5d808164cf2e3_event-img_1.jpg\";i:1;s:29:\"5d808164cf4ed_event-img_2.jpg\";i:2;s:29:\"5d808164cf669_event-img_3.jpg\";}', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, aliquam reiciendis beatae saepe perspiciatis provident iusto aperiam, consectetur iste, maiores tempore atque. Quis minima, quasi error molestias facere quaerat perspiciatis!<br></p>', '2019-09-18', '1pm to 5pm', 1, '2019-09-17 00:17:00', '2019-09-17 00:17:00'),
(2, 'Multi photo 3', 'a:2:{i:0;s:76:\"5d8081909595f_1558587927_53253009_2087273477994163_7752232363723063296_n.jpg\";i:1;s:76:\"5d80819095b36_1558587965_52333462_2056850417703136_8209755696254681088_n.jpg\";}', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, aliquam reiciendis beatae saepe perspiciatis provident iusto aperiam, consectetur iste, maiores tempore atque. Quis minima, quasi error molestias facere quaerat perspiciatis!<br></p>', '2019-09-19', '11am to 5pm', 1, '2019-09-17 00:17:44', '2019-09-17 01:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `finished_students`
--

CREATE TABLE `finished_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finished_students`
--

INSERT INTO `finished_students` (`id`, `degree_name`, `start`, `end`, `total`, `created_at`, `updated_at`) VALUES
(1, 'A.G.T.I', '1992-01-01', '2013-09-30', '4977', '2019-09-03 18:24:11', '2019-09-03 18:29:33'),
(2, 'B.Tech', '2002-01-01', '2015-11-30', '2830', '2019-09-03 18:25:46', '2019-09-03 18:29:45'),
(3, 'B.E', '2004-02-01', '2015-11-30', '1830', '2019-09-03 18:26:49', '2019-09-03 18:29:54'),
(4, 'M.E', '2010-08-01', '2012-09-30', '23', '2019-09-03 18:28:19', '2019-09-03 18:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(25, '1558587965_52333462_2056850417703136_8209755696254681088_n.jpg', '2019-05-15 21:33:12', '2019-05-22 22:36:05'),
(26, '1567539162_69024050_709268499494154_1814537839048654848_n.jpg', '2019-05-15 21:33:12', '2019-09-03 13:02:42'),
(28, '1567539180_68431384_708384436249227_6545209209082871808_n.jpg', '2019-05-15 21:34:52', '2019-09-03 13:03:00'),
(29, '1567539109_69051181_709260452828292_1608213889391001600_n.jpg', '2019-05-15 21:38:43', '2019-09-03 13:01:49'),
(30, '1567539126_69047528_709260462828291_2661921134064173056_n.jpg', '2019-05-15 21:38:43', '2019-09-03 13:02:06'),
(31, '1567539149_68724030_701426756944995_4432897988867653632_n.jpg', '2019-05-15 21:38:43', '2019-09-03 13:02:29'),
(32, '1558587927_53253009_2087273477994163_7752232363723063296_n.jpg', '2019-05-15 21:38:43', '2019-05-22 22:35:27'),
(34, '1567539094_68431384_708384436249227_6545209209082871808_n.jpg', '2019-05-15 21:39:29', '2019-09-03 13:01:34'),
(35, '1558929506_44191101_1883313965056783_6887272924365979648_n.jpg', '2019-05-26 21:28:26', '2019-05-26 21:28:26'),
(36, '1567539071_68298326_704990723255265_5652173796145102848_n.jpg', '2019-05-26 21:28:42', '2019-09-03 13:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `intros`
--

CREATE TABLE `intros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intros`
--

INSERT INTO `intros` (`id`, `text`, `sign_photo`, `created_at`, `updated_at`) VALUES
(1, '<p><span style=\"color: rgb(45, 45, 45); font-family: Lora, serif; font-size: 17px; text-align: center;\">တီထြင္ဆန္းသစ္ နည္းပညာျမွင့္</span><span style=\"font-family: Roboto;\">﻿</span><br></p>', '5d5e1c17ed657_welcom_sign.png', NULL, '2019-08-25 21:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_01_133924_create_events_table', 2),
(4, '2019_05_02_082846_create_blogs_table', 3),
(5, '2019_05_03_050833_create_teachers_table', 4),
(6, '2019_05_08_221826_create_deparments_table', 5),
(7, '2019_05_08_231056_create_courses_table', 6),
(9, '2019_05_12_122807_create_departments_table', 7),
(10, '2019_05_13_050234_create_galleries_table', 8),
(11, '2019_05_15_075836_create_teachers_table', 9),
(12, '2019_05_27_071916_create_contacts_table', 10),
(13, '2019_05_27_082822_create_abouts_table', 11),
(14, '2019_05_28_043041_create_researches_table', 12),
(15, '2019_06_05_042314_create_department_posts_table', 13),
(16, '2019_08_15_061329_create_intros_table', 14),
(17, '2019_08_19_054705_create_department_videos_table', 15),
(18, '2019_08_22_051613_create_finished_students_table', 16),
(19, '2019_08_22_152402_create_currant_students_table', 17),
(20, '2019_09_17_084323_create_ourpartners_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `ourpartners`
--

CREATE TABLE `ourpartners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ourpartners`
--

INSERT INTO `ourpartners` (`id`, `photo`, `name`, `created_at`, `updated_at`) VALUES
(1, '5d80a856e7c5b_campus-img_04.jpg', 'First Partner Company', '2019-09-17 02:21:36', '2019-09-17 03:03:10'),
(3, '5d80a90cc4a41_campus-img_05.jpg', 'Second Partner Company', '2019-09-17 03:06:12', '2019-09-17 03:06:12'),
(4, '5d80a920a09d5_campus-img_06.jpg', 'Third Partner Company', '2019-09-17 03:06:32', '2019-09-17 03:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `researches`
--

CREATE TABLE `researches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_of_peer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `research_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `researches`
--

INSERT INTO `researches` (`id`, `name_of_peer`, `research_title`, `author`, `subject`, `year`, `pdf`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 'EC', 'Knowledge Sharing', 'Ma Ma', 'Circuit', '2019', '5d6ec124e9eb2_Professional IT Curriculum Vitae.pdf', 1, '2019-09-03 13:08:12', '2019-09-03 13:08:12'),
(2, 'IT', 'Complete Programming Language', 'MgMg', 'Information Technology', '2019', '5d706756995df_Kali linux mm.pdf', 1, '2019-09-04 19:09:34', '2019-09-04 19:09:34'),
(3, 'IT', 'Linux', 'MgMg', 'Information Technology(Taunggyi)', '2019', '5d706a513e91c_Kali linux mm.pdf', 1, '2019-09-04 19:22:17', '2019-09-04 19:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `phone`, `email`, `address`, `position`, `degree`, `detail`, `department_id`, `photo`, `fb_link`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Thae Nu Nge', '09402623351', 'thaenunge11@gmail.com', 'Taunggyi', 'Associate Professor and Deputy Head', 'Ph.D (IT)', 'She is a researcher in security field.', 1, '5d6367a4b03bc_1566567445_25152412_10212890198302126_7974805227691761322_n.jpg', '', 'associate professor', '2019-08-25 22:31:24', '2019-08-25 22:31:24'),
(2, 'Dr. Aye Zarchi Minn', '09683909233', 'ayemin.rose@gmail.com', 'TU (Taunggyi)', 'Professor and Head', 'Ph.D (CEIT)', 'She is also a researcher and interested fields are software, communication and networking.', 1, '5d636827bcaad_5d5fa984a6bce_67512905_2365697293643349_8663448867146039296_n.jpg', '', 'professor', '2019-08-25 22:33:35', '2019-08-25 22:33:35'),
(3, 'Dr. San San Mon', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, ipsa hic? Error vitae fuga nobis libero consectetur non? Quasi unde sunt magnam repudiandae odit quo esse inventore id nobis hic!', 11, '1567435403_tu taunggyi.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:11:33', '2019-09-02 08:13:23'),
(4, 'Daw Thet Thet Htay', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 10, '1567649233_testi-img.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:14:42', '2019-09-04 19:37:13'),
(5, 'Dr. Thida', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 9, '1567649214_courses_4.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:15:55', '2019-09-04 19:36:54'),
(6, 'Daw Toe Toe', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 8, '1567649160_our-teachers_01.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:16:48', '2019-09-04 19:36:00'),
(7, 'Dr. Tin Tin Htwe', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 7, '1567649130_teacher_4.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:17:41', '2019-09-04 19:35:30'),
(8, 'Dr. Win Min Latt', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 6, '1567649109_our-teachers_04.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:18:37', '2019-09-04 19:35:09'),
(9, 'Dr. Nang Wo Swam', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 5, '1567649083_teacher_2.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:20:15', '2019-09-04 19:34:43'),
(10, 'Dr. Yin Yin Pyone', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 4, '1567649054_our-teachers_01.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:21:29', '2019-09-04 19:34:14'),
(11, 'Dr. Aye Aye Nwe', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 3, '1567649005_admission_testi-img.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:23:03', '2019-09-04 19:33:25'),
(12, 'Dr. Win Zaw', '09123456789', 'testing@gmail.com', 'Taung gyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 2, '1567648972_marc.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:24:14', '2019-09-04 19:32:52'),
(13, 'Dr. Aye Zarchi Minn', '09123456789', 'testing@gmail.com', 'Aye Tharya , Taunggyi', 'Department Leader', 'Ph.D', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque similique necessitatibus recusandae incidunt aperiam ex laboriosam maxime. Omnis rerum eaque perspiciatis voluptatum quis. Ipsa aliquid repellat incidunt officia similique tempore.', 1, '1567648939_avatar.jpg', 'https://www.facebook.com', 'department leader', '2019-09-02 08:25:24', '2019-09-04 19:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$QB5Bzke4AUkEa6c9YCVOsOmha3hMbyMHButEx4cbuFbMNuvFt0snG', 'admin', NULL, NULL, NULL),
(2, 'Information Technology', 'it@gmail.com', NULL, '$2y$10$.wc1CJlxzBzFNJvN.v0ruufXb62d0avvVDoUc56kxcr9F0ByPuzw.', 'it', NULL, '2019-06-27 21:53:15', '2019-06-27 21:53:15'),
(3, 'Civil', 'civil@gmail.com', NULL, '$2y$10$w7fGb.iTPKr8iHByMZFo3uQsnxK8kuzGonpkhtaPnE51S1A0jEcxu', 'civil', NULL, '2019-06-27 22:02:14', '2019-06-27 22:02:14'),
(4, 'Electrical', 'electrical@gmail.com', NULL, '$2y$10$JDASV0H5YMvvfuxm.RaQTOYrTx6yRV4lRoyiLfWN6/sB2xRVYGVhW', 'electrical', NULL, '2019-06-27 22:04:15', '2019-06-27 22:04:15'),
(5, 'Electrical Power', 'electricalpower@gmail.com', NULL, '$2y$10$fr0YQfGdxdP/HtArGYf9euQW5igYiX9H/kTsMXm9Ad67vbs4siczS', 'electrical power', NULL, '2019-06-27 22:05:11', '2019-06-27 22:05:11'),
(6, 'Mechanical Power', 'mechanicalpower@gmail.com', NULL, '$2y$10$/2b38p5iOxJVI0.8l2VrW.comIpPNPPyK1oMootaJUgn60ByqXC56', 'mechanical power', NULL, '2019-06-27 22:06:31', '2019-06-27 22:06:31'),
(7, 'Mining', 'mining@gmail.com', NULL, '$2y$10$hO.W52WzRXoQ4e3yefzHpu8h.vD.P5YJKy0m9ZonRk4Y7fkRzavrK', 'mining', NULL, '2019-06-27 22:07:24', '2019-06-27 22:07:24'),
(8, 'Myanmar', 'myanmar@gmail.com', NULL, '$2y$10$GSbSwVufsBYe/dX/QmQx2umVcXUnK8v2OUDXBsV3euBRezENJJeNe', 'myanmar', NULL, '2019-06-27 22:08:58', '2019-06-27 22:08:58'),
(9, 'English', 'english@gmail.com', NULL, '$2y$10$mOzxLxU0GGo70QSeZc7J7.XESTWLR1FJJbXwfSv5TRsAls5i.T0IO', 'english', NULL, '2019-06-27 22:10:21', '2019-06-27 22:10:21'),
(10, 'Mathematics', 'methematics@gmail.com', NULL, '$2y$10$aEau3woszs5tId15CSareufnG1va0ygsrJCYc0VpD4HcUJloOWRdW', 'mathematics', NULL, '2019-06-27 22:11:32', '2019-06-27 22:11:32'),
(11, 'Chemistry', 'chemistry@gmail.com', NULL, '$2y$10$TL1tFE0rxHjlQhu0bYiUAuhX1npfWc8cCq5AmnNkJov8wXSBzCGGu', 'chemistry', NULL, '2019-06-27 22:12:20', '2019-06-27 22:12:20'),
(12, 'Physic', 'physic@gmail.com', NULL, '$2y$10$sjm21GmDH3BvWyDI/BxUwumloNiZnCz4sjrgWBiVNZhJ6lURLOI22', 'physic', NULL, '2019-06-27 22:13:16', '2019-06-27 22:13:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currant_students`
--
ALTER TABLE `currant_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_posts`
--
ALTER TABLE `department_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_videos`
--
ALTER TABLE `department_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finished_students`
--
ALTER TABLE `finished_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intros`
--
ALTER TABLE `intros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourpartners`
--
ALTER TABLE `ourpartners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `researches`
--
ALTER TABLE `researches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currant_students`
--
ALTER TABLE `currant_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department_posts`
--
ALTER TABLE `department_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_videos`
--
ALTER TABLE `department_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finished_students`
--
ALTER TABLE `finished_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `intros`
--
ALTER TABLE `intros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ourpartners`
--
ALTER TABLE `ourpartners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `researches`
--
ALTER TABLE `researches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
