<?php 
 
use MVC\App\HTTP\Response;
use MVC\App\Controller\Api;

// Rota de listagem de depoimentos
$obrouter->get('/api/v1/testimonies',[
    function($request){
        return new Response(200, Api\Testimony::getTestimonies($request),'application/json');
    }
]);

// Rota de consulta individual de depoimentos
$obrouter->get('/api/v1/testimonies/{id}',[
    function($request, $id){
        return new Response(200, Api\Testimony::getTestimony($request, $id),'application/json');
    }
]);

?>