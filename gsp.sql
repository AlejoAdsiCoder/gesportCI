-- MySQL dump 10.16  Distrib 10.1.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gesport
-- ------------------------------------------------------
-- Server version	10.1.29-MariaDB-6ubuntu2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `deporte_entrenamiento` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `cupo` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `entrenador_cedula` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_club_entrenador1_idx` (`entrenador_cedula`),
  KEY `fk_club_deporte_idx` (`deporte_entrenamiento`),
  CONSTRAINT `fk_club_deporte` FOREIGN KEY (`deporte_entrenamiento`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_club_entrenador1` FOREIGN KEY (`entrenador_cedula`) REFERENCES `entrenador` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deportes`
--

DROP TABLE IF EXISTS `deportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deportes`
--

LOCK TABLES `deportes` WRITE;
/*!40000 ALTER TABLE `deportes` DISABLE KEYS */;
INSERT INTO `deportes` VALUES (1,'Natación'),(2,'Baloncesto'),(3,'Futbol'),(4,'Patinaje');
/*!40000 ALTER TABLE `deportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deportista`
--

DROP TABLE IF EXISTS `deportista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `deporte` int(11) NOT NULL,
  PRIMARY KEY (`cedula`),
  KEY `deportes_idx` (`deporte`),
  CONSTRAINT `deportes` FOREIGN KEY (`deporte`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deportista`
--

LOCK TABLES `deportista` WRITE;
/*!40000 ALTER TABLE `deportista` DISABLE KEYS */;
/*!40000 ALTER TABLE `deportista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deportista_club`
--

DROP TABLE IF EXISTS `deportista_club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deportista_club` (
  `deportista_cedula` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `fecha_suscripcion` date NOT NULL,
  `estado` int(11) NOT NULL,
  KEY `fk_deportista_club_deportista_idx` (`deportista_cedula`),
  KEY `fk_deportista_club_club1_idx` (`club_id`),
  CONSTRAINT `fk_deportista_club_club1` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_deportista_club_deportista` FOREIGN KEY (`deportista_cedula`) REFERENCES `deportista` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deportista_club`
--

LOCK TABLES `deportista_club` WRITE;
/*!40000 ALTER TABLE `deportista_club` DISABLE KEYS */;
/*!40000 ALTER TABLE `deportista_club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deportista_reserva`
--

DROP TABLE IF EXISTS `deportista_reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deportista_reserva` (
  `deportista_cedula` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  `asistencia` tinyint(4) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  KEY `fk_deportista_reserva_deportista1_idx` (`deportista_cedula`),
  KEY `fk_deportista_reserva_reserva1_idx` (`reserva_id`),
  CONSTRAINT `fk_deportista_reserva_deportista1` FOREIGN KEY (`deportista_cedula`) REFERENCES `deportista` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_deportista_reserva_reserva1` FOREIGN KEY (`reserva_id`) REFERENCES `reserva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deportista_reserva`
--

LOCK TABLES `deportista_reserva` WRITE;
/*!40000 ALTER TABLE `deportista_reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `deportista_reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrenador`
--

DROP TABLE IF EXISTS `entrenador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrenador`
--

LOCK TABLES `entrenador` WRITE;
/*!40000 ALTER TABLE `entrenador` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrenador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escenario`
--

DROP TABLE IF EXISTS `escenario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escenario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `deporte` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `disponibilidad` varchar(45) NOT NULL,
  `barrio` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_escenario_deportes_idx` (`deporte`),
  CONSTRAINT `fk_escenario_deportes` FOREIGN KEY (`deporte`) REFERENCES `deportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escenario`
--

LOCK TABLES `escenario` WRITE;
/*!40000 ALTER TABLE `escenario` DISABLE KEYS */;
INSERT INTO `escenario` VALUES (1,'coliseo mayor',1,'escenario deportivo','1','villapilar','cra 34 #20-20',12341300,98768800),(2,'coliseo menor',1,'escenario deportivo','1','san jorge','cra 23 #20-20',12234300,98768800),(3,'futbol5',3,'escenario deportivo','2','colinas','cll 55 #22-10',12341300,98768800),(4,'Multicancha san juan',2,'escenario deportivo','3','la leonora','cra 78 #45-20',1841320,98768800);
/*!40000 ALTER TABLE `escenario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(20) NOT NULL,
  `jornada` varchar(10) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `escenario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horario_escenario1_idx` (`escenario_id`),
  CONSTRAINT `fk_horario_escenario1` FOREIGN KEY (`escenario_id`) REFERENCES `escenario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES (1,'lunes','manana','09:00:00','11:00:00',1),(2,'miercoles','manana','06:00:00','12:00:00',2),(3,'viernes','tarde','13:00:00','18:00:00',3);
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `escenario_id` int(11) NOT NULL,
  `deporte_entrenamiento` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reserva_club1_idx` (`club_id`),
  KEY `fk_reserva_escenario1_idx` (`escenario_id`),
  CONSTRAINT `fk_reserva_club1` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_escenario1` FOREIGN KEY (`escenario_id`) REFERENCES `escenario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-20  0:10:59
