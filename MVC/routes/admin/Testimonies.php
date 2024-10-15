<?php
use MVC\App\Controller\Admin;
use MVC\App\HTTP\Response;


//Rota do Depoimentos do Admin
$obrouter->Get('/admin/Testimonies', [
    'middlewares' => [ 
    'required-admin-login'
    ],
    function($request){
      return New Response(200,Admin\Testimony::getTestimony($request));
    }
  ]);

  //Rota de cadastro de novo depoimentos do Admin
$obrouter->Get('/admin/Testimonies/new', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request){
    return New Response(200,Admin\Testimony::getNewTestimony($request));
  }
]);

//Rota de cadastro de Post depoimentos do Admin
$obrouter->Post('/admin/Testimonies/new', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request){
    return New Response(200,Admin\Testimony::setNewTestimony($request));
  }
]);

 //Rota de cadastro de novo depoimentos do Admin
 $obrouter->Get('/admin/Testimonies/{id}/edit', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request,$id){
    return New Response(200,Admin\Testimony::getEditTestimony($request,$id));
  }
]);
//Rota de cadastro de Post da atualização depoimentos do Admin
$obrouter->Post('/admin/Testimonies/{id}/edit', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request,$id){
    return New Response(200,Admin\Testimony::setEditTestimony($request,$id));
  }
]);

//Rota de exclusão de novo depoimentos do Admin
$obrouter->Get('/admin/Testimonies/{id}/delete', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request,$id){
    return New Response(200,Admin\Testimony::getDeleteTestimony($request,$id));
  }
]);

//Rota de exclusão de novo depoimentos do Admin(post)
$obrouter->Post('/admin/Testimonies/{id}/delete', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request,$id){
    return New Response(200,Admin\Testimony::setDeleteTestimony($request,$id));
  }
]);



?>