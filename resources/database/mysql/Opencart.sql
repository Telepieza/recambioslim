
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura de base de datos para recambiosv4
CREATE DATABASE IF NOT EXISTS `recambiosv4` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `recambiosv4`;

-- Volcando estructura para tabla recambiosv4.oc_category
CREATE TABLE IF NOT EXISTS `oc_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL,
  `column` int(3) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla recambiosv4.oc_category: 28 rows
/*!40000 ALTER TABLE `oc_category` DISABLE KEYS */;
INSERT INTO `oc_category` (`category_id`, `image`, `parent_id`, `top`, `column`, `sort_order`, `status`, `date_added`, `date_modified`) VALUES
	(15, 'catalog/telepieza/categories/Escobillas_Juego_200x200.jpg', 14, 0, 1, 52, 0, '2016-02-11 12:17:53', '2017-07-02 19:46:34'),
	(14, 'catalog/telepieza/categories/categoria_escobillas_200x200.jpg', 12, 0, 1, 51, 1, '2016-02-11 11:25:07', '2017-07-02 19:48:41'),
	(12, 'catalog/telepieza/categories/Catalogo_Trico.jpg', 1, 0, 1, 50, 1, '2023-06-24 23:07:09', '2017-07-02 19:45:50'),
	(11, 'catalog/telepieza/categories/Amortiguador_kit_200x200.jpg', 6, 1, 1, 23, 1, '2023-08-05 22:18:46', '2017-08-01 10:26:10'),
	(9, 'catalog/telepieza/categories/Amortiguador_b6_200x200.jpg', 6, 0, 1, 26, 1, '2015-09-12 12:45:53', '2017-04-11 07:21:44'),
	(8, 'catalog/telepieza/categories/Amortiguador_b4_200x200.jpg', 6, 6, 3, 25, 2, '2015-09-12 12:44:50', '2017-07-31 15:07:48'),
	(10, 'catalog/telepieza/categories/Amortiguador_b8_200x200.jpg', 6, 0, 1, 28, 1, '2015-09-12 12:53:08', '2017-04-11 07:22:02'),
	(6, 'catalog/telepieza/categories/Direccion_05_175x175.jpg', 5, 0, 1, 21, 1, '2015-09-12 12:36:37', '2017-03-29 13:04:23'),
	(5, 'catalog/telepieza/categories/Direccion_03_175x175.jpg', 1, 0, 1, 20, 1, '2023-08-12 18:28:21', '2017-07-02 19:44:43'),
	(16, 'catalog/telepieza/categories/Escobillas_NeoForm_200x200.jpg', 14, 0, 1, 53, 1, '2016-02-11 12:21:04', '2017-07-02 19:46:50'),
	(17, 'catalog/telepieza/categories/Escobillas_ExactFit_200x200.jpg', 14, 0, 1, 55, 1, '2016-02-11 12:25:59', '2017-07-02 19:47:24'),
	(18, 'catalog/telepieza/categories/Escobillas_Flex_200x200.jpg', 14, 0, 1, 54, 1, '2016-02-11 12:27:11', '2017-07-02 19:47:06'),
	(19, 'catalog/telepieza/categories/Escobillas_Universal_200x200.jpg', 14, 0, 1, 56, 1, '2016-02-11 12:28:12', '2017-07-02 19:47:41'),
	(59, 'catalog/telepieza/categories/Direccion_03_175x175.jpg', 0, 0, 1, 20, 1, '2015-09-12 12:35:08', '2017-07-02 19:44:43'),
	(23, 'catalog/telepieza/categories/Filtron_Aceite.jpg', 21, 0, 1, 45, 1, '2016-04-30 23:12:10', '2017-07-02 21:49:24'),
	(24, 'catalog/telepieza/categories/Filtron_Combustible.jpg', 21, 0, 1, 46, 1, '2016-04-30 23:17:34', '2017-07-02 21:49:38'),
	(25, 'catalog/telepieza/categories/Filtron_Habitaculo.jpg', 21, 0, 1, 47, 1, '2016-04-30 23:23:11', '2017-07-02 21:50:07'),
	(26, 'catalog/telepieza/categories/Filtron_JuegoFiltros.jpg', 21, 0, 1, 43, 1, '2016-04-30 23:47:38', '2017-07-02 21:50:25'),
	(27, 'catalog/telepieza/categories/Amortiguador_set_200x200.jpg', 6, 0, 1, 23, 1, '2017-04-11 07:19:13', '2017-08-01 10:26:56'),
	(28, 'catalog/telepieza/categories/Direccion_01_125x125.jpg', 5, 0, 1, 30, 1, '2017-05-24 22:12:13', '2017-07-02 21:50:44'),
	(29, 'catalog/telepieza/categories/Kyb_Premium_200x200.jpg', 28, 0, 1, 34, 1, '2017-05-24 22:42:14', '2017-07-02 21:52:11'),
	(30, 'catalog/telepieza/categories/Kyb_Excel_G_200x200.jpg', 28, 0, 1, 35, 1, '2017-05-24 23:05:25', '2017-07-02 21:51:10'),
	(31, 'catalog/telepieza/categories/Kyb_Gas_A_Just_200x200.jpg', 28, 1, 1, 36, 1, '2017-05-24 23:26:05', '2017-07-02 21:51:26'),
	(32, 'catalog/telepieza/categories/Kyb_Juego_200x200.jpg', 28, 0, 1, 33, 1, '2017-05-24 23:55:22', '2017-07-31 14:40:23'),
	(33, 'catalog/telepieza/categories/Kyb_Kit_200x200.jpg', 28, 0, 1, 31, 1, '2017-05-25 11:25:02', '2017-08-01 10:27:49'),
	(60, 'catalog/telepieza/categories/Direccion_03_175x175.jpg', 0, 0, 1, 20, 1, '2015-09-12 12:35:08', '2017-07-02 19:44:43'),
	(62, 'catalog/telepieza/categories/Direccion_03_175x175.jpg', 1, 2, 3, 4, 5, '2023-08-12 18:29:09', '2023-06-24 23:57:38'),
	(64, 'catalog/telepieza/categories/Direccion_03_175x175.jpg', 2, 1, 1, 1, 1, '2023-08-12 18:28:42', '2023-06-25 00:05:52');
/*!40000 ALTER TABLE `oc_category` ENABLE KEYS */;

-- Volcando estructura para tabla recambiosv4.oc_geo_zone
CREATE TABLE IF NOT EXISTS `oc_geo_zone` (
  `geo_zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`geo_zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla recambiosv4.oc_geo_zone: 4 rows
/*!40000 ALTER TABLE `oc_geo_zone` DISABLE KEYS */;
INSERT INTO `oc_geo_zone` (`geo_zone_id`, `name`, `description`, `date_added`, `date_modified`) VALUES
	(3, 'UK VAT Zone', 'UK VAT', '2009-01-06 23:26:25', '2010-02-26 22:33:24'),
	(4, 'UK Shipping', 'UK Shipping Zones', '2009-06-23 01:14:53', '2010-12-15 15:18:13'),
	(5, 'España', 'Tienda Telepieza (España)', '2023-01-13 23:09:45', '2023-01-13 23:09:45'),
	(6, 'Portugal', 'Portugal', '2023-01-13 23:10:09', '2023-01-13 23:10:09');
/*!40000 ALTER TABLE `oc_geo_zone` ENABLE KEYS */;

-- Volcando estructura para tabla recambiosv4.oc_language
CREATE TABLE IF NOT EXISTS `oc_language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `image` varchar(64) NOT NULL,
  `directory` varchar(32) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`language_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla recambiosv4.oc_language: 2 rows
/*!40000 ALTER TABLE `oc_language` DISABLE KEYS */;
INSERT INTO `oc_language` (`language_id`, `name`, `code`, `locale`, `image`, `directory`, `sort_order`, `status`) VALUES
	(1, 'English', 'en-gb', 'en-US,en_US.UTF-8,en_US,en-gb,english', 'gb.png', 'english', 2, 1),
	(2, 'Español', 'es-es', 'es_ES.UTF-8,es_ES,es-es,Español', 'es.png', 'spanish', 1, 1);
/*!40000 ALTER TABLE `oc_language` ENABLE KEYS */;

-- Volcando estructura para tabla recambiosv4.oc_manufacturer
CREATE TABLE IF NOT EXISTS `oc_manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla recambiosv4.oc_manufacturer: 4 rows
/*!40000 ALTER TABLE `oc_manufacturer` DISABLE KEYS */;
INSERT INTO `oc_manufacturer` (`manufacturer_id`, `name`, `image`, `sort_order`) VALUES
	(13, 'Filtros Filtron', 'catalog/telepieza/manufacturer/filtron_logo.jpg', 3),
	(12, 'Escobillas Trico', 'catalog/telepieza/manufacturer/trico_logo.jpg', 4),
	(11, 'Amortiguadores Bilstein', 'catalog/telepieza/manufacturer/bilstein_logo.jpg', 1),
	(14, 'Amortiguadores Kyb', 'catalog/telepieza/manufacturer/kyb_logo.jpg', 2);
