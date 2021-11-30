<?php

namespace App\Controller\Pages;

use App\DAO\UserDAO;
use App\Model\UserModel;
use \App\Utils\View;

class Register{
  public static function getRegister(){
    $content = View::render('/Register/index');
  
    return $content;
  }

  public static function insertNewAccount($request){
    $postVars = $request->getPostVars();

    $userDAO = new UserDAO();
    $userDAO->insertUser($postVars['email'], $postVars['password']);

    $content = View::render('/Home/index');
    
    return Pages\Login::getLogin();
  }
}