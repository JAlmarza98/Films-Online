-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-05-2020 a las 10:26:45
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12
CREATE DATABASE filmsOnline;
USE filmsOnline;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `films_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

DROP TABLE IF EXISTS `facturacion`;
CREATE TABLE IF NOT EXISTS `facturacion` (
  `idFacturacion` int(11) NOT NULL AUTO_INCREMENT,
  `fechaFacturacion` date NOT NULL,
  `fechaExpiracion` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPrecios` int(11) NOT NULL,
  `nombreFacturacion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idFacturacion`),
  KEY `idUsuarios` (`idUsuario`) USING BTREE,
  KEY `idPrecios` (`idPrecios`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `milista`
--

DROP TABLE IF EXISTS `milista`;
CREATE TABLE IF NOT EXISTS `milista` (
  `idUsuario` int(11) NOT NULL,
  `idPeliculasSerie` int(11) NOT NULL,
  UNIQUE KEY `lista` (`idUsuario`,`idPeliculasSerie`),
  KEY `idPeliculasSerie` (`idPeliculasSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculasseries`
--

DROP TABLE IF EXISTS `peliculasseries`;
CREATE TABLE IF NOT EXISTS `peliculasseries` (
  `idPeliculasSeries` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `director` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `actores` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `categoria` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `votos` int(11) NOT NULL,
  `numeroVotos` int(11) NOT NULL,
  `rating` double NOT NULL,
  `rutaVideo` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rutaImg` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `año` int(4) DEFAULT NULL,
  PRIMARY KEY (`idPeliculasSeries`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `peliculasseries`
--

INSERT INTO `peliculasseries` (`idPeliculasSeries`, `nombre`, `descripcion`, `director`, `actores`, `categoria`, `votos`, `numeroVotos`, `rating`, `rutaVideo`, `rutaImg`, `tipo`, `año`) VALUES
(1, 'John Wick (Otro día para matar)', 'John Wick es un antiguo asesino a sueldo de Nueva York que se había retirado de la profesión después de perder a su esposa. Pero, al descubrir la oscura trama que la mafia había planeado para acabar con él, arrebatándole lo que más quería, volverá a introducirse en el negocio, esta vez por su cuenta, para vengarse.', 'Chad Stahelski', '\r\nAndy,Keanu Reeves,Michael Nyqvist', 'accion', 0, 0, 0, 'peliculas/John-Wick', 'peliculas/John-Wick/img', 'pelicula', NULL),
(2, 'Juego de Tronos', 'La serie, ambientada en los continentes ficticios de Westeros y Essos al final de un verano de una decada de duración, entrelaza varias líneas argumentales. La primera sigue a los miembros de varias casas nobles inmersos en una guerra civil por conseguir el Trono de Hierro de los Siete Reinos.', '\r\nD. B. Weiss,David Benioff', '\r\nBen Hawkey,Susie Kelly,Julian Glover', 'aventura', 0, 0, 0, '/juego-de-tronos/', '/juego-de-tronos/img/', 'serie', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

DROP TABLE IF EXISTS `precios`;
CREATE TABLE IF NOT EXISTS `precios` (
  `idPrecios` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`idPrecios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`idPrecios`, `tipo`, `precio`) VALUES
(1, 30, 8),
(2, 90, 16),
(3, 360, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

DROP TABLE IF EXISTS `temporadas`;
CREATE TABLE IF NOT EXISTS `temporadas` (
  `idTemporadas` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `ruta` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `idPeliculasSeries` int(11) NOT NULL,
  PRIMARY KEY (`idTemporadas`),
  KEY `idPeliculasSeries` (`idPeliculasSeries`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`idTemporadas`, `numero`, `nombre`, `ruta`, `idPeliculasSeries`) VALUES
(1, 1, 'Winter Is Coming', '/juego-de-tronos/temporada-1/', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoUsuario` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `hashpass` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `idPrecios` FOREIGN KEY (`idPrecios`) REFERENCES `precios` (`idPrecios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `milista`
--
ALTER TABLE `milista`
  ADD CONSTRAINT `milista_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milista_ibfk_2` FOREIGN KEY (`idPeliculasSerie`) REFERENCES `peliculasseries` (`idPeliculasSeries`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD CONSTRAINT `idPeliculasSeries` FOREIGN KEY (`idPeliculasSeries`) REFERENCES `peliculasseries` (`idPeliculasSeries`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
