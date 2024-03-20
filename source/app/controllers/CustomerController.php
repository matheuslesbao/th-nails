<?php

namespace app\controllers;

use Exception;
use app\controllers\Controller;
use app\domain\entity\Customer;

use app\core\usecase\customer\CustomerUseCase;
use app\domain\service\customer\CustomerService;
use app\domain\repository\customer\CustomerRepository;

class CustomerController extends Controller
{
    private $customerUseCase;

    public function __construct()
    {
        $customerRepository = new CustomerRepository();
        $this->customerUseCase = new CustomerUseCase(new CustomerService($customerRepository));
    }

    public function index()
    {
        session_start();

        if (!isset($_SESSION['auth'])) {
            header("Location: /login?=notauth");
            session_destroy();
            die();
        }
        try {
            $user_id = $_SESSION['auth']->getId();
            $customers = $this->customerUseCase->getCustomersUseCase($user_id);
        } catch (\Throwable $th) {
            echo "Erro ao obter clientes: " . $th->getMessage();
        exit();
        }
      
        $this->view('customer', ['customers' => $customers]);
    }
    public function create(){
        session_start();
        try {
            if (!isset($_SESSION['auth'])) {
                session_destroy();
                throw new Exception("Usuário não autenticado");
            }
            $user_id = $_SESSION['auth']->getId();
            $name = $_POST['name'];
            $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);
            $address = $_POST['address'];
            
            if (!$name || !$number) {
                throw new Exception("Nome e número são obrigatórios");
            }

            $customer = new Customer();
            $customer->setName($name);
            $customer->setNumber($number);
            $customer->setUserId($user_id);
            $customer->setAddress($address);
            // Registra o cliente usando o caso de uso
            $this->customerUseCase->registerCustomerUseCase($customer);
            header("Location: /customer");
            exit();
        } catch (Exception $err) {
            // Trata qualquer exceção ocorrida durante o processo
            echo "Erro ao criar cliente: " . $err->getMessage();
        }
    }
}
