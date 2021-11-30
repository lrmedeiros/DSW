<?php

namespace App\Model;

use App\Database\Database;

class NoteModel{
  
  public $id;

  public $title;

  public $description;

  public $status;

  public $userId;

  // public static function getAllNotes(){
  //   $notes = (new Database('notes'))->select(null,null,null,'*')->fetchAll();
  //   return $notes;
  // }
}