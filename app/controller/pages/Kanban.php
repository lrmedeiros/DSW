<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Kanban{
  public static function getKanban(){
    $content = View::render('/Kanban/index');
    #
    return $content;
  }

  
}