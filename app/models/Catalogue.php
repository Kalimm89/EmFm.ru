<?php

namespace app\models;

use app\core\Model;

class Catalogue extends Model
{
    public function getCategories()
    {
        // echo 'MODEL getPages method';
        // $arr = $this->db->queryAll('pages')
        $cats_arr = $this->db->queryAll('catalogue');
        return $this->getCountProducts($cats_arr);
        // return $cats_arr;
    }

    public function getCountProducts($cats_arr)
    {
        foreach ($cats_arr as $key => $value) {
            $count = $this->db->queryCountProducts($value['id']);
            $cats_arr[$key]['count'] = $count;
            // debug($count);
        }
        return $cats_arr;
    }

    public function getProducts($param_name, $param_value, $cur_page, $count_on_page = 4)
    {

        $from = ($cur_page - 1) * $count_on_page;
        $products = $this->db->getLimitProducts('products', [$param_name => $param_value], $from, $count_on_page);
        $count = $this->db->queryCountProducts($param_value);
        return ['products' => $products, 'count' => $count];
    }

    public function get_client_cart($client_id, $table = 'cart')
    {
        $client_card = $this->db->queryAll($table, ['client_id' => $client_id]);
        foreach ($client_card as $key => $product) {
            $product_id = $product['product_id'];
            $item = $this->db->queryAll('products', ['id' => $product_id]);
            $name = $item[0]['name'];
            $image = $item[0]['image'];
            $client_card[$key]['name'] = $name;
            $client_card[$key]['image'] = $image;
        }
        return $client_card;
    }

    public function get_client_orders($client_id)
    {
        return $this->get_client_cart($client_id, 'orders');
    }



    public function checkout($client_id, $js_arr)
    {
        //1 В массиве изменяем кол-во товаров на новое 
        $db_arr = $this->db->queryAll('cart', ['client_id' => $client_id]);
        foreach ($db_arr as $i => $db_val) {
            foreach ($js_arr as $j => $js_val) {
                if ($db_val['id'] == $js_val['productId']) {
                    if ($db_val['count'] != $js_val['count']) {
                        $db_arr[$i]['count'] = $js_val['count'];
                    }
                    // 2 посчитать итоговую цену по каждому товару
                    $total_price = $db_arr[$i]['count'] * $db_arr[$i]['price'];
                    $db_arr[$i]['price'] = $total_price;
                    break;
                }
            }
        }
        //3 Удалить товары данного клиента из табл cart
        $delete_query = $this->db->deleteFromCart($client_id, 'client_id');
        if ($delete_query) {
            // 4 Перенести мас $db_arr в табл orders
            // INSERT INTO orders (id,client_id,product_id,count,price) VALUES ('1','1','3','4','520'),('iphone16',2120),()


            // ('1','1','3','4','520'),(2.3.'iphone16',2120),(3,3,'name',1960)

            $value = '';
            foreach ($db_arr as $key => $val) {
                $value .= ',(' . $val['client_id'] . ',' . $val['product_id'] . ',' . $val['count'] . ',' . $val['price'] . ')';
            }
            $value = ltrim($value, ',');
            $insert_query = $this->db->addItemsIntoOrders($value);
            // return $insert_query;
            if (!$insert_query) {
                return 'false';
            } else {
                return 'true';
            }
        } else {
            return 'false';
        }
    }




    public function delete_from_cart($client_id, $product_id)
    {
        $delete_query = $this->db->deleteFromCart($product_id);
        if ($delete_query) {
            //вернуть корзину целиком
            $client_card = $this->db->queryAll('cart', ['client_id' => $client_id]);
            foreach ($client_card as $key => $product) {
                $product_id = $product['product_id'];
                $item = $this->db->queryAll('products', ['id' => $product_id]);
                $name = $item[0]['name'];
                $image = $item[0]['image'];
                $client_card[$key]['name'] = $name;
                $client_card[$key]['image'] = $image;
            }
            return $client_card;
        } else {
            //если delete не сработал
            return 'false';
        }
    }

    public function addItemIntoCart($client_id, $product_id, $count, $price)
    {
        // return $client_id;
        $product = $this->db->queryOne('cart', 'id', 'client_id', $client_id, 'product_id', $product_id);
        if ($product) {
            //Если нажимаем на товар который уже был добавлен -> дублир товар не добавл в табл а увели у уже существующего count
            $prod_id = $product['id'];
            $update_query = $this->db->updateProductCount($prod_id);
            if ($update_query) {
                //вернуть корзину целиком
                $client_card = $this->db->queryAll('cart', ['client_id' => $client_id]);
                foreach ($client_card as $key => $product) {
                    $product_id = $product['product_id'];
                    $item = $this->db->queryAll('products', ['id' => $product_id]);
                    $name = $item[0]['name'];
                    $image = $item[0]['image'];
                    $client_card[$key]['name'] = $name;
                    $client_card[$key]['image'] = $image;
                }
                return $client_card;
            } else {
                //если update не срабботал
                return 'false';
            }
        } else {
            $res = $this->db->addItemIntoCart($client_id, $product_id, $count, $price);
            // return json_encode($res);
            if ($res == false) {
                return 'false';
            } else {
                $client_card = $this->db->queryAll('cart', ['client_id' => $client_id]);
                foreach ($client_card as $key => $product) {
                    $product_id = $product['product_id'];
                    $item = $this->db->queryAll('products', ['id' => $product_id]);
                    $name = $item[0]['name'];
                    $image = $item[0]['image'];
                    $client_card[$key]['name'] = $name;
                    $client_card[$key]['image'] = $image;
                }
                return $client_card;
            }
        }
        // return $product;
        // $arr = [$client_id, $product_id, $count, $price];
        // return json_encode($product);
    }
}

// id
// name
// img
// count => $count