-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb7.freehostingeu.com
-- Generation Time: 27-Dez-2017 às 17:46
-- Versão do servidor: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1942710_imp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
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
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `endereco`, `telefone`, `cpf`, `rg`, `usuario`, `senha`) VALUES
(22, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `nome` varchar(200) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `rg` varchar(30) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `telaluno` varchar(15) DEFAULT NULL,
  `telresponsavel` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `numeroSige` varchar(60) NOT NULL,
  `qtdAtraso` int(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`nome`, `foto`, `serie`, `curso`, `rg`, `cpf`, `telaluno`, `telresponsavel`, `email`, `numeroSige`, `qtdAtraso`, `id`) VALUES
('Xelinha Ateu', '../fotos/aluno/00.png', '3', 'Informática', '', '', NULL, '', '', '00', 0, 26),
('George Moreno', '../fotos/aluno/3450030.png', '3', 'Informatica', '1111111111111111', '11111111111111', '111111111111', '111111111111', '11@gmail.com', '3450030', 0, 27),
('Mateus Esmeraldo', '../fotos/aluno/3466553.png', '3', 'Informatica', '11111111111111111', '11111111111111', '111111111111111', '1111111111', 'mateus@mateus.com', '3466553', 1, 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `apontador`
--

CREATE TABLE `apontador` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `rg` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `apontador`
--

INSERT INTO `apontador` (`id`, `nome`, `endereco`, `telefone`, `cpf`, `rg`, `usuario`, `senha`) VALUES
(14, 'Isabel Cristina', '', '', '', '', 'isa', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atraso`
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

--
-- Extraindo dados da tabela `atraso`
--

INSERT INTO `atraso` (`id`, `data`, `horario`, `numeroSige`, `antigo`, `curso`, `serie`, `motivo`) VALUES
(79, '2017-12-22', '07:30', '3466553', 0, 'Informatica', '3', 'Falta nao justificada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
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

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `imagem`, `serie`, `curso`, `telefone`, `usuario`, `senha`) VALUES
(33, 'Alexandre Aquino', '../fotos/professor/alex.png', '3', 'Informática', '(85)99999-9999', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reuniao`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apontador`
--
ALTER TABLE `apontador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atraso`
--
ALTER TABLE `atraso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reuniao`
--
ALTER TABLE `reuniao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `apontador`
--
ALTER TABLE `apontador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `atraso`
--
ALTER TABLE `atraso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `reuniao`
--
ALTER TABLE `reuniao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
