<?php
    require_once ("../dao/conquistaDao.php");
    require_once("../dao/perfilDao.php");
    require_once(__DIR__ . "../../models/conquista.php");
    require_once(__DIR__ . "../../models/perfil.php");    
    $Perfil = new Perfil();
    $Conquista = new Conquista();

    switch($_POST["tipoConquista"]){
        case 'tipoFase':
        $Conquista -> setNomeConquista($_PO);
        $Conquista -> setDescConquista();
        $Conquista -> setImgConquista();
        $Conquista -> setTokenConquista();
    }
?>