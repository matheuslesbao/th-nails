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
            'user_id' => $customer->getUserId(),
            'nome'  => $customer->getName(),
            'telefone' => $customer->getNumber(),
            'created_at'  => $customer->getCreatedAt()
        ]);

        //RETORNAR USUÁRIO
        return $customer;
    }
    public function getCustomers(int $userId): ?array
    {
          $customers = $this->customerRepository->findByUserId($userId);

    if ($customers) {
        $customerInfo = [];
        foreach ($customers as $customer) {
            $customerInfo[] = [
                'nome' => $customer->getName(),
                'telefone' => $customer->getNumber()
            ];
        }
        return $customerInfo;
    } else {
        return null;
    }
    }
}
