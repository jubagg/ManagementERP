-- MySQL dump 10.13  Distrib 8.0.18, for osx10.12 (x86_64)
--
-- Host: localhost    Database: managementerp
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgart`
--

DROP TABLE IF EXISTS `mgart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgart` (
  `artcod` int(11) NOT NULL,
  `artdesc` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `arttipcodbar` int(2) DEFAULT NULL,
  `artcodbarun` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `artcodcont` bit(1) DEFAULT NULL,
  `artfam` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `artsubfam` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `artmarca` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `artunneg` int(4) DEFAULT NULL,
  `artiva` int(1) DEFAULT NULL,
  `artbonf` int(2) DEFAULT NULL,
  `artfecdesc` date DEFAULT NULL,
  `artcontabc` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `artcontabv` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `artfeccre` date DEFAULT NULL,
  `artfecmod` datetime DEFAULT NULL,
  `artfecdes` datetime DEFAULT NULL,
  `artinactive` bit(1) DEFAULT NULL,
  `artunmed` int(2) DEFAULT NULL,
  `artfraccion` bit(1) DEFAULT NULL,
  `artcontrolstk` bit(1) DEFAULT NULL,
  `artlimminstk` double DEFAULT NULL,
  `artlimmaxstk` double DEFAULT NULL,
  `artneg` bit(1) DEFAULT NULL,
  PRIMARY KEY (`artcod`),
  UNIQUE KEY `mgart_UN` (`artcodbarun`),
  KEY `tipcodbar` (`arttipcodbar`),
  KEY `familia` (`artfam`),
  KEY `iva` (`artiva`),
  KEY `negocio` (`artunneg`),
  KEY `medida` (`artunmed`),
  KEY `bonificacion` (`artbonf`),
  KEY `marcas` (`artmarca`),
  KEY `subfam` (`artsubfam`),
  KEY `mgart_artcodbarun_IDX` (`artcodbarun`) USING BTREE,
  CONSTRAINT `familia` FOREIGN KEY (`artfam`) REFERENCES `mgartfam` (`afid`),
  CONSTRAINT `iva` FOREIGN KEY (`artiva`) REFERENCES `mgartivacat` (`icid`),
  CONSTRAINT `marcas` FOREIGN KEY (`artmarca`) REFERENCES `mgartmarca` (`mid`),
  CONSTRAINT `medida` FOREIGN KEY (`artunmed`) REFERENCES `mgarttipmed` (`tmid`),
  CONSTRAINT `negocio` FOREIGN KEY (`artunneg`) REFERENCES `mgartneg` (`anid`),
  CONSTRAINT `subfam` FOREIGN KEY (`artsubfam`) REFERENCES `mgartsubfam` (`sfid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgart`
--

LOCK TABLES `mgart` WRITE;
/*!40000 ALTER TABLE `mgart` DISABLE KEYS */;
INSERT INTO `mgart` VALUES (93,'Arituclo 93',NULL,NULL,_binary '\0',NULL,NULL,'009',1,1,NULL,NULL,NULL,NULL,'2020-08-31',NULL,NULL,_binary '\0',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0'),(98,'Prueba de articulo',1,NULL,NULL,'011','32','002',1,1,NULL,NULL,NULL,NULL,'2020-08-31','2020-09-25 00:38:21',NULL,_binary '\0',1,_binary '\0',_binary '',NULL,NULL,_binary ''),(322,'Limpiador Blem sup. delicadas',1,'7794000597624',NULL,'230','023','001',1,1,NULL,NULL,NULL,NULL,'2020-09-10',NULL,NULL,_binary '\0',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0'),(1000,'articulo de prueba',1,NULL,_binary '','1','1','002',1,1,10,NULL,NULL,NULL,'2020-08-31','2020-09-01 19:34:36',NULL,_binary '\0',1,_binary '\0',_binary '',10003,10004,_binary ''),(1001,'articulo de prueba 2',1,NULL,_binary '','1','1','002',1,1,NULL,NULL,NULL,NULL,'2020-08-31','2020-09-02 17:14:48',NULL,_binary '\0',1,_binary '',_binary '\0',91283,21,_binary '\0'),(1002,'articulo de prueba 3',1,NULL,_binary '','1','1','001',1,1,NULL,NULL,NULL,NULL,'2020-08-26','2020-09-01 20:14:47',NULL,_binary '\0',1,_binary '',_binary '',91283,32423,_binary ''),(2342,'articulo de prueba 6',1,NULL,_binary '\0',NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2020-08-31',NULL,NULL,_binary '\0',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0'),(428394,'jsihu',1,'62384623',_binary '\0',NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2020-08-26','2020-08-26 01:26:18','2020-08-26 01:26:18',_binary '',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0');
/*!40000 ALTER TABLE `mgart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgartcodbar`
--

DROP TABLE IF EXISTS `mgartcodbar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgartcodbar` (
  `codid` int(11) NOT NULL AUTO_INCREMENT,
  `codart` int(11) DEFAULT NULL,
  `codcod` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `coddescalt` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `codcant` int(4) DEFAULT NULL,
  PRIMARY KEY (`codid`),
  KEY `mgartcodbar_FK` (`codart`),
  CONSTRAINT `mgartcodbar_FK` FOREIGN KEY (`codart`) REFERENCES `mgart` (`artcod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgartcodbar`
--

LOCK TABLES `mgartcodbar` WRITE;
/*!40000 ALTER TABLE `mgartcodbar` DISABLE KEYS */;
INSERT INTO `mgartcodbar` VALUES (1,1000,'7794122013071','Poxiran',4),(2,1000,'7622300871550','eews',12),(3,1002,'7798018850184','aloz',4),(4,98,'42342','prueba q vaer q onda',42),(8,1001,'7790580110529','caja de chicles',40);
/*!40000 ALTER TABLE `mgartcodbar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgartcodbart`
--

DROP TABLE IF EXISTS `mgartcodbart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgartcodbart` (
  `codtid` int(2) NOT NULL,
  `codtdes` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `codtabr` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`codtid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgartcodbart`
--

LOCK TABLES `mgartcodbart` WRITE;
/*!40000 ALTER TABLE `mgartcodbart` DISABLE KEYS */;
INSERT INTO `mgartcodbart` VALUES (1,'EAN 13','EAN13'),(99,'Balanzas Systel','BS');
/*!40000 ALTER TABLE `mgartcodbart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgartfam`
--

DROP TABLE IF EXISTS `mgartfam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgartfam` (
  `afid` varchar(5) COLLATE utf8_bin NOT NULL,
  `afdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `afabr` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`afid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgartfam`
--

