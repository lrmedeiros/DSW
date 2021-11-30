<?php

namespace App\Database;

use \PDO;
use \PDOException;

class Database{

  

  private $connection;
  
  public function __construct($host,$name,$user,$pass,$port,$table){
    
    $this->setConnection($host,$name,$user,$pass,$port,$table);
  }

  /**
   * Método responsável por criar uma conexão com o banco de dados
   */
  private function setConnection($host,$name,$user,$pass,$port,$table){
    try{
      $this->connection = new PDO('mysql:host='.$host.';dbname='.$name.';port='.$port,$user,$pass);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  public function getConnection(){
    return $this->connection;
  }

}