-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-10-2016 a las 14:23:30
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `notinst`
--
CREATE DATABASE IF NOT EXISTS `notinst` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `notinst`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegios`
--

CREATE TABLE IF NOT EXISTS `colegios` (
  `idcolegio` int(90) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `lema` varchar(80) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `estudiantes` int(5) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` text NOT NULL,
  `pregunta_secreta` varchar(50) NOT NULL,
  `respuesta_secreta` varchar(50) NOT NULL,
  `telefono` int(15) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  PRIMARY KEY (`idcolegio`),
  KEY `usuario` (`usuario`),
  KEY `usuario_2` (`usuario`),
  KEY `usuario_3` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `colegios`
--

INSERT INTO `colegios` (`idcolegio`, `nombre`, `lema`, `logo`, `estudiantes`, `usuario`, `clave`, `pregunta_secreta`, `respuesta_secreta`, `telefono`, `correo`, `codigo_postal`, `direccion`) VALUES
(6, 'Yermo Y Parres', 'Marcando huella y descubriendo talentos', 'image067.jpg', 2000, 'i.e yermo y parres', '123', 'Nombre del profesor mÃ¡s destacado', 'JosÃ© MarÃ­a Yermo y Parres', 3435181, 'yermoparres@hotmail.com', '50010', 'Cra. 72a #20A-62'),
(8, 'I.E. ALEMÃN SUPERIOR', 'Pies en la tierra, mirada al infinito.', 'colegio1.jpg', 5000, 'aleman', 'al123', 'Equipo de deporte preferido', 'asd', 2566264, 'mon2bdr@gmail.com', '50010', 'Cr 75 no. 21-32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `idevento` int(99) NOT NULL AUTO_INCREMENT,
  `idcolegio` int(99) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `inicio_fecha` date NOT NULL,
  `fin_fecha` date NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `publico` varchar(30) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `inicio` time NOT NULL,
  `fin` time NOT NULL,
  `imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`idevento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idevento`, `idcolegio`, `nombre`, `inicio_fecha`, `fin_fecha`, `descripcion`, `publico`, `estado`, `inicio`, `fin`, `imagen`) VALUES
(6, 6, 'PREINFORME CUARTO PERIODO', '2016-11-07', '2016-11-07', 'Preinforme cuarto periodo y entrega de resultados plan de apoyo tercer periodo', 'Estudiantes', 'Programado', '06:30:00', '18:30:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
