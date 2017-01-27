<?php

namespace App\Controllers\Admin;

use Core\View;

class Users extends \Core\Controller
{

    public function indexAction(){
        View::twigRender('Admin/users.html', [
            'page_title' => 'MVC Framework | Admin',
            'title' => 'Admin Area',
            'Body' => 'This is the admin area']
         );
    }

    public function before(){
        print "(Before)";
    }

    public function after(){
        print "(After)";
    }
}