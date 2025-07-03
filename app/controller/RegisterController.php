<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace Controller;

/**
 * Classe responsável por realizar o controller de Registro do Usuário
 */
class RegisterController
{
    public function index(): void
    {
        include "app/View/Auth/register.php";
    }
}
