<?php

namespace app\domain\repository\user;

use app\domain\entity\User;
use app\infra\mysql\Database;

class UserRepository extends Database  implements UserRepositoryInterface  {
    public function __construct()
    {
        // Chama o construtor da classe pai para inicializar a conexão com o banco de dados
        parent::__construct('users'); // 'users' é o nome da tabela
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
    public function findById( $id = null): ?User
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id ';
        $params = ['user_id' => $id];
        $result = $this->execute($query, $params);

        if ($result->rowCount() > 0) {
            // Retorna a primeira linha como um objeto User
            return $result->fetchObject(User::class);
        } else {
            return null;
        }
    }
    public function findByEmail(string $email): ?User
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email ";
        $params = ['email' => $email];
        $result = $this->execute($query, $params);
    
    if ($result->rowCount() > 0) {
        return $result->fetchObject(User::class);
    } else {
        return null;
    }
    }
    public function update($where, $values): bool
    {
        $fields = array_keys($values);
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
        $this->execute($query, array_values($values));
        return true;
    }
    public function delete($where):bool
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->execute($query);
        return true;
    }

}
