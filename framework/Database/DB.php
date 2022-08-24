<?php

namespace Framework\Database;

use PDO;
use PDOStatement;

use function intval;

/**
 * Database connection singleton using PDO
 */
class DB
{
    private PDO $pdo;

    private static ?self $instance = null;

    private function __construct()
    {
        $dsn = 'mysql:dbname=' . $_ENV['DB_NAME'] . ';host=' . $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        $this->pdo = new PDO($dsn, $user, $password);
    }

    /**
     * Get an instance of this class or creates it if it doesn't exist
     *
     * @return static
     */
    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Prepares and executes a SQL query
     *
     * @param string $sql
     * @param array $prepareParams
     * @return PDOStatement
     */
    public function run(string $sql, array $prepareParams = []): PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($prepareParams);

        return $stmt;
    }

    /**
     * Get last inserted id
     *
     * @return int
     */
    public function lastInsertId(): int
    {
        return intval($this->pdo->lastInsertId());
    }
}
