<?php

namespace app\domain\service\customer;

use app\domain\entity\Customer;


interface CustomerServiceInterface
{
    public function registerCustomer(Customer $customer): ?Customer ;
    public function getCustomers(int $user_id): ?array;
    public function deleteCustomer(int $id): void;
}
