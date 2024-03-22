<?php
// caminho conexao com banco
require_once(__DIR__."../../config/conexao.php");

class UsuarioDao
{
    public static function insert($usuario)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbusuario (nomeUsuario, emailUsuario, senhaUsuario, pontuacaoUsuario, dinheiroUsuario, tutorial) VALUES (?,?,?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $usuario->getNomeUsuario());
        $stmt->bindValue(2, $usuario->getEmailUsuario());
        $stmt->bindValue(3, $usuario->getSenhaUsuario());
        $stmt->bindValue(4, $usuario->getPontuacaoUsuario());
        $stmt->bindValue(5, $usuario->getDinheiroUsuario());
        $stmt->bindValue(6, $usuario->getTutorial());
        $stmt->execute();
    }
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbusuario WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    public static function suspend($cod, $usuario){
        $conexao = Conexao::conectar();
        $query = "UPDATE tbusuario SET
        banido = ? WHERE codusuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $usuario->getbanido());
        $stmt->bindValue(2, $cod);
        return $stmt->execute();
    }
    public static function update($cod, $usuario)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbusuario SET
            nomeUsuario = ?,
            emailUsuario = ?,
            senhaUsuario = ?,
            pontuacaoUsuario = ?,
            dinheiroUsuario = ?,
            tutorial = ?
            WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $usuario->getNomeUsuario());
        $stmt->bindValue(2, $usuario->getEmailUsuario());
        $stmt->bindValue(3, $usuario->getSenhaUsuario());
        $stmt->bindValue(4, $usuario->getPontuacaoUsuario());
        $stmt->bindValue(5, $usuario->getDinheiroUsuario());
        $stmt->bindValue(6, $usuario->getTutorial());
        $stmt->bindValue(7, $cod);
        return $stmt->execute();
    }
    public static function checkCredentials($emailUsuario, $senhaUsuario)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario WHERE emailUsuario = ? AND senhaUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $emailUsuario);
        $stmt->bindValue(2, $senhaUsuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
