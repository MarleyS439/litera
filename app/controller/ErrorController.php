<?php

declare(strict_types=1);

namespace Controller;

/**
 * Classe responsável lidar com erros
 *
 * @package Controller
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 * @version 1.0.0
 * @since 03/07/2025
 */
class ErrorController
{
    /**
     * Método público e estático para lançar uma resposta HTTP 404
     *
     * @return void
     */
    public function index(): void
    {
        // Lança a resposta HTTP 404
        http_response_code(404);
    }
}
