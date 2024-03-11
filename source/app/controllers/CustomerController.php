<?php

namespace app\controllers;

class CustomerController extends Controller
{
    public function index()
    {
        session_start();

        if (!isset($_SESSION['auth'])) {
            header("Location: /login?=notauth");
            die();
        }
        // Obtém as informações do usuário da sessão
        $user = $_SESSION['auth'];

        $this->view('customer');
    }
}

