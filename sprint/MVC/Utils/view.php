<?php
namespace MVC\Utils;

Class view {

    /**
     * Váriaveis padrões da view
     * @var array
     */
    Private static $vars = [];

    /**
     * Metodo responsavel por definir os dados iniciais da classe
     * @param array $vars 
     */
    Public static function init($vars = [])
    {
        self::$vars = $vars;
    }

    Private static function getContentView($view)
    {
        $file = __DIR__.'/../Resources/View/Pages/'.$view.'.html';
        return file_exists($file)?file_get_contents($file):'';
    }

    Public static function render($view, $vars = [])
    {
          //Conteudo da view
          $content_view = self::getContentView($view);
          //Merge de variaveis da view
          $vars = array_merge(self::$vars,$vars);
           // Substituição das variáveis no conteúdo da view
        foreach ($vars as $key => $value) {
            $content_view = str_replace('{{' . $key . '}}', $value, $content_view);
        }
          return $content_view;
    }
}
?>