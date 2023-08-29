-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2023 a las 00:52:25
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zehlendorf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE `aros` (
  `id_aros` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `diametro` float NOT NULL,
  `ancho` float NOT NULL,
  `pernos` float NOT NULL,
  `pcd` float NOT NULL,
  `et` float NOT NULL,
  `cb` float NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id_aros`, `nombre`, `modelo`, `diametro`, `ancho`, `pernos`, `pcd`, `et`, `cb`, `color`) VALUES
(1, 'N RO A875 15X7.0 4X100 ET25 CB(73.1) XB', '151032', 15, 7, 4, 100, 25, 73.1, 'XB'),
(2, 'N RO 157088 15X7.0 4X100 4X114.3 BLACK MACHINE FACE', '7088', 15, 7, 4, 100, 0, 0, 'BLACK MACHINE FACE'),
(3, 'N RO 5819 15X7.0 4X100 4X114.3 BLUE UNDERCUT BLACK MACHINE FACE', 'RO 5819', 15, 7, 4, 100, 0, 0, 'BLUE UNDERCUT BLACK MACHINE FACE'),
(4, 'N HC 15Y5171A 15X6.5 5X100 MB', '5171A', 15, 6.5, 5, 100, 0, 0, 'MB');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id_aros`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aros`
--
ALTER TABLE `aros`
  MODIFY `id_aros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
