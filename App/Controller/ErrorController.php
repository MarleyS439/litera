<?php

declare(strict_types=1);

namespace Controller;

/**
 * Classe de controle de Erros
 *
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 */
class ErrorController
{
    /**
     * @var int $erroCode - Código de erro
     */
    private int $errorCode;

    /**
     * @var string $errorMessage - Mensagem de erro
     */
    private string $errorMessage;

    /**
     * Método construtor da classe
     *
     * @param int $errorCode - Código de erro
     * @param string $errorMessage - Mensagem de erro
     */
    public function __construct(int $errorCode, string $errorMessage)
    {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
    }

    /**
     * Método para exibir a View de erro com uma resposta HTTP
     *
     * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
     *
     * @return void
     */
    public function index(): void
    {
        http_response_code($this->errorCode);

        $message = $this->errorMessage;
        $code = $this->errorCode;

        require_once __DIR__ . "/../view/error.php";
    }
}
