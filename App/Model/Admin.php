<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace App\Model;

// Importa a classe DateTime
use DateTime;

// Importa o Enum Status
use App\Model\Enums\Status;

/**
 * Classe responsável por definir o Modelo de Usuário Administrador
 *
 * @package App\Model
 * @author @MarleyS439
 */
class Admin extends User
{
    /**
     * @var array $permissions - Permissões do Usuário
     */
    private array $permissions;

    /**
     * Método construtor da classe Admin
     */
    public function __construct(
        string $name,
        string $email,
        string $password,
        Status $status,
        DateTime $createdAt,
        array $permissions
    ) {
        // Chama o construtor da classe User
        parent::__construct($name, $email, $password, $status, $createdAt);
        $this->permissions = $permissions;
    }

    /**
     * Método para Obter as Permissões do Usuário
     *
     * @param void
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * Método para Definir Permissões do Usuário
     *
     * @param array $permissions - Array de Permissões do Usuário
     * @return void
     */
    public function setPermissions(array $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * Método para verificar se há permissão
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions, true);
    }
}
