-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2016 a las 15:45:55
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
-- Estructura de tabla para la tabla `bitacora_acceso`
--

CREATE TABLE IF NOT EXISTS `bitacora_acceso` (
  `b_acceso_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_acceso_usuario` varchar(200) NOT NULL,
  `b_acceso_accion` varchar(200) NOT NULL,
  `b_acceso_ip` varchar(200) NOT NULL,
  `b_acceso_fecha` datetime NOT NULL,
  PRIMARY KEY (`b_acceso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Volcado de datos para la tabla `bitacora_acceso`
--

INSERT INTO `bitacora_acceso` (`b_acceso_id`, `b_acceso_usuario`, `b_acceso_accion`, `b_acceso_ip`, `b_acceso_fecha`) VALUES
(1, 'jalfonzo', 'ACCESO PERMITIDO', '', '0000-00-00 00:00:00'),
(2, 'jalfonzo', 'ACCESO PERMITIDO', '', '0000-00-00 00:00:00'),
(3, 'jalfonzo', 'ACCESO PERMITIDO', '', '0000-00-00 00:00:00'),
(4, 'jalfonzo', 'ACCESO PERMITIDO', '', '0000-00-00 00:00:00'),
(5, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:28:00'),
(6, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:28:31'),
(7, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:31:02'),
(8, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:31:28'),
(9, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:31:40'),
(10, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:33:06'),
(11, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:35:14'),
(12, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:35:29'),
(13, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:46:45'),
(14, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:53:07'),
(15, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:53:28'),
(16, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:53:49'),
(17, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:54:08'),
(18, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:55:11'),
(19, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:56:35'),
(20, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:56:53'),
(21, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:57:02'),
(22, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:59:05'),
(23, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:59:22'),
(24, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:59:40'),
(25, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 13:01:09'),
(26, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:16:33'),
(27, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:33:01'),
(28, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:33:50'),
(29, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:35:03'),
(30, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:35:43'),
(31, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 16:46:52'),
(32, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 17:01:59'),
(33, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 17:03:37'),
(34, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 17:06:03'),
(35, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-29 09:26:29'),
(36, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-29 14:27:55'),
(37, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 09:13:16'),
(38, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 10:21:10'),
(39, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 11:44:05'),
(40, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 12:43:04'),
(41, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 14:30:45'),
(42, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 15:09:59'),
(43, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 16:12:09'),
(44, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-03 08:51:11'),
(45, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-03 10:06:35'),
(46, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-03 13:59:01'),
(47, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:31:24'),
(48, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:34:02'),
(49, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:37:02'),
(50, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:38:49'),
(51, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:41:10'),
(52, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:41:37'),
(53, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:42:33'),
(54, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:43:56'),
(55, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:45:15'),
(56, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:45:33'),
(57, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:45:42'),
(58, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 09:43:43'),
(59, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 11:17:23'),
(60, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 11:29:11'),
(61, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 11:29:40'),
(62, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 11:30:10'),
(63, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 14:36:48'),
(64, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-05 11:56:54'),
(65, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-05 15:48:48'),
(66, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-06 08:58:36'),
(67, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-06 14:47:28'),
(68, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-06 15:46:38'),
(69, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-10 14:09:38'),
(70, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-10 14:18:39'),
(71, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-11 09:35:13'),
(72, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-11 09:36:06'),
(73, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-11 09:36:49'),
(74, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-11 09:37:45'),
(75, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-12 12:43:59'),
(76, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-12 13:40:42'),
(77, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-12 15:06:57'),
(78, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-13 10:53:13'),
(79, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-13 16:23:03'),
(80, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-16 16:25:35'),
(81, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-23 09:03:22'),
(82, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-23 13:10:54'),
(83, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-23 14:24:46'),
(84, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-27 11:06:29'),
(85, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-30 08:44:37'),
(86, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-30 09:42:25'),
(87, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-30 14:15:48'),
(88, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-31 13:43:53'),
(89, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-31 13:48:04'),
(90, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-31 13:51:39'),
(91, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-31 15:29:10'),
(92, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-01 09:51:51'),
(93, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-01 13:55:09'),
(94, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-02 08:50:59'),
(95, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-02 15:15:42'),
(96, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-03 08:47:07'),
(97, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-03 13:52:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_acciones`
--

CREATE TABLE IF NOT EXISTS `m_acciones` (
  `m_acciones_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_acciones_nombre` varchar(100) NOT NULL,
  `m_acciones_descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`m_acciones_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `m_acciones`
--

INSERT INTO `m_acciones` (`m_acciones_id`, `m_acciones_nombre`, `m_acciones_descripcion`) VALUES
(1, 'Agregar', 'Para cargar nuevos pacientes'),
(2, 'Ver', 'Para listar'),
(3, 'Editar', 'Permite hacer ediciones'),
(4, 'Eliminar', 'Permite eliminar de la base de datos');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_grupo`
--

CREATE TABLE IF NOT EXISTS `m_grupo` (
  `m_grupo_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_grupo_nombre` varchar(100) NOT NULL,
  `m_grupo_descripcion` varchar(255) NOT NULL,
  `m_grupo_status` varchar(3) NOT NULL,
  PRIMARY KEY (`m_grupo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `m_grupo`
--

INSERT INTO `m_grupo` (`m_grupo_id`, `m_grupo_nombre`, `m_grupo_descripcion`, `m_grupo_status`) VALUES
(1, 'Super Admin', 'El super administrador del sistema, para privilegios de administración de modulos', 'A');

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
  `m_oferta_precioCupon` decimal(10,2) NOT NULL,
  `m_oferta_porcentajeAhorro` decimal(10,2) NOT NULL,
  `m_oferta_fecha` datetime NOT NULL,
  `m_oferta_fechaInicio` datetime NOT NULL,
  `m_oferta_fechaFin` datetime NOT NULL,
  `m_oferta_estusActivado` tinyint(1) NOT NULL,
  `m_oferta_estatusVerificado` tinyint(1) NOT NULL,
  PRIMARY KEY (`m_oferta_id`),
  KEY `iddelclientevendedor` (`m_oferta_idCliente`),
  KEY `idcategoria` (`m_oferta_idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `m_ofertas`
--

INSERT INTO `m_ofertas` (`m_oferta_id`, `m_oferta_idCliente`, `m_oferta_idCategoria`, `m_oferta_titulo`, `m_oferta_descripcion`, `m_oferta_cantidad`, `m_oferta_precioCupon`, `m_oferta_porcentajeAhorro`, `m_oferta_fecha`, `m_oferta_fechaInicio`, `m_oferta_fechaFin`, `m_oferta_estusActivado`, `m_oferta_estatusVerificado`) VALUES
(6, 7, 3, '1 noche romÃ¡ntica en GalipÃ¡n en Posada Miradas Virolas', '\r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            <h1 style="margin-top: 0px; margin-bottom: 0px; font-size: 28px; font-family: AlegreyaSans, sans-serif, serif; color: rgb(78, 78, 78); padding: 0px;">Detalles del Paquetexxxx de Clavoxx</h1><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: AlegreyaSans, serif, sans-serif; font-size: 14px; line-height: 20px;"><li style="font-family: AlegreyaSans-Light, sans-serif, serif; font-size: 16px; text-align: justify; color: rgb(78, 78, 78); margin: 0px; padding: 10px 0px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(153, 153, 153);"><span style="font-weight: 700;">Puede ser canjeado hasta el 15 de julio de 2016</span></li><li style="font-family: AlegreyaSans-Light, sans-serif, serif; font-size: 16px; text-align: justify; color: rgb(78, 78, 78); margin: 0px; padding: 10px 0px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(153, 153, 153);">Galipan, Posada Miradas: Noche romÃ¡ntica con desayuno para dos personas</li><li style="font-family: AlegreyaSans-Light, sans-serif, serif; font-size: 16px; text-align: justify; color: rgb(78, 78, 78); margin: 0px; padding: 10px 0px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(153, 153, 153);">Maravillosa vista al Picacho de GalipÃ¡n y al mar de la Guaira</li><li style="font-family: AlegreyaSans-Light, sans-serif, serif; font-size: 16px; text-align: justify; color: rgb(78, 78, 78); margin: 0px; padding: 10px 0px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(153, 153, 153);"><em></em>Acogedor lugar decorado con un limpio aire fresco. RomÃ¡nticas habitaciones con espectacular vista</li><li style="font-family: AlegreyaSans-Light, sans-serif, serif; font-size: 16px; text-align: justify; color: rgb(78, 78, 78); margin: 0px; padding: 10px 0px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(153, 153, 153);"><em></em>Equipadas con cÃ³modas camas matrimoniales, TV, agua caliente y cable</li></ul>\r\n\r\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', 12, 120.00, 85.00, '2016-06-02 12:28:25', '2016-06-03 18:00:00', '2016-06-28 13:49:00', 1, 1),
(7, 7, 3, 'Temporada Baja en Acarigua Sin Agua ni Luz', '\r\n                            \r\n                            <b><font face="Arial Black" size="5">Pongo Cualquier Vaina</font></b><div><b><font face="Arial Black" size="5"><br></font></b></div><div><font face="Arial Black" size="5"><span style="line-height: 35.304px;"><b>Usted paga los tragos que el hielo tambiÃ©n se lo cobramos.</b></span></font></div><div><font face="Arial Black" size="5"><span style="line-height: 35.304px;"><b><br></b></span></font></div><div><font face="Arial Black" size="5"><span style="line-height: 35.304px;"><b>Traiga sus sabanas y su plagatox</b></span></font></div>                                                        ', 23, 10.00, 99.00, '2016-06-02 12:36:41', '2016-06-02 01:00:00', '2016-06-23 01:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_permiso`
--

CREATE TABLE IF NOT EXISTS `m_permiso` (
  `m_permiso_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_grupo_id` int(4) NOT NULL,
  `m_seccion_id` int(4) NOT NULL,
  `m_accion_id` int(100) NOT NULL,
  `m_permiso_status` varchar(2) NOT NULL,
  PRIMARY KEY (`m_permiso_id`),
  KEY `grupoid` (`m_grupo_id`),
  KEY `accionid` (`m_accion_id`),
  KEY `seccionid` (`m_seccion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `m_permiso`
--

INSERT INTO `m_permiso` (`m_permiso_id`, `m_grupo_id`, `m_seccion_id`, `m_accion_id`, `m_permiso_status`) VALUES
(1, 1, 1, 1, 'SI'),
(2, 1, 1, 2, 'SI'),
(3, 1, 1, 4, 'SI'),
(4, 1, 1, 3, 'SI'),
(5, 1, 2, 1, 'SI'),
(6, 1, 2, 2, 'SI'),
(7, 1, 2, 3, 'SI'),
(8, 1, 2, 4, 'SI'),
(9, 1, 3, 2, 'SI'),
(10, 1, 4, 1, 'SI'),
(11, 1, 4, 2, 'SI'),
(12, 1, 4, 3, 'SI'),
(13, 1, 4, 4, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_seccion`
--

CREATE TABLE IF NOT EXISTS `m_seccion` (
  `m_seccion_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_seccion_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_seccion_descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`m_seccion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `m_seccion`
--

INSERT INTO `m_seccion` (`m_seccion_id`, `m_seccion_nombre`, `m_seccion_descripcion`) VALUES
(1, 'Clientes', 'Para la gestión y registro de clientes'),
(2, 'Categorias', 'Para ingresar las categorías en las que se puede publicar'),
(3, 'Ventas', 'Para los reportes de ventas '),
(4, 'Ofertas', 'Para las ofertas de ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_usuario`
--

CREATE TABLE IF NOT EXISTS `m_usuario` (
  `m_usuario_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_usuario_login` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_usuario_password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_usuario_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_usuario_apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_grupo_id` int(4) NOT NULL,
  `m_usuario_status` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_usuario_correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`m_usuario_id`),
  KEY `idgrupo` (`m_grupo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `m_usuario`
--

INSERT INTO `m_usuario` (`m_usuario_id`, `m_usuario_login`, `m_usuario_password`, `m_usuario_nombre`, `m_usuario_apellido`, `m_grupo_id`, `m_usuario_status`, `m_usuario_correo`) VALUES
(1, 'jalfonzo', 'a35400f5d75488e299037db1895d2ee8', 'Jesús', 'Alfonzo', 1, 'A', 'jesushalfonzo@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `m_ventas`
--

INSERT INTO `m_ventas` (`m_venta_id`, `m_venta_idOferta`, `m_venta_idUsuario`, `m_venta_fecha`, `m_vanta_cantidad`) VALUES
(1, 6, 4, 0, 1),
(2, 6, 4, 2016, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_medias`
--

CREATE TABLE IF NOT EXISTS `r_medias` (
  `r_media_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_media_idOferta` int(11) NOT NULL,
  `r_media_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`r_media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `r_medias`
--

INSERT INTO `r_medias` (`r_media_id`, `r_media_idOferta`, `r_media_path`) VALUES
(1, 0, 'b9eba010241d8bc494b9ab5512d10010.png'),
(2, 0, '9cd492b1824d6e51cc95f8bf435a4765.png'),
(3, 0, '2c5e62673e6e6277cf8bc28dcaa23b77.png'),
(7, 7, '221ed52302e751ef9a131eb2b267abd7.png'),
(8, 7, '92803379330348f563a5fc35ce41882d.png'),
(10, 7, '648ce6f552a193d2f081a36ac4696946.png'),
(11, 0, 'e5bd2679049b96ab2cfeb324154b7f47.png'),
(12, 8, '5b0e65e306dba810d0f7e908e2fa025a.png'),
(13, 0, '4d0db16302b4c7dc47e5ac879caffe67.png'),
(14, 6, 'e49628c758ecbfd112d99c5f07bae19d.png'),
(15, 6, '8faf059736b098ee5940b8375e424f20.png');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `m_ofertas`
--
ALTER TABLE `m_ofertas`
  ADD CONSTRAINT `idcategoria` FOREIGN KEY (`m_oferta_idCategoria`) REFERENCES `m_categorias` (`m_categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iddelclientevendedor` FOREIGN KEY (`m_oferta_idCliente`) REFERENCES `m_clientes` (`m_cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `m_permiso`
--
ALTER TABLE `m_permiso`
  ADD CONSTRAINT `accionid` FOREIGN KEY (`m_accion_id`) REFERENCES `m_acciones` (`m_acciones_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grupoid` FOREIGN KEY (`m_grupo_id`) REFERENCES `m_grupo` (`m_grupo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `seccionid` FOREIGN KEY (`m_seccion_id`) REFERENCES `m_seccion` (`m_seccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `m_usuario`
--
ALTER TABLE `m_usuario`
  ADD CONSTRAINT `idgrupo` FOREIGN KEY (`m_grupo_id`) REFERENCES `m_grupo` (`m_grupo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `m_ventas`
--
ALTER TABLE `m_ventas`
  ADD CONSTRAINT `ClienteUsuarioId` FOREIGN KEY (`m_venta_idUsuario`) REFERENCES `m_clientes` (`m_cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ofertaid` FOREIGN KEY (`m_venta_idOferta`) REFERENCES `m_ofertas` (`m_oferta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
