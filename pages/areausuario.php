<?php
    include('protecao.php');
    include('conexao.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="areausuario.css">

    <title>Usuario</title>
</head>

<!--Home-->
<body>
    <header class="menu"> 
        <img src="../assets/Laranjinha.png" alt="Logo">
        <div class="tittle">
            <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
        </div>
        <a href="logout.php" ><button type="button" >
            <img src="../assets/exit.svg" id="out" alt="sair">
        </button></a>
    </header>

    <div class="container">
        <div class="row r-c">
            <div class="col noticia">
                <aside class="noticias">
                    <h2>Noticias</h2>
                    <div class="scroll">
                    <table class="gn-seletable">
                        
                        <tbody>
                            <?php 
                                include('conexao.php');
                                //Mudar esse caminho e ordenar de forma decrescente igual ta ai
                                $sql_query = $mysqli->query("SELECT * from arquivo order by idArquivo desc") or die($mysqli->error);
                                #$sql_query = $mysqli->query("SELECT * from membros order by idMembro desc") or die($mysqli->error);
                                
                                while ($dados = $sql_query->fetch_assoc()) { 
                                    $caminhoArq = ($dados['tipo']=='link') ? $dados['caminho'] : $dados['caminho'];
                            ?>
                            <tr>
                                <!--Modificar o banco: add tipo na tabela arquivo-->
                                <td><a target="_blank" href="<?php echo $caminhoArq; ?>"><?php echo $dados['nome'] ?></a></td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                        
                    </table>
                    </div>
                </aside>
            </div>

            <div class="col member">
                <div class="col memb">
                    <div class="membros">
                        <div class="buttons">
                            <h2>
                                Membros
                            </h2>
                            <a href="membro.php">
                                <img src="../assets/add.svg" alt="Adicionar">
                            </a>
                        </div>
                        <div class="scroll2">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Nome</th>
                                        <th>Turma</th>
                                        <th>tipo</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql_lista_membro_query = $mysqli->query("SELECT * from membros where Equipe_idEquipe = '$_SESSION[id_equipe]' order by tipo desc") or die($mysqli->error);
                                            while ($dados = $sql_lista_membro_query->fetch_assoc()) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $dados['nome']; ?></td>
                                                <td><?php echo $dados['turma']; ?></td>
                                                <td><?php echo $dados['tipo']; ?></td>
                                            </tr>
                                        </tbody>
                                        <?php 
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                    </div>
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
                    <a target="_blank" href="https://www.instagram.com/semadecifnc/" role="button"><img class="images" src="../assets/insta-logo-500x500.png" alt=""></a>
                    </li>
                </ul>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>
</html>