-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2022 às 19:15
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `semadec`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `acumula_while` (`limite` TINYINT UNSIGNED)   BEGIN
DECLARE contador TINYINT UNSIGNEd DEFAULT 1;
DECLARE limite INT default 0;
WHILE contador < limite DO
	insert into equipe_has_provas (`Equipe_idEquipe`, `Provas_idProva`) values(1, contador);
    
    SET contador = contador + 1;
    
END WHILE;
SELECT * from equipe_has_provas;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `idArquivo` int NOT NULL,
  `nome` varchar(240) NOT NULL,
  `caminho` varchar(240) NOT NULL,
  `tipo` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- RELACIONAMENTOS PARA TABELAS `arquivo`:
--

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`idArquivo`, `nome`, `caminho`, `tipo`) VALUES
(9, 'Solitário Vampiro', 'https://music.youtube.com/watch?v=IEsrOgDn4U8&feature=share', 'link'),
(12, 'Cronograma', '../arquivos/62cdd0f410b51.pdf', 'file'),
(13, 'Rap do Kaidou', 'https://music.youtube.com/watch?v=1qB7Cf2a-A4&feature=share', 'link');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `idconquistas` int NOT NULL,
  `Provas_idProva` int NOT NULL,
  `Equipe_idEquipe` int NOT NULL,
  `classificacao` varchar(11) NOT NULL,
  `nota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `conquistas`:
--   `Equipe_idEquipe`
--       `equipe` -> `idEquipe`
--   `Provas_idProva`
--       `provas` -> `idProva`
--

--
-- Extraindo dados da tabela `conquistas`
--

INSERT INTO `conquistas` (`idconquistas`, `Provas_idProva`, `Equipe_idEquipe`, `classificacao`, `nota`) VALUES
(334, 2, 2, '', 0),
(335, 3, 2, '', 0),
(336, 4, 2, '', 0),
(337, 5, 2, '', 0),
(338, 6, 2, '', 0),
(339, 7, 2, '', 0),
(340, 8, 2, '', 0),
(341, 9, 2, '', 0),
(342, 10, 2, '', 0),
(343, 11, 2, '', 0),
(344, 12, 2, '', 0),
(345, 13, 2, '', 0),
(346, 14, 2, '', 0),
(347, 15, 2, '', 0),
(348, 16, 2, '', 0),
(349, 17, 2, '', 0),
(350, 19, 2, '', 0),
(351, 20, 2, '', 0),
(352, 21, 2, '', 0),
(353, 22, 2, '', 0),
(354, 23, 2, '', 0),
(355, 24, 2, '', 0),
(356, 25, 2, '', 0),
(357, 26, 2, '', 0),
(384, 2, 4, 'quarto', 50),
(385, 3, 4, '', 0),
(386, 4, 4, '', 0),
(387, 5, 4, '', 0),
(388, 6, 4, '', 0),
(389, 7, 4, '', 0),
(390, 8, 4, '', 0),
(391, 9, 4, '', 0),
(392, 10, 4, '', 0),
(393, 11, 4, '', 0),
(394, 12, 4, '', 0),
(395, 13, 4, '', 0),
(396, 14, 4, '', 0),
(397, 15, 4, '', 0),
(398, 16, 4, '', 0),
(399, 17, 4, '', 0),
(400, 19, 4, 'primeiro', 200),
(401, 20, 4, 'segundo', 260),
(402, 21, 4, '', 0),
(403, 22, 4, '', 0),
(404, 23, 4, '', 0),
(405, 24, 4, '', 0),
(406, 25, 4, '', 0),
(407, 26, 4, '', 0),
(409, 2, 5, '', 0),
(410, 3, 5, '', 0),
(411, 4, 5, '', 0),
(412, 5, 5, '', 0),
(413, 6, 5, '', 0),
(414, 7, 5, '', 0),
(415, 8, 5, '', 0),
(416, 9, 5, '', 0),
(417, 10, 5, '', 0),
(418, 11, 5, '', 0),
(419, 12, 5, '', 0),
(420, 13, 5, '', 0),
(421, 14, 5, '', 0),
(422, 15, 5, '', 0),
(423, 16, 5, '', 0),
(424, 17, 5, '', 0),
(425, 19, 5, 'segundo', 170),
(426, 20, 5, 'terceiro', 220),
(427, 21, 5, '', 0),
(428, 22, 5, '', 0),
(429, 23, 5, '', 0),
(430, 24, 5, '', 0),
(431, 25, 5, '', 0),
(432, 26, 5, '', 0),
(434, 2, 6, '', 0),
(435, 3, 6, '', 0),
(436, 4, 6, '', 0),
(437, 5, 6, '', 0),
(438, 6, 6, '', 0),
(439, 7, 6, '', 0),
(440, 8, 6, '', 0),
(441, 9, 6, '', 0),
(442, 10, 6, '', 0),
(443, 11, 6, '', 0),
(444, 12, 6, '', 0),
(445, 13, 6, '', 0),
(446, 14, 6, '', 0),
(447, 15, 6, '', 0),
(448, 16, 6, '', 0),
(449, 17, 6, '', 0),
(450, 19, 6, '', 0),
(451, 20, 6, '', 0),
(452, 21, 6, '', 0),
(453, 22, 6, '', 0),
(454, 23, 6, '', 0),
(455, 24, 6, '', 0),
(456, 25, 6, '', 0),
(457, 26, 6, '', 0),
(459, 2, 7, '', 0),
(460, 3, 7, '', 0),
(461, 4, 7, '', 0),
(462, 5, 7, '', 0),
(463, 6, 7, '', 0),
(464, 7, 7, '', 0),
(465, 8, 7, '', 0),
(466, 9, 7, '', 0),
(467, 10, 7, '', 0),
(468, 11, 7, '', 0),
(469, 12, 7, '', 0),
(470, 13, 7, '', 0),
(471, 14, 7, '', 0),
(472, 15, 7, '', 0),
(473, 16, 7, '', 0),
(474, 17, 7, '', 0),
(475, 19, 7, '', 0),
(476, 20, 7, 'quarto', 190),
(477, 21, 7, '', 0),
(478, 22, 7, '', 0),
(479, 23, 7, '', 0),
(480, 24, 7, '', 0),
(481, 25, 7, '', 0),
(482, 26, 7, '', 0),
(484, 2, 8, 'primeiro', 100),
(485, 3, 8, '', 0),
(486, 4, 8, '', 0),
(487, 5, 8, '', 0),
(488, 6, 8, '', 0),
(489, 7, 8, '', 0),
(490, 8, 8, '', 0),
(491, 9, 8, '', 0),
(492, 10, 8, '', 0),
(493, 11, 8, '', 0),
(494, 12, 8, '', 0),
(495, 13, 8, '', 0),
(496, 14, 8, '', 0),
(497, 15, 8, '', 0),
(498, 16, 8, '', 0),
(499, 17, 8, '', 0),
(500, 19, 8, '', 0),
(501, 20, 8, '', 0),
(502, 21, 8, '', 0),
(503, 22, 8, '', 0),
(504, 23, 8, '', 0),
(505, 24, 8, '', 0),
(506, 25, 8, '', 0),
(507, 26, 8, '', 0),
(533, 1, 2, '', 0),
(535, 1, 4, 'segundo', 80),
(536, 1, 5, '', 0),
(537, 1, 6, '', 0),
(538, 1, 7, '', 0),
(539, 1, 8, '', 0),
(666, 1, 21, '', 0),
(667, 2, 21, '', 0),
(668, 3, 21, '', 0),
(669, 4, 21, '', 0),
(670, 5, 21, '', 0),
(671, 6, 21, '', 0),
(672, 7, 21, '', 0),
(673, 8, 21, '', 0),
(674, 9, 21, '', 0),
(675, 10, 21, '', 0),
(676, 11, 21, '', 0),
(677, 12, 21, '', 0),
(678, 13, 21, '', 0),
(679, 14, 21, '', 0),
(680, 15, 21, '', 0),
(681, 16, 21, '', 0),
(682, 17, 21, '', 0),
(683, 19, 21, '', 0),
(684, 20, 21, '', 0),
(685, 21, 21, '', 0),
(686, 22, 21, '', 0),
(687, 23, 21, '', 0),
(688, 24, 21, '', 0),
(689, 25, 21, '', 0),
(690, 26, 21, '', 0),
(699, 31, 2, '', 0),
(700, 31, 4, '', 0),
(701, 31, 5, '', 0),
(702, 31, 6, '', 0),
(703, 31, 7, '', 0),
(704, 31, 8, '', 0),
(705, 31, 21, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `idEquipe` int NOT NULL,
  `nome` varchar(150) NOT NULL,
  `numero_part` int NOT NULL,
  `homologado` tinyint NOT NULL,
  `Usuario_idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `equipe`:
