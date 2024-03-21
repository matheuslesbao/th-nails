<?php

namespace app\controllers;

use Exception;
use app\controllers\Controller;
use app\core\usecase\user\UserUseCase;
use app\domain\service\user\UserService;
use app\domain\repository\user\UserRepository;

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
        http_response_code(200);
        $this->view('login', []);
    }
    public function login()
    {
        session_start();
        try {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = strip_tags($_POST['password']);

            $user = $this->userUseCase->getUserByEmailUseCase($email);
            if (!$user) {
                http_response_code(404);
                throw new Exception($user . 'Não existe este usuario.');
            }
            // if (!password_verify($password, $user->getPassword())) {
            //     throw new Exception("Senha inválida");
            // }
            if ($password !== $user->getPassword()) {
                http_response_code(403);
                throw new Exception("Senha inválida");
            }
            $_SESSION['auth'] = $user;
            header('location: /dashboard');
            http_response_code(200);
        } catch (\Throwable $e) {
            echo "Não foi possivel fazer o Login: " . $e->getMessage();
            http_response_code(401);
        }
    }
}
