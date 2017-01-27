<?php
/**
 * Created by PhpStorm.
 * User: jhon
 * Date: 1/26/17
 * Time: 2:04 AM
 */

namespace Core;


class View
{
    public static function render($view, $args = []){
        extract($args);
        $file = "../App/Views/{$view}";
        if(is_readable($file)){
            require $file;
        }else{
            throw new \Exception("File {$file} not found");
        }
    }

    public static function twigRender($template, $args = []){
        static $twig = null;
        if($twig == null){
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
        }

        print $twig->render($template, $args);
    }
}