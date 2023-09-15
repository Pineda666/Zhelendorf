-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-09-2023 a las 16:04:46
-- Versión del servidor: 5.6.51-cll-lve
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `accesorio`
--

INSERT INTO `accesorio` (`id_accesorio`, `nombre`, `descripcion`, `id_tipo_producto`) VALUES
(1, 'Tapas demonium', 'Para diametro de aro 18', 4),
(2, 'Logos de tapas', 'Logos de tapas', 4),
(3, 'TUERCA-19-MEDIDA-1.25-Y-1.50', 'TUERCA-19-MEDIDA-1.25-Y-1.50', 4),
(4, 'TUERCA-21-MEDIDA-1.25-Y-1.50', 'TUERCA-21-MEDIDA-1.25-Y-1.50', 4),
(5, 'ADAPTADOR-MEDIDA-1.25-Y-1.50', 'ADAPTADOR-MEDIDA-1.25-Y-1.50', 4),
(6, 'PITON-DE-COLORES', 'PITON-DE-COLORES', 4),
(7, 'PITON-CROMADO', 'PITON-CROMADO', 4),
(8, 'LLAVE-DE-SEGURO', 'LLAVE-DE-SEGURO', 4),
(9, 'TUERCAS-12mm-DE-COLORES-Medida-1.25-y-1.50-', 'TUERCAS-12mm-DE-COLORES-Medida-1.25-y-1.50-', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aro`
--

CREATE TABLE `aro` (
  `id_aro` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `diametro` float NOT NULL,
  `ancho` float NOT NULL,
  `pernos` float NOT NULL,
  `pcd` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `et` float NOT NULL,
  `cb` float NOT NULL,
  `color` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vehiculo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `estado` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aro`
--

INSERT INTO `aro` (`id_aro`, `nombre`, `modelo`, `diametro`, `ancho`, `pernos`, `pcd`, `et`, `cb`, `color`, `vehiculo`, `id_tipo_producto`, `estado`) VALUES
(1, '6093 13X7.0 4X100-4X108 ET:0 CB:73.1 B MACH+B LINE', 'ufeff6093', 13, 7, 4, '100/108', 0, 0, 'B MACH+B LINE', 'auto', 1, 'a'),
(2, '13P2228A 13X5.5 4X100-4X114.3 ET:35 CB:73.1 MB', '13P2228A', 13, 5.5, 4, '100/114.3', 35, 73.1, 'MB', 'auto', 1, 'a'),
(3, 'JA036B 13X6.0 4X100 ET:-6 CB:73 LSB3SZ8', 'JA036B', 13, 6, 4, '100', 6, 73, 'LSB3SZ8', 'auto', 1, 'a'),
(4, '13CJA035H 13X6.0 4X100-4X114 ET:-6 CB:73.1 FS1', '13CJA035H', 13, 6, 4, '100/114.3', 6, 73.1, 'FS1', 'auto', 1, 'd'),
(5, '2228 13X5.5 4X100-4X114 ET:35 CB:73.1 FSG DARK GM MF', '2228', 13, 5.5, 4, '100/114.3', 35, 73.1, 'FSG DARK GM MF', 'auto', 1, 'a'),
(6, '13PJA035F 13X6.0 4X100-4X108 ET:-6 CB:73.1 FSB3', '13PJA035F', 13, 6, 4, '100/108', 6, 73.1, 'FSB3', 'auto', 1, 'a'),
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
(21, 'VLF-C05 15X8.0 4X100-4X114.3 ET:25 CB:73.1 GOLD', 'VLF-C05', 15, 8, 4, '100/114.3', 1, 1, 'GOLD', 'auto', 1, 'd'),
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
(32, 'JA157 16X7.0 4X100-4X114.3 ET:35 CB:73 HYPER BLACK', 'JA157', 16, 7, 4, '100/114.3', 35, 73, 'HYPER BLACK', 'auto', 1, 'a'),
(33, 'DIM1002 18X9 5X127 CZ1', 'DIM1002', 18, 9, 5, '127', 0, 0, '', 'camioneta', 1, 'd'),
(34, 'N KIA ORIGINAL 19X7.5 5X114.3 SILVER', 'KIA', 19, 7.5, 5, '114.3', 0, 0, 'SILVER', 'camioneta', 1, 'd'),
(35, 'N HC-15E8127B 15X7.0 5X114.3 ET-10 CB73.1 MB', 'HC-15E8127B', 15, 7, 5, '114.3', 10, 73.1, 'MB', 'camioneta', 1, 'd'),
(36, 'N HC-14F5093A 14X5.5 4X100 ET35 CB73.1 MB', 'HC-14F5093A', 14, 5.5, 4, '100', 35, 73.1, 'MB', 'auto', 1, 'd'),
(37, 'N HC-14F3007A 14X5.0 4X100 MB', 'MB', 14, 5, 4, '100', 0, 0, 'MB', 'auto', 1, 'a'),
(38, 'N RO RW-147088 14X6.0 4X100-4X114.3 BLACK MACHINE FACE', 'RW-147088', 14, 6, 4, '100/114.3', 0, 0, 'BLACK MACHINE FACE', 'auto', 1, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faro`
--

CREATE TABLE `faro` (
  `id_faro` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `faro`
--

INSERT INTO `faro` (`id_faro`, `nombre`, `id_tipo_producto`) VALUES
(1, 'SPK6601 - 55 watts', 3),
(2, 'SPK6601 - 55 watts 7\"', 3),
(3, 'SPK6601 - 55 watts 7\"', 3),
(4, '48 watts 4\"', 3),
(5, 'SPK1022 - 16 watts 3\"', 3),
(6, 'SPK1015 - 51 watts 7\"', 3),
(7, 'SPK1015B - 51 watts 7\"', 3),
(8, 'SPK1015 - 90 watts 8\"', 3),
(9, 'SPK3400 - 18 watts 4\"', 3),
(10, 'SPK3401 - 108 watts 9\"', 3),
(11, 'SPK3401 - 72 watts 6.5\"', 3),
(12, 'SPK3401 - 36 watts 4\"', 3),
(13, 'SPK3400 - 36 watts 6.5\"', 3),
(14, 'SPK31001 - 60 watts 11.5\"', 3),
(15, 'SPK31001 - 36 watts 7.5\"', 3),
(16, 'SPK3401 - 36 watts 4\"', 3),
(17, 'SPK31001 - 36 watts 7.5\"', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llanta`
--

CREATE TABLE `llanta` (
  `id_llanta` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ancho_llanta` int(11) NOT NULL,
  `perfil_llanta` int(11) NOT NULL,
  `diametro_aro` int(11) NOT NULL,
  `id_marca_llanta` int(11) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `estado` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `llanta`
--

INSERT INTO `llanta` (`id_llanta`, `nombre`, `modelo`, `ancho_llanta`, `perfil_llanta`, `diametro_aro`, `id_marca_llanta`, `id_tipo_producto`, `estado`) VALUES
(1, 'HANKOOK 165/65R14T K715', 'K715', 165, 65, 14, 5, 2, 'd'),
(2, 'ROADKING 185/65R14 86H ARGOS AX5', 'ARGOS AX5', 185, 65, 14, 6, 2, 'd'),
(3, 'BRIDGESTONE 235/65R17 108V DHP SPORT AS', 'DHP SPORT AS', 235, 65, 17, 2, 2, 'd'),
(4, 'LING LONG 175/70R14 88H CROSSWIND AT T D 8 2 MM', 'CROSSWIND AT T D 8.2 MM', 175, 70, 14, 7, 2, 'd'),
(5, 'DUNLOP 235/40R18 95W DZ102', 'DZ102', 235, 40, 18, 4, 2, 'd'),
(6, 'NANKANG 195/55ZR15 89W NS-2R XLL (180)', 'NS-2R XLL (180)', 195, 55, 15, 8, 2, 'd'),
(7, 'BEARWAY 205/50ZR17 93W YS618', 'YS618', 205, 50, 17, 1, 2, 'd'),
(8, 'HANKOOK 185/70R14T K715', 'K715', 185, 70, 14, 5, 2, 'd'),
(9, 'SUNFULL 205/70R14 95H SF688', 'SF688', 205, 70, 14, 9, 2, 'd'),
(10, 'BRIDGESTONE 245/65R17 DUELER AT REVO 2', 'DUELER AT REVO 2', 245, 65, 17, 2, 2, 'd'),
(11, 'LING LONG 195/60R15 88H GREEN-MAX HP010', 'GREEN-MAX HP010', 195, 60, 15, 7, 2, 'd'),
(12, 'ECOVISION 225/55R18 98V VI-386 HP', 'VI-386 HP', 225, 55, 18, 10, 2, 'd'),
(13, 'NANKANG 225/45ZR17 94W NS-2R XLL (120)', 'NS-2R XLL (120)', 225, 45, 17, 8, 2, 'd'),
(14, 'BEARWAY 215/45 ZR17 91W YS618', 'YS618', 215, 45, 17, 1, 2, 'd'),
(15, 'HANKOOK 205/60R16V K425', 'K425', 205, 60, 16, 5, 2, 'd'),
(16, 'SUNFULL 245/45R18 100WXL SF888', 'XL SF888', 245, 45, 18, 9, 2, 'd'),
(17, 'BRIDGESTONE 265/65R17 120Q DUELER MT 674I', 'DUELER MT 674I', 265, 65, 17, 2, 2, 'd'),
(18, 'KAPSEN P215/70R16 100T PRACTICAL MAX AT', 'PRACTICAL MAX AT', 215, 70, 16, 11, 2, 'd'),
(19, 'DUNLOP 195/65R15 91H SP TOURING R1 IND', 'SP TOURING R1 IND', 195, 65, 15, 4, 2, 'd'),
(20, 'MAXXIS 205/ZR16 MAZ1 91W', 'MAZ1', 205, 65, 16, 12, 2, 'd'),
(21, 'GOOD YEAR 205/55R16 DIRECTION SPORT 91H', 'DIRECTION SPORT', 205, 55, 16, 13, 2, 'd'),
(22, 'RAPIDASH 205/60R14 88V RX-1', 'RX-1', 205, 60, 14, 14, 2, 'd'),
(23, 'BRIDGESTONE 205/55R17 91W TURANZA T001', 'TURANZA T001', 205, 55, 17, 2, 2, 'd'),
(24, 'KAPSEN P235/70R16 106T PRACTICAL MAX AT', 'PRACTICAL MAX AT', 235, 70, 16, 11, 2, 'd'),
(25, 'DUNLOP 195/55 R15 85V DZ102', 'DZ102', 195, 55, 15, 4, 2, 'd'),
(26, 'MAXXIS 215/55ZR16 MAZ3 97W', 'MAZ3', 215, 55, 16, 12, 2, 'd'),
(27, 'GOOD YEAR 185/0R13 ASSURANCE MAXLIFE 86T', 'ASSURANCE MAXLIFE', 185, 0, 13, 13, 2, 'd'),
(28, 'RAPIDASH 205/5ZR16 91W RX-1', 'RX-1', 205, 55, 16, 14, 2, 'd'),
(29, 'BRIDGESTONE 225/65R17 DUELER AT REVO 2', 'DUELER AT REVO 2', 225, 65, 17, 2, 2, 'd'),
(30, 'LING LONG 175/70R14 84T GREEN-MAX ECO TOURING', 'GREEN-MAX ECO TOURING', 175, 70, 14, 7, 2, 'd'),
(31, 'DUNLOP 225/60R17 99H SP SPORT 270', 'SP SPORT 270', 225, 60, 17, 4, 2, 'd'),
(32, 'NANKANG 195/50ZR15 86W NS-2R XLL (180)', 'NS-2R XLL (180)', 195, 50, 15, 8, 2, 'd'),
(33, 'HIFLY 195/R14C 8PR 106-104 SUPER2000', '106-104 SUPER2000', 195, 0, 14, 15, 2, 'd'),
(34, 'DOUBLE STAR 185/70R13 86T MAXIMUM DH05', 'MAXIMUM DH05', 185, 70, 13, 3, 2, 'd'),
(35, 'MAXXIS 225/50ZR17 MAZ4S 98W', 'MAZ4S', 225, 50, 17, 12, 2, 'd'),
(36, 'FRONWAY 275/45R20 110V EURUS 07', 'EURUS 07', 275, 45, 20, 16, 2, 'd'),
(37, 'RAPIDASH 205/50ZR15 84W RX-1', 'RX-1', 205, 50, 15, 14, 2, 'd'),
(38, 'BRIDGESTONE 185/65R15 88T ECOPIA EP150', 'ECOPIA EP150', 185, 65, 15, 2, 2, 'd'),
(39, 'HIFLY 245/40R18 HF805', 'HF805', 245, 40, 18, 15, 2, 'd'),
(40, 'DOUBLE STAR 205/70R15C 8PR DL01', 'C 8PR DL01', 205, 70, 15, 3, 2, 'd'),
(41, 'MAXXIS 265/65R17 AT811 112T', 'AT811', 265, 65, 17, 12, 2, 'd'),
(42, 'GOOD YEAR 185/65R14 ASSURANCE MAXLIFE 86H', 'ASSURANCE MAXLIFE', 185, 65, 14, 13, 2, 'd'),
(43, 'BRIDGESTONE 225/60R17 DUELER H-T 684 II', 'DUELER H-T 684 II', 225, 60, 17, 2, 2, 'd'),
(44, 'HIFLY 275/40 ZR20 106Y SPORT XV1', 'SPORT XV1', 275, 40, 20, 15, 2, 'd'),
(45, 'DUNLOP 165/60R14 75T -SP TOOURING R1 TH', 'SP TOOURING R1 TH', 165, 60, 14, 4, 2, 'd'),
(46, 'MAXXIS LT265/65R17 MT764 8PR 117-114Q', 'MT764 117-114Q', 265, 65, 17, 12, 2, 'd'),
(47, 'GOOD YEAR 185/70R13 EAGLE VENTURA 86H', 'EAGLE VENTURA', 185, 70, 13, 13, 2, 'd'),
(48, 'MAXXIS 205/50R15 MAZ1 89V', 'MAZ1', 205, 50, 15, 12, 2, 'd'),
(49, 'GOOD YEAR 185/70R14 DIRECTION TOURING 2 88H', 'DIRECTION TOURING 2', 185, 70, 14, 13, 2, 'd'),
(50, 'RAPIDASH 205/60R13 86V RX-1', 'RX-1', 205, 60, 13, 14, 2, 'd'),
(51, 'TOURADOR 225/70R15C 8PR RWL X FORCE AT', 'RWL X FORCE AT', 225, 70, 15, 17, 2, 'd'),
(52, 'NANKANG 245/40ZR20 95Y NS2', 'NS2', 245, 40, 20, 8, 2, 'd'),
(53, 'PIRELLI 205/60R15 91H SCORPION ATR BR', 'SCORPION ATR BR', 205, 60, 15, 18, 2, 'd'),
(54, 'MAXXIS 215/50ZR17 MAZ3 91W', 'MAZ3', 215, 50, 17, 12, 2, 'd'),
(55, 'KAPSEN 205/60R16 92V CONFORT MAX AS H202', 'CONFORT MAX AS H202', 205, 60, 16, 11, 2, 'd'),
(56, 'HANKOOK 235/60R18V RA33', 'RA33', 235, 60, 18, 5, 2, 'd'),
(57, 'FEDERAL 205/50ZR17 93W SUPER STEEL 595', 'SUPER STEEL 595', 205, 50, 17, 19, 2, 'd'),
(58, 'DUNLOP 175/70R14 88T SP TOURING R1', 'SP TOURING R1', 175, 70, 14, 4, 2, 'd'),
(59, 'BRIDGESTONE 265/70R16 112S AT D694 OWT 3', 'AT D694 OWT 3', 265, 70, 16, 2, 2, 'd'),
(60, 'BRIDGESTONE 265/65R17 112T DUELER AT REVO 2', 'DUELER AT REVO 2', 265, 65, 17, 2, 2, 'd'),
(61, 'BRIDGESTONE 225/65R17 DUELER HT D684 II', 'DUELER HT D684 II', 225, 65, 17, 2, 2, 'd'),
(62, 'BEARWAY 215/55ZR17 98W YS618', 'YS618', 215, 55, 17, 1, 2, 'd'),
(63, 'BEARWAY 225/45ZR18 95W YS618', 'YS618', 225, 45, 18, 1, 2, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_llanta`
--

CREATE TABLE `marca_llanta` (
  `id_marca_llanta` int(11) NOT NULL,
  `marca_llanta` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca_llanta`
--

INSERT INTO `marca_llanta` (`id_marca_llanta`, `marca_llanta`) VALUES
(1, 'Bearway'),
(2, 'Bridgestone'),
(3, 'Double Star'),
(4, 'Dunlop'),
(5, 'Hankook'),
(6, 'Roadking'),
(7, 'Ling Long'),
(8, 'Nankang'),
(9, 'Sunfull'),
(10, 'Ecovision'),
(11, 'Kapsen'),
(12, 'Maxxis'),
(13, 'Good Year'),
(14, 'Rapidash'),
(15, 'Hifly'),
(16, 'Fronway'),
(17, 'Tourador'),
(18, 'Pirelli'),
(19, 'Federal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
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
  MODIFY `id_accesorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `aro`
--
ALTER TABLE `aro`
  MODIFY `id_aro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `faro`
--
ALTER TABLE `faro`
  MODIFY `id_faro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `llanta`
--
ALTER TABLE `llanta`
  MODIFY `id_llanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `marca_llanta`
--
ALTER TABLE `marca_llanta`
  MODIFY `id_marca_llanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
