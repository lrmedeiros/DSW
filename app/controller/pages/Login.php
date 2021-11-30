<?php

namespace App\Controller\Pages;

use App\DAO\UserDAO;
use App\Model\UserModel;
use \App\Utils\View;

error_reporting(0);
class Login{
  public static function getLogin($request,$error = false){
    
    $status = $error == true ? View::render('/Home/status') : '';
  
    $content = View::render('/Home/index',[
      'status' => $status
    ]);

    return $content;
  }

  public static function setLogin($request){
    $postVars = $request-> getPostVars();
    $email = $postVars['email'] ?? '';
    $password= $postVars['password'] ?? '';
    
    $userDao = new UserDAO();
    $obUser = $userDao->getUserToAuthenticate($email);
    if(!$obUser instanceof UserModel || !password_verify($password, $obUser->password)){
      return self::getLogin($request,true);
    }
  }
}