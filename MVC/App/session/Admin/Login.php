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
    public static function login($OBuser)
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
}
