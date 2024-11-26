-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2022 às 19:37
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `delivery_interativo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `chave` varchar(35) NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES
(1, 'Home', 'home', 0),
(2, 'Pedidos', 'pedidos', 0),
(3, 'Usuários', 'usuarios', 2),
(4, 'Funcionários', 'funcionarios', 2),
(5, 'Clientes', 'clientes', 2),
(6, 'Fornecedores', 'fornecedores', 2),
(7, 'Bairros / Locais', 'bairros', 3),
(8, 'Cargos', 'cargos', 3),
(9, 'Dias Fechado', 'dias', 3),
(10, 'Grupo Acessos', 'grupos', 3),
(11, 'Acessos', 'acessos', 3),
(12, 'Produtos', 'produtos', 4),
(13, 'Categorias', 'categorias', 4),
(14, 'Estoque', 'estoque', 4),
(15, 'Entradas', 'entradas', 4),
(16, 'Saídas', 'saidas', 4),
(17, 'Vendas', 'vendas', 5),
(18, 'Contas à Pagar', 'pagar', 5),
(19, 'Contas à Receber', 'receber', 5),
(20, 'Compras', 'compras', 5),
(21, 'Relatório Produtos', 'rel_produtos', 6),
(22, 'Relatório de Contas', 'rel_contas', 6),
(23, 'Relatório de Lucro', 'rel_lucro', 6),
(24, 'Relatório de Vendas', 'rel_vendas', 6),
(25, 'Configurações', 'configuracoes', 0),
(26, 'Banner Rotativo', 'banner_rotativo', 3),
(27, 'Mesas', 'mesas', 3),
(28, 'Pedidos Balcão', 'novo_pedido', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adicionais`
--

CREATE TABLE `adicionais` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `valor` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adicionais`
--

INSERT INTO `adicionais` (`id`, `produto`, `nome`, `ativo`, `valor`) VALUES
(5, 4, 'Bacon', 'Sim', '6.00'),
(6, 3, 'Nutela', 'Sim', '3.00'),
(7, 3, 'Leite em Pó', 'Sim', '2.00'),
(8, 3, 'Banana', 'Sim', '0.00'),
(9, 3, 'Leite Condensado', 'Sim', '0.00'),
(10, 1, 'Leite em Pó', 'Sim', '2.00'),
(11, 1, 'Banana', 'Sim', '2.00'),
(12, 16, 'Calabresa', 'Sim', '5.00'),
(13, 16, 'Palmito', 'Sim', '3.00'),
(14, 20, 'Bacon', 'Sim', '3.00'),
(15, 20, 'Molho Especial', 'Sim', '2.00'),
(16, 20, 'Cheddar', 'Sim', '4.00'),
(17, 18, 'Cheddar', 'Sim', '5.00'),
(18, 18, 'Bacon', 'Sim', '4.00'),
(19, 19, 'Bacon', 'Sim', '4.00'),
(20, 19, 'Cheddar', 'Sim', '4.00'),
(22, 16, 'Borda Cheddar', 'Sim', '4.90'),
(23, 17, 'Bacon', 'Sim', '4.90'),
(24, 14, 'Bacon', 'Sim', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE `bairros` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id`, `nome`, `valor`) VALUES
(1, 'Santa Mônica', '3.00'),
(2, 'São João Batista', '5.00'),
(3, 'Santa Amélia', '5.00'),
(4, 'Candelária', '4.00'),
(5, 'Pampulha', '6.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner_rotativo`
--

CREATE TABLE `banner_rotativo` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banner_rotativo`
--

INSERT INTO `banner_rotativo` (`id`, `foto`, `categoria`) VALUES
(3, '05-09-2022-11-50-49-pizza.jpg', 1),
(4, '05-09-2022-11-50-56-sanduiches.jpg', 2),
(5, '05-09-2022-11-51-24-01.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(3, 'Administrador'),
(4, 'Gerente'),
(5, 'Recepcionista'),
(6, 'Atendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `sessao` varchar(35) NOT NULL,
  `cliente` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total_item` decimal(8,2) NOT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `pedido` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `id_sabor` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `variacao` int(11) NOT NULL,
  `mesa` varchar(25) DEFAULT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `sessao`, `cliente`, `produto`, `quantidade`, `total_item`, `obs`, `pedido`, `data`, `id_sabor`, `categoria`, `item`, `variacao`, `mesa`, `nome_cliente`) VALUES
