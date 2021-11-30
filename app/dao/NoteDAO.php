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

  public function insertNote($title,$description,$status){

    $obNote = new NoteModel();

    $obNote->title = $title;
    $obNote->description = $description;
    $obNote->status = $status;
    $query = $this->connection->getConnection()->prepare("INSERT INTO notes (title, description, status) VALUES (:title, :description, :status)");
    
    return $query->execute(array(
      ':title' => "$obNote->title",
      ':description' => "$obNote->description",
      ':status' => "$obNote->status"
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

  public function getAllNotes(){
    $query = $this->connection->getConnection()->prepare("SELECT * FROM notes");
    $query->execute();
    
    return $query->fetchAll($this->connection->getConnection()::FETCH_ASSOC);
  }

  public function deleteNote($id){
    $query = $this->connection->getConnection()->prepare("DELETE FROM notes WHERE id = :id");
    return $query->execute([
      'id' => $id
    ]);
  }
}