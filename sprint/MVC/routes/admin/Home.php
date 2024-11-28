<?php
use MVC\App\Controller\Admin;
use MVC\App\HTTP\Response;
use MVC\App\Controller\Pages;

//Rota do Admin
$obrouter->Get('/admin', [
  'middlewares' => [ 
  'required-admin-login'
  ],
  function($request){
    return New Response(200,Admin\Admin::GetAdmin($request));
  }
]);
?>