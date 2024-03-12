-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12/03/2024 às 15:33
-- Versão do servidor: 8.0.35-0ubuntu0.22.04.1
-- Versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `BDBandas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Bandas`
--

CREATE TABLE `Bandas` (
  `id` int NOT NULL,
  `nome` varchar(30) NOT NULL,
  `estilo` varchar(30) NOT NULL,
  `anoCriacao` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `Bandas`
--

INSERT INTO `Bandas` (`id`, `nome`, `estilo`, `anoCriacao`) VALUES
(1, 'u45u', 'gd', 2045);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Musicos`
--

CREATE TABLE `Musicos` (
  `id` int NOT NULL,
  `nome` varchar(40) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  `id_banda` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Bandas`
--
ALTER TABLE `Bandas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Musicos`
--
ALTER TABLE `Musicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bandas` (`id_banda`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Bandas`
--
ALTER TABLE `Bandas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `Musicos`
--
ALTER TABLE `Musicos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `Musicos`
--
ALTER TABLE `Musicos`
  ADD CONSTRAINT `fk_bandas` FOREIGN KEY (`id_banda`) REFERENCES `Bandas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
