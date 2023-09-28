-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Set-2023 às 20:14
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `top`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_territorial`
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
-- Extraindo dados da tabela `agenda_territorial`
--

INSERT INTO `agenda_territorial` (`id_agenda`, `compromisso`, `eixo`, `responsavel`, `observacao`, `situacao`, `topID`) VALUES
(1, 'pinho', 'gfff', 'sgd', 'gggg', 'ssss', 2),
(2, 'SCRR', 'gasagsgsgsg', 'sgsgsgsg', 'sgdgsg', 'gdsgsgs', 1),
(4, 'vvmncmn', 'fjfhsfhf', 'dfisifhsdi', 'dhihfdiudf', 'sjjhfiuwuwuf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `nome`, `imagem`) VALUES
(1, 'teste1', 'Aconteceu hoje.docx'),
(2, 'teste2', 'Conheça a Tess AI.docx'),
(3, 'Estagio', 'agosto verde.docx'),
(4, '', 'RESULTADO.pdf'),
(5, 'Estagio', 'JORNAL-23-06-23.docx');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_territorial`
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
-- Extraindo dados da tabela `perfil_territorial`
--

INSERT INTO `perfil_territorial` (`id_perfil`, `instituicao`, `localidade`, `natureza`, `zona`, `endereco`, `topID`) VALUES
(4, 'asdddd', 'aas', 'ssffff', 'chatas', 'sssss', '1'),
(5, 'fdsad', 'dsadd', 'ffff', 'sss', 'yyyy', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`email`, `senha`) VALUES
('angelo@gmail.com', 'pinho');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
