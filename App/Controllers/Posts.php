<?php

namespace App\Controllers;

class Posts extends \Core\Controller
{
    public function addAction(){
        print "Adding the new post.";
    }

    public function deleteAction(){
        print "Deleting the new post.";
    }

    public function editAction(){
        echo "<p><pre>" .htmlspecialchars(print_r($this->route_params, true)) . "</pre></p>";
    }
}