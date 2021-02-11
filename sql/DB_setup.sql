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
-- Dumping data for table `Administrator`
--

LOCK TABLES `Administrator` WRITE;
/*!40000 ALTER TABLE `Administrator` DISABLE KEYS */;
INSERT INTO `Administrator` VALUES (1,'jeff','besus','admin@frajer.sem','$2y$10$gyXaF5bsCsVX/Npif7bmqO6uPHznXA636huYH5hw715DEAW9XR14K');
/*!40000 ALTER TABLE `Administrator` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `Artikel`
--

LOCK TABLES `Artikel` WRITE;
/*!40000 ALTER TABLE `Artikel` DISABLE KEYS */;
INSERT INTO `Artikel` VALUES (133,'5',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kornet',1,0,0),(134,'6',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kornet',1,0,0),(135,'7',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kornet',1,0,0),(136,'8',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Na žlico',1,0,0),(137,'9',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Na žlico',1,0,0),(138,'10',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Na žlico',1,0,0),(139,'11',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Na žlico',1,0,0),(140,'12',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Na žlico',1,0,0),(141,'13',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Na žlico',1,0,0),(142,'14',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kepca',1,0,0),(143,'15',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kepca',1,0,0),(144,'16',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kepca',1,0,0),(145,'17',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kepca',1,0,0),(146,'18',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kepca',1,0,0),(147,'19',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kepca',1,0,0),(148,'20',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kepca',1,0,0),(149,'21',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Kepca',1,0,0),(150,'21',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Piškotek',1,0,0),(151,'22',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Piškotek',1,0,0),(152,'23',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Piškotek',1,3,1),(153,'24',7,15,'Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. ','Piškotek',1,5,1),(154,'25',7,15,'                                                                                                Ice cream (derived from earlier iced cream or cream ice)is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. It can also be made by whisking a flavored cream base and liquid Nitrogen together. Colorings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases.                                                                                 ','Piškotek',1,0,0);
/*!40000 ALTER TABLE `Artikel` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `ArtikelStrankaOcena`
--

LOCK TABLES `ArtikelStrankaOcena` WRITE;
/*!40000 ALTER TABLE `ArtikelStrankaOcena` DISABLE KEYS */;
INSERT INTO `ArtikelStrankaOcena` VALUES (153,1,1),(152,2,1);
/*!40000 ALTER TABLE `ArtikelStrankaOcena` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `Images`
--

LOCK TABLES `Images` WRITE;
/*!40000 ALTER TABLE `Images` DISABLE KEYS */;
INSERT INTO `Images` VALUES (126,114,'IMG_5fdf50083e0a8.png'),(127,115,'IMG_5fdf509210784.png'),(128,116,'IMG_5fdf50ab6f2fe.png'),(129,117,'IMG_5fdf513b0b39e.png'),(130,118,'IMG_5fdf514c66bdb.png'),(131,119,'IMG_5fdf518dcd99d.png'),(132,120,'IMG_5fdf519b33a8e.png'),(133,121,'IMG_5fdf51e7b1d2e.png'),(134,122,'IMG_5fdf52b785129.png'),(135,123,'IMG_5fdf52c668726.png'),(136,124,'IMG_5fdf52d2c3d16.png'),(137,125,'IMG_5fdf52f08f882.png'),(138,126,'IMG_5fdf530d58812.png'),(139,127,'IMG_5fdf532115fd2.png'),(140,128,'IMG_5fdf558656c64.png'),(141,129,'IMG_5fdf699fa80c3.png'),(142,130,'IMG_5fdf69ccc3c54.png'),(143,131,'IMG_5fdf69fc461f9.png'),(144,132,'IMG_5fdf6a1236c8a.png'),(145,133,'IMG_5fdf6a32a9d4e.png'),(146,134,'IMG_5fdf6a5137a69.png'),(147,135,'IMG_5fdf6a88294e5.png'),(148,136,'IMG_5fdf6aaba8652.png'),(149,137,'IMG_5fdf6ac763356.png'),(150,138,'IMG_5fdf6ad94d572.png'),(151,139,'IMG_5fdf6ae77c0e1.png'),(152,140,'IMG_5fdf6afd047b3.png'),(153,141,'IMG_5fdf6b1b3c9ef.png'),(154,142,'IMG_5fdf6b37e60b9.png'),(155,143,'IMG_5fdf6b486d07c.png'),(156,144,'IMG_5fdf6b56f24d3.png'),(157,145,'IMG_5fdf6b63292a2.png'),(158,146,'IMG_5fdf6be788956.png'),(159,147,'IMG_5fdf6bf551901.png'),(160,148,'IMG_5fdf6c12d01b6.png'),(161,149,'IMG_5fdf6c2594e9c.png'),(162,150,'IMG_5fdf6c37b4dbf.png'),(163,151,'IMG_5fdf6c434cb18.png'),(164,152,'IMG_5fdf6c4db4cce.png'),(165,153,'IMG_5fdf6c609ad84.png'),(167,154,'IMG_5fdf740b0a701.png'),(169,155,'IMG_5fdf74651efcc.png'),(170,155,'IMG_5fdf74651f408.png'),(171,155,'IMG_5fdf74651f581.png'),(172,155,'IMG_5fdf74651f771.png'),(173,154,'IMG_5fdf74847d46a.png'),(174,154,'IMG_5fdf749d79bde.png');
/*!40000 ALTER TABLE `Images` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `Narocilo_artikli`
--

LOCK TABLES `Narocilo_artikli` WRITE;
/*!40000 ALTER TABLE `Narocilo_artikli` DISABLE KEYS */;
INSERT INTO `Narocilo_artikli` VALUES (53,32,150,1),(54,32,151,1),(55,32,152,1),(56,32,154,1),(57,33,152,3),(58,34,148,3),(59,34,149,2),(60,34,154,1);
/*!40000 ALTER TABLE `Narocilo_artikli` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `Naročilo`
--

LOCK TABLES `Naročilo` WRITE;
/*!40000 ALTER TABLE `Naročilo` DISABLE KEYS */;
INSERT INTO `Naročilo` VALUES (32,1,28,0,1,0),(33,1,21,1,0,0),(34,1,42,1,0,1);
/*!40000 ALTER TABLE `Naročilo` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `Prodajalec`
--

LOCK TABLES `Prodajalec` WRITE;
/*!40000 ALTER TABLE `Prodajalec` DISABLE KEYS */;
INSERT INTO `Prodajalec` VALUES (1,'Miha','miha@eshop.si','$2y$10$MPrvtGdyleUcnlObl5gwheLdvzwSQtDGpKYIZy7dp9vXubg3uUAeG',1,'Miha','Jan Strehovec'),(6,'Ami','ami@gmail.com','$2y$10$UKFNIKrtN7BIAH2PSVnx8u8D1Q3g2Vlw.1yv3zjVG1g4IRxlbbWvG',1,'Muhamed','Kulauzović'),(7,'Mehdi','mehdi@gmail.com','$2y$10$7ar.SIuCIFCD0mw/dzyE.uM0s.7F5wgwU/iMvOohr9W1FtHbzgzTO',1,'Mehdi','Elouissi');
/*!40000 ALTER TABLE `Prodajalec` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stranka`
--

LOCK TABLES `Stranka` WRITE;
/*!40000 ALTER TABLE `Stranka` DISABLE KEYS */;
INSERT INTO `Stranka` VALUES (1,'Foo','Bar','foobar@gmail.com','$2y$10$kQnrvbTaGwy4KKiXsTZuv.VviFXN8QLh5TDZyDEI65EZHl1iIGzI6',1,'Gosposvetska',12,'Ljubljana',1000),(16,'miler','abrož','miha.strehovec23@gmail.com','$2y$10$jiKYTF7HpLhxRFyHMJLL5eg8FU/Vb6iDE7c5x8i8fOOkEgW9I0ySe',1,'haha',12,'haha',12);
/*!40000 ALTER TABLE `Stranka` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2020-12-21  0:55:09
