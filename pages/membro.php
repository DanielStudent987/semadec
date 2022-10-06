<?php
    include('conexao.php');
    include('protecao.php');

    if (!isset($_SESSION)) {
        session_start();
    }

    //FORA DE FUNCIONAMENTO: REVISÃO NECESSARIA
    /*if (isset($_GET['deletar'])) {
        
        $id_deletar = intval($_GET['deletar']);
        $sql_lista_membro_query = $mysqli->query("SELECT * from membros where idMembro = '$id_deletar'") or die($mysqli->error);
        $dados = $sql_lista_membro_query->fetch_assoc();

        if ($dados['caminho'] == '#') {
            if ($mysqli->query("DELETE from membros where idMembro = '$id_deletar'") or die($mysqli->error)) {
                $mysqli->query("UPDATE equipe SET numero_part = numero_part-1 where idEquipe = '$_SESSION[id_equipe]'");
                header("location: membro.php");
            }
        } else {
            if (unlink($dados['caminho'])) {

                if ($mysqli->query("DELETE from membros where idMembro = '$id_deletar'") or die($mysqli->error)) {
                    $mysqli->query("UPDATE equipe SET numero_part = numero_part-1 where idEquipe = '$_SESSION[id_equipe]'");
                    header("location: membro.php");
                }
            }
        }
        

    }*/


    if (isset($_POST['nome']) || isset($_POST['turma']) || isset($_POST['matricula']) || isset($_FILES['comp']) || isset($_POST['tipo'])) {

        if (strlen($_POST['nome']) == 0) {
            echo "Nome do membro nao informado";
        } else if (empty($_POST['matricula']) && !($_POST['tipo'] == 'padrinho' || $_POST['tipo'] == 'madrinha')) {
            echo "Matricula do membro não informada";
        } else if (strlen($_POST['turma']) == 0) {
            echo "preencha a turma";
        }else if (strlen($_POST['tipo']) == 0) {
            echo "falta o tipo";
        } else if (empty($_FILES['comp']) && !($_POST['tipo'] == 'padrinho' || $_POST['tipo'] == 'madrinha')) {
            echo "Faça o uploud do comprovante";
        } else {

            $nome = $mysqli->real_escape_string($_POST['nome']);
            $turma = strtoupper($mysqli->real_escape_string($_POST['turma']));
            if (!($_POST['tipo'] == 'padrinho' || $_POST['tipo'] == 'madrinha')) {
                $matricula = $mysqli->real_escape_string($_POST['matricula']);
            }
            
            $tipo = $_POST['tipo'];
            

            

            //VERIFICA SE HA MAIS DE UM LIDER SENDO ADD
            if ($tipo == 'lider') {
                $verifica = "SELECT * from membros where Equipe_idEquipe = '$_POST[id_equipe]' AND tipo = 'lider'";
                $verifica_query = $mysqli->query($verifica) or die('erro ao verificar o tipo' . $mysqli->error);
                $verifica_quant = $verifica_query->num_rows;

                if ($verifica_quant == 0) {

                } else {
                    
                    $_SESSION['membro_existe'] = true;
                    //header('location: membro.php');
                    die("Só é possível ter um líder por equipe. id='$_POST[id_equipe]' <a href='membro.php'>Tentar novamente</a>");
                    
                }

            }

            //VERIFICA SE HA MAIS DE UM VICE LIDER SENDO ADD
            if ($tipo == 'vice-lider') {
                $verifica = "SELECT * from membros where Equipe_idEquipe = '$_POST[id_equipe]' AND tipo = 'vice-lider'";
                $verifica_query = $mysqli->query($verifica) or die('erro ao verificar o tipo' . $mysqli->error);
                $verifica_quant = $verifica_query->num_rows;

                if ($verifica_quant == 0) {

                } else {
                    
                    $_SESSION['membro_existe'] = true;
                    //header('location: membro.php');
                    die("Só é possível ter um vice-líder por equipe <a href='membro.php'>Tentar novamente</a>");
                    
                }

            }

            if (!($_POST['tipo'] == 'padrinho' || $_POST['tipo'] == 'madrinha')) {
                $sql_code = "SELECT * from membros where matricula = '$matricula'";
                $sql_query = $mysqli->query($sql_code) or die("erro no camdando sql" . $mysqli->error);
                $quant = $sql_query->num_rows;
            } else {
                $quant = 0;
            }

    
            //EH NECESSARIO MUDAR O CAMINHO DE UPLOAD
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            // ESSE CAMINHO DEVE ESTAR ERRADO
            // $caminho_arquivo = '..'.DIRECTORY_SEPARATOR.'arquivos'.DIRECTORY_SEPARATOR.$novo_nome_arquivo . '.' . $ext;
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            
            //VERIFICA O NUMERO DE MAX MEMBROS
            $sql_count_query = $mysqli->query("SELECT count(*) as num from membros where Equipe_idEquipe = '$_POST[id_equipe]' AND tipo='membro'") or die($mysqli->error);
            $num = $sql_count_query->fetch_assoc();
            if (($num['num'] >= 40 && $tipo == 'membro')) {
                die("Número máximo de membros atingidos");
                
            }


            if (!empty($_FILES['comp']) && isset($_POST['matricula'])) {
                $comp = $_FILES['comp'];
                $nome_arquivo = $comp['name'];
                $novo_nome_arquivo = uniqid();
                $ext = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
                $caminho_arquivo = "../comprovantes/" . $novo_nome_arquivo . '.' . $ext;
            

                if($comp['size'] > 2097152) {
                    die('Arquivo muito grande, max: 2MB');
                }

                if ($quant == 0 && ($ext == "jpg" || $ext == "pdf")) {
                    
                    if (!empty($_FILES['comp'])) {
                        if (move_uploaded_file($comp['tmp_name'], $caminho_arquivo)) {
                            // Insere os dados no banco
                            $sql = "INSERT INTO membros (nome, turma, matricula, comprovante, tipo, caminho, Equipe_idEquipe) values ('$nome', '$turma', '$matricula', '$nome_arquivo', '$tipo', '$caminho_arquivo' , '$_POST[id_equipe]')";
                            
                            

                            try {
                                if ($mysqli->query($sql)) {
                                
                                    $_SESSION['status_adicionar_membro'] = true;
                                    $mysqli->query("UPDATE equipe SET numero_part = numero_part+1 where idEquipe = '$_POST[id_equipe]'");
                                }
                            } catch (Exception $e) {
                                die("Erro ao inserir dado no bd: " . $mysqli->error);
                            }

                            $mysqli->close();
                            header('location: membro.php');
                            exit;
                        }else{
                            echo 'Erro ao mover arquivo para a pasta';
                        }
                    }
                
                } else {
                    
                    $_SESSION['membro_existe'] = true;
                    //header('location: membro.php');
                    echo "Matrícula ou Líder já existente ou tipo de arquivo não suportado";
                    
                    
                }
            } else {
                if ($quant == 0) {
                    // Insere os dados no banco
                    $sql = "INSERT INTO membros (nome, turma, matricula, comprovante, tipo, caminho, Equipe_idEquipe) values ('$nome', '$turma', '#', '#', '$tipo', '#' , '$_POST[id_equipe]')";

                    if ($mysqli->query($sql) === TRUE) {
                        $_SESSION['status_adicionar_membro'] = true;
                        $mysqli->query("UPDATE equipe SET numero_part = numero_part+1 where idEquipe = '$_POST[id_equipe]'");
                            
                    }

                    $mysqli->close();
                    header('location: membro.php');
                    exit;
                    
                } else {
                    
                    $_SESSION['membro_existe'] = true;
                    //header('location: membro.php');
                    echo "erro ao tentar cadastrar";
                    
                    
                }
            }
 
        }
    }

    //$sql_lista_membro_query = $mysqli->query("SELECT * from membros where Equipe_idEquipe = '$_POST[id_equipe]' order by tipo desc") or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="membro.css">

    <script>
        function disable() {
            document.getElementById('comprovante').disabled=true;
            document.getElementById('mat').disabled=true;
            
        }
        function active() {
            document.getElementById('comprovante').disabled=false;
            document.getElementById('mat').disabled=false;
        }
        
    </script>
