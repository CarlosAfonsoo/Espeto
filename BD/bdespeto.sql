-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/12/2023 às 00:46
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
-- Banco de dados: `bdespeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idPedido` int(50) NOT NULL,
  `idProdt` int(50) NOT NULL,
  `prcTotal` decimal(3,0) NOT NULL,
  `nomeCli` varchar(50) NOT NULL,
  `Pg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprodutos`
--

CREATE TABLE `tbprodutos` (
  `idProdt` int(50) NOT NULL,
  `nomeProdt` varchar(50) NOT NULL,
  `prcUnit` decimal(3,0) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbprodutos`
--

INSERT INTO `tbprodutos` (`idProdt`, `nomeProdt`, `prcUnit`, `img`) VALUES
(1, 'Espeto de Carne', 8, './imgs/espeto-carne.png'),
(2, 'Espeto de Frango', 4, './imgs/espeto-frango.png'),
(3, 'Espeto de Misto', 12, './imgs/espetoMisto.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD UNIQUE KEY `idProdt` (`idProdt`) USING BTREE;

--
-- Índices de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD PRIMARY KEY (`idProdt`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD CONSTRAINT `tbpedido_ibfk_1` FOREIGN KEY (`idProdt`) REFERENCES `tbprodutos` (`idProdt`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
