<?php
// Conexao com o banco 
require_once (__DIR__ . '../../config/conexao.php');

class PerfilDao{
    public static function insert($perfis){
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbperfil(codUsuario, nomePerfil, generoPerfil, iconPerfil, dinheiroPerfil, tutorial, nivel, fasesConcluidas, dataNasc, dataCriacao, dataModfc) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";        
        $stmt = $conexao->prepare($query);
        $stmt -> bindvalue(1, $perfis->getCodUsuario());
        $stmt -> bindvalue(2, $perfis->getNomePerfil());
        $stmt -> bindvalue(3, $perfis->getGeneroPerfil());
        $stmt -> bindvalue(4, $perfis->getIconPerfil());
        $stmt -> bindvalue(5, $perfis->getDinheiroPerfil());
        $stmt -> bindvalue(6, $perfis->getTutorial());
        $stmt -> bindvalue(7, $perfis->getNivel());
        $stmt -> bindvalue(8, 0);
        $stmt -> bindvalue(9, $perfis->getDataNasc());
        $stmt -> bindvalue(10, $perfis->getDataCriacao());
        $stmt -> bindvalue(11, $perfis->getDataModfc());
        $stmt ->execute();
    }
    public static function selectAll(){
    $conexao = Conexao::conectar();
    $query = "SELECT * FROM tbperfil INNER JOIN tbusuario ON tbusuario.codUsuario = tbperfil.codUsuario";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
    }
    public static function selectById($cod){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbperfil WHERE codPerfil = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    
    public static function selectByIdUser($cod){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbperfil WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt ->bindvalue(1, $cod);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function countById($cod){
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(codPerfil) FROM tbperfil WHERE codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt ->bindvalue(1, $cod);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    // public static function delete($cod){
    //     $conexao = Conexao::conectar();
    //     $query ="DELETE FROM tbperfil WHERE codPerfil = ?";
    //     $stmt = $conexao->prepare($query);
    //     $stmt -> bindValue(1, $cod);
    //     $resultado = $stmt->execute();
    //     return $resultado;
    // }
    // public static function update($cod, $usuario)
    // {
    //     $conexao = Conexao::conectar();
    //     $query = "UPDATE tbperfil SET
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     nomePerfil = ?,
    //     WHERE codPerfil = ?";
    //     $stmt = $conexao->prepare($query);
    //     $stmt->bindValue(1, $perfis->getNomePerfil());
    //     $stmt->bindValue(2, $cod);
    //     return $stmt->execute();
    // }
    // public static function updateName($cod, $perfis)
    // {
    //     $conexao = Conexao::conectar();
    //     $query = "UPDATE tbperfil SET
    //     nomePerfil = ?
    //     WHERE codPerfil = ?";
    //     $stmt = $conexao->prepare($query);
    //     $stmt->bindValue(1, $usuario->getNomePerfil());
    //     $stmt->bindValue(2, $cod);
    //     return $stmt->execute();
    // }
    public static function setGamesPoints($cod, $dinheiro)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbperfil SET
        dinheiroPerfil = dinheiroPerfil + ?, dataModfc = ?, fasesConcluidas = fasesConcluidas + 1
        WHERE codPerfil = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $dinheiro);
        $stmt->bindValue(2, date('Y-m-d'));
        $stmt->bindValue(3, $cod);
        return $stmt->execute();
    }
    public static function setMoney($cod, $dinheiro)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbperfil SET
        dinheiroPerfil = ?
        WHERE codPerfil = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $dinheiro);
        $stmt->bindValue(2, $cod);
        return $stmt->execute();
    }
    public static function setTutorial($cod, $tutorial)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbperfil SET
        tutorial = ?
        WHERE codPerfil = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $tutorial);
        $stmt->bindValue(2, $cod);
        return $stmt->execute();
    }
    public static function countMonth($month)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(*) AS quantidade FROM tbperfil WHERE MONTH(dataCriacao) = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $month);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function selectPontuacaoNivel($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT pontuacaoPerfil, nivel FROM tbperfil WHERE codPerfil = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function setPontuacaoNivel($id, $pontuacaoTotal, $nivel)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbperfil SET
        pontuacaoPerfil = ?,
        nivel = ?
        WHERE codPerfil = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $pontuacaoTotal);
        $stmt->bindValue(2, $nivel);
        $stmt->bindValue(3, $id);
        return $stmt->execute();
    }
    public static function searchUser($dados)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbperfil WHERE nomePerfil LIKE :search";
        $stmt = $conexao->prepare($query);
        $search = "%$dados%";
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


?>