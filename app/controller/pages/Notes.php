<?php

namespace App\Controller\Pages;

use App\DAO\NoteDAO;
use App\Http\Response;
use App\Model\NoteModel;
use \App\Utils\View;

class Notes{
  public static function getNotes($request){
    $noteDAO = new NoteDAO();
    $allNotes = $noteDAO->getAllNotes();
    
    return $allNotes;   
  }

  public static function insertNote($request){
    $jsonRequest = file_get_contents('php://input');
    $decodedData = json_decode($jsonRequest);
    
    $noteDAO = new NoteDAO();

    return $noteDAO->insertNote($decodedData->title,$decodedData->description,$decodedData->section);
  }

  public static function updateNotes($request){
    $jsonRequest = file_get_contents('php://input');
    $decodedData = json_decode($jsonRequest);
    $noteDAO = new NoteDAO();
    $updateNote = $noteDAO->updateNote($decodedData->id,$decodedData->dropzoneName);
    return $updateNote; 
  }

  // public static function setNotes($request){
  //   $postVars = $request-> getPoastVars();
  //   $email = $postVars['email'] ?? '';
  //   $password= $postVars['password'] ?? '';
    
  //   $obUser = UserModel::getUserToAuthenticate($email);
  //   if(!$obUser instanceof UserModel || !password_verify($password, $obUser->password)){
  //     return self::getNotes($request,true);
  //   }
  // }
}