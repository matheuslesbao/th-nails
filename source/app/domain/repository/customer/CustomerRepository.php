<?php

namespace app\domain\repository\customer;

use app\domain\entity\Customer;
use app\infra\mysql\Database;

class CustomerRepository extends Database implements CustomerRepositoryInterface
{
    public function __construct()
    {
        // Chama o construtor da classe pai para inicializar a conexão com o banco de dados
        parent::__construct('customers'); // 'Customers' é o nome da tabela
    }

    public function insert($values): string
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') 
                            VALUES (' . implode(',', $binds) . ')';
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();
    }
    public function select($where = null, $order = null, $limit = null, $fields = '*'): ?string
    {
        $where = !empty($where) ? 'WHERE ' . $where : '';
        $order = !empty($order) ? 'ORDER BY ' . $order : '';
        $limit = !empty($limit) ? 'LIMIT ' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query);
    }
    public function findById($id = null): ?Customer
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id ';
        $params = ['id' => $id];
        $result = $this->execute($query, $params);

        if ($result->rowCount() > 0) {
            // Retorna a primeira linha como um objeto Customer
            return $result->fetchObject(Customer::class);
        } else {
            return null;
        }
    }
    public function findByEmail(string $email): ?Customer
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email ";
        $params = ['email' => $email];
        $result = $this->execute($query, $params);

        if ($result->rowCount() > 0) {
            return $result->fetchObject(Customer::class);
        } else {
            return null;
        }
    }
    public function findByUserId(int $user_id): ?array
    {
        $query = "SELECT * FROM {$this->table} 
                            WHERE user_id = :user_id ORDER BY nome ";
        $params = ['user_id' => $user_id];
        $result = $this->execute($query, $params);

        $customers = [];
        while ($row = $result->fetchObject(Customer::class)) {
            $customers[] = $row;
        }

        return $customers;
    }
    public function update($where, $values): bool
    {
        $fields = array_keys($values);
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
        $this->execute($query, array_values($values));
        return true;
    }
    public function delete($where): bool
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->execute($query);
        return true;
    }
}
