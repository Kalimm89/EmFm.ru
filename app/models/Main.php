<?php

namespace app\models;

use app\core\Model;

class Main extends Model
{
    public function getHits()
    {
        $select_query = $this->db->getHits();
        foreach ($select_query as $key => $product) {
            $ids .= $product['product_id'] . ',';
        }
        $ids = rtrim($ids, ',');
        $arr = $this->db->query("SELECT * FROM products WHERE id IN ($ids)");
        foreach ($arr as $key => $value) {
            $arr[$key]['qty'] = $select_query[$key]['count_products'];
        }
        return $arr;
    }
}
