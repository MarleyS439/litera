<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace App\controller;

/**
 * Classe responsável por realizar o controller de Registro do Usuário
 */
class RegisterController
{
    public function index(): void
    {
        include "app/view/Auth/register.php";
    }
}
