-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Maquinas_Ramenzoni
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

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
-- Table structure for table `Marcas`
--

DROP TABLE IF EXISTS `Marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Marcas` (
  `ID_Marca` int(11) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Marca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marcas`
--

LOCK TABLES `Marcas` WRITE;
/*!40000 ALTER TABLE `Marcas` DISABLE KEYS */;
INSERT INTO `Marcas` VALUES (1,'Lenovo');
/*!40000 ALTER TABLE `Marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Modelos`
--

DROP TABLE IF EXISTS `Modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Modelos` (
  `ID_Modelo` int(11) NOT NULL AUTO_INCREMENT,
  `Modelo` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_Modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Modelos`
--

LOCK TABLES `Modelos` WRITE;
/*!40000 ALTER TABLE `Modelos` DISABLE KEYS */;
INSERT INTO `Modelos` VALUES (1,'Software'),(2,'Desktop'),(3,'Perifericos'),(4,'Monitor'),(5,'Impressora'),(6,'Server'),(7,'Notebook');
/*!40000 ALTER TABLE `Modelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nota_Fiscal`
--

DROP TABLE IF EXISTS `Nota_Fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Nota_Fiscal` (
  `Nota_Fiscal` varchar(9) NOT NULL,
  `Chave_Acesso` varchar(44) NOT NULL,
  `Emissao` date NOT NULL,
  `Empresa` varchar(140) NOT NULL,
  `Nota_Nome` varchar(20) NOT NULL,
  `Nota_PDF` mediumblob,
  PRIMARY KEY (`Nota_Fiscal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nota_Fiscal`
--

LOCK TABLES `Nota_Fiscal` WRITE;
/*!40000 ALTER TABLE `Nota_Fiscal` DISABLE KEYS */;
/*!40000 ALTER TABLE `Nota_Fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Produto`
--

DROP TABLE IF EXISTS `Produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Produto` (
  `ID_Produto` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Nota` varchar(44) NOT NULL,
  `ID_Ex_Modelo` int(11) NOT NULL,
  `ID_Ex_Marca` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `Key_Serial` varchar(50) DEFAULT NULL,
  `Setor_Destino` varchar(6) NOT NULL,
  `Setor_Atual` varchar(6) NOT NULL,
  `Funcionario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Produto`),
  KEY `ID_Nota` (`ID_Nota`),
  KEY `ID_Ex_Modelo` (`ID_Ex_Modelo`),
  KEY `ID_Ex_Marca` (`ID_Ex_Marca`),
  KEY `Setor_Destino` (`Setor_Destino`),
  KEY `Setor_Atual` (`Setor_Atual`),
  CONSTRAINT `Produto_ibfk_1` FOREIGN KEY (`ID_Nota`) REFERENCES `Nota_Fiscal` (`Nota_Fiscal`),
  CONSTRAINT `Produto_ibfk_2` FOREIGN KEY (`ID_Ex_Modelo`) REFERENCES `Modelos` (`ID_Modelo`),
  CONSTRAINT `Produto_ibfk_3` FOREIGN KEY (`ID_Ex_Marca`) REFERENCES `Marcas` (`ID_Marca`),
  CONSTRAINT `Produto_ibfk_4` FOREIGN KEY (`Setor_Destino`) REFERENCES `Setor` (`Centro_custo`),
  CONSTRAINT `Produto_ibfk_5` FOREIGN KEY (`Setor_Atual`) REFERENCES `Setor` (`Centro_custo`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produto`
--

LOCK TABLES `Produto` WRITE;
/*!40000 ALTER TABLE `Produto` DISABLE KEYS */;
INSERT INTO `Produto` VALUES (15,'123123173',1,1,'teste','','a4100','a4100','teste'),(16,'123123173',2,1,'teste','','a4100','a4100','teste'),(22,'899808888',6,1,'teste','','a4100','a4100','teste'),(23,'123454322',1,1,'teste','','t1111','t1111','teste');
/*!40000 ALTER TABLE `Produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Setor`
--

DROP TABLE IF EXISTS `Setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Setor` (
  `Centro_custo` varchar(6) NOT NULL,
  `Setor` varchar(40) NOT NULL,
  PRIMARY KEY (`Centro_custo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Setor`
--

LOCK TABLES `Setor` WRITE;
/*!40000 ALTER TABLE `Setor` DISABLE KEYS */;
INSERT INTO `Setor` VALUES ('a4100','CPD'),('t1111','contabilidade');
/*!40000 ALTER TABLE `Setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_notas`
--

DROP TABLE IF EXISTS `vw_notas`;
/*!50001 DROP VIEW IF EXISTS `vw_notas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_notas` (
  `Nota` tinyint NOT NULL,
  `Chave` tinyint NOT NULL,
  `Empresa` tinyint NOT NULL,
  `Data` tinyint NOT NULL,
  `Setor` tinyint NOT NULL,
  `PDF` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_tabela_produtos`
--

DROP TABLE IF EXISTS `vw_tabela_produtos`;
/*!50001 DROP VIEW IF EXISTS `vw_tabela_produtos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_tabela_produtos` (
  `ID_Produto` tinyint NOT NULL,
  `Nota` tinyint NOT NULL,
  `Data` tinyint NOT NULL,
  `Chave` tinyint NOT NULL,
  `Empresa` tinyint NOT NULL,
  `Setor` tinyint NOT NULL,
  `Modelo` tinyint NOT NULL,
  `Marca` tinyint NOT NULL,
  `Descricao` tinyint NOT NULL,
  `SD` tinyint NOT NULL,
  `SA` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_notas`
--

/*!50001 DROP TABLE IF EXISTS `vw_notas`*/;
/*!50001 DROP VIEW IF EXISTS `vw_notas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_notas` AS select distinct `Nota_Fiscal`.`Nota_Fiscal` AS `Nota`,`Nota_Fiscal`.`Chave_Acesso` AS `Chave`,`Nota_Fiscal`.`Empresa` AS `Empresa`,`Nota_Fiscal`.`Emissao` AS `Data`,`Setor`.`Setor` AS `Setor`,`Nota_Fiscal`.`Nota_PDF` AS `PDF` from ((`Nota_Fiscal` join `Produto` on((`Nota_Fiscal`.`Nota_Fiscal` = `Produto`.`ID_Nota`))) join `Setor` on((`Produto`.`Setor_Atual` = `Setor`.`Centro_custo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_tabela_produtos`
--

/*!50001 DROP TABLE IF EXISTS `vw_tabela_produtos`*/;
/*!50001 DROP VIEW IF EXISTS `vw_tabela_produtos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_tabela_produtos` AS select `Produto`.`ID_Produto` AS `ID_Produto`,`Produto`.`ID_Nota` AS `Nota`,`Nota_Fiscal`.`Emissao` AS `Data`,`Nota_Fiscal`.`Chave_Acesso` AS `Chave`,`Nota_Fiscal`.`Empresa` AS `Empresa`,`Setor`.`Setor` AS `Setor`,`Modelos`.`Modelo` AS `Modelo`,`Marcas`.`Marca` AS `Marca`,`Produto`.`Descricao` AS `Descricao`,`Produto`.`Setor_Destino` AS `SD`,`Produto`.`Setor_Atual` AS `SA` from ((((`Produto` join `Modelos` on((`Produto`.`ID_Ex_Modelo` = `Modelos`.`ID_Modelo`))) join `Marcas` on((`Produto`.`ID_Ex_Marca` = `Marcas`.`ID_Marca`))) join `Setor` on((`Produto`.`Setor_Atual` = `Setor`.`Centro_custo`))) join `Nota_Fiscal` on((`Nota_Fiscal`.`Nota_Fiscal` = `Produto`.`ID_Nota`))) group by `Produto`.`ID_Nota` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-21 22:33:29
