<?php

declare(strict_types=1);

namespace App\Model;

use InvalidArgumentException;

/**
 * Classe responsável pelo modelo de E-mail
 *
 * @package Model
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 */
class Email
{
    /**
     * @var string $email E-mail
     */
    private string $email;

    /**
     * Método construtor de E-mail
     *
     * @param string $email E-mail
     */
    public function __construct(string $email)
    {
        $this->setEmail($email);
    }

    /**
     * Método para definir o E-mail
     *
     * @param string $email E-mail
     * @return void
     */
    private function setEmail(string $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("O e-mail não é válido!");
        }

        $this->email = $email;
    }

    /**
     * Método para Obter o E-mail
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
