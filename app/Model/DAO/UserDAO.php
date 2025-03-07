<?php

// Declaração de tipagem forte
declare(stict_types=1);

// Declaração do namespace
namespace DAO;

// Importa a classe User do namespace App\Model
use App\Model\User;

/**
 * Classe responsável pelo DAO (Data Access Object) do Usuário
 *
 * @package DAO
 * @author @MarleyS439
 */
class UserDAO
{
    /**
     * Método público para Criar um Usuário
     *
     * @param User $user
     * @return bool
     */
    public function createUser(User $user): bool {}

    /**
     * Método público para Atulizar um Usuário
     *
     * @param void
     * @return bool
     */
    public function updateUser(): bool {}
}
