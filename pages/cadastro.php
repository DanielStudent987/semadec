<?php
    
    include('conexao.php');
    
    if (!isset($_SESSION)) {
        session_start();
    }
    
    //VERIFICA SE OS CAMPOS EXISTEM E SE ELES ESTAO VAZIOS
    if(isset($_POST['email']) || isset($_POST['matricula']) || isset($_POST['turma']) || isset($_POST['senha']) || isset($_POST['nome']) || isset($_POST['equipe']) ) {

        if (strlen($_POST['email']) == 0) {
            echo "preencha seu email";
        } else if (strlen($_POST['senha']) == 0) {
            echo "preencha sua senha";
        } else if (strlen($_POST['nome']) == 0) {
            echo "preencha seu nome";
        } else if (strlen($_POST['equipe']) == 0) {
            echo "preencha sua equipe";
        } else if (strlen($_POST['turma']) == 0) {
            echo "preencha sua turma";
        } else if (strlen($_POST['matricula']) == 0) {
            echo "preencha sua matricula";
            
        } else {

            //DEFINE AS VARIAVEIS E PEGA OS VALORES DO POST DO FORMULARIO DE CADASTRO DE USER
            $nome = $mysqli->real_escape_string($_POST['nome']);
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = md5($mysqli->real_escape_string($_POST['senha']));
            $equipe = $mysqli->real_escape_string($_POST['equipe']);
            $matricula = $mysqli->real_escape_string($_POST['matricula']);
            $turma = strtoupper($mysqli->real_escape_string($_POST['turma']));

            
            $sql_code = "SELECT * from usuario where email = '$email' or matricula = '$matricula'";
            $sql_code2 = "SELECT * from equipe where nome = '$equipe'";

            $sql_query = $mysqli->query($sql_code) or die( "Falha ao carregar as informações" . $mysqli->error);
            $sql_query2 = $mysqli->query($sql_code2) or die( "Falha ao carregar as informações" . $mysqli->error);
            

            $quant = $sql_query->num_rows;
            $quant2 = $sql_query2->num_rows;
            

            $sql_count_query = $mysqli->query("SELECT count(*) as num from equipe") or die($mysqli->error);
            $num = $sql_count_query->fetch_assoc();
            if ($num['num'] >= 9) {
                die("Número máximo de equipes formado");
                
            }
            
            //verifica se o cadastro ja existe no bd
            if ($quant == 0 && $quant2 == 0) {
                

                //INICIA A SESSION SE NAO TIVER NENHUMA
                if(!isset($_SESSION)) {
                    session_start();
                }

                
                $sql = "INSERT INTO usuario (nome, email, matricula, turma, senha, tipo) VALUES ('$nome', '$email', '$matricula', '$turma', '$senha', 'user')";
                $zero = 0;

                
                $sql_code3 = "SELECT * from usuario where email = '$email' AND senha = '$senha'";
                $sql_query3 = $mysqli->query($sql_code3) or die( "Falha ao carregar as informações" . $mysqli->error);
                $usuario = $sql_query3->fetch_assoc();

                if ($mysqli->query($sql) == true) {
                    $sql_code3 = "SELECT * from usuario where email = '$email' AND senha = '$senha'";
                    $sql_query3 = $mysqli->query($sql_code3) or die( "Falha ao carregar as informações" . $mysqli->error);
                    $usuario = $sql_query3->fetch_assoc();
                    
                    $sql2 = "INSERT INTO equipe (nome, numero_part, homologado, Usuario_idUsuario) values('$equipe','$zero','$zero', '$usuario[idUsuario]')";

                    if ($mysqli->query($sql2) == true) {
                        $sql_query_conquista = $mysqli->query("SELECT e.idEquipe, p.idProva from provas p, equipe e where e.Usuario_idUsuario=(SELECT idUsuario from usuario where email = '$email' AND senha = '$senha') and p.idProva<>0");

                        while ($dados = $sql_query_conquista->fetch_assoc()) {
                            $mysqli->query("INSERT into conquistas (Provas_idProva, Equipe_idEquipe, classificacao, nota) values ('$dados[idProva]', '$dados[idEquipe]', '', 0)");
                            
                        }
                        
                    }
                } else {
                    echo "erro na conculta";
                }
                

                
                $mysqli->close();
                //REDIRECIONA pra login.php
                header('location: cadastro.php');
                $_SESSION['usuario_existe'] = false;
                exit;

            } else {
                
                $_SESSION['usuario_existe'] = true;
                //header('location: cadastro.php');
                die("Você não pode acessar essa página. <p><a href=\"login.php\">Fazer login</a></p>");
                
            }
        } 


    } 
 
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="cadastro.css">
        <title>Cadastro</title>
    </head>
    <body>
        <div>
            <header class="menu"> 

                <img src="../assets/Laranjinha.png" alt="Logo">
                <div class="tittle">
                    <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
                </div>
                <a href="admin/homeadmin.php"><button type="button">
                    <img src="../assets/exit.svg" alt="Sair">
                </button></a>
            </header>
        </div>
        
        <div class="main">
            <div>
                <h1>Cadastro de Equipe</h1>
                <form class="row g-3" action="processa.php" method="post">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" maxlength="250" name="email" placeholder="***">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="inputPassword4" maxlength="36" name="senha" placeholder="***">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="inputAddress" maxlength="149" name="nome" placeholder="***">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Matrícula</label>
                        <input type="text" class="form-control" id="inputAddress5" maxlength="29" name="matricula" placeholder="***">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress6" class="form-label">Turma</label>
                        <input type="text" class="form-control" id="inputAddress6" maxlength="10" name="turma" placeholder="***">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Nome da Equipe</label>
                        <input type="text" class="form-control" id="inputAddress2" name="equipe" maxlength="250" placeholder="***">
                    </div>                           
                    <div class="col-12">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        
        

    </body>
</html>