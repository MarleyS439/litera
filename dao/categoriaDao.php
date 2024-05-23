<?php

class CategoriaDao
{
    public static function insert($categoria)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbcategoria(categoria) VALUES (?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $categoria->getCategoria());
        $stmt->execute();
    }

    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcategoria";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcategoria WHERE codCategoria = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbcategoria WHERE codCategoria = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }

    public static function update($cod, $categoria)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbcategoria SET 
            categoria = ?
            WHERE codCategoria = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $categoria->getCategoria());
        $stmt->bindValue(2, $cod);
        return $stmt->execute();
    }
}
