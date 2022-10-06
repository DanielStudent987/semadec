<?php 
    /*include("conexao.php");
    $sql_query5 = $mysqli->query("SELECT * FROM equipe");
   
    
    while ($dados1 = $sql_query5->fetch_assoc()) {
        

        $sql_query3 = $mysqli->query("SELECT * FROM provas");
        while ($dados = $sql_query3->fetch_assoc()) {
            
            if ($dados['idProva']!=18) {
                
                $mysqli->query("INSERT INTO conquistas (Provas_idProva, Equipe_idEquipe, classificacao, nota) 
                values ('$dados[idProva]', '$dados1[idEquipe]', '', 0)");
            }
        }
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../class.css">
</head>
<body>
    <h1>Classificação</h1>
    <table class="gn-seletable">

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
        </thead>
        
        <tbody>
            <?php 
                    
                    // talvez Mudar esse caminho
                    #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                $sql_query = $mysqli->query("SELECT * from equipe") or die($mysqli->error);
                while ($dados = $sql_query->fetch_assoc()) { 
            ?>
                    
                    <tr> 
                        <td><?php echo $dados['nome']; ?></a></td>
                        <?php 
                           
                            $sql_query2 = $mysqli->query("SELECT equipe.nome as nome, conquistas.classificacao as class, conquistas.nota as nota, conquistas.Equipe_idEquipe as id   from equipe, provas, conquistas where  
                            provas.idProva=conquistas.Provas_idProva and conquistas.Equipe_idEquipe='$dados[idEquipe]' and equipe.idEquipe='$dados[idEquipe]' order by nome") or die($mysqli->error);
                            while ($dados2 = $sql_query2->fetch_assoc()) {

                        ?>
                                <td><?php echo $dados2['nota'] ?></td>
                            <?php } ?>
                    </tr>
                    
            <?php } exit; ?> 
        </tbody>
       
    </table>
</body>
</html>