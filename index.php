<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Sprint 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
        $sql = "SELECT * FROM regioes_risco";

        //executar a query
        $resultado = $conn->query($sql);


    ?>
<?php foreach ($resultado as $linha) : ?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="site-section">
        <div class="container">
            <h1 class="titulo">Regiões de risco em Dengue:</h1>
            <div class="skills">
                <div class="card">
                    <div class="img-card">
                        <img src="Venda-Nova.png">
                    </div>
                    <div class="contentar">
                        <h2>Venda Nova</h2>
                        <p>
                            Número de Casos: <?php echo $linha['N_casos']?>
                            <br>Número de Mortes: <?php echo $linha['N_mortes']?>
                            <br>Percentual (%) de Risco: <?php echo $linha['Percent_Risco'].'%'?>                                
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="img-card">
                        <img src="Norte.png">
                    </div>
                    <div class="contentar">
                        <h2>Norte</h2>
                        <p>
                            Número de Casos: 
                            <br>Número de Mortes: 
                            <br>Percentual (%) de Risco:                                 
                        </p>   
                    </div>
                </div>
                <div class="card">
                    <div class="img-card">
                        <img src="pampulha.png">
                    </div>
                    <div class="contentar">
                        <h2>Pampulha</h2>
                        <p>
                            Número de Casos: 
                            <br>Número de Mortes: 
                            <br>Percentual (%) de Risco:                                 
                        </p>    
                    </div>
                </div>
            </div>
            <div class="skills">
                <div class="card">
                    <div class="img-card">
                        <img src="Venda-Nova.png">
                    </div>
                        <div class="contentar">
                            <h2>Nordeste</h2>
                            <p>
                                Número de Casos: 
                                <br>Número de Mortes: 
                                <br>Percentual (%) de Risco:                                 
                            </p>       
                        </div>
                    </div>
                    <div class="card">
                        <div class="img-card">
                            <img src="Venda-Nova.png">
                        </div>
                    <div class="contentar">
                        <h2>Noroeste</h2>
                        <p>
                            Número de Casos: 
                            <br>Número de Mortes: 
                            <br>Percentual (%) de Risco:                                 
                        </p>           
                    </div>
                </div>
                <div class="card">
                    <div class="img-card">
                        <img src="Venda-Nova.png">
                    </div>
                    <div class="contentar">
                        <h2>Leste</h2>
                        <p>
                            Número de Casos: 
                            <br>Número de Mortes: 
                            <br>Percentual (%) de Risco:                                 
                        </p>            
                    </div>
                </div>
            </div>
            <div class="skills">
                <div class="card">
                    <div class="img-card">
                        <img src="Venda-Nova.png">
                    </div>
                    <div class="contentar">
                        <h2>Centro Sul</h2>
                        <p>
                            Número de Casos: 
                            <br>Número de Mortes: 
                            <br>Percentual (%) de Risco:                                 
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="img-card">
                        <img src="Venda-Nova.png">
                    </div>
                    <div class="contentar">
                        <h2>Oeste</h2>
                        <p>
                            Número de Casos: 
                            <br>Número de Mortes: 
                            <br>Percentual (%) de Risco:                                 
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="img-card">
                        <img src="Venda-Nova.png">
                    </div>
                    <div class="contentar">
                        <h2>Barreiro</h2>
                        <p>
                            Número de Casos: 
                            <br>Número de Mortes: 
                            <br>Percentual (%) de Risco:                                 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;
    unset($_POST);
    $conn->close();
?>
</form>
</body>
</html>