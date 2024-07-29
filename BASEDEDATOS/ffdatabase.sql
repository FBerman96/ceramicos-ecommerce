-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2024 a las 03:44:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ffdatabase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('fernando.faour@hotmail.com|127.0.0.1', 'i:3;', 1722040920),
('fernando.faour@hotmail.com|127.0.0.1:timer', 'i:1722040920;', 1722040920),
('fernandofaour@lex-doctor.com|127.0.0.1', 'i:1;', 1722040896),
('fernandofaour@lex-doctor.com|127.0.0.1:timer', 'i:1722040896;', 1722040896);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, '2024-07-26 21:41:39', '2024-07-26 21:41:39'),
(3, 2, 2, 1, '2024-07-26 21:41:58', '2024-07-26 21:41:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_23_024040_create_products_table', 1),
(5, '2024_07_23_170851_create_cart_items_table', 1),
(6, '2024_07_24_231845_add_is_admin_to_users_table', 1),
(7, '2024_07_26_002150_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tazas Artesanales Marrón Barro', 'Sumérgete en la calidez de lo hecho a mano con nuestras tazas de color marrón barro. Cada pieza, elaborada con esmero, ofrece una textura única y un acabado rústico que realza la esencia del arte cerámico. Perfectas para disfrutar de tus bebidas favoritas, estas tazas combinan funcionalidad con un estilo acogedor y natural.', 19.99, 'storage/images/ceramica-1.jpg', '2024-07-26 04:02:36', '2024-07-26 04:02:36'),
(2, 'Vasija Otomana Iznik', 'Vasija otomana del siglo XV, decorada con intrincados patrones en azul oscuro, celeste y blanco. Esta pieza, característica del estilo Iznik, presenta un diseño floral y geométrico meticulosamente pintado sobre un fondo de azul profundo. Con su elegante forma y detalles refinados, la vasija refleja la sofisticación y el arte de la cerámica otomana de la época.', 79.99, 'http://127.0.0.1:8000/storage/images/vasija_iznik.jpg', '2024-07-26 04:12:05', '2024-07-26 21:53:24'),
(3, 'Vasija china dinastia ming', 'Vasija de la dinastía Ming con un elegante dragón azul pintado sobre un fondo blanco. El diseño destaca por su contraste llamativo y la majestuosidad del dragón, un símbolo de poder y fortuna en la cerámica Ming.', 89.99, 'http://127.0.0.1:8000/storage/images/vasija_china.jpg', '2024-07-26 04:25:17', '2024-07-26 21:54:41'),
(4, 'Vasija Griega', 'Vasija griega antigua, con una elegante forma y decorada con intrincados motivos geométricos o escenas mitológicas en tonos oscuros sobre un fondo terracota. Esta pieza refleja la sofisticación y el arte clásico de la cerámica griega.', 69.99, 'http://127.0.0.1:8000/storage/images/vasija_griega.jpg', '2024-07-26 04:36:56', '2024-07-26 21:55:52'),
(5, 'Vasija Griega', 'Vasija griega antigua con forma clásica y adornos detallados en negro sobre un fondo naranja oscuro. Su diseño, que puede incluir figuras geométricas o escenas de la mitología, resalta la artesanía y el estilo distintivo de la cerámica de la antigua Grecia.', 79.99, 'http://127.0.0.1:8000/storage/images/vasija_griega2.jpg\r\n', '2024-07-26 04:38:57', '2024-07-26 21:55:58'),
(6, 'Vasija Griega', 'Vasija griega antigua con un fondo amarillo vibrante decorado con detalles en negro. El diseño, que puede incluir patrones geométricos o figuras mitológicas, muestra la elegancia y la destreza de la cerámica clásica griega.', 89.99, 'http://127.0.0.1:8000/storage/images/vasija_griega3.jpg\r\n', '2024-07-26 04:40:09', '2024-07-26 21:56:16'),
(7, 'Taza', 'Taza con forma de jarra de cerveza, en tonos y colores claros. Su diseño combina una elegante forma cilíndrica con un acabado suave y brillante, ideal para una apariencia fresca y estilizada.', 39.99, 'storage/images/taza5.jpg', '2024-07-26 04:42:02', '2024-07-26 04:42:02'),
(8, 'Plato ceramica americana', 'Plato de cerámica blanca con un dibujo de un sol amarillo en el centro, acompañado de detalles adicionales en colores complementarios. Su diseño alegre y sencillo agrega un toque luminoso a cualquier mesa.', 29.99, 'storage/images/plato-ceramico1.jpg', '2024-07-26 04:51:05', '2024-07-26 04:51:05'),
(9, 'Jarra de ceramica Iznik Otomana', 'De mediados del Siglo XVI, con forma de balaustre que se eleva desde el pie corto y ligeramente extendido hasta el cuello cónico con boca evertida y pico en forma, mango simple que va desde la boca hasta el cuerpo, el fondo blanco decorado en azul cobalto, rojo bolo, verde y negro con filas de veleros con velas azules rayadas, alrededor de ellas motivos de olas estilizados rojos y verdes y círculos azules, alrededor del cuello un collar de motivos en forma de S y lóbulos azules, alrededor del pie una banda turquesa menor sobre un diseño de correas triangulares, el mango con una serie de rayas negras horizontales y dos líneas de cobalto, reparaciones al pie, restauración menor a la boca, esmalte ligeramente mate de 9 7/8 pulgadas. (25cm.) de altura', 89.99, 'http://127.0.0.1:8000/storage/images/vasija_iznik2.jpg', '2024-07-26 22:08:40', '2024-07-26 22:08:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ULzQfPXxzInVhGBGS49yXB4x3iPjR7Gd9nphvY1k', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieTNZWGNzVk5UVVpRbjNXRVY2a1BxR3BPY25VakNpNFJ1N3RZYVlaUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzIyMDQ0NjE2O319', 1722044626);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Fernando Emir Faour Berman', 'fernando.faour@hotmail.com', NULL, '$2y$12$Z8LCT3AJkCzYUdCXi/ZrVOOqKxz.Wp8suPZvxOwOmF56TOAa5e9Ou', '24QSCwXM6Eecs5inohj1bFfvolgYKvYD7OhddyN34EV4OoeeToWopk26c98V', '2024-07-26 03:27:59', '2024-07-26 03:27:59', 1),
(2, 'Fernando Emir Faour', 'fernando.faour@davinci.edu.ar', NULL, '$2y$12$r8npDvSSxHeOVUK0i89tuelIVlx.qqL1frl2ehSGTN9AkGhXp3BFS', NULL, '2024-07-26 05:08:10', '2024-07-27 00:31:49', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
