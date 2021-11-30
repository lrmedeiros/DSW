<?php

namespace App\Controller\Pages;

use App\DAO\UserDAO;
use App\Model\UserModel;
use \App\Utils\View;
use App\Controller\Pages;


class Login{
  public static function getLogin($request,$error = false) {
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
    $userPassword = $obUser -> password;
    $userId = $obUser -> id;

    $correct = crypt($password, '$2a$07$usesomesillystringforsalt$');

   if (hash_equals($userPassword, $correct)) {
     echo "<script defer>document.write(localStorage.setItem('userId', '".$userId."'))</script>";
     return Pages\Kanban::getKanban();
   }

   echo '<script>alert("E-mail ou senha inválido")</script>';

    return self::getLogin($request);
  }
}