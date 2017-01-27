<?php

namespace Core;

class View
{
    public static function twigRender($template, $args = []){
        static $twig = null;
        if($twig == null){
            $loader = new \Twig_Loader_Filesystem('App/Views');
            $twig = new \Twig_Environment($loader);
        }

        print $twig->render($template, $args);
    }
}