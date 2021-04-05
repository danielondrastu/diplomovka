-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Ne 16.Máj 2021, 20:41
-- Verzia serveru: 10.4.17-MariaDB
-- Verzia PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `timeschedule_db`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `activity_roles`
--

CREATE TABLE `activity_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `activity_roles`
--

INSERT INTO `activity_roles` (`id`, `created_at`, `updated_at`, `role_id`, `name`, `display_name`) VALUES
(1, NULL, NULL, '1', 'teacher', 'Teacher'),
(2, NULL, NULL, '2', 'student', 'Student');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `all_courses`
--

CREATE TABLE `all_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ais_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guaranting_department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_allocation_lecture` int(11) DEFAULT NULL,
  `time_allocation_exercise` int(11) DEFAULT NULL,
  `max_stud` int(11) DEFAULT NULL,
  `not_parallel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_requirements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_for_students` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_monday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_tuesday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_wednesday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_thursday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_friday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `all_courses`
--

INSERT INTO `all_courses` (`id`, `created_at`, `updated_at`, `name`, `lecturer`, `type`, `ais_id`, `active`, `guaranting_department`, `time_allocation_lecture`, `time_allocation_exercise`, `max_stud`, `not_parallel`, `preferred_room`, `time_from`, `time_to`, `special_requirements`, `message_for_students`, `active_year`, `term`, `limit_monday`, `limit_tuesday`, `limit_wednesday`, `limit_thursday`, `limit_friday`) VALUES
(11, '2021-05-15 16:59:53', '2021-05-16 12:44:15', 'Dynamika a riadenie procesov', '10', 'PP', 'N422D0_4I', 'No', NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, '2021', 'winter', '', '', '', '', ''),
(12, '2021-05-16 12:46:15', '2021-05-16 12:46:15', 'Informačné technológie I', '11', 'P', 'N422I1_4I', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 'summer', '0', '0', '0', '0', '0'),
(13, '2021-05-16 12:48:25', '2021-05-16 12:48:25', 'Informatizácia a priemyselné informačné systémy II', '12', 'P', '422I3_4I', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 'winter', '0', '0', '0', '0', '0'),
(14, '2021-05-16 12:48:25', '2021-05-16 12:48:25', 'Linux -- základná automatizácia', '11', 'P', 'N422L0_4B', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021', 'winter', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `coursebases`
--

CREATE TABLE `coursebases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ais_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `def_guarantor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `coursebases`
--

INSERT INTO `coursebases` (`id`, `created_at`, `updated_at`, `ais_id`, `name`, `def_guarantor`) VALUES
(1, NULL, NULL, 'N422D0_4I', 'Dynamika a riadenie procesov', '10'),
(2, NULL, NULL, 'N422I1_4I', 'Informačné technológie I', '11'),
(3, NULL, NULL, 'N422I3_4I', 'Informačné technológie II', '11'),
(4, NULL, NULL, '422I3_4I', 'Informatizácia a priemyselné informačné systémy II', '12'),
(5, NULL, NULL, 'N422L0_4B', 'Linux -- základná automatizácia', '11'),
(6, NULL, NULL, 'N422M1_4B', 'Modelovanie', '10'),
(7, NULL, NULL, 'N422M0_4I', 'Modelovanie v procesnom priemysle', '10'),
(8, NULL, NULL, 'N422O0_4I', 'Objektovo orientované programovanie', '12'),
(9, NULL, NULL, 'N422O2_4B', 'Operačné systémy', '13'),
(10, NULL, NULL, 'N422O3_4B', 'Optimalizácia', '12'),
(11, NULL, NULL, '422O1_4I', 'Optimalizácia procesov a výrob', '12'),
(12, NULL, NULL, 'N422P3_4I', 'Priemyselné riadiace systémy', '11'),
(13, NULL, NULL, 'N422P0_4I', 'Programovanie webových aplikácií', '12'),
(14, NULL, NULL, 'N422P1_4B', 'Projektovanie informatizačných a riadiacich systémov', '12');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `days_list`
--

CREATE TABLE `days_list` (
  `id` int(11) NOT NULL,
  `day_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `days_list`
