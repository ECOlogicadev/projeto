-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Out-2024 às 16:07
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecologica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina`
--

CREATE TABLE `pagina` (
  `idPagina` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagina`
--

INSERT INTO `pagina` (`idPagina`, `nome`, `descricao`, `link`) VALUES
(1, 'Home', 'Página inicial', 'home.php'),
(2, 'Tipos de Resíduos', 'Informações sobre tipos de resíduos', 'residuos.php'),
(3, 'PNRS', 'Plano Nacional de Resíduos Sólidos', 'pnrs.php'),
(4, 'Cooperativas', 'Informações sobre cooperativas', 'cooperativas.php'),
(5, 'Sobre', 'Sobre nós', 'sobre.php'),
(6, 'Controle de Acesso', 'Área de controle de acesso', 'controle_acesso.php'),
(7, 'Cadastro', 'Página de cadastro', 'cadastro.php'),
(8, 'Login', 'Página de login', 'login.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nome`, `descricao`) VALUES
(1, 'admin', 'administrador do sistema'),
(2, 'convidado', 'uso limitado do sistema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_pagina`
--

CREATE TABLE `perfil_pagina` (
  `fkPerfil` int(11) NOT NULL,
  `fkPagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil_pagina`
--

INSERT INTO `perfil_pagina` (`fkPerfil`, `fkPagina`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 7),
(2, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `fkPerfil` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `fkPerfil`, `created`, `modified`) VALUES
(1, 'Lucas', 'lucas@gmail.com', '$2y$10$WIfc2aRYzsDUcra2e/R99O2y0ZAEGxDVKBhHYVg7cLgCZHAhAHPvi', 1, '2024-09-25 14:46:11', NULL),
(2, 'Vini', 'vini@gmail.com', '$2y$10$oa0IXP.QdQEGrs3yWtrrMuuqIWlKDu3K/dwXe6WAxs3r7CorP8qQm', 2, '2024-10-10 15:01:31', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idPagina`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Índices para tabela `perfil_pagina`
--
ALTER TABLE `perfil_pagina`
  ADD PRIMARY KEY (`fkPerfil`,`fkPagina`),
  ADD KEY `fk_Perfil_has_Pagina_Pagina_idx` (`fkPagina`),
  ADD KEY `fk_Perfil_has_Pagina_Perfil_idx` (`fkPerfil`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `perfil_pagina`
--
ALTER TABLE `perfil_pagina`
  ADD CONSTRAINT `fk_Perfil_has_Pagina_Pagina1` FOREIGN KEY (`fkPagina`) REFERENCES `pagina` (`idPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