--   `Usuario_idUsuario`
--       `usuario` -> `idUsuario`
--

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `nome`, `numero_part`, `homologado`, `Usuario_idUsuario`) VALUES
(2, 'fzao', 2, 0, 2),
(4, 'Equipe Nísia Floresta', 45, 0, 4),
(5, 'Liga dos românticos', 42, 0, 5),
(6, 'Kardashian', 42, 0, 6),
(7, 'Fênix', 38, 0, 7),
(8, 'Equipe Eller', 42, 0, 8),
(21, 'equipe', 1, 0, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe_has_provas`
--

CREATE TABLE `equipe_has_provas` (
  `Equipe_idEquipe` int NOT NULL,
  `Provas_idProva` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `equipe_has_provas`:
--   `Equipe_idEquipe`
--       `equipe` -> `idEquipe`
--   `Provas_idProva`
--       `provas` -> `idProva`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `idMembro` int NOT NULL,
  `nome` varchar(150) NOT NULL,
  `turma` varchar(10) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `comprovante` varchar(255) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `caminho` varchar(240) NOT NULL,
  `Equipe_idEquipe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `membros`:
--

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`idMembro`, `nome`, `turma`, `matricula`, `comprovante`, `tipo`, `caminho`, `Equipe_idEquipe`) VALUES
(9, 'Mike Daniel Bento da Silva ', 'ADM4V', '20191131100002 ', 'mike comprovante de matricula2022.pdf', 'membro', '../arquivos/62960f470e433.pdf', 4),
(10, 'Joabe de Oliveira Ribeiro ', 'ADM3V', '20201131100005', 'Declaração.pdf', 'membro', '../arquivos/6296102750fae.pdf', 4),
(11, 'Marcelo Narciso de Oliveira Júnior', 'QUIM3V', '20201137040027', 'download.pdf', 'membro', '../arquivos/6296108f6516c.pdf', 4),
(12, 'Maria Eduarda Silva Paiva ', 'ADM3V', '20201131100015', '267366.pdf', 'membro', '../arquivos/62961194675d0.pdf', 4),
(13, 'Manuela da Silva Augusto ', 'ADM4V', '20191131100023', '244092.pdf', 'membro', '../arquivos/629611e879551.pdf', 4),
(14, 'Letícia Rayanne da Silva Souza ', 'ADM4V', '20191131100011', '243689 (1).pdf', 'membro', '../arquivos/6296123a78f99.pdf', 4),
(15, 'Luan da Costa Pessoa', 'ADM4V', '20191131100024', 'download (6).pdf', 'membro', '../arquivos/629612831c6f2.pdf', 4),
(16, 'Riane Karine da Silva', 'QUIM3V', '20201137040067', 'comprovante de matrícula .pdf', 'membro', '../arquivos/629613805ca59.pdf', 4),
(17, 'Maria Alycia Lemos de Souza ', 'INFO4V', '20191134010008', 'download (1).pdf', 'membro', '../arquivos/62961498edf97.pdf', 4),
(18, 'Keziah Camile da Silva Martins ', 'ADM3V', '20201131100045', 'download (2).pdf', 'membro', '../arquivos/6296153dc8c9a.pdf', 4),
(19, 'Gerilson Barbosa França', 'ADM4V', '20191131100057', 'download (11).pdf', 'membro', '../arquivos/6296159ac951b.pdf', 4),
(20, 'Evellyn Tainá da Silva', 'QUIM3V', '20201137040021', 'download-1.pdf', 'membro', '../arquivos/629615cd3ead9.pdf', 4),
(21, 'William Costa de Souza', 'TADS7V', '20191134040029', 'download (2) (1).pdf', 'membro', '../arquivos/6296162034a3e.pdf', 4),
(22, 'Rubens Max da Silva Vasconcelo ', 'QUIM3V', '20201137040004', '266446.pdf', 'membro', '../arquivos/629616e8483b8.pdf', 4),
(23, 'Maria Eduarda de Lima Dias', 'ADM4V', '20191131100013', 'download (3).pdf', 'membro', '../arquivos/6296194c6042d.pdf', 4),
(46, 'Lucas Henrique Diniz Fernandes', 'QUIM4M', '20191137040010', '244120.pdf', 'vice-lider', '../arquivos/6297f298052cd.pdf', 6),
(49, 'Yuri Gabriel de Macêdo Carvalho', 'INFO3M', '20201134010010', 'download (5).pdf', 'lider', '../arquivos/6297f31b7cbc3.pdf', 6),
(53, 'Cristiane de Brito Cruz', 'PROFESSORA', '#', '#', 'madrinha', '#', 4),
(54, 'Maria Rayany da Costa Ribeiro Silva', 'ADM4V', '20191131100065', 'declaração de matrícula.pdf', 'membro', '../arquivos/6298b86767dd9.pdf', 4),
(55, 'José Adryan de França Batista', 'ADM3V', '20201131100048', 'download.pdf', 'membro', '../arquivos/6298b8b675621.pdf', 4),
(56, 'Brena Felipe da Cruz', 'QUIM3V', '20201137040005', '266509.pdf', 'membro', '../arquivos/6298b94078dd7.pdf', 4),
(57, 'Maria Alice Pessoa Da Silva', 'ADM3V', '20201131100042', 'download (6).pdf', 'membro', '../arquivos/6298b9caea31a.pdf', 4),
(58, 'Pedro Lucas de Sousa Silva', 'ADM3V', ' 20201131100016', 'declaração de matrícula .pdf', 'membro', '../arquivos/6298ba1ee2d3e.pdf', 4),
(59, 'José Ronald Belmont Dias da Silva ', 'ADM1V', '20221131100022', '313221.pdf', 'membro', '../arquivos/6298bb8de002e.pdf', 4),
(60, 'Letícia de Freitas da Silva', 'ADM4V', '20191131100035', 'download (2).pdf', 'vice-lider', '../arquivos/6298bbd7988ed.pdf', 4),
(61, 'Helena Alexandra Barbalho de Souza', 'ADM4V', '20191131100015', 'download (1).pdf', 'lider', '../arquivos/6298bc3941b6e.pdf', 4),
(62, 'Caio Cachina da Silva ', 'QUIM3V', '20201137040036', 'download (1) (1).pdf', 'membro', '../arquivos/6298bcccc2871.pdf', 4),
(63, 'Thiago Menezes de Oliveira ', 'QUIM1M', '20221137040024', 'download (2) (1).pdf', 'membro', '../arquivos/6298bd49bec02.pdf', 4),
(64, 'Lucas Lima dos Santos', 'TADS1V', '20211134040029', '300152.pdf', 'membro', '../arquivos/6298bd9d875df.pdf', 4),
(65, 'Analicia Dantas Trindade ', 'ADM4M', '20191131100044', 'download (1) (2).pdf', 'membro', '../arquivos/6298bdeb3211c.pdf', 4),
(66, 'Thalyson Thauan da Silva Lima', 'ADM4V', '20191131100030', 'download (28) (1).pdf', 'membro', '../arquivos/6298c0561b763.pdf', 4),
(67, 'Luan Gomes Pereira ', 'ADM4V', '20191131100045', '245176.pdf', 'membro', '../arquivos/6298c088ae801.pdf', 4),
(68, 'Dani', 'INFO4V', '#', '#', 'padrinho', '#', 2),
(69, 'Késia Vitória Gomes Vieira', 'ADM2M', '20211131100008', 'comprovante de matrícula.pdf', 'vice-lider', '../arquivos/62995201bd243.pdf', 7),
(70, 'Elton Gustavo da Silva Freitas', 'INFO2M', '20211134010018', 'declaraçãoDeMatriculaIf.pdf', 'membro', '../arquivos/6299568bc836e.pdf', 7),
(71, 'André Freitas Barbosa', 'SERVIDOR ', '#', '#', 'padrinho', '#', 7),
(72, 'Régis Casimiro Leal', 'SERVIDOR ', '#', '#', 'padrinho', '#', 7),
(73, 'Samuel Lucas de Sena Araújo', 'ADM4M', '20191131100071', 'comprovantedematricula.pdf', 'membro', '../arquivos/62995e72ef679.pdf', 6),
(74, 'Julio Sergio Dias Pessoa', 'QUIM4M', '20191137040019', 'download (2).pdf', 'membro', '../arquivos/62995f1d69062.pdf', 6),
(75, 'Pablo Henry Lima de Medeiros', 'QUIM1M', '20221137040010', 'download (2)-1.pdf', 'membro', '../arquivos/629960d20cb7d.pdf', 6),
(76, 'José Leandro Pereira do Nascimento', 'TPQM', '20172130140003', 'download (1).pdf', 'membro', '../arquivos/62996c46aafdd.pdf', 6),
(77, 'Michael Douglas Pessoa Nelo  ', 'ADM4M', '20191131100063', '248777.pdf', 'membro', '../arquivos/6299ff04200d8.pdf', 4),
(78, 'Nathan David Muniz Da Silva ', 'ADM4V', '20191131100051', 'download (10).pdf', 'membro', '../arquivos/6299ff42ad597.pdf', 4),
(79, 'Maria Antonelly Rodrigues de Oliveira', 'ADM1V', '20221131100025', '313299.pdf', 'membro', '../arquivos/6299ff758b908.pdf', 4),
(80, 'Jamilly Firmino da Costa', 'ADM4V', ' 20191131100042', 'download (6).pdf', 'membro', '../arquivos/6299ffa4ed14c.pdf', 4),
(81, 'Leonara da Silva Fernandes', 'ADMSUB1N', '20221135000016', 'mai. 23, Doc 1.pdf', 'membro', '../arquivos/629a001952bed.pdf', 4),
(82, 'Taynara de Lima Souza ', 'ADM4V', '20191131100070 ', '249500.pdf', 'membro', '../arquivos/629a005d2cd24.pdf', 4),
(83, 'Chayanne Araújo da Rocha ', 'ADM4V', '20191131100003', '243363.pdf', 'membro', '../arquivos/629a009188474.pdf', 4),
(84, 'Danilo Marques dos Santos', 'QUIM4M', '20191137040016', 'Danilo.pdf', 'lider', '../arquivos/629a1e19c3ae6.pdf', 5),
(85, 'Lavígnea Santos Franco de Oliveria', 'QUIM4M', '20191137040011', 'sh_1654175162580.pdf', 'vice-lider', '../arquivos/629a1ee195bef.pdf', 5),
(86, 'Damiana Sinezio de Souza', 'PROFESSOR', '#', '#', 'madrinha', '#', 5),
(87, 'Eduardo Rigoti', 'PROFESSOR', '#', '#', 'padrinho', '#', 5),
(88, 'Ana Letícia Ferreira da Silva', 'QUIM1M', '20221137040012', 'sh_1654168248025.pdf', 'membro', '../arquivos/629a20046b0c7.pdf', 5),
(89, 'João Antônio Guedes Moreira', 'INFO3M', '20201134010037', 'sh_1654168411179.pdf', 'membro', '../arquivos/629a2035a214d.pdf', 5),
(90, 'Bianca de Oliveira Silva', 'QUIM1M', '20221137040031', 'download.pdf', 'membro', '../arquivos/629a208453c45.pdf', 6),
(91, 'Matheus Vidal de Negreiros Avelino', 'ADM4M', '20191131100075', 'sh_1654189554759.pdf', 'membro', '../arquivos/629a20ce39ff9.pdf', 5),
(92, 'João Henrique Batista Regis', 'INFO3M', '20201134010006', 'sh_1654190152661.pdf', 'membro', '../arquivos/629a21155b14e.pdf', 5),
(93, 'Carlos Manoel Paixão da Silva', 'QUIM4M', '20191137040035', 'sh_1654190079509.pdf', 'membro', '../arquivos/629a215ce56c1.pdf', 5),
(94, 'Joao Rafaell da Silva Gomes', 'INFO4V', '20181134010066', 'download (1)-1.pdf', 'membro', '../arquivos/629a216065859.pdf', 6),
(95, 'Maria Isabelle Pereira da Silva', 'INFO3M', '20201134010022', 'download (1)-2.pdf', 'membro', '../arquivos/629a21bed5af1.pdf', 6),
(96, 'Leticia Suellen Costa Silva', 'QUIM4M', '20191137040025', 'download (5).pdf', 'membro', '../arquivos/629a22138fecc.pdf', 6),
(97, 'Laura Louise de Lima', 'QUIM1M', '20221137040014', 'IMG-20220603-WA0008.jpg', 'membro', '../arquivos/629a22fe607a6.jpg', 6),
(98, 'Everton Gabriel Salustino dos Santos', 'ADM2M', '20211131100036', 'Documento.pdf', 'membro', '../arquivos/629a238ad3127.pdf', 6),
(99, 'Almir Weverton Gomes da Costa', 'TADS3V', 'a 20201134040018', 'sh_1654190137307 (1).pdf', 'membro', '../arquivos/629a292bd9b36.pdf', 5),
(100, 'Kauã Felipe dos Santos,', 'ADM4M', 'a 20191131100027', 'download (2).pdf', 'membro', '../arquivos/629a29617f0a2.pdf', 5),
(101, 'Nataly da Silva Cirilo', 'INFO3M', '20201134010034', 'download.pdf', 'membro', '../arquivos/629a29c0b16ac.pdf', 5),
(102, 'Ramon Duarte Rosendo', 'ADM4M', '20191131100026', 'download (1).pdf', 'membro', '../arquivos/629a29d5030a5.pdf', 5),
(103, 'Matheus Felipe Alves de Carvalho Pereira', 'INFO2M ', '20211134010008', 'sh_1654190230925.pdf', 'membro', '../arquivos/629a2ac62deaf.pdf', 5),
(104, 'Nayane Loisa da Silva,', 'QUIM3M', '20201137040048', 'sh_1654190481015.pdf', 'membro', '../arquivos/629a2b4d476b7.pdf', 5),
(105, 'Marilia Grazielly Varela dos Santos', 'QUIM3M', ' 20201137040039', 'sh_1654190526142.pdf', 'membro', '../arquivos/629a2b89eeab5.pdf', 5),
(106, 'Erica Gomes de Lima', 'TPQ1M', ' 20221130140020', 'sh_1654192378462.pdf', 'membro', '../arquivos/629a2c225fc85.pdf', 5),
(107, 'Glaucio Soares Bezerra', 'TPQ1M', '20221130140031', 'sh_1654192426164.pdf', 'membro', '../arquivos/629a2c6d561d5.pdf', 5),
(108, 'Ana Beatriz de Araújo Silva', 'QUIM1M', '20221137040011', 'sh_1654194920647.pdf', 'membro', '../arquivos/629a2ca0ac9da.pdf', 5),
(109, 'Anna Vitória Cardoso Couto', 'QUIM3M', ' 20201137040008', 'sh_1654190437586 (1).pdf', 'membro', '../arquivos/629a2d62be264.pdf', 5),
(110, ' Luciel Santos Bezerra', 'QUIM4M', '20181137040009', 'sh_1654269731705.pdf', 'membro', '../arquivos/629a46bdc05e7.pdf', 5),
(111, 'Iury Vitor Duarte das Neves', 'INFO2M', '20191134010012', 'sh_1654259475793.pdf', 'membro', '../arquivos/629a46f658eca.pdf', 5),
(112, 'José Mateus Laurentino de Lima', 'TPQ1M', '20221130140004', 'sh_1654259175931.pdf', 'membro', '../arquivos/629a472d30162.pdf', 5),
(113, 'Alanderson de Lima Vicente da Silva', 'TPQ1M', '20221130140024', 'sh_1654257170351.pdf', 'membro', '../arquivos/629a4757a57d8.pdf', 5),
(114, 'Anna Luiza Gomes Martins', 'ADM4M', '20191131100053', 'sh_1654248290051.pdf', 'membro', '../arquivos/629a477aa7709.pdf', 5),
(115, 'José Aclys Carvalho do Nascimento', 'TPQ1M', '20221130140006', 'sh_1654216401943.pdf', 'membro', '../arquivos/629a47b89fb4c.pdf', 5),
(116, 'Maria Vitória Ribeiro Meira', 'INFO3M', '20201134010008', 'sh_1654215234611.pdf', 'membro', '../arquivos/629a47e61268f.pdf', 5),
(117, 'Pedro Clesio da Silva', 'ADM4M', '20191131100020', 'sh_1654214248441.pdf', 'membro', '../arquivos/629a48131e666.pdf', 5),
(118, 'Cleane Maria Ferreira da Silva', 'ADM4M', '20191131100034', 'sh_1654214124754.pdf', 'membro', '../arquivos/629a483aa9cc4.pdf', 5),
(119, 'Alicia Beatriz Souza de Oliveira', 'ADM4M', '20191131100022', 'sh_1654213879326.pdf', 'membro', '../arquivos/629a48670d3af.pdf', 5),
(120, 'Lucas Vinícius de Lima França', 'ADM4M', '20201131100049', 'sh_1654206075761.pdf', 'membro', '../arquivos/629a488cad01b.pdf', 5),
(121, 'Rayane Stefany Silva Morais', 'QUIM3M', '20201137040045', 'sh_1654198060723.pdf', 'membro', '../arquivos/629a48d805ba0.pdf', 5),
(122, 'Maria Heloisa Silva,', 'INFO2M', '20211134010061', 'download (5).pdf', 'membro', '../arquivos/629a48fc3e994.pdf', 5),
(123, 'Renato Junior de Souza Dias', 'INFO3M', '20201134010001', 'sh_1654168747009.pdf', 'membro', '../arquivos/629a49c08a9a6.pdf', 5),
(124, 'Adlla Rafaelly de Souza Nogueira', 'INFO3M', '20201134010014', 'sh_1654172445540.pdf', 'membro', '../arquivos/629a4aba8a247.pdf', 5),
(125, 'Thiago de Sales', 'TADS1N', '20221134040020', 'sh_1654169413415.pdf', 'membro', '../arquivos/629a4d07c25ba.pdf', 5),
(126, 'Mariana Beatriz Oliveira Gomes', 'ADM2M', '20211131100020', 'Declaração.pdf', 'membro', '../arquivos/629a4d49426b5.pdf', 5),
(127, 'Fernanda Rayane de Pontes Ferreira', 'INFO2M', '20211134010012', 'download.pdf', 'lider', '../arquivos/629a4e2cdb1fb.pdf', 7),
(128, 'Jhonatan Manoel de Lima', 'ADM2M', '20211131100022', 'declaração de matrícula(Jhonatan).pdf', 'membro', '../arquivos/629a4e7dcfc92.pdf', 7),
(129, 'Milena Gabriele da Silva Costa', 'ADM2M', '20211131100001', 'download (1) (1).pdf', 'membro', '../arquivos/629a4efeee8f6.pdf', 7),
(130, 'Ludimilla Katherine da Silva Pessoa', 'ADM4M', '20191131100028', 'declaração de matrícula .jpg', 'membro', '../arquivos/629a4f67dcc76.jpg', 5),
(131, 'Yan Kaue Gomes da Silva Izidio', 'INFO2M', '20211134010049', 'download (2).pdf', 'membro', '../arquivos/629a4f6a4e39b.pdf', 7),
(132, 'Matheus Felipe de Oliveira Silva', 'QUIM3V', '20201137040060', 'download (4) (1).pdf', 'membro', '../arquivos/629a4fc49ce9a.pdf', 5),
(133, 'Bruno Martins Alves', 'TADS3V', '20211134040001', 'download (2) (1).pdf', 'membro', '../arquivos/629a50cacb73f.pdf', 7),
(134, 'Rebeca Vitória dos Santos Araújo ', 'ADM4M', '20191131100062', 'declaração vínculo rebeca (1).JPG', 'membro', '../arquivos/629a50d8a4c5e.jpg', 5),
(135, 'Murilo Robert Herculano Gomes', 'INFO2M', '20211134010023', 'download (1) (2).pdf', 'membro', '../arquivos/629a511b4ad8f.pdf', 7),
(136, 'Evanuel Amerson da Silva Lima', 'ADM4V', '20191131100043', 'download (1).pdf', 'membro', '../arquivos/629a514407071.pdf', 5),
(137, 'Renan Almeida Bezerri', 'INFO2M', '20211134010030', 'download (1) (3).pdf', 'membro', '../arquivos/629a52d380e80.pdf', 7),
(138, 'Maria Fernanda Marques de Almeida', 'ADM2M', '20211131100029', 'download (4).pdf', 'membro', '../arquivos/629a536c2c5f6.pdf', 7),
(139, 'Vitória de Lima Oliveira', 'ADM2M', '20211131100006', 'download (2) (1) (1).pdf', 'membro', '../arquivos/629a53a3ef2bd.pdf', 7),
(141, 'Marília Grazielly de Oliveira Vieira', 'ADM2M', '20211131100014', 'download (2) (2).pdf', 'membro', '../arquivos/629a54695ec96.pdf', 7),
(142, 'Alícia Margarida Nascimento Aquino', 'ADM2M', '20211131100025', 'download-2.pdf', 'membro', '../arquivos/629a54a346457.pdf', 7),
(144, 'Ryan Fabrício Gomes Soares', 'INFO2M', '20221134010032', 'download (3).pdf', 'membro', '../arquivos/629a554017d30.pdf', 7),
(148, 'Jeane Felix da Costa', 'ADM2M', '20211131100034', 'download (1) (4).pdf', 'membro', '../arquivos/629a5731518ed.pdf', 7),
(149, 'Maria Luana Pereira de Souza', 'ADM2M', '20211131100010', 'download (2) (3).pdf', 'membro', '../arquivos/629a578d61cb8.pdf', 7),
(150, 'Maradja Vasconcelos de Melo', 'ADM2M', '20211131100007', 'download (1) (1) (1).pdf', 'membro', '../arquivos/629a57c4db3b6.pdf', 7),
(151, 'Maria Vitória da Silva Vasconcelos', 'ADM2M', '20211131100035', 'download (3) (1).pdf', 'membro', '../arquivos/629a580e7a91b.pdf', 7),
(152, 'Jamilly Alves do Nascimento', 'ADM2M', '20211131100024', 'download (1) (5).pdf', 'membro', '../arquivos/629a586584c40.pdf', 7),
(153, 'Camila Paulino de Farias', 'ADM2M', '20211131100009', 'download (7).pdf', 'membro', '../arquivos/629a58cbf40ff.pdf', 7),
(154, 'Ewerton Pereira Lopes ', 'ADM2M', '20211131100003', 'download (21).pdf', 'membro', '../arquivos/629a594d40f62.pdf', 7),
(155, 'Erick Oliveira Meireles de Lima', 'INFO2M', '20211134010022', 'download (1) (6).pdf', 'membro', '../arquivos/629a598d90e49.pdf', 7),
(158, ' João Lucas de Oliveira Lourenço ', 'INFO1M', '20221134010048', 'Comprovante (2).pdf', 'membro', '../arquivos/629a5b4f98d59.pdf', 7),
(161, 'Mariana Vito Martins', 'ADM2M', '20211131100012', 'pdf_converter_202206034436.pdf', 'membro', '../arquivos/629a5cc47a719.pdf', 7),
(162, 'Victor Hugo Pereira de Souza', 'ADM2M', '20211131100002', 'pdf_converter_202206034454 (1).pdf', 'membro', '../arquivos/629a5d7c77d0b.pdf', 7),
(163, 'Juliana Fernandes de Lima', 'TADS3V', '20211134040014', 'download (1) (7).pdf', 'membro', '../arquivos/629a60eb896f2.pdf', 7),
(164, 'Emanuel Joacy da Silva Lima', 'INFO1M', '20221134010064', 'download (9).pdf', 'membro', '../arquivos/629a615d108f0.pdf', 7),
(165, 'Jamilly Lima da Silva', 'ADM2M', '20211131100021', 'download (12).pdf', 'membro', '../arquivos/629a62bf83a28.pdf', 7),
(166, 'Leticia da Silva Avelino', 'TPQ1M', '20221130140012 ', 'download (13).pdf', 'membro', '../arquivos/629a64eddbb67.pdf', 7),
(167, 'Jader Vinicius Gomes Costa', 'QUI2V', '20211137040006', 'download (14).pdf', 'membro', '../arquivos/629a671137d18.pdf', 7),
(168, 'Maria Clara Marques da Silva Clemente', 'ADM2M', '20211131100023', 'download (7) (1) (1).pdf', 'membro', '../arquivos/629a673e9d7d8.pdf', 7),
(169, 'José Edvan da Costa', 'ADM4M', '20191131100061', 'inbound240238413562699364.pdf', 'membro', '../arquivos/629a7c423aa90.pdf', 5),
(170, 'Kauany Beatriz Texeira Pessoa', 'QUIM4M', '20191137040023', '245746.pdf', 'membro', '../arquivos/629b65b1b8ff8.pdf', 6),
(171, 'José Jackson Pequeno dos Anjos', 'ADM2M', '20211131100026', 'download (7).pdf', 'membro', '../arquivos/629b66c61a54c.pdf', 6),
(172, 'Joana Milla dos Santos Nascimento', 'ADM2M', '20211137040024', 'download-2.pdf', 'membro', '../arquivos/629b68cd90317.pdf', 6),
(173, 'Yohana Clea de Lima Moura', 'QUIM4M', '20191137040033', 'download (1) (2).pdf', 'membro', '../arquivos/629b6907ab163.pdf', 6),
(175, 'Amanda Alexandre da Silva', 'TADS', '20191134040030', 'download-3.pdf', 'membro', '../arquivos/629b6a560b294.pdf', 6),
(176, 'Laura Júlia do Nascimento Pereira ', 'QUIM4M', '20191137040015', 'download (12).pdf', 'membro', '../arquivos/629b6ac46783e.pdf', 6),
(177, ' Carlos Eduardo Gomes Rocha', 'ADM2SUB', '20212135000015', 'Comprovante.pdf', 'membro', '../arquivos/629b7ce3e5c09.pdf', 6),
(178, 'Esthefanny Thais da Silva Chacon,', 'QUIM4M', '20191137040005', 'download (2) (2).pdf', 'membro', '../arquivos/629b7d3148728.pdf', 6),
(179, 'Silmara Eloisa da Silva Lira', 'QUIM4M', '20191137040024', 'download-4.pdf', 'membro', '../arquivos/629b7d876408e.pdf', 6),
(180, 'José Messias Barbosa da Silva', 'TPQ1M', '20221130140027', 'download-5.pdf', 'membro', '../arquivos/629b7e1e434a2.pdf', 6),
(181, 'Iasmim Aparecida Roberta dos Santos', 'QUIM4M', '20191137040034', 'download (7)-1.pdf', 'membro', '../arquivos/629d2d154bf5f.pdf', 6),
(182, 'Vitoria Beatriz Anselmo da Silva', 'QUIM1M', '20221137040019', '313384.pdf', 'membro', '../arquivos/629d2d59e0f01.pdf', 6),
(183, 'José Henrique Soares Silva', 'INFO1V', '20221134010075', 'download-6.pdf', 'membro', '../arquivos/629d2dfcdf5ce.pdf', 6),
(184, 'Allanna Gabriely Marcolino Fonseca', 'INFO2M', '20211134010051', 'download (10).pdf', 'membro', '../arquivos/629d2e343a9e6.pdf', 6),
(185, 'Alessandra Dantas dos Anjos', 'TPQM', '20172130140030', 'download (1) (2)-1.pdf', 'membro', '../arquivos/629d2f98c8501.pdf', 6),
(186, 'Igor Daniel Rodrigues de Lima', 'INFO1M', '20211134010047', 'download (2) (1).pdf', 'membro', '../arquivos/629d2feacfc58.pdf', 6),
(188, 'João Victor de Souza Barbosa', 'QUIM1M', '20221137040016', 'download-7.pdf', 'membro', '../arquivos/629d30f5cd9a2.pdf', 6),
(189, 'Emanuel Lima da Silva', 'INFO1M', '20221134010050', 'Declaração de Emanuel Lima da Silva.pdf', 'membro', '../arquivos/629d3158e2b4a.pdf', 6),
(190, 'Gabriel dos Santos Duarte', 'INFO1M', '20221134010067', 'Comprovante-1.pdf', 'membro', '../arquivos/629d31bc09ec8.pdf', 6),
(191, 'João Maria Duarte da Silva', 'INFO1M', '20221134010040', 'download-8.pdf', 'membro', '../arquivos/629d31eb79297.pdf', 6),
(192, 'Jose João Felipe Silva de Lima', 'QUIM4M', '20191137040007', 'download (4).pdf', 'membro', '../arquivos/629d322bbace7.pdf', 6),
(193, 'Deisiane de Farias Pessoa', 'QUIM4M', '20191137040032', 'transferir.pdf', 'membro', '../arquivos/629d3267bf1d0.pdf', 6),
(194, 'Elizabete Rocha Mendes Bezerra Rodrigues', 'PROFESSORA', '#', '#', 'madrinha', '#', 6),
(197, 'Fabio Garcia Penha', 'PROFESSOR', '#', '#', 'padrinho', '#', 6),
(201, 'Rafael Rodrigues da Silva', 'PROFESSOR', '#', '#', 'padrinho', '#', 4),
(202, 'Anna Karina Alves Viegas', 'ADM3V', '20201131100038', 'Declaração de matrícula .pdf', 'membro', '../arquivos/629dd8d818fb0.pdf', 4),
(203, 'Thais Ribeiro de Lira', 'ADM4V', '20191131100018', '243958.pdf', 'membro', '../arquivos/629dd94ec7abc.pdf', 4),
(204, 'Vanderson Matheus Cláudio Viana', 'ADM4V', '20201131100051', 'Documento.pdf', 'membro', '../arquivos/629de567e9273.pdf', 4),
(205, 'Jackson dos Santos Lima', 'ADM4M', '20201131100055', 'COMPROVANTE JACKSON.pdf', 'lider', '../arquivos/629def81d2d2d.pdf', 8),
(206, 'Mateus Vitor Silva de Oliveira', 'ADMSUB2V', '20202135000018', 'download.pdf', 'membro', '../arquivos/629df0c8654b4.pdf', 8),
(207, 'Maria Rita dos Santos Gomes', 'INFO1M', '20211134010048', 'download (2) (1).pdf', 'membro', '../arquivos/629df1335370b.pdf', 8),
(208, 'Elisson Silva Ribeiro Bessa', 'ADM4M', '20191131100005', 'download (1).pdf', 'membro', '../arquivos/629df17834b25.pdf', 8),
(209, 'Bruno Joseph Fagundes Oliveira', 'INFO3M', '20201134010032', 'download.pdf', 'membro', '../arquivos/629df24546417.pdf', 8),
(210, 'Eduarda Vanessa da Silva', 'INFO4V', '20191134010014', 'download (1).pdf', 'vice-lider', '../arquivos/629df284441d7.pdf', 8),
(211, 'Gislayne Mikhaele da Silva', 'INFO4V', '20191134010023', 'download (1) (2).pdf', 'membro', '../arquivos/629df2af65585.pdf', 8),
(212, 'Luiz Fabiano Neves de Souza', 'INFO2M', '20211134010059', 'download (1) (1).pdf', 'membro', '../arquivos/629df2e432dcc.pdf', 8),
(213, 'Yuri Emanuel de Lima', 'TPQ1M', '20221130140007', 'download (1) (1) (2).pdf', 'membro', '../arquivos/629df32e8a34f.pdf', 8),
(214, 'Flávio Oliveira Silva Júnior', 'INFO3M', ' 20191134010032', 'download (1) (1) (1).pdf', 'membro', '../arquivos/629df35e30dab.pdf', 8),
(215, 'Maria Clara Jerônimo Chaves', 'QUIM3V', '20201137040023', 'comprovante de matrícula .pdf', 'membro', '../arquivos/629df38d08256.pdf', 8),
(216, 'Layane Ketyle Sousa de Lima', 'INFO4V', '20191134010036', '249033.pdf', 'membro', '../arquivos/629df3e3adbd0.pdf', 8),
(217, 'Kadson Alves de Queiroz', 'INFO4V', '20191134010019', 'KadoComprovante.pdf', 'membro', '../arquivos/629df4a1c7c50.pdf', 8),
(218, 'Welder Gomes Cardoso da Silva', 'INFO2M', '20201134010041', 'download.pdf', 'membro', '../arquivos/629df4e40c00d.pdf', 8),
(219, 'João Vitor Barbosa de Lima', 'INFO4V', '20191134010020', 'download (8).pdf', 'membro', '../arquivos/629df5200d24a.pdf', 8),
(220, 'Endrew Roberto Tomaz do Nascimento', 'INFO3M', '20201134010005', 'download (7).pdf', 'membro', '../arquivos/629df53e732f6.pdf', 8),
(221, 'Luan Luis da Silva', 'INFO2V', '20211134010029', 'download (6).pdf', 'membro', '../arquivos/629df578424d9.pdf', 8),
(222, 'Jonas Rafael Silva Cavalcanti', 'INFO4V', '20191134010001', 'download (5).pdf', 'membro', '../arquivos/629df5958adeb.pdf', 8),
(223, 'Kleison Vitoriano da Silva', 'INFO3M', '20201134010025', 'download (5) (1).pdf', 'membro', '../arquivos/629df5b3c7993.pdf', 8),
(224, 'Weverson Juan Silva Oliveira', 'INFO3M', '20201134010016', 'download (4).pdf', 'membro', '../arquivos/629df5e21f211.pdf', 8),
(225, 'Andrew Moreira Ramos', 'ADM4M', '20191131100076', 'download (4) (1).pdf', 'membro', '../arquivos/629df6502dd31.pdf', 8),
(226, 'Thawanny da Costa Silva', 'QUIM3M', '20201137040040', 'download (3).pdf', 'membro', '../arquivos/629df683750c4.pdf', 8),
(227, 'Rômulo Alves de Morais Rocha', 'INFO4V', '20191134010003', 'download (2).pdf', 'membro', '../arquivos/629df6ab57df5.pdf', 8),
(228, 'Maria Eduarda Jerônimo Chaves', 'ADM4V', '20191131100054', 'download (2) (1).pdf', 'membro', '../arquivos/629df6dc1fb5f.pdf', 8),
(229, 'Alesandro Alex Mendes da Silva', 'INFO4V', '20191134010013', 'download (1).pdf', 'membro', '../arquivos/629df70e1aea2.pdf', 8),
(230, 'João Vitor da Silva Cunha', 'INFO3M', '20201134010029', 'download (1) (1).pdf', 'membro', '../arquivos/629df733b66d0.pdf', 8),
(231, 'Maria Cecília de Oliveira Bezerra Lima', 'QUIM3V', '20201137040046', 'Declaração.pdf', 'membro', '../arquivos/629df75f1181a.pdf', 8),
(232, 'Thauã Magalhães Paulino Lucas', 'INFO4V', '20191134010022', 'declaracao.pdf', 'membro', '../arquivos/629df77b2d9e8.pdf', 8),
(233, 'Cananda Ethyleen Almeida Costa', 'QUIM3V', '20201137040026', 'comprovante de matricula_cananda.pdf', 'membro', '../arquivos/629df7a801b39.pdf', 8),
(234, 'Regina dos Santos Nascimento', 'TPQ1M', '20221130140019', '317275.pdf', 'membro', '../arquivos/629df7f6f2e74.pdf', 8),
(235, 'Guilherme Silva do Vale', 'QUIM1M', '20221137040001', '311326.pdf', 'membro', '../arquivos/629df827b8a17.pdf', 8),
(236, 'Aline Maria Flor de Lima', 'QUIM3M', '20201137040063', '269637.pdf', 'membro', '../arquivos/629df8493b969.pdf', 8),
(237, 'Lyanna Carollyne Farias Oliveira Santos', 'QUIM3V', '20201137040024', '267008.pdf', 'membro', '../arquivos/629df871042a3.pdf', 8),
(238, 'Maria Clara Fernandes de Oliveira', 'ADM4V', '20191131100066', '249307.pdf', 'membro', '../arquivos/629df87179b88.pdf', 4),
(239, 'Estela Maris Antonia da Silva Moreira', 'INFO4V', '20191134010031', '248402.pdf', 'membro', '../arquivos/629df88d291a3.pdf', 8),
(240, 'Maria Vitória Francelino da Silva', 'ADMSUB2V', '20212135000019', 'download (4).pdf', 'membro', '../arquivos/629df9dd1250f.pdf', 8),
(241, 'Pedro Henrique Freire da Cunha Silva', 'QUIM3M', '20201137040022', 'Documento.pdf', 'membro', '../arquivos/629dfd457a192.pdf', 8),
(242, 'Lucas Freitas dos Santos', 'TADS1N', '20221134040003', 'download.pdf', 'membro', '../arquivos/629dfddf679dd.pdf', 8),
(243, 'Vitória Kamilly Fernandes de Souza', 'QUIM4M', ' 20191137040031', 'download-9.pdf', 'membro', '../arquivos/629e2874825ed.pdf', 6),
(244, 'Nicolas Gabriel de Lima', 'QUIM1M', '20221130140032', 'download-10.pdf', 'membro', '../arquivos/629e28a909b69.pdf', 6),
(246, 'Gisele Carla Gomes de Oliveira', 'QUIM4M', '20191137040013', 'download (1) (3).pdf', 'membro', '../arquivos/629e5c68c267f.pdf', 6),
(251, 'Amanda Medeiros de Oliveira', 'INFO3M', '20201134010012', 'download (2) (1).pdf', 'membro', '../arquivos/629e7de065f92.pdf', 8),
(252, 'Paulo Gonçalves da Silva Neto', 'QUIM1M', '20221137040020', '313385.pdf', 'membro', '../arquivos/629e7e36772ed.pdf', 8),
(253, 'Maria Jose Alves de Lima', 'TPQ', '20182130140027', 'download (5)-1.pdf', 'membro', '../arquivos/629e8304a6bf3.pdf', 6),
(262, 'Clarice Maria da Silva Chaves', 'QUIM1V', '20201137040079', 'download(1).pdf', 'membro', '../arquivos/629fd2563676b.pdf', 8),
(263, 'SUERVY CANUTO DE OLIVEIRA SOUSA', 'SERVIDOR', '#', '#', 'padrinho', '#', 8),
(264, 'Aislania', 'SERVIDORA ', '#', '#', 'madrinha', '#', 8),
(265, 'Kassielli Fernandes de Souza', 'ADM4M', '20191131100014', 'download-11.pdf', 'membro', '../arquivos/62a0a36b70d28.pdf', 6),
(266, 'Vinícius de Araújo Bento', 'INFO 3M', '20201134010030', 'inbound9182752399892130346.pdf', 'membro', '../arquivos/62a1f80ff3610.pdf', 10),
(267, 'Luiz Roberto Guimarães Campos', 'INFO 3M', '20201134010031', 'inbound3301350668129487431.pdf', 'membro', '../arquivos/62a1f8619929c.pdf', 10),
(268, 'Fabrício Dionísio da Silva', 'QUIM3M', '20201137040077', 'inbound8513372645711087824.pdf', 'membro', '../arquivos/62a21d0fe2dbb.pdf', 10),
(269, 'Fernando José da silva Oliveira', 'QUIM3M', '20201137040014', 'inbound1135570404283383837.pdf', 'lider', '../arquivos/62a21d4870072.pdf', 10),
(276, 'Joao Vitor Bezerra Clementino', 'INFO1M', '20221134010044', 'download (1).pdf', 'membro', '../arquivos/62aa5722b069b.pdf', 7),
(277, 'Samuel Lucas da Silva Lima', 'INFO1M', '20221134010033', 'download-1.pdf', 'membro', '../arquivos/62aa57824fa68.pdf', 7),
(279, 'Rayslanne Maria dos Santos Silva', 'INFO1V', '20211134010002', 'download (2).pdf', 'membro', '../arquivos/62aa7e8a8fc55.pdf', 7),
(281, 'Robert Pablo Fernandes de Amorim', 'INFO1M', '20221134010073', 'Comprovante-2.pdf', 'membro', '../arquivos/62ad223786760.pdf', 6),
(282, 'Felipe Patricio Cardoso de Assis', 'INFO2M', '20211134010024', 'download_220617_150651.pdf', 'membro', '../arquivos/62add612888f4.pdf', 7),
(283, 'Steffanny Silva Nascimento', 'INFO1M', '20221134010062', 'Comprovante (1).pdf', 'membro', '../arquivos/62ae7168816a6.pdf', 7),
(287, 'deletar', 'DELETAR', '#', '#', 'madrinha', '#', 4),
(288, 'deletar', 'DELETAR', '#', '#', 'madrinha', '#', 4),
(290, 'wqerwqe', 'QEQEQEW', '#', '#', 'padrinho', '#', 4),
(292, 'sdfafas', 'DSSFSF', '#', '#', 'madrinha', '#', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacao`
--

CREATE TABLE `pontuacao` (
  `idpontuacao` int NOT NULL,
  `primeiro` int NOT NULL,
  `segundo` int NOT NULL,
  `terceiro` int NOT NULL,
  `quarto` int NOT NULL,
  `quinto` int NOT NULL,
  `sexto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `pontuacao`:
--

--
-- Extraindo dados da tabela `pontuacao`
--

INSERT INTO `pontuacao` (`idpontuacao`, `primeiro`, `segundo`, `terceiro`, `quarto`, `quinto`, `sexto`) VALUES
(1, 100, 80, 60, 50, 40, 30),
(2, 200, 170, 140, 120, 100, 80),
(3, 300, 260, 220, 190, 160, 130);

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE `provas` (
  `idProva` int NOT NULL,
  `nome` varchar(150) NOT NULL,
  `local` varchar(100) NOT NULL,
  `participantes` int NOT NULL,
  `pontuacao_idpontuacao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `provas`:
--   `pontuacao_idpontuacao`
--       `pontuacao` -> `idpontuacao`
--

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`idProva`, `nome`, `local`, `participantes`, `pontuacao_idpontuacao`) VALUES
(1, 'Futsal Masculino', 'Ginásio', 10, 1),
(2, 'Futsal Feminino', 'Ginásio', 10, 1),
(3, 'Vôlei de Quadra Misto', 'Ginásio', 10, 1),
(4, 'Queimada Feminino', 'Campo IFNC', 7, 1),
(5, 'Basquete Masculino', 'Ginásio', 10, 1),
(6, 'Handebol Feminino', 'Ginásio', 14, 1),
(7, 'Handebol Masculino', 'Ginásio', 14, 1),
(8, 'Jogo eletrônico', 'Lab. Info', 5, 1),
(9, 'Lançamento de Dardo Masculino e Feminino', 'Campo IFNC', 1, 1),
(10, 'Xadrez Masculino e Feminino', 'Sala de linguagens', 1, 1),
(11, 'Cabo de Guerra Misto', 'Campo IFNC', 10, 1),
(12, 'Tênis de mesa Masculino e Feminino', 'Sala de jogos', 2, 1),
(13, 'Concurso Desenho', 'Hall de entrada', 3, 2),
(14, 'Encenação de Biografia', 'Auditório', 0, 3),
(15, 'Oficinas', 'Salas', 20, 2),
(16, 'Instagram', 'Redes sociais', 0, 2),
(17, 'Just Dance', 'Auditório', 0, 2),
(19, 'Grito de Guerra (Abertura)', 'Ginásio', 0, 2),
(20, 'Performance Temática (Abertura)', 'Ginásio', 0, 3),
(21, 'Arrecadação de alimentos não perecíveis', '', 0, 2),
(22, 'Prova surpresas 1', '', 0, 2),
(23, 'Prova surpresas 2', '', 0, 2),
(24, 'Prova surpresas 3', '', 0, 2),
(25, 'Prova surpresas 4', '', 0, 2),
(26, 'Organização da Sala Temática', 'Salas', 0, 2),
(31, 'Arremesso de Peso', 'Campo IFRN', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `turma` varchar(20) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- RELACIONAMENTOS PARA TABELAS `usuario`:
--

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `matricula`, `turma`, `senha`, `tipo`) VALUES
(2, 'sintique', 'teste@teste.com', '2', 'INFO4V', '8fa14cdd754f91cc6554c9e71929cce7', 'user'),
(4, 'Helena Alexandra Barbalho de Souza', 'lennaabs10@hotmail.com', '20191131100015', 'ADM4V', '38e6724bf1e78f79e7a7d25bf7ce4ac1', 'user'),
(5, 'Danilo Marques dos Santos', 'danilo.m@escolar.ifrn.edu', '20191137040016', 'QUíMICA 4M', 'c8ffb181270c4cdf162f907159744c7f', 'user'),
(6, 'Yuri Gabriel de Macêdo Carvalho', 'yuri.c@escolar.ifrn.edu.br', '20201134010010', 'INFO3M', '1005fb7cb5368e6acd34f6b07c95acd9', 'user'),
(7, 'Késia Vitória Gomes Vieira', 'k.gomes@escolar.ifrn.edu.br', '20211131100008', 'ADM2M', '530ab9543ca5ca46b58b030a60c270ff', 'user'),
(8, 'Jackson dos Santos Lima', 'jacksontoddtaylor7@gmail.com', '20201131100055', 'ADM4M', 'c085e730455c44b8646c7b4df63ad45c', 'user'),
(13, 'admin', 'admin@semadec.ifrn.edu.br', '*', '*', 'b5a2304245d62ce23309176ecc9948f7', 'admin'),
(24, 'equipe', 'equipe@equipe.com', '000004', 'EQUIPE', 'e1671797c52e15f763380b45e841ec32', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`idArquivo`);

--
-- Índices para tabela `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`idconquistas`),
  ADD KEY `fk_conquistas_Provas1_idx` (`Provas_idProva`),
  ADD KEY `fk_conquistas_Equipe1_idx` (`Equipe_idEquipe`);

--
-- Índices para tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`),
  ADD KEY `fk_Equipe_Usuario1_idx` (`Usuario_idUsuario`);

--
-- Índices para tabela `equipe_has_provas`
--
ALTER TABLE `equipe_has_provas`
  ADD PRIMARY KEY (`Equipe_idEquipe`,`Provas_idProva`),
  ADD KEY `fk_Equipe_has_Provas_Provas1_idx` (`Provas_idProva`),
  ADD KEY `fk_Equipe_has_Provas_Equipe1_idx` (`Equipe_idEquipe`);

--
-- Índices para tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`idMembro`),
  ADD KEY `fk_Membros_Equipe1_idx` (`Equipe_idEquipe`);

--
-- Índices para tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  ADD PRIMARY KEY (`idpontuacao`);

--
-- Índices para tabela `provas`
--
ALTER TABLE `provas`
  ADD PRIMARY KEY (`idProva`),
  ADD KEY `fk_Provas_pontuacao1_idx` (`pontuacao_idpontuacao`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `idArquivo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `idconquistas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idEquipe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `idMembro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT de tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  MODIFY `idpontuacao` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `provas`
--
ALTER TABLE `provas`
  MODIFY `idProva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conquistas`
--
ALTER TABLE `conquistas`
  ADD CONSTRAINT `fk_conquistas_Equipe1` FOREIGN KEY (`Equipe_idEquipe`) REFERENCES `equipe` (`idEquipe`),
  ADD CONSTRAINT `fk_conquistas_Provas1` FOREIGN KEY (`Provas_idProva`) REFERENCES `provas` (`idProva`);

--
-- Limitadores para a tabela `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_Equipe_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `equipe_has_provas`
--
ALTER TABLE `equipe_has_provas`
  ADD CONSTRAINT `fk_Equipe_has_Provas_Equipe1` FOREIGN KEY (`Equipe_idEquipe`) REFERENCES `equipe` (`idEquipe`),
  ADD CONSTRAINT `fk_Equipe_has_Provas_Provas1` FOREIGN KEY (`Provas_idProva`) REFERENCES `provas` (`idProva`);

--
-- Limitadores para a tabela `provas`
--
ALTER TABLE `provas`
  ADD CONSTRAINT `fk_Provas_pontuacao1` FOREIGN KEY (`pontuacao_idpontuacao`) REFERENCES `pontuacao` (`idpontuacao`);
COMMIT;
