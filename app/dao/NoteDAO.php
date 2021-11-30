<?php

namespace App\DAO;

use App\Database\Database;

use App\Model\NoteModel;

use Environment;

//carrega as variaveis de ambiente
Environment::load(__DIR__ . '/../../');

class NoteDAO {

  private $connection;

  public function __construct(){
    
    $this->connection = new Database(
      getenv('DB_HOST'),
      getenv('DB_NAME'),
      getenv('DB_USER'),
      getenv('DB_PASSWORD'),
      getenv('DB_PORT'),
      'notes'
    );
    
  }

  public function insertNote($title,$description,$status, $userId){

    $obNote = new NoteModel();

    $obNote->title = $title;
    $obNote->description = $description;
    $obNote->status = $status;
    $obNote->userId = $userId;

    $query = $this->connection->getConnection()->prepare("INSERT INTO notes (title, description, status, userId) VALUES (:title, :description, :status, :userId)");
    
    return $query->execute(array(
      ':title' => "$obNote->title",
      ':description' => "$obNote->description",
      ':status' => "$obNote->status",
      ':userId' => "$obNote->userId"
    ));
  }

  public function updateNote($id,$status){
    $obNote = new NoteModel();
    $obNote->status = strtoupper($status);
    
    $query = $this->connection->getConnection()->prepare("UPDATE notes SET status=:status WHERE id=:id");
    
    return $query->execute([
      'status'=>$status,
      'id'=>$id
    ]);
  }

  public function getAllNotes($userId){
    $query = $this->connection->getConnection()->prepare("SELECT * FROM notes WHERE userId = :userId");

    $query->execute([
      'userId' => $userId
    ]);
    
    $value = $query->fetchAll($this->connection->getConnection()::FETCH_ASSOC);

    return json_encode($value);
  }

  public function deleteNote($id){
    $query = $this->connection->getConnection()->prepare("DELETE FROM notes WHERE id = :id");
    return $query->execute([
      'id' => $id
    ]);
  }
}