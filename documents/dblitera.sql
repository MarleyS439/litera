-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 01, 2024 at 05:44 PM
-- Server version: 8.4.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblitera`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbacessousuario`
--

CREATE TABLE `tbacessousuario` (
  `codAcessoUsuario` int NOT NULL,
  `codPerfil` int NOT NULL,
  `dataAcesso` date NOT NULL,
  `isLogged` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `codAdmin` int NOT NULL,
  `nomeAdmin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emailAdmin` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senhaAdmin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`codAdmin`, `nomeAdmin`, `emailAdmin`, `senhaAdmin`) VALUES
(1, 'Litera', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbavatar`
--

CREATE TABLE `tbavatar` (
  `codAvatar` int NOT NULL,
  `codRoupa` int NOT NULL,
  `codCabelo` int NOT NULL,
  `codGenero` int NOT NULL,
  `codPerfil` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbcabelo`
--

CREATE TABLE `tbcabelo` (
  `codCabelo` int NOT NULL,
  `nomeCabelo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precoCabelo` int NOT NULL,
  `imgCabelo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenCabelo` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcabelo`
--

INSERT INTO `tbcabelo` (`codCabelo`, `nomeCabelo`, `precoCabelo`, `imgCabelo`, `tokenCabelo`) VALUES
(1, 'Cabelo Top', 0, 'bb69b1ff5b4cea72ae8ffbbeb088027d.jpg', '6574023345d1dfdf80b695e690cefc50'),
(2, 'cabelo Felipe ', 0, 'f179881d725a99d5782a971f84eb7a62.jpg', '19b5163872c9d0d05adc31719f670dd2');

-- --------------------------------------------------------

--
-- Table structure for table `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `codCategoria` int NOT NULL,
  `categoria` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbcompraitem`
--

CREATE TABLE `tbcompraitem` (
  `codCompraItem` int NOT NULL,
  `codItem` int NOT NULL,
  `codPerfil` int NOT NULL,
  `dataCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbconquista`
--

CREATE TABLE `tbconquista` (
  `codConquista` int NOT NULL,
  `nomeConquista` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descConquista` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgConquista` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenConquista` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbconquistausuario`
--

CREATE TABLE `tbconquistausuario` (
  `codConquistaUsuario` int NOT NULL,
  `codUsuario` int NOT NULL,
  `codConquista` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbdadosjogo`
--

CREATE TABLE `tbdadosjogo` (
  `codDadosJogo` int NOT NULL,
  `codPerfil` int NOT NULL,
  `codJogo` int NOT NULL,
  `dataPartida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbdadosusuarios`
--

CREATE TABLE `tbdadosusuarios` (
  `codDadosJogoUsuario` int NOT NULL,
  `codJogo` int NOT NULL,
  `codDependente` int NOT NULL,
  `maxPontuacao` bigint NOT NULL,
  `qtndAcertos` int NOT NULL,
  `qtndErros` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbgenero`
--

CREATE TABLE `tbgenero` (
  `codGenero` int NOT NULL,
  `nomeGenero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precoGenero` int NOT NULL,
  `imgGenero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenGenero` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbgenero`
--

INSERT INTO `tbgenero` (`codGenero`, `nomeGenero`, `precoGenero`, `imgGenero`, `tokenGenero`) VALUES
(1, 'genero nulo', 0, 'e204caf49569222bc33753005ca07653.jpg', '68e3fe91a425202f5471c56c95f4d0cf'),
(2, 'Felipe', 0, '58fde547b4ea0b4dad86fad4f6262598.jpg', '2e0e22187c58e8aab0b43fd265f1e280');

-- --------------------------------------------------------

--
-- Table structure for table `tbitem`
--

CREATE TABLE `tbitem` (
  `codItem` int NOT NULL,
  `codTipoItem` int NOT NULL,
  `nomeItem` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbjogo`
--

CREATE TABLE `tbjogo` (
  `codJogo` int NOT NULL,
  `nomeJogo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descJogo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pontucaoJogo` int NOT NULL,
  `codCategoria` int NOT NULL,
  `codNivel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbnivel`
--

CREATE TABLE `tbnivel` (
  `codNivel` int NOT NULL,
  `dificuldadeNivel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbperfil`
--

CREATE TABLE `tbperfil` (
  `codPerfil` int NOT NULL,
  `codUsuario` int NOT NULL,
  `nomePerfil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `generoPerfil` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iconPerfil` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pontuacaoPerfil` int DEFAULT NULL,
  `dinheiroPerfil` int DEFAULT NULL,
  `tutorial` tinyint(1) NOT NULL,
  `nivel` int DEFAULT NULL,
  `fasesConcluidas` int DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `dataCriacao` date NOT NULL,
  `dataModfc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbroupa`
--

CREATE TABLE `tbroupa` (
  `codRoupa` int NOT NULL,
  `nomeRoupa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precoRoupa` int NOT NULL,
  `imgRoupa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenRoupa` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbroupa`
--

INSERT INTO `tbroupa` (`codRoupa`, `nomeRoupa`, `precoRoupa`, `imgRoupa`, `tokenRoupa`) VALUES
(1, 'Roupa Teste', 0, '624be995f7dcb77f07bd98035aa1a23f.jpg', 'ea39342e27cfc8cac339e1c9bf6776b5'),
(2, 'Roupa Branca', 0, '120fa382f360c4cb9b57f2c3cf71c62e.jpg', 'f0256aa7cc7c713a507d9fe14e191377');

-- --------------------------------------------------------

--
-- Table structure for table `tbtipoitem`
--

CREATE TABLE `tbtipoitem` (
  `codTipoItem` int NOT NULL,
  `tipoItem` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbusuario`
--

CREATE TABLE `tbusuario` (
  `codUsuario` int NOT NULL,
  `nomeUsuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emailUsuario` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senhaUsuario` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `banido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbacessousuario`
--
ALTER TABLE `tbacessousuario`
  ADD PRIMARY KEY (`codAcessoUsuario`);

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`codAdmin`),
  ADD UNIQUE KEY `emailAdmin` (`emailAdmin`);

--
-- Indexes for table `tbavatar`
--
ALTER TABLE `tbavatar`
  ADD PRIMARY KEY (`codAvatar`),
  ADD KEY `RoupaAvatar` (`codRoupa`),
  ADD KEY `CabeloAvatar` (`codCabelo`),
  ADD KEY `GeneroAvatar` (`codGenero`),
  ADD KEY `UsuarioAvatar` (`codPerfil`);

--
-- Indexes for table `tbcabelo`
--
ALTER TABLE `tbcabelo`
  ADD PRIMARY KEY (`codCabelo`);

--
-- Indexes for table `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`codCategoria`);

--
-- Indexes for table `tbcompraitem`
--
ALTER TABLE `tbcompraitem`
  ADD PRIMARY KEY (`codCompraItem`),
  ADD KEY `CompraItem` (`codItem`),
  ADD KEY `CompraUsuario` (`codPerfil`);

--
-- Indexes for table `tbconquista`
--
ALTER TABLE `tbconquista`
  ADD PRIMARY KEY (`codConquista`);

--
-- Indexes for table `tbconquistausuario`
--
ALTER TABLE `tbconquistausuario`
  ADD PRIMARY KEY (`codConquistaUsuario`),
  ADD KEY `UsuarioConquista` (`codUsuario`),
  ADD KEY `ConquistaUsuario` (`codConquista`);

--
-- Indexes for table `tbdadosjogo`
--
ALTER TABLE `tbdadosjogo`
  ADD PRIMARY KEY (`codDadosJogo`);

--
-- Indexes for table `tbdadosusuarios`
--
ALTER TABLE `tbdadosusuarios`
  ADD PRIMARY KEY (`codDadosJogoUsuario`),
  ADD KEY `DadosJojo` (`codJogo`),
  ADD KEY `DadosDependente` (`codDependente`);

--
-- Indexes for table `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`codGenero`);

--
-- Indexes for table `tbitem`
--
ALTER TABLE `tbitem`
  ADD PRIMARY KEY (`codItem`),
  ADD KEY `TipoItem` (`codTipoItem`);

--
-- Indexes for table `tbjogo`
--
ALTER TABLE `tbjogo`
  ADD PRIMARY KEY (`codJogo`),
  ADD KEY `CategoriaJogo` (`codCategoria`),
  ADD KEY `NivelJogo` (`codNivel`);

--
-- Indexes for table `tbnivel`
--
ALTER TABLE `tbnivel`
  ADD PRIMARY KEY (`codNivel`);

--
-- Indexes for table `tbperfil`
--
ALTER TABLE `tbperfil`
  ADD PRIMARY KEY (`codPerfil`),
  ADD KEY `UsuarioDependente` (`codUsuario`);

--
-- Indexes for table `tbroupa`
--
ALTER TABLE `tbroupa`
  ADD PRIMARY KEY (`codRoupa`);

--
-- Indexes for table `tbtipoitem`
--
ALTER TABLE `tbtipoitem`
  ADD PRIMARY KEY (`codTipoItem`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`codUsuario`),
  ADD UNIQUE KEY `emailUsuario` (`emailUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbacessousuario`
--
ALTER TABLE `tbacessousuario`
  MODIFY `codAcessoUsuario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `codAdmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbavatar`
--
ALTER TABLE `tbavatar`
  MODIFY `codAvatar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbcabelo`
--
ALTER TABLE `tbcabelo`
  MODIFY `codCabelo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `codCategoria` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbcompraitem`
--
ALTER TABLE `tbcompraitem`
  MODIFY `codCompraItem` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbconquista`
--
ALTER TABLE `tbconquista`
  MODIFY `codConquista` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbconquistausuario`
--
ALTER TABLE `tbconquistausuario`
  MODIFY `codConquistaUsuario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbdadosjogo`
--
ALTER TABLE `tbdadosjogo`
  MODIFY `codDadosJogo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbdadosusuarios`
--
ALTER TABLE `tbdadosusuarios`
  MODIFY `codDadosJogoUsuario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `codGenero` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbitem`
--
ALTER TABLE `tbitem`
  MODIFY `codItem` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbjogo`
--
ALTER TABLE `tbjogo`
  MODIFY `codJogo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbnivel`
--
ALTER TABLE `tbnivel`
  MODIFY `codNivel` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbperfil`
--
ALTER TABLE `tbperfil`
  MODIFY `codPerfil` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbroupa`
--
ALTER TABLE `tbroupa`
  MODIFY `codRoupa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbtipoitem`
--
ALTER TABLE `tbtipoitem`
  MODIFY `codTipoItem` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `codUsuario` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbavatar`
--
ALTER TABLE `tbavatar`
  ADD CONSTRAINT `CabeloAvatar` FOREIGN KEY (`codCabelo`) REFERENCES `tbcabelo` (`codCabelo`),
  ADD CONSTRAINT `GeneroAvatar` FOREIGN KEY (`codGenero`) REFERENCES `tbgenero` (`codGenero`),
  ADD CONSTRAINT `RoupaAvatar` FOREIGN KEY (`codRoupa`) REFERENCES `tbroupa` (`codRoupa`),
  ADD CONSTRAINT `UsuarioAvatar` FOREIGN KEY (`codPerfil`) REFERENCES `tbperfil` (`codPerfil`);

--
-- Constraints for table `tbcompraitem`
--
ALTER TABLE `tbcompraitem`
  ADD CONSTRAINT `CompraItem` FOREIGN KEY (`codItem`) REFERENCES `tbitem` (`codItem`),
  ADD CONSTRAINT `CompraUsuario` FOREIGN KEY (`codPerfil`) REFERENCES `tbusuario` (`codUsuario`);

--
-- Constraints for table `tbconquistausuario`
--
ALTER TABLE `tbconquistausuario`
  ADD CONSTRAINT `ConquistaUsuario` FOREIGN KEY (`codConquista`) REFERENCES `tbconquista` (`codConquista`),
  ADD CONSTRAINT `UsuarioConquista` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);

--
-- Constraints for table `tbdadosusuarios`
--
ALTER TABLE `tbdadosusuarios`
  ADD CONSTRAINT `DadosDependente` FOREIGN KEY (`codDependente`) REFERENCES `tbperfil` (`codPerfil`);

--
-- Constraints for table `tbitem`
--
ALTER TABLE `tbitem`
  ADD CONSTRAINT `TipoItem` FOREIGN KEY (`codTipoItem`) REFERENCES `tbtipoitem` (`codTipoItem`);

--
-- Constraints for table `tbjogo`
--
ALTER TABLE `tbjogo`
  ADD CONSTRAINT `CategoriaJogo` FOREIGN KEY (`codCategoria`) REFERENCES `tbcategoria` (`codCategoria`),
  ADD CONSTRAINT `NivelJogo` FOREIGN KEY (`codNivel`) REFERENCES `tbnivel` (`codNivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
