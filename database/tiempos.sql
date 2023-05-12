-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-04-2022 a las 18:50:47
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiempos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

DROP TABLE IF EXISTS `ciclos`;
CREATE TABLE IF NOT EXISTS `ciclos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `llave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `ingreso` time NOT NULL,
  `salida` time DEFAULT NULL,
  `breakin` time DEFAULT NULL,
  `breakout` time DEFAULT NULL,
  `timebreak` float DEFAULT NULL,
  `almuerzo` time DEFAULT NULL,
  `almuerzoout` time DEFAULT NULL,
  `timelunch` float DEFAULT NULL,
  `capacitacion` time DEFAULT NULL,
  `capout` time DEFAULT NULL,
  `timecap` float DEFAULT NULL,
  `pausas` time DEFAULT NULL,
  `pausasout` time DEFAULT NULL,
  `timepausas` float DEFAULT NULL,
  `daño` time DEFAULT NULL,
  `dañoout` time DEFAULT NULL,
  `timedaño` float DEFAULT NULL,
  `evaluacion` time DEFAULT NULL,
  `evaluacionout` time DEFAULT NULL,
  `timeeva` float DEFAULT NULL,
  `retro` time DEFAULT NULL,
  `retroout` time DEFAULT NULL,
  `timeretro` float DEFAULT NULL,
  `reunion` time DEFAULT NULL,
  `reunionout` time DEFAULT NULL,
  `timereunion` float DEFAULT NULL,
  `bano` time DEFAULT NULL,
  `banoout` time DEFAULT NULL,
  `timebano` int(11) DEFAULT NULL,
  `calamidad` time DEFAULT NULL,
  `calamidadout` time DEFAULT NULL,
  `timecalamidad` int(11) DEFAULT NULL,
  `EmeMedica` time DEFAULT NULL,
  `EmeMedicaout` time DEFAULT NULL,
  `timeEmeMedica` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hoy` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `llave` (`llave`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`id`, `llave`, `nombre`, `cedula`, `fecha`, `ingreso`, `salida`, `breakin`, `breakout`, `timebreak`, `almuerzo`, `almuerzoout`, `timelunch`, `capacitacion`, `capout`, `timecap`, `pausas`, `pausasout`, `timepausas`, `daño`, `dañoout`, `timedaño`, `evaluacion`, `evaluacionout`, `timeeva`, `retro`, `retroout`, `timeretro`, `reunion`, `reunionout`, `timereunion`, `bano`, `banoout`, `timebano`, `calamidad`, `calamidadout`, `timecalamidad`, `EmeMedica`, `EmeMedicaout`, `timeEmeMedica`, `total`, `created_at`, `updated_at`, `hoy`, `hora`) VALUES
(2, '876542132022-04-20', 'Super Admin', 87654213, '2022-04-20', '08:25:50', '13:49:00', '08:32:33', '08:34:52', 2, '08:46:03', '08:58:00', 0.2, '09:58:34', '10:25:16', 27, '11:07:15', '11:10:45', 3, '11:21:58', '11:28:35', 7, '11:40:01', '11:45:56', 5, '13:10:19', '13:13:24', 3, '13:31:03', '13:32:46', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5.2, '2022-04-20 13:25:50', '2022-04-20 18:49:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `1` int(11) NOT NULL,
  `2` int(11) NOT NULL,
  `3` int(11) NOT NULL,
  `4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_08_160649_add_username_to_users_table', 1),
