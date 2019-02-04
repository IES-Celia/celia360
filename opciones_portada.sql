DROP TABLE IF EXISTS `opciones_portada`;

CREATE TABLE `opciones_portada` (
    `id_opcion` int(11) NOT NULL,
    `opcion` varchar(200) NOT NULL,
    `opcion_valor` varchar(200) NOT NULL,
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

DROP TABLE IF EXISTS `ascensor_mapa`;

CREATE TABLE `ascensor_mapa` (
    `id_ascensor_mapa` int(11) NOT NULL,
    `opcion` varchar(200) NOT NULL,
    `src` varchar(200) NOT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8;