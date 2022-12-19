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

    <title>Gerenciar Grupos</title>

    <script type="text/javascript" language="javascript">
        function valida_form (){
            if((document.getElementById("c1").value == "") || (document.getElementById("c2").value == "") || 
            (document.getElementById("c3").value == "") || (document.getElementById("c4").value == "") || 
            (document.getElementById("c5").value == "") || (document.getElementById("c6").value == "") ||
            (document.getElementById("c1").value == null) || (document.getElementById("c2").value == null) || 
            (document.getElementById("c3").value == null) || (document.getElementById("c4").value == null) || 
            (document.getElementById("c5").value == null) || (document.getElementById("c6").value == null)){
                alert('Por favor, preencha todos os campos');
                
                
            }
        }
    </script>
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
            <label for="c1">Informe o valor da primeira nota</label>
            <input type="number" min="1" max="1000" name="primeiro" value='1' maxlength="4" id="c1">
        </div>
        <div class="col-6">
            <label for="c2">Informe o valor da segunda nota</label>
            <input type="number" min="1" max="1000" name="segundo" value='1' maxlength="4" id="c2">
        </div>
        <div class="col-6">
            <label for="c3">Informe o valor da terceira nota</label>
            <input type="number" min="1" max="1000" name="terceiro" value='1' maxlength="4" id="c3">
        </div>
        <div class="col-6">
            <label for="c4">Informe o valor da quarta nota</label>
            <input type="number" min="1" max="1000" name="quarto" value='1' maxlength="4" id="c4">
        </div>
        <div class="col-6">
            <label for="c5">Informe o valor da quinta nota</label>
            <input type="number" min="1" max="1000" name="quinto" value='1' maxlength="4" id="c5">
        </div>
        <div class="col-6">
            <label for="c6">Informe o valor da sexta nota</label>
            <input type="number" min="1" max="1000" name="sexto" value='1' maxlength="4" id="c6">
        </div>
        <?php
            include('../funcoes.php');
            
        ?>
        
        
        <input type="submit" name="salvar_grupo" onsubmit="valida_form()" value="Cadastrar">
        <input type="reset" name="reset" value="Limpar">
    </form>

    <form action="processa.php" method="POST">
        <?php 
            imprimirGrupos();
            //$mysql->close();
        ?>
    </form>
        
    

</body>
</html>