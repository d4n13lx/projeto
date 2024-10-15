<?php
use MVC\App\Controller\Pages;
use MVC\App\HTTP\Response;
use MVC\App\Controller\Admin;

//Rota do index
$obrouter->Get('/', [
  function(){
    return New Response(200,Pages\index::GetIndex());
  }
]);

//Rota do casos
$obrouter->Get('/casos', [
  function($request){
    return New Response(200,Pages\Casos::GetCasos($request));
  }
]);

//Rota do Noticias
$obrouter->Get('/noticias', [
  function(){
    return New Response(200,Pages\Noticias::GetNoticias());
  }
]);

//Rota do Cadastro
$obrouter->Get('/cadastro', [
  function($request){
    return New Response(200,Pages\cadastro::Getcadastro($request));
  }
]);
//Rota do cadastro(Insert)
$obrouter->Post('/cadastro', [
  function($request){
    return New Response(200,Pages\cadastro::SetCadastro($request));
  }
]);

//Rota do Admin
$obrouter->Get('/admin', [
  function($request){
    return New Response(200,Admin\Admin::GetAdmin($request));
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

//Rota do Depoimentos
$obrouter->Get('/depoimentos', [
  function($request){
    return New Response(200,Pages\Depoimentos::GetDepoimentos($request));
  }
]);

//Rota do Depoimentos
$obrouter->Post('/depoimentos', [
  function($request){
    return New Response(200,Pages\Depoimentos::InsertTestimony($request));
  }
]);

//Rota do Sobre
$obrouter->Get('/sobre', [
  function($request){
    return New Response(200,Pages\Sobre::GetSobre($request));
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

  //Rota de Logout
  $obrouter->Get('/User/logout', [
   'middlewares' => [
    'required-admin-login'
  ],
    function($request){
      return New Response(200,Admin\Login::setLogout($request));
    }
  ]);


  //Rota do casos por bairro
$obrouter->Get('/casos/bairros', [
  function($request){
    return New Response(200,Pages\Bairro::GetDengue($request));
  }
]);

 //Rota do casos por bairro
 $obrouter->Get('/profile', [
  function($request){
    return New Response(200,Pages\Profile::GetProfile($request));
  }
]);

//Rota do casos por bairro
$obrouter->Post('/profile', [
  function($request){
    return New Response(200,Pages\Profile::UpdateProfile($request));
  }
]);


?>
