-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/11/2023 às 21:06
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdrestaurante`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbbebidas`
--

CREATE TABLE `tbbebidas` (
  `idbebidas` int(11) NOT NULL,
  `nomebebidas` varchar(20) NOT NULL,
  `precUnitbebidas` decimal(3,2) NOT NULL,
  `descbebidas` text NOT NULL,
  `imgbebidas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbbebidas`
--

INSERT INTO `tbbebidas` (`idbebidas`, `nomebebidas`, `precUnitbebidas`, `descbebidas`, `imgbebidas`) VALUES
(5, 'Refrigerante', 4.00, '', 'bebida-refri.png'),
(6, 'Suco Natural', 5.00, '', 'bebida-suco.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbespetos`
--

CREATE TABLE `tbespetos` (
  `idespetos` int(11) NOT NULL,
  `nomeespetos` varchar(20) NOT NULL,
  `precUnitespetos` decimal(3,2) NOT NULL,
  `descespetos` text NOT NULL,
  `imgespetos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela De Espetos';

--
-- Despejando dados para a tabela `tbespetos`
--

INSERT INTO `tbespetos` (`idespetos`, `nomeespetos`, `precUnitespetos`, `descespetos`, `imgespetos`) VALUES
(1, 'Espeto de Frango', 9.99, '', 'espeto-frango.png'),
(2, 'Espeto de Carne', 9.99, '', 'espeto-carne.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idpedido` int(11) NOT NULL,
  `idespetos` int(11) DEFAULT NULL,
  `idbebidas` int(11) DEFAULT NULL,
  `idsobremesas` int(11) DEFAULT NULL,
  `qntespetos` int(11) DEFAULT NULL,
  `qntbebidas` int(11) DEFAULT NULL,
  `qntsobremesas` int(11) DEFAULT NULL,
  `totalpedidos` decimal(5,2) DEFAULT NULL,
  `datapedidos` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cliNumero` varchar(14) DEFAULT NULL,
  `cliPagamento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbsobremesas`
--

CREATE TABLE `tbsobremesas` (
  `idsobremesas` int(11) NOT NULL,
  `nomesobremesas` varchar(20) NOT NULL,
  `precUnitsobremesas` decimal(3,2) NOT NULL,
  `descsobremesas` text DEFAULT NULL,
  `imgsobremesas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbsobremesas`
--

INSERT INTO `tbsobremesas` (`idsobremesas`, `nomesobremesas`, `precUnitsobremesas`, `descsobremesas`, `imgsobremesas`) VALUES
(3, 'Bolo de Chocolate', 8.00, NULL, 'sobremesa-bolo.png'),
(4, 'Pudim', 9.99, NULL, 'sobremesa-pudim.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbbebidas`
--
ALTER TABLE `tbbebidas`
  ADD PRIMARY KEY (`idbebidas`);

--
-- Índices de tabela `tbespetos`
--
ALTER TABLE `tbespetos`
  ADD PRIMARY KEY (`idespetos`);

--
-- Índices de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD UNIQUE KEY `idespetos` (`idespetos`),
  ADD UNIQUE KEY `idbebidas` (`idbebidas`),
  ADD UNIQUE KEY `idsobremesas` (`idsobremesas`);

--
-- Índices de tabela `tbsobremesas`
--
ALTER TABLE `tbsobremesas`
  ADD PRIMARY KEY (`idsobremesas`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD CONSTRAINT `tbpedido_ibfk_1` FOREIGN KEY (`idsobremesas`) REFERENCES `tbsobremesas` (`idsobremesas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpedido_ibfk_2` FOREIGN KEY (`idespetos`) REFERENCES `tbespetos` (`idespetos`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpedido_ibfk_3` FOREIGN KEY (`idbebidas`) REFERENCES `tbbebidas` (`idbebidas`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
