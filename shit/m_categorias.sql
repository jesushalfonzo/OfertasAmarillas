-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-05-2016 a las 12:23:27
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `DB_amarillas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_categorias`
--

CREATE TABLE IF NOT EXISTS `m_categorias` (
  `m_categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_categoria_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_categoria_descripcion` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `m_categoria_icono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_categoria_estatus` int(11) NOT NULL,
  PRIMARY KEY (`m_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `m_categorias`
--

INSERT INTO `m_categorias` (`m_categoria_id`, `m_categoria_nombre`, `m_categoria_descripcion`, `m_categoria_icono`, `m_categoria_estatus`) VALUES
(1, 'Belleza', 'Articulos de belleza', 'ICONO_1._586430324png', 1),
(2, 'Vehiculo', 'Para carros y motos', 'ICONO_2.jpg', 1),
(3, 'Viajes', 'Para pasajes, alojamiento etc', 'ICONO_3.png', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
