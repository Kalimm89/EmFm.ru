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

    
}
