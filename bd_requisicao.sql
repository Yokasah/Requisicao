-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jul-2021 às 15:28
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_requisicao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `combustivel`
--

CREATE TABLE `combustivel` (
  `id_combustivel` int(11) NOT NULL,
  `nome_combustivel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `combustivel`
--

INSERT INTO `combustivel` (`id_combustivel`, `nome_combustivel`) VALUES
(1, 'DIESEL\r\n'),
(2, 'GASOLINA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nome_marca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `nome_marca`) VALUES
(1, 'RENAULT'),
(2, 'OPEL'),
(3, 'FORD'),
(4, 'PEUGEOT'),
(5, 'TOYOTA'),
(6, 'VOLKSWAGEN'),
(7, 'CITROËN'),
(8, 'FIAT'),
(9, 'MERCEDEZ-BENZ'),
(10, 'TESTE\r\n'),
(11, 'NISSAN'),
(12, 'MITSUBUSHI'),
(13, 'HYUNDAI\r\n'),
(14, 'IZUSU');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nome_modelo` varchar(255) NOT NULL,
  `marca_modelo` varchar(255) NOT NULL,
  `combustivel_modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nome_modelo`, `marca_modelo`, `combustivel_modelo`) VALUES
(1, 'FOCUS', '3', 1),
(2, 'MEGANE', '1', 1),
(3, 'C4', '9', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicao`
--

CREATE TABLE `requisicao` (
  `id_requisicao` int(11) NOT NULL,
  `requisitante_requisicao` varchar(255) NOT NULL,
  `veiculo_requisicao` int(11) NOT NULL,
  `estado_requisicao` varchar(255) NOT NULL,
  `lotacao_requisicao` varchar(255) NOT NULL,
  `data_inicial_requisicao` date NOT NULL,
  `data_final_requisicao` date NOT NULL,
  `hora_inicial_requisicao` time NOT NULL DEFAULT current_timestamp(),
  `hora_final_requisicao` time NOT NULL DEFAULT current_timestamp(),
  `destino_requisicao` varchar(255) NOT NULL,
  `descricao_inicial_requisicao` varchar(255) NOT NULL,
  `descricao_final_requisicao` varchar(255) NOT NULL,
  `autorizacao_requisicao` varchar(255) NOT NULL,
  `km_realizados_requisicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `requisicao`
--

INSERT INTO `requisicao` (`id_requisicao`, `requisitante_requisicao`, `veiculo_requisicao`, `estado_requisicao`, `lotacao_requisicao`, `data_inicial_requisicao`, `data_final_requisicao`, `hora_inicial_requisicao`, `hora_final_requisicao`, `destino_requisicao`, `descricao_inicial_requisicao`, `descricao_final_requisicao`, `autorizacao_requisicao`, `km_realizados_requisicao`) VALUES
(1, 'Viaturas Esco', 1, '0', '4', '2021-07-02', '2021-07-02', '12:40:00', '12:40:00', 'Teste', 'Teste', '0', '0', 0),
(2, 'Viaturas Esco', 1, '0', '4', '2021-07-24', '2021-07-05', '12:01:00', '12:04:00', 'Teste', 'Teste', '0', '0', 0),
(3, 'Viaturas Esco', 1, '1', '4', '2021-07-05', '2021-07-05', '12:06:00', '12:05:00', 'teste', 'teste', '0', '0', 0),
(4, 'Viaturas Esco', 1, '0', '4', '2021-07-05', '2021-07-05', '15:05:00', '16:05:00', 'Teste', 'Teste', '0', '0', 0),
(5, 'Viaturas Esco', 2, '0', '2', '2021-07-05', '2021-07-05', '15:45:00', '16:45:00', 'Vila Franca de Xira', 'Estágio', '0', '0', 0),
(6, 'Viaturas Esco', 1, '3', '2', '2021-07-10', '2021-07-17', '13:48:00', '13:48:00', 'Teste', 'Teste', '0', '0', 0),
(7, 'Viaturas Esco', 1, '0', '3', '2021-07-05', '2021-07-05', '13:52:00', '13:54:00', 'Teste', 'Teste', '0', '0', 0),
(8, 'Viaturas Esco', 1, '2', '2', '2021-07-05', '2021-07-05', '13:52:00', '13:54:00', 'Teste', 'Teste', '0', '0', 0),
(9, 'Viaturas Esco', 1, '1', '3', '2021-07-05', '2021-07-05', '16:50:00', '18:50:00', 'Teste', 'Teste', '0', '0', 0),
(10, 'Tomas Morais', 2, '1', '2', '2021-07-05', '2021-07-05', '14:27:00', '19:27:00', 'Vila Franca de Xira', 'Teste', '0', '0', 0),
(11, 'Tomas Morais', 2, '1', '4', '2021-08-15', '2021-08-17', '14:27:00', '19:27:00', 'Vila Franca de Xira', 'Teste', '0', '0', 0),
(12, 'Tomas Morais', 1, '1', '4', '2021-07-14', '2021-07-14', '16:30:00', '18:40:00', 'Sobral', 'Estágios', '0', '0', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id_veiculo` int(11) NOT NULL,
  `matricula_veiculo` varchar(255) NOT NULL,
  `marca_veiculo` varchar(255) NOT NULL,
  `modelo_veiculo` varchar(255) NOT NULL,
  `combustivel_veiculo` varchar(255) NOT NULL,
  `estado_veiculo` varchar(255) NOT NULL,
  `ano_veiculo` varchar(255) NOT NULL,
  `km_total_veiculo` int(11) NOT NULL,
  `data_seguro_veiculo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_inspecao_veiculo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id_veiculo`, `matricula_veiculo`, `marca_veiculo`, `modelo_veiculo`, `combustivel_veiculo`, `estado_veiculo`, `ano_veiculo`, `km_total_veiculo`, `data_seguro_veiculo`, `data_inspecao_veiculo`) VALUES
(1, 'AN-33-EQ', 'FORD', 'FOCUS', 'Gasoleo', '0', '2018', 123523, '2021-06-21 10:24:50', '2021-06-30 10:24:50'),
(2, 'AB-87-PQ', 'CITROEN', 'C3', 'Gasoleo', '0', '2019', 12543, '2021-06-06 10:25:31', '2021-06-30 10:25:31');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `combustivel`
--
ALTER TABLE `combustivel`
  ADD PRIMARY KEY (`id_combustivel`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`,`nome_marca`);

--
-- Índices para tabela `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `combo` (`combustivel_modelo`);

--
-- Índices para tabela `requisicao`
--
ALTER TABLE `requisicao`
  ADD PRIMARY KEY (`id_requisicao`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id_veiculo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `combustivel`
--
ALTER TABLE `combustivel`
  MODIFY `id_combustivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `requisicao`
--
ALTER TABLE `requisicao`
  MODIFY `id_requisicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
