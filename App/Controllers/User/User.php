<?php

namespace App\Controllers\User;

use App\Models\User as UserModel;
use Core\Controller;
use Core\View;

class User extends Controller {
  public function index() {
    $recs = UserModel::getAll();
    View::twigRender('Users/index.twig.html', ['title' => 'Users','recs' => $recs]);
  }
}