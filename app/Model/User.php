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
 * Classe responsável por definir o Modelo de Usuário
 *
 * @package App\Model
 * @author @MarleyS439
 */
class User
{
    /**
     * @var string $name - Nome do Usuário
     */
    public string $name;

    /**
     * @var string $email - E-mail do Usuário
     */
    public string $email;

    /**
     * @var string $password - Senha do Usuário
     */
    public string $password;

    /**
     * @var Status $status - Status do Usuário
     */
    public Status $status;

    /**
     * @var DateTime $createdAd - Data e Hora de Criação do Usuário
     */
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt - Data e Hora de Atualização do Usuário
     */
    public DateTime $updatedAt;

    /**
     * @var int|null $id - ID do Usuário
     */
    public ?int $id = null;

    /**
     * Método construtor da classe model User
     */
    public function __construct(
        string $name,
        string $email,
        string $password,
        Status $status,
        DateTime $createdAt
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }

    /**
     * Método para Obter o Nome do Usuário
     *
     * @param void
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Método para Definir o Nome do Usuário
     *
     * @param string $name - Nome do Usuário
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Método para Obter o E-mail do Usuário
     *
     * @param void
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Método para Definir o E-mail do Usuário
     *
     * @param string $email - E-mail do Usuário
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Método para Obter o Status do Usuário
     *
     * @param void
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * Método para Definir o Status do Usuário
     *
     * @param Status $status - Status do Usuário
     * @return void
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    /**
     * Método para Obter a Data e Hora de Criação do Usuário
     *
     * @param void
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Método para Definir a Data e Hora de Criação do Usuário
     *
     * @param DateTime $createdAt - Data e Hora de Criação do Usuário
     * @return void
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Método para Obter a Data e Hora de Atualização do Usuário
     *
     * @param void
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Método para Definir a Data e Hora de Atualização do Usuário
     *
     * @param DateTime $updatedAt - Data e Hora de Atualização do Usuário
     * @return void
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
