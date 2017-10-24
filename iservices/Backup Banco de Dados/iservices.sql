-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Out-2017 às 00:58
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iservices`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `voto` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `confirmasenha` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `avaliacao` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `cnpj`, `senha`, `confirmasenha`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `latitude`, `longitude`, `avaliacao`) VALUES
(8, 'SOS ServiÃ§os LTDA', '78738328000105', '1234', '1234', 'Eldorado', '345', 'Loja 4', 'Gavea II', 'Vespasiano', 'MG', '33200123', '(31)3447-6220', '', '', 0),
(9, 'Carlos Eduardo', '55774759000113', '1234', '1234', 'R. PlÃ¡tano', '345', 'Loja B', 'Gavea', 'Vespasiano', 'MINAS GERAIS', '33200324', '(31)3564-9889', '', '', 0),
(10, 'ServiÃ§os LTDA', '16313244000164', '1234', '1234', 'Paqueta', '550', 'Sala 24', 'Santa Cruz', 'Vespasiano', 'Minas Gerais', '31655530', '(31)3446-7556', '', '', 0),
(11, 'TSX ServiÃ§os', '01874724000127', '1234', '1234', 'R. PlÃ¡tano', '234', 'Andar 4Âº', 'Gavea II', 'Vespasiano', 'MINAS GERAIS', '33200145', '(31)3564-9065', '', '', 0),
(20, 'Gustavo ltda', '07392110640', 'guga100', 'guga100', 'Principal', '231', 'Bloco 07', 'Bernardo de Souza', 'Vespasiano', 'Minas Gerais', '33200000', '31994279594', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `idServico` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `preco` double NOT NULL,
  `dataPreco` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`idContrato`, `idServico`, `idUsuario`, `idCliente`, `preco`, `dataPreco`, `status`) VALUES
(1, 53, 14, 11, 0, '0000-00-00', 0),
(2, 49, 14, 9, 0, '0000-00-00', 0),
(3, 53, 14, 11, 0, '0000-00-00', 0),
(4, 47, 14, 8, 0, '0000-00-00', 0),
(5, 52, 14, 11, 0, '0000-00-00', 0),
(6, 53, 14, 11, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `tiposervico` varchar(255) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ativo` int(1) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idServico`, `tiposervico`, `valor`, `descricao`, `ativo`, `idcliente`) VALUES
(44, 'Eletricista', '30.00', 'Aceito orÃ§amentos.', 0, 8),
(45, 'Encanador', '320.00', 'OfereÃ§o o melhor preÃ§o e serviÃ§o.', 0, 8),
(47, 'Bombeiro HidrÃ¡ulico', '0.00', 'Aceito propostas.', 0, 8),
(49, 'MecÃ¢nico Automotivo', '20.00', 'Aceito propostas.', 0, 9),
(50, 'Eletricista', '35.00', 'OfereÃ§o o melhor preÃ§o e serviÃ§o.', 0, 9),
(51, 'Eletricista', '45.00', 'OfereÃ§o o melhor preÃ§o e serviÃ§o.', 0, 10),
(52, 'MecÃ¢nico Automotivo', '67.00', 'Aceito propostas.', 0, 11),
(53, 'Bombeiro HidrÃ¡ulico', '46.00', 'Realizo um serviÃ§o de qualidade.', 0, 11),
(54, 'Eletricista', '45.00', 'Aceito propostas.', 0, 11),
(56, 'BabÃ¡', '30.00', 'Gustavo Borges', 0, 20),
(58, 'Eletricista', '50.00', 'Teste', 0, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(255) CHARACTER SET latin1 NOT NULL,
  `confirmasenha` varchar(255) CHARACTER SET latin1 NOT NULL,
  `logradouro` varchar(255) CHARACTER SET latin1 NOT NULL,
  `numero` varchar(255) CHARACTER SET latin1 NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cidade` varchar(255) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(255) NOT NULL,
  `telefone` varchar(255) CHARACTER SET latin1 NOT NULL,
  `thumb` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `senha`, `confirmasenha`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `thumb`, `latitude`, `longitude`) VALUES
(14, 'Gustavo Borges', 'guga100@yahoo.com.br', '1234', '1234', 'Principal', '231', 'APT 301', 'Bernardo de Souza', 'Vespasiano', 'MG', '33200000', '(31)99427-9594', NULL, 0.000000, 0.000000),
(15, 'Gustavo Silveira Borges', 'eusou@eusou.com.br', 'guga100', 'guga100', 'Principal', '231', 'Bloco 07', 'Bernardo de Souza', 'Vespasiano', 'Minas Gerais', '33200000', '31994279594', NULL, 0.000000, 0.000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`),
  ADD KEY `idServico_pk` (`idServico`) USING BTREE,
  ADD KEY `idUsuario_pk` (`idUsuario`) USING BTREE,
  ADD KEY `idCliente_fk` (`idCliente`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`),
  ADD KEY `idCliente_fk` (`idcliente`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `idCliente_contrato_pk` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idServico_pk` FOREIGN KEY (`idServico`) REFERENCES `servico` (`idServico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUsuario_pk` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `idCliente_pk` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
