<?php

declare(strict_types=1);

namespace App\Model;

use InvalidArgumentException;

/**
 * Classe responsável por definir o modelo de senha
 *
 * @package Model
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 * @version 1.0.0
 * @since 12/10/2025
 */
class Password
{
    /**
     * @var string $passwordHash Hash da senha
     */
    private string $passwordHash;

    /**
     * Método construtor
     */
    private function __construct() {}

    /**
     * Método para definir padrão de senha
     *
     * @param string $password Senha
     * @return self
     */
    public static function fromPlain(string $password): self
    {
        $instance = new self();
        $instance->validate($password);
        $instance->passwordHash = password_hash($password, PASSWORD_DEFAULT);
        return $instance;
    }

    /**
     * Método para validar o Hash da senha
     *
     * @param string $hash Hash
     * @return self
     */
    public static function fromHash(string $hash): self
    {
        if (!password_get_info($hash)["algo"]) {
            throw new InvalidArgumentException("Hash de senha inválido.");
        }

        $instance = new self();
        $instance->passwordHash = $hash;
        return $instance;
    }

    /**
     * Método para validar senha
     *
     * @param string $password Senha
     * @return void
     */
    private function validate(string $password): void
    {
        // Valida se há senha
        if (empty($password)) {
            throw new InvalidArgumentException("A senha não pode ser vazia!");
        }

        // Valida o comprimento de senh
        if (strlen($password) < 8) {
            throw new InvalidArgumentException(
                "A senha deve ter pelo menos 8 caracteres!",
            );
        }

        // Valida se a senha contém ao menos uma letra minúscula
        if (!preg_match("/[a-z]/", $password)) {
            throw new InvalidArgumentException(
                "A senha deve ter pelo menos uma letra minúscula",
            );
        }

        // Valida se a senha contém ao menos uma letra maiúscula
        if (!preg_match("/[A-Z]/", $password)) {
            throw new InvalidArgumentException(
                "A senha deve ter pelo menos uma letra maiúscula",
            );
        }

        // Valida se a senha contém ao menos um número
        if (!preg_match("/\d/", $password)) {
            throw new InvalidArgumentException(
                "A senha deve conter pelo menos um número",
            );
        }

        // Valida se a senha contém ao menos um caractere especial
        if (!preg_match("/[!@#$%^&*(),.?\":{}|<>]/", $password)) {
            throw new InvalidArgumentException(
                "A senha deve conter pelo menos um caractere especial!",
            );
        }
    }

    /**
     * Obtém o Hash da senha
     *
     * @return string
     */
    public function getHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * Verifica o hash da senha com a senha
     *
     * @param string $password Senha
     * @return bool
     */
    public function verify(string $password): bool
    {
        return password_verify($password, $this->passwordHash);
    }
}
