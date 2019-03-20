-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-03-2019 a las 01:19:23
-- Versión del servidor: 10.1.29-MariaDB-6ubuntu2
-- Versión de PHP: 7.3.3-1+ubuntu18.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gesport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `deporte_entrenamiento` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `cupo` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `entrenador_cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id`, `nombre`) VALUES
(1, 'Natación'),
(2, 'Baloncesto'),
(3, 'Futbol'),
(4, 'Patinaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `cedula` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `celular` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `barrio` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `estatura` decimal(10,0) NOT NULL,
  `peso` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `deporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_club`
--

CREATE TABLE `deportista_club` (
  `deportista_cedula` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `fecha_suscripcion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista_reserva`
--

CREATE TABLE `deportista_reserva` (
  `deportista_cedula` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  `asistencia` tinyint(4) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `cedula` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `celular` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `barrio` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `deporte` varchar(45) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escenario`
--

CREATE TABLE `escenario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `deporte` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `disponibilidad` varchar(45) NOT NULL,
  `barrio` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escenario`
--

INSERT INTO `escenario` (`id`, `nombre`, `deporte`, `descripcion`, `disponibilidad`, `barrio`, `direccion`, `latitud`, `longitud`) VALUES
(1, 'coliseo mayor', 1, 'escenario deportivo', '1', 'villapilar', 'cra 34 #20-20', 12341300, 98768800),
(2, 'coliseo menor', 1, 'escenario deportivo', '1', 'san jorge', 'cra 23 #20-20', 12234300, 98768800),
(3, 'futbol5', 3, 'escenario deportivo', '2', 'colinas', 'cll 55 #22-10', 12341300, 98768800),
(4, 'Multicancha san juan', 2, 'escenario deportivo', '3', 'la leonora', 'cra 78 #45-20', 1841320, 98768800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `jornada` varchar(10) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `escenario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `dia`, `jornada`, `hora_inicio`, `hora_fin`, `escenario_id`) VALUES
(1, 'lunes', 'manana', '09:00:00', '11:00:00', 1),
(2, 'miercoles', 'manana', '06:00:00', '12:00:00', 2),
(3, 'viernes', 'tarde', '13:00:00', '18:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `escenario_id` int(11) NOT NULL,
  `deporte_entrenamiento` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_club_entrenador1_idx` (`entrenador_cedula`),
  ADD KEY `fk_club_deporte_idx` (`deporte_entrenamiento`);

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `deportes_idx` (`deporte`);

--
-- Indices de la tabla `deportista_club`
--
ALTER TABLE `deportista_club`
  ADD KEY `fk_deportista_club_deportista_idx` (`deportista_cedula`),
  ADD KEY `fk_deportista_club_club1_idx` (`club_id`);

--
-- Indices de la tabla `deportista_reserva`
--
ALTER TABLE `deportista_reserva`
  ADD KEY `fk_deportista_reserva_deportista1_idx` (`deportista_cedula`),
  ADD KEY `fk_deportista_reserva_reserva1_idx` (`reserva_id`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `escenario`
--
ALTER TABLE `escenario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_escenario_deportes_idx` (`deporte`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horario_escenario1_idx` (`escenario_id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_club1_idx` (`club_id`),
  ADD KEY `fk_reserva_escenario1_idx` (`escenario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `escenario`
--
ALTER TABLE `escenario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `fk_club_deporte` FOREIGN KEY (`deporte_entrenamiento`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_club_entrenador1` FOREIGN KEY (`entrenador_cedula`) REFERENCES `entrenador` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD CONSTRAINT `deportes` FOREIGN KEY (`deporte`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deportista_club`
--
ALTER TABLE `deportista_club`
  ADD CONSTRAINT `fk_deportista_club_club1` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deportista_club_deportista` FOREIGN KEY (`deportista_cedula`) REFERENCES `deportista` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deportista_reserva`
--
ALTER TABLE `deportista_reserva`
  ADD CONSTRAINT `fk_deportista_reserva_deportista1` FOREIGN KEY (`deportista_cedula`) REFERENCES `deportista` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deportista_reserva_reserva1` FOREIGN KEY (`reserva_id`) REFERENCES `reserva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `escenario`
--
ALTER TABLE `escenario`
  ADD CONSTRAINT `fk_escenario_deportes` FOREIGN KEY (`deporte`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_escenario1` FOREIGN KEY (`escenario_id`) REFERENCES `escenario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_club1` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_escenario1` FOREIGN KEY (`escenario_id`) REFERENCES `escenario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
