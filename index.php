<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Importa a classe Router do namespace App
use App\Router;

// Habilita mostrar erros
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

// Autoload do composer
require_once __DIR__ . "/vendor/autoload.php";

// Instância a cllasse Router
$route = new Router();

// Chama o método route() da instância da classe Router
$route->route();
?>
