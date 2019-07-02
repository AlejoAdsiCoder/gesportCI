-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2019 a las 01:48:12
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `email`, `pass`) VALUES
(10, 'admin', 'ad@mail.co', '1234');

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

--
-- Volcado de datos para la tabla `club`
--

INSERT INTO `club` (`id`, `nombre`, `deporte_entrenamiento`, `fecha_registro`, `cupo`, `estado`, `entrenador_cedula`) VALUES
(1, 'zepelyn', 5, '2019-05-14', 6, '1', 52345),
(2, 'delfines', 5, '2019-05-15', 3, '1', 52346),
(5, 'pyroz', 5, '2019-05-16', 18, '5', 1352345);

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
(5, 'Natación'),
(6, 'Baloncesto'),
(7, 'Futbol'),
(8, 'Patinaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `cedula` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `telefono` int(20) UNSIGNED ZEROFILL DEFAULT NULL,
  `celular` int(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `barrio` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `estatura` decimal(10,0) NOT NULL,
  `peso` int(11) NOT NULL,
  `deporte` int(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deportista`
--

INSERT INTO `deportista` (`cedula`, `tipo_documento`, `nombre`, `apellidos`, `rol`, `telefono`, `celular`, `email`, `fecha_nacimiento`, `barrio`, `direccion`, `estatura`, `peso`, `deporte`, `password`, `fecha_registro`) VALUES
(254372, 1, 'Cristian', 'Perez', 2, 00000000000000357383, 3875239, 'ccrus@mail.co', '2019-06-24', 'campin', 'cra 5', '2', 45, 5, '543', '0000-00-00'),
(1053830338, 0, 'Alejandro', 'Patino Cardona', 1, 00000000000300758771, 2147483647, 'apatino@gmail.com', '1993-10-15', 'san jorge', 'cl 46a #12345', '180', 45, 5, '1234', '0000-00-00');

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
  `rol` tinyint(4) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `celular` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `barrio` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `deporte` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`cedula`, `tipo_documento`, `nombre`, `apellidos`, `rol`, `email`, `telefono`, `celular`, `fecha_nacimiento`, `barrio`, `direccion`, `deporte`, `password`, `fecha_registro`) VALUES
(52345, 0, 'eduardo', 'Perez', 0, 'mail@mail.co', 133124, 254524, '2019-05-14', 'san jorge', '', '3', '234', '0000-00-00'),
(52346, 0, 'juan', 'gomez', 2, 'jgomez@mail.co', 63524, 32154612, '2019-05-30', 'fatima', '', '2', '456', '0000-00-00'),
(254245, 0, 'Pepito', 'perez', 2, 'mail@mail.co', 24527, 98797, '2019-05-13', 'san juan', '', '3', '456', '0000-00-00'),
(1352345, 0, 'Carlos', 'garcia', 2, 'mail@mail.co', 23452, 3456653, '2019-05-16', 'san jorge', '', '3', '213452345', '0000-00-00');

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
  `direccion` varchar(45) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escenario`
--

INSERT INTO `escenario` (`id`, `nombre`, `deporte`, `descripcion`, `disponibilidad`, `direccion`, `foto`) VALUES
(1, 'coliseo mayor', 6, 'cancha de basquetball', '2', 'cra 34 #20-20', ''),
(2, 'coliseo menor', 6, 'escenario deportivo', '1', 'cra 23 #20-20', ''),
(5, 'prueba', 5, 'asdfasdf', '1', 'cra 78', 'http://localhost/gesportCI/assets/img/basket.jpg'),
(8, 'Coliseo menor', 5, 'asdfafdsaf', '1', 'cra2', 'assets/img/background.jpg'),
(9, 'complejo acuatico', 6, 'fadfasdfas', '1', 'cra 45', 'assets/img/sc4.jpg');

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
(3, 'viernes', 'tarde', '13:00:00', '18:00:00', 3),
(4, 'lunes', 'tarde', '13:05:19', '15:05:30', 1),
(5, 'miercoles', 'tarde', '14:11:07', '17:11:30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `escenario_id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `club_id`, `escenario_id`, `descripcion`, `fecha_hora_inicio`, `fecha_hora_fin`, `estado`) VALUES
(10, 5, 1, 'Entrenamiento', '2019-06-05 13:54:00', '2019-06-05 14:04:00', 2),
(11, 5, 1, 'prueba 1', '2019-06-14 10:12:00', '2019-06-14 02:00:00', 1),
(12, 2, 1, 'prueba 2', '2019-06-13 08:00:00', '2019-06-13 10:32:00', 1),
(13, 1, 2, 'esto es una prueba', '2019-06-25 16:35:00', '2019-06-25 17:23:00', 1),
(15, 2, 8, 'acondicionamiento para competir', '2019-07-03 14:45:00', '2019-07-03 15:42:00', 1),
(21, 2, 2, 'acondicionamiento fisico', '2019-07-17 15:42:00', '2019-07-17 16:53:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `escenario`
--
ALTER TABLE `escenario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
