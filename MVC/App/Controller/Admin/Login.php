<?php
namespace MVC\App\Controller\Admin;

use MVC\Utils\view;
use MVC\App\Model\entity\User;
use MVC\App\Session\Admin\Login as SessionAdminLogin;

class Login extends Page
{
    /**
     * Summary of getLogin
     * @param Request $request
     * @param string $errorMessage
     * @return string
     */
    public static function getLogin($request, $errorMessage = null)
    {
        $status = !is_null($errorMessage) ? view::render('admin/login/status', [
            'mensagem' => $errorMessage
        ]) : '';

        return view::render('admin/login', [
            'status' => $status
        ]);
    }

    public static function setLogin($request)
    {
        // Post Vars (O que foi armazenado no Post do forms)
        $PostVars = $request->getPostVars();
        $email = $PostVars['email'] ?? '';
        $senha = $PostVars['senha'] ?? '';

        // Busca o usuário pelo e-mail
        $Obuser = User::getUserByEmail($email);

        if(!$Obuser instanceof User) {
            return self::getLogin($request,'E-mail invalido');
        }
        $senha = '123456';
        $hash = '$2y$10$4nA3pEeZuE1G1ovYkEZg6u6NEKBta1qdnIOjTbMESWlNtYLOvQCu6';
        // Adicione logs ou prints para verificar o valor das variáveis
        
        echo "<pre>";
        print_r($hash);
        echo "</pre>";

        if (password_verify('123456', $hash)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
        if (!password_verify($senha, $hash)) {
           
            return self::getLogin($request, 'Senha inválida');
        }
        else {
            SessionAdminLogin::login($Obuser);
            print_r($_SESSION);
        }

          


     
        // Criar sessão de login

    }
}
