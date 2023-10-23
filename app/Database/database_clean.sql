-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: base_clean
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `privilege` int NOT NULL DEFAULT '0',
  `rol` int NOT NULL DEFAULT '1',
  `nombre` varchar(300) DEFAULT NULL,
  `nodo` varchar(350) NOT NULL,
  `sucursal` varchar(300) NOT NULL,
  `sucursal_origen` int NOT NULL,
  `correo` varchar(350) NOT NULL,
  `chat` int NOT NULL,
  `acceso` text NOT NULL,
  `acceso_tools` text NOT NULL,
  `estado` int DEFAULT NULL,
  `timeout` int NOT NULL,
  `mail` int NOT NULL DEFAULT '1',
  `api` int NOT NULL,
  `avatar` mediumblob,
  `color_avatar` varchar(10) NOT NULL DEFAULT '#348fe2',
  `movil` varchar(15) NOT NULL,
  `fb` varchar(150) NOT NULL,
  `twitter` varchar(150) NOT NULL,
  `comision_cobro` decimal(12,2) NOT NULL,
  `token_api` text NOT NULL,
  `recover` text NOT NULL,
  `dia_acceso` varchar(20) NOT NULL DEFAULT '1,1,1,1,1,1,1',
  `inicio_acceso` varchar(10) NOT NULL DEFAULT '00:00',
  `fin_acceso` varchar(10) NOT NULL DEFAULT '23:59',
  `fecha_nacimiento` date DEFAULT NULL,
  `check_cumple_dia` tinyint(1) NOT NULL DEFAULT '0',
  `random` int NOT NULL DEFAULT '0',
  `oldPassword` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (000001,'admin','21232f297a57a5a743894a0e4a801fc3',0,2,'Admin Get Solutions','%%','%%',1,'lugomartinm@gmail.com',1,'','',1,0,1,0,NULL,'#348fe2','9999588887','/joselugo2105','',0.00,'RGR0QzJ1cC9mbTdpM0R3MitRSzZEdz09','','1,1,1,1,1,1,1','00:00','23:59',NULL,1,1,'');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_permiso`
--

DROP TABLE IF EXISTS `login_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_permiso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_permiso` int NOT NULL,
  `id_usuario` int(6) unsigned zerofill NOT NULL,
  `tipo_acceso` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_permiso`
--

