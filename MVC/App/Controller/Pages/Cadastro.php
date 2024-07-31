<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/

class Cadastro
{

    public static function GetCadastro()
    {
        return view::render('cadastro');
    }
}


/*
require_once("../../Model/Conexao_Class.php");
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = md5($_POST['senha']);
    $csenha = md5($_POST['csenha']);

    $select = "SELECT * FROM user_form WHERE email ='$email' && senha = '$senha'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $erro[] = 'Usuário já existe, por favor mude';
    } else {
        if ($senha != $csenha) {
            $erro[] = 'Senha não corresponde';
        } elseif (empty($name) || empty($email) || empty($senha) || empty($csenha)) {
            $erro[] = 'O nome, o E-mail ou/e a senha não podem ser vazias';
        } else {
            $insert = "INSERT INTO user_form VALUES (NULL,'$name', '$email', '$senha') ";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
}

*/
?>