--

INSERT INTO `days_list` (`id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `educ_role`
--

CREATE TABLE `educ_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `educ_role`
--

INSERT INTO `educ_role` (`role_id`, `role_name`) VALUES
(1, 'Teacher'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2021_04_12_153920_add_course_details', 3),
(12, '2014_10_12_000000_create_users_table', 4),
(13, '2014_10_12_100000_create_password_resets_table', 4),
(14, '2019_08_19_000000_create_failed_jobs_table', 4),
(15, '2021_04_05_183647_create_all_courses_table', 4),
(16, '2021_04_12_154656_add_course_details', 4),
(17, '2021_04_12_194705_create_teaching_activities_table', 5),
(20, '2021_04_21_120310_add_role_to_users_table', 8),
(21, '2021_04_21_204352_laratrust_setup_tables', 9),
(22, '2021_04_22_195412_add_terms_to_all_courses', 10),
(23, '2021_04_22_215324_add_logins_to_users_table', 11),
(25, '2021_05_02_215358_add_place_duration_to_teaching_activities', 12),
(26, '2021_05_09_191725_create_user_activities_pairings_table', 13),
(27, '2021_05_09_221404_create_activity_roles', 14),
(28, '2021_05_14_221335_create_educ_role', 15),
(29, '2021_05_14_222423_create_rooms', 16),
(30, '2021_05_14_224635_create_days_list', 17),
(31, '2021_05_15_164225_create_coursebases_table', 18),
(32, '2021_05_15_203928_add_teaching_weeks_to_teaching_activities', 19),
(33, '2021_05_15_205220_create_user_limitations', 20);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-04-21 19:01:52', '2021-04-21 19:01:52'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-04-21 19:01:52', '2021-04-21 19:01:52'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-04-21 19:01:52', '2021-04-21 19:01:52'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-04-21 19:01:52', '2021-04-21 19:01:52'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-04-21 19:01:52', '2021-04-21 19:01:52'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-04-21 19:01:52', '2021-04-21 19:01:52');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2021-04-21 19:01:52', '2021-04-21 19:01:52'),
(2, 'teacher', 'Teacher', 'Teacher', '2021-04-21 19:01:52', '2021-04-21 19:01:52'),
(3, 'student', 'Student', 'Student', '2021-04-21 19:01:52', '2021-04-21 19:01:52'),
(4, 'power', 'Power User', 'Power User', '2021-04-21 19:01:52', '2021-04-21 19:01:52');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 4, 'App\\Models\\User'),
(1, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User'),
(1, 7, 'App\\Models\\User'),
(2, 8, 'App\\Models\\User'),
(3, 9, 'App\\Models\\User'),
(2, 10, 'App\\Models\\User'),
(4, 11, 'App\\Models\\User'),
(2, 12, 'App\\Models\\User'),
(2, 13, 'App\\Models\\User'),
(2, 14, 'App\\Models\\User'),
(3, 15, 'App\\Models\\User'),
(3, 16, 'App\\Models\\User'),
(4, 17, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`) VALUES
(1, 'NB222'),
(2, 'NB247'),
(3, 'NB252'),
(4, 'NB606'),
(5, 'NB636'),
(6, 'NB637'),
(7, 'NB638'),
(8, 'NB639'),
(9, 'NB641'),
(10, 'NB693'),
(11, 'NB640'),
(12, 'NB1132');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `teaching_activities`
--

CREATE TABLE `teaching_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `students_group_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_allocation_is` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_time_allocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaching_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_online` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teaching_weeks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `teaching_activities`
--

INSERT INTO `teaching_activities` (`id`, `created_at`, `updated_at`, `course_id`, `activity_type`, `day`, `start_time`, `end_time`, `students_group_id`, `teacher`, `time_allocation_is`, `set_time_allocation`, `teaching_place`, `meeting_link`, `only_online`, `teaching_weeks`) VALUES
(1, NULL, '2021-05-16 12:16:02', '2', 'Lecture', 'Tuesday', 14, 17, NULL, '10', '3', '3', '5', NULL, NULL, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\"]'),
(2, NULL, '2021-05-04 05:53:56', '2', 'exercise', 'Monday', 7, 9, NULL, '11', '2', '2', NULL, NULL, NULL, NULL),
(4, NULL, NULL, '4', 'Lecture', 'Monday', 9, 11, NULL, '12', '', '', NULL, NULL, NULL, NULL),
(5, NULL, NULL, '4', 'Lecture', 'Tuesday', 9, 11, NULL, '12', '', '', NULL, NULL, NULL, NULL),
(10, '2021-05-04 09:08:33', '2021-05-04 09:08:33', '2', 'Exercise', 'Tuesday', 8, 10, NULL, '12', '2', '2', NULL, NULL, NULL, NULL),
(11, '2021-05-14 21:26:38', '2021-05-14 21:26:38', '3', 'Exercise', 'Friday', 8, 10, NULL, '12', '2', '2', NULL, NULL, NULL, NULL),
(12, '2021-05-15 22:55:51', '2021-05-15 22:55:51', '1', 'Exercise', 'Tuesday', 12, 15, NULL, '11', NULL, '3', NULL, NULL, NULL, NULL),
(13, '2021-05-15 23:08:13', '2021-05-15 23:08:13', '1', 'Exercise', 'Monday', 7, 9, NULL, '15', NULL, '2', NULL, NULL, NULL, NULL),
(14, '2021-05-16 12:54:25', '2021-05-16 13:02:26', '11', 'Lecture', 'Monday', 9, 11, NULL, '7', NULL, '2', '11', NULL, NULL, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\"]'),
(16, '2021-05-16 16:15:39', '2021-05-16 16:15:39', '12', 'Exercise', 'Tuesday', 10, 12, NULL, '10', NULL, '2', NULL, NULL, NULL, NULL),
(17, '2021-05-16 16:35:07', '2021-05-16 16:35:07', '11', 'Exercise', 'Monday', 10, 12, NULL, '10', NULL, '2', NULL, NULL, NULL, NULL),
(18, '2021-05-16 16:35:28', '2021-05-16 16:35:28', '13', 'Exercise', 'Friday', 14, 16, NULL, '10', NULL, '2', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`) VALUES
(7, 'admin', 'ad@min.com', NULL, '$2y$10$GZYMn1MajTcPICyv8ZGBkODIfadRxNIGaOVOJd0z5eZkfv.6Bg0qq', NULL, '2021-04-21 19:58:55', '2021-05-10 08:57:34', 'admin'),
(8, 'teacher', 'tea@cher.sk', NULL, '$2y$10$SO.i2GPz8sdng9DxdHnFDenWZaQz/rLEY.ZHjRAiAfQrYGUAE4mpm', NULL, '2021-04-21 20:00:00', '2021-04-21 20:00:00', 'teacher'),
(9, 'student', 'stu@dent.sk', NULL, '$2y$10$9jOrxAzQPdOu.N26KAnrQeNxxQKklJGLErYdbgl.QlhBvEnng4n9i', NULL, '2021-04-21 20:00:20', '2021-04-21 20:00:20', 'student'),
(10, 'Monika Bakosova', 'EE7GoaohbB@stuba.sk', NULL, '$2y$10$SDmWIpamNp74rI6znZ0JveufG0Vh7ypHA99UpmkT57yPEO/RSyl/2', NULL, NULL, NULL, '8ZQH7wcxyV'),
(11, 'Miroslav Fikar', 'OoONmh4NSt@stuba.sk', NULL, '$2y$10$dlTZyFpnjROcgiGN9hDp2.NvyN9BO97DHSRC3uskwy8zz5YAKIwDW', NULL, NULL, NULL, '4g8eWlMQc3'),
(12, 'Michal Kvasnica', 'QjAnEp66oY@stuba.sk', NULL, '$2y$10$NpW9MO76NafjNQarVdEiZezskzdji1HXz3v0tQj8u4eQtPWo1y/hi', NULL, NULL, NULL, 'iTGhqetx00'),
(13, 'Richard Valo', 'NydbgNtWBO@stuba.sk', NULL, '$2y$10$0v2tC.6uIveS4Td7o1cvA.vyIYLh4qRrZsfVAly3KSM0E7swEPf5K', NULL, NULL, NULL, 'tKnKU46z2h'),
(14, 'Anna Vasickaninova', '2OIFV8mxe3@stuba.sk', NULL, '$2y$10$HnvFshdcVdF96kVC9ZslpuoxSXkWbxrIEgZH/hYLeBX8fWhNOQM.a', NULL, NULL, NULL, 'kNkIAE1TVR'),
(15, 'Lubos Cirka', 'OMxMJw1hcq@stuba.sk', NULL, '$2y$10$FOXL/5gX3B/KHgzb96oFauzyuS8l/OTgzFt4vGhxz/QQ5qg/.sFf2', NULL, NULL, NULL, 'klpywMWeIq'),
(16, 'Juraj Oravec', 'nkuJxaOBzp@stuba.sk', NULL, '$2y$10$s48.tLgUoV5YsY.yAPskQe0YTz.BZnxVzNo7xGdWD711cYpRdl5J2', NULL, NULL, NULL, 'aVCJXPhTjd'),
(17, 'Daniel Ondra', 'xondra@stuba.sk', NULL, '$2y$10$eVEvifIUH3IGZW9tA9Ext.1lODbWgUz3Sy1bXQupwMmHpfUDKygpy', NULL, '2021-05-16 14:04:10', '2021-05-16 14:04:10', 'daniel');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user_activities_pairings`
--

CREATE TABLE `user_activities_pairings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `user_activities_pairings`
--

INSERT INTO `user_activities_pairings` (`id`, `created_at`, `updated_at`, `user_id`, `activity_id`, `activity_role`) VALUES
(25, NULL, NULL, '7', '14', '1'),
(27, NULL, NULL, '7', '16', '1'),
(28, NULL, NULL, '7', '18', '1'),
(29, NULL, NULL, '9', '14', '2'),
(30, NULL, NULL, '17', '14', '2');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user_limitations`
--

CREATE TABLE `user_limitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_monday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_tuesday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_wednesday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_thursday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_friday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `user_limitations`
--

INSERT INTO `user_limitations` (`id`, `created_at`, `updated_at`, `user_id`, `limit_monday`, `limit_tuesday`, `limit_wednesday`, `limit_thursday`, `limit_friday`) VALUES
(1, NULL, NULL, '10', '0020002111101', '0020002111101', '0020002111101', '0020002111101', '0020002111101'),
(2, NULL, NULL, '11', '1000210111001', '1000210111001', '1000210111001', '1000210111001', '1000210111001'),
(3, NULL, NULL, '7', '1100000000000', '1122200000000', '1100000000000', '1100000000000', '1100000000000'),
(4, NULL, NULL, '8', '0000000000000', '1000000000000', '2000000000000', '1000000000000', '0000000000000'),
(5, NULL, NULL, '17', '0000000000000', '2000000000000', '2000000000000', '2000000000000', '0000000000000');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `activity_roles`
--
ALTER TABLE `activity_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `all_courses`
--
ALTER TABLE `all_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `coursebases`
--
ALTER TABLE `coursebases`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexy pre tabuľku `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexy pre tabuľku `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexy pre tabuľku `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexy pre tabuľku `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexy pre tabuľku `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexy pre tabuľku `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexy pre tabuľku `teaching_activities`
--
ALTER TABLE `teaching_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexy pre tabuľku `user_activities_pairings`
--
ALTER TABLE `user_activities_pairings`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `user_limitations`
--
ALTER TABLE `user_limitations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `activity_roles`
--
ALTER TABLE `activity_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `all_courses`
--
ALTER TABLE `all_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pre tabuľku `coursebases`
--
ALTER TABLE `coursebases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pre tabuľku `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pre tabuľku `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pre tabuľku `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `teaching_activities`
--
ALTER TABLE `teaching_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pre tabuľku `user_activities_pairings`
--
ALTER TABLE `user_activities_pairings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pre tabuľku `user_limitations`
--
ALTER TABLE `user_limitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
