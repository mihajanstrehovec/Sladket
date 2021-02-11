CREATE DATABASE  IF NOT EXISTS `sladket` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sladket`;



-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: final1
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

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
-- Table structure for table `Administrator`
--

DROP TABLE IF EXISTS `Administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Administrator` (
  `idAdmin` int NOT NULL,
  `ime` varchar(45) NOT NULL,
  `priimek` varchar(45) NOT NULL,
  `eMail` varchar(45) NOT NULL,
  `geslo` char(60) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Artikel`
--

DROP TABLE IF EXISTS `Artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Artikel` (
  `idArtikla` int NOT NULL AUTO_INCREMENT,
  `imeArtikla` varchar(45) NOT NULL,
  `cenaArtikla` float NOT NULL,
  `zalogaArtikla` int NOT NULL,
  `opisArtikla` mediumtext NOT NULL,
  `kategorijaArtikla` varchar(45) NOT NULL,
  `aktiviran` tinyint(1) NOT NULL DEFAULT '1',
  `ocena` int NOT NULL DEFAULT '0',
  `steviloOcen` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`idArtikla`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ArtikelStrankaOcena`
--

DROP TABLE IF EXISTS `ArtikelStrankaOcena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ArtikelStrankaOcena` (
  `idArtikla` int NOT NULL,
  `idArtStrOcena` int NOT NULL AUTO_INCREMENT,
  `idStranke` int NOT NULL,
  PRIMARY KEY (`idArtStrOcena`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Images`
--

DROP TABLE IF EXISTS `Images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Images` (
  `idImages` int NOT NULL AUTO_INCREMENT,
  `idArtikla` int NOT NULL,
  `imeSlike` varchar(60) NOT NULL,
  PRIMARY KEY (`idImages`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Narocilo_artikli`
--

DROP TABLE IF EXISTS `Narocilo_artikli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Narocilo_artikli` (
  `idNarocilo_artikli` int NOT NULL AUTO_INCREMENT,
  `idNarocilaForeign` int NOT NULL,
  `idArtiklaForeign` int NOT NULL,
  `kolicina` int NOT NULL,
  PRIMARY KEY (`idNarocilo_artikli`),
  KEY `fk_Narocilo_artikli_1_idx` (`idArtiklaForeign`),
  KEY `fk_Narocilo_artikli_2_idx` (`idNarocilaForeign`),
  CONSTRAINT `fk_Narocilo_artikli_1` FOREIGN KEY (`idArtiklaForeign`) REFERENCES `Artikel` (`idArtikla`),
  CONSTRAINT `fk_Narocilo_artikli_2` FOREIGN KEY (`idNarocilaForeign`) REFERENCES `Naročilo` (`idNaročila`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Naročilo`
--

DROP TABLE IF EXISTS `Naročilo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Naročilo` (
  `idNaročila` int NOT NULL AUTO_INCREMENT,
  `idStranke` int NOT NULL,
  `total` float NOT NULL,
  `potrjeno` tinyint(1) NOT NULL,
  `preklicano` tinyint(1) NOT NULL DEFAULT '0',
  `stornirano` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idNaročila`),
  KEY `fk_Naročilo_1_idx` (`idStranke`),
  CONSTRAINT `fk_Stranka` FOREIGN KEY (`idStranke`) REFERENCES `Stranka` (`idStranke`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Prodajalec`
--

DROP TABLE IF EXISTS `Prodajalec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Prodajalec` (
  `idProdajalca` int NOT NULL AUTO_INCREMENT,
  `uporabniskoIme` varchar(45) NOT NULL,
  `eMail` varchar(45) NOT NULL,
  `geslo` char(60) NOT NULL,
  `aktiviran` tinyint(1) NOT NULL DEFAULT '1',
  `imeProdajalca` varchar(45) DEFAULT NULL,
  `priimekProdajalca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProdajalca`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Stranka`
--

DROP TABLE IF EXISTS `Stranka`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Stranka` (
  `idStranke` int NOT NULL AUTO_INCREMENT,
  `imeStranke` varchar(45) NOT NULL,
  `priimekStranke` varchar(45) NOT NULL,
  `mailStranke` varchar(45) NOT NULL,
  `gesloStranke` char(60) NOT NULL,
  `aktivirana` tinyint(1) NOT NULL DEFAULT '1',
  `ulica` varchar(45) NOT NULL,
  `hisnaSt` int NOT NULL,
  `posta` varchar(45) NOT NULL,
  `postnaSt` int NOT NULL,
  PRIMARY KEY (`idStranke`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'final1'
--

--
-- Dumping routines for database 'final1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-20 23:51:58
