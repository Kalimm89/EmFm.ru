<?php

namespace app\controllers;

use app\core\Controller;

class CatalogueController extends Controller
{

    public function indexAction()
    {
        $categories = $this->model->getCategories();
        $this->view->render($categories);
    }

    public function microphoneAction()
    {
        $this->save_ses_cat_id();
        $arr = $this->getProducts();
        $this->view->render($arr);
    }

    public function guitarAction()
    {
        $this->save_ses_cat_id();
        $arr = $this->getProducts();
        $this->view->render($arr);
    }

    public function drumAction()
    {
        $this->save_ses_cat_id();
        $arr = $this->getProducts();
        $this->view->render($arr);
    }


    private function save_ses_cat_id()
    {
        //если зашли в 1й раз и сессии нет а кат-ид есть
        if (isset($_GET['cat_id']) and !isset($_SESSION['cat_id'])) {
            $_SESSION['cat_id'] = $_GET['cat_id'];
            header('location: ' . $_SERVER['REDIRECT_URL']);
            //если зашли НЕ в 1й раз и сессия есть то нужно проверить что то что в сессии совп или нет с ГЕТ
            //а) совпадение сессис и ГЕТ
        } else if (isset($_GET['cat_id']) and isset($_SESSION['cat_id']) and ($_SESSION['cat_id'] == $_GET['cat_id'])) {
            header('location: ' . $_SERVER['REDIRECT_URL']);
            //б) Гет и сессия различны
        } else if (isset($_GET['cat_id']) and isset($_SESSION['cat_id']) and ($_SESSION['cat_id'] != $_GET['cat_id'])) {
            $_SESSION['cat_id'] = $_GET['cat_id'];
            header('location: ' . $_SERVER['REDIRECT_URL']);
        }
    }

    private function getProducts()
    {
        if (isset($_GET['page'])) {
            $cur_page = $_GET['page'];
        } else {
            $cur_page = 1;
        }

        $param_value = $_SESSION['cat_id'];
        $param_name = 'catalogue_id';
        $count_on_page = 4;

        $arr = $this->model->getProducts($param_name, $param_value, $cur_page, $count_on_page);
        $arr['count_on_page'] = $count_on_page;
        $arr['cur_page'] = $cur_page;
        // debug($arr);
        return $arr;
    }

    public function checkoutAction()
    {
        $products_arr = $_POST['products'];
        $res = $this->model->checkout($_SESSION['auth']['id'], $products_arr);
        echo json_encode($res);
    }

    public function delete_from_cartAction()
    {
        if ($this->isAjax()) {
            if (isset($_POST['product_id'])) {
                $res = $this->model->delete_from_cart($_SESSION['auth']['id'], $_POST['product_id']);
                echo json_encode($res);
            } else {
                echo 'false';
            }
        } else {
            echo "<img src='/public/images/errors/404.jpg' width='100%'>";
        }
    }

    public function add_to_cartAction()
    {
        if ($this->isAjax()) {
            if (isset($_POST['product_id']) and isset($_POST['count']) and isset($_POST['price'])) {
                $res = $this->model->addItemIntoCart($_SESSION['auth']['id'], $_POST['product_id'], $_POST['count'], $_POST['price']);
                echo json_encode($res);
            } else {
                echo 'false';
            }
        } else {
            echo "<img src='/public/images/errors/404.jpg' width='100%'>";
        }
    }

    public function get_client_cartAction()
    {
        if ($this->isAjax()) {
            $client_id = $_POST['client_id'];
            $res = $this->model->get_client_cart($client_id);
            echo json_encode($res);
        } else {
            echo "<img src='/public/images/errors/404.jpg' width='100%'>";
        }
    }

    // public function get_client_ordersAction()
    // {
    //     if ($this->isAjax()) {
    //         $client_id = $_POST['client_id'];
    //         $res = $this->model->get_client_orders($client_id);
    //         echo json_encode($res);
    //     } else {
    //         echo "<img src='/public/images/errors/404.jpg' width='100%'>";
    //     }
    // }
    public function registrationAction() {
            
        $email = $POST['regName'];
        $pass = $POST['regPassword'];
        // debug($email);
        $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
        $res = $this->db->registration($email, $pass_hash);
        echo json_encode($res);
    
}
}
