<?php
namespace MVC\App\HTTP\Middleware;

use Closure;

Class Queue
{
    /**
     * Mapeamento de middlewares
     * @var array
     */
    Private Static $map = [];

    /**
     * Mapeamento de middlewares que serão carregados em todas as rotas
     * @var array
     */
    Private static $default = [];

    /**
     * Fila de Middlewares a serem executados 
     * @var array
     */
    Private $middlewares = [];


    /**
     * Função de execução do controlador(Clossure)
     * @var Closure 
     */
    Private $controller;

    /**
     * Argumentos da função do controlador
     * @var array
     */
    Private $controllerArgs = [];

    /**
     * Metodo responsável por construir a classe de fila de Middlewares
     * @var array $middlewares
     * @var Clossure $controller
     * @var array $controllerArgs
     */
    Public Function __construct($middlewares,$controller,$controllerArgs)
    {
        if (!is_array($middlewares)) {
        $middlewares = [$middlewares]; // Converte para array se for uma string
    }
        $this->middlewares = array_merge(self::$default,$middlewares);
        $this->controller = $controller;
        $this->controllerArgs = $controllerArgs;
    }

   /**
    * Metodo responsavel por definir o mapeamento de middlewares
    @param array
    */
    Public static function setMap($map)
    {
        //Usa Self porque é um static
        Self::$map = $map;
    }

     /**
    * Metodo responsavel por definir o mapeamento de middlewares padrões
    @param array
    */
    Public static function setDefault($default)
    {
        //Usa Self porque é um static
        Self::$default = $default;
    }

    /**
     * Metodo responsavel por executar o proximo nivel da fila de Middlewares
     * @param Request
     * @return Response
     */
    Public function next($request)
    {
       //Verifica se a fila está vazia
       if(empty($this->middlewares))
       {
        return call_user_func_array($this->controller,$this->controllerArgs);
       } 

       //Middleware
       $middleware = array_shift($this->middlewares);

       //Verifica o mapeamento 
       if(!isset(self::$map[$middleware]))
       {
              throw new \Exception("Problemas ao processar o middleware da requisição", 500);
              
       }

       //NEXT
       $queue = $this;
       //$request é o argumento de $next
       $next = function($request) use($queue)
       { 
        return $queue->next($request);
       };

       return (new self::$map[$middleware])->handle($request,$next);
    }
}
?>