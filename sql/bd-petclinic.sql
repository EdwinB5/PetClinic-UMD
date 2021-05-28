CREATE DATABASE  IF NOT EXISTS `petclinic` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `petclinic`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: petclinic
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `historial_visita_mascota`
--

DROP TABLE IF EXISTS `historial_visita_mascota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial_visita_mascota` (
  `id_visita` int(11) NOT NULL AUTO_INCREMENT,
  `id_mascota` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL,
  `fechaVisita` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fechaRegistro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_visita`,`id_mascota`,`id_veterinario`),
  KEY `id_veterinario` (`id_veterinario`),
  KEY `id_mascota` (`id_mascota`),
  CONSTRAINT `historial_visita_mascota_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinarios` (`id_veterinario`),
  CONSTRAINT `historial_visita_mascota_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mascotas` (
  `id_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `sexo` tinyint(4) DEFAULT NULL,
  `fechaNacimiento` varchar(20) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `fechaRegistro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `id_persona` int(11) NOT NULL,
  `lectura_r` tinyint(4) DEFAULT NULL,
  `escritura_w` tinyint(4) DEFAULT NULL,
  `ejecucion_x` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `cc` varchar(25) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `sexo` tinyint(4) DEFAULT NULL,
  `fechaNacimiento` varchar(20) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `rolUsuario` varchar(45) DEFAULT NULL,
  `contraseñaUsuario` varchar(45) DEFAULT NULL,
  `tipoUsuario` varchar(45) DEFAULT NULL,
  `fechaRegistro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `propietarios`
--

DROP TABLE IF EXISTS `propietarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietarios` (
  `id_propietario` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `fechaRegistro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_propietario`,`id_persona`,`id_mascota`),
  KEY `id_persona` (`id_persona`),
  KEY `id_mascota` (`id_mascota`),
  CONSTRAINT `propietarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  CONSTRAINT `propietarios_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `veterinarios`
--

DROP TABLE IF EXISTS `veterinarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veterinarios` (
  `id_veterinario` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `especialidad` varchar(45) DEFAULT NULL,
  `fechaRegistro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_veterinario`,`id_persona`),
  KEY `veterinarios_ibfk_1` (`id_persona`),
  CONSTRAINT `veterinarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'petclinic'
--

--
-- Dumping routines for database 'petclinic'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-06  0:32:36
