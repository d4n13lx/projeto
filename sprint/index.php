<?php

require __DIR__.'/includes/app.php';
use MVC\App\HTTP\Router;

// Inicia o router
$obrouter = new Router(URL);

// Inclui as rotas das Paginas 
include __DIR__.'/MVC/routes/Pages.php';

// Inclui a rota do painel
include __DIR__.'/MVC/routes/admin.php';

// Inclui as rotas da API
include __DIR__.'/MVC/routes/api.php';

//Imprime o Response da Rota 
$response = $obrouter->run();
$response->SendResponse();

?>
