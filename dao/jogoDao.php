<?php

class JogoDao
{
    public static function insert($jogo)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbjogo (nomeJogo, descJogo, pontuacaoJogo, codCategoria, codNivel) VALUES (?,?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $jogo->getNomeJogo());
        $stmt->bindValue(2, $jogo->getDescJogo());
        $stmt->bindValue(3, $jogo->getPontuacaoJogo());
        $stmt->bindValue(4, $jogo->getCodCategoria());
        $stmt->bindValue(5, $jogo->getCodNivel());
        $stmt->execute();
    }
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbjogo";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbjogo WHERE codJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbjogo WHERE codJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    public static function update($cod, $jogo)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbjogo SET
        nomeJogo = ?,
        descJogo = ?,
        pontuacaoJogo = ?,
        codCategoria = ?,
        codNivel = ?
        WHERE codJogo = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $jogo->getNomeJogo());
        $stmt->bindValue(2, $jogo->getDescJogo());
        $stmt->bindValue(3, $jogo->getPontuacaoJogo());
        $stmt->bindValue(4, $jogo->getCodCategoria());
        $stmt->bindValue(5, $jogo->getCodNivel());
        $stmt->bindValue(6, $cod);
        return $stmt->execute();
    }
}
