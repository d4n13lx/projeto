<?php

namespace MVC\App\Session\Admin;

class Login
{
    /**
     * Metodo responsavel por iniciar a sessao
     */
    private static function init()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    /**
     * Metodo responsável por criar o login do usuário
     * @param User
     * @return boolean
     */
    Public static function login($OBuser)
    {
        
        self::init();

        //Define a sessao do usuario
        $_SESSION['admin']['usuario'] = [
            'id' => $OBuser->id,
            'nome' => $OBuser->nome,
            'email' => $OBuser->email
        ];

      // Sucesso
        return true;
        
    }
    /**
     * Metodo responsável por verificar se o usuário ta logado
     * @return boolean 
     */
    Public static Function isLogged()
    {
        //Inicia a sessão
          self::init();

          //Retorna a verificação
          return isset($_SESSION['admin']['usuario']['id']);

    }

    /**
     * Metodo responsavel por executar o logout do usuário
     * @return boolean
     */
    Public static function logout()
    {
        //Inicia a sessão
        self::init();

        //Desloga o usuário
        unset($_SESSION['admin']['usuario']);
         
        //Sucesso
        return true;
    }
}
