<?php 
namespace app\domain\repository;

use app\domain\entity\User;

interface UserRepositoryInterface {
    function insert($values): string;
    function delete(int $id): bool ;
    function update($where, $values): bool ;
    function findById (int $id): ?User ;
    function select($where, $order, $limit,$fields): ?string ;
    function findByEmail(string $email): ?User ;
}
