CREATE DATABASE  IF NOT EXISTS `h` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `h`;
-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: e-shop_shema
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
INSERT INTO `Administrator` VALUES (1,'jeff','besus','admin@frajer.sem','$2y$10$gyXaF5bsCsVX/Npif7bmqO6uPHznXA636huYH5hw715DEAW9XR14K' /* amazon */);
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Artikel`
--

-- LOCK TABLES `Artikel` WRITE;
-- /*!40000 ALTER TABLE `Artikel` DISABLE KEYS */;
-- INSERT INTO `Artikel` VALUES (4,'Tvoja mami',425,421,'Lepo diši                          ','Orbanove orgije',1,0,0),(5,'sdassadada',416,418,'asdad               ','Orbanove orgije',0,0,0),(6,'Hrenouka',10,420,'Sladka z medom in kokicami               ','Fekalije',1,0,0),(7,'Rdeča pesa',12,420,'sveža','Fekalije',1,0,0),(8,'KOKAKOLA',409,420,'FIZZY FUCKER       dada        ','Gaming',1,0,0),(9,'Smrkelj',421,419,'S corono','Gaming',0,0,0),(10,'TRAPANA',420,418,'TRAPTRAPTRAPONGOD               ','Fresh gum',1,0,0),(11,'TRAPEL',417,421,'KARTEL','Gaming',1,0,0),(12,'lil fažbi',400,421,'konkurenca  mi je potenca, ker sm zabit in ne znam osnovne matematike YUH!                                                          ','Orbanove orgije',1,0,0),(13,'A to sploh še delaHEHE',420,416,'HOHO              ','Orbanove orgije',0,0,0),(14,'HMELJ',420,420,'dobr smrdi ajga','Fekalije',1,0,0),(15,'sadasd',420,420,'asdsadasd','Fekalije',1,0,0),(16,'dasd',420,420,'sdaas','Fresh gum',1,0,0),(17,'dasda',420,420,'dasdasd','Fekalije',1,0,0),(18,'ssa',420,420,'dasdasd','Gaming',1,0,0),(19,'asda',420,420,'sadasd','Gaming',1,0,0),(20,'dasdas',420,420,'asdasda','Fekalije',1,0,0),(21,'asdas',420,420,'asdasd','Fekalije',1,0,0),(22,'asdasd',420,420,'asdasdas','Fekalije',1,0,0),(23,'dasd',420,420,'dasdasd','Fekalije',1,0,0),(24,'jcfcgfg',420,420,'fwefsdfs','Gaming',1,0,0),(25,'dasdasd',420,420,'asdasdas','Gaming',1,0,0),(26,'fdfdf',420,420,'fdfdfd','Fekalije',1,0,0),(27,'dsd',420,420,'sdsd','Gaming',1,0,0),(28,'asda',420,420,'dasdas','Orbanove orgije',1,0,0),(29,'gggg',420,420,'gggg','Fekalije',1,0,0),(30,'hh',420,420,'ghhg','Gaming',1,0,0),(31,'dddd',420,420,'dddd','Fekalije',1,0,0),(32,'sss',420,420,'sss','Fekalije',1,0,0),(33,'modri zob',420,420,'haha','Orbanove orgije',1,0,0),(34,'kak me fopaš stari',420,420,'hahaha','Fekalije',1,0,0),(35,'Mojster',420,420,'Jezus','Gaming',1,0,0),(36,'sss',420,420,'sss','Gaming',1,0,0),(37,'sss',420,420,'sss','Gaming',1,0,0),(38,'dasdas',420,420,'asd','Fekalije',1,0,0),(39,'xcy',420,420,'yxc','Fekalije',1,0,0),(40,'xcyx',420,420,'yxcyx','Gaming',1,0,0),(41,'xcy',420,420,'yxc','Gaming',1,0,0),(42,'Greo čeknit',420,420,'Čkice','Fekalije',1,0,0),(43,'adasd',420,420,'asdasd','Fekalije',1,0,0),(44,'asdasd',420,420,'asdad','Fekalije',1,0,0),(45,'dsad',420,420,'asd','Fekalije',1,0,0),(46,'da',420,420,'aasd','Fekalije',1,0,0),(47,'sdasd',420,420,'asdasd','Fekalije',1,0,0),(48,'sdasd',420,420,'asdasd','Gaming',1,0,0),(49,'dasdasd',420,420,'asdasd','Fekalije',1,0,0),(50,'dasda',420,420,'adas','Gaming',1,0,0),(51,'asd',420,420,'asd','Fekalije',1,0,0),(52,'dasd',420,420,'asda','Orbanove orgije',1,0,0),(53,'dadasd',420,420,'dasdasd','Gaming',1,0,0),(54,'dasd',420,420,'asdas','Gaming',1,0,0),(55,'asdasdaas',420,420,'sad','Fekalije',1,0,0),(56,'d',420,420,'d','Fekalije',1,0,0),(57,'sss',420,420,'sss','Fekalije',1,0,0),(58,'asdasd',420,420,'asd','Fekalije',1,0,0),(59,'Kurac',433,420,'res je velik&#13;&#10;&#13;&#10;- gaššper','Gaming',1,0,0),(60,'msda',420,420,'dasda','Fekalije',0,0,0),(61,'asd',420,420,'asd','Fekalije',1,0,0),(62,'sad',420,420,'asd','Fekalije',1,0,0),(63,'asdasda',420,420,'das','Gaming',1,0,0),(64,'asd',420,420,'asd','Fekalije',1,0,0),(65,'dasd',420,420,'asd','Fekalije',1,0,0),(66,'ads',420,420,'asd','Fekalije',1,0,0),(67,'dasd',420,420,'asd','Fekalije',1,0,0),(68,'asd',420,420,'asd','Fekalije',1,0,0),(69,'asd',420,420,'asd','Fekalije',1,0,0),(70,'asdas',420,420,'asd','Fekalije',1,0,0),(71,'adsd',420,420,'asd','Gaming',1,0,0),(72,'Melona',420,420,'Opa','Gaming',1,0,0),(73,'asdasd',420,420,'asdasdsad','Fekalije',1,0,0),(74,'NEasdasdasdasd kukaadas',420,420,'asdasd','Fekalije',1,0,0),(75,'sda',420,420,'asd','Fekalije',1,0,0),(76,'saasd',420,420,'asdasd','Fekalije',1,0,0),(77,'sdad',420,420,'asdas','Gaming',1,0,0),(78,'sad',420,420,'asdasd','Fekalije',1,0,0),(79,'asd',420,420,'asdas','Gaming',1,0,0),(80,'2 image test',420,420,'opop','Gaming',1,0,0),(81,'KREK',420,420,'sdadas','Gaming',1,0,0),(82,'KREK BIG',420,420,'a lot of krek','Fekalije',1,0,0),(83,'kvadrat slika test',420,420,'sdasdad','Gaming',1,0,0),(84,'asdad',420,420,'asda','Fekalije',1,0,0),(85,'asd',420,420,'asd','Fekalije',1,0,0),(86,'sdada',420,420,'asdasd','Gaming',1,0,0),(87,'asdasdaasd',420,420,'asd','Fekalije',1,0,0),(88,'fdsfsd',420,420,'sdfsdf','Fekalije',1,0,0),(89,'sadasdasd',420,420,'asd','Fekalije',1,0,0),(90,'dsadas',420,420,'dasdasd','Fekalije',1,0,0),(91,'asdasd',420,420,'asdasd','Orbanove orgije',1,0,0),(92,'sdasd',420,420,'asdasd','Orbanove orgije',1,0,0),(93,'asdasdasd',420,420,'asdasd','Fekalije',1,0,0),(94,'asdas',420,420,'dadsad','Gaming',1,0,0),(95,'sdasd',420,420,'asdasd','Gaming',1,0,0),(96,'dad',420,420,'asdasd','Gaming',1,0,0),(97,'asdasdasdad',420,420,'asdasd','Fekalije',1,0,0),(98,'asdasdasdad',420,420,'asdasd','Fekalije',1,0,0),(99,'asdas',420,420,'dad','Fekalije',1,0,0),(100,'asdasdadsasd',420,420,'asd','Gaming',1,0,0),(101,'dasd',420,420,'asdasd','Fekalije',1,0,0),(102,'dasd',420,420,'aasd','Fekalije',1,0,0),(103,'asd',420,420,'asd','Fekalije',1,0,0),(104,'asd',420,420,'asd','Gaming',1,0,0),(105,'dasd',420,420,'asd','Fekalije',1,0,0),(106,'dasdas',420,420,'dasdas','Fekalije',1,0,0),(107,'dsada',420,420,'asd','Orbanove orgije',1,0,0),(108,'asdasd',420,420,'asd','Fekalije',1,0,0),(109,'dasd',420,420,'asd               ','Gaming',1,0,0),(110,'asd',420,420,'asd                                                                                                                                                                                                                                 ','Gaming',1,0,0),(111,'BABAđ',422,420,'dasdasddasdasd         asdasdasd          qweqwe                                 dasdasdasd                                      dasdasdasdasd                                             dasdasd                                                                                                                                       ','Orbanove orgije',1,0,0),(112,'KREKICA',12,420,'Tole je super izdelek za vse nadobudne špornikce in športnice!!','Gaming',1,0,0),(113,'Milkey Milkers',10,15,'Milkers','Fekalije',1,0,0);
-- /*!40000 ALTER TABLE `Artikel` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `ArtikelStrankaOcena`
--

DROP TABLE IF EXISTS `ArtikelStrankaOcena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ArtikelStrankaOcena` (
  `idArtikla` int NOT NULL,
  `idStranke` int NOT NULL,
  KEY `fk_Artikel_idx` (`idArtikla`),
  KEY `fk_Stranka` (`idStranke`),
  CONSTRAINT `fk_Artikel_aso` FOREIGN KEY (`idArtikla`) REFERENCES `Artikel` (`idArtikla`),
  CONSTRAINT `fk_Stranka_aso` FOREIGN KEY (`idStranke`) REFERENCES `Stranka` (`idStranke`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ArtikelStrankaOcena`
