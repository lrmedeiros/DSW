<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class About{
  public static function getAbout(){
    $content = View::render('/AboutUs/index');
    #
    return $content;
  }

  
}