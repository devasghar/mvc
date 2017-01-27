<?php

namespace App\Controllers\Home;

use \Core\View;

class Home extends \Core\Controller
{
    public function indexAction(){
        View::twigRender('Home/index.html', [
            'page_title' => 'MVC Framework',
            'title' => 'Welcome To MVC <small> {Model | View | Controller} </small>',
        ]);
    }

    protected function before(){

    }

    protected function after(){
    }
}