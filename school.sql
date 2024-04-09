-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 06:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` int(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(9, 3, 8, 16, 3, NULL, 96000, '2024-04-08 21:06:19', '2024-04-08 21:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(5, 12, 10, 3, 3, 2, '2024-03-29 13:45:27', '2024-03-29 13:45:27'),
(6, 13, 15, 9, 3, 2, '2024-03-29 14:40:08', '2024-03-29 14:40:08'),
(8, 15, 12, 4, 3, 1, '2024-03-31 10:44:41', '2024-03-31 10:44:41'),
(9, 16, 8, 3, 3, 1, '2024-03-31 10:46:05', '2024-03-31 10:46:05'),
(11, 19, 11, 4, 3, 1, '2024-04-06 10:27:02', '2024-04-06 10:27:02'),
(12, 20, 8, 3, 1, 1, '2024-04-08 20:26:24', '2024-04-08 20:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(5, 8, 6, 10, 5, 5, '2024-03-29 13:13:34', '2024-03-29 13:13:34'),
(6, 8, 1, 10, 3, 5, '2024-03-29 13:13:34', '2024-03-29 13:13:34'),
(7, 8, 5, 10, 1, 5, '2024-03-29 13:13:34', '2024-03-29 13:13:34'),
(8, 10, 1, 10, 4, 3, '2024-03-29 13:14:05', '2024-03-29 13:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id = user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(1, 12, '2024-04-11', 'Present', '2024-04-06 13:14:16', '2024-04-06 13:14:16'),
(2, 13, '2024-04-11', 'Absent', '2024-04-06 13:14:16', '2024-04-06 13:14:16'),
(3, 15, '2024-04-11', 'Present', '2024-04-06 13:14:16', '2024-04-06 13:14:16'),
(4, 16, '2024-04-11', 'Present', '2024-04-06 13:14:16', '2024-04-06 13:14:16'),
(5, 19, '2024-04-11', 'Absent', '2024-04-06 13:14:16', '2024-04-06 13:14:16'),
(6, 12, '1970-01-01', 'Absent', '2024-04-06 13:23:05', '2024-04-06 13:23:05'),
(7, 13, '1970-01-01', 'Present', '2024-04-06 13:23:05', '2024-04-06 13:23:05'),
(8, 15, '1970-01-01', 'Present', '2024-04-06 13:23:05', '2024-04-06 13:23:05'),
(9, 16, '1970-01-01', 'Absent', '2024-04-06 13:23:05', '2024-04-06 13:23:05'),
(10, 19, '1970-01-01', 'Absent', '2024-04-06 13:23:05', '2024-04-06 13:23:05'),
(11, 12, '1970-01-01', 'Present', '2024-04-06 13:23:17', '2024-04-06 13:23:17'),
(12, 13, '1970-01-01', 'Present', '2024-04-06 13:23:17', '2024-04-06 13:23:17'),
(13, 15, '1970-01-01', 'Present', '2024-04-06 13:23:17', '2024-04-06 13:23:17'),
(14, 16, '1970-01-01', 'Present', '2024-04-06 13:23:17', '2024-04-06 13:23:17'),
(15, 19, '1970-01-01', 'Present', '2024-04-06 13:23:17', '2024-04-06 13:23:17'),
(16, 12, '2024-04-12', 'Absent', '2024-04-06 13:58:30', '2024-04-06 13:58:30'),
(17, 13, '2024-04-12', 'Present', '2024-04-06 13:58:30', '2024-04-06 13:58:30'),
(18, 15, '2024-04-12', 'Absent', '2024-04-06 13:58:30', '2024-04-06 13:58:30'),
(19, 16, '2024-04-12', 'Present', '2024-04-06 13:58:30', '2024-04-06 13:58:30'),
(20, 19, '2024-04-12', 'Absent', '2024-04-06 13:58:30', '2024-04-06 13:58:30'),
(21, 12, '2024-04-13', 'Present', '2024-04-06 13:58:46', '2024-04-06 13:58:46'),
(22, 13, '2024-04-13', 'Absent', '2024-04-06 13:58:46', '2024-04-06 13:58:46'),
(23, 15, '2024-04-13', 'Absent', '2024-04-06 13:58:46', '2024-04-06 13:58:46'),
(24, 16, '2024-04-13', 'Absent', '2024-04-06 13:58:46', '2024-04-06 13:58:46'),
(25, 19, '2024-04-13', 'Present', '2024-04-06 13:58:46', '2024-04-06 13:58:46'),
(26, 12, '1970-01-01', 'Present', '2024-04-06 14:01:48', '2024-04-06 14:01:48'),
(27, 13, '1970-01-01', 'Present', '2024-04-06 14:01:48', '2024-04-06 14:01:48'),
(28, 15, '1970-01-01', 'Present', '2024-04-06 14:01:48', '2024-04-06 14:01:48'),
(29, 16, '1970-01-01', 'Present', '2024-04-06 14:01:48', '2024-04-06 14:01:48'),
(30, 19, '1970-01-01', 'Present', '2024-04-06 14:01:48', '2024-04-06 14:01:48'),
(31, 12, '2024-04-18', 'Absent', '2024-04-06 14:02:55', '2024-04-06 14:02:55'),
(32, 13, '2024-04-18', 'Present', '2024-04-06 14:02:55', '2024-04-06 14:02:55'),
(33, 15, '2024-04-18', 'Absent', '2024-04-06 14:02:55', '2024-04-06 14:02:55'),
(34, 16, '2024-04-18', 'Present', '2024-04-06 14:02:55', '2024-04-06 14:02:55'),
(35, 19, '2024-04-18', 'Absent', '2024-04-06 14:02:55', '2024-04-06 14:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vu The Hoc', '2024-03-20 07:58:55', '2024-03-29 13:08:41'),
(6, 'Xuan Thuc', '2024-03-20 08:02:47', '2024-03-20 08:02:47'),
(7, 'Trung Kien', '2024-03-20 08:03:02', '2024-03-20 08:03:02'),
(8, 'Van My', '2024-03-20 08:03:16', '2024-03-20 08:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(4, 5, 1, 5000, '2024-03-29 13:45:27', '2024-03-29 13:45:27'),
(5, 6, 1, 5, '2024-03-29 14:40:08', '2024-03-29 14:40:08'),
(6, 7, 1, 4, '2024-03-29 18:20:08', '2024-03-29 18:20:08'),
(7, 8, 1, 5, '2024-03-31 10:44:41', '2024-03-31 10:44:41'),
(8, 9, 1, 4, '2024-03-31 10:46:05', '2024-03-31 10:46:05'),
(9, 10, 1, 3, '2024-04-06 10:16:09', '2024-04-06 10:16:09'),
(10, 11, 1, 3, '2024-04-06 10:27:02', '2024-04-06 10:27:02'),
(11, 12, 1, 5, '2024-04-08 20:26:24', '2024-04-08 20:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Kt Cuoi Ky', '2024-03-29 10:50:18', '2024-03-29 10:50:18'),
(3, 'Midterm Exam', '2024-03-29 13:06:45', '2024-03-29 13:06:45'),
(4, 'Entry Exam', '2024-03-29 13:07:02', '2024-03-29 13:07:02');

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
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(16, 3, 8, 100000, '2024-03-29 13:10:20', '2024-03-29 13:10:20'),
(17, 4, 9, 35000, '2024-03-29 13:12:06', '2024-03-29 13:12:06'),
(18, 4, 8, 80000, '2024-03-29 13:12:06', '2024-03-29 13:12:06'),
(19, 4, 10, 100000, '2024-03-29 13:12:06', '2024-03-29 13:12:06'),
(20, 4, 11, 110000, '2024-03-29 13:12:06', '2024-03-29 13:12:06'),
(21, 4, 12, 150000, '2024-03-29 13:12:06', '2024-03-29 13:12:06'),
(22, 4, 13, 200000, '2024-03-29 13:12:06', '2024-03-29 13:12:06'),
(23, 4, 14, 210000, '2024-03-29 13:12:06', '2024-03-29 13:12:06'),
(24, 4, 15, 250000, '2024-03-29 13:12:06', '2024-03-29 13:12:06'),
(25, 5, 8, 5000, '2024-03-29 13:12:39', '2024-03-29 13:12:39'),
(26, 5, 9, 5000, '2024-03-29 13:12:39', '2024-03-29 13:12:39'),
(27, 5, 14, 5000, '2024-03-29 13:12:39', '2024-03-29 13:12:39'),
(28, 5, 15, 5000, '2024-03-29 13:12:39', '2024-03-29 13:12:39'),
(29, 3, 9, 10000, '2024-03-31 10:38:12', '2024-03-31 10:38:12'),
(30, 3, 10, 110000, '2024-03-31 10:38:12', '2024-03-31 10:38:12'),
(31, 3, 11, 150000, '2024-03-31 10:38:12', '2024-03-31 10:38:12'),
(32, 3, 12, 170000, '2024-03-31 10:38:12', '2024-03-31 10:38:12'),
(33, 3, 13, 190000, '2024-03-31 10:38:12', '2024-03-31 10:38:12'),
(34, 3, 14, 200000, '2024-03-31 10:38:12', '2024-03-31 10:38:12'),
(35, 3, 15, 210000, '2024-03-31 10:38:12', '2024-03-31 10:38:12');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_27_164711_create_sessions_table', 1),
(8, '2024_03_04_141214_create_student_classes_table', 3),
(9, '2024_03_05_134336_create_student_years_table', 4),
(10, '2024_03_05_141443_create_student_years_table', 5),
(11, '2024_03_05_171353_create_student_groups_table', 6),
(12, '2024_03_06_000956_create_student_shifts_table', 7),
(13, '2024_03_07_014206_create_student_fee_categories_table', 8),
(14, '2024_03_12_164428_create_fee_category_amounts_table', 9),
(15, '2024_03_18_020934_create_exam_types_table', 10),
(16, '2024_03_18_152346_create_school_subjects_table', 11),
(17, '2024_03_18_161306_create_assign_subjects_table', 12),
(18, '2024_03_20_143634_create_designations_table', 13),
(19, '2014_10_12_000000_create_users_table', 14),
(20, '2024_03_23_013855_create_assign_students_table', 15),
(21, '2024_03_23_014235_create_discount_students_table', 15),
(22, '2024_04_04_153656_create_student_marks_table', 16),
(23, '2024_04_06_191503_create_attendances_table', 17),
(24, '2024_04_09_021527_create_account_student_fees_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('hocvu@gmail.com', '$2y$12$g02qx84dsfxJ9XDodQEMzOLmQ4IEOAAOnNcmQ.Oh3afK82jJlpUh6', '2024-03-01 11:22:49');

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
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Physics', '2024-03-18 09:01:27', '2024-03-29 13:07:15'),
(3, 'Geometry', '2024-03-29 13:07:22', '2024-03-29 13:07:22'),
(4, 'Calculus', '2024-03-29 13:07:34', '2024-03-29 13:07:34'),
(5, 'Literature', '2024-03-29 13:07:41', '2024-03-29 13:07:41'),
(6, 'Maths', '2024-03-29 13:07:47', '2024-03-29 13:07:47'),
(7, 'Chemicals', '2024-03-29 13:08:08', '2024-03-29 13:08:08'),
(8, 'Biology', '2024-03-29 13:08:22', '2024-03-29 13:08:22');

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
('ClwCnzzPTcbzfDhreiOjAKo1bG9vCgYwX5ZRVsJ5', 1, '192.168.0.68', 'Mozilla/5.0 (Linux; Android 11; RMX1901) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Mobile Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNnFCb28xMlZhVWsyeVd6aXhjZFF3clI4SFU4SDNsVGFFRHY5UkZ5eCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTkyLjE2OC4wLjEwNTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkLmkyQi9rakt5NFFmWEkyS2V4VFNMZVJOQmtzc2x4S2JWakZ5TlJGOEhKWUpKdmFwVjhPQ20iO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1712654966),
('ZgA3WtsfHaoYhXTmdzEt6Ox8fbSdN3v1nka9QCJ6', 1, '192.168.0.68', 'Mozilla/5.0 (Linux; Android 11; RMX1901) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRngxN0o4YzlyT2NKd0pRS0w4OEtpN0JPQzQ0UkkyOGRGUjNFcWRlRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xOTIuMTY4LjAuMTA1OjgwMDAvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQuaTJCL2tqS3k0UWZYSTJLZXhUU0xlUk5Ca3NzbHhLYlZqRnlOUkY4SEpZSkp2YXBWOE9DbSI7fQ==', 1712655027),
('zptTCaTNFryXS4sFVaexgwOYoXMXZojpKrWcGOYh', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYWRVYTVSZlEwNHd5T1ZHSm5zdWljcTgyS0lORTJkbTNjYWtZV0hwNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zdHVkZW50cy9tb250aGx5L2ZlZS92aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQuaTJCL2tqS3k0UWZYSTJLZXhUU0xlUk5Ca3NzbHhLYlZqRnlOUkY4SEpZSkp2YXBWOE9DbSI7fQ==', 1712655749);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Five', '2024-03-29 13:03:08', '2024-03-29 13:04:44'),
(9, 'Six', '2024-03-29 13:03:12', '2024-03-29 13:04:38'),
(10, 'Seven', '2024-03-29 13:03:17', '2024-03-29 13:04:32'),
(11, 'Eight', '2024-03-29 13:03:24', '2024-03-29 13:03:24'),
(12, 'Nine', '2024-03-29 13:03:30', '2024-03-29 13:03:30'),
(13, 'Ten', '2024-03-29 13:03:37', '2024-03-29 13:03:37'),
(14, 'Eleven', '2024-03-29 13:03:43', '2024-03-29 13:03:43'),
(15, 'Twelve', '2024-03-29 13:03:54', '2024-03-29 13:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_categories`
--

