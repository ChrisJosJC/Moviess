-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2023 a las 06:17:48
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Blune`
--
CREATE DATABASE IF NOT EXISTS `Blune` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Blune`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `ID_director` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`ID_director`, `nombre`) VALUES
(1, 'Joss Wedon'),
(2, 'Gonzalo Garcia'),
(3, 'Raul Perez'),
(4, 'James Cameron'),
(5, 'Ryan Raynolds'),
(6, 'Zack Snyder');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `ID_genero` int(11) NOT NULL,
  `nombre_genero` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`ID_genero`, `nombre_genero`) VALUES
(1, 'Drama'),
(2, 'Accion'),
(3, 'Ciencia ficcion'),
(4, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `ID` int(11) NOT NULL,
  `sinopsis` text COLLATE utf16_spanish_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `Duracion` varchar(10) COLLATE utf16_spanish_ci NOT NULL,
  `Director` int(11) NOT NULL,
  `Productora` int(11) NOT NULL,
  `Ano` int(11) NOT NULL,
  `Genero` int(11) NOT NULL,
  `Imagen` varchar(200) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`ID`, `sinopsis`, `Nombre`, `Duracion`, `Director`, `Productora`, `Ano`, `Genero`, `Imagen`) VALUES
(36, 'La gran historia de los buenos informaticos', 'Informatica: la maxima', '02:40', 5, 2, 2020, 2, './uploads/php9B90.png'),
(37, 'Una historia aburrida de numeros y abogados', 'Contabilidad: Hasta morir de aburrimiento', '02:00', 4, 2, 2022, 4, './uploads/php7BD7.png'),
(39, 'Una historia tragica de platos y mucho fab que comienza desde el primer momento en que estas personas pisan un lugubre y agotador lugar llamado Politecnico Pedro Feliciano Martinez.', 'Gastronomia: Tus lavaplatos en delantal', '01:00:10', 1, 1, 2022, 1, './uploads/phpD58D.jpg'),
(40, 'Un fontanero llamado Mario viaja por un laberinto subterráneo con su hermano, Luigi, intentando salvar a una princesa capturada.', 'Mario Bros: la pelicula', '01:00:10', 3, 2, 2023, 2, './uploads/php8C4B.jpg'),
(41, '', 'Electricidad', '02:00', 6, 3, 2022, 2, './uploads/phpF601.jpg'),
(42, 'Un area llena de vida y mucha dinamica. Por lo general, el creador o en primera instancia repartidor de chismes del politecnico.', 'Enfermeria: Chismecitos y más...', '01:00:10', 1, 1, 2020, 1, './uploads/phpB8CE.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productora`
--

CREATE TABLE `productora` (
  `ID_productora` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `productora`
--

INSERT INTO `productora` (`ID_productora`, `nombre`) VALUES
(1, 'Disney'),
(2, 'Netflix'),
(3, 'APACHES ENTERTAINMENT, S.L.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`) VALUES
(1, 'Chris Joseph', 'chrisjoseph380@gmail.com', 'f52c3cbf371351206c419e50ce29c802'),
(2, 'Arbeloa', 'arbeloa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`ID_director`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ID_genero`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Genero` (`Genero`),
  ADD KEY `Productora` (`Productora`),
  ADD KEY `Director` (`Director`);

--
-- Indices de la tabla `productora`
--
ALTER TABLE `productora`
  ADD PRIMARY KEY (`ID_productora`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `ID_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `ID_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `productora`
--
ALTER TABLE `productora`
  MODIFY `ID_productora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
