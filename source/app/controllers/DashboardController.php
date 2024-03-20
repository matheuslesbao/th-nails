<?php

namespace app\controllers;

class DashboardController extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['auth'])) {
            header("Location: /login?=notauth");
            session_destroy();
            die();
        }

        try {
            // Obtém as informações do usuário da sessão
            $user = $_SESSION['auth'];
            $this->view('dashboard', ['name' => $user->getUsername()]);
        } catch (\Throwable $th) {
            echo "Não foi possivel fazer o Acesso: " . $th->getMessage();
        }
    }
}
