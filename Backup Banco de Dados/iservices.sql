-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2017 às 22:40
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
CREATE DATABASE IF NOT EXISTS `iservices` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `iservices`;

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
(20, 'Gustavo ltda', '07392110640', 'guga100', 'guga100', 'Principal', '231', 'Bloco 07', 'Bernardo de Souza', 'Vespasiano', 'Minas Gerais', '33200000', '31994279594', '', '', 0),
(21, 'Gustavinho', '1234', '123', '123', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', '', '', 0),
(22, 'Gustavinho', '12345', '123', '123', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', '', '', 0),
(23, 'Gustavinho', '123456', '123', '123', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', '', '', 0),
(24, 'Gustavinho', '1234567', '123', '123', 'Ezequiel Dias', '234', 'Lote 1', '1234', 'Vespa', 'MG', '33200020', '3177889988', '', '', 0),
(25, 'Gustavinho', '12345678', '123', '123', 'Ezequiel Dias', '234', 'Lote 1', '1234', 'Vespa', 'MG', '33200020', '3177889988', '', '', 0),
(26, 'Gustavinho', '07323', '123', '123', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', '', '', 0),
(27, 'Show de serviÃ§os LTDA', '01010101', 'guga100', 'guga100', 'Ezequiel Dias', '234', 'Lojinha 5', 'Serra Verde', 'Belo Horizonte', 'MG', '33200020', '33202045', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `idServico` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `dataPreco` date NOT NULL,
  `dataInicial` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `status` int(1) NOT NULL,
  `enderecoCadastrado` int(1) NOT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `pgto` double NOT NULL,
  `detalhes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`idContrato`, `idServico`, `idUsuario`, `idCliente`, `preco`, `dataPreco`, `dataInicial`, `dataFinal`, `status`, `enderecoCadastrado`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `pgto`, `detalhes`) VALUES
(350, 51, 14, 10, '45.00', '2017-11-07', NULL, NULL, 0, 0, 'Principal', '231', 'APT 301', 'Bernardo de Souza', 'Vespasiano', 0, 'Realizando um teste com o endereÃ§o jÃ¡ cadastrado.'),
(351, 54, 14, 11, '45.00', '2017-11-07', NULL, NULL, 0, 1, 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 0, 'Realizando um teste com um novo endereÃ§o.'),
(352, 81, 14, 20, '25.00', '2017-11-07', NULL, NULL, 0, 0, 'Principal', '231', 'APT 301', 'Bernardo de Souza', 'Vespasiano', 0, 'Realizando mais um teste.'),
(353, 77, 14, 20, '36.00', '2017-11-07', NULL, NULL, 0, 1, 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 0, 'Realizando novamente um teste.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `tiposervico` varchar(255) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `horarioInicial` varchar(255) DEFAULT NULL,
  `horarioFinal` varchar(255) DEFAULT NULL,
  `diaInicial` varchar(255) DEFAULT NULL,
  `diaFinal` varchar(255) DEFAULT NULL,
  `checkClicado` int(1) DEFAULT NULL,
  `ativo` int(1) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idServico`, `tiposervico`, `valor`, `descricao`, `horarioInicial`, `horarioFinal`, `diaInicial`, `diaFinal`, `checkClicado`, `ativo`, `idcliente`) VALUES
(44, 'Eletricista', '30.00', 'Aceito orÃ§amentos.', NULL, NULL, NULL, NULL, NULL, 0, 8),
(45, 'Encanador', '320.00', 'OfereÃ§o o melhor preÃ§o e serviÃ§o.', NULL, NULL, NULL, NULL, NULL, 0, 8),
(47, 'Bombeiro HidrÃ¡ulico', '0.00', 'Aceito propostas.', NULL, NULL, NULL, NULL, NULL, 0, 8),
(49, 'MecÃ¢nico Automotivo', '20.00', 'Aceito propostas.', NULL, NULL, NULL, NULL, NULL, 0, 9),
(50, 'Eletricista', '35.00', 'OfereÃ§o o melhor preÃ§o e serviÃ§o.', NULL, NULL, NULL, NULL, NULL, 0, 9),
(51, 'Eletricista', '45.00', 'OfereÃ§o o melhor preÃ§o e serviÃ§o.', NULL, NULL, NULL, NULL, NULL, 0, 10),
(52, 'MecÃ¢nico Automotivo', '67.00', 'Aceito propostas.', NULL, NULL, NULL, NULL, NULL, 0, 11),
(53, 'Bombeiro HidrÃ¡ulico', '46.00', 'Realizo um serviÃ§o de qualidade.', NULL, NULL, NULL, NULL, NULL, 0, 11),
(54, 'Eletricista', '45.00', 'Aceito propostas.', NULL, NULL, NULL, NULL, NULL, 0, 11),
(77, 'MecÃ¢nico Automotivo', '36.00', 'Realizando um novo teste. Gustavo Borges!', '08:30', '18:30', 'Segunda-feira', 'Sexta-feira', 0, 1, 20),
(78, 'Bombeiro HidrÃ¡ulico', '45.00', 'Gustavo Borges', '24horas', '24horas', 'Segunda-Feira/Domingo', 'Segunda-Feira/Domingo', 1, 0, 20),
(81, 'Eletricista', '25.00', 'Troca de lÃ¢mpada.', '24horas', '24horas', 'Segunda-Feira/Domingo', 'Segunda-Feira/Domingo', 1, 1, 20);

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
(15, 'Gustavo Silveira Borges', 'eusou@eusou.com.br', 'guga100', 'guga100', 'Principal', '231', 'Bloco 07', 'Bernardo de Souza', 'Vespasiano', 'Minas Gerais', '33200000', '31994279594', NULL, 0.000000, 0.000000),
(16, '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0.000000, 0.000000),
(17, 'Gustavinho', 'guga100@hotmail.com.br', '2345', '2345', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(18, 'Gustavinhoooo', 'guga100@hotmail.com', '234', '234', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(19, 'Gustavinhooooooooo', 'guga100@hotmail.com.b', '12345', '12345', 'Alamenda', '', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(20, 'Gustavinhooooooooooo', 'guga100@hotmail.com.brr', '1234', '123456', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(21, 'Gustavinhooooooooooooo', 'guga100@hotmail.com.brrrr', '1234', '1234', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(22, 'Gustavinhoo', 'guga100@hotmail.com.brs', '1234', '1234', 'Alamenda', '12', '12', '12', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(23, 'oi', 'guga100@hotmail.com.brg', '123', '123', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(24, 'Gustavinhoooo', 'guga100@hotmail.com.x', '123', '123', '', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(25, 'Gustavinhoooo', 'guga100@hotmail.com.xs', '123', '123', '', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000),
(26, 'Gustavinho', 'guga100@hotmail.com.brssss', '123', '123', 'Alamenda', '234', 'Lote 1', 'Bernadete', 'Vespa', 'MG', '33200020', '3177889988', NULL, 0.000000, 0.000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idUsuario` (`idUsuario`);

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
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `constraint_idCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

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
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Extraindo dados da tabela `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'iservices', '{"quick_or_custom":"quick","what":"sql","structure_or_data_forced":"0","table_select[]":["avaliacao","cliente","contrato","servico","usuario"],"table_structure[]":["avaliacao","cliente","contrato","servico","usuario"],"table_data[]":["avaliacao","cliente","contrato","servico","usuario"],"output_format":"sendit","filename_template":"@DATABASE@","remember_template":"on","charset":"utf-8","compression":"none","maxsize":"","codegen_structure_or_data":"data","codegen_format":"0","csv_separator":",","csv_enclosed":"\\"","csv_escaped":"\\"","csv_terminated":"AUTO","csv_null":"NULL","csv_structure_or_data":"data","excel_null":"NULL","excel_edition":"win","excel_structure_or_data":"data","htmlword_structure_or_data":"structure_and_data","htmlword_null":"NULL","json_structure_or_data":"data","latex_caption":"something","latex_structure_or_data":"structure_and_data","latex_structure_caption":"estructura da tabela @TABLE@","latex_structure_continued_caption":"estructura da tabela @TABLE@ (continuaÃ§Ã£o)","latex_structure_label":"tab:@TABLE@-structure","latex_relation":"something","latex_comments":"something","latex_mime":"something","latex_columns":"something","latex_data_caption":"ConteÃºdo da tabela @TABLE@","latex_data_continued_caption":"ConteÃºdo da tabela @TABLE@ (continuaÃ§Ã£o)","latex_data_label":"tab:@TABLE@-data","latex_null":"\\\\textit{NULL}","mediawiki_structure_or_data":"structure_and_data","mediawiki_caption":"something","mediawiki_headers":"something","ods_null":"NULL","ods_structure_or_data":"data","odt_structure_or_data":"structure_and_data","odt_relation":"something","odt_comments":"something","odt_mime":"something","odt_columns":"something","odt_null":"NULL","pdf_report_title":"","pdf_structure_or_data":"structure_and_data","phparray_structure_or_data":"data","sql_include_comments":"something","sql_header_comment":"","sql_compatibility":"NONE","sql_structure_or_data":"structure_and_data","sql_create_table":"something","sql_auto_increment":"something","sql_create_view":"something","sql_procedure_function":"something","sql_create_trigger":"something","sql_backquotes":"something","sql_type":"INSERT","sql_insert_syntax":"both","sql_max_query_size":"50000","sql_hex_for_binary":"something","sql_utc_time":"something","texytext_structure_or_data":"structure_and_data","texytext_null":"NULL","xml_structure_or_data":"data","xml_export_events":"something","xml_export_functions":"something","xml_export_procedures":"something","xml_export_tables":"something","xml_export_triggers":"something","xml_export_views":"something","xml_export_contents":"something","yaml_structure_or_data":"data","":null,"lock_tables":null,"as_separate_files":null,"csv_removeCRLF":null,"csv_columns":null,"excel_removeCRLF":null,"excel_columns":null,"htmlword_columns":null,"json_pretty_print":null,"ods_columns":null,"sql_dates":null,"sql_relation":null,"sql_mime":null,"sql_use_transaction":null,"sql_disable_fk":null,"sql_views_as_tables":null,"sql_metadata":null,"sql_create_database":null,"sql_drop_table":null,"sql_if_not_exists":null,"sql_truncate":null,"sql_delayed":null,"sql_ignore":null,"texytext_columns":null}'),
(2, 'root', 'server', 'script', '{"quick_or_custom":"quick","what":"sql","db_select[]":["iservices","phpmyadmin"],"output_format":"sendit","filename_template":"@SERVER@","remember_template":"on","charset":"utf-8","compression":"none","maxsize":"","codegen_structure_or_data":"data","codegen_format":"0","csv_separator":",","csv_enclosed":"\\"","csv_escaped":"\\"","csv_terminated":"AUTO","csv_null":"NULL","csv_structure_or_data":"data","excel_null":"NULL","excel_edition":"win","excel_structure_or_data":"data","htmlword_structure_or_data":"structure_and_data","htmlword_null":"NULL","json_structure_or_data":"data","latex_caption":"something","latex_structure_or_data":"structure_and_data","latex_structure_caption":"estructura da tabela @TABLE@","latex_structure_continued_caption":"estructura da tabela @TABLE@ (continuaÃ§Ã£o)","latex_structure_label":"tab:@TABLE@-structure","latex_relation":"something","latex_comments":"something","latex_mime":"something","latex_columns":"something","latex_data_caption":"ConteÃºdo da tabela @TABLE@","latex_data_continued_caption":"ConteÃºdo da tabela @TABLE@ (continuaÃ§Ã£o)","latex_data_label":"tab:@TABLE@-data","latex_null":"\\\\textit{NULL}","mediawiki_structure_or_data":"data","mediawiki_caption":"something","mediawiki_headers":"something","ods_null":"NULL","ods_structure_or_data":"data","odt_structure_or_data":"structure_and_data","odt_relation":"something","odt_comments":"something","odt_mime":"something","odt_columns":"something","odt_null":"NULL","pdf_report_title":"","pdf_structure_or_data":"data","phparray_structure_or_data":"data","sql_include_comments":"something","sql_header_comment":"","sql_compatibility":"NONE","sql_structure_or_data":"structure_and_data","sql_create_table":"something","sql_auto_increment":"something","sql_create_view":"something","sql_procedure_function":"something","sql_create_trigger":"something","sql_backquotes":"something","sql_type":"INSERT","sql_insert_syntax":"both","sql_max_query_size":"50000","sql_hex_for_binary":"something","sql_utc_time":"something","texytext_structure_or_data":"structure_and_data","texytext_null":"NULL","yaml_structure_or_data":"data","":null,"as_separate_files":null,"csv_removeCRLF":null,"csv_columns":null,"excel_removeCRLF":null,"excel_columns":null,"htmlword_columns":null,"json_pretty_print":null,"ods_columns":null,"sql_dates":null,"sql_relation":null,"sql_mime":null,"sql_use_transaction":null,"sql_disable_fk":null,"sql_views_as_tables":null,"sql_metadata":null,"sql_drop_database":null,"sql_drop_table":null,"sql_if_not_exists":null,"sql_truncate":null,"sql_delayed":null,"sql_ignore":null,"texytext_columns":null}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"iservices","table":"contrato"},{"db":"iservices","table":"cliente"},{"db":"iservices","table":"servico"},{"db":"iservices","table":"usuario"},{"db":"iservices","table":"endereco_complementar"},{"db":"iservices","table":"avaliacao"},{"db":"iservices","table":"cadastro"},{"db":"iservices","table":"cadastrocliente"},{"db":"iservices","table":"cadastrousuario"},{"db":"iservices","table":"CadastroUsuario"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

--
-- Extraindo dados da tabela `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('iservices', 'avaliacao', 'idCliente', 'iservices', 'cliente', 'idCliente'),
('iservices', 'avaliacao', 'idUsuario', 'iservices', 'usuario', 'idUsuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Extraindo dados da tabela `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'iservices', 'contrato', '[]', '2017-11-07 01:26:56'),
('root', 'iservices', 'servico', '[]', '2017-11-04 17:28:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-05-25 01:15:27', '{"lang":"pt","collation_connection":"utf8mb4_general_ci"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
