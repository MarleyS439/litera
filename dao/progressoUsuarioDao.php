<?php

class ProgressoUsuarioDao
{
    public static function insert($progressoUsuario)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbprogressousuario (codUsuario, codJogo, nivelAtual) VALUES (?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $progressoUsuario->getCodUsuario());
        $stmt->bindValue(2, $progressoUsuario->getCodJogo());
        $stmt->bindValue(3, $progressoUsuario->getNivelAtual());
        $stmt->execute();
    }
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbprogressousuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbprogressousuario WHERE codProgressoUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbprogressousuario WHERE codProgressoUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    public static function update($cod, $progressoUsuario)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbprogressousuario SET
            codUsuario = ?,
            codJogo = ?,
            nivelAtual = ?
            WHERE codProgressoUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $progressoUsuario->getCodUsuario());
        $stmt->bindValue(2, $progressoUsuario->getCodJogo());
        $stmt->bindValue(3, $progressoUsuario->getNivelAtual());
        $stmt->bindValue(4, $cod);
        return $stmt->execute();
    }
}
