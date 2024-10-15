<?php
use MVC\App\Controller\Admin;
use MVC\App\HTTP\Response;


//Rota de Listagem de usuarios 
$obrouter->Get('/admin/Users', [
    'middlewares' => [ 
    'required-admin-login'
    ],
    function($request){
      return New Response(200,Admin\User::getUser($request));
    }
  ]);

//Rota de exclusão de novo usuário
$obrouter->Get('/admin/Users/{id}/delete', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request,$id){
    return New Response(200,Admin\User::getDeleteUser($request,$id));
  }
]);

//Rota de exclusão de novo usuario(post)
$obrouter->Post('/admin/Users/{id}/delete', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request,$id){
    return New Response(200,Admin\User::setDeleteUser($request,$id));
  }
]);



?>