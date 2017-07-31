<?php

/*
 * Twig Templating
 */
require_once 'Vendor/Twig-1.30.0/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

spl_autoload_register(function($class){
    $root = dirname(__DIR__);
    $file =  str_replace('\\', '/', $class) . '.php';
    if(is_readable($file)){
        require $file;
    }
});

$router = new Core\Router();
$router->add('', ['controller'=> 'Home', 'action' => 'index', 'namespace' => 'Home']);
$router->add('config', ['controller'=> 'Home', 'action' => 'config', 'namespace' => 'Home']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}'); content/123/edit
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);


/*
 * Setting Error & Exception Handler
 */

set_error_handler('\Core\Error::errorHandler');
set_exception_handler('\Core\Error::exceptionHandler');

$router->dispatch($_SERVER['QUERY_STRING']);
