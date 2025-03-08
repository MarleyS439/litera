<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace Controller;

/**
 * Classe responsável por realizar o controle do Administrador
 *
 * @package Controller
 * @author @MarleyS439
 */
class AdminController
{
    /**
     * Método index da classe Admin
     *
     * @param void
     * @return void
     */
    public function index(): void
    {
        // Inclui o arquivo de login
        include "app/View/Admin/login.php";
    }
}
