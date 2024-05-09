<?php
require_once(__DIR__."../../config/conexao.php");

class RoupaDao
{
    public static function insert($roupa)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbroupa (nomeRoupa, precoRoupa, imgRoupa, tokenRoupa) VALUES (?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $roupa->getNomeRoupa());
        $stmt->bindValue(2, $roupa->getPrecoRoupa());
        $stmt->bindValue(3, $roupa->getImgRoupa());
        $stmt->bindValue(4, $roupa->getTokenRoupa());
        $stmt->execute();
    }

    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbroupa";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbroupa WHERE codRoupa = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbroupa WHERE codRoupa = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }

    public static function update($cod, $roupa)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbroupa SET
            nomeRoupa = ?, 
            precoRoupa = ?, 
            imgRoupa = ?, 
            tokenRoupa = ?
            WHERE codRoupa = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $roupa->getNomeRoupa());
        $stmt->bindValue(2, $roupa->getPrecoRoupa());
        $stmt->bindValue(3, $roupa->getImgRoupa());
        $stmt->bindValue(4, $roupa->getTokenRoupa());
        $stmt->bindValue(5, $cod);
        return $stmt->execute();
    }
}
