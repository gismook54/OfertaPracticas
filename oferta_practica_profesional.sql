-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 07-11-2019 a las 03:41:42
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_practica_profesional`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_practica_profesional`
--

DROP TABLE IF EXISTS `oferta_practica_profesional`;
CREATE TABLE IF NOT EXISTS `oferta_practica_profesional` (
  `id_oferta_practica_profesional` int(11) NOT NULL AUTO_INCREMENT,
  `id_institucion` int(11) DEFAULT 0,
  `id_modalidad` int(11) NOT NULL DEFAULT 0,
  `id_carrera` int(11) NOT NULL DEFAULT 0,
  `carrera` varchar(50) NOT NULL DEFAULT '0',
  `cupo` int(11) NOT NULL DEFAULT 0,
  `cupo_asignado` int(2) NOT NULL DEFAULT 0,
  `id_estatus` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_oferta_practica_profesional`),
  KEY `FK_oferta_educativa_modalidad` (`id_modalidad`),
  KEY `FK_oferta_educativa_institucion` (`id_institucion`),
  KEY `FK_oferta_practica_profesional_colegiatura` (`id_carrera`),
  KEY `FK_oferta_practica_profesional_estatus` (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferta_practica_profesional`
--

INSERT INTO `oferta_practica_profesional` (`id_oferta_practica_profesional`, `id_institucion`, `id_modalidad`, `id_carrera`, `carrera`, `cupo`, `cupo_asignado`, `id_estatus`) VALUES
(2, 1, 1, 2, 'INDUSTRIAL', 27, 0, 1),
(3, 1, 1, 1, '\'0\'', 3, 0, 1),
(4, 1, 1, 2, '\'0\'', 2, 0, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `oferta_practica_profesional`
--
ALTER TABLE `oferta_practica_profesional`
  ADD CONSTRAINT `FK_oferta_educativa_institucion` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`),
  ADD CONSTRAINT `FK_oferta_educativa_modalidad` FOREIGN KEY (`id_modalidad`) REFERENCES `modalidad` (`id_modalidad`),
  ADD CONSTRAINT `FK_oferta_practica_profesional_colegiatura` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`),
  ADD CONSTRAINT `FK_oferta_practica_profesional_estatus` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id_estatus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
