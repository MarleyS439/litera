<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace Controller;

/**
 * Classe responsável por lidar com os erros da aplicação
 *
 * @package Controller
 * @author @MarleyS439
 */
class ErrorController
{
    /**
     * Método público e estático para lançar uma resposta HTTP 404
     *
     * @param void
     * @return void
     */
    public function index(): void
    {
        // Lança a resposta HTTP 404
        http_response_code(404);
    }
}
