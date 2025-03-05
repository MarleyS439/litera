<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace Config;

// Importa a classe PDO (PHP Data Objects)
use PDO;

// Importa a classe PDOException do PDO (PHP Data Objects)
use PDOException;

/**
 *  Classe responsável por estabelecer a conexão com o banco de dados
 *
 * @package Config
 * @author @MarleyS439
 */
class DatabaseConnect
{
    /**
     * @var string $hostname - Nome do servidor
     */
    private string $hostname;

    /**
     * @var string $database - Nome do Banco de Dados
     */
    private string $database;

    /**
     * @var string $user - Nome do Usuário do Banco de Dados
     */
    private string $user;

    /**
     * @var string $password - Senha do Usuário do Banco de Dados
     */
    private string $password;

    /**
     * @var int $port - Porta de acesso ao Banco de Dados
     */
    private int $port;

    /**
     * @var PDO $pdo - Objeto de Data do PHP - PHP Data Object
     */
    public ?PDO $pdo = null;

    /**
     * Método construtor da classe DatabaseConnect.
     *
     * É responsável por iniciar os dados de conexão com o banco de dados
     *
     * @author @MarleyS439
     */
    public function __construct()
    {
        // Faz o carregamento do arquivo INI de configuração com os dados de acesso ao banco de dados
        $config = parse_ini_file(__DIR__ . "/config.ini", true);

        // Verifica se a seção `app` do arquivo está definida e atribui os valores
        if (isset($config["app"])) {
            $this->hostname = $config["app"]["HOSTNAME"];
            $this->database = $config["app"]["DATABASE"];
            $this->user = $config["app"]["USER"];
            $this->password = $config["app"]["PASSWORD"];
            $this->port = (int) $config["app"]["PORT"];
        } else {
            die(
                "Não foi possível iniciar os dados de acesso ao Banco de Dados."
            );
        }
    }

    /**
     * Método para realizar a conexão com o Banco de Dados
     *
     * @param void
     * @return PDO
     *
     * @author @MarleyS439
     */
    public function connect(): PDO
    {
        try {
            // Data Source Name de Conexão com o MySQL com PDO (PHP Data Objects)
            $dsn = "mysql:host={$this->hostname};port={$this->port};dbname={$this->database};charset=utf8";

            // Cria uma instância do da classe PDO, com os atributos de uso de PDOException e modo de fetch
            $this->pdo = new PDO($dsn, $this->user, $this->password, [
                // Definie como o PDO deve lidar com erros, lançando no PDOException
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // Define como o PDO fará a busca de dados
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                // Faz o PDO a usar declarações preparadas nativas do banco de dados - Mais seguro
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);

            // Retorna o PDO
            return $this->pdo;
        } catch (PDOException $exception) {
            die(
                "Erro ao conectar com o banco de dados: " .
                    $exception->getMessage()
            );
        }
    }
}
