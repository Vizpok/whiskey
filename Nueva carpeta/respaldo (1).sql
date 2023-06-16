-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 08:53:20
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `respaldo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantesdelequipo`
--

CREATE TABLE `integrantesdelequipo` (
  `id` bigint(14) NOT NULL,
  `nombre` varchar(33) NOT NULL,
  `rol` varchar(40) NOT NULL,
  `redSocial` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `integrantesdelequipo`
--

INSERT INTO `integrantesdelequipo` (`id`, `nombre`, `rol`, `redSocial`, `foto`) VALUES
(1234, 'Alwertano', 'Integrante Familia peluche', 'Nose', 'no hay'),
(21323052720094, 'Julisa Lopez', 'Redactora Principal de documentacion ', 'https://www.instagram.com/xscorpion52/?hl=es', 'Pictures/Julisa.jpg'),
(21323052720342, 'Xavier Isai Reyes Martinez', 'Programador Principal', 'https://www.instagram.com/ghy._gy/?hl=es', 'Pictures/Isai.jpg'),
(21323052720350, 'Ricardo Daniel Rodríguez Lazcano', 'Programador Secundario', 'https://www.instagram.com/ricardodanielrdz/?hl=es', 'Pictures/Ricardo.jpg'),
(21323052720378, 'Ashli Jearyn Saucedo Lopez', 'Redactora Secundaria de documentacion', 'https://www.instagram.com/ashlijearyn/?hl=es', 'Pictures/Ashli.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `idp` varchar(34) NOT NULL,
  `id` varchar(34) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `publicacion` longtext NOT NULL,
  `fecha` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idp`, `id`, `titulo`, `publicacion`, `fecha`) VALUES
('6487f1e691343', '6477d21a4031f', 'The legend of zelda', 'La historia comienza en el reino de Hyrule, donde un joven llamado Link vive en el Bosque Kokiri sin saber que es el elegido por el destino para convertirse en el Héroe del Tiempo. Un hada llamada Navi lo despierta una noche y lo guía hasta el Gran Árbol Deku, quien le informa sobre su destino y la necesidad de enfrentarse a un malvado hechicero llamado Ganondorf.\r\n\r\nLink se embarca en una búsqueda épica para obtener la Trifuerza, un poderoso artefacto capaz de otorgar deseos. Para ello, debe despertar a los seis Sabios y recoger los Medallones de las Diosas. Durante su viaje, viaja a través del tiempo, utilizando la Ocarina del Tiempo para viajar entre el pasado y el futuro.\r\n\r\nA medida que Link crece y se convierte en un adulto, se enfrenta a diversos desafíos y dungeons, cada uno protegido por un jefe poderoso. Estos dungeons están llenos de acertijos, trampas y enemigos que Link debe superar utilizando su ingenio y habilidades.\r\n\r\nA lo largo de su aventura, Link se encuentra con personajes memorables, como la Princesa Zelda, que le proporciona sabiduría y apoyo, y Sheik, un misterioso personaje que lo guía en su búsqueda. También se encuentra con otros aliados como la princesa Ruto, Darunia, Nabooru y Impa, entre otros.\r\n\r\nFinalmente, Link se enfrenta a Ganondorf en una batalla épica en el Castillo de Hyrule. Después de una feroz pelea, Link logra derrotar a Ganondorf y sellarlo en el Reino del Crepúsculo. Sin embargo, la Princesa Zelda decide enviar a Link de vuelta en el tiempo para que pueda tener una infancia normal.\r\n\r\n\"The Legend of Zelda: Ocarina of Time\" es una historia de valentía, amistad y el eterno conflicto entre el bien y el mal. A través de su viaje, Link se convierte en el héroe legendario y salva a Hyrule de la oscuridad, dejando un legado duradero en el reino y en los corazones de los jugadores.', '13-06-2023'),
('64892cf13222d', '6477d21a4031f', 'Consejo de vida', '\"Enfréntate a desafíos épicos en un mundo fantástico y conviértete en leyenda.\"', '14-06-2023'),
('64892dc628775', '6477d21a4031f', 'Albion Online', '\"Albion Online es un mundo abierto lleno de posibilidades ilimitadas. Forja tu propio destino en un vasto continente compartido, donde cada acción que tomes moldeará el curso de tu historia. Lucha en emocionantes batallas PvP, explora territorios desconocidos, crea poderosas alianzas y construye tu propio imperio. ¡Sumérgete en una experiencia única de sandbox MMO donde la libertad y la conquista van de la mano! ¿Estás listo para dejar tu huella en Albion Online?\"', '14-06-2023'),
('6489581a78a47', '6477d21a4031f', 'Siempre es lo mismo', '\"Embárcate en una emocionante odisea en un vasto mundo abierto. Explora paisajes impresionantes, enfréntate a desafiantes enemigos y descubre secretos ancestrales. Personaliza a tu héroe, mejora tus habilidades y forja poderosas alianzas. ¡Sumérgete en una historia épica llena de giros inesperados y conviértete en el legendario héroe que el reino necesita! ¿Estás preparado para la aventura de tu vida?\"\r\n', '14-06-2023'),
('648aabc770e9d', '6477f69f7cfc7', 'Un extraño muy familiar', 'En el popular videojuego \"The Legend of Zelda: Ocarina of Time\" para la consola Nintendo 64, existe un pequeño easter egg relacionado con un personaje llamado \"Sheik\". Sheik es un misterioso personaje que ayuda al protagonista, Link, durante su aventura.\r\n\r\nEl secreto es que el verdadero nombre de Sheik es \"Zelda\". A lo largo del juego, Sheik se presenta como un personaje completamente independiente y no se revela su verdadera identidad hasta más tarde. Sin embargo, en un giro sorprendente, se revela que Sheik es en realidad la princesa Zelda disfrazada.\r\n\r\nEste secreto fue un gran giro argumental en su momento y sorprendió a muchos jugadores. Fue una forma ingeniosa de mantener la identidad de Zelda en secreto y agregar un elemento sorpresa a la historia del juego.', '15-06-2023'),
('648ab07a5873d', '6477f69f7cfc7', 'The punishing game (Dark Souls)', 'Dark Souls te sumerge en un reino implacable y en ruinas, donde enfrentas enemigos aterradores y desafíos sin piedad. La serie se caracteriza por su combate estratégico y su sistema de progresión basado en la superación constante. Cada victoria es una verdadera hazaña, y cada derrota es una oportunidad para aprender y mejorar.\r\n\r\nPero Dark Souls no se trata solo de dificultad. La saga ha sido elogiada por su narrativa sutil y atmosfera envolvente. El juego te deja pistas y fragmentos de historia dispersos por su vasto mundo, y es tu labor unir las piezas del rompecabezas mientras exploras ruinas desoladas y encuentras personajes intrigantes.\r\n\r\nDesde Lordran hasta Lothric, los escenarios de Dark Souls son impresionantes y aterradores a la vez. Te encontrarás con majestuosos castillos en ruinas, bosques oscuros y retorcidos, y cavernas profundas e inhóspitas. Cada rincón está lleno de peligros y secretos, incitándote a la exploración constante.\r\n\r\nUna de las características más icónicas de la serie es su diseño de jefes épicos. Te enfrentarás a bestias colosales y seres grotescos que pondrán a prueba tu habilidad y resistencia. La victoria contra un jefe en Dark Souls es una experiencia inolvidable, llena de adrenalina y satisfacción.\r\n\r\nAdemás, Dark Souls ha generado una comunidad apasionada de jugadores que comparten sus experiencias, teorías y estrategias en foros y redes sociales. La saga ha inspirado numerosos desafíos y despierta debates sobre su interpretación de la historia y el significado de sus simbolismos.\r\n\r\nEn resumen, Dark Souls es mucho más que un simple videojuego. Es una experiencia que te sumerge en un mundo oscuro y desafiante, donde la paciencia y la perseverancia son recompensadas. Si estás dispuesto a enfrentar los peligros y superar los obstáculos, te espera una aventura épica llena de emociones intensas y descubrimientos asombrosos. ¡Prepárate para entrar en el reino de Dark Souls y descubrir qué te aguarda en la oscuridad!', '15-06-2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id` varchar(36) NOT NULL,
  `usuario` varchar(104) NOT NULL,
  `apodo` varchar(100) NOT NULL,
  `contraseña` varchar(104) NOT NULL,
  `telefono` int(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id`, `usuario`, `apodo`, `contraseña`, `telefono`, `email`) VALUES
('6477ca53e5931', 'joe', 'biden', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'NaN'),
('6477ca61ca752', 'admin2', 'fgdgfd', 'd93591bdf7860e1e4ee2fca799911215', 0, 'NaN'),
('6477d21a4031f', 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
('6477f69f7cfc7', 'isa', 'Vizpok', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
('648419a0b71bc', 'vizpok', 'viz', '81dc9bdb52d04dc20036dbd8313ed055', 0, ''),
('648a6f4985e19', 'dsaa', 'dsa', '81dc9bdb52d04dc20036dbd8313ed055', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `integrantesdelequipo`
--
ALTER TABLE `integrantesdelequipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD UNIQUE KEY `IDP` (`idp`) USING BTREE;
ALTER TABLE `publicaciones` ADD FULLTEXT KEY `fecha` (`fecha`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
