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
-- Table structure for table `Empresa_Nota`
--

DROP TABLE IF EXISTS `Empresa_Nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Empresa_Nota` (
  `CNPJ` varchar(14) NOT NULL,
  `Empresa` varchar(100) NOT NULL,
  PRIMARY KEY (`CNPJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Empresa_Nota`
--

LOCK TABLES `Empresa_Nota` WRITE;
/*!40000 ALTER TABLE `Empresa_Nota` DISABLE KEYS */;
INSERT INTO `Empresa_Nota` VALUES ('12212121212121','teste'),('12312213123213','teste'),('12321313131313','teste empresa'),('21212121212121','teste'),('43432343423423','tttttttttt'),('44444443333333','teste'),('55555555555555','guilherme'),('89450934590439','teste');
/*!40000 ALTER TABLE `Empresa_Nota` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marcas`
--

LOCK TABLES `Marcas` WRITE;
/*!40000 ALTER TABLE `Marcas` DISABLE KEYS */;
INSERT INTO `Marcas` VALUES (1,'Lenovo'),(2,'Dell');
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
  `CNPJ_Empresa` varchar(14) NOT NULL,
  `Nota_Nome` varchar(20) NOT NULL,
  `Nota_PDF` mediumblob,
  PRIMARY KEY (`Nota_Fiscal`),
  KEY `CNPJ_Empresa` (`CNPJ_Empresa`),
  CONSTRAINT `Nota_Fiscal_ibfk_1` FOREIGN KEY (`CNPJ_Empresa`) REFERENCES `Empresa_Nota` (`CNPJ`)
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
  `Relacao_Destino` int(11) NOT NULL,
  `Setor_Destino` varchar(6) NOT NULL,
  `Relacao_Atual` int(11) NOT NULL,
  `Setor_Atual` varchar(6) NOT NULL,
  `Funcionario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Produto`),
  KEY `ID_Nota` (`ID_Nota`),
  KEY `ID_Ex_Modelo` (`ID_Ex_Modelo`),
  KEY `ID_Ex_Marca` (`ID_Ex_Marca`),
  KEY `Setor_Destino` (`Setor_Destino`),
  KEY `Relacao_Destino` (`Relacao_Destino`),
  KEY `Setor_Atual` (`Setor_Atual`),
  KEY `Relacao_Atual` (`Relacao_Atual`),
  CONSTRAINT `Produto_ibfk_1` FOREIGN KEY (`ID_Nota`) REFERENCES `Nota_Fiscal` (`Nota_Fiscal`),
  CONSTRAINT `Produto_ibfk_2` FOREIGN KEY (`ID_Ex_Modelo`) REFERENCES `Modelos` (`ID_Modelo`),
  CONSTRAINT `Produto_ibfk_3` FOREIGN KEY (`ID_Ex_Marca`) REFERENCES `Marcas` (`ID_Marca`),
  CONSTRAINT `Produto_ibfk_4` FOREIGN KEY (`Setor_Destino`) REFERENCES `Setor` (`Centro_custo`),
  CONSTRAINT `Produto_ibfk_5` FOREIGN KEY (`Relacao_Destino`) REFERENCES `Relacao_Setor` (`ID_Relacao`),
  CONSTRAINT `Produto_ibfk_6` FOREIGN KEY (`Setor_Atual`) REFERENCES `Setor` (`Centro_custo`),
  CONSTRAINT `Produto_ibfk_7` FOREIGN KEY (`Relacao_Atual`) REFERENCES `Relacao_Setor` (`ID_Relacao`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produto`
--

LOCK TABLES `Produto` WRITE;
/*!40000 ALTER TABLE `Produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `Produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Relacao_Setor`
--

DROP TABLE IF EXISTS `Relacao_Setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Relacao_Setor` (
  `ID_Relacao` int(11) NOT NULL AUTO_INCREMENT,
  `Relacao` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_Relacao`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Relacao_Setor`
--

LOCK TABLES `Relacao_Setor` WRITE;
/*!40000 ALTER TABLE `Relacao_Setor` DISABLE KEYS */;
INSERT INTO `Relacao_Setor` VALUES (1,'Administrativo'),(2,'Comercial'),(3,'Indireto'),(4,'Rateio'),(5,'Maquina 1'),(6,'Maquina 2'),(7,'Maquina 3'),(8,'Maquina 4');
/*!40000 ALTER TABLE `Relacao_Setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Setor`
--

DROP TABLE IF EXISTS `Setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Setor` (
  `Centro_custo` varchar(6) NOT NULL,
  `ID_Relacao` int(11) NOT NULL,
  `Setor` varchar(40) NOT NULL,
  PRIMARY KEY (`Centro_custo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Setor`
--

LOCK TABLES `Setor` WRITE;
/*!40000 ALTER TABLE `Setor` DISABLE KEYS */;
INSERT INTO `Setor` VALUES ('0001',1,'Presidncia / Assessoria'),('0010',1,'Assessoria Judiciaria'),('1110',1,'Departamento Financeiro'),('2210',1,'Custos e Orcamentos'),('3100',1,'Contabilidade geral'),('3120',1,'Faturamento'),('4100',1,'C.P.D'),('5100',1,'Departamento de Recursos Humanos / Admin'),('5120',1,'Servicos ao Pessoal'),('5130',1,'Treinamento'),('5150',1,'Seguranca / Portaria'),('5160',1,'Servico de segunranca e medias de tranpo'),('6100',2,'Departamento Comercial / Administracao d'),('6110',2,'Vendedores e Representantes'),('6200',2,'Frete s/ Vendas'),('7100',1,'Suprimentos / Compras'),('7120',3,'Almoxarifado Geral'),('7130',1,'Fazenda'),('7200',3,'Compras Aparas'),('7220',3,'Almoxarifado de materia prima'),('9100',3,'Producao'),('9110',4,'Producao'),('9111A',5,'Preparacao de Massa'),('9111B',5,'Maquina Continua'),('9111C',5,'Coating'),('9112A',6,'Preparacao de Massa'),('9112B',6,'Maquina Continua'),('9112C',6,'Coating'),('9113A',7,'Preparacao de Massa'),('9113B',7,'Maquina Continua'),('9113C',7,'Coating'),('9113D',7,'Size Press'),('9114A',8,'Preparacao de Massa'),('9114B',8,'Maquina Continua'),('9114C',8,'Coating'),('9114D',8,'Size Press');
/*!40000 ALTER TABLE `Setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_preencher_produto`
--

DROP TABLE IF EXISTS `vw_preencher_produto`;
/*!50001 DROP VIEW IF EXISTS `vw_preencher_produto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_preencher_produto` (
  `Nota` tinyint NOT NULL,
  `ID` tinyint NOT NULL,
  `ID_Modelo` tinyint NOT NULL,
  `Modelo` tinyint NOT NULL,
  `ID_Marca` tinyint NOT NULL,
  `Marca` tinyint NOT NULL,
  `Descricao` tinyint NOT NULL,
  `Chave` tinyint NOT NULL,
  `RA` tinyint NOT NULL,
  `RelacaoAtual` tinyint NOT NULL,
  `SA` tinyint NOT NULL,
  `Setor` tinyint NOT NULL,
  `Funcionario` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_preencher_tabela`
--

DROP TABLE IF EXISTS `vw_preencher_tabela`;
/*!50001 DROP VIEW IF EXISTS `vw_preencher_tabela`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_preencher_tabela` (
  `Nota` tinyint NOT NULL,
  `Chave` tinyint NOT NULL,
  `Data` tinyint NOT NULL,
  `CNPJ` tinyint NOT NULL,
  `Empresa` tinyint NOT NULL,
  `RD` tinyint NOT NULL,
  `RelacaoD` tinyint NOT NULL,
  `Centro_de_Custo` tinyint NOT NULL,
  `Setor` tinyint NOT NULL,
  `Funcionario` tinyint NOT NULL
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
  `CNPJ` tinyint NOT NULL,
  `Empresa` tinyint NOT NULL,
  `Setor` tinyint NOT NULL,
  `Modelo` tinyint NOT NULL,
  `Marca` tinyint NOT NULL,
  `Descricao` tinyint NOT NULL,
  `Relacao` tinyint NOT NULL,
  `RD` tinyint NOT NULL,
  `SD` tinyint NOT NULL,
  `RA` tinyint NOT NULL,
  `SA` tinyint NOT NULL,
  `Funcionario` tinyint NOT NULL,
  `PDF` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_tabela_view`
--

DROP TABLE IF EXISTS `vw_tabela_view`;
/*!50001 DROP VIEW IF EXISTS `vw_tabela_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_tabela_view` (
  `NV` tinyint NOT NULL,
  `Setor` tinyint NOT NULL,
  `Modelo` tinyint NOT NULL,
  `Marca` tinyint NOT NULL,
  `Descricao` tinyint NOT NULL,
  `RA` tinyint NOT NULL,
  `Key` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_preencher_produto`
--

/*!50001 DROP TABLE IF EXISTS `vw_preencher_produto`*/;
/*!50001 DROP VIEW IF EXISTS `vw_preencher_produto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_preencher_produto` AS select `Produto`.`ID_Nota` AS `Nota`,`Produto`.`ID_Produto` AS `ID`,`Produto`.`ID_Ex_Modelo` AS `ID_Modelo`,`Modelos`.`Modelo` AS `Modelo`,`Produto`.`ID_Ex_Marca` AS `ID_Marca`,`Marcas`.`Marca` AS `Marca`,`Produto`.`Descricao` AS `Descricao`,`Produto`.`Key_Serial` AS `Chave`,`Produto`.`Relacao_Atual` AS `RA`,`Relacao_Setor`.`Relacao` AS `RelacaoAtual`,`Produto`.`Setor_Atual` AS `SA`,`Setor`.`Setor` AS `Setor`,`Produto`.`Funcionario` AS `Funcionario` from ((((`Produto` join `Setor` on((`Produto`.`Setor_Atual` = `Setor`.`Centro_custo`))) join `Relacao_Setor` on((`Produto`.`Relacao_Atual` = `Relacao_Setor`.`ID_Relacao`))) join `Modelos` on((`Produto`.`ID_Ex_Modelo` = `Modelos`.`ID_Modelo`))) join `Marcas` on((`Produto`.`ID_Ex_Marca` = `Marcas`.`ID_Marca`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_preencher_tabela`
--

/*!50001 DROP TABLE IF EXISTS `vw_preencher_tabela`*/;
/*!50001 DROP VIEW IF EXISTS `vw_preencher_tabela`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_preencher_tabela` AS select `Nota_Fiscal`.`Nota_Fiscal` AS `Nota`,`Nota_Fiscal`.`Chave_Acesso` AS `Chave`,`Nota_Fiscal`.`Emissao` AS `Data`,`Nota_Fiscal`.`CNPJ_Empresa` AS `CNPJ`,`Empresa_Nota`.`Empresa` AS `Empresa`,`Produto`.`Relacao_Destino` AS `RD`,`Relacao_Setor`.`Relacao` AS `RelacaoD`,`Setor`.`Centro_custo` AS `Centro_de_Custo`,`Setor`.`Setor` AS `Setor`,`Produto`.`Funcionario` AS `Funcionario` from ((((`Nota_Fiscal` join `Empresa_Nota` on((`Nota_Fiscal`.`CNPJ_Empresa` = `Empresa_Nota`.`CNPJ`))) join `Produto` on((`Nota_Fiscal`.`Nota_Fiscal` = `Produto`.`ID_Nota`))) join `Relacao_Setor` on((`Relacao_Setor`.`ID_Relacao` = `Produto`.`Relacao_Destino`))) join `Setor` on((`Setor`.`Centro_custo` = `Produto`.`Setor_Destino`))) */;
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
/*!50001 VIEW `vw_tabela_produtos` AS select `Produto`.`ID_Produto` AS `ID_Produto`,`Produto`.`ID_Nota` AS `Nota`,`Nota_Fiscal`.`Emissao` AS `Data`,`Nota_Fiscal`.`Chave_Acesso` AS `Chave`,`Empresa_Nota`.`CNPJ` AS `CNPJ`,`Empresa_Nota`.`Empresa` AS `Empresa`,`Setor`.`Setor` AS `Setor`,`Modelos`.`Modelo` AS `Modelo`,`Marcas`.`Marca` AS `Marca`,`Produto`.`Descricao` AS `Descricao`,`Relacao_Setor`.`Relacao` AS `Relacao`,`Produto`.`Relacao_Destino` AS `RD`,`Produto`.`Setor_Destino` AS `SD`,`Produto`.`Relacao_Atual` AS `RA`,`Produto`.`Setor_Atual` AS `SA`,`Produto`.`Funcionario` AS `Funcionario`,`Nota_Fiscal`.`Nota_PDF` AS `PDF` from ((((((`Produto` join `Modelos` on((`Produto`.`ID_Ex_Modelo` = `Modelos`.`ID_Modelo`))) join `Marcas` on((`Produto`.`ID_Ex_Marca` = `Marcas`.`ID_Marca`))) join `Setor` on((`Produto`.`Setor_Destino` = `Setor`.`Centro_custo`))) join `Nota_Fiscal` on((`Nota_Fiscal`.`Nota_Fiscal` = `Produto`.`ID_Nota`))) join `Relacao_Setor` on((`Produto`.`Relacao_Destino` = `Relacao_Setor`.`ID_Relacao`))) join `Empresa_Nota` on((`Nota_Fiscal`.`CNPJ_Empresa` = `Empresa_Nota`.`CNPJ`))) group by `Produto`.`ID_Nota` order by `Produto`.`ID_Produto` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_tabela_view`
--

/*!50001 DROP TABLE IF EXISTS `vw_tabela_view`*/;
/*!50001 DROP VIEW IF EXISTS `vw_tabela_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_tabela_view` AS select `Produto`.`ID_Nota` AS `NV`,`Setor`.`Setor` AS `Setor`,`Modelos`.`Modelo` AS `Modelo`,`Marcas`.`Marca` AS `Marca`,`Produto`.`Descricao` AS `Descricao`,`Produto`.`Relacao_Atual` AS `RA`,`Produto`.`Key_Serial` AS `Key` from (((((`Produto` join `Modelos` on((`Produto`.`ID_Ex_Modelo` = `Modelos`.`ID_Modelo`))) join `Marcas` on((`Produto`.`ID_Ex_Marca` = `Marcas`.`ID_Marca`))) join `Setor` on((`Produto`.`Setor_Atual` = `Setor`.`Centro_custo`))) join `Nota_Fiscal` on((`Nota_Fiscal`.`Nota_Fiscal` = `Produto`.`ID_Nota`))) join `Relacao_Setor` on((`Produto`.`Relacao_Destino` = `Relacao_Setor`.`ID_Relacao`))) */;
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

-- Dump completed on 2018-11-06 11:15:39
