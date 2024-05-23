<?php
// link dao e model
require_once("../../dao/perfilDao.php");

$usuario = new PerfilDao();
$quantidade_por_mes = array(); // Inicialize o array

for ($mes = 1; $mes <= date('m'); $mes++) {
    // Consulta SQL para contar a quantidade de registros para o mês atual
    $resultado = PerfilDao::countMonth($mes);
    // Armazenar a quantidade de registros para o mês atual no array
    $quantidade_por_mes[$mes] = $resultado['quantidade'];
}
