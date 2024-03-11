<?php

namespace app\config\router;
use Exception;
use ReflectionClass;
use app\presentation\helpers\Uri;
use app\presentation\helpers\Request;

class Router
{
    
    //constante que procura o namespace na pasta controller
    const CONTROLLER_NAMESPACE = 'app\\controllers';
    // load procura o controller e o metodos nas requisiçoes http
    public static function load(string $controller, string $method, $arguments = [])
    {
        try {
            // verificar se o controller existe, se nao existir ja lança o erro
            $controllerNamespace = self::CONTROLLER_NAMESPACE . '\\' . $controller;
            if (!class_exists($controllerNamespace)) {
                throw new Exception("The Controller {$controller} not found");
            }
            // se existir ira criar uma instancia do controller existente
            //  $controllerInstance = new $controllerNamespace;
            $controllerReflection = new ReflectionClass($controllerNamespace);
            $controllerInstance = $controllerReflection->newInstanceArgs($arguments);
            
            // Agora verificar se existe o method
            // a função method_exist pede uma instacia do controler
            if (!method_exists($controllerInstance, $method)) {
                throw new Exception("The Method not exists in Controller -> {$controller} not found");
            }

            $controllerInstance->$method((object)$_REQUEST);

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public static function routes(): array
    {
        return [
            'get' => [
                '/' => fn() =>  self::load('HomeController', 'index'),
                '/login' => fn() => self::load('LoginController','index'),
                '/dashboard' => fn() => self::load('DashboardController','index'),
                '/customer' => fn() => self::load('CustomerController','index'),
            ],
            'post' => [
                '/login' => fn() => self::load('LoginController','login'),
            ]

        ];
    }
    public static function exec()
    {
        try {
            $routes = self::routes();
            $request = Request::get();
            $uri = Uri::get('path');
            if(!isset($routes[$request])){
                throw new Exception("Error route {$uri} not found", 1); 
            }

            if(!array_key_exists($uri, $routes[$request])){
                throw new Exception('Router {$uri} not exists');
            }

            $router = $routes[$request][$uri];
            //Verifcar se é uma função executavel
            if(!is_callable($router)){
                throw new Exception("Error route {$uri} is not callable", 1);
            }

            $router();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}