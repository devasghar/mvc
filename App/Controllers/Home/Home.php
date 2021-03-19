<?php

namespace App\Controllers\Home;

use Core\Controller;
use \Core\View;

class Home extends Controller
{
    public function indexAction(){
        View::twigRender('Home/index.html', [
            'page_title' => 'MVC Framework',
            'title' => 'Welcome To MVC <small> {Model | View | Controller} </small>',
        ]);
    }

    public function config(){
        View::twigRender('Home/config.html', [
            'page_title' => 'Configuration',
            'title' => 'MVC <small> Configuration </small>',
        ]);
    }

    protected function before(){

    }

    protected function after(){
    }
}