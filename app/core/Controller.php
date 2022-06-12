<?php

namespace app\core;

session_start();
// session_unset();
abstract class Controller
{
    protected $route;
    protected $view;
    protected $model;
    public function __construct($route)
    {
        $this->route = $route;
        ;
        $this->view = new View($route);
        $model_name = '\app\models\\' . ucfirst($route['controller']);

        $this->model = new $model_name;
        
        if (isset($_GET['do']) and $_GET['do'] == 'exit') {
            session_unset();
            header('location: ' . $_SERVER['REDIRECT_URL']);            
        }
        if (isset($_POST['email']) and isset($_POST['password'])) {
            $res = $this->model->auth($_POST['email'], $_POST['password']);            
            if ($res) {
                
                $_SESSION['auth'] = ['id' => $res['id'], 'email' => $res['email']];              
                header('location: ' . $_SERVER['REDIRECT_URL']); 
                // debug($_SESSION['auth']);              
            } else {               
                echo "
                <div'>Вы ввели неверные данные</div>
                ";                    
            }
        }
    }

    public function isAjax()
    {
        //метод проверяет был ли аякс запрос или нет. Если да - то возвр Истина, иначе - Ложь
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}
