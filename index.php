<?php

declare(strict_types=1);

use App\Router;

// Habilita mostrar erros
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . "/vendor/autoload.php";

$route = new Router();

$route->route();
