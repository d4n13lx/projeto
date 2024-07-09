<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
    }
    .form-container form p a{
        color: #89c538;
    }

</style>

</head>
<body>

    <div class="form-container">
        <form action="" method="post">
            <h1>Cadastre-se Agora </h1>
            <input type="text" name="nome" placeholder="Escreva seu nome">
            <input type="email" name="email" placeholder="Escreva seu E-mail">
            <input type="password" name="senha" placeholder="Escreva sua senha">
            <input type="password" name="csenha" placeholder="Confirme sua senha">
            <input type="submit" name="submit" class="form-btn" value="cadastro">
            <p>Você já possui uma conta ? <a href="">Faça Login</a></p>
        </form>
    </div>
    
</body>
</html>