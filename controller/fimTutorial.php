<?php
   session_start();
    $usuarioAutenticado = $_SESSION['authUser'];
    // caminhos para os arquivos dao e model
    require_once("../dao/usuarioDao.php");
    require_once(__DIR__."../../models/usuario.php");
    // variavel que vai mandar os dados para o model
    $usuario = new Usuario();
    $tutorialStatus = 1;
    // var_dump($usuarioAutenticado['cod'])
    try {
        $usuarioDao = UsuarioDao::setTutorial($usuarioAutenticado['cod'], $tutorialStatus);
        header("Location: ../views/home.php");
    }
    catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
?>