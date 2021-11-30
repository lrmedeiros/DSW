<?php 

namespace App\Utils;

class View{

  private static $vars = [];

  public static function init($vars = []){
    self::$vars = $vars;

  }

  private static function getContentView($view){
    $file = include __DIR__.'/../view/resources/pages'.$view.'.php';
    #return file_exists($file) ? file_get_contents($file) : 'n existe';
    return $file;
  }

  public static function render($view, $vars = []){
    $contentView = self::getContentView($view);
    $vars = array_merge(self::$vars,$vars);

    $keys = array_keys($vars);
    $keys = array_map(function($item){
      return '{{'.$item.'}}';
    }, $keys);
    // print_r(array_values($vars)[1]);
    // print_r(str_replace($keys,array_values($vars)[1],$contentView));
    // print_r(str_replace($keys,array_values($vars),$contentView));
    
    return str_replace($keys,array_values($vars),$contentView);
  }
}
