<?php

namespace app\controllers;

class DashboardController extends Controller
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

        $this->view('dashboard', ['name' => $user->getUsername()]);
    }
}

