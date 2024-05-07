<?php
// link

class DadosJogoUsuarioDao
{
    public static function insert($codUsuario)
    {
        $conexao = Conexao::conectar();
        $query1 = "INSERT INTO tbdadosusuarios (codJogo, codDependente, maxPontuacao, qtndAcertos, qtndErros) VALUES (1,?,0,0,0), (2,?,0,0,0)";
        $stmt1 = $conexao->prepare($query1);
        $stmt1->bindValue(1, $codUsuario);
        $stmt1->bindValue(2, $codUsuario);
        $stmt1->execute();
    }


    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosusuarios";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($codUser, $codJogo)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosusuarios WHERE codUsuario = ? AND codJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $codUser);
        $stmt->bindValue(2, $codJogo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbdadosusuarios WHERE codTipoItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    public static function update($maxPontuacao, $qntdAcertos, $qntdErros, $cod)
    {
        try {
            $conexao = Conexao::conectar();
            $query = "UPDATE tbdadosusuarios SET maxPontuacao = ?, qtndAcertos = qtndAcertos + ?, qtndErros = qtndErros + ? WHERE coddadosusuario = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $maxPontuacao);
            $stmt->bindValue(2, $qntdAcertos);
            $stmt->bindValue(3, $qntdErros);
            $stmt->bindValue(4, $cod);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Exibe uma mensagem de erro em caso de falha na execução da consulta
            echo "Erro ao executar a consulta: " . $e->getMessage();
            return false; // Retorna false para indicar que houve erro na execução da consulta
        }
    }

    public static function searchUser($idUser, $idJogo)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosusuarios WHERE codUsuario = ? AND codJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $idUser);
        $stmt->bindValue(2, $idJogo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