--

LOCK TABLES `ArtikelStrankaOcena` WRITE;
/*!40000 ALTER TABLE `ArtikelStrankaOcena` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Images`
--

-- LOCK TABLES `Images` WRITE;
-- /*!40000 ALTER TABLE `Images` DISABLE KEYS */;
-- INSERT INTO `Images` VALUES (1,0,''),(2,0,''),(3,0,''),(4,0,''),(5,75,'haha.png'),(6,75,'Screenshot from 2020-12-17 20-54-42.png'),(7,75,'Screenshot from 2020-12-17 22-06-55.png'),(8,76,'haha.png'),(9,76,'Screenshot from 2020-12-17 20-54-42.png'),(10,76,'Screenshot from 2020-12-17 22-06-55.png'),(11,78,'haha.png'),(12,78,'Screenshot from 2020-12-17 20-54-42.png'),(13,78,'Screenshot from 2020-12-17 22-06-55.png'),(14,79,'haha.png'),(15,79,'Screenshot from 2020-12-17 20-54-42.png'),(16,79,'Screenshot from 2020-12-17 22-06-55.png'),(17,80,'haha.png'),(18,80,'Screenshot from 2020-12-17 20-54-42.png'),(19,81,'image.jpeg'),(20,82,'image.jpeg'),(21,82,'img-0-5224312-jpg.jpeg'),(22,82,'index.jpeg'),(23,82,'s1.reutersmedia.net.jpeg'),(24,83,'dildak.jpeg'),(25,84,'index.jpeg'),(26,84,'Screenshot from 2020-12-17 20-54-42.png'),(27,85,'index.jpeg'),(28,85,'Screenshot from 2020-12-17 20-54-42.png'),(29,86,'Screenshot from 2020-12-17 20-54-42.png'),(30,86,'Screenshot from 2020-12-17 22-06-55.png'),(31,87,'index.jpeg'),(32,87,'Screenshot from 2020-12-17 20-54-42.png'),(33,88,'Screenshot from 2020-12-17 22-06-55.png'),(34,89,'haha.png'),(35,89,'Screenshot from 2020-12-17 20-54-42.png'),(36,89,'Screenshot from 2020-12-17 22-06-55.png'),(37,90,'haha.png'),(38,90,'Screenshot from 2020-12-17 20-54-42.png'),(39,90,'Screenshot from 2020-12-17 22-06-55.png'),(40,91,'haha.png'),(41,91,'s1.reutersmedia.net.jpeg'),(42,91,'Screenshot from 2020-12-17 20-54-42.png'),(43,91,'Screenshot from 2020-12-17 22-06-55.png'),(44,92,'haha.png'),(45,92,'Screenshot from 2020-12-17 20-54-42.png'),(46,92,'Screenshot from 2020-12-17 22-06-55.png'),(47,93,'haha.png'),(48,93,'Screenshot from 2020-12-17 20-54-42.png'),(49,93,'Screenshot from 2020-12-17 22-06-55.png'),(50,94,'IMG_5fdcd2d411407.png'),(51,94,'IMG_5fdcd2d4116c3.jpeg'),(52,94,'IMG_5fdcd2d4117ef.png'),(53,94,'IMG_5fdcd2d411be8.png'),(54,95,'IMG_5fdcd43d7d2b6.p12'),(55,96,'IMG_5fdcd46d3fa47.pem'),(56,97,'IMG_5fdcd48b42137.pem'),(57,98,'IMG_5fdcd49f4b7cf.pem'),(58,99,'IMG_5fdcd558e199a.pem'),(59,100,'IMG_5fdcd57713ec6.pem'),(60,101,'IMG_5fdcd598a11fc.p12'),(61,101,'IMG_5fdcd598a1392.pem'),(62,101,'IMG_5fdcd598a1830.pem'),(63,101,'IMG_5fdcd598a18d8.pem'),(64,101,'IMG_5fdcd598a1a6d.pem'),(65,101,'IMG_5fdcd598a1afc.md'),(66,102,'IMG_5fdcd5b0e2594.p12'),(67,103,'IMG_5fdcd5b7bd607.pem'),(68,104,'IMG_5fdcd5bd097f7.p12'),(69,104,'IMG_5fdcd5bd09886.md'),(70,105,'IMG_5fdcd5ed7c67d.md'),(71,106,'IMG_5fdcd5f8e3ec4.pem'),(72,106,'IMG_5fdcd5f8e3f23.pem'),(73,106,'IMG_5fdcd5f8e4073.md'),(74,107,'IMG_5fdcd636972df.p12'),(75,107,'IMG_5fdcd6369733c.pem'),(76,107,'IMG_5fdcd6369741c.md'),(77,108,'IMG_5fdcd65299682.p12'),(78,108,'IMG_5fdcd652996d2.pem'),(79,108,'IMG_5fdcd652997b1.pem'),(80,108,'IMG_5fdcd652997ef.md'),(81,109,'IMG_5fdcd6a3a9ef3.md'),(82,110,'IMG_5fdcd784d2d14.jpeg'),(90,0,'IMG_5fdced71aa221.png'),(91,0,'IMG_5fdced8060afa.png'),(92,0,'IMG_5fdcedbd9d7e9.png'),(93,0,'IMG_5fdcedc251d38.'),(94,0,'IMG_5fdcedd216efd.png'),(95,0,'IMG_5fdceddf94fe6.'),(96,0,'IMG_5fdcedf60f420.jpeg'),(97,0,'IMG_5fdcee4213a9d.'),(98,0,'IMG_5fdcee8c49c3e.'),(102,0,'IMG_5fdcf02827073.jpeg'),(103,0,'IMG_5fdcf0431d640.png'),(104,110,'IMG_5fdcf0b076bfe.png'),(113,111,'IMG_5fdd107f1ef99.jpeg'),(114,111,'IMG_5fdd107f1f010.jpeg'),(115,111,'IMG_5fdd107f1f0e5.jpeg'),(116,111,'IMG_5fdd107f1f136.jpeg'),(121,113,'IMG_5fdd1d2b29430.jpeg'),(122,113,'IMG_5fdd1d2b295d9.jpeg'),(123,112,'IMG_5fddf2f8f1e71.jpeg'),(124,112,'IMG_5fddf2f8f1fb9.jpeg'),(125,112,'1');
-- /*!40000 ALTER TABLE `Images` ENABLE KEYS */;
-- UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Narocilo_artikli`
--



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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Naročilo`
--


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prodajalec`
--

LOCK TABLES `Prodajalec` WRITE;
/*!40000 ALTER TABLE `Prodajalec` DISABLE KEYS */;
INSERT INTO `Prodajalec` VALUES (1,'Miha','miha@eshop.si','$2y$10$Rz0iHecAwHzZ1t0JRRraxubkEg5.pfqmfkXSD52yo2BsktLsmlETi',1,'Miha','Jan Strehovec');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stranka`
--


