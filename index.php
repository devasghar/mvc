<?php

use Core\Config;
use Core\Router;

require './Vendor/autoload.php';

$config = new Config();

$router = new Router();
$router->add('', ['controller'=> 'Home', 'action' => 'index', 'namespace' => 'Home']);
$router->add('config', ['controller'=> 'Home', 'action' => 'config', 'namespace' => 'Home']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);


/*
 * Setting Error & Exception Handler
 */

set_error_handler('\Core\Error::errorHandler');
set_exception_handler('\Core\Error::exceptionHandler');

$router->dispatch($_SERVER['QUERY_STRING']);
