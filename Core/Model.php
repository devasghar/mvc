<?php

namespace Core;

use PDO;

class Model {

  public static function getConnection() {
    static $db = NULL;
    if ($db == NULL) {
      $db = new PDO(
        'mysql:host=' . $_ENV['HOST'] . ';port=' . $_ENV['PORT'] . ';dbname=' . $_ENV['DB_NAME'],
        $_ENV['USER'],
        $_ENV['DB_PASS']
      );
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $db;
    }
  }

}
