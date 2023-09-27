-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 16:25:38
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
-- Base de datos: `bd_park`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_lugar`
--

CREATE TABLE `estado_lugar` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_lugar`
--

INSERT INTO `estado_lugar` (`est_id`, `est_nombre`) VALUES
(1, 'Libre'),
(2, 'Ocupado'),
(3, 'Mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id_lugar` int(11) NOT NULL,
  `lug_nombre` varchar(50) NOT NULL,
  `lug_capacidad` int(11) NOT NULL,
  `tip_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id_lugar`, `lug_nombre`, `lug_capacidad`, `tip_id`, `est_id`) VALUES
(1, 'A6', 25, 1, 2),
(2, 'A2', 25, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `resev_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `lug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`resev_id`, `usu_id`, `lug_id`) VALUES
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_lugar`
--

CREATE TABLE `tipo_lugar` (
  `tip_id` int(11) NOT NULL,
  `tip_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_lugar`
--

INSERT INTO `tipo_lugar` (`tip_id`, `tip_nombre`) VALUES
(1, 'Normal'),
(2, 'Discapacitado'),
(3, 'Carga Electrica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(100) NOT NULL,
  `usu_apellido` varchar(100) NOT NULL,
  `usu_edad` int(10) NOT NULL,
  `usu_cedula` varchar(70) NOT NULL,
  `usu_mail` varchar(150) NOT NULL,
  `usu_usuario` varchar(50) NOT NULL,
  `usu_password` varchar(150) NOT NULL,
  `usu_identifier` varchar(255) NOT NULL,
  `usu_key` varchar(255) NOT NULL,
  `usu_estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_edad`, `usu_cedula`, `usu_mail`, `usu_usuario`, `usu_password`, `usu_identifier`, `usu_key`, `usu_estado`) VALUES
(1, 'Santiago', 'Jaimes Pinilla', 19, '1014976535', 'jaisan@gmail.com', 'jaisan', '827ccb0eea8a706c4c34a16891f84e7b', 'asd1asdaserwtopasdvG6nTraFs7Iw8CG9vQtdU0', 'ERT1ERTaserwtopERT5PxOu9NRw98FxcigypHZB.', 1),
(2, 'Jose Felipe', 'Carvajal Campos', 88, '1000240193', 'elgaymasgrande@gmail.com', 'soyhomosexual', 'e10adc3949ba59abbe56e057f20f883e', 'asd1asdaserwtopasddp3mpw/PE.1Ljk.yTV83J1', 'ERT1ERTaserwtopERTcuqfOBxECmFDVLD.jrMgO0', 1),
(3, 'Sebatian', 'Ballen Loaiza', 20, '1001200029', 'mejoramigodesof@gmail.com', 'teamsofiaforever', '25f9e794323b453885f5181f1b624d0b', 'asd1asdaserwtopasdqanMfRcOmWGaOGX0rFjtQ1', 'ERT1ERTaserwtopERTaxc56Tz5fcQXhHFe/Wx9i1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `veh_id` int(11) NOT NULL,
  `veh_marca` varchar(70) NOT NULL,
  `veh_color` varchar(100) NOT NULL,
  `veh_modelo` varchar(100) NOT NULL,
  `veh_placa` varchar(100) NOT NULL,
  `veh_foto` longblob DEFAULT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`veh_id`, `veh_marca`, `veh_color`, `veh_modelo`, `veh_placa`, `veh_foto`, `usu_id`) VALUES
(1, 'ferrari', 'naranja', 'SF90 STRADALE', 'WIN-712', '', 1),
(2, 'DOUGE challenger', 'verde militar', '2021 hellcat', 'GAY-424', '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_lugar`
--
ALTER TABLE `estado_lugar`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id_lugar`),
  ADD KEY `tip_id` (`tip_id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`resev_id`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `lug_id` (`lug_id`);

--
-- Indices de la tabla `tipo_lugar`
--
ALTER TABLE `tipo_lugar`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`veh_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_lugar`
--
ALTER TABLE `estado_lugar`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id_lugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `resev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_lugar`
--
ALTER TABLE `tipo_lugar`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `veh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `lugares_ibfk_1` FOREIGN KEY (`tip_id`) REFERENCES `tipo_lugar` (`tip_id`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`lug_id`) REFERENCES `lugares` (`id_lugar`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
