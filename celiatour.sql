-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-03-2018 a las 10:33:34
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
(4, 'audios/escalera .m4a.mp3', '', 'v-guiada'),
(5, 'assets/audio/a.mp4', 'portico', 'v-guiada'),
(6, 'assets/audio/holaaaaa.mp4', 'puerta cafeteria de enfrente del instituto', 'd-objeto'),
(7, 'assets/audio/audio1.mp3', '', 'd-objeto'),
(8, 'assets/audio/audio2.mp3', '', 'd-objeto'),
(9, 'assets/audio/audioportico.mp3', '', 'd-objeto'),
(10, 'assets/audio/audio4.mp3', '', 'd-objeto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celda_pd`
--

CREATE TABLE `celda_pd` (
  `id_celda` int(11) NOT NULL,
  `escena_celda` varchar(100) NOT NULL,
  `imagen_celda` varchar(100) NOT NULL,
  `titulo_celda` varchar(100) NOT NULL,
  `fila_asociada` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `celda_pd`
--

INSERT INTO `celda_pd` (`id_celda`, `escena_celda`, `imagen_celda`, `titulo_celda`, `fila_asociada`) VALUES
(4, 'asdads', 'assets/imagenes/escenas/p0p1.JPG', 'Biblioteca', 1),
(2, 'ads', 'asd', 'Biblioteca', 0),
(3, 'asdadsdas', 'sadasd', 'Capilla', 1),
(5, 'adsads', 'asdasdasd', 'Dept. Geografía', 1),
(6, 'dsadsadsa', 'dasdsa', 'Tejado', 2),
(7, 'asdsd', 'asdsd', 'sdas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_mapa`
--

CREATE TABLE `config_mapa` (
  `piso_inicial` int(11) NOT NULL,
  `punto_inicial` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `config_mapa`
--

INSERT INTO `config_mapa` (`piso_inicial`, `punto_inicial`) VALUES
(1, 'punto29');

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
(1, '', 'p2p2', 120, -3, 117, 'equirectangular', 'assets/imagenes/escenas/p2p2.JPG'),
(2, '', 'p2p2f1', 120, -4, -175, 'equirectangular', 'assets/imagenes/escenas/p2p2f1.JPG'),
(3, '', 'p2p2f2', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p2f2.JPG'),
(4, '', 'p2p2f3', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p2f3.JPG'),
(5, '', 'p2p3', 120, -6, -179, 'equirectangular', 'assets/imagenes/escenas/p2p3.JPG'),
(6, '', 'p2p4', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p4.JPG'),
(7, '', 'p2p4f3', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p4f3.JPG'),
(8, '', 'p2p4f2', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p4f2.JPG'),
(9, '', 'p2p4f4', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p4f4.JPG'),
(10, '', 'p2p5', 120, 1, -90, 'equirectangular', 'assets/imagenes/escenas/p2p5.JPG'),
(11, '', 'p2p6', 120, 0, 59, 'equirectangular', 'assets/imagenes/escenas/p2p6.JPG'),
(12, '', 'p2p7', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p7.JPG'),
(13, '', 'p2p72', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p72.JPG'),
(14, '', 'p2p8', 120, 3, -112, 'equirectangular', 'assets/imagenes/escenas/p2p8.JPG'),
(15, '', 'p2p1', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p2p1.JPG'),
(16, '', 'p2p10', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p2p10.JPG'),
(17, '', 'p1p1', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p1.JPG'),
(18, '', 'p1p2', 120, 0, -41, 'equirectangular', 'assets/imagenes/escenas/p1p2.JPG'),
(19, 'Escalera Principal', 'p1p2f1', 120, 26, -174, 'equirectangular', 'assets/imagenes/escenas/p1p2f1.JPG'),
(20, 'Entrada', 'p1p2f2', 120, -6, -11, 'equirectangular', 'assets/imagenes/escenas/p1p2f2.JPG'),
(21, 'Entrada', 'p1p2f3', 120, 2, -178, 'equirectangular', 'assets/imagenes/escenas/p1p2f3.JPG'),
(22, '', 'p1p22', 120, -4, 176, 'equirectangular', 'assets/imagenes/escenas/p1p22.JPG'),
(23, '', 'p1p3', 120, -5, -181, 'equirectangular', 'assets/imagenes/escenas/p1p3.JPG'),
(24, '', 'p1p32', 120, -4, -183, 'equirectangular', 'assets/imagenes/escenas/p1p32.JPG'),
(25, '', 'p1p4', 120, -2, -35, 'equirectangular', 'assets/imagenes/escenas/p1p4.JPG'),
(26, '', 'p1p32f1', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p1p32f1.JPG'),
(27, 'Dept. Inglés ', 'p1p32f2', 120, 14, 24, 'equirectangular', 'assets/imagenes/escenas/p1p3f2.JPG'),
(28, '', 'p1p5', 120, -3, -88, 'equirectangular', 'assets/imagenes/escenas/p1p5.JPG'),
(29, '', 'p1p5f1', 120, 22, 60, 'equirectangular', 'assets/imagenes/escenas/p1p5f1.JPG'),
(30, '', 'p1p6', 120, -2, 39, 'equirectangular', 'assets/imagenes/escenas/p1p6.JPG'),
(31, '', 'p1p7', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p7.JPG'),
(32, '', 'p1p72', 120, -7, -18, 'equirectangular', 'assets/imagenes/escenas/p1p72.JPG'),
(33, '', 'p1p8', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p8.JPG'),
(34, '', 'p1p9', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p9.JPG'),
(35, '', 'p1p9f1', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p9f1.JPG'),
(36, '', 'p1p9f2', 120, 28, -31, 'equirectangular', 'assets/imagenes/escenas/p1p9f2.JPG'),
(37, '', 'p1p11', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p11.JPG'),
(41, '', 'p0p1', 120, -11, -165, 'equirectangular', 'assets/imagenes/escenas/p0p1.JPG'),
(42, '', 'p0p1f1', 120, 172, 15, 'equirectangular', 'assets/imagenes/escenas/p0p1f1.JPG'),
(43, '', 'p0p1f2', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p0p1f2.JPG'),
(44, '', 'p0p2', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p0p2.JPG'),
(45, '', 'p0p3', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p0p3.JPG'),
(46, '', 'p0p4', 120, 1, 2, 'equirectangular', 'assets/imagenes/escenas/p0p4.JPG'),
(47, '', 'p0p4f2', 120, 11, -9, 'equirectangular', 'assets/imagenes/escenas/p0p4f2.JPG'),
(48, '', 'p0p5', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p0p5.JPG'),
(49, '', 'p0p5f1', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p0p5f1.JPG'),
(50, '', 'p0p5f2', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p0p5f2.JPG'),
(51, '', 'p3p1', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p3p1.JPG'),
(52, '', 'p3p2', 120, -3, 117, 'equirectangular', 'assets/imagenes/escenas/p3p2.JPG'),
(53, '', 'p3p2f2', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p2f2.JPG'),
(54, '', 'p3p3', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p3.JPG'),
(55, '', 'p3p4', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p4.JPG'),
(56, '', 'p3p4f2', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p4f2.JPG'),
(57, '', 'p3p4f3', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p4f3.JPG'),
(58, '', 'p3p5', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p5.JPG'),
(59, '', 'p3p5f1', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p5f1.JPG'),
(60, '', 'p3p6', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p6.JPG'),
(61, '', 'p3p6f1', 120, -19, -181, 'equirectangular', 'assets/imagenes/escenas/p3p6f1.JPG'),
(62, '', 'p3p7', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p3p7.JPG'),
(63, '', 'p3p8', 120, 0, 0, 'equirectangular', 'assets/imagenes/escenas/p3p8.JPG'),
(64, '', 'p3p10', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p3p10.JPG'),
(65, '', 'p4p0', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p4p0.JPG'),
(66, '', 'p4p1', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p4p1.JPG'),
(67, '', 'p4p2', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p4p2.JPG'),
(68, '', 'p4p3', 120, -86, -2, 'equirectangular', 'assets/imagenes/escenas/p4p3.JPG'),
(69, '', 'p4p4', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p4p4.JPG'),
(70, '', 'p4p5', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p4p5.JPG'),
(89, 'Pasillo', 'p0p8', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p8.JPG'),
(90, 'Dpt. de E. Fisica', 'p0p8f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p8f1.JPG'),
(91, 'Gimnasio', 'p0p8f2', 120, -12, -31, 'equirectangular', 'assets/imagenes/escenas/p0p8f2.JPG'),
(92, 'Gimnasio', 'p0p8f3', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p8f3.JPG'),
(93, 'Lab. Ciencias Naturales', 'p3p10f1', 120, -3, 82, 'equirectangular', 'assets/imagenes/escenas/p3p10f1.JPG'),
(94, 'Lab. Ciencias Naturales', 'p3p10f2', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p3p10f2.JPG'),
(95, 'Lab. F&Q', 'p2p10f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p2p10f1.JPG'),
(96, 'Lab. F&Q', 'p2p10f3', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p2p10f3.JPG'),
(97, 'Lab. F&Q', 'p2p10f2', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p2p10f2.JPG'),
(98, 'Lab. F&Q', 'p2p10f4', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p2p10f4.JPG'),
(99, 'Lab. F&Q', 'p2p10f5', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p2p10f5.JPG'),
(101, 'Antesala', 'p1p13', 120, -3, -104, 'equirectangular', 'assets/imagenes/escenas/p1p13.JPG'),
(102, 'Antesala', 'p1p14', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p14.JPG'),
(103, 'Sala de juntas', 'p1p12f1', 120, -30, 78, 'equirectangular', 'assets/imagenes/escenas/p1p12f1.JPG'),
(104, 'Dept. Informática ', 'p1p12f2', 120, -12, -67, 'equirectangular', 'assets/imagenes/escenas/p1p12f2.JPG'),
(105, 'Dirección', 'p1p12f5', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p12f5.JPG'),
(106, 'Secretaría', 'p1p12f7', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p12f7.JPG'),
(107, 'Jefatura de estudios', 'p1p12f6', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p12f6.JPG'),
(108, 'Secretaría', 'p1p12f8', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p12f8.JPG'),
(109, 'Aula 3', 'p1p6f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p6f1.JPG'),
(111, 'Aula 3', 'p1p6f2', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p6f2.JPG'),
(116, 'Antesala', 'p1p12', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p12.JPG'),
(119, 'pasillo departamentos (sotano)', 'p0p2f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p2f1.JPG'),
(121, 'Dept. Geografía e Historia', 'p1p5f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p5f1.JPG'),
(122, 'Dept. Geografía e Historia', 'p1p5f2', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p5f2.JPG'),
(123, 'Escalera', 'p0p0', 120, -14, -187, 'equirectangular', 'assets/imagenes/escenas/20170727_210053.jpg'),
(127, 'AulaTaller', 'p0p9f4', 120, 18, -39, 'equirectangular', 'assets/imagenes/escenas/p0p9f4.JPG'),
(129, 'Dept. Filosofía', 'p0p9f2', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p9f2.JPG'),
(131, 'Pasillo', 'p0p9f1', 120, -8, 8, 'equirectangular', 'assets/imagenes/escenas/p0p9f1.JPG'),
(134, 'AulaTaller', 'p0p9f3', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p9f3.JPG'),
(135, 'AulaTaller', 'p0p9f5', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p9f5.JPG'),
(136, 'Sala de profesores', 'p1p12f3', 120, 14, -42, 'equirectangular', 'assets/imagenes/escenas/p1p12f3.JPG'),
(137, 'Sala de profesores', 'p1p12f4', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p12f4.JPG'),
(138, 'Dept. Lengua', 'p1p22f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p22f1.JPG'),
(139, 'Dept. Francés', 'p1p3f5', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p3f5.JPG'),
(140, 'Dept. Matemáticas ', 'p1p3f3', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p3f3.JPG'),
(141, 'Dept. Matemáticas', 'p1p3f4', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p3f4.JPG'),
(142, 'Dept. Latín y Griego', 'p1p7f2', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p7f2.JPG'),
(143, 'Dept. Naturales', 'p1p7f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p7f1.JPG');

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
(1, 148),
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
(16, 165),
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
(26, 276),
(26, 277),
(27, 59),
(28, 60),
(28, 61),
(29, 63),
(30, 64),
(30, 65),
(30, 66),
(30, 202),
(30, 226),
(31, 67),
(31, 68),
(31, 219),
(31, 220),
(31, 224),
(31, 278),
(31, 279),
(32, 69),
(32, 70),
(32, 228),
(33, 71),
(33, 72),
(34, 73),
(34, 74),
(34, 147),
(35, 75),
(35, 76),
(36, 77),
(36, 232),
(36, 258),
(36, 259),
(36, 260),
(36, 262),
(36, 263),
(37, 79),
(37, 168),
(37, 169),
(37, 179),
(38, 80),
(38, 81),
(39, 82),
(41, 85),
(41, 86),
(41, 87),
(41, 229),
(41, 269),
(42, 88),
(42, 89),
(43, 90),
(43, 91),
(44, 92),
(44, 93),
(44, 233),
(44, 252),
(45, 94),
(45, 95),
(45, 256),
(45, 257),
(46, 96),
(46, 97),
(46, 98),
(46, 253),
(47, 99),
(48, 100),
(48, 101),
(48, 102),
(48, 254),
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
(61, 149),
(61, 151),
(62, 130),
(62, 131),
(63, 132),
(63, 133),
(64, 134),
(64, 160),
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
(89, 153),
(89, 154),
(90, 155),
(91, 158),
(91, 159),
(92, 156),
(93, 162),
(93, 163),
(93, 213),
(94, 161),
(95, 166),
(95, 209),
(95, 210),
(96, 167),
(96, 207),
(96, 208),
(97, 203),
(97, 204),
(97, 205),
(98, 206),
(98, 211),
(98, 212),
(99, 164),
(101, 180),
(101, 181),
(101, 182),
(101, 183),
(102, 184),
(102, 185),
(102, 186),
(102, 187),
(102, 264),
(104, 198),
(105, 188),
(105, 189),
(106, 194),
(106, 195),
(106, 196),
(106, 197),
(106, 225),
(107, 190),
(107, 191),
(107, 192),
(108, 193),
(109, 199),
(109, 200),
(111, 201),
(111, 236),
(112, 170),
(113, 172),
(113, 173),
(113, 174),
(116, 175),
(116, 176),
(116, 177),
(116, 178),
(118, 215),
(118, 216),
(118, 217),
(119, 250),
(123, 230),
(127, 244),
(127, 245),
(127, 246),
(127, 255),
(129, 249),
(131, 234),
(131, 238),
(131, 239),
(131, 242),
(134, 243),
(134, 251),
(135, 247),
(135, 248),
(136, 267),
(136, 268),
(137, 265),
(137, 266),
(139, 275),
(140, 272),
(140, 273),
(141, 274),
(142, 270),
(143, 271);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotspots`
--

CREATE TABLE `hotspots` (
  `id_hotspot` int(11) NOT NULL,
  `titulo_panel` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `texto_panel` varchar(2999) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `pitch` int(11) NOT NULL,
  `yaw` int(11) NOT NULL,
  `cssClass` varchar(100) CHARACTER SET latin1 NOT NULL,
  `clickHandlerFunc` varchar(100) CHARACTER SET latin1 NOT NULL,
  `clickHandlerArgs` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sceneId` varchar(100) CHARACTER SET latin1 NOT NULL,
  `targetPitch` int(11) NOT NULL,
  `targetYaw` int(11) NOT NULL,
  `tipo` varchar(10) CHARACTER SET latin1 NOT NULL,
  `cerrado_destacado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hotspots`
--

INSERT INTO `hotspots` (`id_hotspot`, `titulo_panel`, `texto_panel`, `descripcion`, `pitch`, `yaw`, `cssClass`, `clickHandlerFunc`, `clickHandlerArgs`, `sceneId`, `targetPitch`, `targetYaw`, `tipo`, `cerrado_destacado`) VALUES
(1, NULL, NULL, '   ', -13, 2, 'custom-hotspot-salto', 'puntos', 'punto38', 'p2p3', -4, 182, 'scene', 0),
(2, NULL, NULL, ' ', -16, 126, 'custom-hotspot-salto', 'puntos', 'punto36', 'p2p1', 0, 0, 'scene', 0),
(3, NULL, NULL, ' ', -8, -180, 'custom-hotspot-salto', 'puntos', 'punto45', 'p2p10', 0, 0, 'scene', 0),
(5, NULL, NULL, ' ', -10, -83, 'custom-hotspot-salto', 'puntos', 'punto37', 'p2p2', 0, -83, 'scene', 0),
(6, NULL, NULL, ' ', -9, 185, 'custom-hotspot-salto', 'puntos', 'punto47', 'p2p2f3', -2, -2, 'scene', 0),
(7, NULL, NULL, ' ', -8, 3, 'custom-hotspot-salto', 'puntos', 'punto48', 'p2p2f2', -2, 3, 'scene', 0),
(10, NULL, NULL, ' ', -21, -180, 'custom-hotspot-salto', 'puntos', 'punto46', 'p2p2f1', -6, 60, 'scene', 0),
(11, NULL, NULL, ' ', -19, -9, 'custom-hotspot-salto', 'puntos', 'punto46', 'p2p2f1', -6, 60, 'scene', 0),
(12, NULL, NULL, ' ', -9, 4, 'custom-hotspot-salto', 'puntos', 'punto37', 'p2p2', -10, 107, 'scene', 0),
(13, NULL, NULL, ' ', -8, -178, 'custom-hotspot-salto', 'puntos', 'punto39', 'p2p4', -2, 68, 'scene', 0),
(14, NULL, NULL, ' ', -11, 159, 'custom-hotspot-salto', 'puntos', 'punto38', 'p2p3', -6, 4, 'scene', 0),
(15, NULL, NULL, ' ', -6, 68, 'custom-hotspot-salto', 'puntos', 'punto40', 'p2p5', -8, -89, 'scene', 0),
(16, NULL, NULL, ' ', -6, -18, 'custom-hotspot-salto', 'puntos', 'p2punto5', 'p2p4f3', 1, 116, 'scene', 0),
(17, NULL, NULL, ' ', -16, -68, 'custom-hotspot-salto', 'puntos', 'punto39', 'p2p4', -6, 159, 'scene', 0),
(18, NULL, NULL, ' ', -12, 52, 'custom-hotspot-salto', 'puntos', 'p2punto6', 'p2p4f2', 1, 37, 'scene', 0),
(19, NULL, NULL, ' ', -10, -155, 'custom-hotspot-salto', 'puntos', 'p2punto6', 'p2p4f4', 1, 155, 'scene', 0),
(20, NULL, NULL, ' ', -22, -161, 'custom-hotspot-salto', 'puntos', 'p2punto4', 'p2p4f3', -6, 159, 'scene', 0),
(21, NULL, NULL, ' ', -6, -134, 'custom-hotspot-salto', 'puntos', 'p2punto4', 'p2p4f3', -6, 159, 'scene', 0),
(22, NULL, NULL, ' ', -10, 95, 'custom-hotspot-salto', 'puntos', 'punto39', 'p2p4', -6, 159, 'scene', 0),
(23, NULL, NULL, ' ', -3, -90, 'custom-hotspot-salto', 'puntos', 'punto41', 'p2p6', 1, 37, 'scene', 0),
(24, NULL, NULL, ' ', -4, 92, 'custom-hotspot-salto', 'puntos', 'punto40', 'p2p5', -2, 83, 'scene', 0),
(25, NULL, NULL, ' ', -3, 28, 'custom-hotspot-salto', 'puntos', 'punto42', 'p2p7', -2, -1, 'scene', 0),
(26, NULL, NULL, ' ', -16, -184, 'custom-hotspot-salto', 'puntos', 'punto41', 'p2p6', 2, 84, 'scene', 0),
(27, NULL, NULL, ' ', -12, 0, 'custom-hotspot-salto', 'puntos', 'punto43', 'p2p72', 0, 17, 'scene', 0),
(28, NULL, NULL, ' ', -19, 181, 'custom-hotspot-salto', 'puntos', 'punto42', 'p2p7', -7, -185, 'scene', 0),
(29, NULL, NULL, ' ', -8, -4, 'custom-hotspot-salto', 'puntos', 'punto44', 'p2p8', -6, 162, 'scene', 0),
(30, NULL, NULL, ' ', -11, -65, 'custom-hotspot-salto', 'puntos', 'punto43', 'p2p72', -9, 182, 'scene', 0),
(31, NULL, NULL, ' ', -25, 158, 'custom-hotspot-salto', 'puntos', 'punto36', 'p2p1', 0, 0, 'scene', 0),
(32, NULL, NULL, ' ', -20, -106, 'custom-hotspot-salto', 'puntos', 'punto44', 'p2p8', -3, -65, 'scene', 0),
(33, NULL, NULL, ' ', -20, 97, 'custom-hotspot-salto', 'puntos', 'punto37', 'p2p2', 2, -23, 'scene', 0),
(34, NULL, NULL, ' ', -1, 2, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info', 0),
(35, NULL, NULL, ' ', -19, -180, 'custom-hotspot-salto', 'puntos', 'punto37', 'p2p2', 0, 0, 'scene', 0),
(36, NULL, NULL, ' ', -18, 115, 'custom-hotspot-salto', 'puntos', 'punto16', 'p1p2', -11, 125, 'scene', 0),
(37, NULL, NULL, ' ', -3, 10, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info', 0),
(38, NULL, NULL, ' ', -21, -111, 'custom-hotspot-salto', 'puntos', 'punto22', 'p1p8', -6, 186, 'scene', 0),
(39, NULL, NULL, ' ', -18, 115, 'custom-hotspot-salto', 'puntos', 'punto27', 'p1p2f1', 0, 0, 'scene', 0),
(40, NULL, NULL, ' ', -10, -176, 'custom-hotspot-salto', 'puntos', 'punto35', 'p1p22', -4, 175, 'scene', 0),
(41, NULL, NULL, ' ', 0, -71, 'custom-hotspot-salto', 'puntos', 'punto15', 'p1p1', 0, 0, 'scene', 0),
(42, NULL, NULL, ' ', -1, -4, 'custom-hotspot-salto', 'puntos', 'punto23', 'p1p11', 0, 0, 'scene', 0),
(43, NULL, NULL, ' ', -26, 8, 'custom-hotspot-salto', 'puntos', 'punto28', 'p1p2f2', 0, 0, 'scene', 0),
(44, NULL, NULL, ' ', 6, -174, 'custom-hotspot-salto', 'puntos', 'punto16', 'p1p2', -5, -42, 'scene', 0),
(45, NULL, NULL, ' ', -17, -11, 'custom-hotspot-salto', 'puntos', 'punto29', 'p1p2f3', 0, 0, 'scene', 0),
(46, NULL, NULL, ' ', -9, 164, 'custom-hotspot-salto', 'puntos', 'punto27', 'p1p2f1', 27, 2, 'scene', 0),
(47, NULL, NULL, ' ', -15, -179, 'custom-hotspot-salto', 'puntos', 'punto28', 'p1p2f2', 26, 28, 'scene', 0),
(48, NULL, NULL, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'punto17', 'p1p3', -4, 180, 'scene', 0),
(49, NULL, NULL, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'punto16', 'p1p2', 0, 0, 'scene', 0),
(50, NULL, NULL, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'punto34', 'p1p32', -5, 180, 'scene', 0),
(51, NULL, NULL, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'punto35', 'p1p22', 0, 0, 'scene', 0),
(52, NULL, NULL, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'punto18', 'p1p4', -3, -47, 'scene', 0),
(53, NULL, NULL, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'punto17', 'p1p3', 0, 0, 'scene', 0),
(54, NULL, NULL, ' ', -7, 101, 'custom-hotspot-salto', 'puntos', 'punto25', 'p1p32f1', -5, -3, 'scene', 0),
(55, NULL, NULL, ' ', -14, -88, 'custom-hotspot-salto', 'puntos', 'punto19', 'p1p5', 0, -88, 'scene', 0),
(56, NULL, NULL, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'punto34', 'p1p32', 0, 0, 'scene', 0),
(57, NULL, NULL, ' ', -15, -96, 'custom-hotspot-salto', 'puntos', 'punto34', 'p1p32', -8, -32, 'scene', 0),
(58, NULL, NULL, ' ', -8, -4, 'custom-hotspot-salto', 'puntos', 'punto26', 'p1p32f2', -2, 78, 'scene', 0),
(59, NULL, NULL, ' ', -11, -106, 'custom-hotspot-salto', 'puntos', 'punto25', 'p1p32f1', -7, -95, 'scene', 0),
(60, NULL, NULL, ' ', -3, 93, 'custom-hotspot-salto', 'puntos', 'punto18', 'p1p4', 0, 0, 'scene', 0),
(61, NULL, NULL, ' ', -9, -87, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', -6, -34, 'scene', 0),
(63, NULL, NULL, ' ', -1, 4, 'custom-hotspot-salto', 'puntos', 'punto19', 'p1p5', 0, 0, 'scene', 0),
(64, NULL, NULL, ' ', -7, 4, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', 0, 0, 'scene', 0),
(65, NULL, NULL, ' ', -12, 77, 'custom-hotspot-salto', 'puntos', 'punto19', 'p1p5', -7, 93, 'scene', 0),
(66, NULL, NULL, ' ', -22, -97, 'custom-hotspot-salto', 'puntos', 'punto30', 'p1p9', -7, 41, 'scene', 0),
(67, NULL, NULL, ' ', -7, -5, 'custom-hotspot-salto', 'puntos', 'punto32', 'p1p72', 0, 0, 'scene', 0),
(68, NULL, NULL, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', -10, 47, 'scene', 0),
(69, NULL, NULL, ' ', -7, -5, 'custom-hotspot-salto', 'puntos', 'punto22', 'p1p8', 0, 0, 'scene', 0),
(70, NULL, NULL, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', -6, 175, 'scene', 0),
(71, NULL, NULL, ' ', -22, 54, 'custom-hotspot-salto', 'puntos', 'punto15', 'p1p1', 0, 0, 'scene', 0),
(72, NULL, NULL, ' ', -11, 189, 'custom-hotspot-salto', 'puntos', 'punto32', 'p1p72', -5, 176, 'scene', 0),
(73, NULL, NULL, ' ', -24, 91, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', 0, 0, 'scene', 0),
(74, NULL, NULL, ' ', -12, 2, 'custom-hotspot-salto', 'puntos', 'punto31', 'p1p9f1', -5, 176, 'scene', 0),
(75, NULL, NULL, ' ', 11, -28, 'custom-hotspot-salto', 'puntos', 'punto30', 'p1p9', 0, 0, 'scene', 0),
(76, NULL, NULL, ' ', -46, -8, 'custom-hotspot-salto', 'puntos', 'punto14', 'p1p9f2', 0, 0, 'scene', 0),
(77, NULL, NULL, ' ', -22, 148, 'custom-hotspot-salto', 'puntos', 'punto31', 'p1p9f1', 12, -17, 'scene', 0),
(79, NULL, NULL, ' ', -9, -172, 'custom-hotspot-salto', 'puntos', 'punto16', 'p1p2', 0, 0, 'scene', 0),
(80, NULL, NULL, ' ', -21, 128, 'custom-hotspot-salto', 'puntos', 'punto23', 'p1p11', -11, -173, 'scene', 0),
(81, NULL, NULL, ' ', -19, -5, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0),
(82, NULL, NULL, ' ', -14, 168, 'custom-hotspot-salto', 'puntos', 'p1punto10', 'p1p10', -6, 134, 'scene', 0),
(83, NULL, NULL, ' ', -27, 172, 'custom-hotspot-salto', 'puntos', 'punto2', 'p0p1', -12, -166, 'scene', 0),
(84, NULL, NULL, ' ', -3, 10, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info', 0),
(85, NULL, NULL, ' ', -19, 196, 'custom-hotspot-salto', 'puntos', 'punto11', 'p0p1f1', 37, -179, 'scene', 0),
(87, NULL, NULL, ' ', -25, 102, 'custom-hotspot-salto', 'puntos', 'punto3', 'p0p2', 0, 0, 'scene', 0),
(88, NULL, NULL, ' ', -2, 10, 'custom-hotspot-salto', 'puntos', 'punto2', 'p0p1', 2, -18, 'scene', 0),
(89, NULL, NULL, ' ', -11, 161, 'custom-hotspot-salto', 'puntos', 'punto10', 'p0p1f2', -5, 179, 'scene', 0),
(90, NULL, NULL, ' ', -2, 10, 'custom-hotspot-salto', 'puntos', 'punto11', 'p0p1f1', 8, 9, 'scene', 0),
(91, NULL, NULL, ' ', -13, -184, 'custom-hotspot-salto', 'puntos', 'punto9', 'p0p5', 2, 100, 'scene', 0),
(92, NULL, NULL, ' ', -21, -82, 'custom-hotspot-salto', 'puntos', 'punto2', 'p0p1', 13, -179, 'scene', 0),
(93, NULL, NULL, ' ', -12, -176, 'custom-hotspot-salto', 'puntos', 'punto4', 'p0p3', 0, 0, 'scene', 0),
(94, NULL, NULL, ' ', -6, -2, 'custom-hotspot-salto', 'puntos', 'punto3', 'p0p2', 14, -129, 'scene', 0),
(95, NULL, NULL, ' ', -11, 180, 'custom-hotspot-salto', 'puntos', 'punto5', 'p0p4', 0, 0, 'scene', 0),
(96, NULL, NULL, ' ', -4, 3, 'custom-hotspot-salto', 'puntos', 'punto4', 'p0p3', 3, -3, 'scene', 0),
(97, NULL, NULL, ' ', -9, -88, 'custom-hotspot-salto', 'puntos', 'punto9', 'p0p5', 0, 0, 'scene', 0),
(98, NULL, NULL, ' ', -16, -182, 'custom-hotspot-salto', 'puntos', 'punto8', 'p0p4f2', 17, -5, 'scene', 0),
(99, NULL, NULL, ' ', -2, 105, 'custom-hotspot-salto', 'puntos', 'punto5', 'p0p4', -10, -47, 'scene', 0),
(100, NULL, NULL, ' ', -7, 87, 'custom-hotspot-salto', 'puntos', 'punto5', 'p0p4', -8, -45, 'scene', 0),
(101, NULL, NULL, ' ', -5, 177, 'custom-hotspot-salto', 'puntos', 'punto12', 'p0p5f1', 0, 0, 'scene', 0),
(102, NULL, NULL, ' ', -6, 74, 'custom-hotspot-salto', 'puntos', 'punto10', 'p0p1f2', -8, -45, 'scene', 0),
(103, NULL, NULL, ' ', -2, -9, 'custom-hotspot-salto', 'puntos', 'punto9', 'p0p5', -2, 141, 'scene', 0),
(104, NULL, NULL, ' ', -9, 165, 'custom-hotspot-salto', 'puntos', 'punto13', 'p0p5f2', 1, -13, 'scene', 0),
(105, NULL, NULL, ' ', -3, 169, 'custom-hotspot-salto', 'puntos', 'punto12', 'p0p5f1', 9, -13, 'scene', 0),
(106, NULL, NULL, ' ', -20, -106, 'custom-hotspot-salto', 'puntos', 'punto61', 'p3p8', -3, 172, 'scene', 0),
(107, NULL, NULL, ' ', -20, 89, 'custom-hotspot-salto', 'puntos', 'punto50', 'p3p2', -147, -11, 'scene', 0),
(108, NULL, NULL, ' ', -3, 10, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info', 0),
(109, NULL, NULL, ' ', -12, -185, 'custom-hotspot-salto', 'puntos', 'punto52', 'p3p3', -6, -178, 'scene', 0),
(110, NULL, NULL, ' ', -18, -91, 'custom-hotspot-salto', 'puntos', 'punto49', 'p3p1', 0, 0, 'scene', 0),
(111, NULL, NULL, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'punto62', 'p3p10', 0, 0, 'scene', 0),
(112, NULL, NULL, ' ', -4, 96, 'custom-hotspot-salto', 'puntos', 'punto51', 'p3p2f2', 0, 0, 'scene', 0),
(113, NULL, NULL, ' ', -7, -61, 'custom-hotspot-salto', 'puntos', 'punto50', 'p3p2', -6, 60, 'scene', 0),
(114, NULL, NULL, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'punto50', 'p3p2', -9, -93, 'scene', 0),
(115, NULL, NULL, ' ', -10, 180, 'custom-hotspot-salto', 'puntos', 'punto53', 'p3p4', -2, 68, 'scene', 0),
(116, NULL, NULL, ' ', -8, 2, 'custom-hotspot-salto', 'puntos', 'punto52', 'p3p3', 12, -3, 'scene', 0),
(117, NULL, NULL, ' ', -10, -85, 'custom-hotspot-salto', 'puntos', 'punto56', 'p3p5', -8, -89, 'scene', 0),
(118, NULL, NULL, ' ', -15, 164, 'custom-hotspot-salto', 'puntos', 'punto54', 'p3p4f2', -6, -118, 'scene', 0),
(119, NULL, NULL, ' ', -13, 206, 'custom-hotspot-salto', 'puntos', 'punto55', 'p3p4f3', -10, 135, 'scene', 0),
(120, NULL, NULL, ' ', -7, -3, 'custom-hotspot-salto', 'puntos', 'punto53', 'p3p4', -6, 159, 'scene', 0),
(121, NULL, NULL, ' ', -12, -42, 'custom-hotspot-salto', 'puntos', 'punto53', 'p3p4', -6, 159, 'scene', 0),
(122, NULL, NULL, ' ', -10, 95, 'custom-hotspot-salto', 'puntos', 'punto53', 'p3p4', -6, 159, 'scene', 0),
(123, NULL, NULL, ' ', -3, -90, 'custom-hotspot-salto', 'puntos', 'punto58', 'p3p6', -5, -161, 'scene', 0),
(124, NULL, NULL, ' ', -10, -140, 'custom-hotspot-salto', 'puntos', 'punto57', 'p3p5f1', -5, -161, 'scene', 0),
(125, NULL, NULL, ' ', -5, 42, 'custom-hotspot-salto', 'puntos', 'punto56', 'p3p5', -6, 159, 'scene', 0),
(126, NULL, NULL, ' ', -12, 103, 'custom-hotspot-salto', 'puntos', 'punto56', 'p3p5', -2, 83, 'scene', 0),
(127, NULL, NULL, ' ', -7, 38, 'custom-hotspot-salto', 'puntos', 'punto60', 'p3p7', -2, -1, 'scene', 0),
(128, NULL, NULL, ' ', -13, 205, 'custom-hotspot-salto', 'puntos', 'punto59', 'p3p6f1', -18, -180, 'scene', 0),
(129, NULL, NULL, ' ', -12, -114, 'custom-hotspot-salto', 'puntos', 'punto58', 'p3p6', -1, 37, 'scene', 0),
(130, NULL, NULL, ' ', -16, -184, 'custom-hotspot-salto', 'puntos', 'punto58', 'p3p6', -2, 147, 'scene', 0),
(131, NULL, NULL, ' ', -12, 0, 'custom-hotspot-salto', 'puntos', 'punto61', 'p3p8', 0, 17, 'scene', 0),
(132, NULL, NULL, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'punto60', 'p3p7', -9, 182, 'scene', 0),
(133, NULL, NULL, ' ', -19, 49, 'custom-hotspot-salto', 'puntos', 'punto49', 'p3p1', 0, 0, 'scene', 0),
(134, NULL, NULL, ' ', -19, -180, 'custom-hotspot-salto', 'puntos', 'punto50', 'p3p2', 0, 0, 'scene', 0),
(135, NULL, NULL, ' ', -1, -84, 'custom-hotspot-escaleras', 'escaleras', ' ', ' ', 0, 0, 'info', 0),
(136, NULL, NULL, ' ', -3, 10, 'custom-hotspot-salto', 'puntos', 'punto64', 'p4p1', 0, 0, 'scene', 0),
(137, NULL, NULL, ' ', -13, 17, 'custom-hotspot-salto', 'puntos', 'punto63', 'p4p0', -2, 141, 'scene', 0),
(138, NULL, NULL, ' ', -3, -11, 'custom-hotspot-salto', 'puntos', 'punto65', 'p4p2', -17, -153, 'scene', 0),
(139, NULL, NULL, ' ', -2, 31, 'custom-hotspot-salto', 'puntos', 'punto66', 'p4p3', -20, 114, 'scene', 0),
(140, NULL, NULL, ' ', -17, 144, 'custom-hotspot-salto', 'puntos', 'punto67', 'p4p4', -26, -174, 'scene', 0),
(141, NULL, NULL, ' ', -15, -128, 'custom-hotspot-salto', 'puntos', 'punto68', 'p4p5', -21, 176, 'scene', 0),
(142, NULL, NULL, ' ', 0, 20, 'custom-hotspot-salto', 'puntos', 'punto64', 'p4p1', -1, 20, 'scene', 0),
(143, NULL, NULL, ' ', -2, -84, 'custom-hotspot-salto', 'puntos', 'punto64', 'p4p1', -2, 19, 'scene', 0),
(144, NULL, NULL, ' ', -3, -3, 'custom-hotspot-salto', 'puntos', 'punto64', 'p4p1', 0, 0, 'scene', 0),
(145, NULL, NULL, ' ', -3, 40, 'custom-hotspot-salto', 'puntos', 'punto64', 'p4p1', 0, 0, 'scene', 0),
(146, NULL, NULL, ' ', -3, 40, 'custom-hotspot-salto', ' ', ' ', 'p2guia', 18, -7, 'scene', 0),
(147, 'Puerta to guapa', 'La mas del sur', '', -17, -96, 'custom-hotspot-info', 'panelInformacion', '147', '', 0, 0, 'info', 0),
(148, NULL, NULL, '', -11, -94, 'custom-hotspot-salto', 'puntos', 'punto46', 'p2p2f1', 0, 0, 'scene', 0),
(150, NULL, NULL, '', -1, 0, 'custom-hotspot-video', 'video', '2', '', 0, 0, 'info', 0),
(151, NULL, NULL, '', -4, 29, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', 0, 0, 'scene', 0),
(152, '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0),
(153, NULL, NULL, '', -7, -94, 'custom-hotspot-salto', 'puntos', 'p0punto15', 'p0p8f2', 0, 0, 'scene', 0),
(154, NULL, NULL, '', -8, -175, 'custom-hotspot-salto', 'puntos', 'p0punto14', 'p0p8f1', 0, 0, 'scene', 0),
(155, NULL, NULL, '', -12, -7, 'custom-hotspot-salto', 'puntos', 'p0punto13', 'p0p8', 0, 0, 'scene', 0),
(156, NULL, NULL, '', -15, -181, 'custom-hotspot-salto', 'puntos', 'p0punto15', 'p0p8f2', 0, 0, 'scene', 0),
(158, NULL, NULL, '', -9, 77, 'custom-hotspot-salto', 'puntos', 'p0punto13', 'p0p8', 0, 0, 'scene', 0),
(159, NULL, NULL, '', -11, -10, 'custom-hotspot-salto', 'puntos', 'p0punto16', 'p0p8f3', 0, 0, 'scene', 0),
(160, NULL, NULL, '', -4, 2, 'custom-hotspot-salto', 'puntos', 'punto82', 'p3p10f1', 0, 0, 'scene', 0),
(161, NULL, NULL, '', -11, -99, 'custom-hotspot-salto', 'puntos', 'punto82', 'p3p10f1', 0, 0, 'scene', 0),
(162, NULL, NULL, '', -12, -177, 'custom-hotspot-salto', 'puntos', 'punto62', 'p3p10', 0, 0, 'scene', 0),
(163, NULL, NULL, '', -11, 87, 'custom-hotspot-salto', 'puntos', 'punto83', 'p3p10f2', 0, 0, 'scene', 0),
(164, NULL, NULL, '', -13, -100, 'custom-hotspot-salto', 'puntos', 'punto86', 'p2p10f2', 0, 0, 'scene', 0),
(165, NULL, NULL, '', -4, 6, 'custom-hotspot-salto', 'puntos', 'punto84', 'p2p10f1', 0, 0, 'scene', 0),
(166, NULL, NULL, '', -20, -6, 'custom-hotspot-salto', 'puntos', 'punto85', 'p2p10f3', 0, 0, 'scene', 0),
(167, NULL, NULL, '', -19, 91, 'custom-hotspot-salto', 'puntos', 'punto87', 'p2p10f4', 0, 0, 'scene', 0),
(168, NULL, NULL, '', 0, 0, '', '', '', 'p1p12', 0, 0, '', 0),
(169, NULL, NULL, '', -25, 94, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0),
(170, NULL, NULL, '', -30, -97, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0),
(172, NULL, NULL, '', -32, -93, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0),
(173, NULL, NULL, '', -19, -2, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0),
(174, NULL, NULL, '', -20, 82, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0),
(175, NULL, NULL, '', -18, 171, 'custom-hotspot-salto', 'puntos', 'punto23', 'p1p11', 0, 0, 'scene', 0),
(176, NULL, NULL, '', -29, -90, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0),
(177, NULL, NULL, '', -17, 1, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0),
(178, NULL, NULL, '', -20, 86, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0),
(179, NULL, NULL, '', -20, -5, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0),
(180, NULL, NULL, '', -33, 86, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0),
(181, NULL, NULL, '', -16, 2, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0),
(182, NULL, NULL, '', -11, -127, 'custom-hotspot-salto', 'puntos', 'punto92', 'p1p12f1', 0, 0, 'scene', 0),
(183, NULL, NULL, '', -13, -112, 'custom-hotspot-salto', 'puntos', 'punto93', 'p1p12f2', 0, 0, 'scene', 0),
(184, NULL, NULL, '', -16, -166, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0),
(185, NULL, NULL, '', -10, 57, 'custom-hotspot-salto', 'puntos', 'punto94', 'p1p12f5', 0, 0, 'scene', 0),
(186, NULL, NULL, '', -16, -138, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0),
(187, NULL, NULL, '', -19, 146, 'custom-hotspot-salto', 'puntos', 'punto96', 'p1p12f6', 0, 0, 'scene', 0),
(188, NULL, NULL, '', -6, -159, 'custom-hotspot-salto', 'puntos', 'punto96', 'p1p12f6', 0, 0, 'scene', 0),
(189, NULL, NULL, '', -10, -127, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0),
(190, NULL, NULL, '', -8, 1, 'custom-hotspot-salto', 'puntos', 'punto94', 'p1p12f5', 0, 0, 'scene', 0),
(191, NULL, NULL, '', -13, -108, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0),
(192, NULL, NULL, '', -13, -147, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0),
(193, NULL, NULL, '', -21, -57, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0),
(194, NULL, NULL, '', -7, 5, 'custom-hotspot-salto', 'puntos', 'punto97', 'p1p12f8', 0, 0, 'scene', 0),
(195, NULL, NULL, '', -8, -12, 'custom-hotspot-salto', 'puntos', 'punto96', 'p1p12f6', 0, 0, 'scene', 0),
(196, NULL, NULL, '', -17, -41, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0),
(197, NULL, NULL, '', -12, -162, 'custom-hotspot-salto', 'puntos', 'punto23', 'p1p11', 0, 0, 'scene', 0),
(198, NULL, NULL, '', -15, 109, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0),
(199, NULL, NULL, '', -9, 3, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', 0, 0, 'scene', 0),
(200, NULL, NULL, '', -13, -82, 'custom-hotspot-salto', 'puntos', 'punto100', 'p1p6f2', 0, 0, 'scene', 0),
(201, NULL, NULL, '', -11, 90, 'custom-hotspot-salto', 'puntos', 'punto98', 'p1p6f1', 0, 0, 'scene', 0),
(202, NULL, NULL, '', -17, -161, 'custom-hotspot-salto', 'puntos', 'punto98', 'p1p6f1', 0, 0, 'scene', 0),
(203, NULL, NULL, '', -29, -101, 'custom-hotspot-salto', 'puntos', 'punto84', 'p2p10f1', 0, 0, 'scene', 0),
(204, NULL, NULL, '', -8, 63, 'custom-hotspot-salto', 'puntos', 'punto88', 'p2p10f5', 0, 0, 'scene', 0),
(205, NULL, NULL, '', -22, 0, 'custom-hotspot-salto', 'puntos', 'punto87', 'p2p10f4', 0, 0, 'scene', 0),
(206, NULL, NULL, '', -22, -87, 'custom-hotspot-salto', 'puntos', 'punto85', 'p2p10f3', 0, 0, 'scene', 0),
(207, NULL, NULL, '', -26, -183, 'custom-hotspot-salto', 'puntos', 'punto84', 'p2p10f1', 0, 0, 'scene', 0),
(208, NULL, NULL, '', -26, -183, 'custom-hotspot-salto', 'puntos', 'punto84', 'p2p10f1', 0, 0, 'scene', 0),
(209, NULL, NULL, '', -20, 163, 'custom-hotspot-salto', 'puntos', 'punto45', 'p2p10', 0, 0, 'scene', 0),
(210, NULL, NULL, '', -21, 97, 'custom-hotspot-salto', 'puntos', 'punto86', 'p2p10f2', 0, 0, 'scene', 0),
(211, NULL, NULL, '', -22, 177, 'custom-hotspot-salto', 'puntos', 'punto86', 'p2p10f2', 0, 0, 'scene', 0),
(212, NULL, NULL, '', -9, 113, 'custom-hotspot-salto', 'puntos', 'punto88', 'p2p10f5', 0, 0, 'scene', 0),
(213, 'Craneo', 'Un craneo grande grande prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba prueba ', '', 9, 155, 'custom-hotspot-info', 'panelInformacion', '213', '', 0, 0, 'info', 0),
(217, NULL, NULL, '', -8, 109, 'custom-hotspot-salto', 'puntos', 'punto32', 'p1p72', 0, 0, 'scene', 0),
(218, NULL, NULL, '', 14, 0, 'custom-hotspot-video', 'video', '2', '', 0, 0, 'info', 0),
(221, NULL, NULL, '', -1, 93, 'custom-hotspot-salto', 'puntos', '', '', 0, 0, 'scene', 0),
(222, NULL, NULL, '', 1, 0, 'custom-hotspot-video', 'video', '2', '', 0, 0, 'info', 0),
(227, NULL, NULL, '', -9, 0, 'custom-hotspot-video', 'video', '2', '', 0, 0, 'info', 0),
(229, NULL, NULL, '', -2, -13, 'custom-hotspot-salto', 'puntos', 'punto112', 'p0p0', 0, 0, 'scene', 0),
(230, NULL, NULL, '', -22, 162, 'custom-hotspot-salto', 'puntos', 'punto2', 'p0p1', 0, 0, 'scene', 0),
(231, NULL, NULL, '', 22, 0, 'custom-hotspot-video', 'video', '2', '', 0, 0, 'info', 0),
(233, NULL, NULL, '', -9, 7, 'custom-hotspot-salto', 'puntos', 'punto108', 'p0p2f1', 0, 0, 'scene', 0),
(234, NULL, NULL, '', -8, 8, 'custom-hotspot-salto', 'puntos', 'punto118', 'p0p9f2', 0, 0, 'scene', 0),
(236, NULL, NULL, '', -45, -155, 'custom-hotspot-salto', 'puntos', 'punto14', 'p1p9f2', 0, 0, 'scene', 0),
(239, NULL, NULL, '', -15, -101, 'custom-hotspot-salto', 'puntos', 'punto108', 'p0p2f1', 0, 0, 'scene', 0),
(240, NULL, NULL, '', -10, -43, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0),
(241, NULL, NULL, '', -10, -43, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0),
(242, NULL, NULL, '', -10, 95, 'custom-hotspot-salto', 'puntos', 'punto116', 'p0p9f4', 0, 0, 'scene', 0),
(243, NULL, NULL, '', -13, -175, 'custom-hotspot-salto', 'puntos', 'punto116', 'p0p9f4', 0, 0, 'scene', 0),
(244, NULL, NULL, '', -9, -117, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0),
(245, NULL, NULL, '', -4, -1, 'custom-hotspot-salto', 'puntos', 'punto123', 'p0p9f3', 0, 0, 'scene', 0),
(246, NULL, NULL, '', -16, -181, 'custom-hotspot-salto', 'puntos', 'punto124', 'p0p9f5', 0, 0, 'scene', 0),
(247, NULL, NULL, '', -21, 0, 'custom-hotspot-salto', 'puntos', 'punto116', 'p0p9f4', 0, 0, 'scene', 0),
(248, NULL, NULL, '', -9, -42, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0),
(249, NULL, NULL, '', -12, -143, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0),
(250, NULL, NULL, '', -25, 79, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0),
(251, NULL, NULL, '', -11, -138, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0),
(252, NULL, NULL, '', 2, 124, 'custom-hotspot-video', 'video', 'punto3', 'p0p2', 0, 0, 'info', 0),
(253, NULL, NULL, '', 12, 152, 'custom-hotspot-audio', 'musica', 'punto5', 'p0p4', 0, 0, 'info', 0),
(254, NULL, NULL, '', 7, 152, 'custom-hotspot-audio', 'musica', 'punto9', 'p0p5', 0, 0, 'info', 0),
(255, NULL, NULL, '', 27, 50, 'custom-hotspot-audio', 'musica', '4', 'p0p9f4', 0, 0, 'info', 0),
(256, NULL, NULL, '', 8, 0, 'custom-hotspot-video', 'video', 'punto4', 'p0p3', 0, 0, 'info', 0),
(257, NULL, NULL, '', 11, -41, 'custom-hotspot-video', 'video', 'punto4', 'p0p3', 0, 0, 'info', 0),
(258, NULL, NULL, '', 19, 39, 'custom-hotspot-video', 'video', 'punto14', 'p1p9f2', 0, 0, 'info', 0),
(259, NULL, NULL, '', 30, 0, 'custom-hotspot-video', 'video', 'punto14', 'p1p9f2', 0, 0, 'info', 0),
(260, NULL, NULL, '', 32, 0, 'custom-hotspot-video', 'video', 'punto14', 'p1p9f2', 0, 0, 'info', 0),
(262, NULL, NULL, '', 27, -96, 'custom-hotspot-video', 'video', 'punto14', 'p1p9f2', 0, 0, 'info', 0),
(263, NULL, NULL, '', 26, -49, 'custom-hotspot-audio', 'musica', 'punto14', 'p1p9f2', 0, 0, 'info', 0),
(264, NULL, NULL, '', -14, 21, 'custom-hotspot-salto', 'puntos', 'punto126', 'p1p12f4', 0, 0, 'scene', 0),
(265, NULL, NULL, '', -20, -161, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0),
(266, NULL, NULL, '', -16, -90, 'custom-hotspot-salto', 'puntos', 'punto125', 'p1p12f3', 0, 0, 'scene', 0),
(267, NULL, NULL, '', -17, 88, 'custom-hotspot-salto', 'puntos', 'punto126', 'p1p12f4', 0, 0, 'scene', 0),
(268, NULL, NULL, '', -15, 122, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0),
(269, NULL, NULL, '', -19, -87, 'custom-hotspot-salto', 'puntos', 'punto78', 'p0p8', 0, 0, 'scene', 0),
(270, NULL, NULL, '', -14, 114, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', 0, 0, 'scene', 0),
(271, NULL, NULL, '', -13, 54, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', 0, 0, 'scene', 0),
(272, NULL, NULL, '', -15, -62, 'custom-hotspot-salto', 'puntos', 'punto25', 'p1p32f1', 0, 0, 'scene', 0),
(273, NULL, NULL, '', -28, 82, 'custom-hotspot-salto', 'puntos', 'punto130', 'p1p3f4', 0, 0, 'scene', 0),
(274, NULL, NULL, '', -23, -78, 'custom-hotspot-salto', 'puntos', 'punto129', 'p1p3f3', 0, 0, 'scene', 0),
(275, NULL, NULL, '', -12, 115, 'custom-hotspot-salto', 'puntos', 'punto25', 'p1p32f1', 0, 0, 'scene', 0),
(276, NULL, NULL, '', -13, 10, 'custom-hotspot-salto', 'puntos', 'punto129', 'p1p3f3', 0, 0, 'scene', 0),
(277, NULL, NULL, '', -16, 155, 'custom-hotspot-salto', 'puntos', 'punto128', 'p1p3f5', 0, 0, 'scene', 0),
(278, NULL, NULL, '', -13, -116, 'custom-hotspot-salto', 'puntos', 'punto132', 'p1p7f1', 0, 0, 'scene', 0),
(279, NULL, NULL, '', -15, -80, 'custom-hotspot-salto', 'puntos', 'punto131', 'p1p7f2', 0, 0, 'scene', 0);

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
(209, 'laboratorio de física y química', '', '209.jpg', '2018-02-19'),
(210, 'laboratorio de física y química', '', '210.jpg', '2018-02-19'),
(211, 'laboratorio de física y química', '', '211.jpg', '2018-02-19'),
(212, 'laboratorio de física y química', '', '212.jpg', '2018-02-19'),
(213, 'laboratorio de física y química', '', '213.jpg', '2018-02-19'),
(214, 'laboratorio de física y química', '', '214.jpg', '2018-02-19'),
(215, 'laboratorio de física y química', '', '215.jpg', '2018-02-19'),
(216, 'laboratorio de física y química', '', '216.jpg', '2018-02-19'),
(217, 'laboratorio de física y química', '', '217.jpg', '2018-02-19'),
(218, 'laboratorio de física y química', '', '218.jpg', '2018-02-19'),
(219, 'laboratorio de física y química', '', '219.jpg', '2018-02-19'),
(220, 'laboratorio de física y química', '', '220.jpg', '2018-02-19'),
(221, 'laboratorio de física y química', '', '221.jpg', '2018-02-19'),
(222, 'laboratorio de física y química', '', '222.jpg', '2018-02-19'),
(223, 'laboratorio de física y química', '', '223.jpg', '2018-02-19'),
(224, 'laboratorio de física y química', '', '224.jpg', '2018-02-19'),
(225, 'laboratorio de física y química', '', '225.jpg', '2018-02-19'),
(226, 'laboratorio de física y química', '', '226.jpg', '2018-02-19'),
(227, 'laboratorio de física y química', '', '227.jpg', '2018-02-19'),
(228, 'laboratorio de física y química', '', '228.jpg', '2018-02-19'),
(229, 'laboratorio de física y química', '', '229.jpg', '2018-02-19'),
(230, 'laboratorio de física y química', '', '230.jpg', '2018-02-19'),
(231, 'laboratorio de física y química', '', '231.jpg', '2018-02-19'),
(232, 'Laboratorio de Fisica y Quimica', '', '232.jpg', '2018-02-19'),
(234, 'geografía', '', '234.jpg', '2018-02-19'),
(236, 'geografía', '', '236.jpg', '2018-02-19'),
(238, 'geografía', '', '238.jpg', '2018-02-19'),
(240, 'geografía', '', '240.jpg', '2018-02-19'),
(242, 'geografía', '', '242.jpg', '2018-02-19'),
(244, 'geografía', '', '244.jpg', '2018-02-19'),
(246, 'laboratorio de ciencias naturales', '', '246.jpg', '2018-02-19'),
(248, 'laboratorio de ciencias naturales', '', '248.jpg', '2018-02-19'),
(250, 'laboratorio de ciencias naturales', '', '250.jpg', '2018-02-19'),
(252, 'laboratorio de ciencias naturales', '', '252.jpg', '2018-02-19'),
(254, 'laboratorio de ciencias naturales', '', '254.jpg', '2018-02-19'),
(256, 'laboratorio de ciencias naturales', '', '256.jpg', '2018-02-19'),
(258, 'laboratorio de ciencias naturales', '', '258.jpg', '2018-02-19'),
(260, 'laboratorio de ciencias naturales', '', '260.jpg', '2018-02-19'),
(262, 'laboratorio de ciencias naturales', '', '262.jpg', '2018-02-19'),
(264, 'laboratorio de ciencias naturales', '', '264.jpg', '2018-02-19'),
(266, 'laboratorio de ciencias naturales', '', '266.jpg', '2018-02-19'),
(268, 'laboratorio de ciencias naturales', '', '268.jpg', '2018-02-19'),
(270, 'laboratorio de ciencias naturales', '', '270.jpg', '2018-02-19'),
(272, 'laboratorio de ciencias naturales', '', '272.jpg', '2018-02-19'),
(274, 'laboratorio de ciencias naturales', '', '274.jpg', '2018-02-19'),
(276, 'laboratorio de ciencias naturales', '', '276.jpg', '2018-02-19'),
(278, 'laboratorio de ciencias naturales', '', '278.jpg', '2018-02-19'),
(280, 'laboratorio de ciencias naturales', '', '280.jpg', '2018-02-19'),
(282, 'laboratorio de ciencias naturales', '', '282.jpg', '2018-02-19'),
(284, 'laboratorio de ciencias naturales', '', '284.jpg', '2018-02-19'),
(286, 'laboratorio de ciencias naturales', '', '286.jpg', '2018-02-19'),
(288, 'laboratorio de ciencias naturales', '', '288.jpg', '2018-02-19'),
(290, 'laboratorio de ciencias naturales', '', '290.jpg', '2018-02-19'),
(292, 'laboratorio de ciencias naturales', '', '292.jpg', '2018-02-19'),
(294, 'laboratorio de ciencias naturales', '', '294.jpg', '2018-02-19'),
(296, 'laboratorio de ciencias naturales', '', '296.jpg', '2018-02-19'),
(298, 'laboratorio de ciencias naturales', '', '298.jpg', '2018-02-19'),
(300, 'laboratorio de ciencias naturales', '', '300.jpg', '2018-02-19'),
(302, 'laboratorio de ciencias naturales', '', '302.jpg', '2018-02-19'),
(304, 'laboratorio de ciencias naturales', '', '304.jpg', '2018-02-19'),
(306, 'laboratorio de ciencias naturales', '', '306.jpg', '2018-02-19'),
(308, 'laboratorio de ciencias naturales', '', '308.jpg', '2018-02-19'),
(310, 'laboratorio de ciencias naturales', '', '310.jpg', '2018-02-19'),
(312, 'laboratorio de ciencias naturales', '', '312.jpg', '2018-02-19'),
(314, 'laboratorio de ciencias naturales', '', '314.jpg', '2018-02-19');

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
  `tipo` int(2) NOT NULL,
  `apaisado` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `editorial`, `lugar_edicion`, `fecha_edicion`, `ISBN`, `tipo`, `apaisado`) VALUES
(5, 'Apuntes para una historia del Instituto \"Celia Viñas\" de Almería', 'D.Trino Gómez Ruiz', 'I.E.S Celia Viñas', 'Almería', '2013-10-01', '565989', 1, 0),
(6, 'Nacimiento y primeros pasos de un edificio: el I.E.S \"Celia Viñas\"', 'D.José Luis Ruz Márquez', 'I.E.S Celia Viñas', 'Almeria', '2000-10-08', '0', 1, 0),
(7, 'Gramática elemental de la lengua castellana', 'D.Hilario del Olmo Minguez', 'almeria', 'Almería', '1808-05-01', '2', 0, 0),
(8, 'Sumario de psicología', 'D.Agustín Arredondo García', 'a', 'Valladolid', '2018-01-14', '46', 0, 0),
(9, 'El esplendor de Almerï¿½a en el siglo XI', 'E. Castro Guisola', 'Caja Rural Intermediterrï¿½nea, Cajama.', 'Almeria', '2018-01-28', '8495531186', 0, 1),
(10, 'Exposición y critica de la doctrina transformista', 'Agustin Arredondo', 'D. Mariano Alvares y Robles', 'Almería', '2018-01-05', '7', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panel_imagenes`
--

CREATE TABLE `panel_imagenes` (
  `id_hotspot` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `panel_imagenes`
--

INSERT INTO `panel_imagenes` (`id_hotspot`, `id_imagen`) VALUES
(150, 160),
(152, 212),
(152, 211),
(152, 210),
(152, 215),
(152, 216),
(213, 254),
(213, 246),
(213, 254),
(213, 246),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(213, 0),
(216, 209),
(216, 210),
(216, 211),
(216, 212),
(216, 209),
(216, 210),
(216, 211),
(216, 212),
(216, 0),
(216, 0),
(216, 0),
(223, 211),
(223, 218),
(223, 224),
(225, 209),
(225, 210),
(225, 211),
(225, 294),
(225, 296),
(225, 298),
(255, 209),
(255, 210),
(255, 211);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pisos`
--

CREATE TABLE `pisos` (
  `piso` int(1) NOT NULL,
  `url_img` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `punto_inicial` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_piso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `escena_inicial` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pisos`
--

INSERT INTO `pisos` (`piso`, `url_img`, `punto_inicial`, `titulo_piso`, `escena_inicial`) VALUES
(0, 'assets/imagenes/mapa/sotano.png', 'punto112', 'Sotano', 'p0p0'),
(1, 'assets/imagenes/mapa/plantabaja.png', 'punto15', 'Planta baja', 'p1p1'),
(2, 'assets/imagenes/mapa/planta1.png', 'punto36', 'Primera planta', 'p2p1'),
(3, 'assets/imagenes/mapa/planta2.png', 'punto49', 'Segunda planta', 'p3p1'),
(4, 'assets/imagenes/mapa/tejado.png', 'punto63', 'Tejado', 'p4p0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_mapa`
--

CREATE TABLE `puntos_mapa` (
  `id_punto_mapa` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `left_mapa` double NOT NULL,
  `top_mapa` double NOT NULL,
  `id_escena` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `piso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `puntos_mapa`
--

INSERT INTO `puntos_mapa` (`id_punto_mapa`, `nombre`, `left_mapa`, `top_mapa`, `id_escena`, `piso`) VALUES
(2, 'p0punto2', 50, 67.5, 'p0p1', 0),
(3, 'p0punto3', 50, 73.5, 'p0p2', 0),
(4, 'p0punto4', 31.5, 73.5, 'p0p3', 0),
(5, 'p0punto5', 16.5, 73.5, 'p0p4', 0),
(8, 'p0punto6', 7.5, 88, 'p0p4f2', 0),
(9, 'p0punto7', 16.5, 48.5, 'p0p5', 0),
(10, 'p0punto8', 23.5, 61.5, 'p0p1f2', 0),
(11, 'p0punto9', 41.5, 61, 'p0p1f1', 0),
(12, 'p0punto10', 0, 50.5, 'p0p5f1', 0),
(13, 'p0punto11', 0, 46.5, 'p0p5f2', 0),
(14, 'p0punto12', 25, 26, 'p1p9f2', 0),
(15, 'p1punto1', 53, 62, 'p1p1', 1),
(16, 'p1punto2', 48.8, 73.5, 'p1p2', 1),
(17, 'p1punto3', 34, 73.5, 'p1p3', 1),
(18, 'p1punto4', 16.5, 73.5, 'p1p4', 1),
(19, 'p1punto5', 16.5, 50.5, 'p1p5', 1),
(20, 'p1punto6', 17, 34, 'p1p6', 1),
(21, 'p1punto7', 34.5, 43.5, 'p1p7', 1),
(22, 'p1punto8', 50, 53.5, 'p1p8', 1),
(23, 'p1punto9', 64, 73.5, 'p1p11', 1),
(25, 'p1punto11', 25.5, 80.5, 'p1p32f1', 1),
(26, 'p1punto12', 34.3, 84.5, 'p1p32f2', 1),
(27, 'p1punto13', 48.8, 86, 'p1p2f1', 1),
(28, 'p1punto14', 48.8, 91, 'p1p2f2', 1),
(29, 'p1punto15', 48.8, 96, 'p1p2f3', 1),
(30, 'p1punto17', 18, 26, 'p1p9', 1),
(31, 'p1punto18', 25, 30, 'p1p9f1', 1),
(32, 'p1punto19', 41, 48, 'p1p72', 1),
(34, 'p1punto21', 25.8, 73.5, 'p1p32', 1),
(35, 'p1punto22', 42, 73.5, 'p1p22', 1),
(36, 'p2punto1', 53, 62, 'p2p1', 2),
(37, 'p2punto2', 49, 73.5, 'p2p2', 2),
(38, 'p2punto3', 34, 73.5, 'p2p3', 2),
(39, 'p2punto4', 16.5, 73.5, 'p2p4', 2),
(40, 'p2punto5', 16.5, 53.5, 'p2p5', 2),
(41, 'p2punto6', 17, 34, 'p2p6', 2),
(42, 'p2punto7', 24, 37.5, 'p2p7', 2),
(43, 'p2punto8', 34.5, 43.5, 'p2p72', 2),
(44, 'p2punto9', 49.5, 53, 'p2p8', 2),
(45, 'p2punto10', 79, 71.5, 'p2p10', 2),
(46, 'p2punto11', 49, 86.5, 'p2p2f1', 2),
(47, 'p2punto12', 42, 86.5, 'p2p2f3', 2),
(48, 'p2punto13', 64, 86.5, 'p2p2f2', 2),
(49, 'p3punto1', 50, 62, 'p3p1', 3),
(50, 'p3punto2', 50, 73, 'p3p2', 3),
(51, 'p3punto4', 43, 83, 'p3p2f2', 3),
(52, 'p3punto5', 35, 73, 'p3p3', 3),
(53, 'p3punto6', 17, 73, 'p3p4', 3),
(54, 'p3punto8', 8, 78, 'p3p4f2', 3),
(55, 'p3punto9', 8, 69, 'p3p4f3', 3),
(56, 'p3punto10', 17, 49, 'p3p5', 3),
(57, 'p3punto11', 8, 50, 'p3p5f1', 3),
(58, 'p3punto12', 17, 33, 'p3p6', 3),
(59, 'p3punto13', 8, 34, 'p3p6f1', 3),
(60, 'p3punto14', 32, 42, 'p3p7', 3),
(61, 'p3punto15', 50, 53, 'p3p8', 3),
(62, 'p3punto17', 75, 72, 'p3p10', 3),
(63, 'p4punto0', 58, 62, 'p4p0', 4),
(64, 'p4punto1', 79, 74, 'p4p1', 4),
(65, 'p4punto2', 6, 85, 'p4p2', 4),
(66, 'p4punto3', 6, 15, 'p4p3', 4),
(67, 'p4punto4', 94, 61, 'p4p4', 4),
(68, 'p4punto5', 94, 91, 'p4p5', 4),
(78, 'p0punto13', 49.58, 52.92, 'p0p8', 0),
(79, 'p0punto14', 39.91, 49.94, 'p0p8f1', 0),
(80, 'p0punto15', 54.89, 42.49, 'p0p8f2', 0),
(81, 'p0punto16', 73.37, 53.29, 'p0p8f3', 0),
(82, 'p3punto18', 91.95, 74.72, 'p3p10f1', 3),
(83, 'p3punto19', 92.59, 89.45, 'p3p10f2', 3),
(84, 'p2punto14', 88.45, 72.86, 'p2p10f1', 2),
(85, 'p2punto15', 95.14, 73.61, 'p2p10f3', 2),
(86, 'p2punto16', 88.45, 85.16, 'p2p10f2', 2),
(87, 'p2punto17', 95.78, 85.35, 'p2p10f4', 2),
(88, 'p2punto18', 91.74, 94.48, 'p2p10f5', 2),
(90, 'p1punto25', 74.06, 66.29, 'p1p13', 1),
(91, 'p1punto26', 83.94, 73.45, 'p1p14', 1),
(92, 'p1punto27', 69.67, 56.93, 'p1p12f1', 1),
(93, 'p1punto28', 79.24, 55.42, 'p1p12f2', 1),
(94, 'p1punto29', 92.26, 92.17, 'p1p12f5', 1),
(95, 'p1punto30', 71.16, 82.67, 'p1p12f7', 1),
(96, 'p1punto31', 81.28, 83.77, 'p1p12f6', 1),
(97, 'p1punto32', 76.26, 92.86, 'p1p12f8', 1),
(98, 'p1punto33', 7.45, 32.57, 'p1p6f1', 1),
(100, 'p1punto34', 7.77, 17.71, 'p1p6f2', 1),
(105, 'p1punto35', 74.42, 75.23, 'p1p12', 1),
(108, 'p0punto17', 72.75, 74.71, 'p0p2f1', 0),
(110, 'p1punto36', 11.98, 51.37, 'p1p5f1', 1),
(111, 'p1punto37', 3.93, 51.01, 'p1p5f2', 1),
(112, 'p0punto18', 59.67, 62.75, 'p0p0', 0),
(116, 'p0punto22', 73.69, 91.92, 'p0p9f4', 0),
(118, 'p0punto24', 94.6, 85.32, 'p0p9f2', 0),
(120, 'p0punto26', 73.27, 81.1, 'p0p9f1', 0),
(123, 'p0punto27', 81.64, 91.37, 'p0p9f3', 0),
(124, 'p0punto28', 65.95, 91.19, 'p0p9f5', 0),
(125, '', 93.6, 63.48, 'p1p12f3', 1),
(126, '', 94.02, 75.96, 'p1p12f4', 1),
(127, '', 40.16, 84.58, 'p1p22f1', 1),
(128, '', 22.07, 88.07, 'p1p3f5', 1),
(129, '', 28.86, 86.6, 'p1p3f3', 1),
(130, '', 28.86, 93.57, 'p1p3f4', 1),
(131, '', 38.38, 36.33, 'p1p7f2', 1),
(132, '', 29.7, 31.92, 'p1p7f1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `nombre`, `apellido`, `password`, `email`, `tipo_usuario`) VALUES
(31, 'Alfredo', 'Alfredo', 'Moreno', '81dc9bdb52d04dc20036dbd8313ed055', 'alfred@gmail.com', 1),
(33, 'loli', 'loli', '', '81dc9bdb52d04dc20036dbd8313ed055', '', 1),
(34, 'Miguel', 'Miguel', 'Lopez', '81dc9bdb52d04dc20036dbd8313ed055', 'miguel@gmail.com', 0),
(36, 'ham', 'hamza', 'ben', '1fd1fa41d6a1720c1a096a70eb472941', 'hamzabenhachmi@gmail.com', 0);

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
(4, 'https://www.youtube.com/watch?v=Lv9o3pPTn7I', 'wewe'),
(5, 'https://youtu.be/3TPW48bcd3Q', 'primer video celia tour'),
(6, 'https://www.youtube.com/watch?v=oInDEX8PU9M', 'wewe'),
(7, 'vhttps://www.youtube.com/watch?v=oInDEX8PU9M', 'wewe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita_guiada`
--

CREATE TABLE `visita_guiada` (
  `id_visita` int(11) NOT NULL,
  `cod_escena` varchar(10) NOT NULL,
  `titulo_escena` varchar(100) NOT NULL,
  `audio_escena` varchar(100) NOT NULL,
  `img_preview` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Indices de la tabla `celda_pd`
--
ALTER TABLE `celda_pd`
  ADD PRIMARY KEY (`id_celda`);

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
-- Indices de la tabla `hotspots`
--
ALTER TABLE `hotspots`
  ADD PRIMARY KEY (`id_hotspot`);

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
-- Indices de la tabla `pisos`
--
ALTER TABLE `pisos`
  ADD PRIMARY KEY (`piso`),
  ADD KEY `piso` (`piso`);

--
-- Indices de la tabla `puntos_mapa`
--
ALTER TABLE `puntos_mapa`
  ADD PRIMARY KEY (`id_punto_mapa`),
  ADD KEY `piso` (`piso`);

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
-- Indices de la tabla `visita_guiada`
--
ALTER TABLE `visita_guiada`
  ADD PRIMARY KEY (`id_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audio`
--
ALTER TABLE `audio`
  MODIFY `id_aud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `escenas`
--
ALTER TABLE `escenas`
  MODIFY `id_escena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;
--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `puntos_mapa`
--
ALTER TABLE `puntos_mapa`
  MODIFY `id_punto_mapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id_vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `visita_guiada`
--
ALTER TABLE `visita_guiada`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `puntos_mapa`
--
ALTER TABLE `puntos_mapa`
  ADD CONSTRAINT `puntos_mapa_ibfk_1` FOREIGN KEY (`piso`) REFERENCES `pisos` (`piso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
