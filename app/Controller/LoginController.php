<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace Controller;

/**
 * Classe responsável por lidar com o login do Usuário
 *
 * @package Controller
 * @author @MarleyS439
 */
class LoginController
{
    /**
     * Método público para direcionar para a página de login
     *
     * @param void
     * @return void
     */
    public function index(): void
    {
        // Inclui o arquivo login.php
        include "app/View/login.php";
    }
}
