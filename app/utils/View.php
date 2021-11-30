<?php 

namespace App\Utils;

class View{

  private static $vars = [];

  public static function init($vars = []){
    self::$vars = $vars;

  }

  private static function getContentView($view){
    $file = include __DIR__.'/../view/resources/pages'.$view.'.php';

    return $file;
  }

  /*
    Função que renderiza a página pegando as variáveis da request,
    separando as chaves dos valores e substituindo na string. 
  */

  public static function render($view, $vars = []){
    $contentView = self::getContentView($view);
    $vars = array_merge(self::$vars,$vars);

    $keys = array_keys($vars);
    $keys = array_map(function($item){
      return '{{'.$item.'}}';
    }, $keys);
    
    return str_replace($keys,array_values($vars),$contentView);
  }
}