/*!40000 ALTER TABLE `oc_manufacturer` ENABLE KEYS */;

-- Volcando estructura para tabla recambiosv4.oc_user
CREATE TABLE IF NOT EXISTS `oc_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` varchar(40) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla recambiosv4.oc_user: 4 rows
/*!40000 ALTER TABLE `oc_user` DISABLE KEYS */;
INSERT INTO `oc_user` (`user_id`, `user_group_id`, `username`, `password`, `salt`, `firstname`, `lastname`, `email`, `image`, `code`, `ip`, `status`, `date_added`) VALUES
	(1, 1, 'opencart', '46a4d31a630964693443be1792610de1767bf38dab65fcab0396335c3c3ae834', 'X6rpOuOhq', 'John', 'Doe', 'opencart@domain.com', '', '', '79.116.168.34', 1, '2023-01-12 23:47:44'),
	(2, 1, 'example' , '46a4d31a630964693443be1792610de1767bf38dab65fcab0396335c3c3ae834', '71kpmOMNb', 'Example', 'Version 1.0.0', 'example@domain.com', '', '', '79.116.168.34', 1, '2023-01-12 23:22:08'),
	(4, 1, 'demo'    , '46a4d31a630964693443be1792610de1767bf38dab65fcab0396335c3c3ae834', '71KpmOSSb', 'demo', 'Company', 'demo@domain.com', '35', '2', '79.116.168.34', 1, '2023-07-30 18:09:25');
/*!40000 ALTER TABLE `oc_user` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
