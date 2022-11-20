-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6518
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para biblioteca
CREATE DATABASE IF NOT EXISTS `biblioteca` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci */;
USE `biblioteca`;

-- Volcando estructura para tabla biblioteca.libros
CREATE TABLE IF NOT EXISTS `libros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_autor` bigint(150) unsigned NOT NULL,
  `imagen` varchar(250) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT '1',
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla biblioteca.libros: ~0 rows (aproximadamente)
DELETE FROM `libros`;

-- Volcando estructura para tabla biblioteca.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `biografía` longtext COLLATE utf8mb4_spanish2_ci,
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_rol` bigint(20) unsigned DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_personas_roles` (`id_rol`),
  CONSTRAINT `FK_personas_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla biblioteca.personas: ~3 rows (aproximadamente)
DELETE FROM `personas`;
INSERT INTO `personas` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `biografía`, `email`, `id_rol`, `estado`, `created_at`) VALUES
	(1, 'GABRIEL', '', 'GARCÍA', 'MARQUEZ', 'HOLI', 'ggm@mail.com', 1, 1, '2022-11-12 13:32:07'),
	(2, 'JULIO', NULL, 'VERNE', NULL, 'HOLI2', 'jv@mail.com', 1, 1, '2022-11-12 13:45:28'),
	(3, 'RAFAEL', NULL, 'POMBO', NULL, 'HOL3', 'rp@mail.com', 1, 0, '2022-11-12 14:00:13');

-- Volcando estructura para tabla biblioteca.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_spanish2_ci,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla biblioteca.roles: ~3 rows (aproximadamente)
DELETE FROM `roles`;
INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `estado`, `created_at`) VALUES
	(1, 'AUTOR', NULL, 1, '2022-11-12 14:54:53'),
	(2, 'LECTOR', NULL, 1, '2022-11-12 14:55:08'),
	(3, 'SECRETARIA', NULL, 0, '2022-11-12 16:40:17');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
