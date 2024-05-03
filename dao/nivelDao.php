<?php

class NivelDao
{
    public static function insert($nivel)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbnivel(dificuldadeNivel, nivel) VALUES (?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $nivel->getDificudadeNivel());
        $stmt->bindValue(2, $nivel->getDificuldadeNivel());
        $stmt->execute();
    }
    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbnivel";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbnivel WHERE codNivel = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbnivel WHERE codNivel = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }
    public static function update($cod, $nivel)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbnivel SET 
            dificuldadeNivel = ?,
            nivel = ?
            WHERE codNivel = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $nivel->getDificuldadeNivel());
        $stmt->bindValue(2, $nivel->getNivel());
        $stmt->bindValue(3, $cod);
        return $stmt->execute();
    }
}
