-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2023 às 22:45
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
-- Estrutura para tabela `tbcadapio`
--

CREATE TABLE `tbcadapio` (
  `idcardapio` varchar(50) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `precoUnita` decimal(3,2) NOT NULL,
  `descProduto` varchar(50) NOT NULL,
  `imgProduto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbitens`
--

CREATE TABLE `tbitens` (
  `idItens` int(50) NOT NULL,
  `qnt_Itens` int(30) NOT NULL,
  `precoUnita` decimal(3,0) NOT NULL,
  `idcardapio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idpedido` int(11) NOT NULL,
  `qntespetos` int(11) DEFAULT NULL,
  `qntbebidas` int(11) DEFAULT NULL,
  `qntsobremesas` int(11) DEFAULT NULL,
  `totalpedidos` decimal(5,2) DEFAULT NULL,
  `datapedidos` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cliNumero` varchar(14) DEFAULT NULL,
  `cliPagamento` varchar(100) DEFAULT NULL,
  `idcardapio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbcadapio`
--
ALTER TABLE `tbcadapio`
  ADD PRIMARY KEY (`idcardapio`);

--
-- Índices de tabela `tbitens`
--
ALTER TABLE `tbitens`
  ADD PRIMARY KEY (`idItens`),
  ADD UNIQUE KEY `idcardapio` (`idcardapio`);

--
-- Índices de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD UNIQUE KEY `idcardapio` (`idcardapio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
