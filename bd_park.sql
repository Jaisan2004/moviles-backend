-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 09:29:51
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
