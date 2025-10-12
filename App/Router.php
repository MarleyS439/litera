<?php

declare(strict_types=1);

namespace App;

use App\Controller\ErrorController;
use RuntimeException;

/**
 * Classe responsável pelo roteamento das requisições HTTP.
 *
 * Esta classe gerencia o roteamento de requisições HTTP para os controladores
 * e ações apropriados com base na URL e método HTTP. Também inclui tratamento
 * de erros para rotas inválidas ou não encontradas.
 *
 * @package App
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 * @version 1.0.0
 * @since 31/05/2025
 */
class Router
{
    /**
     * Tabela de rotas da aplicação.
     * O formato é: ["METHOD /path" => [Controlador, método]]
     *
     * @var array<string, array{0: string, 1: string}>
     */
    private array $routes = [
        "GET /" => ["HomeController", "index"],
        // "GET /" => ["OldIndexController", "index"],
        "GET /home" => ["HomeController", "index"],
        "GET /login" => ["LoginController", "index"],
        "GET /register" => ["RegisterController", "index"],
    ];

    /**
     * Executa o roteamento com base na URL e método HTTP atual.
     *
     * Este método analisa a requisição atual, valida o método HTTP e a URL,
     * encontra o controlador e ação correspondentes na tabela de rotas e os executa.
     * Caso ocorra algum erro durante esse processo, o tratamento de erro apropriado é invocado.
     *
     * @throws RuntimeException Quando o método HTTP não é suportado, a URL é inválida, o controlador ou método não existem
     * @return void
     */
    public function route(): void
    {
        try {
            $method = $_SERVER["REQUEST_METHOD"] ?? "GET";

            if (
                !in_array(
                    $method,
                    ["GET", "POST", "PUT", "DELETE", "PATCH"],
                    true,
                )
            ) {
                throw new RuntimeException("Método HTTP não suportado", 405);
            }

            $rawUrl = $_GET["url"] ?? "/";
            $sanitizedUrl = filter_var($rawUrl, FILTER_SANITIZE_URL);
            $url = trim($sanitizedUrl, "/");
            $url = $url === "" ? "/" : "/$url";

            if ($url !== strip_tags($url)) {
                throw new RuntimeException(
                    "URL inválida ou com possíveis scripts",
                    400,
                );
            }

            $routeKey = "$method $url";

            if (!array_key_exists($routeKey, $this->routes)) {
                throw new RuntimeException("Rota não encontrada", 404);
            }

            [$controllerName, $actionName] = $this->routes[$routeKey];

            if (!preg_match('/^[a-zA-Z0-9_]+$/', $controllerName)) {
                throw new RuntimeException("Nome de controlador inválido", 400);
            }

            if (!preg_match('/^[a-zA-Z0-9_]+$/', $actionName)) {
                throw new RuntimeException("Nome de método inválido", 400);
            }

            $controllerClass = "App\\controller\\{$controllerName}";

            if (!class_exists($controllerClass)) {
                throw new RuntimeException("Controlador não encontrado", 404);
            }

            $controller = new $controllerClass();

            if (
                !method_exists($controller, $actionName) ||
                !is_callable([$controller, $actionName])
            ) {
                throw new RuntimeException(
                    "Método não encontrado no controlador",
                    404,
                );
            }

            call_user_func([$controller, $actionName]);
        } catch (RuntimeException $e) {
            $this->handleError(
                $e->getCode() >= 400 ? $e->getCode() : 500,
                htmlspecialchars($e->getMessage(), ENT_QUOTES, "UTF-8"),
            );
        }
    }

    /**
     * Manipula e exibe erros HTTP de forma controlada.
     *
     * Este método configura o código de status HTTP adequado e delega
     * a renderização da página de erro para o ErrorController.
     *
     * @param int $errorCode Código HTTP do erro.
     * @param string $errorMessage Mensagem descritiva do erro.
     * @return void
     */
    public function handleError(int $errorCode, string $errorMessage): void
    {
        http_response_code($errorCode);
        // $controller = new ErrorController($errorCode, $errorMessage);
        // $controller->index();
    }
}
