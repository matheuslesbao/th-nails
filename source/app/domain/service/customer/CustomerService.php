<?php

namespace app\domain\service\customer;

use app\domain\entity\Customer;
use app\domain\repository\customer\CustomerRepositoryInterface;

class CustomerService implements CustomerServiceInterface
{
    public $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    public function registerCustomer(Customer $customer): ?Customer
    {

        //DEFINIR A DATA
        $customer->setCreatedAt(date('Y-m-d H:i:s'));
        //INSERIR Usuario NO BANCO
        $this->customerRepository->insert([
            'user_id'  => $customer->getUserId(),
            'nome'     => $customer->getName(),
            'telefone' => $customer->getNumber(),
            'created_at'  => $customer->getCreatedAt(),
            'address'  => $customer->getAddress(),
        ]);

        //RETORNAR USUÁRIO
        return $customer;
    }
    public function getCustomers(int $user_id): ?array
    {
          $customers = $this->customerRepository->findByuser_id($user_id);

    if ($customers) {
        $customerInfo = [];
        foreach ($customers as $customer) {
            $customerInfo[] = [
                'nome' => $customer->getName(),
                'telefone' => $customer->getNumber(),
                'created_at' => $customer->getCreatedAt(),
                'address' => $customer->getAddress(),
            ];
        }
        return $customerInfo;
    } else {
        return null;
    }
    }
}
