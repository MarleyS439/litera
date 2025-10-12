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
 * Classe responsável por definir o Modelo de Jogo
 *
 * @package App\Model
 * @author @MarleyS439
 */
class Game
{
    /**
     * @var string $name - Nome do Jogo
     */
    private string $name;

    /**
     * @var string $category - Categoria do Jogo
     */
    private string $category;

    /**
     * @var string $description - Descrição do Jogo
     */
    private string $description;

    /**
     * @var int $levels - Níveis do Jogo
     */
    private int $levels;

    /**
     * @var DateTime $createdAt - Data e Hora de Criação do Jogo
     */
    private DateTime $createdAt;

    /**
     * @var DateTime $updatedAt - Data e Hora de Atualização do Jogo
     */
    private DateTime $updatedAt;

    /**
     * @var Status|null $status - Status do Jogo
     */
    private ?Status $status = null;

    /**
     * @var int|null $id - ID do Jogo
     */
    private ?int $id = null;

    /**
     * Método construtor da classe Game
     */
    public function __construct(
        string $name,
        string $category,
        string $description,
        int $levels,
        DateTime $createdAt
    ) {
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
        $this->levels = $levels;
        $this->createdAt = $createdAt;
    }

    /**
     * Método para Obter o Nome do Jogo
     *
     * @param void
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     *  Método para Definir o Nome do Jogo
     *
     * @param string $name - Nome do Jogo
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     *  Método para Obter a Categoria do Jogo
     *
     * @param void
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * Método para Definir a Categoria do Jogo
     *
     * @param string $category
     * @return void
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * Método para Obter a Descrição do Jogo
     *
     * @param void
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Método para Definir a Descrição do Jogo
     *
     * @param string $description - Descrição do Jogo
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Método para Obter os Níveis do Jogo
     *
     * @param void
     * @return int
     */
    public function getLevels(): int
    {
        return $this->levels;
    }

    /**
     * Método para Definir os Níveis do Jogo
     *
     * @param int $levels - Níveis do Jogo
     * @return void
     */
    public function setLevels(int $levels): void
    {
        $this->levels = $levels;
    }

    /**
     * Método para Obter a Data e Hora de Criação do Jogo
     *
     * @param void
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Método para Definir a Data e Hora de Criação do Jogo
     *
     * @param DateTime $createdAt - Data e Hora de Criação do Jogo
     * @return void
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Método para Obter a Data e Hora de Atualização do Jogo
     *
     * @param void
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Método para Definir a Data e Hora de Atualização do Jogo
     *
     * @param DateTime $updatedAt - Data e Hora de Atualização do Jogo
     * @return void
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Método para Obter o Status do Jogo
     *
     * @param void
     * @return Status|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * Método para Definir o Status do Jogo
     *
     * @param Status|null $status
     * @return void
     */
    public function setStatus(?Status $status): void
    {
        $this->status = $status;
    }

    /**
     * Método para Obter o ID do Jogo
     *
     * @param void
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Método para Definir o ID do Jogo
     *
     * @param int|null $id - ID do Jogo
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
}
