<?php

namespace App\Controllers\Home;

use \Core\View;
use App\Models\Main;

class Home extends \Core\Controller
{
    public function indexAction(){
        $recs = Main::getAll();
        View::twigRender('Home/index.html', [
            'page_title' => 'MVC Framework',
            'title' => 'Hello',
            'Body' => 'Some page body looks like this',
            'recs' => $recs,
        ]);
    }

    protected function before(){
        print "(before)";
    }

    protected function after(){
        print "(After)";
    }
}