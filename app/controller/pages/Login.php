<?php

namespace App\Controller\Pages;

use App\Model\UserModel;
use \App\Utils\View;

class Login{
  public static function getLogin($request,$error = false){
    
    $status = $error == true ? View::render('/Home/status') : '';
  
    $content = View::render('/Home/index',[
      'status' => $status
    ]);

    return $content;
  }

  public static function setLogin($request){
    $postVars = $request-> getPoastVars();
    $email = $postVars['email'] ?? '';
    $password= $postVars['password'] ?? '';
    
    // $obUser = UserModel::getUserToAuthenticate($email);
    // if(!$obUser instanceof UserModel || !password_verify($password, $obUser->password)){
    //   return self::getLogin($request,true);
    // }
  }
}