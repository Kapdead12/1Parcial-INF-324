-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 04:48:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdjoaquin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `nombre`) VALUES
(1, 'Centro'),
(2, 'San Antonio'),
(3, 'Miraflores'),
(4, 'Sopocachi'),
(5, 'Achumani');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `paterno` varchar(100) DEFAULT NULL,
  `rol` enum('usuario','funcionario') DEFAULT 'usuario',
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ci` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `paterno`, `rol`, `password`, `email`, `ci`) VALUES
(1, 'Juan', 'Perez', 'funcionario', 'contraseña1', 'juan.perez@example.com', '1234235'),
(2, 'María', 'Gómez', 'funcionario', 'contraseña2', 'maria.gomez@example.com', '2234235'),
(3, 'Carlos', 'López', 'usuario', 'contraseña3', 'carlos.lopez@example.com', '3234235'),
(4, 'Ana', 'Martínez', 'usuario', 'contraseña4', 'ana.martinez@example.com', '4234235'),
(5, 'Pedro', 'Hernández', 'usuario', 'contraseña5', 'luis.hernandez@example.com', '5234235'),
(11, 'Joaquin', 'Kapa', 'funcionario', '12345678', 'jgriezmann77@gmail.com', '13608916'),
(93, 'Ricardo', 'Fernandez', 'usuario', '12345678', 'gabri5@example.com', '1234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_prop`
--

CREATE TABLE `persona_prop` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `propiedad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona_prop`
--

INSERT INTO `persona_prop` (`id`, `persona_id`, `propiedad_id`) VALUES
(8, 1, 1),
(5, 1, 3),
(7, 1, 4),
(9, 11, 2),
(11, 11, 5),
(12, 11, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id` int(11) NOT NULL,
  `xini` decimal(10,6) NOT NULL,
  `yini` decimal(10,6) NOT NULL,
  `xfin` decimal(10,6) NOT NULL,
  `yfin` decimal(10,6) NOT NULL,
  `superficie` decimal(10,2) NOT NULL,
  `codigo_catastral` varchar(20) DEFAULT NULL,
  `zona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id`, `xini`, `yini`, `xfin`, `yfin`, `superficie`, `codigo_catastral`, `zona_id`) VALUES
(1, 123.460000, 456.790000, 124.460000, 457.790000, 100.50, '2 01 038 0549 0001', 1),
(2, 223.460000, 556.790000, 224.460000, 557.790000, 200.75, '2 01 039 0550 0002', 2),
(3, 323.460000, 656.790000, 324.460000, 657.790000, 150.25, '2 01 040 0551 0003', 3),
(4, 423.460000, 756.790000, 424.460000, 757.790000, 175.00, '2 01 041 0552 0001', 4),
(5, 523.460000, 856.790000, 524.460000, 857.790000, 125.50, '2 01 042 0553 0002', 5),
(6, 623.460000, 956.790000, 624.460000, 957.790000, 300.75, '2 01 043 0554 0003', 6),
(7, 723.460000, 1056.790000, 724.460000, 1057.790000, 220.25, '2 01 044 0555 0011', 7),
(8, 823.460000, 1156.790000, 824.460000, 1157.790000, 180.50, '2 01 045 0556 0012', 8),
(9, 923.460000, 1256.790000, 924.460000, 1257.790000, 250.75, '2 01 046 0557 0013', 9),
(10, 1023.460000, 1356.790000, 1024.460000, 1357.790000, 275.25, '2 01 047 0558 0002', 9),
(11, 1123.460000, 1456.790000, 1124.460000, 1457.790000, 150.00, '2 01 048 0559 0003', 8),
(12, 1223.460000, 1556.790000, 1224.460000, 1557.790000, 200.00, '2 01 049 0560 0001', 7),
(13, 1323.460000, 1656.790000, 1324.460000, 1657.790000, 180.50, '2 01 050 0561 0003', 6),
(14, 1423.460000, 1756.790000, 1424.460000, 1757.790000, 210.75, '2 01 051 0562 0002', 5),
(15, 1523.460000, 1856.790000, 1524.460000, 1857.790000, 250.25, '2 01 052 0563 0001', 4),
(16, 101.540000, 120.540000, 100.540000, 100.540000, 100.54, '2 01 038 0000 0002', 2),
(27, 101.540000, 120.540000, 444.000000, 555.000000, 500.54, '2 01 038 1010 0002', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `distrito_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `nombre`, `distrito_id`) VALUES
(1, 'Casco Viejo', 1),
(2, 'San Sebastián', 1),
(3, 'San Jorge', 1),
(4, 'Pampahasi', 2),
(5, 'Villa Armonía', 2),
(6, 'Kupini', 2),
(7, 'Miraflores Alto', 3),
(8, 'Villa Fátima', 3),
(9, 'Sopocachi Alto', 4),
(10, 'Irpavi', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `persona_prop`
--
ALTER TABLE `persona_prop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persona_id` (`persona_id`,`propiedad_id`),
  ADD KEY `propiedad_id` (`propiedad_id`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_catastral` (`codigo_catastral`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distrito_id` (`distrito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `persona_prop`
--
ALTER TABLE `persona_prop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona_prop`
--
ALTER TABLE `persona_prop`
  ADD CONSTRAINT `persona_prop_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `persona_prop_ibfk_2` FOREIGN KEY (`propiedad_id`) REFERENCES `propiedad` (`id`);

--
-- Filtros para la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`id`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
