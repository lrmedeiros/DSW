<?php

namespace App\Model;

use App\Database\Database;

class NoteModel{
  
  public $id;

  public $userId;

  public $title;

  public $description;

  public $status;

  // public static function getAllNotes(){
  //   $notes = (new Database('notes'))->select(null,null,null,'*')->fetchAll();
  //   return $notes;
  // }
}