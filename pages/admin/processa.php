<?php
    include('protecao.php');
    
    $pr = "";
    //DELETAR EQUIPES
    if (isset($_POST['deletar_equipe'])) {
        

        $id = isset($_POST['id_equipe']) ? $_POST['id_equipe'] : '';
        if ($id != '') {
            $pr = $pr . 'deletarequipe=' .$id;
        }


        header("location:controle.php?p1=y&".$pr);

    //DELETAR MEMBRO
    } else if (isset($_POST['deletar_membro'])) {

        $id = isset($_POST['deletar_membro']) ? $_POST['deletar_membro'] : '';
        if ($id != '') {
            $pr = $pr . 'deletarmembro='.$id;
        }

        header("location:controle.php?p1=y&".$pr);

    //CADASTRAR PROVA
    } else if (isset($_POST['salvar_prova'])) {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        if ($nome != '') {
            $pr = $pr . 'nome_prova='.$nome;
        }

        $local = isset($_POST['local']) ? $_POST['local'] : '';
        if ($local != '') {
            $pr = $pr . '&local_prova='.$local;
        }

        $part = isset($_POST['part']) ? $_POST['part'] : '';
        if ($part != '') {
            $pr = $pr . '&part_prova='.$part;
        }

        $grupo = isset($_POST['grupo']) ? $_POST['grupo'] : '';
        if ($grupo != '') {
            $pr = $pr . '&grupo_prova='.$grupo;
        }

        header("location:controle.php?p1=y&".$pr."&cadastrarprova=1");
    //DELETAR PROVA
    } else if (isset($_POST['deletar_prova'])) {
        $id = isset($_POST['deletar_prova']) ? $_POST['deletar_prova'] : " ";
        if ($id != " ") {
            $pr = $pr. "&deletarprova=" .$id;
        }

        header("location: controle.php?p1=y".$pr."&deletar=2");
    
    //DELETAR GRUPO DE PONTUAÇÃO
    } else if (isset($_POST["deletar_grupo"])) {
        $id = isset($_POST["deletar_grupo"]) ? $_POST["deletar_grupo"] : "";
        if ($id!="") {
            $pr = $pr."&deletargrupo=".$id;
        }
        
        header("location: controle.php?p1=y".$pr."&grupo=1");
        
    //SALVAR GRUPO DE PONTUAÇÃO
    } else if (isset($_POST["salvar_grupo"])) {
        $primeiro = isset($_POST["primeiro"]) ? $_POST["primeiro"] : "";
        if ($primeiro!="") {
            $pr = $pr."primeiro=".$primeiro;
        } 

        $segundo = isset($_POST["segundo"]) ? $_POST["segundo"] : "";
        if ($segundo!="") {
            $pr = $pr."&segundo=".$segundo;
        } 

        $terceiro = isset($_POST["terceiro"]) ? $_POST["terceiro"] : "";
        if ($terceiro!="") {
            $pr = $pr."&terceiro=".$terceiro;
        } 

        $quarto = isset($_POST["quarto"]) ? $_POST["quarto"] : "";
        if ($quarto!="") {
            $pr = $pr."&quarto=".$quarto;
        } 

        $quinto = isset($_POST["quinto"]) ? $_POST["quinto"] : "";
        if ($quinto!="") {
            $pr = $pr."&quinto=".$quinto;
        } 

        $sexto = isset($_POST["sexto"]) ? $_POST["sexto"] : "";
        if ($sexto!="") {
            $pr = $pr."&sexto=".$sexto;
        } 

        header("location:controle.php?p1=y&".$pr."&cadastrargrupo=1");

    //Cadastrar Equipes
    } else if  (isset($_POST["cadastrar_equipe"])) {
        include("../conexao.php");

        $nome = isset($_POST["nome"]) ? $mysqli->real_escape_string($_POST["nome"]) : "";
        if ($nome!="") {
            $pr = $pr."nome_lider_equipe=".$nome;
        } 

        $turma = isset($_POST["turma"]) ? strtoupper($mysqli->real_escape_string($_POST["turma"])) : "";
        if ($turma!="") {
            $pr = $pr."&turma_equipe=".$turma;
        }

        $mat = isset($_POST["matricula"]) ? $mysqli->real_escape_string($_POST["matricula"]) : "";
        if ($mat!="") {
            $pr = $pr."&matricula_equipe=".$mat;
        }

        $equipe = isset($_POST["equipe"]) ? $mysqli->real_escape_string($_POST["equipe"]) : "";
        if ($equipe!="") {
            $pr = $pr."&nome_equipe=".$equipe;
        }

        $email = isset($_POST["email"]) ? $mysqli->real_escape_string($_POST["email"]) : "";
        if ($email!="") {
            //$pr = $pr."&email_equipe=".$email;
            $_SESSION["email_equipe"] = $email;
        }

        $senha = isset($_POST["senha"]) ? md5($mysqli->real_escape_string($_POST["senha"])) : "";
        if ($senha!="") {
            //$pr = $pr."&email_equipe=".$email;
            $_SESSION["senha_equipe"] = $senha;
        }


        $mysqli->close();
        header("location:controle.php?p1=y&".$pr."&cadastrarequipe=1");

        //CADASTRAR NOTICIA
    } else if (isset($_POST["salvar_noticia"])) {
        include("../conexao.php");
        if (isset($_POST['tipo']) || isset($_POST['nome']) || isset($_POST['link']) || isset($_POST['file'])) {
            //echo empty($_FILES['arquivo']['name']);
            //echo "link ".empty($_POST['link']);
            if (strlen($_POST['tipo']) == 0) {
                echo "Selecione um tipo.";
            } else if (strlen($_POST['nome']) == 0) {
                echo "Preencha o nome do arquivo ou link.";
            } else if (empty($_POST['link']) && !($_POST['tipo'] == "file")) {
                echo "Informe o link.";
            } else if (empty($_FILES['arquivo']['name']) && !($_POST['tipo'] == "link")) {
                echo "Insira um arquivo.";
            } else {
                
                $tipo = $_POST['tipo'];
                $nome = $_POST['nome'];
        
                if (!empty($_POST['link'])) {
                    $link = $_POST['link'];
                    
                    //$sql_query = $mysqli->query("INSERT into arquivo (nome, caminho, tipo) values('$nome', '$link', '$tipo')") or die($mysqli->error);
                    
                    if ($stmt = $mysqli->prepare("INSERT INTO arquivo (nome, caminho, tipo) VALUES  (?, ?, ?)")) {
                        //vincular valores as interrogacoes (?)
                        mysqli_stmt_bind_param($stmt,'sss',$nome, $link, $tipo);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }
                        mysqli_stmt_close($stmt);
                    }
                    $mysqli->close();
                    header('location: gerenciarnoticias.php');

                } else {
                    $arquivo = $_FILES['arquivo'];
                    $nome_arquivo = $arquivo['name'];
                    $novo_nome_arquivo = uniqid();
                    $ext = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
        
                    //ESSE CAMINHO SEGUE UMA LOGICA DIFERENTE DA FORMA QUE OCORRE NA PAGE MEMBRO
                    //MAS ISSO NAO INTERFERE, POR HORA. AO MENOS NAO EM MINHA MAQUINA
                    $caminho_arquivo = '../arquivos/'.$novo_nome_arquivo . '.' . $ext;
                    
                    if($arquivo['size'] > 2097152) {
                        die('Arquivo muito grande, max: 2MB');
                    }
        
                    if (move_uploaded_file($arquivo['tmp_name'], '../'.$caminho_arquivo)) {
                        // Insere os dados no banco
                        //$sql = "INSERT INTO arquivo (nome, caminho, tipo) values ('$nome', '$caminho_arquivo', '$tipo')";
                        //$mysqli->query($sql) or die($mysqli->error);
                           
                        if ($stmt = $mysqli->prepare("INSERT INTO arquivo (nome, caminho, tipo) VALUES  (?, ?, ?)")) {
                            //vincular valores as interrogacoes (?)
                            mysqli_stmt_bind_param($stmt,'sss',$nome, $caminho_arquivo, $tipo);
                            //efetiva e executa a SQL no banco, i.e., insere
                            $status = mysqli_stmt_execute($stmt);
                            if ($status === false) {
                                trigger_error($stmt->error, E_USER_ERROR);
                            }
                            mysqli_stmt_close($stmt);
                        }


                        $mysqli->close();
                        header('location: gerenciarnoticias.php');
                        
                    } else{
                        echo 'Erro ao salvar arquivo';
                    }
        
        
                }
            }
        }
    } else if (isset($_GET["deletar_noticia"])) {
            include("../conexao.php");
            $id_deletar = intval($_GET['deletar_noticia']);
            $sql_query = $mysqli->query("SELECT * from arquivo where idArquivo = '$id_deletar'") or die($mysqli->error);
            $dados = $sql_query->fetch_assoc();
        
            if ($dados['tipo']=='link') {

                if ($stmt = $mysqli->prepare("DELETE from arquivo where idArquivo=?")) {
                    mysqli_stmt_bind_param($stmt,'i',$id_deletar);
                    //efetiva e executa a SQL no banco, i.e., insere
                    $status = mysqli_stmt_execute($stmt);
                    ///verifica se deu algo de errado:
                    if ($status === false) {
                        trigger_error($stmt->error, E_USER_ERROR);
                    }
                    mysqli_stmt_close($stmt);
                }
                $mysqli->close();
                header('location: gerenciarnoticias.php');
                
            } else {
                if (unlink('../'.$dados['caminho'])) {
        
                    if ($stmt = $mysqli->prepare("DELETE from arquivo where idArquivo=?")) {
                        mysqli_stmt_bind_param($stmt,'i',$id_deletar);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        ///verifica se deu algo de errado:
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }
                        mysqli_stmt_close($stmt);
                    }
                    $mysqli->close();
                    header('location: gerenciarnoticias.php');
                }
            }
        
        
    }


    


?>