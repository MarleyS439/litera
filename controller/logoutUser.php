<?php
require_once "../dao/acessoUsuarioDao.php";
session_start();
$codPerfil = $_SESSION['authPerfil'];

if (isset($_SESSION)) {
    // Obtendo o codAcessoUsuario específico
    $idAcessoUsuario = AcessoUsuarioDao::selectById($codPerfil['codPerfil']);
    
    // Se a consulta retornar um resultado válido
    if ($idAcessoUsuario) {
        // Passando apenas o valor de codAcessoUsuario para a função logout()
        AcessoUsuarioDao::logout($idAcessoUsuario['codAcessoUsuario']);
    }
    unset($_SESSION['authPerfil']);
}

header('Location: ./../views/profile.php');
exit();
?>
