<?php

namespace app\domain\repository\customer;

use app\domain\entity\Customer;

interface CustomerRepositoryInterface
{
    function insert($values): string;
    function delete(int $id): bool ;
    function update($where, $values): bool ;
    function findById (int $id): ?Customer ;
    function findByUserId(int $user_id): ?array ;
    function select($where, $order, $limit,$fields): ?string ;
    function findByEmail(string $email): ?Customer ;
}
