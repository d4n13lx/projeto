<?php
@include "config.php";

if(isset($_POST['submit']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = md5($_POST['senha']);

    $select = "SELECT * FROM user_form WHERE email ='$email' && senha = '$senha'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
       if($_POST['email'] == 'Admin@gmail.com' && $_POST['senha'] == 'Admin' )
       {
               header('location:ADMINistrador.php');
       }
       else{
        header('location:Home.php');
       }
    }
    else{
        
        $erro[] = 'Senha ou email estão incorretos';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style type="text/css">
    body{
        background-color: #ddd;
    }
    .form-container{
        min-height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          padding: 20px;
          padding-bottom:60px;
    }
    .form-container form{
         width: 35%;
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0 5px 10px rgb(0,0,0, .1) ;
         background: #fff;
         text-align: center;
    }
    .form-container h1{
        font-size: 30px;
        text-transform: uppercase;
        margin-bottom: 10px;
        font-weight: 400;
        color: #222;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .form-container .margem{
        padding-bottom: 0.9rem;
    }
    .form-container input{
        border-radius: 4px;
        width: 80%;
        padding: 8px 10px;
        font-size: 17px;
        margin: 8px 0;
        background: #eee;
        border: #999;
    }
    .form-container form .form-btn{
        width: 35%;
       font-size: 20px;
       color: #fff;
       background: #333;
       margin: 5px 5px;
       text-decoration: none;
       transition: 0.5s;
       font-weight: 500;
       border-color: transparent;
    }
    .form-container form .form-btn:hover{
        color: #222;
        background-color: #89c538;
    }
    .form-container form p{
        color: #222;
        font-size: 18px;
    }
    .form-container form p a{
        color: #89c538;
    }
    .form-container form span{
       margin: 10px 0;
       color: red;
       display:block;
       font-size: 20px;
    }

</style>

</head>
<body>

    <div class="form-container">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <?php
               if(isset($erro))
               {
                    foreach($erro as $erro)
                    {
                       echo '<span class="erro-msg">'.$erro.'</span>';
                    }
               }
            ?>
            <input type="email" name="email" placeholder="Escreva seu E-mail">
            <input type="password" name="senha" placeholder="Escreva sua senha">
            <input type="submit" name="submit" class="form-btn" value="Login">
            <p>Você ainda não possui uma conta ? <a href="cadastro.php">Cadastre-se</a></p>
        </form>
    </div>
    
</body>
</html>