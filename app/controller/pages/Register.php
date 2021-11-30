<?php

namespace App\Controller\Pages;

use App\DAO\UserDAO;
use App\Model\UserModel;
use \App\Utils\View;

class Register{
  public static function getRegister(){
    $content = View::render('/Register/index');
    #
    return $content;
  }

  public static function insertNewAccount($request){
    $postVars = $request->getPostVars();
    

    $userDAO = new UserDAO();
    // $obUser = new UserModel();
    // $obUser->email = $postVars['email'];
    // $obUser->password = password_hash($postVars['password'],PASSWORD_DEFAULT);
    // $obUser->register();
    $userDAO->insertUser($postVars['email'], $postVars['password']);
    if($userDAO == true){
      echo('será???');
      exit;
    }
    return self::getRegister($request);
  }
}