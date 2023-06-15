-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 06:49:49
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
('64840ee515aac', '6477f69f7cfc7', 'Primera publicaion', 'Este es el primer contenido y aron es gei', '10/06/2023'),
('64840f085ef84', '6477f69f7cfc7', 'Segunda publicaion', 'Sigue siendo gei el aron y tambien jhonatan', '10/06/2023'),
('648410a4d5150', '6477f69f7cfc7', 'wenas', 'hola\r\n', '10/06/2023'),
('6486a26fecd13', '6477f69f7cfc7', 'Test de conportamineto de fecha ', 'Aqui verrificare si la base de datos almecena la informacion de forma ordenada o solo hace lo que se le incha la gana ', '12/06/2023');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD UNIQUE KEY `IDP` (`idp`) USING BTREE;
ALTER TABLE `publicaciones` ADD FULLTEXT KEY `fecha` (`fecha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
