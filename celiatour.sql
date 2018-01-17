-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-01-2018 a las 16:26:31
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `celiatour`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audio`
--

CREATE TABLE `audio` (
  `id_aud` int(11) NOT NULL,
  `url_aud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desc_aud` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_aud` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `audio`
--

INSERT INTO `audio` (`id_aud`, `url_aud`, `desc_aud`, `tipo_aud`) VALUES
(2, 'vistas/audio/files/Chinito Ft Chiche - Quieren matarme.mp3', 'Es una de mis canciones favoritas', 'v_guiada'),
(3, 'vistas/audio/files/one1.m4a', 'weew', 'd-objeto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escenas`
--

CREATE TABLE `escenas` (
  `id_escena` int(11) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `cod_escena` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hfov` int(11) NOT NULL,
  `pitch` int(11) NOT NULL,
  `yaw` int(11) NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `panorama` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `escenas`
--

INSERT INTO `escenas` (`id_escena`, `Nombre`, `cod_escena`, `hfov`, `pitch`, `yaw`, `tipo`, `panorama`) VALUES
(1, '', 'p2p2', 120, -3, 117, 'equirectangular', 'imagenes/primeraplanta/p2p2.JPG'),
(2, '', 'p2p2f1', 120, -4, -175, 'equirectangular', 'imagenes/primeraplanta/p2p2f1.JPG'),
(3, '', 'p2p2f2', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p2f2.JPG'),
(4, '', 'p2p2f3', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p2f3.JPG'),
(5, '', 'p2p3', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p3.JPG'),
(6, '', 'p2p4', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p4.JPG'),
(7, '', 'p2p4f3', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p4f3.JPG'),
(8, '', 'p2p4f2', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p4f2.JPG'),
(9, '', 'p2p4f4', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p4f4.JPG'),
(10, '', 'p2p5', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p5.JPG'),
(11, '', 'p2p6', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p6.JPG'),
(12, '', 'p2p7', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p7.JPG'),
(13, '', 'p2p72', 120, 0, 5, 'equirectangular', 'imagenes/primeraplanta/p2p72.JPG'),
(14, '', 'p2p8', 120, 0, 0, 'equirectangular', 'imagenes/primeraplanta/p2p8.JPG'),
(15, '', 'p2p1', 120, -8, 0, 'equirectangular', 'imagenes/primeraplanta/p2p1.JPG'),
(16, '', 'p2p10', 120, -8, 0, 'equirectangular', 'imagenes/primeraplanta/p2p10.JPG'),
(17, '', 'p1p1', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p1.JPG'),
(18, '', 'p1p2', 120, -44, -8, 'equirectangular', 'imagenes/bajaplanta/p1p2.JPG'),
(19, '', 'p1p2f1', 120, -8, 181, 'equirectangular', 'imagenes/bajaplanta/p1p2f1.JPG'),
(20, '', 'p1p2f2', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p2f2.JPG'),
(21, '', 'p1p2f3', 120, 19, 110, 'equirectangular', 'imagenes/bajaplanta/p1p2f3.JPG'),
(22, '', 'p1p22', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p22.JPG'),
(23, '', 'p1p3', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p3.JPG'),
(24, '', 'p1p32', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p32.JPG'),
(25, '', 'p1p4', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p4.JPG'),
(26, '', 'p1p32f1', 120, 0, 5, 'equirectangular', 'imagenes/bajaplanta/p1p32f1.JPG'),
(27, '', 'p1p32f2', 120, 0, 5, 'equirectangular', 'imagenes/bajaplanta/p1p32f2.JPG'),
(28, '', 'p1p5', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p5.JPG'),
(29, '', 'p1p5f1', 120, 22, 60, 'equirectangular', 'imagenes/bajaplanta/p1p5f1.JPG'),
(30, '', 'p1p6', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p6.JPG'),
(31, '', 'p1p7', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p7.JPG'),
(32, '', 'p1p72', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p72.JPG'),
(33, '', 'p1p8', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p8.JPG'),
(34, '', 'p1p9', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p9.JPG'),
(35, '', 'p1p9f1', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p9f1.JPG'),
(36, '', 'p1p9f2', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p9f2.JPG'),
(37, '', 'p1p11', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p11.JPG'),
(38, '', 'p1p10', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p10.JPG'),
(39, '', 'p1p12', 120, -8, 0, 'equirectangular', 'imagenes/bajaplanta/p1p12.JPG'),
(40, '', 'p0p0', 120, 190, -20, 'equirectangular', 'imagenes/sotanoplanta/p0p0.JPG'),
(41, '', 'p0p1', 120, -14, 175, 'equirectangular', 'imagenes/sotanoplanta/p0p1.JPG'),
(42, '', 'p0p1f1', 120, 172, 15, 'equirectangular', 'imagenes/sotanoplanta/p0p1f1.JPG'),
(43, '', 'p0p1f2', 120, -8, 0, 'equirectangular', 'imagenes/sotanoplanta/p0p1f2.JPG'),
(44, '', 'p0p2', 120, -14, 175, 'equirectangular', 'imagenes/sotanoplanta/p0p2.JPG'),
(45, '', 'p0p3', 120, -14, 175, 'equirectangular', 'imagenes/sotanoplanta/p0p3.JPG'),
(46, '', 'p0p4', 120, -14, 175, 'equirectangular', 'imagenes/sotanoplanta/p0p4.JPG'),
(47, '', 'p0p4f2', 120, 11, -9, 'equirectangular', 'imagenes/sotanoplanta/p0p4f2.JPG'),
(48, '', 'p0p5', 120, -14, 175, 'equirectangular', 'imagenes/sotanoplanta/p0p5.JPG'),
(49, '', 'p0p5f1', 120, -14, 175, 'equirectangular', 'imagenes/sotanoplanta/p0p5f1.JPG'),
(50, '', 'p0p5f2', 120, -14, 175, 'equirectangular', 'imagenes/sotanoplanta/p0p5f2.JPG'),
(51, '', 'p3p1', 120, -8, 0, 'equirectangular', 'imagenes/segundaplanta/p3p1.JPG'),
(52, '', 'p3p2', 120, -3, 117, 'equirectangular', 'imagenes/segundaplanta/p3p2.JPG'),
(53, '', 'p3p2f2', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p2f2.JPG'),
(54, '', 'p3p3', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p3.JPG'),
(55, '', 'p3p4', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p4.JPG'),
(56, '', 'p3p4f2', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p4f2.JPG'),
(57, '', 'p3p4f3', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p4f3.JPG'),
(58, '', 'p3p5', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p5.JPG'),
(59, '', 'p3p5f1', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p5f1.JPG'),
(60, '', 'p3p6', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p6.JPG'),
(61, '', 'p3p6f1', 120, -19, -181, 'equirectangular', 'imagenes/segundaplanta/p3p6f1.JPG'),
(62, '', 'p3p7', 120, 0, 5, 'equirectangular', 'imagenes/segundaplanta/p3p7.JPG'),
(63, '', 'p3p8', 120, 0, 0, 'equirectangular', 'imagenes/segundaplanta/p3p8.JPG'),
(64, '', 'p3p10', 120, -8, 0, 'equirectangular', 'imagenes/segundaplanta/p3p10.JPG'),
(65, '', 'p4p0', 120, -8, 0, 'equirectangular', 'imagenes/tejado/p4p0.JPG'),
(66, '', 'p4p1', 120, -14, 175, 'equirectangular', 'imagenes/tejado/p4p1.JPG'),
(67, '', 'p4p2', 120, -14, 175, 'equirectangular', 'imagenes/tejado/p4p2.JPG'),
(68, '', 'p4p3', 120, -86, -2, 'equirectangular', 'imagenes/tejado/p4p3.JPG'),
(69, '', 'p4p4', 120, -14, 175, 'equirectangular', 'imagenes/tejado/p4p4.JPG'),
(70, '', 'p4p5', 120, -14, 175, 'equirectangular', 'imagenes/tejado/p4p5.JPG'),
(71, '', 'pre', 120, 116, 25, 'equirectangular', 'imagenes/premio.png'),
(72, '', 'p2p2f1', 120, -14, 175, 'equirectangular', 'imagenes/primeraplanta/p2p2f1.JPG'),
(73, '', 'p0p4f2', 120, -14, 175, 'equirectangular', 'imagenes/sotanoplanta/p0p4f2.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escenas_hotspots`
--

CREATE TABLE `escenas_hotspots` (
  `id_escena` int(11) NOT NULL,
  `id_hotspot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `escenas_hotspots`
--

INSERT INTO `escenas_hotspots` (`id_escena`, `id_hotspot`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(3, 10),
(4, 11),
(5, 12),
(5, 13),
(6, 14),
(6, 15),
(6, 16),
(7, 17),
(7, 18),
(7, 19),
(8, 20),
(9, 21),
(10, 22),
(10, 23),
(11, 24),
(11, 25),
(12, 26),
(12, 27),
(13, 28),
(13, 29),
(14, 30),
(14, 31),
(15, 32),
(15, 33),
(15, 34),
(16, 35),
(17, 36),
(17, 37),
(17, 38),
(18, 39),
(18, 40),
(18, 41),
(18, 42),
(19, 43),
(19, 44),
(20, 45),
(20, 46),
(21, 47),
(22, 48),
(22, 49),
(23, 50),
(23, 51),
(24, 52),
(24, 53),
(24, 54),
(25, 55),
(25, 56),
(26, 57),
(26, 58),
(27, 59),
(28, 60),
(28, 61),
(28, 62),
(29, 63),
(30, 64),
(30, 65),
(30, 66),
(31, 67),
(31, 68),
(32, 69),
(32, 70),
(33, 71),
(33, 72),
(34, 73),
(34, 74),
(35, 75),
(35, 76),
(36, 77),
(37, 78),
(37, 79),
(38, 80),
(38, 81),
(39, 82),
(40, 83),
(40, 84),
(41, 85),
(41, 86),
(41, 87),
(42, 88),
(42, 89),
(43, 90),
(43, 91),
(44, 92),
(44, 93),
(45, 94),
(45, 95),
(46, 96),
(46, 97),
(46, 98),
(47, 99),
(48, 100),
(48, 101),
(48, 102),
(49, 103),
(49, 104),
(50, 105),
(51, 106),
(51, 107),
(51, 108),
(52, 109),
(52, 110),
(52, 111),
(52, 112),
(53, 113),
(54, 114),
(54, 115),
(55, 116),
(55, 117),
(55, 118),
(55, 119),
(56, 120),
(57, 121),
(58, 122),
(58, 123),
(58, 124),
(59, 125),
(60, 126),
(60, 127),
(60, 128),
(61, 129),
(62, 130),
(62, 131),
(63, 132),
(63, 133),
(64, 134),
(65, 135),
(65, 136),
(66, 137),
(66, 138),
(66, 139),
(66, 140),
(66, 141),
(67, 142),
(68, 143),
(69, 144),
(70, 145),
(72, 146),
(73, 147);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotspots`
--

CREATE TABLE `hotspots` (
  `id_hotspot` int(11) NOT NULL,
  `descripcion` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `pitch` int(11) NOT NULL,
  `yaw` int(11) NOT NULL,
  `cssClass` varchar(100) CHARACTER SET latin1 NOT NULL,
  `clickHandlerFunc` varchar(100) CHARACTER SET latin1 NOT NULL,
  `clickHandlerArgs` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sceneId` varchar(100) CHARACTER SET latin1 NOT NULL,
  `targetPitch` int(11) NOT NULL,
  `targetYaw` int(11) NOT NULL,
  `tipo` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hotspots`
--

INSERT INTO `hotspots` (`id_hotspot`, `descripcion`, `pitch`, `yaw`, `cssClass`, `clickHandlerFunc`, `clickHandlerArgs`, `sceneId`, `targetPitch`, `targetYaw`, `tipo`) VALUES
(1, '   ', -13, 2, '     custom-hotspot-salto    ', '     puntos     ', '     p2punto3     ', '     p2p3     ', -4, 182, '     scene'),
(2, ' ', -16, 126, 'custom-hotspot-salto', 'puntos', 'p2punto1', 'p2p1', 0, 0, 'scene'),
(3, ' ', -8, -180, 'custom-hotspot-salto', 'puntos', 'p2punto10', 'p2p10', 0, 0, 'scene'),
(4, ' ', -12, -92, 'custom-hotspot-salto', 'puntos', 'p2punto11', 'p2p2f1', 0, 0, 'scene'),
(5, ' ', -10, -83, 'custom-hotspot-salto', 'puntos', 'p2punto2', 'p2p2', 0, -83, 'scene'),
(6, ' ', -9, 185, 'custom-hotspot-salto', 'puntos', 'p2punto12', 'p2p2f3', -2, -2, 'scene'),
(7, ' ', -8, 3, 'custom-hotspot-salto', 'puntos', 'p2punto13', 'p2p2f2', -2, 3, 'scene'),
(8, ' ', 79, 174, 'custom-hotspot-info', 'baseDatos', 'id03', ' ', 0, 0, 'info'),
(9, ' ', -22, 149, 'custom-hotspot-audio', 'musica', 'pinkfloyd.mp3', ' ', 0, 0, 'info'),
(10, ' ', -21, -180, 'custom-hotspot-salto', 'puntos', 'p2punto11', 'p2p2f1', -6, 60, 'scene'),
(11, ' ', -19, -9, 'custom-hotspot-salto', 'puntos', 'p2punto11', 'p2p2f1', -6, 60, 'scene'),
(12, ' ', -9, 4, 'custom-hotspot-salto', 'puntos', 'p2punto2', 'p2p2', -10, 107, 'scene'),
(13, ' ', -8, -178, 'custom-hotspot-salto', 'puntos', 'p2punto4', 'p2p4', -2, 68, 'scene'),
(14, ' ', -11, 159, 'custom-hotspot-salto', 'puntos', 'p2punto3', 'p2p3', -6, 4, 'scene'),
(15, ' ', -6, 68, 'custom-hotspot-salto', 'puntos', 'p2punto5', 'p2p5', -8, -89, 'scene'),
(16, ' ', -6, -18, 'custom-hotspot-salto', 'puntos', 'p2punto5', 'p2p4f3', 1, 116, 'scene'),
(17, ' ', -16, -68, 'custom-hotspot-salto', 'puntos', 'p2punto4', 'p2p4', -6, 159, 'scene'),
(18, ' ', -12, 52, 'custom-hotspot-salto', 'puntos', 'p2punto6', 'p2p4f2', 1, 37, 'scene'),
(19, ' ', -10, -155, 'custom-hotspot-salto', 'puntos', 'p2punto6', 'p2p4f4', 1, 155, 'scene'),
(20, ' ', -22, -161, 'custom-hotspot-salto', 'puntos', 'p2punto4', 'p2p4f3', -6, 159, 'scene'),
(21, ' ', -6, -134, 'custom-hotspot-salto', 'puntos', 'p2punto4', 'p2p4f3', -6, 159, 'scene'),
(22, ' ', -10, 95, 'custom-hotspot-salto', 'puntos', 'p2punto4', 'p2p4', -6, 159, 'scene'),
(23, ' ', -3, -90, 'custom-hotspot-salto', 'puntos', 'p2punto6', 'p2p6', 1, 37, 'scene'),
(24, ' ', -4, 92, 'custom-hotspot-salto', 'puntos', 'p2punto5', 'p2p5', -2, 83, 'scene'),
(25, ' ', -3, 28, 'custom-hotspot-salto', 'puntos', 'p2punto7', 'p2p7', -2, -1, 'scene'),
(26, ' ', -16, -184, 'custom-hotspot-salto', 'puntos', 'p2punto6', 'p2p6', 2, 84, 'scene'),
(27, ' ', -12, 0, 'custom-hotspot-salto', 'puntos', 'p2punto8', 'p2p72', 0, 17, 'scene'),
(28, ' ', -19, 181, 'custom-hotspot-salto', 'puntos', 'p2punto7', 'p2p7', -7, -185, 'scene'),
(29, ' ', -8, -4, 'custom-hotspot-salto', 'puntos', 'p2punto9', 'p2p8', -6, 162, 'scene'),
(30, ' ', -11, -65, 'custom-hotspot-salto', 'puntos', 'p2punto8', 'p2p72', -9, 182, 'scene'),
(31, ' ', -25, 158, 'custom-hotspot-salto', 'puntos', 'p2punto1', 'p2p1', 0, 0, 'scene'),
(32, ' ', -20, -106, 'custom-hotspot-salto', 'puntos', 'p2punto9', 'p2p8', -3, -65, 'scene'),
(33, ' ', -20, 97, 'custom-hotspot-salto', 'puntos', 'p2punto2', 'p2p2', 2, -23, 'scene'),
(34, ' ', -1, 2, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info'),
(35, ' ', -19, -180, 'custom-hotspot-salto', 'puntos', 'p2punto2', 'p2p2', 0, 0, 'scene'),
(36, ' ', -18, 115, 'custom-hotspot-salto', 'puntos', 'p1punto2', 'p1p2', -11, 125, 'scene'),
(37, ' ', -3, 10, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info'),
(38, ' ', -21, -111, 'custom-hotspot-salto', 'puntos', 'p1punto8', 'p1p8', -6, 186, 'scene'),
(39, ' ', -18, 115, 'custom-hotspot-salto', 'puntos', 'p1punto13', 'p1p2f1', 0, 0, 'scene'),
(40, ' ', -10, -176, 'custom-hotspot-salto', 'puntos', 'p1punto22', 'p1p22', -4, 175, 'scene'),
(41, ' ', -14, -71, 'custom-hotspot-salto', 'puntos', 'p1punto1', 'p1p1', 0, 0, 'scene'),
(42, ' ', -1, -4, 'custom-hotspot-salto', 'puntos', 'p1punto10', 'p1p11', 0, 0, 'scene'),
(43, ' ', -27, -177, 'custom-hotspot-salto', 'puntos', 'p1punto14', 'p1p2f2', 0, 0, 'scene'),
(44, ' ', 20, 3, 'custom-hotspot-salto', 'puntos', 'p1punto2', 'p1p2', -5, -42, 'scene'),
(45, ' ', -14, -160, 'custom-hotspot-salto', 'puntos', 'p1punto15', 'p1p2f3', 0, 0, 'scene'),
(46, ' ', -1, 31, 'custom-hotspot-salto', 'puntos', 'p1punto13', 'p1p2f1', 27, 2, 'scene'),
(47, ' ', -18, 115, 'custom-hotspot-salto', 'puntos', 'p1punto14', 'p1p2f2', 26, 28, 'scene'),
(48, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'p1punto3', 'p1p3', -4, 180, 'scene'),
(49, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'p1punto2', 'p1p2', 0, 0, 'scene'),
(50, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'p1punto21', 'p1p32', -5, 180, 'scene'),
(51, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'p1punto22', 'p1p22', 0, 0, 'scene'),
(52, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'p1punto4', 'p1p4', -3, -47, 'scene'),
(53, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'p1punto3', 'p1p3', 0, 0, 'scene'),
(54, ' ', -7, 101, 'custom-hotspot-salto', 'puntos', 'p1punto11', 'p1p32f1', -5, -3, 'scene'),
(55, ' ', -14, -88, 'custom-hotspot-salto', 'puntos', 'p1punto5', 'p1p5', 0, -88, 'scene'),
(56, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'p1punto21', 'p1p32', 0, 0, 'scene'),
(57, ' ', -15, -96, 'custom-hotspot-salto', 'puntos', 'p1punto21', 'p1p32', -8, -32, 'scene'),
(58, ' ', -8, -4, 'custom-hotspot-salto', 'puntos', 'p1punto12', 'p1p32f2', -2, 78, 'scene'),
(59, ' ', -11, -106, 'custom-hotspot-salto', 'puntos', 'p1punto11', 'p1p32f1', -7, -95, 'scene'),
(60, ' ', -3, 93, 'custom-hotspot-salto', 'puntos', 'p1punto4', 'p1p4', 0, 0, 'scene'),
(61, ' ', -9, -87, 'custom-hotspot-salto', 'puntos', 'p1punto6', 'p1p6', -6, -34, 'scene'),
(62, ' ', 1, -166, 'custom-hotspot-salto', ' ', ' ', 'p1p5f1', 0, 0, 'scene'),
(63, ' ', -1, 4, 'custom-hotspot-salto', 'puntos', 'p1punto5', 'p1p5', 0, 0, 'scene'),
(64, ' ', -7, 4, 'custom-hotspot-salto', 'puntos', 'p1punto7', 'p1p7', 0, 0, 'scene'),
(65, ' ', -12, 77, 'custom-hotspot-salto', 'puntos', 'p1punto5', 'p1p5', -7, 93, 'scene'),
(66, ' ', -22, -97, 'custom-hotspot-salto', 'puntos', 'p1punto17', 'p1p9', -7, 41, 'scene'),
(67, ' ', -7, -5, 'custom-hotspot-salto', 'puntos', 'p1punto19', 'p1p72', 0, 0, 'scene'),
(68, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'p1punto6', 'p1p6', -10, 47, 'scene'),
(69, ' ', -7, -5, 'custom-hotspot-salto', 'puntos', 'p1punto8', 'p1p8', 0, 0, 'scene'),
(70, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'p1punto7', 'p1p7', -6, 175, 'scene'),
(71, ' ', -22, 54, 'custom-hotspot-salto', 'puntos', 'p1punto1', 'p1p1', 0, 0, 'scene'),
(72, ' ', -11, 189, 'custom-hotspot-salto', 'puntos', 'p1punto19', 'p1p72', -5, 176, 'scene'),
(73, ' ', -24, 91, 'custom-hotspot-salto', 'puntos', 'p1punto6', 'p1p6', 0, 0, 'scene'),
(74, ' ', -12, 2, 'custom-hotspot-salto', 'puntos', 'p1punto18', 'p1p9f1', -5, 176, 'scene'),
(75, ' ', 11, -28, 'custom-hotspot-salto', 'puntos', 'p1punto17', 'p1p9', 0, 0, 'scene'),
(76, ' ', -46, -8, 'custom-hotspot-salto', 'puntos', 'pspunto12', 'p1p9f2', 0, 0, 'scene'),
(77, ' ', -22, 148, 'custom-hotspot-salto', 'puntos', 'p1punto18', 'p1p9f1', 12, -17, 'scene'),
(78, ' ', -12, 5, 'custom-hotspot-salto', 'puntos', 'p1punto10', 'p1p10', 0, 0, 'scene'),
(79, ' ', -9, -172, 'custom-hotspot-salto', 'puntos', 'p1punto2', 'p1p2', 0, 0, 'scene'),
(80, ' ', -21, 128, 'custom-hotspot-salto', 'puntos', 'p1punto9', 'p1p11', -11, -173, 'scene'),
(81, ' ', -19, -5, 'custom-hotspot-salto', 'puntos', 'p1punto20', 'p1p12', 0, 0, 'scene'),
(82, ' ', -14, 168, 'custom-hotspot-salto', 'puntos', 'p1punto10', 'p1p10', -6, 134, 'scene'),
(83, ' ', -27, 172, 'custom-hotspot-salto', 'puntos', 'pspunto2', 'p0p1', -12, -166, 'scene'),
(84, ' ', -3, 10, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info'),
(85, ' ', -19, 196, 'custom-hotspot-salto', 'puntos', 'pspunto9', 'p0p1f1', 37, -179, 'scene'),
(86, ' ', -9, -19, 'custom-hotspot-salto', 'puntos', 'pspunto1', 'p0p0', 0, 0, 'scene'),
(87, ' ', -25, 102, 'custom-hotspot-salto', 'puntos', 'pspunto3', 'p0p2', 0, 0, 'scene'),
(88, ' ', -2, 10, 'custom-hotspot-salto', 'puntos', 'pspunto2', 'p0p1', 2, -18, 'scene'),
(89, ' ', -11, 161, 'custom-hotspot-salto', 'puntos', 'pspunto8', 'p0p1f2', -5, 179, 'scene'),
(90, ' ', -2, 10, 'custom-hotspot-salto', 'puntos', 'pspunto9', 'p0p1f1', 8, 9, 'scene'),
(91, ' ', -13, -184, 'custom-hotspot-salto', 'puntos', 'pspunto6', 'p0p5', 2, 100, 'scene'),
(92, ' ', -21, -82, 'custom-hotspot-salto', 'puntos', 'pspunto2', 'p0p1', 13, -179, 'scene'),
(93, ' ', -12, -176, 'custom-hotspot-salto', 'puntos', 'pspunto4', 'p0p3', 0, 0, 'scene'),
(94, ' ', -6, -2, 'custom-hotspot-salto', 'puntos', 'pspunto3', 'p0p2', 14, -129, 'scene'),
(95, ' ', -11, 180, 'custom-hotspot-salto', 'puntos', 'pspunto5', 'p0p4', 0, 0, 'scene'),
(96, ' ', -4, 3, 'custom-hotspot-salto', 'puntos', 'pspunto4', 'p0p3', 3, -3, 'scene'),
(97, ' ', -9, -88, 'custom-hotspot-salto', 'puntos', 'pspunto7', 'p0p5', 0, 0, 'scene'),
(98, ' ', -16, -182, 'custom-hotspot-salto', 'puntos', 'pspunto6', 'p0p4f2', 17, -5, 'scene'),
(99, ' ', -2, 105, 'custom-hotspot-salto', 'puntos', 'pspunto5', 'p0p4', -10, -47, 'scene'),
(100, ' ', -7, 87, 'custom-hotspot-salto', 'puntos', 'pspunto5', 'p0p4', -8, -45, 'scene'),
(101, ' ', -5, 177, 'custom-hotspot-salto', 'puntos', 'pspunto10', 'p0p5f1', 0, 0, 'scene'),
(102, ' ', -6, 74, 'custom-hotspot-salto', 'puntos', 'pspunto8', 'p0p1f2', -8, -45, 'scene'),
(103, ' ', -2, -9, 'custom-hotspot-salto', 'puntos', 'pspunto7', 'p0p5', -2, 141, 'scene'),
(104, ' ', -9, 165, 'custom-hotspot-salto', 'puntos', 'pspunto11', 'p0p5f2', 1, -13, 'scene'),
(105, ' ', -3, 169, 'custom-hotspot-salto', 'puntos', 'pspunto10', 'p0p5f1', 9, -13, 'scene'),
(106, ' ', -20, -106, 'custom-hotspot-salto', 'puntos', 'p3punto15', 'p3p8', -3, 172, 'scene'),
(107, ' ', -20, 89, 'custom-hotspot-salto', 'puntos', 'p3punto2', 'p3p2', -147, -11, 'scene'),
(108, ' ', -3, 10, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info'),
(109, ' ', -12, -185, 'custom-hotspot-salto', 'puntos', 'p3punto5', 'p3p3', -6, -178, 'scene'),
(110, ' ', -18, -91, 'custom-hotspot-salto', 'puntos', 'p3punto1', 'p3p1', 0, 0, 'scene'),
(111, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'p3punto17', 'p3p10', 0, 0, 'scene'),
(112, ' ', -4, 96, 'custom-hotspot-salto', 'puntos', 'p3punto4', 'p3p2f2', 0, 0, 'scene'),
(113, ' ', -7, -61, 'custom-hotspot-salto', 'puntos', 'p3punto2', 'p3p2', -6, 60, 'scene'),
(114, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'p3punto2', 'p3p2', -9, -93, 'scene'),
(115, ' ', -10, 180, 'custom-hotspot-salto', 'puntos', 'p3punto6', 'p3p4', -2, 68, 'scene'),
(116, ' ', -8, 2, 'custom-hotspot-salto', 'puntos', 'p3punto5', 'p3p3', 12, -3, 'scene'),
(117, ' ', -12, -85, 'custom-hotspot-salto', 'puntos', 'p3punto10', 'p3p5', -8, -89, 'scene'),
(118, ' ', -15, 164, 'custom-hotspot-salto', 'puntos', 'p3punto8', 'p3p4f2', -6, -118, 'scene'),
(119, ' ', -13, 206, 'custom-hotspot-salto', 'puntos', 'p3punto9', 'p3p4f3', -10, 135, 'scene'),
(120, ' ', -7, -3, 'custom-hotspot-salto', 'puntos', 'p3punto6', 'p3p4', -6, 159, 'scene'),
(121, ' ', -12, -42, 'custom-hotspot-salto', 'puntos', 'p3punto6', 'p3p4', -6, 159, 'scene'),
(122, ' ', -10, 95, 'custom-hotspot-salto', 'puntos', 'p3punto6', 'p3p4', -6, 159, 'scene'),
(123, ' ', -3, -90, 'custom-hotspot-salto', 'puntos', 'p3punto12', 'p3p6', -5, -161, 'scene'),
(124, ' ', -10, -140, 'custom-hotspot-salto', 'puntos', 'p3punto11', 'p3p5f1', -5, -161, 'scene'),
(125, ' ', -5, 42, 'custom-hotspot-salto', 'puntos', 'p3punto10', 'p3p5', -6, 159, 'scene'),
(126, ' ', -12, 103, 'custom-hotspot-salto', 'puntos', 'p3punto10', 'p3p5', -2, 83, 'scene'),
(127, ' ', -7, 38, 'custom-hotspot-salto', 'puntos', 'p3punto14', 'p3p7', -2, -1, 'scene'),
(128, ' ', -13, 205, 'custom-hotspot-salto', 'puntos', 'p3punto13', 'p3p6f1', -18, -180, 'scene'),
(129, ' ', -12, -114, 'custom-hotspot-salto', 'puntos', 'p3punto12', 'p3p6', -1, 37, 'scene'),
(130, ' ', -16, -184, 'custom-hotspot-salto', 'puntos', 'p3punto12', 'p3p6', -2, 147, 'scene'),
(131, ' ', -12, 0, 'custom-hotspot-salto', 'puntos', 'p3punto15', 'p3p8', 0, 17, 'scene'),
(132, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'p3punto14', 'p3p7', -9, 182, 'scene'),
(133, ' ', -19, 49, 'custom-hotspot-salto', 'puntos', 'p3punto1', 'p3p1', 0, 0, 'scene'),
(134, ' ', -19, -180, 'custom-hotspot-salto', 'puntos', 'p3punto2', 'p3p2', 0, 0, 'scene'),
(135, ' ', -1, -84, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info'),
(136, ' ', -3, 10, 'custom-hotspot-salto', 'puntos', 'ptpunto1', 'p4p1', 0, 0, 'scene'),
(137, ' ', -13, 17, 'custom-hotspot-salto', 'puntos', 'ptpunto0', 'p4p0', -2, 141, 'scene'),
(138, ' ', -3, -11, 'custom-hotspot-salto', 'puntos', 'ptpunto2', 'p4p2', -17, -153, 'scene'),
(139, ' ', -2, 31, 'custom-hotspot-salto', 'puntos', 'ptpunto3', 'p4p3', -20, 114, 'scene'),
(140, ' ', -17, 144, 'custom-hotspot-salto', 'puntos', 'ptpunto4', 'p4p4', -26, -174, 'scene'),
(141, ' ', -15, -128, 'custom-hotspot-salto', 'puntos', 'ptpunto5', 'p4p5', -21, 176, 'scene'),
(142, ' ', 0, 20, 'custom-hotspot-salto', 'puntos', 'ptpunto1', 'p4p1', -1, 20, 'scene'),
(143, ' ', -2, -84, 'custom-hotspot-salto', 'puntos', 'ptpunto1', 'p4p1', -2, 19, 'scene'),
(144, ' ', -3, -3, 'custom-hotspot-salto', 'puntos', 'ptpunto1', 'p4p1', 0, 0, 'scene'),
(145, ' ', -3, 40, 'custom-hotspot-salto', 'puntos', 'ptpunto1', 'p4p1', 0, 0, 'scene'),
(146, ' ', -3, 40, 'custom-hotspot-salto', ' ', ' ', 'p2guia', 18, -7, 'scene'),
(147, ' ', -3, 40, 'custom-hotspot-salto', ' ', ' ', 'p1p2f3', 0, 0, 'scene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `titulo_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `texto_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `url_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `titulo_imagen`, `texto_imagen`, `url_imagen`, `fecha`) VALUES
(34, 'Sarcófago', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit ', '34.jpg', '2017-11-08'),
(35, 'La escalera', 'Escalera circular del Instituto Celia Viñas de Almería', '35.png', '2017-12-29'),
(36, 'El toro', 'Escultura de bronce', '36.jpg', '2017-12-19'),
(37, 'La coronación de la Virgen', 'Pintura mural al temple de Luis Cañadas', '37.jpg', '2017-12-21'),
(38, 'Celia Viñas', 'Estátua de Celia Viñas en Almería', '38.jpg', '2017-12-16'),
(40, 'La vidriera', 'La vidriera se encuentra en el salón de Actos del IES Celia Viñas', '40.jpg', '2017-12-27'),
(41, 'El escudo de armas', 'Detalle del techo del salón de Actos del IES Celia Viñas', '41.jpg', '2017-12-15'),
(42, 'El Reloj', 'Reloj de pie situado en el IES Celia Viñas', '42.jpg', '2017-12-02'),
(43, 'La vitrina', 'Detalle vitrina de aparatos antiguos en el IES Celia Viñas', '43.jpg', '2017-12-01'),
(44, 'Las escaleras', 'Detalle de la escalera principal del IES Celia Viñas', '44.jpg', '2017-12-01'),
(45, 'El pozo', 'Detalle del pozo en el IES Celia Viñas', '45.jpg', '2017-12-07'),
(47, 'El vuelo mágico', 'Obra de Luis Cañadas pintor y escultor de Almería', '47.jpg', '2017-12-30'),
(48, 'Vírgen María con el niño', 'Cuadro del pintor Abraham Wilemsen', '48.jpg', '2017-12-13'),
(49, 'La Capilla', 'Detalle la Capilla en el IES Celia Viñas', '49.jpg', '2017-11-07'),
(51, 'Moctezuma', 'Emperador de Moscú', '51.jpg', '2017-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `autor` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `editorial` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_edicion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_edicion` date NOT NULL,
  `ISBN` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `editorial`, `lugar_edicion`, `fecha_edicion`, `ISBN`, `tipo`) VALUES
(5, 'Apuntes para una historia del Instituto \"Celia Viñas\" de Almería', 'D.Trino Gómez Ruiz', 'I.E.S Celia Viñas', 'Almería', '2013-10-01', '', 1),
(6, 'Nacimiento y primeros pasos de un edificio: el I.E.S \"Celia Viñas\"', 'D.José Luis Ruz Márquez', 'I.E.S Celia Viñas', 'Almeria', '2000-10-08', '0', 1),
(7, 'Gramática elemental de la lengua castellana', 'D.Hilario del Olmo Minguez', '', 'Almería', '1808-05-01', '2', 1),
(8, 'Sumario de psicología', 'D.Agustín Arredondo García', '', 'Valladolid', '1900-00-00', '46', 1),
(9, 'El esplendor de Almerï¿½a en el siglo XI', 'E. Castro Guisola', 'Caja Rural Intermediterrï¿½nea, Cajama.', 'Almeria', '2003-12-00', '8495531186', 1),
(10, 'Exposición y critica de la doctrina transformista', 'Agustin Arredondo', 'D. Mariano Alvares y Robles', 'Almería', '1878-00-00', '7', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_mapa`
--

CREATE TABLE `puntos_mapa` (
  `id_punto_mapa` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `left` double NOT NULL,
  `top` double NOT NULL,
  `id_escena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `password`, `email`, `tipo_usuario`) VALUES
(1, 'admin', 'admin', 'admin@iesceliaciclos.org', 0),
(2, 'entrar', '1234', '', 1),
(3, 'administrador', '1234', '', 1),
(6, 'mape', '1234', '', 2),
(8, 'Alfredo', 'php5', 'alfredo@celia.com', 1),
(9, 'Fran', 'cisco91', 'Fran_91@celia.com', 1),
(12, 'hamza', 'ben', 'hamzabenhachmi@gmail.com', 1),
(14, 'miguel', 'miguel', 'miguelille@hotmail.com', 1),
(19, 'felix', 'felix', 'ss', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id_vid` int(11) NOT NULL,
  `url_vid` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desc_vid` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id_vid`, `url_vid`, `desc_vid`) VALUES
(1, 'https://www.youtube.com/', 'wewewe'),
(2, 'https://www.youtube.com/', 'hamza');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id_aud`),
  ADD KEY `id_aud` (`id_aud`);

--
-- Indices de la tabla `escenas`
--
ALTER TABLE `escenas`
  ADD PRIMARY KEY (`id_escena`);

--
-- Indices de la tabla `escenas_hotspots`
--
ALTER TABLE `escenas_hotspots`
  ADD PRIMARY KEY (`id_escena`,`id_hotspot`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_vid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audio`
--
ALTER TABLE `audio`
  MODIFY `id_aud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `escenas`
--
ALTER TABLE `escenas`
  MODIFY `id_escena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id_vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
