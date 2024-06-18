<?php
// caminho conexao com banco
require_once(__DIR__ . "../../config/conexao.php");

class UsuarioDao
{
    public static function insert($usuario)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbusuario (nomeUsuario, emailUsuario, senhaUsuario, banido) VALUES (?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $usuario->getNomeUsuario());
        $stmt->bindValue(2, $usuario->getEmailUsuario());
        $stmt->bindValue(3, $usuario->getSenhaUsuario());
        $stmt->bindValue(4, $usuario->getBanido());
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
    public static function selectByEmail($email)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario WHERE emailUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $email);
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
    public static function suspend($cod, $usuario)
    {
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
        senhaUsuario = ?
        WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $usuario->getNomeUsuario());
        $stmt->bindValue(2, $usuario->getEmailUsuario());
        $stmt->bindValue(3, $usuario->getSenhaUsuario());
        $stmt->bindValue(4, $cod);
        return $stmt->execute();
    }
    public static function updateName($cod, $usuario)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbusuario SET
        nomeUsuario = ?
        WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $usuario->getNomeUsuario());
        $stmt->bindValue(2, $cod);
        return $stmt->execute();
    }
    public static function updatePassword($usuario)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbusuario SET
        senhaUsuario = ?
        WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $usuario->getSenhaUsuario());
        $stmt->bindValue(2, $usuario->getCodUsuario());
        return $stmt->execute();
    }
    public static function checkCredentials($emailUsuario, $senhaUsuario)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario WHERE (emailUsuario = ? OR nomeUsuario = ?) AND senhaUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $emailUsuario);
        $stmt->bindValue(2, $emailUsuario);
        $stmt->bindValue(3, $senhaUsuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
