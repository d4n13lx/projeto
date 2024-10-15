<?php 
use MVC\App\HTTP\Response;
use MVC\App\Controller\Api;

$obrouter->get('/api/v1',[
    function($request){
        return new Response(200, Api\Api::getDetails($request),'application/json');
    }
]);
?>