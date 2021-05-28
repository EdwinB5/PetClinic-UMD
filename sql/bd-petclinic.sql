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
-- Dumping data for table `historial_visita_mascota`
--

LOCK TABLES `historial_visita_mascota` WRITE;
/*!40000 ALTER TABLE `historial_visita_mascota` DISABLE KEYS */;
INSERT INTO `historial_visita_mascota` VALUES (1,2,2,'2021-05-26','Primera consulta de la mascota, se hizo un analisis general.','2021-05-06');
/*!40000 ALTER TABLE `historial_visita_mascota` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `mascotas`
--

LOCK TABLES `mascotas` WRITE;
/*!40000 ALTER TABLE `mascotas` DISABLE KEYS */;
INSERT INTO `mascotas` VALUES (1,'Toby',2,'2021-05-11','Canino/Perro','Chihuahua','2021-05-06'),(2,'Zeus',1,'2021-05-24','Canino','Labrador','2021-05-06');
/*!40000 ALTER TABLE `mascotas` ENABLE KEYS */;
UNLOCK TABLES;

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
  `fechaRegistro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'100234591','Edwin','Becerra',1,'2021-05-06','Cr 43 # 12 - 2','3212322121','edwin.becerra@uniminuto.edu.co','2021-05-04'),(2,'201030201','Fernando','Bedoya',1,'2021-05-05','Kr 23 # 12 - 1','3212124211','fernando.bedoya@uniminuto.edu.co','2021-05-04'),(3,'901020121','Carlos','Lopez',1,'2021-05-10','Cr 32 # 12 - 13','3162301234','carlos.lopez@uniminuto.edu.co','2021-05-05'),(5,'20103022','Nilson','Vargas',1,'2021-05-12','Cr 12 54A - 12','3201234020','nilson.vargas@uniminuto.edu.co','2021-05-28');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietarios`
--

LOCK TABLES `propietarios` WRITE;
/*!40000 ALTER TABLE `propietarios` DISABLE KEYS */;
INSERT INTO `propietarios` VALUES (2,1,2,'2021-05-06'),(3,3,1,'2021-05-06'),(4,3,2,'2021-05-07');
/*!40000 ALTER TABLE `propietarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registered_users`
--

DROP TABLE IF EXISTS `registered_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registered_users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `idRol` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `display_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`,`idRol`),
  KEY `idRol_px` (`idRol`),
  CONSTRAINT `registered_users_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_users`
--

LOCK TABLES `registered_users` WRITE;
/*!40000 ALTER TABLE `registered_users` DISABLE KEYS */;
INSERT INTO `registered_users` VALUES (1,1,'prueba','prueba','c893bad68927b457dbed39460e6afd62','prueba@prueba.com'),(2,2,'edwin','edwin','8e6e509fba12de7be9ff1cb5333a69d2','edwin@edwin.com');
/*!40000 ALTER TABLE `registered_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'cliente');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veterinarios`
--

LOCK TABLES `veterinarios` WRITE;
/*!40000 ALTER TABLE `veterinarios` DISABLE KEYS */;
INSERT INTO `veterinarios` VALUES (1,2,'Gatos',NULL),(2,1,'Mamiferos',NULL),(3,5,'Ovíparos','2021-05-05');
/*!40000 ALTER TABLE `veterinarios` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2021-05-28 16:09:14
