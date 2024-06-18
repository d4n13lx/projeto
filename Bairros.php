<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Quantidade de Casos por Bairro</title>
    <link rel="stylesheet" href="home.css">
    <style>
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
    background-color: #ffff;
}
.abrigar{
    padding: 2vh 0;
    background-color: #333;
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
    justify-content: space-between;
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
.buton_acesso_conta{
    padding:0 0.75vw;
    display: grid;
    gap: 1vw;
}
.button1{
    padding: 7px 20px;
    border-radius: 5px;
    font-weight: 400;
    transition: .3s;
    width: 5vw;
    min-width: 110px;
    border: none;
    grid-row: 1;
}
.button1:hover{
    background-color: #89c53f;
    color: white;
}
.button2{
    padding: 7px 20px;
    border-radius: 5px;
    font-weight: 400;
    transition: .3s;
    width: 5vw;
    min-width: 110px;
    border: none;
    grid-row: 1;
    cursor: pointer;
}
.button2:hover{
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

    opacity: 0;
    transition: 1s;
    transition-duration: 1s;
    transition-delay: 1.75s;
}
.item-1:hover .informaçoes h1{
    opacity: 1; 
    
}
.informaçoes p{
    padding: 1vh 0.75vw;
    opacity: 0;
    transition: 1s;
    transition-duration: 1s;
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
    transition: 4s;
    transition-delay: 1s;
    
    
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
    top: auto;
    opacity: 0;
    transition: 1s;
    transition-duration: 1s;
    transition-delay: 1.75s;
    
}
.item_grid-1 .informaçoes2 p{
    height: 170px;
    width: 428px;
    position: absolute;
    top: 207px;
    padding: 1vh 0.75vw;
    opacity: 0;
    transition: 1s;
    transition-duration: 1s;
    transition-delay: 2s;
    
}
.item_grid-2 .informaçoes2 h1{
    
    
    opacity: 0;
    transition: 1s;
    transition-duration: 1s;
    transition-delay: 1.75s;
}
.item_grid-2 .informaçoes2 p{
    
    padding: 1vh 0.75vw;
    opacity: 0;
    transition: 1s; 
    transition-duration: 1s;
    transition-delay: 2s;
}


.blocos{
    display: flex;
    flex-direction: column;

}
.titulo_blocos{
    padding: 4vh 0;
    grid-column: 2;
    text-align: center;
    font-size: 2.5rem;
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
    gap: 2vw;
}
.item_img{
    grid-row: 1;
    margin: auto;
    min-width: 750px;
    min-height: 440px;
    max-width: 750px;
    max-height: 440px;
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
.form-container{
    min-height: 100vh;
      padding: 20px;
      padding-bottom:60px;
      opacity: 0;
      display: none;
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
    text-align: center;
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
.close-btn{
    display: flex;
    justify-content: start;
}
.close-btn svg{
    cursor: pointer;
}
.form-container.ativo{
       opacity: 1;
       min-height: 100vh;
        display: flex;
      justify-content: center;
       align-items: center;
       padding: 20px;
       padding-bottom:60px;
}
body.ativo{
 background-color: #ddd;
}


/*
Parte do codigo que eu peguei do style.css
Lucca vc fez essa parte ent vc sabe como organizar ?
*/

form{
    border: black 1px solid;
}
input{
    border: 2px solid;
}
.lu{
    padding: 20px;
}
#email{
    display: flex;
    flex-direction: row;
    justify-content:flex-start;
}
#exampleInputEmail1{
    width: 45%;
}

.sexodiv{
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-left: 10px;
}
#lu2{
    display: flex; 
    
}
#lu3{
    display: flex;
    margin-left: 10px;
    width: 100%;
}
#lu4{
    display: flex;
    margin-left: 10px;
    width: 100%;
}
#exampleInputNumero1{
    width: 75%;
}
#exampleInputComplemento1{
    margin-left: 10px;
    width: 98%;
}
#exampleInputCidade1{
    width: 99.5%;
}
.containerflex{
    display: flex;
    justify-content: center;
    gap: 25px;
    width: 100%;
}
.flexcontainer{
    display: flex;
    width: 100%;
    margin-bottom: 1rem;
}
.container{
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
#buttonsformat{
    width: 22%;
    height: 45px;
}
#spacingM{
    padding-left:1rem; 
    margin-bottom: 0%;
}
#null{
  border:0px ;
  width: 100px;
  
}
#border{
  border: 0px;
}
.border{
  border: 0px;
  width: 57%;
}
/* codigo do indexprincipal.php */
.titulo{
    text-align: center;
    font-size: 35px;
    font-weight: 700;
    padding-top: 1rem;
    margin-bottom: 3rem;
  }
  .card{
      display: flex;
      justify-content: center;
      width:  30%;
      height: 400px;
      position: relative;
      background-color: #424242;
      border-radius: 20px;
      box-shadow: 0px 15px 80px rgba(0, 0, 0, 0.15);
      transition: 0.5s;
  }
  .card:hover{
      height: 530px;
  }
  .card:hover .img-card{
      top: -10%;
      scale: 0.75;
  }
  .img-card{
      position: absolute;
      width: 100%;
      height: 100%;
      top: 10%;
      text-align: center;
      transition: 0.5s;
      padding-bottom: 0.2rem;
  }
  
  .contentar{
      display: flex;
      flex-direction: column;
      gap: 5px;
      position: absolute;
      top: 60%;
      width: 100%;
      padding: 0px 30px;
      text-align: center;
      height: 30px;
      transition: 0.5s;
  }
  .contentar h2{
      color: #fffefe;
      padding-bottom: 0.3rem;
  }
  .contentar p{
    overflow: hidden;
    color: #fffefe;
  }
  .card:hover .contentar{
    top:  50%;
    height: 30%;
  }
  .site-section{
    padding: 5em 0;
  }
  .container{
        width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }
