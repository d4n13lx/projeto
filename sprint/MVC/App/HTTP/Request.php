<?php
namespace  MVC\App\HTTP;

Class Request {

    /**
     * Instancia do router
     * @var Router
     */
    Private $router;
   /**
    * Método HTTP da Requisição
    * @var String 
    */
    Private $httpMethod;

    /**
     * URI da Página
     * @var string
     */
    Private $uri; /*Basicamente é a nossa rota */

    /**
     * Parametros da URL {$_GET}
     * @var array
     */
    private $queryParams = [];

    /**
     * Váriaveis Recebidas no POST da Página {$_POST}
     * @var array
     */
    Private $postVars = [];

    /**
     * Cabeçalho da requisição
     * @var array
     */
    private $headers = [];
    
    /**
     * Construtor da Classe
     */
    public function __construct($router)
    {
        $this->router = $router;
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->setUri();
    }

    /**
     * Metodo responsavel por definir a Uri
     */
    Private  function  setUri()
    {
        //Uri completa(com GETS)
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';

        //Remove Gets das Uris
        $xUri = explode('?', $this->uri);
        $this->uri = $xUri[0];
    }
    /**
     * Metodo responsavel por retornar a instancia do router
     * @return Router router
     */
    Public function GetRouter()
    {
        return $this->router;
    }

    /**
     * Metodo Responsável por retornar o Metodo Http da Requisição
     * (Básicamente o encapsulamento que fazemos em Poo)
     *  @return string 
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

     /**
     * Metodo Responsável por retornar a URI da Requisição
     * (Básicamente o encapsulamento que fazemos em Poo)
     *  @return string 
     */
    public function getUri()
    {
        return $this->uri;
    }

    

     /**
     * Metodo Responsável por retornar os Headers da Requisição
     * (Básicamente o encapsulamento que fazemos em Poo)
     *  @return array 
     */
    public function getheaders()
    {
        return $this->headers;
    }

     /**
     * Metodo Responsável por retornar os Parametros da URL da Requisição
     * (Básicamente o encapsulamento que fazemos em Poo)
     *  @return array 
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

     /**
     * Metodo Responsável por retornar as váriaveis POST da Requisição
     * (Básicamente o encapsulamento que fazemos em Poo)
     *  @return array 
     */
    public function getPostVars()
    {
        return $this->postVars;
    }
}
?>










