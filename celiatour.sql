-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-03-2018 a las 10:20:17
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
(63, 'ptpunto0', 58, 62, 'p4p0', 4),
(64, 'ptpunto1', 79, 74, 'p4p1', 4),
(65, 'ptpunto2', 6, 85, 'p4p2', 4),
(66, 'ptpunto3', 6, 15, 'p4p3', 4),
(67, 'ptpunto4', 94, 61, 'p4p4', 4),
(68, 'ptpunto5', 94, 91, 'p4p5', 4),
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
(124, 'p0punto28', 65.95, 91.19, 'p0p9f5', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `puntos_mapa`
--
ALTER TABLE `puntos_mapa`
  ADD PRIMARY KEY (`id_punto_mapa`),
  ADD KEY `piso` (`piso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puntos_mapa`
--
ALTER TABLE `puntos_mapa`
  MODIFY `id_punto_mapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
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
