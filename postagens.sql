-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/10/2024 às 15:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `postagens`
--

CREATE TABLE `postagens` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `postagens`
--

INSERT INTO `postagens` (`id`, `titulo`, `conteudo`, `imagem`, `created`, `modified`, `usuario_id`) VALUES
(1, 'Vinicius joga lixo na rua', 'dddd', 'uploads/6707ca750dea0.jpg', '2024-10-10 09:37:09', NULL, 1),
(2, 'Berilo foi pego cometendo um crime perto da professora Tamara', 'Berilo estava rebolando lentinho perto da professora no laboratorio 1', 'uploads/6707cb9284638.jfif', '2024-10-10 09:41:54', NULL, 1),
(3, 'vvvvvvv', 'vvvvvvv', 'uploads/6707cb98c2b03.jpg', '2024-10-10 09:42:00', NULL, 1),
(4, 'Sei l? mano', 'conte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?doconte?do', 'uploads/6707d638aa9d7.jpg', '2024-10-10 10:27:20', NULL, 1),
(5, 'Lucas jader ', 'foi pego rebolando pra os crias', 'uploads/6707d72c78504.jpg', '2024-10-10 10:31:24', NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `postagens_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
