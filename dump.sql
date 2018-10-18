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
  `ID_Funcionario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Ex_Centro_custo` varchar(6) NOT NULL,
  PRIMARY KEY (`ID_Funcionario`),
  KEY `Ex_Centro_custo` (`Ex_Centro_custo`),
  CONSTRAINT `Funcionario_ibfk_1` FOREIGN KEY (`Ex_Centro_custo`) REFERENCES `Setor` (`Centro_custo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Funcionario`
--

LOCK TABLES `Funcionario` WRITE;
/*!40000 ALTER TABLE `Funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Funcionario` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marcas`
--

LOCK TABLES `Marcas` WRITE;
/*!40000 ALTER TABLE `Marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Marcas` ENABLE KEYS */;
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
  `Nota_Nome` varchar(20) NOT NULL DEFAULT 'NULL',
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
  `Tipo` varchar(100) NOT NULL,
  `ID_Ex_Marca` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `Key_Serial` varchar(50) DEFAULT 'NULL',
  `Setor_Destino` varchar(6) NOT NULL,
  `Setor_Atual` varchar(6) NOT NULL,
  `ID_Ex_Funcionario` int(11) NOT NULL,
  PRIMARY KEY (`ID_Produto`),
  KEY `ID_Ex_Marca` (`ID_Ex_Marca`),
  KEY `Setor_Destino` (`Setor_Destino`),
  KEY `Setor_Atual` (`Setor_Atual`),
  KEY `ID_Ex_Funcionario` (`ID_Ex_Funcionario`),
  CONSTRAINT `Produto_ibfk_1` FOREIGN KEY (`ID_Ex_Marca`) REFERENCES `Marcas` (`ID_Marca`),
  CONSTRAINT `Produto_ibfk_2` FOREIGN KEY (`Setor_Destino`) REFERENCES `Setor` (`Centro_custo`),
  CONSTRAINT `Produto_ibfk_3` FOREIGN KEY (`Setor_Atual`) REFERENCES `Setor` (`Centro_custo`),
  CONSTRAINT `Produto_ibfk_4` FOREIGN KEY (`ID_Ex_Funcionario`) REFERENCES `Funcionario` (`ID_Funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produto`
--

LOCK TABLES `Produto` WRITE;
/*!40000 ALTER TABLE `Produto` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `Setor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-18 13:02:41
