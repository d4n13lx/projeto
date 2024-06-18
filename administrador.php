<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
    body{
        background-color: #333;
    }
    .side-bar{
        background-color: #333;
        border-right:  2px solid #89c53f;
        width: 22%;
        height: 100vh;
        position:fixed;
        top: 0;
        left: -100%;
        overflow-y: auto;
        transition: 0.6s;
        transition-property: left;
    }
    .side-bar.active{
        left: 0;
    }
    .side-bar .menu{
        width: 100%;
        padding-top: 5rem;
    }
    .side-bar .menu .item{
        position: relative;
        cursor: pointer;
    }
    .side-bar .menu .item a{
        color: white;
        fill: white;
        font-size: 20px;
        text-decoration: none;
        display: block;
        padding: 18px 20px;
        line-height: 30px;
    }
    .side-bar .menu .item a:hover{
        background-color: #89c53f;
        transition: 0.3s;
    }
    .side-bar .menu .item a .dropdown{
        position: absolute;
        margin: 16px;
        right: 0;
        transition: 0.3s;
    }
    .side-bar .menu .item svg{
        margin-right: 10px;
    }
    .side-bar .menu .item .sub-menu{
        display: none;
    } 
    .side-bar .menu .item .sub-menu a{
      padding-left: 70px;
    }
    .rotate{
        transform: rotate(90deg);
    }
    .close-btn{
        position: absolute;
        margin: 25px;
        right: 0;
        cursor: pointer;
    }
    .menu-btn{
        position: absolute;
        margin: 25px;
        cursor: pointer;
    }
    .container{
          min-height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          padding: 20px;
          padding-bottom:60px;
    }
    .container .content{
        text-align: center;
    }
    .container .content h3{
        font-size: 30px;
        color: #fff;
    }
    .container .content h3 span{
        background-color: #89c53f;
        color: #fff;
        padding: 3px 10px;
        border-radius: 5px;
    }
    .container .content h1{
        font-size: 50px;
        color: #fff;
    }
    .container .content p{
        color: gray;
        padding-top: 10px;
        padding-bottom: 1.5rem;
    }
    .container .content .btn{
       padding: 10px 30px;
       font-size: 20px;
       color: #fff;
       background: #222;
       box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.15);
       margin: 0 5px;
       text-decoration: none;
       transition: 0.5s;
       transition-delay: 0.1s;
       font-weight: 500;
    }
    .container .content .btn:hover{
         background: #89c53f;
         color: #222;
    }
    
    </style>
</head>
<body>
    <div class="menu-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="white" class="bi bi-list" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
     </svg>
    </div>
    <div class="side-bar">
        <div class="close-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="white" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
</svg>
        </div>
        <div class="menu">
            <div class="item">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                   <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
                </svg>
               Home
            </a>
            </div>
            <div class="item">
                <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
</svg>
               Gráficos
            </a>
            </div>
            <div class="item">
                <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-database" viewBox="0 0 16 16">
  <path d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313M13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A5 5 0 0 0 13 5.698M14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A5 5 0 0 0 13 8.698m0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525"/>
</svg>
               Dados
            </a>
            </div>
            <div class="item">
                <a class="sub-list" href="#">  <!--dropdown-->
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
  <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
</svg>
               Bairros  
               <svg xmlns="http://www.w3.org/2000/svg" class="dropdown" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>
               <div class="sub-menu">
                <a class="sub-item" href="">Venda Nova</a>
                <a class="sub-item" href="">Norte</a>
                <a class="sub-item" href="">Nordeste</a>
                <a class="sub-item" href="">Pampulha</a>
                <a class="sub-item" href="">Noroeste</a>
                <a class="sub-item" href="">Oeste</a>
                <a class="sub-item" href="">Leste</a>
                <a class="sub-item" href="">Centro-Sul</a>
                <a class="sub-item" href="">Barreiro</a>
               </div>
            </a>
            </div>
            <div class="item">
                <a class="sub-list" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
  <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
  <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" class="dropdown" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>
               Regiões de Risco
               <div class="sub-menu">
                <a class="sub-item" href="">Venda Nova</a>
                <a class="sub-item" href="">Norte</a>
                <a class="sub-item" href="">Nordeste</a>
                <a class="sub-item" href="">Pampulha</a>
                <a class="sub-item" href="">Noroeste</a>
                <a class="sub-item" href="">Oeste</a>
                <a class="sub-item" href="">Leste</a>
                <a class="sub-item" href="">Centro-Sul</a>
                <a class="sub-item" href="">Barreiro</a>
               </div>
            </a>
            </div>
            <div class="item">
                <a href="user.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
               Usuários
            </a>
            </div>

            <div class="item">
                <a href="importar.php">
                <svg class="w-[30px] h-[30px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
</svg>

               Importar Dados
            </a>
            </div>

            <div class="item">
                <a href="exportar.php">
                <svg class="w-[30px] h-[30px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2M12 4v12m0-12 4 4m-4-4L8 8"/>
</svg>


               Exportar Dados
            </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <h3>Olá <span>Administrador</span></h3>
            <h1>Seja Bem Vindo <span></span></h1>
            <p>Essa Pagina serve para você administrar<br> o nosso site</p>
            <a href="home.php" class="btn">Voltar</a>
        </div>
    </div>
    
    <script type="text/javascript">
    $(document).ready(function(){
        $('.sub-list').click(function(){
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });
        $('.menu-btn').click(function(){
        $('.side-bar').addClass('active');
        $('.menu-btn').css("visibility","hidden");
        });
        $('.close-btn').click(function(){
        $('.side-bar').removeClass('active');
        $('.menu-btn').css("visibility","visible");
        });
    });
    </script>
</body>
</html>