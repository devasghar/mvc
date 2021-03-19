<?php

namespace App\Models;

use Core\Model;
use PDO;

class Main extends Model
{
    public static function getAll(){
        $db = static::getConnection();
        $query = $db->query("SELECT * FROM `config`;");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}