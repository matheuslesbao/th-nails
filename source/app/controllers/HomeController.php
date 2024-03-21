<?php

namespace app\controllers;
class HomeController extends Controller
{
    public function index(){
        $this->view('home', []);
        http_response_code(200);
    }
}
