-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 14:06:49
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jobeet_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobeet_affiliate`
--

CREATE TABLE `jobeet_affiliate` (
  `id` bigint(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobeet_category`
--

CREATE TABLE `jobeet_category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jobeet_category`
--

INSERT INTO `jobeet_category` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(41, 'Design', '2024-06-10 04:02:20', '2024-06-10 04:02:20', 'design'),
(42, 'Programming', '2024-06-10 04:02:20', '2024-06-10 04:02:20', 'programming'),
(43, 'Manager', '2024-06-10 04:02:20', '2024-06-10 04:02:20', 'manager'),
(44, 'Administrator', '2024-06-10 04:02:20', '2024-06-10 04:02:20', 'administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobeet_category_affiliate`
--

CREATE TABLE `jobeet_category_affiliate` (
  `category_id` bigint(20) NOT NULL,
  `affiliate_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobeet_job`
--

CREATE TABLE `jobeet_job` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `how_to_apply` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 1,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jobeet_job`
--

INSERT INTO `jobeet_job` (`id`, `category_id`, `type`, `company`, `logo`, `url`, `position`, `location`, `description`, `how_to_apply`, `token`, `is_public`, `is_activated`, `email`, `expires_at`, `created_at`, `updated_at`) VALUES
(311, 42, NULL, 'Company 100', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_100.sit\n', 'job_100', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(312, 42, NULL, 'Company 101', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_101.sit\n', 'job_101', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(313, 42, NULL, 'Company 102', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_102.sit\n', 'job_102', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(314, 42, NULL, 'Company 103', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_103.sit\n', 'job_103', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(315, 42, NULL, 'Company 104', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_104.sit\n', 'job_104', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(316, 42, NULL, 'Company 105', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_105.sit\n', 'job_105', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(317, 42, NULL, 'Company 106', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_106.sit\n', 'job_106', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(318, 42, NULL, 'Company 107', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_107.sit\n', 'job_107', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(319, 42, NULL, 'Company 108', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_108.sit\n', 'job_108', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(320, 42, NULL, 'Company 109', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_109.sit\n', 'job_109', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(321, 42, NULL, 'Company 110', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_110.sit\n', 'job_110', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(322, 42, NULL, 'Company 111', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_111.sit\n', 'job_111', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(323, 42, NULL, 'Company 112', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_112.sit\n', 'job_112', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(324, 42, NULL, 'Company 113', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_113.sit\n', 'job_113', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(325, 42, NULL, 'Company 114', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_114.sit\n', 'job_114', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(326, 42, NULL, 'Company 115', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_115.sit\n', 'job_115', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(327, 42, NULL, 'Company 116', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_116.sit\n', 'job_116', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(328, 42, NULL, 'Company 117', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_117.sit\n', 'job_117', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(329, 42, NULL, 'Company 118', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_118.sit\n', 'job_118', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(330, 42, NULL, 'Company 119', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_119.sit\n', 'job_119', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(331, 42, NULL, 'Company 120', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_120.sit\n', 'job_120', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(332, 42, NULL, 'Company 121', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_121.sit\n', 'job_121', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(333, 42, NULL, 'Company 122', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_122.sit\n', 'job_122', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(334, 42, NULL, 'Company 123', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_123.sit\n', 'job_123', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(335, 42, NULL, 'Company 124', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_124.sit\n', 'job_124', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(336, 42, NULL, 'Company 125', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_125.sit\n', 'job_125', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(337, 42, NULL, 'Company 126', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_126.sit\n', 'job_126', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(338, 42, NULL, 'Company 127', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_127.sit\n', 'job_127', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(339, 42, NULL, 'Company 128', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_128.sit\n', 'job_128', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(340, 42, NULL, 'Company 129', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_129.sit\n', 'job_129', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20'),
(341, 42, NULL, 'Company 130', NULL, NULL, 'Web Developer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Send your resume to lorem.ipsum [at] company_130.sit\n', 'job_130', 1, 1, 'job@example.com', '2024-07-10 04:02:20', '2024-06-10 04:02:20', '2024-06-10 04:02:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jobeet_affiliate`
--
ALTER TABLE `jobeet_affiliate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `jobeet_category`
--
ALTER TABLE `jobeet_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobeet_category_sluggable_idx` (`slug`);

--
-- Indices de la tabla `jobeet_category_affiliate`
--
ALTER TABLE `jobeet_category_affiliate`
  ADD PRIMARY KEY (`category_id`,`affiliate_id`),
  ADD KEY `jobeet_category_affiliate_affiliate_id_jobeet_affiliate_id` (`affiliate_id`);

--
-- Indices de la tabla `jobeet_job`
--
ALTER TABLE `jobeet_job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `category_id_idx` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jobeet_affiliate`
--
ALTER TABLE `jobeet_affiliate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobeet_category`
--
ALTER TABLE `jobeet_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `jobeet_job`
--
ALTER TABLE `jobeet_job`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jobeet_category_affiliate`
--
ALTER TABLE `jobeet_category_affiliate`
  ADD CONSTRAINT `jobeet_category_affiliate_affiliate_id_jobeet_affiliate_id` FOREIGN KEY (`affiliate_id`) REFERENCES `jobeet_affiliate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobeet_category_affiliate_category_id_jobeet_category_id` FOREIGN KEY (`category_id`) REFERENCES `jobeet_category` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `jobeet_job`
--
ALTER TABLE `jobeet_job`
  ADD CONSTRAINT `jobeet_job_category_id_jobeet_category_id` FOREIGN KEY (`category_id`) REFERENCES `jobeet_category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
