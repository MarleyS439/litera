<?php
// caminho conexao com banco
// require_once()

class ConquistaDao
{
    public static function insert($conquista)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbconquista (codConquista, nomeConquista, descConquista, imgConquista, tokenConquista) VALUES (?,?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $conquista->getCodConquista());
        $stmt->bindValue(2, $conquista->getNomeConquista());
        $stmt->bindValue(3, $conquista->getDescConquista());
        $stmt->bindValue(4, $conquista->getImgConquista());
        $stmt->bindValue(5, $conquista->getTokenConquista());
        $stmt->execute();
    }
    
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbconquista";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbconquista WHERE codConquista = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbconquista WHERE codConquista = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    
    public static function update($cod, $conquista)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbconquista SET
            codConquista = ?, 
            nomeConquista = ?, 
            descConquista = ?, 
            imgConquista = ?,
            tokenConquista = ?
            WHERE codConquista = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $conquista->getCodConquista());
        $stmt->bindValue(2, $conquista->getNomeConquista());
        $stmt->bindValue(3, $conquista->getDescConquista());
        $stmt->bindValue(4, $conquista->getImgConquista());
        $stmt->bindValue(5, $conquista->getTokenConquista());
        $stmt->bindValue(6, $cod);
        return $stmt->execute();
    }
}
?>
