-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-04-2018 a las 16:39:57
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
(5, 'assets/audio/a.mp4', 'portico', 'v-guiada'),
(6, 'assets/audio/holaaaaa.mp4', 'puerta cafeteria de enfrente del instituto', 'd-objeto'),
(10, 'assets/audio/audio4.mp3', '', 'd-objeto'),
(13, 'assets/audio/audioportico.mp3', 'audio portico', 'v-guiada'),
(14, 'assets/audio/audioescaleras.mp3', 'audio escaleras', 'v-guiada'),
(15, 'assets/audio/audio1.mp3', 'Fachada principal', 'v-guiada'),
(16, 'assets/audio/alejandro1.mp3', 'alexFachada', 'v-guiada'),
(17, 'assets/audio/alejandro2.mp3', 'alexPortico', 'v-guiada'),
(18, 'assets/audio/alejandro11.mp3', 'alexFachada2', 'v-guiada'),
(19, 'assets/audio/alejandro3.mp3', 'alex-antesala', 'v-guiada'),
(20, 'assets/audio/párrafo 1 alex (online-audio-converter.com).mp3', 'wewe', 'v-guiada');

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
(9, 'p2p2f1', 'assets/imagenes/destacados/9.jpg', 'Salón de actos', 2),
(3, 'p1p2f3', 'assets/imagenes/destacados/3.jpg', 'Portón', 3),
(4, 'p1p12', 'assets/imagenes/destacados/4.jpg', 'Zona de profesorado', 3),
(5, 'p1p5f1', 'assets/imagenes/destacados/5.jpg', 'Dept. Geografía', 4),
(1, 'p0p4f2', 'assets/imagenes/destacados/1.jpg', 'Capilla', 4),
(2, 'p0p1f1', 'assets/imagenes/destacados/2.jpg', 'Pozo', 4),
(7, 'p2p4f3', 'assets/imagenes/destacados/7.jpg', 'Biblioteca', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_mapa`
--

CREATE TABLE `config_mapa` (
  `piso_inicial` int(11) NOT NULL,
  `punto_inicial` varchar(40) NOT NULL,
  `escena_inicial` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `config_mapa`
--

INSERT INTO `config_mapa` (`piso_inicial`, `punto_inicial`, `escena_inicial`) VALUES
(1, 'punto29', 'p1p2f3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escenas`
--

CREATE TABLE `escenas` (
  `id_escena` int(11) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `cod_escena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
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
(10, '', 'p2p5', 120, 1, -90, 'equirectangular', 'assets/imagenes/escenas/p2p5.JPG'),
(11, '', 'p2p6', 120, 0, 59, 'equirectangular', 'assets/imagenes/escenas/p2p6.JPG'),
(12, '', 'p2p7', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p7.JPG'),
(13, '', 'p2p72', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p2p72.JPG'),
(14, '', 'p2p8', 120, 3, -112, 'equirectangular', 'assets/imagenes/escenas/p2p8.JPG'),
(15, '', 'p2p1', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p2p1.JPG'),
(16, '', 'p2p10', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p2p10.JPG'),
(17, '', 'p1p1', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p1.JPG'),
(18, '', 'p1p2', 120, 0, -41, 'equirectangular', 'assets/imagenes/escenas/p1p2.JPG'),
(19, 'Escalera Principal', 'p1p2f1', 120, 15, -173, 'equirectangular', 'assets/imagenes/escenas/p1p2f1.JPG'),
(20, 'Portico', 'p1p2f2', 120, 35, 174, 'equirectangular', 'assets/imagenes/escenas/p1p2f2.JPG'),
(21, 'Entrada', 'p1p2f3', 120, 22, -171, 'equirectangular', 'assets/imagenes/escenas/p1p2f3.JPG'),
(22, '', 'p1p22', 120, -4, 176, 'equirectangular', 'assets/imagenes/escenas/p1p22.JPG'),
(23, '', 'p1p3', 120, -5, -181, 'equirectangular', 'assets/imagenes/escenas/p1p3.JPG'),
(24, '', 'p1p32', 120, -4, -183, 'equirectangular', 'assets/imagenes/escenas/p1p32.JPG'),
(25, '', 'p1p4', 120, -2, -35, 'equirectangular', 'assets/imagenes/escenas/p1p4.JPG'),
(26, '', 'p1p32f1', 120, 0, 5, 'equirectangular', 'assets/imagenes/escenas/p1p32f1.JPG'),
(27, 'Dept. Inglés ', 'p1p32f2', 120, 14, 24, 'equirectangular', 'assets/imagenes/escenas/p1p3f2.JPG'),
(28, '', 'p1p5', 120, -3, -88, 'equirectangular', 'assets/imagenes/escenas/p1p5.JPG'),
(30, '', 'p1p6', 120, -2, 39, 'equirectangular', 'assets/imagenes/escenas/p1p6.JPG'),
(31, '', 'p1p7', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p7.JPG'),
(32, '', 'p1p72', 120, -7, -18, 'equirectangular', 'assets/imagenes/escenas/p1p72.JPG'),
(33, '', 'p1p8', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p8.JPG'),
(34, '', 'p1p9', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p9.JPG'),
(35, '', 'p1p9f1', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p9f1.JPG'),
(36, '', 'p1p9f2', 120, 28, -31, 'equirectangular', 'assets/imagenes/escenas/p1p9f2.JPG'),
(37, '', 'p1p11', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p1p11.JPG'),
(41, 'hall sotano', 'p0p1', 120, -11, -165, 'equirectangular', 'assets/imagenes/escenas/p0p1.JPG'),
(42, '', 'p0p1f1', 120, -1, 176, 'equirectangular', 'assets/imagenes/escenas/p0p1f1.JPG'),
(43, '', 'p0p1f2', 120, -8, 0, 'equirectangular', 'assets/imagenes/escenas/p0p1f2.JPG'),
(44, '', 'p0p2', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p0p2.JPG'),
(45, '', 'p0p3', 120, 9, 137, 'equirectangular', 'assets/imagenes/escenas/p0p3.JPG'),
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
(66, '', 'p4p1', 120, -4, -163, 'equirectangular', 'assets/imagenes/escenas/p4p1.JPG'),
(67, '', 'p4p2', 120, -15, 94, 'equirectangular', 'assets/imagenes/escenas/p4p2.JPG'),
(68, '', 'p4p3', 120, -7, -74, 'equirectangular', 'assets/imagenes/escenas/p4p3.JPG'),
(69, '', 'p4p4', 120, -5, -15, 'equirectangular', 'assets/imagenes/escenas/p4p4.JPG'),
(70, '', 'p4p5', 120, -14, 175, 'equirectangular', 'assets/imagenes/escenas/p4p5.JPG'),
(89, 'Pasillo', 'p0p8', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p8.JPG'),
(90, 'Dpt. de E. Fisica', 'p0p8f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p8f1.JPG'),
(91, 'Gimnasio', 'p0p8f2', 120, 0, -56, 'equirectangular', 'assets/imagenes/escenas/p0p8f2.JPG'),
(92, 'Gimnasio', 'p0p8f3', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p0p8f3.JPG'),
(93, 'Lab. Ciencias Naturales', 'p3p10f1', 120, -3, 82, 'equirectangular', 'assets/imagenes/escenas/p3p10f1.JPG'),
(94, 'Lab. Ciencias Naturales', 'p3p10f2', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p3p10f2.JPG'),
(95, 'Lab. F&Q', 'p2p10f1', 120, -6, 31, 'equirectangular', 'assets/imagenes/escenas/p2p10f1.JPG'),
(96, 'Lab. F&Q', 'p2p10f3', 120, -5, 139, 'equirectangular', 'assets/imagenes/escenas/p2p10f3.JPG'),
(97, 'Lab. F&Q', 'p2p10f2', 120, -7, -26, 'equirectangular', 'assets/imagenes/escenas/p2p10f2.JPG'),
(98, 'Lab. F&Q', 'p2p10f4', 120, -12, -152, 'equirectangular', 'assets/imagenes/escenas/p2p10f4.JPG'),
(99, 'Lab. F&Q', 'p2p10f5', 120, -9, -17, 'equirectangular', 'assets/imagenes/escenas/p2p10f5.JPG'),
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
(121, 'Dept. Geografía e Historia', 'p1p5f1', 120, -5, -161, 'equirectangular', 'assets/imagenes/escenas/p1p5f1.JPG'),
(122, 'Dept. Geografía e Historia', 'p1p5f2', 120, 2, 6, 'equirectangular', 'assets/imagenes/escenas/p1p5f2.JPG'),
(123, 'Escalera', 'p0p0', 120, -14, -187, 'equirectangular', 'assets/imagenes/escenas/p0p0.JPG'),
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
(143, 'Dept. Naturales', 'p1p7f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p1p7f1.JPG'),
(144, 'Entrada Secundaria', 'p1p2f4', 120, 15, 178, 'equirectangular', 'assets/imagenes/escenas/p1p2f4.JPG'),
(145, 'Vistas IES Celia Viñas', 'p1p2f5', 120, 10, 172, 'equirectangular', 'assets/imagenes/escenas/p1p2f5.JPG'),
(148, '', 'p1p2f0', 120, -5, 149, 'equirectangular', 'assets/imagenes/escenas/p1p2f0.JPG'),
(149, 'Biblioteca', 'p2p4f3', 120, -6, 66, 'equirectangular', 'assets/imagenes/escenas/p2p4f3.JPG'),
(150, 'Biblioteca', 'p2p4f2', 120, -3, -90, 'equirectangular', 'assets/imagenes/escenas/p2p4f2.JPG'),
(151, 'Biblioteca', 'p2p4f4', 120, 3, -23, 'equirectangular', 'assets/imagenes/escenas/p2p4f4.JPG'),
(152, 'Aula 8', 'p2p4f1', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p2p4f1.JPG'),
(153, 'Aula 7', 'p2p3f1_JPG', 120, 10, 10, 'equirectangular', 'assets/imagenes/escenas/p2p3f1_JPG.JPG'),
(154, 'Aula Música ', 'p3p9f1', 120, -6, 65, 'equirectangular', 'assets/imagenes/escenas/p3p9f1.JPG'),
(155, 'Vistas IES Celia Viñas', 'p1p2f6', 120, 18, 172, 'equirectangular', 'assets/imagenes/escenas/p1p2f6.JPG'),
(156, 'Vistas IES Celia Viñas', 'p1p2f7', 120, 19, 179, 'equirectangular', 'assets/imagenes/escenas/p1p2f7.JPG');

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
(2, 316),
(3, 10),
(4, 11),
(5, 12),
(5, 13),
(6, 14),
(6, 15),
(6, 16),
(6, 306),
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
(15, 296),
(16, 35),
(16, 165),
(17, 36),
(17, 37),
(17, 38),
(17, 295),
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
(28, 312),
(29, 63),
(29, 290),
(29, 291),
(29, 292),
(29, 293),
(29, 313),
(30, 64),
(30, 65),
(30, 66),
(30, 202),
(30, 226),
(30, 287),
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
(35, 325),
(36, 77),
(36, 232),
(36, 258),
(36, 259),
(36, 260),
(36, 262),
(36, 263),
(36, 280),
(36, 341),
(36, 342),
(36, 343),
(36, 344),
(36, 345),
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
(48, 317),
(48, 318),
(48, 319),
(49, 103),
(49, 104),
(50, 105),
(51, 106),
(51, 107),
(51, 108),
(51, 297),
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
(62, 130),
(62, 131),
(63, 132),
(63, 133),
(64, 134),
(64, 160),
(65, 135),
(65, 136),
(65, 298),
(66, 137),
(66, 138),
(66, 139),
(66, 140),
(66, 141),
(67, 142),
(67, 330),
(67, 331),
(68, 334),
(68, 335),
(68, 336),
(69, 337),
(69, 338),
(69, 339),
(69, 340),
(70, 145),
(70, 332),
(70, 333),
(72, 146),
(89, 153),
(89, 154),
(90, 155),
(91, 158),
(91, 159),
(91, 288),
(92, 156),
(92, 281),
(92, 282),
(92, 283),
(92, 284),
(92, 285),
(92, 286),
(92, 323),
(92, 326),
(93, 162),
(93, 163),
(93, 213),
(94, 161),
(95, 166),
(95, 209),
(95, 210),
(95, 301),
(95, 302),
(95, 303),
(96, 167),
(96, 207),
(96, 208),
(96, 299),
(96, 300),
(96, 322),
(97, 203),
(97, 204),
(97, 205),
(98, 206),
(98, 211),
(98, 212),
(98, 304),
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
(103, 329),
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
(121, 314),
(121, 315),
(122, 311),
(123, 230),
(123, 294),
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
(143, 271),
(149, 305),
(149, 307),
(149, 308),
(150, 309),
(151, 310);

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
  `cerrado_destacado` int(11) NOT NULL DEFAULT '0',
  `documento_url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hotspots`
--

INSERT INTO `hotspots` (`id_hotspot`, `titulo_panel`, `texto_panel`, `descripcion`, `pitch`, `yaw`, `cssClass`, `clickHandlerFunc`, `clickHandlerArgs`, `sceneId`, `targetPitch`, `targetYaw`, `tipo`, `cerrado_destacado`, `documento_url`) VALUES
(1, NULL, NULL, '   ', -13, 2, 'custom-hotspot-salto', 'puntos', 'punto38', 'p2p3', -4, 182, 'scene', 0, NULL),
(2, NULL, NULL, ' ', -16, 126, 'custom-hotspot-salto', 'puntos', 'punto36', 'p2p1', 0, 0, 'scene', 0, NULL),
(3, NULL, NULL, ' ', -8, -180, 'custom-hotspot-salto', 'puntos', 'punto45', 'p2p10', 0, 0, 'scene', 0, NULL),
(5, NULL, NULL, ' ', -10, -83, 'custom-hotspot-salto', 'puntos', 'punto37', 'p2p2', 0, -83, 'scene', 1, NULL),
(6, NULL, NULL, ' ', -9, 185, 'custom-hotspot-salto', 'puntos', 'punto47', 'p2p2f3', -2, -2, 'scene', 0, NULL),
(7, NULL, NULL, ' ', -8, 3, 'custom-hotspot-salto', 'puntos', 'punto48', 'p2p2f2', -2, 3, 'scene', 0, NULL),
(10, NULL, NULL, ' ', -21, -180, 'custom-hotspot-salto', 'puntos', 'punto46', 'p2p2f1', -6, 60, 'scene', 0, NULL),
(11, NULL, NULL, ' ', -19, -9, 'custom-hotspot-salto', 'puntos', 'punto46', 'p2p2f1', -6, 60, 'scene', 0, NULL),
(12, NULL, NULL, ' ', -9, 4, 'custom-hotspot-salto', 'puntos', 'punto37', 'p2p2', -10, 107, 'scene', 0, NULL),
(13, NULL, NULL, ' ', -8, -178, 'custom-hotspot-salto', 'puntos', 'punto39', 'p2p4', -2, 68, 'scene', 0, NULL),
(14, NULL, NULL, ' ', -11, 159, 'custom-hotspot-salto', 'puntos', 'punto38', 'p2p3', -6, 4, 'scene', 0, NULL),
(15, NULL, NULL, ' ', -6, 68, 'custom-hotspot-salto', 'puntos', 'punto40', 'p2p5', -8, -89, 'scene', 0, NULL),
(22, NULL, NULL, ' ', -10, 95, 'custom-hotspot-salto', 'puntos', 'punto39', 'p2p4', -6, 159, 'scene', 0, NULL),
(23, NULL, NULL, ' ', -3, -90, 'custom-hotspot-salto', 'puntos', 'punto41', 'p2p6', 1, 37, 'scene', 0, NULL),
(24, NULL, NULL, ' ', -4, 92, 'custom-hotspot-salto', 'puntos', 'punto40', 'p2p5', -2, 83, 'scene', 0, NULL),
(25, NULL, NULL, ' ', -3, 28, 'custom-hotspot-salto', 'puntos', 'punto42', 'p2p7', -2, -1, 'scene', 0, NULL),
(26, NULL, NULL, ' ', -16, -184, 'custom-hotspot-salto', 'puntos', 'punto41', 'p2p6', 2, 84, 'scene', 0, NULL),
(27, NULL, NULL, ' ', -12, 0, 'custom-hotspot-salto', 'puntos', 'punto43', 'p2p72', 0, 17, 'scene', 0, NULL),
(28, NULL, NULL, ' ', -19, 181, 'custom-hotspot-salto', 'puntos', 'punto42', 'p2p7', -7, -185, 'scene', 0, NULL),
(29, NULL, NULL, ' ', -8, -4, 'custom-hotspot-salto', 'puntos', 'punto44', 'p2p8', -6, 162, 'scene', 0, NULL),
(30, NULL, NULL, ' ', -11, -65, 'custom-hotspot-salto', 'puntos', 'punto43', 'p2p72', -9, 182, 'scene', 0, NULL),
(31, NULL, NULL, ' ', -25, 158, 'custom-hotspot-salto', 'puntos', 'punto36', 'p2p1', 0, 0, 'scene', 0, NULL),
(32, NULL, NULL, ' ', -20, -106, 'custom-hotspot-salto', 'puntos', 'punto44', 'p2p8', -3, -65, 'scene', 0, NULL),
(33, NULL, NULL, ' ', -20, 97, 'custom-hotspot-salto', 'puntos', 'punto37', 'p2p2', 2, -23, 'scene', 0, NULL),
(35, NULL, NULL, ' ', -19, -180, 'custom-hotspot-salto', 'puntos', 'punto37', 'p2p2', 0, 0, 'scene', 0, NULL),
(36, NULL, NULL, ' ', -18, 115, 'custom-hotspot-salto', 'puntos', 'punto16', 'p1p2', -11, 125, 'scene', 0, NULL),
(38, NULL, NULL, ' ', -21, -111, 'custom-hotspot-salto', 'puntos', 'punto22', 'p1p8', -6, 186, 'scene', 0, NULL),
(39, NULL, NULL, ' ', -18, 115, 'custom-hotspot-salto', 'puntos', 'punto27', 'p1p2f1', 0, 0, 'scene', 0, NULL),
(40, NULL, NULL, ' ', -10, -176, 'custom-hotspot-salto', 'puntos', 'punto35', 'p1p22', -4, 175, 'scene', 0, NULL),
(41, NULL, NULL, ' ', -18, -77, 'custom-hotspot-salto', 'puntos', 'punto15', 'p1p1', 0, 0, 'scene', 0, NULL),
(42, NULL, NULL, ' ', -9, -2, 'custom-hotspot-salto', 'puntos', 'punto23', 'p1p11', 0, 0, 'scene', 0, NULL),
(43, NULL, NULL, ' ', -26, 8, 'custom-hotspot-salto', 'puntos', 'punto28', 'p1p2f2', 0, 0, 'scene', 0, NULL),
(44, NULL, NULL, ' ', 6, -174, 'custom-hotspot-salto', 'puntos', 'punto16', 'p1p2', -5, -42, 'scene', 1, NULL),
(45, NULL, NULL, ' ', -16, -2, 'custom-hotspot-salto', 'puntos', 'punto29', 'p1p2f3', 0, 0, 'scene', 0, NULL),
(46, NULL, NULL, ' ', -12, 175, 'custom-hotspot-salto', 'puntos', 'punto27', 'p1p2f1', 16, -173, 'scene', 0, NULL),
(47, NULL, NULL, ' ', -13, -171, 'custom-hotspot-salto', 'puntos', 'punto28', 'p1p2f2', 21, 175, 'scene', 0, NULL),
(48, NULL, NULL, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'punto17', 'p1p3', -4, 180, 'scene', 0, NULL),
(49, NULL, NULL, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'punto16', 'p1p2', 0, 0, 'scene', 0, NULL),
(50, NULL, NULL, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'punto34', 'p1p32', -5, 180, 'scene', 0, NULL),
(51, NULL, NULL, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'punto35', 'p1p22', 0, 0, 'scene', 0, NULL),
(52, NULL, NULL, ' ', -11, 174, 'custom-hotspot-salto', 'puntos', 'punto18', 'p1p4', -3, -47, 'scene', 0, NULL),
(53, NULL, NULL, ' ', -9, -5, 'custom-hotspot-salto', 'puntos', 'punto17', 'p1p3', 0, 0, 'scene', 0, NULL),
(54, NULL, NULL, ' ', -7, 101, 'custom-hotspot-salto', 'puntos', 'punto25', 'p1p32f1', -5, -3, 'scene', 0, NULL),
(55, NULL, NULL, ' ', -14, -88, 'custom-hotspot-salto', 'puntos', 'punto19', 'p1p5', 0, -88, 'scene', 0, NULL),
(56, NULL, NULL, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'punto34', 'p1p32', 0, 0, 'scene', 0, NULL),
(57, NULL, NULL, ' ', -15, -96, 'custom-hotspot-salto', 'puntos', 'punto34', 'p1p32', -8, -32, 'scene', 0, NULL),
(58, NULL, NULL, ' ', -8, -4, 'custom-hotspot-salto', 'puntos', 'punto26', 'p1p32f2', -2, 78, 'scene', 0, NULL),
(59, NULL, NULL, ' ', -11, -106, 'custom-hotspot-salto', 'puntos', 'punto25', 'p1p32f1', -7, -95, 'scene', 0, NULL),
(60, NULL, NULL, ' ', -3, 93, 'custom-hotspot-salto', 'puntos', 'punto18', 'p1p4', 0, 0, 'scene', 0, NULL),
(61, NULL, NULL, ' ', -9, -87, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', -6, -34, 'scene', 0, NULL),
(63, NULL, NULL, ' ', -1, 4, 'custom-hotspot-salto', 'puntos', 'punto19', 'p1p5', 0, 0, 'scene', 0, NULL),
(64, NULL, NULL, ' ', -7, 4, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', 0, 0, 'scene', 0, NULL),
(65, NULL, NULL, ' ', -12, 77, 'custom-hotspot-salto', 'puntos', 'punto19', 'p1p5', -7, 93, 'scene', 0, NULL),
(66, NULL, NULL, ' ', -22, -97, 'custom-hotspot-salto', 'puntos', 'punto30', 'p1p9', -7, 41, 'scene', 0, NULL),
(67, NULL, NULL, ' ', -7, -5, 'custom-hotspot-salto', 'puntos', 'punto32', 'p1p72', 0, 0, 'scene', 0, NULL),
(68, NULL, NULL, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', -10, 47, 'scene', 0, NULL),
(69, NULL, NULL, ' ', -7, -5, 'custom-hotspot-salto', 'puntos', 'punto22', 'p1p8', 0, 0, 'scene', 0, NULL),
(70, NULL, NULL, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', -6, 175, 'scene', 0, NULL),
(71, NULL, NULL, ' ', -22, 54, 'custom-hotspot-salto', 'puntos', 'punto15', 'p1p1', 0, 0, 'scene', 0, NULL),
(72, NULL, NULL, ' ', -11, 189, 'custom-hotspot-salto', 'puntos', 'punto32', 'p1p72', -5, 176, 'scene', 0, NULL),
(73, NULL, NULL, ' ', -24, 91, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', 0, 0, 'scene', 0, NULL),
(74, NULL, NULL, ' ', -12, 2, 'custom-hotspot-salto', 'puntos', 'punto31', 'p1p9f1', -5, 176, 'scene', 0, NULL),
(75, NULL, NULL, ' ', 11, -28, 'custom-hotspot-salto', 'puntos', 'punto30', 'p1p9', 0, 0, 'scene', 0, NULL),
(76, NULL, NULL, ' ', -46, -8, 'custom-hotspot-salto', 'puntos', 'punto14', 'p1p9f2', 0, 0, 'scene', 0, NULL),
(77, NULL, NULL, ' ', -22, 148, 'custom-hotspot-salto', 'puntos', 'punto31', 'p1p9f1', 12, -17, 'scene', 0, NULL),
(79, NULL, NULL, ' ', -9, -172, 'custom-hotspot-salto', 'puntos', 'punto16', 'p1p2', 0, 0, 'scene', 0, NULL),
(80, NULL, NULL, ' ', -21, 128, 'custom-hotspot-salto', 'puntos', 'punto23', 'p1p11', -11, -173, 'scene', 0, NULL),
(81, NULL, NULL, ' ', -19, -5, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0, NULL),
(82, NULL, NULL, ' ', -14, 168, 'custom-hotspot-salto', 'puntos', 'p1punto10', 'p1p10', -6, 134, 'scene', 0, NULL),
(83, NULL, NULL, ' ', -27, 172, 'custom-hotspot-salto', 'puntos', 'punto2', 'p0p1', -12, -166, 'scene', 0, NULL),
(85, NULL, NULL, ' ', -19, 196, 'custom-hotspot-salto', 'puntos', 'punto11', 'p0p1f1', 37, -179, 'scene', 0, NULL),
(87, NULL, NULL, ' ', -25, 102, 'custom-hotspot-salto', 'puntos', 'punto3', 'p0p2', 0, 0, 'scene', 0, NULL),
(88, NULL, NULL, ' ', -2, 10, 'custom-hotspot-salto', 'puntos', 'punto2', 'p0p1', 2, -18, 'scene', 1, NULL),
(89, NULL, NULL, ' ', -11, 161, 'custom-hotspot-salto', 'puntos', 'punto10', 'p0p1f2', -5, 179, 'scene', 0, NULL),
(90, NULL, NULL, ' ', -2, 10, 'custom-hotspot-salto', 'puntos', 'punto11', 'p0p1f1', 8, 9, 'scene', 0, NULL),
(91, NULL, NULL, ' ', -13, -184, 'custom-hotspot-salto', 'puntos', 'punto9', 'p0p5', 2, 100, 'scene', 1, NULL),
(92, NULL, NULL, ' ', -21, -82, 'custom-hotspot-salto', 'puntos', 'punto2', 'p0p1', 13, -179, 'scene', 0, NULL),
(93, NULL, NULL, ' ', -12, -176, 'custom-hotspot-salto', 'puntos', 'punto4', 'p0p3', 0, 0, 'scene', 0, NULL),
(94, NULL, NULL, ' ', -6, -2, 'custom-hotspot-salto', 'puntos', 'punto3', 'p0p2', 14, -129, 'scene', 0, NULL),
(95, NULL, NULL, ' ', -11, 180, 'custom-hotspot-salto', 'puntos', 'punto5', 'p0p4', 0, 0, 'scene', 0, NULL),
(96, NULL, NULL, ' ', -4, 3, 'custom-hotspot-salto', 'puntos', 'punto4', 'p0p3', 3, -3, 'scene', 0, NULL),
(97, NULL, NULL, ' ', -9, -88, 'custom-hotspot-salto', 'puntos', 'punto9', 'p0p5', 0, 0, 'scene', 0, NULL),
(98, NULL, NULL, ' ', -16, -182, 'custom-hotspot-salto', 'puntos', 'punto8', 'p0p4f2', 17, -5, 'scene', 0, NULL),
(99, NULL, NULL, ' ', -2, 105, 'custom-hotspot-salto', 'puntos', 'punto5', 'p0p4', -10, -47, 'scene', 1, NULL),
(100, NULL, NULL, ' ', -7, 87, 'custom-hotspot-salto', 'puntos', 'punto5', 'p0p4', -8, -45, 'scene', 0, NULL),
(101, NULL, NULL, ' ', -5, 177, 'custom-hotspot-salto', 'puntos', 'punto12', 'p0p5f1', 0, 0, 'scene', 0, NULL),
(102, NULL, NULL, ' ', -6, 74, 'custom-hotspot-salto', 'puntos', 'punto10', 'p0p1f2', -8, -45, 'scene', 0, NULL),
(103, NULL, NULL, ' ', -2, -9, 'custom-hotspot-salto', 'puntos', 'punto9', 'p0p5', -2, 141, 'scene', 1, NULL),
(104, NULL, NULL, ' ', -9, 165, 'custom-hotspot-salto', 'puntos', 'punto13', 'p0p5f2', 1, -13, 'scene', 0, NULL),
(105, NULL, NULL, ' ', -3, 169, 'custom-hotspot-salto', 'puntos', 'punto12', 'p0p5f1', 9, -13, 'scene', 0, NULL),
(106, NULL, NULL, ' ', -20, -106, 'custom-hotspot-salto', 'puntos', 'punto61', 'p3p8', -3, 172, 'scene', 0, NULL),
(107, NULL, NULL, ' ', -20, 89, 'custom-hotspot-salto', 'puntos', 'punto50', 'p3p2', -147, -11, 'scene', 0, NULL),
(109, NULL, NULL, ' ', -12, -185, 'custom-hotspot-salto', 'puntos', 'punto52', 'p3p3', -6, -178, 'scene', 0, NULL),
(110, NULL, NULL, ' ', -18, -91, 'custom-hotspot-salto', 'puntos', 'punto49', 'p3p1', 0, 0, 'scene', 0, NULL),
(111, NULL, NULL, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'punto62', 'p3p10', 0, 0, 'scene', 0, NULL),
(112, NULL, NULL, ' ', -4, 96, 'custom-hotspot-salto', 'puntos', 'punto51', 'p3p2f2', 0, 0, 'scene', 0, NULL),
(113, NULL, NULL, ' ', -7, -61, 'custom-hotspot-salto', 'puntos', 'punto50', 'p3p2', -6, 60, 'scene', 0, NULL),
(114, NULL, NULL, ' ', -8, -2, 'custom-hotspot-salto', 'puntos', 'punto50', 'p3p2', -9, -93, 'scene', 0, NULL),
(115, NULL, NULL, ' ', -10, 180, 'custom-hotspot-salto', 'puntos', 'punto53', 'p3p4', -2, 68, 'scene', 0, NULL),
(116, NULL, NULL, ' ', -8, 2, 'custom-hotspot-salto', 'puntos', 'punto52', 'p3p3', 12, -3, 'scene', 0, NULL),
(117, NULL, NULL, ' ', -10, -85, 'custom-hotspot-salto', 'puntos', 'punto56', 'p3p5', -8, -89, 'scene', 0, NULL),
(118, NULL, NULL, ' ', -15, 164, 'custom-hotspot-salto', 'puntos', 'punto54', 'p3p4f2', -6, -118, 'scene', 0, NULL),
(119, NULL, NULL, ' ', -13, 206, 'custom-hotspot-salto', 'puntos', 'punto55', 'p3p4f3', -10, 135, 'scene', 0, NULL),
(120, NULL, NULL, ' ', -7, -3, 'custom-hotspot-salto', 'puntos', 'punto53', 'p3p4', -6, 159, 'scene', 0, NULL),
(121, NULL, NULL, ' ', -12, -42, 'custom-hotspot-salto', 'puntos', 'punto53', 'p3p4', -6, 159, 'scene', 0, NULL),
(122, NULL, NULL, ' ', -10, 95, 'custom-hotspot-salto', 'puntos', 'punto53', 'p3p4', -6, 159, 'scene', 0, NULL),
(123, NULL, NULL, ' ', -3, -90, 'custom-hotspot-salto', 'puntos', 'punto58', 'p3p6', -5, -161, 'scene', 0, NULL),
(124, NULL, NULL, ' ', -10, -140, 'custom-hotspot-salto', 'puntos', 'punto57', 'p3p5f1', -5, -161, 'scene', 0, NULL),
(125, NULL, NULL, ' ', -5, 42, 'custom-hotspot-salto', 'puntos', 'punto56', 'p3p5', -6, 159, 'scene', 0, NULL),
(126, NULL, NULL, ' ', -12, 103, 'custom-hotspot-salto', 'puntos', 'punto56', 'p3p5', -2, 83, 'scene', 0, NULL),
(127, NULL, NULL, ' ', -7, 38, 'custom-hotspot-salto', 'puntos', 'punto60', 'p3p7', -2, -1, 'scene', 0, NULL),
(128, NULL, NULL, ' ', -13, 205, 'custom-hotspot-salto', 'puntos', 'punto59', 'p3p6f1', -18, -180, 'scene', 0, NULL),
(129, NULL, NULL, ' ', -12, -114, 'custom-hotspot-salto', 'puntos', 'punto58', 'p3p6', -1, 37, 'scene', 0, NULL),
(130, NULL, NULL, ' ', -16, -184, 'custom-hotspot-salto', 'puntos', 'punto58', 'p3p6', -2, 147, 'scene', 0, NULL),
(131, NULL, NULL, ' ', -12, 0, 'custom-hotspot-salto', 'puntos', 'punto61', 'p3p8', 0, 17, 'scene', 0, NULL),
(132, NULL, NULL, ' ', -11, 177, 'custom-hotspot-salto', 'puntos', 'punto60', 'p3p7', -9, 182, 'scene', 0, NULL),
(133, NULL, NULL, ' ', -19, 49, 'custom-hotspot-salto', 'puntos', 'punto49', 'p3p1', 0, 0, 'scene', 0, NULL),
(134, NULL, NULL, ' ', -19, -180, 'custom-hotspot-salto', 'puntos', 'punto50', 'p3p2', 0, 0, 'scene', 0, NULL),
(136, NULL, NULL, ' ', -3, 10, 'custom-hotspot-salto', 'puntos', 'punto64', 'p4p1', 0, 0, 'scene', 0, NULL),
(137, NULL, NULL, ' ', -13, 17, 'custom-hotspot-salto', 'puntos', 'punto63', 'p4p0', -2, 141, 'scene', 0, NULL),
(138, NULL, NULL, ' ', -3, -11, 'custom-hotspot-salto', 'puntos', 'punto65', 'p4p2', -17, -153, 'scene', 0, NULL),
(139, NULL, NULL, ' ', -2, 31, 'custom-hotspot-salto', 'puntos', 'punto66', 'p4p3', -20, 114, 'scene', 0, NULL),
(140, NULL, NULL, ' ', -17, 144, 'custom-hotspot-salto', 'puntos', 'punto67', 'p4p4', -15, 178, 'scene', 0, NULL),
(141, NULL, NULL, ' ', -15, -128, 'custom-hotspot-salto', 'puntos', 'punto68', 'p4p5', -21, 176, 'scene', 0, NULL),
(142, NULL, NULL, ' ', -3, -111, 'custom-hotspot-salto', 'puntos', 'punto64', 'p4p1', -1, 20, 'scene', 0, NULL),
(145, NULL, NULL, ' ', -3, 40, 'custom-hotspot-salto', 'puntos', 'punto64', 'p4p1', 0, 0, 'scene', 0, NULL),
(146, NULL, NULL, ' ', -3, 40, 'custom-hotspot-salto', ' ', ' ', 'p2guia', 18, -7, 'scene', 0, NULL),
(148, NULL, NULL, '', -11, -94, 'custom-hotspot-salto', 'puntos', 'punto46', 'p2p2f1', 0, 0, 'scene', 0, NULL),
(153, NULL, NULL, '', -7, -94, 'custom-hotspot-salto', 'puntos', 'p0punto15', 'p0p8f2', 0, 0, 'scene', 0, NULL),
(154, NULL, NULL, '', -8, -175, 'custom-hotspot-salto', 'puntos', 'p0punto14', 'p0p8f1', 0, 0, 'scene', 0, NULL),
(155, NULL, NULL, '', -12, -7, 'custom-hotspot-salto', 'puntos', 'p0punto13', 'p0p8', 0, 0, 'scene', 0, NULL),
(156, NULL, NULL, '', -15, -181, 'custom-hotspot-salto', 'puntos', 'p0punto15', 'p0p8f2', 0, 0, 'scene', 0, NULL),
(158, NULL, NULL, '', -9, 77, 'custom-hotspot-salto', 'puntos', 'p0punto13', 'p0p8', 0, 0, 'scene', 0, NULL),
(159, NULL, NULL, '', -11, -10, 'custom-hotspot-salto', 'puntos', 'p0punto16', 'p0p8f3', 0, 0, 'scene', 0, NULL),
(160, NULL, NULL, '', -4, 2, 'custom-hotspot-salto', 'puntos', 'punto82', 'p3p10f1', 0, 0, 'scene', 0, NULL),
(161, NULL, NULL, '', -11, -99, 'custom-hotspot-salto', 'puntos', 'punto82', 'p3p10f1', 0, 0, 'scene', 0, NULL),
(162, NULL, NULL, '', -12, -177, 'custom-hotspot-salto', 'puntos', 'punto62', 'p3p10', 0, 0, 'scene', 0, NULL),
(163, NULL, NULL, '', -11, 87, 'custom-hotspot-salto', 'puntos', 'punto83', 'p3p10f2', 0, 0, 'scene', 0, NULL),
(164, NULL, NULL, '', -13, -100, 'custom-hotspot-salto', 'puntos', 'punto86', 'p2p10f2', 0, 0, 'scene', 0, NULL),
(165, NULL, NULL, '', -4, 6, 'custom-hotspot-salto', 'puntos', 'punto84', 'p2p10f1', 0, 0, 'scene', 0, NULL),
(166, NULL, NULL, '', -20, -6, 'custom-hotspot-salto', 'puntos', 'punto85', 'p2p10f3', 0, 0, 'scene', 0, NULL),
(167, NULL, NULL, '', -19, 91, 'custom-hotspot-salto', 'puntos', 'punto87', 'p2p10f4', 0, 0, 'scene', 0, NULL),
(169, NULL, NULL, '', -25, 94, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0, NULL),
(170, NULL, NULL, '', -30, -97, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0, NULL),
(172, NULL, NULL, '', -32, -93, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0, NULL),
(173, NULL, NULL, '', -19, -2, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0, NULL),
(174, NULL, NULL, '', -20, 82, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0, NULL),
(175, NULL, NULL, '', -18, 171, 'custom-hotspot-salto', 'puntos', 'punto23', 'p1p11', 0, 0, 'scene', 1, NULL),
(176, NULL, NULL, '', -29, -90, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0, NULL),
(177, NULL, NULL, '', -17, 1, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0, NULL),
(178, NULL, NULL, '', -20, 86, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0, NULL),
(179, NULL, NULL, '', -20, -5, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0, NULL),
(180, NULL, NULL, '', -33, 86, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0, NULL),
(181, NULL, NULL, '', -16, 2, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0, NULL),
(182, NULL, NULL, '', -11, -127, 'custom-hotspot-salto', 'puntos', 'punto92', 'p1p12f1', 0, 0, 'scene', 0, NULL),
(183, NULL, NULL, '', -13, -112, 'custom-hotspot-salto', 'puntos', 'punto93', 'p1p12f2', 0, 0, 'scene', 0, NULL),
(184, NULL, NULL, '', -16, -166, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0, NULL),
(185, NULL, NULL, '', -10, 57, 'custom-hotspot-salto', 'puntos', 'punto94', 'p1p12f5', 0, 0, 'scene', 0, NULL),
(186, NULL, NULL, '', -16, -138, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0, NULL),
(187, NULL, NULL, '', -19, 146, 'custom-hotspot-salto', 'puntos', 'punto96', 'p1p12f6', 0, 0, 'scene', 0, NULL),
(188, NULL, NULL, '', -6, -159, 'custom-hotspot-salto', 'puntos', 'punto96', 'p1p12f6', 0, 0, 'scene', 0, NULL),
(189, NULL, NULL, '', -10, -127, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0, NULL),
(190, NULL, NULL, '', -8, 1, 'custom-hotspot-salto', 'puntos', 'punto94', 'p1p12f5', 0, 0, 'scene', 0, NULL),
(191, NULL, NULL, '', -13, -108, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0, NULL),
(192, NULL, NULL, '', -13, -147, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0, NULL),
(193, NULL, NULL, '', -21, -57, 'custom-hotspot-salto', 'puntos', 'punto95', 'p1p12f7', 0, 0, 'scene', 0, NULL),
(194, NULL, NULL, '', -7, 5, 'custom-hotspot-salto', 'puntos', 'punto97', 'p1p12f8', 0, 0, 'scene', 0, NULL),
(195, NULL, NULL, '', -8, -12, 'custom-hotspot-salto', 'puntos', 'punto96', 'p1p12f6', 0, 0, 'scene', 0, NULL),
(196, NULL, NULL, '', -17, -41, 'custom-hotspot-salto', 'puntos', 'punto105', 'p1p12', 0, 0, 'scene', 0, NULL),
(197, NULL, NULL, '', -12, -162, 'custom-hotspot-salto', 'puntos', 'punto23', 'p1p11', 0, 0, 'scene', 1, NULL),
(198, NULL, NULL, '', -15, 109, 'custom-hotspot-salto', 'puntos', 'punto90', 'p1p13', 0, 0, 'scene', 0, NULL),
(199, NULL, NULL, '', -9, 3, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', 0, 0, 'scene', 0, NULL),
(200, NULL, NULL, '', -13, -82, 'custom-hotspot-salto', 'puntos', 'punto100', 'p1p6f2', 0, 0, 'scene', 0, NULL),
(201, NULL, NULL, '', -11, 90, 'custom-hotspot-salto', 'puntos', 'punto98', 'p1p6f1', 0, 0, 'scene', 0, NULL),
(202, NULL, NULL, '', -17, -161, 'custom-hotspot-salto', 'puntos', 'punto98', 'p1p6f1', 0, 0, 'scene', 0, NULL),
(203, NULL, NULL, '', -29, -101, 'custom-hotspot-salto', 'puntos', 'punto84', 'p2p10f1', 0, 0, 'scene', 0, NULL),
(204, NULL, NULL, '', -8, 63, 'custom-hotspot-salto', 'puntos', 'punto88', 'p2p10f5', 0, 0, 'scene', 0, NULL),
(205, NULL, NULL, '', -22, 0, 'custom-hotspot-salto', 'puntos', 'punto87', 'p2p10f4', 0, 0, 'scene', 0, NULL),
(206, NULL, NULL, '', -22, -87, 'custom-hotspot-salto', 'puntos', 'punto85', 'p2p10f3', 0, 0, 'scene', 0, NULL),
(207, NULL, NULL, '', -26, -183, 'custom-hotspot-salto', 'puntos', 'punto84', 'p2p10f1', 0, 0, 'scene', 0, NULL),
(208, NULL, NULL, '', -26, -183, 'custom-hotspot-salto', 'puntos', 'punto84', 'p2p10f1', 0, 0, 'scene', 0, NULL),
(209, NULL, NULL, '', -20, 163, 'custom-hotspot-salto', 'puntos', 'punto45', 'p2p10', 0, 0, 'scene', 0, NULL),
(210, NULL, NULL, '', -21, 97, 'custom-hotspot-salto', 'puntos', 'punto86', 'p2p10f2', 0, 0, 'scene', 0, NULL),
(211, NULL, NULL, '', -22, 177, 'custom-hotspot-salto', 'puntos', 'punto86', 'p2p10f2', 0, 0, 'scene', 0, NULL),
(212, NULL, NULL, '', -9, 113, 'custom-hotspot-salto', 'puntos', 'punto88', 'p2p10f5', 0, 0, 'scene', 0, NULL),
(217, NULL, NULL, '', -8, 109, 'custom-hotspot-salto', 'puntos', 'punto32', 'p1p72', 0, 0, 'scene', 0, NULL),
(229, NULL, NULL, '', -2, -13, 'custom-hotspot-salto', 'puntos', 'punto112', 'p0p0', 0, 0, 'scene', 0, NULL),
(230, NULL, NULL, '', -22, 162, 'custom-hotspot-salto', 'puntos', 'punto2', 'p0p1', 0, 0, 'scene', 0, NULL),
(233, NULL, NULL, '', -9, 7, 'custom-hotspot-salto', 'puntos', 'punto108', 'p0p2f1', 0, 0, 'scene', 0, NULL),
(234, NULL, NULL, '', -8, 8, 'custom-hotspot-salto', 'puntos', 'punto118', 'p0p9f2', 0, 0, 'scene', 0, NULL),
(236, NULL, NULL, '', -45, -155, 'custom-hotspot-salto', 'puntos', 'punto14', 'p1p9f2', 0, 0, 'scene', 0, NULL),
(239, NULL, NULL, '', -15, -101, 'custom-hotspot-salto', 'puntos', 'punto108', 'p0p2f1', 0, 0, 'scene', 0, NULL),
(240, NULL, NULL, '', -10, -43, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0, NULL),
(241, NULL, NULL, '', -10, -43, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0, NULL),
(242, NULL, NULL, '', -10, 95, 'custom-hotspot-salto', 'puntos', 'punto116', 'p0p9f4', 0, 0, 'scene', 0, NULL),
(243, NULL, NULL, '', -13, -175, 'custom-hotspot-salto', 'puntos', 'punto116', 'p0p9f4', 0, 0, 'scene', 0, NULL),
(244, NULL, NULL, '', -9, -117, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0, NULL),
(245, NULL, NULL, '', -4, -1, 'custom-hotspot-salto', 'puntos', 'punto123', 'p0p9f3', 0, 0, 'scene', 0, NULL),
(246, NULL, NULL, '', -16, -181, 'custom-hotspot-salto', 'puntos', 'punto124', 'p0p9f5', 0, 0, 'scene', 0, NULL),
(247, NULL, NULL, '', -21, 0, 'custom-hotspot-salto', 'puntos', 'punto116', 'p0p9f4', 0, 0, 'scene', 0, NULL),
(248, NULL, NULL, '', -9, -42, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0, NULL),
(249, NULL, NULL, '', -12, -143, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0, NULL),
(250, NULL, NULL, '', -25, 79, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0, NULL),
(251, NULL, NULL, '', -11, -138, 'custom-hotspot-salto', 'puntos', 'punto120', 'p0p9f1', 0, 0, 'scene', 0, NULL),
(264, NULL, NULL, '', -14, 21, 'custom-hotspot-salto', 'puntos', 'punto126', 'p1p12f4', 0, 0, 'scene', 0, NULL),
(265, NULL, NULL, '', -20, -161, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0, NULL),
(266, NULL, NULL, '', -16, -90, 'custom-hotspot-salto', 'puntos', 'punto125', 'p1p12f3', 0, 0, 'scene', 0, NULL),
(267, NULL, NULL, '', -17, 88, 'custom-hotspot-salto', 'puntos', 'punto126', 'p1p12f4', 0, 0, 'scene', 0, NULL),
(268, NULL, NULL, '', -15, 122, 'custom-hotspot-salto', 'puntos', 'punto91', 'p1p14', 0, 0, 'scene', 0, NULL),
(269, NULL, NULL, '', -19, -87, 'custom-hotspot-salto', 'puntos', 'punto78', 'p0p8', 0, 0, 'scene', 0, NULL),
(270, NULL, NULL, '', -14, 114, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', 0, 0, 'scene', 0, NULL),
(271, NULL, NULL, '', -13, 54, 'custom-hotspot-salto', 'puntos', 'punto21', 'p1p7', 0, 0, 'scene', 0, NULL),
(272, NULL, NULL, '', -15, -62, 'custom-hotspot-salto', 'puntos', 'punto25', 'p1p32f1', 0, 0, 'scene', 0, NULL),
(273, NULL, NULL, '', -28, 82, 'custom-hotspot-salto', 'puntos', 'punto130', 'p1p3f4', 0, 0, 'scene', 0, NULL),
(274, NULL, NULL, '', -23, -78, 'custom-hotspot-salto', 'puntos', 'punto129', 'p1p3f3', 0, 0, 'scene', 0, NULL),
(275, NULL, NULL, '', -12, 115, 'custom-hotspot-salto', 'puntos', 'punto25', 'p1p32f1', 0, 0, 'scene', 0, NULL),
(276, NULL, NULL, '', -13, 10, 'custom-hotspot-salto', 'puntos', 'punto129', 'p1p3f3', 0, 0, 'scene', 0, NULL),
(277, NULL, NULL, '', -16, 155, 'custom-hotspot-salto', 'puntos', 'punto128', 'p1p3f5', 0, 0, 'scene', 0, NULL),
(278, NULL, NULL, '', -13, -116, 'custom-hotspot-salto', 'puntos', 'punto132', 'p1p7f1', 0, 0, 'scene', 0, NULL),
(279, NULL, NULL, '', -15, -80, 'custom-hotspot-salto', 'puntos', 'punto131', 'p1p7f2', 0, 0, 'scene', 0, NULL),
(290, NULL, NULL, '', -14, -4, 'custom-hotspot-salto', 'puntos', 'punto19', 'p1p5', 0, 0, 'scene', 0, NULL),
(291, NULL, NULL, '', -2, -9, 'custom-hotspot-salto', 'puntos', 'punto19', 'p1p5', 0, 0, 'scene', 0, NULL),
(292, NULL, NULL, '', 7, -1, 'custom-hotspot-salto', 'puntos', 'punto20', 'p1p6', 0, 0, 'scene', 0, NULL),
(293, NULL, NULL, '', 22, -183, 'custom-hotspot-salto', 'puntos', 'punto98', 'p1p6f1', 0, 0, 'scene', 0, NULL),
(294, NULL, NULL, '', -1, 15, 'custom-hotspot-escaleras', 'escaleras', '', '', 0, 0, '', 0, NULL),
(295, NULL, NULL, '', -4, 2, 'custom-hotspot-escaleras', 'escaleras', '', '', 0, 0, '', 0, NULL),
(296, NULL, NULL, '', -2, 3, 'custom-hotspot-escaleras', 'escaleras', '', '', 0, 0, '', 0, NULL),
(297, NULL, NULL, '', -4, 1, 'custom-hotspot-escaleras', 'escaleras', '', '', 0, 0, '', 0, NULL),
(298, NULL, NULL, '', -84, -90, 'custom-hotspot-escaleras', 'escaleras', '', '', 0, 0, '', 0, NULL),
(299, NULL, NULL, '', -26, -144, 'custom-hotspot-video', 'video', '16', '', 0, 0, 'info', 0, NULL),
(300, ' Metodo de mezclas', ' En la imagen podemos observar los preparativos para  llevar a cabo la determinación aproximada del calor específico de un anticongelante para vehículos. Dicho anticongelante, de color verde suave brillante se encuentra en un matraz erlenmeyer. Una porción de él se coloca en un calorímetro provisto de termómetro y agitador y se mide su temperatura. En el vaso se coloca agua que se calienta mediante una resistencia eléctrica hasta una temperatura en torno a 90º que se mide con termómetro.  Al mezclar el agua con el anticongelante en el calorímetro se puede medir la temperatura de equilibrio final y averiguar el calor específico del anticongelante. A partir del dato se puede discutir la utilidad y uso del mismo. <br><br><br> Las sustancias pueden absorber o ceder energía en forma de calor pudiendo sufrir tres tipos de efectos a consecuencia de ello: variaciones de temperatura, cambio de estado o contracciones-dilataciones. La cantidad de calor que un kilogramo de  sustancia necesita para aumentar su temperatura 1 ºC se denomina calor específico o capacidad calorífica específica. Cuanto mayor sea este más calor se necesita para dicho incremento de temperatura.  Esta magnitud es característica para cada tipo de sustancia química y por tanto puede emplearse para identificarla junto con otras propiedades del mismo tipo...', '', -28, 153, 'custom-hotspot-info', 'panelInformacion', '300', '', 0, 0, 'info', 0, 'documento300.pdf'),
(301, 'Refracción de la luz', ' En la imagen observamos un montaje óptico diseñado para estudiar la marcha de los rayos luminosos al atravesar lentes convergentes (la de la imagen) o divergentes, medir su distancias focales y averiguar su potencia. Con un ligero cambio de filtro y empleando una lente semicircular podemos comprobar igualmente las leyes de la refracción luminosa. El montaje está compuesto de: -Foco luminoso conectado a un alimentador de corriente que nos produce la luz necesaria.<br><br>\r\n-Un banco óptico formado para una placa metálica (color verde) que contiene una regla graduada en un lateral para poder situar a las distancias adecuadas los diferentes elementos del montaje, y una línea guía mas centrada.<br> -Una lente convergente incrustada en su soporte (f=+100 mm) colocada junto al foco luminoso, cuyo objetivo es hacer que los rayos que salen dispersos del foco marchen paralelos hasta el resto de elementos del banco óptico.<br> -Un filtro de tres ranuras verticales sobre su soporte, que pretende formar tres rayos luminosos paralelos separados entre sí. Este filtro se sustituye por otro de una ranura si se trata de comprobar las leyes de la refracción, de este modo obtenemos un solo rayo.<br> -Un disco de Hartl sobre su soporte, con su borde graduado para poder medir ángulos y diámetros dibujados a intervalos de 30º, dos de los cuáles, que forman 90º, tiene una parte graduada en el centro para medir distancias.<br>  -Varias lentes convergentes, divergentes y semicircular para el estudio de las mismas y de las leyes de la refracción', '', -33, -61, 'custom-hotspot-info', 'panelInformacion', '301', '', 0, 0, 'info', 0, 'documento301.pdf'),
(302, 'Reacciones de precipitacion', 'En la imagen observamos un matraz erlenmeyer que contiene una disolución en la que ha aparecido un precipitado (sólido) amarillo intenso de ioduro de plomo(II) (PbI2). Los objetivos de la experiencia son reconocer una reacción química de precipitación , identificar el precipitado sólido, aislarlo por filtración y desecarlo, y comprobar la variación de la solubilidad de dicho precipitado con la temperatura. Para ello se necesita un sistema de filtración con trompa de agua para vacío, un desecador de laboratorio y un mechero para calentar tubos de ensayo.<br><br>Cuando una sal se solubiliza en agua se disocia totalmente y se separan sus iones. Así por ejemplo: Una disolución de KI (ioduro de potasio) es en realidad una disolución de iones I- (ioduro) e iones K+ (potasio); y una disolución de Pb(NO3)2 es en realidad una disolución de iones Pb2+ (plomo) e iones NO3-  (nitrato)<br><br>Si se mezclan dos disoluciones de dos sales, tendremos una disolución que contiene los iones de las dos. Si alguna pareja de ellos forma un compuesto insoluble este aparecerá en la disolución en forma de precipitado. Así por ejemplo: Al mezclar las disoluciones de KI y Pb(NO3)2 , tenemos en realidad una disolución de los iones K+ , I- , Pb2+ , NO3-, y como los iones I-  y Pb2+, forman un compuesto insoluble: el ioduro de plomo(II), PbI2 (amarillo), se origina un precipitado de este compuesto. La reacción que tiene lugar es:  Pb(NO3)2 + KI  → PbI2  + KNO3<br>', '', -35, 81, 'custom-hotspot-info', 'panelInformacion', '302', '', 0, 0, 'info', 0, 'documento302.pdf'),
(303, 'Desecador', ' En la imagen observamos un desecador de laboratorio para productos sólidos. Su utilidad radica en mantener limpios y deshidratados los compuestos sólidos y en ayudar a secar compuestos sólidos procedentes de filtraciones. Está compuesto de dos cavidades de vidrio grueso y resistente.<br><br> La cavidad inferior presenta un estrechamiento en su base que divide el compartimento a su vez en dos partes separadas por un soporte de porcelana blanca agujerado: en la más inferior se coloca una sustancia higroscópica (que absorbe agua) tal como gel de sílice, cloruro de calcio (CaCl2), ácido sulfúrico..., y en la superior se colocan las sustancias sólidas en vidrios de reloj, cápsulas de porcelana... sobre el soporte de porcelana blanco.<br><br> La parte superior del desecador hace de tapadera del mismo permitiendo que la sustancias en su interior queden aisladas. Sobre ella y enroscado a la misma se sitúa un codo de vidrio con llave que permite conectar un trompa de agua para hacer el vacío.<br>', '', -31, 25, 'custom-hotspot-info', 'panelInformacion', '303', '', 0, 0, 'info', 0, 'documento303.pdf'),
(304, 'M.R.U Acelerado', ' En la imagen se visualiza el montaje realizado para el estudio del movimiento rectilíneo uniformemente  acelerado (MRUA). En el se distingues las siguientes partes: <br><br>-Un riel rectilíneo por donde puede desplazarse un carrito de ruedas en  el que se pueden colocar pesas en su parte superior para aumentar su masa y regular así su velocidad y aceleración. El riel tiene una escala graduada que permite averiguar la distancia recorrida por el carrito.<br><br>-Un portapesas que permite colocar las pesas adecuadas que van  a ejercer, debido a su peso, la fuerza necesaria para comunicar aceleración al carrito. <br><br>-Un sistema de poleas  con su soporte, por el que desliza una cuerda que une el carrito al portapesas y que sirve para la transmisión de la fuerza. <br><br>Un cuerpo se mueve cuando cambia su posición con el tiempo. Para estudiar el movimiento se emplean tres magnitudes físicas: espacio recorrido (s), velocidad (v) y aceleración (a) e interesa saber cómo varían estas magnitudes en relación con el tiempo, es decir, su relación funcional. Esta se averigua mediante la representación gráfica de los datos experimentales.<br>\r\n', '', -30, 143, 'custom-hotspot-info', 'panelInformacion', '304', '', 0, 0, 'info', 0, 'documento304.pdf'),
(305, NULL, NULL, '', -5, -2, 'custom-hotspot-salto', 'puntos', '', 'p2p4', 0, 0, 'scene', 1, NULL),
(306, NULL, NULL, '', -31, -16, 'custom-hotspot-salto', 'puntos', '', 'p2p4f3', 0, 0, 'scene', 0, NULL),
(307, NULL, NULL, '', -16, 94, 'custom-hotspot-salto', 'puntos', '', 'p2p4f2', 0, 0, 'scene', 0, NULL),
(308, NULL, NULL, '', -10, -51, 'custom-hotspot-salto', 'puntos', '', 'p2p4f4', 0, 0, 'scene', 0, NULL),
(309, NULL, NULL, '', -15, -90, 'custom-hotspot-salto', 'puntos', '', 'p2p4f3', 0, 0, 'scene', 0, NULL),
(310, NULL, NULL, '', -7, 40, 'custom-hotspot-salto', 'puntos', '', 'p2p4f3', 0, 0, 'scene', 0, NULL),
(311, NULL, NULL, '', -21, 5, 'custom-hotspot-salto', 'puntos', '', 'p1p5f1', 0, 0, 'scene', 0, NULL),
(312, NULL, NULL, '', -8, -171, 'custom-hotspot-salto', 'puntos', '', 'p1p5f1', 0, 0, 'scene', 0, NULL),
(313, NULL, NULL, '', -14, -4, 'custom-hotspot-salto', 'puntos', '', 'p1p5', 0, 0, 'scene', 0, NULL),
(314, NULL, NULL, '', -13, -3, 'custom-hotspot-salto', 'puntos', '', 'p1p5', 0, 0, 'scene', 1, NULL),
(315, NULL, NULL, '', -22, -186, 'custom-hotspot-salto', 'puntos', '', 'p1p5f2', 0, 0, 'scene', 0, NULL),
(316, 'Escudo de armas', 'Gran escudo de armas de grandes dimensiones, finalmente modelado, que constituye el blasón de Alfonso XIII, en esencia, el mismo escudo que para su dinastía organizó su cuarto abuelo el rey Carlos III: los cinco cuarteles pertenecientes a la Nación (Castilla-Castilla, León-León y Granada), uno a su linaje de Borbón-Anjou, y diez a sus demás antepasados. \r\nEn 1931 el fervor republicano le cambia la corona real cerrada por la mural de la República que, muda, se presta a acoger alrededor del de Castilla y León, los escudos de las principales casas reinantes de Europa, ancestros de nuestros reyes. Las iras contra el \"Sr. Borbón\" - que así nombraba la prensa de la época al exiliado Alfonso XIII- se dirigen al primero de sus linajes y por eso caen del escusón las tres lises borbónicas, también las mismas florecillas de los cuarteles de las casas de Borgoña (IV), de Parma (V), y Médicis-Toscana (VI), mientras deja intactos los palos de Aragón (I), los palos y Águilas de Aragón-Sicilia (II), la faja de Austria (III), el bandeado de Borgoña viejo (VII), el León rampante de Brabante (VIII) y el de Flandes (IX) y el águila del Tirol (X); así como las de Castilla y León y Granada. Es todo un enigma la relación que entre el Toisón de Oro y las lises que vio el cincelador para borrarlo.', '', 79, 224, 'custom-hotspot-info', 'panelInformacion', '316', '', 0, 0, 'info', 0, 'ninguno'),
(317, 'dsfsdf', 'sdfsdf', '', -20, 150, 'custom-hotspot-info', 'panelInformacion', '317', '', 0, 0, 'info', 0, 'ninguno'),
(318, 'ffdgdf', 'gdfgdf', '', -25, 177, 'custom-hotspot-info', 'panelInformacion', '318', '', 0, 0, 'info', 0, 'ninguno'),
(319, 'nbvnvb', 'nvbnvbn', '', -24, -161, 'custom-hotspot-info', 'panelInformacion', '319', '', 0, 0, 'info', 0, 'ninguno'),
(320, '', '', '', 0, 0, '', '', '', '', 0, 0, '', 0, 'ninguno'),
(322, 'Alambique', 'Es un aparato utilizado para la destilación de líquidos mediante un proceso de evaporación por calentamiento y posterior condensación por enfriamiento. Fue inventado por el sabio persa Al-Razi alrededor del siglo X de nuestra era, para producir perfumes, medicinas y el alcohol procedente de frutas fermentadas.', '', -27, -136, 'custom-hotspot-info', 'panelInformacion', '322', '', 0, 0, 'info', 0, 'documento322.pdf'),
(323, 'Mao', 'Es un aparato utilizado para la destilación de líquidos mediante un proceso de evaporación por calentamiento y posterior condensación por enfriamiento. Fue inventado por el sabio persa Al-Razi alrededor del siglo X de nuestra era, para producir perfumes, medicinas y el alcohol procedente de frutas fermentadas.', '', -5, 54, 'custom-hotspot-info', 'panelInformacion', '323', '', 0, 0, 'info', 0, 'ninguno'),
(325, 'Prueba', 'Esto es una prueba', '', -15, 34, 'custom-hotspot-info', 'panelInformacion', '325', '', 0, 0, 'info', 0, 'ninguno'),
(326, NULL, NULL, '', 3, 43, 'custom-hotspot-video', 'video', '9', '', 0, 0, 'info', 0, NULL),
(329, NULL, NULL, '', -11, 54, 'custom-hotspot-salto', 'puntos', '', 'p1p13', 0, 0, 'scene', 0, NULL),
(330, NULL, NULL, '', -7, -175, 'custom-hotspot-salto', 'puntos', '', 'p4p3', -8, -66, 'scene', 0, NULL),
(331, NULL, NULL, '', -5, -98, 'custom-hotspot-salto', 'puntos', '', 'p4p5', -11, -177, 'scene', 0, NULL),
(332, NULL, NULL, '', -14, 82, 'custom-hotspot-salto', 'puntos', '', 'p4p4', -4, -14, 'scene', 0, NULL),
(333, NULL, NULL, '', -5, 1, 'custom-hotspot-salto', 'puntos', '', 'p4p2', -9, 87, 'scene', 0, NULL),
(334, NULL, NULL, '', -6, 79, 'custom-hotspot-salto', 'puntos', '', 'p4p4', 0, 0, 'scene', 0, NULL),
(335, NULL, NULL, '', -8, 138, 'custom-hotspot-salto', 'puntos', '', 'p4p2', -24, 126, 'scene', 0, NULL),
(336, NULL, NULL, '', -1, 89, 'custom-hotspot-salto', 'puntos', '', 'p4p1', 0, 0, 'scene', 0, NULL),
(337, NULL, NULL, '', -13, 76, 'custom-hotspot-salto', 'puntos', '', 'p4p5', 0, 0, 'scene', 0, NULL),
(338, NULL, NULL, '', -6, 173, 'custom-hotspot-salto', 'puntos', '', 'p4p3', 0, 0, 'scene', 0, NULL),
(339, NULL, NULL, '', -22, 117, 'custom-hotspot-salto', 'puntos', '', 'p4p1', 0, 0, 'scene', 0, NULL),
(340, NULL, NULL, '', -5, 140, 'custom-hotspot-salto', 'puntos', '', 'p4p2', 0, 0, 'scene', 0, NULL),
(341, NULL, NULL, '', -9, -52, 'custom-hotspot-audio', 'musica', '10', '', 0, 0, 'info', 0, NULL),
(342, NULL, NULL, '', 7, -59, 'custom-hotspot-video', 'video', '14', '', 0, 0, 'info', 0, NULL),
(343, NULL, NULL, '', 13, -33, 'custom-hotspot-salto', 'puntos', '', 'p0p8f2', 0, 0, 'scene', 0, NULL),
(344, NULL, NULL, '', 8, -75, 'custom-hotspot-escaleras', 'escaleras', '', '', 0, 0, '', 0, NULL),
(345, 'Prueba', 'Esto es una prueba', '', 31, -62, 'custom-hotspot-info', 'panelInformacion', '345', '', 0, 0, 'info', 0, 'ninguno');

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
(314, 'laboratorio de ciencias naturales', '', '314.jpg', '2018-02-19'),
(343, 'escudo', '', '343.jpg', '2018-03-21'),
(344, 'Escudo de armas salon actos', '', '344.jpg', '2018-03-18'),
(345, 'vidriera escudo central', '', '345.jpg', '2018-03-21'),
(346, 'vidriera escudo derecha', '', '346.jpg', '2018-03-21'),
(347, 'vidriera escudo lateral', '', '347.jpg', '2018-03-21'),
(351, 'Mao', '', '351.jpg', '2018-03-20');

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
(5, 'Apuntes para una historia del Instituto \"Celia Viñas\" de Almería', 'D.Trino Gómez Ruiz', 'I.E.S Celia Viñas', 'Almería2', '2013-10-01', '56', 1, 0),
(6, 'Nacimiento y primeros pasos de un edificio: el I.E.S \"Celia Viñas\"', 'D.José Luis Ruz Márquez', 'I.E.S Celia Viñas', 'Almeria', '2000-10-08', '0', 1, 0),
(9, 'El esplendor de Almeria en el siglo XI', 'E. Castro Guisola', 'Caja Rural Intermediterranea, Cajama.', 'Almeria', '2018-01-28', '84', 0, 1),
(12, 'El arte en España', '-', 'Thomas', '-', '2018-03-17', '412', 0, 0),
(13, 'Tecnologia industrial', 'M.Tortosa', '-', '-', '2018-03-10', '632', 0, 0),
(16, 'Levantar un plano', 'Joaquín Pérez de Rozas', 'Pértiga-Rozas', '-', '2018-03-20', '65465', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_portada`
--

CREATE TABLE `opciones_portada` (
  `titulo_web` varchar(200) NOT NULL,
  `imagen_web` varchar(200) NOT NULL,
  `subtitulo_visita_libre` varchar(200) NOT NULL,
  `subtitulo_visita_guiada` varchar(200) NOT NULL,
  `subtitulo_puntos_destacados` varchar(200) NOT NULL,
  `subtitulo_biblioteca` varchar(200) NOT NULL,
  `show_biblioteca` varchar(1) NOT NULL,
  `show_historia` varchar(1) NOT NULL,
  `nombre_fuente` varchar(100) NOT NULL,
  `color_fuente` varchar(10) NOT NULL,
  `logo_web` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opciones_portada`
--

INSERT INTO `opciones_portada` (`titulo_web`, `imagen_web`, `subtitulo_visita_libre`, `subtitulo_visita_guiada`, `subtitulo_puntos_destacados`, `subtitulo_biblioteca`, `show_biblioteca`, `show_historia`, `nombre_fuente`, `color_fuente`, `logo_web`) VALUES
('CeliaTour', '(campo-sin-uso)', 'Recorre el emblemático IES Celia Viñas con libertad', 'Déjate llevar y te mostraremos la historia de nuestro instituto', 'Pasea por los lugares más notables del IES Celia Viñas', 'Accede online a los libros históricos más notables de nuestra biblioteca', '1', '1', '(TODO)', '(TODO)', '(TODO)');

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
(255, 211),
(281, 300),
(282, 212),
(282, 211),
(282, 210),
(282, 215),
(285, 300),
(285, 294),
(286, 294),
(290, 220),
(290, 221),
(290, 222),
(300, 210),
(301, 215),
(301, 213),
(302, 212),
(302, 214),
(303, 214),
(303, 212),
(304, 220),
(316, 343),
(316, 344),
(322, 209),
(319, 296),
(319, 298),
(318, 343),
(318, 344),
(317, 215),
(317, 298),
(317, 210),
(317, 209),
(317, 310),
(317, 216),
(323, 351),
(326, 231),
(326, 219),
(326, 214),
(326, 209),
(327, 215),
(327, 351),
(327, 347),
(328, 214),
(328, 213),
(328, 209),
(328, 210),
(345, 209),
(345, 210),
(345, 211),
(345, 212),
(346, 351);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panel_informacion`
--

CREATE TABLE `panel_informacion` (
  `id_documento` int(11) NOT NULL,
  `documento_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `panel_informacion`
--

INSERT INTO `panel_informacion` (`id_documento`, `documento_url`) VALUES
(1, 'Mesa01-Inducción-electromagnética.pdf'),
(2, 'Mesa01-Ley-de-Ohm-Resist-serie.pdf'),
(3, 'Mesa02-Medida-acidez-vinagre.pdf'),
(4, 'Mesa02-Separac-por-extracción.pdf'),
(5, 'Mesa10-Mod-Moleculares.pdf'),
(6, 'Mesa09-MRUA.pdf');

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
  `id_escena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
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
(132, '', 29.7, 31.92, 'p1p7f1', 1),
(133, '', 20.13, 8.88, 'p1p2f4', 1),
(134, '', 0.22, 50.32, 'p1p2f5', 1),
(137, '', 54.78, 91.57, 'p1p2f0', 1),
(138, '', 7.55, 75.01, 'p2p4f3', 2),
(139, '', 7.45, 89.15, 'p2p4f2', 2),
(140, '', 4.08, 66.42, 'p2p4f4', 2),
(141, '', 17.45, 84.32, 'p2p4f1', 2),
(142, '', 33.88, 86.11, 'p2p3f1_JPG', 2),
(143, '', 7.94, 18.87, 'p3p9f1', 3),
(144, '', 50.87, 27.72, 'p1p2f6', 1),
(145, '', 79.25, 44.26, 'p1p2f7', 1);

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
(36, 'ham', 'hamza', 'ben', '81dc9bdb52d04dc20036dbd8313ed055', 'hamzabenhachmi@gmail.com', 1),
(38, 'Felix', 'Felix', 'Exposito Lopez', '33eb30894eb347b0ea9e254f30d46cc7', 'el_otro_04@hotmail.com', 1),
(39, 'david', 'david', 'mora', '81dc9bdb52d04dc20036dbd8313ed055', 'davidmoracaceres20@gmail.com', 0);

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
(8, 'https://vimeo.com/2910853', 'wewwwe'),
(9, 'https://vimeo.com/2910853', 'Almería'),
(10, 'https://vimeo.com/2910853', 'jaa'),
(12, 'https://vimeo.com/2910853', 'ee'),
(13, 'https://vimeo.com/2910853', 'ew'),
(14, 'https://vimeo.com/2910853', 're'),
(15, 'https://vimeo.com/2910853', 'aaaaaaaaa'),
(16, 'https://vimeo.com/260919387', 'Proceso de destilacion de agua'),
(17, 'https://vimeo.com/260919387', 'video descpricion de la papa'),
(18, 'https://vimeo.com/260919387', 'es algo normal pero temerario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita_guiada`
--

CREATE TABLE `visita_guiada` (
  `id_visita` int(11) NOT NULL,
  `cod_escena` varchar(10) NOT NULL,
  `titulo_escena` varchar(100) NOT NULL,
  `audio_escena` varchar(100) NOT NULL,
  `img_preview` varchar(100) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visita_guiada`
--

INSERT INTO `visita_guiada` (`id_visita`, `cod_escena`, `titulo_escena`, `audio_escena`, `img_preview`, `orden`) VALUES
(26, 'p1p2', 'Conserjeria', 'assets/audio/holaaaaa.mp4', 'prev26.jpg', 3),
(24, 'p1p2f2', 'Pórtico', 'assets/audio/alejandro2.mp3', 'prev24.jpg', 1),
(25, 'p1p2f1', 'Escaleras', 'assets/audio/holaaaaa.mp4', 'prev25.jpg', 2),
(23, 'p1p2f3', 'Fachada principal', 'assets/audio/alejandro11.mp3', 'prev23.jpg', 0),
(27, 'p1p11', 'Puerta secretaria', 'assets/audio/a.mp4', 'prev27.jpg', 4),
(28, 'p1p12', 'Antesala', 'assets/audio/alejandro3.mp3', 'prev28.jpg', 5);

--
-- Estructura de tabla para la tabla `panoramas_secundarios`
--

CREATE TABLE `panoramas_secundarios` (
  `id_panorama_secundario` int(10) UNSIGNED DEFAULT NULL,
  `id_escena` int(10) UNSIGNED DEFAULT NULL,
  `titulo` varchar(75) DEFAULT NULL,
  `fecha_acontecimiento` date DEFAULT NULL,
  `ruta_imagen` varchar(150) DEFAULT NULL,
  `hfov` int(11) DEFAULT NULL,
  `pitch` int(11) DEFAULT NULL,
  `yaw` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
-- Indices de la tabla `panel_informacion`
--
ALTER TABLE `panel_informacion`
  ADD PRIMARY KEY (`id_documento`);

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
  MODIFY `id_aud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `escenas`
--
ALTER TABLE `escenas`
  MODIFY `id_escena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;
--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `panel_informacion`
--
ALTER TABLE `panel_informacion`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `puntos_mapa`
--
ALTER TABLE `puntos_mapa`
  MODIFY `id_punto_mapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id_vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `visita_guiada`
--
ALTER TABLE `visita_guiada`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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
