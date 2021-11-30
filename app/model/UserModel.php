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

  
}