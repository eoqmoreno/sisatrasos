-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08/01/2018 às 06:42
-- Versão do servidor: 10.1.28-MariaDB
-- Versão do PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemaatraso`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `endereco`, `telefone`, `cpf`, `rg`, `usuario`, `senha`) VALUES
(22, '', '', '', '', '', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `nome` varchar(200) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `rg` varchar(30) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `telaluno` varchar(15) DEFAULT NULL,
  `nomeResponsavel` varchar(255) NOT NULL,
  `telresponsavel` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `numeroSige` varchar(60) NOT NULL,
  `qtdAtraso` int(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `apontador`
--

CREATE TABLE `apontador` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atraso`
--

CREATE TABLE `atraso` (
  `id` int(11) NOT NULL,
  `data` varchar(100) NOT NULL,
  `horario` varchar(110) NOT NULL,
  `numeroSige` varchar(100) NOT NULL,
  `antigo` int(11) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `motivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reuniao`
--

CREATE TABLE `reuniao` (
  `id` int(11) NOT NULL,
  `data` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `numeroSige` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `serie` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `apontador`
--
ALTER TABLE `apontador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `atraso`
--
ALTER TABLE `atraso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `reuniao`
--
ALTER TABLE `reuniao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `apontador`
--
ALTER TABLE `apontador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `atraso`
--
ALTER TABLE `atraso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `reuniao`
--
ALTER TABLE `reuniao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
