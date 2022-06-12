<?php

namespace app\core;

use app\controllers\MainController;

class Router
{
    private $routes = [];
    private $params = [];
    public function __construct()
    {
        $routes_arr = require_once 'app/config/routes.php';
        // debug($routes_arr);

        foreach ($routes_arr as $route => $params) {
            // debug($route);

            $this->add($route, $params);
        }
    }

    private function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
        // debug($this->routes);
        // echo '<hr>';
        // debug($this->params);
    }

    private function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url = $this->removeQueryString($url);
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    private function removeQueryString($url)
    {
        // 'catalogue?page=2'
        $params = explode('?', $url);
        return $params[0];
    }

    public function run()
    {
        if ($this->match()) {
            $controller_name = '\app\controllers\\' .  ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($controller_name)) {
                $controller = new $controller_name($this->params);


                $action_name = $this->params['action'] . 'Action';
                if (method_exists($controller, $action_name)) {
                    $controller->$action_name();
                } else {
                    // echo 'Method ' . $action_name . ' does not exist';
                    echo "<img src='/public/images/errors/404.jpg' width='100%'>";
                }
            } else {
                // Выдает ошибку если контроллер не найден 
                // echo 'Controller ' . $controller_name . ' does not exist';
                echo "<img src='/public/images/errors/404.jpg' width='100%'>";
            }
        } else {
            // echo 'Rout ' . $_SERVER['REQUEST_URI'] . ' does not exist';
            echo "<img src='/public/images/errors/404.jpg' width='100%'>";
        }
    }
}



