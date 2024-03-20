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
    public $connection;
    public function __construct($table = null)
    {
        $this->connection = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->table = $table;
        $this->setConnection();
    }
    public function setConnection()
    {
        try {
            $this->connection = new PDO(
            'mysql:host=' . self::$host .
            ';dbname=' . self::$dbname,
            self::$user, self::$pass);

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
