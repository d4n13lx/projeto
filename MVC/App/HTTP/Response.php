<?php
namespace  MVC\App\HTTP;

Class Response{

    /**
     * Codigo do Status HTTP
     * @var integer
     */
    Private $httpCode = 200;   

    /**
     * Cabeçalho do Response
     * @var array
     */
    Private $Headers = [];

    /**
     * Tipo de Conteudo que está sendo retornado
     * @var string
     */
    Private $contentType = 'text/html';

    /**
     * Conteudo do Response
     *  @var mixed
     */
    Private $conteudo;

    /**
     * Metodo Responsável por iniciar as classes e definir os valores
     * @param integer httpCode
     * @param string conteudo
     * @param mixed contentType
     */
    public function __construct($httpCode,$conteudo,$contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->conteudo = $conteudo;
        $this->SetContentType($contentType);
    }

    /**
     * Metodo Responsável por alterar o content Type do Response
     * @param string $contentType
     */
    Public function SetContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type',$contentType);
    }

    /**
     * Metodo Responsável por adicionar um registro no Cabeçalho de Response
     * @param string $key
     * @param string $value
     */
    Public function addHeader($key,$value)
    {
        $this->Headers[$key] = $value;
    }

    /**
     * Metodo Responsavel por enviar os Headers para o Navegador 
     */
    Private function SendHeaders()
    {
        //Status
        http_response_code($this->httpCode);

        // ENVIAR HEADERS

        Foreach($this->Headers as $Key=>$Value)
        {
              header($Key.': '.$Value);
        }
    }

    /**
     * Metodo Responsável por enviar a resposta para o Usuário
     */
    public function SendResponse()
    {
        //Envia os Headers
        $this->SendHeaders();

        //Imprime o Conteudo
        switch ($this->contentType)
         {
            case 'text/html':
             echo $this->conteudo;
            exit;
            
        }
    }

}
ob_start();
?>