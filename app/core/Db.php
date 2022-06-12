<?php

namespace app\core;

class Db
{
    protected $db;

    public function __construct()
    {
        $db_name = 'app/config/db_config.php';
        if (file_exists($db_name)) {
            $db_config = require_once $db_name;
        }

        try {
            $this->db = new \PDO("mysql:host={$db_config['host']};dbname={$db_config['db_name']}", $db_config['user'], $db_config['password']);
        } catch (\PDOException $e) {
            die('Db connect error');
        }
        // echo __CLASS__;
        // echo get_class();
        // $this->queryAll("SELECT * FROM pag");
    }

    public function queryAll($table_name, $param = null)
    {
        if ($param != null) {
            $keys = array_keys($param);
            $param_name = $keys[0];
            $param_value = $param[$param_name];

            $stmt = $this->db->prepare("SELECT * FROM {$table_name} WHERE {$param_name} = ?");
            
        } else {
            $stmt = $this->db->prepare("SELECT * FROM {$table_name}");
        }
        $stmt->execute([$param_value]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function queryOne($table_name, $field, $param1, $value1, $param2 = null, $value2 = null, $param3 = null, $value3 = null)
    {
        if ($param2 and $value2) {
            $stmt = $this->db->prepare("SELECT {$field} FROM {$table_name} WHERE {$param1} = ? AND {$param2} = ?");
            $stmt->execute([$value1, $value2]);
        } else if ($param3 and $value3) {
            $stmt = $this->db->prepare("SELECT {$field} FROM {$table_name} WHERE {$param1} = ? AND {$param2} = ? AND {$param3} = ?");
            $stmt->execute([$value1, $value2, $value3]);
        } else {
            $stmt = $this->db->prepare("SELECT {$field} FROM {$table_name} WHERE {$param1} = ?");
            $stmt->execute([$value1]);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function queryCountProducts($catalogue_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS count FROM products WHERE catalogue_id = ?");
        $stmt->execute([$catalogue_id]);
        // return $stmt->fetch(\PDO::FETCH_ASSOC);
        // $arr = $stmt->fetch(\PDO::FETCH_ASSOC);
        // return $arr['count'];
        return $stmt->fetch(\PDO::FETCH_ASSOC)['count'];
    }

    public function getHits()
    {
        $stmt = $this->db->prepare("SELECT `product_id`, COUNT(`product_id`) AS `count_product_id`, SUM(`count`) AS `count_products` FROM `orders` GROUP BY `product_id` HAVING `count_product_id` >= 1 AND `count_products` >= 6");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function query($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLimitProducts($table, $param, $from, $count_on_page)
    {
        $keys = array_keys($param);
        $param_name = $keys[0];
        $param_value = $param[$param_name];

        // $stmt = $this->db->prepare("SELECT * FROM $table WHERE {$param_name} = ? LIMIT $position,$count");
        $stmt = $this->db->prepare("SELECT * FROM $table WHERE {$param_name} = {$param_value} LIMIT {$from},{$count_on_page}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    


    public function auth($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM clients WHERE `email` = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        // debug($data);
        if ($data) {
            $password_hash = $data['password'];
            if (password_verify($password, $password_hash)) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateProductCount($product_id)
    {
        $product_count_arr = $this->queryOne('cart', 'count', 'id', $product_id);
        $product_count = $product_count_arr['count'];
        $product_count += 1;
        $stmt = $this->db->prepare("UPDATE cart SET `count`=? WHERE `id`=?");
        $res = $stmt->execute([$product_count, $product_id]);
        return $res;
    }

    public function deleteFromCart($param_val, $param_name = 'id')
    {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE `${param_name}`=?");
        $res = $stmt->execute([$param_val]);
        return $res;
    }


    public function addItemIntoCart($client_id, $product_id, $count, $price)
    {
        $stmt = $this->db->prepare("INSERT INTO cart SET `client_id`=?,`product_id`=?,`count`=?,`price`=?");
        $res = $stmt->execute([$client_id, $product_id, $count, $price]);
        return $res;
    }

    public function addItemsIntoOrders($items_values)
    {
        // INSERT INTO orders (id,client_id,product_id,count,price) VALUES ('1','1','3','4','520'),('iphone16',2120),()
        $stmt = $this->db->prepare("INSERT INTO orders (`client_id`,`product_id`,`count`,`price`) VALUES $items_values");
        $res = $stmt->execute();
        return $res;
    }

    public function registration($email, $pass_hash)
    {
        $stmt = $this->db->prepare("INSERT INTO clients SET `email`=?,`password`=?");
        $res = $stmt->execute([$email, $pass_hash]);
        return $res;
    }
}



// arr = ['id' => 5];
// arr['id'] = 5
// id

// id	client_id	product_id	count	price
// 0   1           2           2       22626
// 1   1           3           1       5566
// 2   1           2           1       22626