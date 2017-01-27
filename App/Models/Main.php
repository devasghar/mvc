<?php

namespace App\Models;

use PDO;

class Main extends \Core\Model
{
    public static function getAll(){
        $db = static::getConnection();
        $query = $db->query("SELECT * FROM `config`;");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}