<?php

namespace App\Http;

use \Closure;
use Exception;
use \ReflectionFunction;

class Router{

  private $url = '';

  private $prefix = '';

  private $routes = [];

  private $request;

  public function __construct($url){
    $this->request = new Request($this);
    $this->url = $url;
    $this->setPrefix();
  }

  private function setPrefix(){
    $parseUrl = parse_url($this->url);
    
    //define o prefixo pra '/mvc'
    $this->prefix = $parseUrl['path'] ?? '';
  }

  private function addRoute($method,$route,$params = []){
      
    foreach($params as $key=>$value){
      if($value instanceof Closure){
        $params['controller'] = $value;
        unset($params[$key]);
        continue;
      }
    }

    //variáveis da rota
    $params['variables'] = [];

    //padrão de validação das  variáveis das rotas
    $patternVariable = '/{(.*?)}/';

    if(preg_match_all($patternVariable,$route,$matches)){
      $route = preg_replace($patternVariable,'(.*?)',$route);
      $params['variables'] = $matches[1];
    }
    //padrão de validação da URL
    $patternRoute = '/^'.str_replace('/','\/',$route).'$/';

    $this->routes[$patternRoute][$method] = $params;
    //print_r($this->routes);
  }

    //adiciona a rota dentro da classe
  public function get($route,$params=[]){
    return $this->addRoute('GET',$route,$params);
  }

  public function post($route,$params=[]){
    return $this->addRoute('POST',$route,$params);
  }

  public function put($route,$params=[]){
    return $this->addRoute('PUT',$route,$params);
  }

  public function delete($route,$params=[]){
    return $this->addRoute('DELETE',$route,$params);
  }

  private function getUri(){
    // URI da request
    $uri = $this->request->getUri();
    //fatia a uri com o prefixo
    $xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];
    //retorna a uri sem prefixo
    return end($xUri);
  }

  private function getRoute() {
    $uri = $this->getUri();

    $httpMethod = $this->request->getHttpMethod();
    //print_r($httpMethod);
    //valida as rotas
    foreach($this->routes as $patternRoute=>$methods){
      if(preg_match($patternRoute,$uri,$matches)){
        if(isset($methods[$httpMethod])){
          //retorno dos parametros da rota
          unset($matches[0]);
          //variaveis processadas
          $keys = $methods[$httpMethod]['variables'];
          $methods[$httpMethod]['variables'] = array_combine($keys,$matches);
          $methods[$httpMethod]['variables']['request'] = $this->request;
          return $methods[$httpMethod];
        }

        throw new Exception("Método não permitido"  , 405);
      }
      
    }

    throw new Exception("URL não encontrada", 404);
  }

  public function run(){
    try{
      $route = $this->getRoute();
      if(!isset($route['controller'])){
        throw new Exception("A URL não pôde ser processada", 500);
      }
      //argumentos da função
      $args = [];

      $reflection = new ReflectionFunction($route['controller']);
      foreach($reflection->getParameters() as $parameter){
        $name = $parameter->getName();
        $args[$name] = $route['variables'][$name] ?? '';
      }
      
      //executa o closure
      return call_user_func_array($route['controller'],$args);
    }catch(Exception $e){
      return new Response($e->getCode(),$e->getMessage());
    }
  }

  public function getCurrentUrl(){
    return $this->url.$this->getUri();
  }
}
?>

