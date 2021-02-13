-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2021 a las 07:11:30
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombrePelicula` varchar(50) NOT NULL,
  `año` year(4) NOT NULL,
  `director` varchar(60) NOT NULL,
  `actores` varchar(60) NOT NULL,
  `productores` varchar(60) NOT NULL,
  `duracion` time NOT NULL,
  `generos` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombrePelicula`, `año`, `director`, `actores`, `productores`, `duracion`, `generos`) VALUES
(2, 'Volver al futuro', 1985, 'Robert Zemeckis', 'Michael J. fox', 'Niel Canton', '01:17:00', 'Ciencia Ficcion'),
(3, 'The Matrix', 1999, 'Lilly Wachowski', 'Keanu Reeves', 'Joel Silver', '01:31:00', 'Ciberpunk');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
