-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2023 a las 15:35:42
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
-- Estructura de tabla para la tabla `accesorio`
--

CREATE TABLE `accesorio` (
  `id_accesorio` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `id_tipo_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `accesorio`
--

INSERT INTO `accesorio` (`id_accesorio`, `nombre`, `descripcion`, `id_tipo_producto`) VALUES
(1, 'Tapas demonium', 'Para diametro de aro 18', 4),
(2, 'ADAPTADOR-MEDIDA-1.25-Y-1.50', 'ADAPTADOR-MEDIDA-1.25-Y-1.50', 4),
(3, 'TUERCA-21-MEDIDA-1.25-Y-1.50', 'TUERCA-21-MEDIDA-1.25-Y-1.50', 4),
(4, 'TUERCA-19-MEDIDA-1.25-Y-1.50', 'TUERCA-19-MEDIDA-1.25-Y-1.50', 4),
(5, 'Logos de tapas', 'Logos de tapas', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aro`
--

CREATE TABLE `aro` (
  `id_aro` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `diametro` float NOT NULL,
  `ancho` float NOT NULL,
  `pernos` float NOT NULL,
  `pcd` float NOT NULL,
  `et` float NOT NULL,
  `cb` float NOT NULL,
  `color` varchar(50) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aro`
--

INSERT INTO `aro` (`id_aro`, `nombre`, `modelo`, `diametro`, `ancho`, `pernos`, `pcd`, `et`, `cb`, `color`, `id_tipo_producto`, `estado`) VALUES
(1, 'N RO A875 15X7.0 4X100 ET25 CB(73.1) XB', '151032', 15, 7, 4, 100, 25, 73.1, 'XB', 1, 'd'),
(2, 'N RO 157088 15X7.0 4X100 4X114.3 BLACK MACHINE FACE', '7088', 15, 7, 4, 100, -1, -1, 'BLACK MACHINE FACE', 1, 'd'),
(3, 'N RO 5819 15X7.0 4X100 4X114.3 BLUE UNDERCUT BLACK MACHINE FACE', 'RO 5819', 15, 7, 4, 100, -1, -1, 'BLUE UNDERCUT BLACK MACHINE FACE', 1, 'd'),
(4, 'N HC 15Y5171A 15X6.5 5X100 MB', '5171A', 15, 6.5, 5, 100, -1, -1, 'MB', 1, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faro`
--

CREATE TABLE `faro` (
  `id_faro` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `faro`
--

INSERT INTO `faro` (`id_faro`, `nombre`, `id_tipo_producto`) VALUES
(1, 'SPK6601 - 55 watts', 3),
(2, 'SPK1022 - 16 watts 3\"', 3),
(3, '48 watts 4\"', 3),
(6, 'SPK6601 - 55 watts 7\"', 3),
(7, 'SPK6601 - 55 watts 7\"', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llanta`
--

CREATE TABLE `llanta` (
  `id_llanta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ancho_llanta` int(11) NOT NULL,
  `perfil_llanta` int(11) NOT NULL,
  `diametro_aro` int(11) NOT NULL,
  `id_marca_llanta` int(11) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `llanta`
--

INSERT INTO `llanta` (`id_llanta`, `nombre`, `modelo`, `ancho_llanta`, `perfil_llanta`, `diametro_aro`, `id_marca_llanta`, `id_tipo_producto`, `estado`) VALUES
(1, 'BEARWAY 215/45 ZR17 91W YS618', 'YS618', 215, 45, 17, 1, 2, 'd'),
(2, 'BRIDGESTONE 245/65R17 DUELER AT REVO 2', 'DUELER AT REVO 2', 245, 65, 17, 2, 2, 'd'),
(3, 'BRIDGESTONE 265/70R16 112S AT D694 OWT 3', 'AT D694 OWT 3', 265, 70, 16, 2, 2, 'd'),
(4, 'BRIDGESTONE 265/65R17 112T DUELER AT REVO 2', 'DUELER AT REVO 2', 265, 65, 17, 2, 2, 'd'),
(5, 'BRIDGESTONE 205/55R17 91W TURANZA T001', 'TURANZA T001', 205, 55, 17, 2, 2, 'd'),
(6, 'BRIDGESTONE 225/65R17 DUELER AT REVO 2', 'DUELER AT REVO 2', 225, 65, 17, 2, 2, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_llanta`
--

CREATE TABLE `marca_llanta` (
  `id_marca_llanta` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca_llanta`
--

INSERT INTO `marca_llanta` (`id_marca_llanta`, `marca`) VALUES
(1, 'Bearway'),
(2, 'Bridgestone'),
(3, 'Double Star'),
(4, 'Dunlop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_producto`, `tipo`) VALUES
(1, 'aro'),
(2, 'llanta'),
(3, 'faro'),
(4, 'accesorio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorio`
--
ALTER TABLE `accesorio`
  ADD PRIMARY KEY (`id_accesorio`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `aro`
--
ALTER TABLE `aro`
  ADD PRIMARY KEY (`id_aro`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `faro`
--
ALTER TABLE `faro`
  ADD PRIMARY KEY (`id_faro`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `llanta`
--
ALTER TABLE `llanta`
  ADD PRIMARY KEY (`id_llanta`),
  ADD KEY `id_marca_llanta` (`id_marca_llanta`),
  ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `marca_llanta`
--
ALTER TABLE `marca_llanta`
  ADD PRIMARY KEY (`id_marca_llanta`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorio`
--
ALTER TABLE `accesorio`
  MODIFY `id_accesorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `aro`
--
ALTER TABLE `aro`
  MODIFY `id_aro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `faro`
--
ALTER TABLE `faro`
  MODIFY `id_faro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `llanta`
--
ALTER TABLE `llanta`
  MODIFY `id_llanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marca_llanta`
--
ALTER TABLE `marca_llanta`
  MODIFY `id_marca_llanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesorio`
--
ALTER TABLE `accesorio`
  ADD CONSTRAINT `accesorio_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aro`
--
ALTER TABLE `aro`
  ADD CONSTRAINT `aro_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `faro`
--
ALTER TABLE `faro`
  ADD CONSTRAINT `faro_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `llanta`
--
ALTER TABLE `llanta`
  ADD CONSTRAINT `llanta_ibfk_1` FOREIGN KEY (`id_marca_llanta`) REFERENCES `marca_llanta` (`id_marca_llanta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `llanta_ibfk_2` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
