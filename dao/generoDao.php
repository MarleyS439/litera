<?php
require_once(__DIR__."../../config/conexao.php");

class GeneroDao
{
    public static function insert($genero)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbgenero (nomeGenero, precoGenero, imgGenero, tokenGenero) VALUES (?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $genero->getNomeGenero());
        $stmt->bindValue(2, $genero->getPrecoGenero());
        $stmt->bindValue(3, $genero->getImgGenero());
        $stmt->bindValue(4, $genero->getTokenGenero());
        $stmt->execute();
    }
    
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbgenero";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbgenero WHERE codGenero = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbgenero WHERE codGenero = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    
    public static function update($cod, $genero)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbgenero SET
            nomeGenero = ?,
            precoGenero = ?,
            imgGenero = ?,
            tokenGenero = ?
            WHERE codGenero = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $genero->getNomeGenero());
        $stmt->bindValue(2, $genero->getPrecoGenero());
        $stmt->bindValue(3, $genero->getImgGenero());
        $stmt->bindValue(4, $genero->getTokenGenero());
        $stmt->bindValue(5, $cod);
        return $stmt->execute();
    }
}
