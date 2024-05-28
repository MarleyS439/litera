<?php

require_once(__DIR__ . '../../config/conexao.php');

class ItemDao
{
    public static function insert($codPerfil, $codJogo)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbdadosjogo (codPerfil, codJogo, dataPartida) VALUES (?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $codPerfil);
        $stmt->bindValue(2, $codJogo);
        $stmt->bindValue(3, date('Y-m-d'));
        $stmt->execute();
    }
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosjogo";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectAllById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosjogo WHERE codDadosJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function selectByGameId($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosjogo WHERE codJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
