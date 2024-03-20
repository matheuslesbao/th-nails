<?php

namespace app\core\usecase\customer;

use Exception;
use app\domain\entity\Customer;
use app\domain\service\customer\CustomerServiceInterface;

class CustomerUseCase
{
    private $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }

    public function registerCustomerUseCase(Customer $customer){
        return $this->customerService->registerCustomer($customer);
    }
    public function getCustomersUseCase(int $user_id): ?array
    {
        return $this->customerService->getCustomers($user_id);
    }
    public function deleteCustomerUseCase(int $id): void
    {
        try {
            $this->customerService->deleteCustomer($id);
        } catch (Exception $e) {
            // Lança a exceção para que ela seja tratada em um nível superior
            throw new Exception('Erro ao excluir cliente: ' . $e->getMessage());
        }
    }
}
