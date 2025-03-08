-- Cria o Banco de Dados caso não exista
CREATE DATABASE IF NOT EXISTS dbLitera;

-- Seleciona o banco de dados para consultas
USE dbLitera;

-- Cria a entidade de Usuário
CREATE TABLE tbUser (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) UNIQUE NOT NULL,
    email VARCHAR(80) UNIQUE NOT NULL,
    name VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    status ENUM ('Active', 'Inactive', 'Blocked'),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Cria a entidade de Usuário Administrador
CREATE TABLE tbAdmin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) UNIQUE NOT NULL,
    email VARCHAR(80) UNIQUE NOT NULL,
    name VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    status ENUM ('Active', 'Inactive', 'Blocked'),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Cria a entidade de Permissão do Usuário Administrador
CREATE TABLE tbPermission (
    id INT PRIMERY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);
