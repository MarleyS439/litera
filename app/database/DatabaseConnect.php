<?php

declare(strict_types=1);

namespace Database;

use PDO;
use PDOException;
use RuntimeException;

/**
 * Classe responsável por gerenciar a conexão com o banco de dados usando o método PDO
 *
 * @package Database
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 * @version 1.0.0
 * @since 03/07/2025
 */
class DatabaseConnect
{
    /**
     * @var string $hostname Servidor
     */
    private string $hostname;

    /**
     * @var string $database Banco de dados
     */
    private string $database;

    /**
     @var string $user Usuário
     */
    private string $user;

    /**
     * @var string $password Senha
     */
    private string $password;

    /**
     * @var int $port Porta
     */
    private int $port;

    /**
     * @var PDO|null $pdo PHP Database Object
     */
    private ?PDO $pdo = null;

    /**
     * Construtor da classe DatabaseConnect
     */
    public function __construct()
    {
        $required_var = ['DB_HOSTNAME', 'DB_DATABASE', 'DB_USER', 'DB_PASSWORD', 'DB_PORT'];

        foreach ($required_var as $var) {
            if (!isset($_ENV[$var]) || empty($_ENV[$var])) {
                error_log("Erro fatal: Variável de ambiente '$var' não foi definida ou está vazia.\n");
                throw new RuntimeException("Erro de configuração de variável de ambiente '$var'.");
            }
        }

        $this->hostname = $_ENV['DB_HOSTNAME'];
        $this->database = $_ENV['DB_DATABASE'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'] ?? "";
        $this->port = (int) $_ENV['DB_PORT'];
    }

    /**
     * Método para fazer a conexão PDO
     *
     * @return PDO|null
     */
    public function connect(): ?PDO
    {
        try {
            // Data Source Name
            $dsn = "mysql:host={$this->hostname}; port={$this->port};dbname={$this->database};charset=utl-8";

            $this->pdo = new PDO($dsn, $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

            return $this->pdo;
        } catch (PDOException $exception) {
            error_log("Erro de conexão com o banco de dados: " . $exception->getMessage());
            throw new RuntimeException("Não foi possível conectar ao banco de dados. Tente novamente mais tarde.");
        }
    }
}
