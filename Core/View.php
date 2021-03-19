<?php

namespace Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View {

  public static function twigRender($template, $args = []) {
    static $twig = NULL;
    if ($twig == NULL) {
      $loader = new FilesystemLoader('App/Views');
      $twig = new Environment($loader);
    }

    print $twig->render($template, $args);
  }

}