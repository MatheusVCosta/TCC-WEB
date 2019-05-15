-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para mob_share
CREATE DATABASE IF NOT EXISTS `mob_share` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mob_share`;

-- Copiando estrutura para tabela mob_share.tbl_acessorios
CREATE TABLE IF NOT EXISTS `tbl_acessorios` (
  `id_acessorios` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela acessórios',
  `nome_acessorios` varchar(150) NOT NULL COMMENT 'nome dos acessórios',
  `id_tipo_veiculo` int(11) NOT NULL COMMENT 'código da tabela tipo de veículo',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `excluido` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_acessorios`),
  KEY `fk_tbl_acessorios_tbl_tipo_veiculos_idx` (`id_tipo_veiculo`),
  CONSTRAINT `fk_tbl_acessorios_tbl_tipo_veiculos` FOREIGN KEY (`id_tipo_veiculo`) REFERENCES `tbl_tipo_veiculo` (`id_tipo_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_acessorios: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_acessorios` DISABLE KEYS */;
INSERT INTO `tbl_acessorios` (`id_acessorios`, `nome_acessorios`, `id_tipo_veiculo`, `status`, `excluido`) VALUES
	(1, 'sadasd', 10, 1, 1),
	(2, 'dsfsd', 10, 1, 1),
	(3, 'Semi-Automático', 10, 1, 0),
	(4, ' Flex', 10, 1, 0),
	(5, 'Direção hidráulica', 10, 1, 0),
	(6, 'Bancos de couro', 10, 1, 0);
/*!40000 ALTER TABLE `tbl_acessorios` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_acessorio_veiculo
CREATE TABLE IF NOT EXISTS `tbl_acessorio_veiculo` (
  `idtbl_acessorio_tbl_veiculo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de acessório do veículo',
  `id_acessorio` int(11) DEFAULT NULL COMMENT 'código da tabela acessório',
  `id_veiculo` int(11) DEFAULT NULL COMMENT 'código da tabela de veículo',
  PRIMARY KEY (`idtbl_acessorio_tbl_veiculo`),
  KEY `fk_tbl_acessorio_veiculo_tbl_veiculo_idx` (`id_veiculo`),
  KEY `fk_tbl_acessorio_veiculo_tbl_acessorio_idx` (`id_acessorio`),
  CONSTRAINT `fk_tbl_acessorio_veiculo_tbl_acessorio` FOREIGN KEY (`id_acessorio`) REFERENCES `tbl_acessorios` (`id_acessorios`),
  CONSTRAINT `fk_tbl_acessorio_veiculo_tbl_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `tbl_veiculo` (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_acessorio_veiculo: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_acessorio_veiculo` DISABLE KEYS */;
INSERT INTO `tbl_acessorio_veiculo` (`idtbl_acessorio_tbl_veiculo`, `id_acessorio`, `id_veiculo`) VALUES
	(1, 3, 1),
	(2, 4, 1),
	(3, 5, 2),
	(4, 3, 2),
	(5, 6, 4),
	(6, 4, 3),
	(7, 5, 3),
	(8, 3, 5),
	(9, 4, 5),
	(10, 6, 6),
	(11, 5, 6),
	(12, 3, 7),
	(13, 4, 7),
	(14, 5, 8),
	(15, 4, 9),
	(16, 6, 9);
/*!40000 ALTER TABLE `tbl_acessorio_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_anuncio
CREATE TABLE IF NOT EXISTS `tbl_anuncio` (
  `id_anuncio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela anúncio',
  `descricao` text NOT NULL COMMENT 'descrição da tabela de anúncio',
  `id_cliente_locador` int(11) NOT NULL COMMENT 'código da tabela cliente locador',
  `id_veiculo` int(11) NOT NULL COMMENT 'código da tabela de veículo',
  `horario_inicio` time NOT NULL COMMENT 'horário de inicio do anúncio',
  `horario_termino` time NOT NULL COMMENT 'horário de termino do anúncio',
  `data_inicial` date NOT NULL COMMENT 'data inicial do anúncio',
  `data_final` date NOT NULL COMMENT 'data final do anúncio',
  `status_aprovado` tinyint(2) DEFAULT NULL COMMENT 'status aprovado do anúncio',
  `valor_hora` decimal(10,2) NOT NULL DEFAULT '1.00',
  PRIMARY KEY (`id_anuncio`),
  KEY `fk_tbl_usuario_tbl_anuncios_idx` (`id_cliente_locador`),
  KEY `fk_tbl_veiculos_tbl_anuncios_idx` (`id_veiculo`),
  CONSTRAINT `fk_tbl_usuario_tbl_anuncios` FOREIGN KEY (`id_cliente_locador`) REFERENCES `tbl_cliente` (`id_cliente`),
  CONSTRAINT `fk_tbl_veiculos_tbl_anuncios` FOREIGN KEY (`id_veiculo`) REFERENCES `tbl_veiculo` (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_anuncio: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_anuncio` DISABLE KEYS */;
INSERT INTO `tbl_anuncio` (`id_anuncio`, `descricao`, `id_cliente_locador`, `id_veiculo`, `horario_inicio`, `horario_termino`, `data_inicial`, `data_final`, `status_aprovado`, `valor_hora`) VALUES
	(1, 'Feriado do dia do trabalho', 1, 1, '07:00:00', '18:00:00', '2019-05-04', '2019-05-10', 1, 10.00),
	(2, 'Final de semana', 2, 4, '11:00:00', '15:00:00', '2019-05-03', '2019-10-05', 1, 22.00),
	(3, 'Começo de semana ', 3, 7, '13:00:00', '19:00:00', '2018-05-07', '2019-05-12', 1, 11.00),
	(4, 'Começo de semana ', 1, 2, '11:00:00', '13:00:00', '2018-05-07', '2019-05-10', 1, 22.00),
	(5, 'Final de semana', 2, 5, '13:00:00', '19:00:00', '2018-05-07', '2019-10-05', 1, 22.00),
	(6, 'Final de semana', 2, 6, '13:00:00', '19:00:00', '2018-05-07', '2019-10-05', 1, 22.00),
	(7, 'Final de semana', 3, 8, '13:00:00', '19:00:00', '2018-05-07', '2019-10-05', 1, 22.00),
	(8, 'Final de semana', 2, 5, '13:00:00', '19:00:00', '2018-05-07', '2019-10-05', 1, 22.00),
	(9, 'Final de semana', 3, 9, '13:00:00', '19:00:00', '2018-05-07', '2019-10-05', 1, 22.00);
/*!40000 ALTER TABLE `tbl_anuncio` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_anuncio_venda
CREATE TABLE IF NOT EXISTS `tbl_anuncio_venda` (
  `id_anuncio_venda` int(11) NOT NULL COMMENT 'código do anúncio de venda',
  `id_veiculo` int(11) NOT NULL COMMENT 'código da tabela do veículo',
  `id_cliente` int(11) NOT NULL COMMENT 'código da tabela do cliente',
  `descricao_anuncio_venda` text NOT NULL COMMENT 'descrição do anúncio de venda',
  `valor_venda` float NOT NULL COMMENT 'valor de venda do anúncio',
  PRIMARY KEY (`id_anuncio_venda`),
  KEY `fk_tbl_usuario_tbl_anuncio_venda_idx` (`id_cliente`),
  KEY `fk_tbl_veiculo_tbl_anuncio_venda_idx` (`id_veiculo`),
  CONSTRAINT `fk_tbl_usuario_tbl_anuncio_venda` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`),
  CONSTRAINT `fk_tbl_veiculo_tbl_anuncio_venda` FOREIGN KEY (`id_veiculo`) REFERENCES `tbl_veiculo` (`id_veiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_anuncio_venda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_anuncio_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_anuncio_venda` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_aprovacao_anuncio
CREATE TABLE IF NOT EXISTS `tbl_aprovacao_anuncio` (
  `id_aprovacao_anuncio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela aprovação do anúncio',
  `status_aprovacao` tinyint(4) NOT NULL COMMENT 'status da aprovação',
  `id_anuncio` int(11) NOT NULL COMMENT 'código da tabela anúncio',
  `id_usuario_cms` int(11) NOT NULL COMMENT 'código da tabela usuário do cms',
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id_aprovacao_anuncio`),
  KEY `fk_tbl_aprovacao_anuncio_tbl_usuario_cms_idx` (`id_usuario_cms`),
  KEY `fk_tbl_aprovacao_anuncio_tbl_anuncio_idx` (`id_anuncio`),
  CONSTRAINT `fk_tbl_avaliacao_anuncio_tbl_anuncio` FOREIGN KEY (`id_anuncio`) REFERENCES `tbl_anuncio` (`id_anuncio`),
  CONSTRAINT `fk_tbl_avaliacao_anuncio_tbl_usuario_cms` FOREIGN KEY (`id_usuario_cms`) REFERENCES `tbl_usuario_cms` (`id_usuario_cms`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_aprovacao_anuncio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_aprovacao_anuncio` DISABLE KEYS */;
INSERT INTO `tbl_aprovacao_anuncio` (`id_aprovacao_anuncio`, `status_aprovacao`, `id_anuncio`, `id_usuario_cms`, `mensagem`) VALUES
	(1, 0, 1, 8, 'tudo ok');
/*!40000 ALTER TABLE `tbl_aprovacao_anuncio` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_aprovacao_anuncio_venda
CREATE TABLE IF NOT EXISTS `tbl_aprovacao_anuncio_venda` (
  `id_aprovacao_anuncio_venda` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código de aprovação do anúncio de venda',
  `status_aprovacao` tinyint(4) NOT NULL COMMENT 'status de aprovação do anúncio de venda',
  `id_anuncio_venda` int(11) NOT NULL COMMENT 'código da tabela de anúncio de venda',
  `id_usuario_cms` int(11) NOT NULL COMMENT 'código da tabela do usuário do cms',
  PRIMARY KEY (`id_aprovacao_anuncio_venda`),
  KEY `fk_tbl_aprovacao_anuncio_tbl_usuario_cms_idx` (`id_usuario_cms`),
  KEY `fk_tbl_aprovacao_anuncio_venda_tbl_anuncio_venda_idx` (`id_anuncio_venda`),
  CONSTRAINT `fk_tbl_avaliacao_anuncio_venda_tbl_anuncio_venda` FOREIGN KEY (`id_anuncio_venda`) REFERENCES `tbl_anuncio_venda` (`id_anuncio_venda`),
  CONSTRAINT `fk_tbl_avaliacao_anuncio_venda_tbl_usuario_cms` FOREIGN KEY (`id_usuario_cms`) REFERENCES `tbl_usuario_cms` (`id_usuario_cms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_aprovacao_anuncio_venda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_aprovacao_anuncio_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_aprovacao_anuncio_venda` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_aprovacao_veiculo
CREATE TABLE IF NOT EXISTS `tbl_aprovacao_veiculo` (
  `id_aprovacao_veiculo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela aprovação do veículo',
  `status_aprovacao` tinyint(4) NOT NULL COMMENT 'status de aprovação',
  `id_usuario_cms` int(11) NOT NULL COMMENT 'código do usuário do cms',
  `id_veiculo` int(11) NOT NULL COMMENT 'código da tabela veículo',
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id_aprovacao_veiculo`),
  KEY `fk_tbl_aprovacao_veiculo_tbl_veiculo_idx` (`id_veiculo`),
  KEY `fk_tbl_aprovacao_veiculo_tbl_usuario_cms_idx` (`id_usuario_cms`),
  CONSTRAINT `fk_tbl_avaliacao_veiculo_tbl_usuario_cms` FOREIGN KEY (`id_usuario_cms`) REFERENCES `tbl_usuario_cms` (`id_usuario_cms`),
  CONSTRAINT `fk_tbl_avaliacao_veiculo_tbl_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `tbl_veiculo` (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_aprovacao_veiculo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_aprovacao_veiculo` DISABLE KEYS */;
INSERT INTO `tbl_aprovacao_veiculo` (`id_aprovacao_veiculo`, `status_aprovacao`, `id_usuario_cms`, `id_veiculo`, `mensagem`) VALUES
	(4, 0, 8, 1, 'ok!'),
	(5, 0, 8, 4, 'ok!');
/*!40000 ALTER TABLE `tbl_aprovacao_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_avaliacao_locatario
CREATE TABLE IF NOT EXISTS `tbl_avaliacao_locatario` (
  `id_avaliacao_locatario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código  da tabeça de avaliação do locatario',
  `nota` float DEFAULT NULL COMMENT 'nota do locatario',
  `comentario` text NOT NULL COMMENT 'comentário da avaliação do locatário',
  `data_avaliacao` date NOT NULL COMMENT 'data da avaliação do locatario',
  `id_locacao` int(11) NOT NULL COMMENT 'código da tabela locação',
  PRIMARY KEY (`id_avaliacao_locatario`),
  KEY `fk_tbl_avaliacao_locacao_tbl_locacao_idx` (`id_locacao`),
  CONSTRAINT `fk_tbl_avaliacao_locacao_tbl_locacao` FOREIGN KEY (`id_locacao`) REFERENCES `tbl_locacao` (`id_locacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_avaliacao_locatario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_avaliacao_locatario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_avaliacao_locatario` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_avaliacao_servico
CREATE TABLE IF NOT EXISTS `tbl_avaliacao_servico` (
  `id_avaliacao_servico` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela avaliação serviço',
  `nota` float DEFAULT NULL COMMENT 'nota da avaliação',
  `data_avaliacao` date NOT NULL COMMENT 'data da avaliação',
  `id_locacao` int(11) NOT NULL COMMENT 'código da tabela locação',
  `comentario` text COMMENT 'comentária da locação',
  PRIMARY KEY (`id_avaliacao_servico`),
  KEY `fk_tbl_avaliacao_servico_tbl_locacao_idx` (`id_locacao`),
  CONSTRAINT `fk_tbl_avaliacao_servico_tbl_locacao` FOREIGN KEY (`id_locacao`) REFERENCES `tbl_locacao` (`id_locacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_avaliacao_servico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_avaliacao_servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_avaliacao_servico` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_bancos
CREATE TABLE IF NOT EXISTS `tbl_bancos` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela bancas',
  `nome_banco` varchar(60) NOT NULL COMMENT 'nome do banco',
  `agencia_numero` varchar(20) NOT NULL COMMENT 'número da agência',
  `cidade` varchar(100) DEFAULT NULL COMMENT 'cidade do banco',
  `uf` varchar(2) DEFAULT NULL COMMENT 'estado do banco',
  PRIMARY KEY (`id_banco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_bancos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_bancos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bancos` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_cargos
CREATE TABLE IF NOT EXISTS `tbl_cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de cargos',
  `nome` varchar(100) NOT NULL COMMENT 'nome do cargo',
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_cargos: ~148 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_cargos` DISABLE KEYS */;
INSERT INTO `tbl_cargos` (`id_cargo`, `nome`) VALUES
	(1, 'Cabeleireiro'),
	(2, 'Sapateiro'),
	(3, 'Vendedor'),
	(4, 'Outro'),
	(5, 'Açougueiro'),
	(6, 'Advogado'),
	(7, 'Alfaiate'),
	(8, 'Aprendiz'),
	(9, 'Atendente'),
	(10, 'DBA'),
	(11, 'Dentista'),
	(12, 'Desenhista'),
	(13, 'Designer'),
	(14, 'Documentado'),
	(15, 'Doméstica'),
	(16, 'Professor'),
	(17, 'Guarda'),
	(18, 'Programador'),
	(19, 'Motorista'),
	(20, 'Jornalista'),
	(21, 'Engenheiro'),
	(22, 'Apresentador'),
	(23, 'Investigador'),
	(24, 'Policial'),
	(25, 'Enfermeiro'),
	(26, 'Medico'),
	(27, 'Politico'),
	(28, 'Diretor'),
	(29, 'Gerente'),
	(30, 'Garçom'),
	(31, 'Jornaleiro'),
	(32, 'Jardineiro'),
	(33, 'letricista'),
	(34, 'Musico'),
	(35, 'Nutricionista'),
	(36, 'Psicólogo'),
	(37, 'Publicitário'),
	(38, 'Químico'),
	(39, 'Radialista'),
	(40, 'Salva Vidas'),
	(41, 'Síndico'),
	(42, 'Serralheiro'),
	(43, 'Sorveteiro'),
	(44, 'Tecnico TI'),
	(45, 'Tapeceiro'),
	(46, 'Veterinário'),
	(47, 'Zelador'),
	(48, 'Arquiteto'),
	(49, 'Artesão'),
	(50, 'Auditor'),
	(51, 'Assistente'),
	(52, 'Babá'),
	(53, 'Back Office'),
	(54, 'Balanceiro'),
	(55, 'Balconista'),
	(56, 'Bamburista'),
	(57, 'Barista'),
	(58, 'Barman'),
	(59, 'Berçarista'),
	(60, 'Bibliotecário'),
	(61, 'Bilheteiro'),
	(62, 'Biologista'),
	(63, 'Biólogo'),
	(64, 'Biomédico'),
	(65, 'Bioquímico'),
	(66, 'Biotecnólogo'),
	(67, 'Blogueiro'),
	(68, 'Bombeiro'),
	(69, 'Borracheiro'),
	(70, 'Acrilista'),
	(71, 'Adestrador'),
	(72, 'Administrador'),
	(73, 'Agente'),
	(74, 'Analista Tributário'),
	(75, 'Antropólogo'),
	(76, 'Aquarista'),
	(77, 'Arqueólogo'),
	(78, 'Arquivista'),
	(79, 'Artista'),
	(80, 'Ascensorista'),
	(81, 'Assessor'),
	(82, 'Ator'),
	(83, 'Avaliador'),
	(84, 'Azulejista'),
	(85, 'Caixa'),
	(86, 'Camareiro'),
	(87, 'Carpinteiro'),
	(88, 'Carteiro'),
	(89, 'Chaveiro'),
	(90, 'Comissário'),
	(91, 'Comprador'),
	(92, 'Confeiteiro'),
	(93, 'Consultor'),
	(94, 'Contador'),
	(95, 'Controlador'),
	(96, 'Coordenador'),
	(97, 'Cozinheiro'),
	(98, 'Costureiro'),
	(99, 'Cuidador'),
	(100, 'Curador'),
	(101, 'Dançarino'),
	(102, 'Decorador'),
	(103, 'Divulgador'),
	(104, 'Economista'),
	(105, 'Eletricista'),
	(106, 'Embalador'),
	(107, 'Encanador'),
	(108, 'Empacotador'),
	(109, 'Ciêntista'),
	(110, 'Entregador'),
	(111, 'Estatístico'),
	(112, 'Etiquetador'),
	(113, 'Farmacêutico'),
	(114, 'Ferramenteiro'),
	(115, 'Ferreiro'),
	(116, 'Fiscal'),
	(117, 'Fisioterapeuta'),
	(118, 'Florista'),
	(119, 'Fotógrafo'),
	(120, 'Funileiro'),
	(121, 'Fresador'),
	(122, 'Fundidor de Metais'),
	(123, 'Gastrônomo'),
	(124, 'Astronomo'),
	(125, 'Governanta'),
	(126, 'Gesseiro'),
	(127, 'Impressor'),
	(128, 'Ilustrador'),
	(129, 'Inspetor'),
	(130, 'Segurança'),
	(131, 'Instrumentista'),
	(132, 'Intérprete'),
	(133, 'Instalador'),
	(134, 'Lavador'),
	(135, 'Limpador'),
	(136, 'Manicure'),
	(137, 'Maquiador'),
	(138, 'Marceneiro'),
	(139, 'Mecânico'),
	(140, 'Matematico'),
	(141, 'Montador'),
	(142, 'Motoboy'),
	(143, 'Soldado'),
	(144, 'Padeiro'),
	(145, 'Pedreiro'),
	(146, 'Pintor'),
	(147, 'Repórter'),
	(148, 'Webmaster');
/*!40000 ALTER TABLE `tbl_cargos` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_cargo_funcionario
CREATE TABLE IF NOT EXISTS `tbl_cargo_funcionario` (
  `id_cargo_funcionario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de cargo do funcionário',
  `id_cargo` int(11) NOT NULL COMMENT 'código da tabela de cargo',
  `id_funcionario` int(11) NOT NULL COMMENT 'código da tabela de funcionário',
  `data` date DEFAULT NULL COMMENT 'data de contratação do funcionário',
  PRIMARY KEY (`id_cargo_funcionario`),
  KEY `fk_tbl_setor_tbl_cargo_funcionario_idx` (`id_cargo`),
  KEY `fk_tbl_funcionario_tbl_cargo_funcionario_idx` (`id_funcionario`),
  CONSTRAINT `fk_tbl_funcionario_tbl_cargo_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `tbl_funcionario` (`id_funcionario`),
  CONSTRAINT `fk_tbl_setor_tbl_cargo_funcionario` FOREIGN KEY (`id_cargo`) REFERENCES `tbl_cargos` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_cargo_funcionario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_cargo_funcionario` DISABLE KEYS */;
INSERT INTO `tbl_cargo_funcionario` (`id_cargo_funcionario`, `id_cargo`, `id_funcionario`, `data`) VALUES
	(26, 4, 8, NULL),
	(27, 2, 8, NULL),
	(28, 18, 8, NULL);
/*!40000 ALTER TABLE `tbl_cargo_funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_cliente
CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código do cliente',
  `nome_cliente` varchar(250) NOT NULL COMMENT 'nome do cliente',
  `cpf` varchar(11) DEFAULT NULL COMMENT 'cpf do cliente',
  `telefone` varchar(15) DEFAULT NULL COMMENT 'telefone do cliente',
  `celular` varchar(16) DEFAULT NULL COMMENT 'celular do cliente',
  `cnh_foto` varchar(255) DEFAULT NULL COMMENT 'foto da cnh do cliente',
  `foto_cliente` varchar(255) NOT NULL COMMENT 'foto do cliente',
  `rua` varchar(150) DEFAULT NULL COMMENT 'rua do endereço do cliente',
  `bairro` varchar(150) DEFAULT NULL COMMENT 'bairro do cliente',
  `cep` varchar(8) DEFAULT NULL COMMENT 'cep do cliente',
  `complemento` varchar(150) DEFAULT NULL COMMENT 'complemento do endereço do cliente',
  `cidade` varchar(70) DEFAULT NULL COMMENT 'cidade do cliente',
  `uf` varchar(2) DEFAULT NULL COMMENT 'sigla do estado do cliente ',
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `dt_nascimento` date NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_cliente: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_cliente` DISABLE KEYS */;
INSERT INTO `tbl_cliente` (`id_cliente`, `nome_cliente`, `cpf`, `telefone`, `celular`, `cnh_foto`, `foto_cliente`, `rua`, `bairro`, `cep`, `complemento`, `cidade`, `uf`, `email`, `senha`, `status`, `dt_nascimento`) VALUES
	(1, 'Gabriel', '43534', '345345', '345345', '92b8aca15170aad6e392c835bb11c0f0.png', '55761ff015d4887afc61becf4401e7f4.png', '324', '324324', '32423', '32423', '324', '32', 'admin@bugbunny.com', '$2y$12$bkQhQa5RQQX0RxwU9lZ5lOSneac1hZwtAfSnQCHTkJalLYVNrgKny', 1, '0000-00-00'),
	(2, 'Gil 45435', '43534543', '435345', '435345', '4befd27b8e47c89c67efdbb2a31bdaae.png', '9d476c5f9d012ec9d18bf0141799eaaa.jpg', '345345', '4353', '32423', '435345', '435', '34', 'claudio@teste.com.br', '$2y$12$srOo70lWcrDwy1GGESMyLeF7Lz5i/2pqmxN5yuQAahXodZMs6tPVe', 0, '0000-00-00'),
	(3, 'Claudio', '43534543', '435345', '435345', '7cbe6b59fc9a4c38bb5faddf75a9ca02.png', 'a4af6044b6a1abd4e88bb3cb9a959b5a.png', '345345', '4353', '32423', '435345', '435', '34', 'claudio@teste.com.br', '$2y$12$xN33ks.UYcZVRoHWrlmcOu6Edi/Tac5DF/RXVYsxaVR4iC6RlsEQC', 0, '0000-00-00'),
	(4, 'Larissa Bruna ', '49056154885', '1141445998', '11952446264', 'f38a682cc6d4f40631a804babaa8ec61.jpg', 'cfcc3b19a426269118bf894a2b9d86e9.png', 'Ariano Camaros', 'Amador Bueno', '6680580', 'apt', 'Barueri', 'SP', 'lala_2.5@hotmail.com', '$2y$12$Optce0mwBAfQLIdoLlGRHemKcOzf4R4oaN1wheri03zBjSsT0Pcou', 1, '0000-00-00'),
	(5, 'matheus', NULL, NULL, NULL, NULL, 'img/1lvc017wjvcakrgb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'matheus@matheus', '123', 1, '1999-07-18'),
	(6, 'Matheus', NULL, NULL, NULL, NULL, 'img/1lvc017wjvcari1r.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'matheus@hotmail', '123', 1, '1999-07-18'),
	(7, 'Gil Ramos', NULL, NULL, NULL, NULL, 'img/1lvc07hgjvcesuhm.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'gilberto.tec@vivaldi.net', '123', 1, '1999-06-02');
/*!40000 ALTER TABLE `tbl_cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_comentario_avaliacao
CREATE TABLE IF NOT EXISTS `tbl_comentario_avaliacao` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela comentário',
  `comentario` text COMMENT 'comentário',
  `data` datetime NOT NULL COMMENT 'data do comentário da avaliação',
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_comentario_avaliacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_comentario_avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comentario_avaliacao` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_como_ganhar_dinheiro
CREATE TABLE IF NOT EXISTS `tbl_como_ganhar_dinheiro` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da página como ganhar dinheiro',
  `titulo_sessao1` text NOT NULL COMMENT 'título da página como ganhar dinheiro',
  `lista1_sessao1` text NOT NULL,
  `lista2_sessao1` text NOT NULL COMMENT 'texto da página como ganhar dinheiro',
  `img1_sessao1` text NOT NULL COMMENT 'imagem da página como ganhar dinheiro',
  `titulo_sessao2` text NOT NULL,
  `img1_sessao2` text NOT NULL,
  `lista1_sessao2` text NOT NULL,
  `img2_sessao2` text NOT NULL,
  `lista2_sessao2` text NOT NULL,
  `titulo_sessao3` text NOT NULL,
  `texto_sessao3` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_como_ganhar_dinheiro: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_como_ganhar_dinheiro` DISABLE KEYS */;
INSERT INTO `tbl_como_ganhar_dinheiro` (`id`, `titulo_sessao1`, `lista1_sessao1`, `lista2_sessao1`, `img1_sessao1`, `titulo_sessao2`, `img1_sessao2`, `lista1_sessao2`, `img2_sessao2`, `lista2_sessao2`, `titulo_sessao3`, `texto_sessao3`) VALUES
	(3, 'aaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAgasgasgAAAAAAAAAAAAAAA', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAgasgasgAAAAAAAAAAAAAAA', '1aa8910686372afa7ef198215634e71c.png', 'AAAAAAAA', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', 'AAAAAA', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', 'AAAA', 'AAAAAAAAA', 'AAAAAA'),
	(4, 'aaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAgasgasgAAAAAAAAAAAAAAA', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAgasgasgAAAAAAAAAAAAAAA', 'c573f0b14ae181d13912cae1d8cbb7a3.png', 'AAAAAAAA', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', 'AAAAAA', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', 'AAAA', 'AAAAAAAAA', 'AAAAAA'),
	(5, 'titulo', '<div style="text-align: left;"><ul><li><span style="text-align: right;">qweqwe</span></li><li>eqweqe</li><li>qweqw</li></ul></div>', '<div style="text-align: left;"><ul><li><span style="text-align: right;">qweqwe</span></li><li>eqweqe</li><li>qweqw</li></ul></div>', '4c23bcedee969ee8d35693db308eb023.png', 'AAAAAAAA', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', 'AAAAAA', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', 'AAAA', 'AAAAAAAAA', 'AAAAAA'),
	(6, 'titulo', '<div style="text-align: left;"><ul><li><span style="text-align: right;">qweqwe</span></li><li>eqweqe</li><li>qweqw</li></ul></div>', '<div style="text-align: left;"><ul><li><span style="text-align: right;">qweqwe</span></li><li>eqweqe</li><li>qweqw</li></ul></div>', '4c23bcedee969ee8d35693db308eb023.png', 'titulo2', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqe</li><li>qweqw</li></ul>', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqe</li><li>qweqw</li></ul>', 'AAAAAAAAA', 'AAAAAA'),
	(7, 'titulo', '<div style="text-align: left;"><ul><li><span style="text-align: right;">qweqwe</span></li><li>eqweqe</li><li>qweqw</li></ul></div>', '<div style="text-align: left;"><ul><li><span style="text-align: right;">qweqwe</span></li><li>eqweqe</li><li>qweqw</li></ul></div>', '4c23bcedee969ee8d35693db308eb023.png', 'titulo2', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqe</li><li>qweqw</li></ul>', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqe</li><li>qweqw</li></ul>', 'titulo3', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3</span></li><li>eqweqe</li><li>qweqw3</li></ul>'),
	(8, 'titulo', '', '', '4c23bcedee969ee8d35693db308eb023.png', 'titulo2', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqe</li><li>qweqw</li></ul>', '0f94526f73c7677a5c51f81ef9c6eee3.jpeg', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqe</li><li>qweqw</li></ul>', 'titulo3', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3</span></li><li>eqweqe</li><li>qweqw3</li></ul>'),
	(9, 'titulo', '', '', '4c23bcedee969ee8d35693db308eb023.png', 'aaaa', 'f29094d6fc0e185013315d25cc559796.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqe</li><li>qweqwa</li></ul>', '7fa366e549902436bb38d35f8db62570.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqea</li><li>qweqw</li></ul>', 'titulo3', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3</span></li><li>eqweqe</li><li>qweqw3</li></ul>'),
	(10, 'titulo', '', '', '4c23bcedee969ee8d35693db308eb023.png', 'aaaa', 'c9ca9c0f018d1c77ac56fdc08d08e473.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqe</li><li>qweqwa</li></ul>', '1390d827da893f709d784f7f640a06cf.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2</span></li><li>eqweqea</li><li>qweqw</li></ul>', 'titulo3', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3</span></li><li>eqweqe</li><li>qweqw3</li></ul>'),
	(11, 'titulo', '', '', '4c23bcedee969ee8d35693db308eb023.png', 'aaaa', '8151888edd517d34e0bf988ed3482ca6.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsgagsagas</span></li><li>eqweqeasggggasggsa</li><li>qweqwagsagagsagsa</li></ul>', 'afc4b095c8828f189e12c54529f8c3f8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsagsag</span></li><li>qweqwsaggsagagsag</li></ul>', 'titulo3', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3</span></li><li>eqweqe</li><li>qweqw3</li></ul>'),
	(12, 'titulo', '', '', '4c23bcedee969ee8d35693db308eb023.png', 'aaaa', '8151888edd517d34e0bf988ed3482ca6.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsgagsagas</span></li><li>eqweqeasggggasggsa</li><li>qweqwagsagagsagsa</li></ul>', 'afc4b095c8828f189e12c54529f8c3f8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsagsag</span></li><li>qweqwsaggsagagsag</li></ul>', 'titulo3a', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaa</span></li><li>eqweqeaaaaaaaaaaa</li><li>qweqw3aaaaaaaaaaaa</li></ul>'),
	(13, 'titulo', '', '', '4c23bcedee969ee8d35693db308eb023.png', 'aaaa', '8151888edd517d34e0bf988ed3482ca6.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsgagsagas</span></li><li>eqweqeasggggasggsa</li><li>qweqwagsagagsagsa</li></ul>', 'afc4b095c8828f189e12c54529f8c3f8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsagsag</span></li><li>qweqwsaggsagagsag</li></ul>', 'titulo3aagasgagsag', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaa</span></li><li>eqweqeaaaaaaaaaaasgag</li><li>qweqw3aaaaaaaaaaaagagg</li><li>gagsagasgsg</li></ul>'),
	(14, 'titulo1', '<div><ul><li>gasgasgsag</li><li>agasg</li><li>sgasgsag</li><li>gasg</li></ul></div>', '<div><ol><li>gasg</li><li>sag</li><li>sag</li><li>asg</li><li>sg</li><li>sag</li><li><br></li></ol></div>', '4c23bcedee969ee8d35693db308eb023.png', 'aaaa', '8151888edd517d34e0bf988ed3482ca6.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsgagsagas</span></li><li>eqweqeasggggasggsa</li><li>qweqwagsagagsagsa</li></ul>', 'afc4b095c8828f189e12c54529f8c3f8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsagsag</span></li><li>qweqwsaggsagagsag</li></ul>', 'titulo3aagasgagsag', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaa</span></li><li>eqweqeaaaaaaaaaaasgag</li><li>qweqw3aaaaaaaaaaaagagg</li><li>gagsagasgsg</li></ul>'),
	(15, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '4c23bcedee969ee8d35693db308eb023.png', 'aaaa', '8151888edd517d34e0bf988ed3482ca6.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsgagsagas</span></li><li>eqweqeasggggasggsa</li><li>qweqwagsagagsagsa</li></ul>', 'afc4b095c8828f189e12c54529f8c3f8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsagsag</span></li><li>qweqwsaggsagagsag</li></ul>', 'titulo3aagasgagsag', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaa</span></li><li>eqweqeaaaaaaaaaaasgag</li><li>qweqw3aaaaaaaaaaaagagg</li><li>gagsagasgsg</li></ul>'),
	(16, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '4c23bcedee969ee8d35693db308eb023.png', 'aaaaGASGASGSAGSA', '8151888edd517d34e0bf988ed3482ca6.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsgagsagasGASGSAG</span></li><li>eqweqeasggggasggsaAGASGSAGSAG</li><li>qweqwagsagagsagsaSAGSAGS</li></ul>', 'afc4b095c8828f189e12c54529f8c3f8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsagsagSAGASG</span></li><li>qweqwsaggsagagsagASGGASGSAG</li></ul>', 'titulo3aagasgagsag', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaa</span></li><li>eqweqeaaaaaaaaaaasgag</li><li>qweqw3aaaaaaaaaaaagagg</li><li>gagsagasgsg</li></ul>'),
	(17, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '4c23bcedee969ee8d35693db308eb023.png', 'aaaaGASGASGSAGSA', '8151888edd517d34e0bf988ed3482ca6.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsgagsagasGASGSAG</span></li><li>eqweqeasggggasggsaAGASGSAGSAG</li><li>qweqwagsagagsagsaSAGSAGS</li></ul>', 'afc4b095c8828f189e12c54529f8c3f8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsagsagSAGASG</span></li><li>qweqwsaggsagagsagASGGASGSAG</li></ul>', 'titulo3aagasgagsagAGSAGSAGAG', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaaGASGSA</span></li><li>eqweqeaaaaaaaaaaasgagGSAGA</li><li>qweqw3aaaaaaaaaaaagaggGSAGSA</li><li>gagsagasgsgGAGAG</li></ul>'),
	(18, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '82bee193f08459639e4433bbaebd9fe5.png', 'aaaaGASGASGSAGSA', '8151888edd517d34e0bf988ed3482ca6.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsgagsagasGASGSAG</span></li><li>eqweqeasggggasggsaAGASGSAGSAG</li><li>qweqwagsagagsagsaSAGSAGS</li></ul>', 'afc4b095c8828f189e12c54529f8c3f8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe2gsagsagSAGASG</span></li><li>qweqwsaggsagagsagASGGASGSAG</li></ul>', 'titulo3aagasgagsagAGSAGSAGAG', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaaGASGSA</span></li><li>eqweqeaaaaaaaaaaasgagGSAGA</li><li>qweqw3aaaaaaaaaaaagaggGSAGSA</li><li>gagsagasgsgGAGAG</li></ul>'),
	(19, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '82bee193f08459639e4433bbaebd9fe5.png', '222222222222', '0ab2ba2c6569fc6027c2d1cdf40e614d.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2<br></li></ul>', '9e76e4f176452246773dca6451a3fd93.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2</li></ul>', 'titulo3aagasgagsagAGSAGSAGAG', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaaGASGSA</span></li><li>eqweqeaaaaaaaaaaasgagGSAGA</li><li>qweqw3aaaaaaaaaaaagaggGSAGSA</li><li>gagsagasgsgGAGAG</li></ul>'),
	(20, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '82bee193f08459639e4433bbaebd9fe5.png', '222222222222', 'a0fefaffb3ac1fd95c2d98e25f208d7a.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2<br></li></ul>', '289651257e2c858bb4d66cac6ef0e1a8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2</li></ul>', 'titulo3aagasgagsagAGSAGSAGAG', '<ul style="text-align: left;"><li><span style="text-align: right;">qweqwe3aaaaaaaaaaaGASGSA</span></li><li>eqweqeaaaaaaaaaaasgagGSAGA</li><li>qweqw3aaaaaaaaaaaagaggGSAGSA</li><li>gagsagasgsgGAGAG</li></ul>'),
	(21, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '82bee193f08459639e4433bbaebd9fe5.png', '222222222222', 'a0fefaffb3ac1fd95c2d98e25f208d7a.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2<br></li></ul>', '289651257e2c858bb4d66cac6ef0e1a8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2</li></ul>', '3', '<ul style="text-align: left;"><li><span style="text-align: right;">3</span></li><li>3</li><li>3</li><li>3</li></ul>'),
	(22, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '82bee193f08459639e4433bbaebd9fe5.png', '222222222222', 'a0fefaffb3ac1fd95c2d98e25f208d7a.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2<br></li></ul>', '289651257e2c858bb4d66cac6ef0e1a8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2</li></ul>', '3', '<ul style="text-align: left;"><li><span style="text-align: right;">3</span></li><li>3</li><li>3</li><li>3</li></ul>'),
	(23, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '82bee193f08459639e4433bbaebd9fe5.png', '222222222222', 'a0fefaffb3ac1fd95c2d98e25f208d7a.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2<br></li></ul>', '289651257e2c858bb4d66cac6ef0e1a8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2</li></ul>', '3', '<ul style="text-align: left;"><li><span style="text-align: right;">3</span></li><li>3</li><li>3</li><li>3</li></ul>'),
	(24, 'GASGASGGAS', '<div><ul><li>ASGSAGSAGSA</li><li>agasgGAGSAG</li><li>sgasgsagAGAGA</li><li>gasgGAGAGAG</li></ul></div>', '<div><ol><li>gasgSAGAG</li><li>sagAGAG</li><li>sagSAGAG</li><li>asgSAGSAG</li><li>sgSAGASGAG</li><li>sag</li><li><br></li></ol></div>', '82bee193f08459639e4433bbaebd9fe5.png', '222222222222', 'a0fefaffb3ac1fd95c2d98e25f208d7a.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2<br></li></ul>', '289651257e2c858bb4d66cac6ef0e1a8.png', '<ul style="text-align: left;"><li><span style="text-align: right;">2</span></li><li>2</li></ul>', '3', '<ul style="text-align: left;"><li><span style="text-align: right;">3</span></li><li>3</li><li>3</li><li>3</li></ul>');
/*!40000 ALTER TABLE `tbl_como_ganhar_dinheiro` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_conta
CREATE TABLE IF NOT EXISTS `tbl_conta` (
  `id_conta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da conta',
  `saldo_conta_bancaria` decimal(10,2) NOT NULL COMMENT 'saldo da conta bancaria',
  `numero_conta` varchar(32) NOT NULL COMMENT 'número da conta bancária',
  `id_banco` int(11) NOT NULL COMMENT 'código da tabela banco',
  PRIMARY KEY (`id_conta`),
  KEY `fk_tbl_conta_bancaria_tbl_` (`id_banco`),
  CONSTRAINT `fk_tbl_conta_bancaria_tbl_` FOREIGN KEY (`id_banco`) REFERENCES `tbl_bancos` (`id_banco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_conta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_conta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_conta` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_contas_pagar
CREATE TABLE IF NOT EXISTS `tbl_contas_pagar` (
  `id_conta_pagar` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela contas à pagar',
  `descricao` text NOT NULL COMMENT 'descrição da conta à pagar ',
  `data_entrada` date NOT NULL COMMENT 'data de entrada da conta à pagar',
  `valor` decimal(10,2) NOT NULL COMMENT 'valor da conta à pagar',
  `titulos_baixados` varchar(45) DEFAULT NULL COMMENT 'títulos das contas à pagar',
  `data_baixa` datetime DEFAULT NULL COMMENT 'data da baixa da conta à pagar',
  `codigo_pagamento` varchar(32) DEFAULT NULL COMMENT 'número do código do pagamento',
  `confirmado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'confirmação do pagamento aceito ou não aceito',
  PRIMARY KEY (`id_conta_pagar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_contas_pagar: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_contas_pagar` DISABLE KEYS */;
INSERT INTO `tbl_contas_pagar` (`id_conta_pagar`, `descricao`, `data_entrada`, `valor`, `titulos_baixados`, `data_baixa`, `codigo_pagamento`, `confirmado`) VALUES
	(1, 'Pagamento do mes 4', '2019-05-15', 900.00, NULL, NULL, '435345', 0),
	(2, 'fffff', '2019-05-13', 900.00, NULL, NULL, 'fff', 0);
/*!40000 ALTER TABLE `tbl_contas_pagar` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_contas_receber
CREATE TABLE IF NOT EXISTS `tbl_contas_receber` (
  `id_conta_receber` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela contas à receber',
  `valor` decimal(10,2) NOT NULL COMMENT 'valor das contas à receber',
  `data_entrada` date NOT NULL COMMENT 'data da entrada do valor à receber',
  `descricao` text COMMENT 'descrição das contas à receber',
  `titulos_baixados` varchar(45) DEFAULT NULL COMMENT 'títulos baixados',
  `titulos_recebidos` varchar(45) DEFAULT NULL COMMENT 'títulos recebidos',
  `data_baixa` datetime DEFAULT NULL COMMENT 'data da baixa do título',
  `confirmado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'contas foram confirmadas ou não',
  PRIMARY KEY (`id_conta_receber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_contas_receber: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_contas_receber` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contas_receber` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_email_mkt
CREATE TABLE IF NOT EXISTS `tbl_email_mkt` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da página email marketing',
  `email` varchar(100) NOT NULL COMMENT 'email da página email marketing',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_email_mkt: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_email_mkt` DISABLE KEYS */;
INSERT INTO `tbl_email_mkt` (`id`, `email`) VALUES
	(1, 'lucassoeiro03@gmail.com'),
	(5, 'admin@mobshare.com');
/*!40000 ALTER TABLE `tbl_email_mkt` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_fale_conosco
CREATE TABLE IF NOT EXISTS `tbl_fale_conosco` (
  `id_fale_conosco` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da página fale conosco',
  `nome_fale_conosco` varchar(100) DEFAULT NULL COMMENT 'nome da página fale conosco',
  `email_fale_conosco` varchar(100) NOT NULL COMMENT 'email da página fale conosco',
  `telefone_fale_conosco` varchar(20) NOT NULL COMMENT 'telefone da página fale conosco',
  `celular_fale_conosco` varchar(20) DEFAULT NULL COMMENT 'telefone da página fale conosco',
  `mensagem_fale_conosco` text NOT NULL,
  PRIMARY KEY (`id_fale_conosco`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_fale_conosco: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_fale_conosco` DISABLE KEYS */;
INSERT INTO `tbl_fale_conosco` (`id_fale_conosco`, `nome_fale_conosco`, `email_fale_conosco`, `telefone_fale_conosco`, `celular_fale_conosco`, `mensagem_fale_conosco`) VALUES
	(1, 'gagag', 'a@a.com', '(11)1111-1111', '(11)91111-1111', '11111111111111'),
	(2, 'gagag', 'a@a.com', '(11)1111-1111', '(11)91111-1111', '11111111111111'),
	(8, 'gagag', 'admin@mobshare.com', '(11)1111-1111', '(11)94894-8545', 'qqqqqqqqqqqqq');
/*!40000 ALTER TABLE `tbl_fale_conosco` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_faq
CREATE TABLE IF NOT EXISTS `tbl_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da página faq',
  `perguntas` text NOT NULL COMMENT 'pergunta da página faq',
  `respostas` text NOT NULL COMMENT 'resposta da página faq',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_faq: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_faq` DISABLE KEYS */;
INSERT INTO `tbl_faq` (`id`, `perguntas`, `respostas`, `status`) VALUES
	(7, 'Como Anunciar?', 'Primeiramente crie sua conta, se já estiver criada vá em meus veiculo e cadastrar veiculo, atenção os dados podem ser expostos a outros usuários.', 1);
/*!40000 ALTER TABLE `tbl_faq` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_folha_pagamento
CREATE TABLE IF NOT EXISTS `tbl_folha_pagamento` (
  `id_folha_pagamento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela folha de pagamento',
  `valor_final` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'valor final da folha de pagamento',
  `data_agendamento` date NOT NULL COMMENT 'data de agendamento ',
  `descricao_pagamento` text NOT NULL COMMENT 'descrição do pagamento',
  `cod_pagamento_funcionario` varchar(32) NOT NULL COMMENT 'código do pagamento do funcionário',
  `id_funcionario` int(11) NOT NULL COMMENT 'código da tabela funcionário',
  `id_usuario_desktop` int(11) NOT NULL COMMENT 'código da tabela usuário do desktop',
  PRIMARY KEY (`id_folha_pagamento`,`id_funcionario`),
  KEY `fk_tbl_pagamento_funcionario_tbl_funcionario_idx` (`id_funcionario`),
  KEY `fk_tbl_usuario_desktop_tbl_folha_pagamento_idx` (`id_usuario_desktop`),
  CONSTRAINT `fk_tbl_pagamento_funcionario_tbl_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `tbl_funcionario` (`id_funcionario`),
  CONSTRAINT `fk_tbl_usuario_desktop_tbl_folha_pagamento` FOREIGN KEY (`id_usuario_desktop`) REFERENCES `tbl_usuario_desktop` (`id_usuario_desktop`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_folha_pagamento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_folha_pagamento` DISABLE KEYS */;
INSERT INTO `tbl_folha_pagamento` (`id_folha_pagamento`, `valor_final`, `data_agendamento`, `descricao_pagamento`, `cod_pagamento_funcionario`, `id_funcionario`, `id_usuario_desktop`) VALUES
	(1, 900.00, '2019-05-15', 'Pagamento do mes 4', '435345', 8, 1),
	(2, 900.00, '2019-05-13', 'fffff', 'fff', 8, 1);
/*!40000 ALTER TABLE `tbl_folha_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_folha_pagamento_contas_pagar
CREATE TABLE IF NOT EXISTS `tbl_folha_pagamento_contas_pagar` (
  `id_pedido_contas_pagar` int(11) NOT NULL AUTO_INCREMENT,
  `id_folha_pagamento` int(11) NOT NULL COMMENT 'código da tabela folha de pagamento',
  `id_conta_pagar` int(11) NOT NULL COMMENT 'código da tabela conta à pagar',
  PRIMARY KEY (`id_pedido_contas_pagar`),
  KEY `fk_tbl_funcionario_idx` (`id_folha_pagamento`),
  KEY `fk_tbl_contas_pagar_tbl_folha_pagamento_contas_pagar_idx` (`id_conta_pagar`),
  CONSTRAINT `fk_tbl_contas_pagar_tbl_folha_pagamento_contas_pagar` FOREIGN KEY (`id_conta_pagar`) REFERENCES `tbl_contas_pagar` (`id_conta_pagar`),
  CONSTRAINT `fk_tbl_folha_pagamento_tbl_folha_pagamento_contas_pagar` FOREIGN KEY (`id_folha_pagamento`) REFERENCES `tbl_folha_pagamento` (`id_folha_pagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_folha_pagamento_contas_pagar: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_folha_pagamento_contas_pagar` DISABLE KEYS */;
INSERT INTO `tbl_folha_pagamento_contas_pagar` (`id_pedido_contas_pagar`, `id_folha_pagamento`, `id_conta_pagar`) VALUES
	(1, 1, 1),
	(2, 2, 2);
/*!40000 ALTER TABLE `tbl_folha_pagamento_contas_pagar` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_fornecedor
CREATE TABLE IF NOT EXISTS `tbl_fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela do fornecedor',
  `nome_fornecedor` varchar(100) NOT NULL COMMENT 'nome do fornecedor',
  `cnpj_fornecedor` varchar(20) NOT NULL COMMENT 'cnpj do fornecedor',
  `cod_fornecedor` varchar(32) DEFAULT NULL COMMENT 'código de identificação do fornecedor',
  `razao_social` varchar(100) DEFAULT NULL COMMENT 'razão social do fornecedor',
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_fornecedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fornecedor` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_foto_veiculo
CREATE TABLE IF NOT EXISTS `tbl_foto_veiculo` (
  `id_foto_veiculo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela foto do veículo',
  `nome_foto` varchar(255) NOT NULL COMMENT 'nome da foto ',
  `id_veiculo` int(11) NOT NULL COMMENT 'código da tabela veículo',
  PRIMARY KEY (`id_foto_veiculo`),
  KEY `fk_tbl_foto_veiculo_tbl_veiculo_idx` (`id_veiculo`),
  CONSTRAINT `fk_tbl_foto_veiculo_tbl_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `tbl_veiculo` (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_foto_veiculo: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_foto_veiculo` DISABLE KEYS */;
INSERT INTO `tbl_foto_veiculo` (`id_foto_veiculo`, `nome_foto`, `id_veiculo`) VALUES
	(1, '1555769689957.jpg', 1),
	(2, '1555769695089.jpg', 1),
	(3, '1555769701029.jpg', 1),
	(4, '5167320905285632_1541683227319.jpg', 2),
	(5, '5167320905285632_1541683231994.jpg', 2),
	(6, '5167320905285632_1541683255232.jpg', 2),
	(7, '6122254203092992_1548158584194.jpg', 3),
	(8, '6122254203092992_1548158595896.jpg', 3),
	(9, '6122254203092992_1548160499989.jpg', 3),
	(10, '6122254203092992_1548158619550.jpg', 3),
	(11, '1555584420266.jpg', 4),
	(12, '1555584380806.jpg', 4),
	(13, '1555584460911.jpg', 4),
	(14, '1550485506367.jpg', 5),
	(15, '1550485514961.jpg', 5),
	(16, '1550485527415.jpg', 5),
	(17, '1556112353575.jpg', 6),
	(18, '1556112424145.jpg', 6),
	(19, '1556112260014.jpg', 6),
	(20, '6536687039545344_1533549331271.jpg', 7),
	(21, '6536687039545344_1533549339235.jpg', 7),
	(22, '1556634069364.jpg', 8),
	(23, '1556634054143.jpg', 8),
	(24, '1553966231647.jpg', 9),
	(25, '1553966241610.jpg', 9),
	(26, '1553966261018.jpg', 9);
/*!40000 ALTER TABLE `tbl_foto_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_funcionario
CREATE TABLE IF NOT EXISTS `tbl_funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de funcionário',
  `nome` varchar(100) NOT NULL COMMENT 'nome do funcionário',
  `cpf` varchar(16) NOT NULL COMMENT 'cpf do funcionário',
  `cod_funcionario` varchar(32) NOT NULL COMMENT 'código de verificação do funcionário',
  `email` varchar(150) NOT NULL COMMENT 'email do funcionário',
  `demissao` date DEFAULT NULL COMMENT 'data de demissão do funcionário',
  `rg` varchar(14) DEFAULT NULL COMMENT 'rg do funcionário',
  `dt_nacimento` date DEFAULT NULL COMMENT 'data de nascimento do funcionário',
  `cep` varchar(12) DEFAULT NULL COMMENT 'cep do endereço do funcionário',
  `uf` varchar(2) DEFAULT NULL COMMENT 'estado do funcionário',
  `cidade` varchar(100) DEFAULT NULL COMMENT 'cidade do funcionário',
  `bairro` varchar(80) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL COMMENT 'logradouro do endereço do funcionário',
  `n` varchar(10) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL COMMENT 'telefone do funcionário',
  `admissao` date DEFAULT NULL COMMENT 'data de admissão do funcionário',
  `id_setor` int(11) NOT NULL COMMENT 'código da tabela de setor',
  `id_cargo` int(11) NOT NULL,
  `excluido` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_tbl_setor_tbl_funcionario_idx` (`id_setor`),
  KEY `fk_tbl_cargo_tbl_funcionario_idx` (`id_cargo`),
  CONSTRAINT `fk_tbl_cargo_tbl_funcionario` FOREIGN KEY (`id_cargo`) REFERENCES `tbl_cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_setor_tbl_funcionario` FOREIGN KEY (`id_setor`) REFERENCES `tbl_setor` (`id_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_funcionario` DISABLE KEYS */;
INSERT INTO `tbl_funcionario` (`id_funcionario`, `nome`, `cpf`, `cod_funcionario`, `email`, `demissao`, `rg`, `dt_nacimento`, `cep`, `uf`, `cidade`, `bairro`, `logradouro`, `n`, `telefone`, `admissao`, `id_setor`, `id_cargo`, `excluido`) VALUES
	(8, 'Claudio Ramos', '342.895.237-94', 'f3423', 'claudio@ramos.com', NULL, '32.894.723-9', '2000-01-03', '54656-456', 'sp', 'Barueri', 'Silveira', 'rua jose', '763', '(54)6465-4151', '2019-05-15', 4, 18, 0);
/*!40000 ALTER TABLE `tbl_funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_home_sessao1
CREATE TABLE IF NOT EXISTS `tbl_home_sessao1` (
  `id_pagina_home` int(11) NOT NULL AUTO_INCREMENT,
  `texto_banner` text NOT NULL,
  `foto_banner` varchar(255) NOT NULL,
  `status_banner` float NOT NULL,
  `texto2_banner` text NOT NULL,
  PRIMARY KEY (`id_pagina_home`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_home_sessao1: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_home_sessao1` DISABLE KEYS */;
INSERT INTO `tbl_home_sessao1` (`id_pagina_home`, `texto_banner`, `foto_banner`, `status_banner`, `texto2_banner`) VALUES
	(1, 'Ganhar dinheiro compartilhando seu veículo nunca foi tão fácil!', 'imagem1.jpg', 1, '#anuncienamobshare'),
	(23, 'Ganhar dinheiro compartilhando seu veículo nunca foi tão fácil!', 'imagem1.jpg', 0, '#anuncienamobshare'),
	(24, 'Ganhar dinheiro compartilhando seu veículo nunca foi tão fácil!', 'imagem1.jpg', 1, '#anuncienamobshare'),
	(25, 'Ganhar dinheiro compartilhando seu veículo nunca foi tão fácil!', 'imagem1.jpg', 0, '#anuncienamobshare'),
	(26, 'Ganhar dinheiro compartilhando seu veículo nunca foi tão fácil!', 'imagem1.jpg', 1, '#anuncienamobshare'),
	(27, 'Ganhar dinheiro compartilhando seu veículo nunca foi tão fácil!', 'imagem1.jpg', 0, '#anuncienamobshare'),
	(28, 'Ganhar dinheiro compartilhando seu veículo nunca foi tão fácil!', 'imagem1.jpg', 1, '#anuncienamobshare');
/*!40000 ALTER TABLE `tbl_home_sessao1` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_home_sessao2
CREATE TABLE IF NOT EXISTS `tbl_home_sessao2` (
  `id_pagina_home2` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_sessao2` varchar(255) NOT NULL,
  `texto_sessao2` text NOT NULL,
  `foto_sessao2` varchar(255) NOT NULL,
  `status_sessao2` float NOT NULL,
  PRIMARY KEY (`id_pagina_home2`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_home_sessao2: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_home_sessao2` DISABLE KEYS */;
INSERT INTO `tbl_home_sessao2` (`id_pagina_home2`, `titulo_sessao2`, `texto_sessao2`, `foto_sessao2`, `status_sessao2`) VALUES
	(1, 'Como funciona?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'carr.jpg', 1);
/*!40000 ALTER TABLE `tbl_home_sessao2` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_home_sessao3
CREATE TABLE IF NOT EXISTS `tbl_home_sessao3` (
  `id_home_sessao3` int(11) NOT NULL AUTO_INCREMENT,
  `foto1_sessao3` varchar(255) NOT NULL,
  `foto2_sessao3` varchar(255) NOT NULL,
  `foto3_sessao3` varchar(255) NOT NULL,
  `titulo1_sessao3` varchar(255) NOT NULL,
  `titulo2_sessao3` varchar(255) NOT NULL,
  `titulo3_sessao3` varchar(255) NOT NULL,
  `texto1_sessao3` text NOT NULL,
  `texto2_sessao3` text NOT NULL,
  `texto3_sessao3` text NOT NULL,
  `status_sessao3` float NOT NULL,
  `titulo_sessao3` varchar(255) NOT NULL,
  PRIMARY KEY (`id_home_sessao3`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_home_sessao3: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_home_sessao3` DISABLE KEYS */;
INSERT INTO `tbl_home_sessao3` (`id_home_sessao3`, `foto1_sessao3`, `foto2_sessao3`, `foto3_sessao3`, `titulo1_sessao3`, `titulo2_sessao3`, `titulo3_sessao3`, `texto1_sessao3`, `texto2_sessao3`, `texto3_sessao3`, `status_sessao3`, `titulo_sessao3`) VALUES
	(1, 'bike.png', 'moto.png', 'car.png', 'Bicicletas', 'Motos', 'Carros', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus.', 1, 'O que pode ser alugador?');
/*!40000 ALTER TABLE `tbl_home_sessao3` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_home_sessao4
CREATE TABLE IF NOT EXISTS `tbl_home_sessao4` (
  `id_home_sessao4` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_sessao4` varchar(45) NOT NULL,
  `foto_sessao4` varchar(255) NOT NULL,
  `texto_sessao4` varchar(45) NOT NULL,
  `status_sessao4` varchar(45) NOT NULL,
  PRIMARY KEY (`id_home_sessao4`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_home_sessao4: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_home_sessao4` DISABLE KEYS */;
INSERT INTO `tbl_home_sessao4` (`id_home_sessao4`, `titulo_sessao4`, `foto_sessao4`, `texto_sessao4`, `status_sessao4`) VALUES
	(2, 'Por que anúnciar seu veículo?', 'carro_dinheiro.jpg', 'Lorem ipsum dolor sit amet, consectetur adipi', '1');
/*!40000 ALTER TABLE `tbl_home_sessao4` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_home_sessao5
CREATE TABLE IF NOT EXISTS `tbl_home_sessao5` (
  `id_home_sessao5` int(11) NOT NULL AUTO_INCREMENT,
  `status_sessao5` float NOT NULL,
  `titulo_sessao5` varchar(45) NOT NULL,
  `subtitulo1_sessao5` varchar(45) NOT NULL,
  `subtitulo2_sessao5` varchar(45) NOT NULL,
  `subtitulo3_sessao5` varchar(45) NOT NULL,
  `subtitulo4_sessao5` varchar(45) NOT NULL,
  `foto1_sessao5` varchar(255) NOT NULL,
  `foto2_sessao5` varchar(255) NOT NULL,
  `foto3_sessao5` varchar(255) NOT NULL,
  `foto4_sessao5` varchar(255) NOT NULL,
  `texto1_sessao5` text NOT NULL,
  `texto2_sessao5` text NOT NULL,
  `texto3_sessao5` text NOT NULL,
  `texto4_sessao5` text NOT NULL,
  `subtitulo_sessao5` varchar(255) NOT NULL,
  PRIMARY KEY (`id_home_sessao5`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_home_sessao5: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_home_sessao5` DISABLE KEYS */;
INSERT INTO `tbl_home_sessao5` (`id_home_sessao5`, `status_sessao5`, `titulo_sessao5`, `subtitulo1_sessao5`, `subtitulo2_sessao5`, `subtitulo3_sessao5`, `subtitulo4_sessao5`, `foto1_sessao5`, `foto2_sessao5`, `foto3_sessao5`, `foto4_sessao5`, `texto1_sessao5`, `texto2_sessao5`, `texto3_sessao5`, `texto4_sessao5`, `subtitulo_sessao5`) VALUES
	(1, 1, 'Quer anúnciar seu veículo?', 'Criar uma conta', 'Cadastre seu veículo', 'Crie um anúncio', 'Espere os interessados', 'user.png', 'key.png', 'ad.png', 'esperar.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo', 'dsadasdasdasdad');
/*!40000 ALTER TABLE `tbl_home_sessao5` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_locacao
CREATE TABLE IF NOT EXISTS `tbl_locacao` (
  `id_locacao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela locação',
  `id_cliente_locador` int(11) NOT NULL COMMENT 'código da tabela cliente locador',
  `id_anuncio` int(11) NOT NULL COMMENT 'código da tabela anúncio',
  `valor_locacao` float NOT NULL COMMENT 'valor da locação',
  `data_hora_final` datetime DEFAULT NULL COMMENT 'data e hora final da locação',
  `id_percentual` int(11) NOT NULL COMMENT 'código da tabela percentual',
  `status_finalizado` int(11) DEFAULT '0',
  PRIMARY KEY (`id_locacao`),
  KEY `fk_tbl_usuario_tbl_locacao_idx` (`id_cliente_locador`),
  KEY `fk_tbl_anuncio_tbl_locacao_idx` (`id_anuncio`),
  CONSTRAINT `fk_tbl_anuncio_tbl_locacao` FOREIGN KEY (`id_anuncio`) REFERENCES `tbl_anuncio` (`id_anuncio`),
  CONSTRAINT `fk_tbl_usuario_tbl_locacao` FOREIGN KEY (`id_cliente_locador`) REFERENCES `tbl_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_locacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_locacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_locacao` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_locacao_conta_pagar
CREATE TABLE IF NOT EXISTS `tbl_locacao_conta_pagar` (
  `id_locacao_conta_pagar` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela contas à pagar',
  `id_locacao` int(11) NOT NULL COMMENT 'código da tabela locação',
  `id_conta_pagar` int(11) NOT NULL COMMENT 'código da tabela contas à pagar',
  PRIMARY KEY (`id_locacao_conta_pagar`),
  KEY `fk_tbl_pagamento_cliente_tbl_locacao_idx` (`id_locacao`),
  KEY `fk_tbl_contas_pagar_tbl_locacao_conta_pagar_idx` (`id_conta_pagar`),
  CONSTRAINT `fk_tbl_contas_pagar_tbl_locacao_conta_pagar` FOREIGN KEY (`id_conta_pagar`) REFERENCES `tbl_contas_pagar` (`id_conta_pagar`),
  CONSTRAINT `fk_tbl_locacao_tbl_locacao_conta_pagar` FOREIGN KEY (`id_locacao`) REFERENCES `tbl_locacao` (`id_locacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_locacao_conta_pagar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_locacao_conta_pagar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_locacao_conta_pagar` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_locacao_conta_receber
CREATE TABLE IF NOT EXISTS `tbl_locacao_conta_receber` (
  `id_locacao_conta_receber` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela locação contas à receber',
  `id_locacao` int(11) NOT NULL COMMENT 'código da tabela locação',
  `id_conta_receber` int(11) NOT NULL COMMENT 'código da tabela contas à receber',
  PRIMARY KEY (`id_locacao_conta_receber`),
  KEY `fk_tbl_carteira_tbl_locacao_idx` (`id_locacao`),
  KEY `fk_tbl_contas_receber_tbl_locacao_conta_receber_idx` (`id_conta_receber`),
  CONSTRAINT `fk_tbl_contas_receber_tbl_locacao_conta_receber` FOREIGN KEY (`id_conta_receber`) REFERENCES `tbl_contas_receber` (`id_conta_receber`),
  CONSTRAINT `fk_tbl_locacao_tbl_locacao_contas_receber` FOREIGN KEY (`id_locacao`) REFERENCES `tbl_locacao` (`id_locacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_locacao_conta_receber: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_locacao_conta_receber` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_locacao_conta_receber` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_marca_veiculo
CREATE TABLE IF NOT EXISTS `tbl_marca_veiculo` (
  `id_marca_veiculo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da marca do veículo',
  `nome_marca` varchar(20) NOT NULL COMMENT 'nome da marca do veículo',
  `cod_fip` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_marca_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_marca_veiculo: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_marca_veiculo` DISABLE KEYS */;
INSERT INTO `tbl_marca_veiculo` (`id_marca_veiculo`, `nome_marca`, `cod_fip`, `status`) VALUES
	(1, 'ryundai', NULL, 1),
	(2, 'ryunday', NULL, 1),
	(3, 'Galeao4545', NULL, 1),
	(4, 'volkswagen', NULL, 1),
	(5, 'BMW', NULL, 1);
/*!40000 ALTER TABLE `tbl_marca_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_marca_veiculo_tipo_veiculo
CREATE TABLE IF NOT EXISTS `tbl_marca_veiculo_tipo_veiculo` (
  `id_tipo_marca` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela tipo da marca do veículo',
  `id_tipo_veiculo` int(11) NOT NULL COMMENT 'código da tabela tipo do veículo',
  `id_marca_veiculo` int(11) NOT NULL COMMENT 'código da tabelma marca do veículo',
  `excluido` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tipo_marca`),
  KEY `fk_tbl_marca_veiculo_tipo_veiculo_tbl_marca_veiculo_idx` (`id_marca_veiculo`),
  KEY `fk_tbl_marca_veiculo_tipo_veiculo_tbl_tipo_veiculo_idx` (`id_tipo_veiculo`),
  CONSTRAINT `fk_tbl_marca_veiculo_tipo_veiculo_tbl_marca_veiculo` FOREIGN KEY (`id_marca_veiculo`) REFERENCES `tbl_marca_veiculo` (`id_marca_veiculo`),
  CONSTRAINT `fk_tbl_marca_veiculo_tipo_veiculo_tbl_tipo_veiculo` FOREIGN KEY (`id_tipo_veiculo`) REFERENCES `tbl_tipo_veiculo` (`id_tipo_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_marca_veiculo_tipo_veiculo: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_marca_veiculo_tipo_veiculo` DISABLE KEYS */;
INSERT INTO `tbl_marca_veiculo_tipo_veiculo` (`id_tipo_marca`, `id_tipo_veiculo`, `id_marca_veiculo`, `excluido`) VALUES
	(1, 10, 1, 1),
	(2, 10, 2, 1),
	(3, 10, 3, 1),
	(4, 10, 4, 0),
	(5, 10, 5, 0);
/*!40000 ALTER TABLE `tbl_marca_veiculo_tipo_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_melhores_avaliacoes
CREATE TABLE IF NOT EXISTS `tbl_melhores_avaliacoes` (
  `id_melhores_avaliacoes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da página melhores avaliações',
  `titulo_melhores_avaliacoes` text NOT NULL COMMENT 'título da página melhores avaliações',
  `texto_melhores_avaliacoes` text NOT NULL COMMENT 'texto da página melhores avaliações',
  PRIMARY KEY (`id_melhores_avaliacoes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_melhores_avaliacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_melhores_avaliacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_melhores_avaliacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela menu',
  `nome_menu` varchar(25) NOT NULL COMMENT 'nome do menu',
  `href` varchar(150) NOT NULL COMMENT 'url/ link do menu',
  `icone` varchar(255) NOT NULL COMMENT 'ícone do menu',
  `onclick` varchar(255) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_menu: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` (`id_menu`, `nome_menu`, `href`, `icone`, `onclick`) VALUES
	(1, 'Gerenciar Paginas', '#', 'paginas.png', 'abrir_menu(\'120px\', \'#gerenciar_paginas\')'),
	(2, 'Gerenciar Veículos', '#', 'veiculo.png', 'abrir_menu(\'120px\', \'#gerenciar_veiculos\')'),
	(3, 'Anúncios', '#', 'anuncio.png', 'abrir_menu(\'120px\',\'#gerenciar_anuncios\')'),
	(4, 'Clientes', '#', 'cliente.png', 'conteudo_subMenu(\'clientes/clientes\',true)'),
	(5, 'Usuários', '#', 'funcionario.png', 'abrir_menu(\'140px\', \'#usuarios\', \'#usuario_atv\')'),
	(6, 'Fale conosco', '#', 'fale_conosco.png', 'conteudo_subMenu(\'fale_conosco/fale_conosco\',true)'),
	(7, 'Email marketing', '#', 'email.png', 'conteudo_subMenu(\'email_marketing/email_marketing\',true)');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_modelo_veiculo
CREATE TABLE IF NOT EXISTS `tbl_modelo_veiculo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela do modelo do veículo',
  `nome_modelo` varchar(50) NOT NULL COMMENT 'nome do modelo',
  `id_marca_tipo` int(11) NOT NULL COMMENT 'código da tabela marca tipo do veículo',
  `cod_fip` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `excluido` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_modelo`),
  KEY `fk_tbl_modelo_veiculo_tbl_marca_veiculo_tipo_veiculo_idx` (`id_marca_tipo`),
  CONSTRAINT `fk_tbl_modelo_veiculo_tbl_marca_veiculo_tipo_veiculo` FOREIGN KEY (`id_marca_tipo`) REFERENCES `tbl_marca_veiculo_tipo_veiculo` (`id_tipo_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_modelo_veiculo: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_modelo_veiculo` DISABLE KEYS */;
INSERT INTO `tbl_modelo_veiculo` (`id_modelo`, `nome_modelo`, `id_marca_tipo`, `cod_fip`, `status`, `excluido`) VALUES
	(3, 'Galeao', 1, NULL, 1, 1),
	(4, 'civiqui', 1, NULL, 1, 1),
	(5, 'Galeao', 2, NULL, 1, 1),
	(6, 'MOVE UP FLEX', 4, NULL, 1, 0),
	(7, 'NEW BEETLE', 4, NULL, 1, 0),
	(8, 'SPACEFOX', 4, NULL, 1, 0),
	(9, 'BMW X1', 5, NULL, 1, 0),
	(10, 'BMW 320I', 5, NULL, 1, 0),
	(11, 'BMW X6', 5, NULL, 1, 0),
	(12, ' GOLF', 4, NULL, 1, 0);
/*!40000 ALTER TABLE `tbl_modelo_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_niveis
CREATE TABLE IF NOT EXISTS `tbl_niveis` (
  `id_niveis` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela níveis',
  `nome_nivel` varchar(25) NOT NULL COMMENT 'nome do nível',
  `descricao` varchar(50) NOT NULL COMMENT 'descrição do nível',
  `excluido` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_niveis`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_niveis: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_niveis` DISABLE KEYS */;
INSERT INTO `tbl_niveis` (`id_niveis`, `nome_nivel`, `descricao`, `excluido`) VALUES
	(4, 'admin', 'Administra todas as operações do sistema', 1),
	(5, 'admin', 'administrador', 0);
/*!40000 ALTER TABLE `tbl_niveis` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_niveis_menu
CREATE TABLE IF NOT EXISTS `tbl_niveis_menu` (
  `id_niveis_menu` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela níveis do menu',
  `id_menu` int(11) NOT NULL COMMENT 'código da tabela menu',
  `id_niveis` int(11) NOT NULL COMMENT 'código da tabela níveis',
  PRIMARY KEY (`id_niveis_menu`),
  KEY `fk_tbl_niveis_menu_tbl_niveis_idx` (`id_niveis`),
  KEY `fk_tbl_niveis_menu_tbl_menu_idx` (`id_menu`),
  CONSTRAINT `fk_tbl_niveis_menu_tbl_menu` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id_menu`),
  CONSTRAINT `fk_tbl_niveis_menu_tbl_niveis` FOREIGN KEY (`id_niveis`) REFERENCES `tbl_niveis` (`id_niveis`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_niveis_menu: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_niveis_menu` DISABLE KEYS */;
INSERT INTO `tbl_niveis_menu` (`id_niveis_menu`, `id_menu`, `id_niveis`) VALUES
	(1, 1, 5),
	(2, 2, 5),
	(3, 3, 5),
	(4, 4, 5),
	(5, 5, 5),
	(6, 6, 5),
	(7, 7, 5);
/*!40000 ALTER TABLE `tbl_niveis_menu` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_operacoes
CREATE TABLE IF NOT EXISTS `tbl_operacoes` (
  `id_operacoes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela operações',
  `id_conta` int(11) NOT NULL COMMENT 'código da tabela conta',
  `data_entrada` date NOT NULL COMMENT 'data da entrada da operação',
  `id_usuario_desktop` int(11) NOT NULL COMMENT 'código do usuário do desktop',
  PRIMARY KEY (`id_operacoes`),
  KEY `fk_tbl_conta_tbl_operacoes_idx` (`id_conta`),
  KEY `fk_tbl_usuario_desktop_tbl_operacoes_idx` (`id_usuario_desktop`),
  CONSTRAINT `fk_tbl_conta_tbl_operacoes` FOREIGN KEY (`id_conta`) REFERENCES `tbl_conta` (`id_conta`),
  CONSTRAINT `fk_tbl_usuario_desktop_tbl_operacoes` FOREIGN KEY (`id_usuario_desktop`) REFERENCES `tbl_usuario_desktop` (`id_usuario_desktop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_operacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_operacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_operacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_operacoes_contas_pagar
CREATE TABLE IF NOT EXISTS `tbl_operacoes_contas_pagar` (
  `id_operacoes_contas_pagar` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela operações contas à receber',
  `id_contas_pagar` int(11) NOT NULL COMMENT 'código da tabela contas à pagar',
  `id_operacoes` int(11) NOT NULL COMMENT 'código da tabela operações',
  PRIMARY KEY (`id_operacoes_contas_pagar`),
  KEY `fk_tbl_contas_pagar_tbl_operacoes_contas_pagar_idx` (`id_contas_pagar`),
  KEY `fk_tbl_operacoes_tbl_operacoes_contas_pagar_idx` (`id_operacoes`),
  CONSTRAINT `fk_tbl_contas_pagar_tbl_operacoes_contas_pagar` FOREIGN KEY (`id_contas_pagar`) REFERENCES `tbl_contas_pagar` (`id_conta_pagar`),
  CONSTRAINT `fk_tbl_operacoes_tbl_operacoes_contas_pagar` FOREIGN KEY (`id_operacoes`) REFERENCES `tbl_operacoes` (`id_operacoes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_operacoes_contas_pagar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_operacoes_contas_pagar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_operacoes_contas_pagar` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_operacoes_contas_receber
CREATE TABLE IF NOT EXISTS `tbl_operacoes_contas_receber` (
  `id_operacoes_contas_receber` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela operações contas à receber',
  `id_contas_receber` int(11) NOT NULL COMMENT 'código da tabela contas à receber',
  `id_operacoes` int(11) NOT NULL COMMENT 'código da tabela operações',
  PRIMARY KEY (`id_operacoes_contas_receber`),
  KEY `fk_tbl__contas_receber_tbl_operacoes_contas_receber_idx` (`id_contas_receber`),
  KEY `fk_tbl_operacoes_tbl_operacoes_contas_receber_idx` (`id_operacoes`),
  CONSTRAINT `fk_tbl__contas_receber_tbl_operacoes_contas_receber` FOREIGN KEY (`id_contas_receber`) REFERENCES `tbl_contas_receber` (`id_conta_receber`),
  CONSTRAINT `fk_tbl_operacoes_tbl_operacoes_contas_receber` FOREIGN KEY (`id_operacoes`) REFERENCES `tbl_operacoes` (`id_operacoes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_operacoes_contas_receber: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_operacoes_contas_receber` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_operacoes_contas_receber` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_pagina_sobre
CREATE TABLE IF NOT EXISTS `tbl_pagina_sobre` (
  `id_sobre` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da página sobre',
  `titulo_sobre` varchar(45) NOT NULL COMMENT 'título da página sobre',
  `texto_sobre` varchar(45) NOT NULL COMMENT 'texto da página sobre',
  `foto_sobre` varchar(200) NOT NULL COMMENT 'foto da página sobre',
  `titulo_missao_sobre` text NOT NULL,
  `foto_missao_sobre` text NOT NULL COMMENT 'missão página sobre',
  `texto_missao_sobre` text NOT NULL,
  `titulo_visao_sobre` text NOT NULL,
  `texto_visao_sobre` text NOT NULL,
  `foto_visao_sobre` text NOT NULL COMMENT 'visão página sobre',
  `titulo_valores_sobre` text NOT NULL COMMENT 'valores da página sobre',
  `texto_valores_sobre` text NOT NULL,
  `foto_valores_sobre` text NOT NULL,
  PRIMARY KEY (`id_sobre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_pagina_sobre: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_pagina_sobre` DISABLE KEYS */;
INSERT INTO `tbl_pagina_sobre` (`id_sobre`, `titulo_sobre`, `texto_sobre`, `foto_sobre`, `titulo_missao_sobre`, `foto_missao_sobre`, `texto_missao_sobre`, `titulo_visao_sobre`, `texto_visao_sobre`, `foto_visao_sobre`, `titulo_valores_sobre`, `texto_valores_sobre`, `foto_valores_sobre`) VALUES
	(1, 'aaaaaaaa', 'aaaaaaaaaaaa', 'd8f20595d652e6eb13c267ada2ce35a0.png', 'aaaaaaaaaaa', 'e85bac6eff82f03e55700514db1ff178.jpg', 'aaaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaa', '155ce7820fff0f046b3f498ffe549297.png', 'aaaaaaaaaa', 'aaaaaaaaaaa', 'e85bac6eff82f03e55700514db1ff178.jpg');
/*!40000 ALTER TABLE `tbl_pagina_sobre` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_pedido
CREATE TABLE IF NOT EXISTS `tbl_pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela pedido',
  `valor_total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'valor total do pedido',
  `forma_pagamento` varchar(45) NOT NULL COMMENT 'forma de pagamento do pedido',
  `previsao_entrega` date NOT NULL COMMENT 'previsão de entrega do pedido',
  `cod_pedido` varchar(32) NOT NULL COMMENT 'código de barras do pedido',
  `natureza_da_compra` varchar(100) NOT NULL COMMENT 'origem da compra',
  `desconto` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'desconto na compra',
  `data_compra` date NOT NULL COMMENT 'data da compra',
  `frete` decimal(10,2) NOT NULL COMMENT 'frete do pedido',
  `id_fornecedor` int(11) NOT NULL COMMENT 'código da tabela fornecedor',
  `id_usuario_desktop` int(11) NOT NULL COMMENT 'código da tabela usuário desktop',
  PRIMARY KEY (`id_pedido`),
  KEY `fk_tbl_pedidos_tbl_fornecedor_idx` (`id_fornecedor`),
  KEY `fk_tbl_usuario_desktop_tbl_pedido_idx` (`id_usuario_desktop`),
  CONSTRAINT `fk_tbl_fornecedor_tbl_pedidos` FOREIGN KEY (`id_fornecedor`) REFERENCES `tbl_fornecedor` (`id_fornecedor`),
  CONSTRAINT `fk_tbl_usuario_desktop_tbl_pedido` FOREIGN KEY (`id_usuario_desktop`) REFERENCES `tbl_usuario_desktop` (`id_usuario_desktop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_pedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_pedido_contas_pagar
CREATE TABLE IF NOT EXISTS `tbl_pedido_contas_pagar` (
  `id_pedido_contas_pagar` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela pedidos de conta à pagar',
  `id_pedido` int(11) NOT NULL COMMENT 'código da tabela pedidos',
  `id_conta_pagar` int(11) NOT NULL COMMENT 'código da tabela contas à pagar',
  PRIMARY KEY (`id_pedido_contas_pagar`),
  KEY `fk_tbl_pedido_tbl_pedido_contas_pagar_idx` (`id_pedido`),
  KEY `fk_tbl_contas_pagar_tbl_pedido_contas_pagar_idx` (`id_conta_pagar`),
  CONSTRAINT `fk_tbl_contas_pagar_tbl_pedido_contas_pagar` FOREIGN KEY (`id_conta_pagar`) REFERENCES `tbl_contas_pagar` (`id_conta_pagar`),
  CONSTRAINT `fk_tbl_pedido_tbl_pedido_contas_pagar` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_pedido_contas_pagar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_pedido_contas_pagar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pedido_contas_pagar` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_pedido_produto
CREATE TABLE IF NOT EXISTS `tbl_pedido_produto` (
  `id_pedido_produto` int(11) NOT NULL COMMENT 'código da tabela produto do pedido',
  `quantidade` int(11) NOT NULL COMMENT 'quantidade de produtos',
  `valor` decimal(10,2) NOT NULL COMMENT 'valor unitário',
  `id_produto` int(11) NOT NULL COMMENT 'código da tabela do produto',
  `id_pedido` int(11) NOT NULL COMMENT 'código da tabela do pedido',
  PRIMARY KEY (`id_pedido_produto`),
  KEY `fk_produto_pedido_idx` (`id_pedido`),
  KEY `fk_tbl_produto_tbl_pedido_produto_idx` (`id_produto`),
  CONSTRAINT `fk_tbl_pedido_tbl_pedido_produto` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedido` (`id_pedido`),
  CONSTRAINT `fk_tbl_produto_tbl_pedido_produto` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_pedido_produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_pedido_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pedido_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_percentual
CREATE TABLE IF NOT EXISTS `tbl_percentual` (
  `id_percentual` int(11) NOT NULL AUTO_INCREMENT,
  `percentual` float NOT NULL,
  `id_tipo_veiculo` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id_percentual`),
  KEY `id_tipo_veiculo` (`id_tipo_veiculo`),
  CONSTRAINT `tbl_percentual_ibfk_1` FOREIGN KEY (`id_tipo_veiculo`) REFERENCES `tbl_tipo_veiculo` (`id_tipo_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_percentual: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_percentual` DISABLE KEYS */;
INSERT INTO `tbl_percentual` (`id_percentual`, `percentual`, `id_tipo_veiculo`, `data`) VALUES
	(13, 12, 10, '2019-04-25'),
	(14, 10, 11, '2019-04-25'),
	(15, 34, 12, '2019-04-25');
/*!40000 ALTER TABLE `tbl_percentual` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_percentual_desconto
CREATE TABLE IF NOT EXISTS `tbl_percentual_desconto` (
  `id_percentual_desconto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código do percentual de desconto',
  `percentual` float NOT NULL COMMENT 'porcentagem do percentual de desconto',
  `id_cliente` int(11) NOT NULL COMMENT 'código do cliente',
  `data_inicio` datetime NOT NULL COMMENT 'data de início do percentual de desconto',
  `data_final` datetime NOT NULL COMMENT 'data final do desconto',
  `codigo` varchar(15) NOT NULL COMMENT 'numeração do código de percentual de desconto',
  PRIMARY KEY (`id_percentual_desconto`),
  KEY `fk_tbl_percentual_desconto_tbl_cliente_idx` (`id_cliente`),
  CONSTRAINT `fk_tbl_percentual_desconto_tbl_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_percentual_desconto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_percentual_desconto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_percentual_desconto` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_permissoes
CREATE TABLE IF NOT EXISTS `tbl_permissoes` (
  `id_permissoes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de permissoes',
  `nome` varchar(45) NOT NULL COMMENT 'nome das permissoes',
  `titulo` varchar(45) NOT NULL COMMENT 'título das permissoes',
  `descricao` text COMMENT 'descrição das permissoes',
  `icone` varchar(100) NOT NULL COMMENT 'ícone das permissoes',
  `href` varchar(100) NOT NULL COMMENT 'link das permissoes',
  PRIMARY KEY (`id_permissoes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_permissoes: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_permissoes` DISABLE KEYS */;
INSERT INTO `tbl_permissoes` (`id_permissoes`, `nome`, `titulo`, `descricao`, `icone`, `href`) VALUES
	(1, 'Usuários', 'Usuários', 'Controla os Usuario do sistema e suas atribuições', 'far fa-user', 'javascript:getTbl(\'usuario\')'),
	(2, 'Funcionários', 'Funcionários', 'Controla os Funionarios incluindo seus salarios, setores e etc..', 'fas fa-briefcase', 'javascript:getTbl(\'funcionario\')'),
	(3, 'Conta a Receber', 'C. Receber', 'Controla as contas a Receber da empresa', 'fas fa-cash-register', 'javascript:getTbl(\'conta_receber\')'),
	(4, 'Conta a Pagar', 'C. Pagar', 'Controla as contas a Pagar da empresa', 'fas fa-money-check', 'javascript:getTbl(\'conta_pagar\')'),
	(5, 'Conciliação Bancaria', 'C. Bancaria', 'Controla as contas a Pagar da empresa', 'fas fa-tasks', 'javascript:getTbl(\'bancaria\')'),
	(6, 'Pedidos', 'Pedidos', 'Controla e criar os Pedidos de compra da empresa', 'fas fa-shopping-cart', 'javascript:getTbl(\'bancaria\')');
/*!40000 ALTER TABLE `tbl_permissoes` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_principais_anuncios
CREATE TABLE IF NOT EXISTS `tbl_principais_anuncios` (
  `id_principais_anuncios` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código principais anúncios',
  `id_anuncios_venda` int(11) NOT NULL COMMENT 'código da tabela anúncios a venda',
  `status` tinyint(4) NOT NULL COMMENT 'status dos principais anúncios',
  PRIMARY KEY (`id_principais_anuncios`),
  KEY `fk_tbl_principais_anuncios_tbl_anuncios_venda_idx` (`id_anuncios_venda`),
  CONSTRAINT `fk_tbl_principais_anuncios_tbl_anuncios_venda` FOREIGN KEY (`id_anuncios_venda`) REFERENCES `tbl_anuncio_venda` (`id_anuncio_venda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_principais_anuncios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_principais_anuncios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_principais_anuncios` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_produto
CREATE TABLE IF NOT EXISTS `tbl_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela prodto',
  `descricao` text COMMENT 'descrição do produto',
  `valor_unitario` decimal(10,2) NOT NULL COMMENT 'valor unitário do produto',
  `cod_produto` varchar(100) NOT NULL COMMENT 'código do produto',
  `nome` varchar(100) NOT NULL COMMENT 'nome do produto',
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_salario
CREATE TABLE IF NOT EXISTS `tbl_salario` (
  `id_salario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de salário',
  `salario` decimal(10,2) NOT NULL COMMENT 'salário do funcionário',
  `data_cadastro` datetime NOT NULL COMMENT 'data de cadastro do funcionário',
  `id_funcionario` int(11) NOT NULL COMMENT 'código da tabela de fucionário ',
  PRIMARY KEY (`id_salario`),
  KEY `fk_tbl_funcionario_tbl_salario_idx` (`id_funcionario`),
  CONSTRAINT `fk_tbl_funcionario_tbl_salario` FOREIGN KEY (`id_funcionario`) REFERENCES `tbl_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_salario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_salario` DISABLE KEYS */;
INSERT INTO `tbl_salario` (`id_salario`, `salario`, `data_cadastro`, `id_funcionario`) VALUES
	(1, 900.00, '2019-05-08 00:00:00', 8);
/*!40000 ALTER TABLE `tbl_salario` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_seja_parceiro
CREATE TABLE IF NOT EXISTS `tbl_seja_parceiro` (
  `id_seja_parceiro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da página seja parceiro',
  `titulo_seja_parceiro` varchar(45) NOT NULL COMMENT 'título da página seja parceiro',
  `texto_seja_parceiro` text NOT NULL COMMENT 'texto da página seja parceiro',
  `foto_seja_parceiro` varchar(100) NOT NULL COMMENT 'foto da página seja parceiro',
  PRIMARY KEY (`id_seja_parceiro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_seja_parceiro: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_seja_parceiro` DISABLE KEYS */;
INSERT INTO `tbl_seja_parceiro` (`id_seja_parceiro`, `titulo_seja_parceiro`, `texto_seja_parceiro`, `foto_seja_parceiro`) VALUES
	(1, 'asdasd', 'gdfgdgdfg', 'dc65a38fb992a06b5385c988978b0505.png'),
	(2, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'gas', 'b83b371182421844a51fe8a9f99b2478.png');
/*!40000 ALTER TABLE `tbl_seja_parceiro` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_seja_parceiro_banner
CREATE TABLE IF NOT EXISTS `tbl_seja_parceiro_banner` (
  `id_seja_parceiro_banner` int(11) NOT NULL AUTO_INCREMENT,
  `texto1_seja_parceiro_banner` varchar(255) NOT NULL,
  `texto2_seja_parceiro_banner` varchar(255) NOT NULL,
  `texto3_seja_parceiro_banner` varchar(255) NOT NULL,
  `foto1_seja_parceiro_banner` varchar(255) NOT NULL,
  `foto2_seja_parceiro_banner` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_seja_parceiro_banner`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_seja_parceiro_banner: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_seja_parceiro_banner` DISABLE KEYS */;
INSERT INTO `tbl_seja_parceiro_banner` (`id_seja_parceiro_banner`, `texto1_seja_parceiro_banner`, `texto2_seja_parceiro_banner`, `texto3_seja_parceiro_banner`, `foto1_seja_parceiro_banner`, `foto2_seja_parceiro_banner`, `status`) VALUES
	(1, 'Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus', 'Quero ser um Parceiro', 'Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus', 'bg-parceiros.jpg', 'bg-usuario.jpg', 1),
	(29, 'Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus', 'Quero ser um Parceiro', 'Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus', 'bg-parceiros.jpg', 'bg-usuario.jpg', 0),
	(30, 'Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus', 'Quero ser um Parceiro', 'Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus', 'bg-parceiros.jpg', 'bg-usuario.jpg', 1);
/*!40000 ALTER TABLE `tbl_seja_parceiro_banner` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_setor
CREATE TABLE IF NOT EXISTS `tbl_setor` (
  `id_setor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de setor',
  `nome` varchar(100) NOT NULL COMMENT 'nome do setor',
  PRIMARY KEY (`id_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_setor: ~33 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_setor` DISABLE KEYS */;
INSERT INTO `tbl_setor` (`id_setor`, `nome`) VALUES
	(1, 'Administrativo'),
	(2, 'Atacado'),
	(3, 'Atendimento ao cliente'),
	(4, 'Auditoria'),
	(5, 'Comercial'),
	(6, 'Comunicação'),
	(7, 'Contabilidade'),
	(8, 'Controladoria'),
	(9, 'Credit'),
	(10, 'Desenvolvimento de negócios'),
	(11, 'Estratégia'),
	(12, 'Financeiro'),
	(13, 'Garantia de Qualidade'),
	(14, 'Inteligência de Mercado'),
	(15, 'Legal'),
	(16, 'Logística'),
	(17, 'Manutenção'),
	(18, 'Marketing'),
	(19, 'Operações'),
	(20, 'Pesquisa e Desenvolvimento'),
	(21, 'Planejamento'),
	(22, 'Planejamento Financeiro'),
	(23, 'Processos'),
	(24, 'Produção'),
	(25, 'Projetos'),
	(26, 'Recursos Humanos'),
	(27, 'Seguros'),
	(28, 'Tesouraria'),
	(29, 'TI – Tecnologia da Informação'),
	(30, 'Treinamento e Desenvolvimento'),
	(31, 'Tributário, Fiscal'),
	(32, 'Varejo'),
	(33, 'Vendas');
/*!40000 ALTER TABLE `tbl_setor` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_solicitacao_anuncio
CREATE TABLE IF NOT EXISTS `tbl_solicitacao_anuncio` (
  `id_solicitacao_anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `id_anuncio` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `hora_inicial` time NOT NULL,
  `hora_final` time NOT NULL,
  `status_solicitacao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_solicitacao_anuncio`),
  KEY `fk_tbl_solicitacao_anuncio_tbl_anuncio_idx` (`id_anuncio`),
  KEY `fk_tbl_solicitacao-anuncio_tbl_cliente_idx` (`id_cliente`),
  CONSTRAINT `fk_tbl_solicitacao-anuncio_tbl_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_solicitacao_anuncio_tbl_anuncio` FOREIGN KEY (`id_anuncio`) REFERENCES `tbl_anuncio` (`id_anuncio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mob_share.tbl_solicitacao_anuncio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_solicitacao_anuncio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_solicitacao_anuncio` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_tabela_precos
CREATE TABLE IF NOT EXISTS `tbl_tabela_precos` (
  `id_tabela_precos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de preços',
  `titulo_tabela_precos` varchar(45) NOT NULL COMMENT 'título da tabela de preços',
  `texto_tabela_precos` varchar(45) NOT NULL COMMENT 'texto da tabela de preços',
  `descricao_tabela_precos` varchar(45) DEFAULT NULL COMMENT 'descrição da tabela de preços',
  `foto_tabela_precos` varchar(45) DEFAULT NULL COMMENT 'foto da tabela de preços',
  PRIMARY KEY (`id_tabela_precos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_tabela_precos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_tabela_precos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tabela_precos` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_termos_uso
CREATE TABLE IF NOT EXISTS `tbl_termos_uso` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da página termos de uso',
  `texto` text NOT NULL COMMENT 'pdf da página termos de uso',
  `titulo` text NOT NULL COMMENT 'título da página termos de uso',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_termos_uso: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_termos_uso` DISABLE KEYS */;
INSERT INTO `tbl_termos_uso` (`id`, `texto`, `titulo`, `status`) VALUES
	(1, 'TERMO DE USO DA PLATAFORMA DE COMENTÁRIOS\n\nEste termo de uso de plataforma de comentários (“Termo de Uso”) regulamenta a utilização da plataforma para a postagem de comentários (“Comentários”) em sites que integram o Portal Globo.com, disponibilizados pela GLOBO COMUNICAÇÃO E PARTICIPAÇÕES S.A., empresa com sede na Cidade e Estado do Rio de Janeiro, na Rua Lopes Quintas, nº 303, inscrita no CNPJ/MF sob o nº 27.865.757/0001-02, por sua filial localizada na Avenida das Américas, nº 700, Bloco 2A, salas 101 a 316, na Cidade e Estado do Rio de Janeiro, CEP: 22.640-100, inscrita no CNPJ/MF sob nº 27.865.757/0024-90, doravante denominada simplesmente "Globo.com", pela GLOBOSAT PROGRAMADORA LTDA., empresa com sede na Avenida das Américas, nº 1650, Bloco 1 - salas 304 a 308, Bloco 2 - salas 103 a 111, 118, 119, 121, 122, 125 e 126 e Bloco 05 - Loja 101, salas 201 e 301, Barra da Tijuca, na Cidade e Estado do Rio de Janeiro, inscrita no CNPJ/MF sob o nº 00.811.990/0001-48, doravante denominada simplesmente “Globosat” e pela EDITORA GLOBO S/A,  com sede na Avenida Jaguaré, 1.485, São Paulo/SP, CEP 05342-900, inscrita no CNPJ/MF sob o nº de 04.067.191/0001-60, doravante denominada simplesmente “Editora”, e quando em conjunto denominadas “Empresas”, aos seus usuários da internet, através do endereço eletrônico www.globo.com ("Portal Globo.com"). No ato de adesão à Plataforma, o usuário (doravante “Usuário” ou “Você”) se obriga a aceitar, plenamente e sem reservas, todos os termos e condições deste Termo de Uso:\n\n1 – DESTINAÇÃO DA PLATAFORMA\n\n1.1. As Empresas disponibilizarão, através dos sites que integram o Portal Globo.com, plataforma (“Plataforma”) interativa ao Usuário, através da qual será possível publicar e armazenar comentários (“Comentários”) a respeito dos conteúdos disponibilizados nos referidos sites do Portal Globo.com (“Produtos”). \n\n1.2. A Plataforma destina-se ao debate sobre o conteúdo publicado nos sites que integram o Portal Globo.com, apenas para fins informativos e de entretenimento, excluindo qualquer utilização comercial ou publicitária. A Plataforma e os Comentários não constituem aconselhamento jurídico, financeiro, médico ou profissional de qualquer natureza, pelo que não deverão ser utilizados para tais fins.\n\n1.3. Os Comentários feitos por Você serão identificados como de sua autoria, sendo proibido o anonimato. Os Comentários serão publicados pelas Empresas sem qualquer edição ou prévia moderação.\n\n1.4. Cada Produto do Portal poderá definir, a seu exclusivo critério, se poderão ser feitos Comentários sobre o conteúdo publicado, bem como o prazo em que a Plataforma ficará aberta para Comentários.\n\n\n2 - CADASTRO\n\n2.1. Para a utilização da Plataforma, Você deverá se cadastrar, criando um login e uma senha de acesso. Caso Você ainda não possua cadastro no Portal Globo.com, cadastre-se gratuitamente através do endereço https://login.globo.com/cadastro/3004, informando seus dados pessoais ("Dados Pessoais"), tais como nome completo, sexo, data de nascimento, e-mail, endereço e número de celular válido. Durante a realização do cadastro, Você precisará inserir um código alfanumérico no campo designado, código este que será enviado a Você por SMS para o número de celular por Você cadastrado. Cada número de celular somente poderá ser utilizado para a autenticação de um único Usuário.\n\n2.1.1. Ao se cadastrar, Você deverá informar dados verdadeiros, que serão de sua exclusiva responsabilidade. As Empresas não se responsabilizam por dados falsos inseridos no cadastro.\n\n2.1.2. Alterações no cadastro poderão ser feitas por Você através da Central de Relacionamento (http://globo.com/central).\n\n2.1.3. Lembre-se: Você não poderá escolher como login palavras e expressões já utilizados por outros Usuários;  que ofendam a terceiros; coincidentes com marcas de produtos ou serviços de terceiros, denominações sociais, expressões publicitárias, nomes ou pseudônimos de personalidades públicas, de pessoas famosas ou registrados por terceiros, ou que façam alusão a identidade destas, e também nomes de marcas, programas, produtos ou serviços das Empresas ou de qualquer uma de suas sociedades direta ou indiretamente controladas, controladoras ou sob controle comum.\n\n2.2. Para se cadastrar sozinho, Você precisa ter ao menos 18 (dezoito) anos completos e ser plenamente capaz e deve fazer uma declaração nesse sentido. Se Você for menor de 18 (dezoito) anos ou necessitar de representação na forma da lei, seus pais ou responsáveis deverão lhe representar ou assistir. Neste caso, eles deverão preencher o seu cadastro e se responsabilizarão integralmente por Você e por seus atos.\n\n2.3. Você é responsável por seu login e senha de acesso. Em caso de perda ou roubo da senha de acesso, deve comunicar imediatamente às Empresas, através do http://centraldeajuda.globo.com/.\n\n2.4. As Empresas manterão os Dados Pessoais, através de seu sistema automatizado, para os usos e finalidades definidas na sua Política de Privacidade, acessível através do endereço: http://www.globo.com/privacidade.html. Ao acessar a Plataforma, Você aceita a Política de Privacidade e concorda com o tratamento dos seus Dados Pessoais pelas Empresas.\n\n3 – CONDIÇÕES DE USO DA PLATAFORMA\n\n3.1. Ao utilizar a Plataforma, Você se compromete a observar o Termo de Uso, as normas e regulamentos das Empresas, a lei, a utilizar termos aceitáveis socialmente, e a não desrespeitar a ordem pública.\n\n3.2. Você não deverá utilizar a Plataforma para a prática de atos proibidos pela lei e pelo presente Termo de Uso, ou atos que possam danificar, inutilizar, sobrecarregar ou deteriorar a Plataforma, os equipamentos informáticos de outros usuários ou de outros internautas (hardware e software), assim como os documentos, arquivos e toda classe de conteúdos armazenados nos seus equipamentos informáticos (cracking) ou impedir a normal utilização da referida ferramenta, equipamentos informáticos e documentos, arquivos e conteúdos por parte dos demais usuários e de outros internautas.\n\n3.2.1. Você se compromete a não utilizar qualquer sistema automatizado, inclusive, mas sem se limitar a "robôs", "spiders" ou "offline readers," que acessem a Plataforma de maneira a enviar mais mensagens de solicitações aos servidores das Empresas em um dado período de tempo do que seja humanamente possível responder no mesmo período através de um navegador convencional. É igualmente vedada a coleta de qualquer informação pessoal dos demais usuários da Plataforma.\n\n3.3.  Você não deverá utilizar a Plataforma e/ou publicar Comentários com a finalidade de distribuir ou incentivar qualquer ideia e/ou opinião que por si mesma ou cuja transmissão:\n\n(a) Incite e/ou promova o descumprimento da lei, seja difamatória, infamante, violenta, degradante, pornográfica, ou, em geral, contrária a ordem pública;\n(b) Incite e/ou promova ações ou ideias discriminatórias em razão de raça, gênero, orientação sexual, religião, crença, deficiência, etnia, nacionalidade ou condição social;\n(c) Constitua comportamento predatório, perseguição, ameaças, assédios, intimidações ou chantagem a terceiros;\n(d) Incite práticas perigosas, de risco ou nocivas à saúde e ao equilíbrio psíquico;\n(e) Viole segredos empresariais de terceiros;\n(f) Seja contrária à honra, à intimidade pessoal e familiar ou à própria imagem das pessoas;\n(g) Viole propriedade intelectual ou industrial de terceiros, ou contribua para tais práticas;\n(h) Facilite a disseminação ou contenha material com vírus, dados corrompidos, ou qualquer outro elemento nocivo ou danoso;\n(i) Desrespeite a legislação eleitoral e partidária;\n(j) Utilize a Plataforma para fins comerciais ou publicitários, compreendidos, inclusive: spam, correspondência corporativa e comunicações com finalidade comercial (prospecção de negócios, venda de serviços e mercadorias, ainda que relacionados à pessoa física, etc.) ou uso relacionado com negócios, ou que anuncie ou ofereça a venda de produtos ou serviços (com ou sem fins lucrativos) ou que solicitem outros usuários ou terceiros (incluindo pedidos para contribuições ou donativos).\n\n3.4. Caso Você utilize a Plataforma ou publique Comentários contrariando as proibições da cláusula 3.3 acima ou contrariando qualquer outra disposição deste Termo de Uso, as Empresas poderão, a seu exclusivo critério, bloqueá-lo como Usuário, excluir quaisquer Comentários e/ou eliminar o cadastro do Usuário, a qualquer tempo e sem qualquer aviso prévio.\n\n3.5. Caso Você identifique que outro usuário praticou qualquer ato em desobediência a este Termo de Uso, poderá clicar no botão “Denunciar” presente na Plataforma.\n\n3.5.1. A partir do recebimento de 05 (cinco) denúncias contra um mesmo Comentário e/ou Usuário, o referido comentário e/ou o Usuário poderão ser bloqueados pelas Empresas, a seu exclusivo critério, sendo que o Usuário, nesta hipótese, não mais poderá usar a Plataforma.\n\n4 – CESSÃO DE DIREITOS\n\n4.1. Ao aceitar este Termo de Uso, Você concede às Empresas, bem como a terceiros eventualmente por ela indicados, com exclusividade, automática e gratuitamente, uma licença perpétua, em caráter irrestrito, irretratável e irrevogável, para fins de utilização, publicação, transmissão, distribuição e exibição do conteúdo dos Comentários disponibilizados por Você.\n\n4.2. As Empresas poderão livremente dispor dos Comentários, bem como de seus extratos, trechos ou partes, dando-lhes qualquer utilização econômica, sem que caiba a Você qualquer remuneração ou compensação, podendo, exemplificativamente, utilizá-los para produção de matéria promocional e peças publicitárias em qualquer tipo de mídia, inclusive impressa, para fins de divulgação de qualquer site do Portal Globo.com; fixá-los em qualquer tipo de suporte material, ou armazená-los em banco de dados; transmiti-los via rádio e/ou televisão de qualquer espécie, disseminá-los através da internet e/ou telefonia móvel ou fixa, incluindo as tecnologias de dispositivos de telas conectadas, bem como através de jornais e revistas, impressas ou online, exibir em circuito interno, e cedê-los a terceiros, ou, ainda, dar-lhes qualquer outra utilização que proporcione às Empresas alguma espécie de vantagem econômica. Nenhuma das utilizações aqui previstas tem limitação de tempo ou de número de vezes, podendo ocorrer no Brasil e/ou no exterior, a critério exclusivo das Empresas.\n\n4.3 Você, ao aceitar os Termos de Uso, manifesta a sua concordância com a utilização, pelas Empresas, segundo seu exclusivo critério, dos comentários postados através da Plataforma em qualquer mídia descrita no item 4.2, incluindo cards de fan pages, associados ou não à Plataforma, mediante a divulgação do nome do Usuário, e reconhece que as Empresas poderão adaptá-los para adequá-los ao formato de cada mídia ou plataforma tecnológica.', 'Consulte aqui mesmo o nosso Termo de uso', 1),
	(2, 'TERMO DE USO DA PLATAFORMA DE COMENTÁRIOS\r\n\r\nEste termo de uso de plataforma de comentários (“Termo de Uso”) regulamenta a utilização da plataforma para a postagem de comentários (“Comentários”) em sites que integram o Portal Globo.com, disponibilizados pela GLOBO COMUNICAÇÃO E PARTICIPAÇÕES S.A., empresa com sede na Cidade e Estado do Rio de Janeiro, na Rua Lopes Quintas, nº 303, inscrita no CNPJ/MF sob o nº 27.865.757/0001-02, por sua filial localizada na Avenida das Américas, nº 700, Bloco 2A, salas 101 a 316, na Cidade e Estado do Rio de Janeiro, CEP: 22.640-100, inscrita no CNPJ/MF sob nº 27.865.757/0024-90, doravante denominada simplesmente "Globo.com", pela GLOBOSAT PROGRAMADORA LTDA., empresa com sede na Avenida das Américas, nº 1650, Bloco 1 - salas 304 a 308, Bloco 2 - salas 103 a 111, 118, 119, 121, 122, 125 e 126 e Bloco 05 - Loja 101, salas 201 e 301, Barra da Tijuca, na Cidade e Estado do Rio de Janeiro, inscrita no CNPJ/MF sob o nº 00.811.990/0001-48, doravante denominada simplesmente “Globosat” e pela EDITORA GLOBO S/A,  com sede na Avenida Jaguaré, 1.485, São Paulo/SP, CEP 05342-900, inscrita no CNPJ/MF sob o nº de 04.067.191/0001-60, doravante denominada simplesmente “Editora”, e quando em conjunto denominadas “Empresas”, aos seus usuários da internet, através do endereço eletrônico www.globo.com ("Portal Globo.com"). No ato de adesão à Plataforma, o usuário (doravante “Usuário” ou “Você”) se obriga a aceitar, plenamente e sem reservas, todos os termos e condições deste Termo de Uso:\r\n\r\n1 – DESTINAÇÃO DA PLATAFORMA\r\n\r\n1.1. As Empresas disponibilizarão, através dos sites que integram o Portal Globo.com, plataforma (“Plataforma”) interativa ao Usuário, através da qual será possível publicar e armazenar comentários (“Comentários”) a respeito dos conteúdos disponibilizados nos referidos sites do Portal Globo.com (“Produtos”). \r\n\r\n1.2. A Plataforma destina-se ao debate sobre o conteúdo publicado nos sites que integram o Portal Globo.com, apenas para fins informativos e de entretenimento, excluindo qualquer utilização comercial ou publicitária. A Plataforma e os Comentários não constituem aconselhamento jurídico, financeiro, médico ou profissional de qualquer natureza, pelo que não deverão ser utilizados para tais fins.\r\n\r\n1.3. Os Comentários feitos por Você serão identificados como de sua autoria, sendo proibido o anonimato. Os Comentários serão publicados pelas Empresas sem qualquer edição ou prévia moderação.\r\n\r\n1.4. Cada Produto do Portal poderá definir, a seu exclusivo critério, se poderão ser feitos Comentários sobre o conteúdo publicado, bem como o prazo em que a Plataforma ficará aberta para Comentários.\r\n\r\n\r\n2 - CADASTRO\r\n\r\n2.1. Para a utilização da Plataforma, Você deverá se cadastrar, criando um login e uma senha de acesso. Caso Você ainda não possua cadastro no Portal Globo.com, cadastre-se gratuitamente através do endereço https://login.globo.com/cadastro/3004, informando seus dados pessoais ("Dados Pessoais"), tais como nome completo, sexo, data de nascimento, e-mail, endereço e número de celular válido. Durante a realização do cadastro, Você precisará inserir um código alfanumérico no campo designado, código este que será enviado a Você por SMS para o número de celular por Você cadastrado. Cada número de celular somente poderá ser utilizado para a autenticação de um único Usuário.\r\n\r\n2.1.1. Ao se cadastrar, Você deverá informar dados verdadeiros, que serão de sua exclusiva responsabilidade. As Empresas não se responsabilizam por dados falsos inseridos no cadastro.\r\n\r\n2.1.2. Alterações no cadastro poderão ser feitas por Você através da Central de Relacionamento (http://globo.com/central).\r\n\r\n2.1.3. Lembre-se: Você não poderá escolher como login palavras e expressões já utilizados por outros Usuários;  que ofendam a terceiros; coincidentes com marcas de produtos ou serviços de terceiros, denominações sociais, expressões publicitárias, nomes ou pseudônimos de personalidades públicas, de pessoas famosas ou registrados por terceiros, ou que façam alusão a identidade destas, e também nomes de marcas, programas, produtos ou serviços das Empresas ou de qualquer uma de suas sociedades direta ou indiretamente controladas, controladoras ou sob controle comum.\r\n\r\n2.2. Para se cadastrar sozinho, Você precisa ter ao menos 18 (dezoito) anos completos e ser plenamente capaz e deve fazer uma declaração nesse sentido. Se Você for menor de 18 (dezoito) anos ou necessitar de representação na forma da lei, seus pais ou responsáveis deverão lhe representar ou assistir. Neste caso, eles deverão preencher o seu cadastro e se responsabilizarão integralmente por Você e por seus atos.\r\n\r\n2.3. Você é responsável por seu login e senha de acesso. Em caso de perda ou roubo da senha de acesso, deve comunicar imediatamente às Empresas, através do http://centraldeajuda.globo.com/.\r\n\r\n2.4. As Empresas manterão os Dados Pessoais, através de seu sistema automatizado, para os usos e finalidades definidas na sua Política de Privacidade, acessível através do endereço: http://www.globo.com/privacidade.html. Ao acessar a Plataforma, Você aceita a Política de Privacidade e concorda com o tratamento dos seus Dados Pessoais pelas Empresas.\r\n\r\n3 – CONDIÇÕES DE USO DA PLATAFORMA\r\n\r\n3.1. Ao utilizar a Plataforma, Você se compromete a observar o Termo de Uso, as normas e regulamentos das Empresas, a lei, a utilizar termos aceitáveis socialmente, e a não desrespeitar a ordem pública.\r\n\r\n3.2. Você não deverá utilizar a Plataforma para a prática de atos proibidos pela lei e pelo presente Termo de Uso, ou atos que possam danificar, inutilizar, sobrecarregar ou deteriorar a Plataforma, os equipamentos informáticos de outros usuários ou de outros internautas (hardware e software), assim como os documentos, arquivos e toda classe de conteúdos armazenados nos seus equipamentos informáticos (cracking) ou impedir a normal utilização da referida ferramenta, equipamentos informáticos e documentos, arquivos e conteúdos por parte dos demais usuários e de outros internautas.\r\n\r\n3.2.1. Você se compromete a não utilizar qualquer sistema automatizado, inclusive, mas sem se limitar a "robôs", "spiders" ou "offline readers," que acessem a Plataforma de maneira a enviar mais mensagens de solicitações aos servidores das Empresas em um dado período de tempo do que seja humanamente possível responder no mesmo período através de um navegador convencional. É igualmente vedada a coleta de qualquer informação pessoal dos demais usuários da Plataforma.\r\n\r\n3.3.  Você não deverá utilizar a Plataforma e/ou publicar Comentários com a finalidade de distribuir ou incentivar qualquer ideia e/ou opinião que por si mesma ou cuja transmissão:\r\n\r\n(a) Incite e/ou promova o descumprimento da lei, seja difamatória, infamante, violenta, degradante, pornográfica, ou, em geral, contrária a ordem pública;\r\n(b) Incite e/ou promova ações ou ideias discriminatórias em razão de raça, gênero, orientação sexual, religião, crença, deficiência, etnia, nacionalidade ou condição social;\r\n(c) Constitua comportamento predatório, perseguição, ameaças, assédios, intimidações ou chantagem a terceiros;\r\n(d) Incite práticas perigosas, de risco ou nocivas à saúde e ao equilíbrio psíquico;\r\n(e) Viole segredos empresariais de terceiros;\r\n(f) Seja contrária à honra, à intimidade pessoal e familiar ou à própria imagem das pessoas;\r\n(g) Viole propriedade intelectual ou industrial de terceiros, ou contribua para tais práticas;\r\n(h) Facilite a disseminação ou contenha material com vírus, dados corrompidos, ou qualquer outro elemento nocivo ou danoso;\r\n(i) Desrespeite a legislação eleitoral e partidária;\r\n(j) Utilize a Plataforma para fins comerciais ou publicitários, compreendidos, inclusive: spam, correspondência corporativa e comunicações com finalidade comercial (prospecção de negócios, venda de serviços e mercadorias, ainda que relacionados à pessoa física, etc.) ou uso relacionado com negócios, ou que anuncie ou ofereça a venda de produtos ou serviços (com ou sem fins lucrativos) ou que solicitem outros usuários ou terceiros (incluindo pedidos para contribuições ou donativos).\r\n\r\n3.4. Caso Você utilize a Plataforma ou publique Comentários contrariando as proibições da cláusula 3.3 acima ou contrariando qualquer outra disposição deste Termo de Uso, as Empresas poderão, a seu exclusivo critério, bloqueá-lo como Usuário, excluir quaisquer Comentários e/ou eliminar o cadastro do Usuário, a qualquer tempo e sem qualquer aviso prévio.\r\n\r\n3.5. Caso Você identifique que outro usuário praticou qualquer ato em desobediência a este Termo de Uso, poderá clicar no botão “Denunciar” presente na Plataforma.\r\n\r\n3.5.1. A partir do recebimento de 05 (cinco) denúncias contra um mesmo Comentário e/ou Usuário, o referido comentário e/ou o Usuário poderão ser bloqueados pelas Empresas, a seu exclusivo critério, sendo que o Usuário, nesta hipótese, não mais poderá usar a Plataforma.\r\n\r\n4 – CESSÃO DE DIREITOS\r\n\r\n4.1. Ao aceitar este Termo de Uso, Você concede às Empresas, bem como a terceiros eventualmente por ela indicados, com exclusividade, automática e gratuitamente, uma licença perpétua, em caráter irrestrito, irretratável e irrevogável, para fins de utilização, publicação, transmissão, distribuição e exibição do conteúdo dos Comentários disponibilizados por Você.\r\n\r\n4.2. As Empresas poderão livremente dispor dos Comentários, bem como de seus extratos, trechos ou partes, dando-lhes qualquer utilização econômica, sem que caiba a Você qualquer remuneração ou compensação, podendo, exemplificativamente, utilizá-los para produção de matéria promocional e peças publicitárias em qualquer tipo de mídia, inclusive impressa, para fins de divulgação de qualquer site do Portal Globo.com; fixá-los em qualquer tipo de suporte material, ou armazená-los em banco de dados; transmiti-los via rádio e/ou televisão de qualquer espécie, disseminá-los através da internet e/ou telefonia móvel ou fixa, incluindo as tecnologias de dispositivos de telas conectadas, bem como através de jornais e revistas, impressas ou online, exibir em circuito interno, e cedê-los a terceiros, ou, ainda, dar-lhes qualquer outra utilização que proporcione às Empresas alguma espécie de vantagem econômica. Nenhuma das utilizações aqui previstas tem limitação de tempo ou de número de vezes, podendo ocorrer no Brasil e/ou no exterior, a critério exclusivo das Empresas.\r\n\r\n4.3 Você, ao aceitar os Termos de Uso, manifesta a sua concordância com a utilização, pelas Empresas, segundo seu exclusivo critério, dos comentários postados através da Plataforma em qualquer mídia descrita no item 4.2, incluindo cards de fan pages, associados ou não à Plataforma, mediante a divulgação do nome do Usuário, e reconhece que as Empresas poderão adaptá-los para adequá-los ao formato de cada mídia ou plataforma tecnológica.', 'Consulte aqui mesmo o nosso Termo de uso2', 1),
	(3, 'TERMO DE USO DA PLATAFORMA DE COMENTÁRIOS\r\n\r\nEste termo de uso de plataforma de comentários (“Termo de Uso”) regulamenta a utilização da plataforma para a postagem de comentários (“Comentários”) em sites que integram o Portal Globo.com, disponibilizados pela GLOBO COMUNICAÇÃO E PARTICIPAÇÕES S.A., empresa com sede na Cidade e Estado do Rio de Janeiro, na Rua Lopes Quintas, nº 303, inscrita no CNPJ/MF sob o nº 27.865.757/0001-02, por sua filial localizada na Avenida das Américas, nº 700, Bloco 2A, salas 101 a 316, na Cidade e Estado do Rio de Janeiro, CEP: 22.640-100, inscrita no CNPJ/MF sob nº 27.865.757/0024-90, doravante denominada simplesmente "Globo.com", pela GLOBOSAT PROGRAMADORA LTDA., empresa com sede na Avenida das Américas, nº 1650, Bloco 1 - salas 304 a 308, Bloco 2 - salas 103 a 111, 118, 119, 121, 122, 125 e 126 e Bloco 05 - Loja 101, salas 201 e 301, Barra da Tijuca, na Cidade e Estado do Rio de Janeiro, inscrita no CNPJ/MF sob o nº 00.811.990/0001-48, doravante denominada simplesmente “Globosat” e pela EDITORA GLOBO S/A,  com sede na Avenida Jaguaré, 1.485, São Paulo/SP, CEP 05342-900, inscrita no CNPJ/MF sob o nº de 04.067.191/0001-60, doravante denominada simplesmente “Editora”, e quando em conjunto denominadas “Empresas”, aos seus usuários da internet, através do endereço eletrônico www.globo.com ("Portal Globo.com"). No ato de adesão à Plataforma, o usuário (doravante “Usuário” ou “Você”) se obriga a aceitar, plenamente e sem reservas, todos os termos e condições deste Termo de Uso:\r\n\r\n1 – DESTINAÇÃO DA PLATAFORMA\r\n\r\n1.1. As Empresas disponibilizarão, através dos sites que integram o Portal Globo.com, plataforma (“Plataforma”) interativa ao Usuário, através da qual será possível publicar e armazenar comentários (“Comentários”) a respeito dos conteúdos disponibilizados nos referidos sites do Portal Globo.com (“Produtos”). \r\n\r\n1.2. A Plataforma destina-se ao debate sobre o conteúdo publicado nos sites que integram o Portal Globo.com, apenas para fins informativos e de entretenimento, excluindo qualquer utilização comercial ou publicitária. A Plataforma e os Comentários não constituem aconselhamento jurídico, financeiro, médico ou profissional de qualquer natureza, pelo que não deverão ser utilizados para tais fins.\r\n\r\n1.3. Os Comentários feitos por Você serão identificados como de sua autoria, sendo proibido o anonimato. Os Comentários serão publicados pelas Empresas sem qualquer edição ou prévia moderação.\r\n\r\n1.4. Cada Produto do Portal poderá definir, a seu exclusivo critério, se poderão ser feitos Comentários sobre o conteúdo publicado, bem como o prazo em que a Plataforma ficará aberta para Comentários.\r\n\r\n\r\n2 - CADASTRO\r\n\r\n2.1. Para a utilização da Plataforma, Você deverá se cadastrar, criando um login e uma senha de acesso. Caso Você ainda não possua cadastro no Portal Globo.com, cadastre-se gratuitamente através do endereço https://login.globo.com/cadastro/3004, informando seus dados pessoais ("Dados Pessoais"), tais como nome completo, sexo, data de nascimento, e-mail, endereço e número de celular válido. Durante a realização do cadastro, Você precisará inserir um código alfanumérico no campo designado, código este que será enviado a Você por SMS para o número de celular por Você cadastrado. Cada número de celular somente poderá ser utilizado para a autenticação de um único Usuário.\r\n\r\n2.1.1. Ao se cadastrar, Você deverá informar dados verdadeiros, que serão de sua exclusiva responsabilidade. As Empresas não se responsabilizam por dados falsos inseridos no cadastro.\r\n\r\n2.1.2. Alterações no cadastro poderão ser feitas por Você através da Central de Relacionamento (http://globo.com/central).\r\n\r\n2.1.3. Lembre-se: Você não poderá escolher como login palavras e expressões já utilizados por outros Usuários;  que ofendam a terceiros; coincidentes com marcas de produtos ou serviços de terceiros, denominações sociais, expressões publicitárias, nomes ou pseudônimos de personalidades públicas, de pessoas famosas ou registrados por terceiros, ou que façam alusão a identidade destas, e também nomes de marcas, programas, produtos ou serviços das Empresas ou de qualquer uma de suas sociedades direta ou indiretamente controladas, controladoras ou sob controle comum.\r\n\r\n2.2. Para se cadastrar sozinho, Você precisa ter ao menos 18 (dezoito) anos completos e ser plenamente capaz e deve fazer uma declaração nesse sentido. Se Você for menor de 18 (dezoito) anos ou necessitar de representação na forma da lei, seus pais ou responsáveis deverão lhe representar ou assistir. Neste caso, eles deverão preencher o seu cadastro e se responsabilizarão integralmente por Você e por seus atos.\r\n\r\n2.3. Você é responsável por seu login e senha de acesso. Em caso de perda ou roubo da senha de acesso, deve comunicar imediatamente às Empresas, através do http://centraldeajuda.globo.com/.\r\n\r\n2.4. As Empresas manterão os Dados Pessoais, através de seu sistema automatizado, para os usos e finalidades definidas na sua Política de Privacidade, acessível através do endereço: http://www.globo.com/privacidade.html. Ao acessar a Plataforma, Você aceita a Política de Privacidade e concorda com o tratamento dos seus Dados Pessoais pelas Empresas.\r\n\r\n3 – CONDIÇÕES DE USO DA PLATAFORMA\r\n\r\n3.1. Ao utilizar a Plataforma, Você se compromete a observar o Termo de Uso, as normas e regulamentos das Empresas, a lei, a utilizar termos aceitáveis socialmente, e a não desrespeitar a ordem pública.\r\n\r\n3.2. Você não deverá utilizar a Plataforma para a prática de atos proibidos pela lei e pelo presente Termo de Uso, ou atos que possam danificar, inutilizar, sobrecarregar ou deteriorar a Plataforma, os equipamentos informáticos de outros usuários ou de outros internautas (hardware e software), assim como os documentos, arquivos e toda classe de conteúdos armazenados nos seus equipamentos informáticos (cracking) ou impedir a normal utilização da referida ferramenta, equipamentos informáticos e documentos, arquivos e conteúdos por parte dos demais usuários e de outros internautas.\r\n\r\n3.2.1. Você se compromete a não utilizar qualquer sistema automatizado, inclusive, mas sem se limitar a "robôs", "spiders" ou "offline readers," que acessem a Plataforma de maneira a enviar mais mensagens de solicitações aos servidores das Empresas em um dado período de tempo do que seja humanamente possível responder no mesmo período através de um navegador convencional. É igualmente vedada a coleta de qualquer informação pessoal dos demais usuários da Plataforma.\r\n\r\n3.3.  Você não deverá utilizar a Plataforma e/ou publicar Comentários com a finalidade de distribuir ou incentivar qualquer ideia e/ou opinião que por si mesma ou cuja transmissão:\r\n\r\n(a) Incite e/ou promova o descumprimento da lei, seja difamatória, infamante, violenta, degradante, pornográfica, ou, em geral, contrária a ordem pública;\r\n(b) Incite e/ou promova ações ou ideias discriminatórias em razão de raça, gênero, orientação sexual, religião, crença, deficiência, etnia, nacionalidade ou condição social;\r\n(c) Constitua comportamento predatório, perseguição, ameaças, assédios, intimidações ou chantagem a terceiros;\r\n(d) Incite práticas perigosas, de risco ou nocivas à saúde e ao equilíbrio psíquico;\r\n(e) Viole segredos empresariais de terceiros;\r\n(f) Seja contrária à honra, à intimidade pessoal e familiar ou à própria imagem das pessoas;\r\n(g) Viole propriedade intelectual ou industrial de terceiros, ou contribua para tais práticas;\r\n(h) Facilite a disseminação ou contenha material com vírus, dados corrompidos, ou qualquer outro elemento nocivo ou danoso;\r\n(i) Desrespeite a legislação eleitoral e partidária;\r\n(j) Utilize a Plataforma para fins comerciais ou publicitários, compreendidos, inclusive: spam, correspondência corporativa e comunicações com finalidade comercial (prospecção de negócios, venda de serviços e mercadorias, ainda que relacionados à pessoa física, etc.) ou uso relacionado com negócios, ou que anuncie ou ofereça a venda de produtos ou serviços (com ou sem fins lucrativos) ou que solicitem outros usuários ou terceiros (incluindo pedidos para contribuições ou donativos).\r\n\r\n3.4. Caso Você utilize a Plataforma ou publique Comentários contrariando as proibições da cláusula 3.3 acima ou contrariando qualquer outra disposição deste Termo de Uso, as Empresas poderão, a seu exclusivo critério, bloqueá-lo como Usuário, excluir quaisquer Comentários e/ou eliminar o cadastro do Usuário, a qualquer tempo e sem qualquer aviso prévio.\r\n\r\n3.5. Caso Você identifique que outro usuário praticou qualquer ato em desobediência a este Termo de Uso, poderá clicar no botão “Denunciar” presente na Plataforma.\r\n\r\n3.5.1. A partir do recebimento de 05 (cinco) denúncias contra um mesmo Comentário e/ou Usuário, o referido comentário e/ou o Usuário poderão ser bloqueados pelas Empresas, a seu exclusivo critério, sendo que o Usuário, nesta hipótese, não mais poderá usar a Plataforma.\r\n\r\n4 – CESSÃO DE DIREITOS\r\n\r\n4.1. Ao aceitar este Termo de Uso, Você concede às Empresas, bem como a terceiros eventualmente por ela indicados, com exclusividade, automática e gratuitamente, uma licença perpétua, em caráter irrestrito, irretratável e irrevogável, para fins de utilização, publicação, transmissão, distribuição e exibição do conteúdo dos Comentários disponibilizados por Você.\r\n\r\n4.2. As Empresas poderão livremente dispor dos Comentários, bem como de seus extratos, trechos ou partes, dando-lhes qualquer utilização econômica, sem que caiba a Você qualquer remuneração ou compensação, podendo, exemplificativamente, utilizá-los para produção de matéria promocional e peças publicitárias em qualquer tipo de mídia, inclusive impressa, para fins de divulgação de qualquer site do Portal Globo.com; fixá-los em qualquer tipo de suporte material, ou armazená-los em banco de dados; transmiti-los via rádio e/ou televisão de qualquer espécie, disseminá-los através da internet e/ou telefonia móvel ou fixa, incluindo as tecnologias de dispositivos de telas conectadas, bem como através de jornais e revistas, impressas ou online, exibir em circuito interno, e cedê-los a terceiros, ou, ainda, dar-lhes qualquer outra utilização que proporcione às Empresas alguma espécie de vantagem econômica. Nenhuma das utilizações aqui previstas tem limitação de tempo ou de número de vezes, podendo ocorrer no Brasil e/ou no exterior, a critério exclusivo das Empresas.\r\n\r\n4.3 Você, ao aceitar os Termos de Uso, manifesta a sua concordância com a utilização, pelas Empresas, segundo seu exclusivo critério, dos comentários postados através da Plataforma em qualquer mídia descrita no item 4.2, incluindo cards de fan pages, associados ou não à Plataforma, mediante a divulgação do nome do Usuário, e reconhece que as Empresas poderão adaptá-los para adequá-los ao formato de cada mídia ou plataforma tecnológica.', 'Consulte aqui mesmo o nosso Termo de uso2', 1),
	(4, 'TERMO DE USO DA PLATAFORMA DE COMENTÁRIOS\r\n\r\nEste termo de uso de plataforma de comentários (“Termo de Uso”) regulamenta a utilização da plataforma para a postagem de comentários (“Comentários”) em sites que integram o Portal Globo.com, disponibilizados pela GLOBO COMUNICAÇÃO E PARTICIPAÇÕES S.A., empresa com sede na Cidade e Estado do Rio de Janeiro, na Rua Lopes Quintas, nº 303, inscrita no CNPJ/MF sob o nº 27.865.757/0001-02, por sua filial localizada na Avenida das Américas, nº 700, Bloco 2A, salas 101 a 316, na Cidade e Estado do Rio de Janeiro, CEP: 22.640-100, inscrita no CNPJ/MF sob nº 27.865.757/0024-90, doravante denominada simplesmente "Globo.com", pela GLOBOSAT PROGRAMADORA LTDA., empresa com sede na Avenida das Américas, nº 1650, Bloco 1 - salas 304 a 308, Bloco 2 - salas 103 a 111, 118, 119, 121, 122, 125 e 126 e Bloco 05 - Loja 101, salas 201 e 301, Barra da Tijuca, na Cidade e Estado do Rio de Janeiro, inscrita no CNPJ/MF sob o nº 00.811.990/0001-48, doravante denominada simplesmente “Globosat” e pela EDITORA GLOBO S/A,  com sede na Avenida Jaguaré, 1.485, São Paulo/SP, CEP 05342-900, inscrita no CNPJ/MF sob o nº de 04.067.191/0001-60, doravante denominada simplesmente “Editora”, e quando em conjunto denominadas “Empresas”, aos seus usuários da internet, através do endereço eletrônico www.globo.com ("Portal Globo.com"). No ato de adesão à Plataforma, o usuário (doravante “Usuário” ou “Você”) se obriga a aceitar, plenamente e sem reservas, todos os termos e condições deste Termo de Uso:\r\n\r\n1 – DESTINAÇÃO DA PLATAFORMA\r\n\r\n1.1. As Empresas disponibilizarão, através dos sites que integram o Portal Globo.com, plataforma (“Plataforma”) interativa ao Usuário, através da qual será possível publicar e armazenar comentários (“Comentários”) a respeito dos conteúdos disponibilizados nos referidos sites do Portal Globo.com (“Produtos”). \r\n\r\n1.2. A Plataforma destina-se ao debate sobre o conteúdo publicado nos sites que integram o Portal Globo.com, apenas para fins informativos e de entretenimento, excluindo qualquer utilização comercial ou publicitária. A Plataforma e os Comentários não constituem aconselhamento jurídico, financeiro, médico ou profissional de qualquer natureza, pelo que não deverão ser utilizados para tais fins.\r\n\r\n1.3. Os Comentários feitos por Você serão identificados como de sua autoria, sendo proibido o anonimato. Os Comentários serão publicados pelas Empresas sem qualquer edição ou prévia moderação.\r\n\r\n1.4. Cada Produto do Portal poderá definir, a seu exclusivo critério, se poderão ser feitos Comentários sobre o conteúdo publicado, bem como o prazo em que a Plataforma ficará aberta para Comentários.\r\n\r\n\r\n2 - CADASTRO\r\n\r\n2.1. Para a utilização da Plataforma, Você deverá se cadastrar, criando um login e uma senha de acesso. Caso Você ainda não possua cadastro no Portal Globo.com, cadastre-se gratuitamente através do endereço https://login.globo.com/cadastro/3004, informando seus dados pessoais ("Dados Pessoais"), tais como nome completo, sexo, data de nascimento, e-mail, endereço e número de celular válido. Durante a realização do cadastro, Você precisará inserir um código alfanumérico no campo designado, código este que será enviado a Você por SMS para o número de celular por Você cadastrado. Cada número de celular somente poderá ser utilizado para a autenticação de um único Usuário.\r\n\r\n2.1.1. Ao se cadastrar, Você deverá informar dados verdadeiros, que serão de sua exclusiva responsabilidade. As Empresas não se responsabilizam por dados falsos inseridos no cadastro.\r\n\r\n2.1.2. Alterações no cadastro poderão ser feitas por Você através da Central de Relacionamento (http://globo.com/central).\r\n\r\n2.1.3. Lembre-se: Você não poderá escolher como login palavras e expressões já utilizados por outros Usuários;  que ofendam a terceiros; coincidentes com marcas de produtos ou serviços de terceiros, denominações sociais, expressões publicitárias, nomes ou pseudônimos de personalidades públicas, de pessoas famosas ou registrados por terceiros, ou que façam alusão a identidade destas, e também nomes de marcas, programas, produtos ou serviços das Empresas ou de qualquer uma de suas sociedades direta ou indiretamente controladas, controladoras ou sob controle comum.\r\n\r\n2.2. Para se cadastrar sozinho, Você precisa ter ao menos 18 (dezoito) anos completos e ser plenamente capaz e deve fazer uma declaração nesse sentido. Se Você for menor de 18 (dezoito) anos ou necessitar de representação na forma da lei, seus pais ou responsáveis deverão lhe representar ou assistir. Neste caso, eles deverão preencher o seu cadastro e se responsabilizarão integralmente por Você e por seus atos.\r\n\r\n2.3. Você é responsável por seu login e senha de acesso. Em caso de perda ou roubo da senha de acesso, deve comunicar imediatamente às Empresas, através do http://centraldeajuda.globo.com/.\r\n\r\n2.4. As Empresas manterão os Dados Pessoais, através de seu sistema automatizado, para os usos e finalidades definidas na sua Política de Privacidade, acessível através do endereço: http://www.globo.com/privacidade.html. Ao acessar a Plataforma, Você aceita a Política de Privacidade e concorda com o tratamento dos seus Dados Pessoais pelas Empresas.\r\n\r\n3 – CONDIÇÕES DE USO DA PLATAFORMA\r\n\r\n3.1. Ao utilizar a Plataforma, Você se compromete a observar o Termo de Uso, as normas e regulamentos das Empresas, a lei, a utilizar termos aceitáveis socialmente, e a não desrespeitar a ordem pública.\r\n\r\n3.2. Você não deverá utilizar a Plataforma para a prática de atos proibidos pela lei e pelo presente Termo de Uso, ou atos que possam danificar, inutilizar, sobrecarregar ou deteriorar a Plataforma, os equipamentos informáticos de outros usuários ou de outros internautas (hardware e software), assim como os documentos, arquivos e toda classe de conteúdos armazenados nos seus equipamentos informáticos (cracking) ou impedir a normal utilização da referida ferramenta, equipamentos informáticos e documentos, arquivos e conteúdos por parte dos demais usuários e de outros internautas.\r\n\r\n3.2.1. Você se compromete a não utilizar qualquer sistema automatizado, inclusive, mas sem se limitar a "robôs", "spiders" ou "offline readers," que acessem a Plataforma de maneira a enviar mais mensagens de solicitações aos servidores das Empresas em um dado período de tempo do que seja humanamente possível responder no mesmo período através de um navegador convencional. É igualmente vedada a coleta de qualquer informação pessoal dos demais usuários da Plataforma.\r\n\r\n3.3.  Você não deverá utilizar a Plataforma e/ou publicar Comentários com a finalidade de distribuir ou incentivar qualquer ideia e/ou opinião que por si mesma ou cuja transmissão:\r\n\r\n(a) Incite e/ou promova o descumprimento da lei, seja difamatória, infamante, violenta, degradante, pornográfica, ou, em geral, contrária a ordem pública;\r\n(b) Incite e/ou promova ações ou ideias discriminatórias em razão de raça, gênero, orientação sexual, religião, crença, deficiência, etnia, nacionalidade ou condição social;\r\n(c) Constitua comportamento predatório, perseguição, ameaças, assédios, intimidações ou chantagem a terceiros;\r\n(d) Incite práticas perigosas, de risco ou nocivas à saúde e ao equilíbrio psíquico;\r\n(e) Viole segredos empresariais de terceiros;\r\n(f) Seja contrária à honra, à intimidade pessoal e familiar ou à própria imagem das pessoas;\r\n(g) Viole propriedade intelectual ou industrial de terceiros, ou contribua para tais práticas;\r\n(h) Facilite a disseminação ou contenha material com vírus, dados corrompidos, ou qualquer outro elemento nocivo ou danoso;\r\n(i) Desrespeite a legislação eleitoral e partidária;\r\n(j) Utilize a Plataforma para fins comerciais ou publicitários, compreendidos, inclusive: spam, correspondência corporativa e comunicações com finalidade comercial (prospecção de negócios, venda de serviços e mercadorias, ainda que relacionados à pessoa física, etc.) ou uso relacionado com negócios, ou que anuncie ou ofereça a venda de produtos ou serviços (com ou sem fins lucrativos) ou que solicitem outros usuários ou terceiros (incluindo pedidos para contribuições ou donativos).\r\n\r\n3.4. Caso Você utilize a Plataforma ou publique Comentários contrariando as proibições da cláusula 3.3 acima ou contrariando qualquer outra disposição deste Termo de Uso, as Empresas poderão, a seu exclusivo critério, bloqueá-lo como Usuário, excluir quaisquer Comentários e/ou eliminar o cadastro do Usuário, a qualquer tempo e sem qualquer aviso prévio.\r\n\r\n3.5. Caso Você identifique que outro usuário praticou qualquer ato em desobediência a este Termo de Uso, poderá clicar no botão “Denunciar” presente na Plataforma.\r\n\r\n3.5.1. A partir do recebimento de 05 (cinco) denúncias contra um mesmo Comentário e/ou Usuário, o referido comentário e/ou o Usuário poderão ser bloqueados pelas Empresas, a seu exclusivo critério, sendo que o Usuário, nesta hipótese, não mais poderá usar a Plataforma.\r\n\r\n4 – CESSÃO DE DIREITOS\r\n\r\n4.1. Ao aceitar este Termo de Uso, Você concede às Empresas, bem como a terceiros eventualmente por ela indicados, com exclusividade, automática e gratuitamente, uma licença perpétua, em caráter irrestrito, irretratável e irrevogável, para fins de utilização, publicação, transmissão, distribuição e exibição do conteúdo dos Comentários disponibilizados por Você.\r\n\r\n4.2. As Empresas poderão livremente dispor dos Comentários, bem como de seus extratos, trechos ou partes, dando-lhes qualquer utilização econômica, sem que caiba a Você qualquer remuneração ou compensação, podendo, exemplificativamente, utilizá-los para produção de matéria promocional e peças publicitárias em qualquer tipo de mídia, inclusive impressa, para fins de divulgação de qualquer site do Portal Globo.com; fixá-los em qualquer tipo de suporte material, ou armazená-los em banco de dados; transmiti-los via rádio e/ou televisão de qualquer espécie, disseminá-los através da internet e/ou telefonia móvel ou fixa, incluindo as tecnologias de dispositivos de telas conectadas, bem como através de jornais e revistas, impressas ou online, exibir em circuito interno, e cedê-los a terceiros, ou, ainda, dar-lhes qualquer outra utilização que proporcione às Empresas alguma espécie de vantagem econômica. Nenhuma das utilizações aqui previstas tem limitação de tempo ou de número de vezes, podendo ocorrer no Brasil e/ou no exterior, a critério exclusivo das Empresas.\r\n\r\n4.3 Você, ao aceitar os Termos de Uso, manifesta a sua concordância com a utilização, pelas Empresas, segundo seu exclusivo critério, dos comentários postados através da Plataforma em qualquer mídia descrita no item 4.2, incluindo cards de fan pages, associados ou não à Plataforma, mediante a divulgação do nome do Usuário, e reconhece que as Empresas poderão adaptá-los para adequá-los ao formato de cada mídia ou plataforma tecnológica.', 'Consulte aqui mesmo o nosso Termo de uso2', 0),
	(5, 'TERMO DE USO DA PLATAFORMA DE COMENTÁRIOS\r\n\r\nEste termo de uso de plataforma de comentários (“Termo de Uso”) regulamenta a utilização da plataforma para a postagem de comentários (“Comentários”) em sites que integram o Portal Globo.com, disponibilizados pela GLOBO COMUNICAÇÃO E PARTICIPAÇÕES S.A., empresa com sede na Cidade e Estado do Rio de Janeiro, na Rua Lopes Quintas, nº 303, inscrita no CNPJ/MF sob o nº 27.865.757/0001-02, por sua filial localizada na Avenida das Américas, nº 700, Bloco 2A, salas 101 a 316, na Cidade e Estado do Rio de Janeiro, CEP: 22.640-100, inscrita no CNPJ/MF sob nº 27.865.757/0024-90, doravante denominada simplesmente "Globo.com", pela GLOBOSAT PROGRAMADORA LTDA., empresa com sede na Avenida das Américas, nº 1650, Bloco 1 - salas 304 a 308, Bloco 2 - salas 103 a 111, 118, 119, 121, 122, 125 e 126 e Bloco 05 - Loja 101, salas 201 e 301, Barra da Tijuca, na Cidade e Estado do Rio de Janeiro, inscrita no CNPJ/MF sob o nº 00.811.990/0001-48, doravante denominada simplesmente “Globosat” e pela EDITORA GLOBO S/A,  com sede na Avenida Jaguaré, 1.485, São Paulo/SP, CEP 05342-900, inscrita no CNPJ/MF sob o nº de 04.067.191/0001-60, doravante denominada simplesmente “Editora”, e quando em conjunto denominadas “Empresas”, aos seus usuários da internet, através do endereço eletrônico www.globo.com ("Portal Globo.com"). No ato de adesão à Plataforma, o usuário (doravante “Usuário” ou “Você”) se obriga a aceitar, plenamente e sem reservas, todos os termos e condições deste Termo de Uso:\r\n\r\n1 – DESTINAÇÃO DA PLATAFORMA\r\n\r\n1.1. As Empresas disponibilizarão, através dos sites que integram o Portal Globo.com, plataforma (“Plataforma”) interativa ao Usuário, através da qual será possível publicar e armazenar comentários (“Comentários”) a respeito dos conteúdos disponibilizados nos referidos sites do Portal Globo.com (“Produtos”). \r\n\r\n1.2. A Plataforma destina-se ao debate sobre o conteúdo publicado nos sites que integram o Portal Globo.com, apenas para fins informativos e de entretenimento, excluindo qualquer utilização comercial ou publicitária. A Plataforma e os Comentários não constituem aconselhamento jurídico, financeiro, médico ou profissional de qualquer natureza, pelo que não deverão ser utilizados para tais fins.\r\n\r\n1.3. Os Comentários feitos por Você serão identificados como de sua autoria, sendo proibido o anonimato. Os Comentários serão publicados pelas Empresas sem qualquer edição ou prévia moderação.\r\n\r\n1.4. Cada Produto do Portal poderá definir, a seu exclusivo critério, se poderão ser feitos Comentários sobre o conteúdo publicado, bem como o prazo em que a Plataforma ficará aberta para Comentários.\r\n\r\n\r\n2 - CADASTRO\r\n\r\n2.1. Para a utilização da Plataforma, Você deverá se cadastrar, criando um login e uma senha de acesso. Caso Você ainda não possua cadastro no Portal Globo.com, cadastre-se gratuitamente através do endereço https://login.globo.com/cadastro/3004, informando seus dados pessoais ("Dados Pessoais"), tais como nome completo, sexo, data de nascimento, e-mail, endereço e número de celular válido. Durante a realização do cadastro, Você precisará inserir um código alfanumérico no campo designado, código este que será enviado a Você por SMS para o número de celular por Você cadastrado. Cada número de celular somente poderá ser utilizado para a autenticação de um único Usuário.\r\n\r\n2.1.1. Ao se cadastrar, Você deverá informar dados verdadeiros, que serão de sua exclusiva responsabilidade. As Empresas não se responsabilizam por dados falsos inseridos no cadastro.\r\n\r\n2.1.2. Alterações no cadastro poderão ser feitas por Você através da Central de Relacionamento (http://globo.com/central).\r\n\r\n2.1.3. Lembre-se: Você não poderá escolher como login palavras e expressões já utilizados por outros Usuários;  que ofendam a terceiros; coincidentes com marcas de produtos ou serviços de terceiros, denominações sociais, expressões publicitárias, nomes ou pseudônimos de personalidades públicas, de pessoas famosas ou registrados por terceiros, ou que façam alusão a identidade destas, e também nomes de marcas, programas, produtos ou serviços das Empresas ou de qualquer uma de suas sociedades direta ou indiretamente controladas, controladoras ou sob controle comum.\r\n\r\n2.2. Para se cadastrar sozinho, Você precisa ter ao menos 18 (dezoito) anos completos e ser plenamente capaz e deve fazer uma declaração nesse sentido. Se Você for menor de 18 (dezoito) anos ou necessitar de representação na forma da lei, seus pais ou responsáveis deverão lhe representar ou assistir. Neste caso, eles deverão preencher o seu cadastro e se responsabilizarão integralmente por Você e por seus atos.\r\n\r\n2.3. Você é responsável por seu login e senha de acesso. Em caso de perda ou roubo da senha de acesso, deve comunicar imediatamente às Empresas, através do http://centraldeajuda.globo.com/.\r\n\r\n2.4. As Empresas manterão os Dados Pessoais, através de seu sistema automatizado, para os usos e finalidades definidas na sua Política de Privacidade, acessível através do endereço: http://www.globo.com/privacidade.html. Ao acessar a Plataforma, Você aceita a Política de Privacidade e concorda com o tratamento dos seus Dados Pessoais pelas Empresas.\r\n\r\n3 – CONDIÇÕES DE USO DA PLATAFORMA\r\n\r\n3.1. Ao utilizar a Plataforma, Você se compromete a observar o Termo de Uso, as normas e regulamentos das Empresas, a lei, a utilizar termos aceitáveis socialmente, e a não desrespeitar a ordem pública.\r\n\r\n3.2. Você não deverá utilizar a Plataforma para a prática de atos proibidos pela lei e pelo presente Termo de Uso, ou atos que possam danificar, inutilizar, sobrecarregar ou deteriorar a Plataforma, os equipamentos informáticos de outros usuários ou de outros internautas (hardware e software), assim como os documentos, arquivos e toda classe de conteúdos armazenados nos seus equipamentos informáticos (cracking) ou impedir a normal utilização da referida ferramenta, equipamentos informáticos e documentos, arquivos e conteúdos por parte dos demais usuários e de outros internautas.\r\n\r\n3.2.1. Você se compromete a não utilizar qualquer sistema automatizado, inclusive, mas sem se limitar a "robôs", "spiders" ou "offline readers," que acessem a Plataforma de maneira a enviar mais mensagens de solicitações aos servidores das Empresas em um dado período de tempo do que seja humanamente possível responder no mesmo período através de um navegador convencional. É igualmente vedada a coleta de qualquer informação pessoal dos demais usuários da Plataforma.\r\n\r\n3.3.  Você não deverá utilizar a Plataforma e/ou publicar Comentários com a finalidade de distribuir ou incentivar qualquer ideia e/ou opinião que por si mesma ou cuja transmissão:\r\n\r\n(a) Incite e/ou promova o descumprimento da lei, seja difamatória, infamante, violenta, degradante, pornográfica, ou, em geral, contrária a ordem pública;\r\n(b) Incite e/ou promova ações ou ideias discriminatórias em razão de raça, gênero, orientação sexual, religião, crença, deficiência, etnia, nacionalidade ou condição social;\r\n(c) Constitua comportamento predatório, perseguição, ameaças, assédios, intimidações ou chantagem a terceiros;\r\n(d) Incite práticas perigosas, de risco ou nocivas à saúde e ao equilíbrio psíquico;\r\n(e) Viole segredos empresariais de terceiros;\r\n(f) Seja contrária à honra, à intimidade pessoal e familiar ou à própria imagem das pessoas;\r\n(g) Viole propriedade intelectual ou industrial de terceiros, ou contribua para tais práticas;\r\n(h) Facilite a disseminação ou contenha material com vírus, dados corrompidos, ou qualquer outro elemento nocivo ou danoso;\r\n(i) Desrespeite a legislação eleitoral e partidária;\r\n(j) Utilize a Plataforma para fins comerciais ou publicitários, compreendidos, inclusive: spam, correspondência corporativa e comunicações com finalidade comercial (prospecção de negócios, venda de serviços e mercadorias, ainda que relacionados à pessoa física, etc.) ou uso relacionado com negócios, ou que anuncie ou ofereça a venda de produtos ou serviços (com ou sem fins lucrativos) ou que solicitem outros usuários ou terceiros (incluindo pedidos para contribuições ou donativos).\r\n\r\n3.4. Caso Você utilize a Plataforma ou publique Comentários contrariando as proibições da cláusula 3.3 acima ou contrariando qualquer outra disposição deste Termo de Uso, as Empresas poderão, a seu exclusivo critério, bloqueá-lo como Usuário, excluir quaisquer Comentários e/ou eliminar o cadastro do Usuário, a qualquer tempo e sem qualquer aviso prévio.\r\n\r\n3.5. Caso Você identifique que outro usuário praticou qualquer ato em desobediência a este Termo de Uso, poderá clicar no botão “Denunciar” presente na Plataforma.\r\n\r\n3.5.1. A partir do recebimento de 05 (cinco) denúncias contra um mesmo Comentário e/ou Usuário, o referido comentário e/ou o Usuário poderão ser bloqueados pelas Empresas, a seu exclusivo critério, sendo que o Usuário, nesta hipótese, não mais poderá usar a Plataforma.\r\n\r\n4 – CESSÃO DE DIREITOS\r\n\r\n4.1. Ao aceitar este Termo de Uso, Você concede às Empresas, bem como a terceiros eventualmente por ela indicados, com exclusividade, automática e gratuitamente, uma licença perpétua, em caráter irrestrito, irretratável e irrevogável, para fins de utilização, publicação, transmissão, distribuição e exibição do conteúdo dos Comentários disponibilizados por Você.\r\n\r\n4.2. As Empresas poderão livremente dispor dos Comentários, bem como de seus extratos, trechos ou partes, dando-lhes qualquer utilização econômica, sem que caiba a Você qualquer remuneração ou compensação, podendo, exemplificativamente, utilizá-los para produção de matéria promocional e peças publicitárias em qualquer tipo de mídia, inclusive impressa, para fins de divulgação de qualquer site do Portal Globo.com; fixá-los em qualquer tipo de suporte material, ou armazená-los em banco de dados; transmiti-los via rádio e/ou televisão de qualquer espécie, disseminá-los através da internet e/ou telefonia móvel ou fixa, incluindo as tecnologias de dispositivos de telas conectadas, bem como através de jornais e revistas, impressas ou online, exibir em circuito interno, e cedê-los a terceiros, ou, ainda, dar-lhes qualquer outra utilização que proporcione às Empresas alguma espécie de vantagem econômica. Nenhuma das utilizações aqui previstas tem limitação de tempo ou de número de vezes, podendo ocorrer no Brasil e/ou no exterior, a critério exclusivo das Empresas.\r\n\r\n4.3 Você, ao aceitar os Termos de Uso, manifesta a sua concordância com a utilização, pelas Empresas, segundo seu exclusivo critério, dos comentários postados através da Plataforma em qualquer mídia descrita no item 4.2, incluindo cards de fan pages, associados ou não à Plataforma, mediante a divulgação do nome do Usuário, e reconhece que as Empresas poderão adaptá-los para adequá-los ao formato de cada mídia ou plataforma tecnológica.', 'Consulte aqui mesmo o nosso Termo de uso2', 1),
	(6, 'TERMO DE USO DA PLATAFORMA DE COMENTÁRIOS\r\n\r\nEste termo de uso de plataforma de comentários (“Termo de Uso”) regulamenta a utilização da plataforma para a postagem de comentários (“Comentários”) em sites que integram o Portal Globo.com, disponibilizados pela GLOBO COMUNICAÇÃO E PARTICIPAÇÕES S.A., empresa com sede na Cidade e Estado do Rio de Janeiro, na Rua Lopes Quintas, nº 303, inscrita no CNPJ/MF sob o nº 27.865.757/0001-02, por sua filial localizada na Avenida das Américas, nº 700, Bloco 2A, salas 101 a 316, na Cidade e Estado do Rio de Janeiro, CEP: 22.640-100, inscrita no CNPJ/MF sob nº 27.865.757/0024-90, doravante denominada simplesmente "Globo.com", pela GLOBOSAT PROGRAMADORA LTDA., empresa com sede na Avenida das Américas, nº 1650, Bloco 1 - salas 304 a 308, Bloco 2 - salas 103 a 111, 118, 119, 121, 122, 125 e 126 e Bloco 05 - Loja 101, salas 201 e 301, Barra da Tijuca, na Cidade e Estado do Rio de Janeiro, inscrita no CNPJ/MF sob o nº 00.811.990/0001-48, doravante denominada simplesmente “Globosat” e pela EDITORA GLOBO S/A,  com sede na Avenida Jaguaré, 1.485, São Paulo/SP, CEP 05342-900, inscrita no CNPJ/MF sob o nº de 04.067.191/0001-60, doravante denominada simplesmente “Editora”, e quando em conjunto denominadas “Empresas”, aos seus usuários da internet, através do endereço eletrônico www.globo.com ("Portal Globo.com"). No ato de adesão à Plataforma, o usuário (doravante “Usuário” ou “Você”) se obriga a aceitar, plenamente e sem reservas, todos os termos e condições deste Termo de Uso:\r\n\r\n1 – DESTINAÇÃO DA PLATAFORMA\r\n\r\n1.1. As Empresas disponibilizarão, através dos sites que integram o Portal Globo.com, plataforma (“Plataforma”) interativa ao Usuário, através da qual será possível publicar e armazenar comentários (“Comentários”) a respeito dos conteúdos disponibilizados nos referidos sites do Portal Globo.com (“Produtos”). \r\n\r\n1.2. A Plataforma destina-se ao debate sobre o conteúdo publicado nos sites que integram o Portal Globo.com, apenas para fins informativos e de entretenimento, excluindo qualquer utilização comercial ou publicitária. A Plataforma e os Comentários não constituem aconselhamento jurídico, financeiro, médico ou profissional de qualquer natureza, pelo que não deverão ser utilizados para tais fins.\r\n\r\n1.3. Os Comentários feitos por Você serão identificados como de sua autoria, sendo proibido o anonimato. Os Comentários serão publicados pelas Empresas sem qualquer edição ou prévia moderação.\r\n\r\n1.4. Cada Produto do Portal poderá definir, a seu exclusivo critério, se poderão ser feitos Comentários sobre o conteúdo publicado, bem como o prazo em que a Plataforma ficará aberta para Comentários.\r\n\r\n\r\n2 - CADASTRO\r\n\r\n2.1. Para a utilização da Plataforma, Você deverá se cadastrar, criando um login e uma senha de acesso. Caso Você ainda não possua cadastro no Portal Globo.com, cadastre-se gratuitamente através do endereço https://login.globo.com/cadastro/3004, informando seus dados pessoais ("Dados Pessoais"), tais como nome completo, sexo, data de nascimento, e-mail, endereço e número de celular válido. Durante a realização do cadastro, Você precisará inserir um código alfanumérico no campo designado, código este que será enviado a Você por SMS para o número de celular por Você cadastrado. Cada número de celular somente poderá ser utilizado para a autenticação de um único Usuário.\r\n\r\n2.1.1. Ao se cadastrar, Você deverá informar dados verdadeiros, que serão de sua exclusiva responsabilidade. As Empresas não se responsabilizam por dados falsos inseridos no cadastro.\r\n\r\n2.1.2. Alterações no cadastro poderão ser feitas por Você através da Central de Relacionamento (http://globo.com/central).\r\n\r\n2.1.3. Lembre-se: Você não poderá escolher como login palavras e expressões já utilizados por outros Usuários;  que ofendam a terceiros; coincidentes com marcas de produtos ou serviços de terceiros, denominações sociais, expressões publicitárias, nomes ou pseudônimos de personalidades públicas, de pessoas famosas ou registrados por terceiros, ou que façam alusão a identidade destas, e também nomes de marcas, programas, produtos ou serviços das Empresas ou de qualquer uma de suas sociedades direta ou indiretamente controladas, controladoras ou sob controle comum.\r\n\r\n2.2. Para se cadastrar sozinho, Você precisa ter ao menos 18 (dezoito) anos completos e ser plenamente capaz e deve fazer uma declaração nesse sentido. Se Você for menor de 18 (dezoito) anos ou necessitar de representação na forma da lei, seus pais ou responsáveis deverão lhe representar ou assistir. Neste caso, eles deverão preencher o seu cadastro e se responsabilizarão integralmente por Você e por seus atos.\r\n\r\n2.3. Você é responsável por seu login e senha de acesso. Em caso de perda ou roubo da senha de acesso, deve comunicar imediatamente às Empresas, através do http://centraldeajuda.globo.com/.\r\n\r\n2.4. As Empresas manterão os Dados Pessoais, através de seu sistema automatizado, para os usos e finalidades definidas na sua Política de Privacidade, acessível através do endereço: http://www.globo.com/privacidade.html. Ao acessar a Plataforma, Você aceita a Política de Privacidade e concorda com o tratamento dos seus Dados Pessoais pelas Empresas.\r\n\r\n3 – CONDIÇÕES DE USO DA PLATAFORMA\r\n\r\n3.1. Ao utilizar a Plataforma, Você se compromete a observar o Termo de Uso, as normas e regulamentos das Empresas, a lei, a utilizar termos aceitáveis socialmente, e a não desrespeitar a ordem pública.\r\n\r\n3.2. Você não deverá utilizar a Plataforma para a prática de atos proibidos pela lei e pelo presente Termo de Uso, ou atos que possam danificar, inutilizar, sobrecarregar ou deteriorar a Plataforma, os equipamentos informáticos de outros usuários ou de outros internautas (hardware e software), assim como os documentos, arquivos e toda classe de conteúdos armazenados nos seus equipamentos informáticos (cracking) ou impedir a normal utilização da referida ferramenta, equipamentos informáticos e documentos, arquivos e conteúdos por parte dos demais usuários e de outros internautas.\r\n\r\n3.2.1. Você se compromete a não utilizar qualquer sistema automatizado, inclusive, mas sem se limitar a "robôs", "spiders" ou "offline readers," que acessem a Plataforma de maneira a enviar mais mensagens de solicitações aos servidores das Empresas em um dado período de tempo do que seja humanamente possível responder no mesmo período através de um navegador convencional. É igualmente vedada a coleta de qualquer informação pessoal dos demais usuários da Plataforma.\r\n\r\n3.3.  Você não deverá utilizar a Plataforma e/ou publicar Comentários com a finalidade de distribuir ou incentivar qualquer ideia e/ou opinião que por si mesma ou cuja transmissão:\r\n\r\n(a) Incite e/ou promova o descumprimento da lei, seja difamatória, infamante, violenta, degradante, pornográfica, ou, em geral, contrária a ordem pública;\r\n(b) Incite e/ou promova ações ou ideias discriminatórias em razão de raça, gênero, orientação sexual, religião, crença, deficiência, etnia, nacionalidade ou condição social;\r\n(c) Constitua comportamento predatório, perseguição, ameaças, assédios, intimidações ou chantagem a terceiros;\r\n(d) Incite práticas perigosas, de risco ou nocivas à saúde e ao equilíbrio psíquico;\r\n(e) Viole segredos empresariais de terceiros;\r\n(f) Seja contrária à honra, à intimidade pessoal e familiar ou à própria imagem das pessoas;\r\n(g) Viole propriedade intelectual ou industrial de terceiros, ou contribua para tais práticas;\r\n(h) Facilite a disseminação ou contenha material com vírus, dados corrompidos, ou qualquer outro elemento nocivo ou danoso;\r\n(i) Desrespeite a legislação eleitoral e partidária;\r\n(j) Utilize a Plataforma para fins comerciais ou publicitários, compreendidos, inclusive: spam, correspondência corporativa e comunicações com finalidade comercial (prospecção de negócios, venda de serviços e mercadorias, ainda que relacionados à pessoa física, etc.) ou uso relacionado com negócios, ou que anuncie ou ofereça a venda de produtos ou serviços (com ou sem fins lucrativos) ou que solicitem outros usuários ou terceiros (incluindo pedidos para contribuições ou donativos).\r\n\r\n3.4. Caso Você utilize a Plataforma ou publique Comentários contrariando as proibições da cláusula 3.3 acima ou contrariando qualquer outra disposição deste Termo de Uso, as Empresas poderão, a seu exclusivo critério, bloqueá-lo como Usuário, excluir quaisquer Comentários e/ou eliminar o cadastro do Usuário, a qualquer tempo e sem qualquer aviso prévio.\r\n\r\n3.5. Caso Você identifique que outro usuário praticou qualquer ato em desobediência a este Termo de Uso, poderá clicar no botão “Denunciar” presente na Plataforma.\r\n\r\n3.5.1. A partir do recebimento de 05 (cinco) denúncias contra um mesmo Comentário e/ou Usuário, o referido comentário e/ou o Usuário poderão ser bloqueados pelas Empresas, a seu exclusivo critério, sendo que o Usuário, nesta hipótese, não mais poderá usar a Plataforma.\r\n\r\n4 – CESSÃO DE DIREITOS\r\n\r\n4.1. Ao aceitar este Termo de Uso, Você concede às Empresas, bem como a terceiros eventualmente por ela indicados, com exclusividade, automática e gratuitamente, uma licença perpétua, em caráter irrestrito, irretratável e irrevogável, para fins de utilização, publicação, transmissão, distribuição e exibição do conteúdo dos Comentários disponibilizados por Você.\r\n\r\n4.2. As Empresas poderão livremente dispor dos Comentários, bem como de seus extratos, trechos ou partes, dando-lhes qualquer utilização econômica, sem que caiba a Você qualquer remuneração ou compensação, podendo, exemplificativamente, utilizá-los para produção de matéria promocional e peças publicitárias em qualquer tipo de mídia, inclusive impressa, para fins de divulgação de qualquer site do Portal Globo.com; fixá-los em qualquer tipo de suporte material, ou armazená-los em banco de dados; transmiti-los via rádio e/ou televisão de qualquer espécie, disseminá-los através da internet e/ou telefonia móvel ou fixa, incluindo as tecnologias de dispositivos de telas conectadas, bem como através de jornais e revistas, impressas ou online, exibir em circuito interno, e cedê-los a terceiros, ou, ainda, dar-lhes qualquer outra utilização que proporcione às Empresas alguma espécie de vantagem econômica. Nenhuma das utilizações aqui previstas tem limitação de tempo ou de número de vezes, podendo ocorrer no Brasil e/ou no exterior, a critério exclusivo das Empresas.\r\n\r\n4.3 Você, ao aceitar os Termos de Uso, manifesta a sua concordância com a utilização, pelas Empresas, segundo seu exclusivo critério, dos comentários postados através da Plataforma em qualquer mídia descrita no item 4.2, incluindo cards de fan pages, associados ou não à Plataforma, mediante a divulgação do nome do Usuário, e reconhece que as Empresas poderão adaptá-los para adequá-los ao formato de cada mídia ou plataforma tecnológica.', 'Consulte aqui mesmo o nosso Termo de uso2', 0),
	(7, 'TERMO DE USO DA PLATAFORMA DE COMENTÁRIOS\r\n\r\nEste termo de uso de plataforma de comentários (“Termo de Uso”) regulamenta a utilização da plataforma para a postagem de comentários (“Comentários”) em sites que integram o Portal Globo.com, disponibilizados pela GLOBO COMUNICAÇÃO E PARTICIPAÇÕES S.A., empresa com sede na Cidade e Estado do Rio de Janeiro, na Rua Lopes Quintas, nº 303, inscrita no CNPJ/MF sob o nº 27.865.757/0001-02, por sua filial localizada na Avenida das Américas, nº 700, Bloco 2A, salas 101 a 316, na Cidade e Estado do Rio de Janeiro, CEP: 22.640-100, inscrita no CNPJ/MF sob nº 27.865.757/0024-90, doravante denominada simplesmente "Globo.com", pela GLOBOSAT PROGRAMADORA LTDA., empresa com sede na Avenida das Américas, nº 1650, Bloco 1 - salas 304 a 308, Bloco 2 - salas 103 a 111, 118, 119, 121, 122, 125 e 126 e Bloco 05 - Loja 101, salas 201 e 301, Barra da Tijuca, na Cidade e Estado do Rio de Janeiro, inscrita no CNPJ/MF sob o nº 00.811.990/0001-48, doravante denominada simplesmente “Globosat” e pela EDITORA GLOBO S/A,  com sede na Avenida Jaguaré, 1.485, São Paulo/SP, CEP 05342-900, inscrita no CNPJ/MF sob o nº de 04.067.191/0001-60, doravante denominada simplesmente “Editora”, e quando em conjunto denominadas “Empresas”, aos seus usuários da internet, através do endereço eletrônico www.globo.com ("Portal Globo.com"). No ato de adesão à Plataforma, o usuário (doravante “Usuário” ou “Você”) se obriga a aceitar, plenamente e sem reservas, todos os termos e condições deste Termo de Uso:\r\n\r\n1 – DESTINAÇÃO DA PLATAFORMA\r\n\r\n1.1. As Empresas disponibilizarão, através dos sites que integram o Portal Globo.com, plataforma (“Plataforma”) interativa ao Usuário, através da qual será possível publicar e armazenar comentários (“Comentários”) a respeito dos conteúdos disponibilizados nos referidos sites do Portal Globo.com (“Produtos”). \r\n\r\n1.2. A Plataforma destina-se ao debate sobre o conteúdo publicado nos sites que integram o Portal Globo.com, apenas para fins informativos e de entretenimento, excluindo qualquer utilização comercial ou publicitária. A Plataforma e os Comentários não constituem aconselhamento jurídico, financeiro, médico ou profissional de qualquer natureza, pelo que não deverão ser utilizados para tais fins.\r\n\r\n1.3. Os Comentários feitos por Você serão identificados como de sua autoria, sendo proibido o anonimato. Os Comentários serão publicados pelas Empresas sem qualquer edição ou prévia moderação.\r\n\r\n1.4. Cada Produto do Portal poderá definir, a seu exclusivo critério, se poderão ser feitos Comentários sobre o conteúdo publicado, bem como o prazo em que a Plataforma ficará aberta para Comentários.\r\n\r\n\r\n2 - CADASTRO\r\n\r\n2.1. Para a utilização da Plataforma, Você deverá se cadastrar, criando um login e uma senha de acesso. Caso Você ainda não possua cadastro no Portal Globo.com, cadastre-se gratuitamente através do endereço https://login.globo.com/cadastro/3004, informando seus dados pessoais ("Dados Pessoais"), tais como nome completo, sexo, data de nascimento, e-mail, endereço e número de celular válido. Durante a realização do cadastro, Você precisará inserir um código alfanumérico no campo designado, código este que será enviado a Você por SMS para o número de celular por Você cadastrado. Cada número de celular somente poderá ser utilizado para a autenticação de um único Usuário.\r\n\r\n2.1.1. Ao se cadastrar, Você deverá informar dados verdadeiros, que serão de sua exclusiva responsabilidade. As Empresas não se responsabilizam por dados falsos inseridos no cadastro.\r\n\r\n2.1.2. Alterações no cadastro poderão ser feitas por Você através da Central de Relacionamento (http://globo.com/central).\r\n\r\n2.1.3. Lembre-se: Você não poderá escolher como login palavras e expressões já utilizados por outros Usuários;  que ofendam a terceiros; coincidentes com marcas de produtos ou serviços de terceiros, denominações sociais, expressões publicitárias, nomes ou pseudônimos de personalidades públicas, de pessoas famosas ou registrados por terceiros, ou que façam alusão a identidade destas, e também nomes de marcas, programas, produtos ou serviços das Empresas ou de qualquer uma de suas sociedades direta ou indiretamente controladas, controladoras ou sob controle comum.\r\n\r\n2.2. Para se cadastrar sozinho, Você precisa ter ao menos 18 (dezoito) anos completos e ser plenamente capaz e deve fazer uma declaração nesse sentido. Se Você for menor de 18 (dezoito) anos ou necessitar de representação na forma da lei, seus pais ou responsáveis deverão lhe representar ou assistir. Neste caso, eles deverão preencher o seu cadastro e se responsabilizarão integralmente por Você e por seus atos.\r\n\r\n2.3. Você é responsável por seu login e senha de acesso. Em caso de perda ou roubo da senha de acesso, deve comunicar imediatamente às Empresas, através do http://centraldeajuda.globo.com/.\r\n\r\n2.4. As Empresas manterão os Dados Pessoais, através de seu sistema automatizado, para os usos e finalidades definidas na sua Política de Privacidade, acessível através do endereço: http://www.globo.com/privacidade.html. Ao acessar a Plataforma, Você aceita a Política de Privacidade e concorda com o tratamento dos seus Dados Pessoais pelas Empresas.\r\n\r\n3 – CONDIÇÕES DE USO DA PLATAFORMA\r\n\r\n3.1. Ao utilizar a Plataforma, Você se compromete a observar o Termo de Uso, as normas e regulamentos das Empresas, a lei, a utilizar termos aceitáveis socialmente, e a não desrespeitar a ordem pública.\r\n\r\n3.2. Você não deverá utilizar a Plataforma para a prática de atos proibidos pela lei e pelo presente Termo de Uso, ou atos que possam danificar, inutilizar, sobrecarregar ou deteriorar a Plataforma, os equipamentos informáticos de outros usuários ou de outros internautas (hardware e software), assim como os documentos, arquivos e toda classe de conteúdos armazenados nos seus equipamentos informáticos (cracking) ou impedir a normal utilização da referida ferramenta, equipamentos informáticos e documentos, arquivos e conteúdos por parte dos demais usuários e de outros internautas.\r\n\r\n3.2.1. Você se compromete a não utilizar qualquer sistema automatizado, inclusive, mas sem se limitar a "robôs", "spiders" ou "offline readers," que acessem a Plataforma de maneira a enviar mais mensagens de solicitações aos servidores das Empresas em um dado período de tempo do que seja humanamente possível responder no mesmo período através de um navegador convencional. É igualmente vedada a coleta de qualquer informação pessoal dos demais usuários da Plataforma.\r\n\r\n3.3.  Você não deverá utilizar a Plataforma e/ou publicar Comentários com a finalidade de distribuir ou incentivar qualquer ideia e/ou opinião que por si mesma ou cuja transmissão:\r\n\r\n(a) Incite e/ou promova o descumprimento da lei, seja difamatória, infamante, violenta, degradante, pornográfica, ou, em geral, contrária a ordem pública;\r\n(b) Incite e/ou promova ações ou ideias discriminatórias em razão de raça, gênero, orientação sexual, religião, crença, deficiência, etnia, nacionalidade ou condição social;\r\n(c) Constitua comportamento predatório, perseguição, ameaças, assédios, intimidações ou chantagem a terceiros;\r\n(d) Incite práticas perigosas, de risco ou nocivas à saúde e ao equilíbrio psíquico;\r\n(e) Viole segredos empresariais de terceiros;\r\n(f) Seja contrária à honra, à intimidade pessoal e familiar ou à própria imagem das pessoas;\r\n(g) Viole propriedade intelectual ou industrial de terceiros, ou contribua para tais práticas;\r\n(h) Facilite a disseminação ou contenha material com vírus, dados corrompidos, ou qualquer outro elemento nocivo ou danoso;\r\n(i) Desrespeite a legislação eleitoral e partidária;\r\n(j) Utilize a Plataforma para fins comerciais ou publicitários, compreendidos, inclusive: spam, correspondência corporativa e comunicações com finalidade comercial (prospecção de negócios, venda de serviços e mercadorias, ainda que relacionados à pessoa física, etc.) ou uso relacionado com negócios, ou que anuncie ou ofereça a venda de produtos ou serviços (com ou sem fins lucrativos) ou que solicitem outros usuários ou terceiros (incluindo pedidos para contribuições ou donativos).\r\n\r\n3.4. Caso Você utilize a Plataforma ou publique Comentários contrariando as proibições da cláusula 3.3 acima ou contrariando qualquer outra disposição deste Termo de Uso, as Empresas poderão, a seu exclusivo critério, bloqueá-lo como Usuário, excluir quaisquer Comentários e/ou eliminar o cadastro do Usuário, a qualquer tempo e sem qualquer aviso prévio.\r\n\r\n3.5. Caso Você identifique que outro usuário praticou qualquer ato em desobediência a este Termo de Uso, poderá clicar no botão “Denunciar” presente na Plataforma.\r\n\r\n3.5.1. A partir do recebimento de 05 (cinco) denúncias contra um mesmo Comentário e/ou Usuário, o referido comentário e/ou o Usuário poderão ser bloqueados pelas Empresas, a seu exclusivo critério, sendo que o Usuário, nesta hipótese, não mais poderá usar a Plataforma.\r\n\r\n4 – CESSÃO DE DIREITOS\r\n\r\n4.1. Ao aceitar este Termo de Uso, Você concede às Empresas, bem como a terceiros eventualmente por ela indicados, com exclusividade, automática e gratuitamente, uma licença perpétua, em caráter irrestrito, irretratável e irrevogável, para fins de utilização, publicação, transmissão, distribuição e exibição do conteúdo dos Comentários disponibilizados por Você.\r\n\r\n4.2. As Empresas poderão livremente dispor dos Comentários, bem como de seus extratos, trechos ou partes, dando-lhes qualquer utilização econômica, sem que caiba a Você qualquer remuneração ou compensação, podendo, exemplificativamente, utilizá-los para produção de matéria promocional e peças publicitárias em qualquer tipo de mídia, inclusive impressa, para fins de divulgação de qualquer site do Portal Globo.com; fixá-los em qualquer tipo de suporte material, ou armazená-los em banco de dados; transmiti-los via rádio e/ou televisão de qualquer espécie, disseminá-los através da internet e/ou telefonia móvel ou fixa, incluindo as tecnologias de dispositivos de telas conectadas, bem como através de jornais e revistas, impressas ou online, exibir em circuito interno, e cedê-los a terceiros, ou, ainda, dar-lhes qualquer outra utilização que proporcione às Empresas alguma espécie de vantagem econômica. Nenhuma das utilizações aqui previstas tem limitação de tempo ou de número de vezes, podendo ocorrer no Brasil e/ou no exterior, a critério exclusivo das Empresas.\r\n\r\n4.3 Você, ao aceitar os Termos de Uso, manifesta a sua concordância com a utilização, pelas Empresas, segundo seu exclusivo critério, dos comentários postados através da Plataforma em qualquer mídia descrita no item 4.2, incluindo cards de fan pages, associados ou não à Plataforma, mediante a divulgação do nome do Usuário, e reconhece que as Empresas poderão adaptá-los para adequá-los ao formato de cada mídia ou plataforma tecnológica.', 'Consulte aqui mesmo o nosso Termo de uso2', 1);
/*!40000 ALTER TABLE `tbl_termos_uso` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_tipo_veiculo
CREATE TABLE IF NOT EXISTS `tbl_tipo_veiculo` (
  `id_tipo_veiculo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela tipo de veículo',
  `nome_tipo_veiculo` varchar(20) NOT NULL COMMENT 'nome do tipo de veículo',
  `excluido` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tipo_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_tipo_veiculo: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_tipo_veiculo` DISABLE KEYS */;
INSERT INTO `tbl_tipo_veiculo` (`id_tipo_veiculo`, `nome_tipo_veiculo`, `excluido`) VALUES
	(10, 'carro', 0),
	(11, 'Livro', 1),
	(12, 'Livro', 1);
/*!40000 ALTER TABLE `tbl_tipo_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_usuario_cms
CREATE TABLE IF NOT EXISTS `tbl_usuario_cms` (
  `id_usuario_cms` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela usuário do  cms',
  `nome_usuario_cms` varchar(20) NOT NULL COMMENT 'nome de usuário do cms',
  `email_usuario_cms` varchar(150) NOT NULL COMMENT 'email do usuário do cms',
  `senha` varchar(255) NOT NULL COMMENT 'senha do usuário do cms',
  `id_niveis` int(11) NOT NULL COMMENT 'código da tabela nível',
  `excluido` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario_cms`),
  KEY `fk_tbl_usuario_cms_tbl_niveis_idx` (`id_niveis`),
  CONSTRAINT `fk_tbl_usuario_cms_tbl_niveis` FOREIGN KEY (`id_niveis`) REFERENCES `tbl_niveis` (`id_niveis`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_usuario_cms: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_usuario_cms` DISABLE KEYS */;
INSERT INTO `tbl_usuario_cms` (`id_usuario_cms`, `nome_usuario_cms`, `email_usuario_cms`, `senha`, `id_niveis`, `excluido`) VALUES
	(8, 'admin', 'admin@mobshare.com', '$2y$12$Q4jnH9kg.BRdM6fatTCCAOH5DK7Bhe8FwkEHVfGuCseCvPbD0ie7e', 5, 0);
/*!40000 ALTER TABLE `tbl_usuario_cms` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_usuario_desktop
CREATE TABLE IF NOT EXISTS `tbl_usuario_desktop` (
  `id_usuario_desktop` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela usuário desktop',
  `nome` varchar(100) NOT NULL COMMENT 'nome do usuário do desktop',
  `email` varchar(128) NOT NULL COMMENT 'email do usuário do desktop',
  `senha` varchar(128) DEFAULT NULL COMMENT 'senha do usuário do desktop',
  `telefone` varchar(14) DEFAULT NULL COMMENT 'telefone do usuário',
  `cpf` varchar(14) DEFAULT '0' COMMENT 'cpf do usuário',
  `logado` datetime DEFAULT NULL COMMENT 'data quando usuário logou',
  `foto` varchar(100) DEFAULT NULL COMMENT 'foto do usuário',
  `excluido` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'dado se o usuário foi excluído ou não',
  PRIMARY KEY (`id_usuario_desktop`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_usuario_desktop: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_usuario_desktop` DISABLE KEYS */;
INSERT INTO `tbl_usuario_desktop` (`id_usuario_desktop`, `nome`, `email`, `senha`, `telefone`, `cpf`, `logado`, `foto`, `excluido`) VALUES
	(1, 'Luiz Ricardo Silveira', 'lluizricardosilveira@eanac.com.br', '202cb962ac59075b964b07152d234b70', '(11)4303-0655', '312.024.068-07', NULL, NULL, 0);
/*!40000 ALTER TABLE `tbl_usuario_desktop` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_usuario_desktop_permissoes
CREATE TABLE IF NOT EXISTS `tbl_usuario_desktop_permissoes` (
  `id_usuario_desktop_permicoes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de permições do usuário  do desktop',
  `id_usuario_desktop` int(11) NOT NULL COMMENT 'código da tabela do usuário  do desktop',
  `id_permicoes` int(11) NOT NULL COMMENT 'código da tabela de permições',
  PRIMARY KEY (`id_usuario_desktop_permicoes`,`id_permicoes`),
  KEY `fk_tbl_permicoes_idx` (`id_permicoes`),
  KEY `fk_tbl_usuario_desktop_tbl_usuario_desktop_permicoes_idx` (`id_usuario_desktop`),
  CONSTRAINT `fk_tbl_permicoes_tbl_usuario_desktop_permicoes` FOREIGN KEY (`id_permicoes`) REFERENCES `tbl_permissoes` (`id_permissoes`),
  CONSTRAINT `fk_tbl_usuario_desktop_tbl_usuario_desktop_permicoes` FOREIGN KEY (`id_usuario_desktop`) REFERENCES `tbl_usuario_desktop` (`id_usuario_desktop`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mob_share.tbl_usuario_desktop_permissoes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_usuario_desktop_permissoes` DISABLE KEYS */;
INSERT INTO `tbl_usuario_desktop_permissoes` (`id_usuario_desktop_permicoes`, `id_usuario_desktop`, `id_permicoes`) VALUES
	(24, 1, 1),
	(25, 1, 2),
	(26, 1, 6);
/*!40000 ALTER TABLE `tbl_usuario_desktop_permissoes` ENABLE KEYS */;

-- Copiando estrutura para tabela mob_share.tbl_veiculo
CREATE TABLE IF NOT EXISTS `tbl_veiculo` (
  `id_veiculo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'código da tabela de veículo',
  `ano` varchar(45) NOT NULL,
  `placa` varchar(45) NOT NULL,
  `quilometragem` varchar(45) NOT NULL,
  `renavam` varchar(45) NOT NULL COMMENT 'renavam do veículo',
  `id_tipo_veiculo` int(11) NOT NULL COMMENT 'código da tabela tipo de veículo',
  `id_marca_veiculo` int(11) NOT NULL COMMENT 'código da tabela marca do veículo',
  `id_modelo_veiculo` int(11) NOT NULL COMMENT 'código da tabela modelo do veículo',
  `id_cliente` int(11) NOT NULL COMMENT 'código da tabela cliente',
  PRIMARY KEY (`id_veiculo`),
  KEY `fk_tbl_veiculo_tbl_tipo_veiculo_idx` (`id_tipo_veiculo`),
  KEY `fk_tbl_tbl_veiculo_tbl_marca_veiculo_idx` (`id_marca_veiculo`),
  KEY `fk_tbl_veiculo_tbl_modelo_veiculo_idx` (`id_modelo_veiculo`),
  KEY `fk_tbl_veiculo_tbl_cliente_idx` (`id_cliente`),
  CONSTRAINT `fk_tbl_tbl_veiculo_tbl_marca_veiculo` FOREIGN KEY (`id_marca_veiculo`) REFERENCES `tbl_marca_veiculo` (`id_marca_veiculo`),
  CONSTRAINT `fk_tbl_veiculo_tbl_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`),
  CONSTRAINT `fk_tbl_veiculo_tbl_modelo_veiculo` FOREIGN KEY (`id_modelo_veiculo`) REFERENCES `tbl_modelo_veiculo` (`id_modelo`),
  CONSTRAINT `fk_tbl_veiculo_tbl_tipo_veiculo` FOREIGN KEY (`id_tipo_veiculo`) REFERENCES `tbl_tipo_veiculo` (`id_tipo_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='	';

-- Copiando dados para a tabela mob_share.tbl_veiculo: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_veiculo` DISABLE KEYS */;
INSERT INTO `tbl_veiculo` (`id_veiculo`, `ano`, `placa`, `quilometragem`, `renavam`, `id_tipo_veiculo`, `id_marca_veiculo`, `id_modelo_veiculo`, `id_cliente`) VALUES
	(1, '2014', 'HJTY', '88026', '50766292645', 10, 4, 6, 1),
	(2, '2008', 'PIC45', '65195', '50582893948', 10, 4, 7, 1),
	(3, '2015', 'CN-346', '50748', '80562129195', 10, 4, 8, 1),
	(4, '2016', 'IUT-6GT', '57589', '10486980259', 10, 5, 9, 2),
	(5, '2013', 'OIP-756J', '77000', '39072700160', 10, 5, 10, 2),
	(6, '2014', 'GHY-6H5', '53803', '12036664000', 10, 5, 10, 2),
	(7, '2012', 'YUE-5DF', '45897', '53217774157', 10, 5, 11, 3),
	(8, '2017', 'ACD-6U4', '56897', '59817709762', 10, 4, 8, 3),
	(9, '2015', 'KJH-R456', '45687', '30245746848', 10, 4, 12, 3);
/*!40000 ALTER TABLE `tbl_veiculo` ENABLE KEYS */;

-- Copiando estrutura para view mob_share.view_anuncios
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `view_anuncios` (
	`locador` INT(1) NOT NULL,
	`celular` INT(1) NOT NULL,
	`telefone` INT(1) NOT NULL,
	`rua` INT(1) NOT NULL,
	`bairro` INT(1) NOT NULL,
	`cep` INT(1) NOT NULL,
	`complemento` INT(1) NOT NULL,
	`uf` INT(1) NOT NULL,
	`cidade` INT(1) NOT NULL,
	`id_cliente` INT(1) NOT NULL,
	`id_anuncio` INT(1) NOT NULL,
	`data_inicial` INT(1) NOT NULL,
	`data_final` INT(1) NOT NULL,
	`descricao` INT(1) NOT NULL,
	`horario_inicio` INT(1) NOT NULL,
	`horario_termino` INT(1) NOT NULL,
	`valor_hora` INT(1) NOT NULL,
	`ano` INT(1) NOT NULL,
	`placa` INT(1) NOT NULL,
	`quilometragem` INT(1) NOT NULL,
	`renavam` INT(1) NOT NULL,
	`nome_tipo_veiculo` INT(1) NOT NULL,
	`nome_marca` INT(1) NOT NULL,
	`nome_modelo` INT(1) NOT NULL,
	`id_tipo_veiculo` INT(1) NOT NULL,
	`id_tipo_marca` INT(1) NOT NULL,
	`id_modelo` INT(1) NOT NULL,
	`nome_foto` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view mob_share.view_tipo_marca
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `view_tipo_marca` (
	`id_tipo_veiculo` INT(1) NOT NULL,
	`id_marca_veiculo` INT(1) NOT NULL,
	`id_tipo_marca` INT(1) NOT NULL,
	`nome_marca` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view mob_share.view_anuncios
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `view_anuncios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`mob_share`@`%` SQL SECURITY DEFINER VIEW `view_anuncios` AS select 1 AS `locador`,1 AS `celular`,1 AS `telefone`,1 AS `rua`,1 AS `bairro`,1 AS `cep`,1 AS `complemento`,1 AS `uf`,1 AS `cidade`,1 AS `id_cliente`,1 AS `id_anuncio`,1 AS `data_inicial`,1 AS `data_final`,1 AS `descricao`,1 AS `horario_inicio`,1 AS `horario_termino`,1 AS `valor_hora`,1 AS `ano`,1 AS `placa`,1 AS `quilometragem`,1 AS `renavam`,1 AS `nome_tipo_veiculo`,1 AS `nome_marca`,1 AS `nome_modelo`,1 AS `id_tipo_veiculo`,1 AS `id_tipo_marca`,1 AS `id_modelo`,1 AS `nome_foto` ;

-- Copiando estrutura para view mob_share.view_tipo_marca
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `view_tipo_marca`;
CREATE ALGORITHM=UNDEFINED DEFINER=`mob_share`@`%` SQL SECURITY DEFINER VIEW `view_tipo_marca` AS select 1 AS `id_tipo_veiculo`,1 AS `id_marca_veiculo`,1 AS `id_tipo_marca`,1 AS `nome_marca` ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
