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
            <?php 
            include('../funcoes.php');
            listarEquipes();
            ?>
        </div>
    
        <input type="submit" name="deletar_equipe" value='deletar'>
        
    </form>

</body>
</html>