.flex-carde{
    display: flex;
    flex-wrap: wrap;
}






    </style>
</head>
<body style="background-color: white;">
    <?php
        //Dados de conexao
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "sprint";

        //conectar
        $conn = new mysqli($hostname, $username, $password, $database);

        if ($conn->error) {
            die("erro ao conectar  $conn->error");
        }
        //preparei a query
        $sql = "SELECT * FROM qtde_casos_bairros  order by bairro ASC  ";

        //executar a query
        $resultado = $conn->query($sql);


    ?>
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
                <div class="buton_acesso_conta">
                    <button class="button1">Cadastro</button>
                    <button class="button2">Login</button>
                </div>
            </div>
        </div>
    </div>
<div class="container" style="padding-top: 2rem;">
    <h1 class="titulo">Quantidade de Casos por bairro</h1>
    <div style="display: flex;justify-content:flex-start; flex-direction:column; padding-left:1rem;">
        <form action="Bairros.php" method="POST" style="border:none;">
        <h2 style="font-size:18px;">Filtro:</h2>
    <select name="Filtro" id="Filtro">
  <option value="Regioes"></option>
  <option value="Venda Nova">Venda Nova</option>
  <option value="Pampulha">Pampulha</option>
  <option value="Oeste">Oeste</option>
  <option value="Norte">Norte</option>
  <option value="Noroeste">Noroeste</option>
  <option value="Nordeste">Nordeste</option>
  <option value="Leste">Leste</option>
  <option value="Centro-Sul">Centro-Sul</option>
  <option value="Barreiro">Barreiro</option>
  </select>
  <input type="submit" name="submit" value="Procurar" style="padding: 1px 5px;">
        </form>
    </div>
<?php if(isset($_POST['submit'])) {
      
      $combobox = $_POST['Filtro'];
      $sql = "SELECT * FROM qtde_casos_bairros Where Regiao = '$combobox'  order by bairro ASC  ";
      //executar a query
      $resultado = $conn->query($sql);
      if($combobox == 'Regioes')
      {
        $sql = "SELECT * FROM qtde_casos_bairros  order by bairro ASC  ";
      //executar a query
      $resultado = $conn->query($sql);
      }
}
?>
    <div class="first" style="display: flex;justify-content:center;flex-wrap:wrap;margin:20px;">
        <?php foreach ($resultado as $linha) : ?>
            <div style="display: inline-block;padding:1.5rem 0.5rem ;" >
                <div>
                    <div class="cartao" style="width:310px; 
                    height:250px;background-color:white;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
                    border-radius:20px
                    ">
                         <div class="img-cartao"
                        style="height: 50%; display:flex; align-items:center; justify-content:center">
                          <!--SVG Muitos casos -->        
                          <?php  if($linha['N_casos'] >= 15):   ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="40%" height="39%" fill="#DE0404" 
    style="padding-right: 0.3rem; border-color: 10px #0000" 
    class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
  <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg>
                        
<?php elseif($linha['N_casos'] <= 3): ?>       <!--SVG Poucos casos -->               
    <svg xmlns="http://www.w3.org/2000/svg" width="40%" height="39%" fill="green" style="padding-right: 0.3rem;"
     class="bi bi-check-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
</svg>
 <?php  elseif($linha['N_casos'] >=4 && $linha['N_casos'] <= 14):  ?>
  <!--SVG medio -->   
  <svg xmlns="http://www.w3.org/2000/svg" width="40%" height="40%" fill="#F0F000" style="padding-right: 0.3rem;"
   class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
  <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.48 1.48 0 0 1 0-2.098zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
  <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
</svg>

<?php endif; ?>
</div>
                        <div class="contento">
                            <h1 style="color: black; font-size: 25px; text-align:center;">
                            <?php echo $linha['bairro']?></h1>
                            <p style="color: black; font-weight:600; text-align:center;
                            ">    
                                Número de Casos:     
                                <?php echo $linha['N_casos']?>   
                            </p>
                            <p style="color: black;text-align:center;
                            ">    
                                Região:     
                                <?php echo $linha['Regiao']?>   
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
           endforeach;
            unset($_POST);
            $conn->close();

        ?>
    </div>
</div>
</body>
</html>

                    