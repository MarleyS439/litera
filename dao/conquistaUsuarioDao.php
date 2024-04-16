<?php

class ConquistaUsuarioDao
{
    public static function insert($conquistaUser)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbconquistausuario (codConquistaUsuario, codUsuario, codConquista) VALUES (?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $conquistaUser->getCodConquistaUser());
        $stmt->bindValue(2, $conquistaUser->getCodUsuario());
        $stmt->bindValue(3, $conquistaUser->getCodConquista());
        $stmt->execute();
    }
    
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbconquistausuario 
        INNER JOIN tbusuario ON tbconquistausuario.codUsuario = tbusuario.codUsuario
        INNER JOIN tbconquista ON tbconquistausuario.codConquista = tbconquista.codConquista";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public static function selectAllById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbconquistausuario 
        INNER JOIN tbusuario ON tbconquistausuario.codUsuario = tbusuario.codUsuario
        INNER JOIN tbconquista ON tbconquistausuario.codConquista = tbconquista.codConquista
        WHERE codConquistaUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbconquistausuario WHERE codConquistaUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbconquistausuario WHERE codConquistaUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    
    public static function update($cod, $conquistaUser)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbconquistausuario SET
            codUsuario = ?,
            codConquista = ?
            WHERE codConquistaUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $conquistaUser->getCodUsuario());
        $stmt->bindValue(2, $conquistaUser->getCodConquista());
        $stmt->bindValue(3, $cod);
        return $stmt->execute();
    }
}
