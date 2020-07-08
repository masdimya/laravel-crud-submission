-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `is_answer` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `answers` (`id`, `question_id`, `user_id`, `content`, `votes`, `likes`, `dislikes`, `is_answer`, `created_at`, `updated_at`) VALUES
(1,	2,	1,	'buwung puyuh',	0,	0,	0,	0,	'2020-07-03 21:21:10',	'2020-07-03 21:21:10'),
(2,	1,	1,	'Begini nak',	0,	0,	0,	0,	'2020-07-04 00:01:33',	'2020-07-04 00:01:33'),
(3,	1,	1,	'pertama kamu harus ....',	0,	0,	0,	0,	'2020-07-04 00:03:55',	'2020-07-04 00:03:55'),
(4,	2,	1,	'burung puyuh',	0,	0,	0,	0,	'2020-07-07 22:48:21',	'2020-07-07 22:48:21');

DROP TABLE IF EXISTS `answer_comments`;
CREATE TABLE `answer_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `answer_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `answer_comments` (`id`, `answer_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'nah bener tuh man',	'2020-07-07 21:45:08',	'2020-07-07 21:45:08'),
(2,	1,	1,	'iya bener tuh man',	'2020-07-07 21:51:23',	'2020-07-07 21:51:23'),
(3,	1,	1,	'true man !',	'2020-07-07 21:52:09',	'2020-07-07 21:52:09'),
(4,	1,	1,	'sip man mantap',	'2020-07-07 22:45:12',	'2020-07-07 22:45:12');

DROP TABLE IF EXISTS `answer_response`;
CREATE TABLE `answer_response` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `answer_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `like` tinyint(1) NOT NULL DEFAULT 0,
  `dislike` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10,	'2014_10_12_000000_create_users_table',	1),
(11,	'2014_10_12_100000_create_password_resets_table',	1),
(12,	'2019_08_19_000000_create_failed_jobs_table',	1),
(13,	'2020_07_03_125924_create_table_question',	1),
(14,	'2020_07_03_130417_create_table_question_comments',	1),
(15,	'2020_07_03_130638_create_table_question_response',	1),
(16,	'2020_07_03_130752_create_table_answers',	1),
(17,	'2020_07_03_131025_create_table_answer_comments',	1),
(18,	'2020_07_03_131207_create_table_answer_response',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `questions` (`id`, `user_id`, `title`, `content`, `votes`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(1,	1,	'Tanya dong mas',	'Bagaimana ya ma mengatasi rasa insecure ???',	0,	0,	0,	'2020-07-03 07:33:05',	'2020-07-07 22:58:58'),
(2,	1,	'Nama Burung',	'Burung apa tuh man ? burung puyuh ?',	0,	0,	0,	'2020-07-03 08:35:46',	'2020-07-04 07:09:46'),
(3,	1,	'Langit sebelah tenggara',	'Ada apa dilangit sebelah tenggara',	0,	0,	0,	'2020-07-04 06:27:33',	'2020-07-04 06:27:33'),
(4,	1,	'Tanya Kabar',	'bagaimana kabarmu ?',	0,	0,	0,	'2020-07-04 06:32:53',	'2020-07-04 06:32:53');

DROP TABLE IF EXISTS `question_comments`;
CREATE TABLE `question_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `question_comments` (`id`, `question_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1,	2,	1,	'burung apa tuh man',	NULL,	NULL),
(2,	2,	1,	'iya bener tuh...!!',	'2020-07-08 03:39:57',	'2020-07-08 03:39:57');

DROP TABLE IF EXISTS `question_response`;
CREATE TABLE `question_response` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `like` tinyint(1) NOT NULL DEFAULT 0,
  `dislike` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin',	'admin@larahub.com',	NULL,	'$2y$10$eWD5scX6vaHpRGcGefTlLOO.6T76eOo1wTiTCzn.9eZO3/hvMrXsy',	NULL,	NULL,	'2020-07-03 07:31:46',	'2020-07-03 07:31:46');

-- 2020-07-08 15:33:30
