<?php
// caminhos para os arquivos dao e model
require_once("../dao/perfilDao.php");
require_once("../dao/acessoUsuarioDao.php");
require_once(__DIR__ . "../../models/perfil.php");
require_once("../dao/avatarDao.php");
// variavel que vai mandar os dados para o model
$Perfil = new Perfil();
if (isset($_GET['id']) && isset($_GET['coduser'])) {
    $idPerfil = $_GET['id'];
    $codUser = $_GET['coduser'];
    // var_dump($codUser);
    // busca a todos os dados cadastrados sobre o perfil
    $datePerfil = PerfilDao::selectById($idPerfil);
    // var_dump($datePerfil);
    // inicio da criação da session de Perfil
    if ($datePerfil) {
        // dados que seram passados para a session
        $authPerfil = [
            'codPerfil' => $datePerfil['codPerfil'],
            'nomePerfil' => $datePerfil['nomePerfil'],
            'generoPerfil' => $datePerfil['generoPerfil'],
            'pontuacaoPerfil' => $datePerfil['pontuacaoPerfil'],
            'dinheiroPerfil' => $datePerfil['dinheiroPerfil'],
            'tutorial' => $datePerfil['tutorial'],
            'nivel' => $datePerfil['nivel'],
            'fasesConcluidas' => $datePerfil['fasesConcluidas'],
            'dataNasc' => $datePerfil['dataNasc'],
            'dataCriacao' => $datePerfil['dataCriacao'],
            'codUser' => $codUser,
        ];
        // var_dump($authPerfil);
        session_start();
        $_SESSION['authPerfil'] = $authPerfil;
        // verificação para ver se já existe um avatar pronto
        $avatar = AvatarDao::selectByIdUser($datePerfil['codPerfil']);
        //var_dump($avatar);
        if ($avatar == false) {
            header("Location: ../views/avatar.php?status=base");
        } else {
            AcessoUsuarioDao::insert($authPerfil['codPerfil']);
            header("Location: ../views/home.php");
        }
    }
} else {
    echo ("nenhum valor recuperado");
} 
    // quebra n