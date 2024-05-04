-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/05/2024 às 22:22
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
  `codDependente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcabelo`
--

CREATE TABLE `tbcabelo` (
  `codCabelo` int(11) NOT NULL,
  `nomeCabelo` varchar(50) NOT NULL,
  `imgCabelo` varchar(50) NOT NULL,
  `tokenCabelo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `codUsuario` int(11) NOT NULL,
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
  `imgGenero` varchar(50) NOT NULL,
  `tokenGenero` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `pontuacaoPerfil` int(11) NOT NULL,
  `dinheiroPerfil` int(11) NOT NULL,
  `tutorial` tinyint(1) NOT NULL,
  `nivel` int(11) NOT NULL,
  `fasesConcluidas` int(11) NOT NULL,
  `dataNasc` date NOT NULL,
  `dataCriacao` date NOT NULL,
  `dataModfc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbperfil`
--

INSERT INTO `tbperfil` (`codPerfil`, `codUsuario`, `nomePerfil`, `generoPerfil`, `iconPerfil`, `pontuacaoPerfil`, `dinheiroPerfil`, `tutorial`, `nivel`, `fasesConcluidas`, `dataNasc`, `dataCriacao`, `dataModfc`) VALUES
(1, 7, 'Matheus Gomes', 'Feminino', 'Frame 197.png', 0, 0, 0, 1, 0, '1999-06-08', '2024-05-04', '2024-05-04'),
(2, 8, 'mcLovin_Junior', 'Masculino', 'Frame 197.png', 0, 0, 0, 1, 0, '2006-12-15', '2024-05-04', '2024-05-04'),
(3, 8, 'Botomoto', 'nao-definir', 'Frame 197.png', 0, 0, 0, 0, 0, '2008-07-17', '2024-05-04', '2024-05-04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprogressousuario`
--

CREATE TABLE `tbprogressousuario` (
  `codProgressoUsuario` int(11) NOT NULL,
  `codJogo` int(11) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `nevelAtual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbroupa`
--

CREATE TABLE `tbroupa` (
  `codRoupa` int(11) NOT NULL,
  `nomeRoupa` varchar(50) NOT NULL,
  `imgRoupa` varchar(50) NOT NULL,
  `tokenRoupa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`codUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `banido`) VALUES
(7, 'Matheus Campos', 'campos@gmail.com', '1234', 0),
(8, 'mcLovin', 'mclovin@gmail.com', '1234', 0);

--
-- Índices para tabelas despejadas
--

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
  ADD KEY `UsuarioAvatar` (`codDependente`);

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
  ADD KEY `CompraUsuario` (`codUsuario`);

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
-- Índices de tabela `tbprogressousuario`
--
ALTER TABLE `tbprogressousuario`
  ADD KEY `UsuarioProgresso` (`codUsuario`),
  ADD KEY `JogoProgresso` (`codJogo`);

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
  MODIFY `codCabelo` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de tabela `tbdadosusuarios`
--
ALTER TABLE `tbdadosusuarios`
  MODIFY `codDadosJogoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `codGenero` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `codPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbroupa`
--
ALTER TABLE `tbroupa`
  MODIFY `codRoupa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtipoitem`
--
ALTER TABLE `tbtipoitem`
  MODIFY `codTipoItem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbavatar`
--
ALTER TABLE `tbavatar`
  ADD CONSTRAINT `CabeloAvatar` FOREIGN KEY (`codCabelo`) REFERENCES `tbcabelo` (`codCabelo`),
  ADD CONSTRAINT `GeneroAvatar` FOREIGN KEY (`codGenero`) REFERENCES `tbgenero` (`codGenero`),
  ADD CONSTRAINT `RoupaAvatar` FOREIGN KEY (`codRoupa`) REFERENCES `tbroupa` (`codRoupa`),
  ADD CONSTRAINT `UsuarioAvatar` FOREIGN KEY (`codDependente`) REFERENCES `tbperfil` (`codPerfil`);

--
-- Restrições para tabelas `tbcompraitem`
--
ALTER TABLE `tbcompraitem`
  ADD CONSTRAINT `CompraItem` FOREIGN KEY (`codItem`) REFERENCES `tbitem` (`codItem`),
  ADD CONSTRAINT `CompraUsuario` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);

--
-- Restrições para tabelas `tbconquistausuario`
--
ALTER TABLE `tbconquistausuario`
  ADD CONSTRAINT `ConquistaUsuario` FOREIGN KEY (`codConquista`) REFERENCES `tbconquista` (`codConquista`),
  ADD CONSTRAINT `UsuarioConquista` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);

--
-- Restrições para tabelas `tbdadosusuarios`
--
ALTER TABLE `tbdadosusuarios`
  ADD CONSTRAINT `DadosDependente` FOREIGN KEY (`codDependente`) REFERENCES `tbperfil` (`codPerfil`),
  ADD CONSTRAINT `DadosJojo` FOREIGN KEY (`codJogo`) REFERENCES `tbjogo` (`codJogo`);

--
-- Restrições para tabelas `tbitem`
--
ALTER TABLE `tbitem`
  ADD CONSTRAINT `TipoItem` FOREIGN KEY (`codTipoItem`) REFERENCES `tbtipoitem` (`codTipoItem`);

--
-- Restrições para tabelas `tbjogo`
--
ALTER TABLE `tbjogo`
  ADD CONSTRAINT `CategoriaJogo` FOREIGN KEY (`codCategoria`) REFERENCES `tbcategoria` (`codCategoria`),
  ADD CONSTRAINT `NivelJogo` FOREIGN KEY (`codNivel`) REFERENCES `tbnivel` (`codNivel`);

--
-- Restrições para tabelas `tbperfil`
--
ALTER TABLE `tbperfil`
  ADD CONSTRAINT `UsuarioDependente` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);

--
-- Restrições para tabelas `tbprogressousuario`
--
ALTER TABLE `tbprogressousuario`
  ADD CONSTRAINT `JogoProgresso` FOREIGN KEY (`codJogo`) REFERENCES `tbjogo` (`codJogo`),
  ADD CONSTRAINT `UsuarioProgresso` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
