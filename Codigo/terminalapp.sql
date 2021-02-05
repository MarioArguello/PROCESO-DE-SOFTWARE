-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 05-02-2021 a las 06:50:35
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `terminalapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleterias`
--

DROP TABLE IF EXISTS `boleterias`;
CREATE TABLE IF NOT EXISTS `boleterias` (
  `Id_Boleterias` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `estado` int(2) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Boleterias`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `cooperativa` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `tiempo`, `cooperativa`, `image`, `price`) VALUES
(1, 'Pedro Carbo', '1h 30min', 'Pedro Carbo', 'https://img.goraymi.com/2016/08/10/2c5c9a39492dc4065501ea844e44079f_lg.jpg', 2.00),
(2, 'Pedro Carbo', '1h 40min', 'Piedad', 'https://pbs.twimg.com/media/EdSrpnpXkAEFcJ_.jpg', 2.00),
(3, 'Pajan', '2h', 'Pajan', 'https://lahora.com.ec/contenido/cache/3b/al_corazon_del_pueblo__se_llega_con_obras_2010116080233-682x512.jpg', 4.00),
(4, 'Babahoyo', '1h 50min', 'FBI', 'https://goecuador.net/archivos/ciudades/babahoyo-goecuador.jpg', 2.50),
(5, 'Villamil Playas', '3h 10min', 'Villamil Playas', 'https://3.bp.blogspot.com/-UkHQhPHyWls/UCLd_wXcpeI/AAAAAAAADMw/u7tLjuPQtbw/s1600/Playas+General+Villamil+Playas.jpg', 5.00),
(6, 'Montañita', '3h', 'Libertad Peninsular', 'https://i.pinimg.com/originals/4e/33/2e/4e332e22ff60855468c878ded8205cb0.jpg', 8.00),
(7, 'Manabi', '2h 30min', 'Manabi', 'https://s.iha.com/00130377836/Provincia-manabi-Playa-de-los-frailes-en-el-parque-nacional-machalilla.jpeg', 3.00),
(8, 'Los Ríos', '4h', 'los Ríos ', 'https://www.fundacionaquae.org/wp-content/uploads/2015/04/rios2-e1563448555353.jpg', 5.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `telefono`, `correo`, `cedula`, `usuario`, `password`, `tipo`) VALUES
(1, 'Mario Antonio', 'Arguello Calle', '0982338714', 'arguellocalle@gmail.com', '0985698569', 'mariohack16', 'Anonymous15', 'cliente'),
(2, 'Samuel', 'Arguello', '0874589632', 'samuelarguello@gmail.com', '0874589652', 'Samuel_Arguello', 'samuel', 'cliente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
