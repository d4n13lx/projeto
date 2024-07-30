<?php
use MVC\App\Controller\Pages;
use MVC\App\HTTP\Response;

//Rota do Home
$obrouter->Get('/', [
  function(){
    return New Response(200,Pages\Home::GetHome());
  }
]);


//Rota do Cadastro
$obrouter->Get('/cadastro', [
  function(){
    return New Response(200,Pages\Cadastro::GetCadastro());
  }
]);

//Rota do Depoimentos
$obrouter->Get('/depoimentos', [
  function($request){
    return New Response(200,Pages\Testimony::GetTestimonies($request));
  }
]);

//Rota do Depoimentos(Insert)
$obrouter->Post('/depoimentos', [
  function($request){
    return New Response(200,Pages\Testimony::InsertTestimony($request));
  }
]);

?>