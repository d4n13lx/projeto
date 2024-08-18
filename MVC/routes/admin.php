<?php
use MVC\App\Controller\Admin;
use MVC\App\HTTP\Response;
use MVC\App\Controller\Pages;

//Rota do Admin
$obrouter->Get('/admin', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function(){
    return New Response(200,Pages\Admin::getAdmin());
  }
]);

//Rota do Login do Admin
$obrouter->Get('/admin/login', [
  'middlewares' => [
    'required-admin-logout'
  ],
    function($request){
      return New Response(200,Admin\Login::getLogin($request));
    }
  ]);

  //Rota do Login do Admin(POST)
$obrouter->Post('/admin/login', [
  'middlewares' => [
    'required-admin-logout'
  ],
    function($request){
     
      return New Response(200,Admin\Login::setLogin($request));
    }
  ]);
  
  //Rota de Logout
  $obrouter->Get('/admin/logout', [
   'middlewares' => [
    'required-admin-login'
  ],
    function($request){
      return New Response(200,Admin\Login::setLogout($request));
    }
  ]);
?>