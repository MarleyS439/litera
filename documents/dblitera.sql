-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/06/2024 às 18:19
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
(1, 'Cabelo Top', 0, 'bb69b1ff5b4cea72ae8ffbbeb088027d.jpg', '6574023345d1dfdf80b695e690cefc50'),
(2, 'cabelo Felipe ', 0, 'f179881d725a99d5782a971f84eb7a62.jpg', '19b5163872c9d0d05adc31719f670dd2');

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
(2, 'Felipe', 0, '58fde547b4ea0b4dad86fad4f6262598.jpg', '2e0e22187c58e8aab0b43fd265f1e280');

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
(2, 'Roupa Branca', 0, '120fa382f360c4cb9b57f2c3cf71c62e.jpg', 'f0256aa7cc7c713a507d9fe14e191377');

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
  MODIFY `codCabelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `codGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `codRoupa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