</head>
<body>

    <div>
        <header class="menu"> 
            <img src="../assets/Laranjinha.png" alt="laranja">
            <div class="tittle">
                <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
            </div>
            <a href="admin/homeadmin.php"> <button type="button">
                <img src="../assets/exit.svg" id='out' alt="Sair">
            </button></a>
        </header>
    </div>
        <div class="main">
            <div>
                <h1>Adicionar Membro</h1>
                <form class="row g-3" action="membro.php" enctype="multipart/form-data" method="post">
                    
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
                    <!--NOME DA EQUIPE-->

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Nome Completo:</label>
                        <input type="text" class="form-control" maxlength="149" id="inputEmail4" name="nome" placeholder="Informe o nome do membro">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Turma (Formato: INFO4V, ADM2M, Servidor, ...):</label>
                        <input type="text" class="form-control" size="5" maxlength="10" id="inputPassword4" name="turma" placeholder="informe a turma do membro">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Matrícula:</label>
                        <input type="text" class="form-control" maxlength="29"  name="matricula" id="mat" placeholder="informe a matricula do membro">
                    </div>
                    
                    <div class="form-check">
                    <label for="inputEmail4" class="form-label">Informe a classe do membro:</label><br>

                        <input class="form-check-input" type="radio" name="tipo" id="Radios1" onclick="active()"  value="membro" checked>
                            <label class="form-check-label" for="Radios1">
                                Membro da equipe
                            </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="Radios2" onclick="disable()" value="padrinho">
                        <label class="form-check-label" for="Radios2">
                            Padrinho
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="Radios3" onclick="disable()" value="madrinha">
                        <label class="form-check-label" for="Radios3">
                            Madrinha
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="Radios4" onclick="active()" value="vice-lider">
                        <label class="form-check-label" for="Radios4">
                            Vice-Líder
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="Radios5" onclick="active()" value="lider">
                        <label class="form-check-label" for="Radios5">
                            Líder
                        </label>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Comprovante de Matrícula (pdf ou jpg, max(2MB)):</label>
                        <input type="file" class="form-control" id="comprovante" maxlength="240" name="comp"  placeholder="">
                    </div>                        
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
                <div class="link">
                    <label>Ir para <a href="areausuario.php">Área do Usuario</a> - </label>
                    <label><a href="../index.php">TelaInicial</a></label>
                    
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