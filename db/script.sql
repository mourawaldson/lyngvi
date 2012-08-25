-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 29, 2007 as 11:13 AM
-- Versão do Servidor: 5.0.21
-- Versão do PHP: 5.1.4
--
-- Banco de Dados: `lyngvibanco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `Id` int(11) NOT NULL auto_increment,
  `Login` varchar(25) NOT NULL,
  `Senha` varchar(32) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` VALUES (1, 'root', 'ff9830c42660c1dd1942844f8069b74a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `baralho`
--

CREATE TABLE `baralho` (
  `Id` int(11) NOT NULL auto_increment,
  `Id_Jogador` int(11) NOT NULL,
  `Id_Carta` int(11) NOT NULL,
  `HP` int(11) default NULL,
  `Ataque` int(11) NOT NULL,
  `Defesa` int(11) NOT NULL,
  `Level` int(11) default NULL,
  `Experiencia` float default NULL,
  PRIMARY KEY  (`Id`),
  KEY `Id_Jogador` (`Id_Jogador`),
  KEY `Id_Carta` (`Id_Carta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `baralho`
--

INSERT INTO `baralho` VALUES (1, 1, 5, 30, 10, 10, 1, 0),
			     (2, 1, 4, 30, 10, 10, 1, 0),
			     (3, 1, 2, 30, 10, 10, 1, 0),
			     (4, 2, 2, 30, 10, 10, 1, 0),
			     (5, 2, 1, 30, 10, 10, 1, 0),
			     (6, 2, 3, 30, 10, 10, 1, 0),
			     (7, 3, 6, 30, 10, 10, 1, 0),
			     (8, 3, 7, 30, 10, 10, 1, 0),
			     (9, 3, 8, 30, 10, 10, 1, 0),
			     (10, 4, 10, 30, 10, 10, 1, 0),
			     (11, 4, 8, 30, 10, 10, 1, 0),
			     (12, 4, 6, 30, 10, 10, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartas`
--

CREATE TABLE `cartas` (
  `Id` int(11) NOT NULL auto_increment,
  `Id_Tipo` int(11) NOT NULL,
  `Id_Terreno` int(11) NOT NULL,
  `Nome` varchar(25) NOT NULL,
  `Nivel` smallint(6) default NULL,
  `Url_Imagem` varchar(50) NOT NULL,
  PRIMARY KEY  (`Id`),
  KEY `Id_Tipo` (`Id_Tipo`),
  KEY `Id_Terreno` (`Id_Terreno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `cartas`
--

INSERT INTO `cartas` VALUES 	(1, 1, 1, 'Moku', 1, 'imgs/Cartas/Moku.png'),
				(2, 1, 1, 'Agassu', 1, 'imgs/Cartas/Agassu.png'),
				(3, 1, 2, 'Vogelmann', 1, 'imgs/Cartas/Vogelmann.png'),
				(4, 1, 2, 'Drachebaby', 1, 'imgs/Cartas/Drachebaby.png'),
				(5, 1, 3, 'Cíclopus', 1, 'imgs/Cartas/Cíclopus.png'),
				(6, 1, 3, 'Rá', 1, 'imgs/Cartas/Ra.png'),
				(7, 1, 4, 'Fangorana', 1, 'imgs/Cartas/Fangorana.png'),
				(8, 1, 4, 'Jewel', 1, 'imgs/Cartas/Jewel.png'),
				(9, 1, 5, 'Siren', 1, 'imgs/Cartas/Siren.png'),
				(10, 1, 5, 'Gefangener', 1, 'imgs/Cartas/Gefangener.png'),
				(11, 1, 1, 'Ent', 2, 'imgs/Cartas/Ent.png'),
				(12, 1, 1, 'Euthanatos', 2, 'imgs/Cartas/Euthanatos.png'),
				(13, 1, 2, 'Vogelroboter', 2, 'imgs/Cartas/Vogelroboter.png'),
				(14, 1, 2, 'Dracul', 2, 'imgs/Cartas/Dracul.png'),
				(15, 1, 3, 'Fleisch', 2, 'imgs/Cartas/Fleisch.png'),
				(16, 1, 3, 'Amon', 2, 'imgs/Cartas/Amon.png'),
				(17, 1, 4, 'Trito', 2, 'imgs/Cartas/Trito.png'),
				(18, 1, 4, 'Hipuplara', 2, 'imgs/Cartas/Hipuplara.png'),
				(19, 1, 5, 'D\'arc', 2, 'imgs/Cartas/Darc.png'),
				(20, 1, 5, 'Frei', 2, 'imgs/Cartas/Frei.png'),
				(21, 1, 1, 'Yggdrasil', 3, 'imgs/Cartas/Yggdrasil.png'),
				(22, 1, 1, 'Samedi', 3, 'imgs/Cartas/Samedi.png'),
				(23, 1, 2, 'Phoenix', 3, 'imgs/Cartas/Phoenix.png'),
				(24, 1, 2, 'Timat', 3, 'imgs/Cartas/Timat.png'),
				(25, 1, 3, 'Vozhd', 3, 'imgs/Cartas/Vozhd.png'),
				(26, 1, 3, 'Colossus', 3, 'imgs/Cartas/Colossus.png'),
				(27, 1, 4, 'Zora', 3, 'imgs/Cartas/Zora.png'),
				(28, 1, 4, 'Vodyanoi', 3, 'imgs/Cartas/Vodyanoi.png'),
				(29, 1, 5, 'Fee', 3, 'imgs/Cartas/Fee.png'),
				(30, 1, 5, 'Alt', 3, 'imgs/Cartas/Alt.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convites`
--

CREATE TABLE `convites` (
  `Id_Jogador_Desafiante` int(11) NOT NULL,
  `Id_Jogador_Desafiado` int(11) NOT NULL,
  `DataHora` datetime NOT NULL,
  `Status` bool NOT NULL,
  PRIMARY KEY  (`Id_Jogador_Desafiante`),
  KEY `Id_Jogador_Desafiado` (`Id_Jogador_Desafiado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `convites`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE `jogadores` (
  `Id` int(11) NOT NULL auto_increment,
  `Id_Usuario` int(11) NOT NULL,
  `Nome` varchar(25) NOT NULL,
  `Qtd_Partidas` int(11) NOT NULL,
  `Qtd_Vitorias` int(11) NOT NULL,
  `Dinheiro` float NOT NULL,
  `Url_Imagem` varchar(50) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` VALUES (1, 1, 'waldson', 0, 0, 300, 'imgs/Avatares/Avatar6.png'),
			       (2, 2, 'ido', 0, 0, 300, 'imgs/Avatares/Avatar5.png'),
			       (3, 3, 'thales', 0, 0, 300, 'imgs/Avatares/Avatar4.png'),
			       (4, 4, 'miqueias', 0, 0, 300, 'imgs/Avatares/Avatar4.png');


-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores_logados`
--

CREATE TABLE `jogadores_logados` (
  `Id_Usuario` int(11) NOT NULL,
  `Id_Jogador` int(11) NOT NULL,
  `DataHora` datetime NOT NULL,
  PRIMARY KEY  (`Id_Usuario`),
  KEY `Id_Jogador` (`Id_Jogador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogadores_logados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `Id` int(11) NOT NULL auto_increment,
  `Titulo` text character set latin1 collate latin1_general_ci NOT NULL,
  `Texto` text character set latin1 collate latin1_general_ci NOT NULL,
  `DataHora` datetime NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` VALUES (1, 'Mulher morre após ser atacada por uma vaca, no Espírito Santo', 'Uma jovem morreu neste sábado depois de ter sido atacada por uma vaca na cidade de Cariacica, região metropolitana de Vitória (ES). Fabrícia Moura dos Santos, 25 anos, ia para o mercado quando foi perseguida pelo animal, que estava na rua com o filhote.\r\n\r\nO acidente aconteceu na quinta-feira, na principal avenida do bairro Aparecida. Depois do ataque, Fabrícia foi levada em estado grave para um hospital da região.\r\n\r\nA jovem era casada e deixa dois filhos. Um deles de 2 meses de idade. A mãe de Fabrícia ficou desesperada ao saber da morte da filha e não se conforma da maneira como tudo aconteceu. "Eu estou chocada com isso. Eu só vi quando a vaca correu na frente dela e depois a derrubou pelas costas. Só ouvi quando ela gritou e bateu com a cabeça no chão. Depois ela apagou. Todo mundo está desesperado com essa situação", disse Ruth dos Santos.\r\n\r\nO marido da jovem está revoltado. Ele registrou queixa no Departamento de Polícia Judiciária de Cariacica e quer que os donos do animal sejam punidos. "Eu espero que se faça justiça. Isso aqui não é um sítio para ficar criando cavalo e boi no meio da rua", disse, indignado.\r\n\r\nMuitos moradores do bairro estão assustados com o ataque. Vários já foram perseguidos por vacas e cavalos. Uma senhora de 78 anos foi, recentemente, atacada por um cavalo. A vítima quebrou um braço e já passou por duas cirurgias. A assessoria de comunicação da prefeitura informou que existe, no município, um programa de apreensão de animais.', '2007-06-15 23:30:03'),

(2, 'Estudantes elegem agosto como mês para invasão de reitorias', 'O período entre 5 e 13 de agosto foi eleito por estudantes universitários como período propício para "invasões" e reocupações de prédios administrativos de universidades públicas do Brasil.\r\n\r\nA decisão se deu em plenária estudantil no fim de semana, ocorrida na Universidade de São Paulo (USP), que está com a reitoria invadida desde 3 de maio, ou seja, há 46 dias.\r\n\r\nNa semana passada, os prédios das reitorias da Universidade Federal do Rio de Janeiro (UFRJ) e da Universidade Federal do Pará (UFPA) foram ocupados por alunos descontentes com o rumo do ensino público.\r\n\r\nImpasse\r\nO juiz titular da 13ª Vara da Fazenda Pública de São Paulo, Edson Ferreira Silva, determinou o cumprimento, a partir de 18 de maio, da reintegração de posse no prédio da reitoria USP. O mandado de reintegração expedido dois dias antes.\r\n\r\nA partir daí, a Tropa de Choque da Polícia Militar do Estado de São Paulo chegou a elaborar um plano para cumprir a ordem, mas ele não foi colocado em prática por questões políticas, já que o governo do Estado teme desgaste por enviar a polícia a uma universidade pública. \r\n\r\nAs negociações entre alunos e a reitoria da USP foram rompidas, já que a universidade só admite retomar as conversas depois que o prédio for liberado.', '2007-06-16 04:16:29');


-- --------------------------------------------------------

--
-- Estrutura da tabela `terrenos`
--

CREATE TABLE `terrenos` (
  `Id` int(11) NOT NULL auto_increment,
  `Nome` varchar(25) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `terrenos`
--

INSERT INTO `terrenos` VALUES 	(1, 'DammedLand'),
				(2, 'FeuerLand'),
				(3, 'Olympo'),
				(4, 'WasserLand'),
				(5, 'HolyLand');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE `tipos` (
  `Id` int(11) NOT NULL auto_increment,
  `Nome` varchar(25) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` VALUES 	(1, 'Monstro'),
				(2, 'Ítem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL auto_increment,
  `Login` varchar(25) NOT NULL,
  `Senha` varchar(32) NOT NULL,
  `Email` varchar(25) NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` VALUES 	(1, 'waldson', 'd9198998572896cf6d987b166e19856a', 'waldsoncabral@gmail.com'),
				(2, 'ido', '8a193602d32a8a504465077e16561a92', 'idhujr@gmail.com'),
				(3, 'thales', '3a8aa14b09c007603f0c93151120b014', 'thalessk8@gmail.com'),
				(4, 'miqueias', '2d7fac544a7383750f557793a0cba487', 'miqueias.lopes@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `baralho_round`
--

CREATE TABLE `baralho_round` (
  `Id_Baralho` int(11) NOT NULL,
  `Id_Round` int(11) NOT NULL,
  `HP` int(11) default NULL,
  `Ataque` int(11) default NULL,
  `Defesa` int(11) default NULL,
  PRIMARY KEY  (`Id_Baralho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `baralho_round`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `batalha`
--

CREATE TABLE `batalha` (
  `Id_Jogador_Desafiante` int(11) NOT NULL,
  `Id_Jogador_Vencedor` int(11) default NULL,
  `Id_Jogador_Perdedor` int(11) default NULL,
  `Status` bool default FALSE,
  PRIMARY KEY  (`Id_Jogador_Desafiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--
-- Extraindo dados da tabela `batalha`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador_batalha`
--

CREATE TABLE `jogador_batalha` (
  `Id_Jogador` int(11) NOT NULL,
  `Id_Batalha` int(11) NOT NULL,
  PRIMARY KEY  (`Id_Jogador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--
-- Extraindo dados da tabela `jogador_batalha`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `round`
--

CREATE TABLE `round` (
  `Id` int(11) NOT NULL auto_increment,
  `Id_Batalha` int(11) NOT NULL,
  `Id_Baralho_Vencedor` int(11) default NULL,
  `Id_Baralho_Perdedor` int(11) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `round`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartas_escolhidas`
--
CREATE TABLE  `cartas_escolhidas` (
  `id_jogador` int(11) NOT NULL,
  `id_baralho1` int(11) NOT NULL,
  `id_baralho2` int(11) NOT NULL,
  `id_baralho3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cartas_escolhidas`
--

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `baralho`
--
ALTER TABLE `baralho`
  ADD CONSTRAINT `baralho_ibfk_1` FOREIGN KEY (`Id_Jogador`) REFERENCES `jogadores` (`Id`),
  ADD CONSTRAINT `baralho_ibfk_2` FOREIGN KEY (`Id_Carta`) REFERENCES `cartas` (`Id`);

--
-- Restrições para a tabela `cartas`
--
ALTER TABLE `cartas`
  ADD CONSTRAINT `cartas_ibfk_1` FOREIGN KEY (`Id_Tipo`) REFERENCES `tipos` (`Id`),
  ADD CONSTRAINT `cartas_ibfk_2` FOREIGN KEY (`Id_Terreno`) REFERENCES `terrenos` (`Id`);

--
-- Restrições para a tabela `jogadores_logados`
--
ALTER TABLE `jogadores_logados`
  ADD CONSTRAINT `jogadores_logados_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `jogadores_logados_ibfk_2` FOREIGN KEY (`Id_Jogador`) REFERENCES `jogadores` (`Id`);

--
-- Restrições para a tabela `convites`
--
ALTER TABLE `convites`
  ADD CONSTRAINT `convites_ibfk_1` FOREIGN KEY (`Id_Jogador_Desafiado`) REFERENCES `jogadores` (`Id`);