<?php
// link

class DadosJogoUsuarioDao
{
    public static function insert($codJogo, $codUsuario, $maxPontuacao, $qntdAcertos, $qntdErros)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbdadosjogousuario (codJogo, codUsuario, maxPontuacao, qtndAcertos, qtndErros) VALUES (?,?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $codJogo);
        $stmt->bindValue(2, $codUsuario);
        $stmt->bindValue(3, $maxPontuacao);
        $stmt->bindValue(4, $qntdAcertos);
        $stmt->bindValue(5, $qntdErros);
        $stmt->execute();
    }

    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosjogousuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbdadosjogousuario WHERE codTipoItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
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
    public static function update($cod, $tipoItem)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbdadosjogousuario SET 
            tipoItem = ? WHERE codTipoItem = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $tipoItem->getTipoItem());
        $stmt->bindValue(2, $cod);
        return $stmt->execute();
    }
}
