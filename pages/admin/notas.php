<?php
    include('protecao.php');
    include('../conexao.php');

    function select(string $tabela, string $id) {
        
        include('../conexao.php');
                            
            $sql_code = 'SELECT * FROM '.$tabela;
            $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
                            
            $i=0;
            while ($dados = $sql_query->fetch_assoc() or die($mysqli->error)) { 
                 //ADICIONA UMA FORMATACAO DIFERENTE AO OPTION
                if ($i==0) {
                    $i=1;
                        
                echo "<option selected value=".$dados[$id].">".$dados['nome']."</option>";}
                echo "<option value=".$dados[$id].">".$dados['nome']."</option>";
            } 
            exit;
    }

    //UPDATE NA TABELA CONQUISTA
    if (isset($_POST['id_equipe']) || isset($_POST['prova']) || isset($_POST['class'])) {
        if (strlen($_POST['id_equipe'])==0) {
            echo 'Selecione o nome da equipe.';
        } else if (strlen($_POST['prova'])==0) {
            echo 'Selecione o nome da prova.';
        } else if (strlen($_POST['class'])==0) {
            echo 'Selecione a classificação da prova.';
        } else {
            $id_equipe = $_POST['id_equipe'];
            $id_prova = $_POST['prova'];
            $class = $_POST['class'];
            
            //ID DA PONTUACAO
            $sql_query = $mysqli->query("SELECT pontuacao_idpontuacao as pont from provas where idProva = $id_prova");
            $id_pont = $sql_query->fetch_assoc();

            //PONTUACAO
            $sql_code = "SELECT $class from pontuacao where idPontuacao = ($id_pont[pont])";
            $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
            $dados = $sql_query->fetch_assoc(); 

            //VERIFICA SE HA OUTRAS INSERÇÕES COM A MESMA CLASSIFICACAO E EXCLUI AS ANTERIORES
            $sql_query_verify = $mysqli->query("SELECT c.Equipe_idEquipe, c.Provas_idProva, c.classificacao from conquistas c, equipe e where c.Equipe_idEquipe=e.idEquipe
            and c.Equipe_idEquipe!=$id_equipe and c.Provas_idProva=$id_prova and c.classificacao='$class' order by Provas_idProva");
            $verify_quant = $sql_query_verify->num_rows;
            //echo $verify_quant;

            #APAGA REGISTROS REPETIDOS
            if ($verify_quant > 0) {
                while ($ds = $sql_query_verify->fetch_assoc()) {
                    $sql_code = "UPDATE conquistas set classificacao='', nota=0 where Equipe_idEquipe='$ds[Equipe_idEquipe]' and Provas_idProva='$ds[Provas_idProva]'";
                    $mysqli->query($sql_code) or die($mysqli->error); 
                }
            }
            //UPDATE
            $sql_code = "UPDATE conquistas set classificacao='$class', nota=$dados[$class] where Equipe_idEquipe=$id_equipe and Provas_idProva=$id_prova";
            $mysqli->query($sql_code) or die($mysqli->error);
            #echo $id_equipe;
            #echo $id_prova;

            

        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerencimento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="notas.css">
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

    <div class="content">
        <div class="form-field">
            <!--MUDAR O ACTION DEPOIS DE MUDAR O NOME DA PAGE-->
            <form class="row g-3 align-items-center" action="notas.php" enctype="multipart/form-data" method="post">
                
                <div class="caixa row g-3 align-items-center">
                    <!--NOME DA EQUIPE-->
                    <div class="col-md-12">
                        <label for="nome" class="form-label">Escolha a equipe</label>
                        
                        <select id='equipes' name='id_equipe' class="form-select" aria-label="Default select example">
                        <?php
                            include('../conexao.php');
                            $sql_query = $mysqli->query("SELECT * from equipe");
                            $i=0;
                            while ($dados = $sql_query->fetch_assoc()) {
                                if ($dados['idEquipe']!="2") {
                                    if ($i==0) {
                                        $i=1;
                                        echo "<option selected value='$dados[idEquipe]'> $dados[nome]</option>";
                                    } else {
                                        echo "<option value='$dados[idEquipe]'> $dados[nome]</option>";
                                    }
                                    
                                }
                            }
                        ?>
                                    
                        </select>
                    </div>
                    
                    <!--PROVA SELECIONADA-->
                    <div class="col-md-6">
                        <label for="prova" class="form-label">Escolha a prova:</label>

                        <select id='provas' name='prova' class="form-select" aria-label="Default select example">
                            <?php
                                include('../conexao.php');
                                $sql_query = $mysqli->query("SELECT * from provas");
                                $i=0;
                                while ($dados = $sql_query->fetch_assoc()) {
                                    if ($i==0) {
                                        $i=1;
                                        
                                        echo "<option selected value='$dados[idProva]' name='prova'> $dados[nome]</option>";
                                    } else {
                                        echo "<option value='$dados[idProva]'>$dados[nome]</option>";
                                    }

                                }
                            ?>
                        </select>
                    </div>
                    
                    <!--CLASS DA EQUIPE-->
                    <div class="col-md-6">
                        <label for="class" class="form-label">Escolha a classificação da equipe:</label>

                        <select id='class' name='class' class="form-select" aria-label="Default select example">
                        <?php                    
                            echo "<option selected value='primeiro'>Primeiro</option>";
                            echo "<option value='segundo'>Segundo</option>";
                            echo "<option value='terceiro'>Terceiro</option>";    
                            echo "<option value='quarto'>Quarto</option>";
                            echo "<option value='quinto'>Quinto</option>";
                            echo "<option value='sexto'>Sexto</option>";
                            
                        ?>
                        </select>
                    </div>
                                            
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="scroll">
        <div class="container">
            
            <div class="table-responsive">
                    
                <table class="table table-bordered table-hover" style="background-color: #C2C2C2; border-color: #f0f0f0; border-radius: 15px;">
                    <thead>
                        <?php 
                            include('../conexao.php');
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
                    <!--<tr>
                        <th class ="Cone" scope="col">#</th>
                        <th class ="Cone" scope="col">Equipes</th>
                        <th scope="col">Futsal (Masculino)</th>
                        <th scope="col">Futsal (Feminino)</th>
                        <th scope="col">Vôlei de quadra (Misto)</th>
                        <th scope="col">Queimada (Feminino)</th>
                        <th scope="col">Basquete (Masculino)</th>
                        <th scope="col">Handebol (Masculino)</th>
                        <th scope="col">Jogos eletrônicos</th>
                        <th scope="col">Lançamento de dardos (Masculino e feminino)</th>
                        <th scope="col">Xadrez (Masculino e feminino)</th>
                        <th scope="col">Oficinas</th>
                        <th scope="col">Encenação de biografia</th>
                        <th scope="col">Prova surpresa 1</th>
                        <th scope="col">Prova surpresa 2</th>
                        <th scope="col">Performance temática</th>
                        <th scope="col">Grito de guerra</th>
                        <th scope="col">Just Dance</th>
                        <th scope="col">Instagram</th>
                    </tr>-->
                    </thead>
                    <tbody>
                        <?php 
                                
                                // talvez Mudar esse caminho
                                #$sql_query = $mysqli->query("SELECT * from arquivos order by idArquivo desc") or die($mysqli->error);
                            $sql_query = $mysqli->query("SELECT e.idEquipe, e.nome, sum(c.nota) as nota 
                            FROM equipe e, conquistas c WHERE e.idEquipe = c.Equipe_idEquipe 
                            group by e.nome order by nota desc;") or die($mysqli->error);
                            while ($dados = $sql_query->fetch_assoc()) { 
                        ?>
                            
                            <tr> 
                                <?php if (!($dados['nome'] === 'fzao')) { ?>
                                    <td><?php echo $dados['nome']; ?></a></td>
                                    <?php 
                                        
                                        $sql_query2 = $mysqli->query("SELECT equipe.nome as nome, conquistas.classificacao as class, conquistas.nota as nota, conquistas.Equipe_idEquipe as id, conquistas.Provas_idProva as p  from equipe, provas, conquistas where  
                                        provas.idProva=conquistas.Provas_idProva and conquistas.Equipe_idEquipe='$dados[idEquipe]' and equipe.idEquipe='$dados[idEquipe]' order by p") or die($mysqli->error);
                                        while ($dados2 = $sql_query2->fetch_assoc()) {

                                    ?>
                                            <td><?php echo $dados2['nota'] ?></td>
                                    <?php } 
                                    
                                    //coleta o total de pontos de cada equipe
                                    /*$sql_query3 = $mysqli->query("SELECT conquistas.nota as nota, conquistas.Equipe_idEquipe as id   from equipe, provas, conquistas where  
                                        provas.idProva=conquistas.Provas_idProva and conquistas.Equipe_idEquipe='$dados[idEquipe]' and equipe.idEquipe='$dados[idEquipe]' order by nome") or die($mysqli->error);
                                     */    
                                    ?>
                                        <td><?php echo $dados['nota']; ?></td>
                                    <?php } ?>
                            </tr>
                            
                        <?php } exit; ?>
                  
                   
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
        

    
    
    
    <footer class="bg-gray text-center text-white rodape" style="background-color:#d8cfcf;">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                <ul class="list-unstyled mb-0 links">
                    <li>
                    <a href="https://portal.ifrn.edu.br/campus/novacruz" target="_blank" class="text-white">IFRN - Nova Cruz</a>
                    </li>
                    <li>
                    <a target="_blank" href="https://www.instagram.com/semadecifnc/" role="button"><img class="images" src="../../assets/insta-logo-500x500.png" alt=""></a>
                    </li>
                </ul>
        </div>
        <!-- Copyright -->
    </footer>
</body>
</html>