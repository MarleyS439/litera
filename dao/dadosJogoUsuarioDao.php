<?php
// link

class DadosJogoUsuarioDao
{
    public static function insert($codUsuario)
    {
        $conexao = Conexao::conectar();
        $query1 = "INSERT INTO tbdadosjogousuario (codJogo, codUsuario, maxPontuacao, qtndAcertos, qtndErros) VALUES (1,?,0,0,0), (2,?,0,0,0)";
        $stmt1 = $conexao->prepare($query1);
        $stmt1->bindValue(1, $codUsuario);
        $stmt1->bindValue(2, $codUsuario);
        $stmt1->execute();
    }


    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosjogousuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($codUser, $codJogo)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosjogousuario WHERE codUsuario = ? AND codJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $codUser);
        $stmt->bindValue(2, $codJogo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbdadosjogousuario WHERE codTipoItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    public static function update($codJogo, $codUsuario, $maxPontuacao, $qntdAcertos, $qntdErros)
    {
        try {
            $conexao = Conexao::conectar();
            $query = "UPDATE tbdadosjogousuario SET maxPontuacao = ?, qtndAcertos = qtndAcertos + ?, qtndErros = qtndErros + ? WHERE codJogo = ? AND codUsuario = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $maxPontuacao);
            $stmt->bindValue(2, $qntdAcertos);
            $stmt->bindValue(3, $qntdErros);
            $stmt->bindValue(4, $codJogo);
            $stmt->bindValue(5, $codUsuario);
            $resultado = $stmt->execute();
            return $resultado;
        } catch (PDOException $e) {
            // Exibe uma mensagem de erro em caso de falha na execução da consulta
            echo "Erro ao executar a consulta: " . $e->getMessage();
            return false; // Retorna false para indicar que houve erro na execução da consulta
        }
    }
    public static function searchUser($idUser, $idJogo)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosjogousuario WHERE codUsuario = ? AND codJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $idUser);
        $stmt->bindValue(2, $idJogo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
