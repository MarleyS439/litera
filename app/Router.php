<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace App;

// Importa a classe ErrorController do namespace correto
use Controller\ErrorController;

/**
 * Classe responsável por fazer o roteamento de páginas
 *
 * @package App
 * @author @MarleyS439
 */
class Router
{
    /**
     * @var array $routes - Rotas de acesso
     */
    private array $routes = [
        "/" => ["HomeController", "index"],
        "/login" => ["LoginController", "index"],
        "/register" => ["RegisterController", "index"],
        "/oldIndex" => ["OldIndexController", "index"],
    ];

    /**
     * Método para acessar os Controllers com URL, Ação e ID
     *
     * @return void
     */
    public function route(): void
    {
        // Obtém parâmetros da URL
        $url = $_GET["url"] ?? "/";
        $action = $_GET["action"] ?? null;
        $id = $_GET["id"] ?? null;

        if (array_key_exists($url, $this->routes)) {
            $controllerName = "\\Controller\\" . $this->routes[$url][0];
            $method = $this->routes[$url][1];

            // Verifica se a classe existe
            if (!class_exists($controllerName)) {
                $this->handleError();
                return;
            }

            $controller = new $controllerName();

            // Verifica se o método existe antes de chamá-lo
            if ($action && method_exists($controller, $action)) {
                $controller->$action($id);
            } elseif (method_exists($controller, $method)) {
                $controller->$method($id);
            } else {
                $this->handleError();
            }
        } else {
            $this->handleError();
        }
    }

    /**
     * Método para tratar erros de rota
     *
     * @return void
     */
    private function handleError(): void
    {
        $controller = new ErrorController();
        $controller->index();
    }
}
