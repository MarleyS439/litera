<?php
// link dao e model
require_once("../../dao/acessoUsuarioDao.php");

$usuario = new AcessoUsuarioDao();
$quantidade_por_semana = array(); // Inicialize o array

// Consulta SQL para contar a quantidade de registros para a semana atual
$resultado = json_encode(AcessoUsuarioDao::selectAllByWeekday());