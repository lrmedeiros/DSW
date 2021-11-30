<?php

namespace App\DAO;

use App\Database\Database;
use App\Database\DatabaseConnection;
use App\Model\UserModel;
use Environment;


//carrega as variaveis de ambiente
Environment::load(__DIR__ . '/../../');

class UserDAO{

  private $connection;

  public function __construct(){
    
    $this->connection = new Database(
      getenv('DB_HOST'),
      getenv('DB_NAME'),
      getenv('DB_USER'),
      getenv('DB_PASSWORD'),
      getenv('DB_PORT'),
      'users'
    );
    
  }

  public function insertUser($email,$password){

    $obUser = new UserModel();

    $obUser->email = $email;
    $obUser->password = password_hash($password, PASSWORD_DEFAULT);
    $query = $this->connection->getConnection()->prepare("INSERT INTO users (email, password) VALUES (:email,:password)");
    $query->execute(array(
      ':email' => "$obUser->email",
      ':password' => "$obUser->password"
    ));
    
    return true;
  }

  
}