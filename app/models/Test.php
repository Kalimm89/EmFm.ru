<?php

namespace app\models;

use app\core\Model;

class Test extends Model
{
    public function registration($email, $pass_hash)
    {
        return $this->db->registration($email, $pass_hash);
    }
}