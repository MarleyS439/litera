<?php

class CompraItemDao
{
    public static function insert($compraItem)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbcompraitem (codItem, codUsuario, dataCompra) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $compraItem->getCodItem());
        $stmt->bindValue(2, $compraItem->getCodUsuario());
        $stmt->bindValue(3, $compraItem->getDataCompra());
        $stmt->execute();
    }
    
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcompraitem
            INNER JOIN tbitem ON tbcompraitem.codItem = tbitem.codItem
            INNER JOIN tbusuario ON tbcompraitem.codUsuario = tbusuario.codUsuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function selectAllById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcompraitem
            INNER JOIN tbitem ON tbcompraitem.codItem = tbitem.codItem
            INNER JOIN tbusuario ON tbcompraitem.codUsuario = tbusuario.codUsuario 
            WHERE codCompraItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcompraitem WHERE codCompraItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function contByIdUser($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(*) FROM tbcompraitem WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbcompraitem WHERE codCompraItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    
    public static function update($cod, $compraItem)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbcompraitem SET
            codItem = ?,
            codUsuario = ?,
            dataCompra = ?
            WHERE codCompraItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $compraItem->getCodItem());
        $stmt->bindValue(2, $compraItem->getCodUsuario());
        $stmt->bindValue(3, $compraItem->getDataCompra());
        $stmt->bindValue(4, $cod);
        return $stmt->execute();
    }
}

?>
