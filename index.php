<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Habilita mostrar erros
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

// Autoload do composer
require_once __DIR__ . "/vendor/autoload.php";

// Carrega as rotas
require_once __DIR__ . "/public/routes.php";

// Processa a requisição
App\Routes::handleRequest();
?>
