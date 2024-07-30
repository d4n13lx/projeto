<?php
require __DIR__ . '/../vendor/autoload.php';

use MVC\Utils\view;
use WilliamCosta\DotEnv\Environment;
use WilliamCosta\DatabaseManager\Database;
use MVC\App\HTTP\Middleware\Queue as MiddlewareQueue;

//Carrega as váriaveis de ambiente
Environment::load(__DIR__.'/../');

//Define as configurações de Banco de Dados
Database::config(
      getenv('DB_HOST'),
      getenv('DB_NAME'),
      getenv('DB_USER'),
      getenv('DB_PASS'),
      getenv('DB_PORT')

);

//Define a constante da URL
Define('URL',getenv('URL'));

//Definir o padrão das variáveis
view::init([
'URL'=> URL
]);

// Define o mapeamento de Middlewares
MiddlewareQueue::setMap([
  'maintenence' => \MVC\App\HTTP\Middleware\Maintenence::class // Adicione esta linha
]);

//Define o mapeamento de Middlewares
MiddlewareQueue::setDefault([
  'maintenence'
]);
?>