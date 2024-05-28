<?php

require_once(__DIR__ . '../../config/conexao.php');

class DadosPartidaJogoDao
{
    public static function insert($codPerfil, $codFase)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbdadospartidajogo (codPerfil, codJogo, dataPartida) VALUES (?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $codPerfil);
        $stmt->bindValue(2, $codFase);
        $stmt->bindValue(3, date('Y-m-d'));
        $stmt->execute();
    }
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadospartidajogo";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectAllById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadospartidajogo WHERE codDadosPartiaJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function countRounds()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(*) FROM tbdadospartidajogo WHERE dataPartida = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, date('Y-m-d'));
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
