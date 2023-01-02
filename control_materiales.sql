-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-01-2023 a las 15:51:18
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_materiales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenista`
--

CREATE TABLE `almacenista` (
  `id` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacenista`
--

INSERT INTO `almacenista` (`id`, `correo`, `contraseña`, `nombre`) VALUES
(1, 'balnearioDP_u1_2022@gmail.com', '123456', 'Michel Vargas'),
(2, 'balnearioDP_u2_2022@gmail.com', '123456', 'Jonan Chavarria Mendoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `material` varchar(50) NOT NULL,
  `solicitante` varchar(30) NOT NULL,
  `area` varchar(20) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `id_almacenista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`id`, `fecha`, `material`, `solicitante`, `area`, `id_estatus`, `id_almacenista`) VALUES
(44, '2022-12-05', 'Un bote de pintura ', 'Neitzer Jesús Olguin Díaz', 'Piscina ', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camionetas`
--

CREATE TABLE `camionetas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `conductor` varchar(30) NOT NULL,
  `camioneta` varchar(30) NOT NULL,
  `hora_salida` time NOT NULL,
  `actividad` varchar(60) NOT NULL,
  `hora_entrega` time NOT NULL,
  `gasolina_cargada` varchar(40) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `id_almacenista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camionetas`
--

INSERT INTO `camionetas` (`id`, `fecha`, `conductor`, `camioneta`, `hora_salida`, `actividad`, `hora_entrega`, `gasolina_cargada`, `id_estatus`, `id_almacenista`) VALUES
(31, '2022-12-06', 'Alex', 'Chevrolet', '09:27:17', 'Viaje de negocios a Pachuca.', '00:00:00', '10 litros de gasolina', 1, 1),
(35, '2022-12-06', 'Edgar', 'Chevrolet', '11:58:41', 'Salida', '11:58:50', '10 litros de gasolina', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

CREATE TABLE `combustible` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `combustible` varchar(40) NOT NULL,
  `solicitante` varchar(30) NOT NULL,
  `concepto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `combustible`
--

INSERT INTO `combustible` (`id`, `fecha`, `combustible`, `solicitante`, `concepto`) VALUES
(51, '2022-12-01', '1 litros de diésel', 'Neitzer Jesús Olguin Días ', 'Motosierra '),
(52, '2022-12-05', '1 litros de gasolina', 'jesus', 'Bomba de agua '),
(53, '2022-12-06', '1 litros de gasolina', 'Jesus', 'Camioneta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cooperativa`
--

CREATE TABLE `cooperativa` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(90) NOT NULL,
  `solicitante` varchar(30) NOT NULL,
  `area` varchar(40) NOT NULL,
  `id_estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `estatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `estatus`) VALUES
(1, 'En préstamo'),
(2, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos_rentas`
--

CREATE TABLE `prestamos_rentas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `material-obserbaciones` varchar(150) NOT NULL,
  `solicitante` varchar(30) NOT NULL,
  `almacenista_entrega` varchar(50) NOT NULL,
  `almacenista_recibe` varchar(50) DEFAULT NULL,
  `area` varchar(50) NOT NULL,
  `id_estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamos_rentas`
--

INSERT INTO `prestamos_rentas` (`id`, `fecha`, `material-obserbaciones`, `solicitante`, `almacenista_entrega`, `almacenista_recibe`, `area`, `id_estatus`) VALUES
(80, '2022-12-02', 'Una pala', 'Neitzer Jesús Olguin Díaz', 'Edgar Cruz Trejo', 'Edgar Cruz Trejo', 'Jardín ', 2),
(82, '2022-12-06', 'Carretilla', 'Edgar', 'Jesus Olguin ', 'Jesus Olguin ', 'Jardin', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenista`
--
ALTER TABLE `almacenista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_bodega` (`id_estatus`),
  ADD KEY `almacenista_bodega` (`id_almacenista`);

--
-- Indices de la tabla `camionetas`
--
ALTER TABLE `camionetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_camionetas` (`id_estatus`),
  ADD KEY `almacenista_camionetas` (`id_almacenista`);

--
-- Indices de la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cooperativa`
--
ALTER TABLE `cooperativa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_cooperativa` (`id_estatus`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamos_rentas`
--
ALTER TABLE `prestamos_rentas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_pr` (`id_estatus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenista`
--
ALTER TABLE `almacenista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `camionetas`
--
ALTER TABLE `camionetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `combustible`
--
ALTER TABLE `combustible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `cooperativa`
--
ALTER TABLE `cooperativa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamos_rentas`
--
ALTER TABLE `prestamos_rentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD CONSTRAINT `bodega_ibfk_1` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bodega_ibfk_2` FOREIGN KEY (`id_almacenista`) REFERENCES `almacenista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `camionetas`
--
ALTER TABLE `camionetas`
  ADD CONSTRAINT `camionetas_ibfk_1` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `camionetas_ibfk_2` FOREIGN KEY (`id_almacenista`) REFERENCES `almacenista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cooperativa`
--
ALTER TABLE `cooperativa`
  ADD CONSTRAINT `cooperativa_ibfk_1` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamos_rentas`
--
ALTER TABLE `prestamos_rentas`
  ADD CONSTRAINT `prestamos_rentas_ibfk_1` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
