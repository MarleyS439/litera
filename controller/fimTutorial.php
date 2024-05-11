<?php
   session_start();
    $usuarioAutenticado = $_SESSION['authPerfil'];
    // caminhos para os arquivos dao e model
    require_once("../dao/perfilDao.php");
    require_once(__DIR__."../../models/perfil.php");
    // variavel que vai mandar os dados para o model
    $perfil = new Perfil();
    $tutorialStatus = 1;
    // var_dump($usuarioAutenticado['cod'])
    try {
        $perfilDao = PerfilDao::setTutorial($usuarioAutenticado['codPerfil'], $tutorialStatus);
        header("Location: ../views/home.php");
    }
    catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
?>

!