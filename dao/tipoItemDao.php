<?php
// link

class TipoItemDao
{
    public static function insert($tipoItem)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbtipoitem (tipoItem) VALUES (?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $tipoItem->getTipoItem());
        $stmt->execute();
    }
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbtipoitem";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbtipoitem WHERE codTipoItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbtipoitem WHERE codTipoItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    public static function update($cod, $tipoItem)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbtipoitem SET 
            tipoItem = ? WHERE codTipoItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $tipoItem->getTipoItem());
        $stmt->bindValue(2, $cod);
        return $stmt->execute();
    }
}
