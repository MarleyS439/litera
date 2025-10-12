<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace App\Controller;

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
     * @return void
     */
    public function index(): void
    {
        // Inclui o arquivo login.php
        include "app/view/Auth/login.php";
    }

    /**
     * Método público para realizar o login do Usuário
     *
     * @return bool
     */
    public function login(): bool {}
}
