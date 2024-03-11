<?php

namespace app\controllers;

use Exception;
use app\controllers\Controller;
use app\core\usecase\UserUseCase;
use app\domain\service\UserService;
use app\domain\repository\UserRepository;

class LoginController extends Controller
{
    private $userUseCase;
public function __construct()
{   
    $userRepository = new UserRepository();
    $this->userUseCase = new UserUseCase(new UserService($userRepository));
}
    public function index()
    {
        $this->view('login', []);
    }
    public function login()
    {
        session_start();
        
        try {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = strip_tags($_POST['password']);

            $user = $this->userUseCase->getUserByEmailUseCase($email);
            if(!$user){
                throw new Exception($user . 'Não existe este usuario.');
            }
            // if (!password_verify($password, $user->getPassword())) {
            //     throw new Exception("Senha inválida");
            // }
            if ($password !== $user->getPassword()) {
                throw new Exception("Senha inválida");
            }
            $_SESSION['auth'] = $user;
            
            header("Location: /dashboard");
            exit();
        } catch (\Throwable $e) {
            echo "Não foi possivel fazer o Login: " . $e->getMessage();
        }
        
    }

}