<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="pontuacao.css">
    <title>SEMADEC</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    <header class="banner">
        <img src="../assets/Laranjinha.png" alt="">
        <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
        <a href="../index.php" ><button type="button" >
            <img src="../assets/exit.svg" id="out" alt="sair">
        </button></a>
    </header>
    <div class="pose"><div class="in"><h3>Pontuação das equipes</h3></div></div>
    
    <div class="container">
        <div class="table-responsive">
            <div class="scroll">
            <table class="table table-bordered table-hover" style="background-color: #C2C2C2; border-color: #f0f0f0; border-radius: 15px;">
                <thead>
                    <?php 
                        include('conexao.php');
                        // talvez Mudar esse caminho
                        #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                        $sql_query = $mysqli->query("SELECT * from provas") or die($mysqli->error);
                        $i=0;
                        while ($dados = $sql_query->fetch_assoc()) { 
                            if ($i==0) {
                            

                                $i=1;
                    
                    ?>
                                <th><?php echo "Nomes das Equipes"; ?></th>
                                <th><?php echo $dados['nome']; ?></th>
                    <?php } else {?>
                        <th><?php echo $dados['nome']; ?></th>
                    <?php }} ?>
                        <th>Total</th>
                   
                </thead>
                <tbody>
                    <?php 
                            
                            // talvez Mudar esse caminho
                            #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                        $sql_query = $mysqli->query("SELECT e.idEquipe, e.nome, sum(c.nota) as nota 
                        FROM equipe e, conquistas c WHERE e.idEquipe = c.Equipe_idEquipe 
                        group by e.nome order by nota desc") or die($mysqli->error);
                        while ($dados = $sql_query->fetch_assoc()) { 
                    ?>
                            <tr> 
                                <?php if (!($dados['nome'] === 'fzao')) { 
                                    echo "<td>$dados[nome]</td>";

                                    //COLOCAR AS NOTAS
                                        $sql_query2 = $mysqli->query("SELECT equipe.nome as nome, conquistas.classificacao as class, conquistas.nota as nota, conquistas.Equipe_idEquipe as id, conquistas.Provas_idProva as p  from equipe, provas, conquistas where  
                                        provas.idProva=conquistas.Provas_idProva and equipe.idEquipe='$dados[idEquipe]' and conquistas.Equipe_idEquipe='$dados[idEquipe]' order by p") or die($mysqli->error);
                                        while ($dados2 = $sql_query2->fetch_assoc()) {

                                            echo "<td> $dados2[nota]</td>";
                                     } 
                                    
                                    //coleta o total de pontos de cada equipe
                                    /*$sql_query3 = $mysqli->query("SELECT conquistas.nota as nota, conquistas.Equipe_idEquipe as id   from equipe, provas, conquistas where  
                                        provas.idProva=conquistas.Provas_idProva and conquistas.Equipe_idEquipe='$dados[idEquipe]' and equipe.idEquipe='$dados[idEquipe]' order by nome") or die($mysqli->error);
                                     */    
                                    echo "<td>$dados[nota]</td>";
                                    } ?>
                            </tr>
                            
                    <?php } exit; ?>
                  
                   
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray text-center text-white rodape" style="background-color: #d8cfcf;">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                <ul class="list-unstyled mb-0 links">
                    <li>
                    <a href="https://portal.ifrn.edu.br/campus/novacruz" target="_blank" class="text-white">IFRN - Nova Cruz</a>
                    </li>
                    <li>
                    <a target="_blank" href="https://www.instagram.com/semadecifnc/" role="button"><img class="images" src="assets/insta-logo-500x500.png" alt=""></a>
                    </li>
                </ul>
        </div>

    </footer>   
</body>
</html>