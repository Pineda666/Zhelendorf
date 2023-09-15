-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2023 a las 15:49:36
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
  `pcd` varchar(50) NOT NULL,
  `et` float NOT NULL,
  `cb` float NOT NULL,
  `color` varchar(50) NOT NULL,
  `vehiculo` varchar(50) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aro`
--

INSERT INTO `aro` (`id_aro`, `nombre`, `modelo`, `diametro`, `ancho`, `pernos`, `pcd`, `et`, `cb`, `color`, `vehiculo`, `id_tipo_producto`, `estado`) VALUES
(1, '6093 13X7.0 4X100-4X108 ET:0 CB:73.1 B MACH+B LINE', 'ufeff6093', 13, 7, 4, '100/108', 0, 73.1, 'B MACH+B LINE', 'auto', 1, 'a'),
(2, '13P2228A 13X5.5 4X100-4X114.3 ET:35 CB:73.1 MB', '13P2228A', 13, 5.5, 4, '100/114.3', 35, 73.1, 'MB', 'auto', 1, 'a'),
(3, 'JA036B 13X6.0 4X100 ET:-6 CB:73 LSB3SZ8', 'JA036B', 13, 6, 4, '100', -6, 73, 'LSB3SZ8', 'auto', 1, 'a'),
(4, '13CJA035H 13X6.0 4X100-4X114 ET:-6 CB:73.1 FS1', '13CJA035H', 13, 6, 4, '100/114.3', -6, 73.1, 'FS1', 'auto', 1, 'd'),
(5, '2228 13X5.5 4X100-4X114 ET:35 CB:73.1 FSG DARK GM MF', '2228', 13, 5.5, 4, '100/114.3', 35, 73.1, 'FSG DARK GM MF', 'auto', 1, 'a'),
(6, '13PJA035F 13×6.0 4X100-4X108 ET:-6 CB:73.1 FSB3', '13PJA035F', 13, 6, 4, '100/108', -6, 73.1, 'FSB3', 'auto', 1, 'a'),
(7, '13P2228A 13X5.5 4X100-4X114.3 ET:35 CB:73.1 MB', '13P2228A', 13, 5.5, 4, '100', 35, 73.1, 'MB', 'auto', 1, 'a'),
(8, '2228 13X5.5 4X100-4X114 ET:35 CB:73.1 FSG BLACK MF', '2228', 13, 5.5, 4, '100/114.3', 35, 73.1, 'FSG BLACK MF', 'auto', 1, 'd'),
(9, '7003 14X5.5 4X100-4X114.3 ET:30 CB:73.1 B4NLTR', '7003', 14, 5.5, 4, '100/114.3', 30, 73.1, 'B4NLTR', 'auto', 1, 'd'),
(10, '5297D 14X5.5 4X100-4X114.3 ET:35 CB:73.1 BM FACE', '5297D', 14, 5.5, 4, '100/114.3', 35, 73.1, 'BM FACE', 'auto', 1, 'd'),
(11, 'DM622 15X7.0 4X100-4X114.3 ET:35 CB:73.1 B4NLTU4', 'DM622', 15, 7, 4, '100/114.3', 35, 73.1, 'B4NLTU4', 'auto', 1, 'd'),
(12, 'H039-5 15X6.5 4X100 ET:35 CB:73.1 MATT BLACK', 'H039-5', 15, 6.5, 4, '100', 35, 73.1, 'MATT BLACK', 'auto', 1, 'd'),
(13, 'H231 15X8.0 hueXesp ET:20 CB:73.1 DARK G+L P+L', 'H231', 15, 8, 4, '-', 20, 73.1, 'DARK G+L P+L', 'auto', 1, 'd'),
(14, 'H002-5 15X6 5X114.3 ET:35 CB:73.1 MATT BLACK', 'H002-5', 15, 6, 5, '114.3', 35, 73.1, 'MATT BLACK', 'auto', 1, 'd'),
(15, 'DM622 15X7.0 8X100-114.3 ET:35 CB:73.1 B4NLTR', 'DM622', 15, 7, 4, '100/114.3', 35, 73.1, 'B4NLTR', 'auto', 1, 'd'),
(16, 'DM7003 15X7 8X100-114.3 ET:35 CB:73.1 B4NL', 'DM7003', 15, 7, 4, '100/114.3', 35, 73.1, 'B4NL', 'auto', 1, 'a'),
(17, 'DM7003 15X7.0 4X100-4X114 ET:35 CB:73.1 B4NLTU4', 'DM7003', 15, 7, 4, '100/114.3', 35, 73.1, 'B4NLTU4', 'auto', 1, 'd'),
(18, 'CIRCUIT 15X6.0 4X100-4X108 ET:35 CB:73.1 SILVER', 'CIRCUIT', 15, 6, 4, '100/108', 35, 73.1, 'SILVER', 'auto', 1, 'a'),
(19, '7090 15X7.0 4X100/4X108 ET:35 CB:73.1 BLACK VC MACHINE', '7090', 15, 7, 4, '100/108', 35, 73.1, 'BLACK VC MACHINE', 'auto', 1, 'd'),
(20, 'VLF-C05 15X8.0 4X100-4X114.3 ET:25 CB:73.1 MB', 'VLF-C05', 15, 8, 4, '100/114.3', 25, 73.1, 'MB', 'auto', 1, 'd'),
(21, 'VLF-C05 15X8.0 4X100-4X114.3 ET:25 CB:73.1 GOLD', 'VLF-C05', 15, 8, 4, '100/114.3', -1, -1, 'GOLD', 'auto', 1, 'd'),
(22, '502 15X6.5 4X100 ET:40 CB:73.1 FSB', '502', 15, 6.5, 4, '100', 40, 73.1, 'FSB', 'auto', 1, 'd'),
(23, 'Y0073 15X6.5 4X100 ET:38 CB:73.1 60 MATT BLACK', 'Y0073', 15, 6.5, 4, '100', 38, 73.1, '60 MATT BLACK', 'auto', 1, 'd'),
(24, '14PJA115B 15X6.5 4X100-4X114.3 ET:25 CB:73.1 FSB3', '14PJA115B', 15, 6.5, 4, '100/114.3', 25, 73.1, 'FSB3', 'auto', 1, 'a'),
(25, '749 15X8.0 5X114.3 ET:0 CB:84 BG1', '749', 15, 8, 5, '114.3', 0, 84, 'BG1', 'auto', 1, 'd'),
(26, 'RAYS CLUB 16X7.0 8X100-114.3 ET:40 CB:73.1 BMF', 'RAYS CLUB', 16, 7, 4, '100/114.3', 40, 73.1, 'BMF', 'auto', 1, 'd'),
(27, 'Y0073 16X7.0 4X100 ET:40 CB:73.1 60 MATT BLACK', 'Y0073', 16, 7, 4, '100', 40, 73.1, '60 MATT BLACK', 'auto', 1, 'd'),
(28, 'VLF11 16X7.0 4X100 ET:38 CB:73.1 HYPER BLACK', 'VLF11', 16, 7, 4, '100', 38, 73.1, 'HYPER BLACK', 'auto', 1, 'd'),
(29, '5120 16X7.0 4X100 ET:35 CB:67.1 BMF', '5120', 16, 7, 4, '100', 35, 67.1, 'BMF', 'auto', 1, 'd'),
(30, '502 16X7.0 4X100 ET:40 CB:73.1 FSB2', '502', 16, 7, 4, '100', 40, 73.1, 'FSB2', 'auto', 1, 'd'),
(31, 'H088-6 16X7 5X114.3 ET:35 CB:73.1 MATT BLACK', 'H088-6', 16, 7, 5, '114.3', 35, 73.1, 'MATT BLACK', 'auto', 1, 'd'),
(32, 'JA157 16X7.0 4X100-4X114.3 ET:35 CB:73 HYPER BLACK', 'JA157', 16, 7, 4, '100/114.3', 35, 73, 'HYPER BLACK', 'auto', 1, 'a');

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
(4, 'SPK6601 - 55 watts 7\"', 3),
(5, 'SPK6601 - 55 watts 7\"', 3);

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
(6, 'BRIDGESTONE 225/65R17 DUELER AT REVO 2', 'DUELER AT REVO 2', 225, 65, 17, 2, 2, 'd'),
(7, 'DUNLOP 225/60R17 99H SP SPORT 270', 'SP SPORT 270', 225, 60, 17, 4, 2, 'd'),
(8, 'DUNLOP 235/40R18 95W DZ102', 'DZ102', 235, 40, 18, 4, 2, 'd'),
(9, 'DUNLOP 165/60R14 75T -SP TOOURING R1 TH', '-SP TOOURING R1 TH', -165, 60, 14, 4, 2, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_llanta`
--

CREATE TABLE `marca_llanta` (
  `id_marca_llanta` int(11) NOT NULL,
  `marca_llanta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca_llanta`
--

INSERT INTO `marca_llanta` (`id_marca_llanta`, `marca_llanta`) VALUES
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
  MODIFY `id_aro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `faro`
--
ALTER TABLE `faro`
  MODIFY `id_faro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `llanta`
--
ALTER TABLE `llanta`
  MODIFY `id_llanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
