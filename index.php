<?php

declare(strict_types=1);

use App\Router;
use Dotenv\Dotenv;

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$route = new Router();

$route->route();
