<?php

// Declaração de tipagem forte
declare(stict_types=1);

// Declaração do namespace
namespace DAO;

// Importa a classe User do namespace App\Model
use App\Model\User;

// Importa a classe PDO
use Config\DatabaseConnect;
use PDO;

// Importa a classe PDOException
use PDOException;

/**
 * Classe responsável pelo DAO (Data Access Object) do Usuário
 *
 * @package DAO
 * @author @MarleyS439
 */
class UserDAO
{
    /**
     * @var PDO $pdo - PHP Data Object (PDO)
     */
    private PDO $pdo;

    /**
     * Método construtor da classe UserDAO
     */
    public function __construct()
    {
        $database = new DatabaseConnect();
        $database->pdo = $database->connect();
    }

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
