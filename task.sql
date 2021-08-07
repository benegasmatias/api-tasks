-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2021 a las 19:53:34
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `task`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_08_06_175244_users', 1),
(2, '2021_08_06_175458_tasks', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$9Su5Gely6KVHEttiZgXBRu0ap4HWMuAK4hxjecJQJDj5oKJHvAX7u', '13YsGmVGcJ3VGv7e4kRuh9q1HM4skHIclrw0oJv7OGMkGoBIZJy9LTsRZYGr', '2021-08-07 17:40:02', '2021-08-07 17:40:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO `tasks` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (NULL, '11111', '111111', NULL, NULL), (NULL, '22222222222', '2222222', NULL, NULL), (NULL, '333333333333333', '333333333333333', NULL, NULL), (NULL, '444444444444444444', '444444444444444', NULL, NULL), (NULL, '5555555555555555555555', '555555555555555555', NULL, NULL), (NULL, '66666666666666666', '666666666666666666', NULL, NULL), (NULL, '7777777777777777777777', '777777777777777777777', NULL, NULL), (NULL, '88888888888888', '888888888888888', NULL, NULL), (NULL, '999999999999999999999999999', '99999999999999', NULL, NULL), (NULL, '0000000', '00000000000000000', NULL, NULL);INSERT INTO `tasks` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (NULL, '11111', '111111', NULL, NULL), (NULL, '22222222222', '2222222', NULL, NULL), (NULL, '333333333333333', '333333333333333', NULL, NULL), (NULL, '444444444444444444', '444444444444444', NULL, NULL), (NULL, '5555555555555555555555', '555555555555555555', NULL, NULL), (NULL, '66666666666666666', '666666666666666666', NULL, NULL), (NULL, '7777777777777777777777', '777777777777777777777', NULL, NULL), (NULL, '88888888888888', '888888888888888', NULL, NULL), (NULL, '999999999999999999999999999', '99999999999999', NULL, NULL);
