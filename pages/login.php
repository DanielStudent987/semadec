<?php
    
    
    if (isset($_POST['email']) || isset($_POST['senha'])){

    
        if (strlen($_POST['email']) == 0) {
            echo "preencha seu email";
        } else if (strlen($_POST['senha']) == 0) {
            echo "preencha sua senha";
        } else {
            include('conexao.php');

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = md5($mysqli->real_escape_string($_POST['senha']));
        
            $sql_code = "SELECT * From usuario where email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha ao executar o code sql:" . $mysqli->error);

            $quant = $sql_query->num_rows;
            

            

            if ($quant == 1) {

                //USADO PARA PASSAR OS VALORES DA LINHA SELECIONADA  
                $usuario = $sql_query->fetch_assoc();

                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id_usuario'] = $usuario['idUsuario'];
                $_SESSION['nome_usuario'] = $usuario['nome'];
                $_SESSION['status_login'] = true;

                if ($usuario['tipo']=='admin') {
                    //Redireciona pra a page do admin
                    $mysqli->close();
                    header('location: admin/homeadmin.php');
                    exit;
                    
                } else {

                    //redireciona para a areausuario
                    $sql_code2 = "SELECT idEquipe from equipe, usuario where Usuario_idUsuario = '$_SESSION[id_usuario]'";
                    $sql_query2 = $mysqli->query($sql_code2) or die("Falha ao executar o code sql:" . $mysqli->error);
                    $equiper = $sql_query2->fetch_assoc();

                    $_SESSION['id_equipe'] = $equiper['idEquipe'];
                    

                    $mysqli->close();
                    header('location: areausuario.php');
                    exit;
                }
            } else {
                echo 'falha ao logar, email ou senha invalidos';
                
                
                header('location: login.php');
                exit;
            }

        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
    </head>

    <body>
        <div>
            <header class="menu"> 
                <img src="../assets/Laranjinha.png" alt="Logo">
                <div class="tittle">
                    <h1>SEMADEC 2022 - Mulheres que inspiram</h1>
                </div>
                <a href="../index.php"><button type="button">
                    <img src="../assets/exit.svg" id="out" alt="Sair">
                </button></a>
            </header>
        </div>

        <div class="main">
            <div>
                <h1>Login</h1>
                <form class="row g-3" action="login.php" method="post">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" maxlength="250" id="inputEmail4" name="email" placeholder="***">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Senha</label>
                        <input type="password" class="form-control" maxlength="35" name="senha" id="inputPassword4" placeholder="***">
                    </div>                        
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Acessar</button>
                    </div>
                </form>
                
            </div>
        </div>
    </body>
</html>