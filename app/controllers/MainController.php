<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $arr = $this->model->getHits();
        $this->view->render($arr);
    }

    public function registrationAction() {
        $email = $_POST['reg_email'];
        $pass = $_POST['reg_password'];
        // echo ($email);
        $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
        $res = $this->model->registration($email, $pass_hash);
        
        echo json_encode($res);
    
}
}
