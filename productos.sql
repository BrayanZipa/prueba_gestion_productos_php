-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para prueba_gestion_productos_php
CREATE DATABASE IF NOT EXISTS `prueba_gestion_productos_php` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `prueba_gestion_productos_php`;

-- Volcando estructura para tabla prueba_gestion_productos_php.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `cantidad` float NOT NULL DEFAULT '0',
  `precio` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla prueba_gestion_productos_php.productos: ~30 rows (aproximadamente)
DELETE FROM `productos`;
INSERT INTO `productos` (`id`, `sku`, `nombre`, `descripcion`, `cantidad`, `precio`, `total`, `fecha_creacion`) VALUES
	(1, 604054, 'architecto temporibus vitae', 'Repudiandae repellat qui quis eius quam.', 37, 81516, 3016090, '2025-06-13 03:24:42'),
	(2, 700284, 'dolorum dolore dignissimos', 'Voluptate dolore pariatur hic possimus aut repellat praesentium.', 12, 54922, 659064, '2025-06-13 03:24:42'),
	(3, 780032, 'molestiae rerum adipisci', 'Iste saepe vitae aspernatur dolores ad.', 3, 46781, 140343, '2025-06-13 03:24:42'),
	(4, 526351, 'aut adipisci mollitia', 'Ullam iure vero quaerat dignissimos corrupti est.', 56, 86362, 4836270, '2025-06-13 03:24:42'),
	(5, 673310, 'omnis aut sunt', 'Repudiandae aut harum mollitia facere fuga qui.', 55, 25141, 1382760, '2025-06-13 03:24:42'),
	(6, 314183, 'quam sunt sed', 'Molestias minus nam eius nemo.', 63, 7846, 494298, '2025-06-13 03:24:42'),
	(7, 597154, 'ut est recusandae', 'Est necessitatibus aut facilis cupiditate.', 90, 63642, 5727780, '2025-06-13 03:24:42'),
	(8, 764394, 'qui voluptas in', 'Enim magnam libero et.', 80, 46235, 3698800, '2025-06-13 03:24:42'),
	(9, 551549, 'et eaque ut', 'Magni veritatis sunt et soluta beatae sint.', 82, 3246, 266172, '2025-06-13 03:24:42'),
	(10, 347250, 'blanditiis officia fuga', 'Quia non natus cupiditate magni debitis voluptatem.', 26, 54370, 1413620, '2025-06-13 03:24:42'),
	(11, 446932, 'eligendi voluptatem dolor', 'Eos porro pariatur natus sed consequatur quo vel.', 7, 78252, 547764, '2025-06-13 03:24:42'),
	(12, 249360, 'at perferendis nostrum', 'Quod non voluptatem illo rerum repudiandae veritatis.', 36, 42032, 1513150, '2025-06-13 03:24:42'),
	(13, 952183, 'eos necessitatibus animi', 'Officiis eius voluptatum voluptas officia.', 79, 82606, 6525870, '2025-06-13 03:24:42'),
	(14, 347269, 'distinctio veritatis quasi', 'Natus consequatur dolorum qui accusamus.', 27, 19977, 539379, '2025-06-13 03:24:42'),
	(15, 160856, 'qui quis sint', 'Consequuntur earum tempore blanditiis amet numquam sit culpa.', 1, 8731, 8731, '2025-06-13 03:24:42'),
	(16, 726149, 'rerum occaecati saepe', 'Molestiae eum tenetur itaque voluptas.', 33, 7134, 235422, '2025-06-13 03:24:42'),
	(17, 823989, 'est voluptatibus facere', 'Ducimus voluptatem rem vero neque voluptatibus ut eligendi.', 9, 72743, 654687, '2025-06-13 03:24:42'),
	(18, 513047, 'distinctio placeat eius', 'Quia fugiat assumenda dolor non aliquid.', 14, 92767, 1298740, '2025-06-13 03:24:42'),
	(19, 569184, 'recusandae ex impedit', 'Et animi eos sapiente mollitia neque inventore.', 10, 14743, 147430, '2025-06-13 03:24:42'),
	(20, 183745, 'voluptatem consequatur sit', 'Non accusantium non possimus quis omnis nesciunt rerum iste.', 70, 60678, 4247460, '2025-06-13 03:24:42'),
	(21, 155053, 'a nobis ad', 'Perspiciatis est et nobis tempora suscipit est dolor.', 57, 53697, 3060730, '2025-06-13 03:24:42'),
	(22, 522018, 'quae ipsum aperiam', 'Ipsam esse provident qui soluta voluptatum.', 70, 32277, 2259390, '2025-06-13 03:24:42'),
	(23, 245345, 'omnis aliquam voluptatem', 'Totam eum earum officiis et suscipit earum dolore.', 55, 55237, 3038040, '2025-06-13 03:24:42'),
	(24, 257140, 'architecto et consequatur', 'Maxime commodi odio incidunt rerum blanditiis.', 42, 76587, 3216650, '2025-06-13 03:24:42'),
	(25, 152611, 'labore quisquam nulla', 'Numquam modi repellat excepturi mollitia ut.', 92, 40435, 3720020, '2025-06-13 03:24:42'),
	(26, 794247, 'eos quod sit', 'Nemo facere quia quis est rem quia numquam omnis.', 48, 15875, 762000, '2025-06-13 03:24:42'),
	(27, 971133, 'voluptatem alias ut', 'Excepturi tempora quibusdam officiis neque molestiae.', 90, 12093, 1088370, '2025-06-13 03:24:42'),
	(28, 226459, 'atque eaque molestiae', 'Numquam voluptate assumenda doloribus odio voluptatibus rem quibusdam.', 59, 24817, 1464200, '2025-06-13 03:24:42'),
	(29, 532260, 'corporis tempora rerum', 'Id dolores sed est porro incidunt sed.', 7, 15046, 105322, '2025-06-13 03:24:42'),
	(30, 832385, 'quia quo facilis', 'Iste occaecati id maiores quam impedit aspernatur.', 97, 52967, 5137800, '2025-06-13 03:24:42');

-- Volcando estructura para tabla prueba_gestion_productos_php.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla prueba_gestion_productos_php.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
