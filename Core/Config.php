<?php

namespace Core;

use Dotenv\Dotenv;

class Config {
  public function __construct() {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../Config');
    $dotenv->load();
  }
}