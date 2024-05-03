<?php
require_once(__DIR__."../../config/conexao.php");
class CabeloDao
{
    public static function insert($cabelo)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbcabelo(nomeCabelo, precoCabelo, imgCabelo, tokenCabelo) VALUES (?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cabelo->getNomeCabelo());
        $stmt->bindValue(2, $cabelo->getPrecoCabelo());
        $stmt->bindValue(3, $cabelo->getImgCabelo());
        $stmt->bindValue(4, $cabelo->getTokenCabelo());
        $stmt->execute();
    }

    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcabelo";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcabelo WHERE codCabelo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbcabelo WHERE codCabelo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }

    public static function update($cod, $cabelo)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbcabelo SET
            nomeCabelo=?,
            precoCabelo=?,
            imgCabelo=?,
            tokenCabelo=?
            WHERE codCabelo =?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cabelo->getNomeCabelo());
        $stmt->bindValue(2, $cabelo->getPrecoCabelo());
        $stmt->bindValue(3, $cabelo->getImgCabelo());
        $stmt->bindValue(4, $cabelo->getTokenCabelo());
        $stmt->bindValue(5, $cod);
        return $stmt->execute();
    }
}
