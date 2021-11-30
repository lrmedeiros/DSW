<?php

namespace App\Http;

class Response{

  private $httpCode = 200;

  private $headers = [];

  private $contentType;

  private $content;

  public function __construct($httpCode,$content,$contentType = null){
    $this->httpCode = $httpCode;
    $this->content = $content;

    if(is_null($contentType)) {
      $this->setContentType('text/html');
    } else {
      $this->setContentType($contentType);
    }
  }

  public function setContentType($contentType){
    $this->contentType = $contentType;
    $this->addHeader('ContentType', $contentType);
   
  }

  public function addHeader($key,$value){
    $this->headers[$key] = $value;
  }

  private function sendHeaders(){
    
    http_response_code($this->httpCode);

    // if(!headers_sent()) {
    //   foreach($this->headers as $key=>$value){
    //     header($key.':'.$value);
    //   }
    // }
  }

  public function sendResponse(){
    $this->sendHeaders();
    switch ($this->contentType) {
      case 'text/html':
        // echo $this->content;
        exit;
      
      case 'application/json':
        // echo json_encode($this->content);  
        exit;
      default:
        break;  
    }
  }
}

?>