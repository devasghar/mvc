<?php

namespace App\Controllers;

use App\Models\Main;
use Core\Controller;
use Core\View;

class Posts extends Controller
{
    public function viewAction(){
        $recs = Main::getAll();
        View::twigRender('Home/posts.html', ['title' => 'Posts','recs' => $recs]);
    }

    public function deleteAction(){
        print "Deleting the new post.";
    }

    public function editAction(){
        echo "<p><pre>" .htmlspecialchars(print_r($this->route_params, true)) . "</pre></p>";
    }
}