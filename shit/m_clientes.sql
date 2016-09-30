-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-05-2016 a las 16:16:17
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
-- Estructura de tabla para la tabla `m_clientes`
--

CREATE TABLE IF NOT EXISTS `m_clientes` (
  `m_cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_cliente_razonSocial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cliente_rif` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cliente_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cliente_telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cliente_nombreContacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cliente_telefonoContacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cliente_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_cliente_estatus` int(11) NOT NULL,
  `m_cliente_verificado` int(11) NOT NULL,
  `m_cliente_tipoCliente` int(11) NOT NULL,
  `m_cliente_fecharegistro` datetime NOT NULL,
  `m_cliente_newsletter` int(11) NOT NULL,
  PRIMARY KEY (`m_cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `m_clientes`
--

INSERT INTO `m_clientes` (`m_cliente_id`, `m_cliente_razonSocial`, `m_cliente_rif`, `m_cliente_mail`, `m_cliente_telefono`, `m_cliente_nombreContacto`, `m_cliente_telefonoContacto`, `m_cliente_password`, `m_cliente_estatus`, `m_cliente_verificado`, `m_cliente_tipoCliente`, `m_cliente_fecharegistro`, `m_cliente_newsletter`) VALUES
(3, 'LarryCapinga C.A', 'V-17955911-1', 'jesushalfonzo@gmail.com', '00584125541104', 'Jes&uacute;s Alfonzo', '00584264011816', '+uMgkucq9&gt;&gt;(zcd', 1, 0, 1, '2016-05-03 15:08:04', 0),
(4, 'NenucoFilia S.A', 'V-17955911-0', 'jvalera@gmail.com', '00584125541104', 'Johan Valera', '00584264011816', 'o#t0Ibel7wia512', 1, 1, 1, '2016-05-03 15:13:01', 0),
(5, 'Colombiano S.A', 'V-17955911-2', 'castro@gmail.com', '00584125541104', 'Eduard Castro Pirella', '00584264011816', 'kq8ibu75*uDHulh', 1, 0, 1, '2016-05-04 10:03:10', 0),
(6, 'MaquillajesyMaricuras C.A', 'V-17955911-3', 'jashet@gmail.com', '00584125541104', 'Jashet Villegas', '00584264011816', 'kq8ibu75*uDHulh', 0, 1, 1, '2016-05-04 10:04:50', 0),
(7, 'Inversiones 154 C.A', 'V-17955911-4', 'pedroperez@gmail.com', '00584125541104', 'Pedro Perez', '00584264011816', 'kq8ibu75*uDHulh', 1, 1, 1, '2016-05-04 10:06:32', 0),
(8, 'Coraz&oacute;n de Jes&uacute;s S.A', 'G-19446720-2', 'probandoando@gmail.com', '00584125541104', 'Milagro L&oacute;pez', '00584265558993', 'djjvAtxHIqhrqmB', 0, 1, 1, '2016-05-04 12:52:28', 0),
(9, '', '', 'jesushalfonzo@hotmail.com', '04264011816', 'Jesús Alfonzo', '02126000276', 'a35400f5d75488e299037db1895d2ee8', 1, 1, 2, '2016-05-27 00:00:00', 0),
(11, '', '17955911', 'pleiberjo@hotmail.com', '', 'pleiber Rosendo', '04125541104', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1, 1, 2, '2016-05-27 16:44:52', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
