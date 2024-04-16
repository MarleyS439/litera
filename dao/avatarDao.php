<?php

class AvatarDao
{
    public static function insert($avatar)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbavatar (codAvatar, codRoupa, codCabelo, codGenero, codUsuario) VALUES (?,?,?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $avatar->getCodAvatar());
        $stmt->bindValue(2, $avatar->getCodRoupa());
        $stmt->bindValue(3, $avatar->getCodCabelo());
        $stmt->bindValue(4, $avatar->getCodGenero());
        $stmt->bindValue(5, $avatar->getCodUsuario());
        $stmt->execute();
    }

    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT tbavatar.*, tbroupa.*, tbcabelo.*, tbgenero.*, tbusuario.* 
                  FROM tbavatar 
                  INNER JOIN tbroupa ON tbavatar.codRoupa = tbroupa.codRoupa
                  INNER JOIN tbcabelo ON tbavatar.codCabelo = tbcabelo.codCabelo
                  INNER JOIN tbgenero ON tbavatar.codGenero = tbgenero.codGenero
                  INNER JOIN tbusuario ON tbavatar.codUsuario = tbusuario.codUsuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function selectAllById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT tbavatar.*, tbroupa.*, tbcabelo.*, tbgenero.*, tbusuario.* 
                  FROM tbavatar 
                  INNER JOIN tbroupa ON tbavatar.codRoupa = tbroupa.codRoupa
                  INNER JOIN tbcabelo ON tbavatar.codCabelo = tbcabelo.codCabelo
                  INNER JOIN tbgenero ON tbavatar.codGenero = tbgenero.codGenero
                  INNER JOIN tbusuario ON tbavatar.codUsuario = tbusuario.codUsuario
                  WHERE codAvatar = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbavatar WHERE codAvatar = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbavatar WHERE codAvatar = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }

    public static function update($cod, $avatar)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbavatar SET
                    codRoupa = ?,
                    codCabelo = ?,
                    codGenero = ?,
                    codUsuario = ?
                  WHERE codAvatar = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $avatar->getCodRoupa());
        $stmt->bindValue(2, $avatar->getCodCabelo());
        $stmt->bindValue(3, $avatar->getCodGenero());
        $stmt->bindValue(4, $avatar->getCodUsuario());
        $stmt->bindValue(5, $cod);
        return $stmt->execute();
    }
}

?>
