<?php

declare(strict_types=1);

namespace App\Model;

use DateTimeImmutable;
use App\Model\Enums\Status;

/**
 * Classe responsável por definir o Modelo de Usuário
 *
 * @package Model
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 * @version 1.0.1
 * @since 12/10/2025
 */
class User
{
    /**
     * @var string $name Nome do Usuário
     */
    protected string $name;

    /**
     * @var string $email E-mail do Usuário
     */
    protected string $email;

    /**
     * @var Password $passwordHash Senha do Usuário
     */
    protected Password $passwordHash;

    /**
     * @var Status $status Status do Usuário
     */
    protected Status $status;

    /**
     * @var DateTimeImmutable $createdAd Data e Hora de Criação do Usuário
     */
    protected DateTimeImmutable $createdAt;

    /**
     * @var DateTimeImmutable $updatedAt Data e Hora de Atualização do Usuário
     */
    protected DateTimeImmutable $updatedAt;

    /**
     * @var int|null $id ID do Usuário
     */
    protected ?int $id = null;

    /**
     * Método construtor da classe User
     */
    public function __construct(
        string $name,
        Email $email,
        Password $password,
        Status $status,
        DateTimeImmutable $createdAt,
    ) {
        $this->name = $name;
        $this->email = $email->getEmail();
        $this->passwordHash = $password;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }

    /**
     * Método para Obter o Nome do Usuário
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Método para Definir o Nome do Usuário
     *
     * @param string $name Nome do Usuário
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Método para Obter o E-mail do Usuário
     *
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->getEmail();
    }

    /**
     * Método para Definir o E-mail do Usuário
     *
     * @param Email $email E-mail do Usuário
     * @return void
     */
    public function setEmail(Email $email): void
    {
        $this->email = $email->getEmail();
    }

    /**
     * Método para Obter o Status do Usuário
     *
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * Método para Definir o Status do Usuário
     *
     * @param Status $status Status do Usuário
     * @return void
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    /**
     * Método para Obter a Data e Hora de Criação do Usuário
     *
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Método para Definir a Data e Hora de Criação do Usuário
     *
     * @param DateTimeImmutable $createdAt Data e Hora de Criação do Usuário
     * @return void
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Método para Obter a Data e Hora de Atualização do Usuário
     *
     * @return DateTimeImmutable
     */
    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * Método para Definir a Data e Hora de Atualização do Usuário
     *
     * @param DateTimeImmutable $updatedAt Data e Hora de Atualização do Usuário
     * @return void
     */
    public function setUpdatedAt(DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
