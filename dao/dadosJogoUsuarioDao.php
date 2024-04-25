<?php
// link

class DadosJogoUsuarioDao
{
    public static function insert($codJogo, $codUsuario, $maxPontuacao, $qntdAcertos, $qntdErros)
    {
        $conexao = Conexao::conectar();
        $query1 = "INSERT INTO tbdadosjogousuario (codJogo, codUsuario, maxPontuacao, qtndAcertos, qtndErros) VALUES (?,?,?,?,?)";
        $stmt1 = $conexao->prepare($query1);
        $stmt1->bindValue(1, $codJogo);
        $stmt1->bindValue(2, $codUsuario);
        $stmt1->bindValue(3, $maxPontuacao);
        $stmt1->bindValue(4, $qntdAcertos);
        $stmt1->bindValue(5, $qntdErros);
        $stmt1->execute();

        $query2 = "UPDATE tbusuario SET fasesConcluidas = fasesConcluidas + 1 WHERE codUsuario = ?";
        $stmt2 = $conexao->prepare($query2);
        $stmt2->bindValue(1, $codUsuario);
        $stmt2->execute();
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
    public static function update($codJogo, $codUsuario, $maxPontuacao, $qntdAcertos, $qntdErros)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbdadosjogousuario 
              SET maxPontuacao = CASE WHEN ? > maxPontuacao THEN ? ELSE maxPontuacao END, 
                  qtndAcertos = qtndAcertos + ?, 
                  qtndErros = qtndErros + ? 
              WHERE codJogo = ? AND codUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $maxPontuacao);
        $stmt->bindValue(2, $maxPontuacao);
        $stmt->bindValue(3, $qntdAcertos);
        $stmt->bindValue(4, $qntdErros);
        $stmt->bindValue(5, $codJogo);
        $stmt->bindValue(6, $codUsuario);
        $stmt->execute();

        $query2 = "UPDATE tbusuario SET fasesConcluidas = fasesConcluidas + 1 WHERE codUsuario = ?";
        $stmt2 = $conexao->prepare($query2);
        $stmt2->bindValue(1, $codUsuario);
        $stmt2->execute();
    }
    public static function searchUser($dados)
{
    $conexao = Conexao::conectar();
    $query = "SELECT * FROM tbdadosjogousuario WHERE codUsuario LIKE :search";
    $stmt = $conexao->prepare($query);
    $search = "%$dados%";
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
