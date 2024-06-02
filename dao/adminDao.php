<?php
// link para conexao com banco
require_once(__DIR__."../../config/conexao.php");

class AdminDao
{
    public static function insert($admin)
    {
        $conexao = Conexao::conectar();
        $query = "INSERT INTO tbadmin (nomeAdmin, emailAdmin, senhaAdmin) VALUES (?,?,?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $admin->getNomeAdmin());
        $stmt->bindValue(2, $admin->getEmailAdmin());
        $stmt->bindValue(3, $admin->getSenhaAdmin());
        $stmt->execute();
    }

    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbadmin";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function selectById($cod)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbadmin WHERE codAdmin = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($cod)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbadmin WHERE codAdmin = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $cod);
        $resultado = $stmt->execute();
        return $resultado;
    }

    public static function update($cod, $admin)
    {
        $conexao = Conexao::conectar();
        $query = "UPDATE tbadmin SET
            nomeAdmin = ?,
            emailAdmin = ?,
            senhaAdmin = ?
            WHERE codAdmin = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $admin->getNomeAdmin());
        $stmt->bindValue(2, $admin->getEmailAdmin());
        $stmt->bindValue(3, $admin->getSenhaAdmin());
        $stmt->bindValue(4, $cod);
        return $stmt->execute();
    }

    public static function checkCredentials($emailAdmin, $senhaAdmin)
    {
        $conexao =  Conexao::conectar();
        $query = "SELECT * FROM tbadmin WHERE emailAdmin = ? AND senhaAdmin = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $emailAdmin);
        $stmt->bindValue(2, $senhaAdmin);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function selectAllLitera()
    {
        $conexao = Conexao::conectar();
    
        // Query to get count of administrators
        $queryAdmins = "SELECT COUNT(codAdmin) AS adminCount FROM tbadmin";
        $stmtAdmins = $conexao->prepare($queryAdmins);
        $stmtAdmins->execute();
        $adminsCount = $stmtAdmins->fetch(PDO::FETCH_ASSOC)['adminCount'];
    
        // Query to get count of all users
        $queryUsers = "SELECT COUNT(codUsuario) AS userCount FROM tbusuario";
        $stmtUsers = $conexao->prepare($queryUsers);
        $stmtUsers->execute();
        $usersCount = $stmtUsers->fetch(PDO::FETCH_ASSOC)['userCount'];
    
        // Query to get count of active users
        $queryActiveUsers = "SELECT COUNT(codUsuario) AS activeUserCount FROM tbusuario WHERE banido = 0";
        $stmtActiveUsers = $conexao->prepare($queryActiveUsers);
        $stmtActiveUsers->execute();
        $activeUsersCount = $stmtActiveUsers->fetch(PDO::FETCH_ASSOC)['activeUserCount'];
    
        // Query to get count of banned users
        $queryBannedUsers = "SELECT COUNT(codUsuario) AS bannedUserCount FROM tbusuario WHERE banido = 1";
        $stmtBannedUsers = $conexao->prepare($queryBannedUsers);
        $stmtBannedUsers->execute();
        $bannedUsersCount = $stmtBannedUsers->fetch(PDO::FETCH_ASSOC)['bannedUserCount'];
    
        $queryCountBuys = "SELECT COUNT(*) AS countBuys FROM tbcompraitem WHERE dataCompra = ?";
        $stmtCountBuys = $conexao->prepare($queryCountBuys);
        $stmtCountBuys->bindValue(1, date('Y-m-d'));
        $stmtCountBuys->execute();
        $countBuys = $stmtCountBuys->fetch(PDO::FETCH_ASSOC)['countBuys'];

        // Return counts in an associative array
        return [
            'adminCount' => $adminsCount,
            'userCount' => $usersCount,
            'activeUserCount' => $activeUsersCount,
            'bannedUserCount' => $bannedUsersCount,
            'countBuys' => $countBuys
        ];
    }

}
