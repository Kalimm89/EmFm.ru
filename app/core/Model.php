<?php

namespace app\core;

abstract class Model
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
        // debug($this->db);
        // $this->db->queryAll('asdfasdf');
        // $this->queryAll('asdfasdf');
    }

    public function auth($email, $password)
    {
        $res = $this->db->auth($email, $password);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
    
}
