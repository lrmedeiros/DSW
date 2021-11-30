<?php

namespace App\Model;

use App\Database\Database;

class UserModel{
  
  public $id;

  public $email;

  public $password;

  

  // public function register(){
  //   $this->id = (new Database('users'))->insert([
  //     'email' => $this->email,
  //     'password' => $this->password
  //   ]);
  //   return true;
  // }

  // public function getUserToAuthenticate($email){
  //   $user = (new Database('users'))->select('email = "'.$email.'"')->fetchObject(self::class);
  //   return $user;
  // }
}