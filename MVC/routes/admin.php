<?php
use MVC\App\Controller\Admin;
use MVC\App\HTTP\Response;

//Rota do Admin
$obrouter->Get('/admin', [
  function(){
    return New Response(200,'Admin :)');
  }
]);

//Rota do Login do Admin
$obrouter->Get('/admin/login', [
    function($request){
      return New Response(200,Admin\Login::getLogin($request));
    }
  ]);

  //Rota do Login do Admin(POST)
$obrouter->Post('/admin/login', [
    function($request){
     
      return New Response(200,Admin\Login::setLogin($request));
    }
  ]);
?>