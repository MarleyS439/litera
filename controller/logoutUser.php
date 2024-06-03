<?php
require_once "../dao/acessoUsuarioDao.php";
session_start();
$codUser = $_SESSION['authPerfil'];

if (isset($_SESSION['authUser'])) {
    // Obtendo o codAcessoUsuario específico
    $idAcessoUsuario = AcessoUsuarioDao::selectById($codUser['codPerfil']);
    
    // Se a consulta retornar um resultado válido
    if ($idAcessoUsuario) {
        // Passando apenas o valor de codAcessoUsuario para a função logout()
        AcessoUsuarioDao::logout($idAcessoUsuario['codAcessoUsuario']);
    }
    
    unset($_SESSION['authUser']);
}

header('Location: ./../index.php');
exit();
?>
