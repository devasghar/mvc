<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\View;

class Users extends Controller
{

    public function indexAction(){
        View::twigRender('Admin/users.html', [
            'page_title' => 'MVC Framework | Admin',
            'title' => 'Admin Area',
            'Body' => 'This is the admin area']
         );
    }

    public function before(){
        print "Perform some action before the page is loaded";
    }

    public function after(){
        print "Perform some action after the page is loaded";
    }
}