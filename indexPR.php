<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PREVISÕES</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        $sql = "SELECT * FROM PREVISÕES";

        //executar a query
        $resultado = $conn->query($sql);
    ?>
    <h1 class="text-center">Previsões de doenças por região em BH:</h1>
    <table class="table table-striped table-bordered">
        <thead class="ordenar">
            <div>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">UNIDADE</th>
                </tr>
            </div>
        </thead>
        <?php
            foreach ($resultado as $linha) {
        ?>
            <tr>
                <th scope="row"><?php echo $linha['id']?></th>
                <td><?php echo $linha['Nome']?></td>
                <td><?php echo $linha['Email']?></td>
                <td><?php echo $linha['UNIDADE']?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
