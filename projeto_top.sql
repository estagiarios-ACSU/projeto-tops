-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2023 às 19:35
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
-- Banco de dados: `projeto_top`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda_territorial`
--

CREATE TABLE `agenda_territorial` (
  `id_agenda` int(11) NOT NULL,
  `compromisso` varchar(250) NOT NULL,
  `eixo` varchar(250) NOT NULL,
  `responsavel` varchar(250) NOT NULL,
  `observacao` varchar(250) NOT NULL,
  `situacao` varchar(250) NOT NULL,
  `topID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agenda_territorial`
--

INSERT INTO `agenda_territorial` (`id_agenda`, `compromisso`, `eixo`, `responsavel`, `observacao`, `situacao`, `topID`) VALUES
(1, 'bitch', 'gfff', 'sgd', 'gggg', 'ssss', 2),
(7, 'fffffsdadasdasd', 'asda', 'ssssss', 'ffff', 'fffewe', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `nome`, `imagem`) VALUES
(1, 'teste1', 'Aconteceu hoje.docx'),
(2, 'teste2', 'Conheça a Tess AI.docx'),
(3, 'Estagio', 'agosto verde.docx'),
(4, '', 'RESULTADO.pdf'),
(5, 'Estagio', 'JORNAL-23-06-23.docx');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil_territorial`
--

CREATE TABLE `perfil_territorial` (
  `id_perfil` int(11) NOT NULL,
  `instituicao` varchar(250) NOT NULL,
  `localidade` varchar(250) NOT NULL,
  `natureza` varchar(250) NOT NULL,
  `zona` varchar(250) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `topID` enum('1','2','3','4','5','6','7','8') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfil_territorial`
--

INSERT INTO `perfil_territorial` (`id_perfil`, `instituicao`, `localidade`, `natureza`, `zona`, `endereco`, `topID`) VALUES
(1, 'Salaberda', 'Meio do Mato', 'Cis Trans', 'Alagada de Lama', 'Mororo - mpe citi', '1'),
(6, 'Maria', 'asdasdsad', 'sadasdasd', 'asdasdasd', 'asdasdasdad', '1'),
(8, 'safsafasfa', 'sasfsas', 'asassfasf', 'aafs', 'assaaa', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(220) DEFAULT NULL,
  `senha` varchar(22) DEFAULT NULL,
  `admin` varchar(10) DEFAULT NULL,
  `nomeUsuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `admin`, `nomeUsuario`) VALUES
(3, 'chagas@gmail.com', '1230', 'Gerente', 'Chagas'),
(7, 'sinval@gmail.com', 'wefvwevrwv', 'Admin', 'sxsxsaqxs'),
(8, 'josechup@gmail.com', 'sinval', 'Admin', 'jose chup');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda_territorial`
--
ALTER TABLE `agenda_territorial`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Índices de tabela `perfil_territorial`
--
ALTER TABLE `perfil_territorial`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda_territorial`
--
ALTER TABLE `agenda_territorial`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `perfil_territorial`
--
ALTER TABLE `perfil_territorial`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
