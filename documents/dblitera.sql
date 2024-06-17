-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/06/2024 às 19:04
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dblitera`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbacessousuario`
--

CREATE TABLE `tbacessousuario` (
  `codAcessoUsuario` int(11) NOT NULL,
  `codPerfil` int(11) NOT NULL,
  `dataAcesso` date NOT NULL,
  `isLogged` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbadmin`
--

CREATE TABLE `tbadmin` (
  `codAdmin` int(11) NOT NULL,
  `nomeAdmin` varchar(100) NOT NULL,
  `emailAdmin` varchar(120) NOT NULL,
  `senhaAdmin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbadmin`
--

INSERT INTO `tbadmin` (`codAdmin`, `nomeAdmin`, `emailAdmin`, `senhaAdmin`) VALUES
(1, 'Litera', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbavatar`
--

CREATE TABLE `tbavatar` (
  `codAvatar` int(11) NOT NULL,
  `codRoupa` int(11) NOT NULL,
  `codCabelo` int(11) NOT NULL,
  `codGenero` int(11) NOT NULL,
  `codPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcabelo`
--

CREATE TABLE `tbcabelo` (
  `codCabelo` int(11) NOT NULL,
  `nomeCabelo` varchar(50) NOT NULL,
  `precoCabelo` int(11) NOT NULL,
  `imgCabelo` varchar(50) NOT NULL,
  `tokenCabelo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbcabelo`
--

INSERT INTO `tbcabelo` (`codCabelo`, `nomeCabelo`, `precoCabelo`, `imgCabelo`, `tokenCabelo`) VALUES
(1, 'Cabelo Campos', 0, 'f9de66d6aa9366aa68ea6df806b492f0.jpg', '5f69c9f16a2ed401b7e7a9df3188fcc8'),
(2, 'Cabelo Gomes', 0, '85d7165150d98861fc08790e6fc1ec89.jpg', 'e6caa0607c4ad70993e16486c0ad8723'),
(3, 'Cabelo Henrique', 0, 'be40d7de85feb474fae9f06ee4af3654.jpg', '5f2bc33c6490746384348c9d4788131b'),
(4, 'Cabelo Mariana', 0, '6497a6552bea08bb3cc07ce5680f19af.jpg', '4d150e473da821ad3efb9f9086efe706'),
(5, 'Cabelo Milena', 0, '580474f0d3e465ed8ad6ab221aa7b4f0.jpg', 'ba9421c13587f8f494e79d2eefed89ec');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `codCategoria` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcompraitem`
--

CREATE TABLE `tbcompraitem` (
  `codCompraItem` int(11) NOT NULL,
  `codItem` int(11) NOT NULL,
  `codPerfil` int(11) NOT NULL,
  `dataCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbconquista`
--

CREATE TABLE `tbconquista` (
  `codConquista` int(11) NOT NULL,
  `nomeConquista` varchar(20) NOT NULL,
  `descConquista` text NOT NULL,
  `imgConquista` varchar(50) NOT NULL,
  `tokenConquista` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbconquistausuario`
--

CREATE TABLE `tbconquistausuario` (
  `codConquistaUsuario` int(11) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `codConquista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdadosjogo`
--

CREATE TABLE `tbdadosjogo` (
  `codDadosJogo` int(11) NOT NULL,
  `codPerfil` int(11) NOT NULL,
  `codJogo` int(11) NOT NULL,
  `dataPartida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdadosusuarios`
--

CREATE TABLE `tbdadosusuarios` (
  `codDadosJogoUsuario` int(11) NOT NULL,
  `codJogo` int(11) NOT NULL,
  `codDependente` int(11) NOT NULL,
  `maxPontuacao` bigint(20) NOT NULL,
  `qtndAcertos` int(11) NOT NULL,
  `qtndErros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `codGenero` int(11) NOT NULL,
  `nomeGenero` varchar(50) NOT NULL,
  `precoGenero` int(11) NOT NULL,
  `imgGenero` varchar(50) NOT NULL,
  `tokenGenero` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbgenero`
--

INSERT INTO `tbgenero` (`codGenero`, `nomeGenero`, `precoGenero`, `imgGenero`, `tokenGenero`) VALUES
(1, 'genero nulo', 0, 'e204caf49569222bc33753005ca07653.jpg', '68e3fe91a425202f5471c56c95f4d0cf'),
(2, 'Felipe', 0, '58fde547b4ea0b4dad86fad4f6262598.jpg', '2e0e22187c58e8aab0b43fd265f1e280'),
(3, 'Base Campos', 0, '35f45def3ece410649f5762a913ba405.jpg', 'bbb8caccdadc954c0bdf099847a6437d'),
(4, 'Base Gomes', 0, '80652449f9f629a147996e067f42edf6.jpg', '7bbcda6c4cf40c39469c8c0226836f2d'),
(5, 'Base Henrique', 0, 'ceb3f9b64fd0e0e39885c3739ffa50d1.jpg', '995ea4d4dea7377fa92c522265183329'),
(6, 'Base Kaua ', 0, 'bcde42dc5f25574118484aad830434e0.jpg', 'e9c1a0d6e156ba45294270c03622ba6e'),
(7, 'Base Mariana', 0, '4c523d1b98befef1db084134c6369149.jpg', '19664e924b867273b58df8e4b5b556d0'),
(8, 'Base Milena', 0, '1b0d4537600d96317f23f6505add6787.jpg', '9126c352cb7c51d83db726458bd715bc');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbitem`
--

CREATE TABLE `tbitem` (
  `codItem` int(11) NOT NULL,
  `codTipoItem` int(11) NOT NULL,
  `nomeItem` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbjogo`
--

CREATE TABLE `tbjogo` (
  `codJogo` int(11) NOT NULL,
  `nomeJogo` varchar(50) NOT NULL,
  `descJogo` text NOT NULL,
  `pontucaoJogo` int(11) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  `codNivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbnivel`
--

CREATE TABLE `tbnivel` (
  `codNivel` int(11) NOT NULL,
  `dificuldadeNivel` varchar(10) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbperfil`
--

CREATE TABLE `tbperfil` (
  `codPerfil` int(11) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `nomePerfil` varchar(100) NOT NULL,
  `generoPerfil` varchar(30) NOT NULL,
  `iconPerfil` varchar(50) NOT NULL,
  `pontuacaoPerfil` int(11) DEFAULT NULL,
  `dinheiroPerfil` int(11) DEFAULT NULL,
  `tutorial` tinyint(1) NOT NULL,
  `nivel` int(11) DEFAULT NULL,
  `fasesConcluidas` int(11) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `dataCriacao` date NOT NULL,
  `dataModfc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbroupa`
--

CREATE TABLE `tbroupa` (
  `codRoupa` int(11) NOT NULL,
  `nomeRoupa` varchar(50) NOT NULL,
  `precoRoupa` int(11) NOT NULL,
  `imgRoupa` varchar(50) NOT NULL,
  `tokenRoupa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbroupa`
--

INSERT INTO `tbroupa` (`codRoupa`, `nomeRoupa`, `precoRoupa`, `imgRoupa`, `tokenRoupa`) VALUES
(1, 'Roupa Teste', 0, '624be995f7dcb77f07bd98035aa1a23f.jpg', 'ea39342e27cfc8cac339e1c9bf6776b5'),
(2, 'Roupa Branca', 0, '120fa382f360c4cb9b57f2c3cf71c62e.jpg', 'f0256aa7cc7c713a507d9fe14e191377'),
(3, 'Roupa Campos', 0, '36dade16388c7007b96bf45316afe2b2.jpg', 'f3c566010a1f634e07a2211318d886eb'),
(4, 'Roupa Gomes', 0, '9f1620cd87c6bc651f8111c8cfb51ea3.jpg', '155f765399ecaa42c86853296accd0fd'),
(5, 'Roupa Henrique', 0, '17f38dd1602e527d02dcabe476573a49.jpg', '81f59b36d492f47b1143b24b2c477168'),
(6, 'Roupa Kaua', 0, '493c33ca5199c31669432ba800a63204.jpg', 'a0f70a8b08bc35ad4599d6df1dba39b4'),
(7, 'Roupa Mariana', 0, 'b16b12748f3741ad9afb79dc800346e7.jpg', 'd06e26d1a599536c95acb807b50a6527'),
(8, 'Roupa Milena', 0, '768072e67ebfbc6ea12ff395a25478dc.jpg', '14d496976e1fe74ab0a12213a3d08920');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtipoitem`
--

CREATE TABLE `tbtipoitem` (
  `codTipoItem` int(11) NOT NULL,
  `tipoItem` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `codUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `emailUsuario` varchar(120) NOT NULL,
  `senhaUsuario` varchar(15) NOT NULL,
  `banido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbacessousuario`
--
ALTER TABLE `tbacessousuario`
  ADD PRIMARY KEY (`codAcessoUsuario`);

--
-- Índices de tabela `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`codAdmin`),
  ADD UNIQUE KEY `emailAdmin` (`emailAdmin`);

--
-- Índices de tabela `tbavatar`
--
ALTER TABLE `tbavatar`
  ADD PRIMARY KEY (`codAvatar`),
  ADD KEY `RoupaAvatar` (`codRoupa`),
  ADD KEY `CabeloAvatar` (`codCabelo`),
  ADD KEY `GeneroAvatar` (`codGenero`),
  ADD KEY `UsuarioAvatar` (`codPerfil`);

--
-- Índices de tabela `tbcabelo`
--
ALTER TABLE `tbcabelo`
  ADD PRIMARY KEY (`codCabelo`);

--
-- Índices de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`codCategoria`);

--
-- Índices de tabela `tbcompraitem`
--
ALTER TABLE `tbcompraitem`
  ADD PRIMARY KEY (`codCompraItem`),
  ADD KEY `CompraItem` (`codItem`),
  ADD KEY `CompraUsuario` (`codPerfil`);

--
-- Índices de tabela `tbconquista`
--
ALTER TABLE `tbconquista`
  ADD PRIMARY KEY (`codConquista`);

--
-- Índices de tabela `tbconquistausuario`
--
ALTER TABLE `tbconquistausuario`
  ADD PRIMARY KEY (`codConquistaUsuario`),
  ADD KEY `UsuarioConquista` (`codUsuario`),
  ADD KEY `ConquistaUsuario` (`codConquista`);

--
-- Índices de tabela `tbdadosjogo`
--
ALTER TABLE `tbdadosjogo`
  ADD PRIMARY KEY (`codDadosJogo`);

--
-- Índices de tabela `tbdadosusuarios`
--
ALTER TABLE `tbdadosusuarios`
  ADD PRIMARY KEY (`codDadosJogoUsuario`),
  ADD KEY `DadosJojo` (`codJogo`),
  ADD KEY `DadosDependente` (`codDependente`);

--
-- Índices de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`codGenero`);

--
-- Índices de tabela `tbitem`
--
ALTER TABLE `tbitem`
  ADD PRIMARY KEY (`codItem`),
  ADD KEY `TipoItem` (`codTipoItem`);

--
-- Índices de tabela `tbjogo`
--
ALTER TABLE `tbjogo`
  ADD PRIMARY KEY (`codJogo`),
  ADD KEY `CategoriaJogo` (`codCategoria`),
  ADD KEY `NivelJogo` (`codNivel`);

--
-- Índices de tabela `tbnivel`
--
ALTER TABLE `tbnivel`
  ADD PRIMARY KEY (`codNivel`);

--
-- Índices de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  ADD PRIMARY KEY (`codPerfil`),
  ADD KEY `UsuarioDependente` (`codUsuario`);

--
-- Índices de tabela `tbroupa`
--
ALTER TABLE `tbroupa`
  ADD PRIMARY KEY (`codRoupa`);

--
-- Índices de tabela `tbtipoitem`
--
ALTER TABLE `tbtipoitem`
  ADD PRIMARY KEY (`codTipoItem`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`codUsuario`),
  ADD UNIQUE KEY `emailUsuario` (`emailUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbacessousuario`
--
ALTER TABLE `tbacessousuario`
  MODIFY `codAcessoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `codAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbavatar`
--
ALTER TABLE `tbavatar`
  MODIFY `codAvatar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcabelo`
--
ALTER TABLE `tbcabelo`
  MODIFY `codCabelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `codCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcompraitem`
--
ALTER TABLE `tbcompraitem`
  MODIFY `codCompraItem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbconquista`
--
ALTER TABLE `tbconquista`
  MODIFY `codConquista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbconquistausuario`
--
ALTER TABLE `tbconquistausuario`
  MODIFY `codConquistaUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbdadosjogo`
--
ALTER TABLE `tbdadosjogo`
  MODIFY `codDadosJogo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbdadosusuarios`
--
ALTER TABLE `tbdadosusuarios`
  MODIFY `codDadosJogoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `codGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbitem`
--
ALTER TABLE `tbitem`
  MODIFY `codItem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbjogo`
--
ALTER TABLE `tbjogo`
  MODIFY `codJogo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbnivel`
--
ALTER TABLE `tbnivel`
  MODIFY `codNivel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  MODIFY `codPerfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbroupa`
--
ALTER TABLE `tbroupa`
  MODIFY `codRoupa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbtipoitem`
--
ALTER TABLE `tbtipoitem`
  MODIFY `codTipoItem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
