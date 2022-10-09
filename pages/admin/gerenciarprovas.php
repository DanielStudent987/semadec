<?php
    include('../conexao.php');
    include('protecao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Lista de equipes</title>


</head>
<body>
    <header class="menu"> 
        <img src="../../assets/Laranjinha.png" alt="Logo">
        <div class="tittle">
            <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
        </div>
        <a href="homeadmin.php" ><button type="button" >
            <img src="../../assets/exit.svg" id="out" alt="sair">
        </button></a>
    </header>
    
    <form action="processa.php" method="post">
        <div class="col-6">
            <label for="c1">Informe o nome da prova</label>
            <input type="text" name="nome" maxlength="150" id="c1" placeholder="max: 150 caracteres">
        </div>
        <div class="col-6">
            <label for="c2">Informe o local da prova</label>
            <input type="text" name="local" maxlength="100" id="c2" placeholder="max: 100 caracteres">
        </div>
        <div class="col-6">
            <label for="c3">Informe o número de participantes</label>
            <input type="number" min="1" max="50" name="part" maxlength="11" id="c3">
        </div>
        <?php
            include('../funcoes.php');
            grupoPont();
        ?>
        
        
        <input type="submit" name="salvar_prova" value="Cadastrar">
        <input type="reset" name="reset" value="Limpar">
    </form>

    <form action="processa.php" method="POST">
        <?php 
            tableInfoProvas();
        ?>
    </form>
        
    

</body>
</html>