-- LOCK TABLES `Stranka` WRITE;
-- /*!40000 ALTER TABLE `Stranka` DISABLE KEYS */;
-- INSERT INTO `Stranka` VALUES (1,'Miha','Amin','miha@g.si','aa',1,'',0,'',0),(2,'Avto','Mobil','vrum@gas.si','123',1,'',0,'',0),(3,'Muhamed','Elouissi','m@b.a','aa',1,'sadad',1,'asda',3),(4,'Mleko','Alpsko','h@b.si','aaa',1,'',0,'',0),(5,'Muhame','Elouissi','ep@fir.si','yebra',1,'Opekarniška',29,'Radomlje',1235),(6,'Marko','Narko','hmelj@gobice.si','$2y$10$cFfhdfieJcCExJ33xyLUTOOSUC2Uf5JF6FDyXWt1ln5Cf5podtiAu',1,'meta',12,'pariz',12),(7,'man','in','hren@oh.si','$2y$10$BWUo54/DUbK7E/W6psn1x.G5EvLWM4cmrcJ5PO.GOonspEkaooWaK',1,'dsasdas',12,'asdad',22),(8,'mama','ata','mama@ata.si','$2y$10$vg7RTYTDFiK7IytRnTphO.0Yv5FN4/XdzLpGKeBdO/odGbEeFN5H6',1,'sadas',3,'asdasd',3),(9,'sda','asd','kurac@net.nisi','$2y$10$XBYktpj.q9wda6DxSRBnVeUMGT4Sjf2CCNt/as9TlntGAHHhRQc2u',1,'asd',2,'asd',2),(10,'wdasd','asd','kurac@net.nisi','$2y$10$EQ/dBuyR3Ym5ftkkm1BHKu.3PoIsyLlECazj7WoNiYqKAtWU3GIny',1,'qwdq',1,'dqwd',4),(11,'Ami','Scammer','miha@g.si','$2y$10$9TZ6MIsXpMCpIdz2lwZkoOt0TraDm0w2N88HuKe6blIrzeu3KFgyS',1,'Horjul',2,'Kolo',2),(12,'ata','mama','ata@mama.si','$2y$10$dI02DAzQSCPuH2b50qckT.ir76b4mbKqXx/cgjpNQXGlJXT4ZiXNi',1,'Grudnovo nabrežje',17,'Ljubljana',1000),(13,'Lojze','France','l@f.si','$2y$10$zFdwE/7fQ9o83wlXAB5w9Oc/su71Metz77t5ZixeyfW0D4xi4mKke',1,'Kmetijska',17,'Spodnji Duplek',1111),(14,'Mojca','Guštin','mojca.gustin@gmail.com','$2y$10$G9GA8p7nmyrzg.es3f.3ZefSdWjTo6.K/CeUTPgt9utl89ud3v5xC',1,'Ljubljanska',12,'Ljubljana',1000);
-- /*!40000 ALTER TABLE `Stranka` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Dumping events for database 'e-shop_shema'
--

--
-- Dumping routines for database 'e-shop_shema'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-20 13:29:30
