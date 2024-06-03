<?php

require_once(__DIR__ . '../../config/conexao.php');

class AcessoUsuarioDao
{
    public static function insert($codPerfil)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbacessousuario (codPerfil, dataAcesso, isLogged) VALUES (?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $codPerfil);
        $stmt->bindValue(2, date('Y-m-d'));
        $stmt->bindValue(3, 1);
        $stmt->execute();
    }
    public static function logout($codAcessoUsuario)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbacessousuario set isLogged = 0 WHERE codAcessoUsuario = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $codAcessoUsuario);
        $stmt->execute();
    }
    public static function selectAllByWeekday()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT dias_semana.diaDaSemana, COUNT(tbacessousuario.dataAcesso) AS totalAcessos
        FROM (
            SELECT 'Sunday' AS diaDaSemana
            UNION SELECT 'Monday'
            UNION SELECT 'Tuesday'
            UNION SELECT 'Wednesday'
            UNION SELECT 'Thursday'
            UNION SELECT 'Friday'
            UNION SELECT 'Saturday'
        ) AS dias_semana
        LEFT JOIN tbacessousuario ON DAYNAME(tbacessousuario.dataAcesso) = dias_semana.diaDaSemana
            AND YEARWEEK(tbacessousuario.dataAcesso) = YEARWEEK(CURRENT_DATE())
            AND DAYOFWEEK(tbacessousuario.dataAcesso) <= DAYOFWEEK(CURRENT_DATE())
        GROUP BY dias_semana.diaDaSemana
        ORDER BY FIELD(dias_semana.diaDaSemana, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        ";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectById($codPerfil)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT codAcessoUsuario FROM tbacessousuario WHERE codPerfil = ? AND dataAcesso = (SELECT MAX(dataAcesso) FROM tbacessousuario WHERE codPerfil = ?) ORDER BY codAcessoUsuario DESC;";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $codPerfil);
        $stmt->bindValue(2, $codPerfil);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function countLoggedAcoounts()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(*) FROM tbacessousuario WHERE dataAcesso = ? AND isLogged = 1";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, date('Y-m-d'));
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