(7, '2021_11_12_144742_create_permission_tables', 1),
(8, '2021_12_07_120807_create_transactions_tbl', 1),
(9, '2021_12_13_083556_update_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission_index', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(2, 'permission_create', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(3, 'permission_show', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(4, 'permission_edit', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(5, 'permission_destroy', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(6, 'role_index', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(7, 'role_create', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(8, 'role_show', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(9, 'role_edit', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(10, 'role_destroy', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(11, 'user_index', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(12, 'user_create', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(13, 'user_show', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(14, 'user_edit', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(15, 'user_destroy', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(16, 'post_index', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(17, 'post_create', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(18, 'post_show', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(19, 'post_edit', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(20, 'post_destroy', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(2, 'User', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cedula`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `username`, `last_login`) VALUES
(1, 'Super Admin', 'admin@admin.com', 87654213, NULL, '$2y$10$LrCZXWhGEBG4MXinE0qt8.DXHuCzMOa9YpcBkDRRUitKdOJ3KKOTO', NULL, NULL, 'Frr09bMH8s6Et064C5C1IgaJlSZLKjgEZj0bkrimQfhXYCKtUblTpu3kEV3C', '2021-12-20 19:45:37', '2022-04-20 18:27:33', 'Superadmin', '2022-04-20 13:27:33'),
(2, 'Jenna Gamble', 'dycyjyxire@mailinator.com', 321987132, NULL, '$2y$10$vKD2lIDzxzMlw6mQZesch.KUFeG0uAsIjU6NlUx3bUemuf3X2iWEi', NULL, NULL, NULL, '2021-12-20 20:20:22', '2022-01-12 21:23:54', 'kavykic', '2022-01-12 16:23:54'),
(242, 'Cielo Alexandra Osorio Gomez', 'wytejuhobo@mailinator.com', 1020762484, NULL, '$2y$10$Nf2CDTgA5an4txzmloRb9.GYMTLyR.BJ/.uSnFKobr9Hh6YxJrwoq', NULL, NULL, NULL, '2022-02-26 23:02:44', '2022-03-03 01:10:02', 'cosorio', '2022-03-02 15:10:02'),
(243, 'Stephany Juney Aparicio Ortiz', 'zeqe@mailinator.com', 1091811675, NULL, '$2y$10$T8gPv.tdEDJ6E3ifwcMT8OEeSMDy5njJ4UgsIjGbP1ELilkkQS2XG', NULL, NULL, NULL, '2022-02-26 23:04:00', '2022-03-23 21:25:39', 'saparicio', '2022-03-23 11:25:39'),
(244, 'Jeisson Centeno Preciado', 'pide@mailinator.com', 1020767921, NULL, '$2y$10$126rsxhRp93kAAqrgFfp3u3Ett/BWmSTYQFsoqbPd1Rgwf9qQvr/S', NULL, NULL, NULL, '2022-02-26 23:04:45', '2022-03-15 00:07:52', 'jcenteno', '2022-03-14 14:07:52'),
(245, 'Michelle Stephanny Villamil Semanate', 'lypypiriq@mailinator.com', 1000161044, NULL, '$2y$10$wJFNCMRXuzamPN9C6C5Xkemtuo6E/C0.OCXiA1TnKS4lUje986mSO', NULL, NULL, NULL, '2022-02-26 23:05:35', '2022-03-23 22:47:47', 'mvillamil', '2022-03-23 12:47:47'),
(246, 'Lady Laura Ruiz Merchan', 'musoqac@mailinator.com', 1000596109, NULL, '$2y$10$d9sMC1HRokF61cnV/fhY4OiXaW9rJnqpKOEng0M6jvrmZfC01oNtO', NULL, NULL, NULL, '2022-02-26 23:06:19', '2022-03-20 01:02:00', 'lruiz', '2022-03-19 15:02:00'),
(247, 'Nicolas Alexander Martinez Guerrero', 'tuxamyseso@mailinator.com', 1000135589, NULL, '$2y$10$bfATnCeOwhPf8gugchqYput.wUtWlzA5oboT/iY7bkEEhdfJGsOfO', NULL, NULL, NULL, '2022-02-26 23:07:28', '2022-03-23 20:31:59', 'nmartinez', '2022-03-23 10:31:59'),
(248, 'Carol Ximena Umbarila Saenz', 'viki@mailinator.com', 1014247018, NULL, '$2y$10$pnk24Bb7L3bp74tLQRknZeKdtkATig9iMnth3hUXpNnBLahbYfNIC', NULL, NULL, NULL, '2022-02-26 23:08:56', '2022-03-24 01:11:08', 'cumbarila', '2022-03-23 15:11:08'),
(249, 'Jose Cristian Soto Jimenez', 'veguwig@mailinator.com', 1001066958, NULL, '$2y$10$mDXfaBCQTCo0a6Dwa/WmDep2lE/s7khGfLSYnf9VCjvP.ZWpgbtpW', NULL, NULL, NULL, '2022-02-26 23:09:29', '2022-03-23 22:15:50', 'jsoto', '2022-03-23 12:15:50'),
(250, 'Oscar David Gomez Prieto', 'pudibafum@mailinator.com', 1027520985, NULL, '$2y$10$sf.6AIfhJ2h4TVzCOuzweeTvpeUR7arXuwkFITxNIJMS25IEg./om', NULL, NULL, NULL, '2022-02-26 23:10:27', '2022-03-24 00:41:05', 'ogomez', '2022-03-23 14:41:05'),
(251, 'Pabla Andrea Murcia Palacios', 'kylo@mailinator.com', 1110234813, NULL, '$2y$10$4k51EpsqCBz3MpnVHOGNM.R1PeA98cmjymQ8n4nwL0uBD4ZHK.CXy', NULL, NULL, NULL, '2022-02-26 23:11:58', '2022-03-22 21:26:28', 'pmurcia', '2022-03-22 11:26:28'),
(252, 'Brayan Stiven Barrera Acevedo', 'maid@mail.com', 1014310319, NULL, '$2y$10$7zB9fPgRtxifC/As4Bd3r.4JRvKtlwP7Qp6ELcuk2OxgJY4y5X.wG', NULL, NULL, NULL, '2022-02-26 23:12:50', '2022-03-24 00:55:00', 'bbarrera', '2022-03-23 14:55:00'),
(253, 'Maria Fernanda Marquez Marquez', 'sor@mailinator.com', 1065823947, NULL, '$2y$10$QGX/bZfGuJgOcKzityAHhuLRgYnEU3nTl0dNEE5wcMrBFpgAG8qsa', NULL, NULL, NULL, '2022-02-26 23:13:58', '2022-03-24 00:14:41', 'mmarquez', '2022-03-23 14:14:41'),
(254, 'Greydis Calderon Vasquez', 'tumona@mailinator.com', 40305253, NULL, '$2y$10$bL7MS3d1XW66T9EWRG6fBubdg7Cxfx6fdgqL9RABGJXKYeO7.HCrG', NULL, NULL, NULL, '2022-02-26 23:14:50', '2022-03-02 19:24:13', 'gcalderon', '2022-03-02 09:24:13'),
(255, 'Luisa Fernanda Franco Espinosa', 'hico@mailinator.com', 1003765397, NULL, '$2y$10$PnyPo7/D0k.EiaEzAnY.yuuSilAfCrLYbdV.szQeMr4l/ep.obqp.', NULL, NULL, NULL, '2022-02-26 23:15:31', '2022-03-23 22:27:47', 'lfranco', '2022-03-23 12:27:47'),
(256, 'Juana Sofia Vargas Lopez', 'riluw@mailinator.com', 1000018205, NULL, '$2y$10$j1/HZ2cWYS/nzhlpUVbcDeIjBzclzpZ899lPr51xIK0JV9TaN644G', NULL, NULL, NULL, '2022-02-26 23:16:16', '2022-03-24 00:45:38', 'jvargas', '2022-03-23 14:45:38'),
(257, 'Cristian Camilo Moreno Reyes', 'tuqa@mailinator.com', 1000062335, NULL, '$2y$10$IF4C0dAtyef7yya7/F.OZOd8xuJjvt2VkmracNp.nbiWY617dFJgi', NULL, NULL, NULL, '2022-02-26 23:17:19', '2022-03-23 21:01:47', 'cmoreno', '2022-03-23 11:01:47'),
(258, 'Nicole Adriana Rivera Paiva', 'cuci@mailinator.com', 1012385099, NULL, '$2y$10$6Cv1SOFLyRCRhHw/hrE6TeCLq6qeBxCOuQH4X8HaZma5hArbY2Z36', NULL, NULL, NULL, '2022-02-26 23:18:37', '2022-03-24 02:02:38', 'nrivera', '2022-03-23 16:02:38'),
(259, 'Karen Liseth Londoño Guzman', 'go@mail.com', 1117484459, NULL, '$2y$10$990KgB1jVWUcD1Dcsc.Na.npfyQcalcMVCbrE4URpQbNSRmdRdRV.', NULL, NULL, NULL, '2022-02-26 23:19:47', '2022-03-23 18:36:40', 'klondoño', '2022-03-23 08:36:40'),
(260, 'Juan Sebastian Salcedo Moyano', 'correo@correo.co', 1001317065, NULL, '$2y$10$vSQQMeKVuSN8PPEtFlocROt8I1vR3v.xvgJlF7RkWxlpPg.V6mubW', NULL, NULL, NULL, '2022-02-26 23:20:51', '2022-03-23 00:10:01', 'jsalcedo', '2022-03-22 14:10:01'),
(261, 'Cristian Steven Pinzón Cadena', 'jdfds@mailinator.com', 1000787729, NULL, '$2y$10$j8mdXOmmuDFaI9vjdEyVx.EbYKFj3GwR2DTuf/JygWwCewKCD3eRO', NULL, NULL, NULL, '2022-02-26 23:21:53', '2022-03-24 00:34:17', 'cpinzon', '2022-03-23 14:34:17'),
(262, 'Shirley Yohana Serrano Gonzalez', 'maill@mail.co', 1122402451, NULL, '$2y$10$07WmCJjViKeRkCPQl98iEupyKbP9gvVaQElSFalQn7wfMqhioK/qG', NULL, NULL, NULL, '2022-02-26 23:22:38', '2022-03-24 00:09:34', 'sserrano', '2022-03-23 14:09:34'),
(263, 'Darly Dayana Lopez Moreno', 'mai@mail.yahoo', 1023972372, NULL, '$2y$10$zn4PpHpOEWM3tF/au4bnperOt7dt5705E5Wq3oSGuNX4.Xx1HPO3C', NULL, NULL, NULL, '2022-02-26 23:23:35', '2022-03-11 03:03:20', 'dlopez', '2022-03-10 17:03:20'),
(264, 'Omar Oswaldo Assias Perez', 'oassias@mail.com', 1064983811, NULL, '$2y$10$nn/NuB3mVRt5rUYB2pv5uOsScFnGMmB9CZ0lk/cwOpQ753BF8sDui', NULL, NULL, NULL, '2022-02-26 23:24:23', '2022-03-23 01:17:23', 'oassias', '2022-03-22 15:17:23'),
(265, 'Nancy Garzon Rios', 'correos@correo.es', 52819592, NULL, '$2y$10$wH0DwIq6aguFGHGRtnTsouOLGzQ2qhgz3lT6nlZ0ulWGQS7AF/m5C', NULL, NULL, NULL, '2022-02-26 23:25:03', '2022-03-23 21:37:46', 'ngarzon', '2022-03-23 11:37:46'),
(266, 'Johan Steven Puentes Vasquez', 'jp@mail.com', 1030675542, NULL, '$2y$10$3iCHZ7QMGcDj9bS5pTxOrOaMFtqSU7i8Zvv0FXuVKONJ7yM0nVk2O', NULL, NULL, NULL, '2022-02-26 23:25:45', '2022-03-09 22:55:18', 'jpuentes', '2022-03-09 12:55:18'),
(267, 'Pedro Antonio Rodriguez Lopez', 'pr@mail.com', 1023947353, NULL, '$2y$10$D6KhDYOwVZauQebX2Wiip.qo8lDnuIXwGr6pZmu1hMdyfgmde0MLO', NULL, NULL, NULL, '2022-02-26 23:27:22', '2022-03-24 01:19:29', 'parodriguez', '2022-03-23 15:19:29'),
(268, 'Diana Carolina rodriguez rojas', 'dr@mail.es', 1032465535, NULL, '$2y$10$ThDrxWRQ/PeRDF0UPev.1O8lFbeMsNVhIvBEzRAFwg4d4KQ0QGIQS', NULL, NULL, NULL, '2022-02-26 23:28:05', '2022-03-23 20:45:19', 'drodriguez', '2022-03-23 10:45:19'),
(269, 'Otilio Alfonso Gutiérrez morales', 'ogutierrez@mentius.com.co', 1014272023, NULL, '$2y$10$ogBvcj7SB0Yf04oAJpj5HuLmARz.wXbCOz24vM.JhQVLAi9JzuvfK', NULL, NULL, NULL, '2022-03-02 19:15:06', '2022-03-23 22:39:24', 'ogutierrez', '2022-03-23 12:39:24'),
(270, 'David Armando Diaz Huertas', 'ddiaz@mentius.com.cp', 1014211939, NULL, '$2y$10$BrIzxMlhh9aYJqPz91Mp2O7v7SUJrs073.alPCjQXwo3yvAyBaSXi', NULL, NULL, NULL, '2022-03-04 18:55:36', '2022-03-23 22:12:11', 'ddiaz', '2022-03-23 12:12:11'),
(271, 'Luis Gómez Castro', 'lcastro@mentius.com.co', 79630121, NULL, '$2y$10$56t4xiS1gkFyKr4adDUFGusitt01XERcUFBhRMIeQkgkQ5rQY.C7i', NULL, NULL, NULL, '2022-03-04 18:56:07', '2022-03-24 00:31:42', 'lcastro', '2022-03-23 14:31:42'),
(272, 'Miguel Tocora', 'mtocora@mentius.com.co', 1032380487, NULL, '$2y$10$.iq1wxPb1d6/jSFzc738KOJ6Poc/dZkkCteBbK9n4Jx7WSDKwm7vK', NULL, NULL, NULL, '2022-03-04 19:42:20', '2022-03-23 21:48:58', 'mtocora', '2022-03-23 16:48:58'),
(273, 'Angel David Morales Benavide', 'claro31@mentius.com.co', 1001274806, NULL, '$2y$10$FZoVXY7FKhcg3fRQIpkyPOWZr3q0HXidFg9AeUbsVZwGH6mKa.7eC', NULL, NULL, NULL, '2022-03-07 22:51:33', '2022-03-23 03:29:07', 'amoralesb', '2022-03-22 17:29:07'),
(274, 'Gina Daniela Galindo Garzon', 'ggaindo@mentius.com.co', 1023926823, NULL, '$2y$10$OR8ftyAnK1ee4yAVUZkLTO.iBSSoBpb6gkqs8G3ye5/mus7aDY.5G', NULL, NULL, NULL, '2022-03-09 01:57:36', '2022-03-24 00:22:33', 'ggalindo', '2022-03-23 14:22:33'),
(275, 'Tatiana Velasquez Chaparro', 'tvelasquez@mentius.com.co', 1022415731, NULL, '$2y$10$9uv6AnmKu3lKvFefOmXKhuK7jabpoNtXWvCW7GwxO7VFqrLcqWAmK', NULL, NULL, NULL, '2022-03-09 01:58:39', '2022-03-24 00:34:01', 'tvelasquez', '2022-03-23 14:34:01'),
(276, 'James Leonardo Tuta Contreras', 'jtuta@mentius.com.co', 1023918435, NULL, '$2y$10$a5USk0sL5Ewg2Dlfzf1WTO9kkkfsJONsLuxIwkWLx2n9oMNauDRj2', NULL, NULL, NULL, '2022-03-09 19:59:18', '2022-03-23 21:58:46', 'jtuta', '2022-03-23 11:58:46'),
(277, 'Luis Eduardo Casallas Castañeda', 'lcasallasa@mentiusclaro.com', 80117834, NULL, '$2y$10$ziBa1lBWRPljeYDmkjAOXOPZisFy/ZxUrCUuCV5YzEj2RZiMj1s/2', NULL, NULL, NULL, '2022-03-11 19:19:25', '2022-03-24 00:02:47', 'lcasallas', '2022-03-23 14:02:47'),
(278, 'Didier Felipe Rodríguez Buitrago', 'drodriguezba@mentiusclaro.com', 1000379632, NULL, '$2y$10$bUfUw5.Zs4oTGZM1qvpFiO.u5mQ8ZoWgoM3nRM2IBusN/Cip7RUW.', NULL, NULL, NULL, '2022-03-11 19:20:06', '2022-03-11 20:26:47', 'drodriguezb', '2022-03-11 10:26:47'),
(279, 'Sofia Méndez Flores', 'smendezfa@mentiusclaro.com', 1000065633, NULL, '$2y$10$y.msv8JYBcYathxu7xgad.jbeMnl.glI7.m4fazJWjKPjB2e10XfW', NULL, NULL, NULL, '2022-03-11 19:20:42', '2022-03-18 01:54:20', 'smendezf', '2022-03-17 15:54:20'),
(280, 'Alhenis Yuliana Valbuena Benítez', 'avalbuenaa@mentiusclaro.com', 1000695594, NULL, '$2y$10$sYPsx0/f.0t0RgFRO2AOs.vgqd4jbkaDXStvTKDS38UbCdPhwwJei', NULL, NULL, NULL, '2022-03-11 19:21:05', '2022-03-24 00:19:58', 'avalbuena', '2022-03-23 14:19:58'),
(281, 'Diana Marcela Celis Triana', 'dcelista@mentiusclaro.com', 53061028, NULL, '$2y$10$56WfHf8XKn7Gj2P/jiDqY.MoolXEkRrdi4XGV6lFJwbI6XtL8Nu7u', NULL, NULL, NULL, '2022-03-11 19:21:27', '2022-03-20 00:32:06', 'dcelist', '2022-03-19 14:32:06'),
(282, 'Lizeth Dayana Beltrán Mendieta', 'lbeltranma@mentiusclaro.com', 1025520162, NULL, '$2y$10$sKacJGt1TzevU6UlA96RqeJ7Frgh3BgNrj1KNeuCp2aqJw2rE93LC', NULL, NULL, NULL, '2022-03-11 19:21:49', '2022-03-24 00:14:02', 'lbeltranm', '2022-03-23 14:14:02'),
(283, 'Daniel Alfonso Cantor Guzmán', 'dcantorga@mentiusclaro.com', 1073715266, NULL, '$2y$10$cOXSQ1Plqdc1OLgxXfS9vu2SQ0tlm8M9RCF9a5/y5CpzKVZXnfrMm', NULL, NULL, NULL, '2022-03-11 19:22:13', '2022-03-24 00:56:44', 'dcantorg', '2022-03-23 14:56:44'),
(284, 'Chadia Carolina Ruiz Arrieta', 'cruizaa@mentiusclaro.com', 1082373416, NULL, '$2y$10$P.RWLEse2Lt2WZHXAkg/AO1kYLNBxuMrPRPep5OFBMPutgjG7Cow2', NULL, NULL, NULL, '2022-03-11 19:22:34', '2022-03-24 00:52:04', 'cruiza', '2022-03-23 14:52:04'),
(285, 'Manuel Fernando Martinez Leal', 'mmartinezla@mentiusclaro.com', 1032400205, NULL, '$2y$10$JStM1LN7UBoHhJk5eJXkvOG6WvYFYKCjkfLVMnXHarb1vICZlm2xa', NULL, NULL, NULL, '2022-03-11 19:22:56', '2022-03-24 00:39:16', 'mmartinezl', '2022-03-23 14:39:16'),
(286, 'Sonia Edith Gama Rodríguez', 'sgamara@mentiusclaro.com', 1001062872, NULL, '$2y$10$f1iOiCcsN.ro5YjpEAUFWOBEJ27HbMgVKd91tzxUhLcD2jq5q.AzO', NULL, NULL, NULL, '2022-03-11 19:23:18', '2022-03-23 22:39:41', 'sgamar', '2022-03-23 12:39:41'),
(287, 'Diego Andres Cortes Rojas', 'dcortesra@mentiusclaro.com', 1000492906, NULL, '$2y$10$7elyLlVQ6HVbaiCJdFg/VeIU/HRKXDML1j3KgQwpXbGYJse.Eo0Ae', NULL, NULL, NULL, '2022-03-11 19:23:47', '2022-03-24 01:43:13', 'dcortesr', '2022-03-23 15:43:13'),
(288, 'Néstor Eduardo Novoa Bravo', 'nnovoaba@mentiusclaro.com', 1057690770, NULL, '$2y$10$G3qjyq7l52n9Kpd5k/w70uHhzbxJ7Ln6s6grtFsWvApiO3oYsZpiK', NULL, NULL, NULL, '2022-03-11 19:24:10', '2022-03-22 18:00:45', 'nnovoab', '2022-03-22 08:00:45'),
(289, 'Caren Dayana Ospina Lasso', 'cospinala@mentiusclaro.com', 1072716609, NULL, '$2y$10$M8bxxegeu1xNoQIxg6rRB.lMsVBbqp2vNvf0pUHmWQdfs1MfL6X5O', NULL, NULL, NULL, '2022-03-11 19:24:29', '2022-03-24 00:31:25', 'cospinal', '2022-03-23 14:31:25'),
(290, 'Angie Jullieth Leguizamon Rodríguez', 'aleguizamonra@mentiusclaro.com', 1023929912, NULL, '$2y$10$ilxn8kUw3FwXBb7B6Qqn1enHkjYO5Sfi6Kw29uD.TkJ6f/cfC0QiS', NULL, NULL, NULL, '2022-03-11 19:24:48', '2022-03-24 00:10:06', 'aleguizamonr', '2022-03-23 14:10:06'),
(291, 'Diana Liseth Oliveros Espinosa', 'doliverosea@mentiusclaro.com', 1077870269, NULL, '$2y$10$kmIP5NvKJpE4ZIMKMo6Y8uohLlkhuHrmAJPCpeSXWRaWhvKD1QB5K', NULL, NULL, NULL, '2022-03-11 19:25:08', '2022-03-23 20:20:08', 'doliverose', '2022-03-23 10:20:08'),
(292, 'Carlos Alberto Morales Berdugo', 'cmoralesba@mentiusclaro.com', 1018477954, NULL, '$2y$10$5nBjoc2Sk08uKJBTVsuk4OMfLlTVqselYGBEXuwqX3orYMeyVFk8q', NULL, NULL, NULL, '2022-03-11 19:25:26', '2022-03-24 01:53:38', 'cmoralesb', '2022-03-23 15:53:38'),
(293, 'Nicolas Puentes Tapia', 'npuentesta@mentiusclaro.com', 1016094598, NULL, '$2y$10$vUptbzEXwqFupSNjTqbgDeyRyZGAOFsru6SR4sPKlXNT.txffms8e', NULL, NULL, NULL, '2022-03-11 19:25:49', '2022-03-11 19:25:49', 'npuentest', NULL),
(294, 'Johan Steven Torres Luna', 'jtorresla@mentiusclaro.com', 1003764496, NULL, '$2y$10$it6KL9gyIPjVoidLrE0EguWAOdvgsi.2BDqEIK8hKCxc0RzZX9Y..', NULL, NULL, NULL, '2022-03-11 19:26:09', '2022-03-24 01:20:22', 'jtorresl', '2022-03-23 15:20:22'),
(295, 'Karolina Alejandra Yepes Pacheco', 'kyepespa@mentiusclaro.com', 1002491139, NULL, '$2y$10$yyZnuLRrAXu2d3bg8tP4revuWMqGk6FH7kB2heviHgz1oYBcBmE4y', NULL, NULL, NULL, '2022-03-11 19:26:33', '2022-03-23 19:40:09', 'kyepesp', '2022-03-23 09:40:09'),
(296, 'Matthew Junio Nrialike Cardona', 'mnrialikea@mentiusclaro.com', 1000463263, NULL, '$2y$10$yutBjywf5CMWUn.HAmJdmOCNSAmaOsKp5X2gT/k/mipn15Zq0VjNC', NULL, NULL, NULL, '2022-03-11 19:26:52', '2022-03-19 20:21:16', 'mnrialike', '2022-03-19 10:21:16'),
(297, 'Eider Peralta González', 'eperaltaga@mentiusclaro.com', 1042822076, NULL, '$2y$10$XnjoWUFr8E5r.1XZYfwDju0.X7rvhALQsHw4eSg9Rb8CF2nDzEOqu', NULL, NULL, NULL, '2022-03-11 19:27:12', '2022-03-24 01:37:29', 'eperaltag', '2022-03-23 15:37:29'),
(298, 'Andres Felipe Ramírez Ali', 'aramirezaa@mentiusclaro.com', 1000938348, NULL, '$2y$10$Sx3Iphdk9bYDZv27pd0VkOfZQb0lH6apUnq1CUbBSDtjId5iIEWOS', NULL, NULL, NULL, '2022-03-11 19:27:33', '2022-03-24 00:52:30', 'aramireza', '2022-03-23 14:52:30'),
(299, 'Laura Daniela Rodriguez Camacho', 'lrodriguezc@mentius.com.co', 1016106051, NULL, '$2y$10$sgdRWg0wl34Ntk8d/Czvduws/b7PK1qe2TsPCaDppUjEYVoibDPJO', NULL, NULL, NULL, '2022-03-16 23:10:22', '2022-03-24 00:06:29', 'lrodriguezc', '2022-03-23 14:06:29'),
(300, 'Santiago Ladino Ballen', 'sladino@mentius.com.co', 1019148616, NULL, '$2y$10$xoR4RZ3j9d9.T.J2kk0WK.hKzJju4AqixbknwfqhepVDK1v/xqzX6', NULL, NULL, NULL, '2022-03-16 23:10:51', '2022-03-24 00:03:40', 'sladino', '2022-03-23 14:03:40'),
(301, 'Jhon Mario Moreno Ruiz', 'jmoreno@mentius.com.co', 1023004695, NULL, '$2y$10$7VjpbQuE3bbMRM5uaGZQPOftsFmHwDyW/ISd7saayK6s1/0Os6MKO', NULL, NULL, NULL, '2022-03-23 21:54:12', '2022-03-23 22:12:47', 'jmoreno', '2022-03-23 17:12:47'),
(302, 'Ingrid Combita Pulido', 'mail@mail.com', 1010189873, NULL, '$2y$10$QAqhIwMUoVqWvlNfrBEcgOq4YKxFP1MUnNHOzkIcUeFPIkGnACgQi', NULL, NULL, NULL, '2022-03-24 14:12:36', '2022-03-24 14:12:36', 'EC6676S', NULL),
(303, 'Edgard Hernandez Hernandez', '1claro@claro.com', 1024595603, NULL, '$2y$10$AD32QjWijV.ndw7kpI5J.u/u5nw.OzfTLubUST6nUND0yRqodZws.', NULL, NULL, NULL, '2022-03-24 14:13:14', '2022-03-24 14:13:14', 'EC5603K', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
