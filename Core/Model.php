<?php

namespace Core;

use PDO;
use App\Config;

class Model{
    public static function getConnection(){
        static $db = null;
        if($db == null){
            $db = new PDO('mysql:host='.Config::HOST.';port='.Config::PORT.';dbname='.Config::DB_NAME, Config::USER, Config::DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
    }
}
