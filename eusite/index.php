<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

    <script>
        function confirmar() {
            var ms;
            var returno = confirm("Voce realmente quer isso?!");

            if (retorno == true) {
                
            } 
            if (retorno == false) {
                //echo 'operação cancelada';
                header('location: index.php');
            }
        }
    </script>
</head>
<body>
    <?php
        /*$vetor = array(10, 20, 30);
        echo $vetor[2]."<br>";

        $vet = array(1,2,3, "nome"=>"francisco");
        echo $vet[0]."<br>";
        echo $vet['nome'];
        var_dump($vetor);
        echo "<br>";
        var_dump($vet);*/?>

    <form action="processa.php" method='POST'>
    <fieldset> 
        <legend for='field'>Cadastro de Livros</legend>  
    <div>
            
            <input type="text" name='c1' placeholder='Titulo'>
            
            
            Categoria 1
            <input type="radio" name="c2" value="cat1">
            Categoria 2
            <input type="radio" name="c2" value="cat2">
            Categoria 3
            <input type="radio" name="c2" value="cat3">
            <br>

            <label for="c3">Autores:</label>
            <textarea name="c3"></textarea>

            <select name="c4">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <br><br>
            <input type="submit" name="enviar" value="enviar" onclick='confirmar()'/>
            <input type='reset' name='reset' value='reset'>
            
        </div>
        </fieldset>
    </form>

    <?php
     

    ?>
</body>
</html>