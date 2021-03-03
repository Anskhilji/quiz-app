-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 10:53 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$QG5/xDfh76zB2KFkgg6ygeEmawBvy7XfkrUbPeo2AgZtwoSbtCSse', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE IF NOT EXISTS `attempts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `total_marks` int(11) DEFAULT NULL,
  `obtained_marks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attempts_user_id_foreign` (`user_id`),
  KEY `attempts_teacher_id_foreign` (`teacher_id`),
  KEY `attempts_subject_id_foreign` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `user_id`, `teacher_id`, `subject_id`, `text_ans`, `status`, `total_marks`, `obtained_marks`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '[{\"id\":\"1\",\"type\":\"m\",\"select\":\"islamabad\"},{\"id\":\"2\",\"type\":\"t\",\"ans\":\"ABC\"}]', 1, 6, 5, '2021-02-23 04:07:12', '2021-02-23 04:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jsons`
--

CREATE TABLE IF NOT EXISTS `jsons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `json_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE IF NOT EXISTS `papers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ans` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `papers_teacher_id_foreign` (`teacher_id`),
  KEY `papers_subject_id_foreign` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `teacher_id`, `subject_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct`, `question_type`, `text`, `text_ans`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'what is the capital of pakistan ?', 'Karachi', 'lahore', 'islamabad', 'pindi', 'islamabad', 'm', NULL, NULL, NULL, '2021-02-23 04:04:35', '2021-02-23 04:04:35'),
(2, 1, 1, 'Which of the following is a large blood vessel that carries blood away from the heart?', NULL, NULL, NULL, NULL, NULL, 't', 'ABC', NULL, NULL, '2021-02-23 04:04:51', '2021-02-23 04:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requests_user_id_foreign` (`user_id`),
  KEY `requests_subject_id_foreign` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `subject_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '1', '2021-02-23 04:06:23', '2021-02-23 04:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjects_teacher_id_foreign` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `teacher_id`, `subject_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'English', '2021-02-23 04:03:16', '2021-02-23 04:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali', 'ali@gmail.com', NULL, '$2y$10$b47DNPwpCqRfSz3qz5TiVu8VAdKsZf8ouJbFPrvjrtRRGONhYMTv2', '58DD7Jj5uvdoxdRMqsuYPwqvcht1f0dyBzZged1teaUnV2SCPwpqxTRmTAhb', '2021-02-23 04:02:39', '2021-02-23 04:02:39'),
(2, 'Ahmad', 'ahmad@gmail.com', NULL, '$2y$10$f9d.7zJbVkLE9OL/g1QPf.T4MlVH6HZImjWV7kmxy1La6U0pheZP.', NULL, '2021-02-23 04:03:01', '2021-02-23 04:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `token`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Anskhan', 'anskhilji900@gmail.com', '1', NULL, NULL, '$2y$10$6jSd04g.9UOqFcM/OlygM.4nxDzAx0sgzkKMboKaVrhz8faNBH8Y2', 'U92HdE6NYah6NVbRNv3H4hkgwdCRn2h1daGz6FGJ1B86KTazhb8rM3pjoLhA', '2021-02-23 03:26:50', '2021-02-23 03:27:24'),
(4, 'arman khan', 'admin@gmail.com', NULL, 'c70cb72a454cf480d203788a3c7bc0398792bec8b9ecea443233d84c1e2fb4c4', NULL, '$2y$10$QG5/xDfh76zB2KFkgg6ygeEmawBvy7XfkrUbPeo2AgZtwoSbtCSse', NULL, '2021-02-23 03:31:40', '2021-02-23 03:31:40');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempts`
--
ALTER TABLE `attempts`
  ADD CONSTRAINT `attempts_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `attempts_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `attempts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `papers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
