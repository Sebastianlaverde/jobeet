-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 06:10:03
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
-- Base de datos: `jobeet`
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
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jobeet_category`
--

INSERT INTO `jobeet_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Design', '2024-06-05 03:24:59', '2024-06-05 03:24:59'),
(2, 'Programming', '2024-06-05 03:24:59', '2024-06-05 03:24:59'),
(3, 'Manager', '2024-06-05 03:24:59', '2024-06-05 03:24:59'),
(4, 'Administrator', '2024-06-05 03:24:59', '2024-06-05 03:24:59');

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
(1, 2, 'full-time', 'Sensio Labs', 'sensio-labs.gif', 'http://www.sensiolabs.com/', 'Web Developer', 'Paris, France', 'You\'ve already developed websites with symfony and you want to work\nwith Open-Source technologies. You have a minimum of 3 years\nexperience in web development with PHP or Java and you wish to\nparticipate to development of Web 2.0 sites using the best\nframeworks available.\n', 'Send your resume to fabien.potencier [at] sensio.com\n', 'job_sensio_labs', 1, 1, 'job@example.com', '2008-10-10 00:00:00', '2024-06-05 03:24:59', '2024-06-05 03:24:59'),
(2, 1, 'part-time', 'Extreme Sensio', 'extreme-sensio.gif', 'http://www.extreme-sensio.com/', 'Web Designer', 'Paris, France', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do\neiusmod tempor incididunt ut labore et dolore magna aliqua. Ut\nenim ad minim veniam, quis nostrud exercitation ullamco laboris\nnisi ut aliquip ex ea commodo consequat. Duis aute irure dolor\nin reprehenderit in.\n\nVoluptate velit esse cillum dolore eu fugiat nulla pariatur.\nExcepteur sint occaecat cupidatat non proident, sunt in culpa\nqui officia deserunt mollit anim id est laborum.\n', 'Send your resume to fabien.potencier [at] sensio.com\n', 'job_extreme_sensio', 1, 1, 'job@example.com', '2008-10-10 00:00:00', '2024-06-05 03:24:59', '2024-06-05 03:24:59');

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
  ADD UNIQUE KEY `name` (`name`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jobeet_job`
--
ALTER TABLE `jobeet_job`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