CREATE TABLE `student_fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fee_categories`
--

INSERT INTO `student_fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Registration Fee', '2024-03-06 19:26:31', '2024-03-29 12:55:40'),
(4, 'Monthly Fee', '2024-03-12 10:20:02', '2024-03-29 12:55:49'),
(5, 'Exam Fee', '2024-03-29 12:55:56', '2024-03-29 12:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A', '2024-03-05 10:33:19', '2024-03-29 13:02:19'),
(3, 'B', '2024-03-29 13:02:23', '2024-03-29 13:02:23'),
(4, 'C', '2024-03-29 13:02:28', '2024-03-29 13:02:28'),
(5, 'D', '2024-03-29 13:02:33', '2024-03-29 13:02:33'),
(6, 'E', '2024-03-29 13:02:41', '2024-03-29 13:02:41'),
(7, 'F', '2024-03-29 13:02:46', '2024-03-29 13:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id=user_id',
  `id_no` varchar(255) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `mark` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `mark`, `created_at`, `updated_at`) VALUES
(1, 16, '20180016', 3, 8, 6, 2, 9, '2024-04-04 10:54:24', '2024-04-04 10:54:24'),
(3, 16, '20180016', 3, 8, 5, 2, 8, '2024-04-04 11:47:48', '2024-04-04 11:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Morning', '2024-03-05 18:01:42', '2024-03-29 13:05:19'),
(2, 'Afternoon', '2024-03-29 13:05:26', '2024-03-29 13:05:26'),
(3, 'Evening', '2024-03-29 13:05:36', '2024-03-29 13:05:36'),
(4, 'Night', '2024-03-29 13:06:12', '2024-03-29 13:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, '2018', '2024-03-05 07:40:46', '2024-03-29 13:01:29'),
(4, '2019', '2024-03-05 07:40:58', '2024-03-29 13:01:37'),
(5, '2020', '2024-03-29 13:01:44', '2024-03-29 13:01:44'),
(6, '2021', '2024-03-29 13:01:49', '2024-03-29 13:01:49'),
(7, '2022', '2024-03-29 13:01:56', '2024-03-29 13:01:56'),
(8, '2023', '2024-03-29 13:02:01', '2024-03-29 13:02:01'),
(9, '2024', '2024-03-29 13:02:07', '2024-03-29 13:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) DEFAULT NULL COMMENT 'Student,Employee,Admin',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL COMMENT 'admin=head of software,operator,computer operator,user=employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'hocvu', 'hocvu2003@gmail.com', NULL, '$2y$12$.i2B/kjKy4QfXI2KexTSLeRNBksslxKbVjFyNRF8HJYJJvapV8OCm', NULL, NULL, NULL, '202403040254Screenshot (13).png', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(3, 'Admin', 'hfdhwrwerrrrrrrrrrrrrrrr', 'hoc@gmail.com', NULL, '$2y$12$IbyfejiUzb55H1GEVSyPouJLXTlix1JV.etZvI.mEggoEHO6vG5mO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7042', 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-03-22 20:33:52', '2024-04-01 10:02:05'),
(5, 'Admin', 'hocvuthe', 'hocvu@gmail.com', NULL, '$2y$12$jtjdK8ysjP/SfxDWayMXHew.sdbJuLNFFUQaD2zyhfqYIXGxb7Cqm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9095', 'Operator', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-03-22 20:35:11', '2024-03-22 20:35:11'),
(12, 'Student', 'Vu', NULL, NULL, '$2y$12$stonI8eL1/1fnHD1IMQFKeCj5nQgsjaocB6y96otIKPxl87zmoyxi', '0365298193', 'ha', 'Male', '202403292045_95b606e8-5a1d-4c36-9b50-4694714c5b01.jpg', 'Ha', 'Dao', 'Kinh', '20180012', '2023-06-15', '3109', 'NULL', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-03-29 13:45:27', '2024-03-31 09:30:29'),
(13, 'Student', 'Hoc Vu', NULL, NULL, '$2y$12$Kgt6UI/THSFQf3JWWmqWEu58kV7vYtJQ2hsI9ExPrbtOm8dF5rtwC', '0365298193', 'nam', 'Male', '202403300001itachi-uchiha-sharingan-naruto-anime-4k-uhdpaper.com-14.jpg', 'Ha', 'Dao', 'Kinh', '20240013', '2022-02-09', '5685', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-03-29 14:40:08', '2024-03-29 17:01:44'),
(15, 'Student', 'Hoang', NULL, NULL, '$2y$12$QRtS8seh3kaeGYsNE6pjIu3kUYV0KZEt5gsMuhVV.IC.4E6STTP.i', '0976525537', 'Dong Anh', 'Female', '202403311744itachi-uchiha-sharingan-naruto-anime-4k-uhdpaper.com-14.jpg', 'H', 'D', 'Kinh', '20190014', '2024-04-03', '966', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-03-31 10:44:41', '2024-03-31 10:44:41'),
(16, 'Student', 'Ha', NULL, NULL, '$2y$12$PMxPuak0Yn9TftJIIrZ08uSXF05uegDxFpjXFazNWrVv.okj8mmcm', '033566789', 'Ha Tihnh', 'Male', '202403311746itachi-uchiha-sharingan-naruto-anime-4k-uhdpaper.com-14.jpg', 'Hong', 'Hai', 'Thai', '20180016', '2024-04-04', '9156', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-03-31 10:46:05', '2024-03-31 10:46:05'),
(17, 'Admin', 'Dinh Tien Hoang', 'hoang2003@gmail.com', NULL, '$2y$12$3jfjzo9lvgH5KDjd.PmZnOxFRl87bVXFakQMoqFB9S3L15TLNvF6a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2980', 'Operator', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-04-01 10:09:45', '2024-04-01 10:09:45'),
(19, 'Student', 'Tuyen Pham', NULL, NULL, '$2y$12$uOMbGSfSJt3ri9Hwxyyl6ehMiycvwQDy6wYLLM5y.o4A5Tw4j4uXi', '0976525537', 'Nam Dinh', 'Male', '202404061727avatar-13.png', 'Ta', 'Tien', 'Tay', '20190017', '2024-04-08', '8188', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-04-06 10:27:02', '2024-04-06 10:27:02'),
(20, 'Student', 'Tuyen', NULL, NULL, '$2y$12$.gRrv/ecDcfW2K0Cx06aYu1gkgkwMFlUMlu4vmKWji9dt/pTS6bdC', '0365298193', 'Nam', 'Male', '202404090326avatar-4.png', 'H', 'A', 'Kinh', '20180020', '2024-04-01', '5503', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-04-08 20:26:24', '2024-04-08 20:26:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
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
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_subjects_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_fee_categories`
--
ALTER TABLE `student_fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_fee_categories_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_fee_categories`
--
ALTER TABLE `student_fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
