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
-- Table structure for table `Funcionario`
--

DROP TABLE IF EXISTS `Funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Funcionario` (
  `Chapa` int(9) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Setor_ID_Externo` int(2) NOT NULL,
  PRIMARY KEY (`Chapa`),
  KEY `Setor_ID_Externo` (`Setor_ID_Externo`),
  CONSTRAINT `Funcionario_ibfk_1` FOREIGN KEY (`Setor_ID_Externo`) REFERENCES `Setor` (`Setor_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Maquina`
--

DROP TABLE IF EXISTS `Maquina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Maquina` (
  `Maquina_Serial` varchar(44) NOT NULL,
  `ID_Marca_Ex` int(11) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `Nota_Fiscal_Ex` varchar(44) NOT NULL,
  `ID_Setor_Ex` int(2) NOT NULL,
  `Chapa_Func_Ex` int(9) NOT NULL,
  PRIMARY KEY (`Maquina_Serial`),
  KEY `ID_Marca_Ex` (`ID_Marca_Ex`),
  KEY `Nota_Fiscal_Ex` (`Nota_Fiscal_Ex`),
  KEY `ID_Setor_Ex` (`ID_Setor_Ex`),
  KEY `Chapa_Func_Ex` (`Chapa_Func_Ex`),
  CONSTRAINT `Maquina_ibfk_1` FOREIGN KEY (`ID_Marca_Ex`) REFERENCES `Marca_Maquina` (`ID_Marca`),
  CONSTRAINT `Maquina_ibfk_2` FOREIGN KEY (`Nota_Fiscal_Ex`) REFERENCES `Nota_Fiscal` (`Nota_Fiscal`),
  CONSTRAINT `Maquina_ibfk_3` FOREIGN KEY (`ID_Setor_Ex`) REFERENCES `Setor` (`Setor_ID`),
  CONSTRAINT `Maquina_ibfk_4` FOREIGN KEY (`Chapa_Func_Ex`) REFERENCES `Funcionario` (`Chapa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Marca_Maquina`
--

DROP TABLE IF EXISTS `Marca_Maquina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Marca_Maquina` (
  `ID_Marca` int(11) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Marca`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Nota_Fiscal`
--

DROP TABLE IF EXISTS `Nota_Fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Nota_Fiscal` (
  `Nota_Fiscal` varchar(44) NOT NULL,
  `Chave_Acesso` varchar(44) NOT NULL,
  `Emissao` date NOT NULL,
  `Empresa` varchar(100) NOT NULL,
  `Nota_Nome` varchar(50) NOT NULL DEFAULT 'NULL',
  `Nota_PDF` mediumblob,
  PRIMARY KEY (`Nota_Fiscal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Setor`
--

DROP TABLE IF EXISTS `Setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Setor` (
  `Setor_ID` int(2) NOT NULL AUTO_INCREMENT,
  `Setor` varchar(40) NOT NULL,
  PRIMARY KEY (`Setor_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Software_Microsoft`
--

DROP TABLE IF EXISTS `Software_Microsoft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Software_Microsoft` (
  `Serial_S` varchar(25) DEFAULT 'NULL',
  `ID_Modelo_Ex` int(11) NOT NULL,
  `Nota_Fiscal_Ex` varchar(44) NOT NULL,
  `ID_Setor_Ex` int(2) NOT NULL,
  `Chapa_Func_Ex` int(9) NOT NULL,
  KEY `ID_Modelo_Ex` (`ID_Modelo_Ex`),
  KEY `Nota_Fiscal_Ex` (`Nota_Fiscal_Ex`),
  KEY `ID_Setor_Ex` (`ID_Setor_Ex`),
  KEY `Chapa_Func_Ex` (`Chapa_Func_Ex`),
  CONSTRAINT `Software_Microsoft_ibfk_1` FOREIGN KEY (`ID_Modelo_Ex`) REFERENCES `Software_Microsoft_Modelos` (`ID_Modelo`),
  CONSTRAINT `Software_Microsoft_ibfk_2` FOREIGN KEY (`Nota_Fiscal_Ex`) REFERENCES `Nota_Fiscal` (`Nota_Fiscal`),
  CONSTRAINT `Software_Microsoft_ibfk_3` FOREIGN KEY (`ID_Setor_Ex`) REFERENCES `Setor` (`Setor_ID`),
  CONSTRAINT `Software_Microsoft_ibfk_4` FOREIGN KEY (`Chapa_Func_Ex`) REFERENCES `Funcionario` (`Chapa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Software_Microsoft_Modelos`
--

DROP TABLE IF EXISTS `Software_Microsoft_Modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Software_Microsoft_Modelos` (
  `ID_Modelo` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Tipo_Ex` int(11) NOT NULL,
  `Versao` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Modelo`),
  KEY `ID_Tipo_Ex` (`ID_Tipo_Ex`),
  CONSTRAINT `Software_Microsoft_Modelos_ibfk_1` FOREIGN KEY (`ID_Tipo_Ex`) REFERENCES `Tipos_Sistemas` (`ID_Tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Tipos_Sistemas`
--

DROP TABLE IF EXISTS `Tipos_Sistemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipos_Sistemas` (
  `ID_Tipo` int(11) NOT NULL AUTO_INCREMENT,
  `Sistema` varchar(44) NOT NULL,
  PRIMARY KEY (`ID_Tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `vw_marca_arrumada`
--

DROP TABLE IF EXISTS `vw_marca_arrumada`;
/*!50001 DROP VIEW IF EXISTS `vw_marca_arrumada`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_marca_arrumada` (
  `ID_Marca` tinyint NOT NULL,
  `Marca` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_software`
--

DROP TABLE IF EXISTS `vw_software`;
/*!50001 DROP VIEW IF EXISTS `vw_software`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_software` (
  `Nota` tinyint NOT NULL,
  `Versao` tinyint NOT NULL,
  `Tipo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_marca_arrumada`
--

/*!50001 DROP TABLE IF EXISTS `vw_marca_arrumada`*/;
/*!50001 DROP VIEW IF EXISTS `vw_marca_arrumada`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_marca_arrumada` AS select `Marca_Maquina`.`ID_Marca` AS `ID_Marca`,`Marca_Maquina`.`Marca` AS `Marca` from `Marca_Maquina` order by `Marca_Maquina`.`Marca` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_software`
--

/*!50001 DROP TABLE IF EXISTS `vw_software`*/;
/*!50001 DROP VIEW IF EXISTS `vw_software`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_software` AS select `Nota_Fiscal`.`Nota_Fiscal` AS `Nota`,`Software_Microsoft_Modelos`.`Versao` AS `Versao`,`Tipos_Sistemas`.`Sistema` AS `Tipo` from (((`Nota_Fiscal` join `Software_Microsoft` on((`Software_Microsoft`.`Nota_Fiscal_Ex` = `Nota_Fiscal`.`Nota_Fiscal`))) join `Software_Microsoft_Modelos` on((`Software_Microsoft`.`ID_Modelo_Ex` = `Software_Microsoft_Modelos`.`ID_Modelo`))) join `Tipos_Sistemas` on((`Software_Microsoft_Modelos`.`ID_Tipo_Ex` = `Tipos_Sistemas`.`ID_Tipo`))) where (not(`Nota_Fiscal`.`Nota_Fiscal` in (select `Maquina`.`Nota_Fiscal_Ex` from `Maquina`))) */;
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

-- Dump completed on 2018-10-11 13:11:02
