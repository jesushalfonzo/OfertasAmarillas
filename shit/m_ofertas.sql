-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2016 a las 15:54:26
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
-- Estructura de tabla para la tabla `m_ofertas`
--

CREATE TABLE IF NOT EXISTS `m_ofertas` (
  `m_oferta_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_oferta_idCliente` int(11) NOT NULL,
  `m_oferta_idCategoria` int(11) NOT NULL,
  `m_oferta_titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_oferta_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `m_oferta_cantidad` int(11) NOT NULL,
  `m_oferta_precioCupon` decimal(10,0) NOT NULL,
  `m_oferta_porcentajeAhorro` decimal(10,0) NOT NULL,
  `m_oferta_fecha` date NOT NULL,
  `m_oferta_fechaInicio` date NOT NULL,
  `m_oferta_fechaFin` date NOT NULL,
  `m_oferta_estusAprobado` tinyint(1) NOT NULL,
  `m_oferta_estatusActivado` tinyint(1) NOT NULL,
  PRIMARY KEY (`m_oferta_id`),
  KEY `iddelclientevendedor` (`m_oferta_idCliente`),
  KEY `idcategoria` (`m_oferta_idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `m_ofertas`
--
ALTER TABLE `m_ofertas`
  ADD CONSTRAINT `idcategoria` FOREIGN KEY (`m_oferta_idCategoria`) REFERENCES `m_categorias` (`m_categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iddelclientevendedor` FOREIGN KEY (`m_oferta_idCliente`) REFERENCES `m_clientes` (`m_cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
