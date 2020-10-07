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
INSERT INTO `mgart` VALUES (93,'Arituclo 93',NULL,NULL,_binary '\0',NULL,NULL,'009',1,1,NULL,NULL,NULL,NULL,'2020-08-31',NULL,NULL,_binary '\0',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0'),(98,'Prueba de articulo',1,NULL,NULL,'011','32','002',1,1,NULL,NULL,NULL,NULL,'2020-08-31','2020-09-01 20:16:41',NULL,_binary '\0',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0'),(322,'Limpiador Blem sup. delicadas',1,'7794000597624',NULL,'230','023','001',1,1,NULL,NULL,NULL,NULL,'2020-09-10',NULL,NULL,_binary '\0',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0'),(1000,'articulo de prueba',1,NULL,_binary '','1','1','002',1,1,10,NULL,NULL,NULL,'2020-08-31','2020-09-01 19:34:36',NULL,_binary '\0',1,_binary '\0',_binary '',10003,10004,_binary ''),(1001,'articulo de prueba 2',1,NULL,_binary '','1','1','002',1,1,NULL,NULL,NULL,NULL,'2020-08-31','2020-09-02 17:14:48',NULL,_binary '\0',1,_binary '',_binary '\0',91283,21,_binary '\0'),(1002,'articulo de prueba 3',1,NULL,_binary '','1','1','001',1,1,NULL,NULL,NULL,NULL,'2020-08-26','2020-09-01 20:14:47',NULL,_binary '\0',1,_binary '',_binary '',91283,32423,_binary ''),(2342,'articulo de prueba 6',1,NULL,_binary '\0',NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2020-08-31',NULL,NULL,_binary '\0',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0'),(428394,'jsihu',1,'62384623',_binary '\0',NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2020-08-26','2020-08-26 01:26:18','2020-08-26 01:26:18',_binary '',1,_binary '\0',_binary '\0',NULL,NULL,_binary '\0');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgbancos`
--

LOCK TABLES `mgbancos` WRITE;
/*!40000 ALTER TABLE `mgbancos` DISABLE KEYS */;
INSERT INTO `mgbancos` VALUES (1,'Banco Provincia','PBA');
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
  `sid` int(1) NOT NULL,
  `sdes` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgclisuc`
--

LOCK TABLES `mgclisuc` WRITE;
/*!40000 ALTER TABLE `mgclisuc` DISABLE KEYS */;
INSERT INTO `mgclisuc` VALUES (1,'Casa Central');
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
  KEY `mgdeposito_FK` (`depsuc`),
  CONSTRAINT `mgdeposito_FK` FOREIGN KEY (`depsuc`) REFERENCES `mgclisuc` (`sid`)
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
  `empnom` varchar(100) DEFAULT NULL,
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
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgempre`
--

LOCK TABLES `mgempre` WRITE;
/*!40000 ALTER TABLE `mgempre` DISABLE KEYS */;
INSERT INTO `mgempre` VALUES (1,'FireProject Sistemas',20370560596,'Misiones 66','2923-654416','juangoicoechea@fireproject.com.ar',NULL,NULL,NULL,NULL,NULL,NULL);
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
  PRIMARY KEY (`modid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgmod`
--

LOCK TABLES `mgmod` WRITE;
/*!40000 ALTER TABLE `mgmod` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgmod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgpages`
--

DROP TABLE IF EXISTS `mgpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgpages` (
  `id` int(11) NOT NULL,
  `pname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pslug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `padd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pedit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdelete` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plist` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptab1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptabicon1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptab2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptabicon2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptab3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptabicon3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptab4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptabicon4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptab5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptabicon5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptab6` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptabicon6` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgpages`
--

LOCK TABLES `mgpages` WRITE;
/*!40000 ALTER TABLE `mgpages` DISABLE KEYS */;
INSERT INTO `mgpages` VALUES (1,'Listado clientes','clientes.listado','fas fa-users','clientes.crear','clientes.editar','clientes.eliminar','clientes.listado','Listado','fas fa-users','Vendedores','fas fa user-tag',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Crear cliente','clientes.crear','fas fa-user-check','clientes.crear','clientes.editar','clientes.eliminar','clientes.listado','Crear nuevo','fas fa-users-plus','Vendedores','fas fa user-tag','Cuentas bancarias','fas fa-university',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `mgpages` ENABLE KEYS */;
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
-- Table structure for table `mgstkcab`
--

DROP TABLE IF EXISTS `mgstkcab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mgstkcab` (
  `stkid` varchar(60) COLLATE utf8_bin NOT NULL,
  `stkcontrol` int(11) NOT NULL,
  `stktipmov` int(3) DEFAULT NULL,
  `stktipcom` int(11) DEFAULT NULL,
  `stkdep` int(11) DEFAULT NULL,
  `stkcenem` int(11) DEFAULT NULL,
  `stknumcom` int(11) DEFAULT NULL,
  `stkprov` int(11) DEFAULT NULL,
  `stkcenemprov` int(11) DEFAULT NULL,
  `stkcomprov` int(11) DEFAULT NULL,
  `stkvalprov` bit(1) DEFAULT NULL,
  `stkcomfec` date DEFAULT NULL,
  `stkfecreg` datetime DEFAULT NULL,
  `stkmovdepor` int(11) DEFAULT NULL,
  `stkmovdepdes` int(11) DEFAULT NULL,
  PRIMARY KEY (`stkid`,`stkcontrol`),
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
  `stkdetart` int(11) DEFAULT NULL,
  `stkdetum` int(2) DEFAULT NULL,
  `stkdetcant` decimal(10,0) DEFAULT NULL,
  `stkprecom` double DEFAULT NULL,
  `stkbonif` double DEFAULT NULL,
  PRIMARY KEY (`stkdetid`,`stkcontrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgstkdet`
--

LOCK TABLES `mgstkdet` WRITE;
/*!40000 ALTER TABLE `mgstkdet` DISABLE KEYS */;
/*!40000 ALTER TABLE `mgstkdet` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgtipcom`
--

LOCK TABLES `mgtipcom` WRITE;
/*!40000 ALTER TABLE `mgtipcom` DISABLE KEYS */;
INSERT INTO `mgtipcom` VALUES (1,'006','FACTURA B','FB',1),(2,'091','REMITO R','RR',0);
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
INSERT INTO `mgtipmovstk` VALUES (1,'Ingreso deposito',1,'INDEP','SUMA'),(98,'Movimiento entre depositos',3,'MOVED','IGUAL'),(99,'Compra',1,'COMPR','SUMA');
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2020-09-21 10:53:49
