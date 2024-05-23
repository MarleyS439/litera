<?php
// caminho conexao com banco
// require_once()

class ItemDao
{
    public static function insert($item)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbitem (codTipoItem, nomeItem, valor, ImageItem) VALUES (?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $item->getCodTipoItem());
        $stmt->bindValue(2, $item->getNomeItem());
        $stmt->bindValue(3, $item->getValor());
        $stmt->bindValue(4, $item->getImagemItem());
        $stmt->execute();
    }
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbitem
            INNER JOIN tbtipoitem ON tbitem.codTipoItem = tbtipoitem.codTipoItem";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectAllById($cod)
    {
        // selectAllById = todas informaçoes de um item em especifico com o inner join
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbitem 
            INNER JOIN tbtipoitem ON tbitem.codTipoItem = tbtipoitem.codTipoItem
            WHERE codItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbitem WHERE codItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbitem WHERE codItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    public static function update($cod, $item)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbitem SET
            codTipoItem = ?, 
            nomeItem = ?, 
            valor = ?, 
            ImageItem = ?
            WHERE codItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $item->getCodTipoItem());
        $stmt->bindValue(2, $item->getNomeItem());
        $stmt->bindValue(3, $item->getValor());
        $stmt->bindValue(4, $item->getImagemItem());
        $stmt->bindValue(5, $cod);
        return $stmt->execute();
    }
}
