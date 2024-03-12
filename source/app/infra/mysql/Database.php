<?php
namespace app\infra\mysql;
use \PDO;
use \PDOException;

abstract class Database
{
    private static $host = 'mysql';
    private static $dbname = 'th_nails';
    private static $user = 'alphard';
    private static $pass = 'teste';
    public $table;
    private $charset = 'utf8mb4';
    public $connection;

    public function __construct($table = null)
    {
        $this->connection = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Criar tables no banco de dados.
        $showTable = "SHOW TABLES LIKE '$table' ";
        $result = $this->connection->query($showTable);
        if (!$result->rowCount() > 0) {
            $createTableUsers = " CREATE TABLE `users` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
            `username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
            `password` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
            `email` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
            `created_at` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            PRIMARY KEY (`id`) USING BTREE,
            UNIQUE KEY `email` (`email`)
          )
          COLLATE='utf8_general_ci'
          ENGINE=InnoDB
          AUTO_INCREMENT=1; ";

        $createTableCustomers = " CREATE TABLE `customers` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            user_id INT NOT NULL,
            nome VARCHAR(100) NOT NULL,
            email VARCHAR(100),
            telefone VARCHAR(20),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
          )
          COLLATE='utf8_general_ci'
          ENGINE=InnoDB; ";
            $result = $this->connection->query($createTableUsers);
            $result = $this->connection->query($createTableCustomers);
            
        }
        $this->table = $table;
        $this->setConnection();
    }

    public function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$pass);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $th) {
            die('ERRROR' . $th->getMessage());
        }
    }

    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            foreach ($params as $key => $value) {
                $statement->bindValue(":$key", $value, PDO::PARAM_STR);
            }
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}