LOCK TABLES `login_permiso` WRITE;
/*!40000 ALTER TABLE `login_permiso` DISABLE KEYS */;
INSERT INTO `login_permiso` VALUES (45,1,000070,3),(46,2,000070,3),(47,4,000070,3),(48,5,000070,3),(49,10,000070,3),(50,1,000071,3),(51,2,000071,3),(52,4,000071,3),(53,5,000071,3),(54,10,000071,3),(177,1,000072,2),(178,16,000072,3),(179,17,000072,2),(180,2,000072,3),(181,4,000072,3),(182,5,000072,3),(183,6,000072,3),(184,7,000072,2),(305,1,000001,3),(306,2,000001,3),(307,4,000001,3),(308,5,000001,3),(309,6,000001,3),(310,7,000001,3),(311,8,000001,3),(312,9,000001,3),(313,10,000001,3);
/*!40000 ALTER TABLE `login_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loglogin`
--

DROP TABLE IF EXISTS `loglogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loglogin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idadmin` int(6) unsigned zerofill NOT NULL,
  `fecha` datetime NOT NULL,
  `ipadmin` varchar(20) NOT NULL,
  `error` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loglogin`
--

LOCK TABLES `loglogin` WRITE;
/*!40000 ALTER TABLE `loglogin` DISABLE KEYS */;
INSERT INTO `loglogin` VALUES (1,000001,'2022-11-11 12:13:58','::1','Acceso exitoso'),(2,000001,'2022-11-11 12:14:09','::1','Acceso exitoso'),(3,000001,'2022-11-25 09:51:38','::1','Acceso exitoso'),(4,000001,'2022-11-25 09:51:39','::1','Acceso exitoso'),(5,000001,'2022-11-25 09:58:42','::1','Acceso exitoso'),(6,000001,'2022-11-30 11:19:01','::1','Acceso exitoso'),(7,000001,'2022-11-30 11:24:04','::1','Acceso exitoso'),(8,000001,'2022-12-02 11:35:17','::1','Acceso exitoso'),(9,000001,'2022-12-02 12:32:47','::1','Acceso exitoso'),(10,000001,'2022-12-02 23:10:42','::1','Acceso exitoso'),(11,000001,'2022-12-02 23:10:43','::1','Acceso exitoso'),(12,000001,'2022-12-02 23:12:32','::1','Acceso exitoso'),(13,000001,'2022-12-12 12:49:17','::1','Acceso exitoso'),(14,000001,'2022-12-13 11:08:06','::1','Acceso exitoso'),(15,000001,'2022-12-14 11:26:21','::1','Acceso exitoso'),(16,000001,'2022-12-20 12:02:19','::1','Acceso exitoso'),(17,000001,'2022-12-21 09:42:58','::1','Acceso exitoso'),(18,000001,'2022-12-25 15:23:52','::1','Acceso exitoso'),(19,000001,'2022-12-26 12:38:24','::1','Acceso exitoso'),(20,000001,'2023-01-05 11:14:53','::1','Acceso exitoso'),(21,000001,'2023-02-22 14:49:02','::1','Acceso exitoso'),(22,000001,'2023-02-22 14:51:16','::1','Acceso exitoso'),(23,000001,'2023-02-22 14:52:40','::1','Acceso exitoso'),(24,000001,'2023-02-22 15:01:44','::1','Acceso exitoso'),(25,000001,'2023-02-22 19:04:28','::1','Acceso exitoso'),(26,000001,'2023-02-24 16:01:55','::1','Acceso exitoso'),(27,000001,'2023-02-24 16:32:25','::1','Acceso exitoso'),(28,000001,'2023-02-24 17:19:55','::1','Acceso exitoso'),(29,000001,'2023-02-24 17:20:37','::1','Acceso exitoso'),(30,000001,'2023-02-25 11:40:37','::1','Acceso exitoso'),(31,000001,'2023-02-25 14:34:07','::1','Acceso exitoso'),(32,000001,'2023-02-25 20:25:20','::1','Acceso exitoso'),(33,000001,'2023-03-01 10:24:52','::1','Acceso exitoso'),(34,000001,'2023-03-07 12:22:54','::1','Acceso exitoso'),(35,000001,'2023-03-07 14:54:49','::1','Acceso exitoso'),(36,000001,'2023-03-13 13:20:59','::1','Acceso exitoso'),(37,000001,'2023-03-31 17:49:15','::1','Acceso exitoso'),(38,000001,'2023-04-02 19:41:59','::1','Acceso exitoso'),(39,000001,'2023-04-02 20:26:18','::1','Acceso exitoso'),(40,000001,'2023-04-08 14:36:33','::1','Acceso exitoso'),(41,000001,'2023-04-18 19:34:08','::1','Acceso exitoso'),(42,000001,'2023-04-22 18:06:19','::1','Acceso exitoso'),(43,000000,'2023-04-22 18:36:11','::1','Usuario o contraseña invalido'),(44,000001,'2023-04-22 18:36:16','::1','Acceso exitoso'),(45,000001,'2023-04-22 19:03:03','::1','Acceso exitoso'),(46,000001,'2023-04-22 19:05:12','::1','Acceso exitoso'),(47,000000,'2023-04-22 19:17:44','::1','Usuario o contraseña invalido'),(48,000001,'2023-04-22 19:17:52','::1','Acceso exitoso'),(49,000000,'2023-04-22 19:59:22','::1','Usuario o contraseña invalido'),(50,000001,'2023-05-02 14:27:19','::1','Acceso exitoso'),(51,000001,'2023-05-03 17:39:52','::1','Acceso exitoso'),(52,000001,'2023-05-31 21:43:33','::1','Acceso exitoso'),(53,000001,'2023-06-05 14:18:01','::1','Acceso exitoso'),(54,000001,'2023-06-05 14:18:39','::1','Acceso exitoso'),(55,000001,'2023-06-09 16:22:50','::1','Acceso exitoso'),(56,000000,'2023-10-22 13:23:02','::1','Usuario o contraseña invalido'),(57,000001,'2023-10-22 13:49:55','::1','Acceso exitoso'),(58,000001,'2023-10-22 13:54:23','::1','Acceso exitoso'),(59,000001,'2023-10-22 13:54:52','::1','Acceso exitoso'),(60,000000,'2023-10-22 14:00:56','::1','Usuario o contraseña invalido'),(61,000001,'2023-10-22 14:01:02','::1','Acceso exitoso'),(62,000000,'2023-10-22 14:06:26','::1','Usuario o contraseña invalido'),(63,000001,'2023-10-22 14:06:30','::1','Acceso exitoso'),(64,000000,'2023-10-23 10:08:52','::1','Usuario o contraseña invalido'),(65,000001,'2023-10-23 10:08:57','::1','Acceso exitoso'),(66,000000,'2023-10-23 11:11:17','::1','Usuario o contraseña invalido'),(67,000001,'2023-10-23 11:11:23','::1','Acceso exitoso');
/*!40000 ALTER TABLE `loglogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logsistema`
--

DROP TABLE IF EXISTS `logsistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logsistema` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `log` text NOT NULL,
  `fechalog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `operador` int(6) unsigned zerofill NOT NULL,
  `idcliente` int NOT NULL,
  `tipolog` int NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcliente` (`idcliente`),
  KEY `operador` (`operador`),
  KEY `fechalog` (`fechalog`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logsistema`
--

LOCK TABLES `logsistema` WRITE;
/*!40000 ALTER TABLE `logsistema` DISABLE KEYS */;
INSERT INTO `logsistema` VALUES (1,'Modificacion de los ajustes generales del SISTEMA','2022-11-25 15:56:38',000001,0,0,'ajustes(general)'),(2,'Modificacion de los ajustes generales del SISTEMA','2022-11-25 15:57:54',000001,0,0,'ajustes(general)'),(3,'Operador editado <b>#1 José Lugo Martín</b>','2022-11-30 17:22:46',000001,0,0,'operador'),(4,'Logo principal de sucursal modificada ID : 1','2022-11-30 17:41:34',000001,0,0,'Configuracion[sucursal]'),(5,'Logo de facturas y recibos modificada de la sucursal ID : 1','2022-11-30 17:41:38',000001,0,0,'Configuracion[sucursal]'),(6,'Logo principal de sucursal modificada ID : 1','2022-11-30 18:03:54',000001,0,0,'Configuracion[sucursal]'),(7,'Sucursal modificada ID : 1','2022-11-30 20:01:25',000001,0,0,'Configuracion[sucursal]'),(8,'Sucursal modificada ID : 1','2022-11-30 20:01:39',000001,0,0,'Configuracion[sucursal]'),(9,'Operador editado <b>#1 José Lugo Martín</b>','2022-12-13 17:12:32',000001,0,0,'operador'),(10,'Operador editado <b>#1 José Lugo Martín</b>','2022-12-13 17:16:43',000001,0,0,'operador'),(11,'Operador eliminado <b>#70 Elías Xool</b>','2022-12-25 21:24:50',000001,0,0,'operador'),(12,'Operador eliminado <b>#71 Manlio Torres</b>','2022-12-25 21:24:53',000001,0,0,'operador'),(13,'Operador editado <b>#1 José Lugo Martín</b>','2022-12-25 21:29:52',000001,0,0,'operador'),(14,'Operador editado <b>#000001 José Lugo Martín</b>','2022-12-25 23:20:42',000001,0,0,'operador'),(15,'Producto agregado al almacen por José Lugo Martín','2022-12-26 01:21:03',000001,0,0,'Tickets'),(16,'Producto agregado al almacen por José Lugo Martín','2022-12-26 01:26:53',000001,0,0,'Tickets'),(17,'Producto agregado al almacen por José Lugo Martín','2022-12-26 01:28:59',000001,0,0,'Tickets'),(18,'Producto agregado al almacen por José Lugo Martín','2022-12-26 01:29:31',000001,0,0,'Tickets'),(19,'Producto agregado al almacen por José Lugo Martín','2023-02-22 23:28:04',000001,0,0,'Almacen'),(20,'Charola editada ID: 000002','2023-02-23 00:26:51',000001,0,0,'Almacen'),(21,'Charola editada ID: 000002','2023-02-23 00:27:53',000001,0,0,'Almacen'),(22,'Charola editada ID: 000003','2023-02-23 00:28:19',000001,0,0,'Almacen'),(23,'Operador editado <b>#000001 José Lugo Martín</b>','2023-02-23 00:38:50',000001,0,0,'operador'),(24,'Operador editado <b>#000001 José Lugo Martín</b>','2023-02-23 00:39:05',000001,0,0,'operador'),(25,'Operador editado <b>#000001 José Lugo Martín</b>','2023-02-23 00:39:17',000001,0,0,'operador'),(26,'Proveedor agregado por José Lugo Martín','2023-02-23 01:40:22',000001,0,0,'Almacen'),(27,'Proveedor agregado por José Lugo Martín','2023-02-23 01:44:04',000001,0,0,'Almacen'),(28,'Proveedor eliminado ID: 000002','2023-02-23 01:53:16',000001,0,0,'Almacen'),(29,'Operador editado <b>#000001 José Lugo Martín</b>','2023-02-23 02:36:49',000001,0,0,'operador'),(30,'Operador editado <b>#000001 José Lugo Martín</b>','2023-02-23 02:37:02',000001,0,0,'operador'),(31,'Operador editado <b>#000001 José Lugo Martín</b>','2023-02-23 02:37:25',000001,0,0,'operador'),(32,'Charola eliminada ID: 000001','2023-02-23 02:59:51',000001,0,0,'Almacen'),(33,'Charola eliminada ID: 000002','2023-02-23 02:59:54',000001,0,0,'Almacen'),(34,'Charola editada ID: 000003','2023-02-23 03:00:07',000001,0,0,'Almacen'),(35,'Anteojo agregado por José Lugo Martín','2023-02-25 01:20:49',000001,0,0,'Almacen'),(36,'Anteojo agregado por José Lugo Martín','2023-02-25 01:23:10',000001,0,0,'Almacen'),(37,'Producto agregado al almacen por José Lugo Martín','2023-02-25 01:38:45',000001,0,0,'Almacen'),(38,'Anteojo agregado por José Lugo Martín','2023-02-25 01:40:03',000001,0,0,'Almacen'),(39,'Charola editada ID: 000006','2023-02-25 04:31:55',000001,0,0,'Almacen'),(40,'Anteojo editado ID: 000003','2023-02-25 18:33:22',000001,0,0,'Almacen'),(41,'Anteojo editado ID: 000002','2023-02-25 18:34:03',000001,0,0,'Almacen'),(42,'Anteojo editado ID: 000002','2023-02-25 18:34:46',000001,0,0,'Almacen'),(43,'Anteojo editado ID: 000002','2023-02-25 18:38:17',000001,0,0,'Almacen'),(44,'Anteojo editado ID: 000001','2023-02-25 18:38:34',000001,0,0,'Almacen'),(45,'Anteojo editado ID: 000004','2023-02-25 18:42:32',000001,0,0,'Almacen'),(46,'Anteojo editado ID: 000004','2023-02-25 18:42:43',000001,0,0,'Almacen'),(47,'Anteojo editado ID: 000003','2023-02-25 18:42:55',000001,0,0,'Almacen'),(48,'Anteojo editado ID: 000002','2023-02-25 18:43:04',000001,0,0,'Almacen'),(49,'Anteojo editado ID: 000002','2023-02-25 18:43:17',000001,0,0,'Almacen'),(50,'Anteojo editado ID: 000001','2023-02-25 18:43:46',000001,0,0,'Almacen'),(51,'Anteojo editado ID: 000001','2023-02-25 18:44:01',000001,0,0,'Almacen'),(52,'Anteojo editado ID: 000004','2023-02-25 18:44:26',000001,0,0,'Almacen'),(53,'Anteojo editado ID: 000003','2023-02-25 18:45:31',000001,0,0,'Almacen'),(54,'Anteojo eliminado ID: 000003','2023-02-25 19:02:57',000001,0,0,'Almacen'),(55,'Producto agregado al almacen por José Lugo Martín','2023-02-26 02:28:16',000001,0,0,'Almacen'),(56,'Anteojo agregado por José Lugo Martín','2023-02-26 02:28:33',000001,0,0,'Almacen'),(57,'Anteojo editado ID: 000005','2023-02-26 02:28:46',000001,0,0,'Almacen'),(58,'Charola eliminada ID: 000007','2023-02-26 02:30:33',000001,0,0,'Almacen'),(59,'Anteojo editado ID: 000004','2023-02-26 02:40:49',000001,0,0,'Almacen'),(60,'Anteojo editado ID: 000002','2023-02-26 02:58:52',000001,0,0,'Almacen'),(61,'Anteojo editado ID: 000004','2023-02-26 03:02:04',000001,0,0,'Almacen'),(62,'Charola eliminada ID: 000006','2023-02-26 03:02:17',000001,0,0,'Almacen'),(63,'Anteojo editado ID: 000002','2023-02-26 03:14:41',000001,0,0,'Almacen'),(64,'Anteojo editado ID: 000001','2023-02-26 03:15:00',000001,0,0,'Almacen'),(65,'Anteojo editado ID: 000002','2023-02-26 03:15:26',000001,0,0,'Almacen'),(66,'Anteojo editado ID: 000004','2023-02-26 03:15:32',000001,0,0,'Almacen'),(67,'Anteojo editado ID: 000001','2023-02-26 03:19:28',000001,0,0,'Almacen'),(68,'Anteojo editado ID: 000001','2023-02-26 03:19:52',000001,0,0,'Almacen'),(69,'Anteojo editado ID: 000001','2023-02-26 03:20:38',000001,0,0,'Almacen'),(70,'Charola eliminada ID: 000005','2023-02-26 03:20:47',000001,0,0,'Almacen'),(71,'Proveedor agregado por José Lugo Martín','2023-03-07 18:31:20',000001,0,0,'Almacen'),(72,'Proveedor eliminado ID: 000003','2023-03-07 18:31:36',000001,0,0,'Almacen'),(73,'Anteojo eliminado ID: 000001','2023-03-07 18:31:43',000001,0,0,'Almacen'),(74,'Anteojo editado ID: 000002','2023-03-07 18:31:57',000001,0,0,'Almacen'),(75,'Charola editada ID: 000003','2023-03-07 18:32:22',000001,0,0,'Almacen'),(76,'Charola editada ID: 000003','2023-03-07 18:32:31',000001,0,0,'Almacen'),(77,'Proveedor editada ID: 000001','2023-03-07 19:06:06',000001,0,0,'Almacen'),(78,'Proveedor editada ID: 000001','2023-03-07 19:06:12',000001,0,0,'Almacen'),(79,'Proveedor editada ID: 000001','2023-03-07 19:07:18',000001,0,0,'Almacen'),(80,'Operador editado <b>#000001 José Lugo Martín</b>','2023-03-07 19:51:32',000001,0,0,'operador'),(81,'Proveedor agregado por José Lugo Martín','2023-03-13 19:28:29',000001,0,0,'Almacen'),(82,'Proveedor editada ID: 000004','2023-03-13 19:28:44',000001,0,0,'Almacen'),(83,'Proveedor eliminado ID: 000004','2023-03-13 19:28:49',000001,0,0,'Almacen'),(84,'Nota agregado por José Lugo Martín','2023-03-13 22:35:46',000001,0,0,'Notas'),(85,'Nota agregado por José Lugo Martín','2023-03-31 23:50:08',000001,0,0,'Notas'),(86,'Anteojo editado ID: 000004','2023-03-31 23:54:01',000001,0,0,'Almacen'),(87,'Anteojo editado ID: 000004','2023-03-31 23:54:18',000001,0,0,'Almacen'),(88,'Anteojo editado ID: 000004','2023-03-31 23:54:38',000001,0,0,'Almacen'),(89,'Anteojo eliminado ID: 000004','2023-03-31 23:55:32',000001,0,0,'Almacen'),(90,'Nota agregado por José Lugo Martín','2023-04-08 23:19:43',000001,0,0,'Notas'),(91,'Anteojo eliminado ID: 000002','2023-05-02 20:29:48',000001,0,0,'Almacen'),(92,'Charola eliminada ID: 000003','2023-05-02 20:30:05',000001,0,0,'Almacen'),(93,'Producto agregado al almacen por José Lugo Martín','2023-05-02 20:37:16',000001,0,0,'Almacen'),(94,'Anteojo agregado por José Lugo Martín','2023-05-02 20:37:53',000001,0,0,'Almacen'),(95,'Anteojo eliminado ID: 000006','2023-05-02 20:47:05',000001,0,0,'Almacen'),(96,'Operador editado <b>#000001 José Lugo Martín</b>','2023-05-02 23:41:12',000001,0,0,'operador'),(97,'Operador editado <b>#000001 José Lugo Martín</b>','2023-05-02 23:42:15',000001,0,0,'operador'),(98,'Operador editado <b>#000001 José Lugo Martín</b>','2023-05-02 23:50:24',000001,0,0,'operador'),(99,'Operador editado <b>#000001 José Lugo Martín</b>','2023-05-03 23:58:35',000001,0,0,'operador'),(100,'Operador editado <b>#000001 José Lugo Martín</b>','2023-05-03 23:59:46',000001,0,0,'operador'),(101,'Producto agregado al almacen por José Lugo Martín','2023-05-04 00:09:50',000001,0,0,'Almacen'),(102,'Producto agregado al almacen por José Lugo Martín','2023-05-04 00:10:51',000001,0,0,'Almacen'),(103,'Producto agregado al almacen por José Lugo Martín','2023-05-04 00:11:59',000001,0,0,'Almacen'),(104,'Operador editado <b>#000001 José Lugo Martín</b>','2023-06-01 03:44:53',000001,0,0,'operador'),(105,'Operador editado <b>#000001 José Lugo Martín</b>','2023-06-01 03:44:57',000001,0,0,'operador'),(106,'Anteojo agregado por José Lugo Martín','2023-06-01 03:49:15',000001,0,0,'Almacen'),(107,'Modificacion de los ajustes generales del SISTEMA','2023-06-05 20:18:31',000001,0,0,'ajustes(general)'),(108,'Operador editado <b>#000001 José Lugo Martín</b>','2023-10-22 19:51:18',000001,0,0,'operador'),(109,'Sucursal modificada ID : 1','2023-10-22 19:58:12',000001,0,0,'Configuracion[sucursal]'),(110,'Operador editado <b>#000001 Admin Get Solutions</b>','2023-10-22 20:05:17',000001,0,0,'operador'),(111,'Operador editado <b>#000001 Admin Get Solutions</b>','2023-10-22 20:06:16',000001,0,0,'operador'),(112,'Modificacion de los ajustes generales del SISTEMA','2023-10-23 17:11:08',000001,0,0,'ajustes(general)');
/*!40000 ALTER TABLE `logsistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permiso` (
  `id_permiso` int NOT NULL AUTO_INCREMENT,
  `modulo` varchar(50) NOT NULL COMMENT 'Nombre del modulo al que hace referencia el permiso',
  `descripcion` varchar(50) NOT NULL COMMENT 'Descripcion del permiso',
  `url` varchar(255) NOT NULL,
  `padre` int NOT NULL DEFAULT '0' COMMENT 'Id del registro padre (permisoid de esta misma tabla',
  `imagen` varchar(45) NOT NULL COMMENT 'Nombre del archivo de imagen',
  `clase` varchar(45) NOT NULL COMMENT 'Nombre de la clase utilizada para esta opcion del menu, definida en la hoja de estilos.',
  `tipo` smallint NOT NULL DEFAULT '1' COMMENT '1-Menu; 2-Opcion de Form',
  `orden` int NOT NULL COMMENT 'Forma en que se ordenan las opciones cuando forman parte de un menu',
  `activo` tinyint NOT NULL DEFAULT '1' COMMENT '0-inactivo 1-activo 2-especial, 3 widget',
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,'Home','','',0,'','',2,0,1),(2,'Ajustes','Control de ajustes del sistema','Ajustes',0,'','fa fa-cogs',1,1,1),(4,'Permisos','Lista de permisos para usuarios','',2,'','',1,0,2),(5,'Personal','Control del personal al sistema','',2,'','',1,0,2),(6,'Base de datos','Control de la BD','',2,'','',1,0,2),(7,'Oficina','Control de las oficinas depende la zona','',2,'','',1,0,2),(8,'Logs','Control de log del sistema','',2,'','',1,0,2),(9,'Licencia','Licencia contratada del sistema','',2,'','',1,0,2),(10,'General','Datos generales de la empresa','',2,'','',1,0,2),(12,'pendiente','Control de widgets inicio','',0,'','',1,0,3);
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `activo` int NOT NULL COMMENT '0:activo 1: inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador',0),(2,'Programador',0);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_permiso`
--

DROP TABLE IF EXISTS `rol_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_permiso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idrol` int NOT NULL,
  `idpermiso` int NOT NULL,
  `tipopermiso` int NOT NULL,
  `estado` int NOT NULL COMMENT '0 activo 1 inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_permiso`
--

LOCK TABLES `rol_permiso` WRITE;
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;
INSERT INTO `rol_permiso` VALUES (1,1,1,2,0),(2,1,2,3,0),(3,1,3,3,0),(4,1,4,3,0),(5,1,5,3,0),(6,1,6,3,0),(7,1,7,2,0),(8,1,15,3,0),(9,1,16,3,0),(10,1,17,2,0);
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sucursal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sucursal` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `color_su` varchar(20) NOT NULL,
  `logo_principal` varchar(200) NOT NULL,
  `logo_facturas_recibos` varchar(200) NOT NULL,
  `rfc` varchar(600) NOT NULL,
  `alias` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (1,'Get All Solutions','C31A 473 Poligono 108','20.989522748557995,-89.5784546098264','9995303225','#FF6600','public/images/logos_sucursales/logo_sistema_sucursal_1.png','public/images/logos_sucursales/logo_factura_sucursal_1.png','','Desarrollo de Software');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcolumnas`
--

DROP TABLE IF EXISTS `tblcolumnas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcolumnas` (
  `col` varchar(50) NOT NULL,
  `orden` int NOT NULL,
  `visible` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcolumnas`
--

LOCK TABLES `tblcolumnas` WRITE;
/*!40000 ALTER TABLE `tblcolumnas` DISABLE KEYS */;
INSERT INTO `tblcolumnas` VALUES ('id',0,'on'),('nombre',1,'on'),('ip',2,'on'),('saldo',25,''),('ipap',17,''),('correo',24,''),('telefono',7,'on'),('movil',6,'on'),('mac',3,'on'),('instalado',14,'on'),('cedula',27,''),('codigo',29,''),('direccion',10,'on'),('plan',15,'on'),('pasarela',9,'on'),('pppuser',28,''),('nodo',8,'on'),('coordenadas',18,''),('emisor',26,''),('user_ubnt',30,''),('status',11,'on'),('total_cobrar',31,''),('dia_pago',5,'on'),('ultimo_vencimiento',19,''),('proximo_pago',12,'on'),('zona',16,'on'),('facturas_no_pagadas',23,''),('plan_voip',22,''),('direccion_principal',21,''),('ultimo_pago',13,'on'),('fecha_suspendido',20,''),('Netflix',32,''),('tipo_estrato',4,'');
/*!40000 ALTER TABLE `tblcolumnas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblconfiguration`
--

DROP TABLE IF EXISTS `tblconfiguration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblconfiguration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `setting` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `setting` (`setting`(32))
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblconfiguration`
--

LOCK TABLES `tblconfiguration` WRITE;
/*!40000 ALTER TABLE `tblconfiguration` DISABLE KEYS */;
INSERT INTO `tblconfiguration` VALUES (1,'nombre_empresa','Get All Solutions'),(2,'userlic','backup@getallsolutions.com.mx'),(3,'passlic','9db9d8b651e33f05ba8f373df81cc0581608155552'),(4,'clientes_sistema','25'),(5,'version_sistema','6'),(6,'tokenlic','g8NhFJF/WGp0k/BDzRdZeQ==::MUIEAMdFUiW4_U0f0e8bRHpWMx7FbdYVUpVFEEeCNU_H8tA9d1y7EAwos9ZLwtUOiYpVbtLBuaWLg7JmudF9mCDjYicncyilrZN2PcjkBGLnPvtZ-O4yw-KTi2eRiPkjlimwXEAvC5PxsdsZFgtcROnJd4tqYroc7_BfkM87wbexw20LAJV4Xqn_wnCWhGjqCEFP92W_ktrMj4jm2L33fm7Xr0032jkf5PMFmSt_81ho6dr04kzwTbDWpx8xn3LVS5jAWbHIhAvNgyqy1G9fPI_eAb1aQ3Vcfx3MOWufwf0txFAUrZSfT2n3CbOZNAa5pfkg1GmN0eLsOBbok3sgYbPU7ebwDDHVEkLjmQODXVa0Q2g8ChwmPsPrr2AIzRw5SCiG6OD0u-FliN28gA10RTghnJ_Qc9jPsKWm-i4NP7brX_XmV4tfbj76CfbSRbUoyxaEEx_bwoNzFBoCxIkqhzmuy9k='),(7,'correo_backup','NetMWPass2020sis@gmail.com'),(8,'correo_soporte','soporte@getallsolutions.com.mx'),(9,'correo_factura','facturas@getallsolutions.com.mx'),(10,'moneda','$'),(11,'ini_impuesto','16'),(12,'nfacturalegal','126109'),(13,'titulo_portal',':-:-: Acceso Clientes Netium :-:-:'),(14,'pestana','Lugares de pago'),(15,'html_personalizado','&lt;!DOCTYPE html&gt;\n&lt;html&gt;\n&lt;head&gt;\n	&lt;title&gt;&lt;/title&gt;\n&lt;/head&gt;\n&lt;body&gt;&lt;/body&gt;\n&lt;/html&gt;\n'),(16,'urltest','http://fast.com'),(17,'tamano_papel','A4'),(18,'orientacion_papel',''),(19,'currency','MXN'),(20,'correo_host','p3plcpnl0544.prod.phx3.secureserver.net'),(21,'correo_port','465'),(22,'correo_secure','ssl'),(23,'correo_aun','true'),(24,'correo_user','soporte@netium.com.mx'),(25,'correo_pass',''),(26,'zona_horaria','America/Mexico_City'),(27,'correo_firma','<html>\n<head>\n	<title></title>\n</head>\n<body>\n<p><img alt=\"\" src=\"https://drive.google.com/open?id=11fFP07tcT_vf5EquX9OyTmIosCv-0PxB\" /><img alt=\"\" src=\"http://netium.com.mx//img/firma-correo.jpg\" style=\"width: 650px; height: 150px;\" /></p>\n</body>\n</html>\n'),(28,'url_logo','http://172.29.1.1/admin/tools//img/logo-netium.png'),(29,'moneda_letra','Pesos Mexicanos'),(30,'ruc_empresa','SG'),(31,'direccion_empresa','C31A #473 x 28B y 30'),(32,'telefono_empresa','9995303225'),(33,'url_portal','http://app.netium.com.mx/cliente/login.php'),(34,'reconexion_cliente','30'),(35,'mora_cliente','0'),(36,'tamano_recibo','personalizado'),(37,'orientacion_recibo',''),(38,'optlegal','1'),(39,'npqr','2488'),(40,'marca_factura','on'),(41,'custom_tamano','80,200'),(42,'custom_recibo','100,135'),(43,'pdf_generado','on'),(44,'keyapigoogle','AIzaSyAwtUrf9EpyekCZU6gLEBzX5KKTtAlnM40'),(45,'send_pagado','on'),(46,'correo_notificacion','ad@dsad,asdsaq@sadas'),(47,'sms_numero','asd@asdda'),(48,'notificacion_nodo',''),(49,'revision','40'),(50,'correo_reporte','adsd@asdasda'),(51,'salida_reporte','<html><head>	<title></title></head><body><p><strong>Gracias por enviar la informaci&oacute;n de su pago. </strong></p><p>En un periodo no mayor a 1 &nbsp;hora, ser&aacute; revisado por nuestro personal contable, y en caso de estar correcta la informaci&oacute;n, el pago se abonar&aacute; a su cuenta en la plataforma correspondiente.</p><p>Saludos cordiales Tu Empresa.&nbsp;</p><p><span style=\"font-size:11px;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><strong>Horario de Atenci&oacute;n: Lunes a viernes de 9:30 a 14:00 horas y de 15:30 a 18:00 horas. S&aacute;bado de 9:00 a 14:00 horas.</strong></span></span></p></body></html>'),(52,'coempresa','4118'),(53,'valida_pago','on'),(54,'tipo_reconexion','1'),(55,'facturacontinua',''),(56,'afip_punto_venta','0003'),(57,'afip_crt_homo',''),(58,'afip_key_homo',''),(59,'afip_crt_prod',''),(60,'afip_key_prod',''),(61,'afip_homo',''),(62,'moneda_unidad','Céntimos'),(63,'send_recibo',''),(64,'imgloginadmin','login-bg-3.jpg'),(65,'imglogincliente','login-bg-15.jpg'),(66,'cron_pantalla','04:30'),(67,'cron_pago1','08:30'),(68,'cron_pago2','13:30'),(69,'cron_pago3','17:00'),(70,'cron_corte','02:30'),(71,'cron_factura','03:30'),(72,'cron_backup','11:55'),(73,'permiso_portal','a:12:{s:12:\"comprobantes\";s:2:\"on\";s:7:\"soporte\";s:2:\"on\";s:10:\"documentos\";s:2:\"on\";s:7:\"reporte\";s:2:\"on\";s:9:\"velocidad\";s:2:\"on\";s:7:\"trafico\";s:2:\"on\";s:6:\"banner\";s:2:\"on\";s:13:\"personalizado\";s:0:\"\";s:8:\"password\";s:2:\"on\";s:5:\"datos\";s:2:\"on\";s:9:\"autologin\";s:2:\"on\";s:14:\"widget_trafico\";s:2:\"on\";}'),(74,'newversion','42'),(75,'lastupdate','09/05/2021 07:00:06 am'),(76,'limite_mail','dia'),(77,'valor_limite_mail','1000'),(78,'contador_mail','0'),(79,'fecha_hora_mail','06/01/2021'),(80,'sms_suspendido',''),(81,'afip_csr_prod',''),(82,'telegram',''),(83,'afip_monotributo',''),(84,'afip_a5','on'),(85,'cron_comprime_trafico','0'),(86,'migrado','on'),(87,'vpnweb',''),(88,'vpnssh',''),(89,'tokenssh',''),(90,'mora_texto','Mora factura vencida'),(91,'openfactura_debug',''),(92,'openfactura_key',''),(93,'template_login','1'),(94,'template_portal','material'),(95,'template_color','blue'),(96,'onesignal',''),(97,'onesignalid',''),(98,'smart_url',''),(99,'smart_api',''),(100,'zendesk_correo',''),(101,'zendesk_dominio',''),(102,'zendesk_token',''),(103,'correo_autentificacion','0'),(104,'oauth_id',''),(105,'oauth_secret',''),(106,'oauth_token',''),(107,'sms_alpagar',''),(108,'openfactura_custom',''),(109,'openfactura_pdf_tamano','LETTER'),(110,'openfactura_rut_emisor',''),(111,'openfactura_giro_emisor',''),(112,'openfactura_actividad_emisor',''),(113,'openfactura_direccion_emisor',''),(114,'openfactura_comuna_emisor',''),(115,'openfactura_telefono_emisor',''),(116,'openfactura_razon_emisor',''),(117,'openfactura_siisucursal_emisor',''),(118,'wlogeado',''),(119,'reconexion_texto','Reconexión del servicio por Corte'),(120,'parametros_almacen','0;warning;0;danger;0;success'),(121,'enable_pso',''),(122,'parametros_almacen_accesorios','0;warning;0;danger;0;success'),(123,'weebhook','ord_2qUavgyUSZMNm9hyr');
/*!40000 ALTER TABLE `tblconfiguration` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-23 14:52:30
