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
class HomeController
{
    /**
     * Método público para lançar o Erro 404 - Not Found
     *
     * @param void
     * @return void
     */
    public function index(): void
    {
        // Inclui o arquivo index.php
        include "app/View/index.php";
    }
}
