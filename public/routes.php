<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace App;

/**
 * Classe responsável pelas rotas no sistema
 *
 * @package App
 * @author @MarleyS439
 */
class Routes
{
    /**
     * Método estático e público para lidar com as requisições de rotas do sistema
     *
     * @param void
     * @return void
     */
    public static function handleRequest(): void
    {
        // Captura a rota
        $route = htmlspecialchars($_GET["route"] ?? "", ENT_QUOTES, "UTF-8");

        // PATH de Views
        $path = "app/View";

        // Faz o roteamento
        switch ($route) {
            case "":
                include $path . "/index.php";
                break;

            default:
                echo "Página não encontrada";
                break;
        }
    }
}
