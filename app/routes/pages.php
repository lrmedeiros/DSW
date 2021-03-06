<?php

use App\Controller\Pages;
use App\Http\Response;


$obRouter->get('/',[
  function($request){
    return new Response(200,Pages\Login::getLogin($request), [
      'status' => ''
    ]);
  }
]);

$obRouter->post('/',[
  function($request){
    return new Response(200,Pages\Login::setLogin($request));
  }
]);

$obRouter->get('/kanban',[
  function(){
    return new Response(200,Pages\Kanban::getKanban());
  }
]);

$obRouter->get('/register',[
  function(){
    return new Response(200,Pages\Register::getRegister());
  }
]);

$obRouter->post('/register',[
  function($request){
    return new Response(200,Pages\Register::insertNewAccount($request));
  }
]);

$obRouter->get('/sobre',[
  function(){
    return new Response(200,Pages\About::getAbout());
  }
]);

$obRouter->post('/notes/list',[
  function($request){
    return new Response(200,Pages\Notes::getNotes($request),'application/json');
  }
]);

$obRouter->post('/notes',[
  function($request){
    return new Response(200,Pages\Notes::insertNote($request),'application/json');
  }
]);

$obRouter->put('/notes',[
  function($request){
    return new Response(200,Pages\Notes::updateNotes($request),'application/json');
  }
]);

$obRouter->delete('/notes',[
  function($request){
    return new Response(200,Pages\Notes::deleteNote($request),'application/json');
  }
]);


// $obRouter->get('/',[
//   function($request){
//     return new Response(200,Pages\Login::getLogin($request), [
//       'status' => ''
//     ]);
//   }
// ]);

// $obRouter->post('/',[
//   function($request){
//     return new Response(200,Pages\Login::setLogin($request));
//   }
// ]);



// $obRouter->get('/register',[
//   function(){
//     return new Response(200,Pages\Register::getRegister());
//   }
// ]);

// $obRouter->post('/register',[
//   function($request){
//     return new Response(200,Pages\Register::insertNewAccount($request));
//   }
// ]);