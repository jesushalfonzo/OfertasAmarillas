-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-05-2016 a las 16:16:49
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
-- Estructura de tabla para la tabla `m_ventas`
--

CREATE TABLE IF NOT EXISTS `m_ventas` (
  `m_venta_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_venta_idOferta` int(11) NOT NULL,
  `m_venta_idUsuario` int(11) NOT NULL,
  `m_venta_fecha` int(11) NOT NULL,
  `m_vanta_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`m_venta_id`),
  KEY `ofertaid` (`m_venta_idOferta`),
  KEY `ClienteUsuarioId` (`m_venta_idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `m_ventas`
--
ALTER TABLE `m_ventas`
  ADD CONSTRAINT `ClienteUsuarioId` FOREIGN KEY (`m_venta_idUsuario`) REFERENCES `m_clientes` (`m_cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ofertaid` FOREIGN KEY (`m_venta_idOferta`) REFERENCES `m_ofertas` (`m_oferta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
