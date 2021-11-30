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


$obRouter->get('/notes',[
  function($request){
    return new Response(200,Pages\Notes::getNotes($request),'application/json');
  }
]);

$obRouter->post('/notes',[
  function($request){
    
    return new Response(200,Pages\Notes::updateNotes($request),'application/json');
  }
]);


// $obRouter->post('/depoimentos',[
//   function($request){
//     return new Response(200,Pages\Testimony::insertTestimony($request));
//   }
// ]);

// $obRouter->get('/pagina/{idPagina}/{acao}',[
//   function($idPagina,$acao){
//     return new Response(200,'Página '.$idPagina.' '.$acao);
//   }
// ]);
