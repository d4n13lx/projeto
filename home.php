<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardvirus</title>
    
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <style type="text/css">
        /* Reset padrão para remover margens e preenchimentos */
        * {
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: 300;
            font-style: normal;
            list-style: none;
            text-decoration: none;
            margin: 0;
            padding: 0;

        }
        body{
            background-color: #333;
        }
        .abrigar{
            padding: 2vh 0;
        }
        .container{
            width: 100%;
            padding:0 1vw;
            margin: 0 auto;
            max-width: 1400px;
        }
        .containerflex{
            display: flex;
            width: auto;
            align-items: center;
            flex-wrap: nowrap;
            justify-content: space-around;
            margin:0 -1vw;
            
        }
        .guardvirus{
            padding:0 0.75vw;
            
        }
        .guardvirus img{
            max-width: 3vw;
            min-width: 80px;
            height: auto;
        }
        .menu{
            padding:0 0.75vw;
            
        }
        .menu_items{
            display: flex;
        }
        .submenu{
            position: relative; /* Para posicionar subitens */
            float: left;
        }
        .submenu:hover .items_submenu{
            display: block; /* Exibe subitens quando o item pai é hover */
        }
        .items_submenu{
            display: none; /* Oculta subitens por padrão */
            position: absolute;
            top: 100%; /* Posiciona abaixo do item pai */ 
            width: 160px;
        }
        .sub_item{
            float: none; /* Coloca os itens de submenu em uma coluna */
            background-color: #222;
        }
        .hover{
            display: block;
            color:white; /* Cor do texto */
            text-align: center;
            padding: 1.2vh 0.8vw; /* Espaçamento interno */
            transition: .3s;
            
        }
        .hover_sub{
            display: block;
            color:white; /* Cor do texto */
            text-align: center;
            padding: 1.2vh 0.8vw; /* Espaçamento interno */
            transition: .3s;
            border-left: 1px solid #89c53f;
            border-right: 1px solid #89c53f;
        }
        .hover_sub:hover{
            color: #89c53f;
        }
        .hover:hover{
            color: #89c53f;
        }
        .button_acesso_conta{
            padding:0 0.75vw;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1vw;
        }
        .buttons{
            padding: 7px 20px;
            border-radius: 5px;
            font-weight: 400;
            transition: .3s;
            width: 5vw;
            min-width: 110px;
            border: none;
            grid-row: 1;
        }
        .buttons:hover{
            background-color: #89c53f;
            color: white;
        }

        .grid-column-1 {
            display: grid;
            grid-template-columns: 29vw 22vw;
            grid-template-columns: 1.5fr 1fr;
            grid-template-rows: 3vh 27vh 27vh;
            margin: 0 auto;
            max-width: 1100px;
            
            
        }
        .item-1 {
            margin: 0.22vw;
            background-color: #333;
            grid-column: 1;
            grid-row: 2 /4;
            display: grid;
            min-height: 498px;
            max-height: 498px;
            align-items: end; 
            
        }
        .item-2 {

            display: grid;
            grid-row: 2 /4;
            min-height: 507px;
            max-height: 507px;
            
        }
        .item_grid-1{
            display: grid;
            margin: 0.22vw;
            background-color: #333;
            grid-row: 1;
            min-height: 243px;
            max-height: 243px;
            align-items: end; 
        }
        .item_grid-2{
            display: grid;
            margin: 0.22vw;
            background-color: #333;
            grid-row: 2;
            min-height: 243px;
            max-height: 243px;
            align-items: end; 
        }
        h1 {
            text-align: start;
            font-size: 1.25em;
            font-weight: normal;
            padding:0 0.75vw;
        }

        /**/

        /**/
        .informaçoes{
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: end;
            background-color: white;
            height: 0;
            transition: 1.2s;
            transition-duration: 2s;
            opacity: 0;
            transition-property: height;
        
        }
        .item-1:hover .informaçoes{
            display: block;
            opacity: 0.70;
            height: 249px;
        }
        .informaçoes h1{
            position: absolute;
            top: 427px;
            opacity: 0;
            transition: 1s;
            transition-duration: 1s;
            transition-delay: 1.75s;
        }
        .item-1:hover .informaçoes h1{
            opacity: 1; 
            top: auto;
        }
        .informaçoes p{
            color:#333;;
            height: 170px;
            width: 652.5px;
            position: absolute;
            top: 407px;
            padding: 1vh 0.75vw;
            opacity: 0;
            transition: 1s;
            transition-delay: 2s;
        }
        .item-1:hover .informaçoes p{
            opacity: 1;
        }
        .informaçoes2{
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: end;
            background-color: white;
            height: 0;
            opacity: 0;
            transition: 1.2s;
            transition-duration: 2s;
            transition-property: height;
            
        }
        .item-2 .item_grid-1:hover .informaçoes2{
            display: block;
            opacity: 0.70;
            height: 194px;
            transition:2s;
        }

        .item-2 .item_grid-1:hover .informaçoes2 h1{
            display: block;
            opacity: 1;
            transition-delay: 1s;
            top: auto;
            
        }
        .item-2 .item_grid-1:hover .informaçoes2 p{
            display: block;
            opacity: 1;
            transition-delay: 2s;
            
            
        }
        /**/

        .item-2 .item_grid-2:hover .informaçoes2{
            display: block;
            opacity: 0.70;
            height: 194px;
        }


        .item-2 .item_grid-2:hover .informaçoes2 h1{
            display: block;
            opacity: 1;
            transition-delay: 1s;
            top: auto;
        }
        .item-2 .item_grid-2:hover .informaçoes2 p{
            
            display: block;
            opacity: 1;
            transition-delay: 2s;
        }


        .item_grid-1 .informaçoes2 h1{
            height: auto;
            width: 428px;
            position: absolute;
            top: 227px;
            opacity: 0;
            transition: 1s;
            transition-duration: 1s;
            transition-delay: 1.75s;
            
        }
        .item_grid-1 .informaçoes2 p{
            height: 170px;
            width: 432.5px;
            position: absolute;
            top: 207px;
            padding: 1vh 0.75vw;
            opacity: 0;
            transition: 1s;
            transition-duration: 1s;
            transition-delay: 2s;
            
        }
        .item_grid-2 .informaçoes2 h1{
            position: absolute;
            top: 447px;
            opacity: 0;
            transition: 1s;
            transition-duration: 1s;
            transition-delay: 1.75s;
        }
        .item_grid-2 .informaçoes2 p{
            height: 170px;
            width: 432.5px;
            position: absolute;
            top: 457px;
            padding: 1vh 0.75vw;
            opacity: 0;
            transition: 1s; 
            transition-duration: 1s;
            transition-delay: 2s;
        }


        .blocos{
            display: flex;
            flex-direction: column;
            margin:auto;
        }
        .titulo_blocos{
            padding: 4vh 0;
            grid-column: 2;
            text-align: center;
            font-size: 2.5rem;
            margin:auto;
        }
        .blocos_items{
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin: 22px;
            background-color:white;
            width: 240px;
            min-height: 240px;
            color: #000;
            line-height: 32px;
            padding: 30px 20px;
            text-align: center;
            box-sizing: border-box;
            position: relative;
            text-decoration: none;
            grid-row: 2;
            
        }
        .blocos_items:hover{
            background-color: rgba(60, 60, 60, 0.75);
            transition: 0.7s;
            transition-duration: 0.9s;
            
        }
        .blocos_items:hover span{
            display: none;
        }
        .bloco_sub{
            display: none;
            opacity: 1;
            color: white;
            
        }
        .blocos_items:hover .bloco_sub{
            display: block;

            transition-delay: 0.5s;
        }
        .categorias_flex{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 0.25fr 1fr;
            align-items: center;
            gap: 0 110px;
        }
        .teste{
            width: 100px;
        height: 100px;
        background: red;
        
        transition-duration: 1s;
            transition-property: all ;
        }
        .teste:hover{
            font-size: 26px;
            width: 200px;
            height: 200px;
        }
        .container_grid{
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr;
            align-items: center;
        }
        .item_img{
            grid-row: 1;
            margin: auto;
            min-width: auto;
            min-height: auto;
            max-width: 750px;
            max-height: 440px;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .item_text{
            grid-row: 1;
        }
        .item_text h1{
            margin-bottom: 1vh;
        }
        .item_text p{
            padding: 1vw;
        }
        .grid{
            
            display: grid;
        }
        .footer{
            grid-template-columns: 782px 618px;
            grid-template-rows: 250px 100px;
        }
        .item_footer{
            justify-content: end;
        }
        .flex{
            display: flex;
        }
        .footerdesc{
            font-size: 20px;
            justify-content:  space-around;
        }
        .footerdesc li a:hover{
            transition: 0.7s;
            color: #89c53f;
        }
        .footericons{
            width: auto;
            align-items: center;
            justify-content: end;
        }
        .listaicons{
            flex-direction: row;
            justify-content: space-around;
            padding: 0 0.4vw;
        }
        .icon{
            width: 2.5vw;
            padding: 0 0.4vw;
            height: auto;
            transition: 0.7s;
        }
        .icon:hover {
            fill: #89c53f;
            
        }
        .itensfooter{
            padding: 0 0 1vh 1vw;
            color: white;
            font-size: 16px;
        }
        .itensfooter a{
            color: white;
        }
    </style>
    <div class="abrigar" >
        <div class="container">
            <div class="containerflex">
                <div class="guardvirus">
                    <a href="home.php"><img src="guardvirus.png"></a>
                </div>
                <div class="menu">
                    <nav>
                        <ul class="menu_items">
                            <li class="items"><a class="hover" href="home.php">Home</a></li>
                            <li class="submenu"><a class="hover" href="#">Temos que decidir</a>
                                <ul class="items_submenu">
                                    <li class="sub_item"><a class="hover_sub" href="indexRR.php"> 1</a></li>
                                    <li class="sub_item"><a class="hover_sub" href="indexRRC.php">2</a></li>
                                    <li class="sub_item"><a class="hover_sub" href="indexRRZ.php">3</a></li>
                                </ul>
                            </li>
                            <li class="items"><a class="hover" href="#">Sobre</a></li>
                            <li class="items"><a class="hover" href="#">Contato</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="button_acesso_conta">
                    <a href="cadastro.php"><button class="buttons">Cadastro</button></a>
                    <a href="login.php"><button class="buttons">Login</button></a>
                </div>
            </div>
        </div>
    </div>
    <section class="abrigar" style="background-color: white;">
        <div class="container">
            <section class="grid-column-1"style="max-height: 572px;">
                <h1>Casos de dengue:</h1>
                <div class="item-1">    
                    <div class="informaçoes">
                        <h1>Sobre os casos:</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            <br>Tempora sapiente esse ducimus possimus maxime illum maiores,
                            <br> ab laborum dolor veniam exercitationem sunt est delectus.
                            <br> Placeat facilis doloremque nihil assumenda laborum.
                        </p>
                    </div>
                </div>
                <h1>Outros casos:</h1>
                <div class="item-2">
                    <div class="item_grid-1">
                        <div class="informaçoes2">
                            <h1>Sobre os casos:</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                <br>Tempora sapiente esse ducimus possimus maxime illum maiores,
                                <br> ab laborum dolor veniam exercitationem sunt est delectus.
                                <br> Placeat facilis doloremque nihil assumenda laborum.
                            </p> 
                        </div>
                    </div>
                    <div class="item_grid-2"> 
                        <div class="informaçoes2">
                            <h1>Sobre os casos:</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                <br>Tempora sapiente esse ducimus possimus maxime illum maiores,
                                <br> ab laborum dolor veniam exercitationem sunt est delectus.
                                <br> Placeat facilis doloremque nihil assumenda laborum.
                            </p>    
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <section class="abrigar" style="background-color: white;">
        <div class="container">
            <div class="containerflex" style="flex-direction:column;">
                <h2 style="margin-bottom:2vh;font-size:1.85em;">Navegue pelas categorias:</h2>
                <div style="font-size:1.75em;">Encontre a informaçao que deseja saber nas opções abaixo</div>
                <div class="blocos">
                    <div class="categorias_flex">
                        <h1 class="titulo_blocos">Doenças</h1>
                        <a href="Bairros.php" class="blocos_items">
                            <div class="bloco_sub">Mostra a quantidade de casos por bairro de dengue das regiões de <br>Belo Horizonte</div>
                            <span>Casos por bairro</span>
                        </a>
                        <a href="indexRR.php" class="blocos_items">
                            <div class="bloco_sub">Mostrar quantidade de casos, número de mortes e o percentual de risco das regiões de <br>Belo Horizonte</div>
                            <span>Região de Risco</span>
                        </a>
                        <a href="" class="blocos_items">
                            <div class="bloco_sub">subtexto</div>
                            <span>Texto aleatorio</span>
                        </a>
                    </div>
                    
            </div>
        </div>
    </section>
    <section style="padding: 4vh 0;">
        <div class="container">
            <div class="container_grid">
                <div class="item_img">
                    <img src="https://s5.static.brasilescola.uol.com.br/be/conteudo/images/aedes-aegypti.jpg" alt="" style="max-width: auto;height: auto;">
                </div>
                <div class="item-text" style="color: #89c53f;">
                    <h1 style="margin-bottom: 1vh;">Titulo</h1>
                    <p style="padding:0 0.75vw;"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        <br> Minus praesentium perferendis asperiores,
                        <br> esse nostrum omnis repudiandae quo illum doloribus voluptas,
                        <br> blanditiis doloremque deleniti exercitationem 
                        <br>deserunt possimus porro sapiente fugiat dolores.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section style="padding: 4vh 0; background-color:white;">
        <div class="container">
            <div class="container_grid">
                <div class="item-text" style="color:#333; grid-column:1;">
                    <h1 style="margin-bottom: 1vh;">Titulo</h1>
                    <p style="padding:0 0.75vw;"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        <br> Minus praesentium perferendis asperiores,
                        <br> esse nostrum omnis repudiandae quo illum doloribus voluptas,
                        <br> blanditiis doloremque deleniti exercitationem 
                        <br>deserunt possimus porro sapiente fugiat dolores.
                    </p>
                </div>    
                <div class="item_img"style="grid-column:2;">
                    <img src="https://s5.static.brasilescola.uol.com.br/be/conteudo/images/aedes-aegypti.jpg" alt="" style="max-width: auto;height: auto;">
            </div>
        </div>
    </section>
    
    <div style="display:flex;width:auto;height:500px; justify-content:center;align-items: center;">
        <div class="teste" style="display:flex; align-items:center; justify-content:center;" >
            <p>Texto</p>
        </div>
    </div>
    <footer class="abrigar">
        <div class="container">
            <div class="containerflex">
                <section class="grid footer">
                    <div class="item_footer">
                        <div class="guardvirus">
                            <a href="home.php"><img style="max-width: 6vw;" src="guardvirus.png"></a>
                        </div>
                    </div>
                    <div class="item_footer">
                        <div class="flex footerdesc">
                            <div style="padding:0 2vw 0 0;">
                                <h1 style="padding: 0 0 1vh 0;">Titulo</h1>
                                <ul>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                </ul>
                            </div>
                            <div style="padding:0 2vw 0 0;">
                                <h1 style="padding: 0 0 1vh 0;">Titulo</h1>
                                <ul>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                </ul>
                            </div>
                            <div style="padding:0 2vw 0 0;">
                                <h1 style="padding: 0 0 1vh 0;">Titulo</h1>
                                <ul>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                    <li class="itensfooter"><a href="#">subtitulo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item_footer" style="border-top:1px solid #89c53f; padding:1vh 0 0 0; color:white;">
                        <span>© Guardirus, Inc. 2024. We love our users!</span>
                    </div>
                    <div class="item_footer" style="border-top:1px solid #89c53f; padding:1vh 0 0 0; color:white;">
                        <div class="flex footericons">
                            <h3>Nos siga:</h3>
                            <ul class="flex listaicons">
                                <li class="icon"><a href=""></a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0 -59.3-88.7zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12c-18.1-7.1-57.6-6.8-83.1-6.5c-4.1 0-7.9 .1-11.2 .1c-3.3 0-7.2 0-11.4-.1c-25.5-.3-64.8-.7-82.9 6.5c-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2c0 4.1 .1 7.9 .1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2c2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5c4.1 0 7.9-.1 11.2-.1c3.3 0 7.2 0 11.4 .1c25.5 .3 64.8 .7 82.9-6.5c6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83c0-4.2-.1-8.1-.1-11.4s0-7.1 .1-11.4c.3-25.5 .7-64.9-6.5-83l0 0c-2.7-6.9-6.8-13.1-12-18.4zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1s2.6-7.1 5.2-9.8s6.1-4.5 9.8-5.2s7.6-.4 11.1 1.1s6.5 3.9 8.6 7s3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2s-3.9 3.2-6.2 4.2s-4.8 1.5-7.3 1.5l0 0c-3.8 0-7.5-1.1-10.6-3.2zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM357 389c-18.7 18.7-41.4 24.6-67 25.9c-26.4 1.5-105.6 1.5-132 0c-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132c1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0c25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9c-1.3 25.6-7.1 48.3-25.8 67z"/></svg></a></li>
                                <li class="icon"><a href=""></a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg></a></li>
                                <li class="icon"><a href=""></a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM351.3 199.3v0c0 86.7-66 186.6-186.6 186.6c-37.2 0-71.7-10.8-100.7-29.4c5.3 .6 10.4 .8 15.8 .8c30.7 0 58.9-10.4 81.4-28c-28.8-.6-53-19.5-61.3-45.5c10.1 1.5 19.2 1.5 29.6-1.2c-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3c-9-6-16.4-14.1-21.5-23.6s-7.8-20.2-7.7-31c0-12.2 3.2-23.4 8.9-33.1c32.3 39.8 80.8 65.8 135.2 68.6c-9.3-44.5 24-80.6 64-80.6c18.9 0 35.9 7.9 47.9 20.7c14.8-2.8 29-8.3 41.6-15.8c-4.9 15.2-15.2 28-28.8 36.1c13.2-1.4 26-5.1 37.8-10.2c-8.9 13.1-20.1 24.7-32.9 34c.2 2.8 .2 5.7 .2 8.5z"/></svg></a></li>
                                <li class="icon"><a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg></a></li>
                            </ul>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
    </footer>
</body>
</html>