(24, '2022-07-11-15:26:06-318', 1, 19, 1, '29.00', '', 14, NULL, 0, 0, 0, 0, NULL, NULL),
(25, '2022-07-12-12:22:41-161', 8, 16, 2, '60.00', 'Tdfzgf', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(27, '2022-07-12-12:22:41-161', 8, 6, 1, '6.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(29, '2022-07-11-15:26:06-318', 1, 11, 1, '7.00', '', 14, NULL, 0, 0, 0, 0, NULL, NULL),
(31, '2022-07-11-15:26:06-318', 1, 7, 1, '5.00', 'fsfdf', 14, NULL, 0, 0, 0, 0, NULL, NULL),
(32, '2022-07-11-15:26:06-318', 1, 6, 1, '6.00', '', 14, NULL, 0, 0, 0, 0, NULL, NULL),
(34, '2022-07-12-12:53:36-936', 1, 16, 1, '34.90', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(35, '2022-07-12-12:53:36-936', 1, 1, 1, '12.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(36, '2022-07-12-12:53:36-936', 1, 1, 1, '18.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(37, '2022-07-12-14:24:37-1178', 2, 19, 1, '29.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(38, '2022-07-12-14:24:37-1178', 2, 16, 1, '30.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(39, '2022-07-12-15:19:50-1429', 8, 19, 1, '29.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(41, '2022-07-11-15:26:06-318', 1, 19, 1, '25.00', '', 14, NULL, 0, 0, 0, 0, NULL, NULL),
(42, '2022-07-11-15:26:06-318', 1, 20, 1, '34.00', '', 14, NULL, 0, 0, 0, 0, NULL, NULL),
(43, '2022-07-11-15:26:06-318', 1, 8, 1, '11.00', '', 14, NULL, 0, 0, 0, 0, NULL, NULL),
(44, '2022-07-12-17:54:03-421', 1, 16, 1, '34.90', '', 27, NULL, 0, 0, 0, 0, NULL, NULL),
(45, '2022-07-12-19:16:05-810', 1, 19, 1, '25.00', '', 15, NULL, 0, 0, 0, 0, NULL, NULL),
(46, '2022-07-12-19:24:04-123', 1, 19, 1, '29.00', '', 16, NULL, 0, 0, 0, 0, NULL, NULL),
(47, '2022-07-12-19:27:02-977', 1, 16, 1, '35.00', '', 17, NULL, 0, 0, 0, 0, NULL, NULL),
(48, '2022-07-12-19:30:19-253', 9, 18, 1, '27.00', '', 18, NULL, 0, 0, 0, 0, NULL, NULL),
(49, '2022-07-12-19:30:19-253', 9, 6, 2, '12.00', '', 18, NULL, 0, 0, 0, 0, NULL, NULL),
(50, '2022-07-12-19:34:55-25', 10, 18, 1, '28.00', 'obs do item', 19, NULL, 0, 0, 0, 0, NULL, NULL),
(51, '2022-07-12-19:34:55-25', 10, 7, 2, '10.00', '', 19, NULL, 0, 0, 0, 0, NULL, NULL),
(55, '2022-07-12-19:44:23-246', 1, 7, 1, '5.00', '', 23, NULL, 0, 0, 0, 0, NULL, NULL),
(56, '2022-07-12-19:45:17-1422', 1, 19, 1, '29.00', '', 24, NULL, 0, 0, 0, 0, NULL, NULL),
(57, '2022-07-12-19:45:17-1422', 1, 7, 1, '5.00', '', 24, NULL, 0, 0, 0, 0, NULL, NULL),
(58, '2022-07-12-19:48:32-294', 1, 19, 1, '29.00', '', 25, NULL, 0, 0, 0, 0, NULL, NULL),
(59, '2022-07-12-19:48:32-294', 1, 7, 1, '5.00', '', 25, NULL, 0, 0, 0, 0, NULL, NULL),
(60, '2022-07-12-20:30:13-615', 1, 20, 2, '64.00', 'dfsfd', 26, NULL, 0, 0, 0, 0, NULL, NULL),
(61, '2022-07-12-20:34:27-853', 1, 19, 1, '29.00', '', 28, NULL, 0, 0, 0, 0, NULL, NULL),
(62, '2022-07-12-20:38:08-88', 1, 19, 2, '58.00', '', 29, NULL, 0, 0, 0, 0, NULL, NULL),
(63, '2022-07-12-20:40:06-1402', 1, 3, 1, '20.00', '', 30, NULL, 0, 0, 0, 0, NULL, NULL),
(64, '2022-07-12-20:45:39-1437', 1, 9, 1, '9.00', '', 31, NULL, 0, 0, 0, 0, NULL, NULL),
(65, '2022-07-12-20:46:41-482', 1, 19, 1, '29.00', '', 32, NULL, 0, 0, 0, 0, NULL, NULL),
(66, '2022-07-12-20:47:19-975', 1, 6, 1, '6.00', '', 33, NULL, 0, 0, 0, 0, NULL, NULL),
(67, '2022-07-12-20:47:19-975', 1, 1, 1, '10.00', '', 33, NULL, 0, 0, 0, 0, NULL, NULL),
(68, '2022-07-12-21:40:59-594', 1, 19, 1, '29.00', '', 34, NULL, 0, 0, 0, 0, NULL, NULL),
(69, '2022-07-12-22:57:15-1117', 11, 6, 1, '6.00', '', 35, NULL, 0, 0, 0, 0, NULL, NULL),
(70, '2022-07-12-23:13:23-1401', 11, 19, 2, '58.00', '', 36, NULL, 0, 0, 0, 0, NULL, NULL),
(71, '2022-07-12-23:17:23-957', 1, 7, 2, '10.00', '', 37, NULL, 0, 0, 0, 0, NULL, NULL),
(72, '2022-07-12-23:18:16-429', 1, 7, 1, '5.00', '', 38, NULL, 0, 0, 0, 0, NULL, NULL),
(73, '2022-07-12-23:18:16-429', 1, 10, 1, '10.00', '', 38, NULL, 0, 0, 0, 0, NULL, NULL),
(74, '2022-07-12-23:16:50-12', 12, 19, 1, '38.00', '', 39, NULL, 0, 0, 0, 0, NULL, NULL),
(75, '2022-07-13-09:41:32-435', 13, 7, 1, '5.00', '', 40, NULL, 0, 0, 0, 0, NULL, NULL),
(76, '2022-07-13-09:41:32-435', 13, 19, 1, '29.00', '', 40, NULL, 0, 0, 0, 0, NULL, NULL),
(77, '2022-07-13-11:51:00-491', 8, 16, 2, '69.80', '', 41, NULL, 0, 0, 0, 0, NULL, NULL),
(78, '2022-07-13-11:51:00-491', 8, 7, 2, '10.00', '', 41, NULL, 0, 0, 0, 0, NULL, NULL),
(79, '2022-07-13-11:51:00-491', 8, 1, 1, '20.00', '', 41, NULL, 0, 0, 0, 0, NULL, NULL),
(80, '2022-07-13-11:54:47-125', 13, 18, 1, '28.00', 'Obs do item', 42, NULL, 0, 0, 0, 0, NULL, NULL),
(81, '2022-07-13-11:54:47-125', 13, 9, 1, '9.00', '', 42, NULL, 0, 0, 0, 0, NULL, NULL),
(82, '2022-07-13-11:54:47-125', 13, 7, 1, '5.00', '', 42, NULL, 0, 0, 0, 0, NULL, NULL),
(83, '2022-07-13-11:56:09-851', 14, 9, 1, '9.00', '', 43, NULL, 0, 0, 0, 0, NULL, NULL),
(84, '2022-07-13-11:56:09-851', 14, 7, 1, '5.00', 'Item obs', 43, NULL, 0, 0, 0, 0, NULL, NULL),
(85, '2022-07-13-12:45:33-896', 8, 19, 1, '29.00', '', 44, NULL, 0, 0, 0, 0, NULL, NULL),
(86, '2022-07-13-14:28:40-1453', 1, 19, 1, '29.00', 'Adsfgyh', 45, NULL, 0, 0, 0, 0, NULL, NULL),
(87, '2022-07-13-14:28:40-1453', 1, 7, 2, '10.00', '', 45, NULL, 0, 0, 0, 0, NULL, NULL),
(88, '2022-07-13-14:32:19-536', 15, 16, 1, '33.00', '', 46, NULL, 0, 0, 0, 0, NULL, NULL),
(89, '2022-07-13-14:32:19-536', 15, 1, 1, '12.00', '', 46, NULL, 0, 0, 0, 0, NULL, NULL),
(90, '2022-07-13-14:51:06-1384', 1, 19, 2, '58.00', 'Dsgdgdf', 47, NULL, 0, 0, 0, 0, NULL, NULL),
(91, '2022-07-13-14:51:06-1384', 1, 7, 2, '10.00', '', 47, NULL, 0, 0, 0, 0, NULL, NULL),
(92, '2022-07-13-15:13:09-243', 16, 18, 1, '27.00', 'Tsfs', 48, NULL, 0, 0, 0, 0, NULL, NULL),
(93, '2022-07-13-15:13:09-243', 16, 7, 2, '10.00', '', 48, NULL, 0, 0, 0, 0, NULL, NULL),
(94, '2022-07-13-15:13:09-243', 16, 1, 1, '12.00', '', 48, NULL, 0, 0, 0, 0, NULL, NULL),
(95, '2022-07-13-16:17:36-22', 1, 16, 1, '30.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(96, '2022-07-13-16:17:36-22', 1, 1, 1, '12.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(97, '2022-07-13-16:17:36-22', 1, 7, 1, '5.00', '', 0, NULL, 0, 0, 0, 0, NULL, NULL),
(98, '2022-07-15-15:33:58-1062', 11, 16, 1, '35.00', '', 49, NULL, 0, 0, 0, 0, NULL, NULL),
(99, '2022-07-16-13:58:59-921', 8, 19, 2, '66.00', '', 50, NULL, 0, 0, 0, 0, NULL, NULL),
(100, '2022-07-16-13:58:59-921', 8, 16, 1, '37.90', '', 50, NULL, 0, 0, 0, 0, NULL, NULL),
(101, '2022-07-16-18:17:01-1268', 8, 14, 1, '25.00', '', 51, NULL, 0, 0, 0, 0, NULL, NULL),
(102, '2022-07-16-18:17:01-1268', 8, 7, 1, '5.00', '', 51, NULL, 0, 0, 0, 0, NULL, NULL),
(282, '2022-09-21-19:48:17-946', 23, 6, 1, '6.00', '', 101, '2022-09-21', 0, 0, 0, 0, '', 'Teste'),
(283, '2022-09-21-19:55:07-1172', 23, 7, 1, '5.00', '', 102, '2022-09-21', 0, 0, 0, 0, '', 'Teste'),
(284, '2022-09-21-20:06:32-278', 23, 19, 1, '25.00', '', 103, '2022-09-21', 0, 0, 0, 0, '', 'Teste'),
(285, '2022-09-21-20:07:58-1061', 23, 14, 1, '25.00', '', 104, '2022-09-21', 0, 0, 0, 20, '', 'Teste'),
(286, '2022-10-04-22:40:01-705', 24, 18, 1, '28.00', '', 0, '2022-10-04', 0, 0, 0, 0, '', 'dfsdfdsfdsfsfs'),
(287, '2022-10-14-15:50:16-1224', 0, 7, 1, '5.00', '', 105, '2022-10-14', 0, 0, 0, 0, '04', 'testeee'),
(288, '2022-10-14-22:58:08-1490', 1, 7, 1, '5.00', '', 106, '2022-10-14', 0, 0, 0, 0, '', 'Cliente 1'),
(289, '2022-10-14-22:59:22-316', 1, 7, 1, '5.00', '', 107, '2022-10-14', 0, 0, 0, 0, '', 'Cliente 1'),
(345, '2022-10-14-23:08:01-252', 0, 6, 1, '6.00', '', 108, '2022-10-17', 0, 0, 0, 0, '0', ''),
(346, '2022-10-14-23:08:01-252', 0, 16, 1, '33.00', '', 108, '2022-10-17', 0, 0, 0, 23, '0', ''),
(347, '2022-10-14-23:08:01-252', 0, 14, 1, '35.00', '', 108, '2022-10-17', 1, 0, 0, 21, '0', ''),
(348, '2022-10-14-23:08:01-252', 0, 16, 1, '33.00', '', 108, '2022-10-17', 1, 0, 0, 18, '0', ''),
(349, '2022-10-14-23:08:01-252', 0, 0, 1, '38.00', NULL, 108, '2022-10-17', 0, 1, 1, 18, '0', ''),
(350, '2022-10-17-20:10:18-1224', 0, 19, 1, '25.00', '', 109, '2022-10-17', 0, 0, 0, 0, '0', ''),
(351, '2022-10-17-20:10:18-1224', 0, 16, 1, '40.00', '', 109, '2022-10-17', 0, 0, 0, 19, '0', ''),
(352, '2022-10-17-20:10:18-1224', 0, 14, 1, '35.00', '', 109, '2022-10-17', 1, 0, 0, 21, '0', ''),
(353, '2022-10-17-20:10:18-1224', 0, 16, 1, '34.90', '', 109, '2022-10-17', 1, 0, 0, 18, '0', ''),
(354, '2022-10-17-20:10:18-1224', 0, 0, 1, '39.90', NULL, 109, '2022-10-17', 0, 1, 1, 18, '0', ''),
(355, '2022-10-17-20:13:12-448', 0, 19, 2, '58.00', 'dsdfsdf', 110, '2022-10-17', 0, 0, 0, 0, '0', ''),
(360, '2022-10-17-20:13:12-448', 0, 7, 1, '5.00', '', 110, '2022-10-17', 0, 0, 0, 0, '0', ''),
(361, '2022-10-17-20:13:12-448', 0, 19, 1, '29.00', '', 110, '2022-10-17', 0, 0, 0, 0, '0', ''),
(362, '2022-10-17-20:13:12-448', 0, 7, 1, '5.00', '', 110, '2022-10-17', 0, 0, 0, 0, '0', ''),
(363, '2022-10-17-20:13:12-448', 0, 7, 1, '5.00', '', 110, '2022-10-17', 0, 0, 0, 0, '0', ''),
(364, '2022-10-17-20:13:12-448', 0, 7, 1, '5.00', '', 110, '2022-10-17', 0, 0, 0, 0, '0', ''),
(365, '2022-10-17-20:13:12-448', 0, 7, 1, '5.00', '', 110, '2022-10-17', 0, 0, 0, 0, '0', ''),
(366, '2022-10-17-20:30:07-1261', 0, 19, 1, '29.00', '', 111, '2022-10-17', 0, 0, 0, 0, '0', ''),
(367, '2022-10-17-20:39:55-464', 26, 19, 1, '29.00', '', 112, '2022-10-17', 0, 0, 0, 0, '0', ''),
(368, '2022-10-17-20:39:55-464', 26, 6, 1, '6.00', '', 112, '2022-10-17', 0, 0, 0, 0, '0', ''),
(369, '2022-10-17-20:43:41-365', 27, 18, 1, '27.00', '', 113, '2022-10-17', 0, 0, 0, 0, '0', ''),
(370, '2022-10-17-20:45:28-233', 28, 19, 1, '29.00', '', 114, '2022-10-17', 0, 0, 0, 0, '0', ''),
(371, '2022-10-17-20:45:28-233', 28, 7, 1, '5.00', '', 114, '2022-10-17', 0, 0, 0, 0, '0', ''),
(372, '2022-10-17-20:47:10-505', 0, 18, 1, '28.00', '', 116, '2022-10-17', 0, 0, 0, 0, '0', ''),
(373, '2022-10-17-21:21:57-954', 1, 19, 1, '25.00', '', 115, '2022-10-17', 0, 0, 0, 0, '0', ''),
(374, '2022-10-17-23:12:23-1301', 29, 19, 1, '29.00', '', 117, '2022-10-17', 0, 0, 0, 0, '0', ''),
(375, '2022-10-17-23:12:23-1301', 29, 7, 1, '5.00', '', 117, '2022-10-17', 0, 0, 0, 0, '0', ''),
(376, '2022-10-17-23:15:03-266', 1, 7, 1, '5.00', '', 118, '2022-10-17', 0, 0, 0, 0, '0', ''),
(377, '2022-10-17-23:22:47-237', 1, 7, 1, '5.00', '', 119, '2022-10-17', 0, 0, 0, 0, '0', ''),
(378, '2022-10-17-23:29:32-967', 1, 7, 1, '5.00', '', 120, '2022-10-17', 0, 0, 0, 0, '0', ''),
(379, '2022-10-17-23:37:59-142', 0, 19, 1, '29.00', '', 121, '2022-10-17', 0, 0, 0, 0, '0', ''),
(380, '2022-10-17-23:38:34-1311', 0, 14, 1, '35.00', '', 122, '2022-10-17', 1, 0, 0, 21, '0', ''),
(381, '2022-10-17-23:38:34-1311', 0, 16, 1, '33.00', '', 122, '2022-10-17', 1, 0, 0, 18, '0', ''),
(382, '2022-10-17-23:38:34-1311', 0, 0, 1, '38.00', NULL, 122, '2022-10-17', 0, 1, 1, 18, '0', ''),
(383, '2022-10-17-23:38:34-1311', 0, 7, 1, '5.00', '', 122, '2022-10-17', 0, 0, 0, 0, '0', ''),
(384, '2022-10-17-23:38:34-1311', 0, 3, 1, '20.00', '', 122, '2022-10-17', 0, 0, 0, 13, '0', ''),
(385, '2022-10-17-23:40:53-1354', 30, 14, 1, '30.00', '', 123, '2022-10-17', 1, 0, 0, 21, '0', ''),
(386, '2022-10-17-23:40:53-1354', 30, 16, 1, '30.00', '', 123, '2022-10-17', 1, 0, 0, 18, '0', ''),
(387, '2022-10-17-23:40:53-1354', 30, 0, 1, '30.00', NULL, 123, '2022-10-17', 0, 1, 1, 18, '0', ''),
(388, '2022-10-17-23:42:45-730', 1, 19, 1, '29.00', '', 124, '2022-10-17', 0, 0, 0, 0, '0', ''),
(389, '2022-10-17-23:44:44-985', 1, 20, 1, '34.00', '', 125, '2022-10-17', 0, 0, 0, 0, '0', ''),
(390, '2022-10-17-23:45:54-1269', 1, 20, 1, '32.00', '', 126, '2022-10-17', 0, 0, 0, 0, '0', ''),
(391, '2022-10-18-10:48:08-250', 1, 7, 1, '5.00', '', 127, '2022-10-18', 0, 0, 0, 0, '0', ''),
(392, '2022-10-18-10:50:10-689', 1, 7, 1, '5.00', '', 128, '2022-10-18', 0, 0, 0, 0, '0', ''),
(393, '2022-10-18-10:55:01-967', 1, 7, 1, '5.00', '', 129, '2022-10-18', 0, 0, 0, 0, '0', ''),
(394, '2022-10-18-10:56:15-865', 1, 6, 1, '6.00', '', 130, '2022-10-18', 0, 0, 0, 0, '0', ''),
(395, '2022-10-18-10:56:15-865', 1, 7, 1, '5.00', '', 130, '2022-10-18', 0, 0, 0, 0, '0', ''),
(396, '2022-10-18-11:57:30-647', 1, 7, 1, '5.00', '', 131, '2022-10-18', 0, 0, 0, 0, '0', ''),
(397, '2022-10-18-11:58:38-24', 1, 6, 1, '6.00', '', 132, '2022-10-18', 0, 0, 0, 0, '0', ''),
(398, '2022-10-18-12:04:07-995', 1, 19, 1, '29.00', '', 133, '2022-10-18', 0, 0, 0, 0, '0', ''),
(399, '2022-10-18-12:21:34-1070', 1, 19, 1, '29.00', '', 134, '2022-10-18', 0, 0, 0, 0, '0', ''),
(400, '2022-10-18-12:21:34-1070', 1, 6, 1, '6.00', '', 134, '2022-10-18', 0, 0, 0, 0, '0', ''),
(401, '2022-10-18-12:24:53-1245', 1, 19, 1, '29.00', '', 135, '2022-10-18', 0, 0, 0, 0, '0', ''),
(402, '2022-10-18-12:24:53-1245', 1, 21, 1, '18.00', '', 135, '2022-10-18', 0, 0, 0, 0, '0', ''),
(403, '2022-10-18-12:28:59-1061', 1, 19, 1, '25.00', '', 136, '2022-10-18', 0, 0, 0, 0, '0', ''),
(404, '2022-10-18-12:28:59-1061', 1, 7, 2, '10.00', '', 136, '2022-10-18', 0, 0, 0, 0, '0', ''),
(405, '2022-10-18-12:31:52-1444', 1, 14, 1, '30.00', '', 137, '2022-10-18', 1, 0, 0, 21, '0', ''),
(406, '2022-10-18-12:31:52-1444', 1, 16, 1, '33.00', '', 137, '2022-10-18', 1, 0, 0, 18, '0', ''),
(407, '2022-10-18-12:31:52-1444', 1, 0, 1, '33.00', NULL, 137, '2022-10-18', 0, 1, 1, 18, '0', ''),
(408, '2022-10-18-12:31:52-1444', 1, 7, 3, '15.00', '', 137, '2022-10-18', 0, 0, 0, 0, '0', ''),
(409, '2022-10-18-12:38:59-566', 1, 18, 1, '28.00', '', 138, '2022-10-18', 0, 0, 0, 0, '0', ''),
(410, '2022-10-18-12:38:59-566', 1, 7, 1, '5.00', '', 138, '2022-10-18', 0, 0, 0, 0, '0', ''),
(411, '2022-10-18-12:55:23-1120', 1, 19, 1, '29.00', '', 139, '2022-10-18', 0, 0, 0, 0, '0', ''),
(412, '2022-10-18-13:01:45-359', 1, 19, 2, '58.00', '', 140, '2022-10-18', 0, 0, 0, 0, '0', ''),
(413, '2022-10-18-13:01:45-359', 1, 7, 2, '10.00', '', 140, '2022-10-18', 0, 0, 0, 0, '0', ''),
(414, '2022-10-18-14:00:44-698', 1, 18, 1, '23.00', '', 141, '2022-10-18', 0, 0, 0, 0, '0', ''),
(415, '2022-10-18-14:03:51-295', 1, 18, 1, '28.00', '', 142, '2022-10-18', 0, 0, 0, 0, '0', ''),
(416, '2022-10-18-14:03:51-295', 1, 7, 1, '5.00', '', 142, '2022-10-18', 0, 0, 0, 0, '0', ''),
(417, '2022-10-18-14:22:49-256', 1, 19, 1, '29.00', '', 143, '2022-10-18', 0, 0, 0, 0, '0', ''),
(418, '2022-10-18-14:22:49-256', 1, 7, 2, '10.00', '', 143, '2022-10-18', 0, 0, 0, 0, '0', ''),
(419, '2022-10-18-14:22:49-256', 1, 14, 1, '35.00', '', 143, '2022-10-18', 1, 0, 0, 21, '0', ''),
(420, '2022-10-18-14:22:49-256', 1, 16, 1, '35.00', '', 143, '2022-10-18', 1, 0, 0, 18, '0', ''),
(421, '2022-10-18-14:22:49-256', 1, 0, 1, '40.00', NULL, 143, '2022-10-18', 0, 1, 1, 18, '0', ''),
(422, '2022-10-18-14:27:00-714', 1, 18, 1, '28.00', '', 144, '2022-10-18', 0, 0, 0, 0, '0', ''),
(423, '2022-10-18-14:27:00-714', 1, 7, 1, '5.00', '', 144, '2022-10-18', 0, 0, 0, 0, '0', ''),
(424, '2022-10-18-14:27:00-714', 1, 14, 1, '35.00', '', 144, '2022-10-18', 1, 0, 0, 21, '0', ''),
(425, '2022-10-18-14:27:00-714', 1, 16, 1, '35.00', '', 144, '2022-10-18', 1, 0, 0, 18, '0', ''),
(426, '2022-10-18-14:27:00-714', 1, 0, 1, '40.00', NULL, 144, '2022-10-18', 0, 1, 1, 18, '0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `cor` varchar(30) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `url` varchar(100) NOT NULL,
  `mais_sabores` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `descricao`, `foto`, `cor`, `ativo`, `url`, `mais_sabores`) VALUES
(1, 'Pizzas', 'Pizzas Vários Sabores', '09-07-2022-18-23-05-PIZZA.jpg', 'azul', 'Sim', 'pizzas', 'Sim'),
(2, 'Sanduiches', 'Comuns e Artesanais', '09-07-2022-18-23-30-SANDUICHE.jpg', 'rosa', 'Sim', 'sanduiches', 'Não'),
(4, 'Bebidas', 'Refrigerantes, Sucos, Cervejas', '09-07-2022-18-23-50-BEBIDAS.jpg', 'azul-escuro', 'Sim', 'bebidas', 'Não'),
(6, 'Hot Dogs', 'Deliciosos Cachorro Quente', '09-07-2022-18-24-31-HOT.jpg', 'verde', 'Sim', 'hot-dogs', 'Não'),
(7, 'Pastéis', 'Comuns e Especiais', '09-07-2022-18-24-48-PASTEL.jpg', 'roxo', 'Sim', 'pasteis', 'Não'),
(8, 'Açaí', 'Vitaminas e Creme', '09-07-2022-18-25-20-ACAI.jpg', 'vermelho', 'Sim', 'acai', 'Não'),
(9, 'Sobremesas', 'Diversos Doces', '09-07-2022-18-25-53-SOBREMESAS.jpg', 'verde-escuro', 'Sim', 'sobremesas', 'Não'),
(10, 'Sorvetes', 'Pote e Agranel', '09-07-2022-18-26-22-SORVETES.jpg', 'laranja', 'Sim', 'sorvetes', 'Não');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `rua` varchar(35) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `rua`, `numero`, `bairro`, `complemento`, `data`) VALUES
(1, 'Leonardo Silva', '(16) 3600-9697', 'Rua X', '01', 'Candelária', 'Edifício Guajajaras Sala 106', '2022-07-12'),
(2, 'Cliente 2', '(65) 55555-5555', 'Rua A', '130', 'Santa Amélia', '', '2022-07-05'),
(5, 'Cliente 3', '(34) 44444-4444', '', '', '', NULL, '2022-07-11'),
(6, 'Cliente 4', '(11) 41111-1111', '', '', '', NULL, '2022-07-11'),
(7, 'Teste', '(31) 45555-5555', '', '', '', NULL, '2022-07-11'),
(8, 'Teste 6', '(31) 97527-5075', 'Rua de Teste Exemplo', '105', 'Pampulha', 'Bloco 01 Ap 1250', '2022-07-12'),
(9, 'Cliente Teste 50', '(31) 97527-5085', '', '', '', NULL, '2022-07-12'),
(10, 'Cliente para Teste', '(32) 47855-5555', 'Rua XXXX', '540', 'São João Batista', '', '2022-07-12'),
(11, 'aaaaaa', '(55) 56664-5454', 'fsdaf', '40', 'Santa Mônica', '50', '2022-07-12'),
(12, 'teste 5', '(44) 54545-4544', '', '', '', '', '2022-07-13'),
(13, 'Cliente 10', '(44) 44444-4444', 'Rua X', '50', 'São João Batista', '', '2022-07-13'),
(14, 'Testando Projeto', '(31) 22222-2222', '', '', '', '', '2022-07-13'),
(15, 'Cliente teste 50', '(88) 88888-8888', '', '', '', '', '2022-07-13'),
(16, 'Teste', '(76) 32233-3343', 'Sfdf', '58', 'Santa Mônica', '34', '2022-07-13'),
(17, 'Nome de Teste', '(11) 11111-1111', '', '', '', '', '2022-08-01'),
(18, 'Testessss', '(25) 88888-8888', '', '', '', '', '2022-08-01'),
(19, 'Teste Cliente', '(55) 55555-5556', '', '', '', '', '2022-09-05'),
(20, 'Testess', '(44) 56666-6666', 'Rua C', '150', 'São João Batista', 'BBB', '2022-09-05'),
(21, '', '', '', '', '', NULL, '2022-09-05'),
(22, 'ASsddssdfdsf', '(87) 85874-5485', 'DAF', '41', 'São João Batista', 'AAA', '2022-09-05'),
(23, 'Teste', '(31) 97139-0746', '', '', '', '', '2022-09-21'),
(24, 'dfsdfdsfdsfsfs', '(44) 44444-5555', '', '', '', NULL, '2022-10-04'),
(25, '', '(33) 33233-3333', 'Rua CC', '50', 'Santa Mônica', '50', '2022-10-17'),
(26, '', '(36) 88888-8888', 'Rua 555', '555', 'Santa Amélia', '555', '2022-10-17'),
(27, '', '(47) 77777-7777', 'Rua 558', '88', 'São João Batista', '8888', '2022-10-17'),
(28, 'Marta Silva', '(87) 77777-7777', 'Rua B', '222', 'São João Batista', '222', '2022-10-17'),
(29, '', '(33) 33333-3333', 'Rua 5', '55', 'São João Batista', '55', '2022-10-17'),
(30, 'Teste Cliente', '(45) 55555-5555', 'Rua 5', '55', 'Santa Amélia', '55', '2022-10-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `nome_sistema` varchar(50) NOT NULL,
  `email_sistema` varchar(50) NOT NULL,
  `telefone_sistema` varchar(20) NOT NULL,
  `telefone_fixo` varchar(20) DEFAULT NULL,
  `endereco_sistema` varchar(255) DEFAULT NULL,
  `instagram_sistema` varchar(100) DEFAULT NULL,
  `tipo_rel` varchar(10) NOT NULL,
  `tipo_miniatura` varchar(10) NOT NULL,
  `status_whatsapp` varchar(5) NOT NULL,
  `previsao_entrega` int(11) NOT NULL,
  `horario_abertura` time NOT NULL,
  `horario_fechamento` time NOT NULL,
  `texto_fechamento_horario` varchar(255) DEFAULT NULL,
  `status_estabelecimento` varchar(20) NOT NULL,
  `texto_fechamento` varchar(255) DEFAULT NULL,
  `logo_sistema` varchar(100) NOT NULL,
  `favicon_sistema` varchar(100) NOT NULL,
  `logo_rel` varchar(100) NOT NULL,
  `tempo_atualizar` int(11) NOT NULL,
  `tipo_chave` varchar(35) DEFAULT NULL,
  `chave_pix` varchar(100) DEFAULT NULL,
  `cnpj` varchar(25) DEFAULT NULL,
  `dias_apagar` int(11) NOT NULL,
  `impressao_automatica` varchar(5) NOT NULL,
  `fonte_comprovante` int(11) NOT NULL,
  `banner_rotativo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `nome_sistema`, `email_sistema`, `telefone_sistema`, `telefone_fixo`, `endereco_sistema`, `instagram_sistema`, `tipo_rel`, `tipo_miniatura`, `status_whatsapp`, `previsao_entrega`, `horario_abertura`, `horario_fechamento`, `texto_fechamento_horario`, `status_estabelecimento`, `texto_fechamento`, `logo_sistema`, `favicon_sistema`, `logo_rel`, `tempo_atualizar`, `tipo_chave`, `chave_pix`, `cnpj`, `dias_apagar`, `impressao_automatica`, `fonte_comprovante`, `banner_rotativo`) VALUES
(1, 'Delivery Interativo', 'leonardo@msilvadev.com.br', '(31) 97139-0746', '', 'Rua X Número 150 - Bairro Centro', 'https://www.instagram.com/portal_hugo_cursos/', 'PDF', 'Foto', 'Api', 50, '09:00:00', '00:00:00', 'Estamos Fechados, funcionamos das 09:00 as 00:00', 'Aberto', 'Fechamos por falta de produtos', '04-07-2022-19-14-56-logo.png', '04-07-2022-19-29-34-favicon.png', '04-07-2022-19-36-41-logo_rel.jpg', 30, 'CNPJ', '18.314.555/5558-05', '18.314.555/5558-05', 30, 'Sim', 11, 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `dia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `usuario` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entradas`
--

INSERT INTO `entradas` (`id`, `produto`, `quantidade`, `motivo`, `usuario`, `data`) VALUES
(1, 3, 15, 'Compra', 1, '2022-07-05'),
(2, 6, 5, 'Encontrado', 1, '2022-07-11'),
(3, 27, 50, 'Teste', 1, '2022-10-18'),
(4, 7, 50, 'Teste', 1, '2022-10-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `tipo_chave` varchar(30) DEFAULT NULL,
  `chave_pix` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `telefone`, `email`, `endereco`, `data`, `tipo_chave`, `chave_pix`) VALUES
(1, 'Fornecedor 1', '(41) 11111-1111', 'fornecedor@hotmail.com', 'Rua Guajajaras 140 Centro', '2022-07-05', 'Email', 'fornecedor@hotmail.com'),
(2, 'Fornecedor 2', '(85) 78454-8545', 'fornecedor2@hotmail.com', 'Rua X', '2022-07-05', 'Telefone', '3198888-8888');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_acessos`
--

CREATE TABLE `grupo_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo_acessos`
--

INSERT INTO `grupo_acessos` (`id`, `nome`) VALUES
(2, 'Pessoas'),
(3, 'Cadastros'),
(4, 'Produtos'),
(5, 'Financeiro'),
(6, 'Relatórios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ativo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `produto`, `nome`, `ativo`) VALUES
(6, 4, 'Tomate', 'Sim'),
(7, 4, 'Cebola', 'Sim'),
(8, 4, 'Molho Especial', 'Sim'),
(9, 3, 'Creme de Acaí', 'Sim'),
(10, 3, 'Leite em Pó', 'Sim'),
(11, 1, 'Crocante', 'Sim'),
(12, 1, 'Leite em Pó', 'Sim'),
(13, 16, 'Cebola', 'Sim'),
(14, 16, 'Borda Cheddar', 'Sim'),
(15, 16, 'Calabresa', 'Sim'),
(16, 16, 'Palmito', 'Sim'),
(17, 20, 'Cebola', 'Sim'),
(18, 20, 'Alface', 'Sim'),
(19, 20, 'Tomate', 'Sim'),
(20, 20, 'Cheddar', 'Sim'),
(21, 20, 'Molho Especial', 'Sim'),
(22, 18, 'Cheddar', 'Sim'),
(23, 18, 'Bacon', 'Sim'),
(24, 18, 'Cebola', 'Sim'),
(25, 18, 'Alface', 'Sim'),
(26, 19, 'Cebola', 'Sim'),
(27, 19, 'Alface', 'Sim'),
(28, 19, 'Cheddar', 'Sim'),
(29, 19, 'Bacon', 'Sim'),
(30, 17, 'Cebola', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `nome`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagar`
--

CREATE TABLE `pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `tipo` varchar(30) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data_lanc` date NOT NULL,
  `data_venc` date NOT NULL,
  `data_pgto` date NOT NULL,
  `usuario_lanc` int(11) NOT NULL,
  `usuario_baixa` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `pessoa` int(11) NOT NULL,
  `pago` varchar(5) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagar`
--

INSERT INTO `pagar` (`id`, `descricao`, `tipo`, `valor`, `data_lanc`, `data_venc`, `data_pgto`, `usuario_lanc`, `usuario_baixa`, `foto`, `pessoa`, `pago`, `produto`, `quantidade`, `funcionario`, `cliente`) VALUES
(2, 'Conta de Luz', 'Conta', '570.00', '2022-07-05', '2022-07-05', '2022-07-05', 1, 1, '05-07-2022-20-43-53-09-11-2021-09-21-26-conta3.jpg', 0, 'Sim', 0, 0, 0, 0),
(3, 'Conta de Água', 'Conta', '380.00', '2022-07-05', '2022-07-05', '0000-00-00', 1, 0, '05-07-2022-20-44-29-09-11-2021-10-17-10-pdfteste.pdf', 0, 'Não', 0, 0, 0, 0),
(4, 'Pagamento Funcionário', 'Conta', '850.00', '2022-07-05', '2022-07-05', '2022-01-05', 1, 1, '05-07-2022-20-45-32-09-11-2021-12-04-29-pdfteste.zip', 0, 'Sim', 0, 0, 8, 0),
(5, 'Pagamento Atrasado', 'Conta', '85.00', '2022-07-06', '2022-07-06', '0000-00-00', 1, 0, 'sem-foto.jpg', 1, 'Não', 0, 0, 0, 0),
(7, 'Compra - (8) Coca Cola Lata 350 ML', 'Compra', '25.00', '2022-07-06', '2022-07-06', '2022-07-06', 1, 1, '06-07-2022-10-15-35-09-11-2021-12-04-29-pdfteste.zip', 1, 'Sim', 3, 8, 0, 0),
(8, 'Aluguél', 'Conta', '800.00', '2022-07-06', '2022-07-06', '2022-07-06', 1, 1, 'sem-foto.jpg', 0, 'Sim', 0, 0, 0, 0),
(10, 'Compra - (15) Coca Cola Lata 350 ML', 'Compra', '60.00', '2022-07-11', '2022-07-11', '2022-07-11', 1, 1, 'sem-foto.jpg', 1, 'Sim', 7, 15, 0, 0),
(11, 'Compra - (15) Coca Cola Lata 350 ML', 'Compra', '70.00', '2022-07-11', '2022-07-11', '2022-07-11', 1, 1, 'sem-foto.jpg', 2, 'Sim', 7, 15, 0, 0),
(12, 'Compra - (3) Coca Cola Lata 350 ML', 'Compra', '10.00', '2022-07-13', '2022-07-13', '2022-07-13', 1, 1, 'sem-foto.jpg', 0, 'Sim', 7, 3, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `valor_compra` decimal(8,2) NOT NULL,
  `valor_venda` decimal(8,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nivel_estoque` int(11) NOT NULL,
  `tem_estoque` varchar(5) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `categoria`, `valor_compra`, `valor_venda`, `estoque`, `foto`, `nivel_estoque`, `tem_estoque`, `ativo`, `url`) VALUES
(1, 'Vitamina de Açaí', 'Vitamina ou suco de Açaí', 8, '0.00', '20.00', 0, '10-07-2022-11-04-21-VITAMINA.jpg', 0, 'Não', 'Sim', 'vitamina-de-acai'),
(3, 'Taça de Açaí', 'Taça de Açaí', 8, '0.00', '0.00', 9, '09-07-2022-21-16-16-FRUTAS.jpg', 0, 'Não', 'Sim', 'taca-de-acai'),
(4, 'Açaí Pote 1 Litro', 'Pote de Açai de 1 Litro', 8, '0.00', '20.00', 0, '10-07-2022-11-04-15-POTE.jpg', 10, 'Sim', 'Sim', 'acai-pote-1-litro'),
(6, 'Água Mineral 500 ML', 'Água Garrafa 500 ML', 4, '0.00', '6.00', 0, '10-07-2022-10-59-20-AGUA.jpg', 15, 'Sim', 'Sim', 'agua-mineral-500-ml'),
(7, 'Coca Cola Lata 350 ML', 'Lata 350 ML', 4, '3.33', '5.00', 40, '10-07-2022-10-58-50-COCACOLA.jpg', 15, 'Sim', 'Sim', 'coca-cola-lata-350-ml'),
(8, 'Hot Dog Picante', 'Cachorro quente Picante', 6, '0.00', '11.00', 0, '09-07-2022-21-20-20-DOG-PICANTE.jpg', 0, 'Não', 'Sim', 'hot-dog-picante'),
(9, 'Hot Dog Tradicional', 'Cachorro quente tradicional', 6, '0.00', '9.00', 0, '09-07-2022-21-20-54-DOG-TRADICIONAL.jpg', 0, 'Não', 'Sim', 'hot-dog-tradicional'),
(10, 'Hot Dog Vinagrete', 'Cachorro quente com vinagrete', 6, '0.00', '10.00', 0, '09-07-2022-21-21-18-DOG-VINAGRETE.jpg', 0, 'Não', 'Sim', 'hot-dog-vinagrete'),
(11, 'Pastel de Carne', 'Pastel de Carne moída', 7, '0.00', '7.00', 0, '09-07-2022-21-21-45-PASTEL-CARNE.jpg', 0, 'Não', 'Sim', 'pastel-de-carne'),
(12, 'Pastel Napolitano', 'Pastel Napolitando', 7, '0.00', '7.00', 0, '09-07-2022-21-22-03-PASTEL-NAPOLITANO.jpg', 0, 'Não', 'Sim', 'pastel-napolitano'),
(13, 'Pastel de Queijo', 'Pastel queijo canastra', 7, '0.00', '8.00', 0, '09-07-2022-21-22-26-PASTEL-QUEIJO.jpg', 0, 'Não', 'Sim', 'pastel-de-queijo'),
(14, 'Pizza de Bacon', 'Pizza de bacon e milho', 1, '0.00', '20.00', 0, '09-07-2022-21-23-01-PIZZA-BACON.jpg', 0, 'Não', 'Sim', 'pizza-de-bacon'),
(15, 'Suco Lata 350 ML', 'Suco Del Vale Lata', 4, '0.00', '7.00', 0, '10-07-2022-10-59-56-SUCO.jpg', 10, 'Sim', 'Sim', 'suco-lata-350-ml'),
(16, 'Pizza Calabresa', 'Deliciosa pizza de calabresa com bacon, milho, borda rechedada com cheddar.', 1, '0.00', '0.00', 0, '10-07-2022-11-05-04-PIZZA-CALABRESA.jpg', 0, 'Não', 'Sim', 'pizza-calabresa'),
(17, 'Pizza Peperoni', 'Pizza de Peperoni', 1, '0.00', '0.00', 0, '10-07-2022-11-08-05-PIZZA-PEPERONI.jpg', 0, 'Não', 'Sim', 'pizza-peperoni'),
(18, 'Burguer Cheddar', 'Sanduíche artesanal de cheddar com bacon, carne de 150 Gramas com molho especial, cheddar, bacon, tomate, cebola, alface e pão gourmet.', 2, '0.00', '23.00', 0, '10-07-2022-11-08-50-BURGUER-CHEDDAR.jpg', 0, 'Não', 'Sim', 'burguer-cheddar'),
(19, 'Burguer Costelinha', 'Sanduíche artesanal de costeinha suína, carne de 150 Gramas com molho especial, cheddar, tomate, cebola, alface e pão gourmet.', 2, '0.00', '25.00', 0, '10-07-2022-11-09-20-BURGUER-COSTELINHA.jpg', 0, 'Não', 'Sim', 'burguer-costelinha'),
(20, 'Burguer Picanha', 'Sanduíche artesanal de picanha Carne de 180 Gramas com molho especial, cheddar, tomate, cebola, alface e pão gourmet.', 2, '0.00', '30.00', 0, '10-07-2022-11-09-39-BURGUER-PICANHA.jpg', 0, 'Não', 'Sim', 'burguer-picanha'),
(21, 'Mousse de Chocolate', 'Pote de 300 ML', 9, '0.00', '18.00', 0, '10-07-2022-11-10-28-MOUSSE.jpg', 0, 'Não', 'Sim', 'mousse-de-chocolate'),
(22, 'Pave de Maracujá', 'Delicioso pavê de maracuja...', 9, '0.00', '16.00', 0, '10-07-2022-11-10-58-PAVE.jpg', 0, 'Não', 'Sim', 'pave-de-maracuja'),
(23, 'Pudim de Leite Condensado', 'Pudim de leite condensado, cerca de 350 Gramas.', 9, '0.00', '16.00', 0, '10-07-2022-11-11-36-PUDIM.jpg', 0, 'Não', 'Sim', 'pudim-de-leite-condensado'),
(24, 'Sorvete de Baunilha 300 ML', 'Delicioso sorte de baunilha, pote de 300 ML', 10, '0.00', '8.00', 0, '10-07-2022-11-12-25-BAUNILHA.jpg', 0, 'Não', 'Sim', 'sorvete-de-baunilha-300-ml'),
(25, 'Sortete de Chocolate', 'Pote de 300 ML de sorvete de chocolate', 10, '0.00', '9.00', 0, '10-07-2022-11-12-46-CHOCOLATE.jpg', 0, 'Não', 'Sim', 'sortete-de-chocolate'),
(27, 'Enérgetico Red Bull', 'Red Bull 476 ML', 4, '0.00', '13.00', 50, '05-09-2022-14-29-17-red.jpg', 5, 'Sim', 'Sim', 'energetico-red-bull');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receber`
--

CREATE TABLE `receber` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `tipo` varchar(30) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data_lanc` date NOT NULL,
  `data_venc` date NOT NULL,
  `data_pgto` date NOT NULL,
  `usuario_lanc` int(11) NOT NULL,
  `usuario_baixa` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `pessoa` int(11) NOT NULL,
  `pago` varchar(5) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receber`
--

INSERT INTO `receber` (`id`, `descricao`, `tipo`, `valor`, `data_lanc`, `data_venc`, `data_pgto`, `usuario_lanc`, `usuario_baixa`, `foto`, `pessoa`, `pago`, `produto`, `quantidade`, `funcionario`) VALUES
(1, 'Pagamento Teste', 'Conta', '215.00', '2022-07-06', '2022-07-06', '2022-07-06', 1, 1, '06-07-2022-10-04-37-09-11-2021-10-17-10-pdfteste.pdf', 1, 'Sim', 0, 0, 0),
(2, 'Recebimento', 'Conta', '120.00', '2022-07-06', '2022-07-06', '2022-07-06', 1, 1, '06-07-2022-10-06-12-09-11-2021-12-04-29-pdfteste.zip', 0, 'Sim', 0, 0, 0),
(4, 'Recebido', 'Conta', '1600.00', '2022-07-06', '2022-07-06', '2022-07-06', 1, 1, 'sem-foto.jpg', 0, 'Sim', 0, 0, 0),
(5, 'Teste', 'Conta', '400.00', '2022-07-06', '2022-07-06', '2022-07-06', 1, 1, 'sem-foto.jpg', 0, 'Sim', 0, 0, 0),
(6, 'Receber', 'Conta', '50.00', '2022-07-06', '2022-07-06', '0000-00-00', 1, 0, 'sem-foto.jpg', 2, 'Não', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saidas`
--

CREATE TABLE `saidas` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `usuario` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `saidas`
--

INSERT INTO `saidas` (`id`, `produto`, `quantidade`, `motivo`, `usuario`, `data`) VALUES
(1, 3, 5, 'Furto', 1, '2022-07-05'),
(2, 3, 9, 'Sumiu', 1, '2022-07-06'),
(3, 7, 15, 'Perda', 1, '2022-07-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `sessao` varchar(35) NOT NULL,
  `tabela` varchar(25) NOT NULL,
  `id_item` int(11) NOT NULL,
  `carrinho` int(11) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `temp`
--

INSERT INTO `temp` (`id`, `sessao`, `tabela`, `id_item`, `carrinho`, `data`) VALUES
(36, '2022-07-11-19:18:59-233', 'adicionais', 12, 0, NULL),
(37, '2022-07-11-15:26:06-318', 'ingredientes', 13, 6, NULL),
(38, '2022-07-11-15:26:06-318', 'ingredientes', 14, 6, NULL),
(41, '2022-07-11-15:26:06-318', 'adicionais', 23, 9, NULL),
(42, '2022-07-11-22:22:22-383', 'adicionais', 13, 10, NULL),
(43, '2022-07-11-22:22:22-383', 'adicionais', 20, 11, NULL),
(44, '2022-07-11-22:22:22-383', 'adicionais', 12, 13, NULL),
(46, '2022-07-11-22:22:22-383', 'ingredientes', 13, 13, NULL),
(47, '2022-07-11-22:22:22-383', 'adicionais', 14, 14, NULL),
(49, '2022-07-11-15:26:06-318', 'ingredientes', 27, 19, NULL),
(50, '2022-07-11-15:26:06-318', 'ingredientes', 28, 19, NULL),
(51, '2022-07-11-15:26:06-318', 'ingredientes', 29, 19, NULL),
(52, '2022-07-11-15:26:06-318', 'ingredientes', 26, 19, NULL),
(55, '2022-07-11-15:26:06-318', 'adicionais', 12, 20, NULL),
(58, '2022-07-11-15:26:06-318', 'ingredientes', 27, 21, NULL),
(59, '2022-07-11-15:26:06-318', 'ingredientes', 28, 21, NULL),
(61, '2022-07-11-15:26:06-318', 'adicionais', 19, 23, NULL),
(62, '2022-07-11-15:26:06-318', 'adicionais', 20, 24, NULL),
(64, '2022-07-11-15:26:06-318', 'adicionais', 14, 26, NULL),
(65, '2022-07-11-15:26:06-318', 'adicionais', 18, 30, NULL),
(66, '2022-07-11-15:26:06-318', 'ingredientes', 24, 30, NULL),
(67, '2022-07-11-15:26:06-318', 'adicionais', 13, 33, NULL),
(68, '2022-07-11-15:26:06-318', 'ingredientes', 13, 33, NULL),
(71, '2022-07-12-14:24:37-1178', 'adicionais', 19, 37, NULL),
(72, '2022-07-12-14:24:37-1178', 'ingredientes', 26, 37, NULL),
(73, '2022-07-12-15:19:50-1429', 'adicionais', 19, 39, NULL),
(74, '2022-07-11-15:26:06-318', 'adicionais', 20, 40, NULL),
(75, '2022-07-11-15:26:06-318', 'adicionais', 20, 42, NULL),
(76, '2022-07-12-17:54:03-421', 'adicionais', 22, 44, NULL),
(77, '2022-07-12-19:24:04-123', 'adicionais', 19, 46, NULL),
(78, '2022-07-12-19:27:02-977', 'adicionais', 12, 47, NULL),
(79, '2022-07-12-19:27:02-977', 'ingredientes', 14, 47, NULL),
(80, '2022-07-12-19:27:02-977', 'ingredientes', 15, 47, NULL),
(81, '2022-07-12-19:30:19-253', 'adicionais', 18, 48, NULL),
(82, '2022-07-12-19:30:19-253', 'ingredientes', 22, 48, NULL),
(83, '2022-07-12-19:34:55-25', 'adicionais', 17, 50, NULL),
(84, '2022-07-12-19:34:55-25', 'ingredientes', 22, 50, NULL),
(85, '2022-07-12-19:34:55-25', 'ingredientes', 23, 50, NULL),
(86, '2022-07-12-19:45:17-1422', 'adicionais', 20, 56, NULL),
(87, '2022-07-12-19:45:17-1422', 'ingredientes', 26, 56, NULL),
(88, '2022-07-12-19:45:17-1422', 'ingredientes', 27, 56, NULL),
(89, '2022-07-12-19:48:32-294', 'adicionais', 19, 58, NULL),
(90, '2022-07-12-19:48:32-294', 'ingredientes', 26, 58, NULL),
(91, '2022-07-12-20:30:13-615', 'adicionais', 15, 60, NULL),
(92, '2022-07-12-20:30:13-615', 'ingredientes', 18, 60, NULL),
(93, '2022-07-12-20:30:13-615', 'ingredientes', 19, 60, NULL),
(94, '2022-07-12-20:34:27-853', 'adicionais', 20, 61, NULL),
(95, '2022-07-12-20:34:27-853', 'ingredientes', 26, 61, NULL),
(96, '2022-07-12-20:38:08-88', 'adicionais', 19, 62, NULL),
(97, '2022-07-12-20:38:08-88', 'ingredientes', 26, 62, NULL),
(98, '2022-07-12-20:40:06-1402', 'adicionais', 6, 63, NULL),
(99, '2022-07-12-20:40:06-1402', 'adicionais', 7, 63, NULL),
(100, '2022-07-12-20:46:41-482', 'adicionais', 19, 65, NULL),
(101, '2022-07-12-20:46:41-482', 'ingredientes', 26, 65, NULL),
(102, '2022-07-12-20:46:41-482', 'ingredientes', 27, 65, NULL),
(104, '2022-07-12-21:40:59-594', 'adicionais', 20, 68, NULL),
(105, '2022-07-12-21:40:59-594', 'ingredientes', 26, 68, NULL),
(106, '2022-07-12-23:13:23-1401', 'adicionais', 20, 70, NULL),
(107, '2022-07-12-23:13:23-1401', 'ingredientes', 27, 70, NULL),
(108, '2022-07-12-23:13:23-1401', 'ingredientes', 28, 70, NULL),
(110, '2022-07-12-23:16:50-12', 'ingredientes', 27, 74, NULL),
(113, '2022-07-12-23:16:50-12', 'adicionais', 19, 74, NULL),
(114, '2022-07-12-23:16:50-12', 'adicionais', 17, 74, NULL),
(115, '2022-07-12-23:16:50-12', 'adicionais', 20, 74, NULL),
(116, '2022-07-13-09:41:32-435', 'adicionais', 19, 76, NULL),
(117, '2022-07-13-09:41:32-435', 'ingredientes', 27, 76, NULL),
(118, '2022-07-13-09:41:32-435', 'ingredientes', 28, 76, NULL),
(119, '2022-07-13-11:51:00-491', 'adicionais', 12, 77, NULL),
(120, '2022-07-13-11:51:00-491', 'adicionais', 22, 77, NULL),
(121, '2022-07-13-11:51:00-491', 'ingredientes', 13, 77, NULL),
(122, '2022-07-13-11:51:00-491', 'ingredientes', 14, 77, NULL),
(123, '2022-07-13-11:51:00-491', 'ingredientes', 15, 77, NULL),
(124, '2022-07-13-11:51:00-491', 'ingredientes', 16, 77, NULL),
(125, '2022-07-13-11:51:00-491', 'adicionais', 10, 79, NULL),
(126, '2022-07-13-11:51:00-491', 'ingredientes', 11, 79, NULL),
(127, '2022-07-13-11:54:47-125', 'adicionais', 17, 80, NULL),
(128, '2022-07-13-11:54:47-125', 'ingredientes', 22, 80, NULL),
(129, '2022-07-13-11:54:47-125', 'ingredientes', 23, 80, NULL),
(130, '2022-07-13-12:45:33-896', 'adicionais', 19, 85, NULL),
(131, '2022-07-13-14:28:40-1453', 'adicionais', 19, 86, NULL),
(132, '2022-07-13-14:28:40-1453', 'ingredientes', 26, 86, NULL),
(133, '2022-07-13-14:28:40-1453', 'ingredientes', 27, 86, NULL),
(134, '2022-07-13-14:32:19-536', 'adicionais', 12, 88, NULL),
(135, '2022-07-13-14:32:19-536', 'adicionais', 13, 88, NULL),
(136, '2022-07-13-14:32:19-536', 'adicionais', 10, 89, NULL),
(137, '2022-07-13-14:51:06-1384', 'adicionais', 19, 90, NULL),
(138, '2022-07-13-14:51:06-1384', 'ingredientes', 26, 90, NULL),
(139, '2022-07-13-14:51:06-1384', 'ingredientes', 27, 90, NULL),
(140, '2022-07-13-15:13:09-243', 'adicionais', 18, 92, NULL),
(141, '2022-07-13-15:13:09-243', 'ingredientes', 22, 92, NULL),
(142, '2022-07-13-15:13:09-243', 'ingredientes', 23, 92, NULL),
(143, '2022-07-13-15:13:09-243', 'adicionais', 10, 94, NULL),
(144, '2022-07-13-16:17:36-22', 'adicionais', 10, 96, NULL),
(145, '2022-07-15-15:33:58-1062', 'adicionais', 12, 98, NULL),
(146, '2022-07-16-13:58:59-921', 'adicionais', 19, 99, NULL),
(147, '2022-07-16-13:58:59-921', 'adicionais', 20, 99, NULL),
(148, '2022-07-16-13:58:59-921', 'ingredientes', 26, 99, NULL),
(149, '2022-07-16-13:58:59-921', 'ingredientes', 27, 99, NULL),
(150, '2022-07-16-13:58:59-921', 'ingredientes', 28, 99, NULL),
(151, '2022-07-16-13:58:59-921', 'ingredientes', 29, 99, NULL),
(152, '2022-07-16-13:58:59-921', 'adicionais', 12, 100, NULL),
(153, '2022-07-16-13:58:59-921', 'adicionais', 13, 100, NULL),
(154, '2022-07-16-13:58:59-921', 'adicionais', 22, 100, NULL),
(155, '2022-07-16-13:58:59-921', 'ingredientes', 13, 100, NULL),
(156, '2022-07-16-13:58:59-921', 'ingredientes', 14, 100, NULL),
(163, '2022-08-01-13:27:27-1233', 'adicionais', 13, 104, NULL),
(164, '2022-08-01-13:27:27-1233', 'adicionais', 12, 104, NULL),
(166, '2022-08-01-13:27:27-1233', 'adicionais', 13, 105, NULL),
(168, '2022-08-01-13:27:27-1233', 'adicionais', 13, 116, NULL),
(169, '2022-08-01-13:27:27-1233', 'ingredientes', 13, 116, NULL),
(170, '2022-08-01-13:27:27-1233', 'adicionais', 24, 119, NULL),
(171, '2022-08-01-13:27:27-1233', 'adicionais', 13, 120, NULL),
(172, '2022-08-01-13:27:27-1233', 'adicionais', 13, 122, NULL),
(173, '2022-08-01-13:27:27-1233', 'adicionais', 20, 130, NULL),
(174, '2022-08-01-17:41:02-1151', 'adicionais', 24, 132, NULL),
(175, '2022-08-01-17:41:02-1151', 'adicionais', 24, 133, NULL),
(176, '2022-08-01-17:41:02-1151', 'adicionais', 13, 134, NULL),
(177, '2022-08-01-17:41:02-1151', 'adicionais', 22, 146, NULL),
(178, '2022-08-01-17:41:02-1151', 'adicionais', 13, 146, NULL),
(179, '2022-08-01-17:41:02-1151', 'adicionais', 22, 147, NULL),
(180, '2022-08-01-19:01:03-746', 'adicionais', 13, 155, NULL),
(181, '2022-08-01-19:50:47-1308', 'adicionais', 24, 158, NULL),
(182, '2022-08-01-19:50:47-1308', 'adicionais', 13, 159, NULL),
(183, '2022-08-01-19:50:47-1308', 'adicionais', 22, 159, NULL),
(184, '2022-08-01-19:50:47-1308', 'ingredientes', 13, 159, NULL),
(185, '2022-08-01-19:50:47-1308', 'ingredientes', 14, 159, NULL),
(186, '2022-08-01-19:50:47-1308', 'ingredientes', 15, 159, NULL),
(187, '2022-08-01-20:09:04-1236', 'adicionais', 17, 162, NULL),
(188, '2022-08-01-20:09:04-1236', 'ingredientes', 22, 162, NULL),
(189, '2022-08-01-20:09:04-1236', 'ingredientes', 23, 162, NULL),
(190, '2022-08-01-20:09:04-1236', 'adicionais', 8, 163, NULL),
(191, '2022-08-01-20:09:04-1236', 'adicionais', 9, 163, NULL),
(192, '2022-08-01-20:09:04-1236', 'ingredientes', 9, 163, NULL),
(193, '2022-08-01-20:19:25-1386', 'adicionais', 22, 166, NULL),
(194, '2022-08-01-20:19:25-1386', 'ingredientes', 13, 166, NULL),
(195, '2022-08-01-20:19:25-1386', 'ingredientes', 14, 166, NULL),
(196, '2022-08-01-20:23:38-923', 'adicionais', 13, 169, NULL),
(197, '2022-08-01-20:23:38-923', 'ingredientes', 13, 169, NULL),
(198, '2022-08-01-20:23:38-923', 'ingredientes', 14, 169, NULL),
(199, '2022-08-02-09:06:48-369', 'adicionais', 13, 173, NULL),
(200, '2022-08-02-09:30:52-737', 'adicionais', 22, 175, NULL),
(287, '2022-10-14-23:08:01-252', 'adicionais', 24, 332, '2022-10-17'),
(289, '2022-10-14-23:08:01-252', 'adicionais', 24, 335, '2022-10-17'),
(291, '2022-10-14-23:08:01-252', 'adicionais', 13, 337, '2022-10-17'),
(292, '2022-10-14-23:08:01-252', 'adicionais', 22, 337, '2022-10-17'),
(293, '2022-10-14-23:08:01-252', 'adicionais', 24, 338, '2022-10-17'),
(294, '2022-10-14-23:08:01-252', 'adicionais', 24, 340, '2022-10-17'),
(296, '2022-10-14-23:08:01-252', 'adicionais', 12, 346, '2022-10-17'),
(297, '2022-10-14-23:08:01-252', 'adicionais', 24, 347, '2022-10-17'),
(298, '2022-10-14-23:08:01-252', 'adicionais', 13, 348, '2022-10-17'),
(299, '2022-10-17-20:10:18-1224', 'adicionais', 12, 351, '2022-10-17'),
(300, '2022-10-17-20:10:18-1224', 'ingredientes', 13, 351, '2022-10-17'),
(301, '2022-10-17-20:10:18-1224', 'adicionais', 24, 352, '2022-10-17'),
(302, '2022-10-17-20:10:18-1224', 'adicionais', 22, 353, '2022-10-17'),
(303, '2022-10-17-20:13:12-448', 'adicionais', 19, 355, '2022-10-17'),
(304, '2022-10-17-20:13:12-448', 'ingredientes', 26, 355, '2022-10-17'),
(305, '2022-10-17-20:13:12-448', 'adicionais', 19, 361, '2022-10-17'),
(306, '2022-10-17-20:30:07-1261', 'adicionais', 20, 366, '2022-10-17'),
(307, '2022-10-17-20:39:55-464', 'adicionais', 19, 367, '2022-10-17'),
(308, '2022-10-17-20:43:41-365', 'adicionais', 18, 369, '2022-10-17'),
(309, '2022-10-17-20:43:41-365', 'ingredientes', 25, 369, '2022-10-17'),
(310, '2022-10-17-20:45:28-233', 'adicionais', 20, 370, '2022-10-17'),
(311, '2022-10-17-20:47:10-505', 'adicionais', 17, 372, '2022-10-17'),
(312, '2022-10-17-20:47:10-505', 'ingredientes', 22, 372, '2022-10-17'),
(313, '2022-10-17-23:12:23-1301', 'adicionais', 20, 374, '2022-10-17'),
(314, '2022-10-17-23:37:59-142', 'adicionais', 20, 379, '2022-10-17'),
(315, '2022-10-17-23:38:34-1311', 'adicionais', 24, 380, '2022-10-17'),
(316, '2022-10-17-23:38:34-1311', 'adicionais', 13, 381, '2022-10-17'),
(317, '2022-10-17-23:38:34-1311', 'adicionais', 8, 384, '2022-10-17'),
(318, '2022-10-17-23:42:45-730', 'ingredientes', 26, 388, '2022-10-17'),
(319, '2022-10-17-23:42:45-730', 'adicionais', 20, 388, '2022-10-17'),
(320, '2022-10-17-23:44:44-985', 'adicionais', 16, 389, '2022-10-17'),
(321, '2022-10-17-23:44:44-985', 'ingredientes', 18, 389, '2022-10-17'),
(322, '2022-10-17-23:45:54-1269', 'adicionais', 15, 390, '2022-10-17'),
(323, '2022-10-18-12:04:07-995', 'adicionais', 19, 398, '2022-10-18'),
(324, '2022-10-18-12:04:07-995', 'ingredientes', 26, 398, '2022-10-18'),
(325, '2022-10-18-12:21:34-1070', 'adicionais', 20, 399, '2022-10-18'),
(326, '2022-10-18-12:24:53-1245', 'adicionais', 19, 401, '2022-10-18'),
(327, '2022-10-18-12:31:52-1444', 'adicionais', 13, 406, '2022-10-18'),
(328, '2022-10-18-12:31:52-1444', 'ingredientes', 13, 406, '2022-10-18'),
(329, '2022-10-18-12:38:59-566', 'adicionais', 17, 409, '2022-10-18'),
(330, '2022-10-18-12:55:23-1120', 'adicionais', 19, 411, '2022-10-18'),
(331, '2022-10-18-12:55:23-1120', 'ingredientes', 29, 411, '2022-10-18'),
(332, '2022-10-18-13:01:45-359', 'adicionais', 19, 412, '2022-10-18'),
(333, '2022-10-18-13:01:45-359', 'ingredientes', 26, 412, '2022-10-18'),
(334, '2022-10-18-14:03:51-295', 'adicionais', 17, 415, '2022-10-18'),
(335, '2022-10-18-14:22:49-256', 'adicionais', 19, 417, '2022-10-18'),
(336, '2022-10-18-14:22:49-256', 'ingredientes', 26, 417, '2022-10-18'),
(337, '2022-10-18-14:22:49-256', 'ingredientes', 27, 417, '2022-10-18'),
(338, '2022-10-18-14:22:49-256', 'adicionais', 24, 419, '2022-10-18'),
(339, '2022-10-18-14:22:49-256', 'adicionais', 12, 420, '2022-10-18'),
(342, '2022-10-18-14:27:00-714', 'adicionais', 17, 422, '2022-10-18'),
(343, '2022-10-18-14:27:00-714', 'adicionais', 24, 424, '2022-10-18'),
(344, '2022-10-18-14:27:00-714', 'adicionais', 12, 425, '2022-10-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `senha` varchar(35) NOT NULL,
  `senha_crip` varchar(100) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `data` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `tipo_chave` varchar(35) DEFAULT NULL,
  `chave_pix` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `senha`, `senha_crip`, `nivel`, `ativo`, `data`, `foto`, `telefone`, `tipo_chave`, `chave_pix`) VALUES
(1, 'Administrador', 'leonardo@msilvadev.com.br', '000.000.000-00', '123', '202cb962ac59075b964b07152d234b70', 'Administrador', 'Sim', '2022-07-04', '04-07-2022-19-58-19-c2.jpg', '(16) 3600-9697', NULL, NULL),
(5, 'Atendente', 'atendente@hotmail.com', '555.555.555-56', '123', '202cb962ac59075b964b07152d234b70', 'Atendente', 'Sim', '2022-07-05', '05-07-2022-11-25-11-about-img.jpg', '(55) 55555-5556', 'Email', 'atendente@hotmail.com'),
(6, 'Gerente', 'gerente@hotmail.com', '555.555.555-57', '123', '202cb962ac59075b964b07152d234b70', 'Gerente', 'Sim', '2022-07-05', '05-07-2022-11-16-29-c1.jpg', '(55) 55555-5559', 'CPF', '555.555.555-57'),
(8, 'Balconista Teste', 'balconista@hotmail.com', '222.222.222-22', '123', '202cb962ac59075b964b07152d234b70', 'Atendente', 'Sim', '2022-07-06', 'sem-foto.jpg', '(14) 52222-2222', 'Código', '013525555');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_permissoes`
--

CREATE TABLE `usuarios_permissoes` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_permissoes`
--

INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 4),
(4, 5, 3),
(5, 5, 8),
(6, 5, 9),
(7, 5, 14),
(8, 5, 19),
(9, 5, 20),
(11, 6, 1),
(12, 6, 2),
(13, 6, 3),
(14, 6, 4),
(15, 6, 5),
(16, 6, 6),
(17, 6, 7),
(18, 6, 8),
(19, 6, 9),
(20, 6, 10),
(21, 6, 11),
(22, 6, 12),
(23, 6, 13),
(24, 6, 14),
(25, 6, 15),
(26, 6, 16),
(31, 6, 21),
(32, 6, 22),
(33, 6, 23),
(34, 6, 24),
(36, 6, 25),
(37, 8, 2),
(38, 8, 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `variacoes`
--

CREATE TABLE `variacoes` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `sigla` varchar(5) NOT NULL,
  `nome` varchar(35) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `valor` decimal(8,2) NOT NULL,
  `ativo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `variacoes`
--

INSERT INTO `variacoes` (`id`, `produto`, `sigla`, `nome`, `descricao`, `valor`, `ativo`) VALUES
(2, 4, 'M', 'Médio', '25CM', '35.00', 'Sim'),
(3, 0, 'f', 'f', 'f', '50.00', 'Sim'),
(4, 0, 'M', 'Média', '6 Fatias', '30.00', 'Sim'),
(12, 3, '300ML', 'Pequeno', 'Pote de 300 ML', '15.00', 'Sim'),
(13, 3, '500ML', 'Médio', 'Pote de 500 ML', '20.00', 'Sim'),
(14, 3, '700ML', 'Grande', 'Pote de 500 ML', '25.00', 'Sim'),
(15, 1, '300ML', 'Pequena', 'Vitamina 300 ML', '10.00', 'Sim'),
(16, 1, '500ML', 'Média', 'Vitamina de 500 ML', '18.00', 'Sim'),
(18, 16, 'M', 'Média', '6 Fatias', '30.00', 'Sim'),
(19, 16, 'G', 'Grande', '8 Fatias', '35.00', 'Sim'),
(20, 14, 'P', 'Pequena', '4 Fatias', '25.00', 'Sim'),
(21, 14, 'M', 'Média', '6 Fatias', '30.00', 'Sim'),
(22, 14, 'G', 'Grande', '8 Fatias', '35.00', 'Sim'),
(23, 16, 'P', 'Pequena', '4 Fatias', '28.00', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `total_pago` decimal(8,2) NOT NULL,
  `troco` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` varchar(25) NOT NULL,
  `pago` varchar(5) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `taxa_entrega` decimal(8,2) NOT NULL,
  `tipo_pgto` varchar(25) NOT NULL,
  `usuario_baixa` int(11) NOT NULL,
  `entrega` varchar(25) NOT NULL,
  `mesa` varchar(15) DEFAULT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `cliente`, `valor`, `total_pago`, `troco`, `data`, `hora`, `status`, `pago`, `obs`, `taxa_entrega`, `tipo_pgto`, `usuario_baixa`, `entrega`, `mesa`, `nome_cliente`) VALUES
(17, 1, '39.00', '40.00', '1.00', '2022-07-12', '19:27:28', 'Finalizado', 'Sim', 'teste', '4.00', 'Dinheiro', 0, 'Delivery', NULL, NULL),
(19, 10, '43.00', '43.00', '0.00', '2022-07-12', '19:35:56', 'Finalizado', 'Sim', 'obs do pedido', '5.00', 'Pix', 0, 'Delivery', NULL, NULL),
(20, 1, '18.00', '18.00', '0.00', '2022-07-12', '19:38:07', 'Finalizado', 'Sim', '', '4.00', 'Cartão de Débito', 0, 'Delivery', NULL, NULL),
(23, 1, '5.00', '5.00', '0.00', '2022-07-12', '19:44:44', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Retirar', NULL, NULL),
(24, 1, '38.00', '38.00', '0.00', '2022-07-12', '19:46:09', 'Finalizado', 'Sim', '', '4.00', 'Pix', 0, 'Delivery', NULL, NULL),
(25, 1, '34.00', '34.00', '0.00', '2022-07-12', '19:48:58', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Retirar', NULL, NULL),
(26, 1, '68.00', '68.00', '0.00', '2022-07-12', '20:31:20', 'Finalizado', 'Sim', '', '4.00', 'Pix', 0, 'Delivery', NULL, NULL),
(27, 1, '38.90', '38.90', '0.00', '2022-07-12', '20:34:05', 'Finalizado', 'Sim', 'Ddadsd', '4.00', 'Pix', 0, 'Delivery', NULL, NULL),
(28, 1, '29.00', '29.00', '0.00', '2022-07-12', '20:34:45', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Retirar', NULL, NULL),
(29, 1, '58.00', '58.00', '0.00', '2022-07-12', '20:38:26', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Retirar', NULL, NULL),
(30, 1, '20.00', '20.00', '0.00', '2022-07-12', '20:40:22', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', NULL, NULL),
(31, 1, '9.00', '9.00', '0.00', '2022-07-12', '20:45:57', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', NULL, NULL),
(32, 1, '33.00', '33.00', '0.00', '2022-07-12', '20:47:01', 'Finalizado', 'Sim', '', '4.00', 'Cartão de Crédito', 0, 'Delivery', NULL, NULL),
(33, 1, '16.00', '16.00', '0.00', '2022-07-12', '20:47:50', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', NULL, NULL),
(34, 1, '29.00', '29.00', '0.00', '2022-07-12', '21:41:34', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Retirar', NULL, NULL),
(36, 11, '58.00', '58.00', '0.00', '2022-07-12', '23:13:48', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Débito', 1, 'Retirar', NULL, NULL),
(39, 12, '38.00', '38.00', '0.00', '2022-07-13', '09:38:13', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', NULL, NULL),
(40, 13, '39.00', '50.00', '11.00', '2022-07-13', '09:44:30', 'Finalizado', 'Sim', '', '5.00', 'Dinheiro', 0, 'Delivery', NULL, NULL),
(41, 8, '105.80', '150.00', '44.20', '2022-07-13', '11:52:53', 'Finalizado', 'Sim', '', '6.00', 'Dinheiro', 0, 'Delivery', NULL, NULL),
(43, 14, '14.00', '14.00', '0.00', '2022-07-13', '11:57:05', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', NULL, NULL),
(44, 8, '35.00', '35.00', '0.00', '2022-07-13', '12:46:05', 'Finalizado', 'Sim', '', '6.00', 'Pix', 0, 'Delivery', NULL, NULL),
(45, 1, '43.00', '43.00', '0.00', '2022-07-13', '14:30:44', 'Finalizado', 'Sim', 'Adggdgyyh', '4.00', 'Pix', 0, 'Delivery', NULL, NULL),
(46, 15, '45.00', '50.00', '5.00', '2022-07-13', '14:33:23', 'Finalizado', 'Sim', '', '0.00', 'Dinheiro', 0, 'Retirar', NULL, NULL),
(47, 1, '72.00', '100.00', '28.00', '2022-07-13', '14:53:28', 'Finalizado', 'Sim', '', '4.00', 'Dinheiro', 0, 'Delivery', NULL, NULL),
(48, 16, '52.00', '100.00', '48.00', '2022-07-13', '15:14:48', 'Finalizado', 'Sim', '', '3.00', 'Dinheiro', 0, 'Delivery', NULL, NULL),
(49, 11, '38.00', '38.00', '0.00', '2022-07-15', '15:34:33', 'Finalizado', 'Sim', '', '3.00', 'Pix', 0, 'Delivery', NULL, NULL),
(50, 8, '109.90', '150.00', '40.10', '2022-07-16', '13:59:49', 'Finalizado', 'Sim', '', '6.00', 'Dinheiro', 0, 'Delivery', NULL, NULL),
(51, 8, '36.00', '50.00', '14.00', '2022-07-16', '18:17:44', 'Finalizado', 'Sim', '', '6.00', 'Dinheiro', 0, 'Delivery', NULL, NULL),
(58, 8, '43.90', '150.00', '106.10', '2022-08-01', '20:20:29', 'Finalizado', 'Sim', '', '6.00', 'Dinheiro', 0, 'Delivery', NULL, NULL),
(60, 1, '33.00', '33.00', '0.00', '2022-08-02', '09:08:13', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Retirar', NULL, NULL),
(73, 0, '30.00', '50.00', '20.00', '2022-09-05', '18:39:28', 'Finalizado', 'Sim', '', '0.00', 'Dinheiro', 0, 'Consumir Local', '05', 'Nome Cliente '),
(74, 0, '37.00', '37.00', '0.00', '2022-09-05', '18:42:18', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '02', ''),
(75, 0, '12.00', '12.00', '0.00', '2022-09-05', '18:42:51', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Débito', 0, 'Consumir Local', '06', ''),
(76, 20, '35.00', '35.00', '0.00', '2022-09-05', '18:43:59', 'Finalizado', 'Sim', '', '5.00', 'Pix', 0, 'Delivery', '', 'Testess'),
(77, 20, '28.00', '28.00', '0.00', '2022-09-05', '18:44:59', 'Finalizado', 'Sim', '', '5.00', 'Cartão de Crédito', 0, 'Delivery', '', 'Testess'),
(78, 1, '35.00', '50.00', '15.00', '2022-09-05', '18:45:45', 'Finalizado', 'Sim', '', '4.00', 'Dinheiro', 0, 'Delivery', '', 'Cliente 1'),
(79, 0, '25.00', '25.00', '0.00', '2022-09-05', '18:55:51', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Retirar', '0', 'João Silva'),
(94, 0, '25.00', '25.00', '0.00', '2022-09-05', '20:16:27', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', '03', ''),
(95, 0, '20.00', '20.00', '0.00', '2022-09-05', '20:25:00', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '02', ''),
(96, 0, '7.00', '7.00', '0.00', '2022-09-05', '20:27:58', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '02', ''),
(97, 0, '25.00', '25.00', '0.00', '2022-09-05', '20:58:26', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', '02', ''),
(98, 0, '5.00', '10.00', '5.00', '2022-09-05', '20:59:00', 'Finalizado', 'Sim', '', '0.00', 'Dinheiro', 0, 'Retirar', '0', 'aaafsfsadfas'),
(99, 20, '35.00', '35.00', '0.00', '2022-09-05', '21:03:49', 'Finalizado', 'Sim', '', '5.00', 'Pix', 0, 'Delivery', '', 'Testess'),
(100, 22, '14.00', '14.00', '0.00', '2022-09-05', '21:04:49', 'Finalizado', 'Sim', '', '5.00', 'Cartão de Crédito', 0, 'Delivery', '', 'ASsddssdfdsf'),
(101, 23, '6.00', '6.00', '0.00', '2022-09-21', '19:49:09', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Retirar', '', 'Teste'),
(103, 23, '25.00', '25.00', '0.00', '2022-09-21', '20:06:57', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', '', 'Teste'),
(104, 23, '25.00', '25.00', '0.00', '2022-09-21', '20:08:11', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Retirar', '', 'Teste'),
(105, 0, '5.00', '5.00', '0.00', '2022-10-14', '15:50:36', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 1, 'Consumir Local', '04', 'testeee'),
(106, 1, '5.00', '5.00', '0.00', '2022-10-14', '22:58:28', 'Iniciado', 'Não', '', '0.00', 'Pix', 0, 'Consumir Local', '', 'Cliente 1'),
(107, 1, '5.00', '5.00', '0.00', '2022-10-14', '22:59:39', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', '', 'Cliente 1'),
(108, 0, '83.00', '83.00', '0.00', '2022-10-17', '19:51:32', 'Finalizado', 'Sim', '', '6.00', 'Cartão de Crédito', 0, 'Delivery', '0', ''),
(109, 0, '108.90', '108.90', '0.00', '2022-10-17', '20:12:00', 'Finalizado', 'Sim', '', '4.00', 'Cartão de Débito', 0, 'Delivery', '0', 'Cliente 1'),
(110, 0, '117.00', '117.00', '0.00', '2022-10-17', '20:27:25', 'Finalizado', 'Sim', '', '5.00', 'Pix', 0, 'Delivery', '0', 'Marcos Teste'),
(111, 0, '32.00', '32.00', '0.00', '2022-10-17', '20:30:44', 'Finalizado', 'Sim', '', '3.00', 'Cartão de Crédito', 0, 'Delivery', '0', 'Pedro Teeste'),
(112, 26, '40.00', '40.00', '0.00', '2022-10-17', '20:40:53', 'Finalizado', 'Sim', '', '5.00', 'Cartão de Crédito', 0, 'Delivery', '0', 'Marcela Teste'),
(113, 27, '32.00', '32.00', '0.00', '2022-10-17', '20:44:13', 'Iniciado', 'Não', '', '5.00', 'Cartão de Crédito', 0, 'Delivery', '0', 'Paula Teste'),
(114, 28, '39.00', '39.00', '0.00', '2022-10-17', '20:46:04', 'Iniciado', 'Não', '', '5.00', 'Cartão de Crédito', 0, 'Delivery', '0', 'Marta Silva'),
(115, 1, '25.00', '25.00', '0.00', '2022-10-17', '23:03:21', 'Iniciado', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '0', ''),
(116, 0, '0.00', '0.00', '0.00', '2022-10-17', '23:07:29', 'Iniciado', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '01', ''),
(117, 29, '39.00', '39.00', '0.00', '2022-10-17', '23:14:55', 'Iniciado', 'Não', '', '5.00', 'Cartão de Débito', 0, 'Delivery', '', ''),
(118, 1, '9.00', '9.00', '0.00', '2022-10-17', '23:21:54', 'Iniciado', 'Não', '', '4.00', 'Cartão de Crédito', 0, 'Delivery', '', ''),
(119, 1, '5.00', '5.00', '0.00', '2022-10-17', '23:27:53', 'Iniciado', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', ''),
(120, 1, '5.00', '5.00', '0.00', '2022-10-17', '23:37:33', 'Iniciado', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(121, 0, '29.00', '29.00', '0.00', '2022-10-17', '23:38:14', 'Iniciado', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '02', 'Teste'),
(122, 0, '63.00', '63.00', '0.00', '2022-10-17', '23:39:14', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Débito', 0, 'Consumir Local', '04', 'Teste'),
(123, 30, '35.00', '50.00', '15.00', '2022-10-17', '23:41:32', 'Entrega', 'Não', '', '5.00', 'Dinheiro', 0, 'Delivery', '', 'Teste Cliente'),
(124, 1, '33.00', '33.00', '0.00', '2022-10-17', '23:43:04', 'Iniciado', 'Não', '', '4.00', 'Cartão de Crédito', 0, 'Delivery', '', 'Leonardo Silva'),
(125, 1, '34.00', '34.00', '0.00', '2022-10-17', '23:44:58', 'Iniciado', 'Não', '', '0.00', 'Cartão de Débito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(126, 1, '32.00', '32.00', '0.00', '2022-10-17', '23:46:07', 'Iniciado', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(127, 1, '5.00', '5.00', '0.00', '2022-10-18', '10:48:26', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(128, 1, '5.00', '5.00', '0.00', '2022-10-18', '10:50:24', 'Entrega', 'Não', '', '0.00', 'Cartão de Débito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(129, 1, '5.00', '5.00', '0.00', '2022-10-18', '10:55:13', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(130, 1, '11.00', '11.00', '0.00', '2022-10-18', '11:53:56', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(131, 1, '5.00', '5.00', '0.00', '2022-10-18', '11:57:44', 'Entrega', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(132, 1, '6.00', '6.00', '0.00', '2022-10-18', '11:58:48', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Retirar', '', 'Leonardo Silva'),
(133, 1, '29.00', '29.00', '0.00', '2022-10-18', '12:04:26', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(134, 1, '35.00', '35.00', '0.00', '2022-10-18', '12:22:19', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', '', 'Leonardo Silva'),
(135, 1, '47.00', '47.00', '0.00', '2022-10-18', '12:25:27', 'Finalizado', 'Sim', '', '0.00', 'Pix', 0, 'Consumir Local', '', 'Leonardo Silva'),
(136, 1, '35.00', '35.00', '0.00', '2022-10-18', '12:29:28', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(137, 1, '48.00', '48.00', '0.00', '2022-10-18', '12:32:27', 'Finalizado', 'Sim', '', '0.00', 'Cartão de Crédito', 0, 'Retirar', '', 'Leonardo Silva'),
(138, 1, '33.00', '33.00', '0.00', '2022-10-18', '12:39:22', 'Entrega', 'Não', '', '0.00', 'Cartão de Débito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(139, 1, '33.00', '33.00', '0.00', '2022-10-18', '12:55:42', 'Finalizado', 'Sim', '', '4.00', 'Cartão de Crédito', 0, 'Delivery', '', 'Leonardo Silva'),
(140, 1, '72.00', '72.00', '0.00', '2022-10-18', '13:02:24', 'Finalizado', 'Sim', '', '4.00', 'Cartão de Crédito', 0, 'Delivery', '', 'Leonardo Silva'),
(141, 1, '23.00', '23.00', '0.00', '2022-10-18', '14:00:58', 'Iniciado', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(142, 1, '33.00', '33.00', '0.00', '2022-10-18', '14:04:12', 'Entrega', 'Não', '', '0.00', 'Cartão de Crédito', 0, 'Consumir Local', '', 'Leonardo Silva'),
(143, 1, '83.00', '83.00', '0.00', '2022-10-18', '14:25:32', 'Entrega', 'Não', '', '4.00', 'Cartão de Crédito', 0, 'Delivery', '', 'Leonardo Silva'),
(144, 1, '77.00', '77.00', '0.00', '2022-10-18', '14:27:44', 'Preparando', 'Não', '', '4.00', 'Cartão de Crédito', 0, 'Delivery', '', 'Leonardo Silva');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adicionais`
--
ALTER TABLE `adicionais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `banner_rotativo`
--
ALTER TABLE `banner_rotativo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupo_acessos`
--
ALTER TABLE `grupo_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagar`
--
ALTER TABLE `pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `receber`
--
ALTER TABLE `receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `saidas`
--
ALTER TABLE `saidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios_permissoes`
--
ALTER TABLE `usuarios_permissoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `variacoes`
--
ALTER TABLE `variacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `adicionais`
--
ALTER TABLE `adicionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `banner_rotativo`
--
ALTER TABLE `banner_rotativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `grupo_acessos`
--
ALTER TABLE `grupo_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pagar`
--
ALTER TABLE `pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `receber`
--
ALTER TABLE `receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `saidas`
--
ALTER TABLE `saidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios_permissoes`
--
ALTER TABLE `usuarios_permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `variacoes`
--
ALTER TABLE `variacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
