<?php
require_once("../dao/acessoUsuarioDao.php");

$hash = uniqid(rand(), true);
$numHash = base_convert(substr($hash, 0, 8), 16, 10);

$authPerfil = [
    'codPerfil' => $numHash,
    'codUser' => null,
    'nomePerfil' => 'Convidado',
    'pontuacaoPerfil' => null,
    'dinheiroPerfil' => null,
    'tutorial' => false,
    'nivel' => null,
    'isGuesty' => true,
];

session_start();
$_SESSION['authPerfil'] = $authPerfil;

AcessoUsuarioDao::insert($authPerfil['codPerfil']);
header("Location: ../views/home.php");