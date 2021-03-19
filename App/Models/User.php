<?php

namespace App\Models;

use Core\Model;
use PDO;

class User extends Model {

  public static function getAll() {
    $db = static::getConnection();
    $query = $db->query("SELECT * FROM `users`;");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

}