LOCK TABLES `mgartfam` WRITE;
/*!40000 ALTER TABLE `mgartfam` DISABLE KEYS */;
INSERT INTO `mgartfam` VALUES ('001','Enlatados','ENL'),('002','Golosinas','GOL'),('003','Articulos limpieza','LIM'),('004','Harinas','HAR'),('011','Bazar','BAZ'),('02','934','843'),('098','Embutidos','EMB'),('1','Generico','GEN'),('230','Limpieza','LIM');
/*!40000 ALTER TABLE `mgartfam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgartivacat`
--

DROP TABLE IF EXISTS `mgartivacat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgartivacat` (
  `icid` int(1) NOT NULL,
  `icdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `icabr` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `icpor` double DEFAULT NULL,
  PRIMARY KEY (`icid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgartivacat`
--

LOCK TABLES `mgartivacat` WRITE;
/*!40000 ALTER TABLE `mgartivacat` DISABLE KEYS */;
INSERT INTO `mgartivacat` VALUES (1,'21%','21',21);
/*!40000 ALTER TABLE `mgartivacat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgartmarca`
--

DROP TABLE IF EXISTS `mgartmarca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgartmarca` (
  `mid` varchar(5) COLLATE utf8_bin NOT NULL,
  `mdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mabr` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgartmarca`
--

LOCK TABLES `mgartmarca` WRITE;
/*!40000 ALTER TABLE `mgartmarca` DISABLE KEYS */;
INSERT INTO `mgartmarca` VALUES ('001','DSSD','abr'),('002','LUCHETTI','LUC'),('003','juan','sh'),('005','ft','rd'),('006','das','das'),('009','sxzc','x'),('010','Knorr','KNO'),('100','dsd','dsd'),('101','gw','y'),('123','Generico','GEN'),('150','Luchetti','LUC'),('180','Beldent','BDN'),('202','aa','aa'),('4','MAT','naj'),('987','5643','546');
/*!40000 ALTER TABLE `mgartmarca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgartneg`
--

DROP TABLE IF EXISTS `mgartneg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgartneg` (
  `anid` int(4) NOT NULL,
  `andesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `anabr` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`anid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgartneg`
--

LOCK TABLES `mgartneg` WRITE;
/*!40000 ALTER TABLE `mgartneg` DISABLE KEYS */;
INSERT INTO `mgartneg` VALUES (1,'Unica','UNI');
/*!40000 ALTER TABLE `mgartneg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgartsubfam`
--

DROP TABLE IF EXISTS `mgartsubfam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgartsubfam` (
  `sfid` varchar(5) COLLATE utf8_bin NOT NULL,
  `sfdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `sfabr` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `sfidfam` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`sfid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgartsubfam`
--

LOCK TABLES `mgartsubfam` WRITE;
/*!40000 ALTER TABLE `mgartsubfam` DISABLE KEYS */;
INSERT INTO `mgartsubfam` VALUES ('002','Snacks salados','SNK',NULL),('003','Shampoo','SHA','011'),('004','Atun','ATU',NULL),('010','Yogur','YOG',NULL),('023','Aerosoles','AER','230'),('1','Generico','GEN',NULL),('23','Atun','ATU',NULL),('32','21','21','011'),('321','21','4','004'),('35','24','4',NULL),('43','limpia piso','LPA',NULL),('433','23','32',NULL),('932','Choclo','CHO',NULL),('983','Lavandinas','LAV',NULL),('ew','24','4',NULL),('wq','23','32',NULL);
/*!40000 ALTER TABLE `mgartsubfam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgarttipmed`
--

DROP TABLE IF EXISTS `mgarttipmed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgarttipmed` (
  `tmid` int(2) NOT NULL,
  `tmdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `tmabr` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `tmoperar` bit(1) DEFAULT NULL,
  PRIMARY KEY (`tmid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgarttipmed`
--

LOCK TABLES `mgarttipmed` WRITE;
/*!40000 ALTER TABLE `mgarttipmed` DISABLE KEYS */;
INSERT INTO `mgarttipmed` VALUES (1,'Unidad','UNI',_binary '');
/*!40000 ALTER TABLE `mgarttipmed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgbancos`
--

DROP TABLE IF EXISTS `mgbancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgbancos` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bdes` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `babr` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgbancos`
--

LOCK TABLES `mgbancos` WRITE;
/*!40000 ALTER TABLE `mgbancos` DISABLE KEYS */;
INSERT INTO `mgbancos` VALUES (1,'Banco Provincia','PBA'),(7,'Nacion','NAC'),(8,'galicia','GAL'),(9,'galicia','GAL'),(10,'galicia','GAL'),(11,'galicia','GAL'),(12,'galicia','GAL'),(13,'galicia','GAL'),(14,'galicia','GAL'),(15,'galicia','GAl'),(16,'galicia','G'),(17,'aaaa','pru'),(18,'aaaa','pru'),(19,'Macro','MAC'),(20,'ada231e12','defd2r32'),(21,'pampa','322');
/*!40000 ALTER TABLE `mgbancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgbonificaciones`
--

DROP TABLE IF EXISTS `mgbonificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgbonificaciones` (
  `bid` int(2) NOT NULL,
  `bdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `babr` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `bpor` double DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgbonificaciones`
--

LOCK TABLES `mgbonificaciones` WRITE;
/*!40000 ALTER TABLE `mgbonificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgbonificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgcajas`
--

DROP TABLE IF EXISTS `mgcajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgcajas` (
  `cajid` int(11) NOT NULL,
  `cajdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cajsuc` int(11) DEFAULT NULL,
  `cajultcier` datetime DEFAULT NULL,
  PRIMARY KEY (`cajid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgcajas`
--

LOCK TABLES `mgcajas` WRITE;
/*!40000 ALTER TABLE `mgcajas` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgcajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgcemmarca`
--

DROP TABLE IF EXISTS `mgcemmarca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgcemmarca` (
  `marid` int(11) NOT NULL AUTO_INCREMENT,
  `mardesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`marid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgcemmarca`
--

LOCK TABLES `mgcemmarca` WRITE;
/*!40000 ALTER TABLE `mgcemmarca` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgcemmarca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgcli`
--

DROP TABLE IF EXISTS `mgcli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgcli` (
  `clicodsis` int(11) NOT NULL,
  `clifantasia` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `clirazons` varchar(200) DEFAULT NULL,
  `clicatdoc` int(1) DEFAULT NULL,
  `clicuit` int(11) NOT NULL,
  `clidir` varchar(100) DEFAULT NULL,
  `clipais` int(2) DEFAULT '200',
  `cliprov` int(2) DEFAULT '99',
  `cliloc` int(2) DEFAULT '0',
  `clicp` varchar(10) DEFAULT NULL,
  `clitel` varchar(100) DEFAULT NULL,
  `cliweb` varchar(100) DEFAULT NULL,
  `cliemail` varchar(150) DEFAULT NULL,
  `clisuc` int(2) NOT NULL DEFAULT '1',
  `clizona` int(2) NOT NULL DEFAULT '1',
  `clicatcli` int(1) DEFAULT NULL,
  `clicatres` int(2) DEFAULT NULL,
  `clicatiibb` int(1) DEFAULT NULL,
  `cliiibb` double DEFAULT '0',
  `clicatgan` int(1) DEFAULT NULL,
  `cligan` double DEFAULT NULL,
  `clilimcre` double DEFAULT NULL,
  `cliconven` int(1) DEFAULT '0',
  `clidescue` double DEFAULT NULL,
  `clialta` datetime DEFAULT NULL,
  `climod` datetime DEFAULT NULL,
  `clibaj` datetime DEFAULT NULL,
  `clidesac` bit(1) NOT NULL DEFAULT b'1',
  `cliobs` text,
  `clisiscod` int(1) DEFAULT NULL,
  PRIMARY KEY (`clicuit`),
  UNIQUE KEY `mgcli_UN` (`clicodsis`),
  KEY `ganacias` (`clicatgan`),
  KEY `responsable` (`clicatres`),
  KEY `conventa` (`cliconven`),
  CONSTRAINT `conventa` FOREIGN KEY (`cliconven`) REFERENCES `mgcliconven` (`cvid`),
  CONSTRAINT `ganacias` FOREIGN KEY (`clicatgan`) REFERENCES `mgclicatgan` (`cgid`),
  CONSTRAINT `responsable` FOREIGN KEY (`clicatres`) REFERENCES `mgclicatres` (`crid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgcli`
--

LOCK TABLES `mgcli` WRITE;
/*!40000 ALTER TABLE `mgcli` DISABLE KEYS */;
INSERT INTO `mgcli` VALUES (100,'juanbautista','juan',93,3423,'prueba',200,1,1,'8183','21','www.google.com.ar','juangoicoechea@fireproject.com.ar',1,1,1,1,1,2,1,NULL,323,1,32,'2020-08-14 23:47:11','2020-08-15 13:15:01',NULL,_binary '\0',NULL,2),(10,'navarro','navarro',80,36521521,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'giuli@gliula',1,1,1,2,NULL,NULL,NULL,NULL,245,1,NULL,'2020-08-16 21:38:36',NULL,NULL,_binary '\0',NULL,1);
/*!40000 ALTER TABLE `mgcli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclibancos`
--

DROP TABLE IF EXISTS `mgclibancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclibancos` (
  `cbid` int(11) NOT NULL AUTO_INCREMENT,
  `cbidcli` int(11) DEFAULT NULL,
  `cbcbu` varchar(22) COLLATE utf8_bin DEFAULT NULL,
  `cbban` int(11) DEFAULT NULL,
  `cbsuc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cbtipcue` char(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`cbid`),
  KEY `mgclibancos_FK` (`cbidcli`),
  KEY `mgclibancos_FK_1` (`cbban`),
  CONSTRAINT `mgclibancos_FK` FOREIGN KEY (`cbidcli`) REFERENCES `mgcli` (`clicuit`),
  CONSTRAINT `mgclibancos_FK_1` FOREIGN KEY (`cbban`) REFERENCES `mgbancos` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclibancos`
--

LOCK TABLES `mgclibancos` WRITE;
/*!40000 ALTER TABLE `mgclibancos` DISABLE KEYS */;
INSERT INTO `mgclibancos` VALUES (99,36521521,'32563345657643643',1,'Darregueira','ccd'),(100,36521521,'2312312',1,'312312','cap');
/*!40000 ALTER TABLE `mgclibancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclicatgan`
--

DROP TABLE IF EXISTS `mgclicatgan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclicatgan` (
  `cgid` int(1) NOT NULL,
  `cgdes` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgper` double DEFAULT NULL,
  PRIMARY KEY (`cgid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclicatgan`
--

LOCK TABLES `mgclicatgan` WRITE;
/*!40000 ALTER TABLE `mgclicatgan` DISABLE KEYS */;
INSERT INTO `mgclicatgan` VALUES (1,'Exento',NULL);
/*!40000 ALTER TABLE `mgclicatgan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclicatres`
--

DROP TABLE IF EXISTS `mgclicatres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclicatres` (
  `crid` int(2) NOT NULL,
  `crdes` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`crid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclicatres`
--

LOCK TABLES `mgclicatres` WRITE;
/*!40000 ALTER TABLE `mgclicatres` DISABLE KEYS */;
INSERT INTO `mgclicatres` VALUES (1,'IVA Responsable Inscripto'),(2,'IVA Responsable no Inscripto'),(3,'IVA no Responsable'),(4,'IVA Sujeto Exento'),(5,'Consumidor Final'),(6,'Responsable Monotributo'),(7,'Sujeto no Categorizado'),(8,'Proveedor del Exterior'),(9,'Cliente del Exterior'),(10,'IVA Liberado  Ley N 19.640'),(11,'IVA Responsable Inscripto  Agente de Percepción'),(12,'Pequeño Contribuyente Eventual'),(13,'Monotributista Social'),(14,'Pequeño Contribuyente Eventual Social');
/*!40000 ALTER TABLE `mgclicatres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgcliconven`
--

DROP TABLE IF EXISTS `mgcliconven`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgcliconven` (
  `cvid` int(1) NOT NULL,
  `cvdes` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvper` double DEFAULT NULL,
  PRIMARY KEY (`cvid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgcliconven`
--

LOCK TABLES `mgcliconven` WRITE;
/*!40000 ALTER TABLE `mgcliconven` DISABLE KEYS */;
INSERT INTO `mgcliconven` VALUES (1,'Contado',NULL),(2,'Cuenta Corriente',NULL),(3,'Tarjeta',NULL),(99,'No definido',NULL);
/*!40000 ALTER TABLE `mgcliconven` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgcliiibb`
--

DROP TABLE IF EXISTS `mgcliiibb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgcliiibb` (
  `ibid` int(1) NOT NULL,
  `ibdes` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ibid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgcliiibb`
--

LOCK TABLES `mgcliiibb` WRITE;
/*!40000 ALTER TABLE `mgcliiibb` DISABLE KEYS */;
INSERT INTO `mgcliiibb` VALUES (1,'Aplica'),(2,'Exento');
/*!40000 ALTER TABLE `mgcliiibb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclilocalidad`
--

DROP TABLE IF EXISTS `mgclilocalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclilocalidad` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `ldesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `labr` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclilocalidad`
--

LOCK TABLES `mgclilocalidad` WRITE;
/*!40000 ALTER TABLE `mgclilocalidad` DISABLE KEYS */;
INSERT INTO `mgclilocalidad` VALUES (1,'Darregueira','DAR'),(2,'Bordenave','BOR'),(3,'Puan','PUA'),(4,'No definido',NULL),(5,'Pigue','PIG');
/*!40000 ALTER TABLE `mgclilocalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclipais`
--

DROP TABLE IF EXISTS `mgclipais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclipais` (
  `pid` int(3) NOT NULL,
  `pdes` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `pabr` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclipais`
--

LOCK TABLES `mgclipais` WRITE;
/*!40000 ALTER TABLE `mgclipais` DISABLE KEYS */;
INSERT INTO `mgclipais` VALUES (99,'No definido',NULL),(200,'Argentina','ARG');
/*!40000 ALTER TABLE `mgclipais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgcliprov`
--

DROP TABLE IF EXISTS `mgcliprov`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgcliprov` (
  `prid` int(3) NOT NULL,
  `prdes` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `prabr` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`prid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgcliprov`
--

LOCK TABLES `mgcliprov` WRITE;
/*!40000 ALTER TABLE `mgcliprov` DISABLE KEYS */;
INSERT INTO `mgcliprov` VALUES (1,'Buenos Aires','BA'),(2,'Catamara','CAT'),(3,'Córdoba','COR'),(4,'Corrientes','COS'),(5,'Entre Ríos','ER'),(6,'Jujuy','JU'),(7,'Mendoza','MEN'),(8,'La Rioja','LRI'),(9,'Salta','SAL'),(10,'San Juan','SJU'),(11,'San Luis','SLU'),(12,'Santa Fe','SFE'),(13,'Santiago del Estero','SES'),(14,'Tucumán','TUC'),(16,'Chaco','CHA'),(17,'Chubut','CHU'),(18,'Formosa','FOR'),(19,'Misiones','MIS'),(20,'Neuquén','NEU'),(21,'La Pampa','LPA'),(22,'Río Negro','RNE'),(23,'Santa Cruz','SCR'),(24,'Tierra del Fuego','TFU'),(25,'Ciudad Autónoma de Buenos Aires','CABA'),(99,'No definido',NULL);
/*!40000 ALTER TABLE `mgcliprov` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclisuc`
--

DROP TABLE IF EXISTS `mgclisuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclisuc` (
  `sid` int(1) NOT NULL AUTO_INCREMENT,
  `sdes` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sabr` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclisuc`
--

LOCK TABLES `mgclisuc` WRITE;
/*!40000 ALTER TABLE `mgclisuc` DISABLE KEYS */;
INSERT INTO `mgclisuc` VALUES (1,'Sucursal 0','S2'),(3,'nueva suc','suc'),(4,'Casa Central','CC');
/*!40000 ALTER TABLE `mgclisuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclitipcli`
--

DROP TABLE IF EXISTS `mgclitipcli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclitipcli` (
  `tcid` int(1) NOT NULL,
  `tcdes` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tcid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclitipcli`
--

LOCK TABLES `mgclitipcli` WRITE;
/*!40000 ALTER TABLE `mgclitipcli` DISABLE KEYS */;
INSERT INTO `mgclitipcli` VALUES (1,'No cliente'),(2,'Cliente'),(3,'Cliente potencial'),(4,'Socio'),(5,'Cliente probable'),(6,'Cliente grande'),(7,'Cliente mediano'),(8,'Cliente pequeño');
/*!40000 ALTER TABLE `mgclitipcli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclitipdoc`
--

DROP TABLE IF EXISTS `mgclitipdoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclitipdoc` (
  `tdid` int(2) NOT NULL,
  `tddes` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tdid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclitipdoc`
--

LOCK TABLES `mgclitipdoc` WRITE;
/*!40000 ALTER TABLE `mgclitipdoc` DISABLE KEYS */;
INSERT INTO `mgclitipdoc` VALUES (1,'CI Buenos Aires'),(2,'CI Catamarca'),(3,'CI Córdoba'),(4,'CI Corrientes'),(5,'CI Entre Ríos'),(6,'CI Jujuy'),(7,'CI Mendoza'),(8,'CI La Rioja'),(9,'CI Salta'),(10,'CI San Juan'),(11,'CI San Luis'),(12,'CI Santa Fe'),(13,'CI Santiago del Estero'),(14,'CI Tucumán'),(16,'CI Chaco'),(17,'CI Chubut'),(18,'CI Formosa'),(19,'CI Misiones'),(20,'CI Neuquén'),(21,'CI La Pampa'),(22,'CI Río Negro'),(23,'CI Santa Cruz'),(24,'CI Tierra del Fuego'),(30,'Certificado de Migración'),(80,'CUIT'),(86,'CUIL'),(87,'CDI'),(88,'Usado por Anses para Padrón'),(89,'LE'),(90,'LC'),(91,'CI extranjera'),(92,'en trámite'),(93,'Acta nacimiento'),(94,'Pasaporte'),(95,'CI Bs. As. RNP'),(96,'DNI'),(99,'Sin identificar/venta global diaria');
/*!40000 ALTER TABLE `mgclitipdoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgclizon`
--

DROP TABLE IF EXISTS `mgclizon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgclizon` (
  `zid` int(1) NOT NULL,
  `zdes` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`zid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclizon`
--

LOCK TABLES `mgclizon` WRITE;
/*!40000 ALTER TABLE `mgclizon` DISABLE KEYS */;
INSERT INTO `mgclizon` VALUES (1,'Zona 1');
/*!40000 ALTER TABLE `mgclizon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgdeposito`
--

DROP TABLE IF EXISTS `mgdeposito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgdeposito` (
  `depid` int(11) NOT NULL,
  `depdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `depabr` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `depsuc` int(11) DEFAULT NULL,
  `depstk` int(11) DEFAULT NULL,
  `depinactive` bit(1) DEFAULT NULL,
  PRIMARY KEY (`depid`),
  KEY `mgdeposito_FK` (`depsuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgdeposito`
--

LOCK TABLES `mgdeposito` WRITE;
/*!40000 ALTER TABLE `mgdeposito` DISABLE KEYS */;
INSERT INTO `mgdeposito` VALUES (100,'Deposito Casa Central','DCC',1,1,_binary '\0');
/*!40000 ALTER TABLE `mgdeposito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgempre`
--

DROP TABLE IF EXISTS `mgempre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgempre` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `empnom` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `empcuit` bigint(11) DEFAULT NULL,
  `empdir` varchar(100) DEFAULT NULL,
  `emptel` varchar(100) DEFAULT NULL,
  `empemail` varchar(100) DEFAULT NULL,
  `empclipred` int(11) DEFAULT NULL,
  `empctacte` bit(1) DEFAULT NULL,
  `empclicf` bit(1) DEFAULT NULL COMMENT 'crea cliente consumidor final',
  `empartmodferreteria` bit(1) DEFAULT NULL,
  `empartmodelectrodom` bit(1) DEFAULT NULL,
  `empartfabrica` bit(1) DEFAULT NULL,
  `empfecha` datetime DEFAULT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgempre`
--

LOCK TABLES `mgempre` WRITE;
/*!40000 ALTER TABLE `mgempre` DISABLE KEYS */;
INSERT INTO `mgempre` VALUES (4,'FireProject Sistemas',20370560596,'Misiones 665','2923-654416','juangoicoechea@fireproject.com.ar',NULL,NULL,NULL,NULL,NULL,NULL,'2020-11-02 23:11:05');
/*!40000 ALTER TABLE `mgempre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mghisprecios`
--

DROP TABLE IF EXISTS `mghisprecios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mghisprecios` (
  `idauto` int(11) DEFAULT NULL,
  `prlista` int(11) DEFAULT NULL,
  `prart` int(11) DEFAULT NULL,
  `prfecha` date DEFAULT NULL,
  `prprecom` decimal(10,0) DEFAULT NULL,
  `prgan` decimal(10,0) DEFAULT NULL,
  `priva` decimal(10,0) DEFAULT NULL,
  `prventa` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mghisprecios`
--

LOCK TABLES `mghisprecios` WRITE;
/*!40000 ALTER TABLE `mghisprecios` DISABLE KEYS */;
/*!40000 ALTER TABLE `mghisprecios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mginfo`
--

DROP TABLE IF EXISTS `mginfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mginfo` (
  `infoid` int(11) NOT NULL AUTO_INCREMENT,
  `infoversion` varchar(100) NOT NULL,
  `infofecha` date NOT NULL,
  PRIMARY KEY (`infoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mginfo`
--

LOCK TABLES `mginfo` WRITE;
/*!40000 ALTER TABLE `mginfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `mginfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mglistaprecios`
--

DROP TABLE IF EXISTS `mglistaprecios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mglistaprecios` (
  `lpid` int(11) NOT NULL,
  `lpdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `lpbonifgral` double DEFAULT NULL,
  `lplremp` int(11) DEFAULT NULL,
  `lpmoneda` int(11) DEFAULT NULL,
  PRIMARY KEY (`lpid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mglistaprecios`
--

LOCK TABLES `mglistaprecios` WRITE;
/*!40000 ALTER TABLE `mglistaprecios` DISABLE KEYS */;
/*!40000 ALTER TABLE `mglistaprecios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mglistartpre`
--

DROP TABLE IF EXISTS `mglistartpre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mglistartpre` (
  `lapid` int(11) NOT NULL AUTO_INCREMENT,
  `laplp` int(11) DEFAULT NULL,
  `lapart` int(11) DEFAULT NULL,
  `lapbonif` double DEFAULT NULL,
  PRIMARY KEY (`lapid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mglistartpre`
--

LOCK TABLES `mglistartpre` WRITE;
/*!40000 ALTER TABLE `mglistartpre` DISABLE KEYS */;
/*!40000 ALTER TABLE `mglistartpre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgmenus`
--

DROP TABLE IF EXISTS `mgmenus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgmenus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `order` smallint(6) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mgmenus_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgmenus`
--

LOCK TABLES `mgmenus` WRITE;
/*!40000 ALTER TABLE `mgmenus` DISABLE KEYS */;
INSERT INTO `mgmenus` VALUES (1,'Clientes','clientes',0,0,1,'fas fa-users',NULL,NULL),(2,'Articulos','articulos',0,1,1,'fas fa-cubes fa-fw',NULL,NULL),(3,'Crear Cliente','clientes.crear',1,0,1,'fas fa-user-check',NULL,NULL),(4,'Modificar Cliente','clientes.modificar',1,1,0,'fas fa-user-edit',NULL,NULL),(5,'Crear Articulo','articulos.crear',2,0,1,'fas fa-plus',NULL,NULL),(6,'Modificar Articulo','articulos.modificar',2,1,0,'fas fa-pen',NULL,NULL),(7,'Stock','stock',0,2,1,'fas fa-pallet',NULL,NULL),(8,'Comprobantes','comprobantes',0,3,1,'fas fa-file-alt',NULL,NULL),(9,'Facturas','comprobantes.facturas',8,0,1,'fas fa-file',NULL,NULL),(10,'N. Credito','comprobantes.ncredito',8,1,1,'fas fa-file-invoice-dollar',NULL,NULL),(11,'N. Debito','comprobantes.ndebito',8,2,1,'fas fa-file-signature',NULL,NULL),(12,'Presupuestos','comprobantes.presupuesto',8,3,1,'fas fa-file-powerpoint',NULL,NULL),(13,'Remitos','comprobantes.remitos',8,4,1,'fas fa-truck-loading',NULL,NULL),(14,'Operar con stock','stock.movimientos',7,0,1,'fas fa-dolly',NULL,NULL),(15,'Operar con depositos','stock.depositos',7,1,1,'fas fa-warehouse',NULL,NULL),(16,'Listado clientes','clientes.listado',1,2,1,'fas fa-users',NULL,NULL),(17,'Listado articulos','articulos.listado',2,2,1,'fas fa-list-ol',NULL,NULL),(18,'Empresa','empresa',0,4,1,'fas fa-building',NULL,NULL),(20,'Tablas','tablas',18,0,1,'fas fa-table',NULL,NULL);
/*!40000 ALTER TABLE `mgmenus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgmod`
--

DROP TABLE IF EXISTS `mgmod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgmod` (
  `modid` int(11) NOT NULL AUTO_INCREMENT,
  `modhabil` bit(1) DEFAULT NULL,
  `modadmin` bit(1) DEFAULT NULL,
  `modcod` varchar(100) DEFAULT NULL,
  `moddesc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`modid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgmod`
--

LOCK TABLES `mgmod` WRITE;
/*!40000 ALTER TABLE `mgmod` DISABLE KEYS */;
INSERT INTO `mgmod` VALUES (1,_binary '',_binary '','Cli','Clientes'),(2,_binary '',_binary '','Art','Articulos');
/*!40000 ALTER TABLE `mgmod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgprecios`
--

DROP TABLE IF EXISTS `mgprecios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgprecios` (
  `idauto` int(11) NOT NULL AUTO_INCREMENT,
  `prlista` int(11) DEFAULT NULL,
  `prart` int(11) DEFAULT NULL,
  `prfecha` date DEFAULT NULL,
  `prprecom` decimal(10,0) DEFAULT NULL,
  `prgan` decimal(10,0) DEFAULT NULL,
  `priva` decimal(10,0) DEFAULT NULL,
  `prventa` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idauto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgprecios`
--

LOCK TABLES `mgprecios` WRITE;
/*!40000 ALTER TABLE `mgprecios` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgprecios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgroles`
--

DROP TABLE IF EXISTS `mgroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgroles` (
  `rid` int(11) NOT NULL,
  `rdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `rabr` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgroles`
--

LOCK TABLES `mgroles` WRITE;
/*!40000 ALTER TABLE `mgroles` DISABLE KEYS */;
INSERT INTO `mgroles` VALUES (1,'admin','ADM'),(2,'user','USR'),(3,'cliente','CLI');
/*!40000 ALTER TABLE `mgroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgstkcab`
--

DROP TABLE IF EXISTS `mgstkcab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgstkcab` (
  `stkid` varchar(60) COLLATE utf8_bin NOT NULL,
  `stktipmov` int(3) DEFAULT NULL,
  `stktipcom` int(11) DEFAULT NULL,
  `stkdep` int(11) DEFAULT NULL,
  `stkcenem` int(11) DEFAULT NULL,
  `stknumcom` int(11) DEFAULT NULL,
  `stkcomfec` date DEFAULT NULL,
  `stkprov` int(11) DEFAULT NULL,
  `stkcenemprov` int(11) DEFAULT NULL,
  `stkcomprov` int(11) DEFAULT NULL,
  `stkvalprov` bit(1) DEFAULT NULL,
  `stkcomfecprov` date DEFAULT NULL,
  `stkmovdepor` int(11) DEFAULT NULL,
  `stkmovdepdes` int(11) DEFAULT NULL,
  `stkmovdepfec` date DEFAULT NULL,
  `stkfecreg` datetime DEFAULT NULL,
  `stkuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`stkid`),
  KEY `depositoa` (`stkdep`),
  KEY `tipmovi` (`stktipmov`),
  CONSTRAINT `depositoa` FOREIGN KEY (`stkdep`) REFERENCES `mgdeposito` (`depid`),
  CONSTRAINT `tipmovi` FOREIGN KEY (`stktipmov`) REFERENCES `mgtipmovstk` (`movid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgstkcab`
--

LOCK TABLES `mgstkcab` WRITE;
/*!40000 ALTER TABLE `mgstkcab` DISABLE KEYS */;
INSERT INTO `mgstkcab` VALUES ('006212031657110001102020',2,6,100,1203,16571,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:59:56',NULL),('0911100010010001102020',1,91,100,1000,100,'2020-09-29',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:46:09',NULL),('091110001001110001102020',1,91,100,1000,10011,'2020-09-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:54:15',NULL),('0911100021010001102020',1,91,100,10002,10,'2020-12-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:48:12',NULL),('091110010010029092020',1,91,100,100,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:45:27',NULL),('09111001010029092020',1,91,100,100,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:48:06',NULL),('09111001011110029092020',1,91,100,100,10111,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:57:47',NULL),('091110010111110029092020',1,91,100,100,101111,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:58:53',NULL),('0911100101111110029092020',1,91,100,100,1011111,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:59:34',NULL),('09111010010001102020',1,91,100,10,100,'2020-09-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:35:09',NULL),('091110100110001102020',1,91,100,10,1001,'2020-09-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:36:13',NULL),('0911101002110001102020',1,91,100,10,10021,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:29:19',NULL),('0911101021310001102020',1,91,100,10,10213,'2020-08-03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:01:10',NULL),('091110102132110001102020',1,91,100,10,1021321,'2020-08-03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:01:34',NULL),('09111011112221110001102020',1,91,100,1011,1122211,'2020-12-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:46:09',NULL),('091110111222110001102020',1,91,100,101,112221,'2020-12-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:44:43',NULL),('0911101120110001102020',1,91,100,101,1201,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:40:08',NULL),('0911101122110001102020',1,91,100,10,11221,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:38:09',NULL),('0911101204110001102020',1,91,100,10,12041,'2020-07-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:23:23',NULL),('091110120411110001102020',1,91,100,10,1204111,'2020-07-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:25:23',NULL),('0911101209210001102020',1,91,100,10,12092,'2020-07-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:15:02',NULL),('09111012092410001102020',1,91,100,10,120924,'2020-06-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:18:54',NULL),('091110165710001102020',1,91,100,10,1657,'2020-04-08',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:49:05',NULL),('0911101657110001102020',1,91,100,10,16571,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:51:47',NULL),('091112031657110001102020',1,91,100,1203,16571,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:58:57',NULL),('09111203168982257110001102020',1,91,100,1203,1689822571,'2020-07-02',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:07:31',NULL),('091112031689857110001102020',1,91,100,1203,16898571,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:05:37',NULL),('09111212310029092020',1,91,100,12,123,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:45:40',NULL),('0911121333110029092020',1,91,100,12,13331,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:25:09',NULL),('09111232410022092020',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('091129832257110001102020',1,91,100,2,98322571,'2019-01-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:18:57',NULL),('091132323233434333310002102020',1,91,100,323232,334343333,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-02 15:58:48',NULL),('0911323233343433310002102020',1,91,100,32323,33434333,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-02 15:57:05',NULL),('09113233310001102020',1,91,100,3233,3,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:32:12',NULL),('0911323333310001102020',1,91,100,3233,333,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:33:48',NULL),('091132333333343310001102020',1,91,100,3233,33333433,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:37:51',NULL),('0911323333334310001102020',1,91,100,3233,333343,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:35:49',NULL),('09113233333410001102020',1,91,100,3233,3334,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:34:39',NULL),('09113233333433310001102020',1,91,100,3233,3334333,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:40:14',NULL),('091132339257110001102020',1,91,100,3233,92571,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:31:18',NULL),('09113239257110001102020',1,91,100,323,92571,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:30:42',NULL),('0911329832257110001102020',1,91,100,32,98322571,'2019-04-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:22:26',NULL),('0911Seleccionar22092020',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('09120101110029092020',2,91,100,1,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:16:03',NULL),('091210001001110001102020',2,91,100,1000,10011,'2020-09-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:54:27',NULL),('0912100010011110001102020',2,91,100,1000,100111,'2020-09-28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:55:14',NULL),('091210010110029092020',2,91,100,100,101,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:48:27',NULL),('0912100101110029092020',2,91,100,100,1011,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:49:03',NULL),('09121001011111210029092020',2,91,100,100,10111112,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:59:53',NULL),('091210010111112210029092020',2,91,100,100,101111122,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 17:00:52',NULL),('0912101002110001102020',2,91,100,10,10021,'2020-07-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:27:21',NULL),('0912101010001102020',2,91,100,10,10,'2020-09-28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:38:24',NULL),('0912101021310001102020',2,91,100,10,10213,'2020-10-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 15:59:57',NULL),('0912101021321210001102020',2,91,100,10,10213212,'2020-08-03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:03:41',NULL),('09121011002110001102020',2,91,100,10,110021,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:33:11',NULL),('091210111112221110001102020',2,91,100,10111,1122211,'2020-12-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:46:42',NULL),('0912101112221110001102020',2,91,100,101,1122211,'2020-12-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:45:29',NULL),('09121011201110001102020',2,91,100,101,12011,'2020-10-02',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:45:16',NULL),('09121011222110001102020',2,91,100,10,112221,'2020-12-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:43:21',NULL),('091210120110001102020',2,91,100,10,1201,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 00:39:56',NULL),('091210120410001102020',2,91,100,10,1204,'2020-07-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:21:01',NULL),('09121012041110001102020',2,91,100,10,120411,'2020-07-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:24:37',NULL),('091210120910001102020',2,91,100,10,1209,'2020-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:04:40',NULL),('091210165710001102020',2,91,100,10,1657,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:50:10',NULL),('09121201657110001102020',2,91,100,120,16571,'2020-10-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 16:53:14',NULL),('0912120316898257110001102020',2,91,100,1203,168982571,'2020-07-02',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:06:50',NULL),('091212221310029092020',2,91,100,122,213,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:17:06',NULL),('09121232210025092020',2,91,100,12,322,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-25 03:48:44',NULL),('091212412310029092020',2,91,100,124,123,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:27:33',NULL),('09121241232310029092020',2,91,100,124,12323,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:29:18',NULL),('091212412323210029092020',2,91,100,124,123232,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:31:13',NULL),('0912124310029092020',2,91,100,12,43,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:37:14',NULL),('09121243210029092020',2,91,100,12,432,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:41:23',NULL),('091212432210029092020',2,91,100,12,4322,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 16:42:06',NULL),('09122168982257110001102020',2,91,100,2,1689822571,'2021-04-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:16:46',NULL),('0912229832257110001102020',2,91,100,22,98322571,'2019-04-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:21:15',NULL),('0912232310029092020',2,91,100,23,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 17:02:33',NULL),('09122982257110001102020',2,91,100,2,9822571,'2021-04-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:18:19',NULL),('09123232333434333310002102020',2,91,100,32323,334343333,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-02 15:57:29',NULL),('09123233310001102020',2,91,100,3233,3,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:32:02',NULL),('091232333310001102020',2,91,100,3233,33,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:33:22',NULL),('0912323333333433310001102020',2,91,100,3233,333334333,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:39:07',NULL),('091232333333410001102020',2,91,100,3233,33334,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:35:19',NULL),('09123233333343310001102020',2,91,100,3233,3333433,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:36:49',NULL),('091232333343433310002102020',2,91,100,3233,33434333,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-02 15:56:24',NULL),('091232339257110001102020',2,91,100,3233,92571,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:31:07',NULL),('0912329257110001102020',2,91,100,32,92571,'2019-08-13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 17:27:51',NULL),('09198183210022092020',98,91,100,1,832,'2020-09-22',0,NULL,NULL,NULL,NULL,100,100,'2020-09-21','2020-09-22 21:25:49',NULL),('09198234310022092020',98,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('09198383210022092020',98,91,100,3,832,'2020-09-22',NULL,NULL,NULL,NULL,NULL,100,100,'2020-09-21','2020-09-22 21:27:12',NULL),('09198483210022092020',98,91,100,4,832,'2020-09-22',NULL,NULL,NULL,NULL,NULL,100,100,'2020-09-21','2020-09-22 21:29:48',NULL);
/*!40000 ALTER TABLE `mgstkcab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgstkdet`
--

DROP TABLE IF EXISTS `mgstkdet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgstkdet` (
  `stkdetid` varchar(60) COLLATE utf8_bin NOT NULL,
  `stkcontrol` int(11) NOT NULL,
  `stkdettipmov` int(11) DEFAULT NULL,
  `stkdettipcom` int(11) DEFAULT NULL,
  `stkdetidart` int(11) DEFAULT NULL,
  `stkdetart` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `stkdetum` int(2) DEFAULT NULL,
  `stkdetcant` decimal(10,0) DEFAULT NULL,
  `stkdetsaldo` decimal(10,0) DEFAULT NULL,
  `stkdetfechmov` datetime DEFAULT NULL,
  `stkdetfech` datetime DEFAULT NULL,
  PRIMARY KEY (`stkdetid`,`stkcontrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgstkdet`
--

LOCK TABLES `mgstkdet` WRITE;
/*!40000 ALTER TABLE `mgstkdet` DISABLE KEYS */;
INSERT INTO `mgstkdet` VALUES ('006212031657110001102020',0,2,6,1000,'articulo de prueba',1,-100,21090,'2020-10-01 16:59:56','2020-10-01 16:59:56'),('091110001001110001102020',0,1,91,1000,'articulo de prueba',1,1000,22354,'2020-09-28 00:54:15','2020-10-01 00:54:15'),('0911100021010001102020',0,1,91,1000,'articulo de prueba',1,100,19067,'2020-12-09 16:48:12','2020-10-01 16:48:12'),('0911101002110001102020',0,1,91,1000,'articulo de prueba',1,100,22111,'2020-10-01 16:29:19','2020-10-01 16:29:19'),('091110102132110001102020',0,1,91,1000,'articulo de prueba',1,1000,22119,'2020-08-03 16:01:34','2020-10-01 16:01:34'),('09111011112221110001102020',0,1,91,1000,'articulo de prueba',1,10,18977,'2020-12-09 16:46:09','2020-10-01 16:46:09'),('091110111222110001102020',0,1,91,1000,'articulo de prueba',1,100,19067,'2020-12-09 16:44:43','2020-10-01 16:44:43'),('0911101122110001102020',0,1,91,1000,'articulo de prueba',1,100,21211,'2020-10-01 16:38:09','2020-10-01 16:38:09'),('09111011324110003102020',0,1,91,1000,'articulo de prueba',1,999,21745,'2020-10-03 23:06:22','2020-10-03 23:06:22'),('0911101204110001102020',0,1,91,1000,'articulo de prueba',1,10,21120,'2020-07-09 16:23:23','2020-10-01 16:23:23'),('091110120411110001102020',0,1,91,1000,'articulo de prueba',1,100,21120,'2020-07-09 16:25:23','2020-10-01 16:25:23'),('0911101209210001102020',0,1,91,1000,'articulo de prueba',1,10000,21110,'2020-07-01 16:15:02','2020-10-01 16:15:02'),('09111012092410001102020',0,1,91,1000,'articulo de prueba',1,10000,11110,'2020-06-30 16:18:54','2020-10-01 16:18:54'),('0911101324110003102020',0,1,91,1000,'articulo de prueba',1,99,21289,'2020-10-03 23:03:06','2020-10-03 23:03:06'),('091110165710001102020',0,1,91,1000,'articulo de prueba',1,1000,1110,'2020-04-08 16:49:05','2020-10-01 16:49:05'),('0911101657110001102020',0,1,91,1000,'articulo de prueba',1,100,21211,'2020-10-01 16:51:47','2020-10-01 16:51:47'),('0911102324110003102020',0,1,91,1000,'articulo de prueba',1,100,20845,'2020-10-03 23:08:17','2020-10-03 23:08:17'),('091110232411210003102020',0,1,91,1000,'articulo de prueba',1,221,20067,'2020-10-03 23:10:22','2020-10-03 23:10:22'),('09111032410003102020',0,1,91,1000,'articulo de prueba',1,9999,31189,'2020-10-03 23:00:21','2020-10-03 23:00:21'),('091112031657110001102020',0,1,91,1000,'articulo de prueba',1,100,21190,'2020-10-01 16:58:57','2020-10-01 16:58:57'),('09111203168982257110001102020',0,1,91,1000,'articulo de prueba',1,100,21210,'2020-07-02 17:07:31','2020-10-01 17:07:31'),('091112031689857110001102020',0,1,91,1000,'articulo de prueba',1,100,21190,'2020-10-01 17:05:37','2020-10-01 17:05:37'),('0911123221002210002102020',0,1,91,1000,'articulo de prueba',1,100,9989,'2019-08-13 16:57:07','2020-10-02 16:57:07'),('091112322210022310002102020',0,1,91,1000,'articulo de prueba',1,100,9989,'2019-08-13 17:06:44','2020-10-02 17:06:44'),('09111232222100222310002102020',0,1,91,1000,'articulo de prueba',1,100,10089,'2019-08-13 17:14:59','2020-10-02 17:14:59'),('0911123222210022310002102020',0,1,91,1000,'articulo de prueba',1,100,9989,'2019-08-13 17:13:05','2020-10-02 17:13:05'),('09111232222186310002102020',0,1,91,1000,'articulo de prueba',1,100,189,'2019-08-13 17:23:11','2020-10-02 17:23:11'),('0911123222218633510002102020',0,1,91,1000,'articulo de prueba',1,100,189,'2019-08-13 17:24:45','2020-10-02 17:24:45'),('091112323333310002102020',0,1,91,1000,'articulo de prueba',1,100,9189,'2019-08-13 16:49:40','2020-10-02 16:49:40'),('0911123233533710002102020',0,1,91,1000,'articulo de prueba',1,1000,10089,'2019-08-13 16:52:25','2020-10-02 16:52:25'),('091129832257110001102020',0,1,91,1000,'articulo de prueba',1,100,100,'2019-01-30 17:18:57','2020-10-01 17:18:57'),('0911323232233434333310002102020',0,1,91,1000,'articulo de prueba',1,1000,10089,'2019-08-13 16:48:15','2020-10-02 16:48:15'),('091132323233434333310002102020',0,1,91,1000,'articulo de prueba',1,100,10090,'2019-08-13 15:58:48','2020-10-02 15:58:48'),('0911323233343433310002102020',0,1,91,1000,'articulo de prueba',1,10000,10090,'2019-08-13 15:57:05','2020-10-02 15:57:05'),('09113233310001102020',0,1,91,1000,'articulo de prueba',1,10,150,'2019-08-13 17:32:12','2020-10-01 17:32:12'),('0911323333310001102020',0,1,91,1000,'articulo de prueba',1,10,60,'2019-08-13 17:33:48','2020-10-01 17:33:48'),('091132333333343310001102020',0,1,91,1000,'articulo de prueba',1,100,260,'2019-08-13 17:37:51','2020-10-01 17:37:51'),('0911323333334310001102020',0,1,91,1000,'articulo de prueba',1,100,160,'2019-08-13 17:35:49','2020-10-01 17:35:49'),('09113233333410001102020',0,1,91,1000,'articulo de prueba',1,100,160,'2019-08-13 17:34:39','2020-10-01 17:34:39'),('09113233333433310001102020',0,1,91,1000,'articulo de prueba',1,100,310,'2019-08-13 17:40:14','2020-10-01 17:40:14'),('091132339257110001102020',0,1,91,1000,'articulo de prueba',1,10,140,'2019-08-13 17:31:18','2020-10-01 17:31:18'),('09113239257110001102020',0,1,91,1000,'articulo de prueba',1,50,130,'2019-08-13 17:30:42','2020-10-01 17:30:42'),('0911329832257110001102020',0,1,91,1000,'articulo de prueba',1,100,190,'2019-04-04 17:22:26','2020-10-01 17:22:26'),('091150099910003102020',0,1,91,1000,'articulo de prueba',1,100,21290,'2020-10-03 22:40:54','2020-10-03 22:40:54'),('0911500999910003102020',0,1,91,1000,'articulo de prueba',1,1234,22353,'2020-08-05 22:53:27','2020-10-03 22:53:27'),('0911820310005102020',0,1,91,1002,'articulo de prueba 3',1,1000,1000,'2020-10-05 17:41:54','2020-10-05 17:41:54'),('0911999218633510002102020',0,1,91,1000,'articulo de prueba',1,100,189,'2019-08-13 17:26:23','2020-10-02 17:26:23'),('091199999218633510002102020',0,1,91,1000,'articulo de prueba',1,100,89,'2019-08-13 17:28:09','2020-10-02 17:28:09'),('09119999942184510002102020',0,1,91,1000,'articulo de prueba',1,100,160,'2019-08-13 17:37:32','2020-10-02 17:37:32'),('0911999999421834510002102020',0,1,91,1000,'articulo de prueba',1,100,310,'2019-08-13 17:42:32','2020-10-02 17:42:32'),('091210001001110001102020',0,2,91,1000,'articulo de prueba',1,-343,22011,'2020-09-30 00:54:27','2020-10-01 00:54:27'),('0912101002110001102020',0,2,91,1000,'articulo de prueba',1,-1,21119,'2020-07-09 16:27:21','2020-10-01 16:27:21'),('0912101021310001102020',0,2,91,1000,'articulo de prueba',1,-100,19967,'2020-10-30 15:59:57','2020-10-01 15:59:57'),('09121011002110001102020',0,2,91,1000,'articulo de prueba',1,-1000,21111,'2020-10-01 16:33:11','2020-10-01 16:33:11'),('091210111112221110001102020',0,2,91,1000,'articulo de prueba',1,-10,18967,'2020-12-09 16:46:42','2020-10-01 16:46:42'),('0912101112221110001102020',0,2,91,1000,'articulo de prueba',1,-100,18967,'2020-12-09 16:45:29','2020-10-01 16:45:29'),('09121011222110001102020',0,2,91,1000,'articulo de prueba',1,-1000,18967,'2020-12-09 16:43:21','2020-10-01 16:43:21'),('09121011324110003102020',0,2,91,1000,'articulo de prueba',1,-1000,20745,'2020-10-03 23:08:01','2020-10-03 23:08:01'),('091210120410001102020',0,2,91,1000,'articulo de prueba',1,-100,21110,'2020-07-09 16:21:01','2020-10-01 16:21:01'),('09121012041110001102020',0,2,91,1000,'articulo de prueba',1,-100,21020,'2020-07-09 16:24:37','2020-10-01 16:24:37'),('091210120910001102020',0,2,91,1000,'articulo de prueba',1,-1000,21119,'2020-08-04 16:04:40','2020-10-01 16:04:40'),('0912101324110003102020',0,2,91,1000,'articulo de prueba',1,-543,20746,'2020-10-03 23:05:51','2020-10-03 23:05:51'),('091210165710001102020',0,2,91,1000,'articulo de prueba',1,-100,21111,'2020-10-01 16:50:10','2020-10-01 16:50:10'),('09121023241110003102020',0,2,91,1000,'articulo de prueba',1,-999,19846,'2020-10-03 23:08:39','2020-10-03 23:08:39'),('091210324110003102020',0,2,91,1000,'articulo de prueba',1,-9999,21190,'2020-10-03 23:01:44','2020-10-03 23:01:44'),('09121201657110001102020',0,2,91,1000,'articulo de prueba',1,-121,21090,'2020-10-01 16:53:14','2020-10-01 16:53:14'),('0912123100210002102020',0,2,91,1000,'articulo de prueba',1,-100,9989,'2019-08-13 16:53:44','2020-10-02 16:53:44'),('091212322100210002102020',0,2,91,1000,'articulo de prueba',1,-100,9889,'2019-08-13 16:55:30','2020-10-02 16:55:30'),('09121232221002210002102020',0,2,91,1000,'articulo de prueba',1,-100,9889,'2019-08-13 16:57:46','2020-10-02 16:57:46'),('0912123222210022310002102020',0,2,91,1000,'articulo de prueba',1,-100,9889,'2019-08-13 17:11:09','2020-10-02 17:11:09'),('0912123222218610002102020',0,2,91,1000,'articulo de prueba',1,-10000,89,'2019-08-13 17:18:40','2020-10-02 17:18:40'),('091212322221863310002102020',0,2,91,1000,'articulo de prueba',1,-100,89,'2019-08-13 17:23:37','2020-10-02 17:23:37'),('091212323333310002102020',0,2,91,1000,'articulo de prueba',1,-1000,9089,'2019-08-13 16:48:41','2020-10-02 16:48:41'),('0912123233333710002102020',0,2,91,1000,'articulo de prueba',1,-100,9089,'2019-08-13 16:50:59','2020-10-02 16:50:59'),('09122168982257110001102020',0,2,91,1000,'articulo de prueba',1,-100,18967,'2021-04-30 17:16:46','2020-10-01 17:16:46'),('0912229832257110001102020',0,2,91,1000,'articulo de prueba',1,-10,90,'2019-04-04 17:21:15','2020-10-01 17:21:15'),('09122982257110001102020',0,2,91,1000,'articulo de prueba',1,-19,18948,'2021-04-30 17:18:19','2020-10-01 17:18:19'),('0912323232233434333310002102020',0,2,91,1000,'articulo de prueba',1,-1000,9089,'2019-08-13 16:46:25','2020-10-02 16:46:25'),('091232323233434333310002102020',0,2,91,1000,'articulo de prueba',1,-1,10089,'2019-08-13 16:44:29','2020-10-02 16:44:29'),('09123232333434333310002102020',0,2,91,1000,'articulo de prueba',1,-100,9990,'2019-08-13 15:57:29','2020-10-02 15:57:29'),('091232333310001102020',0,2,91,1000,'articulo de prueba',1,-100,50,'2019-08-13 17:33:22','2020-10-01 17:33:22'),('0912323333333433310001102020',0,2,91,1000,'articulo de prueba',1,-50,210,'2019-08-13 17:39:07','2020-10-01 17:39:07'),('091232333333410001102020',0,2,91,1000,'articulo de prueba',1,-100,60,'2019-08-13 17:35:19','2020-10-01 17:35:19'),('09123233333343310001102020',0,2,91,1000,'articulo de prueba',1,-100,60,'2019-08-13 17:36:49','2020-10-01 17:36:49'),('091232333343433310002102020',0,2,91,1000,'articulo de prueba',1,-100,90,'2019-08-13 15:56:24','2020-10-02 15:56:24'),('0912329257110001102020',0,2,91,1000,'articulo de prueba',1,-100,-11,'2019-08-13 17:27:51','2020-10-01 17:27:51'),('09125001999910003102020',0,2,91,1000,'articulo de prueba',1,-999,21354,'2020-08-05 22:58:47','2020-10-03 22:58:47'),('091250099910003102020',0,2,91,1000,'articulo de prueba',1,-100,21190,'2020-10-03 22:49:14','2020-10-03 22:49:14'),('091299218633510002102020',0,2,91,1000,'articulo de prueba',1,-100,89,'2019-08-13 17:25:26','2020-10-02 17:25:26'),('09129999218633510002102020',0,2,91,1000,'articulo de prueba',1,-100,89,'2019-08-13 17:26:47','2020-10-02 17:26:47'),('0912999992184510002102020',0,2,91,1000,'articulo de prueba',1,-9,80,'2019-08-13 17:28:59','2020-10-02 17:28:59'),('09129999994218344510002102020',0,2,91,1000,'articulo de prueba',1,-200,110,'2019-08-13 17:43:21','2020-10-02 17:43:21'),('091299999942184510002102020',0,2,91,1000,'articulo de prueba',1,-100,210,'2019-08-13 17:41:37','2020-10-02 17:41:37');
/*!40000 ALTER TABLE `mgstkdet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgtabcem`
--

DROP TABLE IF EXISTS `mgtabcem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgtabcem` (
  `cemid` int(11) NOT NULL,
  `cemdes` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cemmarca` int(11) DEFAULT NULL,
  `cemcola` int(11) DEFAULT NULL,
  `cemport` int(11) DEFAULT NULL,
  `cembaud` int(11) DEFAULT NULL,
  `cemmonmax` int(11) DEFAULT NULL,
  `cemfiscal` int(11) DEFAULT NULL,
  PRIMARY KEY (`cemid`),
  KEY `mgtabcem_FK` (`cemmarca`),
  CONSTRAINT `mgtabcem_FK` FOREIGN KEY (`cemmarca`) REFERENCES `mgtabcem` (`cemid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgtabcem`
--

LOCK TABLES `mgtabcem` WRITE;
/*!40000 ALTER TABLE `mgtabcem` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgtabcem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgtabcemnum`
--

DROP TABLE IF EXISTS `mgtabcemnum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgtabcemnum` (
  `cemid` int(11) NOT NULL,
  `tipcom` int(11) NOT NULL,
  `ultnum` int(11) DEFAULT NULL,
  `ultfech` date DEFAULT NULL,
  `numcop` int(11) DEFAULT NULL,
  `impdest` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `refrep` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`cemid`,`tipcom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgtabcemnum`
--

LOCK TABLES `mgtabcemnum` WRITE;
/*!40000 ALTER TABLE `mgtabcemnum` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgtabcemnum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgtabest`
--

DROP TABLE IF EXISTS `mgtabest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgtabest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estnombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estnomred` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgtabest`
--

LOCK TABLES `mgtabest` WRITE;
/*!40000 ALTER TABLE `mgtabest` DISABLE KEYS */;
INSERT INTO `mgtabest` VALUES (1,'Test','MacBook-Pro-de-Juan.local'),(2,'macbook','192.168.15.122');
/*!40000 ALTER TABLE `mgtabest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgtabestpre`
--

DROP TABLE IF EXISTS `mgtabestpre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgtabestpre` (
  `idauto` int(11) NOT NULL AUTO_INCREMENT,
  `idest` int(11) NOT NULL,
  `presuc` int(11) DEFAULT NULL,
  `precaja` int(11) DEFAULT NULL,
  `predeposito` int(11) DEFAULT NULL,
  `preventa` int(11) DEFAULT NULL,
  `prelista` int(11) DEFAULT NULL,
  `prepedidos` int(11) DEFAULT NULL,
  `preremitos` int(11) DEFAULT NULL,
  `prefacta` int(11) DEFAULT NULL,
  `prefactb` int(11) DEFAULT NULL,
  `prendeba` int(11) DEFAULT NULL,
  `prendebb` int(11) DEFAULT NULL,
  `precreda` int(11) DEFAULT NULL,
  `precredb` int(11) DEFAULT NULL,
  `premovstk` int(11) DEFAULT NULL,
  `prepresu` int(11) DEFAULT NULL,
  `precobra` int(11) DEFAULT NULL,
  `preordcomp` int(11) DEFAULT NULL,
  `preordvta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idauto`,`idest`),
  KEY `mgtabestpre_FK` (`prelista`),
  KEY `mgtabestpre_FK_1` (`predeposito`),
  KEY `mgtabestpre_FK_2` (`presuc`),
  KEY `mgtabestpre_FK_3` (`preventa`),
  CONSTRAINT `mgtabestpre_FK` FOREIGN KEY (`prelista`) REFERENCES `mglistaprecios` (`lpid`),
  CONSTRAINT `mgtabestpre_FK_1` FOREIGN KEY (`predeposito`) REFERENCES `mgdeposito` (`depid`),
  CONSTRAINT `mgtabestpre_FK_3` FOREIGN KEY (`preventa`) REFERENCES `mgcliconven` (`cvid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgtabestpre`
--

LOCK TABLES `mgtabestpre` WRITE;
/*!40000 ALTER TABLE `mgtabestpre` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgtabestpre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgtipcom`
--

DROP TABLE IF EXISTS `mgtipcom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgtipcom` (
  `autoid` int(11) NOT NULL AUTO_INCREMENT,
  `comid` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `comdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `comconcep` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `comcontab` int(11) DEFAULT NULL,
  PRIMARY KEY (`autoid`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgtipcom`
--

LOCK TABLES `mgtipcom` WRITE;
/*!40000 ALTER TABLE `mgtipcom` DISABLE KEYS */;
INSERT INTO `mgtipcom` VALUES (195,'1','FACTURAS A',NULL,NULL),(196,'2','NOTAS DE DEBITO A',NULL,NULL),(197,'3','NOTAS DE CREDITO A',NULL,NULL),(198,'4','RECIBOS A',NULL,NULL),(199,'5','NOTAS DE VENTA AL CONTADO A',NULL,NULL),(200,'6','FACTURAS B',NULL,NULL),(201,'7','NOTAS DE DEBITO B',NULL,NULL),(202,'8','NOTAS DE CREDITO B',NULL,NULL),(203,'9','RECIBOS B',NULL,NULL),(204,'10','NOTAS DE VENTA AL CONTADO B',NULL,NULL),(205,'11','FACTURAS C',NULL,NULL),(206,'12','NOTAS DE DEBITO C',NULL,NULL),(207,'13','NOTAS DE CREDITO C',NULL,NULL),(208,'15','RECIBOS C',NULL,NULL),(209,'16','NOTAS DE VENTA AL CONTADO C',NULL,NULL),(243,'51','FACTURAS M',NULL,NULL),(244,'52','NOTAS DE DEBITO M',NULL,NULL),(245,'53','NOTAS DE CREDITO M',NULL,NULL),(246,'54','RECIBOS M',NULL,NULL),(247,'55','NOTAS DE VENTA AL CONTADO M',NULL,NULL),(260,'81','TIQUE FACTURA A   ',NULL,NULL),(261,'82','TIQUE FACTURA B',NULL,NULL),(262,'83','TIQUE',NULL,NULL),(263,'88','REMITO ELECTRONICO',NULL,NULL),(266,'91','REMITOS R',NULL,NULL),(268,'110','TIQUE NOTA DE CREDITO ',NULL,NULL),(269,'111','TIQUE FACTURA C',NULL,NULL),(270,'112',' TIQUE NOTA DE CREDITO A',NULL,NULL),(271,'113','TIQUE NOTA DE CREDITO B',NULL,NULL),(272,'114','TIQUE NOTA DE CREDITO C',NULL,NULL),(273,'115','TIQUE NOTA DE DEBITO A',NULL,NULL),(274,'116','TIQUE NOTA DE DEBITO B',NULL,NULL),(275,'117','TIQUE NOTA DE DEBITO C',NULL,NULL),(276,'118','TIQUE FACTURA M',NULL,NULL),(277,'119','TIQUE NOTA DE CREDITO M',NULL,NULL),(278,'120','TIQUE NOTA DE DEBITO M',NULL,NULL);
/*!40000 ALTER TABLE `mgtipcom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgtipmovstk`
--

DROP TABLE IF EXISTS `mgtipmovstk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgtipmovstk` (
  `movid` int(3) NOT NULL,
  `movdesc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `movtipmov` int(11) DEFAULT NULL,
  `movabr` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `movmov` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'IGUAL: suma resta, SUMA, RESTA',
  PRIMARY KEY (`movid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgtipmovstk`
--

LOCK TABLES `mgtipmovstk` WRITE;
/*!40000 ALTER TABLE `mgtipmovstk` DISABLE KEYS */;
INSERT INTO `mgtipmovstk` VALUES (1,'Ingreso deposito',1,'INDEP','SUMA'),(2,'Egreso deposito',2,'EGDEP','RESTA'),(98,'Movimiento entre depositos',3,'MOVED','IGUAL'),(99,'Compra',1,'COMPR','SUMA');
/*!40000 ALTER TABLE `mgtipmovstk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2020_07_22_011118_create_mgmenus_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_FK` (`role`),
  CONSTRAINT `users_FK` FOREIGN KEY (`role`) REFERENCES `mgroles` (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adminAA','juan bautista goicoechea',2,'admin@aaaaa',NULL,'$2y$10$CUWBsORPrkkep.jL9wxar.51O6oUCetE3SNbjss0UjM18buKGdenS',NULL,'2020-10-08 17:28:54','2020-10-21 05:26:10'),(2,'jubag','Juba',1,'admin@ad',NULL,'$2y$10$.FMUS6r00sEU5hCjdtw39u6NfKzxcTjo5j7X3hij3PMmqVnU8D//a',NULL,'2020-10-20 00:36:51','2020-10-20 00:36:51'),(3,'jubag2','prueba',NULL,'admin@admin.com',NULL,'$2y$10$uqCYauGmZ7LzXVTf6lFd9OxUaBSn6aIaKkOY1yKKDCCdMvuMWsb.e',NULL,'2020-10-20 00:42:31','2020-10-20 00:42:31'),(4,'jubag3','pruebaultima',3,'juan@localhost',NULL,'$2y$10$ojGvk04DFfvx2kpavHNimOxX4VRReGDLBFcgJUWu/aHT/qVrxhXFe',NULL,'2020-10-20 00:45:58','2020-10-20 00:45:58'),(5,'juan','juan',3,'admin@aaa',NULL,'$2y$10$e0.TLYlJGSYx.PW1qKNCLecb8BJOzcwldKyoc9jv4q9FMfe5AM6oC',NULL,'2020-10-21 04:56:03','2020-10-21 04:56:03'),(6,'jubag5','admin',1,'admin@ab',NULL,'$2y$10$OGdS1edE9xJC3U5WpJ7MX.uROhG2jf9ujniAJZj7JIxsA62yo7lIq',NULL,'2020-10-21 04:56:43','2020-10-21 04:56:43'),(8,'jubagg','Juba',1,'admin@a',NULL,'$2y$10$Jfp7BPyvIK6dSk3ujmjlzeMRxIMw4qDM.1VNcTjR5/ui4CM/OYYUO',NULL,'2020-10-27 03:54:11','2020-10-27 03:54:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'managementerp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-03  8:54:46
