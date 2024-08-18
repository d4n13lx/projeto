<?php

namespace MVC\App\HTTP;

use \Closure;
use \Exception;
use \ReflectionFunction;
use MVC\App\HTTP\Middleware\Queue as MiddlewareQueue;

class Router
{

    /**
     * URL completa do projeto (Raíz do Projeto)
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     * (Aquela pasta que vai estar presente em todas as urls. ex: Sprint)
     * @var string
     */
    private $prefix = '';

    /**
     * Indice de Rotas
     * @var array
     */
    private $router = [];

    /**
     * Instancia de Request
     * @var Request
     */
    private $request;

    /**
     * Metodo Responsavel por iniciar a classe
     * @var string $url
     */
    public function __construct($url)
    {
        $this->request = new Request($this);
        $this->url = $url;
        $this->Setprefix();
    }

    /**
     * Metodo Responsavel por definir o prefixo das rotas 
     */
    private function SetPrefix()
    {
        // Informações da URL Atual
        $parseUrl = parse_url($this->url);

        // Define o prefixo
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Metodo Responsavel por adicionar uma rota a classe
     * @param string $method
     * @param string $router
     * @param array $params
     */
    private function AddRouter($method, $router, $params = [])
    {
        //Validação dos Parametros
        foreach ($params as $Key => $Value) {
            if ($Value instanceof Closure) {
                $params['controller'] = $Value;
                unset($params[$Key]);
                continue;
            }
        }

        //Middlewares da rota
        $params['middlewares'] = $params['middlewares'] ?? [];

        //Variaveis da rota
        $params['variables'] = [];

        //Padrão de validação das variaveis das rotas
        $patternVariable = '/{(.*?)}/';
        if (preg_match_all($patternVariable, $router, $matches)) {
            $router = preg_replace($patternVariable, '(.*?)', $router);
            $params['variables'] = $matches[1];
        }

        //Padrão de Validação da URL
        $patternRouter = '/^' . str_replace('/', '\/', $router) . '$/';

        //Adiciona a nossa rota dentro da classe
        $this->router[$patternRouter][$method] = $params;
    }

    /**
     * Metodo Responsavel por definir uma rota de GET
     * @param string $router
     * @param array $params
     */
    public function Get($router, $params = [])
    {
        unset($_POST);
        return $this->AddRouter('GET', $router, $params);
    }

    /**
     * Metodo Responsavel por definir uma rota de POST
     * @param string $router
     * @param array $params
     */
    public function Post($router, $params = [])
    {
        return $this->AddRouter('POST', $router, $params);
    }

    /**
     * Metodo Responsavel por definir uma rota de PUT
     * @param string $router
     * @param array $params
     */
    public function Put($router, $params = [])
    {
        return $this->AddRouter('PUT', $router, $params);
    }

    /**
     * Metodo Responsavel por definir uma rota de DELETE
     * @param string $router
     * @param array $params
     */
    public function Delete($router, $params = [])
    {
        return $this->AddRouter('DELETE', $router, $params);
    }

    /**
     * Metodo responsavel por retornar a uri sem o prefixo
     * @return string
     */
    private function getUri()
    {
        //URI da Request 
        $uri =  $this->request->getUri();

        //Fatia a URI com o Prefixo
        $Xuri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

        // Retorna a URI sem prefix
        return end($Xuri);
    }

    /**
     * Metodo Responsavel por retornar os dados(os parametros) da rota atual 
     * @return array
     */
    Private function getRoute()
    {
        //URI
        $uri = $this->getUri();

        //Method
        $httpMethod = $this->request->getHttpMethod();

        //Validação das rotas
        foreach ($this->router as $patternRouter => $methods) {
            //Verifica se a URI bate(se emcaixa) com o peadrão
            if (preg_match($patternRouter, $uri, $matches)) {
                //Verifica se o metodo existe
                if (isset($methods[$httpMethod])) {

                    //Removo a primeira posição 
                    unset($matches[0]);
                    //Variaveis Processadas 
                    $key = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($key, $matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;

                    //Retorno dos parametros da rota
                    return $methods[$httpMethod];
                }

                //Metodo não é permitido/Definido
                throw new Exception('Metodo não permitido', 405);
            }
        }

        //Url não encontrada
        throw new Exception('Url não encontrada', 404);
    }

    /**
     * Metodo Responsavel por executar a rota atual
     * @return Response
     */
    public function run()
    {
        try {
            //Obtém a rota atual 
            $route = $this->getRoute();

            //Verifica o controlador para ver se ele realmente existe  
            if (!isset($route['controller'])) {
                throw new Exception('A URL não pode ser processada', 500);
            }

            //Argumentos da função
            $args = [];

            //Reflection
            $reflection = new ReflectionFunction($route['controller']);
            foreach ($reflection->getParameters() as $parameter) {
                $name = $parameter->getName();
                $args[] = $route['variables'][$name] ?? null;
            }

            //Retorna a execução de fila de Middlewares
 return (new MiddlewareQueue($route['middlewares'], $route['controller'], $args))->next($this->request);
        } catch (Exception $e) {
            // Vai retornar o codigo http, ex: 200 ou 404. E vai retornar a Menssagem 
            return new Response($e->getCode(), $e->getMessage());
        }
    }

    /**
     * Metodo responsável por retornar a URL atual
     * @return string
     */
    public function getCurrentUrl()
    {
        return $this->url . $this->getUri();
    }

    /**
     * Metodo responsavel por redirecionar a URL
     * @param string
     */
    public function redirect($route)
    {
        //URL(A url base mais a rota)
        $url = $this->url . $route;
        Header('Location: '.$url); exit;
    }
}
