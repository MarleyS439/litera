<?php
// link dao e model
require_once("../../dao/usuarioDao.php");
require_once(__DIR__ . "../../../models/usuario.php");

$usuario = new Usuario();
$quantidade_por_mes = array(); // Inicialize o array

$quantidade_usuarios = UsuarioDao::countUsers();
$quantidade_compras = UsuarioDao::countBuys();