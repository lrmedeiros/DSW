<?php

namespace App\Controller\Pages;

use App\DAO\NoteDAO;


class Notes{
  public static function getNotes($request){
    $noteDAO = new NoteDAO();

    return $noteDAO->getAllNotes();
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
     
    return $noteDAO->updateNote($decodedData->id,$decodedData->dropzoneName);
  }

  public static function deleteNote($request){
    $jsonRequest = file_get_contents('php://input');
    $decodedData = json_decode($jsonRequest);
    $noteDAO = new NoteDAO();
    return $noteDAO->deleteNote($decodedData->id);
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