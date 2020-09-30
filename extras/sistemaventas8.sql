-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para sistemaventas8
CREATE DATABASE IF NOT EXISTS `sistemaventas8` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `sistemaventas8`;

-- Volcando estructura para tabla sistemaventas8.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(10) NOT NULL AUTO_INCREMENT,
  `id_producto` int(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistemaventas8.compra: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`id_compra`, `id_producto`, `cantidad`, `fecha`, `hora`, `activo`) VALUES
	(1, 1, 20, '2020-09-08', '10:22:32', 1),
	(2, 6, 25, '2020-09-10', '10:19:32', 1),
	(3, 3, 20, '2020-06-30', '09:45:26', 1),
	(4, 2, 10, '2020-09-30', '08:34:52', 1),
	(5, 9, 30, '2020-09-30', '08:35:24', 1),
	(6, 11, 15, '2020-09-30', '08:37:30', 1),
	(7, 10, 2, '2020-09-30', '09:14:08', 1);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Volcando estructura para tabla sistemaventas8.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `detalle` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistemaventas8.producto: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `detalle`, `foto`, `fecha`, `hora`, `activo`) VALUES
	(1, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '22:15:45', 1),
	(2, 'Carne', 20, 'qweqwe', 'Carne.jpg', '2020-09-12', '16:17:17', 0),
	(3, 'Fideo', 15, 'qweqwe', 'Fideo.jpg', '2020-09-12', '16:31:16', 1),
	(4, 'Tomate', 15, 'qweqwe', 'Tomate.jpg', '2020-09-12', '16:31:54', 0),
	(5, 'Detergente', 15, 'qweqwe', 'Detergente.jpg', '2020-09-12', '16:32:04', 1),
	(6, 'Mantequilla', 15, 'qweqwe', 'Mantequilla.jpg', '2020-09-12', '16:33:40', 1),
	(7, 'Pan', 15, 'qweqwe', 'Pan.jpg', '2020-09-12', '16:34:23', 1),
	(8, 'Quinua', 15, 'qweqwe', 'Quinua.jpg', '2020-09-12', '16:34:45', 0),
	(9, 'Avena', 15, 'qweqwe', 'Avena.jpg', '2020-09-12', '16:34:56', 1),
	(10, 'Cocoa', 15, 'qweqwe', 'Cocoa.jpg', '2020-09-12', '16:35:21', 1),
	(11, 'Coca-Cola', 15, 'qweqwe', 'Coca-Cola.jpg', '2020-09-12', '16:36:10', 1),
	(12, 'Arroz', 8, 'qweqwe', 'Arroz.jpg', '2020-09-12', '16:36:41', 1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla sistemaventas8.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistemaventas8.usuario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `fotografia`, `usuario`, `contrasena`, `nivel`, `fecha`, `hora`, `activo`) VALUES
	(1, 'Cinthya', 'Marquez', 'fotografia_1.PNG', 'cinthy', '7c222fb2927d828af22f592134e8932480637c0d', 1, '2020-09-25', '00:13:19', 1),
	(2, 'Adrian', 'Perez', 'cemal.PNG', 'adri123', '7c222fb2927d828af22f592134e8932480637c0d', 1, '2020-09-25', '00:26:41', 1),
	(3, 'Katerin', 'Lopez', 'karen.PNG', 'karen12', '12345678', 1, '2020-09-25', '00:27:33', 1),
	(4, 'Esteban Demir', 'Lima', 'demir.PNG', 'esteban01', '12345678', 1, '2020-09-25', '00:28:25', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla sistemaventas8.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `total` float NOT NULL,
  `cancelado` float NOT NULL,
  `cambio` float NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistemaventas8.venta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`id_venta`, `nombre`, `nit`, `total`, `cancelado`, `cambio`, `fecha`, `hora`, `activo`) VALUES
	(1, 'Cinthya Mamani', '123456', 30, 50, 20, '2020-09-30', '06:25:43', 1),
	(2, 'Juan Perez', '13579246', 15, 20, 5, '2020-09-30', '06:46:56', 1);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

-- Volcando estructura para tabla sistemaventas8.ventadetalle
CREATE TABLE IF NOT EXISTS `ventadetalle` (
  `id_ventadetalle` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) unsigned NOT NULL,
  `id_producto` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_ventadetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistemaventas8.ventadetalle: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventadetalle` DISABLE KEYS */;
INSERT INTO `ventadetalle` (`id_ventadetalle`, `id_venta`, `id_producto`, `cantidad`, `precio`, `total`, `fecha`, `hora`, `activo`) VALUES
	(1, 1, 1, 2, 15, 30, '2020-09-30', '06:25:43', 1),
	(2, 2, 1, 1, 15, 15, '2020-09-30', '06:46:57', 1);
/*!40000 ALTER TABLE `ventadetalle` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
