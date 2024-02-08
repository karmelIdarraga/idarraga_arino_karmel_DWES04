CREATE DATABASE  IF NOT EXISTS `dwesbd04` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `dwesbd04`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dwesbd04
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `pistas`
--

DROP TABLE IF EXISTS `pistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pistas` (
  `id_pista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `disponibilidad` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_pista`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pistas`
--

LOCK TABLES `pistas` WRITE;
/*!40000 ALTER TABLE `pistas` DISABLE KEYS */;
INSERT INTO `pistas` VALUES (1,'Pista Alfredo Garbisu - Central','cristal',0),(2,'Pista Ignacio Arana','cristal',0),(3,'Pista Julio Alegria','cristal',0),(4,'Pista Fernando Belasteguin','cristal',1),(5,'Pista Mariano Lasaigues','muro',1),(6,'Pista Gaby Reca','muro',1),(7,'Pista Juan Martin Diaz','muro',1);
/*!40000 ALTER TABLE `pistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_pista` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `jugador2_nombre` varchar(75) DEFAULT NULL,
  `jugador2_edad` int(11) DEFAULT NULL,
  `jugador2_nivel` decimal(2,1) DEFAULT NULL,
  `jugador3_nombre` varchar(75) DEFAULT NULL,
  `jugador3_edad` int(11) DEFAULT NULL,
  `jugador3_nivel` decimal(2,1) DEFAULT NULL,
  `jugador4_nombre` varchar(75) DEFAULT NULL,
  `jugador4_edad` int(11) DEFAULT NULL,
  `jugador4_nivel` decimal(2,1) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_confirmacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `FK_Reservas_pista` (`id_pista`),
  KEY `FK_Reservas_socio` (`id_socio`),
  CONSTRAINT `FK_Reservas_pista` FOREIGN KEY (`id_pista`) REFERENCES `pistas` (`id_pista`),
  CONSTRAINT `FK_Reservas_socio` FOREIGN KEY (`id_socio`) REFERENCES `socios` (`id_socio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,1,2,'2024-02-07','14:00:00','16:00:00','confirmada','Jose Buces',44,3.5,'Koldo Olabarri',34,3.7,'Asier Garabieta',44,3.1,'2023-12-22 07:47:18','2023-12-22 09:47:18'),(2,2,1,'2024-02-07','18:00:00','19:00:00','confirmada','Ander Labayru',38,4.3,'Mikel Alonso',47,4.7,'Julen Campos',24,4.9,'2023-12-22 07:47:18','2023-12-22 09:47:18'),(3,2,1,'2024-02-07','16:00:00','17:00:00','pendiente',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-02-07 08:01:19',NULL),(4,2,1,'2024-02-07','19:00:00','20:00:00','pendiente',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-02-07 08:02:06',NULL);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socios`
--

DROP TABLE IF EXISTS `socios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `socios` (
  `id_socio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `nivel` decimal(2,1) DEFAULT NULL,
  `antiguedad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_socio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socios`
--

LOCK TABLES `socios` WRITE;
/*!40000 ALTER TABLE `socios` DISABLE KEYS */;
INSERT INTO `socios` VALUES (1,'Iker Arana',32,4.5,2014),(2,'Karmel Idarraga',43,3.2,1997),(3,'Gorka Cengotita',34,3.9,2002);
/*!40000 ALTER TABLE `socios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-08 21:52:23
