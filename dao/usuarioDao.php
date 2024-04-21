<?php
// caminho conexao com banco
require_once(__DIR__ . "../../config/conexao.php");

class UsuarioDao
{
    public static function insert($usuario)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbusuario (nomeUsuario, emailUsuario, senhaUsuario, pontuacaoUsuario, dinheiroUsuario, tutorial, nivel, dataCriacao, dataModfc) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $usuario->getNomeUsuario());
        $stmt->bindValue(2, $usuario->getEmailUsuario());
        $stmt->bindValue(3, $usuario->getSenhaUsuario());
        $stmt->bindValue(4, $usuario->getPontuacaoUsuario());
        $stmt->bindValue(5, $usuario->getDinheiroUsuario());
        $stmt->bindValue(6, $usuario->getTutorial());
        $stmt->bindValue(7, $usuario->getNivel());
        $stmt->bindValue(8, $usuario->getDataCriacao());
        $stmt->bindValue(9, $usuario->getDataModfc());
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
    public static function setMoney($cod, $dinheiro)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbusuario SET
        dinheiroUsuario = ?
        WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $dinheiro);
        $stmt->bindValue(2, $cod);
        return $stmt->execute();
    }
    public static function setTutorial($cod, $tutorial)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbusuario SET
        tutorial = ?
        WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $tutorial);
        $stmt->bindValue(2, $cod);
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
    public static function setGamesPoints($cod, $dinheiro)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbusuario SET
        dinheiroUsuario = dinheiroUsuario + ?, dataModfc = ?
        WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $dinheiro);
        $stmt->bindValue(2, date('Y-m-d'));
        $stmt->bindValue(3, $cod);
        return $stmt->execute();
    }
    public static function countMonth($month)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(*) AS quantidade FROM tbusuario WHERE MONTH(dataCriacao) = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $month);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function countUsers()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(*) AS total_usuarios FROM tbusuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retorna apenas o valor da contagem
        return $result['total_usuarios'];
    }
    public static function countBuys()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(*) AS quantidade FROM tbcompraitem WHERE MONTH(dataCompra) = ? AND DAY(dataCompra) = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, date('n'));
        $stmt->bindValue(2, date('d'));
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retorna apenas o valor da contagem
        return $result['quantidade'];
    }
    public static function selectPontuacaoNivel($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT pontuacaoUsuario, nivel FROM tbusuario WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function setPontuacaoNivel($id, $pontuacaoTotal, $nivel)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbusuario SET
        pontuacaoUsuario = ?,
        nivel = ?
        WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $pontuacaoTotal);
        $stmt->bindValue(2, $nivel);
        $stmt->bindValue(3, $id);
        return $stmt->execute();   
    }
}
