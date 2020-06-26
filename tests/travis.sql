# Create Testuser
CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON *.* TO 'dev'@'localhost';
# Create DB
CREATE DATABASE IF NOT EXISTS `supplier` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `supplier`;

# CREATE TABLES

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `adrress` varchar(500)  NOT NULL,
  `id_country` int(10) UNSIGNED NOT NULL,
  `id_state` int(10) UNSIGNED NOT NULL,
  `neigborhood` varchar(100)   NOT NULL,
  `postal_code` varchar(10)   NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci;


INSERT INTO `addresses` (`id`, `id_user`, `adrress`, `id_country`, `id_state`, `neigborhood`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Avenida Juarez', 1, 1, 'Colonia san angel', '67890', NULL, '2020-04-18 01:00:00');


CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(100)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci;


INSERT INTO `categories` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SUPERMERCADO', NULL, NULL);



CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(100)   NOT NULL,
  `code` varchar(20)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci;


INSERT INTO `countries` (`id`, `description`, `code`, `created_at`, `updated_at`) VALUES
(1, 'MEXICO', 'MX', NULL, NULL);


CREATE TABLE `sub__categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idCategory` int(10) UNSIGNED NOT NULL,
  `description` varchar(100)   NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci;


INSERT INTO `sub__categories` (`id`, `idCategory`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'CARNES', NULL, NULL);



CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50)  DEFAULT NULL,
  `rfc` varchar(13)  DEFAULT NULL,
  `phoneH` varchar(10)  DEFAULT NULL,
  `phoneM` varchar(13)  DEFAULT NULL,
  `phoneO` varchar(10)  DEFAULT NULL,
  `photo` blob DEFAULT NULL,
  `isBusiness` int(11) NOT NULL,
  `contact_name` varchar(200)  DEFAULT NULL,
  `contact_phoneH` varchar(10) DEFAULT NULL,
  `contact_phoneM` varchar(10)  DEFAULT NULL,
  `contact_email` varchar(50)  DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `l_whats_app` varchar(50)  DEFAULT NULL,
  `l_facebook` varchar(50)  DEFAULT NULL,
  `l_twitter` varchar(50) DEFAULT NULL,
  `l_instagram` varchar(50)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastName1` varchar(50)  DEFAULT NULL,
  `lastName2` varchar(50)  DEFAULT NULL,
  `description` varchar(1000)  DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `subcategory_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `rfc`, `phoneH`, `phoneM`, `phoneO`,  `isBusiness`, `contact_name`, `contact_phoneH`, `contact_phoneM`, `contact_email`, `id_user`, `email`, `l_whats_app`, `l_facebook`, `l_twitter`, `l_instagram`, `created_at`, `updated_at`, `lastName1`, `lastName2`, `description`, `category_id`, `subcategory_id`) VALUES
(1, 'Carniceria don Pepe', PEPE960430HCR', '', '+525578995437', '',  0, 'Omar Hernandez Hernandez', NULL, '5578559234', 'omar78701@gmail.com', 1, 'servicios@servicios.com', 'https://api.whatsapp.com/send?phone=+525578559234', 'https://www.facebook.com/OmarHernande2', 'http:s', 'https:', NULL, '2020-04-18 00:59:59', '--', '--', 'Somos una empresa de mayoreo, distribución de Ropa para cabelleros. Hacemos entrega en todo el país, tenemos variedad de CARNE, RES, PUERCO, todo lo que necesite. Somo tu mejor opción.', 1, 1);



CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci;


INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-03-28 22:08:34', '2020-03-28 22:08:34');


CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci;


INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);



CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255)  NOT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci;


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin ', 'admin@gmail.com', NULL, '$2y$10$6c6eO0c5LomqwweNSL.Pj.br3zgOnB5ePLA3AhXQXlo94o6L.indW', NULL, '2020-03-28 22:08:37', '2020-03-28 22:08:37');
