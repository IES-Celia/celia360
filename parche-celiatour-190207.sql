
DROP TABLE IF EXISTS panoramas_secundarios;
CREATE TABLE `panoramas_secundarios` (
  `id_panorama_secundario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_escena` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo` varchar(75) DEFAULT NULL,
  `fecha_acontecimiento` date DEFAULT NULL,
  `panorama` varchar(250) DEFAULT NULL,
  `hfov` int(11) DEFAULT NULL,
  `pitch` int(11) DEFAULT NULL,
  `yaw` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `panoramas_secundarios`
--

INSERT INTO `panoramas_secundarios` (`id_panorama_secundario`, `cod_escena`, `titulo`, `fecha_acontecimiento`, `panorama`, `hfov`, `pitch`, `yaw`) VALUES
('pan_sec_4', 'p1p2f3', 'Halloween', '2018-10-31', 'assets/imagenes/panoramasSecundarios/pan_sec_4.jpg', 120, -5, -11),
('pan_sec_5', 'p1p2f3', 'Imagen2', '2017-10-31', 'assets/imagenes/panoramasSecundarios/pan_sec_5.jpg', 120, -9, 183),
('pan_sec_6', 'p1p2f3', 'Imagen 3', '2016-10-31', 'assets/imagenes/panoramasSecundarios/pan_sec_6.jpg', 120, 1, -125);


-- ALTER TABLE `escenas_hotspots` DROP PRIMARY KEY( `id_escena`);
ALTER TABLE `escenas_hotspots` ADD `id_panorama_secundario` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL;
ALTER TABLE `pisos` ADD  `top_zona` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL;
ALTER TABLE `pisos` ADD  `left_zona` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL;


DROP TABLE IF EXISTS `opciones_portada`;
CREATE TABLE `opciones_portada` (
    `id_opcion` int(11) NOT NULL,
    `opcion` varchar(200) NOT NULL,
    `opcion_valor` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (0, 'titulo_web', 'Celia tour');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (1, 'imagen_web', 'portada.jpg');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (2, 'subtitulo_visita_libre', 'Texto de prueba 1');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (3, 'subtitulo_visita_guiada', 'Texto de prueba 2' );
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (4, 'subtitulo_puntos_destacados', 'Texto de prueba 3');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (5, 'subtitulo_biblioteca', 'Texto de prueba 4');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (6, 'show_biblioteca', '1');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (7, 'show_historia', '1');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (8, 'nombre_fuente', 'Ubuntu');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (9, 'color_fuente', 'white');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (10, 'logo_web', 'logo.png');
INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES (11, 'ascensor_mapa', 'mapa');
